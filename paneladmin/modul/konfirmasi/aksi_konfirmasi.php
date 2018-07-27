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
$id_konfirmasi=$_GET[id];

// Hapus konfirmasi
if ($act=='hapus'){
  mysql_query("DELETE FROM konfirmasi WHERE id_konfirmasi='$_GET[id]'");
  header('location:../../media.php?p=konfirmasi');
}

// Update konfirmasi
elseif ($act=='update'){
  mysql_query("UPDATE konfirmasi SET aktif='$_POST[pesan]' WHERE id_konfirmasi='$_POST[id]'");
  header('location:../../media.php?p=konfirmasi');
}

// Update konfirmasi
elseif ($act=='konfirmasi'){
	$kon = mysql_query("SELECT * FROM konfirmasi WHERE id_konfirmasi='$id_konfirmasi'");
	$gkon=mysql_fetch_array($kon);
  mysql_query("UPDATE orders SET status_order='Transfered' WHERE id_orders='$gkon[id_orders]'");
  mysql_query("UPDATE konfirmasi SET status_konfirmasi='verified' WHERE id_konfirmasi='$id_konfirmasi'");
  header('location:../../media.php?p=konfirmasi');
}
}
?>
