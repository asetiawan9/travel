<div class="row">
<div class="col-sm-4">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-search"></span> <b>Konfirmasi Pembayaran</b></div>
    <div class="panel-body">
       <form action="master.php?hal=simpan-konfirmasi" class="form-horizontal" method="post" accept-charset="utf-8">
          <div class="form-group">
            <label for="kode_unik" class="col-sm-3 control-label">Kode</label>
            <div class="col-sm-9">
              <input name="id_orders" value="<?php echo"$_POST[kode_unik]"; ?>" id="kode_unik" maxlength="panjang_maksimal" class="form-control" placeholder="Kode Pemesanan" size="ukuran" autofocus="autofocus" type="text"></div>
          </div>

           <div class="form-group has-error">
             <label for="bank" class="col-sm-3 control-label">Bank</label>
             <div class="col-sm-9">
			 <select name='id_bank' class="form-control">
                             
                              <?php
                              $tampil=mysql_query("SELECT * FROM bank ORDER BY nama_bank");
                              while($r=mysql_fetch_array($tampil)){
                                 echo "<option value=$r[id_bank]>$r[nama_bank]</option>";
                              }
							  ?>
                          </select>  
						  
                   <span class="help-block">Nama Bank harus diisi.</span>             </div>
           </div>

           <div class="form-group">
             <label for="jumlah" class="col-sm-3 control-label">Jumlah</label>
             <div class="col-sm-9">
               <input name="jumlah" value="<?php echo"$_POST[jumlah]"; ?>"" id="jumlah" maxlength="12" class="form-control" placeholder="Rp XXX.XXX" size="12" type="text">                            </div>
           </div>

           <div class="form-group has-error">
             <label for="pengirim" class="col-sm-3 control-label">Pengirim</label>
             <div class="col-sm-9">
               <input name="pengirim" id="pengirim" maxlength="32" class="form-control" placeholder="Nama Pengirim" size="30" type="text">               <span class="help-block">Nama Pengirim harus diisi.</span>             </div>
           </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <input name="status" value="Konfirmasi" class="btn btn-danger" type="submit">
            </div>
          </div>

        </form></div>
</div>
  </div>
  <div class="col-sm-8">
        <div class="panel panel-default">
      <div class="panel-heading"><span class="glyphicon glyphicon-search"></span> <b>Konfirmasi Pembayaran Sukses</b></div>
      <div class="panel-body">
        <h1>48S0V</h1>
        <p>Terima kasih, konfirmasi anda telah kami terima, pembayaran 
anda akan segera kami verifikasi. Setelah tiket aktif, anda akan 
menerima SMS konfirmasi dari kami.</p>
      </div>
    </div>
      </div>
</div>