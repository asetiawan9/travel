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
	
				</td>
				<td>&nbsp;</td>
				<td class='btn-group' width='139'>
				<!--=================================================START 1C=========================================================-->
				<label class='btn btn-primary'>
				    Supir
					</label>
			   <!--=================================================START 1D=========================================================-->	
	
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
	
				</td>
				</tr>
				<tr>
				<td class='btn-group' width='139'>
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
				</td>
				</tr>

				</tbody></table>
	  	</center>