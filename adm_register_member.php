<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['namalengkap']) AND empty($_SESSION['passuser']) AND empty($_SESSION['leveluser'])){
 header("Location: paneladmin/index.php");
}
include_once 'config/koneksi.php';

if(isset($_POST['register']) && $_FILES['file']['size']>0)
{
 $nama = mysql_real_escape_string($_POST['nama']);
 $telp = mysql_real_escape_string($_POST['telp']);
 $nim = mysql_real_escape_string($_POST['nim']);
 $kuliah = $_POST['kuliah'];
 $email = $_POST['email'];
 $password = md5(mysql_real_escape_string($_POST['password']));
 $status = $_POST['status'];

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

							mysql_query("INSERT INTO members(nama,telp,nim,universitas,path_idcard,email,password,status) VALUES('$nama','$telp','$nim','$kuliah','$target_path','$email','$password','$status')");

							echo '<script>window.alert("Registrasi member mahasiswa baru berhasil!")</script>';
    						echo "<meta http-equiv='refresh' content='0; url=paneladmin/media.php?p=member'>";

						
						}else{
							echo '<script>window.alert("Sorry! registrasi member gagal.")</script>';
    						echo "<meta http-equiv='refresh' content='0; url=paneladmin/media.php?p=member&aksi=tambah'>";
						} 

					}

}

?>