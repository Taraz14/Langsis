-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for langsis2
CREATE DATABASE IF NOT EXISTS `langsis2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `langsis2`;

-- Dumping structure for table langsis2.agama
CREATE TABLE IF NOT EXISTS `agama` (
  `agama_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agama_nama` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`agama_id`),
  UNIQUE KEY `agama_nama` (`agama_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.agama: ~4 rows (approximately)
DELETE FROM `agama`;
/*!40000 ALTER TABLE `agama` DISABLE KEYS */;
INSERT INTO `agama` (`agama_id`, `agama_nama`, `created_at`, `updated_at`) VALUES
	(1, 'Islam', '2021-10-11 03:32:17', '2021-10-11 03:32:18'),
	(2, 'Katolik', '2021-10-11 03:32:27', '2021-10-11 03:32:30'),
	(3, 'Kristen Protestan', '2021-10-11 03:32:42', '2021-10-11 03:32:43'),
	(4, 'Hindu', '2021-10-11 03:32:52', '2021-10-11 03:32:53'),
	(5, 'Budha', '2021-10-11 03:32:59', '2021-10-11 03:33:00');
/*!40000 ALTER TABLE `agama` ENABLE KEYS */;

-- Dumping structure for table langsis2.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `jurusan_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jurusan_kode` varchar(20) NOT NULL,
  `jurusan_nama` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`jurusan_id`),
  UNIQUE KEY `jurusan_kode` (`jurusan_kode`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.jurusan: ~5 rows (approximately)
DELETE FROM `jurusan`;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` (`jurusan_id`, `jurusan_kode`, `jurusan_nama`, `created_at`, `updated_at`) VALUES
	(6, 'AKL', 'Akuntansi Keuangan Lembaga', '2021-09-19 15:55:25', '0000-00-00 00:00:00'),
	(8, 'DPIB', 'Desain Pemodelan Industri dan Bisnis', '2021-09-19 17:30:20', '0000-00-00 00:00:00'),
	(11, 'TBSM', 'Teknik Bisnis Sepeda Motor', '2021-09-22 09:50:10', '0000-00-00 00:00:00'),
	(21, 'OTKP', 'Otomatisasi Tata Kelola Perkantoran', '2021-09-22 10:50:01', '0000-00-00 00:00:00'),
	(26, 'TKJ', 'Teknik Komputer dan Jaringan', '2021-09-23 12:00:32', '0000-00-00 00:00:00'),
	(33, 'TKRO', 'Teknik Kendaraan Ringan Otomotif', '2021-09-30 00:25:24', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;

-- Dumping structure for table langsis2.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(50) NOT NULL,
  `kategori_bobot` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`kategori_id`),
  UNIQUE KEY `kategori_nama` (`kategori_nama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.kategori: ~0 rows (approximately)
DELETE FROM `kategori`;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table langsis2.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `kelas_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jurusan_id` int(11) unsigned NOT NULL DEFAULT '0',
  `kelas_kode` varchar(15) NOT NULL,
  `kelas_nama` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`kelas_id`),
  UNIQUE KEY `kelas_nama` (`kelas_nama`),
  KEY `jurusan_id` (`jurusan_id`),
  CONSTRAINT `FK_kelas_jurusan` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`jurusan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.kelas: ~4 rows (approximately)
DELETE FROM `kelas`;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` (`kelas_id`, `jurusan_id`, `kelas_kode`, `kelas_nama`, `created_at`, `updated_at`) VALUES
	(2, 21, 'OTKP', 'X OTKP 1', '2021-10-07 04:25:44', '0000-00-00 00:00:00'),
	(3, 26, 'TKJ', 'X TKJ 1', '2021-10-07 04:29:08', '0000-00-00 00:00:00'),
	(4, 6, 'AKL', 'X AKL 1', '2021-10-11 14:49:16', '0000-00-00 00:00:00'),
	(5, 6, 'AKL', 'XI AKL 1', '2021-10-11 14:49:23', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;

-- Dumping structure for table langsis2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`version`) VALUES
	(8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table langsis2.pelanggaran
CREATE TABLE IF NOT EXISTS `pelanggaran` (
  `pelanggaran_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) unsigned NOT NULL,
  `siswa_id` int(11) unsigned NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  `pelanggaran_kode` varchar(15) NOT NULL,
  `pelanggaran_nama` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`pelanggaran_id`),
  UNIQUE KEY `pelanggaran_kode` (`pelanggaran_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.pelanggaran: ~0 rows (approximately)
DELETE FROM `pelanggaran`;
/*!40000 ALTER TABLE `pelanggaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelanggaran` ENABLE KEYS */;

-- Dumping structure for table langsis2.role
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_nama` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_nama` (`role_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.role: ~2 rows (approximately)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`role_id`, `role_nama`, `created_at`, `updated_at`) VALUES
	(55, 'Guru', '2021-10-09 18:30:34', '2021-10-09 18:30:35'),
	(99, 'Administrator', '2021-10-09 18:30:09', '2021-10-09 18:30:22');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table langsis2.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `siswa_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) unsigned NOT NULL DEFAULT '0',
  `siswa_nis` varchar(18) NOT NULL,
  `siswa_nama` varchar(100) NOT NULL,
  `siswa_alamat` text NOT NULL,
  `siswa_gender` varchar(30) DEFAULT NULL,
  `siswa_agama` int(1) NOT NULL,
  `siswa_telepon` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`siswa_id`),
  UNIQUE KEY `siswa_nis` (`siswa_nis`),
  KEY `kelas_id` (`kelas_id`),
  CONSTRAINT `FK_siswa_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.siswa: ~2 rows (approximately)
DELETE FROM `siswa`;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`siswa_id`, `kelas_id`, `siswa_nis`, `siswa_nama`, `siswa_alamat`, `siswa_gender`, `siswa_agama`, `siswa_telepon`, `created_at`, `updated_at`) VALUES
	(1, 3, '1231236', 'Bonaventura Dimas Paska Pradhana', 'Jl. Petro Cina, Unit 1, Aimas, Kabupaten Sorong, Papua Barat', 'Laki-laki', 2, '7837948979', '2021-10-11 04:09:49', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping structure for table langsis2.users
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_nip` varchar(18) NOT NULL,
  `users_username` varchar(50) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_email` varchar(100) DEFAULT NULL,
  `users_nama` varchar(100) NOT NULL,
  `users_alamat` text,
  `users_gender` varchar(30) DEFAULT NULL,
  `users_agama` int(1) DEFAULT NULL,
  `users_telpon` varchar(20) DEFAULT NULL,
  `users_role` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`users_id`),
  UNIQUE KEY `users_nip` (`users_nip`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`users_id`, `users_nip`, `users_username`, `users_password`, `users_email`, `users_nama`, `users_alamat`, `users_gender`, `users_agama`, `users_telpon`, `users_role`, `created_at`, `updated_at`) VALUES
	(1, '007234527467128172', '007234527467128172', '007234527467128172', NULL, 'Bonaventura Dimas Paska Pradhana', NULL, NULL, NULL, NULL, 55, '2021-10-09 18:51:21', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
