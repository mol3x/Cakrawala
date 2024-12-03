<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('head') ?>
<title>Edit Duration</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin/loans'); ?>" class="btn btn-outline-primary mb-3">
    <i class="ti ti-arrow-left"></i> Back
</a>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Perpanjaang lama Peminjaman</h5>
      <form action="<?= base_url("admin/loans/update/{$loan['uid']}") ?>" method="post">
    <?= csrf_field() ?>
    <div class="col-5">
        <label class="form-label">Update Lama Peminjaman</label>
        <div class="my-2">
           
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="14days" name="duration" value="14" <?= ($loan['due_date'] === 14) ? 'checked' : ''; ?> required>
                <label class="form-check-label" for="14days">7 Hari</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="30days" name="duration" value="30" <?= ($loan['due_date'] === 30) ? 'checked' : ''; ?> required>
                <label class="form-check-label" for="30days">23 Hari</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>


    </div>
</div>

<?= $this->endSection() ?>
