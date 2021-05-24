<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
session_start();

error_reporting(E_ERROR | E_PARSE);
include 'connect.php';
include 'functions.php';

if($_SESSION['supporterLogin']=="on"){
  
  echo 'success';
}else if (isset($_POST['login']) ) {
  //print_r($_POST);
  
  $username= securityPost($_POST['login']['username']);
  $password= (securityPost($_POST['login']['password']));
  $girisKontrol= $db->query("select count(*) from supporter where supporter_username='" . $username . "' and supporter_password='" .md5($password). "'")->fetchColumn();
  if (strlen($username)<4 || empty($username)) {
    # code...
    echo 'Kullanıcı adı boş veya çok kısa!';
  }else if (strlen($password)<4 || empty($password)) {
    echo 'Parola boş veya ço kısa!';
  } else if (strlen($username) > 25) {
    echo 'Kullanıcı adı çok uzun!';
  } else if (strlen($password) > 25 ) {
    echo 'Parola çok uzun!';
  }else if($girisKontrol<1){
    echo 'Kullanıcı adı veya parola hatalı!';
  }else{
    $_SESSION['supporterLogin']="on";
    $_SESSION['supporter_username'] = $username;
    echo 'success';
  }

}else{
  //header('Location:index.php');
}
?>