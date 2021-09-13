<?php 
require 'config/baglanti.php';
require 'pdo/config.php';
require 'config/islemler.php';
$islemler =new islemler();


$ayar = DB::getRow("SELECT * FROM ayarlar WHERE id=1");

?>