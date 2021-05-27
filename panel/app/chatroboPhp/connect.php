<?php
include !isset($mysqlsunucu) ? 'config.php' : ''; 
require 'classes/BasicDB.php';
try {
    $db = new BasicDB($mysqlsunucu, $dbname, $mysqlkullanici, $mysqlsifre);
}
catch(PDOException $e)
{
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>