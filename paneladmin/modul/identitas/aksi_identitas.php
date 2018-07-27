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



// Update identitas
if ($act=='update'){
  $identitas_seo = seo_title($_POST['nama_identitas']);
  mysql_query("UPDATE identitas SET nama_website='$_POST[nama_website]',
									alamat_website = '$_POST[alamat_website]',
									meta_deskripsi = '$_POST[meta_deskripsi]',
									meta_keyword = '$_POST[meta_keyword]',
									telp = '$_POST[telp]',
									hp = '$_POST[hp]',
									fb = '$_POST[fb]',
									twitter = '$_POST[twitter]',
									bbm = '$_POST[bbm]',
									gplus = '$_POST[gplus]',
									email = '$_POST[email]'
									WHERE id_identitas = '$_POST[id_identitas]'");
  header('location:../../media.php?p=identitas');
}
}
?>
