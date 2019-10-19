-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2019 at 07:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Permikomnas`
--

-- --------------------------------------------------------

--
-- Table structure for table `DB_Artikel`
--

CREATE TABLE `DB_Artikel` (
  `ID_Artikel` int(11) NOT NULL,
  `Nama_artikel` varchar(256) NOT NULL,
  `Slug` varchar(256) NOT NULL,
  `Picture` varchar(100) NOT NULL,
  `Tgl` date NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Category` int(11) NOT NULL,
  `Deskripsi` varchar(5000) NOT NULL,
  `Visitor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DB_Artikel_Tag`
--

CREATE TABLE `DB_Artikel_Tag` (
  `ID_Artikel_Tag` int(11) NOT NULL,
  `ID_Artikel` int(11) NOT NULL,
  `ID_Tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DB_Category`
--

CREATE TABLE `DB_Category` (
  `ID_Category` int(11) NOT NULL,
  `Category_name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DB_Kampus`
--

CREATE TABLE `DB_Kampus` (
  `ID_Kampus` int(11) NOT NULL,
  `Kampus` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Logo` varchar(100) NOT NULL,
  `Tgl_Join` date NOT NULL,
  `Active` int(11) NOT NULL DEFAULT '1',
  `ID_Wilayah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DB_StrukturOrganisasi`
--

CREATE TABLE `DB_StrukturOrganisasi` (
  `ID_StrukturOrgranisasi` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Wilayah` int(11) NOT NULL,
  `Jabatan` varchar(100) NOT NULL,
  `Parent` int(11) NOT NULL DEFAULT '0',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DB_StrukturOrganisasi`
--

INSERT INTO `DB_StrukturOrganisasi` (`ID_StrukturOrgranisasi`, `ID_User`, `ID_Wilayah`, `Jabatan`, `Parent`, `Created`, `Modified`) VALUES
(1, 1, 1, 'Admin Pusat', 0, '2019-04-11 17:53:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `DB_Tag`
--

CREATE TABLE `DB_Tag` (
  `ID_Tag` int(11) NOT NULL,
  `Nama_Tag` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DB_User`
--

CREATE TABLE `DB_User` (
  `ID_User` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telp` varchar(15) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Picture` varchar(100) NOT NULL,
  `Active` int(11) NOT NULL DEFAULT '1',
  `ID_Kampus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DB_User`
--

INSERT INTO `DB_User` (`ID_User`, `Username`, `Password`, `Email`, `Telp`, `Alamat`, `Picture`, `Active`, `ID_Kampus`) VALUES
(1, 'Tedi Susanto', '$2y$10$OSECT.MydYjNvELwXKnSD.aEO7ap9NpM0Yg4hUuf/2hH6Lb/Y9KFG', 'tedijammz@gmail.com', '089603786637', 'depok', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `DB_Wilayah`
--

CREATE TABLE `DB_Wilayah` (
  `ID_Wilayah` int(11) NOT NULL,
  `Wilayah` varchar(255) NOT NULL,
  `Deskripsi` varchar(1024) NOT NULL,
  `Gambar` varchar(1024) NOT NULL,
  `Aktif` int(11) NOT NULL DEFAULT '1',
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NULL DEFAULT NULL,
  `Parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DB_Wilayah`
--

INSERT INTO `DB_Wilayah` (`ID_Wilayah`, `Wilayah`, `Deskripsi`, `Gambar`, `Aktif`, `Created`, `Modified`, `Parent`) VALUES
(1, 'PUSAT', 'WILAYAH PUSAT', '-', 1, '2019-04-11 17:53:15', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Event`
--

CREATE TABLE `Event` (
  `ID_Event` int(11) NOT NULL,
  `Nama_Event` varchar(256) NOT NULL,
  `ID_Wilayah` int(11) NOT NULL,
  `Picture` varchar(100) NOT NULL,
  `Tgl` date NOT NULL,
  `Deskripsi` varchar(5000) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `IS_Public` int(11) NOT NULL DEFAULT '0',
  `Slug_Event` varchar(100) NOT NULL,
  `Modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`, `link`, `icon`, `is_main_menu`, `is_create`, `is_update`) VALUES
(1, 'Home', 'Home', 'fa fa-link', 0, '2018-02-05 10:03:30', NULL),
(2, 'Pasien', 'pasien/pasein', 'fa fa-link', 0, '2018-02-05 12:31:16', NULL),
(5, 'Pegawai', '#', 'fa fa-link', 0, '2018-02-05 13:06:17', NULL),
(6, 'Data Pegawai', 'sdm/pegawai', 'fa fa-bullseye', 5, '2018-02-05 13:08:50', NULL),
(7, 'Group Pegawai', '#', 'fa fa-link', 0, '2018-02-05 15:56:18', NULL),
(8, 'Data Group', 'sdm/group', 'fa fa-bullseye', 7, '2018-02-05 15:56:52', NULL),
(9, 'System', '#', 'fa fa-link', 0, '2018-02-05 16:24:44', NULL),
(10, 'Menu', 'sistem/system', 'fa fa-bullseye', 9, '2018-02-05 16:25:57', NULL),
(11, 'Menu Akses', 'sistem/system/menu_akses', 'fa fa-bullseye', 9, '2018-02-05 16:25:57', NULL),
(12, 'Group Akses', 'sistem/system/group_akses', 'fa fa-bullseye', 9, '2018-02-05 19:06:57', NULL),
(13, 'User Login', 'sdm/pegawai/user', 'fa fa-bullseye', 5, '2018-02-06 14:16:32', NULL),
(14, 'Data Pasien', 'pasien/pasien', 'fa fa-bullseye', 2, '2018-02-06 17:56:12', NULL),
(15, 'Pendaftaran', 'pendaftaran/pendaftaran', 'fa fa-link', 0, '2018-02-09 01:23:37', NULL),
(16, 'Data Pendaftaran', 'pendaftaran/pendaftaran', 'fa fa-bullseye', 15, '2018-02-09 01:24:33', NULL),
(17, 'Daftar', 'pendaftaran/pendaftaran/create', 'fa fa-bullseye', 15, '2018-02-09 01:25:27', NULL),
(18, 'Apotik', 'gudang/product', 'fa fa-link', 0, '2018-03-05 00:46:31', NULL),
(19, 'Master Obat', 'gudang/product', 'fa fa-bullseye', 0, '2018-03-05 01:52:50', NULL),
(20, 'Suplier', 'gudang/suplier', 'fa fa-link', 0, '2018-03-05 01:54:43', NULL),
(21, 'Penerimaan', 'gudang/penerimaan', 'fa fa-bullseye', 18, '2018-03-06 10:29:54', NULL),
(22, 'Penjualan', 'gudang/Penjualan', 'fa fa-bullseye', 18, '2018-03-11 23:33:45', NULL),
(23, 'Kasir', '#', 'fa fa-link', 0, '2018-03-25 13:45:58', NULL),
(24, 'Tagihan Pasien', 'Kasir/kasir', 'fa fa-bullseye', 23, '2018-03-25 13:47:09', NULL),
(25, 'Tagihan Penjualan', 'Kasir/Tpenjualan', 'fa fa-bullseye', 23, '2018-03-25 13:48:39', NULL),
(26, 'Laporan', '#', 'fa fa-link', 0, '2018-03-27 03:02:31', NULL),
(27, 'Laporan Penjualan', 'Laporan/Laporan/penjualan', 'fa fa-bullseye', 26, '2018-03-27 03:03:12', NULL),
(28, 'Laporan Penerimaan', 'Laporan/Laporan/penerimaan', 'fa fa-bullseye', 26, '2018-03-27 22:45:02', NULL),
(29, 'Laporan Pengunjung', 'Laporan/Laporan/pengunjung', 'fa fa-bullseye', 26, '2018-03-30 22:14:07', NULL),
(30, 'Stock Of Name', 'gudang/StockOfname', 'fa fa-bullseye', 18, '2018-04-06 17:16:38', NULL),
(31, 'Data Dokter', 'Sdm/Dokter', 'fa fa-bullseye', 5, '2019-03-07 19:57:58', NULL),
(32, 'Jadwal Dokter', 'Jadwal', 'fa fa-bullseye', 0, '2019-03-13 11:40:46', NULL),
(33, 'Laporan ', 'Laporan/Laporan', 'fa fa-bullseye', 0, '2019-03-15 21:53:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_akses`
--

CREATE TABLE `menu_akses` (
  `id_menu_akses` int(11) NOT NULL,
  `id_mst_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `create` int(11) NOT NULL DEFAULT '0',
  `update` int(11) NOT NULL DEFAULT '0',
  `delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_akses`
--

INSERT INTO `menu_akses` (`id_menu_akses`, `id_mst_group`, `id_menu`, `create`, `update`, `delete`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1),
(5, 1, 5, 1, 1, 1),
(6, 1, 6, 1, 1, 1),
(7, 1, 7, 1, 1, 1),
(8, 1, 8, 1, 1, 1),
(9, 1, 9, 1, 1, 1),
(10, 1, 10, 1, 1, 1),
(11, 1, 11, 1, 1, 1),
(12, 3, 1, 0, 0, 0),
(13, 1, 12, 1, 1, 1),
(14, 3, 2, 1, 1, 1),
(15, 1, 13, 1, 1, 1),
(16, 1, 14, 1, 1, 1),
(17, 3, 14, 1, 1, 1),
(18, 1, 16, 1, 1, 1),
(19, 1, 15, 1, 1, 1),
(20, 1, 17, 1, 1, 1),
(21, 4, 15, 1, 1, 1),
(22, 4, 16, 1, 1, 1),
(23, 4, 14, 1, 1, 1),
(24, 4, 2, 1, 1, 1),
(26, 1, 19, 1, 1, 1),
(35, 1, 28, 1, 1, 1),
(36, 3, 16, 1, 1, 1),
(37, 3, 15, 1, 1, 1),
(38, 1, 29, 1, 1, 1),
(39, 1, 30, 1, 1, 1),
(40, 1, 31, 1, 1, 1),
(41, 1, 32, 1, 1, 1),
(42, 1, 33, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `DB_Artikel`
--
ALTER TABLE `DB_Artikel`
  ADD PRIMARY KEY (`ID_Artikel`),
  ADD UNIQUE KEY `SlugArtikel` (`Slug`);

--
-- Indexes for table `DB_Artikel_Tag`
--
ALTER TABLE `DB_Artikel_Tag`
  ADD PRIMARY KEY (`ID_Artikel_Tag`);

--
-- Indexes for table `DB_Category`
--
ALTER TABLE `DB_Category`
  ADD PRIMARY KEY (`ID_Category`);

--
-- Indexes for table `DB_Kampus`
--
ALTER TABLE `DB_Kampus`
  ADD PRIMARY KEY (`ID_Kampus`);

--
-- Indexes for table `DB_StrukturOrganisasi`
--
ALTER TABLE `DB_StrukturOrganisasi`
  ADD PRIMARY KEY (`ID_StrukturOrgranisasi`);

--
-- Indexes for table `DB_Tag`
--
ALTER TABLE `DB_Tag`
  ADD PRIMARY KEY (`ID_Tag`);

--
-- Indexes for table `DB_User`
--
ALTER TABLE `DB_User`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `DB_Wilayah`
--
ALTER TABLE `DB_Wilayah`
  ADD PRIMARY KEY (`ID_Wilayah`);

--
-- Indexes for table `Event`
--
ALTER TABLE `Event`
  ADD PRIMARY KEY (`ID_Event`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_akses`
--
ALTER TABLE `menu_akses`
  ADD PRIMARY KEY (`id_menu_akses`),
  ADD KEY `group` (`id_mst_group`),
  ADD KEY `menu` (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DB_Artikel`
--
ALTER TABLE `DB_Artikel`
  MODIFY `ID_Artikel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DB_Artikel_Tag`
--
ALTER TABLE `DB_Artikel_Tag`
  MODIFY `ID_Artikel_Tag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DB_Category`
--
ALTER TABLE `DB_Category`
  MODIFY `ID_Category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DB_Kampus`
--
ALTER TABLE `DB_Kampus`
  MODIFY `ID_Kampus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DB_StrukturOrganisasi`
--
ALTER TABLE `DB_StrukturOrganisasi`
  MODIFY `ID_StrukturOrgranisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `DB_Tag`
--
ALTER TABLE `DB_Tag`
  MODIFY `ID_Tag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DB_User`
--
ALTER TABLE `DB_User`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `DB_Wilayah`
--
ALTER TABLE `DB_Wilayah`
  MODIFY `ID_Wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Event`
--
ALTER TABLE `Event`
  MODIFY `ID_Event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `menu_akses`
--
ALTER TABLE `menu_akses`
  MODIFY `id_menu_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
