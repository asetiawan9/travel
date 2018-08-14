<!-- <?php
// if (!empty($_SESSION['namauser']) AND !empty($_SESSION['namalengkap']) AND !empty($_SESSION['passuser']) AND !empty($_SESSION['leveluser'])){
//  header("Location: master.php?hal=home");
// }

// if ($sesi == 'mahasiswa'){
//    echo "<script>alert('Anda sudah login, Silahkan logout untuk mengganti akun!'); window.location = 'master.php?hal=home'</script>";
//}
?>
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-"></span> <b>Login</b></div>
    <div class="panel-body">
      <form class="form-signin" method="POST" action="aksi_login.php">
        
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label style="padding-top:10px" for=""></label>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login"><span class='glyphicon glyphicon-log-in'></span> Login</button>

        <a class="btn btn-lg btn-danger btn-block" href='master.php?hal=register'><span class='glyphicon glyphicon-user'></span> Register</a>
        
      </form>
    </div>
    </div>
	</div>
    </div> -->

<?php
// if (!empty($_SESSION['namauser']) AND !empty($_SESSION['namalengkap']) AND !empty($_SESSION['passuser']) AND !empty($_SESSION['leveluser'])){
//  header("Location: master.php?hal=home");
// }

// if ($sesi == 'mahasiswa'){
//     echo "<script>alert('Anda sudah login, Silahkan logout untuk mengganti akun!'); window.location = 'master.php?hal=home'</script>";
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login KPMtrans</title>
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
                <form class="login100-form validate-form" method="POST" action="aksi_login.php">
                    <div class="login100-form-avatar">
                     <!--    <img src="assets_l/images/avatar-01.jpg" alt="AVATAR"> -->
                        <img src="img/logo.png">
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                        <input class="input100" type="text" placeholder="email" name="email" id="inputEmail">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" id="inputPassword" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" name="login">
                            Login
                        </button>
                    </div>

                    <div class="text-center w-full p-t-25 p-b-230">
                        <a href="#" class="txt1">
                           
                        </a>
                    </div>

                    <div class="text-center w-full">
                        <a class="txt1" href='register.php'>
                            Buat Akun baru
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