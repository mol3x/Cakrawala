<!DOCTYPE html>
<html lang="en">

<head>
  <?= $this->include('layouts/frontend/headOpac') ?>

  <!-- Extra head e.g title -->
  <?= $this->renderSection('headOpac') ?>

  <link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
</head>

<body>

 
  
   <?= $this->renderSection('content') ?>
       
       

  <!-- Scripts -->
  <?= $this->include('imports/scripts/template') ?>

  <!-- Extra scripts -->
  <?= $this->renderSection('scripts') ?>
  
</body>

</html>