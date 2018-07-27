<?php
if ($sesi == 'mahasiswa'){
    echo "<script>alert('Anda sudah login, Silahkan logout untuk mengganti akun!'); window.location = 'master.php?hal=home'</script>";
}
?>
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-"></span> <b>Login Member Mahasiswa</b></div>
    <div class="panel-body">
      <form class="form-signin" method="POST" action="aksi_login.php">
        
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label style="padding-top:10px" for=""></label>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
      </form>
    </div>
    </div>
	</div>
    </div>