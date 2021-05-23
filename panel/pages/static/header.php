<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Canlı Destek</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/image/livesupportLogo.png">
  <link href="<?php echo $url; ?>assets/css/panel.css" rel="stylesheet">
  <link href="<?php echo $url; ?>assets/css/widgets.css" rel="stylesheet">
  <link href="<?php echo $url; ?>assets/vendor/fontawesome/css/fontawesome-all.min.css" rel="stylesheet">

</head>

<body>
  <nav>
    <div class="menu-container">
      <a class="menu-brand" href="http://dehasoft.com.tr"><img src="<?php echo $url; ?>assets/image/livesupportLogo.png" alt="Dehasoft Logo"> </a>
      <div class="menu-button" id="menuButton" onclick="test()">
        <i class="fas fa-bars"></i>
      </div>
      <div class="menu-collepse" id="menuList">
        <ul>
          <li>
            <a <?php if ($_GET['sayfa'] == 'anasayfa' || $_GET['sayfa'] == '') {
                  echo 'class="active';
                } ?> href="anasayfa"><i class="fas fa-home"></i> Ana Sayfa</a>
          </li>
          <li>
            <a <?php if ($_GET['sayfa'] == 'profil') {
                  echo 'class="active';
                } ?> href="profil"><i class="fas fa-user"></i> Profil</a>
          </li>
          <li>
            <a <?php if ($_GET['sayfa'] == 'bildirim') {
                  echo 'class="active';
                } ?> href="bildirim"><i class="fas fa-bell"></i> Bildirim</a>
          </li>
          <li>
            <a <?php if ($_GET['sayfa'] == 'canli') {
                  echo 'class="active';
                } ?> href="canli"><i class="fas fa-signal"></i> Canlı</a>
          </li>
          <!-- YETKİLİ MENÜ -->
          <li>
            <a <?php if ($_GET['sayfa'] == 'siteizni') {
                  echo 'class="active';
                } ?> href="siteizni"><i class="fas fa-server"></i> Site izin</a>
          </li>
          <li>
            <a <?php if ($_GET['sayfa'] == 'hesapyonetimi') {
                  echo 'class="active';
                } ?> href="hesapyonetimi"><i class="fas fa-cogs"></i>Hesap yönetimi</a>
          </li>
          <!-- YETKİLİ MENÜ SON-->
          <li>
            <a <?php if ($_GET['sayfa'] == 'cevrimdisi') {
                  echo 'class="active';
                } ?> href="cevrimdisi"><i class="fas fa-signal "></i><i class="fas fa-times"></i> Çevrim Dışı</a>
          </li>
          <li>
            <a <?php if ($_GET['sayfa'] == 'cikis') {
                  echo 'class="active';
                } ?> href="cikis"><i class="fas fa-sign-out-alt"></i> Çıkış</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>