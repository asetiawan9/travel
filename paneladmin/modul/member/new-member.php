<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/member/aksi_member.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
     <div class='workplace'>
    <div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Member</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Nama</th>
                                    <th width='25%'>Telp</th>
                                    <th width='25%'>Alamat</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

              $tp=mysql_query('SELECT * FROM members WHERE status="not_activated" ORDER BY id_members ASC');
              while($r=mysql_fetch_array($tp)){
              $tgl=tgl_indo($r[tgl]);
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td><a href='?p=new-member&aksi=kiriminvoice&id=$r[id_members]'>$r[nama]</a> [Point$r[point]] </td>
                                    <td>$r[telp]</td>
                  <td>$r[universitas] <br>status :<strong> $r[status]</strong></td>
                                    <td><a href='?p=new-member&aksi=detail&id=$r[id_members]'>Detail | <a>
                    <a href='$aksi?act=delNew-member&id=$r[id_members]'>Hapus<a></td>
                                    
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
  $edit = mysql_query("SELECT * FROM members WHERE id_members='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
  $tgl=tgl_indo($r[tgl]);
echo "";
echo "<div class='content'>
    <div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Data Member</h1>
                    </div>    
          <input type=hidden name=id value=$r[id_members]>
                      
            <div class='row-form clearfix'>
                            <div class='span3'>Nama kustomer</div>
                            <div class='span9'><input type='text' name='nama_lengkap' value='$r[nama]' readonly/></div>
                      </div>
          
            <div class='row-form clearfix'>
                            <div class='span3'>NIK / NIM</div>
                            <div class='span9'><input type='text' name='email' value='$r[nim]' readonly/></div>
                      </div>

             <div class='row-form clearfix'>
                            <div class='span3'>Alamat</div>
                            <div class='span9'><input type='text' name='nama_lengkap' value='$r[universitas]' readonly/></div>
                        </div>
                      
             <div class='row-form clearfix'>
                            <div class='span3'>Telpon</div>
                            <div class='span9'><input type='text' name='telpon' value='$r[telp]' readonly/></div>
                        </div>
             <div class='row-form clearfix'>
                            <div class='span3'>Status</div>
                            <div class='span9'><strong>$r[status]</strong></div>
                        </div>";
            
                echo"</div>
                </div>
                
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Foto KTP / KTM</h1>
                    </div>                      
                    <div class='row-form clearfix'>
                      <div class='span12'> <img src='../".$r["path_idcard"]."'/> </div>
                    </div>
                    <div class='row-form clearfix'>
                      <div class='span12' style='text-align: center;'>
                        <a href='$aksi?act=active&id=$r[id_members]' role='button' class='btn btn-primary'>Aktifkan Member!</a><br/>
                        <p style='color: red;'>*Dimohon untuk mengecek terlebih dahulu data member khususnya kartu mahasiswa</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
      <input type='submit' class='btn' value='<< Back' onclick='history.go(-1);'>
    </div>
<div class='dr'><span></span></div>";
break;

case "kiriminvoice":
 $tampil = mysql_query("SELECT * FROM members WHERE id_members='$_GET[id]'");
    $r = mysql_fetch_array($tampil);

echo "<div class='content'>
    <div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>";
            
    echo "<h1>Kirim Message</h1></div> 
          <form method='POST' action='?p=member&act=kirimemail'>
          <table  cellpadding='0' cellspacing='0' width='100%' class='table'>
          <tr><td>Kepada</td><td> : <input type=text name='email' size='30' value='$r[email]' readonly></td></tr>
          <tr><td>Subjek</td><td> : <input type=text name='subjek' size='50'></td></tr>
          <tr><td>Pesan</td><td><textarea name='pesan' style='width: 600px; height: 350px;' id='wysiwyg' >Assalamu'alaikum Wr. Wb.      
      
       <br/><br/><br/><br/><br/><br/><br/><br/><br/>
      <p>Salam,</p>
      <p>Aya Travel</p>   
  ------------------------------------------------------------------------------------------------
  </textarea></td></tr>
          <tr><td colspan=2><input type='submit' class='btn btn-primary' value='Kirim'>
                            <input type='button' class='btn btn-danger' value='Batal' onclick='self.history.back()'></td></tr>
          </table></form>";
  echo "         </div>
                </div>                                
                
            </div>            
            
            <div class='dr'><span></span></div>
        </div>
        
    </div>";
  

     break;
    
  case "kirimemail":
    mail($_POST[email],$_POST[subjek],$_POST[telpon],"From: ayatravel@gmail.com");
    echo "<h2>Status Email</h2>
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";        
    break;

    }//penutup switch
}//penutup session
?>    
</body>
</html>