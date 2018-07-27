<style type="text/css">
.blueberry { margin: 0 auto; }
.blueberry .slides {
  display: block;
  position: relative;
  overflow: hidden;
}
.blueberry .slides li {
  position: absolute;
  top: 0;
  left: 0;
  overflow: hidden;
}
.blueberry .slides li img {
  display: block;
  width: 100%;
  max-width: none;
}
.blueberry .slides li.active { display: block; position: relative; }
.blueberry .crop li img { width: auto; }

.blueberry .pager {
  height: 40px;
  text-align: center;
}
.blueberry .pager li { display: inline-block; }
.blueberry .pager li a,
.blueberry .pager li a span {
  display: block;
  height: 4px;
  width: 4px;
}
.blueberry .pager li a {
  padding: 18px 8px;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  -o-border-radius: 6px;
  -ms-border-radius: 6px;
  -khtml-border-radius: 6px;
  border-radius: 6px;

}
.blueberry .pager li a span {
  overflow: hidden;
  background: #c0c0c0;
  text-indent: -9999px;
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  -o-border-radius: 2px;
  -ms-border-radius: 2px;
  -khtml-border-radius: 2px;
  border-radius: 2px;

}
.blueberry .pager li.active a span { background: #404040; }
  
</style>
<script type="text/javascript" src="js/jquery.blueberry.js"></script>
<script type="text/javascript">
  var blue = jQuery.noConflict();
  blue(window).load(function() {
    blue('.blueberry').blueberry();
  });

</script>
<div class="row">
<div class="col-sm-4">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-search"></span> <b>Konfirmasi Pembayaran</b></div>
    <div class="panel-body">
        <form action="master.php?hal=simpan-konfirmasi" class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="kode_unik" class="col-sm-3 control-label">Kode</label>
            <div class="col-sm-9">
              <input name="id_orders" value="<?php echo"$_POST[kode_unik]"; ?>" id="kode_unik" maxlength="panjang_maksimal" class="form-control" placeholder="Kode Pemesanan" size="ukuran" autofocus="autofocus" type="text" required></div>
          </div>

           <div class="form-group">
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
               <input name="jumlah" value="<?php echo"$_POST[jumlah]"; ?>"" id="jumlah" maxlength="12" class="form-control" size="12" type="text" required>
             </div>
           </div>

           <div class="form-group">
             <label for="pengirim" class="col-sm-3 control-label">Pengirim</label>
             <div class="col-sm-9">
               <input name="pengirim" id="pengirim" maxlength="32" class="form-control" placeholder="Nama Pengirim" size="30" type="text" required>               <span class="help-block">Nama Pengirim harus diisi.</span>             </div>
           </div>

           <div class="form-group">
             <label for="pengirim" class="col-sm-3 control-label">Bukti Bayar</label>
             <div class="col-sm-9">
               <input name="file" id="file" class="form-control" type="file" required>
             </div>
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
  <div class="blueberry">
    <ul class="slides" style="list-style-type: none;">
                
            
   <?php
   $no=1;
  $banner=mysql_query("SELECT * FROM banner ORDER BY id_banner ASC LIMIT 2");
  $jmlS = mysql_num_rows($banner);
  while($no<=$jmlS){
    $b=mysql_fetch_array($banner);
    echo "<li><img style='width: 100%;' src='foto_banner/$b[gambar]' /></li>";
    $no++;
    }?>
      </ul>
      </div>
    </div>
</div>