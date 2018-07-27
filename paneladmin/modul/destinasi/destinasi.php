<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/destinasi/aksi_destinasi.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=destinasi&aksi=tambah' role='button' class='btn'>Input Destinasi Baru</a></p>
		  <p align='right'><a href='media.php?p=import-destinasi' role='button' class='btn'>Import Excel>></a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Destinasi</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='25%'>Nama Kota</th>
                                    <th width='25%'>Initial</th>
                                    <th width='25%'>Aksi</th>                                   
                                    <th width='25%'></th>                                   
                                    <th width='25%'></th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							  $tampil=mysql_query("SELECT * FROM kota ORDER BY id_kota DESC");
							  while ($r=mysql_fetch_array($tampil)){
 
                              echo"<tr>";
                              echo "<td>$r[nama_kota]</td>
                                    <td>$r[initial]</td>
                                    
                                    <td><a href='?p=destinasi&aksi=edit&id=$r[id_kota]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_kota]'>HAPUS</td>
                                    <td></td>
                                    <td></td>
                                </tr>";
							}
                               
                                        
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";    

break;
case "edit":
	$edit = mysql_query("SELECT * FROM kota WHERE id_kota='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/destinasi/aksi_destinasi.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit Destinasi</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_kota]>
                       <div class='row-form clearfix'>
                            <div class='span3'>Nama Kota</div>
                            <div class='span9'><input type='text' name='nama_kota' value='$r[nama_kota]'/></div>
                        </div>
						
						
						
						 <div class='row-form clearfix'>
                            <div class='span3'>INITIALS</div>
                            <div class='span9'><input type='text' name='initial' value='$r[initial]'/></div>
                        </div>
						
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
echo "";
break;

case "tambah":
echo "<form method='post' action='modul/destinasi/aksi_destinasi.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input kategori Baru</h1>
                    </div>    
                      <div class='row-form clearfix'>
                           <div class='span3'>Nama Kota</div>
                            <div class='span9'><input type='text' name='nama_kota'/></div>
                        </div>
						
						
						
						 <div class='row-form clearfix'>
                            <div class='span3'>INITIAL</div>
                            <div class='span9'><input type='text' name='initial'/></div>
                        </div> 
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
echo "";
break;
			}//penutup switch
}//penutup session
?>    
</body>
</html>