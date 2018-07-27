<?php
include "../config/koneksi.php";
  include "../config/fungsi_indotgl.php";
  include "../config/pagingtiket.php";
  include "../config/fungsi_combobox.php";
  include "../config/library.php";
  include "../config/fungsi_autolink.php";
  include "../config/fungsi_rupiah.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Transaksi</title>
<style type="text/css">
#logo {
 width: 300px;
 height: 200px;	
 float:left;
}
#judul {
 margin-left : 90px;
 width:900px;
 text-align:center;
}

</style>
</head>

<body>
<?php
$edit = mysql_query("SELECT * FROM logo");
    $r    = mysql_fetch_array($edit);
	echo"<div id='logo'></div>";
?>
<div id="judul">
<br />
<br />
<?php 
$tp=mysql_query("SELECT * FROM identitas");
$x    = mysql_fetch_array($tp);

echo"<font size='+3'>$x[nama_website]</font><br /> 
$x[alamat_website]<br />
Telp. $x[telp], Hp. $x[hp]<br />
Email : $x[email] Website : www.$x[nama_website]";
?>
<hr size="4" color="#000000" />    
    <h2>LAPORAN DAFTAR PEMBELIAN TIKET </h2>
</div>

<center>

	<?php
if($_POST['berdasar'] == "Semua Data"){
	//modus delete Semua Data
	$sql = "SELECT * FROM orders, tiket where orders.id_tiket=tiket.id_tiket";
}
else if ($_POST['berdasar'] == "Tanggal"){
	//modus tanggal
	$dari = $_POST['dari'];
	$ke = $_POST['ke'];
	$sql = "SELECT * FROM orders, tiket where orders.id_tiket=tiket.id_tiket and tgl_order >= '$dari' and tgl_order <= '$ke'";
	
	}
	else if($_POST['berdasar'] == "Pencarian Kata"){
	//modus berdasarkan kata
	$field = $_POST['field'];
	$kata = $_POST['kata'];
	
				
	$sql = "SELECT * FROM orders, tiket where orders.id_tiket=tiket.id_tiket  and $field like '%$kata%'";
						
  	
	} else if(empty($_POST['berdasar'])){
		  echo "<script>window.location = 'media.php?p=laptrans'</script>";
  	
	}
$query = mysql_query($sql);
?></center>




	<style type="text/css">                       
            @import "export/media/css/demo_table_jui.css";
            @import "export/media/themes/sunny/jquery-ui-1.8.4.custom.css";
            @import "export/extras/TableTools/media/css/TableTools.css";
        </style>      

        <script src="export/media/js/jquery.js"></script>
        <script src="export/media/js/jquery.dataTables.js"></script>
        <script src="export/extras/TableTools/media/js/ZeroClipboard.js"></script>
        <script src="export/extras/TableTools/media/js/TableTools.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
				    oTable = $('#contoh').dataTable({      
					     "bJQueryUI": true,
					     "sPaginationType": "full_numbers",
					     "sDom": 'T<"clear">lfrtip',
               "oTableTools": {
                  "sSwfPath": "export/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
              },
               "oLanguage": {
						      "sLengthMenu": "Tampilan _MENU_ data",
						      "sSearch": "Cari: ", 
						      "sZeroRecords": "Tidak ditemukan data yang sesuai",
						      "sInfo": "_START_ sampai _END_ dari _TOTAL_ data",
						      "sInfoEmpty": "0 hingga 0 dari 0 entri",
						      "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
						      "oPaginate": {
						          "sFirst": "Awal",
						          "sLast": "Akhir", 
						          "sPrevious": "Balik", 
						          "sNext": "Lanjut"
					       }
				      }
				    });
          })    
        </script>
    </head>
    <body>
           
                  







<center>
<table id="contoh" class="display">
                <thead>
                    <tr>
         <th width="2%" scope="col">No</th>
        <th width="11%" scope="col">Tgl order</th>
        <th width="10%" scope="col">No order</th>
        <th width="12%" scope="col">Kustomer</th>
        <th width="15%" scope="col"> Tiket </th>
       
        <th width="7%" scope="col">jumlah</th>
        <th width="12%" scope="col">harga	</th>
        <th width="12%" scope="col">Discount</th>
        <th width="12%" scope="col">Grand Total</th>
                    </tr>
                </thead>
                <tbody>
      <?php
			   $i=1;
			  while ($data = mysql_fetch_array($query)){

     // rumus untuk menghitung subtotal dan total	
			$disc        = ($data['diskon']/100)*$data['harga'];
			$hargadisc   = number_format(($data['harga']-$disc),0,",",".");
			$subtotal    = ($data['harga']-$disc) * $data['jumlah'];
			$total       =  $subtotal;  
			
			$totals       		= $total;
			
			$subtotal_all         = $total;
			$subtotal_rp   		 = $subtotal_all;
			$grandtotal_all    = $totals;
			$grandtotal_rp    = $grandtotal_all;

			$harga       = $data['harga'];
 $c=mysql_fetch_array(mysql_query("SELECT * FROM kustomer WHERE kustomer.id_orders='$data[id_orders]'"));	
 $from=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$data[dari]'"));
 $to=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$data[ke]'"));
			  
			  
			echo "<tr bgcolor=white>
              <td align=center>$i</td>
              <td align=center >$data[tgl_order]</td>
              <td align=center >$data[id_orders]</td>
              <td align=center >$c[nama_lengkap]</td>
              <td align=center >$from[nama_kota] - $to[nama_kota]</td>
              <td align=center >$data[jumlah]</td>
              <td align=center >$harga / orang</td>
              <td align=center >$data[diskon] %</td>
              
              <td align=left >Rp.$subtotal_rp</td>
			  </td>
            </tr>";
			$i++;
			}
			?>
     </tbody>
            </table></center>

	
			
			
	 <!---<center>
    	
		<br/>
        <form method="get" action="laporan_excel.php">
          <input name="tipeLaporan" type="hidden" id="tipeLaporan" value="report" />
          <input name="sql" type="hidden" id="sql" value="<--?php// echo $sql; ?>" />
         <input type="submit" name="button2" id="button2" value="Ekspor ke Ms. Excel" />
        </form>
	</center>---->
	
</body>
</html>

