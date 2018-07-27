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
    <div class="panel-heading"><span class="glyphicon glyphicon-search"></span> <b>Cari Tiket</b></div>
    <div class="panel-body">
        <div class="alert alert-warning">
          <h4>Penting!</h4>
          <p>Sebelum melakukan pemesanan tiket, harap baca terlebih dahulu 
		  <a href="master.php?hal=info-pembayaran"><b>Info Pembayaran.</b></a>.</p>
        </div>
		
        <form action="master.php?hal=cari-tiket" class="form-horizontal" method="post" accept-charset="utf-8">
          <div class="form-group">
            <label for="i0" class="col-sm-3 control-label">Tanggal</label>
            <div class="col-sm-9">
              <input name="date" id="datepicker" size="10" maxlength="50" class="form-control" placeholder="dd-mm-yyyy" type="text">
			  </div>
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
                          </select>                         </div>
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
                          </select>
						  </div>
            </div>

          <div class="col-sm-offset-3 col-sm-9">
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <input name="login" value="Selanjutnya" class="btn btn-danger" type="submit">
            </div>
          </div>

        </form>
		
		
		</div>
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