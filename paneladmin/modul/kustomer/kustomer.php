<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/kustomer/aksi_kustomer.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data kustomer</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Nama Kustomer</th>
                                    <th width='25%'>Alamat</th>
									                  <th width='25%'>Telp</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM kustomer ORDER BY id_kustomer ASC');
							while($r=mysql_fetch_array($tp)){
                $cekMember=mysql_query('SELECT email FROM members WHERE email="$r[email]"');
                $rMember=mysql_fetch_array($cekMember);
							$tgl=tgl_indo($r[tgl]);
              if(empty($rMember['email'])){
                $typeMember = 'Umum';
              } else {
                $typeMember = 'Mahasiswa';
              }
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td><a href='?p=kustomer&aksi=kiriminvoice&id=$r[id_kustomer]'>$r[nama_lengkap]</a> [Point$r[point]] </td>
                                    <td>$r[alamat]</td>
									                  <td>$r[telpon] <br>Aktif : <strong>$r[aktif]</strong> <br/> </td>
                                    <td><a href='?p=kustomer&aksi=detail&id=$r[id_kustomer]'>Detail | <a>
										<a href='$aksi?act=hapus&id=$r[id_kustomer]'>Hapus<a></td>
                                    
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
	$edit = mysql_query("SELECT * FROM kustomer WHERE id_kustomer='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	$tgl=tgl_indo($r[tgl]);
echo "<form method='post' action='modul/kustomer/aksi_kustomer.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>kustomer</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_kustomer]>
                      
					  <div class='row-form clearfix'>
                            <div class='span3'>Nama kustomer</div>
                            <div class='span9'><input type='text' name='nama_lengkap' value='$r[nama_lengkap]' readonly/></div>
                      </div>
					
					  <div class='row-form clearfix'>
                            <div class='span3'>email</div>
                            <div class='span9'><input type='text' name='email' value='$r[email]' readonly/></div>
                      </div>

					   <div class='row-form clearfix'>
                            <div class='span3'>Alamat</div>
                            <div class='span9'><textarea name='alamat' readonly>$r[alamat]</textarea></div>
                        </div>
                      
					   <div class='row-form clearfix'>
                            <div class='span3'>Telpon</div>
                            <div class='span9'><input type='text' name='telpon' value='$r[telpon]' readonly/></div>
                        </div>
						
						<div class='row-form clearfix'>
                            <div class='span3'>Discount Type</div>
                            <div class='span9'>
							<select name='level' id='s2_1' style='width: 100%;'>
							<option value='' selected>- Pilih Maskapai -</option>
							<option value='agent' selected>Agent </option>
							<option value='corporate' selected>Corporate </option>
							<option value='platinum' selected>Platinum Member </option>
							<option value='gold' selected>Gold Member </option>
							<option value='non' selected>Non Member </option>
							</select>
							</div>
                        </div>";
						
						if ($r[telpon]=='Y')
						{
					echo"<div class='row-form clearfix'>
                            <div class='span3'>Aktif</div>
                            <div class='span9'><input type='radio' name='aktif' value='Y' checked/>Aktif <input type='radio' name='aktif' value='N'/>Tidak Aktif
							
							</div>
                        </div>";
						}
						else
						{
						echo"<div class='row-form clearfix'>
                            <div class='span3'>Aktif</div>
                            <div class='span9'><input type='radio' name='aktif' value='Y'/>Aktif <input type='radio' name='aktif' value='N'  checked/>Tidak Aktif
							
							</div>
                        </div>";	
						}
						 
                echo"</div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
break;

case "kiriminvoice":
 $tampil = mysql_query("SELECT * FROM kustomer WHERE id_kustomer='$_GET[id]'");
    $r      = mysql_fetch_array($tampil);

echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>";
						
    echo "<h1>Kirim Faktur Pembelian</h1></div> 
          <form method=POST action='?p=kustomer&act=kirimemail'>
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
    mail($_POST[email],$_POST[subjek],$_POST[telpon],"From: sigit.prasetya@axis.blackberry.com");
    echo "<h2>Status Email</h2>
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	 		  
    break;

		}//penutup switch
}//penutup session
?>    
</body>
</html>