<?php

//Deklarasi
$host = "localhost";
$user = "root";
$password = "";
$database = "medical";

//Koneksi Ke Database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Periksa Koneksi
// if (mysqli_connect_errno()){
// echo "Gagal Terhubung ke database : " . mysqli_connect_error();
// }
if (mysqli_connect_errno()) {
	// Koneksi gagal, tampilkan pesan error
	die("Koneksi database gagal: " . mysqli_connect_error());
} else {
	// Koneksi berhasil
	echo "Terhubung ke database!";
}
