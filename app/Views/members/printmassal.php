<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('head') ?>
<title>Anggota</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('msg')) : ?>
  <div class="pb-2">
    <div class="alert <?= (session()->getFlashdata('error') ?? false) ? 'alert-danger' : 'alert-success'; ?> alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('msg') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php endif; ?>

<div class="card">
  <div class="card-body">
    <div class="row mb-2">
      <div class="col-12 col-lg-5">
        <h5 class="card-title fw-semibold mb-4">Data Anggota</h5>
      </div>
      <div class="col-12 col-lg-7">
        <div class="d-flex gap-2 justify-content-md-end">
          <div>
            <form action="" method="get">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" value="<?= $search ?? ''; ?>" placeholder="Cari anggota" aria-label="Cari anggota" aria-describedby="searchButton">
                <button class="btn btn-outline-secondary" type="submit" id="searchButton">Cari</button>
              </div>
            </form>
          </div>
          <div>
            <a href="<?= base_url('admin/members/new'); ?>" class="btn btn-primary py-2">
              <i class="ti ti-plus"></i>
              Tambah Anggota
            </a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Form untuk mencetak anggota yang dipilih -->
    <form action="<?= base_url('admin/members/printSelectedCards'); ?>" method="post" id="printForm">
      <div class="overflow-x-scroll">
        <table class="table table-hover table-striped">
          <thead class="table-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Select</th>
              <th scope="col">Nik</th>
              <th scope="col">Nama lengkap</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Alamat</th>
              <th scope="col">Jenis kelamin</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php $i = 1 + ($itemPerPage * ($currentPage - 1)) ?>
            <?php if (empty($members)) : ?>
              <tr>
                <td class="text-center" colspan="8"><b>Tidak ada data</b></td>
              </tr>
            <?php endif; ?>
            <?php foreach ($members as $key => $member) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td>
                  <input type="checkbox" name="selected_members[]" value="<?= $member['uid']; ?>">
                </td>
                <td> 
                  <a href="<?= base_url("admin/members/{$member['uid']}"); ?>" class="text-primary-emphasis ">
                  <?= $member['Nik'] == 0 ? 'N/A' : $member['Nik']; ?></a>
                </td>
                <td>
                  <a href="<?= base_url("admin/members/{$member['uid']}"); ?>" class="text-primary-emphasis ">
                    <b><?= $member['first_name'] . ' ' . $member['last_name']; ?></b>
                  </a>
                </td>
                <td><?= $member['email']; ?></td>
                <td><?= $member['phone']; ?></td>
                <td ><?= $member['address']; ?></td>
                <td><?= $member['gender']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-success">Print Selected</button>
      </div>
    </form>
  </div>
</div>


<?= $this->endSection() ?>