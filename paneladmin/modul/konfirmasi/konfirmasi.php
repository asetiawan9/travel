<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/konfirmasi/aksi_konfirmasi.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data konfirmasi</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='10%'>No Order</th>
                                    <th width='25%'>Rek. Bank</th>
									<th width='25%'>Jumlah</th>
									<th width='25%'>Pengirim</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM konfirmasi WHERE status_konfirmasi="unverified" ORDER BY id_konfirmasi ASC');
							while($r=mysql_fetch_array($tp)){
							$tgl=tgl_indo($r[tgl]);
							 $bank=mysql_fetch_array(mysql_query("SELECT * FROM bank WHERE bank.id_bank='$r[id_bank]'"));
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[id_orders]</td>
                                    <td>$bank[nama_bank]</td>
									<td>$r[jumlah]</td>
									<td>$r[pengirim]</td>
                                    <td><a href='?p=konfirmasi&aksi=detail&id=$r[id_konfirmasi]'>Detail | <a>
										<a href='$aksi?act=hapus&id=$r[id_konfirmasi]'>Hapus<a></td>
                                    
                                </tr>";
							}
                               
                               
                                        
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";    

break;
case "detail":
	$edit = mysql_query("SELECT * FROM konfirmasi WHERE id_konfirmasi='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	$tgl=tgl_indo($r[tgl]);
	$bank=mysql_fetch_array(mysql_query("SELECT * FROM bank WHERE bank.id_bank='$r[id_bank]'"));
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Informasi Pembayaran</h1>
                    </div>    
					<input type='hidden' name='id' value='$r[id_konfirmasi]'>
                      
					  <div class='row-form clearfix'>
                            <div class='span3'>No Order</div>
                            <div class='span9'><input type='text' name='nama' value='$r[id_orders]' readonly/></div>
                      </div>
					
					  <div class='row-form clearfix'>
                            <div class='span3'>Nama Bank</div>
                            <div class='span9'><input type='text' name='nama' value='$bank[nama_bank]' readonly/></div>
                      </div>

					   <div class='row-form clearfix'>
                            <div class='span3'>Jumlah transfer</div>
                            <div class='span9'><input type='text' name='nama' value='$r[jumlah]' readonly/></div>
                        </div>
                      
					   <div class='row-form clearfix'>
                            <div class='span3'>Pengirim</div>
                            <div class='span9'><input type='text' name='nama' value='$r[pengirim]' readonly/></div>
                        </div>
                        </div>
                        <div style='height: 25px'></div>
                        <input type='submit' class='btn' value='<< Back' onclick='history.go(-1);'>
                </div>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Bukti Pembayaran</h1>
                    </div>                      
                    <div class='row-form clearfix'>
                      <div class='span12' style='text-align: center;'> <img style='width: 100%; height: 400px' src='../".$r["bukti"]."'/> </div>
                    </div>
                    <div class='row-form clearfix'>
                      <div class='span12' style='text-align: center;'>
                        <a href='$aksi?act=konfirmasi&id=$r[id_konfirmasi]' role='button' class='btn btn-primary'>Konfirmasi</a><br/>
                        <p style='color: red;'>*Dimohon untuk mengecek terlebih dahulu bukti pembayaran</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
		</div>
<div class='dr'><span></span></div>";
break;

case "kiriminvoice":
 $tampil = mysql_query("SELECT * FROM konfirmasi WHERE id_konfirmasi='$_GET[id]'");
    $r      = mysql_fetch_array($tampil);

echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>";
						
    echo "<h1>Kirim Faktur Pembelian</h1></div> 
          <form method=POST action='?p=konfirmasi&act=kirimemail'>
          <table  cellpadding='0' cellspacing='0' width='100%' class='table'>
          <tr><td>Kepada</td><td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td>Subjek</td><td> : <input type=text name='subjek' size=50 value='$r[subjek]'></td></tr>
          <tr><td>Pesan</td><td><textarea name='pesan' style='width: 600px; height: 350px;' id='wysiwyg' >Assalamu'alaikum Wr. Wb.		  
		  
		   <br/><br/><br/><br/><br/><br/><br/><br/><br/>
		  <p>Salam,</p>
		  <p>SixghaDesign</p>   
  ------------------------------------------------------------------------------------------------
  </textarea></td></tr>
          <tr><td colspan=2><input type=submit value=Kirim>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
	echo "         </div>
                </div>                                
                
            </div>            
            
            <div class='dr'><span></span></div>
        </div>
        
    </div>";
	

     break;
    
  case "kirimemail":
    mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: webmaster@ayatravel.com");
    echo "<h2>Status Email</h2>
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	 		  
    break;

		}//penutup switch
}//penutup session
?>    
</body>
</html>