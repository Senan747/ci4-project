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
  <?php if (strpos(current_url(), 'follow') !== false || strpos(current_url(), 'user') !== false): ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/follow.css">
  <?php endif; ?>
  <meta name="theme-color" content="rgba(0, 0, 0, 0.4)">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Hd4Y3Qe8cUGzKvvnSODm8Z/EiA0yAY5OtkGpO5Y0kkRfA2+3YxhwYUyoySYBzXebHskhxFdul+Bb99fQSLf+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Toastify CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <!-- Toastify JS -->
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
      <ul>
        <li>Ana Səhifə</li>
        <li>Haqqımızda</li>
        <li>Gizliliyin qorunması</li>
        <li>Prosedurlar</li>
        <li>Əlaqə</li>
      </ul>
    </div>
  </div>
</body>
</html>
    