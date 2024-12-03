<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('head') ?>
<title>Edit Setting</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin/settings'); ?>" class="btn btn-outline-primary mb-3">
  <i class="ti ti-arrow-left"></i>
  Kembali
</a>

<?php if (session()->getFlashdata('msg')) : ?>
  <div class="pb-2">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('msg') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php endif; ?>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold">Edit Setting</h5>
    <form action="<?= base_url('admin/settings/update/' . $setting['id']); ?>" method="post">
      <?= csrf_field(); ?>
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="my-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="text" class="form-control <?php if ($validation->hasError('logo')) : ?>is-invalid<?php endif ?>" id="logo" name="logo" value="<?= $setting['logo'] ?? ''; ?>" required>
            <div class="invalid-feedback">
              <?= $validation->getError('logo'); ?>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="my-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control <?php if ($validation->hasError('nama')) : ?>is-invalid<?php endif ?>" id="nama" name="nama" value="<?= $setting['nama'] ?? ''; ?>" required>
            <div class="invalid-feedback">
              <?= $validation->getError('nama'); ?>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="my-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control <?php if ($validation->hasError('alamat')) : ?>is-invalid<?php endif ?>" id="alamat" name="alamat" value="<?= $setting['alamat'] ?? ''; ?>" required>
            <div class="invalid-feedback">
              <?= $validation->getError('alamat'); ?>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
<?= $this->endSection() ?>