<?php

// define ('SITE_ROOT', realpath(dirname(__FILE__)));
require_once __DIR__ . './../../asset/vendor/mPDF-8/autoload.php';
require __DIR__ . './../../load/function.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil kode dari tbl_pasien
$data = viewData("SELECT * FROM tbl_pasien WHERE id = '$id'");

// Ambil semua data dari tbl_medical_check
$pasien = viewDatas("SELECT * FROM `tbl_medical_check` WHERE kode = '" . $data['kode'] . "' ORDER BY tanggal_periksa DESC");
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

      <table class="data_pasien" style="border: 1;">
      <tr>
      <td style="border: 1;"><strong>Nomor</strong></td>
      <td><strong>: </strong>' . $data['kode'] . '</td>
      </tr>
      <tr>
        <td><strong>Nama Pasien</strong></td>
        <td><strong>: </strong>' . $data['nama_pasien'] . '</td>
      </tr>
      <tr>
        <td><strong>Usia</strong></td>
        <td><strong>: </strong>' . $data['usia'] . '</td>
      </tr>
      <tr>
        <td><strong>Alamat pasien</strong></td>
        <td><strong>: </strong>' . $data['alamat'] . '</td>
      </tr>
    </table>
      
      <table border="1">
        <thead>
          <tr>
              <th>No</th>
              <th>Tanggal Periksa</th>
              <th>Tensi</th>
              <th>Tinggi</th>
              <th>Berat</th>
              <th>Keterangan</th>
              <th>Diagnosa</th>
              <th>Pengobatan</th>
          </tr>
        </thead>
        <tbody>';
$no = 1;
foreach ($pasien as $data) {
  $html .= '
          <tr>
            <td>' . $no++ . '</td>
            <td>' . date('d-m-Y', strtotime($data['tanggal_periksa'])) . '</td>
            <td>' . $data['tensi'] . '</td>
            <td>' . $data['tinggi'] . ' cm</td>
            <td>' . $data['berat'] . ' kg</td>
            <td>' . $data['keterangan'] . '</td>
            <td>' . $data['diagnosa'] . '</td>
            <td>' . $data['pengobatan'] . '</td>
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
