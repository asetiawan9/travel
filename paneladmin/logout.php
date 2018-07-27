<?php
  session_start();
//  session_destroy();
  unset($_SESSION['namauser']);
  unset($_SESSION['namalengkap']);
  unset($_SESSION['passuser']);
  unset($_SESSION['leveluser']);
  echo "<script>alert('Anda Keluar Dari Halaman Administrator'); window.location = 'index.php'</script>";
?>
