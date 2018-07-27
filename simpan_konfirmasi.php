<?php

if(isset($_POST['status']) && $_FILES['file']['size']>0)
{
    $id_orders=trim($_POST['id_orders']);
    $id_bank=trim($_POST['id_bank']);
    $jumlah=trim($_POST['jumlah']);
    $pengirim=trim($_POST['pengirim']);
    function GetImageExtension($imagetype)
               {
                 if(empty($imagetype)) return false;
                 switch($imagetype)
                 {
                     case 'image/bmp': return '.bmp';
                     case 'image/jpeg': return '.jpg';
                     case 'image/png': return '.png';
                     default: return false;
                 }
               }

          if (!empty($_FILES["file"]["name"])) {

            $file_name=$_FILES["file"]["name"];
            $temp_name=$_FILES["file"]["tmp_name"];
            $imgtype=$_FILES["file"]["type"];
            $ext= GetImageExtension($imgtype);
            $imagename=date("d-m-Y")."-".time().$ext;
            $target_path = "bukti_pembayaran/".$imagename;
            

            if(move_uploaded_file($temp_name, $target_path)) {
              $tgl = date("Y-m-d");
              mysql_query("INSERT INTO konfirmasi(id_orders,
                                       id_bank,
                                       jumlah,
                                       pengirim,
                                       tanggal,
                                       bukti) 
                            VALUES('$id_orders',
                                   '$id_bank',
                                   '$jumlah',
                                   '$pengirim',
                                   '$tgl',
                                   '$target_path')");

              echo '<div class="row">

  <div class="col-sm-12" style="text-align:center;">
        <div class="panel panel-default">
      <div class="panel-heading"><span class="glyphicon glyphicon-search"></span> <b>Konfirmasi Pembayaran Sukses</b></div>
      <div class="panel-body">
        <h1><?php echo"$_POST[id_orders]";?></h1>
        <p>Terima kasih, konfirmasi anda telah kami terima, pembayaran 
anda akan segera kami verifikasi. Setelah tiket aktif, anda akan 
menerima SMS konfirmasi dari kami.</p>
      </div>
    </div>
      </div>
</div>';
                echo "<meta http-equiv='refresh' content='10; url=master.php?hal=status-tiket'>";

            
            }else{
              echo '<script>window.alert("Sorry! Konfirmasi pembayaran gagal.")</script>';
                echo "<meta http-equiv='refresh' content='0; url=master.php?hal=konfirmasi-pembayaran'>";
            } 

          }
}
?>

