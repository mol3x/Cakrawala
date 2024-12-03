<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('headOpac') ?>
<title>Sejarah</title>
<style>
    .struktur {
    color: white;
    text-align: center;
    padding: 1rem 0;
    }

    .struktur h1 {
        margin: 0;
        font-size: 2rem;
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
                        <h1 class="page-title">Struktur Organisasi</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Home</a></li>
                        <li>Struktur Organisasi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
     <div class="section">
        <div class="struktur">

            <h1>Struktur Organisasi Perpustakaan Cakrawala</h1>
            <div class="section text-center">
            <img src="uploads/struktur/struktur.png" width="1000px" alt="Struktur">
            </div>
        </div>

     </div>
 
   
    <?= $this->include('layouts/frontend/footerFront') ?>
<?= $this->endSection() ?>