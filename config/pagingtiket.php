<?php
// class paging untuk halaman administrator
class Pagingtiket{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['haltiket'])){
	$posisi=0;
	$_GET['haltiket']=1;
}

else{
	$posisi = ($_GET['haltiket']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halagenda
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?hal=tiket-lists&haltiket=1>&laquo; First</a>
                    <a href=$_SERVER[PHP_SELF]?hal=tiket-lists&haltiket=$prev>&lsaquo; Prev</a>";
}
else{ 
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?hal=tiket-lists&haltiket=1>&laquo; First</a>
					<a href=$_SERVER[PHP_SELF]?hal=tiket-lists&haltiket=1>&lsaquo; Prev </a>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?hal=tiket-lists&haltiket=$i>$i | </a>";
  }
	  $angka .= " <strong>$halaman_aktif</strong>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?hal=tiket-lists&haltiket=$i> | $i </a>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=$_SERVER[PHP_SELF]?hal=tiket-lists&haltiket=$jmlhalaman>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?hal=tiket-lists&haltiket=$next>Next &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?hal=tiket-lists&haltiket=$jmlhalaman>Last &raquo;</a> ";
}
else{
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?hal=tiket-lists&haltiket=$jmlhalaman>Next &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?hal=tiket-lists&haltiketa=$jmlhalaman>Last &raquo;</a> ";
}
return $link_halaman;
}
}



// class paging untuk halaman administrator
class PagingtiketGrid{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['haltiket'])){
	$posisi=0;
	$_GET['haltiket']=1;
}
else{
	$posisi = ($_GET['haltiket']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halagenda
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?hal=tiket-grid&haltiket=1>&laquo; First</a>
                    <a href=$_SERVER[PHP_SELF]?hal=tiket-grid&haltiket=$prev>&lsaquo; Prev</a>";
}
else{ 
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?hal=tiket-grid&haltiket=1>&laquo; First</a>
					<a href=$_SERVER[PHP_SELF]?hal=tiket-grid&haltiket=1>&lsaquo; Prev </a>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?hal=tiket-grid&haltiket=$i>$i | </a>";
  }
	  $angka .= " <strong>$halaman_aktif</strong>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?hal=tiket-grid&haltiket=$i> | $i </a>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=$_SERVER[PHP_SELF]?hal=tiket-grid&haltiket=$jmlhalaman>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?hal=tiket-grid&haltiket=$next>Next &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?hal=tiket-grid&haltiket=$jmlhalaman>Last &raquo;</a> ";
}
else{
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?hal=tiket-grid&haltiket=$jmlhalaman>Next &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?hal=tiket-grid&haltiketa=$jmlhalaman>Last &raquo;</a> ";
}
return $link_halaman;
}
}



?>