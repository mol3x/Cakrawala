<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('head') ?>
<title>Detail Pengembalian</title>
<script>
  function printPage() {
    window.print();
  }
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
  .receipt {
    font-family: 'Courier New', Courier, monospace;
    padding: 10px;
    width: 300px;
    margin: 0 auto;
    border: 2px dashed #000;
    text-align: left;
    background: #f9f9f9;
    box-sizing: border-box;
  }

  .receipt h3 {
    margin: 0;
    text-align: center;
  }

  .receipt .line {
    border-bottom: 1px dashed #000;
    margin: 5px 0;
  }

  .receipt .info {
    margin-bottom: 10px;
  }

  .receipt .info h5 {
    margin: 5px 0;
  }

  .receipt .info b {
    font-size: 14px;
  }

  .receipt .info h5 {
    font-size: 12px;
  }

  .receipt .info .uid {
    font-size: 10px;
    font-weight: normal;
    text-align: center;
  }

  .qr-container {
    text-align: center;
  }

  .qr-container img {
    width: 100px;
    height: 100px;
    margin-top: 10px;
    text-align: center;
  }

  @media print {
    body * {
      visibility: hidden;
    }

    .receipt, .receipt * {
      visibility: visible;
    }

    .receipt {
      position: absolute;
      top: 10px;
      left: 10px;
      width: 300px;
    }

    .btn, .btn-outline-primary, .card, .row {
      display: none;
    }
  }
</style>

<?php
use CodeIgniter\I18n\Time;

$now = Time::now(locale: 'id');
$loanDate = Time::parse($loan['loan_date'], locale: 'id');
$dueDate = Time::parse($loan['due_date'], locale: 'id');
$returnDate = Time::parse($loan['return_date'], locale: 'id');

// Check for late return and calculate fine
$isLate = $now->isAfter($dueDate);
$fineAmount = 0;
$daysLate = 0;


$memberData = [
  'Nama Lengkap'  => $loan['first_name'] . ' ' . $loan['last_name'],
  'Nik'           => $loan['Nik'] == 0 ? 'N/A' : $loan['Nik'],
  'Email'         => $loan['email'],
  'Nomor Telepon' => $loan['phone'],
  'Alamat'        => $loan['address'],
];

$bookData = [
  'Judul Buku'    => $loan['title'],
  'Pengarang'     => $loan['author'],
  'Penerbit'      => $loan['publisher'],
  'Rak'           => $loan['rack']
];
?>

<div class="receipt">
  <h3>DETAIL PENGEMBALIAN</h3>
  <div class="line"></div>

  <!-- Member Information -->
  <div class="info">
    <h5><b>Nama:</b> <?= $loan['first_name'] . ' ' . $loan['last_name'] ?></h5>
    <h5><b>NIK:</b> <?= $loan['Nik'] == 0 ? 'N/A' : $loan['Nik'] ?></h5>
    <h5><b>Email:</b> <?= $loan['email'] ?></h5>
    <h5><b>Nomor Telepon:</b> <?= $loan['phone'] ?></h5>
    <h5><b>Alamat:</b> <?= $loan['address'] ?></h5>
  </div>

  <div class="line"></div>

  <!-- Book Information -->
  <div class="info">
    <h5><b>Judul Buku:</b> <?= $loan['title'] ?></h5>
    <h5><b>Pengarang:</b> <?= $loan['author'] ?></h5>
    <h5><b>Penerbit:</b> <?= $loan['publisher'] ?></h5>
    <h5><b>Rak:</b> <?= $loan['rack'] ?></h5>
  </div>

  <div class="line"></div>

  <!-- Loan Details -->
  <div class="info">
    <h5><b>Jumlah Buku Dipinjam:</b> <?= $loan['quantity'] ?></h5>
    <?php
        $isFined = $loan['loan_id'] != null;
        $isFinePaid =  $isFined ? ($loan['paid_at'] ? true : false) : true;
        ?>
     <h5>
          Terlambat : <?= $returnDate->isAfter($dueDate) ? abs($returnDate->difference($dueDate)->getDays()) . ' Hari' : '-'; ?>
        </h5>
        <h5>Total denda : Rp<?= $loan['fine_amount'] ?? 0; ?></h5>
        <h5>Telah dibayar : Rp<?= $loan['amount_paid'] ?? 0; ?></h5>
        <h5>Sisa bayar : Rp<?= $loan['fine_amount'] - $loan['amount_paid']; ?></h5>
    <h5 class="d-inline"><b>Status :</b> </h5>
        <?php if ($isFinePaid) : ?>
          <span class="badge bg-success rounded-3">
            <h5 class="fw-semibold mb-0"><?= $isFined ? 'Lunas' : 'Selesai'; ?></h5>
          </span>
        <?php else : ?>
          <span class="badge bg-danger rounded-3">
            <h5 class="fw-semibold mb-0">Menunggak</h5>
          </span>
        <?php endif; ?>
        <?php if ($isFined && !$isFinePaid) : ?>
          <a href="<?= base_url("admin/fines/pay/{$loan['uid']}"); ?>" class="btn btn-warning mt-3 w-100">
            Bayar denda
          </a>
        <?php endif; ?>
    <h5><b>Waktu Pinjam:</b> <b> <?= $loanDate->toLocalizedString('d MMMM y'); ?><br>
              <?= $loanDate->toLocalizedString('HH:mm:ss'); ?></h5>


    <h5><b>Tanggal Pengembalian:</b>
    
       <?= $returnDate->toLocalizedString('d MMMM y'); ?><br>
              <?= $loanDate->toLocalizedString('HH:mm:ss'); ?>
    
  </div>

  <div class="line"></div>

  <!-- QR Code -->
  <div class="qr-container">
    <h5><b>QR Code:</b></h5>
    <div style="text-align: center;" id="qr-code" class="m-auto">
      <img src="<?= base_url(LOANS_QR_CODE_URI . $loan['loan_qr_code']); ?>" alt="QR Code">
    </div>
  </div>

  <div class="line"></div>

  <!-- Loan UID -->
  <div class="info uid">
    <h5  style="text-align: center;"><b>UID:</b> <?= $loan['uid'] ?></h5>
  </div>

  <div class="line"></div>
  <div class="text-center">
    <button class="btn btn-primary" onclick="printPage()">Print Struk</button>
  </div>
</div>

<?= $this->endSection() ?>
