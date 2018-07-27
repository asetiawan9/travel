<?php
include "../config/koneksi.php";

//hitung jumlah form yang dikirim
$jumlah = count($_POST['idk']);

	echo "<h1>Cetak semua form</h1>";
	
	for($i=0; $i<$jumlah; $i++){
	$urut	= $i+1;
	$idk	= $_POST['idk'][$i];
	$kursi	= $_POST['kursi'][$i];
	
	//jika mau dimasukkan ke databases, silahkan buat query anda disini
	mysql_query("UPDATE kursi SET nama_kursi ='$kursi' WHERE id_kursi = '$idk'");		
	
	echo"$urut <br/>
	     $idk<br/>
	     $kursi<br/>";
	
	}

?>