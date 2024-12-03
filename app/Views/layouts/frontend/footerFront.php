 <?= $this->extend('layouts/home_layout') ?>

 
 <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Locations</h3>
                            <div class="map-container" style="width: 96%; height: 300px; overflow: hidden;">
                                <iframe 
                                    src="<?= esc($setting['maps']); ?>" 
                                    width="100%" 
                                    height="100%" 
                                    style="border:4px;" 
                                    allowfullscreen 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                            <div class="row">
                                <div class="">
                                    <ul>
                                    <p><?= esc($setting['alamattext']); ?></p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Quick Links</h3>
                            <ul>
                                <li><a href="<?= base_url('/aboutus'); ?>">About Us</a></li>
                                <li><a href="">How It's Works</a></li>
                                <li><a href="<?= base_url('/login'); ?>">Login</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-contact">
                            <h3>Contact</h3>
                            <ul>
                                <li>Tel. +(123) 1800-567-8990 <br> Mail.support@cakrawala.com</li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="content">
                                <ul class="footer-bottom-links">
                                    <li><a href="">Terms of use</a></li>
                                    <li><a href=""> Privacy Policy</a></li>
                                    <li><a href="">Advanced Search</a></li>
                                    <li><a href="">Site Map</a></li>
                                    <li><a href="">Information</a></li>
                                </ul>
                                <ul class="footer-social">
                                    <li><a href="https://www.facebook.com/groups/1178001026167846"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="https://x.com/"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="https://www.youtube.com/@dyvore"><i class="lni lni-youtube"></i></a></li>
                                </ul>
                                <div class="mt-3 text-center single-footer f-contact">
                                    <ul>
                                        <li><a>Made with and modifed by kelompok 7</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>
    <!--
    <a href="https://wa.me/62895379243712">
        <img src="uploads/logo/whatsapp.svg" alt="WhatsApp" style="width:70px; height:70px; position:fixed; bottom:20px; right:20px; z-index:100;" class="wabutton">
    </a> -->
    