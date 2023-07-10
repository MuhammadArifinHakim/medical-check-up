<?php


// kode otomatis
$nomor = autonomor('tbl_pasien');
// echo $nomor;

if (isset($_POST['submit'])) {
	$nama       			= addslashes($_POST['nama_pasien']);
	// $nomor      			= addslashes($_POST['nomor']);
	$tanggal_lahir          = stripslashes($_POST['tanggal_lahir']);
	$usia       			= stripslashes($_POST['usia']);
	$gender        			= stripslashes($_POST['gender']);
	$alamat       			= addslashes($_POST['alamat']);
	$no_hp       			= stripslashes($_POST['no_hp']);


	// Menambahkan user
	$query 	= "INSERT INTO tbl_pasien VALUES ( NULL, '$nomor', '$nama', '$tanggal_lahir', '$usia', '$gender', '$alamat', '$no_hp')";

	if (queryData($query) > 0) {
		echo "
				<script>
					alert('Data berhasil ditambahkan');
					document.location.href = '?page=Pasien';
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
			<a>Tambah Pasien</a>
			<a href="?page=Pasien" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-chevron-left fa-sm fa-fw"></i>
			</a>
		</h5>
		<div class="card-body">

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="username">Nama Pasien</label>
					<input type="text" maxlength="50" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Nama pasien" required>
				</div>
				<div class="form-group">
					<label for="nomor">Nomor</label>
					<input type="text" maxlength="13" class="form-control" name="nomor" id="nomor" value="<?php echo $nomor; ?>" placeholder="Nomor Pasien" required>
				</div>
				<div class="form-group">
					<label for="tanggal_lahir">Tanggal Lahir</label>
					<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir">
				</div>
				<div class="form-group">
					<label for="usia">Usia</label>
					<input type="number" min="0" max="100" class="form-control" name="usia" id="usia" placeholder="Umur Pasien" required>
				</div>
				<div class="form-group">
					<label for="gender">Gender</label>
					<select class="form-control" name="gender" id="gender" required>
						<option value="">Pilih gender...</option>
						<option value="laki-laki">Laki-laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label for="no_hp">No Handphone</label>
					<input type="tel" minlength="10" maxlength="13" class="form-control" name="no_hp" id="no_hp" placeholder="No Handphone">
					<span id="error-message" style="color: red;"></span>
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" rows="3" onKeyDown="preventNewLine(event)"></textarea>
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
	var input = document.getElementById("no_hp");
	var errorMessage = document.getElementById("error-message");

	input.addEventListener("input", function() {
		var value = input.value.replace(/\D/g, ''); // Remove non-digit characters
		if (value.length > 13) {
			value = value.slice(0, 13); // Truncate the value to 13 digits if it exceeds the limit
		}
		input.value = value; // Update the input value

		if (value.length < 10 || value.length > 13) {
			errorMessage.textContent = "Please enter a valid phone number between 10 and 13 digits.";
		} else {
			errorMessage.textContent = "";
		}
	});

	function preventNewLine(event) {
		if (event.keyCode === 13) {
			event.preventDefault();
		}
	}
</script>