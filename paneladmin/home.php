<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>                
                <li class="active">Dashboard</li>
            </ul>
                        

            
        </div>
        
        <div class="workplace">
                                    
            <div class="row-fluid">
                <div class="span12">
                    
                    <div class='widgetButtons'>
                       <?php
					   $jmlprod=mysql_num_rows(mysql_query("select * from tiket"));
					   ?>                       
                        <div class='bb'>
                            <a href='?p=tiket' class='tipb' title='Total tiket'><span class='ibw-archive'></span></a>
                            <div class='caption red'><?php echo "$jmlprod"; ?></div>
                        </div>
                        
                       <?php
					   $jmlorder=mysql_num_rows(mysql_query("select * from orders"));
					   ?> 
                        <div class='bb gray'>
                            <a href='?p=order' class='tipb' title='Total Orders'><span class='ibw-calc'></span></a>
                            <div class='caption'><?php echo "$jmlorder"; ?></div>
                        </div>
                        
                       <?php
					   $jmlcus=mysql_num_rows(mysql_query("select * from kustomer"));
					   ?> 
                        <div class='bb yellow'>
                            <a href='?p=kustomer' class='tipb' title='Total Customer'><span class='ibw-user'></span></a>
                            <div class='caption green'><?php echo "$jmlcus"; ?></div>
                        </div>
                        
                       <?php
					   $jmlkomen=mysql_num_rows(mysql_query('SELECT * from konfirmasi WHERE status_konfirmasi = "unverified"'));
					   ?> 
                        <div class='bb red'>
                            <a href='?p=konfirmasi' class='tipb' title='Total Konfirmasi'><span class='ibw-chats'></span></a>
                            <div class='caption blue'><?php echo "$jmlkomen"; ?></div>
                        </div>
                        
                       <?php
					   $jmlkota=mysql_num_rows(mysql_query("select * from kota"));
					   ?> 
                        <div class='bb green'>
                            <a href='?p=destinasi' class='tipb' title='Total destinasi'><span class='ibw-mail'></span></a>                            
                            <div class='caption yellow'><?php echo "$jmlkota"; ?></div>
                        </div>
                        
                        <?php
                       $jmlmemberbaru=mysql_num_rows(mysql_query('SELECT * FROM members WHERE status="not_activated" ORDER BY id_members ASC'));
                       ?> 
                        <div class='bb blue'>
                           <a href='?p=new-member' class='tipb' title='Member Baru'><span class='ibw-users'></span></a>
                            <div class='caption red'><?php echo "$jmlmemberbaru"; ?></div>
                        </div>
                        

                    </div>
                    
                </div>
            </div>
            
            <div class="row-fluid">

                <div class="span4">                    

                    <div class="wBlock red clearfix">                        
                        <div class="dSpace">
                        <?php
						$sorder=mysql_query("select * from orders");
						$torder=mysql_num_rows($sorder);
						
						$sorder1=mysql_query("select * from orders where status_order='Baru'");
						$torder1=mysql_num_rows($sorder1);
						
						$selisihorder=$torder-$torder1;
						?>
                            <h3>Statistik Order</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--130,190,260,230,290,400,340,360,390--></span>
                            <span class="number"><?php echo"$torder"; ?></span>                    
                        </div>
                        
                        <div class="rSpace">
                            <span><?php echo"$torder"; ?> <b>Total Invoice</b></span>
                            <span><?php echo"$torder1"; ?> <b>Belum Lunas</b></span>
                            <span><?php echo"$selisihorder"; ?> <b>Lunas</b></span>
                        </div>                          
                    </div>                     
                    
                </div>                
                
                <div class="span4">                    
                 <?php
				 $cus=mysql_query("select distinct id_kustomer from orders")or die(mysql_error());
				 $jcus=mysql_num_rows($cus);
				 
				 $tcus=mysql_query("select * from kustomer ");
				 $tjcus=mysql_num_rows($tcus);
				 
				 $selisih=$tjcus-$jcus;
				 ?>
                    <div class="wBlock green clearfix">                        
                        <div class="dSpace">
                            <h3>Kustomer</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--5,10,15,20,23,21,25,20,15,10,25,20,10--></span>
                            <span class="number"><?php echo" $tjcus"; ?> </span>                    
                        </div>
                        <div class="rSpace">
                            <span><?php echo"$tjcus"; ?> <b>Total Kustomer</b></span>
                            <span><?php echo"$jcus"; ?> <b> Kustomer Aktif</b></span>
                            <span><?php echo"$selisih"; ?> <b>Kustomer Pasif</b></span>
                        </div>                          
                    </div>                                                            
                    
                </div>

                <div class="span4">                    
                 <?php
				  // Statistik user
					  // Statistik user
					$qstatistik=mysql_num_rows(mysql_query("select * from modul where nama_modul='Statistik User' and publish='Y'"));
					// Apabila modul Statistik diaktifkan Publish=Y, maka tampilkan modul Statistik
					//if ($qstatistik > 0){
					//  echo "<hr color=#e0cb91 noshade=noshade /><br />
					//        <img src='$f[folder]/images/statistik.jpg' /><br />";
					
					  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
					  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
					  $waktu   = time(); // 
					
					  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
					  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
					  // Kalau belum ada, simpan data user tersebut ke database
					  if(mysql_num_rows($s) == 0){
						mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
					  } 
					  else{
						mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
					  }
					
					  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
					  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
					  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
					  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
					  $bataswaktu       = time() - 300;
					  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));
					
					  $path = "counter/";
					  $ext = ".png";
					
					  $tothitsgbr = sprintf("%06d", $tothitsgbr);
					  for ( $i = 0; $i <= 9; $i++ ){
						   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
					  }
				 ?>				 
                    <div class="wBlock blue clearfix">
                        <div class="dSpace">
                            <h3>Total Hits</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>
                            <span class="number"><?php echo"$totalhits ";?></span>
                        </div>
                        <div class="rSpace">                                                                           
                            <span><?php echo"$pengunjung ";?><b>Pengunjung Hari ini</b></span>
                            <span><?php echo"$totalpengunjung";?> <b> TotalPengunjung</b></span>
                            <span><?php echo"$pengunjungonline";?> <b>Pengunjung Online</b></span>                                                        
                        </div>
                    </div>                      
                    
                </div>                
            </div>            
            
            <div class="dr"><span></span></div> 
            
            <div class="row-fluid">
                
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-archive"></div>
                        <h1>Tabs</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block-fluid accordion">
              		<h3>tiket Terbaru</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th width="60">Tgl Masuk</th><th>Nama tiket</th><th width="60">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								$tampiltiket=mysql_query("select * from tiket order by id_tiket ASC limit 3");
                                while($tiket=mysql_fetch_array($tampiltiket)){
								$from=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$tiket[dari]'"));
								$to=mysql_fetch_array(mysql_query("SELECT * FROM kota WHERE kota.id_kota='$tiket[ke]'"));
								echo"<tr>
                                        <td><span class='date'>$tiket[tgl_masuk]</span></td>
                                        <td><a href='?p=tiket&aksi=edit&id=$tiket[id_tiket]'>$from[nama_kota] - $to[nama_kota]</a></td>
                                        <td><span class='price'>$tiket[harga]</span></td>
                                    </tr>";
								}
								?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right"><a class="btn btn-small" href='?p=tiket'>More...</a></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>                        

                        <h3>Order</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                        <th width="60">Tanggal</th><th>Nama Kustomer</th><th width="60">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $tampilorder=mysql_query("select * from orders order by id_orders ASC limit 3");
                                while($order=mysql_fetch_array($tampilorder))
								{
                              echo "<tr>
                                        <td><span class='date'>$order[tgl_order]</span><span class='time'>$order[jam_order]</span></td>";
									
								   $tampilkustomer=mysql_query("select * from kustomer order by id_kustomer='$order[id_kustomer]' ASC limit 3");	
                                   $kustomer=mysql_fetch_array($tampilkustomer);
								   echo"<td><a href=?p=order&act=detailorder&id=$order[id_orders]>$kustomer[nama_lengkap]</a></td>";
                                   echo"<td><span class='price'>$order[status_order]</span></td>";
                                  echo"</tr>";
								}
								?>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right"><a class="btn btn-small" href='?p=order'>More...</a></td>
                                    </tr>
                                </tfoot>                                
                            </table>                           
                        </div>
                        
                        <h3>Data Kota</h3>
                        <div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                                <thead>
                                    <tr>
                                       <th>Nama Kota</th><th width="60">INT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								$tampilkota=mysql_query("select * from kota limit 3");
								while($kota=mysql_fetch_array($tampilkota))
								{
							    
                                echo"<tr>
                                        
                                        <td><a href='#'>$kota[nama_kota]</a></td>
                                        <td><span class='price'>$kota[initial]</span></td>
                                     </tr>";
								}
								?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right"><a class="btn btn-small" href='?p=destinasi'>More...</a></td>
                                    </tr>
                                </tfoot>                                
                            </table>                              
                        </div>                        
                        
                    </div>
                </div>
                
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-edit"></div>
                        <h1>Konfirmasi Transfer</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block news scrollBox">
                        
                        <div class="scroll" style="height: 270px;">
                          <?php 
						  $tampilsekilas=mysql_query("select * from konfirmasi ORDER BY id_konfirmasi ASC LIMIT 20");
						  while($sekilas=mysql_fetch_array($tampilsekilas))
						  { 
                       echo"<div class='item'>
                                <a href='#'></a>
                                <p>$sekilas[id_orders] a/n $sekilas[pengirim]</p>
                                <span class='date'></span>
                                <div class='controls'>                                    
                                    <a href='?p=konfirmasi&aksi=detail&id=$sekilas[id_konfirmasi]' class='icon-pencil tip' title='Edit'></a>
                                </div>
                            </div>";
						  }
						  ?>
                                                
                            
                        </div>
                        
                    </div>
                </div>                               

                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-cloud"></div>
                        <h1>Kustomer</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block users scrollBox">
                        
                        <div class="scroll" style="height: 270px;">
                     <?php 
					 $tampilcus=mysql_query("select * from kustomer");
					 while($customer=mysql_fetch_array($tampilcus))
					 {	   
                     echo"<div class='item clearfix'>
                                <div class='image'><a href='#'><img src='img/users/logo.jpg' width='32'/></a></div>
                                <div class='info'>
                                    <a href='?p=kustomer&aksi=detail&id=$customer[id_kustomer]' class='name'>$customer[nama_lengkap]</a>                                                                    
                                    <div class='controls'>"; 
								   if ($customer[aktif]=="Y")
								   {                                   
                                   echo"<a href='#' class='icon-ok'></a>";
								   }
								   else
								   {
                                   echo"<a href='#' class='icon-remove'></a>";
								   }
							  echo"</div>                                                                    
                                </div>
                            </div>";
					 }
						 ?>
                                    
                            
                        </div>
                        
                    </div>
                </div>                
                
                
            </div>

            <div class="dr"><span></span></div>            

        
        </div>
        
    </div>
</body>
</html>