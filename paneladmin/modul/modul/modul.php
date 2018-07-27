<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/modul/aksi_modul.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=modul&aksi=tambah' role='button' class='btn'>Input modul Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data modul</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='20%'>nama_modul</th>
                                    <th width='20%'>Link</th>
									<th width='20%'>Status</th>
                                    <th width='20%'>No Urut</th>
                                    <th width='20%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$modul=mysql_query('SELECT * FROM modul ORDER BY id_modul ASC');
							while($r=mysql_fetch_array($modul)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama_modul]</td>
                                    <td><a href=$r[link]>$r[link]</a></td>
									<td>$r[aktif]</td>
                                    <td>$r[urutan]</td>
                                    <td><a href='?p=modul&aksi=edit&id=$r[id_modul]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_modul]&namafile=$r[gambar]'>HAPUS</td>
                                    
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
	$edit = mysql_query("SELECT * FROM modul WHERE id_modul='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/modul/aksi_modul.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit modul</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_modul]>
                      <div class='row-form clearfix'>
                            <div class='span3'>nama_modul</div>
                            <div class='span9'><input type='text' name='nama_modul' value='$r[nama_modul]'/></div>
                        </div>
						 
					 <div class='row-form clearfix'>
                            <div class='span3'>link</div>
                            <div class='span9'><input type='text' name='link'  value='$r[link]'/></div>
                    </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Urutan</div>
                            <div class='span9'><input type='text' name='urutan'  value='$r[urutan]'/></div>
                    </div>
					
					";
									
					 
					 if ($r[aktif]=='Y')
						{
					echo"<div class='row-form clearfix'>
                            <div class='span3'>Aktif</div>
                            <div class='span9'><input type='radio' name='aktif' value='Y' checked/>Aktif <input type='radio' name='aktif' value='N'/>Tidak Aktif
							
							</div>
                        </div>";
						}
						else
						{
						echo"<div class='row-form clearfix'>
                            <div class='span3'>Aktif</div>
                            <div class='span9'><input type='radio' name='aktif' value='Y'/>Aktif <input type='radio' name='aktif' value='N'  checked/>Tidak Aktif
							
							</div>
                        </div>";	
						}
						 
					
                   echo "</div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
break;

case "tambah":
echo "<form method='post' action='modul/modul/aksi_modul.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input modul Baru</h1>
                    </div>    
                      <div class='row-form clearfix'>
                            <div class='span3'>nama_modul</div>
                            <div class='span9'><input type='text' name='nama_modul'/></div>
                        </div>
						 
					 <div class='row-form clearfix'>
                            <div class='span3'>link</div>
                            <div class='span9'><input type='text' name='link'/></div>
                    </div>
					
				
					 <div class='row-form clearfix'>
                            <div class='span3'>Gambar</div>
                            <div class='span9'> <input type='file' name='fupload'>
							<br>
							*) Apabila gambar tidak diubah, dikosongkan saja.
							</div>
                    </div>
					
							
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
break;
			}//penutup switch
}//penutup session
?>    
</body>
</html>