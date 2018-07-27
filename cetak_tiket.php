<?php 
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  include "config/pagingtiket.php";
  include "config/fungsi_combobox.php";
  include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
  include "hapus_orderfiktif.php";
  ?>


<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Penjualan Tiket Online Bus ">
    <meta name="keywords" content="Penjualan Tiket Online Bus ">
    <meta name="author" content="rsabyl.net - vi-mark media">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" href="foto_logo/favicon.png">

    <title>AyaTravel Print Ticket</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
	 <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
	
    <link href="assets/css/tabel.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="assets/datepicker.css">
    <script src="assets/js/analytics.js" async=""></script>
	<script crossorigin="*" charset="UTF-8" src="assets/js/default.js" async=""></script>
	<script src="assets/js/terbaru.js"></script>
    <script src="assets/js/tabel.js"></script>
    <script src="assets/js/plug.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    
    <script type="text/javascript" src="assets/js/nominal.js"></script>
	
	<!-- START DATE PICKER STYLES-->
	<link rel="stylesheet" href="assets/picker/development-bundle/themes/ui-lightness/jquery.ui.all.css">
	<script src="assets/picker/jquery-1.7.1.js"></script>
	<script src="assets/picker/jquery.ui.core.js"></script>
	<script src="assets/picker/jquery.ui.datepicker.js"></script>

	<style type="text/css">
		body{
			font-family:"Courier New", Courier, monospace;
		}
		table{
			font-size:12px;
		}
/*.tr{
	border : 1px solid black;
	border-spacing : 1px;
	font-size:14px;
}*/
</style>

	</head>

	<body onLoad="window.print() ">
		<?php
			$kd_pesan = $_POST['kd_tiket'];

			$penumpang=mysql_query("SELECT * FROM kursi WHERE id_orders = '$kd_pesan'");
			$jmlp=mysql_num_rows($penumpang);

//				$cetak = mysql_query("SELECT * FROM kursi, tiket, kota WHERE kursi.id_tiket = tiket.id_tiket AND tiket.dari = kota.id_kota AND id_orders = '$kd_pesan'");
//			 $c=mysql_fetch_array($cetak);





		?>
		<!--KOP-->
		<center>
		    <h4>
		        <b>
		            Aya Travel<br>
		            JL. Taman Sari, No. 25, Bandung<br>
		        </b>
		    </h4>
		    <h5>
		        <b>
		            <span class="glyphicon glyphicon-phone-alt"></span>&nbsp;(0822) 1891 9191 - <span class="glyphicon glyphicon-earphone"></span>&nbsp;+62 859 6661 6838
		        </b>
		    </h5>
		    <hr width="50%" style=" border-color:black;">
		    <h2>&raquo; Rincian Pemesanan Tiket! &laquo;</h2>
		</center>
		<div class="container suwunbox-wrapper">
		    <div class="col-md-12 suwunbox">
		        <div class="col-md-12">
	            <legend>
	                Informasi Keberangkatan
	                <font size="2" style="float:right;"><?php echo $kd_pesan; ?></font>
	            </legend>
	            <table class="table table-bordered table-condensed table-responsive table-hover">
	                <thead>
	                    <th>Nama </th>
	                    <th>Kursi</th>
	                    <th>Trayek</th>
	                    <th>Pergi - Tiba</th>
	                    <th>Berangkat</th>
	                </thead>
	                <tbody>
	                <?php 
	                	$no=1;
	                	while ($no <= $jmlp) {
	                		$p=mysql_fetch_array($penumpang);
			$sql2 = mysql_query("SELECT * FROM tiket WHERE id_tiket='$p[id_tiket]'");
			$s=mysql_fetch_array($sql2);

			$from=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$s[dari]'"));
			$to=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$s[ke]'"));
	                ?>
	                	<tr>
	                		<td><?php echo $p['nama_penumpang']; ?></td>
	                		<td><?php echo $p['nama_kursi']; ?></td>
	                		<td><?php echo $from['nama_kota']." - ".$to['nama_kota']; ?></td>
	                		<td><?php echo $s['pergi']." - ".$s['tiba']." WIB"; ?></td>
	                		<td><?php echo $p['naik']." | ".$s['tgl_masuk']; ?></td>
	                	</tr>
	                <?php $no++; } ?>
	                </tbody>
	            </table>
				</div>
			</div>
			<div style="padding-top: 100px;"></div>
			<legend>Penting!</legend>
            <p>
                <ul>
                    <li>Tiket yang sudah dipesan tidak dapat dibatalkan kecuali dengan menghubungi call center terlebih dahulu.</li>
                    <li>Tiket yang dipesan akan hangus dalam waktu 3 jam pasca pemesanan apabila belum dibayar dalam jangka waktu tersebut.</li>
                    <li>Tiket yang sudah dibeli tidak dapat dibatalkan.</li>
                    <li>Keterangan lebih lanjut silahkan hubungi Customer Service.</li>
                </ul>
               </p>
		</div>
	</body>