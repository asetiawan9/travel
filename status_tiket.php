<div class="row">
<?php
echo"<div class='col-sm-4'>
  <div class='panel panel-default'>
    <div class='panel-heading'><span class='glyphicon glyphicon-search'></span> <b>Cek Status Tiket</b></div>
    <div class='panel-body'>
        <form action='master.php?hal=status-tiket' class='form-horizontal' method='post' accept-charset='utf-8'>
          <div class='form-group'>
            <div class='col-sm-12'>
              <input name='kode_unik' value='$_POST[kode_unik]' id='kode_unik' maxlength='10' class='form-control' placeholder='Kode Pemesanan Tiket' size='10' type='text'></div>
          </div>

          <div class='col-sm-offset-3 col-sm-9'>
          </div>
          <div class='form-group'>
            <div class='col-sm-12'>
              <input name='status' value='Cek Status' class='btn btn-danger' type='submit'>
            </div>
          </div>

        </form>
		</div>
</div>
  </div>";
?>
  
  <div class="col-sm-8">
  <div class="panel panel-default">
  <div class="table-responsive">
  <div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span> <b>Status Tiket Anda</b></div>
        <table class="table table-condensed table-striped">
        <tbody><tr>
          <th>#</th>
          <th>No Tiket</th>
          <th>Trayek</th>
          <th>Berangkat</th>
          <th>Jam</th>
          <th>Status</th>
          <th>Cetak tiket</th>
        </tr>
		<?php
		$tampil = mysql_query("SELECT * FROM orders, tiket WHERE  orders.id_tiket = tiket.id_tiket AND id_orders='$_POST[kode_unik]'");
    $i=1;
	$jumlah = mysql_num_rows($tampil);
	// Apabila ditemukan tiket dalam kategori
	if ($jumlah > 0){
    while($r=mysql_fetch_array($tampil)){
	$date = $r['tgl_masuk'];
	$tanggal = tgl_indo($date); // konversi ke format tanggal indonesia
	$day = date('l', strtotime($date)); // konversi ke hari 
	$from=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$r[dari]'"));
	$to=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$r[ke]'"));
        echo"<tr>
              <td>$i</td>
              <td>$r[id_orders]</td>
              <td>$from[nama_kota] - $to[nama_kota]</td>
              <td>$day, $tanggal</td>
              <td>$r[pergi]</td>
              <td>";
			 if ($r['status_order']=='Baru'){echo"<span class='label label-danger'><span class='glyphicon glyphicon-ban-circle'></span>&nbsp;&nbsp;non aktif</span>";}
			 if ($r['status_order']=='Transfered'){echo"<span class='label label-success'><span class='fa fa-check'></span>&nbsp;&nbsp;aktif</span>";} 
			 if ($r['status_order']=='Batal'){echo"<span class='label label-warning'><span class='glyphicon glyphicon-ban-circle'></span>&nbsp;&nbsp;Batal</span>";}
	   echo "</td>";
	   if ($r['status_order']=='Transfered'){
	   		echo "<td>
	   			<form method='post' action='cetak_tiket.php'>
	   				<input type='hidden' name='kd_tiket' value='$_POST[kode_unik]'>
	   				<input type='submit' value='Cetak Tiket' name='submit'>
	   			</form>"; ?>
	   			<a href='download_tiket.php?id=<?php echo $r[id_orders] ?>'> download </a>
	   			<?php "
	   		</td>";}
       echo "</tr>";
			$i++;
			}
			}
  else{
    echo "<tr>
		  <td></td>
		  <td colspan=4>Silahkan Ketik kode pemesanan tiket untuk melihat status tiket anda</td></tr>";
  }
			?>
       <?php
		$status = mysql_query("SELECT * FROM orders, tiket WHERE  orders.id_tiket = tiket.id_tiket AND id_orders='$_POST[kode_unik]'");
			$i=1;
			while($l=mysql_fetch_array($status)){
	
			 if ($l['status_order']=='Baru'){
			 
			 // rumus untuk menghitung subtotal dan total	
			if (empty($_SESSION['mahasiswa'])) {
				$disc        = ($diskon/100)*$l[harga];
				$hargadisc   = number_format(($l[harga]-$disc),0,",",".");
				$subtotal    = ($l[harga]-$disc) * $l[jumlah];
				$total       =  $subtotal;  
				
				$totals       = $totals + $subtotal;
				
				$subtotal_all	= $total;
				$subtotal_rp    = format_rupiah($subtotal_all);
				$grandtotal_all	= $totals;
				$grandtotal_rp	= format_rupiah($grandtotal_all);
				$harga   		= format_rupiah($l[harga]);
			} else {
				$disc        = ($diskon/100)*$l[harga_mahasiswa];
				$hargadisc   = number_format(($l[harga_mahasiswa]-$disc),0,",",".");
				$subtotal    = ($l[harga_mahasiswa]-$disc) * $l[jumlah];
				$total       =  $subtotal;  
				
				$totals       = $totals + $subtotal;
				
				$subtotal_all	= $total;
				$subtotal_rp    = format_rupiah($subtotal_all);
				$grandtotal_all	= $totals;
				$grandtotal_rp	= format_rupiah($grandtotal_all);
				$harga   		= format_rupiah($l[harga_mahasiswa]);

			}
				$hrgTotal = format_rupiah($l[hargatotal]);
			 ?>
			 <tr>
            <td colspan="7">
			<div class="alert alert-default">Tiket yang anda pesan masih belum aktif, untuk mengaktifkan segera lakukan transfer sebesar 
			<b><?php echo"Rp. $hrgTotal"; ?></b> ke salah satu rekening dibawah ini:
			<ul>
			<?php
			$bank=mysql_query("SELECT * FROM bank ORDER BY nama_bank ASC");
			while($j=mysql_fetch_array($bank)){
			echo "<li>$j[nama_bank], $j[no_rekening] atas nama $j[pemilik]</li>";}
			
			//Konversi tanggal
			$tanggal = tgl_indo($l['tgl_masuk']); // konversi ke format tanggal indonesia
			$date = $l['tgl_masuk']; // konversi ke hari
			$day = date('l', strtotime($date)); // konversi ke hari
			//$datess = "2012-02-16"; // konversi ke hari
			//$newdate=strtotime('-3 day',strtotime($datess));
			$jam =$l['jam_order'];
			echo"</ul>Transaksi pembayaran hanya bisa dilakukan sebelum <b>$day, $tanggal Pukul $jam WIB<div>&nbsp;</div>";
			
			echo"<form action='master.php?hal=konfirmasi-pembayaran' method='post' accept-charset='utf-8'>
			<input name='kode_unik' value='$_POST[kode_unik]' type='hidden'>
			<input name='jumlah' value='$hrgTotal' type='hidden'>
			<input value='Klik untuk Konfirmasi Pembayaran !' class='btn btn-danger' type='submit'>
			</form>";
			?>
			</b>
			</div>
			</td>
          </tr>
			 <?php
			 }
			
			}
			?>
            
      </tbody></table>
      
  </div>
  </div>

</div>
</div>