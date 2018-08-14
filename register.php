<?php
// if ($sesi == 'mahasiswa'){
//     echo "<script>alert('Saat ini akun anda masih login, Silahkan logout terlebih dahulu!'); window.location = 'master.php?hal=home'</script>";
// }
?>
<!-- <div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-edit"></span> <b>Register Member</b></div>
    <div class="panel-body">
      <form class="form-signin" method="POST" action="aksi_register.php" enctype="multipart/form-data">
        
        <input type="text" name="nama" id="inputNama" class="form-control" placeholder="Nama" required autofocus>
		
		<input type="number" name="telp" id="inputTelp" class="form-control" placeholder="Nomor HP" required>

        <input type="number" name="nim" id="inputNim" class="form-control" placeholder="NIK/NIM" required>

        <textarea type="text" name="kuliah" id="inputKuliah" class="form-control" placeholder="Alamat" required></textarea>
        
		
		<label style="padding-top:10px" for="">Upload Foto KTP/Kartu Mahasiswa</label>
		
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
    </div> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar KPMtrans</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="assets_l/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets_l/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets_l/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets_l/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets_l/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets_l/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets_l/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets_l/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets_l/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets_l/images/img-01.jpg');">
            <div class="wrap-login100 p-t-190 p-b-30">
                <form class="login100-form validate-form" method="POST" action="aksi_register.php" enctype="multipart/form-data">
                    <div class="login100-form-avatar">
                     <!--    <img src="assets_l/images/avatar-01.jpg" alt="AVATAR"> -->
                        <img src="img/logo.png">
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Nama Harus Diisi">
                        <input class="input100" type="text" name="nama" id="inputNama" placeholder="Nama">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "No Telepon Harus Diisi">
                        <input class="input100" type="number" name="telp" id="inputTelp" placeholder="No Telepon">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone-square"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "No KTP Harus Diisi">
                        <input class="input100" type="number" name="nim" id="inputNim" placeholder="No KTP / NIM">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-address-card"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Alamat Harus Diisi">
                        <input class="input100" type="text" name="kuliah" id="inputKuliah" placeholder="Alamat">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                             <i class="fa fa-address-card-o"></i>
                        </span>
                    </div>

                    <label style="padding-top:10px" for="">Upload Foto KTP/Kartu Mahasiswa</label>


                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Foto Harus Diisi">
                        <input class="" type="file" name="file" id="inputFile" >
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                           
                        </span>
                    </div>



                    <label style="padding-top:10px" for=""></label>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Email Harus Diisi">
                        <input class="input100" type="email" name="email" id="inputEmail" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password Harus Diisi">
                        <input class="input100" type="password" name="password" id="inputPassword" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>


                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" type="submit" name="register">
                            Daftar
                        </button>
                       
                    </div>

                    <div class="text-center w-full p-t-25 p-b-230">
                        <a href="#" class="txt1">
                           
                        </a>
                    </div>

                    <div class="text-center w-full">
                        <a class="txt1" href='login.php'>
                            Login 
                            <i class="fa fa-long-arrow-right"></i>                      
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    


    
<!--===============================================================================================-->  
    <script src="assets_l/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="assets_l/vendor/bootstrap/js/popper.js"></script>
    <script src="assets_l/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="assets_l/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="assets_l/js/main.js"></script>

</body>
</html>