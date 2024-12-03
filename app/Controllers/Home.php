<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\LoanModel;
use App\Models\RackModel;
use App\Models\SettingModel;

class Home extends BaseController
{
    protected BookModel $bookModel;
    protected LoanModel $loanModel;
    protected SettingModel $SettingModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->loanModel = new LoanModel;
        $this->SettingModel = new SettingModel();
    }

    public function index(): string
    
    {
          // Ambil data setting (termasuk logo) dari database
        $setting = $this->SettingModel->first();
        return view('home/home', ['setting' => $setting]);
    }

    public function book(): string
{
    $itemPerPage = 20;
    $category = $this->request->getGet('category') ?? 'all';
    $keyword = $this->request->getGet('search');

    if ($keyword) {
        $query = $this->bookModel
            ->select('books.*, book_stock.quantity, categories.name as category, racks.name as rack, racks.floor')
            ->join('book_stock', 'books.id = book_stock.book_id', 'LEFT')
            ->join('categories', 'books.category_id = categories.id', 'LEFT')
            ->join('racks', 'books.rack_id = racks.id', 'LEFT');

        // Filter berdasarkan kategori
        switch ($category) {
            case 'title':
                $query->like('title', $keyword, 'both', insensitiveSearch: true);
                break;
            case 'author':
                $query->like('author', $keyword, 'both', insensitiveSearch: true);
                break;
            case 'publisher':
                $query->like('publisher', $keyword, 'both', insensitiveSearch: true);
                break;
            case 'year':
                $query->like('year', $keyword, 'both', insensitiveSearch: true);
                break;
            case 'panggil': // Filter berdasarkan panggil
                $query->like('panggil', $keyword, 'both', insensitiveSearch: true);
                break;
            case 'category': // Filter berdasarkan kategori
                $query->like('categories.name', $keyword, 'both', insensitiveSearch: true);
                break;
            default: // 'all'
                $query->groupStart()
                    ->like('title', $keyword, 'both', insensitiveSearch: true)
                    ->orLike('author', $keyword, 'both', insensitiveSearch: true)
                    ->orLike('publisher', $keyword, 'both', insensitiveSearch: true)
                    ->orLike('year', $keyword, 'both', insensitiveSearch: true)
                    ->orLike('panggil', $keyword, 'both', insensitiveSearch: true)
                    ->orLike('categories.name', $keyword, 'both', insensitiveSearch: true) // Include category in the search
                    ->groupEnd();
                break;
        }

        // Filter buku yang tidak dihapus
        $books = array_filter($query->paginate($itemPerPage, 'books'), function ($book) {
            return $book['deleted_at'] == null;
        });
    } else {
        // Menampilkan semua buku jika tidak ada keyword
        $books = $this->bookModel
            ->select('books.*, book_stock.quantity, categories.name as category, racks.name as rack, racks.floor')
            ->join('book_stock', 'books.id = book_stock.book_id', 'LEFT')
            ->join('categories', 'books.category_id = categories.id', 'LEFT')
            ->join('racks', 'books.rack_id = racks.id', 'LEFT')
            ->paginate($itemPerPage, 'books');
    }

    $data = [
        'books'         => $books,
        'pager'         => $this->bookModel->pager,
        'currentPage'   => $this->request->getVar('page_books') ?? 1,
        'itemPerPage'   => $itemPerPage,
        'search'        => $keyword,
        'category'      => $category
    ];

    return view('home/book', $data);
}


    public function bookDetail(string $slug): string
    {
        // Fetch book details, including stock, category, and rack information
        $book = $this->bookModel
            ->select('books.*, book_stock.quantity, categories.name as category, racks.name as rack, racks.floor')
            ->join('book_stock', 'books.id = book_stock.book_id', 'LEFT')
            ->join('categories', 'books.category_id = categories.id', 'LEFT')
            ->join('racks', 'books.rack_id = racks.id', 'LEFT')
            ->where('slug', $slug) // Use slug directly here
            ->first();

        if (!$book) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Fetch loan data to calculate the loan count for the book
        $loans = $this->loanModel->where([
            'book_id' => $book['id'],
            'return_date' => null // Only loans that have not been returned
        ])->findAll();

        // Calculate total loaned quantity
        $loanCount = array_reduce(
            array_map(function ($loan) {
                return $loan['quantity']; // Sum up quantities of loaned books
            }, $loans),
            function ($carry, $item) {
                return ($carry + $item); // Add up all quantities
            }
        );

        // Calculate available stock
        $bookStock = $book['quantity'] - $loanCount; // Subtract loaned books from total quantity

        // Prepare data to pass to the view
        $data = [
            'book'      => $book,
            'loanCount' => $loanCount ?? 0,  // If no loans, set loanCount to 0
            'bookStock' => $bookStock       // Available stock after considering loan count
        ];

        // Return the book details view with the data
        return view('home/book_detail', $data);
    }

    public function news() {
        return view('home/Menu/news'); // Mengarahkan ke file news.php
    }
    public function visiMisi() {
        return view('home/Menu/Profile/visiMisi'); // Mengarahkan ke file visiMisi.php
    }
    public function sejarah() {
        return view('home/Menu/Profile/sejarah'); // Mengarahkan ke file visiMisi.php
    }
    public function peraturandankebijakan() {
        return view('home/Menu/Profile/peraturandankebijakan'); // Mengarahkan ke file visiMisi.php
    }
    public function aboutus() {
        return view('home/Menu/Profile/aboutus'); // Mengarahkan ke file visiMisi.php
    }
    public function struktur() {
        return view('home/Menu/Profile/struktur'); // Mengarahkan ke file visiMisi.php
    }
}
