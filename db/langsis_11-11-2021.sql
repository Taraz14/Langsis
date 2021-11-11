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

-- Dumping data for table langsis2.agama: ~5 rows (approximately)
DELETE FROM `agama`;
/*!40000 ALTER TABLE `agama` DISABLE KEYS */;
INSERT INTO `agama` (`agama_id`, `agama_nama`, `created_at`, `updated_at`) VALUES
	(1, 'Islam', '2021-10-11 03:32:17', '2021-10-11 03:32:18'),
	(2, 'Katolik', '2021-10-11 03:32:27', '2021-10-11 03:32:30'),
	(3, 'Kristen Protestan', '2021-10-11 03:32:42', '2021-10-11 03:32:43'),
	(4, 'Hindu', '2021-10-11 03:32:52', '2021-10-11 03:32:53'),
	(5, 'Budha', '2021-10-11 03:32:59', '2021-10-11 03:33:00');
/*!40000 ALTER TABLE `agama` ENABLE KEYS */;

-- Dumping structure for table langsis2.jenis_pelanggaran
CREATE TABLE IF NOT EXISTS `jenis_pelanggaran` (
  `jp_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kriteria_id` int(11) unsigned NOT NULL DEFAULT '0',
  `jp_nama` varchar(50) NOT NULL,
  `jp_skor` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`jp_id`) USING BTREE,
  UNIQUE KEY `kategori_nama` (`jp_nama`) USING BTREE,
  KEY `kriteria_id` (`kriteria_id`),
  CONSTRAINT `FK_jenis_pelanggaran_kriteria` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`kriteria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.jenis_pelanggaran: ~47 rows (approximately)
DELETE FROM `jenis_pelanggaran`;
/*!40000 ALTER TABLE `jenis_pelanggaran` DISABLE KEYS */;
INSERT INTO `jenis_pelanggaran` (`jp_id`, `kriteria_id`, `jp_nama`, `jp_skor`, `created_at`, `updated_at`) VALUES
	(19, 7, 'Absen mengikuti ulangan/penilaian tanpa izin', 10, '2021-11-08 01:32:17', '0000-00-00 00:00:00'),
	(20, 7, 'Absen mengikuti Upacara bendera tanpa izin', 10, '2021-11-08 01:32:24', '0000-00-00 00:00:00'),
	(21, 7, 'Tidak menyerahkan tugas mata pelajaran', 10, '2021-11-08 01:32:32', '0000-00-00 00:00:00'),
	(22, 7, 'Absen tanpa keterangan', 8, '2021-11-08 01:32:43', '0000-00-00 00:00:00'),
	(23, 7, 'Terlambat hadir ke sekolah', 5, '2021-11-08 01:32:57', '0000-00-00 00:00:00'),
	(24, 7, 'Terlambat mengikuti kegiatan pembelajaran ', 5, '2021-11-08 01:33:04', '0000-00-00 00:00:00'),
	(25, 7, 'Terlambat menyerahkan tugas mata pelajaran ', 5, '2021-11-08 01:33:11', '0000-00-00 00:00:00'),
	(26, 7, 'Absen karena izin meninggalkan kegiatan pembelajar', 5, '2021-11-08 01:33:21', '0000-00-00 00:00:00'),
	(27, 7, 'Absen karena tidak masuk sekolah', 5, '2021-11-08 01:33:27', '0000-00-00 00:00:00'),
	(28, 8, 'Memakai pakaian seragam tidak sesuai dengan aturan', 10, '2021-11-08 01:33:43', '0000-00-00 00:00:00'),
	(29, 8, 'Memelihara rambut tidak sesuai dengan ketentuan ', 10, '2021-11-08 01:33:50', '0000-00-00 00:00:00'),
	(30, 8, 'Mengecat rambut selain warna hitam', 10, '2021-11-08 01:33:57', '0000-00-00 00:00:00'),
	(31, 8, 'Membuat atau menyusun rambut sebagai hiasan kepala', 10, '2021-11-08 01:34:03', '0000-00-00 00:00:00'),
	(32, 8, 'Siswa putra memakai perhiasan gelang, kalung dll b', 5, '2021-11-08 01:34:16', '0000-00-00 00:00:00'),
	(33, 8, 'Siswa putri memakai perhiasan atau make up berlebi', 5, '2021-11-08 01:34:22', '0000-00-00 00:00:00'),
	(34, 9, 'Memakai pakaian sekolah tampak kotor', 5, '2021-11-08 01:36:26', '0000-00-00 00:00:00'),
	(35, 9, 'Meja atau kursi yang ditempati di kelas tampak kot', 8, '2021-11-08 01:44:33', '0000-00-00 00:00:00'),
	(36, 9, 'Buku dan alat tulis yang dimiliki kotor ', 5, '2021-11-08 01:44:45', '0000-00-00 00:00:00'),
	(37, 9, 'Tas sekolah kotor ', 5, '2021-11-08 01:44:55', '0000-00-00 00:00:00'),
	(38, 6, 'Mencuri / merampas barang milik orang lain', 100, '2021-11-08 01:45:22', '0000-00-00 00:00:00'),
	(39, 6, 'Membawa atau menggunakan sajam / senpi', 100, '2021-11-08 01:45:33', '0000-00-00 00:00:00'),
	(40, 6, 'Membawa atau menggunakan narkoba, miras, ganja dan', 100, '2021-11-08 01:45:45', '0000-00-00 00:00:00'),
	(41, 6, 'Membawa, mengedarkan dan menyimpan video porno di ', 100, '2021-11-08 01:45:52', '0000-00-00 00:00:00'),
	(42, 6, 'Berkelahi atau terlibat perkelahian (tawuran)', 100, '2021-11-08 01:45:59', '0000-00-00 00:00:00'),
	(43, 6, 'Berbuat asusila (hamil menghamili) ', 100, '2021-11-08 01:46:08', '0000-00-00 00:00:00'),
	(44, 6, 'Melakukan atau terlibat tindak pidana', 100, '2021-11-08 01:46:15', '0000-00-00 00:00:00'),
	(45, 6, 'Menganiaya atau mengintimidasi guru, kepala sekola', 100, '2021-11-08 01:46:24', '0000-00-00 00:00:00'),
	(46, 6, 'Melakukan atau terlibat kriminal (mencuri, dll)', 100, '2021-11-08 01:46:30', '0000-00-00 00:00:00'),
	(47, 6, 'Merusak sarana/prasarana milik sekolah/warga sekol', 50, '2021-11-08 01:46:39', '0000-00-00 00:00:00'),
	(48, 6, 'Merokok atau membawa rokok di sekolah', 50, '2021-11-08 01:46:47', '0000-00-00 00:00:00'),
	(49, 6, 'Mengancam warga sekolah ', 50, '2021-11-08 01:46:56', '0000-00-00 00:00:00'),
	(50, 6, 'Memalsukan tanda tangan orang tua/wali, kepala sek', 50, '2021-11-08 01:47:05', '0000-00-00 00:00:00'),
	(51, 6, 'Memalsukan STEMPEL sekolah ', 75, '2021-11-08 01:47:15', '0000-00-00 00:00:00'),
	(52, 6, 'Membuat pernyataan bohong dusta atau palsu', 50, '2021-11-08 01:47:23', '0000-00-00 00:00:00'),
	(53, 6, 'Menghilangkan dengan sengaja buku agenda siswa', 35, '2021-11-08 01:47:37', '0000-00-00 00:00:00'),
	(54, 6, 'Menerobos atau melompat pagar sekolah ', 25, '2021-11-08 01:47:44', '0000-00-00 00:00:00'),
	(55, 6, 'Membuat gaduh atau mengganggu kegiatan belajar', 25, '2021-11-08 01:47:53', '0000-00-00 00:00:00'),
	(56, 6, 'Melindungi teman yang bersalah', 25, '2021-11-08 01:48:01', '0000-00-00 00:00:00'),
	(57, 6, 'Mencemarkan nama baik sekolah, Guru, Kepala sekola', 25, '2021-11-08 01:48:07', '0000-00-00 00:00:00'),
	(58, 6, 'Melakukan tindak provokasi di sekolah', 25, '2021-11-08 01:48:15', '0000-00-00 00:00:00'),
	(59, 6, 'Meninggalkan kegiatan belajar tanpa izin', 20, '2021-11-08 01:48:23', '0000-00-00 00:00:00'),
	(60, 6, 'Berbicara dan bertingkah tidak sopan terhadap Guru', 20, '2021-11-08 01:48:34', '0000-00-00 00:00:00'),
	(61, 6, 'Mengabaikan surat panggilan dari sekolah', 20, '2021-11-08 01:48:41', '0000-00-00 00:00:00'),
	(62, 6, 'Mengabaikan panggilan dari Guru, Kepala Sekolah da', 20, '2021-11-08 01:48:48', '0000-00-00 00:00:00'),
	(63, 6, ' Berada di kantin saat kegiatan belajar tanpa izin', 10, '2021-11-08 01:49:00', '0000-00-00 00:00:00'),
	(64, 6, 'Membuang sampah dan meludah di sembarang tempat', 20, '2021-11-08 01:49:07', '0000-00-00 00:00:00'),
	(65, 6, 'Main kartu, domino dan sejenisnya di lingkungan se', 20, '2021-11-08 01:49:19', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `jenis_pelanggaran` ENABLE KEYS */;

-- Dumping structure for table langsis2.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `jurusan_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jurusan_kode` varchar(20) NOT NULL,
  `jurusan_nama` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`jurusan_id`),
  UNIQUE KEY `jurusan_kode` (`jurusan_kode`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.jurusan: ~7 rows (approximately)
DELETE FROM `jurusan`;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` (`jurusan_id`, `jurusan_kode`, `jurusan_nama`, `created_at`, `updated_at`) VALUES
	(6, 'AKL', 'Akuntansi Keuangan Lembaga', '2021-09-19 15:55:25', '0000-00-00 00:00:00'),
	(8, 'DPIB', 'Desain Pemodelan Industri dan Bisnis', '2021-09-19 17:30:20', '0000-00-00 00:00:00'),
	(11, 'TBSM', 'Teknik Bisnis Sepeda Motor', '2021-09-22 09:50:10', '0000-00-00 00:00:00'),
	(21, 'OTKP', 'Otomatisasi Tata Kelola Perkantoran', '2021-09-22 10:50:01', '0000-00-00 00:00:00'),
	(33, 'TKRO', 'Teknik Kendaraan Ringan Otomotif', '2021-09-30 00:25:24', '0000-00-00 00:00:00'),
	(35, 'TKJ', 'Teknik Komputer dan Jaringan', '2021-11-05 11:36:56', '0000-00-00 00:00:00'),
	(36, 'TITL', 'Teknik Instalasi Tenaga Listrik', '2021-11-07 20:20:23', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.kelas: ~5 rows (approximately)
DELETE FROM `kelas`;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` (`kelas_id`, `jurusan_id`, `kelas_kode`, `kelas_nama`, `created_at`, `updated_at`) VALUES
	(2, 21, 'OTKP', 'X OTKP 1', '2021-10-07 04:25:44', '0000-00-00 00:00:00'),
	(4, 6, 'AKL', 'X AKL 1', '2021-10-11 14:49:16', '0000-00-00 00:00:00'),
	(5, 6, 'AKL', 'XI AKL 1', '2021-10-11 14:49:23', '0000-00-00 00:00:00'),
	(12, 35, 'TKJ', 'X TKJ 1', '2021-11-05 11:40:12', '0000-00-00 00:00:00'),
	(13, 35, 'TKJ', 'X TKJ 2', '2021-11-07 09:38:43', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;

-- Dumping structure for table langsis2.kriteria
CREATE TABLE IF NOT EXISTS `kriteria` (
  `kriteria_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kriteria_nama` varchar(50) NOT NULL,
  `bobot_kriteria` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`kriteria_id`),
  UNIQUE KEY `kriteria_nama` (`kriteria_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table langsis2.kriteria: ~4 rows (approximately)
DELETE FROM `kriteria`;
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
INSERT INTO `kriteria` (`kriteria_id`, `kriteria_nama`, `bobot_kriteria`, `created_at`, `updated_at`) VALUES
	(6, 'Kelakuan', 50, '2021-11-08 00:05:29', '0000-00-00 00:00:00'),
	(7, 'Kerajinan', 30, '2021-11-08 01:30:57', '0000-00-00 00:00:00'),
	(8, 'Kerapian', 15, '2021-11-08 01:31:05', '0000-00-00 00:00:00'),
	(9, 'Kebersihan', 5, '2021-11-08 01:31:16', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;

-- Dumping structure for table langsis2.login_attemps
CREATE TABLE IF NOT EXISTS `login_attemps` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `time_login` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `FK__users` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

-- Dumping data for table langsis2.login_attemps: ~162 rows (approximately)
DELETE FROM `login_attemps`;
/*!40000 ALTER TABLE `login_attemps` DISABLE KEYS */;
INSERT INTO `login_attemps` (`id`, `users_id`, `time_login`) VALUES
	(14, 2, '2021-10-23 15:45:48'),
	(15, 2, '2021-10-23 15:47:14'),
	(16, 2, '2021-10-23 15:47:58'),
	(17, 2, '2021-10-23 15:48:06'),
	(18, 2, '2021-10-23 15:48:44'),
	(19, 2, '2021-10-23 15:49:18'),
	(20, 2, '2021-10-23 15:49:26'),
	(21, 2, '2021-10-23 15:51:55'),
	(22, 2, '2021-10-23 15:52:54'),
	(23, 2, '2021-10-23 15:53:19'),
	(24, 2, '2021-10-23 15:54:54'),
	(25, 2, '2021-10-23 16:02:05'),
	(26, 2, '2021-10-23 16:05:41'),
	(27, 2, '2021-10-23 16:08:22'),
	(28, 2, '2021-10-23 16:08:53'),
	(29, 2, '2021-10-23 16:10:44'),
	(30, 2, '2021-10-23 16:11:57'),
	(31, 3, '2021-10-23 16:12:13'),
	(32, 3, '2021-10-23 16:12:20'),
	(33, 2, '2021-10-23 16:14:24'),
	(34, 3, '2021-10-23 16:16:07'),
	(35, 3, '2021-10-23 16:17:13'),
	(36, 3, '2021-10-23 16:21:19'),
	(37, 3, '2021-10-23 16:22:44'),
	(38, 2, '2021-10-23 16:40:54'),
	(39, 2, '2021-10-23 21:02:37'),
	(40, 3, '2021-10-23 21:16:13'),
	(41, 2, '2021-10-23 21:37:26'),
	(42, 3, '2021-10-23 21:37:58'),
	(43, 3, '2021-10-23 23:13:55'),
	(44, 3, '2021-10-23 23:55:51'),
	(45, 2, '2021-10-23 23:59:51'),
	(46, 3, '2021-10-24 00:01:04'),
	(47, 2, '2021-10-24 00:04:24'),
	(48, 2, '2021-10-24 16:16:09'),
	(49, 2, '2021-10-24 16:16:18'),
	(50, 3, '2021-10-24 16:16:24'),
	(51, 2, '2021-10-24 16:16:29'),
	(52, 3, '2021-10-24 16:16:40'),
	(53, 2, '2021-10-24 17:26:33'),
	(54, 2, '2021-10-24 17:26:43'),
	(55, 3, '2021-10-24 17:26:53'),
	(56, 3, '2021-10-25 00:43:25'),
	(57, 3, '2021-10-25 08:37:46'),
	(58, 2, '2021-10-25 09:16:46'),
	(59, 2, '2021-10-25 17:29:17'),
	(60, 3, '2021-10-25 17:29:28'),
	(61, 2, '2021-10-25 17:55:18'),
	(62, 3, '2021-10-25 17:55:25'),
	(63, 3, '2021-10-25 17:59:10'),
	(64, 3, '2021-10-25 21:57:14'),
	(65, 3, '2021-10-26 01:59:28'),
	(66, 3, '2021-10-26 08:34:30'),
	(67, 3, '2021-10-26 22:40:59'),
	(68, 3, '2021-10-27 10:08:47'),
	(69, 2, '2021-10-27 11:07:08'),
	(70, 3, '2021-10-27 11:25:41'),
	(71, 2, '2021-10-27 11:26:30'),
	(72, 2, '2021-10-27 15:22:47'),
	(73, 2, '2021-10-27 20:14:36'),
	(74, 3, '2021-10-27 20:14:44'),
	(75, 2, '2021-10-28 12:59:54'),
	(76, 3, '2021-10-28 13:00:08'),
	(77, 2, '2021-10-28 20:42:49'),
	(78, 2, '2021-10-28 21:00:31'),
	(79, 2, '2021-10-28 21:05:22'),
	(80, 3, '2021-10-28 21:05:37'),
	(81, 2, '2021-10-29 10:22:08'),
	(82, 2, '2021-10-29 12:47:38'),
	(83, 3, '2021-10-29 12:47:46'),
	(84, 2, '2021-10-29 12:57:04'),
	(85, 3, '2021-10-29 13:04:17'),
	(86, 3, '2021-10-30 08:16:15'),
	(87, 2, '2021-10-30 08:28:34'),
	(88, 3, '2021-10-30 08:29:13'),
	(89, 2, '2021-10-30 19:45:58'),
	(90, 2, '2021-10-30 20:48:21'),
	(91, 2, '2021-10-30 21:10:50'),
	(92, 2, '2021-10-30 21:11:05'),
	(93, 2, '2021-10-30 21:11:34'),
	(94, 3, '2021-10-30 21:13:14'),
	(95, 3, '2021-10-30 21:16:37'),
	(96, 3, '2021-10-30 21:18:49'),
	(97, 3, '2021-10-31 14:18:48'),
	(98, 3, '2021-10-31 14:18:57'),
	(99, 3, '2021-10-31 14:19:31'),
	(100, 3, '2021-10-31 14:25:02'),
	(101, 3, '2021-10-31 15:17:40'),
	(102, 3, '2021-10-31 15:30:43'),
	(103, 3, '2021-10-31 15:32:47'),
	(104, 2, '2021-10-31 15:34:01'),
	(105, 2, '2021-10-31 15:34:06'),
	(106, 2, '2021-10-31 15:34:27'),
	(107, 2, '2021-10-31 15:34:33'),
	(108, 2, '2021-10-31 15:35:01'),
	(109, 2, '2021-10-31 15:35:15'),
	(110, 3, '2021-10-31 15:36:18'),
	(111, 3, '2021-10-31 15:37:45'),
	(112, 3, '2021-10-31 15:37:58'),
	(113, 3, '2021-10-31 15:41:46'),
	(114, 2, '2021-10-31 15:42:32'),
	(115, 3, '2021-10-31 16:10:43'),
	(116, 3, '2021-10-31 18:14:16'),
	(117, 2, '2021-11-01 15:54:25'),
	(118, 3, '2021-11-01 15:55:25'),
	(119, 2, '2021-11-03 12:03:09'),
	(120, 3, '2021-11-03 12:05:14'),
	(121, 3, '2021-11-03 12:05:18'),
	(122, 3, '2021-11-03 13:14:16'),
	(123, 3, '2021-11-03 13:18:17'),
	(124, 3, '2021-11-03 13:28:45'),
	(125, 3, '2021-11-03 13:31:05'),
	(126, 2, '2021-11-04 01:26:18'),
	(127, 2, '2021-11-04 02:04:37'),
	(128, 2, '2021-11-04 02:12:14'),
	(129, 3, '2021-11-04 03:49:33'),
	(130, 3, '2021-11-04 03:56:09'),
	(131, 3, '2021-11-04 03:56:44'),
	(132, 3, '2021-11-04 03:57:03'),
	(133, 3, '2021-11-04 04:45:06'),
	(134, 3, '2021-11-04 04:51:45'),
	(135, 3, '2021-11-04 04:54:45'),
	(136, 3, '2021-11-04 18:37:56'),
	(137, 3, '2021-11-04 18:39:52'),
	(138, 3, '2021-11-04 18:40:33'),
	(139, 3, '2021-11-04 18:42:21'),
	(140, 3, '2021-11-04 18:44:43'),
	(141, 3, '2021-11-04 18:44:52'),
	(142, 3, '2021-11-04 19:24:57'),
	(143, 3, '2021-11-04 19:25:07'),
	(144, 3, '2021-11-05 08:16:52'),
	(145, 3, '2021-11-05 09:50:29'),
	(146, 2, '2021-11-05 09:51:09'),
	(147, 3, '2021-11-05 09:58:00'),
	(148, 3, '2021-11-05 09:58:03'),
	(149, 2, '2021-11-05 10:26:42'),
	(150, 2, '2021-11-05 10:34:27'),
	(151, 3, '2021-11-05 10:36:12'),
	(152, 2, '2021-11-05 11:17:43'),
	(153, 3, '2021-11-05 11:19:04'),
	(154, 3, '2021-11-05 11:20:26'),
	(155, 2, '2021-11-05 11:25:09'),
	(156, 2, '2021-11-05 11:35:14'),
	(157, 3, '2021-11-05 12:06:07'),
	(158, 3, '2021-11-05 12:06:37'),
	(159, 3, '2021-11-05 12:08:01'),
	(160, 2, '2021-11-05 12:12:34'),
	(161, 2, '2021-11-06 13:31:00'),
	(162, 7, '2021-11-06 16:15:24'),
	(163, 2, '2021-11-07 08:50:58'),
	(164, 3, '2021-11-07 09:16:50'),
	(165, 3, '2021-11-07 09:23:26'),
	(166, 7, '2021-11-07 09:36:00'),
	(167, 2, '2021-11-07 11:44:26'),
	(168, 2, '2021-11-07 11:44:58'),
	(169, 3, '2021-11-07 20:11:39'),
	(170, 2, '2021-11-07 20:13:06'),
	(171, 3, '2021-11-07 20:15:35'),
	(172, 8, '2021-11-07 20:17:57'),
	(173, 2, '2021-11-07 23:59:36'),
	(174, 2, '2021-11-08 00:01:08'),
	(175, 2, '2021-11-08 01:44:10'),
	(176, 2, '2021-11-08 02:04:29'),
	(177, 8, '2021-11-08 02:05:24'),
	(178, 2, '2021-11-08 02:07:37'),
	(179, 2, '2021-11-09 09:56:06'),
	(180, 2, '2021-11-09 13:06:56');
/*!40000 ALTER TABLE `login_attemps` ENABLE KEYS */;

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
  `jp_id` int(11) unsigned NOT NULL,
  `kriteria_id` int(11) unsigned NOT NULL,
  `siswa_id` int(11) unsigned NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  `deskripsi` text NOT NULL,
  `bobot` float NOT NULL DEFAULT '0',
  `poin` float NOT NULL DEFAULT '0',
  `request_hapus` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`pelanggaran_id`),
  KEY `jp_id` (`jp_id`),
  KEY `kriteria_id` (`kriteria_id`),
  KEY `siswa_id` (`siswa_id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `FK_pelanggaran_jenis_pelanggaran` FOREIGN KEY (`jp_id`) REFERENCES `jenis_pelanggaran` (`jp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pelanggaran_kriteria` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`kriteria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pelanggaran_siswa` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`siswa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pelanggaran_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.pelanggaran: ~4 rows (approximately)
DELETE FROM `pelanggaran`;
/*!40000 ALTER TABLE `pelanggaran` DISABLE KEYS */;
INSERT INTO `pelanggaran` (`pelanggaran_id`, `jp_id`, `kriteria_id`, `siswa_id`, `users_id`, `deskripsi`, `bobot`, `poin`, `request_hapus`, `created_at`, `updated_at`) VALUES
	(57, 37, 9, 17, 8, '', 0.05, 0.25, 0, '2021-11-08 02:05:53', '0000-00-00 00:00:00'),
	(58, 65, 6, 29, 8, 'Main kartu', 0.5, 10, 0, '2021-11-08 02:06:28', '0000-00-00 00:00:00'),
	(59, 30, 8, 29, 8, '', 0.15, 1.5, 0, '2021-11-08 02:07:04', '0000-00-00 00:00:00'),
	(60, 34, 9, 29, 8, '', 0.05, 0.25, 0, '2021-11-08 02:07:16', '0000-00-00 00:00:00');
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

-- Dumping structure for table langsis2.session
CREATE TABLE IF NOT EXISTS `session` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table langsis2.session: ~15 rows (approximately)
DELETE FROM `session`;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('7566887859f01ae20b664b25625a5fa49f27e143', '125.166.67.108', 1636302632, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363330323633323b7569647c733a313a2232223b757365726e616d657c733a353a2264696d6173223b656d61696c7c733a303a22223b6e616d617c733a33323a22426f6e6176656e747572612044696d6173205061736b61205072616468616e61223b6964757365727c733a313a2232223b726f6c657c733a323a223939223b726f6c656e616d657c733a31333a2241646d696e6973747261746f72223b7374617475737c733a313a2230223b6176617461727c733a32333a22313633363239373235343938385f325f6176612e4a5047223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b6973477572757c623a303b),
	('534eab6d0769507fef99bea7b240c269ccf0fd5a', '125.166.67.108', 1636301365, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363330313336353b),
	('a4cc38b66ff66295788d48382a37b6ff7a31c772', '125.166.67.108', 1636302971, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363330323937313b7569647c733a313a2232223b757365726e616d657c733a353a2264696d6173223b656d61696c7c733a303a22223b6e616d617c733a33323a22426f6e6176656e747572612044696d6173205061736b61205072616468616e61223b6964757365727c733a313a2232223b726f6c657c733a323a223939223b726f6c656e616d657c733a31333a2241646d696e6973747261746f72223b7374617475737c733a313a2230223b6176617461727c733a32333a22313633363239373235343938385f325f6176612e4a5047223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b6973477572757c623a303b),
	('da6b8de88f5051aa1b90d206197e4a012a241e3e', '125.166.67.108', 1636302904, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363330323930343b),
	('2c9ddae3394cc84249f1487f7cc557b51a349d36', '125.166.67.108', 1636302987, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363330323937313b7569647c733a313a2232223b757365726e616d657c733a353a2264696d6173223b656d61696c7c733a303a22223b6e616d617c733a33323a22426f6e6176656e747572612044696d6173205061736b61205072616468616e61223b6964757365727c733a313a2232223b726f6c657c733a323a223939223b726f6c656e616d657c733a31333a2241646d696e6973747261746f72223b7374617475737c733a313a2230223b6176617461727c733a32333a22313633363239373235343938385f325f6176612e4a5047223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b6973477572757c623a303b),
	('945dd4ea5f9a994c32fde439a84d10dabf9701f0', '180.249.152.226', 1636303437, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363330333433373b),
	('8c3b3c32ae490642f3cee5923395dcdc2661037d', '180.249.152.226', 1636303763, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363330333736333b7569647c733a313a2232223b757365726e616d657c733a353a2264696d6173223b656d61696c7c733a303a22223b6e616d617c733a33323a22426f6e6176656e747572612044696d6173205061736b61205072616468616e61223b6964757365727c733a313a2232223b726f6c657c733a323a223939223b726f6c656e616d657c733a31333a2241646d696e6973747261746f72223b7374617475737c733a313a2230223b6176617461727c733a32333a22313633363239373235343938385f325f6176612e4a5047223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b6973477572757c623a303b),
	('0db47bc7588dca329d2e5b99b6c2684276141f69', '180.249.152.226', 1636303776, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363330333736333b7569647c733a313a2232223b757365726e616d657c733a353a2264696d6173223b656d61696c7c733a303a22223b6e616d617c733a33323a22426f6e6176656e747572612044696d6173205061736b61205072616468616e61223b6964757365727c733a313a2232223b726f6c657c733a323a223939223b726f6c656e616d657c733a31333a2241646d696e6973747261746f72223b7374617475737c733a313a2230223b6176617461727c733a32333a22313633363239373235343938385f325f6176612e4a5047223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b6973477572757c623a303b),
	('jvn73u8jgav7tkafot47r1e4imu62o6e', '127.0.0.1', 1636304827, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363330343832373b),
	('h2schbb0fmb7um089eh6phf9akqooa53', '127.0.0.1', 1636304860, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363330343835323b7569647c733a313a2232223b757365726e616d657c733a353a2264696d6173223b656d61696c7c733a303a22223b6e616d617c733a33323a22426f6e6176656e747572612044696d6173205061736b61205072616468616e61223b6964757365727c733a313a2232223b726f6c657c733a323a223939223b726f6c656e616d657c733a31333a2241646d696e6973747261746f72223b7374617475737c733a313a2230223b6176617461727c733a32333a22313633363239373235343938385f325f6176612e4a5047223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b6973477572757c623a303b),
	('s7bqdld7t28rvnqolqeb1d7srvpc7jrq', '127.0.0.1', 1636419768, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363431393736383b7569647c733a313a2232223b757365726e616d657c733a353a2264696d6173223b656d61696c7c733a303a22223b6e616d617c733a33323a22426f6e6176656e747572612044696d6173205061736b61205072616468616e61223b6964757365727c733a313a2232223b726f6c657c733a323a223939223b726f6c656e616d657c733a31333a2241646d696e6973747261746f72223b7374617475737c733a313a2230223b6176617461727c733a32333a22313633363239373235343938385f325f6176612e4a5047223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b6973477572757c623a303b),
	('kqnli37p6rf8rgpdpul6nmkeedlcjc6n', '127.0.0.1', 1636420606, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363432303630363b7569647c733a313a2232223b757365726e616d657c733a353a2264696d6173223b656d61696c7c733a303a22223b6e616d617c733a33323a22426f6e6176656e747572612044696d6173205061736b61205072616468616e61223b6964757365727c733a313a2232223b726f6c657c733a323a223939223b726f6c656e616d657c733a31333a2241646d696e6973747261746f72223b7374617475737c733a313a2230223b6176617461727c733a32333a22313633363239373235343938385f325f6176612e4a5047223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b6973477572757c623a303b),
	('ob0dvb3di1n02nphpie5t9m38tv2gsmc', '127.0.0.1', 1636420838, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363432303630363b7569647c733a313a2232223b757365726e616d657c733a353a2264696d6173223b656d61696c7c733a303a22223b6e616d617c733a33323a22426f6e6176656e747572612044696d6173205061736b61205072616468616e61223b6964757365727c733a313a2232223b726f6c657c733a323a223939223b726f6c656e616d657c733a31333a2241646d696e6973747261746f72223b7374617475737c733a313a2230223b6176617461727c733a32333a22313633363239373235343938385f325f6176612e4a5047223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b6973477572757c623a303b),
	('4k0vt1i9hcvbl4nu9gk0blrbv9p13id6', '127.0.0.1', 1636420826, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363432303832363b),
	('mu26l3igl0m155cun6bjdjnu3ak18v2p', '127.0.0.1', 1636430829, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313633363433303832393b);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;

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
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`siswa_id`),
  UNIQUE KEY `siswa_nis` (`siswa_nis`),
  KEY `kelas_id` (`kelas_id`),
  CONSTRAINT `FK_siswa_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.siswa: ~24 rows (approximately)
DELETE FROM `siswa`;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`siswa_id`, `kelas_id`, `siswa_nis`, `siswa_nama`, `siswa_alamat`, `siswa_gender`, `siswa_agama`, `siswa_telepon`, `created_at`, `updated_at`) VALUES
	(8, 13, '30189472993', 'Ahmad Andhika Albukori', 'Jl. Wortel', 'Laki-laki', 1, '0813440778903', '2021-11-07 09:55:43', NULL),
	(9, 13, '23188873920', 'Ahmad Dani', 'Jl. Tuturuga', 'Laki-laki', 1, '0812190020021', '2021-11-07 09:56:51', NULL),
	(10, 13, '2312242561', 'Ahmad Yusub Alfahrizi', 'Jl. Gambas', 'Laki-laki', 1, '0852444974542', '2021-11-07 09:57:56', NULL),
	(11, 13, '23100790213', 'Alexandra A. Watem', 'Km. 14', 'Perempuan', 3, '0813445389012', '2021-11-07 09:59:04', NULL),
	(12, 13, '00781924571', 'Andi Farhan P. Rekasi', 'Jl. Sorong-klamono ', 'Laki-laki', 1, '0813440141290', '2021-11-07 10:00:11', NULL),
	(13, 13, '00791252183', 'Avandro Michael Jordi', 'Jl. Menur', 'Laki-laki', 3, '0852444780091', '2021-11-07 10:01:23', NULL),
	(14, 13, '0079597452', 'Celvin A. Fidelis A. ', 'Jl. Wortel', 'Laki-laki', 3, '0852445488677', '2021-11-07 10:02:50', NULL),
	(15, 13, '00577801454', 'Deiven Gerold R. ', 'Jl. Wortel', 'Laki-laki', 3, '0852407781024', '2021-11-07 10:03:42', NULL),
	(16, 13, '00577889012', 'Dhevu Salsabila Putri', 'Jl. Timun aimas', 'Perempuan', 1, '0853545489021', '2021-11-07 10:05:16', NULL),
	(17, 13, '00577145729', 'Eka Suryani', 'Jl. Timun aimas', 'Perempuan', 1, '0813440547890', '2021-11-07 10:06:05', NULL),
	(18, 13, '0081778901', 'Febrian Aldair Sefle', 'Jl. Perkutut', 'Laki-laki', 3, '0812578903456', '2021-11-07 10:07:01', NULL),
	(19, 13, '00351380132', 'Fernando Jireh Sahetapy', 'Jl. Basuki rahmat ', 'Laki-laki', 3, '0812440141021', '2021-11-07 10:08:04', NULL),
	(20, 13, '00819055412', 'Gererda Wekat Tewer', 'Jl. Kontainer', 'Laki-laki', 3, '0852889021421', '2021-11-07 10:09:21', NULL),
	(21, 13, '00817450123', 'Habibah Nur Aini', 'Jl. Tomat', 'Perempuan', 1, '0813447801289', '2021-11-07 10:10:19', NULL),
	(22, 13, '00856713469', 'Hans Yustinus Adrianus A. ', 'Sp3', 'Laki-laki', 3, '0813404758901', '2021-11-07 10:11:50', NULL),
	(23, 13, '00351781200', 'Hendri Kurniawan', 'Jl. Timun', 'Laki-laki', 1, '0813402344790', '2021-11-07 10:12:47', NULL),
	(24, 13, '00351119011', 'Hizkia Billy Kesek', 'Jl. Osok', 'Laki-laki', 3, '0813408181092', '2021-11-07 10:13:39', NULL),
	(25, 13, '00571289023', 'Ibrahim Harun', 'Jl. Menur', 'Laki-laki', 1, '0813447900127', '2021-11-07 10:14:40', NULL),
	(26, 13, '00177901123', 'Ilona Ruth H. Waren', 'Jl. Pendidikan km. 8', 'Perempuan', 3, '085244191417', '2021-11-07 10:15:35', NULL),
	(27, 13, '00189217492', 'Iqbal Ulil Albab', 'Jl. Sungai Maruni', 'Laki-laki', 1, '0813135713890', '2021-11-07 10:16:57', NULL),
	(28, 13, '00351901098', 'Juan Lekatompessy', 'Jl. Lestari indah', 'Laki-laki', 3, '0813490127013', '2021-11-07 10:17:55', NULL),
	(29, 13, '00351801121', 'Mario G. Toffy', 'Jl. Perkutut ', 'Laki-laki', 3, '0813440113213', '2021-11-07 10:22:08', NULL),
	(30, 13, '00890556178', 'Mohammad Misbakhul Munir', 'Jl. Osok', 'Laki-laki', 1, '0813440113213', '2021-11-07 10:23:12', NULL),
	(31, 13, '00381125089', 'Nobertus Fatem', 'Jl. Osok', 'Laki-laki', 3, '0853117118002', '2021-11-07 10:24:01', NULL);
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
  `users_avatar` varchar(255) DEFAULT NULL,
  `users_role` int(2) NOT NULL,
  `users_status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`users_id`),
  UNIQUE KEY `users_nip` (`users_nip`),
  UNIQUE KEY `users_password` (`users_password`),
  UNIQUE KEY `users_email` (`users_email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table langsis2.users: ~6 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`users_id`, `users_nip`, `users_username`, `users_password`, `users_email`, `users_nama`, `users_alamat`, `users_gender`, `users_agama`, `users_telpon`, `users_avatar`, `users_role`, `users_status`, `created_at`, `updated_at`, `last_login`) VALUES
	(2, '007234527467128172', 'dimas', '7051222adfb06dc00db1350b30fd96ddef13fcb45b21ae55282f67a8e5955ea34050e6ab3221fe67e189edcb459ee6658a1012e05157c044144b3a5e12091105', '', 'Bonaventura Dimas Paska Pradhana', '', NULL, 0, '', '1636297254988_2_ava.JPG', 99, 0, '2021-10-21 11:25:44', '2021-11-08 00:00:55', '2021-11-09 13:07:09'),
	(3, '007234527467128178', '007234527467128178', '7a26523eb94ab7feb1accf21b84bbee9619ad4a4ba4a991c01199549aa7c8dec0b38a5f45a2171acf302cf67c20738abe0418eddc807e9dae7fab0d306cf3b58', 'meikel@gmail.com', 'Meikel Rumingan, S.Pd.', '', NULL, 0, '', '1636283545456_3_ava.jpg', 55, 0, '2021-10-22 10:19:57', '2021-11-07 20:12:25', '2021-11-07 20:17:47'),
	(4, '007234527467128173', '007234527467128173', 'c8d495b8c6f1f5b830f062f878e58389237b38551abd152cfb458330208f1b23456a56656522d4a7680e4469e8c7303dfb9330f752573176652a3d2c84e9e1f9', NULL, 'Lusiana Dianti Sihotang, S.Kom.', NULL, NULL, NULL, NULL, NULL, 55, 0, '2021-10-22 10:20:34', '0000-00-00 00:00:00', NULL),
	(5, '007234527467128176', '007234527467128176', '4fa289b2088ee060f62faddd03c827cf277542876143c17907164fd280a00faf08041a0777fe6471b99429aeae780830d89724b30ad6c6fcf4e00a0a98d09873', NULL, 'Novel Adil Dwijaksana, S.Kom.', NULL, NULL, NULL, NULL, NULL, 55, 0, '2021-10-22 10:20:53', '0000-00-00 00:00:00', NULL),
	(7, '007123463663355522', '007123463663355522', 'f3b9635b79986891aaa34c12782b0962544c75aa13a3498f218cc595b81f1d43200654ae1493e3a28b91d253ba98dfd0338f63b938f0d26565be54cee69812a0', NULL, 'Septhenia Bantong, S.Pd.', NULL, NULL, NULL, NULL, 'noimage.png', 99, 0, '2021-11-06 13:33:12', '0000-00-00 00:00:00', NULL),
	(8, '001', '001', '6be8cf2a4984e07bbbd33dfdfdca4eaea6eba3d3ebf39f9ab5ed2d375cdeffc7dc84c7c8011a0f567f855259bb621d56f2b5ba4c965503e0074e6b11b580c541', NULL, 'Enik Ernawati, S.Pd.', NULL, NULL, NULL, NULL, 'noimage.png', 55, 0, '2021-11-07 20:17:38', '0000-00-00 00:00:00', '2021-11-08 02:07:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
