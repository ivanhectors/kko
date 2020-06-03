-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Okt 2019 pada 14.27
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyekpeterpan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `iddosen` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `iddosen`, `idusers`, `username`, `password`, `updationDate`) VALUES
(1, 0, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', '17-09-2019 12:37:54 AM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatandosen`
--

CREATE TABLE `catatandosen` (
  `idcatatandosen` int(11) NOT NULL,
  `idkonsultasi` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `catatan` mediumtext NOT NULL,
  `catatan2` mediumtext NOT NULL,
  `tanggalcatatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `catatandosen`
--

INSERT INTO `catatandosen` (`idcatatandosen`, `idkonsultasi`, `status`, `catatan`, `catatan2`, `tanggalcatatan`) VALUES
(23, 0, 'closed', '', '', '2019-09-20 20:08:12'),
(24, 40, 'closed', 'doneeeeeeee', '', '2019-09-20 20:14:08'),
(25, 40, 'selesai', 'okeeee', '', '2019-09-20 20:22:16'),
(26, 39, 'selesai', 'done', '', '2019-09-20 20:37:52'),
(27, 41, 'selesai', 'sudah oke ya.', '', '2019-09-22 08:38:19'),
(28, 42, 'selesai', 'sudah ya, tolong perbaiki yg bagian pendahuluan', '', '2019-09-24 13:25:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `iddosen` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `idmatakuliah1` int(11) DEFAULT NULL,
  `idmatakuliah2` int(11) DEFAULT NULL,
  `idmatakuliah3` int(11) DEFAULT NULL,
  `dosen` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`iddosen`, `username`, `password`, `idmatakuliah1`, `idmatakuliah2`, `idmatakuliah3`, `dosen`, `creationDate`, `updationDate`) VALUES
(32, 'yetli', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2, 3, 'Yetli Oslan, S.Kom., M.T', '2019-09-20 18:50:17', NULL),
(33, 'yetli2', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2, 3, 'Yetli Oslan, S.Kom., M.T', '2019-09-20 19:52:48', '2019-09-21 18:50:05'),
(34, 'yetli3', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2, 3, 'yetli3333333333333d', '2019-09-20 19:53:15', '2019-09-21 18:49:06'),
(35, 'argo', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2, 0, 'Argo Wibowo, S.T., MT', '2019-09-23 20:25:29', NULL),
(36, 'lussy', '827ccb0eea8a706c4c34a16891f84e7b', 2, 3, 0, 'Lussy Ernawati, S.Kom, M.Acc', '2019-09-23 20:36:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `idkelompok` int(11) NOT NULL,
  `klppeterpan` varchar(2) DEFAULT NULL,
  `nim` varchar(8) DEFAULT NULL,
  `dosen` varchar(255) DEFAULT NULL,
  `kehadiran1` tinyint(1) DEFAULT '0',
  `kehadiran2` tinyint(1) DEFAULT '0',
  `kehadiran3` tinyint(1) DEFAULT '0',
  `kehadiran4` tinyint(1) DEFAULT '0',
  `kehadiran5` tinyint(1) DEFAULT '0',
  `kehadiran6` tinyint(1) DEFAULT '0',
  `kehadiran7` tinyint(1) DEFAULT '0',
  `kehadiran8` tinyint(1) DEFAULT '0',
  `kehadiran9` tinyint(1) DEFAULT '0',
  `kehadiran10` tinyint(1) DEFAULT '0',
  `catatankonsultasi` mediumtext,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`idkelompok`, `klppeterpan`, `nim`, `dosen`, `kehadiran1`, `kehadiran2`, `kehadiran3`, `kehadiran4`, `kehadiran5`, `kehadiran6`, `kehadiran7`, `kehadiran8`, `kehadiran9`, `kehadiran10`, `catatankonsultasi`, `creationDate`, `updationDate`) VALUES
(1, '1', '72160057', 'yetli', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2019-09-22 13:57:29', '2019-09-23 19:32:03'),
(3, '2', '72160034', 'yetli', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2019-09-22 20:31:51', '2019-09-23 19:30:59'),
(6, '23', '72160061', 'yetli2', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2019-09-23 20:19:33', '2019-09-23 20:20:30'),
(7, '5', '72160001', 'argo', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2019-09-23 20:33:10', '2019-09-23 20:33:18'),
(8, '4', '72160002', 'yetli', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2019-09-24 13:27:23', '2019-09-24 13:27:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master`
--

CREATE TABLE `master` (
  `idmaster` int(225) NOT NULL,
  `koordinatorkp` mediumtext,
  `koordinatorskripsi` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master`
--

INSERT INTO `master` (`idmaster`, `koordinatorkp`, `koordinatorskripsi`) VALUES
(1, 'Argo Wibowo, S.T., MT.', 'Drs. Wimmie Handiwidjojo, MIT.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `idmatakuliah` int(11) NOT NULL,
  `matakuliah` varchar(255) DEFAULT NULL,
  `deskripsi` longtext,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`idmatakuliah`, `matakuliah`, `deskripsi`, `creationDate`, `updationDate`) VALUES
(1, '[SI3443] Pemograman Terintegrasi Terapan', '', '2019-09-12 18:55:57', NULL),
(2, '[SI4313] Kerja Praktik', '', '2019-09-12 19:01:05', '2019-09-20 17:34:57'),
(3, '[SI4426] Skripsi', '', '2019-09-12 19:01:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblkonsultasi`
--

CREATE TABLE `tblkonsultasi` (
  `idkonsultasi` int(11) NOT NULL,
  `idusers` int(11) DEFAULT NULL,
  `idmatakuliah` int(11) DEFAULT NULL,
  `dosen` varchar(255) DEFAULT NULL,
  `dosen2` varchar(255) DEFAULT NULL,
  `detailkonsultasi` mediumtext,
  `detailkonsultasi2` mediumtext,
  `filekonsultasi` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblkonsultasi`
--

INSERT INTO `tblkonsultasi` (`idkonsultasi`, `idusers`, `idmatakuliah`, `dosen`, `dosen2`, `detailkonsultasi`, `detailkonsultasi2`, `filekonsultasi`, `regDate`, `status`, `lastUpdationDate`) VALUES
(36, 2, 1, 'Yetli', NULL, 'sgdfgdfgfdgdfgf', NULL, '', '2019-09-20 19:08:02', NULL, NULL),
(37, 2, 1, '32', '32', 'bdbfdbdfb', NULL, '', '2019-09-20 19:27:15', NULL, NULL),
(38, 2, 1, 'Yetli', '32', 'baruuuu', NULL, '', '2019-09-20 19:48:43', NULL, NULL),
(39, 2, 1, 'Yetli', 'Yetli', 'dcdcdcdcdvd', NULL, '', '2019-09-20 19:51:00', 'selesai', '2019-09-20 20:37:52'),
(40, 2, 3, 'Yetli Oslan, S.Kom., M.T', 'yetli3333333333333', 'vfdvfdvdvfdvdf', NULL, '', '2019-09-20 19:54:20', 'selesai', '2019-09-21 18:51:39'),
(41, 2, 1, 'Yetli Oslan, S.Kom., M.T', NULL, 'pertukaran pikiran untuk mendapatkan kesimpulan (nasihat, saran, dan sebagainya) yang sebaik-baiknya;\r\n-- medis perundingan antara pemberi dan penerima layanan kesehatan yang bertujuan mencari penyebab timbulnya penyakit dan menentukan cara pengobatannya.', NULL, '', '2019-09-22 08:36:35', 'selesai', '2019-09-22 08:38:19'),
(42, 2, 2, 'Lussy Ernawati, S.Kom, M.Acc', NULL, 'bu ini bab 3 udh kelar, tolong di cek ya', NULL, 'tugas pjk seko.docx', '2019-09-24 13:23:29', 'selesai', '2019-09-24 13:25:13'),
(43, 2, 3, 'Yetli Oslan, S.Kom., M.T', 'Argo Wibowo, S.T., MT', 'pak tolong cek yaa', NULL, '', '2019-09-24 13:35:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `userlog`
--

CREATE TABLE `userlog` (
  `iduserlog` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `email` text NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` varchar(13) DEFAULT NULL,
  `judulskripsi` mediumtext,
  `judulkp` mediumtext,
  `tempatkp` mediumtext,
  `ipk` float DEFAULT '0',
  `tahunmasuk` year(4) DEFAULT '2000',
  `klppeterpan` varchar(2) DEFAULT '0',
  `address` tinytext,
  `nmwarga` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idusers`, `email`, `fullName`, `nim`, `password`, `contactNo`, `judulskripsi`, `judulkp`, `tempatkp`, `ipk`, `tahunmasuk`, `klppeterpan`, `address`, `nmwarga`, `country`, `pincode`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(2, 'ivan@gmail.com', 'Ivan Hector Sinambela', '72160057', '827ccb0eea8a706c4c34a16891f84e7b', '082386943219', 'Sistem Informasi Penjualan di Supermarket A dengan Metode B.', 'Penggunakan bahasa pemograman Python untuk menyeleksi data', 'PT. Niaga Indah Tbk.', 3.35, 2016, '2', 'Jl. dr. wahidin', 'WNI', 'Indonesia', 456545, '3cc793f0fa518bd747e11e7f17382b46.jpg', '2019-09-12 18:44:22', '2019-09-22 13:49:47', 1),
(7, 'celine@gmail.com', 'Celine Chelsea Hana', '72160034', '827ccb0eea8a706c4c34a16891f84e7b', '81357566821', '0', NULL, '', 3.71, 2000, '0', 'Jl. Banguntapan', 'Yetli Oslan, S.Kom, M.T.', 'Indonesia', 465656, '1fc58056cedcdccec30acb3802e444f5.jpg', '2019-09-19 14:39:16', '2019-09-22 13:02:21', 1),
(8, '', 'Tata', '72160061', '827ccb0eea8a706c4c34a16891f84e7b', '081111111111', NULL, NULL, NULL, 0, 2000, '0', NULL, NULL, NULL, NULL, NULL, '2019-09-23 19:36:31', '0000-00-00 00:00:00', 1),
(9, '', 'Steisy Putri', '72160001', '827ccb0eea8a706c4c34a16891f84e7b', '081111111111', NULL, NULL, NULL, 0, 2000, '0', NULL, NULL, NULL, NULL, NULL, '2019-09-23 20:26:43', '0000-00-00 00:00:00', 1),
(10, 'Erik@gmail.com', 'Erik', '72160002', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, 0, 2000, '0', NULL, NULL, NULL, NULL, NULL, '2019-09-23 20:38:28', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `idwarga` int(11) NOT NULL,
  `nmwarga` varchar(255) DEFAULT NULL,
  `deskripsi` tinytext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`idwarga`, `nmwarga`, `deskripsi`, `postingDate`, `updationDate`) VALUES
(16, 'WNI', '', '2019-09-19 17:20:56', '2019-09-20 19:01:14'),
(17, 'WNA', '', '2019-09-19 17:21:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`),
  ADD KEY `idusers` (`idusers`),
  ADD KEY `iddosen` (`iddosen`);

--
-- Indexes for table `catatandosen`
--
ALTER TABLE `catatandosen`
  ADD PRIMARY KEY (`idcatatandosen`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`iddosen`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`idkelompok`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`idmaster`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`idmatakuliah`);

--
-- Indexes for table `tblkonsultasi`
--
ALTER TABLE `tblkonsultasi`
  ADD PRIMARY KEY (`idkonsultasi`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`iduserlog`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`idwarga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catatandosen`
--
ALTER TABLE `catatandosen`
  MODIFY `idcatatandosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `iddosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `idkelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `idmatakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblkonsultasi`
--
ALTER TABLE `tblkonsultasi`
  MODIFY `idkonsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `iduserlog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `idwarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
