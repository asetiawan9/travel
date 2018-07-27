<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/order/aksi_order.php";
switch($_GET[act]){
  // Tampil Order
  default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=tiket&aksi=tambah' role='button' class='btn'>Input tiket Baru</a></p>
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
                                    <th width='25%'>Nama Konsumen</th>
                                    <th width='25%'>Tgl. Order</th>
                                    <th width='25%'>Status</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";
       
    $tampil = mysql_query("SELECT * FROM orders ORDER BY id_orders DESC");
    $no=0;
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_order]);
     	  
      echo "<tr>";
		   $konsumen=mysql_query("select * from kustomer where id_orders='$r[id_orders]'");
		   $nama=mysql_fetch_array($konsumen);
           echo"<td><input type='checkbox' name='checkbox'/></td><td>$nama[nama_lengkap]</td>
				<td>$tanggal</td>
                
                <td>$r[status_order]</td>
		            <td><a href=?p=order&act=detailorder&id=$r[id_orders]><b>Baca</b></a> | 
		                <a href=$aksi?p=order&act=hapus&id=$r[id_orders]><b>Hapus</b></a></td></tr>";
      $no++;
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
  
    
  case "detailorder":
    $edit = mysql_query("SELECT * FROM orders WHERE id_orders='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
    $tanggal=tgl_indo($r[tgl_order]);

    $pilihan_status = array('Transfered','Batal','Baru');
    $pilihan_order = '';
    foreach ($pilihan_status as $status) {
	   $pilihan_order .= "<option value=$status";
	   if ($status == $r[status_order]) {
		    $pilihan_order .= " selected";
	   }
	   $pilihan_order .= ">$status</option>\r\n";
    }

    echo "
	<div class='content'>

        <div class='workplace'>
            
            <div class='row-fluid'>
                
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Order Detail</h1>      
                    </div>
                    <div class='block-fluid'>";

    echo "<form method=POST action=$aksi?p=order&act=update>
          <input type=hidden name=id value=$r[id_orders]>
          <table  cellpadding='0' cellspacing='0' width='100%' class='table'>
          <tr><td>No. Order</td>        <td> : $r[id_orders]</td></tr>
          <tr><td>Tanggal - Waktu Order</td> <td> : $tanggal - $r[jam_order]</td></tr>
          <tr><td>Status Order      </td><td>: <select name=status_order>$pilihan_order</select> 
          <input type=submit value='Ubah Status'></td></tr>
          </table></form>";

  // tampilkan rincian tiket yang di order
   
  echo "<table border=0 width=500  cellpadding='0' cellspacing='0' width='100%' class='table'>
        <tr><th>Tiket Dari - Ke</th><th>Jumlah</th><th>Harga Satuan</th><th>Sub Total</th></tr>";
  $sql2 = mysql_query("SELECT * FROM tiket WHERE id_tiket='$r[id_tiket]'");
  while($s=mysql_fetch_array($sql2)){
  // tampilkan data kustomer
  $customer=mysql_query("select * from kustomer where id_orders='$r[id_orders]'");	
  $c=mysql_fetch_array($customer);
  
 
  
     // rumus untuk menghitung subtotal dan total	
			$disc        = ($diskon/100)*$s[harga];
			$hargadisc   = number_format(($s[harga]-$disc),0,",",".");
			$subtotal    = ($s[harga]-$disc) * $r[jumlah];
			$total       =  $subtotal;  
			
			$totals       = $totals + $subtotal;
			
			$subtotal_all         = $total;
			$subtotal_rp    = format_rupiah($subtotal_all);
			$grandtotal_all    = $totals;
			$grandtotal_rp    = format_rupiah($grandtotal_all);
			$harga       = format_rupiah($s[harga]);
	
 $from=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$s[dari]'"));
 $to=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$s[ke]'"));
    echo "<tr><td>$from[nama_kota] - $to[nama_kota]</td>
			   <td>$r[jumlah]</td>
			  <td>Rp.$hargadisc</td>
			  <td>Rp.$total</td></tr>";
  }  

echo "<tr><td colspan=3 align=right>Total : </td><td>Rp. <b>$grandtotal_rp</b></td></tr>   
      <tr><td colspan=3 align=right>Grand Total : </td><td>Rp. <b>$grandtotal_rp</b></td></tr>
      </table>";

$a=mysql_fetch_array(mysql_query("select * from nationality where id_nationality ='$c[id_nationality]'"));
  $b=mysql_fetch_array(mysql_query("select * from nationality where id_nationality ='$c[country_issued]'"));  
  echo "<table border=0 width=500  cellpadding='0' cellspacing='0' width='100%' class='table'>
        <tr><th colspan=2>Identitas Pemesan</th></tr>
        <tr><td>Nama Pembeli</td><td> : $c[nama_lengkap]</td></tr>
        <tr><td>Alamat Pengiriman</td><td> : $c[alamat]</td></tr>
        <tr><td>No. Telpon/HP</td><td> : $c[telpon]</td></tr>
        <tr><td>Email</td><td> : $c[email]</td></tr>
        </table>";
    


// tampilkan data Penumpang
   $penumpang=mysql_query("select * from kursi where id_orders='$r[id_orders]'");
    echo "<table border=0 width=500  cellpadding='0' cellspacing='0' width='100%' class='table'>
        <tr><th>No Kursi</th>
			<th>Nama Penumpang</th>
			<th>Berangkat Dari</th>
		</tr>";
$jumlah = mysql_num_rows($penumpang);
	// Apabila ditemukan tiket dalam kategori
		if ($jumlah > 0){		
while($p=mysql_fetch_array($penumpang)){
    echo "<tr>
			  <td>$p[nama_kursi]</td>
			  <td>$p[nama_penumpang]</td>
			  <td>$p[naik]</td>
			
			  </tr>";	
		}
		}
  else{
    echo "<tr>
		  
		  <td colspan=4>Maaf tiket ini sudah dibatalkan.</td></tr>";
  }
	echo"</table>";
	
 }
}
?>
