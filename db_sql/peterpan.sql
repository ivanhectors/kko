-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 02:32 PM
-- Server version: 10.1.30-MariaDB
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
-- Database: `peterpan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `nmadmin` varchar(255) NOT NULL DEFAULT 'admin',
  `emailadmin` varchar(255) DEFAULT NULL,
  `phoneadmin` varchar(255) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `updateadmin` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `nmadmin`, `emailadmin`, `phoneadmin`, `password`, `updateadmin`) VALUES
(4, 'ivan', 'admin', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(6, 'admin', 'admin', 'admin@ukdw.ac.id', '082388888888', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-08 00:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `catatankelompok`
--

CREATE TABLE `catatankelompok` (
  `idcatatankelompok` int(11) NOT NULL,
  `klppeterpan` varchar(2) DEFAULT NULL,
  `iddosen` varchar(255) DEFAULT NULL,
  `catatankonsultasi` mediumtext NOT NULL,
  `semester` int(5) DEFAULT NULL,
  `postingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatankelompok`
--

INSERT INTO `catatankelompok` (`idcatatankelompok`, `klppeterpan`, `iddosen`, `catatankonsultasi`, `semester`, `postingDate`) VALUES
(159, '7', 'yetli', 'Daerah Istimewa Yogyakarta adalah Daerah Istimewa setingkat provinsi di Indonesia yang merupakan peleburan Negara Kesultanan Yogyakarta dan Negara Kadipaten Paku Alaman. Daerah Istimewa Yogyakarta terletak di bagian selatan Pulau Jawa, dan berbatasan dengan Provinsi Jawa Tengah dan Samudera Hindia. Wikipedia.', 20191, '2019-11-06'),
(160, '7', 'yetli', 'Daerah Istimewa Yogyakarta adalah Daerah Istimewa setingkat provinsi di Indonesia yang merupakan peleburan Negara Kesultanan Yogyakarta dan Negara Kadipaten Paku Alaman. Daerah Istimewa Yogyakarta terletak di bagian selatan Pulau Jawa, dan berbatasan dengan Provinsi Jawa Tengah dan Samudera Hindia. Wikipedia.', 20191, '2019-11-07'),
(161, '3', 'yetli', 'htheth', 20191, '2019-11-12'),
(162, '7', 'yetli', 'Okeee', 20191, '2019-11-13'),
(163, '7', 'yetli', 'yaaaa', 20191, '2019-11-18'),
(164, '2', 'yetli', 'Bagus', 20191, '2019-11-21'),
(165, '1', 'argo', 'bagus. lanjutkan ya nak', 20191, '2019-11-13'),
(166, '1', 'yetli', 'Ya', 20191, '2019-12-11'),
(167, '7', 'yetli', 'Percobaan kehadiran mahasiswa', 20191, '2019-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `iddosen` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nmdosen` varchar(255) DEFAULT NULL,
  `telpdosen` varchar(255) DEFAULT NULL,
  `emaildosen` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`iddosen`, `username`, `password`, `nmdosen`, `telpdosen`, `emaildosen`, `creationDate`, `updationDate`) VALUES
(32, 'yetli', '827ccb0eea8a706c4c34a16891f84e7b', 'Yetli Oslan, S.Kom., M.T', '081233333333', 'yetli@staff.ukdw.ac.id', '2019-09-20 18:50:17', '2019-11-02 12:04:02'),
(35, 'argo', '827ccb0eea8a706c4c34a16891f84e7b', 'Argo Wibowo, S.T., MT', NULL, NULL, '2019-09-23 20:25:29', '2019-11-06 14:26:54'),
(38, 'lussy', '827ccb0eea8a706c4c34a16891f84e7b', 'Lussy Ernawati, S.Kom, M.Acc', NULL, NULL, '2019-10-12 12:40:43', '2019-10-14 15:50:07'),
(39, 'wimmie', '827ccb0eea8a706c4c34a16891f84e7b', 'Drs. Wimmie Handiwidjojo, MIT', NULL, NULL, '2019-10-14 15:32:02', NULL),
(40, 'jjs', '827ccb0eea8a706c4c34a16891f84e7b', 'Drs. Jong Jek Siang, M.Sc.', NULL, NULL, '2019-11-01 15:29:05', NULL),
(41, 'djoni', '827ccb0eea8a706c4c34a16891f84e7b', 'Drs. Djoni Dwijana, Ak., MT', NULL, NULL, '2019-11-01 15:29:46', NULL),
(42, 'harianto', '827ccb0eea8a706c4c34a16891f84e7b', 'Ir. Harianto Kristanto, MT., MM', NULL, NULL, '2019-11-01 15:30:12', NULL),
(43, 'budi', '827ccb0eea8a706c4c34a16891f84e7b', 'Budi Sutedjo Dharma Oetomo., S.Kom,MM', NULL, NULL, '2019-11-01 15:30:35', NULL),
(44, 'umi', '827ccb0eea8a706c4c34a16891f84e7b', 'Umi Proboyekti, S.Kom, MLIS', NULL, NULL, '2019-11-01 15:31:18', NULL),
(45, 'katon', '827ccb0eea8a706c4c34a16891f84e7b', 'Katon Wijana, S.Kom., MT', NULL, NULL, '2019-11-01 15:31:46', NULL),
(46, 'erick', '827ccb0eea8a706c4c34a16891f84e7b', 'Erick Kurniawan, M.Kom.', NULL, NULL, '2019-11-01 15:32:16', NULL),
(47, 'halim', '827ccb0eea8a706c4c34a16891f84e7b', 'Halim Budi Santoso, S.Kom., MT., MBA', NULL, NULL, '2019-11-01 15:32:33', NULL),
(48, 'hendra', '827ccb0eea8a706c4c34a16891f84e7b', 'Hendra Sigalingging, SS, M.Hum', NULL, NULL, '2019-11-01 15:32:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `idkehadiran` int(11) NOT NULL,
  `idkelompok` varchar(2) DEFAULT NULL,
  `idusers` int(11) DEFAULT NULL,
  `iddosen` varchar(255) DEFAULT NULL,
  `semester` int(5) NOT NULL,
  `statuskehadiran` varchar(255) NOT NULL DEFAULT '0',
  `postingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`idkehadiran`, `idkelompok`, `idusers`, `iddosen`, `semester`, `statuskehadiran`, `postingDate`) VALUES
(337, '7', 72160057, 'yetli', 20191, '1', '2019-11-06'),
(338, '7', 72160034, 'yetli', 20191, '0', '2019-11-06'),
(339, '7', 72160057, 'yetli', 20191, '1', '2019-11-07'),
(340, '7', 72160034, 'yetli', 20191, '1', '2019-11-07'),
(341, '3', 72160001, 'yetli', 20191, '1', '2019-11-12'),
(342, '7', 72160057, 'yetli', 20191, '1', '2019-11-13'),
(343, '7', 72160034, 'yetli', 20191, '1', '2019-11-13'),
(344, '7', 72160057, 'yetli', 20191, '1', '2019-11-18'),
(345, '7', 72160034, 'yetli', 20191, '0', '2019-11-18'),
(346, '2', 72160003, 'yetli', 20191, '1', '2019-11-21'),
(347, '2', 72160087, 'yetli', 20191, '0', '2019-11-21'),
(348, '1', 72160043, 'argo', 20191, '1', '2019-11-13'),
(349, '1', 72160010, 'argo', 20191, '0', '2019-11-13'),
(350, '1', 72160075, 'yetli', 20191, '0', '2019-12-11'),
(351, '1', 72160021, 'yetli', 20191, '1', '2019-12-11'),
(352, '7', 72160057, 'yetli', 20191, '1', '2019-12-14'),
(353, '7', 72160034, 'yetli', 20191, '1', '2019-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `idkelompok` int(11) NOT NULL,
  `klppeterpan` varchar(2) DEFAULT NULL,
  `idusers` int(11) DEFAULT NULL,
  `iddosen` varchar(255) DEFAULT NULL,
  `semester` int(5) DEFAULT NULL,
  `nilaiakhir` varchar(4) DEFAULT '0',
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDateKelompok` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`idkelompok`, `klppeterpan`, `idusers`, `iddosen`, `semester`, `nilaiakhir`, `creationDate`, `updationDateKelompok`) VALUES
(25, '7', 72160057, 'yetli', 20191, '50', '2019-10-14 14:11:25', '2019-12-04 12:30:14'),
(26, '7', 72160061, 'yetli', 20192, '78', '2019-10-18 12:46:54', '2019-11-21 12:44:13'),
(27, '7', 72160034, 'yetli', 20191, '60', '2019-10-18 12:47:08', '2019-12-04 12:30:14'),
(30, '3', 72160001, 'yetli', 20191, '79', '2019-10-19 08:37:16', '2019-10-27 16:45:05'),
(31, '7', 72160059, 'lussy', 20191, '65', '2019-10-19 08:38:26', '2019-11-01 08:41:16'),
(33, '2', 72160003, 'yetli', 20191, '20', '2019-11-01 16:50:40', '2019-11-21 12:58:00'),
(34, '2', 72160087, 'yetli', 20191, '0', '2019-11-01 16:50:57', NULL),
(35, '1', 72160043, 'argo', 20191, '0', '2019-11-01 16:51:13', NULL),
(36, '1', 72160010, 'argo', 20191, '20', '2019-11-01 16:51:21', '2019-11-30 19:24:09'),
(37, '2', 72150013, 'lussy', 20191, '0', '2019-11-01 16:51:31', NULL),
(38, '2', 72160036, 'lussy', 20191, '0', '2019-11-01 16:51:38', NULL),
(39, '1', 72160064, 'halim', 20191, '0', '2019-11-01 16:51:53', NULL),
(40, '1', 72160058, 'halim', 20191, '0', '2019-11-01 16:52:01', NULL),
(41, '1', 72160075, 'yetli', 20191, '0', '2019-12-11 14:59:01', NULL),
(42, '1', 72160021, 'yetli', 20191, '0', '2019-12-11 14:59:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `idkrs` int(11) NOT NULL,
  `idusers` int(11) DEFAULT NULL,
  `iddosen` varchar(250) DEFAULT NULL,
  `pembimbing` varchar(1) DEFAULT NULL,
  `idmatakuliah` varchar(6) DEFAULT NULL,
  `semester` int(5) DEFAULT NULL,
  `postingDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `updationDate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`idkrs`, `idusers`, `iddosen`, `pembimbing`, `idmatakuliah`, `semester`, `postingDate`, `updationDate`) VALUES
(54, 72160057, 'yetli', '1', 'SI4313', 20191, '2019-11-10 15:35:49', '2019-11-19 21:08:34'),
(55, 72160057, 'yetli', '1', 'SI4426', 20191, '2019-11-10 15:35:57', '2019-11-19 18:23:18'),
(56, 72160057, 'argo', '2', 'SI4426', 20191, '2019-11-10 15:36:05', '2019-11-19 18:23:18'),
(57, 72160034, 'yetli', '1', 'SI4313', 20191, '2019-11-12 20:32:29', '2019-11-19 21:08:34'),
(58, 72160034, 'yetli', '1', 'SI4426', 20191, '2019-11-12 20:32:39', '2019-11-19 21:08:34'),
(59, 72160034, 'lussy', '2', 'SI4426', 20191, '2019-11-12 20:32:46', '2019-12-01 01:59:31'),
(61, 72160036, 'wimmie', '2', 'SI4426', 20191, '2019-11-19 20:49:39', '2019-11-19 20:49:39'),
(62, 72160036, 'lussy', '2', 'SI4426', 20191, '2019-11-19 20:50:51', '2019-11-19 20:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `idmaster` int(225) NOT NULL,
  `kkp` varchar(225) DEFAULT NULL,
  `kskripsi` varchar(225) DEFAULT NULL,
  `footertahun` year(4) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`idmaster`, `kkp`, `kskripsi`, `footertahun`, `copyright`) VALUES
(1, 'Argo Wibowo, S.T., MT', 'Drs. Wimmie Handiwidjojo, MIT', 2019, 'Pemrograman Terintegrasi Terapan');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `idmatakuliah` int(11) NOT NULL,
  `kdmatakuliah` varchar(6) DEFAULT NULL,
  `matakuliah` varchar(255) DEFAULT NULL,
  `tags` varchar(25) DEFAULT NULL,
  `statusmakul` int(1) DEFAULT NULL,
  `deskripsi` longtext,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`idmatakuliah`, `kdmatakuliah`, `matakuliah`, `tags`, `statusmakul`, `deskripsi`, `creationDate`, `updationDate`) VALUES
(1, 'SI3423', 'Pemograman Terintegrasi Terapan', 'peterpan', NULL, '', '2019-09-12 18:55:57', '2019-11-17 13:01:14'),
(2, 'SI4313', 'Kerja Praktik', 'kp', 1, '', '2019-09-12 19:01:05', '2019-11-17 13:01:14'),
(3, 'SI4426', 'Skripsi', 'skripsi', 1, '', '2019-09-12 19:01:53', '2019-11-17 13:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblkonsultasi`
--

CREATE TABLE `tblkonsultasi` (
  `nokonsultasi` int(11) NOT NULL,
  `idkrs` int(11) DEFAULT NULL,
  `idusers` int(11) DEFAULT NULL,
  `iddosen` varchar(255) DEFAULT NULL,
  `idmatakuliah` varchar(6) DEFAULT NULL,
  `detailkonsultasi` mediumtext,
  `catatankonsultasi` mediumtext,
  `filekonsultasi` varchar(255) DEFAULT NULL,
  `filerevisi` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sts_konsul` varchar(50) DEFAULT NULL,
  `semester` int(5) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkonsultasi`
--

INSERT INTO `tblkonsultasi` (`nokonsultasi`, `idkrs`, `idusers`, `iddosen`, `idmatakuliah`, `detailkonsultasi`, `catatankonsultasi`, `filekonsultasi`, `filerevisi`, `regDate`, `sts_konsul`, `semester`, `lastUpdationDate`) VALUES
(9, 0, 72160057, 'yetli', 'SI4313', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change ', 'dadsdadvdhdghfdhfdhgdsdgh', 'eaf4f3b9b8c99379e518420da1c99c42..pdf', NULL, '2019-11-10 08:36:28', 'selesai', 20191, '2019-11-14 15:55:51'),
(10, 0, 72160057, 'yetli', 'SI4426', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add gtfh', '', 'd41d8cd98f00b204e9800998ecf8427e.', '2019-11-10 08:38:43', 'selesai', NULL, '2019-12-04 12:34:28'),
(12, 0, 72160057, 'yetli', 'SI4313', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(', 'okee', '', NULL, '2019-11-10 08:41:17', 'selesai', 20191, '2019-11-12 12:30:57'),
(13, 0, 72160057, 'yetli', 'SI4313', 'Great solution,sdfsdgf', 'Republik Indonesia atau Negara Kesatuan Republik Indonesia, atau lebih umum disebut Indonesia, adalah negara di Asia Tenggara yang dilintasi garis khatulistiwa dan berada di antara daratan benua Asia dan Australia, serta antara Samudra Pasifik dan Samudra Hindia.', '', NULL, '2019-11-10 08:46:38', 'selesai', 20192, '2019-11-16 11:46:04'),
(14, 0, 72160057, 'yetli', 'SI4313', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(', '', 'd41d8cd98f00b204e9800998ecf8427e.', '2019-11-10 08:49:54', 'selesai', 20191, '2019-11-16 20:46:38'),
(15, 0, 72160057, 'yetli', 'SI4313', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(', 'fsfsf', '', 'd41d8cd98f00b204e9800998ecf8427e.', '2019-11-10 08:51:49', 'selesai', 20191, '2019-11-15 15:29:14'),
(16, 0, 72160057, 'yetli', 'SI4313', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(', 'donttttt', '72160057 (1).docx', 'd41d8cd98f00b204e9800998ecf8427e.', '2019-11-10 08:52:54', 'selesai', 20191, '2019-11-12 17:01:43'),
(17, 0, 72160057, 'yetli', 'SI4313', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(', 'okeeeee', '72160057 (1).docx', 'fd4c8e59b8a7add298869bd9fef2417c..JPG', '2019-11-10 08:53:20', 'selesai', 20191, '2019-11-18 06:09:22'),
(19, 0, 72160057, 'yetli', 'SI4313', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(', 'yasss', 'BAB_I.pdf', 'cb06349c4191a8ed76fcf758a6d76256..png', '2019-11-10 09:02:34', 'selesai', 20191, '2019-11-13 16:00:21'),
(20, 0, 72160057, 'argo', 'SI4426', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(', 'dadasdasdasdsad', 'Ivan_Hector_Sinambela_Resume.pdf', 'd41d8cd98f00b204e9800998ecf8427e.', '2019-11-10 10:56:12', 'selesai', 20191, '2019-11-17 13:20:27'),
(21, 0, 72160057, 'yetli', 'SI4426', 'Great solution, but you actually do need javascript. If you want to display the file name, as other people have been asking, you need to add a span between the label and the hidden input: <span id=\"file-selected\"></span>. Then update the span on the change event: $(', 'ya ini test lagi yaa ya ini test lagi yaaya ini test lagi yaaya ini test lagi yaaya ini test lagi yaaya ini test lagi yaaya ini test lagi yaaya ini test lagi yaaya ini test lagi yaaya ini test lagi yaaya ini test lagi yaaya ini test lagi yaaya ini te', '', 'd41d8cd98f00b204e9800998ecf8427e.', '2019-11-10 11:01:52', 'selesai', 20191, '2019-11-20 15:16:49'),
(30, 0, 72160034, 'yetli', 'SI4313', 'yasss2', 'fhdshbgbsxhtg', 'f943a1ebdafcd8186909acf0a7a6021a.pdf', 'd41d8cd98f00b204e9800998ecf8427e.', '2019-11-12 14:15:29', 'selesai', 20191, '2019-11-21 12:38:58'),
(31, 0, 72160034, 'yetli', 'SI4313', 'dadasdsarrujhurukksh', 'Perbaiki bagian latar belakang ya cel.', 'b476b608d12140d56a681d16e81d16ed..jpg', 'c69b03d42df3f816d68e503b30a449b4..pdf', '2019-11-12 14:18:47', 'selesai', 20191, '2019-11-28 16:10:56'),
(32, 0, 72160034, 'yetli', 'SI4426', 'dadasdasdasd', 'Okee', '20e99c8691898062d04f644eb1f4309c.jpg', 'ed84bcc747d76e06d100b3aff15508cf..png', '2019-11-12 16:20:04', 'selesai', 20191, '2019-12-04 12:21:45'),
(33, 0, 72160034, 'yetli', 'SI4426', 'gdfgdfgdfhd', NULL, '20e99c8691898062d04f644eb1f4309c..jpg', NULL, '2019-11-12 16:22:18', NULL, 20191, NULL),
(34, 0, 72160057, 'yetli', 'SI4426', 'Test kirim', 'ini contoh konsultasi untuk di tampilkan pada report dosen.', 'f76e3380280200f7a0ddb43d453adbd3..PNG', 'd41d8cd98f00b204e9800998ecf8427e.', '2019-11-20 14:52:01', 'selesai', 20191, '2019-12-04 12:36:19'),
(39, 0, 72160057, 'yetli', 'SI4313', 'jaska', NULL, 'd41d8cd98f00b204e9800998ecf8427e.', NULL, '2019-12-07 17:37:25', NULL, 20191, NULL),
(40, 0, 72160057, 'yetli', 'SI4313', 'xsxsxs', NULL, 'd41d8cd98f00b204e9800998ecf8427e.', NULL, '2019-12-07 17:47:38', NULL, 20191, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `iduserlog` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`iduserlog`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-02 08:32:13', '', 1),
(2, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-02 08:34:29', '02-11-2019 02:04:32 PM', 1),
(3, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-08 08:09:00', '', 1),
(4, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-09 13:29:27', '09-11-2019 06:59:53 PM', 1),
(5, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-09 13:41:26', '', 1),
(6, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-09 15:27:06', '09-11-2019 10:06:53 PM', 1),
(7, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-09 16:37:09', '', 1),
(8, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-09 16:39:55', '', 1),
(9, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-10 07:49:21', '', 1),
(10, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-10 10:35:01', '', 1),
(11, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-10 11:00:44', '10-11-2019 08:43:39 PM', 1),
(12, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-11 12:17:20', '', 1),
(13, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-11 16:22:24', '', 1),
(14, '72160034', 0x3a3a3100000000000000000000000000, '2019-11-12 13:33:47', '', 1),
(15, '72160034', 0x3a3a3100000000000000000000000000, '2019-11-12 13:37:37', '12-11-2019 09:52:56 PM', 1),
(16, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-13 16:08:08', '', 1),
(17, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-14 07:18:24', '', 1),
(18, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-15 13:20:39', '15-11-2019 08:57:17 PM', 1),
(19, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-15 15:39:22', '', 1),
(20, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-16 10:01:18', '', 0),
(21, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-16 10:01:27', '', 1),
(22, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-16 15:45:12', '', 1),
(23, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-17 09:11:01', '', 0),
(24, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-17 15:49:09', '', 1),
(25, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-18 05:16:45', '', 1),
(26, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-18 05:34:59', '18-11-2019 11:07:13 AM', 1),
(27, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-18 05:37:27', '', 1),
(28, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-19 11:19:35', '', 1),
(29, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-20 14:44:07', '', 0),
(30, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-20 14:44:15', '', 1),
(31, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-20 14:51:33', '', 1),
(32, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-21 12:09:16', '21-11-2019 05:48:57 PM', 1),
(33, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-28 15:29:37', '', 0),
(34, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-28 15:30:08', '28-11-2019 09:01:06 PM', 1),
(35, '72160034', 0x3a3a3100000000000000000000000000, '2019-11-28 15:32:08', '28-11-2019 09:25:12 PM', 1),
(36, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-28 15:55:20', '28-11-2019 09:33:43 PM', 1),
(37, '72160034', 0x3a3a3100000000000000000000000000, '2019-11-28 16:03:52', '28-11-2019 09:56:24 PM', 1),
(38, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-28 16:26:40', '', 1),
(39, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-30 17:53:42', '', 0),
(40, '72160057', 0x3a3a3100000000000000000000000000, '2019-11-30 17:53:50', '', 1),
(41, '72160057', 0x3a3a3100000000000000000000000000, '2019-12-04 12:19:31', '', 0),
(42, '72160057', 0x3a3a3100000000000000000000000000, '2019-12-04 12:19:49', '', 1),
(43, '72160057', 0x3a3a3100000000000000000000000000, '2019-12-07 17:29:08', '07-12-2019 11:00:27 PM', 1),
(44, '72160001', 0x3a3a3100000000000000000000000000, '2019-12-07 17:30:39', '07-12-2019 11:07:01 PM', 1),
(45, '72160057', 0x3a3a3100000000000000000000000000, '2019-12-07 17:37:11', '', 1),
(46, '72160057', 0x3a3a3100000000000000000000000000, '2019-12-14 06:08:10', '14-12-2019 02:47:31 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `nim` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `namalengkap` varchar(255) DEFAULT NULL,
  `email` text NOT NULL,
  `telpon` varchar(13) DEFAULT NULL,
  `judulskripsi` mediumtext,
  `judulkp` mediumtext,
  `tempatkp` mediumtext,
  `ipk` float DEFAULT '0',
  `alamat` tinytext,
  `nmwarga` varchar(255) DEFAULT NULL,
  `kodepos` int(6) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `nim`, `password`, `namalengkap`, `email`, `telpon`, `judulskripsi`, `judulkp`, `tempatkp`, `ipk`, `alamat`, `nmwarga`, `kodepos`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(2, 72160057, '827ccb0eea8a706c4c34a16891f84e7b', 'Ivan Hector Sinambela', 'ivan@gmail.com', '082386943219', 'Sistem Informasi Penjualan di Supermarket A dengan Metode B.', 'Penggunakan bahasa pemograman Python untuk menyeleksi data pada tabel.', 'PT. Niaga Indah Tbk.', 3.35, 'Jl. Dr Wahidin', 'WNI', 66666, '3cc793f0fa518bd747e11e7f17382b46.jpg', '2019-09-12 18:44:22', '2019-11-17 16:00:22', 1),
(7, 72160034, '827ccb0eea8a706c4c34a16891f84e7b', 'Celine Chelsea Hana', 'celine@gmail.com', '81357566821', 'Pembuatan Sistem Informasi GNSS CORS UNDIP Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', '', 3.71, 'Jl. Banguntapan', 'WNI', 465656, '1fc58056cedcdccec30acb3802e444f5.jpg', '2019-09-19 14:39:16', '2019-12-11 14:44:18', 1),
(8, 72160061, '827ccb0eea8a706c4c34a16891f84e7b', 'Tata', '', '081111111111', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-09-23 19:36:31', '2019-12-11 14:43:43', 1),
(9, 72160001, '827ccb0eea8a706c4c34a16891f84e7b', 'Steisy Putri', '', '081111111111', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-09-23 20:26:43', '2019-12-11 14:43:43', 1),
(11, 72160059, '827ccb0eea8a706c4c34a16891f84e7b', 'Erik', 'Erik@gmail.com', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-10-12 10:02:37', '2019-12-11 14:43:43', 1),
(12, 72160003, '827ccb0eea8a706c4c34a16891f84e7b', 'Dimas Sanjaya', 'dimas@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 15:58:41', '2019-12-11 14:43:43', 1),
(13, 72160087, '827ccb0eea8a706c4c34a16891f84e7b', 'Dinda Yolanda Br Ginting', 'dinda@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 15:59:04', '2019-12-11 14:43:43', 1),
(14, 72160043, '827ccb0eea8a706c4c34a16891f84e7b', 'Agustinus Arsa P.A', 'arsa@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 15:59:28', '2019-12-11 14:43:43', 1),
(15, 72160010, '827ccb0eea8a706c4c34a16891f84e7b', 'Pedro Raymon Lapebesi', 'pedro@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 15:59:49', '2019-12-11 14:43:43', 1),
(16, 72150013, '827ccb0eea8a706c4c34a16891f84e7b', 'Marcellinus Pradipta Christie', 'marcel@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:00:12', '2019-12-11 14:43:43', 1),
(17, 72160075, '827ccb0eea8a706c4c34a16891f84e7b', 'Raini Debora Sembiring', 'raini@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:00:39', '2019-12-11 14:43:43', 1),
(18, 72160036, '827ccb0eea8a706c4c34a16891f84e7b', 'Tabita Sonia Ayudea', 'tata@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:01:13', '2019-12-11 14:43:43', 1),
(19, 72160058, '827ccb0eea8a706c4c34a16891f84e7b', 'Ica Yenni Alowina Br. Tarigan', 'ica@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:01:34', '2019-12-11 14:43:43', 1),
(20, 72160064, '827ccb0eea8a706c4c34a16891f84e7b', 'Anastasia Nadya Pratama', 'anas@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:01:54', '2019-12-11 14:43:43', 1),
(21, 72150020, '827ccb0eea8a706c4c34a16891f84e7b', 'Bramastya Hanindya Jati', 'bramastya@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:02:27', '2019-12-11 14:43:43', 1),
(22, 72130017, '827ccb0eea8a706c4c34a16891f84e7b', 'Nugraha Anggit Pradipta', 'nugraha@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:02:49', '2019-12-11 14:43:43', 1),
(23, 72160002, '827ccb0eea8a706c4c34a16891f84e7b', 'David Febriawan Pradana', 'david@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:03:18', '2019-12-11 14:43:43', 1),
(24, 72160030, '827ccb0eea8a706c4c34a16891f84e7b', 'Nina Wulandari', 'nina@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:03:46', '2019-12-11 14:43:43', 1),
(25, 72140025, '827ccb0eea8a706c4c34a16891f84e7b', 'Kevin Purnomo', 'kevin@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:04:05', '2019-12-11 14:43:43', 1),
(26, 72160065, '827ccb0eea8a706c4c34a16891f84e7b', 'Jerry Triananda P', 'jerry@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:04:26', '2019-12-11 14:43:43', 1),
(27, 72160055, '827ccb0eea8a706c4c34a16891f84e7b', 'Krisjayanti G.M. Putri', 'putri@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:04:49', '2019-12-11 14:43:43', 1),
(28, 72160031, '827ccb0eea8a706c4c34a16891f84e7b', 'Nevio Pratama O', 'nevio@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:05:11', '2019-12-11 14:43:43', 1),
(29, 72160041, '827ccb0eea8a706c4c34a16891f84e7b', 'Robertus Inuhan', 'robert@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:05:33', '2019-12-11 14:43:43', 1),
(30, 72160051, '827ccb0eea8a706c4c34a16891f84e7b', 'Fransediky Pomfasi', 'diky@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:05:57', '2019-12-11 14:43:43', 1),
(31, 72160015, '827ccb0eea8a706c4c34a16891f84e7b', 'Henry Kristianto', 'henry@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:06:20', '2019-12-11 14:43:43', 1),
(32, 72160021, '827ccb0eea8a706c4c34a16891f84e7b', 'Yonatan', 'yonatan@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:06:43', '2019-12-11 14:43:43', 1),
(33, 72150031, '827ccb0eea8a706c4c34a16891f84e7b', 'Daniel Hartono', 'daniel@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:07:10', '2019-12-11 14:43:43', 1),
(34, 72160070, '827ccb0eea8a706c4c34a16891f84e7b', 'Daniel Setiawan ', 'daniel@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:07:33', '2019-12-11 14:43:43', 1),
(35, 72150043, '827ccb0eea8a706c4c34a16891f84e7b', 'Yubelince Naomi Wakum ', 'yube@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:08:09', '2019-12-11 14:43:43', 1),
(36, 72150037, '827ccb0eea8a706c4c34a16891f84e7b', 'Septianus Ebenhaezer Tampubolon', 'septianus@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:08:37', '2019-12-11 14:43:43', 1),
(37, 72150057, '827ccb0eea8a706c4c34a16891f84e7b', 'Yoshua Doni Nopiyanto ', 'yoshua@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:08:58', '2019-12-11 14:43:43', 1),
(38, 72150048, '827ccb0eea8a706c4c34a16891f84e7b', 'Zora Elnia Betsaida', 'zora@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:09:21', '2019-12-11 14:43:43', 1),
(39, 72160054, '827ccb0eea8a706c4c34a16891f84e7b', 'Miraldi Alpin Jordan ', 'miraldi@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:09:50', '2019-12-11 14:43:43', 1),
(40, 72160014, '827ccb0eea8a706c4c34a16891f84e7b', 'Lusia Odilla Frianti ', 'lusia@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:10:14', '2019-12-11 14:43:43', 1),
(41, 72160042, '827ccb0eea8a706c4c34a16891f84e7b', 'Bobby Yusuf Lukito', 'bobby@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:10:34', '2019-12-11 14:43:43', 1),
(42, 72160044, '827ccb0eea8a706c4c34a16891f84e7b', 'Aman Sejahtera Gulo', 'aman@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:10:53', '2019-12-11 14:43:43', 1),
(43, 72160037, '827ccb0eea8a706c4c34a16891f84e7b', 'Deny Atlanta', 'deny@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:11:11', '2019-12-11 14:43:43', 1),
(44, 72160013, '827ccb0eea8a706c4c34a16891f84e7b', 'Hendrick Adi Pratama', 'hendrick@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:11:34', '2019-12-11 14:43:43', 1),
(45, 72160048, '827ccb0eea8a706c4c34a16891f84e7b', 'Andrie Kristianto', 'andrie@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:11:55', '2019-12-11 14:43:43', 1),
(46, 72150003, '827ccb0eea8a706c4c34a16891f84e7b', 'Vinno Ayu Putri A Iribaram', 'vinno@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:12:14', '2019-12-11 14:43:43', 1),
(47, 72160028, '827ccb0eea8a706c4c34a16891f84e7b', 'Marcellino Elang Satria W', 'elang@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:12:36', '2019-12-11 14:43:43', 1),
(48, 72160012, '827ccb0eea8a706c4c34a16891f84e7b', 'Ricky Hendzen Sinaga ', 'ricky@si.ukdw.ac.id', '081280808080', 'Sistem Informasi Geografis Pasar Tradisional di Kabupaten Kulon Progo Berbasis Web', 'Perancangan Sistem Informasi Manajemen Bimbingan Skripsi Berbasis Web', 'PT. Indonesia Maju', 3.58, 'JL. Dr. Wahidin Sudirohusodo No.212 Kota Yogyakarta', 'WNI', 55555, NULL, '2019-11-01 16:12:57', '2019-12-11 14:43:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `idwarga` int(11) NOT NULL,
  `nmwarga` varchar(255) DEFAULT NULL,
  `deskripsi` tinytext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`idwarga`, `nmwarga`, `deskripsi`, `postingDate`, `updationDate`) VALUES
(16, 'WNI', '', '2019-09-19 17:20:56', '2019-11-02 11:42:31'),
(18, 'WNA', '', '2019-11-02 11:40:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `catatankelompok`
--
ALTER TABLE `catatankelompok`
  ADD PRIMARY KEY (`idcatatankelompok`),
  ADD KEY `catatankelompok_semester` (`semester`),
  ADD KEY `catatankelompok_iddosen` (`iddosen`),
  ADD KEY `catatankelompok_klppeterpan` (`klppeterpan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`iddosen`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `nmdosen` (`nmdosen`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`idkehadiran`),
  ADD KEY `iddosen` (`iddosen`),
  ADD KEY `idusers` (`idusers`),
  ADD KEY `kehadiran_idkelompok` (`idkelompok`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`idkelompok`),
  ADD KEY `kelompok_idusers` (`idusers`),
  ADD KEY `kelompok_iddosen` (`iddosen`),
  ADD KEY `klppeterpan` (`klppeterpan`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`idkrs`),
  ADD KEY `idusers` (`idusers`) USING BTREE,
  ADD KEY `idmatakuliah` (`idmatakuliah`) USING BTREE,
  ADD KEY `iddosen` (`iddosen`) USING BTREE;

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`idmaster`),
  ADD KEY `kkp` (`kkp`),
  ADD KEY `kskripsi` (`kskripsi`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`idmatakuliah`),
  ADD UNIQUE KEY `kdmatakuliah` (`kdmatakuliah`);

--
-- Indexes for table `tblkonsultasi`
--
ALTER TABLE `tblkonsultasi`
  ADD PRIMARY KEY (`nokonsultasi`),
  ADD KEY `idusers` (`idusers`),
  ADD KEY `id_dosen` (`iddosen`),
  ADD KEY `idmatakuliah` (`idmatakuliah`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`iduserlog`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`),
  ADD UNIQUE KEY `nim` (`nim`);

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
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catatankelompok`
--
ALTER TABLE `catatankelompok`
  MODIFY `idcatatankelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `iddosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `idkehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `idkelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `idkrs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `idmatakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblkonsultasi`
--
ALTER TABLE `tblkonsultasi`
  MODIFY `nokonsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `iduserlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `idwarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatankelompok`
--
ALTER TABLE `catatankelompok`
  ADD CONSTRAINT `catatankelompok_iddosen` FOREIGN KEY (`iddosen`) REFERENCES `kelompok` (`iddosen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `catatankelompok_klppeterpan` FOREIGN KEY (`klppeterpan`) REFERENCES `kelompok` (`klppeterpan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `catatankelompok_semester` FOREIGN KEY (`semester`) REFERENCES `kelompok` (`semester`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_iddosen` FOREIGN KEY (`iddosen`) REFERENCES `dosen` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_idkelompok` FOREIGN KEY (`idkelompok`) REFERENCES `kelompok` (`klppeterpan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_idusers` FOREIGN KEY (`idusers`) REFERENCES `users` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kelompok_iddosen` FOREIGN KEY (`iddosen`) REFERENCES `dosen` (`username`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kelompok_idusers` FOREIGN KEY (`idusers`) REFERENCES `users` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_iddosen` FOREIGN KEY (`iddosen`) REFERENCES `dosen` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_idusers` FOREIGN KEY (`idusers`) REFERENCES `users` (`nim`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_kdmatakuliah` FOREIGN KEY (`idmatakuliah`) REFERENCES `matakuliah` (`kdmatakuliah`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `master`
--
ALTER TABLE `master`
  ADD CONSTRAINT `kkp` FOREIGN KEY (`kkp`) REFERENCES `dosen` (`nmdosen`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kskripsi` FOREIGN KEY (`kskripsi`) REFERENCES `dosen` (`nmdosen`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tblkonsultasi`
--
ALTER TABLE `tblkonsultasi`
  ADD CONSTRAINT `id_dosen` FOREIGN KEY (`iddosen`) REFERENCES `dosen` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `idmatakuliah` FOREIGN KEY (`idmatakuliah`) REFERENCES `matakuliah` (`kdmatakuliah`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `idusers` FOREIGN KEY (`idusers`) REFERENCES `users` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
