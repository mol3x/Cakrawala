<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('headOpac') ?>
<title><?= lang('Auth.register') ?></title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>z

<section class="hero-area overlay d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="hero-text">
                    <div class="search-form wow fadeInUp" data-wow-delay=".7s">
                        <h3 style="color: white;" class="card-title mb-5 pb-3"><?= lang('Auth.register') ?></h5>
                        <?php if (session('error') !== null) : ?>
                            <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                        <?php elseif (session('errors') !== null) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php if (is_array(session('errors'))) : ?>
                                    <?php foreach (session('errors') as $error) : ?>
                                        <?= $error ?><br>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <?= session('errors') ?>
                                <?php endif ?>
                            </div>
                        <?php endif ?>

                        <form action="<?= base_url('admin/users') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="search-input">
                                        <input type="email" class="form-control" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required />
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="search-input">
                                        <input type="text" class="form-control" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required />
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="search-input">
                                        <input type="password" class="form-control" name="password" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required />
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="search-input">
                                        <input type="password" class="form-control" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" required />
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="search-btn button">
                                        <button type="submit" class="btn">
                                            <i class="lni lni-user"></i><i><?= lang('Auth.register') ?></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                            <p class="text-center mt-3"><?= lang('Auth.forgotPassword') ?> <a href="<?= url_to('magic-link') ?>"><?= lang('Auth.useMagicLink') ?></a></p>
                        <?php endif ?>

                        <p class="text-center mt-2"><?= lang('Auth.haveAccount') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.login') ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection() ?>