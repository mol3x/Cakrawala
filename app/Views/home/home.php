<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('headOpac') ?>
<title>Home</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/frontend/navbarFront') ?>
    <section class="hero-area overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="hero-text text-center">
                        <!-- Start Hero Text -->
                        <div class="section-heading">
                            <h2 class="">Welcome to <?= esc($setting['nama']); ?></h2>
                            <p class="">Perpustakaan Cerdas, Akses, Kreatif, Ragam, Apik,<br>Wawasan, Abadi, Luas Aktual.</p>
                        </div>
                        <!-- End Search Form -->
                        <!-- Start Search Form -->
                        <div class="search-form">
                          <form action="<?= base_url('book'); ?>" method="get">
                            <div class="row">
                                <div class="col-lg-7 col-md-4 col-12 p-0">
                                    <div class="search-input">
                                        <label for="keyword"><i class="lni lni-search-alt theme-color"></i></label>
                                         <input type="text" class="form-control" name="search" value="<?= $search ?? ''; ?>" placeholder="Cari buku" aria-label="Cari buku" aria-describedby="searchButton">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 p-0">
                                    <div class="search-input">
                                        <label for="category"><i class="lni lni-grid-alt theme-color"></i></label>
                                        <select class="form-select" name="category">
                                          <option value="all" <?= ($category ?? 'all') == 'all' ? 'selected' : '' ?>>Semua</option>
                                          <option value="title" <?= ($category ?? '') == 'title' ? 'selected' : '' ?>>Judul</option>
                                          <option value="author" <?= ($category ?? '') == 'author' ? 'selected' : '' ?>>Penulis</option>
                                          <option value="publisher" <?= ($category ?? '') == 'publisher' ? 'selected' : '' ?>>Penerbit</option>
                                          <option value="year" <?= ($category ?? '') == 'year' ? 'selected' : '' ?>>Tahun Terbit</option>
                                          <option value="category" <?= ($category ?? '') == 'category' ? 'selected' : '' ?>>Kategori</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12 p-0">
                                    <div class="search-btn button">
                                        
                                    <button class="btn" type="submit" id="searchButton"><i class="lni lni-search-alt"></i> Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- End Search Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Categories Area -->
    <section class="categories">
        <div class="container">
            <div style="box-shadow: 2px 2px 2px 1px grey;" class="cat-inner">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="category-slider">
                            <!-- Start Single Category -->
                            <a href="/book?category=category&search=fiksi" class="single-cat">
                                <div class="icon">
                                    <img width="48" height="48" src="https://img.icons8.com/color/48/upsilon-class-command-shuttle.png" alt="upsilon-class-command-shuttle"/>
                                </div>
                                <h3>Fiksi</h3>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="/book?category=category&search=Komputer" class="single-cat">
                                <div class="icon">
                                   <img width="48" height="48" src="https://img.icons8.com/color/48/kvm-switch.png" alt="kvm-switch"/>
                                </div>
                                <h3>Computer, Informasi & Referensi Umum</h3>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="/book?category=category&search=filsafat+dan+psikologi" class="single-cat">
                                <div class="icon">
                                    <img width="48" height="48" src="https://img.icons8.com/color/48/psychology.png" alt="psychology"/>
                                </div>
                                <h3>Filsafat & Psikologi</h3>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="/book?category=category&search=Agama" class="single-cat">
                                <div class="icon">
                                   <img width="48" height="48" src="https://img.icons8.com/color/48/ramadan.png" alt="ramadan"/>
                                </div>
                                <h3>Agama</h3>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="/book?category=category&search=Ilmu+sosial" class="single-cat">
                                <div class="icon">
                                   <img width="48" height="48" src="https://img.icons8.com/color/48/communication-skills.png" alt="communication-skills"/>
                                </div>
                                <h3>Ilmu Sosial</h3>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="/book?category=category&search=Bahasa" class="single-cat">
                                <div class="icon">
                                    <img width="48" height="48" src="https://img.icons8.com/color/48/language-skill.png" alt="language-skill"/>
                                </div>
                                <h3>Bahasa</h3>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="/book?category=category&search=Sains+dan+matematika" class="single-cat">
                                <div class="icon">
                                    <img width="48" height="48" src="https://img.icons8.com/color/48/chemistry-book.png" alt="chemistry-book"/>
                                </div>
                                <h3>Sains & Matematika</h3>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="/book?category=category&search=teknologi" class="single-cat">
                                <div class="icon">
                                    <img width="48" height="48" src="https://img.icons8.com/color/48/artificial-intelligence.png" alt="artificial-intelligence"/>
                                </div>
                                <h3>Teknologi</h3>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="/book?category=category&search=Kesenian+dan+rekreasi" class="single-cat">
                                <div class="icon">
                                    <img width="48" height="48" src="https://img.icons8.com/color/48/music-band.png" alt="music-band"/>
                                </div>
                                <h3>Kesenian dan rekreasi</h3>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="/book?category=category&search=Sastra" class="single-cat">
                                <div class="icon">
                                    <img width="48" height="48" src="https://img.icons8.com/color/48/literature--v1.png" alt="literature--v1"/>
                                </div>
                                <h3>Sastra</h3>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="/book?category=category&search=Sejarah+dan+geografi" class="single-cat">
                                <div class="icon">
                                    <img width="48" height="48" src="https://img.icons8.com/color/48/geography-book.png" alt="geography-book"/>
                                </div>
                                <h3>Sejarah dan geografi</h3>
                            </a>
                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Categories Area -->
    <div class="section"></div>
<?= $this->include('layouts/frontend/footerFront') ?>
<?= $this->endSection() ?>