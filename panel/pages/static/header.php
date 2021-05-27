<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Canlı Destek</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/image/livesupportLogo.png">
  <link href="assets/vendor/bootstrap/grid.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome/css/fontawesome-all.min.css" rel="stylesheet">
  <style>
    <?php echo directFile('assets/css/panel.css'); ?>
  </style>
  <style>
    <?php echo directFile('assets/css/widgets.css'); ?>
  </style>



</head>

<body>
  <nav>
    <div class="menu-container">
      <a class="menu-brand" href="http://dehasoft.com.tr"><img src="assets/image/livesupportLogo.png" alt="Dehasoft Logo"> </a>
      <div class="menu-button" id="menuButton" onclick="test()">
        <i class="fas fa-bars"></i>
      </div>
      <div class="menu-collepse" id="menuList">
        <ul>
          <li>
            <a <?php if ($_GET['sayfa'] == 'anasayfa' || $_GET['sayfa'] == '') {
                  echo 'class="active';
                } ?> href="<?php echo $url; ?>anasayfa"><i class="fas fa-home"></i> Ana Sayfa</a>
          </li>
          <li>
            <a <?php if ($_GET['sayfa'] == 'profil') {
                  echo 'class="active';
                } ?> href="<?php echo $url; ?>profil"><i class="fas fa-user"></i> Profil</a>
          </li>
          <li>
            <a <?php if ($_GET['sayfa'] == 'bildirim') {
                  echo 'class="active';
                } ?> href="<?php echo $url; ?>bildirim"><i class="fas fa-bell"></i> Bildirim</a>
          </li>
          <li>
            <a <?php if ($_GET['sayfa'] == 'canli') {
                  echo 'class="active';
                } ?> href="<?php echo $url; ?>canli"><i class="fas fa-signal"></i> Canlı</a>
          </li>
          <!-- YETKİLİ MENÜ -->
          <li>
            <a <?php if ($_GET['sayfa'] == 'siteizni') {
                  echo 'class="active';
                } ?> href="<?php echo $url; ?>siteizni"><i class="fas fa-server"></i> Site izin</a>
          </li>
          <li>
            <a <?php if ($_GET['sayfa'] == 'hesapyonetimi') {
                  echo 'class="active';
                } ?> href="<?php echo $url; ?>hesapyonetimi"><i class="fas fa-cogs"></i>Hesap yönetimi</a>
          </li>
          <!-- YETKİLİ MENÜ SON-->
          <li>
            <a <?php if ($_GET['sayfa'] == 'cevrimdisi') {
                  echo 'class="active';
                } ?> href="<?php echo $url; ?>cevrimdisi"><i class="fas fa-signal "></i><i class="fas fa-times"></i> Çevrim Dışı</a>
          </li>
          <li>
            <a <?php if ($_GET['sayfa'] == 'cikis') {
                  echo 'class="active';
                } ?> href="<?php echo $url; ?>cikis"><i class="fas fa-sign-out-alt"></i> Çıkış</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="fullscreen-menu-content">