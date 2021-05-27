<?php
  $_GET['sayfa'] = isset($_GET['sayfa']) ?  $_GET['sayfa'] : 'anasayfa' ;
  session_start();
  include 'app/chatroboPhp/config.php';
  include 'app/chatroboPhp/functions.php'; 
  login_check($_SESSION['supporterLogin']);
  require $pages.'static/header.php';

  if ($klasor = opendir($pages)) {
    while (false !== ($girdi = readdir($klasor))) {
      if ((str_replace(".php","", $girdi))== $_GET['sayfa']) {
        require $pages. $girdi;$dosyaSayisi++;
      }
    }
    closedir($klasor);
  }
  echo isset($dosyaSayisi) ? ''  : '<div class="full-screen-message"><h1>404 Sayfa Bulunamadı!</h1></div>'; 
  require $pages.'static/footer.php';


?>