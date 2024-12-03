<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('headOpac') ?>
<title>Visi dan Misi</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    

    .visi-misi {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin: 20px 0;
    }

    .visi-misi .judul {
        font-size: 2rem;
        color: #0073e6;
        margin-bottom: 20px;
        border-left: 5px solid #0073e6;
        padding-left: 15px;
    }

    .visi-misi p {
        font-size: 1.2rem;
        margin-bottom: 30px;
        line-height: 1.8;
    }

    .visi-misi .List {
        list-style: none;
        padding-left: 0;
    }

    .visi-misi .List .sublist{
        font-size: 1.2rem;
        margin-bottom: 15px;
        position: relative;
        padding-left: 25px;
    }

    .visi-misi .List .sublist::before {
        content: '✔';
        position: absolute;
        left: 0;
        top: 0;
        font-size: 1rem;
        color: #0073e6;
        line-height: 1.5;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .visi-misi {
            padding: 20px;
        }

        .visi-misi .judul {
            font-size: 1.5rem;
        }

        .visi-misi p,
        .visi-misi .List .sublist{
            font-size: 1rem;
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
                        <h1 class="page-title">Visi dan Misi</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Home</a></li>
                        <li>Visi dan Misi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
     
<main class="section">
    <div class="container">
             <div class="visi-misi">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                                <div class="visi">
                                    <h2 class="judul">Visi</h2>
                                    <p>
                                        Menjadi pusat pengetahuan yang cerdas, inovatif, dan inklusif, dengan menyediakan akses informasi yang kreatif dan beragam untuk membangun wawasan yang abadi dan luas bagi masyarakat.
                                    </p>
                                </div>
                                <div class="misi">
                                    <h2 class="judul">Misi</h2>
                                    <ul class="List">
                                        <li class="sublist">Cerdas: Mengembangkan layanan berbasis teknologi modern untuk mendukung pembelajaran sepanjang hayat.</li>
                                        <li class="sublist">Akses: Menjamin kemudahan akses terhadap koleksi dan informasi yang relevan untuk semua kalangan.</li>
                                        <li class="sublist">Kreatif: Mendorong inovasi dalam program dan layanan untuk memenuhi kebutuhan pengguna yang beragam.</li>
                                        <li class="sublist">Ragam: Menyediakan koleksi dan layanan yang mencerminkan keberagaman budaya, ilmu, dan minat masyarakat.</li>
                                        <li class="sublist">Apik: Memberikan pengalaman pengguna yang profesional, ramah, dan nyaman.</li>
                                        <li class="sublist">Wawasan: Membantu menciptakan komunitas pembelajar dengan mendukung peningkatan pengetahuan dan literasi informasi.</li>
                                        <li class="sublist">Abadi: Melestarikan koleksi berharga untuk generasi mendatang melalui pengelolaan yang berkelanjutan.</li>
                                        <li class="sublist">Luas dan Aktual: Memperbarui koleksi secara rutin untuk memastikan informasi yang tersedia selalu relevan dan up-to-date.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

    </div>
               
     
   
</main>

<?= $this->include('layouts/frontend/footerFront') ?>
<?= $this->endSection() ?>