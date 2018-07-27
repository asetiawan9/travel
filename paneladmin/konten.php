<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if ($_GET['p']=='home')
{ 
include "home.php";
}

// Bagian Kustomer
elseif ($_GET['p']=='kustomer'){ 
include "modul/kustomer/kustomer.php";
}
// Bagian konfirmasi
elseif ($_GET['p']=='konfirmasi'){ 
include "modul/konfirmasi/konfirmasi.php";
}
// Bagian Identitas
elseif ($_GET['p']=='identitas'){ 
include "modul/identitas/identitas.php";
}
// Bagian Cara beli
elseif ($_GET['p']=='cara-transfer'){ 
include "modul/cara-transfer/cara-transfer.php";
}
// Bagian Ganti password
elseif ($_GET['p']=='gantipassword'){ 
include "modul/gantipassword/gantipass.php";
}
// Bagian tiket
elseif ($_GET['p']=='tiket'){
	if ($_SESSION['leveluser']=='admin'){
include "modul/tiket/tiket.php";
 }
}
// Bagian  Bank
elseif ($_GET['p']=='bank'){ 
include "modul/bank/bank.php";
}
// Bagian  kategori
elseif ($_GET['p']=='kategori'){ 
include "modul/kategori/kategori.php";
}
// Bagian  Banner
else
if ($_GET['p']=='banner'){ 
include "modul/banner/banner.php";
}	
// Bagian  Order
elseif ($_GET['p']=='order'){ 
include "modul/order/order.php";
}
// Bagian import
elseif ($_GET['p']=='import'){
include "import.php";
}
// Bagian Destinasi
elseif ($_GET['p']=='destinasi'){
include "modul/destinasi/destinasi.php";
}
// Bagian import Destinasi
elseif ($_GET['p']=='import-destinasi'){
include "import-destinasi.php";
}
// Bagian new member
elseif ($_GET['p']=='new-member'){
include "modul/member/new-member.php";
}
// Bagian list member
elseif ($_GET['p']=='member'){
include "modul/member/member.php";
}
// Bagian laporan
elseif ($_GET['p']=='laptrans'){
include "modul/laporan/laptrans.php";
}
// Bagian logo
elseif ($_GET['p']=='logo'){
include "modul/logo/logo.php";
}
// Bagian kursi
elseif ($_GET['p']=='kursi'){
include "modul/kursi/kursi.php";
}
// Bagian kursi1
elseif ($_GET['p']=='kursi1'){
include "modul/kursi/kursi1.php";
}
// Bagian kursi2
elseif ($_GET['p']=='kursi2'){
include "modul/kursi/kursi2.php";
}
// Bagian kursi3
elseif ($_GET['p']=='kursi3'){
include "modul/kursi/kursi3.php";
}
// Bagian kursi4
elseif ($_GET['p']=='kursi4'){
include "modul/kursi/kursi4.php";
}
// Bagian kursi5
elseif ($_GET['p']=='kursi5'){
include "modul/kursi/kursi5.php";
}
// Bagian kursi6
elseif ($_GET['p']=='kursi6'){
include "modul/kursi/kursi6.php";
}
// Bagian kursi7
elseif ($_GET['p']=='kursi7'){
include "modul/kursi/kursi7.php";
}
// Bagian kursi8
elseif ($_GET['p']=='kursi8'){
include "modul/kursi/kursi8.php";
}
// Bagian kursi9
elseif ($_GET['p']=='kursi9'){
include "modul/kursi/kursi9.php";
}
// Bagian seat
elseif ($_GET['p']=='seat'){
	if ($_SESSION['leveluser']=='admin'){
include "modul/tiket/seat.php";
 }
}
else
{
include "not_found.php";	
}
?>
</body>
</html>