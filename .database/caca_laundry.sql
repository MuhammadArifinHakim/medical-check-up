-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2022 pada 15.23
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caca_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id`, `nama`, `username`, `password`, `email`, `no_hp`, `alamat`, `catatan`, `image`, `role`) VALUES
(5, 'Rahmat', 'rahmat', '$2y$10$ot3WZWX2IcqAvFnHOSystuIjBM4QmHxi.hcHYSCZFztWgG5c/gV26', 'rahmat@gmail.com', '082233648001', 'ds. Jambuwer, kec. kromengan, kab. malang', 'karyawan', '930WhatsApp Image 2022-02-18 at 19.49.46.jpeg', 'Karyawan'),
(6, 'Anisa', 'caca', '$2y$10$lrf5rLXIMJIDrEtzj6czqObCzIAhpfkqun5NtvX9uRqrm.eaCCgqa', 'caca@gmail.com', '62895612462279', 'Jl. Danau Sentani Utara No.1, Madyopuro, Kec. Kedungkandang', 'admin', '526WhatsApp Image 2022-01-25 at 11.08.08.jpeg', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id` varchar(10) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `harga_kilo` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_paket`
--

INSERT INTO `tbl_paket` (`id`, `paket`, `harga_kilo`, `deskripsi`) VALUES
('PKT001', 'Murah Meriah', 5000, 'Selesai 3 hari = Cuci + Kering Setrika'),
('PKT002', 'Cuci Komplit', 8000, 'Selesai 1 hari = Cuci + Kering + Setrika'),
('PKT003', 'Cuci Kering', 5000, 'Selesai 1 hari'),
('PKT004', 'Cuci Basah', 3500, 'Selesai 1 hari'),
('PKT005', 'Setrika', 5000, 'Selesai 1 hari'),
('PKT006', 'Cuci Ekspres', 15000, 'Selesai 6 jam = Cuci + Kering + Setrika'),
('PKT007', 'Cuci Kilat', 25000, 'Selesai 3 jam = Komplit + Bonus Kaus Laundry Ku'),
('PKT008', 'VIP', 75000, 'Selesai 2 jam = Komplit + Bonus Kaus & Celana Laundry Ku + Antar langsung'),
('PKT009', 'VVIP', 120000, 'Selesai 1 jam = Komplit + Bonus Kaus & Celana Laundru Ku + Tas Khusus Laundry Ku + Antar langsung ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id`, `nama`, `alamat`, `no_hp`) VALUES
('PLG001', 'Ahmad Kurniawan', 'Perlanaan', '080000000000'),
('PLG002', 'Aiki Brilian', 'Perdagangan Pasar I', '080000001111'),
('PLG003', 'Alviansyah', 'Tempel Jaya', '080000002222'),
('PLG004', 'Anisha Catur Wulandari', 'Mangkai Baru Dusun III', '080000003333'),
('PLG005', 'Anugrah Sang Putra', 'Toumoan', '080000004444'),
('PLG009', 'Deby Ridho Marauli Nasution', 'Perdagangan ', '080000008888'),
('PLG006', 'Ayu Andari', 'Mangkai Baru Dusun IV', '080000005555'),
('PLG007', 'Bima Syahputra Purba', '-', '080000006666'),
('PLG008', 'Chairil Anwar', '-', '080000007777'),
('PLG010', 'Dina Ira Pandini Purba', '-', '080000009999'),
('PLG011', 'Dinda Aristi', 'Kucingan', '080011110000'),
('PLG012', 'Indah Irawati', '-', '080022220000'),
('PLG013', 'Iqbal Nur Adabi Nasution', '-', '080033330000'),
('PLG014', 'Ivan Pramana', '-', '080044440000'),
('PLG015', 'Melin Agus Triyanti', 'Tempel Jaya', '080055550000'),
('PLG016', 'Muhammad Hanafi', 'Perlanaan', '080066660000'),
('PLG017', 'Muhammad Iqbal', '-', '080077770000'),
('PLG018', 'Muhammad Rizky Yudistio', 'Mangkai Lama', '080088880000'),
('PLG019', 'Muhammad Nanda Kurniawan', 'Perlanaan', '080099990000'),
('PLG020', 'Rehan Firnanda', 'Mangkai Baru Dusun I', '080011111111'),
('PLG021', 'Ridhana Fiska', 'Mayang', '080011112222'),
('PLG022', 'Rizky Aidil', 'Mangkai Baru Dusun IV', '080011113333'),
('PLG023', 'Siti Kharisma Fitriana', 'Mangkai Lama', '080011114444'),
('PLG024', 'Sri Romadhona', 'Bukit Lima', '080011115555'),
('PLG025', 'Sultan Nico Nur \'Arsy', 'Mangkai Lama', '080011116666'),
('PLG026', 'Tri Ayuni', '-', '080011117777'),
('PLG027', 'Wahyu Fitrah', 'Dosin', '080011118888'),
('PLG028', 'Wendy Riswana', '-', '080011119999'),
('PLG029', 'Widya Mailani', '-', '080022221111'),
('PLG030', 'Wirandani Galih Kusuma', 'Perlanaaan', '080022222222'),
('PLG031', 'Wisnu Falevi', '-', '080022223333');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` varchar(10) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `kd_paket` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `tanggal`, `id_pelanggan`, `kd_paket`, `qty`, `biaya`, `bayar`, `kembalian`) VALUES
('TRS001', '24 Nov 2020', 'PLG001', 'PKT001', 7, 35000, 50000, 15000),
('TRS002', '24 Nov 2020', 'PLG002', 'PKT001', 5, 25000, 50000, 25000),
('TRS003', '24 Nov 2020', 'PLG005', 'PKT002', 8, 64000, 70000, 6000),
('TRS004', '25 Nov 2020', 'PLG022', 'PKT009', 10, 1200000, 1200000, 0),
('TRS005', '25 Nov 2020', 'PLG025', 'PKT008', 5, 375000, 400000, 25000),
('TRS006', '25 Nov 2020', 'PLG031', 'PKT007', 2, 50000, 50000, 0),
('TRS007', '25 Nov 2020', 'PLG018', 'PKT005', 2, 10000, 10000, 0),
('TRS008', '25 Nov 2020', 'PLG027', 'PKT006', 3, 45000, 50000, 5000),
('TRS009', '25 Nov 2020', 'PLG014', 'PKT006', 5, 75000, 30000, -45000),
('TRS010', '25 Nov 2020', 'PLG003', 'PKT009', 10, 1200000, 1200000, 0),
('TRS011', '25 Nov 2020', 'PLG017', 'PKT007', 5, 125000, 0, -125000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `kd_paket` (`kd_paket`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
