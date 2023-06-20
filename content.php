<?php 
  switch (@$_GET['page']) {


		// Karyawan
		case 'Karyawan':
			include 'page/karyawan/karyawan.php';
			break;
		case 'TambahKaryawan':
			include 'page/karyawan/tambahkaryawan.php';
			break;
		case 'EditKaryawan':
			include 'page/karyawan/editkaryawan.php';
			break;
		case 'PengaturanKaryawan':
			include 'page/karyawan/pengaturankaryawan.php';
			break;
		case 'HapusKaryawan':
			include 'page/karyawan/hapuskaryawan.php';
			break;

		// Pasien
		case 'Pasien':
			include 'page/pasien/pasien.php';
			break;
		case 'DataPersonal':
			include 'page/pasien/datapersonalpasien.php';
			break;
		case 'TambahPasien':
			include 'page/pasien/tambahpasien.php';
			break;
		case 'EditPasien':
			include 'page/pasien/editpasien.php';
			break;
		case 'PengaturanPasien':
			include 'page/pasien/pengaturanpasien.php';
			break;
		case 'HapusPasien':
			include 'page/pasien/hapuspasien.php';
			break;

		// Data Medical Check Personal
		case 'TambahCatatanMedis':
			include 'page/catatanmedis/tambahperiksa.php';
			break;
		case 'EditCatatanMedis':
			include 'page/catatanmedis/editperiksa.php';
			break;
		case 'HapusCatatanMedis':
			include 'page/catatanmedis/hapusperiksa.php';
			break;		

		// User
		case 'Profil':
			include 'page/user/profil.php';
			break;
		case 'EditProfil':
			include 'page/user/editprofil.php';
			break;
		case 'UbahPassword':
			include 'page/user/ubahpassword.php';
			break;	

    default :
      include 'page/home.php';
      break;
  }
