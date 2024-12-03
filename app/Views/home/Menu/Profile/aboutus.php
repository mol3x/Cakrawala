<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('headOpac') ?>
<title>About us</title>

<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('layouts/frontend/navbarFront') ?>

 <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">About us</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Home</a></li>
                        <li>About us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

     <!-- Start About Area -->
    <section class="about-us section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="content-left">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/jASsieYaU5s?si=bG0IlkUsfprhSfEJ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- content-1 start -->
                    <div class="content-right">
                        <!-- Heading -->
                        <span class="sub-heading">About</span>
                        <h2>
                           About Our Library</h2>
                        <p>Cakrawala adalah pusat pengetahuan dan informasi yang dirancang untuk mendukung pembelajaran, kreativitas, dan inovasi masyarakat. Dengan semangat “Cerdas, Akses, Kreatif, Ragam, Apik, Wawasan, Abadi, Luas, Aktual”, kami berkomitmen memberikan layanan terbaik untuk memenuhi kebutuhan literasi dan edukasi komunitas.</p>
                        <h3>What We Do</h3>
                        <p>Kami menyediakan berbagai koleksi, mulai dari buku fisik, e-book, hingga sumber informasi digital yang relevan dan berkualitas. Selain itu, kami menyelenggarakan program-program kreatif seperti diskusi, pelatihan, dan kegiatan literasi untuk memperkuat kemampuan belajar dan berbagi pengetahuan di komunitas. Tujuan kami adalah menjadi mitra yang terpercaya dalam perjalanan Anda menuju wawasan yang lebih luas dan mendalam.</p>
                        <!-- End Heading -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->

    <?= $this->include('layouts/frontend/footerFront') ?>
<?= $this->endSection() ?>