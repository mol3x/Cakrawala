<?= $this->extend('layouts/home_layout') ?>


<!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start navbar Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a style="width: 190px;" class="navbar-brand" href="<?= base_url('/'); ?>">
                                <?php if (!empty($setting['logo'])): ?>
                                    <img style="width: 190px;" src="<?= base_url('uploads/logo/' . $setting['logo']); ?>" alt="Logo" class="mt-2" style="max-width: 200px;">
                                <?php endif; ?>
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="<?= uri_string() === '' ? 'active' : ''; ?>" href="<?= base_url('/'); ?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?= uri_string() === 'news' ? 'active' : ''; ?>" href="<?= base_url('/news'); ?>">News</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu <?= in_array(uri_string(), ['visiMisi', 'sejarah', 'peraturandankebijakan', 'aboutus']) ? 'active' : ''; ?>" 
                                        href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-3">Profile</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <li class="nav-item"><a class="<?= uri_string() === 'visiMisi' ? 'active' : ''; ?>" href="<?= base_url('/visiMisi'); ?>">Visi & Misi</a></li>
                                            <li class="nav-item"><a class="<?= uri_string() === 'sejarah' ? 'active' : ''; ?>" href="<?= base_url('/sejarah'); ?>">Sejarah</a></li>
                                            <li class="nav-item"><a class="<?= uri_string() === 'peraturandankebijakan' ? 'active' : ''; ?>" href="<?= base_url('/peraturandankebijakan'); ?>">Peraturan & Kebijakan</a></li>
                                            <li class="nav-item"><a class="<?= uri_string() === 'aboutus' ? 'active' : ''; ?>" href="<?= base_url('/aboutus'); ?>">About Us</a></li>
                                            <li class="nav-item"><a class="<?= uri_string() === 'struktur' ? 'active' : ''; ?>" href="<?= base_url('/struktur'); ?>">Struktur Organisasi</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu <?= uri_string() === 'services' ? 'active' : ''; ?>" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-5">Services</a>
                                        <ul class="sub-menu collapse" id="submenu-1-5">
                                            <li class="nav-item"><a href="javascript:void(0)">Virtual Library</a></li>
                                            <li class="nav-item"><a href="javascript:void(0)">Layanan Referensi</a></li>
                                            <li class="nav-item"><a href="javascript:void(0)">Layanan Terbitan Berkala</a></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div> <!-- navbar collapse -->
                            <div class="login-button">
                                <ul>
                                    <li>
                                        <a target="_blank" href="https://www.tiktok.com/explore"><i class="fa-brands fa-tiktok"></i> Tiktok</a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://www.instagram.com/"><i class="lni lni-instagram"></i> Instagram</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="button header-button">
                                <a href="<?= base_url('login'); ?>" class="btn"><i class="lni lni-enter"></i> Login</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End navbar Area -->