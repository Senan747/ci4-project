<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= base_url() ?>assets/images/mini-logo.svg" type="image/svg">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/general.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/header.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/home.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/complaint.css">
  <?php if (strpos(current_url(), 'register') !== false): ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/complete.css">
  <?php endif; ?>
  <?php if (strpos(current_url(), 'admin') !== false || strpos(current_url(), 'user') !== false): ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/admin.css">
  <?php endif; ?>
  <?php if (strpos(current_url(), 'follow') !== false || strpos(current_url(), 'user') !== false): ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/follow.css">
  <?php endif; ?>
  <meta name="theme-color" content="rgba(0, 0, 0, 0.4)">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Hd4Y3Qe8cUGzKvvnSODm8Z/EiA0yAY5OtkGpO5Y0kkRfA2+3YxhwYUyoySYBzXebHskhxFdul+Bb99fQSLf+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  <title>ReportPoint Customs</title>
</head>
<body>
  <div class="header">
    <div class="logo-container">
      <a href="<?= base_url() ?>">
        <img src="<?= base_url() ?>assets/images/header-logo.svg" alt="header-logo">
      </a>
      
    </div>
    <div>
      <?php if (strpos(current_url(), 'user/complaint')): ?>
        <ul>
          <li><a href="<?= base_url('logout') ?>">Çıxış et</a></li>
        </ul>

      <?php elseif (!strpos(current_url(), 'admin')): ?>
        <ul>
          <li><a href="<?= base_url() ?>">Ana Səhifə</a></li>
          <li>Haqqımızda</li>
          <li>Gizliliyin qorunması</li>
          <li>Prosedurlar</li>
          <li>Əlaqə</li>
        </ul>

      <?php else: ?>
        <ul>
          <li><a href="<?= base_url('admin/complaints') ?>">Şikayətlər</a></li>
          <li>Statistikalar</li>
          <li><a href="<?= base_url('admin/logout') ?>">Çıxış et</a></li>
        </ul>
      <?php endif; ?>
    </div>
    <div class="hamburger" onclick="toggleMenu()">
      <img src="<?= base_url() ?>assets/images/image.png" alt="">
    </div>

<div class="mobile-menu" id="mobileMenu">
  <?php if (strpos(current_url(), 'user/complaint')): ?>
    <a href="<?= base_url('logout') ?>">Çıxış et</a>
  <?php elseif (!strpos(current_url(), 'admin')): ?>
    <a href="<?= base_url() ?>">Ana Səhifə</a>
    <a href="#">Haqqımızda</a>
    <a href="#">Gizliliyin qorunması</a>
    <a href="#">Prosedurlar</a>
    <a href="#">Əlaqə</a>
  <?php else: ?>
    <a href="<?= base_url('admin/complaints') ?>">Şikayətlər</a>
    <a href="#">Statistikalar</a>
    <a href="<?= base_url('admin/logout') ?>">Çıxış et</a>
  <?php endif; ?>
</div>
  </div>

    