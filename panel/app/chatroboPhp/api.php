<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 1000');
$poster= $_SERVER['HTTP_REFERER'];
//echo $poster;die;
if (isset($_POST['postToken']) ) { 
  //&& $_POST['postToken']=="testTokeni"
  include 'connect.php';
  $girisKontrol = $db->query("select count(*) from access_permissions where access_url='" . $poster . "' and permission='0'")->fetchColumn();
  if ($girisKontrol>0) {
    $data[0] = file_get_contents('../../assets/js/chatrobo.js');
    $data[1] = file_get_contents('../../assets/css/chatrobo.css');
    echo json_encode($data);
    die;
  }
  
}
echo $poster;
die;
