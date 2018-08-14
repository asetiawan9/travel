
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

<?php var_dump($_SESSION); ?>
<div class="row">
<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-search"></span> <b>Edit Profil</b></div>
    <div class="panel-body">
        <form action="simpan_edit_profil.php" class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="kode_unik" class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-9">
              <input value= <?php echo $userRow['id_members']; ?> name="id_members" id="id_members" type="hidden">
              <input value= <?php echo $userRow['nama']; ?> name="nama" id="inputNama" class="form-control"  type="text"></div>
          </div>

          <div class="form-group">
             <label for="jumlah" class="col-sm-3 control-label">No Telepon</label>
             <div class="col-sm-9">
               <input value= <?php echo $userRow['telp']; ?> name="telp" id="inputTelp" maxlength="12" class="form-control" size="12" type="text" >
             </div>
           </div>

           <div class="form-group">
             <label for="pengirim" class="col-sm-3 control-label">NO KTP / NIM</label>
             <div class="col-sm-9">
               <input maxlength="32" class="form-control" value= <?php echo $userRow['nim']; ?> name="nim" id="inputNim" size="30" type="text" >
             </div>
           </div>

            <div class="form-group">
             <label for="pengirim" class="col-sm-3 control-label">Alamat</label>
             <div class="col-sm-9">
              <textarea class="form-control" name="kuliah" id="inputKuliah" > <?php echo $userRow['universitas']; ?></textarea>
             </div>
           </div>

           <div class="form-group">
             <label for="pengirim" class="col-sm-3 control-label">Bukti Bayar</label>
             <div class="col-sm-9">
               <input name="file" id="inputFile" class="form-control" type="file" >
               <span> <a target="_blank" href="<?php echo $userRow['path_idcard'] ?>"><img width="200px" height="200px" src="<?php echo $userRow['path_idcard'] ?>"></a></span>
             </div>
           </div>

            <div class="form-group">
             <label for="pengirim" class="col-sm-3 control-label">Email</label>
             <div class="col-sm-9">
               <input type="email" name="email" id="inputEmail" maxlength="32" class="form-control" value= <?php echo $userRow['email']; ?> size="30" >
             </div>
           </div>

            <div class="form-group">
             <label for="pengirim" class="col-sm-3 control-label">Password</label>
             <div class="col-sm-9">
               <input type="password" name="password" id="inputPassword" maxlength="32" class="form-control" size="30" >
             </div>
           </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <input name="edit_profil" value="Simpan" class="btn btn-danger" type="submit">
            </div>
          </div>

        </form></div>
</div>
  </div>
 <!--  <div class="col-sm-8">
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
    </div> -->
</div>