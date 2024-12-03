<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('headOpac') ?>
<title><?= lang('Auth.login') ?></title>
<?= $this->endSection() ?>

<?= $this->section('back') ?>
<a href="<?= base_url(); ?>" class="btn btn-outline-primary m-3 position-absolute">
  <i class="ti ti-arrow-left"></i>
  Kembali
</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="hero-area overlay d-flex justify-content-center align-items-center vh-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
        <div class="hero-text">
          <div class="search-form wow fadeInUp" data-wow-delay=".7s">
            <h3 style="color: white;" class="card-title mb-5 pb-3"><?= lang('Auth.login') ?></h3>
            <?php if (session('error')) : ?>
              <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
            <?php elseif (session('errors')) : ?>
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

            <?php if (session('message')) : ?>
              <div class="alert alert-success" role="alert"><?= session('message') ?></div>
            <?php endif ?>

            <form action="<?= url_to('login') ?>" method="post">
              <?= csrf_field() ?>
              <div class="row">
                <div class="col-12 mb-3">
                  <div class="search-input">
                    <input type="email" class="form-control" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required />
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div class="search-input">
                    <input type="password" class="form-control" name="password" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required />
                  </div>
                </div>
                <?php if (setting('Auth.sessionConfig')['allowRemembering']) : ?>
                  <div class="col-12 mb-5">
                    <div class="form-check">
                      <label class="form-check-label text-white">
                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked<?php endif ?>>
                        <?= lang('Auth.rememberMe') ?>
                      </label>
                    </div>
                  </div>
                <?php endif ?>
                <div class="col-12">
                  <div class="search-btn button">
                    <button type="submit" class="btn btn-primary w-100">
                      <i class="lni lni-enter"></i> <?= lang('Auth.login') ?>
                    </button>
                  </div>
                </div>
              </div>
            </form>

            <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
              <p class="text-center mt-3 text-white"><?= lang('Auth.forgotPassword') ?> <a href="<?= url_to('magic-link') ?>"><?= lang('Auth.useMagicLink') ?></a></p>
            <?php endif ?>

            <?php if (setting('Auth.allowRegistration')) : ?>
              <p class="text-center mt-2 text-white"><?= lang('Auth.needAccount') ?> <a href="<?= url_to('register') ?>"><?= lang('Auth.register') ?></a></p>
            <?php endif ?>
            <div class="text-center mt-4">
              <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>
