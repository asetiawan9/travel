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



  if(isset($_SESSION['mahasiswa'])!="" || NULL)
	{
		$sesi = 'mahasiswa';
 		$res=mysql_query("SELECT * FROM members WHERE nim=".$_SESSION['mahasiswa']);

		$userRow=mysql_fetch_array($res);
	}
	function limit_words($string, $word_limit){
    	$words = explode(" ",$string);
    	return implode(" ",array_splice($words,0,$word_limit));
	}
	$long_string = $userRow['nama'];
	$cetakNama = limit_words($long_string, 1);
  ?>
<!DOCTYPE html>
<html lang="en" style="background: url(assets/img/batikbg3.png);"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Penjualan Tiket Online Aya Travel ">
    <meta name="keywords" content="Penjualan Tiket Online Aya Travel ">
    <meta name="author" content="Rahmat Sabilludin">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" href="foto_logo/favicon.png">

    <title>KPMTRANS</title>

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
    
	
	<script>
	var tgl = jQuery.noConflict();
	tgl(function() {
		tgl( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
		
	});
	tgl(function() {
		tgl( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
	});
	
	
	</script>
	<!-- END DATE PICKER STYLES-->


    <style type="text/css">
      body {
        padding-top: 65px;
        /*background-color: #c0c0c0;*/
      }
    </style>
 </head>  
  <body style="background: url(assets/img/batikbg3.png);">

    <div class="container">
    	<?php 
	 	if ($_GET['hal']=='home')
			{include "menu.php";}
		if ($_GET['hal']=='all-tiket')
			{include "menu.php";}
		if ($_GET['hal']=='cari-tiket')
			{include "menu.php";}
		if ($_GET['hal']=='pilih')
			{include "menu.php";}
		if ($_GET['hal']=='identitas-pemesan')
			{include "menu.php";}
		if ($_GET['hal']=='simpan-transaksi')
			{include "menu.php";}
		if ($_GET['hal']=='status-tiket')
			{include "menu.php";}
		if ($_GET['hal']=='konfirmasi-pembayaran')
			{include "menu.php";}
		if ($_GET['hal']=='simpan-konfirmasi')
			{include "menu.php";}
		if ($_GET['hal']=='info-pembayaran')
			{include "menu.php";}
		 ?>
		<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
			<img style="
			padding-left: 10px;
			margin-top: 5px;
			margin-bottom:  5px;  " width="150px" height="50px" src="img/logo.png">

<!-- 		  <div class="container">
		    <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
		      <a class="navbar-brand" href="master.php?hal=home" style="margin-left: -60px"><span class="glyphicon glyphicon-lock"></span>  TICKETING</a>
		    </div>
		    <div class="navbar-collapse collapse">

		      <ul class="nav navbar-nav">
			  <?php
			  if ($_GET['hal']=='home')
			  {echo "
				<li><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		        <li><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		        <li><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		        <li><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		        </ul>
		        <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		       ";

		       if ($userRow['nama'] != '') {
		        echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		       	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		       } else {
		       echo "
			    <li><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			    <li><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			  </ul>";}}
			  ?>
			  <?php
			  if ($_GET['hal']=='all-tiket')
			  {echo"
			  <li class='active'><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		        <li><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		        <li><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		        <li><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		        </ul>
		      <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		       ";

		       if ($userRow['nama'] != '') {
		       	echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		       	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		       } else {
		       echo "
			    <li><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			    <li><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			  </ul>";}}
			  ?>
				<?php
			  if ($_GET['hal']=='cari-tiket')
			  {echo"
			  <li class='active'><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		        <li><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		        <li><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		        <li><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		        </ul>
		      <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		       ";

		       if ($userRow['nama'] != '') {
		       	echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		       	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		       } else {
		       echo "
			    <li><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			    <li><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			  </ul>";}}
			  ?>
			  <?php
			  if ($_GET['hal']=='pilih')
			  {echo"
			  <li class='active'><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		        <li><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		        <li><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		        <li><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		        </ul>
		      <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		       ";

		       if ($userRow['nama'] != '') {
		       	echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		       	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		       } else {
		       echo "
			    <li><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			    <li><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			  </ul>";}}
			  ?>
			  
			   <?php
			  if ($_GET['hal']=='identitas-pemesan')
			  {echo"
			  <li class='active'><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		        <li><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		        <li><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		        <li><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		        </ul>
		      <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		       ";

		       if ($userRow['nama'] != '') {
		       	echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		       	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		       } else {
		       echo "
			    <li><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			    <li><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			  </ul>";}}
			  ?>
			   <?php
			  if ($_GET['hal']=='simpan-transaksi')
			  {echo"
				<li><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		        <li class='active'><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		        <li><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		        <li><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		        </ul>
		      <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		       ";

		       if ($userRow['nama'] != '') {
		       	echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		       	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		       } else {
		       echo "
			    <li><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			    <li><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			  </ul>";}}
			  ?>
			  
			   <?php
			  if ($_GET['hal']=='status-tiket')
			  {echo"
				<li><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		        <li class='active'><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		        <li><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		        <li><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		        </ul>
		     <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		       ";

		       if ($userRow['nama'] != '') {
		       	echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		       	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		       } else {
		       echo "
			    <li><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			    <li><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			  </ul>";}}
			  ?>
			  <?php
			  if ($_GET['hal']=='konfirmasi-pembayaran')
			  {echo"
				<li><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		        <li><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		        <li class='active'><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		        <li><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		        </ul>
		      <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		       ";

		       if ($userRow['nama'] != '') {
		       	echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		       	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		       } else {
		       echo "
			    <li><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			    <li><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			  </ul>";}}
			  ?>
			  
			  <?php
			  if ($_GET['hal']=='simpan-konfirmasi')
			  {echo"
				<li><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		        <li><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		        <li class='active'><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		        <li><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		        </ul>
		      <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		       ";

		       if ($userRow['nama'] != '') {
		       	echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		       	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		       } else {
		       echo "
			    <li><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			    <li><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			  </ul>";}}
			  ?>
			  
			  <?php
			  if ($_GET['hal']=='info-pembayaran')
			  {echo"
				<li><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		        <li><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		        <li><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		        <li class='active'><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		        </ul>
		      <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		       ";

		       if ($userRow['nama'] != '') {
		       	echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		       	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		       } else {
		       echo "
			    <li><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			    <li><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			  </ul>";}}
			  ?>

			  <?php
			  if ($_GET['hal']=='register')
			  //{echo"
				// <li><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		  //       <li><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		  //       <li><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		  //       <li><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		  //       </ul>
		  //     <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		  //      ";

		  //      if ($userRow['nama'] != '') {
		  //      	echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		  //      	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		  //      } else {
		  //      echo "
			 //    <li class='active'><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			 //    <li><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			 //  </ul>";}}
			  ?>

			  <?php
			  //if ($_GET['hal']=='login')
			//  {echo"
				// <li><a href='master.php?hal=all-tiket'><span class='glyphicon glyphicon-search'></span>&nbsp;Cari Tiket</a></li>
		  //       <li><a href='master.php?hal=status-tiket'><span class='glyphicon glyphicon-credit-card'></span>&nbsp;Cek Status Tiket</a></li>
		  //       <li><a href='master.php?hal=konfirmasi-pembayaran'><span class='glyphicon glyphicon-share'></span>&nbsp;Konfirmasi Pembayaran</a></li>
		  //       <li><a href='master.php?hal=info-pembayaran'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Info Pembayaran</a></li>

		  //       </ul>
		  //     <ul class='nav navbar-nav navbar-right' style='margin-right: -70px;'>
		       //";

		     //   if ($userRow['nama'] != '') {
		     //   	echo "<li><a href='#'>Hello, <strong>".$cetakNama."</strong></a></li>";
		     //   	echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		     //   } else {
		     //   echo "
			    // <li><a href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a></li>
			  //   <li class='active'><a href='master.php?hal=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			  // </ul>";}}

			  // ?>
		     
		    </div>

		  </div> -->

		</div>

		<div class="panel panel-default">

		  <div class="panel-body">

	    	
  
<style type="text/css">
     .form-control {
        position: relative;
        width: 100%;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
      }
</style>


<?php include "konten.php"; ?>



</div>
	     
	    </div>
    </div>
   </body>
   <div class="panel-footer">
		 <p class="text-center"><kbd>Copyright © <?php echo date("Y"); ?> <?php $sql2 = mysql_query("select nama_website from identitas LIMIT 1");
      											   $j2   = mysql_fetch_array($sql2);
												   echo "$j2[nama_website]";?></kbd></p></div>
   </html>