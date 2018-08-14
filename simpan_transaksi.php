<div class="row">
						<?php						
						$tgl_skrg = date("Ymd");
						$jam_skrg = date("H:i:s");
									  
$id_orders = $_REQUEST['id'];
$sql = mysql_query("select * from orders where id_orders = '$id_orders'");
$data = mysql_fetch_array($sql);
	
 	$value = "Simpan";	//modus input data baru
 	$data['tanggal']=date("Y-m-d");
	//buat kode otomatis
	$query_oto = mysql_query("select max(id_orders)
								as maksi from orders");
	$data_oto = mysql_fetch_array($query_oto);
	$data_potong = substr($data_oto['maksi'],5,5);
	$data_potong++;
	$kode="";
	for ($i=strlen($data_potong); $i<=4; $i++)
		$kode = $kode."0";
	   $data['id_orders'] = "ORD-$kode$data_potong";						

// simpan identitas Pnumpang													  
				if(isset($_POST['btnSave'])){
				//hitung jumlah form yang dikirim
					  $jumlah = count($_POST['nama']);
			//jika hanya akan memproses data yang nim dan namanya tidak kosong
					for($a=0; $a<$jumlah; $a++){
					$urut					= $a+1;
					$nama					= $_POST['nama'][$a];
					$naik					= $_POST['naik'][$a];
					$email					= $_POST['email'][$a];
					$kursi					= $_POST['kursi'][$a];
					$kategori_penumpang		= $_POST['kategori_penumpang'][$a];

					
					if(trim($nama) !="" and trim($naik) !=""){
					
					//Simpan ke tabel kursi									   
							mysql_query("INSERT INTO kursi(id_tiket,
														   id_orders,
														   nama_kursi,
														   nama_penumpang,
														   naik,
														   kategori_penumpang) 
													VALUES('$_POST[tiket]',
														   '$data[id_orders]',
														   '$kursi',
														   '$nama',
														   '$naik',
														   '$kategori_penumpang')");		
												   
					}	
					}
					}


			if(isset($_POST['btnSave'])){
				$kategori_penumpang = $_POST['kategori_penumpang'];
				$hrg = 0;
				$harga_sementara = 0;
				$grand_total = 0;
				$potongan_diskon = 0;
				$id_tiket = $_POST['tiket'];
				$jmlKursi = $_GET['jml'];

				$getHrg = mysql_query("SELECT * FROM tiket WHERE id_tiket = '$id_tiket'");
						$dataHrg = mysql_fetch_array($getHrg);
						
						$hargaanak = $dataHrg['harga_mahasiswa'];
						$hargadewasa = $dataHrg['harga'];

						// $kategori_dewasa = $kategori_penumpang >= ['dewasa'];
						// $kategori_anak 	= $kategori_penumpang >= ['anak'];

						//  $k = $kategori_dewasa and $kategori_anak;

						//  $kon = $k = true;

						// $tambah = $hargaanak+$hargadewasa;
						// $hasil = "$tambah";
						 // var_dump($);
						// var_dump($hasil);


				//0,1,2

				$batas_kategori = count($kategori_penumpang);

				for($i = 0; $i < $batas_kategori; $i++)
				{
					if($kategori_penumpang[$i] == 'dewasa') {
						$disc     = ($dataHrg['diskon']/100)*$dataHrg['harga'];
						$hrgdisc = $dataHrg['harga']-$disc;
						$hrg = $hrgdisc*$jmlKursi;
						$harga_sementara = $harga_sementara + $hargadewasa;
						//echo 'ini dewasa';
					}elseif($kategori_penumpang[$i] == 'anak') {
						$disc     = ($dataHrg['diskon']/100)*$dataHrg['harga_mahasiswa'];
						$hrgdisc = $dataHrg['harga_mahasiswa']-$disc;
						$hrg = $hrgdisc*$jmlKursi;
						$harga_sementara = $harga_sementara + $hargaanak;
					}
					// else {
					// 	$gabung		= $hargaanak+$hargadewasa;
					// 	$disc     = ($dataHrg['diskon']/100)*$gabung;
					// 	$hrgdisc = $gabung-$disc;
					// 	$hrg = $hrgdisc*$jmlKursi;
					// 	 // echo 'ini akan munculllllllllllllllllll';
					// }
				}


				$potongan_diskon = $harga_sementara*($dataHrg['diskon']/100);
				$grand_total = $harga_sementara-$potongan_diskon;
				//echo 'Harga sementara : ' . $harga_sementara;
				//echo '<br/>Harga setelah diskon : ' . $grand_total;


		//		var_dump($gabung);
				//hitung jumlah form yang dikirim
					  $jumlah = count($_POST['nama_pemesan']);
			//jika hanya akan memproses data yang nim dan namanya tidak kosong
					for($a=0; $a<$jumlah; $a++){
					$urut			= $a+1;
					$nama_pemesan   = $_POST['nama_pemesan'][$a];
					$hp				= $_POST['naik'][$a];
					$email				= $_POST['email'][$a];
					$alamat				= $_POST['alamat'][$a];
					if(trim($nama_pemesan) !=""){
					//jika mau dimasukkan ke databases, silahkan buat query anda disini
					
						// simpan identitas Pemesan
						mysql_query("INSERT INTO kustomer(nama_lengkap,
														  alamat,
														  email,
														  telpon,
														  id_orders) 
												   VALUES('$nama_pemesan',
														  '$alamat',
														  '$email',
														  '$hp',
														  '$data[id_orders]')");
														  
					// simpan data pemesanan 
						mysql_query("INSERT INTO orders(id_orders,
														tgl_order,
														jam_order,
														id_kustomer,
														id_tiket,
														jumlah,
														hargatotal) 
												 VALUES('$data[id_orders]',
														'$tgl_skrg',
														'$jam_skrg',
														'$email',
														'$id_tiket',
														'$_GET[jml]',
														'$grand_total')");
					
					}	
					}
					}

					
echo"<div class='row'>
<div class='col-sm-8'>
    <div class='panel panel-default'>
    <div class='panel-heading'><span class='glyphicon glyphicon-search'></span> <b>Transaksi Sukses</b></div>
    <div class='panel-body'>
      <center>
      <p>Kode Pemesanan Tiket :</p>
        <h1>$data[id_orders]</h1>
        <form action='master.php?hal=status-tiket' method='post' accept-charset='utf-8'>        
		<input name='kode_unik' value='$data[id_orders]' type='hidden'>
          <input name='kode' value='Lihat Status Tiket' class='btn btn-danger btn-lg' type='submit'>
        </form>        <div>&nbsp;</div>
        <p>Mohon simpan kode pemesanan anda untuk melanjutkan proses selanjutnya !</p>
      </center>
    </div>
  </div>
    </div>
</div>";					
						
?>
</div>