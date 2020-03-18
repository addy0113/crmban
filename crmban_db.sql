-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 03:05 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crmban_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_beli`
--

CREATE TABLE IF NOT EXISTS `pelanggan_beli` (
  `id_pelanggan` int(12) NOT NULL AUTO_INCREMENT,
  `id_produk` int(12) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jumlah_beli` varchar(20) NOT NULL,
  `tanggal_beli` date NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `pelanggan_beli`
--

INSERT INTO `pelanggan_beli` (`id_pelanggan`, `id_produk`, `nama_pelanggan`, `no_hp`, `jumlah_beli`, `tanggal_beli`) VALUES
(2, 2, 'Grega Erlangga', '6285959371791', '3', '2019-09-06'),
(3, 2, 'Addy Kurniawan', '6285318933981', '4', '2019-08-07'),
(6, 1, 'Khresna Adelmunt', '6281322587216', '2', '2019-09-15'),
(7, 4, 'Agil Satriani', '6282216111694', '1', '2019-09-17'),
(8, 4, 'M fachri Ramadhan', '6289662288219', '3', '2019-09-22'),
(9, 15, 'Sandi Alfia', '6281312455558', '4', '2019-07-31'),
(10, 9, 'Rahmat Rifa''i', '6285934326633', '2', '2019-06-26'),
(11, 8, 'Rizal Ramadhan', '6281321092223', '3', '2019-05-22'),
(12, 10, 'Fauzi Ibrahim', '6285886907353', '2', '2019-04-18'),
(13, 12, 'Ilham Hambali', '6281809275658', '2', '2019-03-12'),
(14, 14, 'Gilang Rahmat', '6287722822248', '5', '2019-02-21'),
(15, 11, 'Yudha Guntara', '6281312741763', '3', '2019-01-16'),
(16, 6, 'Novi Hermansyah', '6285959371791', '6', '2019-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(15) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(30) NOT NULL,
  `ukuran_produk` varchar(30) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `ukuran_produk`) VALUES
(1, 'Ban Mobil Achiles Radial', '215/35 R18 84W'),
(2, 'Ban Mobil Achiles Radial', '215/45 R17 91W'),
(4, 'Oli Mesin Castrol Magnetic', '10W-40 4L'),
(5, 'Ban Mobil Achiles Radial', '185/70 R14 88H'),
(6, 'Ban Mobil GT Radial', '175/65 R13 80T'),
(7, 'Ban Mobil Gajah Tunggal Bias T', 'LT 5.50 - 13 8PR'),
(8, 'Ban Mobil Good Year Excellence', '225/55 R17 97Y'),
(9, 'Ban Mobil Bridgestone Tubeless', '215/45 R17 91V XL'),
(10, 'Ban Mobil Dunlop Tubeless', '155/80 R12 76S'),
(11, 'Oli Power Steering Prestone', '945 ML'),
(12, 'Oli Transmisi Shell Spirax', 'S3 G 80W 1L'),
(13, 'Oli Transmisi Top 1 ATF', 'DM-3 1L'),
(14, 'Oli Gardan STP', 'SAE 80W-90 945ML'),
(15, 'Oli / Minyak Rem Prestone', 'DOT 3 355ML');

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE IF NOT EXISTS `promosi` (
  `id_promosi` int(12) NOT NULL AUTO_INCREMENT,
  `judulpromo` varchar(30) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `id_pelanggan` varchar(500) NOT NULL,
  `tgl_akhir` date NOT NULL,
  PRIMARY KEY (`id_promosi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id_promosi`, `judulpromo`, `deskripsi`, `id_pelanggan`, `tgl_akhir`) VALUES
(1, 'Promosi Kusu Akhir Novemver 20', 'Diskon untuk semua merek ban modil ring 17', 'Addy Kurniawan', '2019-09-30'),
(2, 'Promosi Ban Dunlop', 'Kusus Pemasangan Langsung di Toko', 'Novi Hermansyah', '2019-09-30'),
(3, 'Promosi Oli Mesin 1 Liter', 'Kusus pemasangan di Toko', 'Novi Hermansyah', '2019-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `role` enum('adminop','adminsis','marketing') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `role`) VALUES
(4, 'adminop', '4dad374014e70340e84abeee1d6aa81f', 'Admin Oprasional', 'adminop'),
(5, 'dani', '1de40b91b65cca7cd0fe6c586bf9b58c', 'Dani Achmad', 'adminop'),
(7, 'administator', '$2y$10$p8qCoigSOQyCZQJBsSdU6O0XSweqaCW9eTME1T.o/Tp', 'Gilar Rahman', 'adminsis'),
(8, 'adminmar', '5d93d18e057003630faee68d2e8dd2a7', 'Admin Marketing', 'marketing'),
(9, 'adminsis', '4f63aa204a3a71af7d5d4ac76840bdb1', 'Admin Sistem', 'adminsis'),
(10, 'nopai', '75215e3a1cd14b6891aa068cc64ce3b5', 'Novi Herm', 'marketing');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
