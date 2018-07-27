<div class="panel-body">
	    	<h1>Info Pembayaran</h1>
<div class="table-responsive">
  
<?php
			 $q=mysql_query("select * from modul where id_modul='1'");
			 $carabeli=mysql_fetch_array($q);
            echo "<p align='justify'>$carabeli[static_content] </p>";
          ?>

</div>

	      </div>