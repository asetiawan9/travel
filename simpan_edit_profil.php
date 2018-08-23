<?php

include_once 'config/koneksi.php';


if(isset($_POST['edit_profil']) && $_FILES['file']['size']>0)
{
 $id_members = mysql_real_escape_string($_POST['id_members']);
 $nama = mysql_real_escape_string($_POST['nama']);
 $telp = mysql_real_escape_string($_POST['telp']);
 $nim = mysql_real_escape_string($_POST['nim']);
 $kuliah = $_POST['kuliah'];
 $email = $_POST['email'];
 $password = md5(mysql_real_escape_string($_POST['password']));


 function GetImageExtension($imagetype)
		{
	       if(empty($imagetype)) return false;
	       switch($imagetype)
	       {
	           case 'image/bmp': return '.bmp';
	           case 'image/jpeg': return '.jpg';
	           case 'image/png': return '.png';
	           default: return false;
	       }
	     }

	if (!empty($_FILES["file"]["name"])) {

		$file_name=$_FILES["file"]["name"];
		$temp_name=$_FILES["file"]["tmp_name"];
		$imgtype=$_FILES["file"]["type"];
		$ext= GetImageExtension($imgtype);
		$imagename=date("d-m-Y")."-".time().$ext;
		$target_path = "kartu_mahasiswa/".$imagename;
		

		if(move_uploaded_file($temp_name, $target_path)) {
			$tgl = date("Y-m-d");

			mysql_query("UPDATE members SET id_members = '$id_members',  nama='$nama', telp='$telp', nim='$nim', universitas ='$kuliah', path_idcard='$target_path', email='$email', password='$password' WHERE id_members= '$id_members'");

			echo '<script>window.alert("Profil Berhasil Dirubah.")</script>';
			echo "<meta http-equiv='refresh' content='0; url=master.php?hal=edit-profil'>";
		
		}else{
			echo '<script>window.alert("Sorry! register gagal.")</script>';
			echo "<meta http-equiv='refresh' content='0; url=master.php?hal=edit-profil'>";
		} 

	}else{
			 $id_members = mysql_real_escape_string($_POST['id_members']);
			 $nama = $_POST['nama'];
			 $telp = mysql_real_escape_string($_POST['telp']);
			 $nim = mysql_real_escape_string($_POST['nim']);
			 $kuliah = $_POST['kuliah'];
			 $email = $_POST['email'];
			 $password = md5(mysql_real_escape_string($_POST['password']));

			mysql_query("UPDATE members SET id_members = '$id_members',  nama='$nama', telp='$telp', nim='$nim', universitas ='$kuliah', email='$email', password='$password' WHERE id_members= '$id_members'");

			echo '<script>window.alert("Muncullah blueeyes.")</script>';
			echo "<meta http-equiv='refresh' content='0; url=master.php?hal=edit-profil'>";
		}

	}
?>