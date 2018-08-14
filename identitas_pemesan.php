<div class="row">
<?php
$jmlkursi = count($_POST['kursi']);
echo"<form action='master.php?hal=simpan-transaksi&jml=$jmlkursi' class='form-horizontal' method='post'>";

?>

 
	<?php
if(isset($_POST['btn'])){
//hitung jumlah form yang dikirim
$jmlkursi = count($_POST['kursi']);

	//jika hanya akan memproses data yang nim dan namanya tidak kosong
	for($a=0; $a<$jmlkursi; $a++){
	$nomor	= $a+1;
	$kursi	= $_POST['kursi'][$a];

	
	if(trim($kursi) !=""){
	
	
?>

<?php
$idtiket = $_GET['id'];
$tiketnya = mysql_query("SELECT * FROM tiket WHERE id_tiket='$idtiket'");
$dataTiket = mysql_fetch_array($tiketnya);

$naikDi = mysql_query("SELECT * FROM kota WHERE id_kota='$dataTiket[dari]'");
$getDi = mysql_fetch_array($naikDi);
?>    
<div class='col-sm-4'>
  <div class='panel panel-default'>
    <div class='panel-heading'><span class='glyphicon glyphicon-pushpin'></span> <b>Kursi <?php echo"$kursi"; ?></b></div>
	<input type='hidden' name='kursi[]' value='<?php echo"$kursi"; ?>'>
    <div class='panel-body'>

      <div class='form-group'>
        <div class='col-sm-12'>
          <?php
            if (empty($_SESSION['mahasiswa'])){
              echo "<input name='nama[]' maxlength='64' class='form-control' placeholder='Kursi nomor $kursi atas nama ...' title='Nama harus diisi !' type='text'>";
            } else {
              echo "<input name='nama[]' maxlength='64' class='form-control' type='text' value='$userRow[nama]'>";
            }
          ?>
        </div>
      </div>
      <!-- 
      hidden input untuk alamat kostumer -->
      <input type="hidden" name='naik[]' cols='18' rows='3' class='input-block-level form-control' value='<?php echo $userRow['telp']; ?>' readonly></input>


      <div class='form-group'>
        <div class='col-sm-12'>
          <input cols='18' rows='3' class='input-block-level form-control' value='<?php echo $getDi['nama_kota']; ?>' readonly></input>
        </div>
      </div>

      <div class='form-group'>
        <div class='col-sm-12'>

          <select  class='input-block-level form-control' name="kategori_penumpang[]">
            <option>-- Kategori Penumpang --</option>
            <option value='dewasa'>Dewasa</option>
            <option value='anak'>Anak-Anak</option>
          </select>
         
        </div>
      </div>
  </div>
  </div>
  </div>

<?php
}	
}
}
?>


<?php
$jumlah=1;
for($y=0; $y<$jumlah; $y++){
$nomor = $y + 1;

if (empty($_SESSION['mahasiswa'])){
  echo"<div class='col-sm-4'>
<input name='tiket' type='hidden' value='$_GET[id]'>
<input name='jumlah' type='hidden' value='2'>

  <div class='panel panel-default'>
    <div class='panel-heading'><span class='glyphicon glyphicon-user'></span> <b>Identitas Pemesan</b></div>
    <div class='panel-body'>

      <div class='form-group'>
        <div class='col-sm-12'>
          <input name='nama_pemesan[]' maxlength='64' class='form-control' placeholder='Nama Pemesan' type='text'></div>
      </div>

      <div class='form-group'>
        <div class='col-sm-12'>
          <input name='hp[]' maxlength='16' class='form-control' placeholder='Handphone' type='text'></div>
      </div>

      <div class='form-group'>
        <div class='col-sm-12'>
          <input name='email[]' maxlength='64' class='form-control' placeholder='Email' type='email' required
     ></div>
      </div>

      <div class='form-group'>
        <div class='col-sm-12'>
          <textarea name='alamat[]' cols='20' rows='3' id='alamat' maxlength='256' class='form-control' placeholder='Alamat'></textarea>                  </div>
      </div>

      <div class='form-group'>
        <div class='col-sm-12 btn-group'>
            <a href='#' class='btn btn-default'>Kembali</a>
            <input name='btnSave' value='Selanjutnya' class='btn btn-danger' type='submit'>
        </div>
      </div>
    </div>
    </div>
</div>";
} else {
    echo"<div class='col-sm-4'>
    <input name='tiket' type='hidden' value='$_GET[id]'>
    <input name='jumlah' type='hidden' value='2'>

      <div class='panel panel-default'>
        <div class='panel-heading'><span class='glyphicon glyphicon-user'></span> <b>Identitas Pemesan</b></div>
        <div class='panel-body'>

          <div class='form-group'>
            <div class='col-sm-12'>
              <input name='nama_pemesan[]' maxlength='64' class='form-control' placeholder='Nama Pemesan' type='text' value='$userRow[nama]' readonly></div>
          </div>

          <div class='form-group'>
            <div class='col-sm-12'>
              <input name='hp[]' maxlength='16' class='form-control' placeholder='Handphone' type='text' value='$userRow[telp]' readonly></div>
          </div>

          <div class='form-group'>
            <div class='col-sm-12'>
              <input name='email[]' maxlength='64' class='form-control' placeholder='Email' type='email' value='$userRow[email]' readonly></div>
          </div>

          <div class='form-group'>
            <div class='col-sm-12'>
              <textarea name='alamat[]' cols='20' rows='3' id='alamat' maxlength='256' class='form-control' placeholder='Alamat'></textarea>                  </div>
          </div>

          <div class='form-group'>
            <div class='col-sm-12 btn-group'>
                <a href='#' class='btn btn-default'>Kembali</a>
                <input name='btnSave' value='Selanjutnya' class='btn btn-danger' type='submit'>
            </div>
          </div>
        </div>
        </div>
    </div>";
  }
}
?>


  

    </form>

</div>	