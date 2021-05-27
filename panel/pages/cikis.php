<?php
echo defined("disposable") ? '' : die('Bu sayfaya erişim için yetkiniz bulunmuyor.');

session_unset();
session_destroy();
header('Location:login.php');

?>