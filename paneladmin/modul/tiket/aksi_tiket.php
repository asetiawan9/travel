<?php
session_start();

include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$p=$_GET[p];
$act=$_GET[act];

// Hapus tiket
if ($act=='hapus'){
  
     mysql_query("DELETE FROM tiket WHERE id_tiket='$_GET[id]'");
 
  header('location:../../media.php?p=tiket');
}

// Input tiket
elseif ($act=='input'){

  $tiket_seo      = seo_title($_POST[nama_tiket]);
  // Apabila ada gambar yang diupload
    mysql_query("INSERT INTO tiket(dari,
									ke,
                                    harga,
                                    harga_mahasiswa,
                                    diskon,
                                    stok,
									tiba,
                                    pergi,
                                    tgl_masuk,
									id_kategori) 
                            VALUES('$_POST[dari]',
                                   '$_POST[ke]',
                                   '$_POST[harga]',
                                   '$_POST[harga_mahasiswa]',
                                   '$_POST[diskon]',
                                   '$_POST[stok]',
								   '$_POST[tiba]',
                                   '$_POST[pergi]',
                                   '$_POST[tgl_masuk]',
								   '$_POST[kategori]')");
  header('location:../../media.php?p=tiket');
  }
  


// Update tiket
elseif ($act=='update'){
  $tiket_seo      = seo_title($_POST[nama_tiket]);
            mysql_query("UPDATE tiket SET dari = '$_POST[dari]',
								            ke = '$_POST[ke]',
								   tgl_masuk   = '$_POST[tgl_masuk]',
                                   harga       = '$_POST[harga]',
                                   harga_mahasiswa       = '$_POST[harga_mahasiswa]',
                                   diskon      = '$_POST[diskon]',
                                   stok        = '$_POST[stok]',
								   tiba      = '$_POST[tiba]',
									pergi   = '$_POST[pergi]',
							  id_kategori   = '$_POST[kategori]'
                             WHERE id_tiket   = '$_POST[id]'");
  header('location:../../media.php?p=tiket');
 
  }


?>
