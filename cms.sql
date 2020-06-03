-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Sep 2019 pada 14.29
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '17-09-2019 12:37:54 AM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(3, '[SI3443] Pemograman Terintegrasi Terapan', '', '2019-09-12 18:55:57', NULL),
(4, '[SI4313] Kerja Praktik', '', '2019-09-12 19:01:05', '2019-09-12 19:01:14'),
(5, '[SI4426] Skripsi', '', '2019-09-12 19:01:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', 'Hi this for demo', '2017-04-01 17:29:19'),
(2, 9, 'in process', 'hiiiiiiiiiiiiiiiiiiii', '2017-04-01 18:37:59'),
(3, 3, 'in process', 'test', '2017-05-02 15:57:43'),
(4, 19, 'closed', 'case solved', '2017-06-11 11:18:33'),
(5, 1, 'closed', 'This sample text for testing', '2018-09-05 17:08:26'),
(6, 5, 'in process', 'test Data', '2019-06-24 07:26:17'),
(7, 23, 'in process', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-06-24 10:34:47'),
(8, 23, 'closed', 'Issue resolved ', '2019-06-24 10:37:08'),
(9, 24, 'in process', 'okee', '2019-09-13 05:00:24'),
(10, 24, 'closed', 'okee', '2019-09-13 05:01:32'),
(11, 25, 'in process', 'diproses ya', '2019-09-13 05:45:35'),
(12, 25, 'closed', 'sudah bagus, ditingkmatin lagi yaa', '2019-09-13 06:02:57'),
(13, 30, 'in process', 'sebentar ya', '2019-09-13 07:44:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `stateName` varchar(255) DEFAULT NULL,
  `stateDescription` tinytext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `state`
--

INSERT INTO `state` (`id`, `stateName`, `stateDescription`, `postingDate`, `updationDate`) VALUES
(7, 'Aloysius Airlangga Bajuadji, S.Kom., M.Eng.', '', '2019-09-13 05:04:28', NULL),
(8, 'Argo Wibowo, S.T., M.T.,', '', '2019-09-13 05:04:38', NULL),
(9, 'Lussy Ernawati, S.Kom., M.Acc', '', '2019-09-13 05:04:48', NULL),
(10, 'Yetli Oslan, S.Kom, M.T.', '', '2019-09-13 05:04:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subcategory`
--

INSERT INTO `subcategory` (`id`, `username`, `password`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(4, '', '', 3, 'Yetli Oslan, S.Kom, M.T.', '2019-09-13 05:23:32', NULL),
(5, '', '', 3, 'Aloysius Airlangga Bajuadji, S.Kom., M.Eng.', '2019-09-13 05:23:51', NULL),
(6, '', '', 3, 'Argo Wibowo, S.T., M.T., ', '2019-09-13 05:24:03', NULL),
(7, '', '', 3, 'Lussy Ernawati, S.Kom., M.Acc', '2019-09-13 05:24:15', NULL),
(8, '', '', 4, 'Argo Wibowo, S.T., M.T', '2019-09-13 07:41:20', NULL),
(9, '', '', 4, 'Lussy Ernawati, S.Kom, M.Acc', '2019-09-13 07:41:33', NULL),
(10, '', '', 4, 'Katon Wijana, S.Kom, M.T', '2019-09-13 07:41:43', NULL),
(11, '', '', 4, 'Yetli Oslan, S.Kom.,M.T.', '2019-09-13 07:41:56', NULL),
(12, '', '', 4, 'Drs. Jong Jek Siang, M.Sc', '2019-09-13 07:42:07', NULL),
(13, '', '', 4, 'Drs. Wimmie Handiwidjojo, MIT', '2019-09-13 07:42:17', NULL),
(14, '', '', 4, 'Budi Sutedjo Dharma Oetomo, S.Kom. M.M', '2019-09-13 07:42:49', NULL),
(15, '', '', 5, 'Argo Wibowo, S.T., M.T', '2019-09-13 07:43:21', NULL),
(16, '', '', 5, 'Lussy Ernawati, S.Kom, M.Acc', '2019-09-13 07:43:33', NULL),
(17, '', '', 5, 'Drs. Jong Jek Siang, M.Sc. ', '2019-09-13 07:43:43', NULL),
(24, 'ivan', '12345', 3, 'Ivan Sinambela', '2019-09-16 18:08:25', NULL),
(25, 'ivan', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'Sinambelaaaaa', '2019-09-16 18:22:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `categoryName` varchar(255) NOT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `complaintType` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `noc` varchar(255) DEFAULT NULL,
  `complaintDetails` mediumtext,
  `complaintFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `category`, `categoryName`, `subcategory`, `complaintType`, `state`, `noc`, `complaintDetails`, `complaintFile`, `regDate`, `status`, `lastUpdationDate`) VALUES
(25, 2, 3, '0', 'Yetli Oslan, S.Kom, M.T.', 'General Query', 'Argo Wibowo, S.T., M.T.,', 'gdfdfdfd', 'sdgergd', '', '2019-09-13 05:27:31', 'closed', '2019-09-13 06:02:57'),
(26, 2, 3, '0', 'Yetli Oslan, S.Kom, M.T.', ' Complaint', 'Aloysius Airlangga Bajuadji, S.Kom., M.Eng.', 'ertetr', 'tetet', '', '2019-09-13 06:14:06', NULL, NULL),
(27, 2, 3, '0', 'Yetli Oslan, S.Kom, M.T.', 'General Query', 'Lussy Ernawati, S.Kom., M.Acc', 'frgdsg', 'dfghdfh', '', '2019-09-13 06:14:34', NULL, NULL),
(28, 2, 4, '0', 'Select Subcategory', 'General Query', 'Aloysius Airlangga Bajuadji, S.Kom., M.Eng.', 'dg', 'gdg', '', '2019-09-13 06:15:42', NULL, NULL),
(29, 2, 4, '0', 'Select Subcategory', 'General Query', 'Aloysius Airlangga Bajuadji, S.Kom., M.Eng.', 'dg', 'gdg', '', '2019-09-13 06:17:51', NULL, NULL),
(30, 2, 3, '', 'Argo Wibowo, S.T., M.T., ', 'General Query', '', 'ygkg', 'gkkutu', 'ARTJOG MMXIX_Application Form_ Sup. Staff.docx', '2019-09-13 07:25:15', 'in process', '2019-09-13 07:44:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-28 17:04:36', '', 1),
(2, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-29 15:02:26', '', 1),
(3, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-30 14:58:00', '', 1),
(4, 0, 'dsad', 0x3a3a3100000000000000000000000000, '2017-03-31 17:39:07', '', 0),
(5, 0, 'dwerwer', 0x3a3a3100000000000000000000000000, '2017-03-31 17:41:22', '', 0),
(6, 0, 'ffert', 0x3a3a3100000000000000000000000000, '2017-03-31 17:41:29', '', 0),
(7, 0, 'ewrwe', 0x3a3a3100000000000000000000000000, '2017-03-31 17:42:12', '', 0),
(8, 0, 'ewrwe', 0x3a3a3100000000000000000000000000, '2017-03-31 17:47:51', '', 0),
(9, 0, 'ewrwe', 0x3a3a3100000000000000000000000000, '2017-03-31 17:47:54', '', 0),
(10, 0, 'fsdfsdff', 0x3a3a3100000000000000000000000000, '2017-03-31 17:48:11', '', 0),
(11, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-31 17:49:25', '', 1),
(12, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-01 18:52:35', '02-04-2017 12:24:41 AM', 1),
(13, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-01 18:58:09', '02-04-2017 12:50:42 AM', 1),
(14, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-01 19:38:15', '02-04-2017 01:08:19 AM', 1),
(15, 0, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-02 18:50:20', '', 0),
(16, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-02 18:50:28', '03-04-2017 12:26:50 AM', 1),
(17, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-05-02 18:01:26', '', 1),
(18, 0, 'test@gm.com', 0x3a3a3100000000000000000000000000, '2017-06-11 10:48:50', '', 0),
(19, 5, 'abc@abc.com', 0x3a3a3100000000000000000000000000, '2017-06-11 10:56:30', '11-06-2017 04:39:15 PM', 1),
(20, 6, 'xyz@xyz.com', 0x3a3a3100000000000000000000000000, '2017-06-11 11:13:28', '11-06-2017 04:45:46 PM', 1),
(21, 6, 'xyz@xyz.com', 0x3a3a3100000000000000000000000000, '2017-06-11 11:19:45', '11-06-2017 04:50:02 PM', 1),
(22, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-05-24 18:26:07', '', 1),
(23, 0, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-09-05 17:05:22', '', 0),
(24, 0, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-09-05 17:05:32', '', 0),
(25, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-09-05 17:07:12', '', 1),
(26, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2019-06-24 10:27:30', '24-06-2019 04:11:08 PM', 1),
(27, 0, 'admin', 0x3132372e302e302e3100000000000000, '2019-09-12 18:22:22', '', 0),
(28, 0, 'admin', 0x3132372e302e302e3100000000000000, '2019-09-12 18:23:22', '', 0),
(29, 2, 'ivan.hector@si.ukdw.ac.id', 0x3132372e302e302e3100000000000000, '2019-09-12 18:45:37', '13-09-2019 12:23:58 AM', 1),
(30, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 19:56:57', '', 0),
(31, 2, 'ivan.hector@si.ukdw.ac.id', 0x3132372e302e302e3100000000000000, '2019-09-12 20:01:09', '13-09-2019 01:31:32 AM', 1),
(32, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:03:17', '', 0),
(33, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:06:25', '', 0),
(34, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:06:37', '', 0),
(35, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:09:25', '', 0),
(36, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:09:32', '', 0),
(37, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:09:45', '', 0),
(38, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:11:19', '', 0),
(39, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:11:34', '', 0),
(40, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:13:22', '', 0),
(41, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:14:19', '', 0),
(42, 2, '', 0x3132372e302e302e3100000000000000, '2019-09-12 20:14:28', '', 1),
(43, 2, '', 0x3132372e302e302e3100000000000000, '2019-09-12 20:14:39', '', 1),
(44, 0, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:16:12', '', 0),
(45, 2, 'ivan.hector@si.ukdw.ac.id', 0x3132372e302e302e3100000000000000, '2019-09-12 20:16:20', '13-09-2019 01:51:37 AM', 1),
(46, 2, 'ivan.hector@si.ukdw.ac.id', 0x3132372e302e302e3100000000000000, '2019-09-12 20:26:04', '13-09-2019 02:07:56 AM', 1),
(47, 2, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:38:56', '13-09-2019 02:17:21 AM', 1),
(48, 2, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-12 20:47:34', '13-09-2019 02:20:30 AM', 1),
(49, 2, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-13 05:26:20', '13-09-2019 11:01:47 AM', 1),
(50, 2, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-13 06:03:21', '13-09-2019 01:03:57 PM', 1),
(51, 0, 'admin', 0x3132372e302e302e3100000000000000, '2019-09-13 07:35:13', '', 0),
(52, 2, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-16 16:40:03', '16-09-2019 10:40:38 PM', 1),
(53, 2, '72160057', 0x3132372e302e302e3100000000000000, '2019-09-16 19:08:20', '17-09-2019 01:31:40 AM', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `address` tinytext,
  `State` varchar(255) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `email`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `State`, `country`, `pincode`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(2, 'ivan@gmail.com', 'Ivan Hector Sinambela', '72160057', '827ccb0eea8a706c4c34a16891f84e7b', 82386943219, 'jl. dr. wahidin', 'Delhi', 'Indonesia', 456545, '3cc793f0fa518bd747e11e7f17382b46.jpg', '2019-09-12 18:44:22', '2019-09-12 20:47:14', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
