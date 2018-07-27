<?php
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Destinasi
if ($act=='hapus'){
  mysql_query("DELETE FROM kota WHERE id_kota='$_GET[id]'");
  header('location:../../media.php?p=destinasi');
}

// Input Destinasi
elseif ($act=='input'){
  mysql_query("INSERT INTO kota(nama_kota,initial) VALUES('$_POST[nama_kota]','$_POST[initial]')");
  header('location:../../media.php?p=destinasi');
}

// Update Destinasi
elseif ($act=='update'){
  mysql_query("UPDATE kota SET nama_kota = '$_POST[nama_kota]', initial='$_POST[initial]' WHERE id_kota = '$_POST[id]'");
  header('location:../../media.php?p=destinasi');
}
?>
