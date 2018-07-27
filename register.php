<?php
if ($sesi == 'mahasiswa'){
    echo "<script>alert('Saat ini akun anda masih login, Silahkan logout terlebih dahulu!'); window.location = 'master.php?hal=home'</script>";
}
?>
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-edit"></span> <b>Register Member Mahasiswa</b></div>
    <div class="panel-body">
      <form class="form-signin" method="POST" action="aksi_register.php" enctype="multipart/form-data">
        
        <input type="text" name="nama" id="inputNama" class="form-control" placeholder="Nama" required autofocus>
		
		<input type="number" name="telp" id="inputTelp" class="form-control" placeholder="Nomor HP" required>

        <input type="number" name="nim" id="inputNim" class="form-control" placeholder="Nomor Induk Mahasiswa" required>

        <input type="text" name="kuliah" id="inputKuliah" class="form-control" placeholder="Nama Perguruan tinggi / Universitas" required>
		
		<label style="padding-top:10px" for="">Upload scan kartu mahasiswa</label>
		
        <input type="file" name="file" id="inputFile" class="form-control" placeholder="Scan Kartu Mahasiswa" required>
		<label style="padding-top:10px" for=""></label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required>
        
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <label style="padding-top:10px" for=""></label>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
      </form>
    </div>
    </div>
	</div>
    </div>