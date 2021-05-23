<?php
$mysqlsunucu = "localhost";
$mysqlkullanici = "root";
$mysqlsifre = "";
$dbname = "livesupport";
require 'classes/BasicDB.php';
try {
    $db = new BasicDB($mysqlsunucu, $dbname, $mysqlkullanici, $mysqlsifre);
}
catch(PDOException $e)
{
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>