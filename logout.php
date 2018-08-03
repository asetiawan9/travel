<?php
session_start();

if(!isset($_SESSION['mahasiswa']))
{
 header("Location: master.php?hal=login");
}
else if(isset($_SESSION['mahasiswa'])!="")
{
 header("Location: master.php?hal=login");
}

if(isset($_GET['logout']))
{
// session_destroy();
 unset($_SESSION['mahasiswa']);
 header("Location: master.php?hal=login");
}
?>