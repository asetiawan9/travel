<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/ym/aksi_ym.php";
switch($_GET[aksi]){ 
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data ym</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='3%'><input type='checkbox' name='checkbox'/></th>
                                    <th width='23%'>Nama Website</th>
                                    <th width='23%'>Alamat Website</th>
									<th width='23%'>Meta Deskripsi </th>
                                    <th width='23%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query("SELECT * FROM identitas ORDER BY id_identitas ASC");
							while($r=mysql_fetch_array($tp)){
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama_website]</td>
                                    <td>$r[alamat_website]</td>
									<td>$r[meta_deskripsi]</td>
                                    <td><a href='?p=identitas&aksi=edit&id_identitas=$r[id_identitas]'>EDIT</a></td>
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
case "edit":
	$edit = mysql_query("SELECT * FROM identitas WHERE id_identitas='$_GET[id_identitas]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/identitas/aksi_identitas.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit Customer Online</h1>
                    </div>    
					<input type=hidden name=id_identitas value=$r[id_identitas]>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama</div>
                            <div class='span9'><input type='text' name='nama_website' value='$r[nama_website]'/></div>
                      </div>
						
					 <div class='row-form clearfix'>
                            <div class='span3'>Alamat Website</div>
                            <div class='span9'><input type='text' name='alamat_website' value='$r[alamat_website]'/></div>
                     </div>
					 
					  <div class='row-form clearfix'>
                            <div class='span3'>Meta Deskripsi</div>
                            <div class='span9'><input type='text' name='meta_deskripsi' value='$r[meta_deskripsi]'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Meta Keyword</div>
                            <div class='span9'><input type='text' name='meta_keyword' value='$r[meta_keyword]'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Telp</div>
                            <div class='span9'><input type='text' name='telp' value='$r[telp]'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Hp</div>
                            <div class='span9'><input type='text' name='hp' value='$r[hp]'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Email</div>
                            <div class='span9'><input type='text' name='email' value='$r[email]'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>FB</div>
                            <div class='span9'><input type='text' name='fb' value='$r[fb]'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Twitter</div>
                            <div class='span9'><input type='text' name='twitter' value='$r[twitter]'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>BBM</div>
                            <div class='span9'><input type='text' name='bbm' value='$r[bbm]'/></div>
                     </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Gplus</div>
                            <div class='span9'><input type='text' name='gplus' value='$r[gplus]'/></div>
                     </div>
					 
					 
						 
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
echo "";
break;

			}//penutup switch
}//penutup session
?>    
</body>
</html>