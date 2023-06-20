<?php
// Jika tidak ada ID di URL
if (!isset($_GET['id'])) {
	header("Location: ?page=Pasien");
	exit;
}

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil semua data karyawan berdasarkan ID
$data = viewData("SELECT * FROM tbl_pasien WHERE id = '$id'");

if (isset($_POST['submit'])) {
	$nama       			= addslashes($_POST['nama_pasien']);
	$tanggal_lahir          = stripslashes($_POST['tanggal_lahir']);
	$usia       			= stripslashes($_POST['usia']);
	$gender        			= stripslashes($_POST['gender']);
	$alamat       			= addslashes($_POST['alamat']);
	$no_hp       			= stripslashes($_POST['no_hp']);


	$query = "UPDATE tbl_pasien SET 
              nama_pasien 		= '$nama', 
              tanggal_lahir 	= '$tanggal_lahir', 
              usia				= '$usia',
			  gender           	= '$gender',
              alamat 	        = '$alamat', 
              no_hp             = '$no_hp'
              WHERE id 		    = $id";

	if (queryData($query) > 0) {
		echo "
        <script>
			alert('Data berhasil diubah');
			window.location.href = '?page=DataPersonal&id=" . urlencode($data['id']) . "';
    </script>
        ";
	} else {
		echo "
        <script>
          alert('Data gagal diubah');
          document.location.href = '?page=Pasien',true;
        </script>
      ";
	}
}
?>


<!-- START: Content -->
<div class="container" style="width: 50%;">

	<div class="card mt-4 mb-4">
		<h5 class="card-header d-flex flex-row align-items-center justify-content-between">
			<a>Edit Data Pasien</a>
			<a href="?page=DataPersonal&id=<?php echo $data['id']; ?>" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-chevron-left fa-sm fa-fw"></i>
			</a>
		</h5>
		<div class="card-body">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="username">Nama Pasien</label>
					<input type="text" maxlength="50" class="form-control" name="nama_pasien" id="nama_pasien" value="<?= $data['nama_pasien']; ?>" required>
				</div>
				<div class="form-group">
					<label for="tanggal_lahir">Tanggal Lahir</label>
					<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>">
				</div>
				<div class="form-group">
					<label for="usia">Usia</label>
					<input type="number" min="0" max="100" class="form-control" name="usia" id="usia" value="<?= $data['usia']; ?>" required>
				</div>
				<div class="form-group">
					<label for="gender">Gender</label>
					<select class="form-control" name="gender" id="gender" required>
						<option value="laki-laki" <?= $data['gender'] === 'laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
						<option value="perempuan" <?= $data['gender'] === 'perempuan' ? 'selected' : ''; ?>>Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label for="no_hp">No Handphone</label>
					<input type="number" min="0" maxlength="13" class="form-control" name="no_hp" id="no_hp" value="<?= $data['no_hp']; ?>">
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<textarea class="form-control" name="alamat" id="alamat" rows="3" required><?= $data['alamat']; ?></textarea>
				</div>
				<div class="card-footer text-center">
					<button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button>
					<button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
				</div>
			</form>
		</div>
	</div>

</div>
<!-- END: Content -->