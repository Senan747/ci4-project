<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-card">
    <h2>Welcome Back 👋</h2>
    <p>Please enter your login details</p>
    <form id="loginForm">
      <div class="input-group">
        <label for="email">Username</label>
        <input type="text" id="email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" required>
      </div>
      <button type="submit">Sign In</button>
      <div id="message"></div>
    </form>
  </div>
  <script src="<?= base_url() ?>assets/js/admin-login.js"></script>
</body>
</html>