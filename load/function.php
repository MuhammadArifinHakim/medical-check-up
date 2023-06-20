<?php

//Koneksi Ke Database
require 'config.php';

// Menampilkan Jumlah Data ( Tabel )
function numData($tabel)
{
  global $koneksi;
  $num = mysqli_query($koneksi, "SELECT * FROM $tabel");
  return mysqli_num_rows($num);
}

// Menampilkan Jumlah Data ( Query )
function numQueryData($query)
{
  global $koneksi;
  $num = mysqli_query($koneksi, $query);
  return mysqli_num_rows($num);
}

// Menampilkan Data ( Query )
function viewData($query)
{
  global $koneksi;
  $result = mysqli_query($koneksi, $query);

  // Jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// Menampilkan Data Data ( Query )
function viewDatas($query)
{
  global $koneksi;
  $result = mysqli_query($koneksi, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

//Menampilkan Semua Data ( Tabel )
function viewAllData($tabel)
{
  global $koneksi;
  $query = "SELECT * FROM $tabel ORDER BY id DESC";
  $result = mysqli_query($koneksi, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// Menambahkan Data
function addData($tabel, $insert)
{
  global $koneksi;
  $query = "INSERT INTO $tabel VALUES
              ($insert);";

  mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
  return mysqli_affected_rows($koneksi);
}

// Mengedit Data
function updateData($tabel, $update, $id)
{
  global $koneksi;
  $query = "UPDATE $tabel SET
                $update
              WHERE id = $id";
  mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
  return mysqli_affected_rows($koneksi);
}

//Menghapus Data ( Tabel, Id )
function deleteData($tabel, $id)
{
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM $tabel WHERE id = '$id'") or die(mysqli_error($koneksi));
  return mysqli_affected_rows($koneksi);
}

// Query Data ( Query )
function queryData($query)
{
  global $koneksi;
  mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
  return mysqli_affected_rows($koneksi);
}

// Membuat nomor Otomatis
function autonomor($tabel)
{
  global $koneksi;
  // Mencari nomor Pasien dengan nilai paling besar
  $query = "SELECT MAX(CAST(nomor AS UNSIGNED)) AS maxNomor FROM $tabel";
  $hasil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_array($hasil);
  $maxNomor = $data['maxNomor'];

  if ($maxNomor == null) {
    // Set a default starting value for nomor if the table is empty
    $nomor = '0000000000001';
  } else {
    // Increment the maxNomor value by 1
    $nextNomor = intval($maxNomor) + 1;
    // Pad the nextNomor with leading zeros to maintain the desired format
    $nomor = str_pad($nextNomor, 13, '0', STR_PAD_LEFT);
  }

  return $nomor;
}



// //Membuat ID Otomatis
// function autoId($tabel, $char = 'AKD')
// {
//   global $koneksi;
//   // mencari kode barang dengan nilai paling besar
//   $query = "SELECT max(id) as maxKode FROM $tabel";
//   $hasil = mysqli_query($koneksi, $query);
//   $data = mysqli_fetch_array($hasil);
//   $kode = $data['maxKode'];

//   // mengambil angka atau bilangan dalam kode anggota terbesar,
//   // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
//   // misal 'BRG001', akan diambil '001'
//   // setelah substring bilangan diambil lantas dicasting menjadi integer
//   $noUrut = (int) substr($kode, 3);

//   // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
//   $noUrut++;

//   // membentuk kode anggota baru
//   // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
//   // misal sprintf("%03s", 12); maka akan dihasilkan '012'
//   // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
//   $huruf = $char;
//   $kode = $huruf . sprintf("%03s", $noUrut);
//   return $kode;
// }

  // // Mengupload Gambar ( Lokasi Upload )
  // function uploadImage( $uploadLocation ) {
  //   $fileName = $_FILES['image']['name'];
  //   $fileSize = $_FILES['image']['size'];
  //   $error    = $_FILES['image']['error'];
  //   $fileTmp  = $_FILES['image']['tmp_name'];

  //   // Cek apakah yang di upload adalah gambar
  //   $fileExtensionValid = ['jpg', 'jpeg', 'png', 'gif'];
  //   $fileExtension      = explode('.', $fileName);
  //   $fileExtension      = strtolower(end($fileExtension));
  //   if( !in_array($fileExtension, $fileExtensionValid) ) {
  //     echo "
  //     <script>
  //       alert('What you upload is not an image !!!');
  //     </script>
  //     ";
  //     return false;
  //   }

  //   // Cek apakah ukuran gambar lebih besar dari 3 MB
  //   if ($fileSize > 3048000) {
  //     echo "
  //     <script>
  //       alert('Image size is more than 3 MB !!!');
  //     </script>
  //     ";
  //     return false;   
  //   }

  //   // Cek apakah ada folder upload
    
  //   // Nama file baru
  //   $fileNewName = rand(0,999).$_FILES['image']['name'];

  //   // Upload gambar
  //   $uploadDir = "./$uploadLocation/";
  //   if( is_uploaded_file($fileTmp) ) {
  //     $result = move_uploaded_file( $fileTmp, $uploadDir. $fileNewName );
  //     if( $result ) {
  //       return $fileNewName;
  //     } else {
  //       echo "
  //       <script>
  //         alert('Image upload filed !!!');
  //       </script>
  //       ";
  //     }
  //   }
  // }
