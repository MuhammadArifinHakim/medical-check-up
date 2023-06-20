<?php
// Jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: ?page=Pasien");
  exit;
}

// Mengambil id dari url
$id = $_GET['id'];
// Ambil semua data medical check berdasarkan ID
$data = viewData("SELECT nomor FROM tbl_medical_check WHERE id = '$id'");

// Ambil id_pasien dari id_catatan
$nomor = $data['nomor'];
$pasien = viewData("SELECT id FROM tbl_pasien WHERE nomor = '$nomor'");


if (deleteData('tbl_medical_check', $id) > 0) {
  echo "<script>
            alert('Data berhasil dihapus');
            window.location.href = '?page=DataPersonal&id=" . urlencode($pasien['id']) . "';
          </script>";
} else {
  echo "<script>
            alert('Data gagal dihapus');
          </script>";
}
