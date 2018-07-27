<?php
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$act=$_GET[act];

// Hapus modul
if ($act=='hapus'){
  mysql_query("DELETE FROM modul WHERE id_modul='$_GET[id]'");
  header('location:../../media.php?p=modul');
}

// Input modul
elseif ($act=='input'){
	// Cari angka urutan terakhir
  $u=mysql_query("SELECT urutan FROM modul ORDER by urutan DESC");
  $d=mysql_fetch_array($u);
  $urutan=$d[urutan]+1;
  
  // Apabila ada gambar yang diupload

    mysql_query("INSERT INTO modul(nama_modul,
                                    link,
                                    aktif,
                                    urutan) 
                            VALUES('$_POST[nama_modul]',
                                   '$_POST[link]',
                                   '$_POST[aktif]',
                                   '$urutan')");

  header('location:../../media.php?p=modul');
}

// Update modul
elseif ($act=='update'){
 
    mysql_query("UPDATE modul SET nama_modul  = '$_POST[nama_modul]',
                                   link       = '$_POST[link]',
								   urutan     = '$_POST[urutan]',  
								   aktif      = '$_POST[aktif]'
                             WHERE id_modul = '$_POST[id]'");

  header('location:../../media.php?p=modul');
}
?>
