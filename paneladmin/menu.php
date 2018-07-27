<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                <?php echo "Hallo,$_SESSION[namalengkap]"; ?>
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="img/users/aqvatarius.jpg" class="img-polaroid"/>                
            </div>
            <ul class="control"> 
                <li><span class="icon-user"></span> <?php echo "Hallo, $_SESSION[namalengkap]"; ?></li>               
                <li><span class="icon-share-alt"></span> <a href="logout.php">Logout</a></li>

            </ul>
        </div>
        
        <ul class="navigation">            
            <li class="active">
                <a href="?p=home">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="?p=cara-transfer">
                    <span class="isw-list"></span><span class="text">Cara Transfer</span>
                </a>
            </li> 
            <li>
                <a href="#">
                    <span class="isw-list"></span><span class="text">Ganti Password</span>
                </a>
            </li>
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Manajemen Scheduled</span>
                </a>
                <ul>
				 <li>
                        <a href="?p=kategori">
                            <span class="icon-th"></span><span class="text">Kategori Tiket</span>
                        </a>                  
                    </li> 
                    <li>
                        <a href="?p=tiket">
                            <span class="icon-th"></span><span class="text">Tiket</span>
                        </a>                  
                    </li> 
                          
                     <li>
                        <a href="?p=seat">
                            <span class="icon-th"></span><span class="text">Ketersediaan Kursi</span>
                        </a>                  
                    </li>                     
                   
                    <li>
                        <a href="?p=destinasi">
                            <span class="icon-check"></span><span class="text">Nama Kota</span>
                        </a>                  
                    </li> 

					
                </ul>                
            </li>
            <li class="openable">
                <a href="#">
                    <span class="isw-user"></span><span class="text">Manajemen Member</span>
                </a>
                <ul>
                 <li>
                        <a href="?p=new-member">
                            <span class="icon-user"></span><span class="text">Member Baru</span>
                        </a>                  
                    </li> 
                    <li>
                        <a href="?p=member">
                            <span class="icon-th"></span><span class="text">List Member</span>
                        </a>                  
                    </li>                     
                </ul>                
            </li> 
            <li  class="openable">
                <a href="#">
                    <span class="isw-archive"></span><span class="text">Modul Admin</span>                 
                </a>
                
                <ul>
                   
                
                    <li>
                        <a href="?p=identitas">
                            <span class="icon-user"></span><span class="text">Identitas Web</span>
                        </a>                  
                    </li>
					
				
                    <li>
                        <a href="?p=bank">
                            <span class="icon-refresh"></span><span class="text">Rekening Bank</span>
                        </a>
                    </li>    
                    <li>
                        <a href="?p=banner">
                            <span class="icon-resize-vertical"></span><span class="text">Link Terkait</span>
                        </a>                  
                    </li>
					
					 <li>
                        <a href="?p=logo">
                            <span class="icon-resize-vertical"></span><span class="text">Logo</span>
                        </a>                  
                    </li>
                                                            
                </ul>    
            </li>                        
            
             <li  class="openable">
                <a href="#">
                    <span class="isw-archive"></span><span class="text">Menu Transaksi</span>                 
                </a>
                 <ul>
				 <li>
                        <a href="?p=kustomer">
                            <span class="icon-th-large"></span><span class="text">Data Kustomer</span>
                        </a>                  
                    </li> 	
                    <li>
                        <a href="?p=order">
                            <span class="icon-shopping-cart"></span><span class="text">Order Masuk</span>
                        </a>                  
                    </li>
					 <li>
                        <a href="?p=konfirmasi">
                            <span class="icon-folder-close"></span><span class="text">Konfirmasi Transfer</span>
                        </a>
                    </li> 
                    <li>
                        <a href="?p=laptrans">
                            <span class="icon-folder-close"></span><span class="text">Lap Transaksi</span>
                        </a>
                    </li> 
									
                </ul>    
            </li>                                    
        </ul>
</body>
</html>