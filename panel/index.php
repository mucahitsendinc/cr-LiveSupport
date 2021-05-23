<?php
session_start();
$url= 'http://localhost/dehasoft/livesupport/panel/';
if ($_SESSION['supporterLogin'] != "on") {
  header("Location:login.php");
  die;
}
require 'pages/static/header.php';
?>
<div class="fullscreen-menu-content">
<?php
switch ($_GET['sayfa']) {
  case '':
    require 'pages/anasayfa.php';
    break;
  case 'anasayfa':
    require 'pages/anasayfa.php';
    break;
  case 'profil':
    require 'pages/profil.php';
    break;
  case 'bildirim':
    require 'pages/bildirim.php';
    break;
  case 'canli':
    require 'pages/canli.php';
    break;
  case 'siteizni':
    require 'pages/siteizni.php';
    break;
  case 'hesapyonetimi':
    require 'pages/hesapyonetimi.php';
    break;
  case 'cevrimdisi':
    require 'pages/cevrimdisi.php';
    break;
  case 'cikis':
    session_start();
    session_unset();
    session_destroy();
    header('Location:login.php');
    break;
  default:
    echo '<div class="full-screen-message"><h1>404 Sayfa Bulunamadı!</h1></div>';
    break;
}
?>
</div>
<?php
require 'pages/static/footer.php';
?>