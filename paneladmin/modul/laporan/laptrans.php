<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data tiket</h1>  					
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
	<br/>				

	<h2>LAPORAN TRANSAKSI</h2>
    <form method="post" action="report_transaction_view.php">
  	<table width="525" border="0" height="120" class="laporan">
    <tr height="30">
      <td colspan="3" bgcolor="#CCCCCC">
      	&nbsp;&nbsp;&nbsp;<label>
      	  <input name="berdasar" type="radio" value="Semua Data"  checked /><strong>Semua Data</strong>
        </label>
      </td>
      </tr>
    <tr bgcolor="#CCCCCC" height="30">
      <td width="150">
      	&nbsp;&nbsp;&nbsp;<label>
        	<input name="berdasar" type="radio" value="Tanggal" /><strong>Tanggal</strong>
        </label>
      </td>
      <td><input name="dari" type="text" id='datepicker' value="Dari" size="12" class="textbox" /></td>
      <td><input name="ke" type="text" id='datepicker1' class="textbox" value="Ke" /></td>
      </tr>
    <tr bgcolor="#CCCCCC" height="30">
      <td>
      	&nbsp;&nbsp;&nbsp;
        <label>
      	<input name="berdasar" type="radio" value="Pencarian Kata" /><strong>Pencarian Kata</strong>
        </label>
      </td>
      <td><select name="field" id="field">
        <option>Pilih Field</option>
          <option value="tgl_order">tgl_order</option>
          <option value="nama_lengkap">Nama kustomer</option>
          <option value="id_orders">No Order</option>
         
         
      </select></td>
      <td><input name="kata" type="text" id="kata" class="textbox" /></td>
      </tr>
    <tr bgcolor="#CCCCCC" height="30">
      <td colspan="3" align="center">
        <input type="submit" name="Submit" id="btn_tampilkan" value="Tampilkan" />      </td>
      </tr>
  </table>
  	<p>&nbsp;</p>
  <p>&nbsp; </p>
  <p>&nbsp;</p>
</form>


<br/>	
 </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>