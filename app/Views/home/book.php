<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('headOpac') ?>
<title>Daftar Buku</title>
<style>
    .book-list-container {
        max-width: 100%;
        margin: auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .book-list-container h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .book-list {
        list-style: none;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .book-item {
        width: calc(50% - 10px);
        display: flex;
        align-items: flex-start;
        border-bottom: 1px solid #ddd;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        overflow: hidden;
        background: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
    }

    .book-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background: #F8ECFF;
    }

    .book-cover {
        width: 120px;
        height: 180px;
        background-size: cover;
        background-position: center;
        border-radius: 4px;
        margin-right: 20px;
    }

    .book-info h2 {
        margin: 0 0 5px;
        font-size: 16px;
        color: #222;
        transition: color 0.3s ease;
    }

    .book-info h2 a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .book-info h2 a:hover {
        color: #0056b3;
    }

    .book-info p {
        margin: 2px 0;
        color: #555;
    }

    .book-info a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .book-info a:hover {
        color: #0056b3;
    }

  

    /* Responsif */
    @media (max-width: 768px) {
        .book-item {
            width: 100%; /* Menampilkan 1 buku per baris di layar kecil */
            padding-left: 0;
            padding-right: 0;
        }
    }

    @media (max-width: 576px) {
        .book-list-container {
            padding: 15px; /* Mengurangi padding di perangkat kecil */
        }

        .book-list {
            gap: 10px; /* Mengurangi gap antar item di perangkat kecil */
        }
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/frontend/navbarFront') ?>
<!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Daftar Buku</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Home</a></li>
                        <li>Daftar Buku</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<div class="section book-list-container">
    <div class="container">
        <h1>Daftar Buku</h1>
    <div class="row mb-4">
        <div class="col-12 col-lg-5">
            <h5 class="fw-semibold">Filter Buku</h5>
        </div>
        <div class="col-12 col-lg-7">
            <form action="" method="get" class="d-flex gap-2 justify-content-md-end">
                <select class="form-select" name="category">
                    <option value="all" <?= ($category ?? 'all') == 'all' ? 'selected' : '' ?>>Semua</option>
                    <option value="title" <?= ($category ?? '') == 'title' ? 'selected' : '' ?>>Judul</option>
                    <option value="author" <?= ($category ?? '') == 'author' ? 'selected' : '' ?>>Penulis</option>
                    <option value="publisher" <?= ($category ?? '') == 'publisher' ? 'selected' : '' ?>>Penerbit</option>
                    <option value="year" <?= ($category ?? '') == 'year' ? 'selected' : '' ?>>Tahun Terbit</option>
                    <option value="category" <?= ($category ?? '') == 'category' ? 'selected' : '' ?>>Kategori</option>
                </select>
                <input type="text" class="form-control" name="search" value="<?= $search ?? ''; ?>" placeholder="Cari buku">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </form>
        </div>
    </div>
    <ul class="book-list">
        <?php if (empty($books)) : ?>
            <li class="text-center w-100">Buku tidak ditemukan</li>
        <?php else : ?>
            <?php foreach ($books as $book) : ?>
                <?php
                $coverImageFilePath = BOOK_COVER_URI . $book['book_cover'];
                $coverImage = base_url((!empty($book['book_cover']) && file_exists($coverImageFilePath)) ? $coverImageFilePath : BOOK_COVER_URI . DEFAULT_BOOK_COVER);
                ?>
                <li class="book-item">
                    <div class="book-cover" style="background-image: url('<?= $coverImage ?>');"></div>
                    <div class="book-info">
                        <h2> <a href="<?= base_url("book/{$book['slug']}"); ?>"><?= $book['title'] ?> (<?= $book['year'] ?>)</a></h2>
                        <p>Penulis: <?= $book['author']; ?></p>
                        <p>Penerbit: <?= $book['publisher']; ?></p>
                        <a href="<?= base_url("book/{$book['slug']}"); ?>">Detail Buku</a>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <div class="section">

      <?= $pager->links('books', 'my_pager'); ?>
    </div>
</div>
    </div>
    

<?= $this->include('layouts/frontend/footerFront', ['setting' => $setting]) ?>
<?= $this->endSection() ?>