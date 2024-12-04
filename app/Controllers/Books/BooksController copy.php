<?php

namespace App\Controllers\Books;

use App\Models\BookModel;
use App\Models\BookStockModel;
use App\Models\CategoryModel;
use App\Models\LoanModel;
use App\Models\RackModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\RESTful\ResourceController;
use App\Models\SettingModel;

class BooksController extends ResourceController
{
    protected SettingModel $SettingModel;
    protected BookModel $bookModel;
    protected CategoryModel $categoryModel;
    protected RackModel $rackModel;
    protected BookStockModel $bookStockModel;
    protected LoanModel $loanModel;

    public function __construct()
    {
        $this->bookModel = new BookModel;
        $this->categoryModel = new CategoryModel;
        $this->rackModel = new RackModel;
        $this->bookStockModel = new BookStockModel;
        $this->loanModel = new LoanModel;

        helper('upload');
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
{
    $itemPerPage = 20;
    $searchType = $this->request->getGet('search_type') ?? 'all'; // Default ke 'semua'

    $keyword = $this->request->getGet('search') ?? '';

    $builder = $this->bookModel
        ->select('books.*, book_stock.quantity, categories.name as category, racks.name as rack, racks.floor')
        ->join('book_stock', 'books.id = book_stock.book_id', 'LEFT')
        ->join('categories', 'books.category_id = categories.id', 'LEFT')
        ->join('racks', 'books.rack_id = racks.id', 'LEFT');

    if ($keyword) {
        // Pencarian berdasarkan tipe
        switch ($searchType) {
            case 'title':
                $builder->like('title', $keyword, 'both');
                break;
            case 'author':
                $builder->like('author', $keyword, 'both');
                break;
            case 'publisher':
                $builder->like('publisher', $keyword, 'both');
                break;
            case 'year':
                $builder->like('year', $keyword, 'both');
                break;
            case 'category':
                $builder->like('categories.name', $keyword, 'both');
                break;
            case 'all': // Pencarian di semua kolom
            default:
                $builder->groupStart()
                    ->like('title', $keyword, 'both')
                    ->orLike('author', $keyword, 'both')
                    ->orLike('publisher', $keyword, 'both')
                    ->orLike('year', $keyword, 'both')
                    ->orLike('categories.name', $keyword, 'both')
                    ->groupEnd();
                break;
        }
    }

    $builder->orderBy('books.updated_at', 'DESC');
    // Mendapatkan data buku
    $books = $builder->paginate($itemPerPage, 'books');

    // Filter data yang sudah dihapus
    $books = array_filter($books, function ($book) {
        return $book['deleted_at'] == null;
    });

    foreach ($books as &$book) {
        $loans = $this->loanModel->where([
            'book_id' => $book['id'],
            'return_date' => null
        ])->findAll();

        $loanCount = array_reduce(
            array_map(function ($loan) {
                return $loan['quantity'];
            }, $loans),
            function ($carry, $item) {
                return ($carry + $item);
            }
        );

        // Hitung sisa stok
        $book['bookStock'] = $book['quantity'] - $loanCount;
    }


    // Data untuk tampilan
    $data = [
        'books'         => $books,
        'pager'         => $this->bookModel->pager,
        'currentPage'   => $this->request->getVar('page_books') ?? 1,
        'itemPerPage'   => $itemPerPage,
        'search'        => $keyword,
        'searchType'    => $searchType,
    ];

    return view('books/index', $data);
}


    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($slug = null)
    {
        $book = $this->bookModel
            ->select('books.*, book_stock.quantity, categories.name as category, racks.name as rack, racks.floor')
            ->join('book_stock', 'books.id = book_stock.book_id', 'LEFT')
            ->join('categories', 'books.category_id = categories.id', 'LEFT')
            ->join('racks', 'books.rack_id = racks.id', 'LEFT')
            ->where('slug', $slug)->first();

        if (empty($book)) {
            throw new PageNotFoundException('Book with slug \'' . $slug . '\' not found');
        }

        $loans = $this->loanModel->where([
            'book_id' => $book['id'],
            'return_date' => null
        ])->findAll();

        $loanCount = array_reduce(
            array_map(function ($loan) {
                return $loan['quantity'];
            }, $loans),
            function ($carry, $item) {
                return ($carry + $item);
            }
        );

        $bookStock = $book['quantity'] - $loanCount;

        $data = [
            'book'      => $book,
            'loanCount' => $loanCount ?? 0,
            'bookStock' => $bookStock
        ];

        return view('books/show', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $categories = $this->categoryModel->findAll();
        $racks = $this->rackModel->findAll();

        $data = [
            'categories' => $categories,
            'racks'      => $racks,
            'validation' => \Config\Services::validation(),
        ];

        return view('books/create', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
{
    if (!$this->validate([
        'cover'     => 'is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]|max_size[cover,5120]',
        'title'     => 'required|string|max_length[127]',
        'author'    => 'required|string|max_length[250]|regex_match[/^[\s\S]*$/]|',
        'publisher' => 'required|string|max_length[64]',
        'isbn'      => 'required|numeric|min_length[10]|max_length[13]',
        'year'      => 'required|numeric|min_length[4]|max_length[4]|less_than_equal_to[2100]',
        'rack'      => 'required|numeric',
        'category'  => 'required|numeric',
        'stock'     => 'required|numeric|greater_than_equal_to[1]',
        'panggil'   => 'required|string|max_length[64]', // Validasi panggil
    ])) {
        // Validasi gagal, kembali ke form dengan error
        $categories = $this->categoryModel->findAll();
        $racks = $this->rackModel->findAll();

        return view('books/create', [
            'categories' => $categories,
            'racks' => $racks,
            'validation' => \Config\Services::validation(),
            'oldInput' => $this->request->getVar(),
        ]);
    }

    // Menangani upload file cover
    $coverImage = $this->request->getFile('cover');
    if ($coverImage->getError() != 4) {
        $coverImageFileName = uploadBookCover($coverImage);
    }

    // Simpan buku baru
    $slug = url_title($this->request->getVar('title') . ' ' . rand(0, 1000), '-', true);

    if (!$this->bookModel->save([
        'slug' => $slug,
        'title' => $this->request->getVar('title'),
        'author' => $this->request->getVar('author'),
        'publisher' => $this->request->getVar('publisher'),
        'isbn' => $this->request->getVar('isbn'),
        'year' => $this->request->getVar('year'),
        'rack_id' => $this->request->getVar('rack'),
        'category_id' => $this->request->getVar('category'),
        'book_cover' => $coverImageFileName ?? null,
        'panggil' => $this->request->getVar('panggil') // Menyimpan panggil
    ]) || !$this->bookStockModel->save([
        'book_id' => $this->bookModel->getInsertID(),
        'quantity' => $this->request->getVar('stock')
    ])) {
        session()->setFlashdata(['msg' => 'Insert failed']);
        return redirect()->to('admin/books/create');
    }

    session()->setFlashdata(['msg' => 'Insert new book successful']);
    return redirect()->to('admin/books');
}


    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($slug = null)
    {
        $book = $this->bookModel
            ->select('books.*, book_stock.quantity')
            ->join('book_stock', 'books.id = book_stock.book_id', 'LEFT')
            ->where('slug', $slug)->first();

        if (empty($book)) {
            throw new PageNotFoundException('Book with slug \'' . $slug . '\' not found');
        }

        $categories = $this->categoryModel->findAll();
        $racks = $this->rackModel->findAll();

        $data = [
            'book'       => $book,
            'categories' => $categories,
            'racks'      => $racks,
            'validation' => \Config\Services::validation(),
        ];

        return view('books/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($slug = null)
{
    $book = $this->bookModel->where('slug', $slug)->first();

    if (empty($book)) {
        throw new PageNotFoundException('Book with slug \'' . $slug . '\' not found');
    }

    if (!$this->validate([
        'cover'     => 'is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]|max_size[cover,5120]',
        'title'     => 'required|string|max_length[127]',
        'author'    => 'required|string|max_length[250]|regex_match[/^[\s\S]*$/]|',
        'publisher' => 'required|string|max_length[64]',
        'isbn'      => 'required|numeric|min_length[10]|max_length[13]',
        'year'      => 'required|numeric|min_length[4]|max_length[4]|less_than_equal_to[2100]',
        'rack'      => 'required|numeric',
        'category'  => 'required|numeric',
        'stock'     => 'required|numeric|greater_than_equal_to[1]',
        'panggil'   => 'required|string|max_length[64]', // Add validation for 'panggil'
    ])) {
        $categories = $this->categoryModel->findAll();
        $racks = $this->rackModel->findAll();

        $data = [
            'book'       => $book,
            'categories' => $categories,
            'racks'      => $racks,
            'validation' => \Config\Services::validation(),
            'oldInput'   => $this->request->getVar(),
        ];

        session()->setFlashdata(['msg' => 'Update failed']);
        return view('books/edit', $data);
    }

    $bookStock = $this->bookStockModel->where('book_id', $book['id'])->first();

    // Handle cover image update
    $coverImage = $this->request->getFile('cover');

    if ($coverImage->getError() == 4) {
        $coverImageFileName = $book['book_cover'];
    } else {
        $coverImageFileName = updateBookCover(
            newCoverImage: $coverImage,
            formerCoverImageFileName: $book['book_cover']
        );
    }

    // Update the slug only if the title changes
    $slug = $this->request->getVar('title') != $book['title']
        ? url_title($this->request->getVar('title') . ' ' . rand(0, 1000), '-', true)
        : $book['slug'];

    if (!$this->bookModel->save([
        'id'  => $book['id'],
        'slug' => $slug,
        'title' => $this->request->getVar('title'),
        'author' => $this->request->getVar('author'),
        'publisher' => $this->request->getVar('publisher'),
        'isbn' => $this->request->getVar('isbn'),
        'year' => $this->request->getVar('year'),
        'rack_id' => $this->request->getVar('rack'),
        'category_id' => $this->request->getVar('category'),
        'book_cover' => $coverImageFileName ?? null,
        'panggil' => $this->request->getVar('panggil') // Save the 'panggil' field
    ]) || !$this->bookStockModel->save([
        'id' => $bookStock['id'],
        'book_id' => $book['id'],
        'quantity' => $this->request->getVar('stock')
    ])) {
        $categories = $this->categoryModel->findAll();
        $racks = $this->rackModel->findAll();

        $data = [
            'book'       => $book,
            'categories' => $categories,
            'racks'      => $racks,
            'validation' => \Config\Services::validation(),
            'oldInput'   => $this->request->getVar(),
        ];

        session()->setFlashdata(['msg' => 'Update failed']);
        return view('books/edit', $data);
    }

    session()->setFlashdata(['msg' => 'Update book successful']);
    return redirect()->to('admin/books');
}


    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($slug = null)
    {
        $book = $this->bookModel->where('slug', $slug)->first();

        if (empty($book)) {
            throw new PageNotFoundException('Book with slug \'' . $slug . '\' not found');
        }

        $bookStock = $this->bookStockModel->where('book_id', $book['id'])->first();

        if (!$this->bookModel->delete($book['id']) || !$this->bookStockModel->delete($bookStock['id'])) {
            session()->setFlashdata(['msg' => 'Failed to delete book', 'error' => true]);
            return redirect()->back();
        }

        // delete former image file
        deleteBookCover($book['book_cover']);

        session()->setFlashdata(['msg' => 'Book deleted successfully']);
        return redirect()->to('admin/books');
    }

    public function bookDetail(string $slug)
{
    // Fetch book details based on slug
    $book = $this->bookModel
        ->select('books.*, categories.name as category, racks.name as rack, racks.floor')
        ->join('categories', 'books.category_id = categories.id', 'LEFT')
        ->join('racks', 'books.rack_id = racks.id', 'LEFT')
        ->where('books.slug', $slug)
        ->first();

    if (!$book) {
        // If the book is not found, show a 404 page
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    // Count how many copies of the book are currently borrowed
    $loanCount = $this->loanModel->where('book_id', $book['id'])
        ->where('status', 'borrowed') // Assuming 'borrowed' is the status for checked-out books
        ->countAllResults();

    // Calculate the book stock
    $bookStock = $book['quantity'] - $loanCount;

    // Prepare data for the view
    $data = [
        'book' => $book,
        'loanCount' => $loanCount,  // Number of currently borrowed copies
        'bookStock' => $bookStock,  // Remaining stock after deducting borrowed copies
        'pager' => $this->bookModel->pager,
        'currentPage' => $this->request->getVar('page_books') ?? 1,
        'itemPerPage' => 10,  // You can adjust the items per page here
        'search' => $this->request->getVar('search') ?? '',
        'category' => $this->request->getVar('category') ?? ''
    ];

    // Display the book detail page with the data
    return view('home/book_detail', $data);
}



}
