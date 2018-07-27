<?php
error_reporting(0);
//koneksi ke database, username,password  dan namadatabase menyesuaikan 
include "../config/koneksi.php";
 
//memanggil file excel_reader
require "excel_reader.php";
 
//jika tombol import ditekan
if(isset($_POST['submit'])){
 
    $target = basename($_FILES['filekotaall']['name']) ;
    move_uploaded_file($_FILES['filekotaall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filekotaall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    jika kosongkan data dicentang jalankan kode berikut
    if($_POST['drop']==1){
//             kosongkan tabel kota
             $truncate ="TRUNCATE TABLE kota";
             mysql_query($truncate);
    };
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $nama_kota = $data->val($i, 1);
      $initial   = $data->val($i, 2);
 
//      setelah data dibaca, masukkan ke tabel kota sql
      $query = "INSERT into kota (nama_kota,initial)values('$nama_kota','$initial')";
      $hasil = mysql_query($query);
    }
    
    if(!$hasil){
//          jika import gagal
          die(mysql_error());
      }else{
//         jika impor berhasil
           echo "<script>window.alert('Import Data Berhasil')</script>";
		  echo "<meta http-equiv='refresh' content='0; url=media.php?p=destinasi'>";
    }
    
}
 
?>
 <div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data kota</h1>  					
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
	<br/>				
<form name="myForm" id="myForm" onSubmit="return validateForm()" action="import-destinasi.php" method="post" enctype="multipart/form-data">
    <input type="file" id="filekotaall" name="filekotaall" />
    <input type="submit" name="submit" value="Import" /><br/>
    <label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label>
</form>
<br/>	
 </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>
	
<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filekotaall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>