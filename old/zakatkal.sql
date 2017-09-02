-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 30. Juli 2017 jam 23:05
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zakatkal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `password`) VALUES
('ade', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `kd_pembayara` varchar(20) NOT NULL,
  `no_rek_peng` varchar(13) NOT NULL,
  `status` enum('b','s') NOT NULL DEFAULT 'b',
  `rek_tujuan` varchar(13) NOT NULL,
  `tgl_konf` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kd_pembayara`, `no_rek_peng`, `status`, `rek_tujuan`, `tgl_konf`) VALUES
('201707160004', '2013141352', 'b', '2013141353', '0000-00-00 00:00:00'),
('201707160005', '', 'b', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `no_ktp` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `no_telp` int(20) NOT NULL,
  PRIMARY KEY (`no_ktp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `zakat`
--

CREATE TABLE IF NOT EXISTS `zakat` (
  `no_ktp` varchar(20) NOT NULL,
  `total_zakat` varchar(20) NOT NULL,
  `jns_zakat` varchar(20) NOT NULL,
  `kd_pembayara` varchar(12) NOT NULL,
  PRIMARY KEY (`kd_pembayara`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `zakat`
--

INSERT INTO `zakat` (`no_ktp`, `total_zakat`, `jns_zakat`, `kd_pembayara`) VALUES
('3275036602900021', '5000000', 'Mal', '201707090001'),
('3275036602900021', '100000', 'Mal', '201707090099'),
('360000000000000001', '12.775.000,00', 'EmasPerak', '201707160001'),
('360000000000000001', '12.775.000,00', 'EmasPerak', '201707160002'),
('', '', 'EmasPerak', '201707160003'),
('360000000000000002', '12.775.000,00', 'EmasPerak', '201707160004'),
('360000000000000003', '12.775.000,00', 'EmasPerak', '201707160005');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
