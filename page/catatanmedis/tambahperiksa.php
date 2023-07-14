<?php
// Jika tidak ada ID di URL	
if (!isset($_GET['id'])) {
	header("Location: ?page=DataPersonal");
	exit;
}

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil semua data pasien berdasarkan ID
$data = viewData("SELECT * FROM tbl_pasien WHERE id = '$id'");
// Ambil kode dari data pasien
$nomor = $data['nomor'];
// echo $nomor;

$catatan = viewDatas("SELECT * FROM tbl_medical_check WHERE nomor = '$nomor'");
foreach ($catatan as $row) {
	$gol_darah = $row['gol_darah'];
	// echo $gol_darah . "<br>";
}


if (isset($_POST['submit'])) {
	$nama_pasien       		= addslashes($_POST['nama_pasien']);
	$tanggal		 		= addslashes($_POST['tanggal_periksa']);
	$tensi      			= stripslashes($_POST['tensi']);
	$tinggi       			= stripslashes($_POST['tinggi']);
	$berat 					= stripslashes($_POST['berat']);
	$gula_darah 			= stripslashes($_POST['gula_darah']);
	$gol_darah 				= stripslashes($_POST['gol_darah_pilih']);
	$keterangan       		= addslashes($_POST['gejala']);
	$diagnosa       		= addslashes($_POST['diagnosa']);
	$pengobatan       		= addslashes($_POST['pengobatan']);

	// Menambahkan data medical check pasien
	$query = "INSERT INTO tbl_medical_check VALUES ( NULL, '$nomor','$nama_pasien', '$tanggal', '$tensi', '$tinggi', '$berat', '$gula_darah', '$gol_darah', '$keterangan', '$diagnosa', '$pengobatan')";

	if (queryData($query) > 0) {
		echo "
				<script>
					alert('Data berhasil ditambahkan');
					window.location.href = '?page=DataPersonal&id=" . urlencode($data['id']) . "';
				</script>";
	} else {
		echo "
					<script>
						alert('Data gagal ditambahkan');
						document.location.href = '?page=Pasien';
					</script>";
	}
}
?>


<!-- START: Content -->
<div class="container" style="width: 50%;">

	<div class="card mt-4 mb-4">
		<h5 class="card-header d-flex flex-row align-items-center justify-content-between">
			<a>Tambah Catatan Medis</a>
			<a href="?page=DataPersonal&id=<?php echo $data['id']; ?>" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
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
					<label for="nomor">Nomor</label>
					<input type="text" maxlength="50" class="form-control" name="nomor" id="nomor" placeholder="nomor" value="<?= $data['nomor']; ?>" required>
				</div>
				<div class="form-group">
					<label for="tanggal_periksa">Tanggal Periksa</label>
					<input type="date" class="form-control" name="tanggal_periksa" id="tanggal_periksa" placeholder="Tanggal Periksa" value="<?php echo date('Y-m-d'); ?>" required>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col">
							<label for="tensi">Tensi</label>
							<input type="text" min="0" class="form-control" name="tensi" id="tensi" placeholder="Tekanan Tensi pasien">
						</div>
						<div class="col">
							<label for="gol_darah_pilih">Golongan Darah</label>
							<select class="form-control" name="gol_darah_pilih" id="gol_darah_pilih">
								<option value="">Pilih Jenis Golongan Darah...</option>
								<option value="A" <?php if (isset($gol_darah) && $gol_darah == 'A') echo 'selected'; ?>>Golongan darah A</option>
								<option value="B" <?php if (isset($gol_darah) && $gol_darah == 'B') echo 'selected'; ?>>Golongan darah B</option>
								<option value="AB" <?php if (isset($gol_darah) && $gol_darah == 'AB') echo 'selected'; ?>>Golongan darah AB</option>
								<option value="O" <?php if (isset($gol_darah) && $gol_darah == 'O') echo 'selected'; ?>>Golongan darah O</option>

							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col">
							<label for="tinggi">Tinggi Badan</label>
							<input type="text" class="form-control" name="tinggi" id="tinggi" placeholder="Tinggi Pasien (cm)">
						</div>
						<div class="col">
							<label for="gula_darah">Gula Darah</label>
							<input type="number" min="0" class="form-control" name="gula_darah" id="gula_darah" placeholder="Gula Darah Pasien mg/dL">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col">
							<label for="berat">Berat Badan</label>
							<input type="number" min="0" class="form-control" name="berat" id="berat" placeholder="Berat Badan Pasien (kg)">
						</div>
						<div class="col">
							<label for="hidden"></label>
							<input type="hidden" min="0" class="form-control" name="hidden" id="hidden" placeholder="hidden">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="gejala">Keterangan Gejala</label>
					<textarea class="form-control" name="gejala" id="gejala" placeholder="Keterangan Gejala Pasien" rows="3" required></textarea>
				</div>
				<div class="form-group">
					<label for="diagnosa">Diagnosa</label>
					<textarea class="form-control" name="diagnosa" id="diagnosa" placeholder="Diagnosa dari gejala" rows="3" required></textarea>
				</div>
				<div class="form-group">
					<label for="pengobatan">Pengobatan</label>
					<textarea class="form-control" name="pengobatan" id="pengobatan" placeholder="Keterangan Pengoatan" rows="3" required></textarea>
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