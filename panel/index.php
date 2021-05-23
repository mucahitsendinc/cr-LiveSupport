<?php
session_start();
if ($_SESSION['supporterLogin'] != "on") {
  header("Location:login.php");
  die;
}
include 'header.php';
include 'footer.php';
?>




  