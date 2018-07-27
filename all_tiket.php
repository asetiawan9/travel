<div class="row">

  <div class="col-sm-4">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-search"></span> <b>Cari Tiket</b></div>
    <div class="panel-body">
       <form action="master.php?hal=cari-tiket" class="form-horizontal" method="post" accept-charset="utf-8">
          <div class="form-group">
            <label for="i0" class="col-sm-3 control-label">Tanggal</label>
            <div class="col-sm-9">
              <input name="i0" id="datepicker" size="10" maxlength="50" class="form-control" placeholder="dd-mm-yyyy" readonly="readonly" type="text">                          </div>
          </div>

           <div class="form-group ">
             <label for="i1" class="col-sm-3 control-label">Asal</label>
             <div class="col-sm-9">
           <select name='dari' class="form-control">
                              <option value=0 selected>- Dari -</option>
                              <?php
                              $tampil=mysql_query("SELECT * FROM kota ORDER BY nama_kota");
                              while($r=mysql_fetch_array($tampil)){
                                 echo "<option value=$r[id_kota]>$r[nama_kota]</option>";
                              }
							  ?>
                          </select>                      </div>
           </div> 

            <div class="form-group ">
              <label for="i2" class="col-sm-3 control-label">Tujuan</label>
              <div class="col-sm-9">
             <select name='ke' class="form-control" id="i2">
                              <option value=0 selected>- Ke -</option>
                              <?php
                              $tampil=mysql_query("SELECT * FROM kota ORDER BY nama_kota");
                              while($r=mysql_fetch_array($tampil)){
                                 echo "<option value=$r[id_kota]>$r[nama_kota]</option>";
                              }
							  ?>
                          </select>                          </div>
            </div>

          <div class="col-sm-offset-3 col-sm-9">
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <input name="login" value="Selanjutnya" class="btn btn-danger" type="submit">
            </div>
          </div>

        </form></div>
</div>
  </div>
  <div class="col-sm-8">
<div class="panel panel-default">
  <div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span> <b>Daftar Keberangkatan</b></div>
    <div class="table-responsive">
        <form action="" method="post" accept-charset="utf-8">        
<input name="id_trayek" value="13" type="hidden">
          <table class="table table-condensed table-striped">
            <tbody><tr>
              <th>#</th>
              <th>Trayek [Kode SMS]</th>
              <th>Hari [Jam]</th>
              <!-- <th>Jam</th> -->
              <th>Harga</th>
              <th>Tiket</th>
            </tr>
<?php                     
$tiket=mysql_query("SELECT * FROM tiket, kategori WHERE tiket.id_kategori=kategori.id_kategori ORDER BY id_tiket ASC");
		$i=1;	
		while ($p=mysql_fetch_array($tiket))
		{
		$from=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$p[dari]'"));
		$to=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$p[ke]'"));	
		$date = $p['tgl_masuk'];
		$tanggal = tgl_indo($date); // konversi ke format tanggal indonesia
		$tgl = explode(' ', $tanggal); // pisahkan penanggalan -> $tgl[0] = tanggal, $tgl[1] = bulan, $tgl[2] = tahun 
		$day1 = date('w', strtotime($date)); // konversi ke hari 
		$day = $seminggu[$day1];

		$pothar   = $p['diskon'];	
		$stok=$p['stok'];
	
		$tombolbeli="<a href='master.php?hal=pilih&act=tambah&id=$p[id_tiket]&kat=$p[id_kategori]'><label class='btn btn-danger btn-xs'>Pilih</label></a>";
		$tombolhabis="<span style='color:#da251c;font-size:1.5em;'>Stok habis</span>";
		if ($stok!= "0"){
		$tombol=$tombolbeli;
		}else{
		$tombol=$tombolhabis;
		} 
		
		$disisi="<span class=badge corner-badges>$p[diskon]</span>";
		$diskosong="";
		
		if ($pothar!="0")
		{
		 $divdiskon=$disisi;
		}
		
		
    if (empty($_SESSION['mahasiswa'])) {
    //penrhitungan harga member
    $harga = format_rupiah($p[harga]);
    $disc     = ($p[diskon]/100)*$p[harga];
    $hargadisc     = number_format(($p[harga]-$disc),0,",",".");
    } else {
          //penrhitungan harga
    $harga = format_rupiah($p[harga_mahasiswa]);
    $disc     = ($p[diskon]/100)*$p[harga_mahasiswa];
    $hargadisc     = number_format(($p[harga_mahasiswa]-$disc),0,",",".");
    }
		//penrhitungan harga
//		$harga = format_rupiah($p[harga]);
//		$disc     = ($p[diskon]/100)*$p[harga];
//		$hargadisc     = number_format(($p[harga]-$disc),0,",",".");
		$d=$p['diskon'];
		$htetap="Rp.$harga";
		$hdiskon=" <span class='currency' style='font-size:11px'>Rp. </span><span class='value'  style='text-decoration:line-through;font-size:16px'>$harga</span><br>
				   <span class='currency' style='font-size:13px'>Rp. </span><span class='value'>$hargadisc</span>";
					  
		if ($d!= "0"){
		$divharga=$hdiskon;
		}else{
		$divharga=$htetap;
		}	
		

		
		echo"<tr>
              <td>$i</td>
              <td>$from[nama_kota] - $to[nama_kota]</td>
              <td>$day, $tanggal [$p[pergi] WIB]</td>
              <!-- <td>$p[pergi] WIB</td> -->
              <td>$divharga</td>
              <td>$tombol
                
              </td>
            </tr>";
			$i++;
			}
			
			
?>
                    

              </tbody>
			  </table>
      </form>    
	  </div>
  </div>
</div>

</div>	