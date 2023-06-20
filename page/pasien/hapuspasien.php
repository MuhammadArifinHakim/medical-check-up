<?php
// Jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: ?page=Pasien");
  exit;
}

// Mengambil id dari url
$id = $_GET['id'];

$data = viewData("SELECT nomor FROM tbl_pasien WHERE id = '$id'");

// Ambil nomor dari tbl_pasien
$nomor = $data['nomor'];


// Apabila data pasien di hapus maka catatan medisnya juga kehapus semua
$query = "SELECT id FROM tbl_medical_check WHERE nomor = '$nomor'";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $id_medical = $row['id'];
  deleteData('tbl_medical_check', $id_medical);
}

// Menghapus data di tbl_pasien berdasarkan id
if (deleteData('tbl_pasien', $id) > 0) {
  echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = '?page=Pasien';
          </script>";
} else {
  echo "<script>
            alert('Data gagal dihapus');
          </script>";
}
