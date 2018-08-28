<?php 

require_once 'dompdf/autoload.inc.php';
include 'config/koneksi.php';

use Dompdf\Dompdf;

$document = new Dompdf();

$tiket = 

$html = '<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"></td>
        <td align="right">
            <h3>KPMTrans</h3>
            <pre>
            	No Tiket : ORD.00001


                Jl. Perintis kemerdekaan no. 1 (samping honda)
                Garut Kota, Garut
				Telepon 0822-4082-7503
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>Dari:</strong> Linblum - Barrio teatral</td>
        <td><strong>Ke:</strong> Linblum - Barrio Comercial</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kursi</th>
        <th>Trayek</th>
        <th>Pergi - Tiba</th>
        <th>Tanggal Brangkat</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Playstation IV - Black</td>
        <td align="center">1</td>
        <td align="right">Garut</td>
        <td align="right">14:00  |  18:00</td>
        <td align="right">09-08-1995</td>
      </tr>
     <tr>
        <th scope="row">1</th>
        <td>Playstation IV - Black</td>
        <td align="center">1</td>
        <td align="right">Garut</td>
        <td align="right">14:00  |  18:00</td>
        <td align="right">09-08-1995</td>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>Playstation IV - Black</td>
        <td align="center">1</td>
        <td align="right">Garut</td>
        <td align="right">14:00  |  18:00</td>
        <td align="right">09-08-1995</td>
      </tr>
    </tbody>

    
  </table>

</body>
</html>';

$document->loadHtml($html);

$document->setPaper('A4', 'landscape');

$document->render();

$document->stream('Tiket.pdf', array("Attachment" => 0));

 
 ?>