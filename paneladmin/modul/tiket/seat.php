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
                        <h1>Data Ketersediaan Kursi Tiket</h1>  					
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                   <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='50%'>Nama tiket</th>
                                    <th width='20%'>Tanggal</th>
                                    <th width='20%'>Jam</th>
                                    <th width='10%'>Aksi</th>
                                                             
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM tiket, kategori WHERE tiket.id_kategori=kategori.id_kategori ORDER BY id_tiket ASC');
							while($r=mysql_fetch_array($tp)){
 $from=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$r[dari]'"));
 $to=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$r[ke]'"));
							$harga=format_rupiah($r[harga]);
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$from[nama_kota] - $to[nama_kota]</td>
                                    <td>$r[tgl_masuk]</td>
                                    <td>$r[pergi]</td>
                                    <td><a href='?p=kursi&id=$r[id_tiket]&kat=$r[id_kategori]'>Detail</a></td>
                                    
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
			}//penutup switch
}//penutup session
?>    
</body>
</html>