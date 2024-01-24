-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 24, 2024 at 03:00 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

DROP TABLE IF EXISTS `akses`;
CREATE TABLE IF NOT EXISTS `akses` (
  `id_akses` int(10) NOT NULL AUTO_INCREMENT,
  `nama_akses` text NOT NULL,
  `kontak_akses` varchar(20) DEFAULT NULL,
  `email_akses` text NOT NULL,
  `password` text NOT NULL,
  `image_akses` text,
  `akses` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `datetime_daftar` text NOT NULL,
  `datetime_update` text NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama_akses`, `kontak_akses`, `email_akses`, `password`, `image_akses`, `akses`, `status`, `datetime_daftar`, `datetime_update`) VALUES
(1, 'Solihul Hadi', '6289601154726', 'dhiforester@gmail.com', 'f4a3229c9c5f1bdd9c6a6791080791b7', 'fb8c1e2a435244c00efd5782df25aa.jpg', 'Admin', 'Active', '2022-08-29 11:10:06', '2024-01-24 14:53:26'),
(2, 'Santi Nursari', '089601154722', 'santinursari@gmail.com', '8aab6686729bae15bbb979b3bac166b2', '', 'Admin', 'Pending', '1660573356', '1660926768'),
(5, 'Dewi Widiastuti', '089601154722', 'dewiwidastuti@gmail.com', 'cd119b9d9bbabbd33a49021e2884cd14', '24a0f219992549ff7a3affda2b244e.jpg', 'Admin', 'Active', '1660574067', '1660926759'),
(6, 'Ria Harmonis', '089601154722', 'riaharmonis@gmail.com', 'b54450c281eb59c955e9de095b32009e', '7b6bf5321440d8e5f2a449e6a21b84.jpg', 'Admin', 'Active', '1660574218', '2023-01-05 06:25:25'),
(7, 'Windy Yanuariska', '089601154723', 'windy123@gmail.com', 'f2f430a3707fa8bebb26037cb5c6bf02', '4976dce60da7b93a989725b00a4e0a.jpg', 'Admin', 'Active', '1660583224', '1660926731'),
(18, 'Suwarno', '08132411109987', 'solihulhadi141213@gmail.com', 'a2cc01a152da09c1ad15b345e430ed7d', '42a7412c782cd5c62d7e1c5ee8aa2c.jpg', 'Front Officer', 'Active', '1661169912', '2023-02-23 05:57:45'),
(20, 'Tony Stark', '08123456789', 'tonystark@gmail.com', 'f67f6132cfb6ce6ce51f68b47215320a', '0f0c6965a3ef2812eaa1ddb6e8b7b0.jpg', 'Admin', 'Active', '2022-08-28 23:04:29', '2022-08-28 23:05:04'),
(23, 'Solihul hadi', '089660757179', 'mr_nesta2000@yahoo.com', '3c993639c812b7502be4084869f6c217', '23990b2259686f32eabb4b5578c91f.jpg', 'Admin', 'Active', '1662107426', '2024-01-24 21:52:07'),
(25, 'Iwan Kurniawan', '089601154720', 'iwankurniawan@gmail.com', 'b4c30ba24e7bbafd0c0ccc378d49f8d2', '78896d820b9ba4a76ec5031f7d487e.jpg', 'Front Officer', 'Active', '2022-09-25 06:16:25', '2022-09-25 06:16:25'),
(30, 'dr. Laudry Amsal', '0814432110', 'laudryamsal@gmail.com', '680d7bf3a307a0e3ac3459b649ac1d85', '8843ab4edd0ba170b33fe457d829d8.jpg', 'Medical Personnel', 'Active', '2022-09-26 12:05:21', '2023-01-14 16:40:21'),
(31, 'dr. Laudry Amsal', '0813207761770', 'laudryamsal@gmail.com', '680d7bf3a307a0e3ac3459b649ac1d85', 'ee5ada6ee325f1236bcea67e81317d.jpg', 'Medical Personnel', 'Active', '2022-09-26 12:12:08', '2022-09-26 12:12:08'),
(32, 'Barli Nuriman', '091320114', 'barlinuriman@gmail.com', '01c07748b436b1faa8a71d74fc2db289', 'fba8018e86374b1dbf7cd4b2f2cb6d.jpg', 'Medical Personnel', 'Active', '2022-09-26 13:07:14', '2022-09-26 13:07:14'),
(33, 'Giri Lesaman', '0813210001', 'girianugrah@gmail.com', '3db7c3e9954d2d5f4c510633eca9da76', '0cf3942b08d3b6e00a39b03f5296d5.jpg', 'Kasir', 'Active', '2022-09-26 13:08:04', '2023-02-14 00:15:51'),
(34, 'Abang jado2', '089601154799', 'abangjago@gmail.com', '494c21236a8338c11cac9732ac87c0ef', 'b1af1cbd0a68f82ae69066123fcaa2.jpg', 'Kasir', 'Active', '2022-09-26 23:00:20', '2023-02-14 00:07:02'),
(36, 'Percobaan Ijin Akses', '111234', 'percobaan@gmail.com', 'cdca96f7ae799f207d8f94b016c7c5be', '', 'Admin', 'Active', '2023-01-14 23:42:40', '2023-01-14 23:42:40'),
(43, 'Desi Ratna Sari', '0891112111', 'desiratnasari@gmail.com', 'a6cfbb1a3e3124c3b1cf1af34ac8ccb2', '72c84aea06d34540eed502b57deee4.jpg', 'Admin', 'Active', '2023-01-26 11:11:28', '2023-02-05 20:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `akses_anggota`
--

DROP TABLE IF EXISTS `akses_anggota`;
CREATE TABLE IF NOT EXISTS `akses_anggota` (
  `id_akses_anggota` int(15) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(15) DEFAULT NULL,
  `tanggal` varchar(30) NOT NULL,
  `nama_anggota` text NOT NULL,
  `email` text NOT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `password` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `photo_profile` text,
  PRIMARY KEY (`id_akses_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_anggota`
--

INSERT INTO `akses_anggota` (`id_akses_anggota`, `id_anggota`, `tanggal`, `nama_anggota`, `email`, `kontak`, `password`, `status`, `photo_profile`) VALUES
(1, 7, '2023-02-17 11:55:32', 'Solihul Hadi', 'solihulhadi141213@gmail.com', '89601154726', 'f4a3229c9c5f1bdd9c6a6791080791b7', 'Active', NULL),
(13, 0, '2023-02-17 22:22:25', 'Syamsul Maarif', 'syamsulmaarif@gmail.com', '0894441', '39a4dda18c93ccf4d47e44580bcaf1a0', 'Requested', ''),
(14, 5, '2023-02-23 22:49:13', 'Fikri Zulfikar', 'fikrizulfikar@gmail.com', '089660767466', 'c915ff1021dd601546b9d212fca2ec01', 'Active', '78ae1164e85aeabb721f30f674ba28.jpeg'),
(15, 0, '2023-02-18 00:22:30', 'Didi Muhadi', 'didimuhadi@gmail.com', '12333111', '9ccd1206b99e130c54fb4e9fa1771513', 'Requested', ''),
(16, 0, '2023-02-18 00:23:01', 'Ade Triyana', 'adediantriana@gmail.com', '089111122221', '6a4ae02848231392a210083069b47aae', 'Requested', ''),
(17, 0, '2023-02-18 00:23:29', 'Taufik akbar', 'taufikakbar@gmail.com', '1233331', '5a54fb418f759dbef7ba45d831bfb397', 'Requested', '');

-- --------------------------------------------------------

--
-- Table structure for table `akses_entitas`
--

DROP TABLE IF EXISTS `akses_entitas`;
CREATE TABLE IF NOT EXISTS `akses_entitas` (
  `id_akses_entitas` int(10) NOT NULL AUTO_INCREMENT,
  `akses` varchar(20) NOT NULL,
  `kode_akses` varchar(10) DEFAULT NULL,
  `class_label` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_akses_entitas`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_entitas`
--

INSERT INTO `akses_entitas` (`id_akses_entitas`, `akses`, `kode_akses`, `class_label`) VALUES
(70, 'Admin', 'AKEM', 'bg-success'),
(71, 'Admin', 'AKP', 'bg-success'),
(72, 'Admin', 'AKS', 'bg-success'),
(73, 'Admin', 'AKUM', 'bg-success'),
(74, 'Admin', 'ANG', 'bg-success'),
(75, 'Admin', 'ATJR', 'bg-success'),
(76, 'Admin', 'BGH', 'bg-success'),
(77, 'Admin', 'BKBS', 'bg-success'),
(78, 'Admin', 'BNT', 'bg-success'),
(79, 'Admin', 'BTE', 'bg-success'),
(80, 'Admin', 'DKM', 'bg-success'),
(81, 'Admin', 'EML', 'bg-success'),
(82, 'Admin', 'ETAK', 'bg-success'),
(83, 'Admin', 'JRNL', 'bg-success'),
(84, 'Admin', 'LBRG', 'bg-success'),
(85, 'Admin', 'NRC', 'bg-success'),
(86, 'Admin', 'PMB', 'bg-success'),
(87, 'Admin', 'PNJM', 'bg-success'),
(88, 'Admin', 'RKP', 'bg-success'),
(89, 'Admin', 'SMB', 'bg-success'),
(90, 'Admin', 'SMPN', 'bg-success'),
(91, 'Admin', 'SPP', 'bg-success'),
(92, 'Admin', 'TNT', 'bg-success'),
(93, 'Admin', 'TRANS', 'bg-success'),
(94, 'Admin', 'UMM', 'bg-success'),
(136, 'Kasir', 'ANG', 'bg-warning'),
(137, 'Kasir', 'ATJR', 'bg-warning'),
(138, 'Kasir', 'BTE', 'bg-warning'),
(139, 'Kasir', 'PMB', 'bg-warning'),
(140, 'Kasir', 'PNJM', 'bg-warning'),
(141, 'Kasir', 'SMB', 'bg-warning'),
(142, 'Kasir', 'SMPN', 'bg-warning'),
(143, 'Kasir', 'SPP', 'bg-warning'),
(144, 'Kasir', 'TRANS', 'bg-warning'),
(145, 'Gudang', 'AKEM', 'bg-black'),
(146, 'Gudang', 'AKP', 'bg-black'),
(147, 'Gudang', 'AKS', 'bg-black'),
(148, 'Gudang', 'AKUM', 'bg-black'),
(149, 'Gudang', 'ANG', 'bg-black'),
(150, 'Gudang', 'ATJR', 'bg-black'),
(151, 'Gudang', 'BGH', 'bg-black'),
(152, 'Gudang', 'BKBS', 'bg-black'),
(153, 'Gudang', 'BNT', 'bg-black'),
(154, 'Gudang', 'BTE', 'bg-black'),
(155, 'Gudang', 'DKM', 'bg-black'),
(156, 'Gudang', 'EML', 'bg-black'),
(157, 'Gudang', 'ETAK', 'bg-black'),
(158, 'Gudang', 'JRNL', 'bg-black'),
(159, 'Gudang', 'LBRG', 'bg-black'),
(160, 'Gudang', 'NRC', 'bg-black'),
(161, 'Gudang', 'PMB', 'bg-black'),
(162, 'Gudang', 'PNJM', 'bg-black'),
(163, 'Gudang', 'RKP', 'bg-black'),
(164, 'Gudang', 'SMB', 'bg-black'),
(165, 'Gudang', 'SMPN', 'bg-black'),
(166, 'Gudang', 'SPP', 'bg-black'),
(167, 'Gudang', 'TNT', 'bg-black'),
(168, 'Gudang', 'TRANS', 'bg-black'),
(169, 'Gudang', 'UMM', 'bg-black');

-- --------------------------------------------------------

--
-- Table structure for table `akses_ijin`
--

DROP TABLE IF EXISTS `akses_ijin`;
CREATE TABLE IF NOT EXISTS `akses_ijin` (
  `id_akses` int(11) NOT NULL,
  `akses` varchar(20) NOT NULL,
  `kode_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_ijin`
--

INSERT INTO `akses_ijin` (`id_akses`, `akses`, `kode_akses`) VALUES
(43, 'Admin', 'AKEM'),
(43, 'Admin', 'AKP'),
(43, 'Admin', 'AKS'),
(43, 'Admin', 'AKUM'),
(43, 'Admin', 'ANG'),
(43, 'Admin', 'ATJR'),
(43, 'Admin', 'BGH'),
(43, 'Admin', 'BKBS'),
(43, 'Admin', 'BNT'),
(43, 'Admin', 'BTE'),
(43, 'Admin', 'DKM'),
(43, 'Admin', 'EML'),
(43, 'Admin', 'ETAK'),
(43, 'Admin', 'JRNL'),
(43, 'Admin', 'LBRG'),
(43, 'Admin', 'NRC'),
(43, 'Admin', 'PMB'),
(43, 'Admin', 'PNJM'),
(43, 'Admin', 'RKP'),
(43, 'Admin', 'SMB'),
(43, 'Admin', 'SMPN'),
(43, 'Admin', 'SPP'),
(43, 'Admin', 'TNT'),
(43, 'Admin', 'TRANS'),
(43, 'Admin', 'UMM'),
(33, 'Kasir', 'ANG'),
(33, 'Kasir', 'ATJR'),
(33, 'Kasir', 'BTE'),
(33, 'Kasir', 'PMB'),
(33, 'Kasir', 'PNJM'),
(33, 'Kasir', 'SMB'),
(33, 'Kasir', 'SMPN'),
(33, 'Kasir', 'SPP'),
(33, 'Kasir', 'TRANS'),
(1, 'Admin', 'AKEM'),
(1, 'Admin', 'AKP'),
(1, 'Admin', 'AKS'),
(1, 'Admin', 'AKUM'),
(1, 'Admin', 'ANG'),
(1, 'Admin', 'ATJR'),
(1, 'Admin', 'BGH'),
(1, 'Admin', 'BKBS'),
(1, 'Admin', 'BNT'),
(1, 'Admin', 'BTE'),
(1, 'Admin', 'DKM'),
(1, 'Admin', 'EML'),
(1, 'Admin', 'ETAK'),
(1, 'Admin', 'JRNL'),
(1, 'Admin', 'LBRG'),
(1, 'Admin', 'NRC'),
(1, 'Admin', 'PMB'),
(1, 'Admin', 'PNJM'),
(1, 'Admin', 'RKP'),
(1, 'Admin', 'SMB'),
(1, 'Admin', 'SMPN'),
(1, 'Admin', 'SPP'),
(1, 'Admin', 'STO'),
(1, 'Admin', 'TNT'),
(1, 'Admin', 'TRANS'),
(1, 'Admin', 'UMM'),
(23, 'Admin', 'AKEM'),
(23, 'Admin', 'AKP'),
(23, 'Admin', 'AKS'),
(23, 'Admin', 'AKUM'),
(23, 'Admin', 'ANG'),
(23, 'Admin', 'ATJR'),
(23, 'Admin', 'BGH'),
(23, 'Admin', 'BKBS'),
(23, 'Admin', 'BNT'),
(23, 'Admin', 'BTE'),
(23, 'Admin', 'DKM'),
(23, 'Admin', 'EML'),
(23, 'Admin', 'ETAK'),
(23, 'Admin', 'JRNL'),
(23, 'Admin', 'LBRG'),
(23, 'Admin', 'NRC'),
(23, 'Admin', 'PMB'),
(23, 'Admin', 'PNJM'),
(23, 'Admin', 'RKP'),
(23, 'Admin', 'SMB'),
(23, 'Admin', 'SMPN'),
(23, 'Admin', 'SPP'),
(23, 'Admin', 'TNT'),
(23, 'Admin', 'TRANS'),
(23, 'Admin', 'UMM');

-- --------------------------------------------------------

--
-- Table structure for table `akses_referensi`
--

DROP TABLE IF EXISTS `akses_referensi`;
CREATE TABLE IF NOT EXISTS `akses_referensi` (
  `id_akses_referensi` int(15) NOT NULL AUTO_INCREMENT,
  `kode_referensi` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_akses_referensi`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_referensi`
--

INSERT INTO `akses_referensi` (`id_akses_referensi`, `kode_referensi`, `keterangan`) VALUES
(1, 'AKS', 'Masuk ke halaman utama akses'),
(2, 'ANG', 'Masuk ke halaman anggota'),
(3, 'SMPN', 'Masuk ke halaman utama simpanan'),
(4, 'PNJM', 'Masuk Ke Halaman Pinjaman Anggota'),
(5, 'BGH', 'Masuk Ke Halaman Bagi Hasil'),
(6, 'SPP', 'Masuk ke halaman spplier'),
(7, 'SMB', 'masuk ke halaman master barang'),
(8, 'BTE', 'Masuk ke halaman utama batch dan expire'),
(9, 'TRANS', 'Masuk ke halaman transaksi'),
(10, 'PMB', 'Masuk ke halaman utama pembayaran'),
(11, 'AKP', 'masuk ke halaman utama akun perkiraan'),
(12, 'JRNL', 'Masuk ke halaman utama jurnal'),
(13, 'BKBS', 'masuk ke halaman utama buku besar'),
(14, 'NRC', 'Masuk ke halaman utama Neraca'),
(15, 'LBRG', 'Masuk ke halaman utama laba rugi'),
(16, 'RKP', 'Masuk ke halaman utama laporan rekapitulasi transaksi'),
(17, 'UMM', 'Masuk ke halaman utama pengaturan umum'),
(18, 'ETAK', 'Masuk ke halaman utama entitas akses'),
(19, 'ATJR', 'Masuk ke halaman utama auto jurnal'),
(20, 'EML', 'Masuk ke halaman pengaturan email'),
(21, 'AKUM', 'Masuk ke halaman aktivitas umum'),
(22, 'AKEM', 'Masuk ke halaman aktivitas email'),
(23, 'BNT', 'Masuk ke halaman bantuan'),
(24, 'DKM', 'Masuk ke halaman utama dokumentasi API'),
(25, 'TNT', 'Masuk ke halamn tentang'),
(26, 'STO', 'Masuk Ke Halaman Stock Opename');

-- --------------------------------------------------------

--
-- Table structure for table `akses_validasi`
--

DROP TABLE IF EXISTS `akses_validasi`;
CREATE TABLE IF NOT EXISTS `akses_validasi` (
  `id_akses_validasi` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses_anggota` int(20) NOT NULL,
  `token` text NOT NULL,
  `datetime` text NOT NULL,
  PRIMARY KEY (`id_akses_validasi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_validasi`
--

INSERT INTO `akses_validasi` (`id_akses_validasi`, `id_akses_anggota`, `token`, `datetime`) VALUES
(3, 2, '50e17bf06d0d8e5b856aa6ace83b0b', '2023-02-17 19:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `akun_perkiraan`
--

DROP TABLE IF EXISTS `akun_perkiraan`;
CREATE TABLE IF NOT EXISTS `akun_perkiraan` (
  `id_perkiraan` int(10) NOT NULL AUTO_INCREMENT,
  `kode` varchar(25) DEFAULT NULL,
  `rank` int(10) DEFAULT NULL,
  `nama` text,
  `level` varchar(10) DEFAULT NULL,
  `saldo_normal` varchar(25) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `kd1` varchar(25) DEFAULT NULL,
  `kd2` varchar(25) DEFAULT NULL,
  `kd3` varchar(25) DEFAULT NULL,
  `kd4` varchar(25) DEFAULT NULL,
  `kd5` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_perkiraan`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_perkiraan`
--

INSERT INTO `akun_perkiraan` (`id_perkiraan`, `kode`, `rank`, `nama`, `level`, `saldo_normal`, `status`, `kd1`, `kd2`, `kd3`, `kd4`, `kd5`) VALUES
(1, '1', 1, 'Aset', '1', 'Debet', 'Closed', '1', NULL, NULL, NULL, NULL),
(2, '2', 1, 'Kewajiban', '1', 'Kredit', '', '2', NULL, NULL, NULL, NULL),
(3, '3', 1, 'Ekuitas', '1', 'Kredit', '', '3', NULL, NULL, NULL, NULL),
(4, '4', 1, 'Pendapatan', '1', 'Kredit', '', '4', NULL, NULL, NULL, NULL),
(17, '5', 1, 'Beban Usaha', '1', 'Debet', '', '5', NULL, NULL, NULL, NULL),
(18, '1.1', 1, 'Aset Lancar', '2', 'Debet', 'Closed', '1', '1.1', NULL, NULL, NULL),
(23, '1.2', 2, 'Aset Tetap', '2', 'Debet', 'Open', '1', '1.2', NULL, NULL, NULL),
(25, '1.2.2', 2, 'Gedung Dan Bangunan', '3', 'Debet', '', '1', '1.2', '1.2.2', NULL, NULL),
(27, '2.1', 1, 'Kewajiban Jangka Pendek', '2', 'Kredit', '', '2', '2.1', NULL, NULL, NULL),
(28, '2.1.1', 1, 'Hutang Usaha', '3', 'Kredit', '', '2', '2.1', '2.1.1', NULL, NULL),
(29, '2.1.2', 2, 'Hutang Pajak', '3', 'Kredit', '', '2', '2.1', '2.1.2', NULL, NULL),
(30, '3.1', 1, 'Ekuitas Awal', '2', 'Kredit', '', '3', '3.1', NULL, NULL, NULL),
(31, '3.2', 2, 'Surplus Dan Defisit', '2', 'Kredit', '', '3', '3.2', NULL, NULL, NULL),
(36, '5.1', 1, 'Beban Administrasi Dan Umum', '2', 'Debet', '', '5', '5.1', NULL, NULL, NULL),
(38, '5.3', 3, 'Beban Operasional', '2', 'Debet', '', '5', '5.3', NULL, NULL, NULL),
(39, '4.4', 4, 'Pendapatan Pendaftaran', '2', 'Kredit', '', '4', '4.4', NULL, NULL, NULL),
(41, '4.5', 5, 'Pendapatan Lainnya', '2', 'Kredit', '', '4', '4.5', NULL, NULL, NULL),
(65, '1.2.4', 4, 'Jalan Dan Jaringan', '3', 'Debet', '', '1', '1.2', '1.2.4', NULL, NULL),
(66, '1.2.4.1', 1, 'Jaringan Listrik', '4', 'Debet', 'Closed', '1', '1.2', '1.2.4', '1.2.4.1', NULL),
(73, '1.3', 3, 'Aset Lainnya', '2', 'Debet', 'Closed', '1', '1.3', NULL, NULL, NULL),
(77, '2.1.3', 3, 'Hutang Lainnya', '3', 'Kredit', '', '2', '2.1', '2.1.3', NULL, NULL),
(78, '3.2.1', 1, 'Surplus Dan Defisit Tahun Lalu', '3', 'Kredit', '', '3', '3.2', '3.2.1', NULL, NULL),
(79, '3.2.2', 2, 'Surplus Dan Defisit Tahun Berjalan', '3', 'Kredit', '', '3', '3.2', '3.2.2', NULL, NULL),
(80, '5.1.1', 1, 'Beban Gaji', '3', 'Debet', '', '5', '5.1', '5.1.1', NULL, NULL),
(81, '5.1.2', 2, 'Beban Adm. Kendaraan', '3', 'Debet', '', '5', '5.1', '5.1.2', NULL, NULL),
(82, '5.1.3', 3, 'Beban Asuransi', '3', 'Debet', '', '5', '5.1', '5.1.3', NULL, NULL),
(83, '5.1.4', 4, 'Beban PBB', '3', 'Debet', '', '5', '5.1', '5.1.4', NULL, NULL),
(84, '5.1.5', 5, 'Beban Restribusi', '3', 'Debet', '', '5', '5.1', '5.1.5', NULL, NULL),
(85, '5.1.6', 6, 'Beban Diklat', '3', 'Debet', '', '5', '5.1', '5.1.6', NULL, NULL),
(86, '5.1.7', 7, 'Perizinan', '3', 'Debet', '', '5', '5.1', '5.1.7', NULL, NULL),
(87, '5.1.8', 8, 'Pajak Air', '3', 'Debet', '', '5', '5.1', '5.1.8', NULL, NULL),
(95, '5.3.1', 1, 'Beban Pembelian Koran', '3', 'Debet', '', '5', '5.3', '5.3.1', NULL, NULL),
(96, '5.3.2', 2, 'Beban Air Minum', '3', 'Debet', '', '5', '5.3', '5.3.2', NULL, NULL),
(98, '5.3.4', 4, 'Beban Utilitas', '3', 'Debet', '', '5', '5.3', '5.3.4', NULL, NULL),
(100, '5.3.6', 6, 'Beban Konsumsi', '3', 'Debet', '', '5', '5.3', '5.3.6', NULL, NULL),
(101, '5.3.7', 7, 'Beban Pemeliharaan Kendaraan', '3', 'Debet', '', '5', '5.3', '5.3.7', NULL, NULL),
(102, '5.3.8', 8, 'Beban Pemeliharaan Bangunan', '3', 'Debet', '', '5', '5.3', '5.3.8', NULL, NULL),
(105, '5.3.10', 10, 'Beban Pemeliharaan Alat Kantor', '3', 'Debet', '', '5', '5.3', '5.3.10', NULL, NULL),
(110, '5.3.11', 11, 'Beban Penyusutan Bangunan', '3', 'Debet', '', '5', '5.3', '5.3.11', NULL, NULL),
(111, '5.3.12', 12, 'Beban Penyusutan Alat Belajar', '3', 'Debet', '', '5', '5.3', '5.3.12', NULL, NULL),
(112, '5.3.13', 13, 'Penyusutan Kendaraan', '3', 'Debet', '', '5', '5.3', '5.3.13', NULL, NULL),
(113, '5.3.14', 14, 'Beban Promosi', '3', 'Debet', '', '5', '5.3', '5.3.14', NULL, NULL),
(114, '5.3.15', 15, 'Beban Listrik', '3', 'Debet', '', '5', '5.3', '5.3.15', NULL, NULL),
(119, '5.4', 4, 'Beban Lainnya', '2', 'Debet', '', '5', '5.4', NULL, NULL, NULL),
(120, '1.1.1', 1, 'kas', '3', 'Debet', '', '1', '1.1', '1.1.1', NULL, NULL),
(121, '1.1.1.1', 1, 'Kas Kecil', '4', 'Debet', '', '1', '1.1', '1.1.1', '1.1.1.1', NULL),
(122, '1.1.1.2', 2, 'Kas Bank', '4', 'Debet', '', '1', '1.1', '1.1.1', '1.1.1.2', NULL),
(123, '1.2.4.2', 2, 'Lahan/Tanah', '4', 'Debet', '', '1', '1.2', '1.2.4', '1.2.4.2', NULL),
(124, '4.6', 6, 'Pendapatan Obat', '2', 'Kredit', '', '4', '4.6', NULL, NULL, NULL),
(125, '1.1.2', 2, 'Persediaan Obat', '3', 'Debet', '', '1', '1.1', '1.1.2', NULL, NULL),
(130, '1.3.1', 1, 'Aset Saham Di Perusahaan Lain', '3', 'Debet', 'Closed', '1', '1.3', '1.3.1', NULL, NULL),
(131, '1.3.2', 2, 'Aset Sisa BHP', '3', 'Debet', 'Open', '1', '1.3', '1.3.2', NULL, NULL),
(133, '2.2', 2, 'Kewajiban Pembayaran Prive Investor', '2', 'Kredit', 'Open', '2', '2.2', NULL, NULL, NULL),
(134, '1.3.3', 3, 'Aset Lainnya', '3', 'Debet', 'Open', '1', '1.3', '1.3.3', NULL, NULL),
(135, '1.1.1.3', 3, 'Kas Berangkas', '4', 'Debet', 'Open', '1', '1.1', '1.1.1', '1.1.1.3', NULL),
(136, '1.1.3', 3, 'Piutang usaha', '3', 'Debet', 'Open', '1', '1.1', '1.1.3', NULL, NULL),
(147, '5.3.14.1', 1, 'Beban Promosi Iklan Digital', '4', 'Debet', '', '5', '5.3', '5.3.14', '5.3.14.1', NULL),
(148, '5.3.14.2', 2, 'Beban Promosi Iklan Koran', '4', 'Debet', '', '5', '5.3', '5.3.14', '5.3.14.2', NULL),
(149, '1.1.1.2.1', 1, 'Kas Bank BRI', '5', 'Debet', '', '1', '1.1', '1.1.1', '1.1.1.2', '1.1.1.2.1'),
(151, '1.1.1.2.2', 2, 'Kas Bank BCA', '5', 'Debet', 'Closed', '1', '1.1', '1.1.1', '1.1.1.2', '1.1.1.2.2'),
(152, '1.1.1.2.3', 3, 'Kas Bank Mandiri', '5', 'Debet', 'Closed', '1', '1.1', '1.1.1', '1.1.1.2', '1.1.1.2.3'),
(154, '1.1.1.2.5', 5, 'Kas Bank Jabar', '5', 'Debet', 'Open', '1', '1.1', '1.1.1', '1.1.1.2', '1.1.1.2.5'),
(155, '1.1.1.1.1', 1, 'Kas Brangkas', '5', 'Debet', 'Closed', '1', '1.1', '1.1.1', '1.1.1.1', '1.1.1.1.1');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(15) NOT NULL AUTO_INCREMENT,
  `tanggal_masuk` varchar(30) NOT NULL,
  `nip` text,
  `nama` text NOT NULL,
  `email` text,
  `kontak` varchar(20) DEFAULT NULL,
  `image` text,
  `status` varchar(20) NOT NULL COMMENT 'Active, Non-Active, Resign',
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `tanggal_masuk`, `nip`, `nama`, `email`, `kontak`, `image`, `status`) VALUES
(2, '2016-01-01', 'RSES.123.008', 'Didi Muhadi', 'email@gmail.com1', '8967755544', '', 'Active'),
(3, '2023-01-02', 'RSES.123.009', 'Syamsul Maarif', 'email@gmail.com2', '8967755543', '', 'Active'),
(4, '2023-01-03', 'RSES.123.010', 'Ade Triyana', 'email@gmail.com3', '8967755542', NULL, 'Active'),
(5, '2023-01-04', 'RSES.123.011', 'Fikri Renaldy', 'fikrizulfikar@gmail.com', '8967755541', NULL, 'Active'),
(6, '2023-01-05', 'RSES.123.012', 'Bayu Anugerah', 'email@gmail.com5', '8967755540', NULL, 'Active'),
(7, '2023-01-06', 'RSES.123.013', 'Solihul Hadi', 'solihulhadi141213@gmail.com', '8967755539', NULL, 'Active'),
(8, '2023-01-07', 'RSES.123.014', 'Iwan Kurniawan', 'email@gmail.com7', '8967755538', NULL, 'Active'),
(9, '2023-01-08', 'RSES.123.015', 'Ohan Komarudin', 'email@gmail.com8', '8967755537', NULL, 'Active'),
(10, '2023-01-09', 'RSES.123.016', 'Hendy Yayat', 'email@gmail.com9', '8967755536', NULL, 'Active'),
(11, '2023-01-10', '1107.RSES.025', 'Dedy Sumardi', 'email@gmail.com10', '8967755535', NULL, 'Active'),
(12, '2023-01-11', '0105.RSES.006', 'Eti Rusmiati', 'email@gmail.com11', '8967755534', NULL, 'Active'),
(13, '2023-01-12', '0903.RSES.121', 'Elly Wijaya Nu', 'email@gmail.com12', '8967755533', NULL, 'Active'),
(14, '2023-01-13', '0314.RSES.184', 'Guruh Ardhianto', 'email@gmail.com13', '8967755532', NULL, 'Active'),
(15, '2023-01-14', '0514.RSES.193', 'Eha Julaeha', 'email@gmail.com14', '8967755531', NULL, 'Active'),
(16, '2023-01-15', '0120.RSES.458', 'Ihsan Harismun', 'email@gmail.com15', '8967755530', NULL, 'Active'),
(17, '2023-01-16', '0121.RSES.450', 'Muhammad Iqbal', 'email@gmail.com16', '8967755529', NULL, 'Active'),
(18, '2023-01-17', '0510.RSES.070', 'Acah Wiarsah', 'email@gmail.com17', '8967755528', NULL, 'Active'),
(19, '2023-01-18', '0217.RSES.297', 'Ade Nuriman', 'email@gmail.com18', '8967755527', NULL, 'Active'),
(20, '2023-01-19', '1018.RSES.373', 'Ai Siti Nurjami', 'email@gmail.com19', '8967755526', NULL, 'Active'),
(21, '2023-01-20', '0317.RSES.308', 'Anri', 'email@gmail.com20', '8967755525', NULL, 'Active'),
(22, '2023-01-21', '1218.RSES.381', 'Asep Pirmansyah', 'email@gmail.com21', '8967755524', NULL, 'Active'),
(23, '2023-01-22', '0109.RSES.042', 'Asep Saepudin', 'email@gmail.com22', '8967755523', NULL, 'Active'),
(26, '2023-01-25', '0517.RSES.328', 'Deni Hendriawan', 'email@gmail.com25', '8967755520', NULL, 'Active'),
(27, '2023-01-26', '0216.RSES.253', 'Deniawati Lesta', 'email@gmail.com26', '8967755519', NULL, 'Active'),
(28, '2023-01-27', '0414.RSES.185', 'Devi Nur Utami', 'email@gmail.com27', '8967755518', NULL, 'Active'),
(29, '2023-01-28', '1219.RSES.413', 'Dewi Widiastuti', 'email@gmail.com28', '8967755517', NULL, 'Active'),
(30, '2023-01-29', '0317.RSES.310', 'Diar Sukma Regi', 'email@gmail.com29', '8967755516', NULL, 'Active'),
(32, '2023-01-29', '123123', 'Dedeh Delawati', 'dedehdelawati@gmail.com', '089664545451', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `auto_jurnal`
--

DROP TABLE IF EXISTS `auto_jurnal`;
CREATE TABLE IF NOT EXISTS `auto_jurnal` (
  `id_auto_jurnal` int(15) NOT NULL AUTO_INCREMENT,
  `kategori_transaksi` text NOT NULL,
  `debet_id` int(15) NOT NULL,
  `debet_name` text NOT NULL,
  `kredit_id` int(15) NOT NULL,
  `kredit_name` text NOT NULL,
  PRIMARY KEY (`id_auto_jurnal`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auto_jurnal`
--

INSERT INTO `auto_jurnal` (`id_auto_jurnal`, `kategori_transaksi`, `debet_id`, `debet_name`, `kredit_id`, `kredit_name`) VALUES
(5, 'Simpanan', 135, 'Kas Berangkas', 136, 'Piutang usaha'),
(6, 'Penarikan', 133, 'Kewajiban Pembayaran Prive Investor', 135, 'Kas Berangkas'),
(7, 'Pinjaman', 136, 'Piutang usaha', 135, 'Kas Berangkas'),
(8, 'Angsuran', 155, 'Kas Brangkas', 136, 'Piutang usaha');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(10) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` text NOT NULL,
  `kategori_barang` varchar(20) NOT NULL,
  `satuan_barang` varchar(20) NOT NULL,
  `konversi` int(10) NOT NULL,
  `harga_beli` int(10) DEFAULT NULL,
  `stok_barang` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `kategori_barang`, `satuan_barang`, `konversi`, `harga_beli`, `stok_barang`) VALUES
(1, '9415007034414', 'Boneeto Stoberi 115ml', 'MNM', 'KTK', 1, 2600, 87),
(2, '9415007014423', 'Boneeto Coklat 115ml', 'MNM', 'KTK', 1, 2600, 100),
(3, '9415007009818', 'Anlene Gold Cokelat 250g', 'MNM', 'DUS', 1, 38000, 80),
(4, '9311931201208', 'Max Tea Tarik', 'MNM', 'RCG', 1, 15250, 100),
(5, '8999999710880', 'Pepsodent Herbal 75g', 'BC', 'PCS', 1, 6600, 100),
(6, '8999999706081', 'Pepsodent White 75g', 'BC', 'PCS', 1, 3875, 100),
(7, '8999999549480', 'Sunlight Lime Cream', 'BC', 'PCS', 1, 4500, 100),
(8, '8999999538712', 'Rinso Cair 21ml', 'BC', 'RCG', 1, 2400, 100),
(9, '8999999533496', 'Bango Soya Manis 20ml', 'BD', 'RCG', 1, 9600, 99),
(10, '8999999533298', 'Dove Dandruff 20ml', 'BC', 'RCG', 1, 4500, 100),
(11, '8999999533281', 'Dove Rambut Rontok 20ml', 'BC', 'RCG', 1, 4500, 100),
(12, '8999999531485', 'Molto Luxury Rose 10ml', 'BC', 'KTG', 1, 4680, 100),
(13, '8999999531478', 'Molto Edp Purple 10ml', 'BC', 'RCG', 1, 4680, 100),
(14, '8999999530426', 'Rinso Cair Gentle Pouch 200ml', 'BD', 'PCH', 1, 3977, 100),
(15, '8999999530341', 'Citra Rcg 9ml', 'KC', 'RCG', 1, 4500, 100),
(16, '8999999530228', 'Lifebuoy Matcha 250ml', 'BC', 'REF', 1, 13150, 100),
(17, '8999999529918', 'Clear Superfresh Apple 80ml', 'BC', 'BTL', 1, 9100, 100),
(18, '8999999529833', 'Clear Ice Cool 10ml', 'BC', 'RCG', 1, 4650, 100),
(19, '8999999529819', 'Clear Anti Ketombe 10ml', 'BC', 'RCG', 1, 4650, 100),
(20, '8999999529703', 'Clear Cool Sport Menthol 80ml', 'BC', 'BTL', 1, 9700, 100),
(21, '8999999529673', 'Clear Ice Cool Menthol 80ml', 'BC', 'BTL', 1, 9100, 100),
(22, '8999999529550', 'Clear Complete Soft Care 80ml', 'BC', 'BTL', 1, 9100, 100),
(23, '8999999529291', 'Molto Pure 10ml', 'BC', 'RCG', 1, 4680, 100),
(24, '8999999528942', 'Citra Pearly white 120ml', 'KC', 'BTL', 1, 9750, 12),
(25, '8999999528935', 'Citra Nat Glow 120ml', 'KC', 'BTL', 1, 9750, 54),
(26, '8999999528881', 'Citra Nat Glow 230ml', 'KC', 'BTL', 1, 17150, 100),
(27, '8999999528850', 'Citra Nat Glow 60ml', 'KC', 'BTL', 1, 5450, 90),
(28, '8999999528843', 'Citra Pearly White 60ml', 'KC', 'BAG', 1, 5450, 100),
(29, '8999999528805', 'Citra Pearly White Uv 230ml', 'KC', 'BTL', 1, 17150, 100),
(30, '8999999526894', 'Rinso Molto Cair Royal Gold', 'BC', 'RCG', 1, 4830, 100),
(31, '8999999526887', 'Rinso Royal Gold 770g', 'BC', 'PCS', 1, 17508, 100),
(32, '8999999526863', 'Molto All In1 Pink 11ml', 'BC', 'RCG', 1, 4680, 100),
(33, '8999999526856', 'Molto All In One Biru 11ml', 'BC', 'RCG', 1, 4680, 100),
(34, '8999999524821', 'Sunlight Habbatus Pouch 100ml', 'BC', 'PCS', 1, 1488, 100),
(35, '8999999524722', 'Sunlight Lime Pouch 435ml', 'BC', 'REF', 1, 9308333, 100),
(36, '8999999520885', 'Wifol Karbol 500ml', 'BC', 'PCS', 1, 8600, 100),
(37, '8999999520878', 'Wipol Karbol 240ml', 'BC', 'PCH', 1, 4249, 100),
(38, '8999999518998', 'Rinso Molto Essence 770g', 'BC', 'BAG', 1, 18050, 100),
(39, '8999999518516', 'Molto Detergen cair glowing Elegance 700ml', 'Lainnya', 'REF', 1, 14375, 100),
(40, '8999999518417', 'Molto Detergent 40gr', 'Lainnya', 'SCH', 1, 908333, 100),
(41, '8999999514617', 'Bango Pouch 400ml', 'MKN', 'PCH', 1, 15520, 120),
(42, '8999999514518', 'Rinso Cair Essence Pouch', 'BC', 'PCH', 1, 4074, 100),
(43, '8999999514495', 'Rinso Cair Rose Fresh Pouch', 'BC', 'PCH', 1, 4074, 100),
(44, '8999999514006', 'Korek Gas', 'ALAT', 'PCS', 1, 2400, 95),
(45, '8999999514006', 'Bango Manis 60ml', 'BD', 'pcs', 1, 2400, 78),
(46, '8999999504014', 'Molto Higiene Perisai Aktif 12ml', 'Lainnya', 'SCH', 1, 426111, 100),
(47, '8999999502409', 'Royco Fds Sapi 9g', 'BD', 'RCG', 1, 4479167, 100),
(48, '8999999500672', 'Vixal Pemb Pors Biru 200ml', 'BC', 'BTL', 1, 4200, 100),
(49, '8999999500641', 'Rinso Molto Pink 250g', 'BC', 'BKS', 1, 4200, 100),
(50, '8999999407872', 'Wipol Classic Pine 450 ml', 'Lainnya', 'REF', 1, 11625, 100),
(51, '8999999406936', 'Super Pell Pouch 380ml', 'BC', 'PCH', 1, 5529, 100),
(52, '8999999406912', 'Super Pell Pouch Cherry Rose', 'BC', 'PCH', 1, 9744, 100),
(53, '8999999401221', 'Rinso Anti Noda 430g', 'BC', 'PCS', 1, 9500, 95),
(54, '8999999401023', 'Molto Pewangi Pink 900ml', 'BC', 'REF', 1, 10100, 100),
(55, '8999999400958', 'Molto Pewangi Blue 900ml', 'BC', 'REF', 1, 10100, 100),
(56, '8999999400903', 'Molto Pewangi Floral Bliss 450 ml', 'BC', 'REF', 1, 5208, 100),
(57, '8999999390181', 'Sunlight Lime 400ml', 'BC', 'PCH', 1, 9000, 100),
(58, '8999999195656', 'Sariwangi Kotak Tb 50', 'MNM', 'PAK', 1, 9249, 100),
(59, '8999999195649', 'Sariwangi Kotak 1,85g', 'MNM', 'KTK', 1, 4800021, 100),
(61, '8999999059781', 'Sunlight Lime Pouch 210ml', 'BC', 'REF', 1, 4300, 100),
(62, '8999999059354', 'Lifebuoy Vita Protect', 'BC', 'BH', 1, 2700, 100),
(63, '8999999059323', 'Lifebuoy Lemon Fresh', 'BC', 'BH', 1, 2700, 100),
(64, '8999999059316', 'Lifebuoy Mild Care 80g', 'KC', 'BH', 1, 2700, 100),
(73, '8999999052959', 'Pons White Beauty Foam 50g', 'BC', 'TUB', 1, 16300, 100),
(74, '8999999050009', 'Sunlight Lime Pouch 95ml', 'BC', 'BKS', 1, 1600, 98),
(75, '8999999049669', 'Rexona Motionsense', 'BC', 'BH', 1, 13550, 100),
(76, '8999999049492', 'Rexona Powder Dry 45ml', 'KC', 'BTL', 1, 13550, 100),
(77, '8999999049454', 'Rexona Free Spirit 50ml', 'BC', 'BH', 1, 13550, 99),
(78, '8999999049409', 'Rexona Men Cool Ice 50ml', 'BC', 'BH', 1, 13550, 100),
(79, '8999999049034', 'Sunlight Lime Pouch 45ml', 'BC', 'SCH', 1, 825, 100),
(80, '8999999047245', 'Rinso Molto 44g', 'BC', 'RCG', 1, 4830, 100),
(81, '8999999047221', 'Rinso Anti Noda 44g', 'BC', 'RCG', 1, 4830, 100),
(82, '8999999036942', 'Lux Magical Spell 250ml', 'BC', 'REF', 1, 12114, 100),
(83, '8999999036904', 'Lux Velvet Pouch 250ml', 'BC', 'PCS', 1, 12112, 100),
(84, '8999999036898', 'Lux Soft Rose 250ml', 'BC', 'REF', 1, 12114, 100),
(85, '8999999036843', 'Lux Aqua Delight 450ml', 'BC', 'PCH', 1, 20320, 100),
(86, '8999999036829', 'Lux Soft Rose 450ml', 'BC', 'PCS', 1, 20320, 100),
(87, '8999999036690', 'Lux Magical Spell 80g', 'KC', 'BH', 1, 2800, 100),
(88, '8999999036676', 'Lux Aqua Delight 80g', 'KC', 'BH', 1, 2800, 100),
(89, '8999999036638', 'Lux Velvet Jasmine 80g', 'KC', 'BH', 1, 2800, 100),
(91, '8999999034153', 'Blue Band Serbaguna 200g', 'MKN', 'PCS', 1, 6733333, 109),
(92, '8999999033200', 'Lifebuoy Anti - Dandruff 70ml', 'BC', 'BTL', 1, 6850, 100),
(93, '8999999033163', 'Lifebuoy Strong & Shiny 70 ml', 'BC', 'BTL', 1, 6850, 100),
(94, '8999999033125', 'Lifebuoy Anti Hair Fall 70ml', 'BC', 'BTL', 1, 6850, 100),
(95, '8999999027605', 'Clear Complete Soft Care 10ml Unisex', 'Lainnya', 'pcs', 1, 783125, 100),
(96, '8999999027278', 'Lifebuoy Lemon Fresh 250ml', 'BC', 'REF', 1, 13150, 100),
(97, '8999999027261', 'Lifebuoy Lemon Fresh 450ml', 'BC', 'REF', 1, 21700, 100),
(98, '8999999027049', 'Lifebuoy Hairfall Trmt 9ml', 'BC', 'RCG', 1, 2250, 97),
(99, '6676', 'Pulsa Tree 5000', 'Pulsa', 'Rp', 1, 5000, 100),
(100, '2345654631', 'Pulsa Telkomsel 5000', 'Pulsa', 'Rp', 1, 5000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `barang_bacth`
--

DROP TABLE IF EXISTS `barang_bacth`;
CREATE TABLE IF NOT EXISTS `barang_bacth` (
  `id_barang_bacth` int(10) NOT NULL AUTO_INCREMENT,
  `id_barang` int(10) NOT NULL,
  `id_barang_satuan` int(10) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` text NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `no_batch` varchar(20) NOT NULL,
  `expired_date` varchar(20) NOT NULL,
  `qty_batch` int(11) NOT NULL,
  `reminder_date` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL COMMENT 'Terdaftar, Terjual, None',
  PRIMARY KEY (`id_barang_bacth`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_bacth`
--

INSERT INTO `barang_bacth` (`id_barang_bacth`, `id_barang`, `id_barang_satuan`, `kode_barang`, `nama_barang`, `satuan`, `no_batch`, `expired_date`, `qty_batch`, `reminder_date`, `status`) VALUES
(1, 96, 0, '8999999027278', 'Lifebuoy Lemon Fresh 250ml', 'REF', '89999990272781', '2022-09-24', 10, '2022-09-18', 'Terjual'),
(2, 95, 0, '8999999027605', 'Clear Complete Soft Care 10ml Unisex', 'pcs', '89999990276051', '2022-09-10', 10, '2022-09-11', 'Terjual'),
(3, 91, 0, '8999999034153', 'Blue Band Serbaguna 200g', 'PCS', '89999990341531', '2022-09-24', 15, '2022-09-18', 'Terjual'),
(4, 91, 0, '8999999034153', 'Blue Band Serbaguna 200g', 'PCS', '89999990341532', '2022-09-24', 15, '2022-09-18', 'Terjual'),
(5, 91, 0, '8999999034153', 'Blue Band Serbaguna 200g', 'PCS', '89999990341533', '2022-09-24', 15, '2022-09-18', 'Terjual');

-- --------------------------------------------------------

--
-- Table structure for table `barang_harga`
--

DROP TABLE IF EXISTS `barang_harga`;
CREATE TABLE IF NOT EXISTS `barang_harga` (
  `id_barang_harga` int(10) NOT NULL AUTO_INCREMENT,
  `id_barang` int(10) NOT NULL,
  `id_barang_satuan` int(10) DEFAULT NULL,
  `kategori_harga` text NOT NULL,
  `harga` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_barang_harga`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_harga`
--

INSERT INTO `barang_harga` (`id_barang_harga`, `id_barang`, `id_barang_satuan`, `kategori_harga`, `harga`) VALUES
(1, 4, 0, 'Harga Jual Eceran', 35000),
(2, 4, 2, 'Harga Jual Eceran', 3500000),
(3, 4, 1, 'Harga Jual Eceran', 350000),
(4, 3, 0, 'Harga Jual Eceran', 9000),
(5, 3, 3, 'Harga Jual Eceran', 900000),
(6, 1, 0, 'Harga Jual Eceran', 1600),
(7, 1, 5, 'Harga Jual Eceran', 6500),
(8, 1, 6, 'Harga Jual Eceran', 650000),
(9, 5, 0, 'Harga Eceren', 5000),
(10, 5, 0, 'Harga Medis', 4900),
(13, 5, 0, 'Harga BPJS', 4800),
(14, 5, 0, 'Harga Teman', 4700),
(15, 6, 0, 'Harga Eceren', 1500),
(16, 6, 0, 'Harga Medis', 1600),
(17, 6, 0, 'Harga BPJS', 1350),
(25, 7, 0, 'Harga Eceran', 22000),
(30, 99, 0, 'Eceran', 5000),
(31, 100, 0, 'Eceran', 5700),
(32, 1, 0, 'Eceran', 2600),
(33, 2, 0, 'Eceran', 2600),
(34, 3, 0, 'Eceran', 38000),
(35, 4, 0, 'Eceran', 15250),
(36, 5, 0, 'Eceran', 6600),
(37, 6, 0, 'Eceran', 3875),
(38, 7, 0, 'Eceran', 4500),
(39, 8, 0, 'Eceran', 2400),
(40, 9, 0, 'Eceran', 9600),
(41, 10, 0, 'Eceran', 4500),
(42, 11, 0, 'Eceran', 4500),
(43, 12, 0, 'Eceran', 4680),
(44, 13, 0, 'Eceran', 4680),
(45, 14, 0, 'Eceran', 3977),
(46, 15, 0, 'Eceran', 4500),
(47, 16, 0, 'Eceran', 13150),
(48, 17, 0, 'Eceran', 9100),
(49, 18, 0, 'Eceran', 4650),
(50, 19, 0, 'Eceran', 4650),
(51, 20, 0, 'Eceran', 9700),
(52, 21, 0, 'Eceran', 9100),
(53, 22, 0, 'Eceran', 9100),
(54, 23, 0, 'Eceran', 4680),
(55, 24, 0, 'Eceran', 9750),
(56, 25, 0, 'Eceran', 9750),
(57, 26, 0, 'Eceran', 17150),
(58, 27, 0, 'Eceran', 5450),
(59, 28, 0, 'Eceran', 5450),
(60, 29, 0, 'Eceran', 17150),
(61, 30, 0, 'Eceran', 4830),
(62, 31, 0, 'Eceran', 17508),
(63, 32, 0, 'Eceran', 4680),
(64, 33, 0, 'Eceran', 4680),
(65, 34, 0, 'Eceran', 1488),
(66, 35, 0, 'Eceran', 9308333),
(67, 36, 0, 'Eceran', 8600),
(68, 37, 0, 'Eceran', 4249),
(69, 38, 0, 'Eceran', 18050),
(70, 39, 0, 'Eceran', 14375),
(71, 40, 0, 'Eceran', 908333),
(72, 41, 0, 'Eceran', 15520),
(73, 42, 0, 'Eceran', 4074),
(74, 43, 0, 'Eceran', 4074),
(75, 44, 0, 'Eceran', 2400),
(76, 45, 0, 'Eceran', 2400),
(77, 46, 0, 'Eceran', 426111),
(78, 47, 0, 'Eceran', 4479167),
(79, 48, 0, 'Eceran', 4200),
(80, 49, 0, 'Eceran', 4200),
(81, 50, 0, 'Eceran', 11625),
(82, 51, 0, 'Eceran', 5529),
(83, 52, 0, 'Eceran', 9744),
(84, 53, 0, 'Eceran', 9500),
(85, 54, 0, 'Eceran', 10100),
(86, 55, 0, 'Eceran', 10100),
(87, 56, 0, 'Eceran', 5208),
(88, 57, 0, 'Eceran', 9000),
(89, 58, 0, 'Eceran', 9249),
(90, 59, 0, 'Eceran', 4800021),
(91, 61, 0, 'Eceran', 4300),
(92, 62, 0, 'Eceran', 2700),
(93, 63, 0, 'Eceran', 2700),
(94, 64, 0, 'Eceran', 2700),
(95, 73, 0, 'Eceran', 16300),
(96, 74, 0, 'Eceran', 1600),
(97, 75, 0, 'Eceran', 13550),
(98, 76, 0, 'Eceran', 13550),
(99, 77, 0, 'Eceran', 13550),
(100, 78, 0, 'Eceran', 13550),
(101, 79, 0, 'Eceran', 825),
(102, 80, 0, 'Eceran', 4830),
(103, 81, 0, 'Eceran', 4830),
(104, 82, 0, 'Eceran', 12114),
(105, 83, 0, 'Eceran', 12112),
(106, 84, 0, 'Eceran', 12114),
(107, 85, 0, 'Eceran', 20320),
(108, 86, 0, 'Eceran', 20320),
(109, 87, 0, 'Eceran', 2800),
(110, 88, 0, 'Eceran', 2800),
(111, 89, 0, 'Eceran', 2800),
(112, 91, 0, 'Eceran', 6733333),
(113, 92, 0, 'Eceran', 6850),
(114, 93, 0, 'Eceran', 6850),
(115, 94, 0, 'Eceran', 6850),
(116, 95, 0, 'Eceran', 783125),
(117, 96, 0, 'Eceran', 13150),
(118, 97, 0, 'Eceran', 22000),
(120, 98, 0, 'Eceran', 5000),
(121, 98, 19, 'Eceran', 50000),
(123, 98, 19, '', 25000),
(124, 97, 21, '', 200000),
(125, 97, 21, 'Eceran', 220000),
(126, 100, 20, '', 50000),
(127, 100, 20, 'Eceran', 57000);

-- --------------------------------------------------------

--
-- Table structure for table `barang_kategori_harga`
--

DROP TABLE IF EXISTS `barang_kategori_harga`;
CREATE TABLE IF NOT EXISTS `barang_kategori_harga` (
  `id_barang_kategori_harga` int(15) NOT NULL AUTO_INCREMENT,
  `kategori_harga` varchar(25) NOT NULL,
  PRIMARY KEY (`id_barang_kategori_harga`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_kategori_harga`
--

INSERT INTO `barang_kategori_harga` (`id_barang_kategori_harga`, `kategori_harga`) VALUES
(3, 'Eceran');

-- --------------------------------------------------------

--
-- Table structure for table `barang_satuan`
--

DROP TABLE IF EXISTS `barang_satuan`;
CREATE TABLE IF NOT EXISTS `barang_satuan` (
  `id_barang_satuan` int(10) NOT NULL AUTO_INCREMENT,
  `id_barang` int(10) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `satuan_multi` varchar(20) NOT NULL,
  `konversi_multi` int(10) DEFAULT NULL,
  `stok_multi` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_barang_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_satuan`
--

INSERT INTO `barang_satuan` (`id_barang_satuan`, `id_barang`, `kode_barang`, `satuan_multi`, `konversi_multi`, `stok_multi`) VALUES
(1, 4, '909', 'Krat', 10, 10),
(2, 4, '909', 'Dus', 100, 1),
(3, 3, '9032', 'Dus', 100, 1),
(5, 1, '906', 'Strip', 4, 25),
(6, 1, '906', 'Dus', 400, 0),
(7, 5, '108837348547', 'Strip', 4, 350),
(8, 5, '108837348547', 'Box', 40, 35),
(9, 6, '2345654634', 'Set', 4, 1417),
(11, 6, '2345654634', 'Boss', 10, 567),
(12, 6, '2345654634', 'Kontener', 1000, 6),
(19, 98, '8999999027049', 'Dus', 10, 10),
(20, 100, '2345654631', 'Bos', 10, 20),
(21, 97, '8999999027261', 'Dus', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi_api`
--

DROP TABLE IF EXISTS `dokumentasi_api`;
CREATE TABLE IF NOT EXISTS `dokumentasi_api` (
  `id_dokumentasi_api` int(10) NOT NULL AUTO_INCREMENT,
  `updatetime_api` varchar(25) NOT NULL,
  `judul_api` text NOT NULL,
  `kategori_api` varchar(20) NOT NULL,
  `metode_api` varchar(20) NOT NULL,
  `url_api` text NOT NULL,
  `request_api` text NOT NULL,
  `response_api` text NOT NULL,
  PRIMARY KEY (`id_dokumentasi_api`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumentasi_api`
--

INSERT INTO `dokumentasi_api` (`id_dokumentasi_api`, `updatetime_api`, `judul_api`, `kategori_api`, `metode_api`, `url_api`, `request_api`, `response_api`) VALUES
(2, '1661875962', 'Send Email', 'Email Gateway', 'POST', 'http://mailer.parasilva.my.id/index.php', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"subjek\":\"Percobaan Kirim Email Dengan SMTP\",</code><br /><code>&nbsp; &nbsp; \"email_asal\":\"zanny@parasilva.my.id\",</code><br /><code>&nbsp; &nbsp; \"password_email_asal\":\"solihulhadi1412\",</code><br /><code>&nbsp; &nbsp; \"url_provider\":\"mail.parasilva.my.id\",</code><br /><code>&nbsp; &nbsp; \"nama_pengirim\":\"Solihul Hadi\",</code><br /><code>&nbsp; &nbsp; \"email_tujuan\":\"dhiforester@gmail.com\",</code><br /><code>&nbsp; &nbsp; \"nama_tujuan\":\"Bapak Solihul hadi\",</code><br /><code>&nbsp; &nbsp; \"pesan\":\"Berikut ini saya kirim sebuah email untuk percobaan SMTP\",</code><br /><code>&nbsp; &nbsp; \"port\":\"465\"</code><br /><code>}1</code></p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"code\": \"200\",</code><br /><code>&nbsp; &nbsp; \"pesan\": \"Email Terkirim\"</code><br /><code>}1</code></p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>'),
(3, '1661364943', 'Referensi Provinsi', 'Referensi', 'POST', 'base_url/_API/Reference/Propinsi.php', '<p><code>{</code><br><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\"</code><br><code>}</code></p>', '<p><code>{</code><br><code>&nbsp; &nbsp; \"response\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br><code>&nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; \"metadata\": [</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"1\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Aceh\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"6805\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Sumatera Utara\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"13095\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Sumatera Barat\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"14431\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Sumatera Utara\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"20721\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Sumatera Barat\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"22057\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Sumatera Selatan\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"25485\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Bengkulu\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"27140\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Lampung\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"29957\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Kepulauan Bangka Belitung\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"30393\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Kepulauan Riau\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"30847\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Dki Jakarta\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"31165\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Jawa Barat\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"37781\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Jawa Tengah\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"46968\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Di Yogyakarta\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"47490\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Jawa Timur\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"56685\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Banten\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"58400\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Bali\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"59183\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Nusa Tenggara Barat\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"60441\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Nusa Tenggara Timur\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"63966\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Kalimantan Barat\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"66120\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Kalimantan Tengah\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"67829\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Kalimantan Selatan\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"69996\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Kalimantan Timur\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"71120\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Kalimantan Utara\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"71647\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Sulawesi Utara\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"73552\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Sulawesi Tengah\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"75646\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Sulawesi Selatan\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"78915\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Sulawesi Tenggara\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"81351\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Gorontalo\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"82165\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Sulawesi Barat\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"82876\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Maluku\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"84024\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Maluku Utara\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"85223\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Papua Barat\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"86851\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Papua\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"90889\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"DKI JAKARTA\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_propinsi\": \"90896\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"RIAU\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; }</code><br><code>&nbsp; &nbsp; ]</code><br><code>}</code></p>'),
(4, '1661365007', 'Referensi Kabupaten', 'Referensi', 'POST', 'base_url/_API/Reference/Kabupaten.php', '<p><code>{</code><br><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br><code>&nbsp; &nbsp; \"id_propinsi\":\"31165\"</code><br><code>}</code></p>', '<p><code>{</code><br><code>&nbsp; &nbsp; \"response\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br><code>&nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; \"metadata\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Jawa Barat\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"list_kabupaten\": [</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"31166\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Bogor\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"31641\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Sukabumi\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"32075\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Cianjur\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"32468\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Bandung\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"32780\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Garut\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"33265\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Tasikmalaya\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"33656\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Ciamis\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"33948\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Kuningan\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"34357\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Cirebon\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"34822\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Majalengka\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"35192\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Sumedang\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"35502\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Indramayu\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"35851\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Subang\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"36135\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Purwakarta\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"36345\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Karawang\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"36685\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Bekasi\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"36896\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Bandung Barat\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"37078\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Pangandaran\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"37182\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kota Bogor\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"37257\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kota Sukabumi\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"37298\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kota Bandung\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"37480\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kota Cirebon\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"37508\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kota Bekasi\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"37577\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kota Depok\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"37652\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kota Cimahi\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"37671\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kota Tasikmalaya\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"37751\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kota Banjar\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"90893\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"BANDUNG\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kabupaten\": \"90900\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"MAJALENGKA\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; }</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; ]</code><br><code>&nbsp; &nbsp; }</code><br><code>}</code></p>'),
(5, '1661365068', 'Referensi Kecamatan', 'Referensi', 'POST', 'base_url/_API/Reference/Kecamatan.php', '<p><code>{</code><br><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br><code>&nbsp; &nbsp; \"id_kabupaten\":\"33948\"</code><br><code>}</code></p>', '<p><code>{</code><br><code>&nbsp; &nbsp; \"response\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br><code>&nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; \"metadata\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Jawa Barat\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Kuningan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"list_kabupaten\": [</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34125\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Ciawigebang\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34068\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Cibeureum\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34057\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Cibingbin\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34105\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Cidahu\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34307\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Cigandamekar\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34240\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Cigugur\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34026\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Cilebak\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34293\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Cilimus\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34094\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Cimahi\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"33991\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Ciniru\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34150\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Cipicung\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34034\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Ciwaru\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"33949\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Darma\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34192\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Garawangi\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34001\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Hantara\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34266\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Jalaksana\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34282\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Japara\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"33969\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Kadugede\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34118\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Kalimanggis\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34047\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Karangkancana\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34251\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Kramatmulya\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34223\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Kuningan\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34161\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Lebakwangi\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34077\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Luragung\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34175\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Maleber\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34319\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Mandirancan\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"33982\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Nusaherang\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34332\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Pancalang\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34346\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Pasawahan\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34010\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Selajambe\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34210\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Sidangagung\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_kecamatan\": \"34018\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Subang\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; }</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; ]</code><br><code>&nbsp; &nbsp; }</code><br><code>}</code></p>'),
(6, '1661365118', 'Referensi Desa', 'Referensi', 'POST', 'base_url/_API/Reference/Desa.php', '<p><code>{</code><br><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br><code>&nbsp; &nbsp; \"id_kecamatan\":\"34223\"</code><br><code>}</code></p>', '<p><code>{</code><br><code>&nbsp; &nbsp; \"response\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br><code>&nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; \"metadata\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"propinsi\": \"Jawa Barat\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten\": \"Kab. Kuningan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan\": \"Kuningan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"list_kabupaten\": [</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34234\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Ancaran\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34237\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Awirarangan\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34224\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Cibinuang\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34230\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Cigintung\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34231\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Cijoho\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34233\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Ciporang\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34236\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Cirendang\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34225\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Citangtu\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34226\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Karangtawang\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34238\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Kasturi\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34235\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Kedungarum\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34228\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Kuningan\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34239\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Padarek\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34229\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Purwawinangun\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34227\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Winduhaji\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_desa\": \"34232\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa\": \"Windusengkahan\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; }</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; ]</code><br><code>&nbsp; &nbsp; }</code><br><code>}</code></p>'),
(7, '1661365170', 'Referensi Partner', 'Referensi', 'POST', 'base_url/_API/Reference/ReferensiPartner.php', '<p><code>{</code><br><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\"</code><br><code>}</code></p>', '<p><code>{</code><br><code>&nbsp; &nbsp; \"response\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br><code>&nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; \"metadata\": [</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_mitra\": \"2\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_mitra\": \"Dedy Sumardi\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kontak_mitra\": \"0896676859490\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi_mitra\": \"Jawa Barat\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten_mitra\": \"Kab. Kuningan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan_mitra\": \" Kuningan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa_mitra\": \"Winduhaji\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"alamat_mitra\": \"Jalan Winduhaji no 15\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"email_mitra\": \"dedysumardy@gmail.com\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kategori_mitra\": \"Nurse\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_mitra\": \"1\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_mitra\": \"Klinik Metro\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kontak_mitra\": \"0232875995\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi_mitra\": \"Jawa Barat\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten_mitra\": \"Kab. Kuningan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan_mitra\": \" Kuningan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa_mitra\": \"Kuningan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"alamat_mitra\": \"Jalan Jendral Sudirman No.45, Awirarangan, Kuningan, Kuningan Regency, West Java 45511\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"email_mitra\": \"klinikmetro@gmail.com\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kategori_mitra\": \"Clinic\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_mitra\": \"3\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_mitra\": \"Klinik Muhamadiah\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kontak_mitra\": \"083637438\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"propinsi_mitra\": \"Jawa Barat\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten_mitra\": \"Kab. Kuningan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan_mitra\": \" Cimahi\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"desa_mitra\": \"Mekarjaya\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"alamat_mitra\": \"Jalan RE Martadinata No 108\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"email_mitra\": \"klinikmuhamadiah@gmail.com\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kategori_mitra\": \"Clinic\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; }</code><br><code>&nbsp; &nbsp; ]</code><br><code>}</code></p>'),
(8, '1662385647', 'Referensi Personnel', 'Referensi', 'POST', 'base_url/_API/Reference/ReferensiPersonnel.php', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br /><code>&nbsp; &nbsp; \"id_mitra\":\"4\"</code><br /><code>}</code></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": [</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_personnel\": \"3\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"name\": \"dr Zaenal Arifin\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"category\": \"Dokter\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"contact\": \"0813207761771\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"email\": \"zaenalarifin@gmail.com\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"description\": \"doketr ini adlah\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"image\": \"http://localhost:81/metro/asset/img/User/8b7b0e5a69970a192da45b84e59bfa.jpg\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; }</code><br /><code>&nbsp; &nbsp; ]</code><br /><code>}</code></p>'),
(9, '1661365341', 'Referensi Practice Schedule', 'Referensi', 'POST', 'base_url/_API/Reference/ReferensiJadwalPraktek.php', '<p><code>{</code><br><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br><code>&nbsp; &nbsp; \"id_personnel\":\"5\"</code><br><code>}</code></p>', '<p><code>{</code><br><code>&nbsp; &nbsp; \"response\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br><code>&nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; \"metadata\": [</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_jadwal\": \"2\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_personnel\": \"5\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_mitra\": \"1\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"hari\": \"1\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_mitra\": \"Klinik Metro\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_personnel\": \"dr Syamsudin\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"jam_mulai\": \"08:00\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"jam_selesai\": \"00:00\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kutoa\": \"5\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"durasi_tindakan\": \"30\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"status\": \"Active\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_jadwal\": \"3\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_personnel\": \"5\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_mitra\": \"1\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"hari\": \"7\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_mitra\": \"Klinik Metro\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_personnel\": \"dr Syamsudin\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"jam_mulai\": \"08:00\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"jam_selesai\": \"11:00\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kutoa\": \"10\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"durasi_tindakan\": \"30\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"status\": \"Active\"</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; }</code><br><code>&nbsp; &nbsp; ]</code><br><code>}</code></p>'),
(10, '1662385572', 'Referensi Medical Treatment', 'Referensi', 'POST', 'base_url/_API/Reference/ReferensiMedicalTreatment.php', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br /><code>&nbsp; &nbsp; \"id_mitra\":\"4\"</code><br /><code>}</code></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": [</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_treatment\": \"4\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_mitra\": \"Klinik ABC\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"name_treatment\": \"Smartklamp\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"category\": \"Primary\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"description\": \"Ada beberapa metode klamp, tetapi yang paling sering digunakan adalah metode Smartklamp. Alat Smartklamp ini memiliki beberapa ukuran sesuai umur dan ukuran penis. Setelah dilakukan anastesi lokal, maka tabung Smartklamp akan dimasukkan pada kulup yang akan dipotong, kemudian dijepit dengan pengunci klamp.\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"service_rates\": \"700000\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"service_sharing\": \"500000\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"image\": \"http://localhost:81/metro/assets/img/Tindakan/\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; }</code><br /><code>&nbsp; &nbsp; ]</code><br /><code>}</code></p>');
INSERT INTO `dokumentasi_api` (`id_dokumentasi_api`, `updatetime_api`, `judul_api`, `kategori_api`, `metode_api`, `url_api`, `request_api`, `response_api`) VALUES
(11, '1661365535', 'Partner Registration', 'Partner', 'POST', 'base_url/_API/Partner/PartnerRegistration.php', '<p><code>{</code><br><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br><code>&nbsp; &nbsp; \"nama_mitra\":\"Klinik ABC\",</code><br><code>&nbsp; &nbsp; \"kontak_mitra\":\"0232876232\",</code><br><code>&nbsp; &nbsp; \"delegasi\":\"Suwarno\",</code><br><code>&nbsp; &nbsp; \"kontak_delegasi\":\"08132411109987\",</code><br><code>&nbsp; &nbsp; \"email_mitra\":\"solihulhadi141213@gmail.com\",</code><br><code>&nbsp; &nbsp; \"propinsi_mitra\":\"Jawa Barat\",</code><br><code>&nbsp; &nbsp; \"kabupaten_mitra\":\"Kab. Kuningan\",</code><br><code>&nbsp; &nbsp; \"kecamatan_mitra\":\"Kuningan\",</code><br><code>&nbsp; &nbsp; \"desa_mitra\":\"Cijoho\",</code><br><code>&nbsp; &nbsp; \"alamat_mitra\":\"Jalan Siliwangi No 123 RT 1 RW 2\",</code><br><code>&nbsp; &nbsp; \"kategori_mitra\":\"Clinic\",</code><br><code>&nbsp; &nbsp; \"password1\":\"klinikabc\",</code><br><code>&nbsp; &nbsp; \"password2\":\"klinikabc\",</code><br><code>&nbsp; &nbsp; \"image\":\"base64\"</code></p>\n<p><code>}</code></p>', '<p><code>{</code><br><code>&nbsp; &nbsp; \"response\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br><code>&nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; \"metadata\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_mitra\": 4,</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_akses\": 18,</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"nama_mitra\": \"Klinik ABC\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kontak_mitra\": \"0232876232\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"propinsi_mitra\": \"Jawa Barat\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kabupaten_mitra\": \"Kab. Kuningan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kecamatan_mitra\": \"Kuningan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"desa_mitra\": \"Cijoho\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"alamat_mitra\": \"Jalan Siliwangi No 123 RT 1 RW 2\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"email_mitra\": \"solihulhadi141213@gmail.com\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"delegasi\": \"Suwarno\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kontak_delegasi\": \"08132411109987\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kategori_mitra\": \"Clinic\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"status_mitra\": \"Pending\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"datetime\": 1661169912,</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"image\": \"localhost:81/metro/assets/img/User/eafdc95cf3873794ed5bce591a223d.jpg\"</code><br><code>&nbsp; &nbsp; }</code><br><code>}</code></p>'),
(12, '1661365612', 'Member Registration', 'Member', 'POST', 'base_url/_API/Member/MemberRegistration.php', '<p><code>{</code><br><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br><code>&nbsp; &nbsp; \"nama\":\"Naya Nurmayasari\",</code><br><code>&nbsp; &nbsp; \"kontak\":\"089660757179\",</code><br><code>&nbsp; &nbsp; \"email\":\"solihulhadi141213@gmail.com\",</code><br><code>&nbsp; &nbsp; \"password1\":\"solihulhadi141213\",</code><br><code>&nbsp; &nbsp; \"password2\":\"solihulhadi141213\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"image\":\"base64\"</code></p>\n<p><code>}</code></p>', '<p><code>{</code><br><code>&nbsp; &nbsp; \"response\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br><code>&nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; \"metadata\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_akses\": 18,</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"nama\": \"Naya Nurmayasari\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kontak\": \"089660757179\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"email\": \"solihulhadi141213@gmail.com\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"status\": \"Active\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"datetime\": 1661169704,</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"image\": \"localhost:81/metro/assets/img/User/32092cdf2d2b8f48d734ffcdf006d1.jpg\"</code><br><code>&nbsp; &nbsp; }</code><br><code>}</code></p>'),
(13, '1661365665', 'Generate Validation Code', 'Member', 'POST', 'base_url/_API/Member/GenerateValidationCode.php', '<p><code>{</code><br><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br><code>&nbsp; &nbsp; \"email\":\"iwankurniawan@gmail.com\"</code><br><code>}</code></p>', '<p><code>{</code><br><code>&nbsp; &nbsp; \"response\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br><code>&nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; \"metadata\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_akses\": \"17\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"email\": \"iwankurniawan@gmail.com\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"validation_code\": \"bfe46186b162fac0661465ed11d99b\"</code><br><code>&nbsp; &nbsp; }</code><br><code>}</code></p>'),
(14, '1661365709', 'Send Email Validation', 'Member', 'POST', 'base_url/_API/Member/ResendEmailValidationCode.php', '<p><code>{</code><br><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br><code>&nbsp; &nbsp; \"email\":\"solihulhadi141213@gmail.com\"</code><br><code>}</code></p>', '<p><code>{</code><br><code>&nbsp; &nbsp; \"response\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br><code>&nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; \"metadata\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_akses\": \"18\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"validation_code\": \"ddf0c5ca351f7eaf28624b1630390d\"</code><br><code>&nbsp; &nbsp; }</code><br><code>}</code></p>'),
(15, '1661365750', 'Validation Email', 'Member', 'POST', 'base_url/_API/Member/ValidationEmail.php', '<p><code>{</code><br><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br><code>&nbsp; &nbsp; \"validation_code\": \"bfe46186b162fac0661465ed11d99b\"</code><br><code>}</code></p>', '<p><code>{</code><br><code>&nbsp; &nbsp; \"response\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br><code>&nbsp; &nbsp; },</code><br><code>&nbsp; &nbsp; \"metadata\": {</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"nama\": \"Iwan Kurniawan\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kontak\": \"089660757177\",</code><br><code>&nbsp; &nbsp; &nbsp; &nbsp; \"email\": \"iwankurniawan@gmail.com\"</code><br><code>&nbsp; &nbsp; }</code><br><code>}</code></p>'),
(16, '1662385512', 'Patient Registration', 'Patient', 'POST', 'base_url/_API/Pasien/GeneralRegistration.php', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br /><code>&nbsp; &nbsp; \"id_akses\":\"\",</code><br /><code>&nbsp; &nbsp; \"id_pasien\":\"\",</code><br /><code>&nbsp; &nbsp; \"id_mitra\":\"4\",</code><br /><code>&nbsp; &nbsp; \"id_personnel\":\"3\",</code><br /><code>&nbsp; &nbsp; \"id_treatment\":\"4\",</code><br /><code>&nbsp; &nbsp; \"id_jadwal\":\"8\",</code><br /><code>&nbsp; &nbsp; \"id_desa\":\"34231\",</code><br /><code>&nbsp; &nbsp; \"medical_treatment_date\":\"2022-09-12\",</code><br /><code>&nbsp; &nbsp; \"nik\":\"\",</code><br /><code>&nbsp; &nbsp; \"kk\":\"\",</code><br /><code>&nbsp; &nbsp; \"nama_pasien\":\"Ahmad Nursandi\",</code><br /><code>&nbsp; &nbsp; \"gender\":\"Laki-laki\",</code><br /><code>&nbsp; &nbsp; \"agama\":\"Islam\",</code><br /><code>&nbsp; &nbsp; \"kontak_pasien\":\"08966075111\",</code><br /><code>&nbsp; &nbsp; \"email_pasien\":\"ahmadnursandi@gmail.com\",</code><br /><code>&nbsp; &nbsp; \"alamat_pasien\":\"Jalan anggrek 4 no 11\",</code><br /><code>&nbsp; &nbsp; \"tempat_lahir\":\"Kuningan\",</code><br /><code>&nbsp; &nbsp; \"tanggal_lahir\":\"2017-08-12\",</code><br /><code>&nbsp; &nbsp; \"penanggungjawab\":\"Komarudin\",</code><br /><code>&nbsp; &nbsp; \"hubungan\":\"Ayah Kandung\",</code><br /><code>&nbsp; &nbsp; \"kontak_darurat\":\"089660757100\",</code><br /><code>&nbsp; &nbsp; \"kategori_kunjungan\":\"Khitan\",</code><br /><code>&nbsp; &nbsp; \"metode_pembayaran\":\"Payment Gateway\",</code><br /><code>&nbsp; &nbsp; \"catatan\":\"Percobaan pendaftaran pasien baru2\"</code><br /><code>}</code></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_pasien\": 15,</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_kunjungan\": 9,</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"antrian\": 1,</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"day\": 1,</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"estimasi\": 1662944400</code><br /><code>&nbsp; &nbsp; }</code><br /><code>}</code></p>'),
(17, '1661875874', 'Insert Screening', 'Patient', 'POST', 'base_url/metro/_API/Screening/InsertScreening.php', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br /><code>&nbsp; &nbsp; \"id_kunjungan\":\"8\",</code><br /><code>&nbsp; &nbsp; \"screening_1\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_2\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_3\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_4\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_5\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_6\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_7\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_8\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_9\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_10\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_11\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_12\":\"Tidak\",</code><br /><code>&nbsp; &nbsp; \"screening_13\":\"Tidak\"</code><br /><code>}</code></p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_pasien\": \"14\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_kunjungan\": \"8\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"tanggal_screening\": \"2022-08-29 23:46:21\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_1\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_2\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_3\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_4\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_5\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_6\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_7\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_8\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_9\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_10\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_11\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_12\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"screening_13\": \"Tidak\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"status\": \"Lulus\"</code><br /><code>&nbsp; &nbsp; }</code><br /><code>}</code></p>\n<p><strong>Keterangan</strong><code>:</code></p>\n<ol>\n<li>Pendarahan yang lama setelah luka</li>\n<li>Kulit mudah membiru jika terkena benturan ringan</li>\n<li>Perdarahan lama setelah cabut gigi/gigi tanggal&nbsp;</li>\n<li>Gosok gigi sering berdarah</li>\n<li>Perdarahan yang lama pada keluarga jika luka&nbsp;</li>\n<li>Perdarahan lama pada operasi sebelumnya</li>\n<li>Arah pancaran air kencing ke bawah&nbsp;</li>\n<li>Arah pancaran air kencing ke atas</li>\n<li>Riwayat trauma /luka pada penis&nbsp;</li>\n<li>Riwayat kejang</li>\n<li>Riwayat kencing manis</li>\n<li>Riwayat kencing manis dari keluarga&nbsp;</li>\n<li>Riwayat asma&nbsp;<code></code></li>\n</ol>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>'),
(18, '1662381198', 'List URL Dinamis', 'Kontent', 'POST', 'base_url/_API/Content/ListUrlDinamis.php', '<p><strong>Keterangan:</strong></p>\n<p>Menampilkan url dinamis seperti link media sosial, eksternal link, dan laman mandiri.<br /><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\"</code><br /><code>}</code></p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"Success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": [</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; [</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_url\": \"Whatsapp\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kategori_url\": \"Medsos\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"image_url\": \"http://localhost:81/metro/assets/img/Posting/ab0b95067c46c0aa0972601123f370.png\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"datetime_url\": \"1661689078\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_url\": \"Tokopedia\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kategori_url\": \"Image\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"image_url\": \"http://localhost:81/metro/assets/img/Posting/6c65e4ec2f915a0fd00af2ac9e001a.jpg\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"datetime_url\": \"1661685654\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_url\": \"Instagram\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kategori_url\": \"Medsos\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"image_url\": \"http://localhost:81/metro/assets/img/Posting/9f651eaf841ece4d0fafcae0e0bfca.png\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"datetime_url\": \"1661686908\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_url\": \"Facebook\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kategori_url\": \"Medsos\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"image_url\": \"http://localhost:81/metro/assets/img/Posting/3a36f556e8da3f9c15764180c6f258.png\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"datetime_url\": \"1661686926\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama_url\": \"Alo Dokter\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kategori_url\": \"Image\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"image_url\": \"http://localhost:81/metro/assets/img/Posting/94d3a4755e7c7d69622e034a990837.png\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"datetime_url\": \"1661686995\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; }</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; ]</code><br /><code>&nbsp; &nbsp; ]</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>'),
(19, '1662381305', 'List Page', 'Kontent', 'POST', 'base_url/metro/_API/Content/ListPage.php', '<p><strong>Keterangan :</strong></p>\n<p>Berfungsi menampilkan data posting halaman, seperti blog, laman mandiri, company profile dll.</p>\n<p><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\"</code><br /><code>}</code></p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"Success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": [</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; [</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_konten_posting\": \"2\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_setting_api_key\": \"12\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"judul_posting\": \"Lebih Mengenal Sunat Perempuan dan Dampaknya bagi Kesehatan\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kategori_posting\": \"Blog\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"status_posting\": \"Publish\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"image_posting\": \"http://localhost:81/metro/assets/img/Posting/40bcdb7688f69dface94be01cb8672.jpg\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"datetime_posting\": \"2022-08-28\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_konten_posting\": \"3\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"id_setting_api_key\": \"0\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"judul_posting\": \"Khitan Dalam Pandangan Islam Sesuai Al Quran dan Hadist\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"kategori_posting\": \"Blog\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"status_posting\": \"Publish\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"image_posting\": \"http://localhost:81/metro/assets/img/Posting/894f22f4d05c646dd8b71a20cfa39f.jpg\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"datetime_posting\": \"2022-09-02\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; }</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; ]</code><br /><code>&nbsp; &nbsp; ]</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>'),
(20, '1662381588', 'Detail Page Post', 'Kontent', 'POST', 'base_url/_API/Content/DetailPage.php', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br /><code>&nbsp; &nbsp; \"id_konten_posting\": \"2\"</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_konten_posting\": \"2\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"judul_posting\": \"Lebih Mengenal Sunat Perempuan dan Dampaknya bagi Kesehatan\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"tag_posting\": \"Sunat Perempuan\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kategori_posting\": \"Blog\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"isi_posting\": \"&lt;p&gt;&lt;strong&gt;Sunat perempuan adalah prosedur yang melibatkan pengangkatan sebagian atau seluruh alat kelamin wanita bagian luar. Sunat perempuan tidak dilakukan atas alasan medis, dan justru dapat menimbulkan dampak negatif bagi kesehatan.&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Istilah sunat perempuan sebenarnya tidak tepat. Istilah yang lebih tepat untuk prosedur ini adalah mutilasi alat kelamin perempuan (&lt;/span&gt;&lt;em&gt;&lt;span style=\"font-weight: 400;\"&gt;female genital mutilation&lt;/span&gt;&lt;/em&gt;&lt;span style=\"font-weight: 400;\"&gt;). Pasalnya, bukan hanya kulup atau lipatan kulit yang mengelilingi&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://www.alodokter.com/peran-klitoris-saat-berhubungan-intim\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;klitoris&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt; yang diangkat dalam prosedur ini, tetapi juga klitoris itu sendiri.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Sunat perempuan atau mutilasi alat kelamin perempuan cukup umum dilakukan di Afrika dan Timur Tengah. Diperkirakan lebih dari 200 juta wanita di seluruh dunia telah menjalani prosedur ini. Mayoritas wanita-wanita tersebut disunat sebelum mereka berusia 15 tahun.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Sejak tahun 1997, prosedur ini sudah dilarang untuk dipraktikkan. Selain karena dilakukan tanpa keterampilan maupun indikasi medis, sunat perempuan juga berdampak buruk bagi kesehatan.&lt;/span&gt;&lt;/p&gt;\n&lt;h3&gt;&lt;strong&gt;Sunat Perempuan dan Jenisnya&lt;/strong&gt;&lt;/h3&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Organisasi Kesehatan Dunia (WHO) mendefinisikan sunat perempuan atau mutilasi alat kelamin perempuan sebagai segala prosedur yang melibatkan pengangkatan sebagian atau seluruh alat kelamin wanita bagian luar.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Sunat perempuan umumnya dilakukan karena alasan sosial dan budaya. Dalam beberapa budaya, prosedur ini merupakan syarat untuk seorang wanita dapat menikah. Sementara pada beberapa budaya lain, sunat perempuan merupakan bentuk penghormatan seorang wanita kepada keluarga.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Secara umum, terdapat empat tipe sunat perempuan, yaitu:&lt;/span&gt;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;&lt;strong&gt;Tipe 1&lt;br&gt;&lt;/strong&gt;Tipe sunat perempuan ini juga dikenal dengan sebutan klitoridektomi. Pada tipe ini, sebagian atau seluruh klitoris diangkat.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;ul&gt;\n&lt;li&gt;&lt;strong&gt;Tipe 2&lt;br&gt;&lt;/strong&gt;Pada sunat perempuan tipe 2, tak hanya sebagian atau seluruh klitoris yang diangkat, tapi juga labia.&amp;nbsp;&lt;a href=\"https://www.alodokter.com/masalah-di-sekitar-labia-mayora-yang-harus-anda-waspadai/\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;Labia&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt; adalah \"bibir\" bagian dalam dan luar yang mengelilingi vagina.&lt;/span&gt;&lt;/li&gt;\n&lt;/ul&gt;\n&lt;ul&gt;\n&lt;li&gt;&lt;strong&gt;Tipe 3&lt;br&gt;&lt;/strong&gt;Pada sunat perempuan tipe 3, labia dijahit menjadi satu untuk membuat lubang&amp;nbsp;&lt;a href=\"https://www.alodokter.com/mengenali-anatomi-vagina\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;vagina&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt; lebih kecil. Sunat perempuan tipe ini disebut juga dengan istilah infibulasi.&lt;/span&gt;&lt;/li&gt;\n&lt;/ul&gt;\n&lt;ul&gt;\n&lt;li&gt;&lt;strong&gt;Tipe 4&lt;br&gt;&lt;/strong&gt;Sunat perempuan tipe 4 mencakup semua jenis prosedur yang merusak alat kelamin wanita untuk tujuan nonmedis, termasuk dengan cara menusuk, memotong, mengikis, atau membakar.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Sekitar 90% kasus sunat perempuan termasuk dalam tipe 1, 2, atau 4. Sementara sisanya, yaitu sekitar 10% atau lebih, merupakan sunat perempuan tipe 3.&lt;/span&gt;&lt;/p&gt;\n&lt;h3&gt;&lt;strong&gt;Dampak Sunat Perempuan bagi Kesehatan&lt;/strong&gt;&lt;/h3&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Sunat perempuan adalah praktik berbahaya dan dapat berdampak buruk bagi kesehatan. Oleh karena itu, Organsisasi Kesehatan Dunia (WHO) menentang segala bentuk sunat perempuan dan sangat mendesak penyedia layanan kesehatan untuk tidak melakukan prosedur ini meski pasien atau keluarga pasien memintanya.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Berbeda dengan sunat pria, sunat perempuan tidak memiliki manfaat apa pun bagi kesehatan. Sebaliknya, prosedur ini justru bisa menyebabkan beragam keluhan, seperti:&lt;/span&gt;&lt;/p&gt;\n&lt;h4&gt;&lt;strong&gt;1. Masalah kesehatan mental&lt;/strong&gt;&lt;/h4&gt;\n&lt;p&gt;Sunat perempuan dapat membuat wanita yang menjalaninya mengalami trauma psikis dan&amp;nbsp;&lt;a href=\"https://www.alodokter.com/depresi\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;depresi&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt;. Jika berkelanjutan, gangguan mental ini bahkan dapat menimbulkan keinginan untuk bunuh diri.&lt;/span&gt;&lt;/p&gt;\n&lt;h4&gt;&lt;strong&gt;2. Kista&lt;/strong&gt;&lt;/h4&gt;\n&lt;p&gt;Sunat perempuan berisiko menyebabkan terbentuknya&amp;nbsp;&lt;a href=\"https://www.alodokter.com/kista\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;kista&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt; dan&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://www.alodokter.com/tidak-cuma-di-kulit-abses-bisa-terjadi-di-mana-saja\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;abses&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt;.&lt;/span&gt;&lt;/p&gt;\n&lt;h4&gt;&lt;strong&gt;3. Perdarahan&lt;/strong&gt;&lt;/h4&gt;\n&lt;p&gt;&lt;a href=\"https://www.alodokter.com/mengetahui-berbagai-penyebab-vagina-berdarah\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;Perdarahan&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt; bisa terjadi akibat terpotongnya pembuluh darah pada klitoris atau pembuluh darah lainnya di sekitar alat kelamin sewaktu prosedur sunat perempuan dilakukan.&lt;/span&gt;&lt;/p&gt;\n&lt;h4&gt;&lt;strong&gt;4. Gangguan dalam berhubungan seks&lt;/strong&gt;&lt;/h4&gt;\n&lt;p&gt;Merusak jaringan kelamin yang sangat sensitif, terutama klitoris, dapat menyebabkan penurunan hasrat seksual,&amp;nbsp;&lt;a href=\"https://www.alodokter.com/sakit-saat-berhubungan-intim-bisa-dirasakan-wanita-dan-pria\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;nyeri saat berhubungan seks&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt;, kesulitan saat penetrasi penis, penurunan lubrikasi selama bersanggama, dan berkurangnya atau tidak adanya orgasme (&lt;a href=\"https://www.alodokter.com/kenali-apa-itu-anorgasmia\" target=\"_blank\" rel=\"noopener\"&gt;anorgasmia&lt;/a&gt;).&lt;/span&gt;&lt;/p&gt;\n&lt;h4&gt;&lt;strong&gt;5. Nyeri terus-menerus&amp;nbsp;&lt;/strong&gt;&lt;/h4&gt;\n&lt;p&gt;Pemotongan ujung saraf dan jaringan alat kelamin dapat menyebabkan rasa sakit yang luar biasa. Tak hanya itu, masa penyembuhannya juga menyakitkan.&lt;/p&gt;\n&lt;h4&gt;&lt;strong&gt;6. Infeksi&lt;/strong&gt;&lt;/h4&gt;\n&lt;p&gt;&lt;a href=\"https://www.alodokter.com/penyakit-infeksi\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;Infeksi&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt; dapat terjadi akibat penggunaan alat yang sudah bekas pakai dan sudah terkontaminasi. Banyak jenis infeksi yang bisa terjadi akibat prosedur ini. Salah satunya adalah&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://www.alodokter.com/tetanus\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;tetanus&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt; yang dapat menyebabkan kematian.&lt;/span&gt;&lt;/p&gt;\n&lt;h4&gt;&lt;strong&gt;7. Gangguan berkemih&lt;/strong&gt;&lt;/h4&gt;\n&lt;p&gt;Wanita yang menjalani sunat perempuan dapat mengalami gangguan dalam berkemih, seperti nyeri saat kencing atau bahkan tidak bisa buang air kecil.&lt;/p&gt;\n&lt;h4&gt;&lt;strong&gt;8. Gangguan dalam persalinan&lt;/strong&gt;&lt;/h4&gt;\n&lt;p&gt;Akibat jalan lahir yang mengecil, sunat perempuan, terutama pada tipe 3, dapat menyebabkan persalinan menjadi sulit, robekan pada jalan lahir,&amp;nbsp;&lt;a href=\"https://www.alodokter.com/perdarahan-pascamelahirkan\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;perdarahan setelah melahirkan&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt;, dan persalinan yang lama hingga mengancam nyawa ibu maupun bayi.&lt;/span&gt;&lt;/p&gt;\n&lt;h3&gt;&lt;strong&gt;Terapi untuk Wanita yang Menjalani Sunat Perempuan&lt;/strong&gt;&lt;/h3&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Untuk mengurangi gangguan yang timbul akibat sunat perempuan, dapat dilakukan operasi untuk membuka vagina atau disebut juga deinfibulasi. Namun, perlu diketahui bahwa prosedur ini tidak dapat menggantikan jaringan yang hilang atau mengembalikan kerusakan yang telah terjadi.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Operasi deinfibulasi biasanya direkomendasikan untuk kondisi berikut:&lt;/span&gt;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;&lt;span style=\"font-weight: 400;\"&gt;Wanita yang tidak dapat berhubungan seks atau mengalami&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://www.alodokter.com/susah-buang-air-kecil-jangan-dibiarkan\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;kesulitan buang air kecil&lt;/span&gt;&lt;/a&gt;&lt;/li&gt;\n&lt;li&gt;&lt;span style=\"font-weight: 400;\"&gt;Wanita hamil yang berisiko mengalami masalah selama persalinan&lt;/span&gt;&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Deinfibulasi harus dilakukan sebelum hamil. Namun, jika terpaksa, operasi ini tetap bisa dilakukan selama kehamilan, tetapi idealnya harus sebelum 2 bulan terakhir kehamilan.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Operasi dilakukan dengan membuat sayatan untuk membuka&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://www.alodokter.com/berbagai-jenis-jaringan-parut-pada-kulit-dan-cara-mengatasinya\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;jaringan parut&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt; di atas lubang masuk vagina. Prosedur ini biasanya dilakukan dengan bius lokal dan pasien tidak perlu dirawat inap setelahnya. Meski begitu, pada beberapa kasus, dibutuhkan bius umum atau bius dengan suntikan di punggung (&lt;/span&gt;&lt;a href=\"https://www.alodokter.com/mitos-dan-fakta-tentang-suntik-bius-epidural-saat-persalinan\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;epidural&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt;).&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Intinya, sunat perempuan bukanlah prosedur yang dilakukan untuk alasan kesehatan. Justru sebaliknya, menjalani prosedur ini dapat menimbulkan banyak gangguan kesehatan.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\"font-weight: 400;\"&gt;Jika Anda atau orang di sekitar Anda ada yang menjalani sunat perempuan dan merasakan berbagai keluhan seperti yang sudah dijelaskan di atas, segera temui&amp;nbsp;&lt;/span&gt;&lt;a href=\"https://www.alodokter.com/cari-dokter/dokter-bedah\" target=\"_blank\" rel=\"noopener\"&gt;&lt;span style=\"font-weight: 400;\"&gt;dokter&lt;/span&gt;&lt;/a&gt;&lt;span style=\"font-weight: 400;\"&gt; agar bisa diberikan penanganan.&lt;/span&gt;&lt;/p&gt;\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"status_posting\": \"Publish\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"image_posting\": \"http://localhost:81/metro/assets/img/Posting/40bcdb7688f69dface94be01cb8672.jpg\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"datetime_posting\": \"2022-08-28\"</code><br /><code>&nbsp; &nbsp; }</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>'),
(21, '1662381687', 'Informasi / Profile Website', 'Kontent', 'POST', 'base_url/_API/Content/GeneralContent.php', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\"</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_konten_umum\": \"2\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"judul_konten\": \"Klinik ABC\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"keyword_konten\": \"Klinik, Sunat, Khitan\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"deskripsi_konten\": \"Aplikasi layanan pendaftaran khitan online\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"alamat_konten\": \"Jalan anggrek 4 no 15\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"email_konten\": \"dhiforester@gmail.com\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"kontak_konten\": \"0232876240\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"favicon_konten\": \"http://localhost:81/metro/assets/img/24ce6d93244e10b88ccad169196ae7.png\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"logo_konten\": \"http://localhost:81/metro/assets/img/527351166de66d43c08f8f99d3ffd2.png\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"baseurl_konten\": \"https://www.klinik.nosinsandigital.com\"</code><br /><code>&nbsp; &nbsp; }</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>'),
(22, '1662382536', 'Insert Payment', 'Payment Gateway', 'POST', 'base_url/_API/Payment/InsertTransaction.php', '<p><code></code><strong>Keterangan:</strong></p>\n<p>Setelah melakukan pendaftaran, kirim id_pasien dan id_kunjungan untuk memperoleh order_id</p>\n<p><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br /><code>&nbsp; &nbsp; \"id_pasien\":\"15\",</code><br /><code>&nbsp; &nbsp; \"id_kunjungan\":\"9\"</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_transaksi\": 15,</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_pasien\": \"15\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_kunjungan\": \"9\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"id_mitra\": \"4\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"nama_pasien\": \"Ahmad Nursandi\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"tanggal\": \"2022-09-02 16:59:00\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"metode_pembayaran\": \"Payment Gateway\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"server_key\": \"SB-Mid-server-zCHS9FOJmdihnvDOmjuHD9yM\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"production\": \"false\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"order_id\": \"KM-4-1662112740\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"tagihan\": \"700000\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"first_name\": \"Ahmad\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"last_name\": \"Nursandi\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"snap_token\": \"95cbaf26-f593-4c69-a864-4b32b8b22eff\"</code><br /><code>&nbsp; &nbsp; }</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>'),
(23, '1662382667', 'Request Payment Button', 'Payment Gateway', 'GET', 'base_url/_API/Payment/RequestButton.php?snap_token=09bec057-486b-406f-be69-0a058764806b', '<p><strong>Keterangan:</strong></p>\n<p>snap_token diperoleh dari proses insert payment.</p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>', '<p>&nbsp;</p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>'),
(24, '1662382790', 'Payment Status', 'Payment Gateway', 'GET', 'http://payment.parasilva.my.id/StatusPembayaran.php?order_id=KM-4-1662112740', '<p><strong>Keterangan : </strong></p>\n<p>order_id diperoleh pada saat proses insert payment<br /></p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"metadata\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"transaction_status\": \"settlement\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"pesan\": \"Berhasil\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; }</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>'),
(25, '1673970129', 'Testimoni', 'Kontent', 'POST', 'base_url/_API/Content/Testimoni.php', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\"</code><br /><code>}</code></p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>', '<h6><code>Data yang ditampilkan hanya yang berstatus \"Publish\"</code></h6>\n<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"Success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": [</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; [</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"tanggal\": \"2023-01-17 21:06\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama\": \"Solihul Hadi\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"email\": \"dhiforester@gmail.com\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"image\": \"http://localhost:81/metro/assets/img/Testimoni/dc2956ab172fa6cd39591b33be06b8.jpg\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"testimoni\": \"Terima Kasih\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"status\": \"Publish\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"tanggal\": \"2023-01-17 21:12\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"nama\": \"Syamsul Maarif\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"email\": \"syamsul@gmail.com\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"image\": \"http://localhost:81/metro/assets/img/Testimoni/9b6dd278925882964ca7b37888a57b.jpg\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"testimoni\": \"Layanan yang baik dan cepat\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"status\": \"Publish\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; }</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; ]</code><br /><code>&nbsp; &nbsp; ]</code><br /><code>}</code></p>'),
(26, '1673972130', 'Add Testimoni', 'Kontent', 'POST', 'base_url/_API/Content/AddTestimoni.php', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\",</code><br /><code>&nbsp; &nbsp; \"tanggal\":\"2023-01-17 23:11\",</code><br /><code>&nbsp; &nbsp; \"nama\":\"Dedeh Delawati\",</code><br /><code>&nbsp; &nbsp; \"email\":\"dedeh@gmail.com\",</code><br /><code>&nbsp; &nbsp; \"testimoni\":\"Pelayanan sangat memuaskan\",</code><br /><code>&nbsp; &nbsp; \"image\":\"base64\"</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"Success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"tanggal\": \"2023-01-17 23:11\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"nama\": \"Dedeh Delawati\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"email\": \"dedeh@gmail.com\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"image\": \"http://localhost:81/metro/assets/img/Testimoni/1673972052635e88a6e5adb.jpg\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"testimoni\": \"Pelayanan sangat memuaskan\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"status\": \"Pending\"</code><br /><code>&nbsp; &nbsp; }</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>'),
(27, '1673974176', 'FAQ', 'Kontent', 'POST', 'base_url/_API/Content/FAQ.php', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"api_key\":\"2efe458d1a9dd60ddcb0be88d36098\"</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>', '<p><code>{</code><br /><code>&nbsp; &nbsp; \"response\": {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"message\": \"Success\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; \"code\": 200</code><br /><code>&nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; \"metadata\": [</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; [</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"pertanyaan\": \"Apakah saya bisa mendaftar2?\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"jawaban\": \"Tentu saja bisa, silahkan anda pilih tombol daftar yang ada di sebelah kanan atas\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; },</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"pertanyaan\": \"Bagaimana cara melakukan pendaftaran?\",</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \"jawaban\": \"Silahkan pilih tombol daftar, kemudian isi form yang disediakan.\"</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; }</code><br /><code>&nbsp; &nbsp; &nbsp; &nbsp; ]</code><br /><code>&nbsp; &nbsp; ]</code><br /><code>}</code></p>\n<p><code><input id=\"ext\" type=\"hidden\" value=\"1\" /><input id=\"ext\" type=\"hidden\" value=\"1\" /></code></p>');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

DROP TABLE IF EXISTS `help`;
CREATE TABLE IF NOT EXISTS `help` (
  `id_help` int(10) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `category` text NOT NULL,
  `description` longtext NOT NULL,
  `datetime` varchar(25) NOT NULL,
  PRIMARY KEY (`id_help`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`id_help`, `title`, `category`, `description`, `datetime`) VALUES
(7, 'Tentang Data Akses', 'Kelola Akses', '<p>Fitur \"Akses\" digunakan untuk mempermudah pengguna aplikasi dalam mengelola setiap hak dan kewajiban serta tugas masing-masing pengguna yang terlibat dalam sistem bisnisnya. Secara umum, akses pengguna ini terdiri dari akses admin pengelola platform, administrator, pimpinan mitra, petugas front office, tenaga medis dan akses terbatas untuk member. Untuk memahami lebih jauh mengenai hak dan ketentuan pengguna dapat dilihat pada tabel berikut ini.</p>\n<table class=\"table table-responsive table-bordered\" style=\"border-collapse: collapse; width: 100%; height: 2023px;\" border=\"1\">\n<tbody>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>No</strong></td>\n<td style=\"width: 59.7549%; text-align: center; height: 17px;\"><strong>Fitur</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\"><strong>Adm</strong></td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\"><strong>Adms</strong></td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\"><strong>FO<br /></strong></td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\"><strong>M.Prs</strong></td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\"><strong>Pmp</strong></td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>1</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Dashboard</strong></td>\n<td style=\"width: 6.63943%; height: 17px; text-align: center;\"><strong>Ya</strong></td>\n<td style=\"width: 7.04801%; height: 17px; text-align: center;\"><strong>Ya</strong></td>\n<td style=\"width: 6.74157%; height: 17px; text-align: center;\"><strong>Ya</strong></td>\n<td style=\"width: 7.86517%; height: 17px; text-align: center;\"><strong>Ya</strong></td>\n<td style=\"width: 7.55873%; height: 17px; text-align: center;\"><strong>Ya</strong></td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">1.1 Dashboard Admin</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">Ya</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">Tidak</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">1.2 Dashboard Mitra</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">Ya</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">Ya</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">Ya</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">Ya</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>2</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Akses</strong></td>\n<td style=\"width: 6.63943%; height: 17px; text-align: center;\"><strong>Ya</strong></td>\n<td style=\"width: 7.04801%; height: 17px; text-align: center;\"><strong>Ya</strong></td>\n<td style=\"width: 6.74157%; height: 17px; text-align: center;\"><strong>Tidak</strong></td>\n<td style=\"width: 7.86517%; height: 17px; text-align: center;\"><strong>Tidak</strong></td>\n<td style=\"width: 7.55873%; height: 17px; text-align: center;\"><strong>Tidak</strong></td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">2.1 Tambah Data Akses</td>\n<td style=\"width: 6.63943%; height: 17px; text-align: center;\">Ya</td>\n<td style=\"width: 7.04801%; height: 17px; text-align: center;\">Ya</td>\n<td style=\"width: 6.74157%; height: 17px; text-align: center;\">Tidak</td>\n<td style=\"width: 7.86517%; height: 17px; text-align: center;\">Tidak</td>\n<td style=\"width: 7.55873%; height: 17px; text-align: center;\">Tidak</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">2.2 Edit Data Akses</td>\n<td style=\"width: 6.63943%; height: 17px; text-align: center;\">Ya</td>\n<td style=\"width: 7.04801%; height: 17px; text-align: center;\">Ya</td>\n<td style=\"width: 6.74157%; height: 17px; text-align: center;\">Tidak</td>\n<td style=\"width: 7.86517%; height: 17px; text-align: center;\">Tidak</td>\n<td style=\"width: 7.55873%; height: 17px; text-align: center;\">Tidak</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">2.3 Delete Data Akses</td>\n<td style=\"width: 6.63943%; height: 17px; text-align: center;\">Ya</td>\n<td style=\"width: 7.04801%; height: 17px; text-align: center;\">Ya</td>\n<td style=\"width: 6.74157%; height: 17px; text-align: center;\">Tidak</td>\n<td style=\"width: 7.86517%; height: 17px; text-align: center;\">Tidak</td>\n<td style=\"width: 7.55873%; height: 17px; text-align: center;\">Tidak</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">2.4 Atur Ijin Akses</td>\n<td style=\"width: 6.63943%; height: 17px; text-align: center;\">Ya</td>\n<td style=\"width: 7.04801%; height: 17px; text-align: center;\">Ya</td>\n<td style=\"width: 6.74157%; height: 17px; text-align: center;\">Tidak</td>\n<td style=\"width: 7.86517%; height: 17px; text-align: center;\">Tidak</td>\n<td style=\"width: 7.55873%; height: 17px; text-align: center;\">Tidak</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>3</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Mitra</strong></td>\n<td style=\"width: 6.63943%; height: 17px; text-align: center;\"><strong>Ya</strong></td>\n<td style=\"width: 7.04801%; height: 17px; text-align: center;\"><strong>Tidak</strong></td>\n<td style=\"width: 6.74157%; height: 17px; text-align: center;\"><strong>Tidak</strong></td>\n<td style=\"width: 7.86517%; height: 17px; text-align: center;\"><strong>Tidak</strong></td>\n<td style=\"width: 7.55873%; height: 17px; text-align: center;\"><strong>Tidak</strong></td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">3.1 Tambah Data Mitra</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">Ya</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">Tidak</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">3.2 Edit Data Mitra</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">Ya</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">Tidak</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">3.3 Delete Data Mitra</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">Ya</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">Tidak</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">3.4 Kelola Akses Mitra</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">Ya</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">Tidak</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">Tidak</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>4</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Master Pasien</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">4.1 Tambah Pasien Baru</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">4.2 Edit Data Pasien<strong><br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">4.3 Delete Data Pasien</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 59.7549%; height: 17px;\">4.4 Menambahkan Kunjungan Dari Detail Pasien</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>5</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Kunjungan/Registrasi<br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">5.1 Tambah Data Kunjungan</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">5.2 Edit Data Kunjungan</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">5.3 Delete Data Kunjungan</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">5.4 Tambah/Edit Screening</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">5.5 Buat Draft Rekam Medis</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">5.6 Delete Draft Rekam Medis</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">5.7 Edit Draft Rekam Medis</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">5.8 Cetak Draft Rekam Medis</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>6<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Setting Form<br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">6.1 Buat Tamplate Form<strong><br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">6.2 Edit Tamplate Form<strong><br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">6.3 Hapus Tamplate Form<strong><br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;7</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Pengaturan Umum</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>8<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Pengaturan API Key</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">8.1 Tambah/Buat Api Key</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">8.2 Edit API key</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">8.3 Delete API Key</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>9<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Pengaturan Whatsapp Gateway</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>10<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Pengaturan Payment Gateway<br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>11<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Pengaturan Email Gateway<br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>12<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>&nbsp;Referensi Data Wilayah<br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">12.1 Tambah Data Wilayah<strong><br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">12.2 Edit Data Wilayah</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">12.3 Delete Data Wilayah</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>13<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Referensi Data Tindakan Medis</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">13.1 Tambah Data Tindakan Medis<strong><br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">13.2 Edit Data Tindakan Medis</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">13.3 Delete Data Tindakan Medis</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>14<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Referensi Data Tenaga Kesehatan</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">14.1 Tambah Tenaga Kesehatan<strong><br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">14.2 Edit Tenaga Kesehatan</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">14.3 Delete Tenaga Kesehatan</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>15<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Referensi Jadwal Praktek</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">15.1 Tambah Jadwal Praktek<strong><br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">15.2 Edit Jadwal Praktek<strong><br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">15.3 Delete Jadwal Praktek</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>16<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Supplier</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">16.1 Tambah Supplier<strong><br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">16.2 Edit Supplier</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">16.3 Delete Supplier</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>17<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Master Barang</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">17.1 Tambah barang</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">17.2 Edit Barang</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">17.3 Delete Barang</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>18<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Batch &amp; Expired</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">18.1 Tambah batch &amp; Expired</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">18.2 Edit batch &amp; Expired</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">18.3 Delete batch &amp; Expired</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;19</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Transaksi</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">19.1 Tambah Transaksi</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">19.2 Edit Transaksi</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">19.3 DeleteTransaksi</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">19.4 Tambah Rincian Transaksi</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">19.5 Edit Rincian Transaksi</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">19.6 Delete Rincian Transaksi</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">19.7 Tambah Jurnal Manual</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">19.8 Edit Jurnal Manual</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">19.9 Delete Jurnal Manual</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">19.10 Tambah Data Pembayaran</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;20</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Pembayaran</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">20.1 Tambah Data Pembayaran</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">20.2 Hapus Pembayaran</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>21<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Akun Perkiraan</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">21.1 Tambah Akun Perkiraan</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">21.2 Edit Akun perkiraan</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">21.3 Hapus Akun Perkiraan</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>22<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Jurnal Transaksi</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">22.1 Tambah Jurnal Transaksi</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">22.2 Edit Jurnal Transaksi</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">23.3 Hapus Jurnal Transaksi</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;23</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Komisi</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">23.1 Tambah Data Pencairan</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">23.2 Edit Data Pencairan</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">23.3 Hapus Data Pencairan</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>24<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Laporan</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">24.1 Buku Besar</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">24.2 Neraca Saldo</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">24.3 Laba Rugi</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">24.4 Rekapitulasi Transaksi</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">24.5 Bagi Hasil</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>25<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Cron Job</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>26<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Konten web<br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">26.1 Edit Setting Konten Umum<strong><br /></strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">26.2 Tambah Data Posting</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">26.3 Edit Data Posting</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">26.4 Hapus Data Posting</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">26.5 Hapus Data Posting</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">26.6 Tambah URL Dinamis</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">26.7 Edit URL Dinamis</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">26.8 HapusURL Dinamis</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>27<br /></strong></td>\n<td style=\"width: 59.7549%; height: 17px;\"><strong>Whatsapp Gateway</strong></td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">27.1 Halaman Akun Whatsapp</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">27.2 Tambah Akun Whatsapp</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">27.3 Hapus Akun Whatsapp</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">27.4 Halaman Chatbox</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">27.5 Kirim Chat</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">27.6 Hapus Chat</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">27.7 Halaman Tamplate Chat</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr style=\"height: 17px;\">\n<td style=\"width: 4.39224%; text-align: center; height: 17px;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%; height: 17px;\">27.8 Tambah/Edit Tamplate Chat</td>\n<td style=\"width: 6.63943%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center; height: 17px;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center; height: 17px;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">27.9 Halaman Rencana Kirim</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">27.10 Tambah Rencana Kirim Pesan</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">27.11 Edit Rencana Kirim Pesan</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">27.12 Hapus Rencana Kirim Pesan</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>28<br /></strong></td>\n<td style=\"width: 59.7549%;\"><strong>Aktivitas</strong></td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">28.1 Aktivitas Umum</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">28.2 Aktivitas Email</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">28.3 Aktivitas APIs</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>29<br /></strong></td>\n<td style=\"width: 59.7549%;\"><strong>Bantuan</strong></td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">29.1 Tambah Bantuan</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">29.2 Edit Bantuan</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">29.3 Hapus Bantuan</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">29.4 Pengaturan Akses Bantuan</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>30<br /></strong></td>\n<td style=\"width: 59.7549%;\"><strong>Dokumentasi APIs</strong></td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">30.1 Tambah Dokumentasi APIs</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">30.2 Edit Dokumentasi APIs</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n<tr>\n<td style=\"width: 4.39224%; text-align: center;\"><strong>&nbsp;</strong></td>\n<td style=\"width: 59.7549%;\">30.3 Delete Dokumentasi APIs</td>\n<td style=\"width: 6.63943%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.04801%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 6.74157%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.86517%; text-align: center;\">&nbsp;</td>\n<td style=\"width: 7.55873%; text-align: center;\">&nbsp;</td>\n</tr>\n</tbody>\n</table>', '1667043630');
INSERT INTO `help` (`id_help`, `title`, `category`, `description`, `datetime`) VALUES
(10, 'Pendaftaran Pasien', 'Rekam Medis', '<p>Dalam melakukan pengelolaan data pasien oleh petugas, salah satu proses penting yang harus dilakukan adalah proses pendaftaran pasien. Pada pendaftaran pasien ini dapat dilakukan dengan 2 (dua) cara yang masing-masing memiliki tujuan yang berbeda. Secara umum pendaftaran dibagi menjadi pendaftaran untuk pasien baru dan pendaftaran untuk pasien lama. Berikut uraian lengkapnya:</p>\n<p><strong>A. Pendaftaran Pasien Baru.</strong></p>\n<p>Pada proses ini diasumsikan bahwa pasien merupakan pasien baru karena data informasi identitas pasien tersebut tidak ditemukan melalui fitur pencarian yang disediakan. Pada tahap ini petugas dapat meminta kartu identitas untuk mempermudah proses pendaftaran. Berikut tahapannya:</p>\n<p><strong>A.1. Pendaftaran Manual Melalui Master pasien</strong></p>\n<ul>\n<li>Pilih menu <em>rekam medis</em> kemudian pilih <em>master pasien</em>.</li>\n<li>Pada bagian awal halaman pilih tombol pasien baru.</li>\n<li>Isi semua form dengan lengkap dan benar sesuai informasi pada kartu identitas kemudian klik pada tombo <em>simpan</em>.</li>\n<li>Apabila proses berhasil maka anda akan diarahkan pada detail pasien.</li>\n<li>Scroll pada bagian bawah hingga menemukan tab <em>riwayat kunjungan </em>kemudian<em> </em>Pilih <em>tombol daftar .</em></li>\n<li>Beberapa form akan terisi sesuai informasi yang sudah diinput pada proses sebelumnya, namun petugas dapat memeriksa ulang kembali informasi identitas tersebut dan memastikannya sudah sesuai.</li>\n<li>Form yang harus anda isi diantaranya adalah dokter/juru khitan, Tindakan Medis/Metode Khitan, tanggal Rencana Khitan, pilih jadwal, kategori kunjungan, metode pembayaran dan status pembayaran. Apabila ada catatan khusus anda bisa menulisnya pada kolom catatan.</li>\n<li>klik pada tombo <em>simpan</em>.</li>\n<li>Apabila proses berhasil maka anda akan diarahkan pada halaman detail kunjungan.</li>\n<li>Hingga tahap ini anda sudah berhasil melakukan pendaftaran pasien baru dengan 2 (dua) tahap manual.</li>\n</ul>\n<p><strong>A.2. Pendaftaran Instant Melalui Halaman Kunjungan</strong></p>\n<p>Sebagaimana langkah-langkah pendaftaran pada model sebelumnya, petugas juga dapat melakukan pendaftaran secara instant melalui halaman kunjungan. Berikut tahapannya:</p>\n<ul>\n<li>Pilih Menu <em>Rekam medis, </em>kemudian pilih sub menu <em>kunjungan.</em></li>\n<li>Pada bagian atas/awal halaman tersebut pilih tombol <em>Daftar Baru.</em></li>\n<li>Sebagaimana model pendaftaran sebelumnya, kali ini petugas dapat mengisi identitas pasien sesuai form yang disediakan.</li>\n<li>Isi semua form data kunjungan dengan benar sesuai identitas pasien, jangan lupa mengosongkan kolom <em>NO.MR Pasien.</em></li>\n<li>Pilih tombol<em> simpan, </em>apabila berhasil maka anda akan diarahkan pada halaman <em>detail kunjungan.</em></li>\n<li>Anda dapat memeriksa data pasien tadi apakah sudah memiliki ID Rekam medis atau belum dengan masuk ke halaman master pasien.</li>\n<li>Dengan tahapan ini petugas dapat melakukan pendaftaran lebih cepat.</li>\n</ul>\n<p><strong>B. Pendaftaran Pasien Lama.</strong></p>\n<p>Pendaftaran pasien lama mungkin terjadi apabila pasien melakukan kunjungan ke dua kali atau lebih dengan tujuan pengobatan atau kontrol berkala. Untuk mencegah data pasien terdaftar lebih dari satu, maka petugas bisa mendaftarkan kunjungan pasien tersebut dengan data <em>primary </em>yang sudah ada sebelumnya. Adapun tahapan pendaftaran pasien lama tersebut hampir sama dengan pendaftaran pada pasien baru melalui master pasien. Lebih jelas berikut langkah-langkahnya.</p>\n<ul>\n<li>Pilih menu <em>rekam medis</em> kemudian pilih <em>master pasien</em>.</li>\n<li>lakukan pencarian pasien melalui nama atau nomor identitas.</li>\n<li>Apabila sudah ditemukan pilih tombol detail pada data yang bersangkutan.</li>\n<li>Anda akan diarahkan pada detail pasien.</li>\n<li>Scroll pada bagian bawah hingga menemukan tab <em>riwayat kunjungan </em>kemudian<em> </em>Pilih <em>tombol daftar .</em></li>\n<li>Beberapa form akan terisi sesuai informasi yang sudah diinput pada proses sebelumnya, namun petugas dapat memeriksa ulang kembali informasi identitas tersebut dan memastikannya sudah sesuai.</li>\n<li>Form yang harus anda isi diantaranya adalah dokter/juru khitan, Tindakan Medis/Metode Khitan, tanggal Rencana Khitan, pilih jadwal, kategori kunjungan, metode pembayaran dan status pembayaran. Apabila ada catatan khusus anda bisa menulisnya pada kolom catatan.</li>\n<li>klik pada tombo <em>simpan</em>.</li>\n<li>Apabila proses berhasil maka anda akan diarahkan pada halaman detail kunjungan.</li>\n<li>Hingga tahap ini anda sudah berhasil melakukan pendaftaran untuk pasien lama.</li>\n<li>Data kunjungan tersebut akan tampil pada tabel data kunjungan di menu kunjungan.</li>\n</ul>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>\n<p>&nbsp;</p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>\n<p><input id=\"ext\" type=\"hidden\" value=\"1\" /></p>', '1664056287');

-- --------------------------------------------------------

--
-- Table structure for table `help_access`
--

DROP TABLE IF EXISTS `help_access`;
CREATE TABLE IF NOT EXISTS `help_access` (
  `id_help_access` int(10) NOT NULL AUTO_INCREMENT,
  `id_help` int(10) NOT NULL,
  `akses` varchar(20) NOT NULL,
  PRIMARY KEY (`id_help_access`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `help_access`
--

INSERT INTO `help_access` (`id_help_access`, `id_help`, `akses`) VALUES
(1, 1, 'Member'),
(2, 1, 'Partner'),
(4, 4, 'Admin'),
(5, 4, 'Member'),
(9, 5, 'Admin'),
(10, 5, 'Medical Personnel'),
(11, 5, 'Member'),
(12, 5, 'Partner'),
(15, 9, 'Admin'),
(16, 8, 'Admin'),
(18, 11, 'Admin'),
(19, 11, 'Administrator'),
(20, 11, 'Medical Personnel');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

DROP TABLE IF EXISTS `jurnal`;
CREATE TABLE IF NOT EXISTS `jurnal` (
  `id_jurnal` int(20) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(20) DEFAULT NULL,
  `id_simpanan` int(20) DEFAULT NULL,
  `id_pinjaman` int(15) DEFAULT NULL,
  `id_pinjaman_angsuran` int(15) DEFAULT NULL,
  `id_shu_session` int(15) DEFAULT NULL,
  `id_perkiraan` int(20) DEFAULT NULL,
  `tanggal` varchar(25) DEFAULT NULL,
  `kode_perkiraan` varchar(20) DEFAULT NULL,
  `nama_perkiraan` text,
  `d_k` varchar(10) DEFAULT NULL,
  `nilai` int(15) DEFAULT NULL,
  PRIMARY KEY (`id_jurnal`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_transaksi`, `id_simpanan`, `id_pinjaman`, `id_pinjaman_angsuran`, `id_shu_session`, `id_perkiraan`, `tanggal`, `kode_perkiraan`, `nama_perkiraan`, `d_k`, `nilai`) VALUES
(14, 0, 0, 2, 2, NULL, 136, '2023-02-08 14:11:59', '1.1.3', 'Piutang usaha', 'Kredit', 100000),
(15, 0, 0, 2, 2, NULL, 155, '2023-02-08 14:11:59', '1.1.1.1.1', 'Kas Brangkas', 'Debet', 100000),
(28, 8, NULL, NULL, NULL, NULL, 135, '2023-02-12', '1.1.1.3', 'kas Berangkas', 'Kredit', 1000000),
(29, 8, NULL, NULL, NULL, NULL, 125, '2023-02-12', '1.1.2', 'Persediaan Obat', 'Debet', 1000000),
(30, 0, 6, 0, 0, 0, 155, '2023-02-13', '1.1.1.1.1', 'Kas Brangkas', 'Debet', 100000),
(31, 0, 6, 0, 0, 0, 136, '2023-02-13', '1.1.3', 'Piutang usaha', 'Kredit', 150000),
(32, 9, NULL, NULL, NULL, NULL, 125, '2023-02-13 20:59', '4.5', 'Pendapatan Lainnya', 'Kredit', 2640),
(33, 9, NULL, NULL, NULL, NULL, 155, '2023-02-13 20:59', '1.1.1.3', 'kas Berangkas', 'Debet', 2640),
(34, 10, NULL, NULL, NULL, NULL, 125, '2023-02-13 21:00', '4.5', 'Pendapatan Lainnya', 'Kredit', 2640),
(35, 10, NULL, NULL, NULL, NULL, 155, '2023-02-13 21:00', '1.1.1.3', 'kas Berangkas', 'Debet', 2640),
(36, 11, NULL, NULL, NULL, NULL, 125, '2023-02-13 21:05', '4.5', 'Pendapatan Lainnya', 'Kredit', 5995),
(37, 11, NULL, NULL, NULL, NULL, 155, '2023-02-13 21:05', '1.1.1.3', 'kas Berangkas', 'Debet', 5995),
(38, 12, NULL, NULL, NULL, NULL, 125, '2023-02-13 21:06', '4.5', 'Pendapatan Lainnya', 'Kredit', 13200),
(39, 12, NULL, NULL, NULL, NULL, 155, '2023-02-13 21:06', '1.1.1.3', 'kas Berangkas', 'Debet', 13200),
(40, 13, NULL, NULL, NULL, NULL, 125, '2023-02-14 14:31', '4.5', 'Pendapatan Lainnya', 'Kredit', 2860),
(41, 13, NULL, NULL, NULL, NULL, 155, '2023-02-14 14:31', '1.1.1.3', 'kas Berangkas', 'Debet', 2860),
(46, NULL, 12, NULL, NULL, NULL, 155, '2022-05-01', '1.1.1.1.1', 'Kas Brangkas', 'Debet', 100000),
(47, NULL, 12, NULL, NULL, NULL, 136, '2022-05-01', '1.1.3', 'Piutang usaha', 'Kredit', 150000),
(50, NULL, 11, NULL, NULL, NULL, 155, '2022-04-01', '1.1.1.1.1', 'Kas Brangkas', 'Debet', 100000),
(51, NULL, 11, NULL, NULL, NULL, 136, '2022-04-01', '1.1.3', 'Piutang usaha', 'Kredit', 100000),
(52, 0, 0, 3, 0, NULL, 135, '2023-02-15', '1.1.1.3', 'kas Berangkas ', 'Kredit', 1000000),
(53, 0, 0, 3, 0, NULL, 136, '2023-02-15', '1.1.3', 'Piutang usaha', 'Debet', 1000000),
(54, 14, NULL, NULL, NULL, NULL, 125, '2022-01-01 14:16', '4.5', 'Pendapatan Lainnya', 'Kredit', 16665),
(55, 14, NULL, NULL, NULL, NULL, 155, '2022-01-01 14:16', '1.1.1.3', 'Kas Berangkas', 'Debet', 16665),
(56, 15, NULL, NULL, NULL, NULL, 125, '2023-02-23 14:17', '4.5', 'Pendapatan Lainnya', 'Kredit', 7920),
(57, 15, NULL, NULL, NULL, NULL, 155, '2023-02-23 14:17', '1.1.1.3', 'Kas Berangkas', 'Debet', 7920),
(58, 16, NULL, NULL, NULL, NULL, 125, '2023-02-23 14:18', '4.5', 'Pendapatan Lainnya', 'Kredit', 52250),
(59, 16, NULL, NULL, NULL, NULL, 155, '2023-02-23 14:18', '1.1.1.3', 'Kas Berangkas', 'Debet', 52250),
(60, 17, NULL, NULL, NULL, NULL, 125, '2022-02-02 14:19', '4.5', 'Pendapatan Lainnya', 'Kredit', 17072),
(61, 17, NULL, NULL, NULL, NULL, 155, '2022-02-02 14:19', '1.1.1.3', 'Kas Berangkas', 'Debet', 17072),
(62, 18, NULL, NULL, NULL, NULL, 125, '2023-02-23 14:20', '4.5', 'Pendapatan Lainnya', 'Kredit', 167200),
(63, 18, NULL, NULL, NULL, NULL, 155, '2023-02-23 14:20', '1.1.1.3', 'Kas Berangkas', 'Debet', 167200),
(64, 0, 13, 0, 0, NULL, 136, '2022-01-01', '1.1.3', 'Piutang usaha', 'Kredit', 100000),
(65, 0, 13, 0, 0, NULL, 135, '2022-01-01', '1.1.1.3', 'Kas Berangkas', 'Debet', 100000),
(66, 0, 14, 0, 0, NULL, 136, '2022-01-25', '1.1.3', 'Piutang usaha', 'Kredit', 50000),
(67, 0, 14, 0, 0, NULL, 135, '2022-01-25', '1.1.1.3', 'Kas Berangkas', 'Debet', 50000),
(68, 0, 15, 0, 0, NULL, 136, '2022-02-01', '1.1.3', 'Piutang usaha', 'Kredit', 50000),
(69, 0, 15, 0, 0, NULL, 135, '2022-02-01', '1.1.1.3', 'Kas Berangkas', 'Debet', 50000),
(70, 19, NULL, NULL, NULL, NULL, 125, '2023-02-23 14:45', '4.5', 'Pendapatan Lainnya', 'Kredit', 7406666),
(71, 19, NULL, NULL, NULL, NULL, 155, '2023-02-23 14:45', '1.1.1.3', 'Kas Berangkas', 'Debet', 7406666),
(72, 0, 16, 0, 0, NULL, 136, '2022-05-01', '1.1.3', 'Piutang usaha', 'Kredit', 50000),
(73, 0, 16, 0, 0, NULL, 135, '2022-05-01', '1.1.1.3', 'Kas Berangkas', 'Debet', 50000),
(74, 0, 17, 0, 0, NULL, 136, '2022-06-01', '1.1.3', 'Piutang usaha', 'Kredit', 50000),
(75, 0, 17, 0, 0, NULL, 135, '2022-06-01', '1.1.1.3', 'Kas Berangkas', 'Debet', 50000),
(76, 0, 18, 0, 0, NULL, 136, '2022-06-01', '1.1.3', 'Piutang usaha', 'Kredit', 50000),
(77, 0, 18, 0, 0, NULL, 135, '2022-06-01', '1.1.1.3', 'Kas Berangkas', 'Debet', 50000),
(78, 0, 0, 4, 0, NULL, 135, '2023-02-23', '1.1.1.3', 'Kas Berangkas', 'Kredit', 1000000),
(79, 0, 0, 4, 0, NULL, 136, '2023-02-23', '1.1.3', 'Piutang usaha', 'Debet', 1000000),
(80, 0, 0, 4, 4, NULL, 136, '2023-02-23 14:48:15', '1.1.3', 'Piutang usaha', 'Kredit', 100000),
(81, 0, 0, 4, 4, NULL, 155, '2023-02-23 14:48:15', '1.1.1.1.1', 'Kas Brangkas', 'Debet', 100000),
(82, 0, 0, 4, 5, NULL, 136, '2023-02-23 14:48:23', '1.1.3', 'Piutang usaha', 'Kredit', 100000),
(83, 0, 0, 4, 5, NULL, 155, '2023-02-23 14:48:23', '1.1.1.1.1', 'Kas Brangkas', 'Debet', 100000),
(84, 0, 0, 4, 6, NULL, 136, '2023-02-23 14:48:33', '1.1.3', 'Piutang usaha', 'Kredit', 100000),
(85, 0, 0, 4, 6, NULL, 155, '2023-02-23 14:48:33', '1.1.1.1.1', 'Kas Brangkas', 'Debet', 100000),
(86, 0, 0, 4, 7, NULL, 136, '2023-02-23 14:48:45', '1.1.3', 'Piutang usaha', 'Kredit', 100000),
(87, 0, 0, 4, 7, NULL, 155, '2023-02-23 14:48:45', '1.1.1.1.1', 'Kas Brangkas', 'Debet', 100000),
(88, 0, 0, 4, 8, NULL, 136, '2023-02-23 14:49:03', '1.1.3', 'Piutang usaha', 'Kredit', 100000),
(89, 0, 0, 4, 8, NULL, 155, '2023-02-23 14:49:03', '1.1.1.1.1', 'Kas Brangkas', 'Debet', 100000),
(90, 0, 0, 4, 9, NULL, 136, '2023-02-23 14:49:13', '1.1.3', 'Piutang usaha', 'Kredit', 100000),
(91, 0, 0, 4, 9, NULL, 155, '2023-02-23 14:49:13', '1.1.1.1.1', 'Kas Brangkas', 'Debet', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses` int(10) NOT NULL,
  `datetime_log` varchar(25) NOT NULL,
  `kategori_log` varchar(20) NOT NULL,
  `deskripsi_log` text NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=576 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_akses`, `datetime_log`, `kategori_log`, `deskripsi_log`) VALUES
(1, 1, '2023-01-21 04:32:54', 'Entitas Akses', 'Membuat Entitas Akses Baru'),
(2, 1, '2023-01-21 04:34:27', 'Entitas Akses', 'Membuat Entitas Akses Baru'),
(3, 1, '2023-01-21 04:35:54', 'Entitas Akses', 'Membuat Entitas Akses Baru'),
(4, 1, '2023-01-21 04:37:17', 'Entitas Akses', 'Membuat Entitas Akses Baru'),
(5, 1, '2023-01-21 04:37:40', 'Entitas Akses', 'Membuat Entitas Akses Baru'),
(6, 1, '2023-01-21 19:03:55', 'Angggota', 'Tambah Anggota baru'),
(7, 1, '2023-01-21 19:08:22', 'Angggota', 'Tambah Anggota baru'),
(8, 1, '2023-01-21 19:56:36', 'Angggota', 'Hapus Data Anggota'),
(9, 1, '2023-01-21 20:12:11', 'Angggota', 'Tambah Anggota baru'),
(10, 1, '2023-01-21 21:10:21', 'Angggota', 'Edit Anggota Berhasil'),
(11, 1, '2023-01-21 21:10:22', 'Angggota', 'Edit Anggota Berhasil'),
(12, 1, '2023-01-21 21:10:53', 'Angggota', 'Edit Anggota Berhasil'),
(13, 1, '2023-01-21 21:12:23', 'Angggota', 'Edit Anggota Berhasil'),
(14, 1, '2023-01-21 21:12:30', 'Angggota', 'Edit Anggota Berhasil'),
(15, 1, '2023-01-21 21:46:17', 'Angggota', 'Edit Anggota Berhasil'),
(16, 1, '2023-01-23 01:33:54', 'Tabungan', 'Tambah Data Simpanan Wajib'),
(17, 1, '2023-01-23 01:53:14', 'Tabungan', 'Tambah Data Simpanan Wajib'),
(18, 1, '2023-01-23 02:18:59', 'Supplier', 'Input Supplier Baru'),
(19, 1, '2023-01-23 02:55:34', 'Supplier', 'Edit Supplier CV.Serba Ada'),
(20, 1, '2023-01-23 02:55:34', 'Supplier', 'Edit Supplier CV.Serba Ada'),
(21, 1, '2023-01-23 02:55:41', 'Supplier', 'Edit Supplier CV.Serba Ada'),
(22, 1, '2023-01-23 02:55:41', 'Supplier', 'Edit Supplier CV.Serba Ada'),
(23, 1, '2023-01-23 02:55:44', 'Supplier', 'Edit Supplier PTT.Indah Permai2'),
(24, 1, '2023-01-23 02:55:44', 'Supplier', 'Edit Supplier PTT.Indah Permai2'),
(25, 1, '2023-01-23 02:55:44', 'Supplier', 'Edit Supplier PTT.Indah Permai2'),
(26, 1, '2023-01-23 02:56:34', 'Supplier', 'Hapus Supplier 19'),
(27, 1, '2023-01-23 03:53:05', 'Barang', 'Input Barang Baru'),
(28, 1, '2023-01-23 18:12:32', 'Tabungan', 'Edit Tabungan Berhasil'),
(29, 1, '2023-01-23 18:12:54', 'Tabungan', 'Edit Tabungan Berhasil'),
(30, 1, '2023-01-23 21:31:19', 'Pinjaman', 'Tambah Pinjaman Berhasil    '),
(31, 1, '2023-01-24 11:21:58', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(32, 1, '2023-01-24 16:42:38', 'Pinjaman', 'Hapus Data Pinjaman'),
(33, 1, '2023-01-24 16:44:42', 'Pinjaman', 'Tambah Pinjaman Berhasil    '),
(34, 1, '2023-01-25 15:54:09', 'Auto Jurnal', 'Tambah Auto Jurnal'),
(35, 1, '2023-01-25 15:54:09', 'Angggota', 'Tambah Anggota baru'),
(36, 1, '2023-01-25 15:55:14', 'Auto Jurnal', 'Tambah Auto Jurnal'),
(37, 1, '2023-01-25 17:43:32', 'Auto Jurnal', 'Update Auto Jurnal'),
(38, 1, '2023-01-25 17:44:21', 'Auto Jurnal', 'Update Auto Jurnal'),
(39, 1, '2023-01-25 17:44:35', 'Auto Jurnal', 'Update Auto Jurnal'),
(40, 1, '2023-01-25 17:44:54', 'Auto Jurnal', 'Update Auto Jurnal'),
(41, 1, '2023-01-25 17:45:41', 'Auto Jurnal', 'Update Auto Jurnal'),
(42, 1, '2023-01-25 17:46:55', 'Auto Jurnal', 'Update Auto Jurnal'),
(43, 1, '2023-01-25 17:47:05', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(44, 1, '2023-01-25 17:48:01', 'Auto Jurnal', 'Update Auto Jurnal'),
(45, 1, '2023-01-25 17:48:20', 'Auto Jurnal', 'Update Auto Jurnal'),
(46, 1, '2023-01-25 17:48:29', 'Auto Jurnal', 'Update Auto Jurnal'),
(47, 1, '2023-01-25 17:48:35', 'Auto Jurnal', 'Update Auto Jurnal'),
(48, 1, '2023-01-25 17:48:42', 'Auto Jurnal', 'Update Auto Jurnal'),
(49, 1, '2023-01-25 17:48:49', 'Auto Jurnal', 'Update Auto Jurnal'),
(50, 1, '2023-01-25 17:49:13', 'Auto Jurnal', 'Update Auto Jurnal'),
(51, 1, '2023-01-26 10:39:09', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(52, 1, '2023-01-26 10:41:28', 'Angggota', 'Hapus Data Anggota'),
(53, 1, '2023-01-26 10:52:37', 'Input Akses Baru', 'Input Akses Baru Berhasil'),
(54, 1, '2023-01-26 11:11:28', 'Input Akses Baru', 'Input Akses Baru Berhasil'),
(55, 1, '2023-01-26 11:39:08', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(56, 1, '2023-01-26 11:50:19', 'Akses', 'Ubah Password Berhasil'),
(57, 1, '2023-01-26 11:52:15', 'Akses', 'Ubah Password Berhasil'),
(58, 1, '2023-01-26 11:52:35', 'Akses', 'Ubah Password Berhasil'),
(59, 1, '2023-01-26 11:52:35', 'Akses', 'Ubah Password Berhasil'),
(60, 1, '2023-01-26 11:53:36', 'Akses', 'Ubah Password Berhasil'),
(61, 1, '2023-01-26 12:02:44', 'Akses', 'Edit Akses Berhasil'),
(62, 1, '2023-01-26 12:02:48', 'Akses', 'Edit Akses Berhasil'),
(63, 1, '2023-01-26 12:02:48', 'Akses', 'Edit Akses Berhasil'),
(64, 1, '2023-01-26 12:02:57', 'Akses', 'Edit Akses Berhasil'),
(65, 1, '2023-01-26 12:02:57', 'Akses', 'Edit Akses Berhasil'),
(66, 1, '2023-01-26 12:02:57', 'Akses', 'Edit Akses Berhasil'),
(67, 1, '2023-01-26 12:03:00', 'Akses', 'Edit Akses Berhasil'),
(68, 1, '2023-01-26 12:03:00', 'Akses', 'Edit Akses Berhasil'),
(69, 1, '2023-01-26 12:03:00', 'Akses', 'Edit Akses Berhasil'),
(70, 1, '2023-01-26 12:03:00', 'Akses', 'Edit Akses Berhasil'),
(71, 1, '2023-01-26 12:03:08', 'Akses', 'Edit Akses Berhasil'),
(72, 1, '2023-01-26 12:03:08', 'Akses', 'Edit Akses Berhasil'),
(73, 1, '2023-01-26 12:03:08', 'Akses', 'Edit Akses Berhasil'),
(74, 1, '2023-01-26 12:03:08', 'Akses', 'Edit Akses Berhasil'),
(75, 1, '2023-01-26 12:03:08', 'Akses', 'Edit Akses Berhasil'),
(76, 1, '2023-01-26 12:03:24', 'Akses', 'Edit Akses Berhasil'),
(77, 1, '2023-01-26 12:03:24', 'Akses', 'Edit Akses Berhasil'),
(78, 1, '2023-01-26 12:03:24', 'Akses', 'Edit Akses Berhasil'),
(79, 1, '2023-01-26 12:03:24', 'Akses', 'Edit Akses Berhasil'),
(80, 1, '2023-01-26 12:03:24', 'Akses', 'Edit Akses Berhasil'),
(81, 1, '2023-01-26 12:03:46', 'Akses', 'Edit Akses Berhasil'),
(82, 1, '2023-01-26 12:03:46', 'Akses', 'Edit Akses Berhasil'),
(83, 1, '2023-01-26 12:03:46', 'Akses', 'Edit Akses Berhasil'),
(84, 1, '2023-01-26 12:03:46', 'Akses', 'Edit Akses Berhasil'),
(85, 1, '2023-01-26 12:03:46', 'Akses', 'Edit Akses Berhasil'),
(86, 1, '2023-01-26 12:03:46', 'Akses', 'Edit Akses Berhasil'),
(87, 1, '2023-01-26 12:11:10', 'Akses', 'Hapus Akses Berhasil'),
(88, 1, '2023-01-26 12:13:56', 'Akses', 'Hapus Akses Berhasil'),
(89, 1, '2023-01-26 12:13:56', 'Akses', 'Hapus Akses Berhasil'),
(90, 1, '2023-01-26 14:00:11', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(91, 1, '2023-01-26 14:53:12', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(92, 1, '2023-01-26 18:16:33', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(93, 1, '2023-01-26 19:36:02', 'Supplier', 'Edit Supplier JVC Kuningan'),
(94, 1, '2023-01-26 20:53:07', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(95, 1, '2023-01-27 18:14:32', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(96, 1, '2023-01-27 18:43:17', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(97, 1, '2023-01-27 18:43:38', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(98, 1, '2023-01-27 20:17:24', 'Barang', 'Tambah multi satuan untuk Lifebuoy Hairfall Trmt 9ml'),
(99, 1, '2023-01-27 20:17:29', 'Barang', 'Hapus satuan  untuk '),
(100, 1, '2023-01-27 20:19:11', 'Barang', 'Tambah multi satuan untuk Lifebuoy Hairfall Trmt 9ml'),
(101, 1, '2023-01-27 20:26:35', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(102, 1, '2023-01-27 20:37:32', 'Barang', 'Edit multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(103, 1, '2023-01-27 20:38:23', 'Barang', 'Tambah multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(104, 1, '2023-01-27 20:38:26', 'Barang', 'Hapus multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(105, 1, '2023-01-27 21:38:30', 'Barang', 'Tambah kategori harga untuk Harga Eceran'),
(106, 1, '2023-01-27 21:39:31', 'Barang', 'Tambah kategori harga untuk Harga Grosir'),
(107, 1, '2023-01-27 21:51:28', 'Barang', 'Hapus kategori harga untuk Harga Grosir'),
(108, 1, '2023-01-27 21:51:32', 'Barang', 'Hapus kategori harga untuk Harga Eceran'),
(109, 1, '2023-01-27 21:51:36', 'Barang', 'Tambah kategori harga untuk Eceran'),
(110, 1, '2023-01-27 21:51:40', 'Barang', 'Tambah kategori harga untuk Grosir'),
(111, 1, '2023-01-27 22:11:23', 'Barang', 'Hapus kategori harga untuk Grosir'),
(112, 1, '2023-01-27 23:00:27', 'Barang', 'Input Barang Baru'),
(113, 1, '2023-01-27 23:01:55', 'Barang', 'Input Barang Baru'),
(114, 1, '2023-01-28 16:45:34', 'Barang', 'Edit multi harga untuk Pulsa Tree 5000'),
(115, 1, '2023-01-28 17:30:34', 'Barang', 'Tambah multi satuan untuk Pulsa Telkomsel 5000'),
(116, 1, '2023-01-28 18:58:59', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(117, 1, '2023-01-28 22:30:04', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(118, 1, '2023-01-29 18:11:47', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(119, 1, '2023-01-29 18:12:26', 'Angggota', 'Tambah Anggota baru'),
(120, 1, '2023-01-29 18:12:55', 'Tabungan', 'Tambah Data Simpanan Pokok'),
(121, 1, '2023-01-29 18:13:42', 'Pinjaman', 'Tambah Pinjaman Berhasil    '),
(122, 1, '2023-01-30 21:06:17', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(123, 1, '2023-01-30 21:08:50', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(124, 1, '2023-01-30 22:39:42', 'Barang', 'Hapus multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(125, 1, '2023-01-30 22:40:19', 'Barang', 'Hapus multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(126, 1, '2023-01-30 22:40:21', 'Barang', 'Hapus multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(127, 1, '2023-01-30 22:43:06', 'Barang', 'Tambah multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(128, 1, '2023-01-30 22:43:16', 'Barang', 'Edit multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(129, 1, '2023-01-30 22:44:08', 'Barang', 'Tambah multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(130, 1, '2023-01-30 22:58:51', 'Barang', 'Edit multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(131, 1, '2023-01-30 22:58:51', 'Barang', 'Edit multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(132, 1, '2023-01-30 23:09:07', 'Barang', 'Tambah multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(133, 1, '2023-01-30 23:13:29', 'Barang', 'Hapus multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(134, 1, '2023-01-30 23:39:47', 'Barang', 'Tambah multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(135, 1, '2023-01-31 00:13:34', 'Barang', 'Tambah multi satuan untuk Lifebuoy Lemon Fresh 450ml'),
(136, 1, '2023-01-31 00:18:32', 'Barang', 'Edit multi harga untuk Lifebuoy Lemon Fresh 450ml'),
(137, 1, '2023-01-31 00:18:49', 'Barang', 'Tambah multi harga untuk Lifebuoy Lemon Fresh 450ml'),
(138, 1, '2023-01-31 00:19:12', 'Barang', 'Tambah multi harga untuk Lifebuoy Lemon Fresh 450ml'),
(139, 1, '2023-01-31 00:20:49', 'Barang', 'Edit multi harga untuk Lifebuoy Lemon Fresh 450ml'),
(140, 1, '2023-01-31 00:37:27', 'Barang', 'Edit multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(141, 1, '2023-01-31 00:37:27', 'Barang', 'Edit multi harga untuk Lifebuoy Hairfall Trmt 9ml'),
(142, 1, '2023-01-31 01:44:01', 'Barang', 'Tambah multi harga untuk Pulsa Telkomsel 5000'),
(143, 1, '2023-01-31 01:44:10', 'Barang', 'Tambah multi harga untuk Pulsa Telkomsel 5000'),
(144, 1, '2023-01-31 16:33:06', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(145, 1, '2023-01-31 22:08:53', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(146, 1, '2023-01-31 22:23:55', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(147, 1, '2023-01-31 22:35:26', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(148, 1, '2023-01-31 22:39:11', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(149, 1, '2023-01-31 23:29:05', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(150, 1, '2023-02-01 15:26:17', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(151, 1, '2023-02-01 15:42:34', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(152, 1, '2023-02-01 18:16:42', 'Transaksi', 'Input Transaksi  1 Berhasil'),
(153, 1, '2023-02-01 18:19:17', 'Transaksi', 'Input Transaksi  2 Berhasil'),
(154, 1, '2023-02-01 18:19:51', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(155, 1, '2023-02-01 18:20:42', 'Transaksi', 'Input Transaksi  3 Berhasil'),
(156, 1, '2023-02-01 18:21:30', 'Transaksi', 'Input Transaksi  4 Berhasil'),
(157, 1, '2023-02-01 18:21:49', 'Transaksi', 'Input Transaksi  5 Berhasil'),
(158, 1, '2023-02-01 22:50:26', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(159, 1, '2023-02-02 00:31:23', 'Transaksi', 'Input Transaksi  6 Berhasil'),
(160, 1, '2023-02-02 04:02:00', 'Transaksi', 'Edit Transaksi  6 Berhasil'),
(161, 1, '2023-02-02 04:02:24', 'Transaksi', 'Edit Transaksi  6 Berhasil'),
(162, 1, '2023-02-02 15:32:47', 'Transaksi', 'Input Transaksi  7 Berhasil'),
(163, 1, '2023-02-02 15:33:06', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(164, 1, '2023-02-02 15:45:08', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(165, 1, '2023-02-02 15:53:18', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(166, 1, '2023-02-02 17:24:18', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(167, 1, '2023-02-02 17:25:59', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(168, 1, '2023-02-02 17:27:34', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(169, 1, '2023-02-02 17:51:53', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(170, 1, '2023-02-02 17:56:07', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(171, 1, '2023-02-02 17:57:07', 'Transaksi', 'Edit Transaksi  7 Berhasil'),
(172, 1, '2023-02-02 18:11:34', 'Transaksi', 'Edit Transaksi  7 Berhasil'),
(173, 1, '2023-02-02 18:12:02', 'Transaksi', 'Edit Transaksi  7 Berhasil'),
(174, 1, '2023-02-02 18:24:10', 'Transaksi', 'Edit Transaksi  7 Berhasil'),
(175, 1, '2023-02-02 19:30:31', 'Transaksi', 'Edit Transaksi  7 Berhasil'),
(176, 1, '2023-02-02 20:01:05', 'Transaksi', 'Edit Transaksi  7 Berhasil'),
(177, 1, '2023-02-02 20:09:35', 'Transaksi', 'Input Transaksi  8 Berhasil'),
(178, 1, '2023-02-02 20:36:57', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(179, 1, '2023-02-02 20:37:46', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(180, 1, '2023-02-03 18:11:00', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(181, 1, '2023-02-03 20:58:14', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(182, 1, '2023-02-03 21:01:01', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(183, 1, '2023-02-03 21:34:49', 'Pembayaran', 'Tambah Pembayaran Berhasil'),
(184, 1, '2023-02-03 22:26:59', 'Pembayaran', 'Tambah Pembayaran Berhasil'),
(185, 1, '2023-02-03 22:26:59', 'Pembayaran', 'Tambah Pembayaran Berhasil'),
(186, 1, '2023-02-03 22:29:06', 'Pembayaran', 'Tambah Pembayaran Berhasil'),
(187, 1, '2023-02-03 22:49:17', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(188, 1, '2023-02-03 22:57:35', 'Pembayaran', 'Hapus Pembayaran Berhasil'),
(189, 1, '2023-02-03 23:02:07', 'Pembayaran', 'Hapus Pembayaran Berhasil'),
(190, 1, '2023-02-03 23:02:41', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(191, 1, '2023-02-03 23:02:55', 'Pembayaran', 'Hapus Pembayaran Berhasil'),
(192, 1, '2023-02-03 23:03:01', 'Pembayaran', 'Tambah Pembayaran Berhasil'),
(193, 1, '2023-02-03 23:03:06', 'Pembayaran', 'Tambah Pembayaran Berhasil'),
(194, 1, '2023-02-03 23:04:24', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(195, 1, '2023-02-03 23:05:05', 'Pembayaran', 'Hapus Pembayaran Berhasil'),
(196, 1, '2023-02-03 23:05:12', 'Pembayaran', 'Tambah Pembayaran Berhasil'),
(197, 1, '2023-02-03 23:34:38', 'Pembayaran', 'Edit Pembayaran Berhasil'),
(198, 1, '2023-02-03 23:34:45', 'Pembayaran', 'Edit Pembayaran Berhasil'),
(199, 1, '2023-02-04 14:40:40', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(200, 1, '2023-02-04 18:33:04', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(201, 1, '2023-02-04 18:35:07', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(202, 1, '2023-02-04 18:36:57', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(203, 1, '2023-02-04 18:50:13', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(204, 1, '2023-02-04 19:55:42', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(205, 1, '2023-02-04 19:56:25', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(206, 1, '2023-02-04 19:57:48', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(207, 1, '2023-02-04 21:55:45', 'Pembayaran', 'Input Pembayaran Berhasil'),
(208, 1, '2023-02-04 21:57:32', 'Pembayaran', 'Input Pembayaran Berhasil'),
(209, 1, '2023-02-04 21:58:03', 'Pembayaran', 'Input Pembayaran Berhasil'),
(210, 1, '2023-02-04 21:59:24', 'Pembayaran', 'Input Pembayaran Berhasil'),
(211, 1, '2023-02-04 21:59:43', 'Pembayaran', 'Input Pembayaran Berhasil'),
(212, 1, '2023-02-04 22:29:56', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(213, 1, '2023-02-04 23:36:53', 'Pembayaran', 'Input Pembayaran Berhasil'),
(214, 1, '2023-02-05 00:05:38', 'Pembayaran', 'Edit Pembayaran Berhasil'),
(215, 1, '2023-02-05 01:23:49', 'Transaksi', 'Input Transaksi  9 Berhasil'),
(216, 1, '2023-02-05 02:10:06', 'Akses', 'Edit Akses Berhasil'),
(217, 1, '2023-02-05 18:30:22', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(218, 1, '2023-02-05 20:14:31', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(219, 1, '2023-02-05 20:16:08', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(220, 1, '2023-02-05 20:17:41', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(221, 1, '2023-02-05 20:17:58', 'Akses', 'Ubah Password Berhasil'),
(222, 1, '2023-02-05 20:39:51', 'Akses', 'Edit Akses Berhasil'),
(223, 1, '2023-02-05 23:44:32', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(224, 1, '2023-02-05 23:45:29', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(225, 1, '2023-02-07 17:59:55', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(226, 1, '2023-02-07 20:35:21', 'Bagi Hasil', 'Tambah Sesi Bagi Hasil Berhasil'),
(227, 1, '2023-02-07 20:51:24', 'Bagi Hasil', 'Tambah Sesi Bagi Hasil Berhasil'),
(228, 1, '2023-02-07 22:33:38', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(229, 1, '2023-02-07 23:08:54', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(230, 1, '2023-02-07 23:10:09', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(231, 1, '2023-02-07 23:36:19', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(232, 1, '2023-02-07 23:37:17', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(233, 1, '2023-02-07 23:53:04', 'Pinjaman', 'Tambah Pinjaman Berhasil    '),
(234, 1, '2023-02-07 23:54:01', 'Pinjaman', 'Tambah Pinjaman Berhasil    '),
(235, 1, '2023-02-08 00:07:06', 'Auto Jurnal', 'Update Auto Jurnal'),
(236, 1, '2023-02-08 00:20:58', 'Pinjaman', 'Tambah Angsuran Berhasil'),
(237, 1, '2023-02-08 00:21:28', 'Pinjaman', 'Tambah Angsuran Berhasil'),
(238, 1, '2023-02-08 00:21:39', 'Pinjaman', 'Tambah Angsuran Berhasil'),
(239, 1, '2023-02-08 00:22:08', 'Pinjaman', 'Tambah Angsuran Berhasil'),
(240, 1, '2023-02-08 00:25:18', 'Pinjaman', 'Tambah Angsuran Berhasil'),
(241, 1, '2023-02-08 00:25:25', 'Pinjaman', 'Tambah Angsuran Berhasil'),
(242, 1, '2023-02-08 00:25:32', 'Pinjaman', 'Tambah Angsuran Berhasil'),
(243, 1, '2023-02-08 00:47:49', 'Pinjaman', 'Tambah Angsuran Berhasil'),
(244, 1, '2023-02-08 14:05:57', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(245, 1, '2023-02-08 15:09:14', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(246, 1, '2023-02-08 16:46:23', 'Pinjaman', 'Tambah Angsuran Berhasil'),
(247, 1, '2023-02-08 16:58:57', 'Angsuran', 'Tambah Angsuran Berhasil'),
(248, 1, '2023-02-08 17:19:07', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(249, 1, '2023-02-08 17:19:39', 'Angsuran', 'Hapus Angsuran Berhasil'),
(250, 1, '2023-02-08 17:20:31', 'Angsuran', 'Hapus Angsuran Berhasil'),
(251, 1, '2023-02-08 17:21:06', 'Angsuran', 'Hapus Angsuran Berhasil'),
(252, 1, '2023-02-08 17:21:06', 'Angsuran', 'Hapus Angsuran Berhasil'),
(253, 1, '2023-02-08 17:21:09', 'Angsuran', 'Hapus Angsuran Berhasil'),
(254, 1, '2023-02-08 17:21:09', 'Angsuran', 'Hapus Angsuran Berhasil'),
(255, 1, '2023-02-08 17:21:09', 'Angsuran', 'Hapus Angsuran Berhasil'),
(256, 1, '2023-02-08 17:22:09', 'Pinjaman', 'Hapus Data Pinjaman'),
(257, 1, '2023-02-08 17:22:09', 'Pinjaman', 'Hapus Data Pinjaman'),
(258, 1, '2023-02-08 17:22:12', 'Pinjaman', 'Hapus Data Pinjaman'),
(259, 1, '2023-02-08 17:22:12', 'Pinjaman', 'Hapus Data Pinjaman'),
(260, 1, '2023-02-08 17:22:12', 'Pinjaman', 'Hapus Data Pinjaman'),
(261, 1, '2023-02-08 17:22:14', 'Pinjaman', 'Hapus Data Pinjaman'),
(262, 1, '2023-02-08 17:22:14', 'Pinjaman', 'Hapus Data Pinjaman'),
(263, 1, '2023-02-08 17:22:14', 'Pinjaman', 'Hapus Data Pinjaman'),
(264, 1, '2023-02-08 17:22:14', 'Pinjaman', 'Hapus Data Pinjaman'),
(265, 1, '2023-02-08 17:32:22', 'Pinjaman', 'Hapus Data Pinjaman'),
(266, 1, '2023-02-08 17:35:28', 'Auto Jurnal', 'Update Auto Jurnal'),
(267, 1, '2023-02-08 17:36:22', 'Pinjaman', 'Hapus Data Pinjaman'),
(268, 1, '2023-02-08 17:36:56', 'Pinjaman', 'Tambah Pinjaman Berhasil    '),
(269, 1, '2023-02-08 17:39:14', 'Angsuran', 'Tambah Angsuran Berhasil'),
(270, 1, '2023-02-08 17:50:06', 'Pinjaman', 'Tambah Pinjaman Berhasil    '),
(271, 1, '2023-02-08 19:01:05', 'Pinjaman', 'Hapus Data Pinjaman'),
(272, 1, '2023-02-08 19:06:24', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(273, 1, '2023-02-08 20:33:35', 'Jurnal', 'Hapus Data Jurnal'),
(274, 1, '2023-02-08 20:34:24', 'Pinjaman', 'Tambah Pinjaman Berhasil    '),
(275, 1, '2023-02-08 20:40:31', 'Jurnal', 'Hapus Semua Jurnal Pinjaman'),
(276, 1, '2023-02-08 20:41:03', 'Jurnal', 'Hapus Semua Jurnal Pinjaman'),
(277, 1, '2023-02-08 21:11:59', 'Angsuran', 'Tambah Angsuran Berhasil'),
(278, 1, '2023-02-09 16:14:00', 'Pinjaman', 'Tambah Jurnal Pinjaman Berhasil'),
(279, 1, '2023-02-09 16:14:21', 'Pinjaman', 'Tambah Jurnal Pinjaman Berhasil'),
(280, 1, '2023-02-09 16:26:35', 'Pinjaman', 'Tambah Jurnal Pinjaman Berhasil'),
(281, 1, '2023-02-09 16:26:56', 'Pinjaman', 'Tambah Jurnal Pinjaman Berhasil'),
(282, 1, '2023-02-09 16:42:28', 'Pinjaman', 'Edit Jurnal Pinjaman Berhasil'),
(283, 1, '2023-02-09 16:42:28', 'Pinjaman', 'Edit Jurnal Pinjaman Berhasil'),
(284, 1, '2023-02-09 17:16:16', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(285, 1, '2023-02-09 17:39:15', 'Angsuran', 'Tambah Angsuran Berhasil'),
(286, 1, '2023-02-09 18:10:09', 'Angsuran', 'Hapus Angsuran Berhasil'),
(287, 1, '2023-02-09 21:59:42', 'Pinjaman', 'Edit Pinjaman Berhasil'),
(288, 1, '2023-02-09 21:59:58', 'Pinjaman', 'Edit Pinjaman Berhasil'),
(289, 1, '2023-02-09 21:59:58', 'Pinjaman', 'Edit Pinjaman Berhasil'),
(290, 1, '2023-02-09 22:01:11', 'Angsuran', 'Tambah Angsuran Berhasil'),
(291, 1, '2023-02-10 00:09:25', 'Pinjaman', 'Hapus Data Pinjaman'),
(292, 1, '2023-02-10 00:17:30', 'Pinjaman', 'Edit Pinjaman Berhasil'),
(293, 1, '2023-02-10 00:18:02', 'Pinjaman', 'Edit Pinjaman Berhasil'),
(294, 1, '2023-02-10 00:18:26', 'Pinjaman', 'Edit Pinjaman Berhasil'),
(295, 1, '2023-02-10 00:18:46', 'Pinjaman', 'Edit Pinjaman Berhasil'),
(296, 1, '2023-02-10 03:47:15', 'Bagi Hasil', 'Tambah Sesi Bagi Hasil Berhasil'),
(297, 1, '2023-02-10 19:11:11', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(298, 1, '2023-02-10 22:36:49', 'Bagi Hasil', 'Hapus Data Bagi Hasil Berhasil'),
(299, 1, '2023-02-10 22:38:27', 'Bagi Hasil', 'Tambah Sesi Bagi Hasil Berhasil'),
(300, 1, '2023-02-10 22:41:26', 'Bagi Hasil', 'Tambah Sesi Bagi Hasil Berhasil'),
(301, 1, '2023-02-10 22:41:38', 'Bagi Hasil', 'Hapus Data Bagi Hasil Berhasil'),
(302, 1, '2023-02-10 22:41:38', 'Bagi Hasil', 'Hapus Data Bagi Hasil Berhasil'),
(303, 1, '2023-02-10 22:41:57', 'Bagi Hasil', 'Tambah Sesi Bagi Hasil Berhasil'),
(304, 1, '2023-02-10 23:16:50', 'Bagi Hasil', 'Hapus Data Bagi Hasil Berhasil'),
(305, 1, '2023-02-10 23:17:31', 'Bagi Hasil', 'Tambah Sesi Bagi Hasil Berhasil'),
(306, 1, '2023-02-10 23:17:40', 'Bagi Hasil', 'Hapus Data Bagi Hasil Berhasil'),
(307, 1, '2023-02-10 23:18:57', 'Bagi Hasil', 'Tambah Sesi Bagi Hasil Berhasil'),
(308, 1, '2023-02-10 23:19:04', 'Bagi Hasil', 'Hapus Data Bagi Hasil Berhasil'),
(309, 1, '2023-02-10 23:19:26', 'Bagi Hasil', 'Tambah Sesi Bagi Hasil Berhasil'),
(310, 1, '2023-02-11 15:49:18', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(311, 1, '2023-02-11 17:33:54', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(312, 1, '2023-02-11 18:01:37', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(313, 1, '2023-02-11 22:51:00', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(314, 1, '2023-02-11 22:51:52', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(315, 1, '2023-02-11 22:52:04', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(316, 1, '2023-02-11 22:53:19', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(317, 1, '2023-02-11 22:54:03', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(318, 1, '2023-02-11 23:13:49', 'Bagi Hasil', 'Hapus Data Bagi Hasil Berhasil'),
(319, 1, '2023-02-11 23:15:07', 'Bagi Hasil', 'Tambah Sesi Bagi Hasil Berhasil'),
(320, 1, '2023-02-11 23:20:21', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(321, 1, '2023-02-11 23:22:10', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(322, 1, '2023-02-11 23:22:10', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(323, 1, '2023-02-11 23:24:07', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(324, 1, '2023-02-11 23:25:07', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(325, 1, '2023-02-11 23:25:17', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(326, 1, '2023-02-11 23:25:56', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(327, 1, '2023-02-11 23:26:15', 'Bagi Hasil', 'Update Sesi Bagi Hasil Berhasil'),
(328, 1, '2023-02-12 15:04:10', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(329, 1, '2023-02-12 17:29:10', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(330, 1, '2023-02-12 18:50:01', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(331, 1, '2023-02-12 18:51:52', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(332, 1, '2023-02-12 20:09:42', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(333, 1, '2023-02-12 23:06:07', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(334, 1, '2023-02-13 20:50:28', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(335, 1, '2023-02-13 21:24:57', 'Entitas Akses', 'Membuat Entitas Akses Baru'),
(336, 1, '2023-02-13 21:48:20', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(337, 1, '2023-02-13 21:49:10', 'Entitas Akses', 'Membuat Entitas Akses Baru'),
(338, 1, '2023-02-13 21:52:17', 'Entitas Akses', 'Membuat Entitas Akses Baru'),
(339, 1, '2023-02-13 21:57:49', 'Entitas Akses', 'Membuat Entitas Akses Baru'),
(340, 1, '2023-02-13 21:59:02', 'Entitas Akses', 'Membuat Entitas Akses Baru'),
(341, 1, '2023-02-13 22:05:25', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(342, 1, '2023-02-13 22:48:09', 'Entitas Akses', 'Edit Entitas Akses Berhasil'),
(343, 1, '2023-02-13 22:49:07', 'Entitas Akses', 'Edit Entitas Akses Berhasil'),
(344, 1, '2023-02-13 23:21:46', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(345, 1, '2023-02-13 23:34:52', 'Akses', 'Tambah Ijin Akses Berhasil'),
(346, 1, '2023-02-13 23:35:18', 'Akses', 'Tambah Ijin Akses Berhasil'),
(347, 1, '2023-02-13 23:55:37', 'Akses', 'Tambah Ijin Akses Berhasil'),
(348, 1, '2023-02-13 23:57:45', 'Akses', 'Kembalikan Standar Ijin Akses Berhasil'),
(349, 1, '2023-02-13 23:57:55', 'Akses', 'Kembalikan Standar Ijin Akses Berhasil'),
(350, 1, '2023-02-13 23:57:55', 'Akses', 'Kembalikan Standar Ijin Akses Berhasil'),
(351, 1, '2023-02-13 23:58:31', 'Akses', 'Kembalikan Standar Ijin Akses Berhasil'),
(352, 1, '2023-02-13 23:58:31', 'Akses', 'Kembalikan Standar Ijin Akses Berhasil'),
(353, 1, '2023-02-13 23:58:31', 'Akses', 'Kembalikan Standar Ijin Akses Berhasil'),
(354, 1, '2023-02-13 23:58:40', 'Akses', 'Kembalikan Standar Ijin Akses Berhasil'),
(355, 1, '2023-02-13 23:58:40', 'Akses', 'Kembalikan Standar Ijin Akses Berhasil'),
(356, 1, '2023-02-13 23:58:40', 'Akses', 'Kembalikan Standar Ijin Akses Berhasil'),
(357, 1, '2023-02-13 23:58:40', 'Akses', 'Kembalikan Standar Ijin Akses Berhasil'),
(358, 1, '2023-02-14 00:07:02', 'Akses', 'Edit Akses Berhasil'),
(359, 1, '2023-02-14 00:10:57', 'Input Akses Baru', 'Input Akses Baru Berhasil'),
(360, 1, '2023-02-14 00:11:46', 'Input Akses Baru', 'Input Akses Baru Berhasil'),
(361, 1, '2023-02-14 00:12:47', 'Akses', 'Hapus Akses Berhasil'),
(362, 1, '2023-02-14 00:12:50', 'Akses', 'Hapus Akses Berhasil'),
(363, 1, '2023-02-14 00:12:50', 'Akses', 'Hapus Akses Berhasil'),
(364, 1, '2023-02-14 00:15:51', 'Akses', 'Edit Akses Berhasil'),
(365, 1, '2023-02-14 00:15:51', 'Akses', 'Edit Akses Berhasil'),
(366, 1, '2023-02-14 00:16:08', 'Akses', 'Kembalikan Standar Ijin Akses Berhasil'),
(367, 1, '2023-02-14 00:39:40', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(368, 1, '2023-02-14 00:46:57', 'Akses', 'Tambah Ijin Akses Berhasil'),
(369, 1, '2023-02-14 02:09:07', 'Angggota', 'Edit Anggota Berhasil'),
(370, 1, '2023-02-14 02:12:06', 'Angggota', 'Hapus Data Anggota'),
(371, 1, '2023-02-14 02:12:41', 'Angggota', 'Hapus Data Anggota'),
(372, 1, '2023-02-14 02:13:28', 'Angggota', 'Hapus Data Anggota'),
(373, 1, '2023-02-14 02:13:52', 'Angggota', 'Hapus Data Anggota'),
(374, 1, '2023-02-14 02:13:52', 'Angggota', 'Hapus Data Anggota'),
(375, 1, '2023-02-14 02:14:02', 'Angggota', 'Hapus Data Anggota'),
(376, 1, '2023-02-14 02:14:02', 'Angggota', 'Hapus Data Anggota'),
(377, 1, '2023-02-14 02:52:43', 'Tabungan', 'Tambah Data Penarikan'),
(378, 1, '2023-02-14 04:00:01', 'Transaksi', 'Input Transaksi  9 Berhasil'),
(379, 1, '2023-02-14 04:00:37', 'Transaksi', 'Input Transaksi  10 Berhasil'),
(380, 1, '2023-02-14 04:05:54', 'Transaksi', 'Input Transaksi  11 Berhasil'),
(381, 1, '2023-02-14 04:06:24', 'Transaksi', 'Input Transaksi  12 Berhasil'),
(382, 1, '2023-02-14 17:33:28', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(383, 1, '2023-02-14 17:37:30', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(384, 1, '2023-02-14 17:42:08', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(385, 1, '2023-02-14 19:58:21', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(386, 1, '2023-02-14 21:30:10', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(387, 1, '2023-02-14 21:31:19', 'Transaksi', 'Input Transaksi  13 Berhasil'),
(388, 1, '2023-02-14 21:33:12', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(389, 1, '2023-02-14 22:34:41', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(390, 1, '2023-02-15 13:12:46', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(391, 1, '2023-02-15 15:55:41', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(392, 1, '2023-02-15 16:33:03', 'Tabungan', 'Tambah Data Simpanan Wajib'),
(393, 1, '2023-02-15 16:37:16', 'Tabungan', 'Tambah Data Simpanan Wajib'),
(394, 1, '2023-02-15 16:39:55', 'Tabungan', 'Tambah Data Simpanan Wajib'),
(395, 1, '2023-02-15 16:41:16', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(396, 1, '2023-02-15 16:42:57', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(397, 1, '2023-02-15 17:17:44', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(398, 1, '2023-02-15 17:29:50', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(399, 1, '2023-02-15 17:42:31', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(400, 1, '2023-02-15 17:48:13', 'Tabungan', 'Tambah Data Simpanan Wajib'),
(401, 1, '2023-02-15 17:54:08', 'Tabungan', 'Edit Tabungan Berhasil'),
(402, 1, '2023-02-15 17:59:42', 'Tabungan', 'Tambah Data Simpanan Wajib'),
(403, 1, '2023-02-15 19:19:08', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(404, 1, '2023-02-15 19:23:31', 'Tabungan', 'Tambah Data Penarikan'),
(405, 1, '2023-02-15 19:24:58', 'Auto Jurnal', 'Update Auto Jurnal'),
(406, 1, '2023-02-15 20:00:55', 'Tabungan', 'Edit Tabungan Berhasil'),
(407, 1, '2023-02-15 20:00:55', 'Tabungan', 'Edit Tabungan Berhasil'),
(408, 1, '2023-02-15 20:00:55', 'Tabungan', 'Edit Tabungan Berhasil'),
(409, 1, '2023-02-15 20:00:55', 'Tabungan', 'Edit Tabungan Berhasil'),
(410, 1, '2023-02-15 20:03:04', 'Tabungan', 'Edit Tabungan Berhasil'),
(411, 1, '2023-02-15 20:07:44', 'Tabungan', 'Edit Tabungan Berhasil'),
(412, 1, '2023-02-15 21:56:55', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(413, 1, '2023-02-15 22:01:51', 'Simpanan', 'Tambah Jurnal Simpanan Berhasil'),
(414, 1, '2023-02-15 22:02:18', 'Simpanan', 'Tambah Jurnal Simpanan Berhasil'),
(415, 1, '2023-02-15 22:03:12', 'Simpanan', 'Tambah Jurnal Simpanan Berhasil'),
(416, 1, '2023-02-15 22:03:20', 'Simpanan', 'Tambah Jurnal Simpanan Berhasil'),
(417, 1, '2023-02-15 22:26:14', 'Simpanan', 'Hapus Jurnal Simpanan Berhasil'),
(418, 1, '2023-02-15 22:29:48', 'Simpanan', 'Hapus Jurnal Simpanan Berhasil'),
(419, 1, '2023-02-15 22:29:56', 'Simpanan', 'Tambah Jurnal Simpanan Berhasil'),
(420, 1, '2023-02-15 22:30:04', 'Simpanan', 'Tambah Jurnal Simpanan Berhasil'),
(421, 1, '2023-02-15 22:59:08', 'Simpanan', 'Edit Jurnal Simpanan Berhasil'),
(422, 1, '2023-02-15 22:59:37', 'Simpanan', 'Edit Jurnal Simpanan Berhasil'),
(423, 1, '2023-02-16 00:37:33', 'Tabungan', 'Edit Tabungan Berhasil'),
(424, 1, '2023-02-16 00:54:18', 'Jurnal', 'Hapus Data Jurnal Pinjaman'),
(425, 1, '2023-02-16 00:54:22', 'Jurnal', 'Hapus Data Jurnal Pinjaman'),
(426, 1, '2023-02-16 00:54:22', 'Jurnal', 'Hapus Data Jurnal Pinjaman'),
(427, 1, '2023-02-16 00:59:53', 'Pinjaman', 'Tambah Pinjaman Berhasil    '),
(428, 1, '2023-02-16 18:37:59', 'Entitas Akses', 'Membuat Entitas Akses Baru'),
(429, 1, '2023-02-16 19:44:35', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(430, 1, '2023-02-17 18:01:29', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(431, 1, '2023-02-17 19:10:35', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(432, 1, '2023-02-17 19:51:11', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(433, 1, '2023-02-17 20:13:43', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(434, 1, '2023-02-17 22:16:03', 'Angggota', 'Tambah Akses Anggota'),
(435, 1, '2023-02-17 22:16:35', 'Angggota', 'Tambah Akses Anggota'),
(436, 1, '2023-02-17 22:17:11', 'Angggota', 'Tambah Akses Anggota'),
(437, 1, '2023-02-17 22:17:20', 'Angggota', 'Tambah Akses Anggota'),
(438, 1, '2023-02-17 22:18:00', 'Angggota', 'Tambah Akses Anggota'),
(439, 1, '2023-02-17 22:19:38', 'Angggota', 'Tambah Akses Anggota'),
(440, 1, '2023-02-17 22:20:10', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(441, 1, '2023-02-17 22:20:13', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(442, 1, '2023-02-17 22:20:13', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(443, 1, '2023-02-17 22:20:16', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(444, 1, '2023-02-17 22:20:16', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(445, 1, '2023-02-17 22:20:16', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(446, 1, '2023-02-17 22:20:21', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(447, 1, '2023-02-17 22:20:21', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(448, 1, '2023-02-17 22:20:21', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(449, 1, '2023-02-17 22:20:21', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(450, 1, '2023-02-17 22:20:23', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(451, 1, '2023-02-17 22:20:23', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(452, 1, '2023-02-17 22:20:23', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(453, 1, '2023-02-17 22:20:23', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(454, 1, '2023-02-17 22:20:23', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(455, 1, '2023-02-17 22:20:25', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(456, 1, '2023-02-17 22:20:25', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(457, 1, '2023-02-17 22:20:25', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(458, 1, '2023-02-17 22:20:25', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(459, 1, '2023-02-17 22:20:25', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(460, 1, '2023-02-17 22:20:25', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(461, 1, '2023-02-17 22:20:48', 'Angggota', 'Tambah Akses Anggota'),
(462, 1, '2023-02-17 22:20:58', 'Angggota', 'Tambah Akses Anggota'),
(463, 1, '2023-02-17 22:21:03', 'Angggota', 'Tambah Akses Anggota'),
(464, 1, '2023-02-17 22:21:16', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(465, 1, '2023-02-17 22:21:18', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(466, 1, '2023-02-17 22:21:18', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(467, 1, '2023-02-17 22:21:20', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(468, 1, '2023-02-17 22:21:20', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(469, 1, '2023-02-17 22:21:21', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(470, 1, '2023-02-17 22:21:48', 'Angggota', 'Tambah Akses Anggota'),
(471, 1, '2023-02-17 22:21:57', 'Angggota', 'Hapus Akses Anggota Berhasil'),
(472, 1, '2023-02-17 22:22:25', 'Angggota', 'Tambah Akses Anggota'),
(473, 1, '2023-02-17 22:22:49', 'Angggota', 'Tambah Akses Anggota'),
(474, 1, '2023-02-17 23:58:17', 'Angggota', 'Update Akses Anggota Berhasil'),
(475, 1, '2023-02-18 00:05:25', 'Angggota', 'Update Akses Anggota Berhasil'),
(476, 1, '2023-02-18 00:13:22', 'Angggota', 'Update Akses Anggota Berhasil'),
(477, 1, '2023-02-18 00:15:42', 'Angggota', 'Update Akses Anggota Berhasil'),
(478, 1, '2023-02-18 00:15:42', 'Angggota', 'Update Akses Anggota Berhasil'),
(479, 1, '2023-02-18 00:22:30', 'Angggota', 'Tambah Akses Anggota'),
(480, 1, '2023-02-18 00:23:01', 'Angggota', 'Tambah Akses Anggota'),
(481, 1, '2023-02-18 00:23:29', 'Angggota', 'Tambah Akses Anggota'),
(482, 1, '2023-02-18 00:46:29', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(483, 1, '2023-02-18 00:46:51', 'Angggota', 'Update Akses Anggota Berhasil'),
(484, 1, '2023-02-18 00:56:07', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(485, 1, '2023-02-18 02:03:23', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(486, 1, '2023-02-22 16:57:38', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(487, 1, '2023-02-22 17:17:31', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(488, 1, '2023-02-22 17:25:55', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(489, 1, '2023-02-23 12:56:20', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(490, 18, '2023-02-23 12:57:44', 'Login', 'solihulhadi141213@gmail.com Berhasil Melakukan Login'),
(491, 1, '2023-02-23 12:58:31', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(492, 1, '2023-02-23 21:15:19', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(493, 1, '2023-02-23 21:17:14', 'Transaksi', 'Input Transaksi  14 Berhasil'),
(494, 1, '2023-02-23 21:17:55', 'Transaksi', 'Input Transaksi  15 Berhasil'),
(495, 1, '2023-02-23 21:18:47', 'Transaksi', 'Input Transaksi  16 Berhasil'),
(496, 1, '2023-02-23 21:20:04', 'Transaksi', 'Input Transaksi  17 Berhasil'),
(497, 1, '2023-02-23 21:20:48', 'Transaksi', 'Input Transaksi  18 Berhasil'),
(498, 1, '2023-02-23 21:21:06', 'Transaksi', 'Edit Transaksi  18 Berhasil'),
(499, 1, '2023-02-23 21:21:34', 'Transaksi', 'Edit Transaksi  15 Berhasil'),
(500, 1, '2023-02-23 21:22:09', 'Tabungan', 'Tambah Data Simpanan Pokok'),
(501, 1, '2023-02-23 21:22:34', 'Tabungan', 'Tambah Data Simpanan Wajib'),
(502, 1, '2023-02-23 21:22:52', 'Tabungan', 'Tambah Data Simpanan Wajib'),
(503, 1, '2023-02-23 21:45:23', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(504, 1, '2023-02-23 21:46:02', 'Transaksi', 'Input Transaksi  19 Berhasil'),
(505, 1, '2023-02-23 21:46:33', 'Tabungan', 'Tambah Data Simpanan Pokok'),
(506, 1, '2023-02-23 21:46:47', 'Tabungan', 'Tambah Data Simpanan Pokok'),
(507, 1, '2023-02-23 21:47:06', 'Tabungan', 'Tambah Data Simpanan Wajib'),
(508, 1, '2023-02-23 21:47:39', 'Pinjaman', 'Tambah Pinjaman Berhasil    '),
(509, 1, '2023-02-23 21:48:15', 'Angsuran', 'Tambah Angsuran Berhasil'),
(510, 1, '2023-02-23 21:48:23', 'Angsuran', 'Tambah Angsuran Berhasil'),
(511, 1, '2023-02-23 21:48:33', 'Angsuran', 'Tambah Angsuran Berhasil'),
(512, 1, '2023-02-23 21:48:45', 'Angsuran', 'Tambah Angsuran Berhasil'),
(513, 1, '2023-02-23 21:49:03', 'Angsuran', 'Tambah Angsuran Berhasil'),
(514, 1, '2023-02-23 21:49:13', 'Angsuran', 'Tambah Angsuran Berhasil'),
(515, 1, '2023-02-23 22:07:27', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(516, 1, '2023-02-23 22:49:55', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(517, 1, '2023-02-24 18:53:27', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(518, 1, '2023-02-24 19:45:16', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(519, 1, '2023-02-24 20:46:53', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(520, 1, '2023-02-24 22:37:24', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(521, 1, '2023-02-25 15:58:14', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(522, 1, '2023-02-25 16:12:27', 'Stock Opename', 'Buat Sesi Stock Opename'),
(523, 1, '2023-02-25 17:48:08', 'Stock Opename', 'Edit Sesi Stock Opename'),
(524, 1, '2023-02-25 18:06:58', 'Stock Opename', 'Hapus Stock Opename Berhasil'),
(525, 1, '2023-02-25 18:07:04', 'Stock Opename', 'Buat Sesi Stock Opename'),
(526, 1, '2023-02-25 18:13:39', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(527, 1, '2023-02-25 20:11:07', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(528, 1, '2023-02-25 20:15:28', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(529, 1, '2023-02-25 20:17:06', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(530, 1, '2023-02-25 20:28:06', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(531, 1, '2023-02-25 21:36:52', 'Stock Opename', 'Edit Stock Opename Barang'),
(532, 1, '2023-02-25 21:44:20', 'Stock Opename', 'Edit Stock Opename Barang'),
(533, 1, '2023-02-25 21:44:34', 'Stock Opename', 'Edit Stock Opename Barang'),
(534, 1, '2023-02-25 21:46:06', 'Stock Opename', 'Edit Stock Opename Barang'),
(535, 1, '2023-02-25 22:38:59', 'Stock Opename', 'Edit Stock Opename Barang'),
(536, 1, '2023-02-25 22:39:09', 'Stock Opename', 'Edit Stock Opename Barang'),
(537, 1, '2023-02-25 22:39:09', 'Stock Opename', 'Edit Stock Opename Barang'),
(538, 1, '2023-02-25 22:47:23', 'Stock Opename', 'Hapus Stock Opename Berhasil'),
(539, 1, '2023-02-25 22:47:27', 'Stock Opename', 'Hapus Stock Opename Berhasil'),
(540, 1, '2023-02-25 22:47:27', 'Stock Opename', 'Hapus Stock Opename Berhasil'),
(541, 1, '2023-02-25 22:47:36', 'Stock Opename', 'Edit Stock Opename Barang'),
(542, 1, '2023-02-25 23:00:45', 'Stock Opename', 'Edit Stock Opename Barang'),
(543, 1, '2023-02-25 23:00:53', 'Stock Opename', 'Edit Stock Opename Barang'),
(544, 1, '2023-02-25 23:01:01', 'Stock Opename', 'Edit Stock Opename Barang'),
(545, 1, '2023-02-26 02:08:17', 'Akses', 'Tambah Ijin Akses Berhasil'),
(546, 1, '2023-02-26 02:08:38', 'Akses', 'Tambah Ijin Akses Berhasil'),
(547, 1, '2023-02-26 02:09:54', 'Akses', 'Tambah Ijin Akses Berhasil'),
(548, 1, '2023-02-26 02:10:09', 'Akses', 'Tambah Ijin Akses Berhasil'),
(549, 1, '2023-02-26 02:10:23', 'Akses', 'Tambah Ijin Akses Berhasil'),
(550, 1, '2023-02-26 02:10:52', 'Akses', 'Tambah Ijin Akses Berhasil'),
(551, 1, '2023-02-26 02:11:04', 'Akses', 'Tambah Ijin Akses Berhasil'),
(552, 1, '2023-02-26 02:11:17', 'Akses', 'Tambah Ijin Akses Berhasil'),
(553, 1, '2023-02-26 02:11:30', 'Akses', 'Tambah Ijin Akses Berhasil'),
(554, 1, '2023-02-26 02:11:41', 'Akses', 'Tambah Ijin Akses Berhasil'),
(555, 1, '2023-02-26 02:12:05', 'Akses', 'Tambah Ijin Akses Berhasil'),
(556, 1, '2023-02-26 02:12:23', 'Akses', 'Tambah Ijin Akses Berhasil'),
(557, 1, '2023-02-26 02:12:33', 'Akses', 'Tambah Ijin Akses Berhasil'),
(558, 1, '2023-02-26 02:12:52', 'Akses', 'Tambah Ijin Akses Berhasil'),
(559, 1, '2023-02-26 02:13:02', 'Akses', 'Tambah Ijin Akses Berhasil'),
(560, 1, '2023-02-26 02:13:12', 'Akses', 'Tambah Ijin Akses Berhasil'),
(561, 1, '2023-02-26 02:13:22', 'Akses', 'Tambah Ijin Akses Berhasil'),
(562, 1, '2023-02-26 02:13:31', 'Akses', 'Tambah Ijin Akses Berhasil'),
(563, 1, '2023-02-26 02:13:41', 'Akses', 'Tambah Ijin Akses Berhasil'),
(564, 1, '2023-02-26 02:13:51', 'Akses', 'Tambah Ijin Akses Berhasil'),
(565, 1, '2023-02-26 02:14:01', 'Akses', 'Tambah Ijin Akses Berhasil'),
(566, 1, '2023-02-26 02:14:11', 'Akses', 'Tambah Ijin Akses Berhasil'),
(567, 1, '2023-02-26 02:14:18', 'Akses', 'Tambah Ijin Akses Berhasil'),
(568, 1, '2023-02-26 02:14:25', 'Akses', 'Tambah Ijin Akses Berhasil'),
(569, 1, '2023-02-26 02:14:33', 'Akses', 'Tambah Ijin Akses Berhasil'),
(570, 1, '2023-02-26 02:15:24', 'Akses', 'Tambah Ijin Akses Berhasil'),
(571, 1, '2023-02-26 02:15:31', 'Akses', 'Tambah Ijin Akses Berhasil'),
(572, 1, '2023-02-26 02:15:40', 'Akses', 'Tambah Ijin Akses Berhasil'),
(573, 1, '2023-04-11 16:30:15', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login'),
(574, 1, '2024-01-24 21:52:07', 'Akses', 'Edit Akses Berhasil'),
(575, 1, '2024-01-24 21:53:26', 'Login', 'dhiforester@gmail.com Berhasil Melakukan Login');

-- --------------------------------------------------------

--
-- Table structure for table `log_email`
--

DROP TABLE IF EXISTS `log_email`;
CREATE TABLE IF NOT EXISTS `log_email` (
  `id_log_email` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text,
  `email` text NOT NULL,
  `subjek` text NOT NULL,
  `pesan` text NOT NULL,
  `datetime` text NOT NULL,
  PRIMARY KEY (`id_log_email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_email`
--

INSERT INTO `log_email` (`id_log_email`, `nama`, `email`, `subjek`, `pesan`, `datetime`) VALUES
(1, 'Solihul Hadi', 'dhiforester@gmail.com', 'Validasi Pendaftaran', 'Selamat malam, silahkan lakukan validasi eaae5466ace3c45f8aa1cee36c1654', '1661103345'),
(2, 'Solihul Hadi', 'dhiforester@gmail.com', 'Validasi Pendaftaran', 'Selamat malam, silahkan lakukan validasi 03e826630d4f3c836e6eceeacd929b', '1661103468'),
(3, 'Solihul Hadi', 'dhiforester@gmail.com', 'Validasi Pendaftaran Klinik Metro', 'Berikut ini kami kirimkan URL untuk melakukan validasi pendaftaran anda <a href=http://localhost:81/metro/ValidasiEmail.php?Token=e66375de75db92a1f576466968cd69>Klik Disini</a>', '1661105133'),
(4, 'Solihul Hadi', 'dhiforester@gmail.com', 'Validasi Pendaftaran Klinik Metro', 'Berikut ini kami kirimkan URL untuk melakukan validasi pendaftaran anda <a href=http://localhost:81/metro/ValidasiEmail.php?Token=75a571fe72305d66f156377885a0ae>Klik Disini</a>', '1661168157'),
(5, 'Naya Nurmayasari', 'solihulhadi141213@gmail.com', 'Validasi Pendaftaran Klinik Metro', 'Berikut ini kami kirimkan URL untuk melakukan validasi pendaftaran anda <a href=http://localhost:81/metro/ValidasiEmail.php?Token=b3039d1a355521267ae8278e549930>Klik Disini</a>', '1661168751'),
(6, 'Suwarno', 'solihulhadi141213@gmail.com', 'Validasi Pendaftaran Klinik Metro', 'Berikut ini kami kirimkan URL untuk melakukan validasi pendaftaran anda <a href=http://localhost:81/metro/ValidasiEmail.php?Token=ced4b498ccd7cc6987e48b7e3c657c>Klik Disini</a>', '1661169968'),
(7, 'Suwarno', 'solihulhadi141213@gmail.com', 'Validasi Pendaftaran Klinik Metro', 'Berikut ini kami kirimkan URL untuk melakukan validasi pendaftaran anda <a href=http://localhost:81/metro/ValidasiEmail.php?Token=bd4e84ce3e25ca9e8c591e98cf38f4>Klik Disini</a>', '1661170043'),
(8, 'Suwarno', 'solihulhadi141213@gmail.com', 'Validasi Pendaftaran Klinik Metro', 'Berikut ini kami kirimkan URL untuk melakukan validasi pendaftaran anda <a href=http://localhost:81/metro/ValidasiEmail.php?Token=ddf0c5ca351f7eaf28624b1630390d>Klik Disini</a>', '1661170606'),
(9, 'Solihul hadi', 'mr_nesta2000@yahoo.com', 'Validasi Pendaftaran Klinik Metro', 'Berikut ini kami kirimkan URL untuk melakukan validasi pendaftaran anda <a href=http://localhost:81/metro/ValidasiEmail.php?Token=7d530a47ac2a65f10fef62bd923dca>Klik Disini</a>', '1662107470');

-- --------------------------------------------------------

--
-- Table structure for table `lupa_password`
--

DROP TABLE IF EXISTS `lupa_password`;
CREATE TABLE IF NOT EXISTS `lupa_password` (
  `id_lupa_password` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses_anggota` int(20) NOT NULL,
  `tanggal_dibuat` varchar(25) NOT NULL,
  `tanggal_expired` varchar(25) NOT NULL,
  `code_unik` text NOT NULL,
  PRIMARY KEY (`id_lupa_password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

DROP TABLE IF EXISTS `notifikasi`;
CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id_notifikasi` int(20) NOT NULL AUTO_INCREMENT,
  `id_akses` int(20) NOT NULL,
  `datetime_notifikasi` varchar(30) NOT NULL,
  `kategori_notifikasi` text NOT NULL,
  `notifikasi` text NOT NULL,
  `status_notifikasi` varchar(25) NOT NULL,
  PRIMARY KEY (`id_notifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

DROP TABLE IF EXISTS `pinjaman`;
CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id_pinjaman` int(15) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(15) NOT NULL,
  `id_akses` int(15) NOT NULL,
  `tanggal_pinjaman` varchar(30) NOT NULL,
  `tanggal_input` varchar(30) NOT NULL,
  `nama` text NOT NULL,
  `jumlah_pinjaman` int(15) NOT NULL,
  `persen_jasa` int(15) NOT NULL,
  `estimasi_jasa` int(15) DEFAULT NULL,
  `nilai_angsuran` int(15) NOT NULL,
  `periode_angsuran` int(15) NOT NULL,
  `token` text NOT NULL,
  `status` varchar(25) NOT NULL COMMENT 'Pending, Active, Lunas, Macet',
  PRIMARY KEY (`id_pinjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_anggota`, `id_akses`, `tanggal_pinjaman`, `tanggal_input`, `nama`, `jumlah_pinjaman`, `persen_jasa`, `estimasi_jasa`, `nilai_angsuran`, `periode_angsuran`, `token`, `status`) VALUES
(2, 3, 1, '2023-02-08', '2023-02-08 10:50', 'Syamsul Maarif', 1500000, 0, 0, 150000, 10, '1675853406', 'Active'),
(3, 2, 1, '2023-02-15', '2023-02-15 17:59', 'Didi Muhadi', 1000000, 0, 0, 100000, 10, '1676483993', 'Active'),
(4, 5, 1, '2023-02-23', '2023-02-23 14:47', 'Fikri Renaldy', 1000000, 0, 0, 100000, 10, '1677163659', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman_angsuran`
--

DROP TABLE IF EXISTS `pinjaman_angsuran`;
CREATE TABLE IF NOT EXISTS `pinjaman_angsuran` (
  `id_pinjaman_angsuran` int(15) NOT NULL AUTO_INCREMENT,
  `id_pinjaman` int(15) NOT NULL,
  `id_anggota` int(15) NOT NULL,
  `id_akses` int(15) DEFAULT NULL,
  `tanggal` varchar(30) NOT NULL,
  `kategori_angsuran` varchar(25) NOT NULL COMMENT 'Pokok, Jasa, Denda',
  `jumlah` int(15) NOT NULL,
  `datetime` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pinjaman_angsuran`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman_angsuran`
--

INSERT INTO `pinjaman_angsuran` (`id_pinjaman_angsuran`, `id_pinjaman`, `id_anggota`, `id_akses`, `tanggal`, `kategori_angsuran`, `jumlah`, `datetime`) VALUES
(1, 1, 2, 1, '2023-02-08', 'Pokok', 150000, '1675852754'),
(2, 2, 3, 1, '2023-02-08', 'Pokok', 100000, '1675865519'),
(3, 2, 3, 1, '2023-02-09', 'Jasa', 150000, '1675954871'),
(4, 4, 5, 1, '2023-02-23', 'Pokok', 100000, '1677163695'),
(5, 4, 5, 1, '2023-03-01', 'Pokok', 100000, '1677163703'),
(6, 4, 5, 1, '2023-04-02', 'Pokok', 100000, '1677163713'),
(7, 4, 5, 1, '2023-05-01', 'Pokok', 100000, '1677163725'),
(8, 4, 5, 1, '2023-06-01', 'Pokok', 100000, '1677163743'),
(9, 4, 5, 1, '2023-07-01', 'Pokok', 100000, '1677163753');

-- --------------------------------------------------------

--
-- Table structure for table `setting_autojurnal`
--

DROP TABLE IF EXISTS `setting_autojurnal`;
CREATE TABLE IF NOT EXISTS `setting_autojurnal` (
  `id_setting_autojurnal` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses` int(10) NOT NULL,
  `trans_account1` int(10) DEFAULT NULL,
  `cash_account1` int(10) DEFAULT NULL,
  `debt_account1` int(10) DEFAULT NULL,
  `receivables_account1` int(10) DEFAULT NULL,
  `trans_account2` int(10) DEFAULT NULL,
  `cash_account2` int(10) DEFAULT NULL,
  `debt_account2` int(10) DEFAULT NULL,
  `receivables_account2` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_setting_autojurnal`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_autojurnal`
--

INSERT INTO `setting_autojurnal` (`id_setting_autojurnal`, `id_akses`, `trans_account1`, `cash_account1`, `debt_account1`, `receivables_account1`, `trans_account2`, `cash_account2`, `debt_account2`, `receivables_account2`) VALUES
(3, 6, 125, 121, 28, 136, 125, 135, 77, 136),
(5, 1, 125, 155, 28, 136, 41, 135, 28, 136);

-- --------------------------------------------------------

--
-- Table structure for table `setting_email_gateway`
--

DROP TABLE IF EXISTS `setting_email_gateway`;
CREATE TABLE IF NOT EXISTS `setting_email_gateway` (
  `id_setting_email_gateway` int(10) NOT NULL AUTO_INCREMENT,
  `email_gateway` text,
  `password_gateway` varchar(20) DEFAULT NULL,
  `url_provider` text,
  `port_gateway` varchar(10) DEFAULT NULL,
  `nama_pengirim` varchar(25) DEFAULT NULL,
  `url_service` text NOT NULL,
  `validasi_email` varchar(10) NOT NULL,
  `redirect_validasi` text NOT NULL,
  `pesan_validasi_email` text NOT NULL,
  PRIMARY KEY (`id_setting_email_gateway`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_email_gateway`
--

INSERT INTO `setting_email_gateway` (`id_setting_email_gateway`, `email_gateway`, `password_gateway`, `url_provider`, `port_gateway`, `nama_pengirim`, `url_service`, `validasi_email`, `redirect_validasi`, `pesan_validasi_email`) VALUES
(1, 'dhiforester@rsuelsyifa.com', 'solihulhadi1412', 'mail.rsuelsyifa.com', '465', 'Insan Muamalah', 'https://mailer.rsuelsyifa.com/index.php', 'No', '', 'Berikut ini kami kirimkan URL untuk melakukan validasi pendaftaran anda');

-- --------------------------------------------------------

--
-- Table structure for table `setting_general`
--

DROP TABLE IF EXISTS `setting_general`;
CREATE TABLE IF NOT EXISTS `setting_general` (
  `id_setting_general` int(10) NOT NULL AUTO_INCREMENT,
  `title_page` varchar(20) NOT NULL,
  `kata_kunci` text NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat_bisnis` text NOT NULL,
  `email_bisnis` text NOT NULL,
  `telepon_bisnis` varchar(15) NOT NULL,
  `favicon` text NOT NULL,
  `logo` text NOT NULL,
  `base_url` text NOT NULL,
  PRIMARY KEY (`id_setting_general`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_general`
--

INSERT INTO `setting_general` (`id_setting_general`, `title_page`, `kata_kunci`, `deskripsi`, `alamat_bisnis`, `email_bisnis`, `telepon_bisnis`, `favicon`, `logo`, `base_url`) VALUES
(1, 'Insan Muamalah', 'Koperasi', 'Aplikasi POS Koperasi', 'Jalan RE Martadinata No 108 Ancaran Kuningan', 'dhiforester@gmail.com', '0232876240', 'dcca66866a9303c4b9c5d7f088e66d.jpg', '1b682d94a616003a0acd393e31b98f.jpg', 'http://localhost:81/Koperasi-Master/Aplikasi');

-- --------------------------------------------------------

--
-- Table structure for table `shu_rincian`
--

DROP TABLE IF EXISTS `shu_rincian`;
CREATE TABLE IF NOT EXISTS `shu_rincian` (
  `id_shu_rincian` int(15) NOT NULL AUTO_INCREMENT,
  `id_shu_session` int(15) NOT NULL,
  `id_anggota` int(15) NOT NULL,
  `nama_anggota` text NOT NULL,
  `simpanan` int(15) DEFAULT NULL,
  `pinjaman` int(15) DEFAULT NULL,
  `penjualan` int(15) DEFAULT NULL,
  `jasa_simpanan` int(15) DEFAULT NULL,
  `jasa_pinjaman` int(15) DEFAULT NULL,
  `jasa_penjualan` int(15) DEFAULT NULL,
  `shu` int(15) DEFAULT NULL,
  PRIMARY KEY (`id_shu_rincian`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shu_rincian`
--

INSERT INTO `shu_rincian` (`id_shu_rincian`, `id_shu_session`, `id_anggota`, `nama_anggota`, `simpanan`, `pinjaman`, `penjualan`, `jasa_simpanan`, `jasa_pinjaman`, `jasa_penjualan`, `shu`) VALUES
(61, 1, 2, 'Didi Muhadi', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(62, 1, 3, 'Syamsul Maarif', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(63, 1, 4, 'Ade Triyana', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(64, 1, 5, 'Fikri Renaldy', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(65, 1, 6, 'Bayu Anugerah', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(66, 1, 7, 'Solihul Hadi', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(67, 1, 8, 'Iwan Kurniawan', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(69, 1, 10, 'Hendy Yayat', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(71, 1, 12, 'Eti Rusmiati', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(72, 1, 13, 'Elly Wijaya Nu', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(73, 1, 14, 'Guruh Ardhianto', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(74, 1, 15, 'Eha Julaeha', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(76, 1, 17, 'Muhammad Iqbal', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(77, 1, 18, 'Acah Wiarsah', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(78, 1, 19, 'Ade Nuriman', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(79, 1, 20, 'Ai Siti Nurjami', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(80, 1, 21, 'Anri', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(81, 1, 22, 'Asep Pirmansyah', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(82, 1, 23, 'Asep Saepudin', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(83, 1, 24, 'Dadang Rosidi', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(85, 1, 26, 'Deni Hendriawan', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(86, 1, 27, 'Deniawati Lesta', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(87, 1, 28, 'Devi Nur Utami', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(88, 1, 29, 'Dewi Widiastuti', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(89, 1, 30, 'Diar Sukma Regi', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(91, 1, 25, 'Dadang Setiawan', 1500000, 500000, 100000, 150000, 500, 200, 150700),
(92, 1, 32, 'Dedeh Delawati', 1500000, 500000, 100000, 150000, 500, 200, 150700);

-- --------------------------------------------------------

--
-- Table structure for table `shu_session`
--

DROP TABLE IF EXISTS `shu_session`;
CREATE TABLE IF NOT EXISTS `shu_session` (
  `id_shu_session` int(15) NOT NULL AUTO_INCREMENT,
  `sesi_shu` varchar(30) NOT NULL,
  `periode_hitung1` varchar(30) NOT NULL,
  `periode_hitung2` varchar(30) NOT NULL,
  `modal_anggota` int(20) DEFAULT NULL,
  `penjualan` int(20) DEFAULT NULL,
  `pinjaman` int(20) DEFAULT NULL,
  `jasa_modal_anggota` int(20) DEFAULT NULL,
  `laba_penjualan` int(20) DEFAULT NULL,
  `jasa_pinjaman` int(20) DEFAULT NULL,
  `persen_usaha` int(20) DEFAULT NULL,
  `persen_modal` int(20) DEFAULT NULL,
  `persen_pinjaman` int(15) DEFAULT NULL,
  `alokasi_hitung` int(20) DEFAULT NULL,
  `alokasi_nyata` int(30) DEFAULT NULL,
  `status` varchar(20) NOT NULL COMMENT 'Pending, Realisasi',
  PRIMARY KEY (`id_shu_session`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shu_session`
--

INSERT INTO `shu_session` (`id_shu_session`, `sesi_shu`, `periode_hitung1`, `periode_hitung2`, `modal_anggota`, `penjualan`, `pinjaman`, `jasa_modal_anggota`, `laba_penjualan`, `jasa_pinjaman`, `persen_usaha`, `persen_modal`, `persen_pinjaman`, `alokasi_hitung`, `alokasi_nyata`, `status`) VALUES
(1, 'SHU tahun 2023', '2023-01-01', '2023-02-11', 40500000, 2700000, 13500000, 4050000, 5400, 13500, 40, 10, 50, 10000000, 10000000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

DROP TABLE IF EXISTS `simpanan`;
CREATE TABLE IF NOT EXISTS `simpanan` (
  `id_simpanan` int(15) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(15) NOT NULL,
  `id_akses` int(15) NOT NULL,
  `nama` text NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL COMMENT 'Simpanan Pokok\r\nSimpanan Wajib\r\nSimpanan Sukarela\r\nPenarikan',
  `keterangan` text,
  `jumlah` varchar(30) NOT NULL,
  PRIMARY KEY (`id_simpanan`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `id_akses`, `nama`, `tanggal`, `kategori`, `keterangan`, `jumlah`) VALUES
(1, 2, 1, 'Didi Muhadi', '2023-01-01', 'Simpanan Wajib', 'Simpanan Bulan Januari 2023', '100000'),
(2, 3, 1, 'Syamsul Maarif', '01-22-23', 'Simpanan Wajib', 'Simpanan Bulan Januari 2023', '100000'),
(4, 3, 1, 'Syamsul Maarif', '01-22-23', 'Simpanan Pokok', 'Simpanan Pokok 2', '20000'),
(5, 2, 1, 'Didi Muhadi', '2023-01-24', 'Simpanan Pokok', 'Simpanan Pokok 3', '35000'),
(6, 32, 1, 'Dedeh Delawati', '2023-01-29', 'Simpanan Pokok', 'Simpanan pertama', '100000'),
(7, 3, 1, 'Syamsul Maarif', '2023-02-13', 'Penarikan', 'Penarikan dana untuk pelunasan', '10000'),
(8, 3, 1, 'Syamsul Maarif', '2022-01-01', 'Simpanan Wajib', 'Simpanan Wajib Januari 2022', '100000'),
(9, 3, 1, 'Syamsul Maarif', '2022-02-01', 'Simpanan Wajib', 'Simpanan Wajib Februari 2022', '100000'),
(10, 3, 1, 'Syamsul Maarif', '2022-03-15', 'Simpanan Wajib', 'Simpanan Wajib Maret 2022', '100000'),
(11, 3, 1, 'Syamsul Maarif', '2022-04-01', 'Simpanan Wajib', 'Simpanan Wajib April 2022', '100000'),
(12, 2, 1, 'Didi Muhadi', '2022-05-01', 'Simpanan Wajib', 'Simpanan wajib mei 2022', '100000'),
(13, 5, 1, 'Fikri Renaldy', '2022-01-01', 'Simpanan Pokok', '', '100000'),
(14, 5, 1, 'Fikri Renaldy', '2022-01-25', 'Simpanan Wajib', '', '50000'),
(15, 5, 1, 'Fikri Renaldy', '2022-02-01', 'Simpanan Wajib', '', '50000'),
(16, 5, 1, 'Fikri Renaldy', '2022-05-01', 'Simpanan Pokok', '', '50000'),
(17, 5, 1, 'Fikri Renaldy', '2022-06-01', 'Simpanan Pokok', '', '50000'),
(18, 5, 1, 'Fikri Renaldy', '2022-06-01', 'Simpanan Wajib', '', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `stok_opename`
--

DROP TABLE IF EXISTS `stok_opename`;
CREATE TABLE IF NOT EXISTS `stok_opename` (
  `id_stok_opename` int(15) NOT NULL AUTO_INCREMENT,
  `id_akses` int(15) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_stok_opename`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_opename`
--

INSERT INTO `stok_opename` (`id_stok_opename`, `id_akses`, `tanggal`, `status`) VALUES
(2, 1, '2023-02-25', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `stok_opename_barang`
--

DROP TABLE IF EXISTS `stok_opename_barang`;
CREATE TABLE IF NOT EXISTS `stok_opename_barang` (
  `id_stok_opename_barang` int(20) NOT NULL AUTO_INCREMENT,
  `id_stok_opename` int(20) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `nama_barang` text NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `stok_awal` int(15) NOT NULL,
  `stok_akhir` int(15) NOT NULL,
  `stok_gap` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `jumlah` int(20) NOT NULL,
  PRIMARY KEY (`id_stok_opename_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_opename_barang`
--

INSERT INTO `stok_opename_barang` (`id_stok_opename_barang`, `id_stok_opename`, `id_barang`, `nama_barang`, `satuan`, `stok_awal`, `stok_akhir`, `stok_gap`, `harga`, `jumlah`) VALUES
(1, 2, 3, 'Anlene Gold Cokelat 250g', 'DUS', 90, 80, -10, 38000, 3040000),
(2, 2, 45, 'Bango Manis 60ml', 'pcs', 90, 78, -12, 2400, 187200),
(3, 2, 41, 'Bango Pouch 400ml', 'PCH', 101, 120, 19, 15520, 1862400),
(4, 2, 9, 'Bango Soya Manis 20ml', 'RCG', 99, 99, 0, 9600, 950400),
(5, 2, 91, 'Blue Band Serbaguna 200g', 'PCS', 100, 109, 9, 6733333, 733933297),
(6, 2, 2, 'Boneeto Coklat 115ml', 'KTK', 100, 100, 0, 2600, 260000),
(7, 2, 1, 'Boneeto Stoberi 115ml', 'KTK', 99, 87, -12, 2600, 226200),
(8, 2, 25, 'Citra Nat Glow 120ml', 'BTL', 100, 54, -46, 9750, 526500),
(9, 2, 26, 'Citra Nat Glow 230ml', 'BTL', 102, 100, -2, 17150, 1715000),
(10, 2, 27, 'Citra Nat Glow 60ml', 'BTL', 99, 90, -9, 5450, 490500),
(11, 2, 24, 'Citra Pearly white 120ml', 'BTL', 102, 12, -90, 9750, 117000),
(12, 2, 28, 'Citra Pearly White 60ml', 'BAG', 100, 100, 0, 5450, 545000),
(13, 2, 29, 'Citra Pearly White Uv 230ml', 'BTL', 100, 100, 0, 17150, 1715000),
(14, 2, 15, 'Citra Rcg 9ml', 'RCG', 100, 100, 0, 4500, 450000),
(15, 2, 19, 'Clear Anti Ketombe 10ml', 'RCG', 100, 100, 0, 4650, 465000),
(16, 2, 95, 'Clear Complete Soft Care 10ml Unisex', 'pcs', 100, 100, 0, 783125, 78312500),
(17, 2, 22, 'Clear Complete Soft Care 80ml', 'BTL', 100, 100, 0, 9100, 910000),
(18, 2, 20, 'Clear Cool Sport Menthol 80ml', 'BTL', 100, 100, 0, 9700, 970000),
(19, 2, 18, 'Clear Ice Cool 10ml', 'RCG', 100, 100, 0, 4650, 465000),
(20, 2, 21, 'Clear Ice Cool Menthol 80ml', 'BTL', 100, 100, 0, 9100, 910000),
(21, 2, 17, 'Clear Superfresh Apple 80ml', 'BTL', 100, 100, 0, 9100, 910000),
(22, 2, 10, 'Dove Dandruff 20ml', 'RCG', 100, 100, 0, 4500, 450000),
(23, 2, 11, 'Dove Rambut Rontok 20ml', 'RCG', 100, 100, 0, 4500, 450000),
(24, 2, 44, 'Korek Gas', 'PCS', 95, 95, 0, 2400, 228000),
(25, 2, 92, 'Lifebuoy Anti - Dandruff 70ml', 'BTL', 100, 100, 0, 6850, 685000),
(26, 2, 94, 'Lifebuoy Anti Hair Fall 70ml', 'BTL', 100, 100, 0, 6850, 685000),
(27, 2, 98, 'Lifebuoy Hairfall Trmt 9ml', 'RCG', 97, 97, 0, 2250, 218250),
(28, 2, 63, 'Lifebuoy Lemon Fresh', 'BH', 100, 100, 0, 2700, 270000),
(29, 2, 96, 'Lifebuoy Lemon Fresh 250ml', 'REF', 100, 100, 0, 13150, 1315000),
(30, 2, 97, 'Lifebuoy Lemon Fresh 450ml', 'REF', 100, 100, 0, 21700, 2170000),
(31, 2, 16, 'Lifebuoy Matcha 250ml', 'REF', 100, 100, 0, 13150, 1315000),
(32, 2, 64, 'Lifebuoy Mild Care 80g', 'BH', 100, 100, 0, 2700, 270000),
(33, 2, 93, 'Lifebuoy Strong & Shiny 70 ml', 'BTL', 100, 100, 0, 6850, 685000),
(34, 2, 62, 'Lifebuoy Vita Protect', 'BH', 100, 100, 0, 2700, 270000),
(35, 2, 85, 'Lux Aqua Delight 450ml', 'PCH', 100, 100, 0, 20320, 2032000),
(36, 2, 88, 'Lux Aqua Delight 80g', 'BH', 100, 100, 0, 2800, 280000),
(37, 2, 82, 'Lux Magical Spell 250ml', 'REF', 100, 100, 0, 12114, 1211400),
(38, 2, 87, 'Lux Magical Spell 80g', 'BH', 100, 100, 0, 2800, 280000),
(39, 2, 84, 'Lux Soft Rose 250ml', 'REF', 100, 100, 0, 12114, 1211400),
(40, 2, 86, 'Lux Soft Rose 450ml', 'PCS', 100, 100, 0, 20320, 2032000),
(41, 2, 89, 'Lux Velvet Jasmine 80g', 'BH', 100, 100, 0, 2800, 280000),
(42, 2, 83, 'Lux Velvet Pouch 250ml', 'PCS', 100, 100, 0, 12112, 1211200),
(43, 2, 4, 'Max Tea Tarik', 'RCG', 100, 100, 0, 15250, 1525000),
(44, 2, 33, 'Molto All In One Biru 11ml', 'RCG', 100, 100, 0, 4680, 468000),
(45, 2, 32, 'Molto All In1 Pink 11ml', 'RCG', 100, 100, 0, 4680, 468000),
(46, 2, 39, 'Molto Detergen cair glowing Elegance 700ml', 'REF', 100, 100, 0, 14375, 1437500),
(47, 2, 40, 'Molto Detergent 40gr', 'SCH', 100, 100, 0, 908333, 90833300),
(48, 2, 13, 'Molto Edp Purple 10ml', 'RCG', 100, 100, 0, 4680, 468000),
(49, 2, 46, 'Molto Higiene Perisai Aktif 12ml', 'SCH', 100, 100, 0, 426111, 42611100),
(50, 2, 12, 'Molto Luxury Rose 10ml', 'KTG', 100, 100, 0, 4680, 468000),
(51, 2, 55, 'Molto Pewangi Blue 900ml', 'REF', 100, 100, 0, 10100, 1010000),
(52, 2, 56, 'Molto Pewangi Floral Bliss 450 ml', 'REF', 100, 100, 0, 5208, 520800),
(53, 2, 54, 'Molto Pewangi Pink 900ml', 'REF', 100, 100, 0, 10100, 1010000),
(54, 2, 23, 'Molto Pure 10ml', 'RCG', 100, 100, 0, 4680, 468000),
(55, 2, 5, 'Pepsodent Herbal 75g', 'PCS', 100, 100, 0, 6600, 660000),
(56, 2, 6, 'Pepsodent White 75g', 'PCS', 100, 100, 0, 3875, 387500),
(57, 2, 73, 'Pons White Beauty Foam 50g', 'TUB', 100, 100, 0, 16300, 1630000),
(58, 2, 100, 'Pulsa Telkomsel 5000', 'Rp', 200, 200, 0, 5000, 1000000),
(59, 2, 99, 'Pulsa Tree 5000', 'Rp', 100, 100, 0, 5000, 500000),
(60, 2, 77, 'Rexona Free Spirit 50ml', 'BH', 99, 99, 0, 13550, 1341450),
(61, 2, 78, 'Rexona Men Cool Ice 50ml', 'BH', 100, 100, 0, 13550, 1355000),
(62, 2, 75, 'Rexona Motionsense', 'BH', 100, 100, 0, 13550, 1355000),
(63, 2, 76, 'Rexona Powder Dry 45ml', 'BTL', 100, 100, 0, 13550, 1355000),
(64, 2, 53, 'Rinso Anti Noda 430g', 'PCS', 95, 95, 0, 9500, 902500),
(65, 2, 81, 'Rinso Anti Noda 44g', 'RCG', 100, 100, 0, 4830, 483000),
(66, 2, 8, 'Rinso Cair 21ml', 'RCG', 100, 100, 0, 2400, 240000),
(67, 2, 42, 'Rinso Cair Essence Pouch', 'PCH', 100, 100, 0, 4074, 407400),
(68, 2, 14, 'Rinso Cair Gentle Pouch 200ml', 'PCH', 100, 100, 0, 3977, 397700),
(69, 2, 43, 'Rinso Cair Rose Fresh Pouch', 'PCH', 100, 100, 0, 4074, 407400),
(70, 2, 80, 'Rinso Molto 44g', 'RCG', 100, 100, 0, 4830, 483000),
(71, 2, 30, 'Rinso Molto Cair Royal Gold', 'RCG', 100, 100, 0, 4830, 483000),
(72, 2, 38, 'Rinso Molto Essence 770g', 'BAG', 100, 100, 0, 18050, 1805000),
(73, 2, 49, 'Rinso Molto Pink 250g', 'BKS', 100, 100, 0, 4200, 420000),
(74, 2, 31, 'Rinso Royal Gold 770g', 'PCS', 100, 100, 0, 17508, 1750800),
(75, 2, 47, 'Royco Fds Sapi 9g', 'RCG', 100, 100, 0, 4479167, 447916700),
(76, 2, 59, 'Sariwangi Kotak 1,85g', 'KTK', 100, 100, 0, 4800021, 480002100),
(77, 2, 58, 'Sariwangi Kotak Tb 50', 'PAK', 100, 100, 0, 9249, 924900),
(78, 2, 34, 'Sunlight Habbatus Pouch 100ml', 'PCS', 100, 100, 0, 1488, 148800),
(79, 2, 57, 'Sunlight Lime 400ml', 'PCH', 100, 100, 0, 9000, 900000),
(80, 2, 7, 'Sunlight Lime Cream', 'PCS', 100, 100, 0, 4500, 450000),
(81, 2, 61, 'Sunlight Lime Pouch 210ml', 'REF', 100, 100, 0, 4300, 430000),
(82, 2, 35, 'Sunlight Lime Pouch 435ml', 'REF', 100, 100, 0, 9308333, 930833300),
(83, 2, 79, 'Sunlight Lime Pouch 45ml', 'SCH', 100, 100, 0, 825, 82500),
(84, 2, 74, 'Sunlight Lime Pouch 95ml', 'BKS', 98, 98, 0, 1600, 156800),
(85, 2, 51, 'Super Pell Pouch 380ml', 'PCH', 100, 100, 0, 5529, 552900),
(86, 2, 52, 'Super Pell Pouch Cherry Rose', 'PCH', 100, 100, 0, 9744, 974400),
(87, 2, 48, 'Vixal Pemb Pors Biru 200ml', 'BTL', 100, 100, 0, 4200, 420000),
(88, 2, 36, 'Wifol Karbol 500ml', 'PCS', 100, 100, 0, 8600, 860000),
(89, 2, 50, 'Wipol Classic Pine 450 ml', 'REF', 100, 100, 0, 11625, 1162500),
(90, 2, 37, 'Wipol Karbol 240ml', 'PCH', 100, 100, 0, 4249, 424900);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` int(10) NOT NULL AUTO_INCREMENT,
  `nama_supplier` text NOT NULL,
  `alamat_supplier` text,
  `email_supplier` text,
  `kontak_supplier` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `email_supplier`, `kontak_supplier`) VALUES
(1, 'PT.Kimia Farma', 'Jalan anggrek 4 no 15', 'kimiafarma@gmail.com', '2176444553'),
(2, 'PT.Sanbe Farma', 'Jalan Raya Pasar Pagi No 14', 'sanbefarma@gmail.com', '2315634512'),
(5, 'PT. RAJAWALI NUSINDO', 'Jalan anggrek 4 no 15 - 02315634544', 'rajawalinusindo@gmail.com', '2315634544'),
(6, 'PT.Armala Putra', 'Jalan Anggrek 4 no 15', 'armalaputra@gmail.com', '23254647'),
(7, 'CV. SANITA KARUNIA MANDIRI', 'Jalan Raya Pasar Pagi No 14', 'mandirikaruniasanita@gmail.com', '2176444553'),
(8, 'PT. MTA ALKES INDO', 'Jalan Raya Pasar Pagi No 14', '123@GMAIL.COM', '2176444553'),
(9, 'PT.Indah Medis Jaya', 'Jalan Siliwangi no 15', 'indahmedis@gmail.com', '2328765585'),
(10, 'PT.Wings Food', 'Jalan Raya Pasar Pagi No 14', 'wingsfood@gmail.com', '227856'),
(13, 'PT.Indah Medis Jaya', 'Jalan Raya Pasar Pagi No 142', 'wingsfood22@gmail.com', '2278562'),
(14, 'PT.Indofood tbk', 'Jalamn', 'indofood@gmail.com', '345345667'),
(15, 'JVC Kuningan', 'Jalamn', 'jvc@gmail.com', '4235456'),
(16, 'PT.Medic Islam', 'Jalan Hayam Wuruk no 12 Jakarta timur', 'MedicIsalam@gmail.com', '22546467'),
(17, 'PTT.Indah Permai', 'Jalan Raya Pasar Pagi No 14', 'indahpermai@gmail.com', '123123'),
(18, 'PTT.Indah Permai2', 'Jalan Raya Pasar Pagi No 14', 'indahpermai2@gmail.com', '12121212');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses` int(10) DEFAULT NULL,
  `id_anggota` int(10) DEFAULT NULL,
  `id_supplier` int(10) DEFAULT NULL,
  `tanggal` varchar(25) DEFAULT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `tagihan` int(15) DEFAULT NULL,
  `pembayaran` int(15) DEFAULT NULL,
  `kembalian` int(15) DEFAULT NULL,
  `metode` varchar(15) DEFAULT NULL,
  `keterangan` text,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_akses`, `id_anggota`, `id_supplier`, `tanggal`, `kategori`, `tagihan`, `pembayaran`, `kembalian`, `metode`, `keterangan`, `status`) VALUES
(1, 1, 32, 0, '2023-02-01 09:07', 'Penjualan', 156200, 156200, 0, '', '', 'Lunas'),
(2, 1, 0, 18, '2023-02-01 11:17', 'Pembelian', 59180, 59180, 0, '', '', 'Lunas'),
(3, 1, 0, 18, '2023-02-01 11:20', 'Pembelian', 58972, 58972, 0, '', '', 'Lunas'),
(4, 1, 0, 18, '2023-02-01 11:20', 'Pembelian', 58972, 58972, 0, 'Cash', '', 'Lunas'),
(5, 1, 0, 18, '2023-02-01 11:20', 'Penjualan', 58972, 58972, 0, 'Cash', '', 'Lunas'),
(6, 1, 32, 0, '2023-02-01 17:31', 'Penjualan', 152000, 114000, 0, 'Cash', 'Kelompok taman hias', 'Lunas'),
(7, 1, 0, 16, '2023-02-02 08:31', 'Pembelian', 125400, 125400, 0, 'Cash', '', 'Lunas'),
(8, 1, 0, 6, '2023-02-02 13:09', 'Pembelian', 1000000, 1000000, 0, 'Cash', 'Pembelian Aplikasi Kasir', 'Lunas'),
(9, 1, 3, 0, '2023-02-13 20:59', 'Penjualan', 2640, 2640, 0, 'Cash', '', 'Lunas'),
(10, 1, 32, 0, '2023-02-13 21:00', 'Penjualan', 40400, 2640, 0, 'Cash', '', 'Lunas'),
(11, 1, 32, 0, '2023-02-13 21:05', 'Penjualan', 5995, 5995, 0, 'Cash', '', 'Lunas'),
(12, 1, 32, 0, '2023-02-13 21:06', 'Penjualan', 13200, 13200, 0, 'Cash', '', 'Lunas'),
(13, 1, 32, 0, '2023-02-14 14:31', 'Penjualan', 2860, 2860, 0, 'Cash', '', 'Lunas'),
(14, 1, 5, 0, '2022-01-01 14:16', 'Penjualan', 16665, 16665, 0, 'Cash', '', 'Lunas'),
(15, 1, 5, 0, '2022-05-04 14:17', 'Penjualan', 7920, 7920, 0, 'Cash', '', 'Lunas'),
(16, 1, 5, 0, '2023-02-23 14:18', 'Penjualan', 52250, 52250, 0, 'Cash', '', 'Lunas'),
(17, 1, 5, 0, '2022-02-02 14:19', 'Penjualan', 17072, 17072, 0, 'Cash', '', 'Lunas'),
(18, 1, 5, 0, '2022-02-23 14:20', 'Penjualan', 167200, 167200, 0, 'Cash', '', 'Lunas'),
(19, 1, 5, 0, '2023-02-23 14:45', 'Penjualan', 7406666, 7406666, 0, 'Cash', '', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembayaran`
--

DROP TABLE IF EXISTS `transaksi_pembayaran`;
CREATE TABLE IF NOT EXISTS `transaksi_pembayaran` (
  `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) DEFAULT NULL,
  `id_akses` int(10) DEFAULT NULL,
  `id_anggota` int(15) DEFAULT NULL,
  `id_supplier` int(15) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `tanggal` varchar(30) NOT NULL,
  `metode` varchar(20) NOT NULL,
  `jumlah` int(15) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pembayaran`
--

INSERT INTO `transaksi_pembayaran` (`id_pembayaran`, `id_transaksi`, `id_akses`, `id_anggota`, `id_supplier`, `kategori`, `tanggal`, `metode`, `jumlah`, `keterangan`) VALUES
(27, 8, 1, 0, 6, 'Pembelian', '2023-02-04 16:36', 'Cash', 1000000, 'test'),
(28, 9, 1, 0, 0, 'Penerimaan', '2023-02-04 18:22', 'Cash', 25000, ''),
(29, 9, 1, 3, 0, 'Penjualan', '2023-02-13 20:59', 'Cash', 2640, ''),
(30, 10, 1, 32, 0, 'Penjualan', '2023-02-13 21:00', 'Cash', 2640, ''),
(31, 11, 1, 32, 0, 'Penjualan', '2023-02-13 21:05', 'Cash', 5995, ''),
(32, 12, 1, 32, 0, 'Penjualan', '2023-02-13 21:06', 'Cash', 13200, ''),
(33, 13, 1, 32, 0, 'Penjualan', '2023-02-14 14:31', 'Cash', 2860, ''),
(34, 14, 1, 5, 0, 'Penjualan', '2022-01-01 14:16', 'Cash', 16665, ''),
(35, 15, 1, 5, 0, 'Penjualan', '2023-02-23 14:17', 'Cash', 7920, ''),
(36, 16, 1, 5, 0, 'Penjualan', '2023-02-23 14:18', 'Cash', 52250, ''),
(37, 17, 1, 5, 0, 'Penjualan', '2022-02-02 14:19', 'Cash', 17072, ''),
(38, 18, 1, 5, 0, 'Penjualan', '2023-02-23 14:20', 'Cash', 167200, ''),
(39, 19, 1, 5, 0, 'Penjualan', '2023-02-23 14:45', 'Cash', 7406666, '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_ppn`
--

DROP TABLE IF EXISTS `transaksi_ppn`;
CREATE TABLE IF NOT EXISTS `transaksi_ppn` (
  `id_transaksi_ppn` int(15) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(15) DEFAULT NULL,
  `id_akses` int(15) NOT NULL,
  `ppn_persen` int(15) NOT NULL,
  `ppn_rp` int(15) NOT NULL,
  PRIMARY KEY (`id_transaksi_ppn`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_ppn`
--

INSERT INTO `transaksi_ppn` (`id_transaksi_ppn`, `id_transaksi`, `id_akses`, `ppn_persen`, `ppn_rp`) VALUES
(1, 0, 1, 10, 673333),
(3, 7, 1, 10, 11400);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_rincian`
--

DROP TABLE IF EXISTS `transaksi_rincian`;
CREATE TABLE IF NOT EXISTS `transaksi_rincian` (
  `id_transaksi_rincian` int(15) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(15) DEFAULT NULL,
  `id_akses` varchar(10) DEFAULT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `id_barang_harga` varchar(15) DEFAULT NULL,
  `id_barang_satuan` varchar(15) DEFAULT NULL,
  `id_anggota` int(10) DEFAULT NULL,
  `id_supplier` int(10) DEFAULT NULL,
  `tanggal` varchar(30) DEFAULT NULL,
  `kategori_rincian` varchar(20) DEFAULT NULL COMMENT 'Barang, Lainnya',
  `nama_barang` text,
  `harga` int(15) DEFAULT NULL,
  `qty` int(15) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `jumlah` int(15) DEFAULT NULL,
  `updatetime` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_rincian`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_rincian`
--

INSERT INTO `transaksi_rincian` (`id_transaksi_rincian`, `id_transaksi`, `id_akses`, `id_barang`, `id_barang_harga`, `id_barang_satuan`, `id_anggota`, `id_supplier`, `tanggal`, `kategori_rincian`, `nama_barang`, `harga`, `qty`, `satuan`, `jumlah`, `updatetime`) VALUES
(4, '1', '1', '98', '120', '0', 32, 0, '2023-02-01 09:07', 'Barang', 'Lifebuoy Hairfall Trmt 9ml', 5000, 3, 'RCG', 15000, '2023-01-31 02:32:14'),
(8, '1', '1', '3', '0', '0', 32, 0, '2023-02-01 09:07', 'Barang', 'Anlene Gold Cokelat 250g', 38000, 1, 'DUS', 38000, '2023-01-31 17:56:31'),
(9, '1', '1', '45', '0', '0', 32, 0, '2023-02-01 09:07', 'Barang', 'Bango Manis 60ml', 2400, 1, 'pcs', 2400, '2023-01-31 23:10:45'),
(10, '1', '1', '9', '0', '0', 32, 0, '2023-02-01 09:07', 'Barang', 'Bango Soya Manis 20ml', 9600, 1, 'RCG', 9600, '2023-01-31 23:11:09'),
(13, '1', '1', '3', '0', '0', 32, 0, '2023-02-01 09:07', 'Barang', 'Anlene Gold Cokelat 250g', 38000, 1, 'DUS', 38000, '2023-01-31 23:45:05'),
(14, '1', '1', '0', '0', '0', 32, 0, '2023-02-01 09:07', 'Lainnya', 'Transportasi', 15000, 2, 'Ongkos', 30000, '2023-02-01 15:37:28'),
(15, '1', '1', '3', '34', '0', 32, 0, '2023-02-01 09:07', 'Barang', 'Anlene Gold Cokelat 250g', 9000, 1, 'DUS', 9000, '2023-02-01 15:52:10'),
(16, '2', '1', '26', '0', '0', 0, 18, '2023-02-01 11:17', 'Barang', 'Citra Nat Glow 230ml', 17150, 2, 'BTL', 34300, '2023-02-01 18:16:58'),
(17, '2', '1', '24', '55', '0', 0, 18, '2023-02-01 11:17', 'Barang', 'Citra Pearly white 120ml', 9750, 2, 'BTL', 19500, '2023-02-01 18:17:08'),
(18, '3', '1', '3', '0', '0', 0, 18, '2023-02-01 11:20', 'Barang', 'Anlene Gold Cokelat 250g', 38000, 1, 'DUS', 38000, '2023-02-01 18:20:01'),
(19, '3', '1', '41', '0', '0', 0, 18, '2023-02-01 11:20', 'Barang', 'Bango Pouch 400ml', 15520, 1, 'PCH', 15520, '2023-02-01 18:20:10'),
(20, '3', '1', '0', '0', '0', 0, 18, '2023-02-01 11:20', 'Lainnya', 'asdasd', 100, 1, 'test', 100, '2023-02-01 18:20:25'),
(21, '6', '1', '3', '0', '0', 32, 0, '2023-02-01 17:31', 'Barang', 'Anlene Gold Cokelat 250g', 38000, 4, 'DUS', 152000, '2023-02-02 00:31:04'),
(35, '7', '1', '3', '0', '0', 0, 16, '2023-02-02 18:12:38', 'Barang', 'Anlene Gold Cokelat 250g', 38000, 1, 'DUS', 38000, '2023-02-02 18:12:38'),
(36, '7', '1', '3', '0', '0', 0, 16, '2023-02-02 18:21:10', 'Barang', 'Anlene Gold Cokelat 250g', 38000, 1, 'DUS', 38000, '2023-02-02 18:21:10'),
(37, '7', '1', '3', '0', '0', 0, 16, '2023-02-02 18:21:27', 'Barang', 'Anlene Gold Cokelat 250g', 38000, 1, 'DUS', 38000, '2023-02-02 18:21:27'),
(41, '9', '1', '45', '0', '0', 3, 0, '2023-02-13 20:59', 'Barang', 'Bango Manis 60ml', 2400, 1, 'pcs', 2400, '2023-02-14 03:59:32'),
(42, '10', '1', '45', '0', '0', 32, 0, '2023-02-13 21:00', 'Barang', 'Bango Manis 60ml', 2400, 1, 'pcs', 2400, '2023-02-14 04:00:22'),
(43, '10', '1', '3', '0', '0', 32, 0, '2023-02-14 04:04:45', 'Barang', 'Anlene Gold Cokelat 250g', 38000, 1, 'DUS', 38000, '2023-02-14 04:04:45'),
(44, '11', '1', '27', '0', '0', 32, 0, '2023-02-13 21:05', 'Barang', 'Citra Nat Glow 60ml', 5450, 1, 'BTL', 5450, '2023-02-14 04:05:35'),
(45, '12', '1', '44', '0', '0', 32, 0, '2023-02-13 21:06', 'Barang', 'Korek Gas', 2400, 5, 'PCS', 12000, '2023-02-14 04:06:12'),
(46, '13', '1', '1', '0', '0', 32, 0, '2023-02-14 14:31', 'Barang', 'Boneeto Stoberi 115ml', 2600, 1, 'KTK', 2600, '2023-02-14 21:31:02'),
(47, '14', '1', '77', '0', '0', 5, 0, '2022-01-01 14:16', 'Barang', 'Rexona Free Spirit 50ml', 13550, 1, 'BH', 13550, '2023-02-23 21:16:17'),
(48, '14', '1', '74', '0', '0', 5, 0, '2022-01-01 14:16', 'Barang', 'Sunlight Lime Pouch 95ml', 1600, 2, 'BKS', 1600, '2023-02-23 21:16:35'),
(49, '15', '1', '45', '0', '0', 5, 0, '2023-02-23 14:17', 'Barang', 'Bango Manis 60ml', 2400, 3, 'pcs', 7200, '2023-02-23 21:17:30'),
(50, '16', '1', '53', '0', '0', 5, 0, '2023-02-23 14:18', 'Barang', 'Rinso Anti Noda 430g', 9500, 5, 'PCS', 47500, '2023-02-23 21:18:27'),
(51, '17', '1', '41', '0', '0', 5, 0, '2022-02-02 14:19', 'Barang', 'Bango Pouch 400ml', 15520, 1, 'PCH', 15520, '2023-02-23 21:19:32'),
(52, '18', '1', '3', '0', '0', 5, 0, '2023-02-23 14:20', 'Barang', 'Anlene Gold Cokelat 250g', 38000, 4, 'DUS', 152000, '2023-02-23 21:20:27'),
(53, '19', '1', '91', '0', '0', 5, 0, '2023-02-23 14:45', 'Barang', 'Blue Band Serbaguna 200g', 6733333, 1, 'PCS', 6733333, '2023-02-23 21:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_sementara`
--

DROP TABLE IF EXISTS `transaksi_sementara`;
CREATE TABLE IF NOT EXISTS `transaksi_sementara` (
  `id_transaksi_sementara` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses` int(10) NOT NULL,
  `id_anggota` int(10) DEFAULT NULL,
  `id_supplier` int(10) DEFAULT NULL,
  `tanggal` varchar(25) DEFAULT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `metode` varchar(25) DEFAULT NULL,
  `keterangan` text,
  `pembayaran` int(15) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_sementara`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_setting`
--

DROP TABLE IF EXISTS `transaksi_setting`;
CREATE TABLE IF NOT EXISTS `transaksi_setting` (
  `id_transaksi_setting` int(15) NOT NULL AUTO_INCREMENT,
  `id_akses` int(15) NOT NULL,
  `ppn` varchar(20) NOT NULL,
  `ppn_set_persen` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_setting`
--

INSERT INTO `transaksi_setting` (`id_transaksi_setting`, `id_akses`, `ppn`, `ppn_set_persen`) VALUES
(1, 1, 'Yes', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
