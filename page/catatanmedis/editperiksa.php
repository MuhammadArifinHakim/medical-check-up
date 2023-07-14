<?php
// Jika tidak ada ID di URL
if (!isset($_GET['id'])) {
	header("Location: ?page=Pasien");
	exit;
}

// Ambil ID dari URL
$id = $_GET['id'];
// Ambil semua data medical check berdasarkan ID
$data = viewData("SELECT * FROM tbl_medical_check WHERE id = '$id'");

// Ambil id_pasien dari id_catatan
$nomor = $data['nomor'];
$pasien = viewData("SELECT * FROM tbl_pasien WHERE nomor = '$nomor'");

if (isset($_POST['submit'])) {
	$nama_pasien       		= addslashes($_POST['nama_pasien']);
	$tanggal		 		= addslashes($_POST['tanggal_periksa']);
	$tensi      			= stripslashes($_POST['tensi']);
	$tinggi       			= stripslashes($_POST['tinggi']);
	$berat 					= stripslashes($_POST['berat']);
	$gula_darah 			= stripslashes($_POST['gula_darah']);
	$gol_darah_pilih 		= stripslashes($_POST['gol_darah_pilih']);
	$keterangan       		= addslashes($_POST['gejala']);
	$diagnosa       		= addslashes($_POST['diagnosa']);
	$pengobatan       		= addslashes($_POST['pengobatan']);


	$query = "UPDATE tbl_medical_check SET 
              nama_pasien 		= '$nama_pasien', 
              tanggal_periksa	= '$tanggal', 
              tensi				= '$tensi',
			  tinggi          	= '$tinggi',
              berat	        	= '$berat', 
			  gula_darah	    = '$gula_darah',
			  gol_darah	        = '$gol_darah_pilih',
              keterangan        = '$keterangan',
			  diagnosa         	= '$diagnosa',
			  pengobatan        = '$pengobatan'
              WHERE id 		    = $id";

	if (queryData($query) > 0) {
		echo "
        <script>
			alert('Data berhasil diubah');
			window.location.href = '?page=DataPersonal&id=" . urlencode($pasien['id']) . "';
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
			<a>Edit Catatan Medis</a>
			<a href="?page=DataPersonal&id=<?php echo $pasien['id']; ?>" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-chevron-left fa-sm fa-fw"></i>
			</a>
		</h5>
		<div class="card-body">

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="username">Nama Pasien</label>
					<input type="text" maxlength="50" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Nama Pasien" value="<?= $data['nama_pasien']; ?>" required>
				</div>
				<div class="form-group">
					<label for="tanggal_periksa">Tanggal Periksa</label>
					<input type="date" class="form-control" name="tanggal_periksa" id="tanggal_periksa" value="<?= $data['tanggal_periksa']; ?>" required>
				</div>
				<div class="form-group">
					<label for="tensi">Tensi</label>
					<input type="text" min="0" class="form-control" name="tensi" id="tensi" placeholder="Tekanan Tensi pasien" value="<?= $data['tensi']; ?>" required>
				</div>
				<div class="form-group">
					<label for="tinggi">Tinggi Badan</label>
					<input type="text" class="form-control" name="tinggi" id="tinggi" placeholder="Tinggi Badan" value="<?= $data['tinggi']; ?>" required>
				</div>
				<div class="form-group">
					<label for="berat">Berat Badan</label>
					<input type="number" min="0" class="form-control" name="berat" id="berat" placeholder="Berat Badan" value="<?= $data['berat']; ?>" required>
				</div>
				<div class="form-group">
					<label for="gula_darah">Gula Darah</label>
					<input type="number" min="0" class="form-control" name="gula_darah" id="gula_darah" value="<?= $data['gula_darah']; ?>" placeholder="Gula Darah Pasien mg/dL">
				</div>
				<div class="form-group">
					<label for="gol_darah_pilih">Golongan Darah</label>
					<select class="form-control" name="gol_darah_pilih" id="gol_darah_pilih">
						<option value="">Pilih Jenis Golongan Darah...</option>
						<option value="A" <?php if ($data['gol_darah'] == 'A') echo 'selected'; ?>>Golongan darah A</option>
						<option value="B" <?php if ($data['gol_darah'] == 'B') echo 'selected'; ?>>Golongan darah B</option>
						<option value="AB" <?php if ($data['gol_darah'] == 'AB') echo 'selected'; ?>>Golongan darah AB</option>
						<option value="O" <?php if ($data['gol_darah'] == 'O') echo 'selected'; ?>>Golongan darah O</option>
					</select>
				</div>
				<div class="form-group">
					<label for="gejala">Keterangan Gejala</label>
					<textarea class="form-control" name="gejala" id="gejala" placeholder="Keterangan Gejala Pasien" rows="3" required><?= $data['keterangan']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="diagnosa">Diagnosa</label>
					<textarea class="form-control" name="diagnosa" id="diagnosa" placeholder="Diagnosa dari gejala" rows="3" required><?= $data['diagnosa']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="pengobatan">Pengobatan</label>
					<textarea class="form-control" name="pengobatan" id="pengobatan" placeholder="Keterangan Pengoatan" rows="3" required><?= $data['pengobatan']; ?></textarea>
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
<script>
	// Convert the input value to a valid number format
	function formatNumber(value) {
		// Replace comma (,) with dot (.) for decimal separator
		value = value.replace(",", ".");

		// Remove any non-digit characters except dot (.)
		value = value.replace(/[^\d.]/g, "");

		return value;
	}

	// Validate and format the input value when the form is submitted
	document.querySelector("form").addEventListener("submit", function(event) {
		var tinggiInput = document.getElementById("tinggi");
		var tinggiValue = formatNumber(tinggiInput.value);

		tinggiInput.value = tinggiValue;
	});
</script>