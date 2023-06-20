<?php

  // define ('SITE_ROOT', realpath(dirname(__FILE__)));
  require_once __DIR__ . './../../asset/vendor/mPDF-8/autoload.php';
  require __DIR__ . './../../load/function.php';

  $karyawan = viewDatas("SELECT * FROM `tbl_karyawan` WHERE tbl_karyawan.role = 'Karyawan'");
  $reportDate = date('l, d M Y');

  $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./../../asset/css/style.laporan.css" type="text/css">
      <title>Laporan Data Karyawan</title>
    </head>

    <body>
      <h1>Laporan Data Karyawan</h1>
      <p>'. $reportDate .'</p>
      <table border="1">
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Handphone</th>
            <th>Alamat</th>
            <th>Catatan</th>
          </tr>
        </thead>
        <tbody>';
        $no = 1;
        foreach ($karyawan as $data) {
        $html .= '
          <tr>
            <td>'. $no++ .'</td>
            <td><img width="70px" height="70px" src="../../upload/karyawan/'. $data['image'] .'"></td>
            <td>'. $data['nama'] .'</td>
            <td>'. $data['username'] .'</td>
            <td>'. $data['no_hp'] .'</td>
            <td>'. $data['alamat'] .'</td>
            <td>'. $data['catatan'] .'</td>
          </tr>';
        }

  $html .= '
        </tbody>
      </table>
    </body>
    </html>
  '; 

  $mpdf = new \Mpdf\Mpdf();
  
  $date = date('d-M-Y');
  $mpdf->setFooter('{PAGENO}');
  $mpdf->WriteHTML($html);
  $mpdf->Output($date. '-Laporan-Data-Karyawan.pdf', 'I');
?>