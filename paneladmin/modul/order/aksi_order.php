<?php

session_start();
include "../../../config/koneksi.php";

$p=$_GET[p];
$act=$_GET[act];

if ($p=='order' AND $act=='hapus'){
  mysql_query("DELETE FROM orders WHERE id_orders='$_GET[id]'"); 
  header('location:../../media.php?p='.$p);
 }
elseif ($p=='order' AND $act=='update'){
   // Update stok barang saat transaksi transfered
   if ($_POST[status_order]=='Transfered'){ 
    
      // Update untuk mengurangi stok 
      mysql_query("UPDATE tiket,orders SET tiket.stok=tiket.stok-orders.jumlah WHERE tiket.id_tiket=orders.id_tiket AND orders.id_orders='$_POST[id]'");
	  
	  // Update untuk menambahkan tiket yang dibeli (best seller = tiket yang paling laris)
      mysql_query("UPDATE tiket,orders SET tiket.dibeli=tiket.dibeli+orders.jumlah WHERE tiket.id_tiket=orders.id_tiket AND orders.id_orders='$_POST[id]'");

      // Update status order
      mysql_query("UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id]'");
      header('location:../../media.php?p='.$p);
      }	  
	  elseif($_POST[status_order]=='Batal'){
	  mysql_query("UPDATE tiket,orders SET tiket.stok=tiket.stok+orders.jumlah WHERE tiket.id_tiket=orders.id_tiket AND orders.id_orders='$_POST[id]'"); //menambah stok yang tidak jadi dibeli
	  
	  // Update untuk mengurangkan tiket yang tidak jadi dibeli ( tidak jd best seller)
      mysql_query("UPDATE tiket,orders SET tiket.dibeli=tiket.dibeli-orders.jumlah WHERE tiket.id_tiket=orders.id_tiket AND orders.id_orders='$_POST[id]'");

      // Update status order
      mysql_query("UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id]'");
	  
	  // Delete Kursi
	  mysql_query("DELETE FROM kursi WHERE id_orders='$_POST[id]'");
	  header('location:../../media.php?p='.$p);
	  }
 else{
     mysql_query("UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id]'");
     header('location:../../media.php?p='.$p);
     }
}
?>


