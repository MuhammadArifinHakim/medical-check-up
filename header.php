<?php
// Menampilkan nama user
$id = $_SESSION['id'];
$result = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE id = '$id'");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medical Check</title>
	<link rel="shortcut icon" href="asset/img/health-care.png" type="image/x-icon">

	<!-- Boostrap 4 -->
	<link rel="stylesheet" href="asset/vendor/bootstrap-4.5.3/css/bootstrap.min.css">
	<!-- Font Awesome free-->
	<link rel="stylesheet" href="asset/vendor/fontawesome/css/all.min.css">
	<!-- Datatables with style bootstrap 4 -->
	<link rel="stylesheet" href="asset/vendor/datatables-b4/datatables.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">
			<img src="asset/img/health-care.png" width="30" height="30" alt="">
			Medical Check
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ml-3">
					<a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item ml-3">
					<a class="nav-link" href="?page=Pasien"><i class="fas fa-user"></i> Data Pasien</a>
				</li>
			</ul>

			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline"><?= $user['nama']; ?></span>
					</a>

					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="?page=UbahPassword">
							<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
							Ubah Password
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Keluar
						</a>
					</div>
				</li>
			</ul>

		</div>
	</nav>