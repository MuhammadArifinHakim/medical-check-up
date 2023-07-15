-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2023 pada 13.18
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
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
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id`, `nama`, `username`, `password`, `role`) VALUES
(11, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_medical_check`
--

CREATE TABLE `tbl_medical_check` (
  `id` int(11) NOT NULL,
  `nomor` varchar(13) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `tensi` varchar(8) NOT NULL,
  `tinggi` float NOT NULL,
  `berat` int(3) NOT NULL,
  `gula_darah` int(3) NOT NULL,
  `gol_darah` enum('A','B','AB','O') NOT NULL,
  `keterangan` varchar(400) NOT NULL,
  `diagnosa` varchar(400) NOT NULL,
  `pengobatan` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_medical_check`
--

INSERT INTO `tbl_medical_check` (`id`, `nomor`, `nama_pasien`, `tanggal_periksa`, `tensi`, `tinggi`, `berat`, `gula_darah`, `gol_darah`, `keterangan`, `diagnosa`, `pengobatan`) VALUES
(3, '0002237374139', 'Muhammad Arifin Hakim', '2023-06-22', '129', 194.2, 33, 0, 'O', 'th righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and eas', 'se who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy ', ' vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias except'),
(7, '0002237374139', 'Muhammad Arifin Hakim', '2023-04-04', '152', 174, 51, 0, 'O', 'dfsdfadasd\r\nasdasdS\r\nSdasd', 'asdasd\r\nasdasdadafa adfasfafaf aaf A \r\nASDFASDASDASDA', 'asdaw14 135r/a fuaehf2;9 wjsdf'),
(10, '0002237374144', 'Ahmad Fauzi', '2023-06-15', '160', 160, 56, 0, 'A', 'sdgsd', 'asfasf', 'afaf'),
(11, '0002237374145', 'Imam Barudak Santos', '2023-06-15', '112', 167, 53, 0, 'B', 'asf13 ', 'asd31 31d', '1f13f1'),
(14, '0002237374146', 'Deni Khaulany', '2023-06-18', '124', 170, 66, 122, 'AB', 'asdasd', 'asdasd', 'asdasdasd122122122122122122'),
(15, '0002237374144', 'Ahmad Fauzi', '2023-06-18', '123/90', 166, 76, 123, 'A', 'fafafafaf', 'orizontally scrollable on smaller screens when necessary, maintaining its responsiveness. The table will adapt to the available space within the card while maintaining readability and usability.\r\n\r\nAdditionally, you may want', 'orizontally scrollable on smaller screens when necessary, maintaining its responsiveness. The table will adapt to the available space within the card while maintaining readability and usability.\r\n\r\nAdditionally, you may want'),
(16, '0002237374144', 'Ahmad Fauzi', '2023-06-19', '123', 156, 67, 100, 'A', 'asd asdasd asfadyfgyuagfasf', 'asdasda aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'asdaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(17, '0002237374144', 'Ahmad Fauzi', '2023-06-14', '123', 160, 60, 97, 'A', 'asfa', ' incorporating this updated query, the output will be ordered by tanggal_periksa in descending order, with the most recent dates appearing first.', ' incorporating this updated query, the output will be ordered by tanggal_periksa in descending order, with the most recent dates appearing first.'),
(19, '0002237374140', 'Lazuardi Imam Santosa', '2023-06-18', '111', 170, 76, 97, 'B', 'asdasd', 'asdasd', 'asdasda'),
(25, '0002237374143', 'Farisna Hamid Jabbar ', '2023-06-18', '123/90', 177, 77, 100, 'O', 'fasfasf afasfa afs', 'wadsd', 'asfas'),
(26, '0002237374143', 'Farisna Hamid Jabbar ', '2023-06-18', '99', 177, 77, 77, 'O', '32', 'a', 'a'),
(27, '0002237374144', 'Ahmad Fauzi', '2023-06-18', '99', 177, 77, 79, 'A', 'asda', 'asda', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(28, '0002237374144', 'Ahmad Fauzi', '2023-06-18', '99', 135, 55, 31, 'A', 'dddddddddddddd  ddddddddddddddddddddddd\r\nDDDDDDDDDDDDDDDDD\r\nDDDDDDDDDD\r\nDDDDDDDDD', 'DDDDDDDDD\r\nDDDDDDDDD ', 'dd  ddddddddddddddddddddddd\r\nDDDDDDDDDDDDDDDDD\r\nDDDDDDDDDD\r\nDDDDDDDDD'),
(29, '0002237374147', 'Akmal Aan Faris', '2023-06-20', '123/90', 125, 54, 44, 'B', 'sdad', 'asd', 'asd'),
(31, '0002237374148', 'Fajar Maulana S.KOM', '2023-06-19', '123/90', 177, 66, 67, 'B', 'asdasdap kali input gol darah, kalau dah pernah input aku mau ambil yg sudah ada dari database tapi ga bisa', 'ap kali input gol darah, kalau dah pernah input aku mau ambil yg sudah ada dari database tapi ga bisa', 'ap kali input gol darah, kalau dah pernah input aku mau ambil yg sudah ada dari database tapi ga bisa'),
(32, '0002237374142', 'Deni Alfian Khaulany', '2023-06-21', '', 0, 0, 0, '', 'panas mengigigil', 'deman berdarah', 'makan obat'),
(33, '0002237374139', 'Muhammad Arifin Hakim', '2023-06-23', '123/90', 185.4, 0, 0, 'O', 'a', 'a', 'a'),
(34, '0002237374152', 'abc', '2023-07-14', '123/90', 178.8, 52, 153, 'AB', 'aaaaaaaaa', 'aaaaaa', 'aaaaaaaaaa'),
(35, '0002237374152', 'abc', '2023-07-15', '', 0, 0, 0, '', 'sada', 'asdas', 'asdas'),
(36, '0002237374151', 'aaaaa aaaaaaaa aaaaaa', '2023-07-15', '', 0, 0, 0, '', 'hgjg', 'ugi', 'tddkhff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id` int(11) NOT NULL,
  `nomor` varchar(13) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(3) NOT NULL,
  `gender` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id`, `nomor`, `nama_pasien`, `tanggal_lahir`, `usia`, `gender`, `alamat`, `no_hp`) VALUES
(1, '0002237374139', 'Muhammad Arifin Hakim', '2002-10-11', 24, 'laki-laki', 'dolahan kepuhwetan, RT.05/RW.12, Wirokerten, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55194', '08984017226'),
(5, '0002237374140', 'Lazuardi Imam Santosa', '2017-01-19', 6, 'laki-laki', ' in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Ric', '089841145124'),
(8, '0002237374141', 'Fachri Ahmad Fauzi', '2007-05-07', 16, 'perempuan', 'ble. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '0991251624112'),
(9, '0002237374142', 'Deni Alfian Khaulany', '2011-11-16', 12, 'laki-laki', 'opular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Ri', '0891235712411'),
(10, '0002237374143', 'Farisna Hamid Jabbar ', '1984-01-10', 43, 'laki-laki', 'eproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original f', '0812651259113'),
(14, '0002237374144', 'Ahmad Fauzi', '2023-06-08', 42, 'laki-laki', 'dolahan kepuhwetan, RT.05/RW.12, Wirokerten, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55194', '08984011241'),
(15, '0002237374145', 'Imam Barudak Santos', '2023-06-15', 40, 'perempuan', 'wdfsdfsdhfgy sg6fgsydfg sdg tsdf 61egf vb2479f  haiiiiiiiiiiiiiiii', '0517256412'),
(18, '0002237374146', 'Deni Khaulany', '2023-06-25', 23, 'laki-laki', 'asdasd asd\r\nasdA\r\nasdfa\r\na', '089840112341'),
(21, '0002237374147', 'Akmal Aan Faris', '1975-11-19', 43, 'laki-laki', 'asdasd asdasdasdac asdasd\r\nSAd', '085124512352'),
(22, '0002237374148', 'Fajar Maulana S.KOM', '1986-07-01', 37, 'laki-laki', 'asdasdasdasda asdasd as asdasdasd', '015125124512'),
(23, '0002237374149', 'Herdian', '2000-10-21', 54, 'laki-laki', 'qwfasf asdasdasd asdas asdas  asdasdasdadasdasd asda sda', '9135123526123'),
(24, '0002237374150', 'Watermelon boy', '2023-04-20', 43, 'laki-laki', '', ''),
(31, '0002237374151', 'aaaaa aaaaaaaa aaaaaa', '2023-06-13', 12, 'laki-laki', 'a', '1234567890123'),
(32, '0002237374152', 'abc', '0000-00-00', 12, 'laki-laki', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_medical_check`
--
ALTER TABLE `tbl_medical_check`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_medical_check`
--
ALTER TABLE `tbl_medical_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
