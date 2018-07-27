<?php
$server = "mysql.idhostinger.com";
$username = "u539252331_seatb";
$password = "prasetya177";
$database = "u539252331_seatb";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
