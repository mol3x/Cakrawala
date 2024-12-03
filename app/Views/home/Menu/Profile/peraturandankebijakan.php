<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('headOpac') ?>
<title>Peraturan dan Kebijakan</title>
<style>
    .peraturan {
    text-align: center;
    padding: 1rem 0;
}

.peraturan h1 {
    margin: 0;
    font-size: 2rem;
}

/* Rules Container */
.rules-container {
    max-width: 800px;
    margin: 2rem auto;
    padding: 1rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.rules-content h2 {
    color: #5830E0;
    font-size: 1.5rem;
    margin-top: 1.5rem;
}

.rules-content ol, .rules-content ul {
    margin: 1rem 0;
    padding-left: 1.5rem;
}

.rules-content ol li, .rules-content ul li {
    margin-bottom: 0.5rem;
}

.rules-content p {
    margin: 1rem 0;
    line-height: 1.8;
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
                        <h1 class="page-title">Peraturan dan Kebijakan</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Home</a></li>
                        <li>Peraturan dan Kebijakan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<div class="section">
    <header class="peraturan">
        <h1>Peraturan dan Kebijakan</h1>
    </header>
    <main class="rules-container">
        <section class="rules-content">
            <h2>Peraturan Umum</h2>
            <ol>
                <li>Pemustaka wajib menjaga ketenangan di dalam perpustakaan.</li>
                <li>Dilarang membawa makanan dan minuman ke dalam area perpustakaan.</li>
                <li>Pemustaka harus merawat koleksi yang dipinjam dan mengembalikannya tepat waktu.</li>
                <li>Dilarang merusak fasilitas, seperti buku, meja, kursi, atau perangkat elektronik.</li>
                <li>Penggunaan perangkat elektronik harus sesuai dengan ketentuan perpustakaan.</li>
            </ol>
            <h2>Kebijakan Peminjaman</h2>
            <ul>
                <li>Setiap pemustaka diperbolehkan meminjam maksimal 3 buku selama 14 hari.</li>
                <li>Keterlambatan pengembalian buku akan dikenakan denda sebesar Rp1.000 per hari per buku.</li>
                <li>Buku referensi hanya boleh dibaca di tempat dan tidak dapat dipinjam untuk dibawa pulang.</li>
                <li>Kehilangan atau kerusakan buku yang dipinjam akan dikenakan biaya penggantian sesuai harga buku tersebut.</li>
            </ul>
            <h2>Kebijakan Keanggotaan</h2>
            <ul>
                <li>
                    Perpustakaan Cakrawala terbuka untuk umum, namun untuk peminjaman koleksi diperlukan keanggotaan. 
                    Proses pendaftaran anggota memerlukan dokumen sebagai berikut:
                </li>
                <li>Fotokopi KTP atau kartu identitas lain.</li>
                <li>Formulir pendaftaran yang telah diisi.</li>
                <li>Biaya keanggotaan sebesar Rp50.000 (berlaku untuk satu tahun).</li>
            </ul>
            <h2>Sanksi</h2>
            <ul>
                <li>Pemustaka yang melanggar peraturan perpustakaan akan dikenakan sanksi administratif 
                atau pencabutan hak keanggotaan, tergantung pada tingkat pelanggaran.</li>
                
            </ul>
        </section>
    </main>
</div>

<?= $this->include('layouts/frontend/footerFront') ?>
<?= $this->endSection() ?>