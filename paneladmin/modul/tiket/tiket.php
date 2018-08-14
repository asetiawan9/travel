<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/tiket/aksi_tiket.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		 
		  <p align='right'><a href='?p=tiket&aksi=tambah' role='button' class='btn'>Input tiket Baru</a></p>
		  <p align='right'><a href='media.php?p=import' role='button' class='btn'>Import Excel>></a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data tiket</h1>  					
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Nama tiket</th>
                                    <th width='25%'>Tanggal</th>
                                    <th width='25%'>Jam</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM tiket,kategori WHERE tiket.id_kategori=kategori.id_kategori  ORDER BY id_tiket ASC');
							while($r=mysql_fetch_array($tp)){
 $from=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$r[dari]'"));
 $to=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$r[ke]'"));
							$harga=format_rupiah($r[harga]);
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$from[nama_kota] - $to[nama_kota]</td>
                                    <td>$r[tgl_masuk]</td>
                                    <td>$r[pergi]</td>
                                    <td><a href='?p=tiket&aksi=edit&id=$r[id_tiket]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_tiket]&namafile=$r[gambar]'>HAPUS</a>|
									    <a href='?p=kursi&id=$r[id_tiket]&kat=$r[id_kategori]'>AVAILABELITY</a></td>
                                    
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
	$edit = mysql_query("SELECT * FROM tiket WHERE id_tiket='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/tiket/aksi_tiket.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit tiket</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_tiket]>
                                        
                         <div class='span9'><input  type='hidden' name='kategori' value='1'></div>

						<div class='row-form clearfix'>
                            <div class='span3'>Ke</div>
                            <div class='span9'>
							<select name='ke' id='s2_1' style='width: 100%;'>";
								  $tampil=mysql_query("SELECT * FROM kota ORDER BY nama_kota");
								  if ($r[ke]==0){
									echo "<option value=0 selected>- Pilih Kota -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[ke]==$w[id_kota]){
									  echo "<option value=$w[id_kota] selected>$w[nama_kota]</option>";
									}
									else{
									  echo "<option value=$w[id_kota]>$w[nama_kota]</option>";
									}
								  }                                 
                       echo"</select>
							</div>
                        </div>
						
					 <div class='row-form clearfix'>
                            <div class='span3'>Tanggal</div>
                            <div class='span9'><input type='text' id='datepicker1' name='tgl_masuk'  value='$r[tgl_masuk]'/></div>
                    </div>
					
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Harga Dewasa</div>
                            <div class='span9'><input type='text' name='harga' value='$r[harga]'/></div>
                    </div>

                    <div class='row-form clearfix'>
                            <div class='span3'>Harga Anak</div>
                            <div class='span9'><input type='text' name='harga_mahasiswa' value='$r[harga_mahasiswa]'/></div>
                    </div>
					
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Disc.</div>
                            <div class='span9'><input type='text' name='diskon' value='$r[diskon]'/></div>
                    </div>
					
							
					 <div class='row-form clearfix'>
                            <div class='span3'>Stok</div>
                            <div class='span9'><input type='text' name='stok' value='$r[stok]'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>pergi</div>
                            <div class='span9'><input type='time' name='pergi' value='$r[pergi]'></div>
					</div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>tiba</div>
							<div class='span9'><input type='time' name='tiba' value='$r[tiba]'></div>
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
echo "<form method='post' action='modul/tiket/aksi_tiket.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input tiket Baru</h1>
                    </div>    
                      
						
						<div class='row-form clearfix'>
                            <div class='span3'>Tanggal</div>
                            <div class='span9'><input type='text' id='datepicker' name='tgl_masuk' required/></div>
                    </div>
						 
				
							<div class='span9'><input type='hidden' name='kategori' value='1'></div>
			
                       
						
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Dari</div>
                            <div class='span9'>
							<select name='dari' id='s2_2' style='width: 100%;'>
								  <option value=0 selected>- Pilih Dari -</option>";
										$tampil=mysql_query("SELECT * FROM kota ORDER BY nama_kota");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[id_kota]>$r[nama_kota]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
						
						<div class='row-form clearfix'>
                            <div class='span3'>Ke</div>
                            <div class='span9'>
							<select name='ke' id='s2_2' style='width: 100%;'>
								  <option value=0 selected>- Pilih Dari -</option>";
										$tampil=mysql_query("SELECT * FROM kota ORDER BY nama_kota");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[id_kota]>$r[nama_kota]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Harga Dewasa</div>
                            <div class='span9'><input type='text' name='harga' placeholder='misal : 75000' required/></div>
                    </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Harga Anak</div>
                            <div class='span9'><input type='text' name='harga_mahasiswa' placeholder='misal : 70000' required/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Diskon</div>
                            <div class='span9'><input type='text' name='diskon' placeholder='Isi diskon tanpa tanda %' required/></div>
                    </div>
					
					
							
					 <div class='row-form clearfix'>
                            <div class='span3'>Jumlah Kursi</div>
                            <div class='span9'><input type='text' name='stok' value='13' required/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>pergi</div>
                            <div class='span9'><input type='time' name='pergi' required></div>
                    </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>tiba</div>
                            <div class='span9'><input type='time' name='tiba' required></div>
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