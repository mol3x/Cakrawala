<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('headOpac') ?>
<title>News</title>
<style>
        .Berita {
        color: white;
        text-align: center;
        padding: 1rem 0;
    }

    .Berita h1 {
        margin: 0;
        font-size: 1.8rem;
    }

    /* News Container */
    .news-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    .news-item {
        background: white;
        margin-bottom: 1.5rem;
        padding: 1rem;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .news-item h2 {
        font-size: 1.4rem;
        color: #5830E0;
        margin: 0 0 0.5rem;
    }

    .news-item .date {
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 1rem;
    }

    .news-item p {
        margin: 0 0 1rem;
    }

    .read-more {
        text-decoration: none;
        color: #5830E0;
        font-weight: bold;
        transition: color 0.3s;
    }

    .read-more:hover {
        color: #004d40;
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
                        <h1 class="page-title">News</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Home</a></li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

<div class="section">
    <header class="Berita">
        <h1>Berita Terbaru Perpustakaan</h1>
    </header>
    <main class="news-container">
        <article class="news-item">
            <h2>Perpustakaan Cakrawalan Luncurkan Fitur Baru untuk Pemustaka</h2>
            <p class="date">Semarang, 29 November 2024</p>
            <p>Dalam rangka meningkatkan layanan kepada pemustaka, Perpustakaan Cakrawala meluncurkan fitur baru yang memungkinkan pengguna melihat koleksi buku tanpa perlu login terlebih dahulu...</p>
            <a href="#" class="read-more">Baca selengkapnya</a>
        </article>
        <article class="news-item">
            <h2>Digitalisasi Perpustakaan Desa di Kabupaten Semarang</h2>
            <p class="date">Semarang, 28 November 2024</p>
            <p>Perpustakaan Cakrawala bekerja sama dengan lima desa yang telah menerima dana pembangunan perpustakaan desa untuk memulai program digitalisasi perpustakaan...</p>
            <a href="#" class="read-more">Baca selengkapnya</a>
        </article>
        <article class="news-item">
            <h2>Program Literasi Kesehatan di Perpustakaan: Kolaborasi dengan Mahasiswa Keperawatan</h2>
            <p class="date">Semarang, 25 November 2024</p>
            <p>Perpustakaan Cakrawala bekerja sama dengan mahasiswa Program Studi Keperawatan Universitas Diponegoro guna menyelenggarakan program "Literasi Kesehatan untuk Semua"...</p>
            <a href="#" class="read-more">Baca selengkapnya</a>
        </article>
    </main>
</div>

    <?= $this->include('layouts/frontend/footerFront') ?>
<?= $this->endSection() ?>