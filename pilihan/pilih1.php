 <script type="text/javascript">
       jQuery(document).ready(function(){
     
          var checkboxes = $("input[type='checkbox']"),
              submitButt = $("input[type='submit']");

          checkboxes.click(function() {
              submitButt.attr("disabled", !checkboxes.is(":checked"));
			  
          });

         })
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
    </script>
<div class="row">

  <div class="col-sm-4">
    <div class="panel panel-default">
    <?php
    if (empty($_SESSION['mahasiswa'])) {
    	echo '<script type="text/javascript">
    			var count=0
				function cer(elem){
					if (elem.checked) {
						count = count + 1;
						if (count>2) {
							count = 2;
							alert("Maaf anda hanya boleh memilih 2 kursi !");
							elem.checked = false;
						}
					}else{
						count = count-1;
					}
				}
			</script>';
		} else {
			echo '<script type="text/javascript">
    			var count=0
				function cer(elem){
					if (elem.checked) {
						count = count + 1;
						if (count>1) {
							count = 1;
							alert("Maaf anda hanya boleh memilih 1 kursi !");
							elem.checked = false;
						}
					}else{
						count = count-1;
					}
				}
			</script>';
		}
    ?>
<!--	<script type="text/javascript">
	var count=0
	function cer(elem){
		if (elem.checked) {
			count = count + 1;
			if (count>2) {
				count = 2;
				alert("Maaf anda hanya boleh memilih 2 kursi !");
				elem.checked = false;
			}
		}else{
			count = count-1;
		}
	}
	</script> -->
      <div class="panel-heading"><span class="glyphicon glyphicon-tags"></span> <b>Keterangan Tiket</b></div>
      <?php
		$t=mysql_fetch_array(mysql_query("SELECT * FROM tiket WHERE id_tiket='$_GET[id]'"));
		$from=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$t[dari]'"));
		$to=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$t[ke]'"));
		//Konversi tanggal
		$tanggal = tgl_indo($t['tgl_masuk']); // konversi ke format tanggal indonesia
		$date = $t['tgl_masuk']; // konversi ke hari
		$day = date('l', strtotime($date)); // konversi ke hari

		if (empty($_SESSION['mahasiswa'])) {
			//penrhitungan harga
			$harga = format_rupiah($t[harga]);
			$disc     = ($t[diskon]/100)*$p[harga];
			$hargadisc     = number_format(($t[harga]-$disc),0,",",".");
		} else {
			//penrhitungan harga
			$harga = format_rupiah($t[harga_mahasiswa]);
			$disc     = ($t[diskon]/100)*$p[harga_mahasiswa];
			$hargadisc     = number_format(($t[harga_mahasiswa]-$disc),0,",",".");
		}
		$d=$t['diskon'];
		$htetap="Rp.$harga";
		$hdiskon=" <span class='currency' style='font-size:11px'>Rp. </span><span class='value'  style='text-decoration:line-through;font-size:16px'>$harga</span><br>
				   <span class='currency' style='font-size:13px'>Rp. </span><span class='value'>$hargadisc</span>";
					  
		if ($d!= "0"){
		$divharga=$hdiskon;
		}else{
		$divharga=$htetap;
		}	
		$dipesan = $t['dibeli']-1;
		echo" <div class='panel-body'>
          <label class='btn btn-default'>$t[stok] tersedia</label>
          <label class='btn btn-warning'>$dipesan dipesan</label>
          <div>&nbsp;</div>
          <ul>
            <li>Jurusan $from[nama_kota] - $to[nama_kota]</li>
            <li>Harga tiket: <b>$divharga</b></li>
            <li>Berangkat hari <b>$day, $tanggal</b></li>
            <li>Jam keberangkatan <b>pukul $t[pergi] WIB</b></li>
            <li>Berangkat dari $from[nama_kota]</li>
            <li>Turun di $to[nama_kota]</li>
            <li>Silahkan pilih kursi</li>
            <li>Pilih maksimal 2 kursi</li>
          </ul>
      </div>";
	  ?>
      </div>
    
  </div>

	<div class="col-sm-4">
<?php 
echo"<form action='master.php?hal=identitas-pemesan&id=$_GET[id]' method='post' name='f' accept-charset='utf-8'>
	  
	  <div class='table-responsive'>
	  <div class='panel panel-default'>
      <div class='panel-heading'><span class='glyphicon glyphicon-share'></span> <b>Konfirmasi Pemesanan</b></div>
       <div class='panel-body'>";
			?>
			<br/>
			
			<?php
$jumlah=1;
for($i=0; $i<$jumlah; $i++){
$nomor = $i + 1;
?>
				<center>
		<table>
					<tbody>
				<tr>
				<td class="btn-group" width="139">
				<!--=================================================START 1A=========================================================-->
				<?php
			    $a1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='1A'"));	
			  if($a1['nama_kursi']=="1A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='1A' id='1A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;1A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='1A' id='1A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;1A
					</label>";}
			   ?>
					
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
			   <!--=================================================START 1D=========================================================-->	
			   <label class='btn btn-primary'>
				    Supir
					</label>
			  
			   
				</td>
				</tr>
				<tr>
				<td class='btn-group' width='139'>
				 <!--=================================================START 2A=========================================================-->
				    <?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='2A'"));	
			  if($c1['nama_kursi']=="2A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='2A' id='2A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;2A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='2A' id='2A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;2A
					</label>";}
			   ?>
			   	<!--=================================================START 2B=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='2B'"));	
			  if($c1['nama_kursi']=="2B"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='2B' id='2B' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;2B
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='2B' id='2B' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;2B
					</label>";}
			   ?>
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
					<!--=================================================START 2C=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='2C'"));	
			  if($c1['nama_kursi']=="2C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='2C' id='2C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;2C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='2C' id='2C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;2C
					</label>";}
			   ?>
			    <!--=================================================START 2D=========================================================-->
	
					</td>
				</tr>
				<tr>
				<td class='btn-group' width='139'>
					<!--=================================================START 3A=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='3A'"));	
			  if($c1['nama_kursi']=="3A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='3A' id='3A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;3A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='3A' id='3A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;3A
					</label>";}
			   ?>
				<!--=================================================START 3B=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='3B'"));	
			  if($c1['nama_kursi']=="3B"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='3B' id='3B' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;3B
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='3B' id='3B' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;3B
					</label>";}
			   ?>	
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
				<!--=================================================START 3C=========================================================-->
			  <?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='3C'"));	
			  if($c1['nama_kursi']=="3C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='3C' id='3C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;3C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='3C' id='3C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;3C
					</label>";}
			   ?>	
				</td>
				</tr>
				<tr>
				<td class='btn-group' width='139'>
				<!--=================================================START 4A=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='4A'"));	
			  if($c1['nama_kursi']=="4A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='4A' id='4A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;4A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='4A' id='4A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;4A
					</label>";}
			   ?>
				<!--=================================================START 4B=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='4B'"));	
			  if($c1['nama_kursi']=="4B"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='4B' id='4B' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;4B
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='4B' id='4B' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;4B
					</label>";}
			   ?>	
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
				<!--=================================================START 4C=========================================================-->
			<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='4C'"));	
			  if($c1['nama_kursi']=="4C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='4C' id='4C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;4C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='4C' id='4C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;4C
					</label>";}
			   ?>
				<!--=================================================START 4D=========================================================-->

				</td>
				</tr>
				<tr>
				<td class='btn-group' width='139'>
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='5A'"));	
			  if($c1['nama_kursi']=="5A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='5A' id='5A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;5A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='5A' id='5A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;5A
					</label>";}
			   ?>
				<!--=================================================START 5B=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='5B'"));	
			  if($c1['nama_kursi']=="5B"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='5B' id='5B' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;5B
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='5B' id='5B' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;5B
					</label>";}
			   ?>	
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
				<!--=================================================START 5C=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='5C'"));	
			  if($c1['nama_kursi']=="5C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='5C' id='5C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;5C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='5C' id='5C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;5C
					</label>";}
			   ?>
				<!--=================================================START 5D=========================================================-->
	
				</td>
				</tr>

				</tbody></table>
	  	</center>
<?php
}
?>
			</div>
    </div>
	</div>

  </div>
  <div class='col-sm-4'>
    <div class='panel panel-default'>
      <div class='panel-heading'><span class='glyphicon glyphicon-edit'></span> <b>Konfirmasi Pemesanan</b></div>
       <div class='panel-body'>
            <p>Setelah memilih kursi, silahkan klik tombol 'selanjutnya' dibawah ini !</p>
            <div class='btn-group'>
              <a href='' class='btn btn-default'>Kembali</a>
              <input name='btn' value='Selanjutnya' class='btn btn-danger' type='submit'>
            </div>
      </div>
    </div>
    </div>
	 </form>
  </div>