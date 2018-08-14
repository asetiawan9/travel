<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>

<style type="text/css">
  html {
  box-sizing: border-box;
}

*, *:after, *:before {
  box-sizing: inherit;
}

a {
  color: #333;
  text-decoration: none;
}

html {
  width: 100%;
  height: 100%;
}

body {
  background: #161616;
  width: 100%;
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
  color: #000;
  padding: 0px;
}

h1 {
  width: 100%;
  text-align: center;
  padding: 40px 0;
}

.open {
  position: fixed;
  top: 0px;
  right: 40px;
  width: 50px;
  height: 50px;
  display: block;
  cursor: pointer;
  transition: opacity 0.2s linear;
  z-index: 9999;
}
.open:hover {
  opacity: 0.8;
}
.open span {
  display: block;
  float: left;
  clear: both;
  height: 4px;
  width: 40px;
  border-radius: 40px;
  background-color: #fff;
  position: absolute;
  right: 3px;
  top: 3px;
  overflow: hidden;
  transition: all 0.4s ease;
}
.open span:nth-child(1) {
  margin-top: 10px;
  z-index: 9;
}
.open span:nth-child(2) {
  margin-top: 25px;
}
.open span:nth-child(3) {
  margin-top: 40px;
}

.sub-menu {
  transition: all 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  height: 0;
  width: 0;
  right: 0;
  top: 0;
  position: absolute;
  background-color: rgba(38, 84, 133, 0.54);
  border-radius: 50%;
  z-index: 18;
  overflow: hidden;
}
.sub-menu li {
  display: block;
  float: right;
  clear: both;
  height: auto;
  margin-right: -160px;
  transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.sub-menu li:first-child {
  margin-top: 180px;
}
.sub-menu li:nth-child(1) {
  -webkit-transition-delay: 0.05s;
}
.sub-menu li:nth-child(2) {
  -webkit-transition-delay: 0.10s;
}
.sub-menu li:nth-child(3) {
  -webkit-transition-delay: 0.15s;
}
.sub-menu li:nth-child(4) {
  -webkit-transition-delay: 0.20s;
}
.sub-menu li:nth-child(5) {
  -webkit-transition-delay: 0.25s;
}
.sub-menu li:nth-child(6) {
  -webkit-transition-delay: 0.30s;
}
.sub-menu li:nth-child(7) {
  -webkit-transition-delay: 0.35s;
}


.sub-menu li a {
  color: #fff;
  font-family: 'Lato', Arial, Helvetica, sans-serif;
  font-size: 16px;
  width: 100%;
  display: block;
  float: left;
  line-height: 40px;
}

.oppenned .sub-menu {
  opacity: 1;
  height: 500px;
  width: 400px;
}
.oppenned span:nth-child(2) {
  overflow: visible;
}
.oppenned span:nth-child(1), .oppenned span:nth-child(3) {
  z-index: 100;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
}
.oppenned span:nth-child(1) {
  -webkit-transform: rotate(45deg) translateY(12px) translateX(12px);
          transform: rotate(45deg) translateY(12px) translateX(12px);
}
.oppenned span:nth-child(2) {
  height: 450px;
  width: 400px;
  right: -160px;
  top: -160px;
  border-radius: 50%;
  background-color: rgba(38, 84, 133, 0.54);
}
.oppenned span:nth-child(3) {
  -webkit-transform: rotate(-45deg) translateY(-10px) translateX(10px);
          transform: rotate(-45deg) translateY(-10px) translateX(10px);
}
.oppenned li {
  margin-right: 168px;
}

.button {
  display: block;
  float: left;
  clear: both;
  padding: 20px 40px;
  background: #000;
  border-radius: 3px;
  border: 2px solid #10a1ea;
  overflow: hidden;
  position: relative;
}
.button:after {
  transition: -webkit-transform 0.3s ease;
  transition: transform 0.3s ease;
  transition: transform 0.3s ease, -webkit-transform 0.3s ease;
  content: "";
  position: absolute;
  height: 200px;
  width: 400px;
  -webkit-transform: rotate(45deg) translateX(-540px) translateY(-100px);
          transform: rotate(45deg) translateX(-540px) translateY(-100px);
  background: #10a1ea;
  z-index: 1;
}
.button:before {
  transition: -webkit-transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55), -webkit-transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  content: attr(title);
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  color: #000;
  z-index: 2;
  text-align: center;
  padding: 20px 40px;
  -webkit-transform: translateY(200px);
          transform: translateY(200px);
}
.button:hover {
  text-decoration: none;
}
.button:hover:after {
  -webkit-transform: translateX(-300px) translateY(-100px);
          transform: translateX(-300px) translateY(-100px);
}
.button:hover:before {
  -webkit-transform: translateY(0);
          transform: translateY(0);
}


</style>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<body>


<div  class="open">
  <span class="cls"></span>
  <span>
    <ul class="sub-menu ">
      <li>
        <a href='master.php?hal=home' title="contact"> Beranda <i class="glyphicon glyphicon-home"> </i></a>
      </li>
      <li>
        <a href='master.php?hal=all-tiket' title="about">Semua Tiket <i class="fa fa-ticket"></i></a>
      </li>
      <li>
        <a href='master.php?hal=konfirmasi-pembayaran' title="jobs">Konfirmasi Pembayaran <i class="glyphicon glyphicon-ok-circle"></i></a> 
      </li>
      <li>
        <a href='master.php?hal=status-tiket' title="skills">Cek Status Tiket <i class="glyphicon glyphicon-check"> </i></a>
      </li>
      <li>
        <a href='master.php?hal=info-pembayaran' title="contact">Info Pembayaran <i class="glyphicon glyphicon-info-sign"> </i></a>
      </li>
      
      <br>
      <?php 
      if ($userRow['nama'] != '') {
            echo "<li><a href='master.php?hal=edit-profil'>Hello, <strong>".$cetakNama."</strong></a></li>";
            echo "<li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span> Logout </a></li>";
           ;}
            ?>
      
    </ul>
  </span>
  <span class="cls"></span>
</div>



<script type="text/javascript">
  $(document).ready(function() {
    $(document).delegate('.open', 'click', function(event){
      $(this).addClass('oppenned');
      event.stopPropagation();
    })
    $(document).delegate('body', 'click', function(event) {
      $('.open').removeClass('oppenned');
    })
    $(document).delegate('.cls', 'click', function(event){
      $('.open').removeClass('oppenned');
      event.stopPropagation();
    });
  });
</script>
</body>


</html>