<?php

echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		 
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Kursi Tiket</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>"; 
$show = mysql_query("SELECT * FROM tiket WHERE id_tiket='$_GET[id]'");
    $r    = mysql_fetch_array($show);
$from=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$r[dari]'"));
 $to=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$r[ke]'"));
echo"<center><h2>Tiket $from[nama_kota] - $to[nama_kota]</h2><br/>available seat : $r[stok] seat<br/><br/></center>";	
?>
    
	
	  	<center>
		<table>
					<tbody>
				<tr>
				<td class="btn-group" width="139">
				<!--=================================================START 1A=========================================================-->
				<?php
			    $a1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='1A'"));	
			  if($a1['nama_kursi']=="1A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='1A' id='1A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;1A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='1A' id='1A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;1A
					</label>";}
			   ?>
					
				<!--=================================================START 1B=========================================================-->	
				<?php
			    $b1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='1B'"));	
			  if($b1['nama_kursi']=="1B"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='1B' id='1B' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;1B
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='1B' id='1B' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;1B
					</label>";}
			   ?>	
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
				<!--=================================================START 1C=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='1C'"));	
			  if($c1['nama_kursi']=="1C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='1C' id='1C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;1C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='1C' id='1C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;1C
					</label>";}
			   ?>
			   <!--=================================================START 1D=========================================================-->	
			   <?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='1D'"));	
			  if($c1['nama_kursi']=="1D"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='1D' id='1D' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;1D
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='1D' id='1D' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;1D
					</label>";}
			   ?>	
				</td>
				</tr>
				<tr>
				<td class='btn-group' width='139'>
				 <!--=================================================START 2A=========================================================-->
				    <?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='2A'"));	
			  if($c1['nama_kursi']=="2A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='2A' id='2A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;2A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='2A' id='2A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;2A
					</label>";}
			   ?>
			   	<!--=================================================START 2B=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='2B'"));	
			  if($c1['nama_kursi']=="2B"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='2B' id='2B' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;2B
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='2B' id='2B' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;2B
					</label>";}
			   ?>
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
					<!--=================================================START 2C=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='2C'"));	
			  if($c1['nama_kursi']=="2C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='2C' id='2C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;2C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='2C' id='2C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;2C
					</label>";}
			   ?>
			    <!--=================================================START 2D=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='2D'"));	
			  if($c1['nama_kursi']=="2D"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='2D' id='2D' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;2D
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='2D' id='2D' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;2D
					</label>";}
			   ?>	
					</td>
				</tr>
				<tr>
				<td class='btn-group' width='139'>
					<!--=================================================START 3A=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='3A'"));	
			  if($c1['nama_kursi']=="3A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='3A' id='3A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;3A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='3A' id='3A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;3A
					</label>";}
			   ?>
				<!--=================================================START 3B=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='3B'"));	
			  if($c1['nama_kursi']=="3B"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='3B' id='3B' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;3B
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='3B' id='3B' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;3B
					</label>";}
			   ?>	
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
				<!--=================================================START 3C=========================================================-->
			  <?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='3C'"));	
			  if($c1['nama_kursi']=="3C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='3C' id='3C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;3C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='3C' id='3C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;3C
					</label>";}
			   ?>
				<!--=================================================START 3D=========================================================-->
			<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='3D'"));	
			  if($c1['nama_kursi']=="3D"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='3D' id='3D' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;3D
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='3D' id='3D' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;3D
					</label>";}
			   ?>	
				</td>
				</tr>
				<tr>
				<td class='btn-group' width='139'>
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
				<!--=================================================START 4C=========================================================-->
			<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='4C'"));	
			  if($c1['nama_kursi']=="4C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='4C' id='4C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;4C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='4C' id='4C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;4C
					</label>";}
			   ?>
				<!--=================================================START 4D=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='4D'"));	
			  if($c1['nama_kursi']=="4D"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='4D' id='4D' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;4D
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='4D' id='4D' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;4D
					</label>";}
			   ?>	
				</td>
				</tr>
				<tr>
				<td class='btn-group' width='139'>
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
				<!--=================================================START 5C=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='5C'"));	
			  if($c1['nama_kursi']=="5C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='5C' id='5C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;5C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='5C' id='5C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;5C
					</label>";}
			   ?>
				<!--=================================================START 5D=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='5D'"));	
			  if($c1['nama_kursi']=="5D"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='5D' id='5D' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;5D
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='5D' id='5D' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;5D
					</label>";}
			   ?>	
				</td>
				</tr>
				<tr>
				<td class='btn-group' width='139'>
				<!--=================================================START 4A=========================================================-->
				<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='4A'"));	
			  if($c1['nama_kursi']=="4A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='4A' id='4A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;4A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='4A' id='4A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;4A
					</label>";}
			   ?>
				<!--=================================================START 4B=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='4B'"));	
			  if($c1['nama_kursi']=="4B"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='4B' id='4B' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;4B
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='4B' id='4B' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;4B
					</label>";}
			   ?>	
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
				<!--=================================================START 6C=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='6C'"));	
			  if($c1['nama_kursi']=="6C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='6C' id='6C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;6C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='6C' id='6C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;6C
					</label>";}
			   ?>
				<!--=================================================START 6D=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='6D'"));	
			  if($c1['nama_kursi']=="6D"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='6D' id='6D' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;6D
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='6D' id='6D' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;6D
					</label>";}
			   ?>	
				</td>
				</tr>
				<tr>
				<td class='btn-group' width='139'>
				<!--=================================================START 5A=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='5A'"));	
			  if($c1['nama_kursi']=="5A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='5A' id='5A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;5A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='5A' id='5A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;5A
					</label>";}
			   ?>
				<!--=================================================START 5B=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='5B'"));	
			  if($c1['nama_kursi']=="5B"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='5B' id='5B' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;5B
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='5B' id='5B' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;5B
					</label>";}
			   ?>	
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
				<!--=================================================START 7C=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='7C'"));	
			  if($c1['nama_kursi']=="7C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='7C' id='7C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;7C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='7C' id='7C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;7C
					</label>";}
			   ?>
			 <!--=================================================START 7D=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='7D'"));	
			  if($c1['nama_kursi']=="7D"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='7D' id='7D' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;7D
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='7D' id='7D' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;7D
					</label>";}
			   ?>	
								</td>
			</tr>
					<tr>
				<td class='btn-group' width='139'>
				<!--=================================================START 6A=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='6A'"));	
			  if($c1['nama_kursi']=="6A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='6A' id='6A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;6A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='6A' id='6A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;6A
					</label>";}
			   ?>
			  <!--=================================================START 6B=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='6B'"));	
			  if($c1['nama_kursi']=="6B"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='6B' id='6B' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;6B
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='6B' id='6B' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;6B
					</label>";}
			   ?>	
								</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
				<!--=================================================START 8C=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='8C'"));	
			  if($c1['nama_kursi']=="8C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='8C' id='8C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;8C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='8C' id='8C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;8C
					</label>";}
			   ?>
			<!--=================================================START 8D=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='8D'"));	
			  if($c1['nama_kursi']=="8D"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='8D' id='8D' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;8D
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='8D' id='8D' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;8D
					</label>";}
			   ?>	
								</td>
			</tr>
					<tr>
				<td class='btn-group' width='139'>
								  <!--=================================================START 7A=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='7A'"));	
			  if($c1['nama_kursi']=="7A"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='7A' id='7A' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;7A
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='7A' id='7A' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;7A
					</label>";}
			   ?>
			   
			   <!--=================================================START 7B=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='7B'"));	
			  if($c1['nama_kursi']=="7B"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='7B' id='7B' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;7B
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='7B' id='7B' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;7B
					</label>";}
			   ?>	
								</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
								  <!--=================================================START 9C=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='9C'"));	
			  if($c1['nama_kursi']=="9C"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='9C' id='9C' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;9C
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='9C' id='9C' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;9C
					</label>";}
			   ?>
			   
			   <!--=================================================START 9D=========================================================-->
<?php
			    $c1=mysql_fetch_array(mysql_query("SELECT * FROM kursi WHERE kursi.id_tiket='$_GET[id]' AND nama_kursi='9D'"));	
			  if($c1['nama_kursi']=="9D"){
			  echo"<label class='btn btn-warning'>
				    <input name='kursi[]' value='9D' id='9D' onclick='cer(this)' autocomplete='off' disabled='disabled' type='checkbox'>&nbsp;9D
					</label>";}
			  else {
			  echo"<label class='btn btn-default'>
				    <input name='kursi[]' value='9D' id='9D' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;9D
					</label>";}
			   ?>	
								</td>
			</tr>
				</tbody>
				</table>
	  	</center>
		<br/>
<h4>Keterangan Pemesan:</h4>
	<?php
	// tampilkan data Penumpang
   $penumpang=mysql_query("select * from kursi where id_tiket='$_GET[id]'");
    echo "<table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
        <tr>
			<th width='3%'><input type='checkbox' name='checkbox'/></th>
			<th>No Kursi</th>
			<th>No Orders</th>
			<th>Nama Penumpang</th>
			<th>Action</th>
		</tr></thead>
                            <tbody>";
$jumlah = mysql_num_rows($penumpang);
	// Apabila ditemukan tiket dalam kategori
		if ($jumlah > 0){		
while($p=mysql_fetch_array($penumpang)){
    echo "<tr><td><input type='checkbox' name='checkbox'/></td>
			  <td><b>$p[nama_kursi]</b></td>
			  <td><b>$p[id_orders]</b></td>
			  <td>$p[nama_penumpang]</td>
			  <td><a href=?p=kursi&act=editkursi&id=$r[id_kursi]><b>Edit</b></a></td>
			
			  </tr>
			   ";	
		}
		}
  else{
    echo "<tr>
		  
		  <td></td>
		  <td>Belum ada yang pesan ditiket ini.</td>
		  <td></td>
		  <td></td>
		  <td></td>
		  </tr>";
  }
		
	echo"</tbody>
                        </table></table>";
	?>		
	 
                </div> 
				
				</div>            
                   
        </div>
		
    </div>
<br/>


    <div class='dr'><span></span></div> </div>


<?