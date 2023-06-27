<?php

// define ('SITE_ROOT', realpath(dirname(__FILE__)));
require_once './../../asset/vendor/mPDF-8/autoload.php';
require './../../load/function.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil kode dari tbl_pasien
$data = viewData("SELECT * FROM tbl_pasien WHERE id = '$id'");

// Ambil semua data dari tbl_medical_check
$pasien = viewDatas("SELECT * FROM `tbl_medical_check` WHERE nomor = '" . $data['nomor'] . "' ORDER BY tanggal_periksa DESC");
$reportDate = date('l, d M Y');

$html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./../../asset/css/style.laporan.css" type="text/css">
      <title>Laporan Data Pasien</title>
    </head>

    <body>
      <h1>Catatan Medis</h1>
      <p>dr. Brasmoto Adi P - dr.Yulia Arisna T</p>

      <br><br>

      <table class="data_pasien" style="width: 100%;">
      <tr>
        <td style="width: 20%;"><strong>Nomor</strong></td>
        <td style="width: 80%;"><strong>: </strong>' . $data['nomor'] . '</td>
      </tr>
      <tr>
        <td style="width: 20%;"><strong>Nama Pasien</strong></td>
        <td style="width: 80%;"><strong>: </strong>' . $data['nama_pasien'] . '</td>
      </tr>
      <tr>
        <td style="width: 20%;"><strong>Usia</strong></td>
        <td style="width: 80%;"><strong>: </strong>' . $data['usia'] . '</td>
      </tr>
      <tr>
        <td style="width: 20%;"><strong>Alamat pasien</strong></td>
        <td style="width: 80%;"><strong>: </strong>' . $data['alamat'] . '</td>
      </tr>
      </table>
      
      <table border="1">
        <thead>
          <tr>
              <th rowspan="2">Tanggal Periksa</th>
              <th colspan="3" style="text-align: center;">Kondisi</th>
              <th colspan="2" style="text-align: center;">Darah</th>
              <th rowspan="2">Keterangan</th>
              <th rowspan="2">Diagnosa</th>
              <th rowspan="2">Pengobatan</th>
          </tr>
          <tr>
                <th>Tensi</th>
                <th>Tinggi</th>
                <th>Berat</th>
                <th>Gula</th>
                <th>Golongan</th>
              </tr>
        </thead>
        <tbody>';
foreach ($pasien as $catatan) {
  $html .= '
          <tr>
            <td>' . date('d-m-Y', strtotime($catatan['tanggal_periksa'])) . '</td>
            <td style="text-align: center;">' . ($catatan['tensi'] !== '' ? $catatan['tensi'] : '-') . '</td>
            <td style="text-align: center;">' . ($catatan['tinggi'] !== '0' ? $catatan['tinggi'] . ' cm' : '-') . '</td>
            <td style="text-align: center;">' . ($catatan['berat'] !== '0' ? $catatan['berat'] . ' kg' : '-') . '</td>
            <td style="text-align: center;">' . ($catatan['gula_darah'] !== '0' ? $catatan['gula_darah'] : '-') . '</td>
            <td style="text-align: center;">' . ($catatan['gol_darah'] !== '' ? $catatan['gol_darah'] : '-') . '</td>        
            <td style="width: 190px; word-wrap: break-word;">' . $catatan['keterangan'] . '</td>
            <td style="width: 190px; word-wrap: break-word;">' . $catatan['diagnosa'] . '</td>
            <td style="width: 190px; word-wrap: break-word;">' . $catatan['pengobatan'] . '</td>
      </tr>';
}

$html .= '
        </tbody>
      </table>
    </body>
    </html>
  ';

// $mpdf = new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']); // Set landscape orientation

$date = date('d-M-Y');
$mpdf->setFooter('{PAGENO}');
$mpdf->WriteHTML($html);
$mpdf->Output($date . '-Laporan-Data-Pasien.pdf', 'I');
