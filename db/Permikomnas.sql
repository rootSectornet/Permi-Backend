-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2019 at 08:36 AM
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
  `Deskripsi` varchar(5000) NOT NULL,
  `Visitor` int(11) NOT NULL
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

--
-- Dumping data for table `DB_Category`
--

INSERT INTO `DB_Category` (`ID_Category`, `Category_name`, `created`, `modified`) VALUES
(1, 'test', '2019-10-19 14:46:55', NULL),
(2, 'baur', '2019-10-19 14:58:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `DB_Category_Artikel`
--

CREATE TABLE `DB_Category_Artikel` (
  `ID_Category_Artikel` int(11) NOT NULL,
  `ID_Artikel` int(11) NOT NULL,
  `ID_Category` int(11) NOT NULL
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

--
-- Dumping data for table `DB_Kampus`
--

INSERT INTO `DB_Kampus` (`ID_Kampus`, `Kampus`, `Alamat`, `Logo`, `Tgl_Join`, `Active`, `ID_Wilayah`) VALUES
(1, 'Pusat', 'a', 'a', '2019-05-17', 1, 1),
(2, 'asas', 'asas', 'Screen_Shot_2019-09-24_at_3_23_50_PM.png', '2019-10-12', 1, 1),
(3, 'Testing', 'Testing', 'permilogo.png', '2019-10-01', 1, 2);

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
(1, 'Tedi Susanto', '$2y$10$OSECT.MydYjNvELwXKnSD.aEO7ap9NpM0Yg4hUuf/2hH6Lb/Y9KFG', 'tedijammz@gmail.com', '089603786637', 'depok', 'pria.png', 1, 1),
(2, 'asa', 'root', 'asas', '121', 'as', 'Screen_Shot_2019-09-24_at_3_23_50_PM.png', 1, 0),
(3, 'asa', 'root', 'asas@fa.s', '22', 'asas', 'Screen_Shot_2019-09-24_at_3_23_50_PM.png', 1, 1);

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
(1, 'PUSAT', 'WILAYAH PUSAT', 'permilogo.png', 1, '2019-04-11 17:53:15', NULL, 0),
(2, 'JAWA BARAT', 'Permikomnas Wilayah Jawa Barat (VII)', 'permilogo.png', 1, '2019-09-07 14:50:13', NULL, 1),
(4, 'BANTEN', 'Permikomnas Wilayah Banten (VI)', 'permilogo.png', 1, '2019-09-07 14:52:03', NULL, 1),
(5, 'SUMATRA BARAT', 'Permikomnas Wilayah Sumatra Barat (III)', 'permilogo.png', 1, '2019-09-07 14:54:11', NULL, 1);

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

--
-- Dumping data for table `Event`
--

INSERT INTO `Event` (`ID_Event`, `Nama_Event`, `ID_Wilayah`, `Picture`, `Tgl`, `Deskripsi`, `ID_User`, `IS_Public`, `Slug_Event`, `Modified`) VALUES
(1, 'asdad', 1, 'permilogo.png', '2019-10-23', 'asdadadadadasda', 1, 1, 'asdad', NULL);

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
(33, 'Wilayah', 'Wilayah', 'fa fa-bullseye', 34, '2019-03-15 21:53:01', NULL),
(34, 'Master', '#', 'fa fa-link', 0, '2019-05-11 01:56:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_akses`
--

CREATE TABLE `menu_akses` (
  `id_menu_akses` int(11) NOT NULL,
  `ID_StrukturOrgranisasi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `create` int(11) NOT NULL DEFAULT '0',
  `update` int(11) NOT NULL DEFAULT '0',
  `delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_akses`
--

INSERT INTO `menu_akses` (`id_menu_akses`, `ID_StrukturOrgranisasi`, `id_menu`, `create`, `update`, `delete`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 33, 0, 0, 0),
(43, 1, 34, 0, 0, 0);

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
-- Indexes for table `DB_Category`
--
ALTER TABLE `DB_Category`
  ADD PRIMARY KEY (`ID_Category`);

--
-- Indexes for table `DB_Category_Artikel`
--
ALTER TABLE `DB_Category_Artikel`
  ADD PRIMARY KEY (`ID_Category_Artikel`);

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
  ADD KEY `group` (`ID_StrukturOrgranisasi`),
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
-- AUTO_INCREMENT for table `DB_Category`
--
ALTER TABLE `DB_Category`
  MODIFY `ID_Category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `DB_Category_Artikel`
--
ALTER TABLE `DB_Category_Artikel`
  MODIFY `ID_Category_Artikel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DB_Kampus`
--
ALTER TABLE `DB_Kampus`
  MODIFY `ID_Kampus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `DB_Wilayah`
--
ALTER TABLE `DB_Wilayah`
  MODIFY `ID_Wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Event`
--
ALTER TABLE `Event`
  MODIFY `ID_Event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `menu_akses`
--
ALTER TABLE `menu_akses`
  MODIFY `id_menu_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
