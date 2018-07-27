<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$act=$_GET[act];

// Hapus kustomer
if ($act=='hapus'){
  mysql_query("DELETE FROM kustomer WHERE id_kustomer='$_GET[id]'");
  mysql_query('DELETE FROM orders WHERE id_orders NOT IN (SELECT id_orders FROM kustomer)');
  mysql_query('DELETE FROM kursi WHERE id_orders NOT IN (SELECT id_orders FROM kustomer)');
  mysql_query('DELETE FROM konfirmasi WHERE id_orders NOT IN (SELECT id_orders FROM kustomer)');

  header('location:../../media.php?p=kustomer');
}

// Update kustomer
elseif ($act=='update'){
  mysql_query("UPDATE kustomer SET aktif='$_POST[aktif]',
								   level='$_POST[level]'  
							WHERE id_kustomer='$_POST[id]'");
  header('location:../../media.php?p=kustomer');
}
}
?>
