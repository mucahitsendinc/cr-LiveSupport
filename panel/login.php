<?php
session_start();
if ($_SESSION['supporterLogin'] == "on") {
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Canlı Destek Giriş</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/image/livesupportLogo.png">
  <style>
    <?php echo file_get_contents('assets/css/panel.css'); ?>
  </style>
  <style>
    <?php echo file_get_contents('assets/css/panellogin.css'); ?>
  </style>
</head>

<body>

  <div id="login">
    <div class="login-content">
      <h1 style="margin:20px"></h1>
      <div>
        <a href="https://www.dehasoft.com.tr/" target="_BLANK">
          <img src="assets/image/dehasoft.png" alt="Logo">
        </a>
      </div>
      <div>
        <form id="loginForm">
          <label for="">Kullanıcı Adı :</label>
          <input type="text" name="username" id="username" placeholder="Kullanıcı Adı">
          <label for="">Parola :</label>
          <input type="password" name="password" id="password" placeholder="Şifre">
          <div id="login-error"></div>
          <button>Giriş Yap</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    <?php echo file_get_contents('assets/js/jquery.min.js'); ?>
  </script>
  <script>
    <?php echo file_get_contents('assets/js/panel-login.js'); ?>
  </script>
  <script>
    <?php echo file_get_contents('assets/js/loading.js'); ?>
  </script>
</body>

</html>