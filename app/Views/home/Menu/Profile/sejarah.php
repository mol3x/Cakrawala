<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('headOpac') ?>
<title>Sejarah</title>
<style>
   
/* Header Styling */
.sejarah {
    color: white;
    text-align: center;
    padding: 1rem 0;
}

.sejarah h1 {
    margin: 0;
    font-size: 2rem;
}

/* History Container */
.history-container {
    max-width: 800px;
    margin: 2rem auto;
    padding: 1rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.history-content h2 {
    color: #5830E0;
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
}

.history-content .date {
    font-size: 0.9rem;
    color: #7f8c8d;
    margin-bottom: 1.5rem;
}

.history-content p {
    margin-bottom: 1rem;
    line-height: 1.8;
}

.history-content h3 {
    margin-top: 1.5rem;
    color: #5830E0;
}

.history-content ul {
    margin: 1rem 0;
    padding-left: 1.5rem;
}

.history-content ul li {
    margin-bottom: 0.5rem;
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
                        <h1 class="page-title">Sejarah</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Home</a></li>
                        <li>Sejarah</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

<div class="section">
     <header class="sejarah">
        <h1>Sejarah Perpustakaan Cakrawala</h1>
    </header>
    <main class="history-container">
        <section class="history-content">
            <h2>Pendirian Perpustakaan Cakrawala</h2>
            <p class="date">Semarang, 29 November 2024</p>
            <p>
                Perpustakaan Cakrawala didirikan pada tanggal 29 November 2024 sebagai wujud komitmen 
                untuk meningkatkan literasi dan akses informasi bagi masyarakat. Berlokasi di pusat kota Semarang, 
                perpustakaan ini menjadi simbol baru untuk pendidikan dan kebudayaan, menyediakan koleksi yang lengkap 
                dan fasilitas modern untuk berbagai kalangan.
            </p>
            <p>
                Nama "Cakrawala" mencerminkan visi perpustakaan ini untuk menjadi pusat pengetahuan yang cerdas, inovatif, dan inklusif, dengan menyediakan akses informasi yang kreatif dan beragam untuk membangun wawasan yang abadi dan luas bagi masyarakat.
                Dengan koleksi buku yang beragam, layanan digital, serta program literasi, 
                Perpustakaan Cakrawala bertekad untuk menjadi pusat pembelajaran dan inovasi di era modern.
            </p>
            <h3>Misi Perpustakaan</h3>
            <ul>
                <li class="sublist">Cerdas: Mengembangkan layanan berbasis teknologi modern untuk mendukung pembelajaran sepanjang hayat.</li>
                <li class="sublist">Akses: Menjamin kemudahan akses terhadap koleksi dan informasi yang relevan untuk semua kalangan.</li>
                <li class="sublist">Kreatif: Mendorong inovasi dalam program dan layanan untuk memenuhi kebutuhan pengguna yang beragam.</li>
                <li class="sublist">Ragam: Menyediakan koleksi dan layanan yang mencerminkan keberagaman budaya, ilmu, dan minat masyarakat.</li>
                <li class="sublist">Apik: Memberikan pengalaman pengguna yang profesional, ramah, dan nyaman.</li>
                <li class="sublist">Wawasan: Membantu menciptakan komunitas pembelajar dengan mendukung peningkatan pengetahuan dan literasi informasi.</li>
                <li class="sublist">Abadi: Melestarikan koleksi berharga untuk generasi mendatang melalui pengelolaan yang berkelanjutan.</li>
                <li class="sublist">Luas dan Aktual: Memperbarui koleksi secara rutin untuk memastikan informasi yang tersedia selalu relevan dan up-to-date.</li>
            </ul>
        </section>
    </main>


</div>
   
    <?= $this->include('layouts/frontend/footerFront') ?>
<?= $this->endSection() ?>