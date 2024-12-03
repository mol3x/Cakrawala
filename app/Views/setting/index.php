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
    <?php
      // Menentukan jenis alert berdasarkan pesan
      $alertClass = strpos(session()->getFlashdata('msg'), 'gagal') !== false ? 'alert-danger' : 'alert-info';
    ?>
    <div class="alert <?= $alertClass ?> alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('msg') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php endif; ?>

<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold">Edit Data Setting</h5>

    <?php if (isset($errors) && !empty($errors)): ?>
      <div style="color: red;">
        <ul>
          <?php foreach ($errors as $error): ?>
            <li><?= esc($error); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/setting/update/' . $setting['id']); ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>

      <div class="mb-3">
        <label for="logo" class="form-label">Logo (Upload):</label>
        <input type="file" id="logo" name="logo" class="form-control">
        <?php if (!empty($setting['logo'])): ?>
          <img src="<?= base_url('uploads/logo/' . $setting['logo']); ?>" alt="Logo" class="mt-2" style="max-width: 200px;">
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= esc($setting['nama']); ?>" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="maps" class="form-label">Maps:</label>
        <input type="text" id="maps" name="maps" value="<?= esc($setting['maps']); ?>" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="alamattext" class="form-label">Alamat Text:</label>
        <input type="text" id="alamattext" name="alamattext" value="<?= esc($setting['alamattext']); ?>" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
