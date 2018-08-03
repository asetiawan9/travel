<?php
$aksi="modul/kursi/aksi_kursi.php";
$act=$_GET[act];
if ($act=='update-kursi'){
//hitung jumlah form yang dikirim
$jumlah = count($_POST['idk']);

	echo "<h1>Cetak semua form</h1>";
	
	for($i=0; $i<$jumlah; $i++){
	$urut	= $i+1;
	$idk	= $_POST['idk'][$i];
	$kursi	= $_POST['kursi'][$i];
	
	//jika mau dimasukkan ke databases, silahkan buat query anda disini
	mysql_query("UPDATE kursi SET nama_kursi ='$kursi' WHERE id_kursi = '$idk'");		
	
	
	}
	}
?>

<?php
echo "<div class='content'>
	   <div class='workplace'>
		
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Kursi Tiket</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>"; 
$show = mysql_query("SELECT * FROM tiket WHERE id_tiket='$_GET[id]'");
    $r    = mysql_fetch_array($show);
$from=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$r[dari]'"));
 $to=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$r[ke]'"));
echo"<center><h2>Tiket $from[nama_kota] - $to[nama_kota]</h2><br/>available seat : $r[stok] seat<br/><br/></center>";	
?>
    
	
	  <?php
if  ($_GET['kat']=='1')
{ include "modul/kursi/kursi1.php";}
else
if  ($_GET['kat']=='2')
{ include "modul/kursi/kursi2.php";}
else
if  ($_GET['kat']=='3')
{ include "modul/kursi/kursi3.php";}
else
if  ($_GET['kat']=='4')
{ include "modul/kursi/kursi4.php";}
else
if  ($_GET['kat']=='5')
{ include "modul/kursi/kursi5.php";}
else
if  ($_GET['kat']=='6')
{ include "modul/kursi/kursi6.php";}
else
if  ($_GET['kat']=='7')
{ include "modul/kursi/kursi7.php";}
else
if  ($_GET['kat']=='8')
{ include "modul/kursi/kursi8.php";}
else
if  ($_GET['kat']=='9')
{ include "modul/kursi/kursi9.php";}

?>
		<br/>
<h4>Keterangan Pemesan:</h4>
	<?php
	// tampilkan data Penumpang
   $penumpang=mysql_query("select * from kursi where id_tiket='$_GET[id]'");
    echo "<form method=post action='media.php?p=kursi&act=update-kursi&id=$_GET[id]&kat=$_GET[kat]'>
	<table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
        <tr>
			<th width='3%'><input type='checkbox' name='checkbox'/></th>
			<th>No Kursi</th>
			<th>No Orders</th>
			<th>Nama Penumpang</th>
			<th></th>
		</tr></thead>
                            <tbody>";
							
							
$totals=1;
for($i=0; $i<$totals; $i++){



							
$jumlah = mysql_num_rows($penumpang);
	// Apabila ditemukan tiket dalam kategori
		if ($jumlah > 0){		
while($p=mysql_fetch_array($penumpang)){


    echo "<tr><td><input type='checkbox' name='checkbox'/></td>
	<input type='hidden' name='idk[]' value='$p[id_kursi]'/>
	  <td><select name='kursi[]' id='s2_1' style='width: 100%;' onChange='this.form.submit()'>";
								  $tampil=mysql_query("SELECT * FROM nokursi ORDER BY id_nokursi");
								  if ($p[nama_kursi]==0){
									echo "<option value=0 selected>- Pilih kursi -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($p[nama_kursi]==$w[nama_kursi]){
									  echo "<option value=$w[nama_kursi] selected>$w[nama_kursi]</option>";
									}
									else{
									  echo "<option value=$w[nama_kursi]>$w[nama_kursi]</option>";
									}
								  }                                 
                       echo"</select></td>
			 
			 
			  <td><b><a href=?p=order&act=detailorder&id=$p[id_orders]>$p[id_orders]</a></b></td>
			  <td><b>$p[nama_penumpang]</b></td>
			  <td><a href='$aksi?act=hapus&id=$p[id_kursi]&kat=$p'>Hapus<a></td>
			
			  </tr>
			   ";	
		}
		}
  else{
    echo "<tr>
		  
		  <td></td>
		  <td>Belum ada yang pesan ditiket ini.</td>
		  <td></td>
		  <td></td>
		  <td></td>
		  </tr>";
  }
  }
		
	echo"</tbody></table></form";

	?>		
	 
                </div> 
				
				</div>            
                   
        </div>
		
    </div>
<br/>


    <div class='dr'><span></span></div> </div>


<?