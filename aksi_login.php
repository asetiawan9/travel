<?php
session_start();
include_once 'config/koneksi.php';

if(isset($_SESSION['mahasiswa'])!="")
{
 header("Location: master.php?hal=home");
}
if(isset($_POST['login']))
{
 $email = mysql_real_escape_string($_POST['email']);
 $upass = mysql_real_escape_string($_POST['password']);
 $res=mysql_query("SELECT * FROM members WHERE email='$email' AND status='active'");
 $row=mysql_fetch_array($res);
 if($row['password']==md5($upass))
 {
  $_SESSION['mahasiswa'] = $row['nim'];
  header("Location: master.php?hal=home");
 }
 else
 {
  ?>
        <script>alert('Login Gagal, username atau password anda salah!'); window.location = 'master.php?hal=login'</script>
        <?php

 }
 
}
?>