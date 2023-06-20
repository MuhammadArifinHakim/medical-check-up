<?php
echo  $id;
if (isset($_POST['submit'])) {
	$password_lama    = mysqli_real_escape_string($koneksi, $_POST['password_lama']);
	$password_baru    = mysqli_real_escape_string($koneksi, $_POST['password_baru']);
	$repeat_password	= mysqli_real_escape_string($koneksi, $_POST['repeat_password']);

	$resultId = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE id = '$id'");

	// Cek user
	if (mysqli_num_rows($resultId)  === 1) {
		// Cek password
		$result = mysqli_fetch_assoc($resultId);
		if (md5($password_lama) === $result['password']) {

			// Konfirmasi password
			if ($password_baru !== $repeat_password) {
				echo "
						<script>
							alert('Password tidak sesuai...');
							document.location.href = '?page=UbahPassword';
						</script>";
				return false;
			}

			// Enskripsi password	
			// $password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
			$password_baru = md5($password_baru);

			// Menambahkan user
			$query = "UPDATE tbl_karyawan SET 
				`password`        = '$password_baru'
				WHERE id 		      = $id";

			if (queryData($query) > 0) {
				echo "
						<script>
							alert('Password berhasil di ubah');
							document.location.href = '?page=index.php';
						</script>";
			} else {
				echo "
						<script>
							alert('Gagal mengubah Password...');
							document.location.href = '?page=index.php';
						</script>";
			}
		}
		echo "
			<script>
				alert('Password lama tidak sesuai...');
				document.location.href = '?page=UbahPassword';
			</script>";
	}
}
?>


<!-- START: Content -->
<div class="container">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
		<h1>Ubah Password</h1>
		<a href="?page=index.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
			<i class="fas fa-chevron-left fa-sm text-white-50"></i> Back</a>
	</div>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title text-center mb-5">Ubah Password</h5>
			<form action="" method="post">
				<div class="form-group">
					<div class="form-group row">
						<label for="password_lama" class="col-sm-2 col-form-label">Password Lama</label>
						<div class="col-sm-10">
							<input type="password" maxlength="16" class="form-control" name="password_lama" id="password_lama" placeholder="Masukkan Password Lama" required autofocus>
						</div>
					</div>
					<div class="form-group row">
						<label for="password_baru" class="col-sm-2 col-form-label">Password Baru</label>
						<div class="col-sm-10">
							<input type="password" maxlength="16" class="form-control" name="password_baru" id="password_baru" placeholder="Masukkan Password Baru" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="repeat_password" class="col-sm-2 col-form-label">Ulangi Password</label>
						<div class="col-sm-10">
							<input type="password" maxlength="16" class="form-control" name="repeat_password" id="repeat_password" placeholder="Ulangi Password Baru" required>
						</div>
					</div>
				</div>

				<div class="card-footer text-center mt-5">
					<button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button>
					<button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Change</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END: Content -->