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
  mysql_query("DELETE FROM members WHERE id_members='$_GET[id]'");
  header('location:../../media.php?p=member');
}
elseif ($act=='delNew-member'){
  mysql_query("DELETE FROM members WHERE id_members='$_GET[id]'");
  header('location:../../media.php?p=new-member');
}

// Update kustomer
elseif ($act=='update'){
  mysql_query("UPDATE members SET aktif='$_POST[aktif]',
								   level='$_POST[level]'  
							WHERE id_kustomer='$_POST[id]'");
  header('location:../../media.php?p=kustomer');
}
// Aktifasi Member
elseif ($act=='active'){
  mysql_query("UPDATE members SET status='active' WHERE id_members='$_GET[id]'");
  header('location:../../media.php?p=new-member');
}
}
?>
