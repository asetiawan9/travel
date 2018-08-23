<?php
session_start();
// if(isset($_SESSION['mahasiswa'])!="")
// {
//  header("Location: master.php?hal=home");
// }
include_once 'config/koneksi.php';

if(isset($_POST['register']) && $_FILES['file']['size']>0)
{
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

							mysql_query("INSERT INTO members(nama,telp,nim,universitas,path_idcard,email,password) VALUES('$nama','$telp','$nim','$kuliah','$target_path','$email','$password')");

							echo '<script>window.alert("Register Berhasil..! Dimohon menunggu 24/1, akun sedang dalam proses verifikasi.")</script>';
    						echo "<meta http-equiv='refresh' content='0; url=login.php'>";

						
						}else{
							echo '<script>window.alert("Sorry! register gagal.")</script>';
    						echo "<meta http-equiv='refresh' content='0; url=register.php'>";
						} 

					}

}

?>