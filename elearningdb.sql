-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2018 at 03:45 AM
-- Server version: 5.1.73
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkatan_diklat`
--

CREATE TABLE IF NOT EXISTS `angkatan_diklat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_diklat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `angkatan_diklat`
--

INSERT INTO `angkatan_diklat` (`id`, `nama_diklat`, `tanggal_mulai`, `tanggal_selesai`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DIKLAT PENAKSIR & ANALIS KREDIT MUDA ANGKATAN XI TAHUN 2017', '2017-03-07', '2017-04-29', '-', 1, '2018-02-28 21:27:31', '2018-02-28 21:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `angkatan_peserta`
--

CREATE TABLE IF NOT EXISTS `angkatan_peserta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `angkatan_diklat_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `angkatan_peserta_angkatan_diklat_id_foreign` (`angkatan_diklat_id`),
  KEY `angkatan_peserta_users_account_id_foreign` (`users_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `angkatan_peserta`
--

INSERT INTO `angkatan_peserta` (`id`, `angkatan_diklat_id`, `users_account_id`, `created_at`, `updated_at`) VALUES
(1, 1, 22, '2018-02-28 23:41:52', '2018-02-28 23:41:52'),
(2, 1, 25, '2018-03-01 00:33:40', '2018-03-01 00:33:40'),
(3, 1, 26, '2018-03-01 00:35:00', '2018-03-01 00:35:00'),
(4, 1, 27, '2018-03-01 00:36:16', '2018-03-01 00:36:16'),
(5, 1, 28, '2018-03-01 00:36:54', '2018-03-01 00:36:54'),
(6, 1, 29, '2018-03-01 00:37:45', '2018-03-01 00:37:45'),
(7, 1, 30, '2018-03-01 00:38:41', '2018-03-01 00:38:41'),
(8, 1, 31, '2018-03-01 00:42:42', '2018-03-01 00:42:42'),
(9, 1, 32, '2018-03-01 00:43:26', '2018-03-01 00:43:26'),
(10, 1, 33, '2018-03-01 00:43:57', '2018-03-01 00:43:57'),
(11, 1, 34, '2018-03-01 00:44:31', '2018-03-01 00:44:31'),
(12, 1, 35, '2018-03-01 00:45:05', '2018-03-01 00:45:05'),
(13, 1, 36, '2018-03-01 00:45:34', '2018-03-01 00:45:34'),
(14, 1, 37, '2018-03-01 00:50:14', '2018-03-01 00:50:14'),
(15, 1, 38, '2018-03-01 00:51:20', '2018-03-01 00:51:20'),
(16, 1, 39, '2018-03-01 00:51:49', '2018-03-01 00:51:49'),
(17, 1, 40, '2018-03-01 00:52:17', '2018-03-01 00:52:17'),
(18, 1, 41, '2018-03-01 00:53:03', '2018-03-01 00:53:03'),
(19, 1, 42, '2018-03-01 00:53:30', '2018-03-01 00:53:30'),
(20, 1, 43, '2018-03-01 00:54:02', '2018-03-01 00:54:02'),
(21, 1, 44, '2018-03-01 00:54:32', '2018-03-01 00:54:32'),
(22, 1, 45, '2018-03-10 16:47:37', '2018-03-10 16:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE IF NOT EXISTS `chat_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chat_room_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_message_chat_room_id_foreign` (`chat_room_id`),
  KEY `chat_message_users_account_id_foreign` (`users_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE IF NOT EXISTS `chat_room` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_one_id` int(10) unsigned NOT NULL,
  `users_two_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_room_users_one_id_foreign` (`users_one_id`),
  KEY `chat_room_users_two_id_foreign` (`users_two_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment`
--

CREATE TABLE IF NOT EXISTS `forum_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forum_post_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forum_comment_forum_post_id_foreign` (`forum_post_id`),
  KEY `forum_comment_users_account_id_foreign` (`users_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `forum_comment`
--

INSERT INTO `forum_comment` (`id`, `forum_post_id`, `users_account_id`, `konten`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '<p>good</p>', '2018-03-10 09:40:20', '2018-03-10 09:40:20'),
(2, 1, 9, '<p>test</p>', '2018-03-10 09:54:11', '2018-03-10 09:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `forum_post`
--

CREATE TABLE IF NOT EXISTS `forum_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_account_id` int(10) unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forum_post_users_account_id_foreign` (`users_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forum_post`
--

INSERT INTO `forum_post` (`id`, `users_account_id`, `judul`, `konten`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kleas 1A', '<p>asdkahdasdlashdasklh</p>', '2018-03-09 02:01:49', '2018-03-09 02:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE IF NOT EXISTS `hak_akses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hak_akses_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `nama`, `slug`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Staff', 'staff', '', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(2, 'Pimpinan', 'pimpinan', '', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(3, 'Instruktur', 'instruktur', '', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(4, 'Peserta', 'peserta', '', '2018-02-28 21:17:38', '2018-02-28 21:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `kantor_cabang`
--

CREATE TABLE IF NOT EXISTS `kantor_cabang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `kantor_cabang`
--

INSERT INTO `kantor_cabang` (`id`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'KANWIL MEDAN', 'Jl. Pegadaian No. 112, Medan - Sumatera Utara', '0614567247', NULL, NULL),
(2, 'KANWIL BALIKPAPAN', 'Jl. Jenderal Sudirman Stalkuda, Balikpapan - Riau', '0542762002', NULL, NULL),
(3, 'KANWIL PEKANBARU', 'Jl. Jend. Sudirman No. 167 A-B, Pekanbaru - Riau', '076139195', NULL, NULL),
(4, 'KANWIL PALEMBANG', 'Jl. Merdeka No. 11, Palembang - Sumatera Selatan', '0711361529', NULL, NULL),
(5, 'KANWIL JAKARTA 1', 'Jl. Senen Raya No. 36, Jakarta Pusat - DKI Jakarta', '0213505151', NULL, NULL),
(6, 'KANWIL MAKASSAR', 'Ruko Kumala Raya A No. 76/78, Jl. Kumala Raya No. 76/78, Makassar - Sulawesi Selatan', '0411856613/14', NULL, NULL),
(7, 'KANWIL BANDUNG', 'Jl. Pugkur No. 125, Bandung - Jawa Barat', '0224262280', NULL, NULL),
(8, 'KANWIL SURABAYA', 'Jl. Dinoyotangsi, Surabaya - Jawa Timur', '0315675294', NULL, NULL),
(9, 'KANWIL MANADO', 'Jl. Dr.Soetomo No. 199, Manado - Sulawesi Utara', '0431869262', NULL, NULL),
(10, 'KANWIL DENPASAR', 'Jl. Raya Puputan No. 23.C, Denpasar - Bali', '0361242011', NULL, NULL),
(11, 'KANWIL JAKARTA 2', 'Jl. Pasar Senen, Jakarta Pusat - DKI Jakarta', '0213450759', NULL, NULL),
(12, 'KANWIL SEMARANG', 'Jl. Kimangun Sarkoro No. 7, Semarang - Jawa Tengah', '0248415896', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_comment`
--

CREATE TABLE IF NOT EXISTS `kelas_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelas_post_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kelas_comment_kelas_post_id_foreign` (`kelas_post_id`),
  KEY `kelas_comment_users_account_id_foreign` (`users_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kelas_comment`
--

INSERT INTO `kelas_comment` (`id`, `kelas_post_id`, `users_account_id`, `konten`, `created_at`, `updated_at`) VALUES
(1, 2, 22, 'asd', '2018-03-10 17:08:34', '2018-03-10 17:08:34'),
(2, 2, 9, 'zcx', '2018-03-10 17:08:40', '2018-03-10 17:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_post`
--

CREATE TABLE IF NOT EXISTS `kelas_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_account_id` int(10) unsigned NOT NULL,
  `kelas_virtual_id` int(10) unsigned NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kelas_post_users_account_id_foreign` (`users_account_id`),
  KEY `kelas_post_kelas_virtual_id_foreign` (`kelas_virtual_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kelas_post`
--

INSERT INTO `kelas_post` (`id`, `users_account_id`, `kelas_virtual_id`, `konten`, `created_at`, `updated_at`) VALUES
(1, 22, 9, '<p>Halo</p>', '2018-03-10 09:26:46', '2018-03-10 09:26:46'),
(2, 9, 1, '<p>asdasdazxc</p>', '2018-03-10 17:08:20', '2018-03-10 17:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_virtual`
--

CREATE TABLE IF NOT EXISTS `kelas_virtual` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('0','1','5') COLLATE utf8_unicode_ci NOT NULL,
  `angkatan_diklat_id` int(10) unsigned NOT NULL,
  `mata_pelajaran_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kelas_virtual_angkatan_diklat_id_foreign` (`angkatan_diklat_id`),
  KEY `kelas_virtual_mata_pelajaran_id_foreign` (`mata_pelajaran_id`),
  KEY `kelas_virtual_users_account_id_foreign` (`users_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `kelas_virtual`
--

INSERT INTO `kelas_virtual` (`id`, `nama_kelas`, `keterangan`, `status`, `angkatan_diklat_id`, `mata_pelajaran_id`, `users_account_id`, `created_at`, `updated_at`) VALUES
(1, 'DIKLAT MUDA XI 2017 - MTLP', '-', '1', 1, 2, 9, '2018-03-01 00:59:56', '2018-03-01 15:35:30'),
(2, 'DIKLAT MUDA XI 2017 - HJF', '-', '0', 1, 1, 15, '2018-03-10 08:44:32', '2018-03-10 08:44:32'),
(3, 'DIKLAT MUDA XI 2017 - DPP', '-', '0', 1, 3, 7, '2018-03-10 08:45:00', '2018-03-10 08:45:00'),
(4, 'DIKLAT MUDA XI 2017 - MTPI', '-', '0', 1, 4, 11, '2018-03-10 08:45:49', '2018-03-10 08:45:49'),
(5, 'DIKLAT MUDA XI 2017 - MTBG', '-', '0', 1, 5, 11, '2018-03-10 08:46:15', '2018-03-10 08:46:15'),
(6, 'DIKLAT MUDA XI 2017 - POBF', '-', '0', 1, 6, 13, '2018-03-10 08:46:45', '2018-03-10 08:46:45'),
(7, 'DIKLAT MUDA XI 2017 - PKP', '-', '0', 1, 7, 21, '2018-03-10 08:47:10', '2018-03-10 08:47:10'),
(8, 'DIKLAT MUDA XI 2017 - PAS', '-', '0', 1, 8, 16, '2018-03-10 08:47:37', '2018-03-10 08:47:37'),
(9, 'DIKLAT MUDA XI 2017 - AK', '-', '1', 1, 9, 14, '2018-03-10 08:48:10', '2018-03-10 09:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_pelajaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `slug`, `nama_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 'HJF', 'Hukum Jaminan Fidusia', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(2, 'MTLP', 'Metode Teknik Menaksir Logam Perhiasan', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(3, 'DPP', 'Dasar-dasar Pembiayaan dan Perkreditan', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(4, 'MTPI', 'Metode dan Teknik Menaksir Permata Intan', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(5, 'MTBG', 'Metode dan Teknik Menaksir Barang Gudang', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(6, 'POBF', 'Pedoman Operasional Bisnis Fidusia', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(7, 'PKP', 'Proses Kerja Penaksir', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(8, 'PAS', 'Pegadaian Sistem Informasi Online', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(9, 'AK', 'Akuntansi dan Keuangan', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(10, 'BP', 'Budaya Perusahaan', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(11, 'SPP', 'Standar Pelayanan Pegadaian', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(12, 'PD', 'Personality Development', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(13, 'PMIS', 'Pemasaran Market Inteligen & Sales', '2018-02-28 21:17:38', '2018-02-28 21:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `materi_pelajaran`
--

CREATE TABLE IF NOT EXISTS `materi_pelajaran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul_materi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `mata_pelajaran_id` int(10) unsigned NOT NULL,
  `jenis_file` enum('pdf','ppt','video') COLLATE utf8_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materi_pelajaran_users_account_id_foreign` (`users_account_id`),
  KEY `materi_pelajaran_mata_pelajaran_id_foreign` (`mata_pelajaran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_01_08_044745_create_all_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `polling_detail`
--

CREATE TABLE IF NOT EXISTS `polling_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `polling_post_id` int(10) unsigned NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `polling_detail_polling_post_id_foreign` (`polling_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `polling_hasil`
--

CREATE TABLE IF NOT EXISTS `polling_hasil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `polling_detail_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `polling_hasil_polling_detail_id_foreign` (`polling_detail_id`),
  KEY `polling_hasil_users_account_id_foreign` (`users_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `polling_post`
--

CREATE TABLE IF NOT EXISTS `polling_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_account_id` int(10) unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `polling_post_users_account_id_foreign` (`users_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reward_list`
--

CREATE TABLE IF NOT EXISTS `reward_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reward_to`
--

CREATE TABLE IF NOT EXISTS `reward_to` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelas_virtual_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `reward_list_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reward_to_kelas_virtual_id_foreign` (`kelas_virtual_id`),
  KEY `reward_to_users_account_id_foreign` (`users_account_id`),
  KEY `reward_to_reward_list_id_foreign` (`reward_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_jawaban`
--

CREATE TABLE IF NOT EXISTS `tugas_jawaban` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tugas_post_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `file_tugas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tugas_jawaban_tugas_post_id_foreign` (`tugas_post_id`),
  KEY `tugas_jawaban_users_account_id_foreign` (`users_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tugas_jawaban`
--

INSERT INTO `tugas_jawaban` (`id`, `tugas_post_id`, `users_account_id`, `file_tugas`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 2, 22, '2-22-DataTables example - PDF - image.pdf', '-', '2018-03-10 09:27:36', '2018-03-10 09:27:36'),
(2, 1, 22, '1-22-DataTables example - PDF - image.pdf', '-', '2018-03-10 09:28:01', '2018-03-10 09:28:01'),
(3, 3, 22, '3-22-DataTables example - PDF - image.pdf', '-', '2018-03-10 09:31:14', '2018-03-10 09:31:14'),
(4, 3, 42, '3-42-DataTables example - PDF - image.pdf', '-', '2018-03-10 09:34:17', '2018-03-10 09:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_nilai`
--

CREATE TABLE IF NOT EXISTS `tugas_nilai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tugas_jawaban_id` int(10) unsigned NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tugas_nilai_tugas_jawaban_id_foreign` (`tugas_jawaban_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tugas_nilai`
--

INSERT INTO `tugas_nilai` (`id`, `tugas_jawaban_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 2, 85, '2018-03-10 09:28:46', '2018-03-10 09:28:46'),
(2, 1, 90, '2018-03-10 09:28:58', '2018-03-10 09:28:58'),
(3, 3, 77, '2018-03-10 09:31:48', '2018-03-10 09:31:48'),
(4, 4, 76, '2018-03-10 09:34:52', '2018-03-10 09:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_post`
--

CREATE TABLE IF NOT EXISTS `tugas_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelas_virtual_id` int(10) unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tugas_post_kelas_virtual_id_foreign` (`kelas_virtual_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tugas_post`
--

INSERT INTO `tugas_post` (`id`, `kelas_virtual_id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 9, 'Tugas 1', '<p>Diilustrasikan Pak Candra adalah seorang pengacara yang membuka kantor pengacara. Kemudian kita sebagai akuntan nya diminta untuk membuat laporan keuangan sederhana dari semua transaksi dibulan pertama. Berikut ini transaksi yang dilakukan Pak Candra.</p>\n<p>Pada tanggal 1 Bulan Januari 2016&nbsp;Pak Candra membuka Kantor Candra Advokat dengan&nbsp;menyerahkan <a title="uang" href="http://rocketmanajemen.com/peluang-usaha/" target="_blank" rel="noopener">uang</a> Kas ke kantor sebesar Rp5.000.000 dan&nbsp;peralatan kantor sebesar Rp10.000.000.&nbsp;Ditanggal yang sama&nbsp;Pak Candra membayar sewa gedung untuk 1,5 tahun sebesar&nbsp;Rp4.500.000</p>\n<p>Kemudian tanggal 3 Januari 2016&nbsp;Pak Candra membantu kasus hukum PT. Karya Amanah dan dibayar bulan depan sebesar Rp10.000.000. Ditanggal 7&nbsp;Pak&nbsp;Candra mendapatkan <a title="uang" href="http://rocketmanajemen.com/peluang-usaha/" target="_blank" rel="noopener">uang</a> sebesar Rp5.000.000 dari klien atas bantuan hukum yang diberikannya.</p>\n<div style="float: none; margin: 10px 0 10px 0; text-align: center;">&nbsp;</div>\n<p>Karena kebutuhan Pak Candra meminjam uang ke <a title="bank" href="http://rocketmanajemen.com/kategori/perbankan/" target="_blank" rel="noopener">bank</a> sebesar Rp50.000.000 pada tanggal 9 Januari 2016. Selanjutnya tanggal 14 Januari 2016 Pak&nbsp;candra membantu kasus hukum PT. Karya Sejati dan dibayar sebesar Rp20.000.000, tapi 40% sisanya dibayar tanggal 20 Januari 2016.</p>\n<p>Pada tanggal 18 Januari Pak Candra membayar gaji karyawan ( bagian administrasi )&nbsp;Sebesar Rp1.500.000. Ditanggal 2016 Januari&nbsp;Pak&nbsp;Candra menerima uang dari utang klien saat tanggal&nbsp;14 Jan 2016.</p>\n<p>Pak Candra selanjutnya membayar utang ke <a title="bank" href="http://rocketmanajemen.com/kategori/perbankan/" target="_blank" rel="noopener">bank</a> sebesar Rp2.500.000 ditanggal 23 Januari 2016. Dua hari berikutnya yaitu tanggal 25 Januari 2016 Pak Candra membantu Pak Ahmad dalam kasusnya dan dibayar tunai sebesar Rp5.000.000</p>\n<p>Ditanggal 30 Januari Pak&nbsp;Candra membayar biaya telepon sebesar Rp100.000, air sebesar&nbsp;Rp100.000 dan biaya listrik sebesar Rp150.000. Pada akhir Januari Pak&nbsp;Candra membantu kasus PT. Graha Vero dan dibayar tunai sebesar Rp5.000.000.</p>', '2018-03-10 09:11:45', '2018-03-10 09:11:45'),
(2, 9, 'Tugas 2', '<ol style="list-style-type: lower-alpha;">\n<li>Cara melakukan tukar-menukar barang disebut?</li>\n<li>Sebutkan keunggulan emas dan perak digunakan sebagai alat tukar?</li>\n<li>Sebutkan syarat-syarat untuk memenuhi uang dapat diterima dimasyarakat?<u></u></li>\n</ol>\n<ol style="list-style-type: lower-alpha;" start="4">\n<li>Sebutkan salah satu barter ditinggalkan di masyarakat?<u></u></li>\n</ol>\n<ol style="list-style-type: lower-alpha;" start="5">\n<li>Menurut A.C. Pigau dalam bukunya yang berjudul <em>The Veil of Money</em>, yang dimaksud uang adalah?</li>\n</ol>', '2018-03-10 09:17:21', '2018-03-10 09:17:21'),
(3, 1, 'Tugas 1', '<p>Jelaskan metode yang digunakan dalam menaksir logam perhiasan.</p>', '2018-03-10 09:30:42', '2018-03-10 09:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE IF NOT EXISTS `users_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hak_akses_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_account_username_unique` (`username`),
  KEY `users_account_hak_akses_id_foreign` (`hak_akses_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `users_account`
--

INSERT INTO `users_account` (`id`, `username`, `password`, `hak_akses_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'staff@e-learning.dev', '$2y$10$QbMXX0vsls5XG.XV7Z.1HecMhcTNjfIN92PDPOZ/nogCTV3UxNc9G', 1, 1, 'v9z8siVQ1UsSsuJ1b0Mne1ihW1JUPhZX0QbjXxViQlVcKXeCiRNKSgtODFhV', '2018-02-28 21:17:38', '2018-02-28 21:17:38'),
(2, 'P84567', '$2y$10$5AVsTJJ9KZgGHJSxC8zKjetoKAq60/FvPG7iATx5yo53gR6qJ46ja', 2, 1, 'Id849VUC5Pw0MpMj3LMWW11gQwypCS63IIql0rxFu3oEXekbDWaLKTDJr60I', '2018-02-28 21:25:30', '2018-02-28 21:25:30'),
(3, 'P84778', '$2y$10$NPGpb3AHbPckh5RPI2Y/uO8js2eM7VAJ5CACglbWS46XwOaEQc1Wi', 2, 1, 'Lw7Z3DK7QIop0GZiX9rCF4z8Xnx5KWDrj2nnvlfFHXdIieQJninHMdtkhJOI', '2018-02-28 21:26:34', '2018-02-28 21:26:34'),
(4, 'P84123', '$2y$10$0Smew3F9NNTWcSRBTcMH7eIelugj/ZeABCbEQIkXTbfX6T4Z6Ucbm', 3, 1, 'HHl6nrn8HjW0lj9zJQUvNGuq5OuPVoLXjTW9qhbW2uElkf8hvkLuYg0Kkt4m', '2018-02-28 21:31:23', '2018-02-28 21:31:23'),
(5, 'P84234', '$2y$10$MQb7fHJ1M4dtWvESHvTKsugRfg8EsMqQ89LigOnKine5o/8F82AUi', 3, 1, 'fGeD9peP3G2Wdlv5DpH272q47M4XmvKyN4OLqqag70QL2MLiUL5yam3QoQ7D', '2018-02-28 21:33:55', '2018-02-28 21:33:55'),
(6, 'P84345', '$2y$10$YJ30DMEZjFQ4iOLlXPmI5egil1Xp2IkUwip2v1oqgXGrKfQWs/Utq', 3, 1, 'dRy8Hd0aZQe0HyNs9N2NQTp92kok2rf9DDPcX5ugaJQCzk0wBmNsN8xQEX22', '2018-02-28 21:40:19', '2018-02-28 21:40:19'),
(7, 'P84456', '$2y$10$EmfuINTdvkC23WBBW6Q4GeZfLq8c.eicl7MTFrcKd7irGl/eTMobG', 3, 1, 'b50yk64FwhYwByC5EUuEP8kepaxofBC1M0Inzj5hlSqeS5xMJVY0ClAZ84ye', '2018-02-28 22:21:14', '2018-02-28 22:21:14'),
(8, 'P86123', '$2y$10$FsQWk2bBvXx1R2LfrBoxVuOl4t2reW0k3e2b6x/ywdtl4Wif0tJiS', 3, 1, '7XobZ8kCw9gWzDcdIZXSdiqje7l6d4JLY9iS5kjLnTFajH2lXAPRWhv0T12w', '2018-02-28 22:24:16', '2018-02-28 22:24:16'),
(9, 'P86234', '$2y$10$L3XzQ8kpgMW1vjCoSpHR1.iavPmb7gQlyB1fqWKSzz8znRvcCkm7i', 3, 1, 'HBWge1bzJrAVD7XaISdVMMZCmFiVUNNVk7ftcyGj5nHwJ08ldqzl9Z3h1BeP', '2018-02-28 22:25:47', '2018-02-28 22:25:47'),
(10, 'P86345', '$2y$10$Y5VwbghOwUEPRAEWhgohsOpbDiQt48BON9kuHl6FXUpZu.2SA02Um', 3, 1, 'CpFzEUqgiAC28IDhqZA068zKRWm0Q34BrmAHujqQQBMoa2rzcgPqBgz7300u', '2018-02-28 22:27:10', '2018-02-28 22:27:10'),
(11, 'P86567', '$2y$10$3HMQvXxzB0cfK12GfwlY1eVpRZKKncN1j.VSHxyfhoGI6bZX1b3dK', 3, 1, 'Q6mIN1lzkFCqB9aixuHCXXjfUkyxrT34FkxxoIxyVemcUibKnUIpINAkthrI', '2018-02-28 22:28:28', '2018-02-28 22:28:28'),
(12, 'P86678', '$2y$10$k36h9.Lix2lCtaU.TidA.ORHIWIvHa0H2eXiAARIehC3iPzV9q07G', 3, 1, 'bVWkLQ2aP7G6Z8RJZxYIPts39uJmwwv8NZV75T7LWFrzu7jBMbSJrYTUGyyz', '2018-02-28 22:30:37', '2018-02-28 22:30:37'),
(13, 'P1234', '$2y$10$rUcmKcPzD5h4.jQBbGdIIeTC7jO8CQJtCzSqlOXaSEJtUvNLSKuae', 3, 1, 'vqVYckr3BsHQUe2bJQPix73M9c7jpkZfLVpzNZ49SqQfSyuzI51XWBmvNoRK', '2018-02-28 22:35:05', '2018-02-28 22:35:05'),
(14, 'P4567', '$2y$10$6hjCxNg2DCIxb80TsfR9U.LdVEt4pSLay.d1a6VgB6uN/teXkct3O', 3, 1, 'twe4WHymwXrIZKRNTLuKCp3RBtb8gQ8eijrcpzSVK8jYeAIiCd1iDhwrGcf1', '2018-02-28 22:48:25', '2018-02-28 22:48:25'),
(15, 'P6789', '$2y$10$amqTXkLFtGgsFU1LE2PaDeHM7K784ITCgIugvLz9vAY4VMMM0eybC', 3, 1, '2bEkAnfpHnkMNLjyrc64mr4qNX8rLgJ5SkBr78XwNHPO2TnbVx3Ja8YZJsqd', '2018-02-28 22:59:53', '2018-02-28 22:59:53'),
(16, 'P7890', '$2y$10$BS/4cbSC/DcMeMMScnCVEe0kOJo6r00tYIon3xZ1kI4OMtgJVWqPu', 3, 1, 'QXHjCST1bOPyEZy9K9YlGGR0KFNUGPAI8J0eRPmwxzgdt0io1vystkM80iUg', '2018-02-28 23:01:05', '2018-02-28 23:01:05'),
(17, 'P8901', '$2y$10$gTWbOEZ3zEAlWfaMemifwets2c7cJaCZRzCtKLJ2Qn4a.demu4Rz.', 3, 1, 'IkZukxuK5vTnqH9SUBTHLrkD4PsthfrXGM0Yy1xkb7dBZlbYpUck7JeqwHlR', '2018-02-28 23:02:52', '2018-02-28 23:02:52'),
(18, 'P9012', '$2y$10$ZcrwcEG9GDSh5xAkLENDru1YYlQSWMyFdgUQP.GGTkkEZyATuOPvC', 3, 1, 'PU5xXtI69bzaKKqhjs24iE7vm8r5HyYoiTwKUUtLeFPcsKvorRRUtpeACs9y', '2018-02-28 23:13:09', '2018-02-28 23:13:09'),
(19, 'P9123', '$2y$10$nlZSp6T/N08MfCo.E.tlAOCbsg5dAxFXva1Pk9r6ABK4iUaqF2aj2', 3, 1, 'gHgBnBTabmwLa9tCkFlMmTrojNmHjwrVY2O1tI3o6aPothq3gZhPFtoDeQIM', '2018-02-28 23:14:36', '2018-02-28 23:14:36'),
(20, 'P9234', '$2y$10$0rzcC4YSwOiZi7KgAndtf.e/aR3uxpwoFN.zIY0eaCoZ3v097Zcm2', 3, 1, 'L2hXW6yraLoGT9OQQsCHtaRDhrJB34JyVJh7qebe0HvuV6gGnqQ0UkEdAyi1', '2018-02-28 23:25:55', '2018-02-28 23:25:55'),
(21, 'P9345', '$2y$10$DMnX14JelXOBc2G81BRLn.D1YO9yNTlF/Sk6pONgrfdLy0IpR7VfS', 3, 1, 'Y20cxRCntXwjb4pay1nVywsq1sSNbCJBLteNYve1h5ABf33a34lh3Pxu0nMv', '2018-02-28 23:27:20', '2018-02-28 23:27:20'),
(22, 'P89148035', '$2y$10$tj6KWhOhWN1.ThECgJ63A.dCm1b7EJJhywNb9le1sgMpQWyKcceWS', 4, 1, 'coAFcueDjeZgWS0v1xH4LUIzYHvegneFdA56fWK7L4zFtXDmoUpiyS0WFMS2', '2018-02-28 23:41:52', '2018-02-28 23:41:52'),
(25, 'P921613093', '$2y$10$gxUucgX.wMDakG0caiTu/.iFuOnhrS47gdhcMz7786jr9NGb.Qq4K', 4, 1, 'MGkbvhtc1CnhfQfLq1TN5m9zdIfe7nzCwcTfC2n8LZloR01sf4cJ8dAJtjTq', '2018-03-01 00:33:40', '2018-03-01 00:33:40'),
(26, 'P941613121', '$2y$10$b14jyitGRGBJQ4HT72H7V.rekYYTuo9upyhGhREJbG1KMvvbqVGva', 4, 1, '1EjV2jOVXfcLnhpK6bLR7zaLX6pjBsaRXROyzg0Qv46eNG6a8Rj1g5knX1ej', '2018-03-01 00:35:00', '2018-03-01 00:35:00'),
(27, 'P851511776', '$2y$10$iCV2vCdXFtswnaJkEh.ImOXGLer8TUO7YXeIZi26B4WW2U7xxQlU6', 4, 1, 'sRFATGceUIvk1H8uhmLqqwfobW2mhRbsDVWJxUM0u5D9YmFqVuZyT0yuO1VV', '2018-03-01 00:36:16', '2018-03-01 00:36:16'),
(28, 'P931613056', '$2y$10$2M/t/hFZg12m8mxz9nsVXOG.3DsCjNKOKNWmER5cIyl4TRIdcrp4W', 4, 1, '67h1lfSdFev6QtYRy8DyCedNfWmn84omNleZc4Gdo4mi3sqcmRDs15qYNMwQ', '2018-03-01 00:36:54', '2018-03-01 00:36:54'),
(29, 'P921613458', '$2y$10$eDvKZmuCS9aZhfSyUO0Rpeu7EdppGzCsh40GYnFC3UMDQUUBZriuC', 4, 1, 'tL2V04i7zY5TKjEttCTitZ1y2LXKoEiFw8dzmbb0FkKHagLbHUsPzkqosYxB', '2018-03-01 00:37:45', '2018-03-01 00:37:45'),
(30, 'P88149178', '$2y$10$Kuj2ybMNI4ZFvlgaDoXAAumD9FjyNrqK99r2oadsuWBoB/EWiCx1y', 4, 1, '0Y2SBrQjmbSuvq2eMfZwMrJ26H2sJRL3E9rXJ4oxvxoLGH7GmjI8QAGEyw9h', '2018-03-01 00:38:41', '2018-03-01 00:38:41'),
(31, 'P931613673', '$2y$10$EfyWfOJpCr6163BgrF3EGu3gqeeNqAqbL3ITr5DPrLuaYoU3eIqW2', 4, 1, 'DHutHY0QyJ6JYLYYlnfKztuOHDHrcsF4MhQ9b7UDQrQ6iJN8bmBxTq6itPMl', '2018-03-01 00:42:42', '2018-03-01 00:42:42'),
(32, 'P921613071', '$2y$10$NyvwXas35qk09yHU0wjZw.kihjPybqmv2ZhSZ9kjqskknbrUgvGl2', 4, 1, '9N5zfBGwT695TOxhG30lAyaYrMjxoTmI2Fg7c0eEE5jOneTBycij5rNu0Nk4', '2018-03-01 00:43:26', '2018-03-01 00:43:26'),
(33, 'P85148081', '$2y$10$CwASCdFQg5fyieVxO86vq.ULp/Raw4Uahq4aDJ8v.kko6bV5MsCmS', 4, 1, 'Z18hnZOxTnFrZyBUbbNNqeUWlDgmxbNKO8CptonvbZUScoa6KwjOaExvvF1G', '2018-03-01 00:43:57', '2018-03-01 00:43:57'),
(34, 'P861511874', '$2y$10$xROVk/rIR1OrH575wOJaoOaQ54djMgC0JPVHI9G74NkfsrNs.MTMC', 4, 1, 'WgJHhu5a63s2Bg14nLSji12QOTsBTvkxHIsMydkhoujr1oICi3pdbcsjiOQx', '2018-03-01 00:44:31', '2018-03-01 00:44:31'),
(35, 'P91149229', '$2y$10$b1aKlgn/f2auXkIHMvPiU.ZCbgbBtfnS1vU7rSAQ5zskxe.nDJkES', 4, 1, 'HmxXoI98k7tA6QXXNRo7CCbl4dciYbdZxjKPSK5a3JmDzeKbXHj8Ldw4iIfU', '2018-03-01 00:45:05', '2018-03-01 00:45:05'),
(36, 'P87149143', '$2y$10$KjtUJxIteeVqc87g2bp/5eFRlpU2qmIpW1VaN7bxFr95R15qA6OGO', 4, 1, 'jup3VGMLTp8Ry7m8vQ3Pn81Vkknq2OpjV5WbBg5Ceoxs5OceOl69gYLjKGcX', '2018-03-01 00:45:34', '2018-03-01 00:45:34'),
(37, 'P82149256', '$2y$10$oxnmRWRSG1pogfXiaxgk4upapocwN9lEinRHSKtRXyuM66Qqy/M7u', 4, 1, 'lTmLHQQuzDcxCLAQVVBazVrgenaDK68kCgSBmY0hnChybbiQhJNHUSpLIwne', '2018-03-01 00:50:14', '2018-03-01 00:50:14'),
(38, 'P86149109', '$2y$10$kn3lLtXGlRvnzlThytJll.606wOQWmNToSlEW/uRcRGRP5mghpGH2', 4, 1, '5gWE5JMEx9hCeUf0b3KNEbBM8CBNhxhVx2s7QDg3BjITfnJT07ZTKjjSrQey', '2018-03-01 00:51:20', '2018-03-01 00:51:20'),
(39, 'P87149168', '$2y$10$hUCRwKyeyjvMPphVhZpfo.RjeSgmHufgveJFOhOKXOfOrib6kq5ny', 4, 1, '6s6QC1VvVchZeaQjPpNa1hhJGoR8OHYVWaIyM6cf6D8c97aqQ5Y1MHMcjQk4', '2018-03-01 00:51:49', '2018-03-01 00:51:49'),
(40, 'P84149273', '$2y$10$caiJ84/POV67NaHXGf2iVuoMRxbxOfvBXL7pOOz7A44VXUJON7pwe', 4, 1, 'n98foFth9e0j84cXPh6dMXBYLNTrQmBYiboRlAi7wEMqkNG8HiXj12veeWMh', '2018-03-01 00:52:17', '2018-03-01 00:52:17'),
(41, 'P90149495', '$2y$10$JaOxKKNFIhrdRca9JqtblO7MjPnF3TbyiS1SkKTIbXrordpxZQRHa', 4, 1, 'uKOOribAc5REYWKqDO1Z3a3xP6wmWJ6iJpSjt2D6hkSHF9XHb0LD2vSYr1Jr', '2018-03-01 00:53:03', '2018-03-01 00:53:03'),
(42, 'P86149104', '$2y$10$KAtKn7dyp54pO1WYQ1Er9OqpD0S9SOZaMDK2lzdKLyAK2qEO/7IJC', 4, 1, 'Mz2IsK58MZ9mMropfrYwTAzRZK3HMglM3qjTknnZFqMpH0ZDQUG8abrRWB8m', '2018-03-01 00:53:30', '2018-03-01 00:53:30'),
(43, 'P921613065', '$2y$10$ITu1KA0g.nYUok7ggKk7Yutg7aruz0kQhekR.bZYVdc9TB.KtCtoC', 4, 1, '82LJcgfIHvzN9v86jtMUuMDV2Si1aRGR4c4Ol68hoA8IEkZ4xzc2eMLVrvq3', '2018-03-01 00:54:02', '2018-03-01 00:54:02'),
(44, 'P89148037', '$2y$10$AQ3qqrYy.uzdiFSzIrRGS.e5o4i7.plPAxfCVcFIo6V74PAbWwbr6', 4, 1, 'IKw2EiRdWRNc2ExqokNxfU7Q4NABmT8jvDhwPwMvhKFIsPBcDvX1xJhdsK3k', '2018-03-01 00:54:32', '2018-03-01 00:54:32'),
(45, '061234543', '$2y$10$szn6q4oG.ICjsRB7GHzvLeAff8/LhFxHyAUddEEsQnwYyAnvpaZWu', 4, 1, NULL, '2018-03-10 16:47:37', '2018-03-10 16:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `users_profil`
--

CREATE TABLE IF NOT EXISTS `users_profil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') COLLATE utf8_unicode_ci NOT NULL,
  `agama` enum('Islam','Katolik','Protestan','Hindu','Buddha') COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8_unicode_ci,
  `telepon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kantor_cabang_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_profil_nik_unique` (`nik`),
  UNIQUE KEY `users_profil_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `users_profil`
--

INSERT INTO `users_profil` (`id`, `nik`, `email`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `telepon`, `photo`, `kantor_cabang_id`, `created_at`, `updated_at`) VALUES
(1, 'P444262', 'adiraka8@gmail.com', 'Adi Raka Siwi', 'Padang', '1994-04-29', 'Pria', 'Islam', 'Komplek Filano Mandiri Tabing Padang', '081268280648', '45788-photodune-4276142-smiling-portraits-xl_031.jpg', 2, '2018-02-28 21:17:38', '2018-03-03 15:21:28'),
(2, 'P84567', 'yendriwasih@gmail.com', 'Yendriwasih', 'Bukittinggi', '1976-03-20', 'Wanita', 'Islam', 'Jl. Cengkeh', '081374516363', '73495-speaker-1-v2-300x300.jpg', 1, '2018-02-28 21:25:30', '2018-03-03 15:16:39'),
(3, 'P84778', 'nadrawati@gmail.com', 'Nadrawati', 'Biaro', '1965-03-11', 'Wanita', 'Islam', 'Lubuk Minturun', '081363346479', '12179-download (4).jpg', 1, '2018-02-28 21:26:34', '2018-03-07 07:02:58'),
(4, 'P84123', 'asmadi@gmail.com', 'Asmadi', 'Pariaman', '1976-03-10', 'Pria', 'Islam', 'Jl. Gunung Pangilun Padang', '081363043899', '94358-download (3).jpg', 8, '2018-02-28 21:31:23', '2018-03-07 06:41:16'),
(5, 'P84234', 'leny@gmail.com', 'Leny', 'Kota Baru', '1977-01-16', 'Wanita', 'Islam', 'Jl. Belanti No 34 Padang', '081267020616', '31709-images (4).jpg', 3, '2018-02-28 21:33:55', '2018-03-07 06:51:14'),
(6, 'P84345', 'edwar@gmail.com', 'Edwar', 'Padang', '1975-01-07', 'Pria', 'Katolik', 'Jl. Tan Malaka Sawahan Padang', '089723112908', '28810-download (2).jpg', 5, '2018-02-28 21:40:19', '2018-03-07 06:52:12'),
(7, 'P84456', 'peni.marzuki@gmail.com', 'Peni Marzuki', 'Batusangkar', '1979-04-28', 'Pria', 'Islam', 'Jl. Andalas Padang', '081374990201', '56132-images (7).jpg', 8, '2018-02-28 22:21:14', '2018-03-07 06:54:35'),
(8, 'P86123', 'gusti.yeni@gmail.com', 'Gusti Yeni', 'Pariaman', '1980-04-01', 'Wanita', 'Islam', 'Jl. Nerwana No 31 Padang Barat', '081274879811', '78386-images (5).jpg', 1, '2018-02-28 22:24:16', '2018-03-07 07:12:03'),
(9, 'P86234', 'hari.subur@gmail.com', 'Hari Subur Tjahji', 'Padang', '1980-02-01', 'Pria', 'Hindu', 'Jl. Kampar Selatan, Kepulauan Riau', '081374562873', '33940-review1.jpg', 3, '2018-02-28 22:25:47', '2018-03-10 16:52:37'),
(10, 'P86345', 'hari.evy@gmail.com', 'Hari Evy S', 'Jakarta', '1969-06-09', 'Pria', 'Islam', 'Komp. Sinarmas, Pekanbaru', '08779112931', '96033-download.jpg', 3, '2018-02-28 22:27:10', '2018-03-08 00:29:54'),
(11, 'P86567', 'mery.andriati@gmail.com', 'Mery Andriati S', 'Padang', '1976-10-11', 'Wanita', 'Protestan', 'Komp. Polda Sumbar, Padang', '087911129311', '52429-download (1).jpg', 1, '2018-02-28 22:28:28', '2018-03-08 00:30:39'),
(12, 'P86678', 'arifmon@gmail.com', 'Arifmon', 'Payakumbuh', '1969-09-17', 'Pria', 'Islam', 'Jl. Seroja No 44 Pekanbaru', '081319788901', '55667-download (2).jpg', 3, '2018-02-28 22:30:37', '2018-03-08 00:31:54'),
(13, 'P1234', 'dwi.hadi.atmaka@gmail.com', 'Dwi Hadi Atmaka', 'Solo', '1968-07-28', 'Pria', 'Islam', 'Jl. Tanah Sirah No 12, Padang', '081374555777', '42180-images.jpg', 12, '2018-02-28 22:35:05', '2018-03-07 06:15:34'),
(14, 'P4567', 'dilla.kortriza@gmail.com', 'Dilla Kortriza', 'Padang', '1976-10-18', 'Wanita', 'Katolik', 'Jl. Air Camar Padang', '08126742789', '20491-images (1).jpg', 1, '2018-02-28 22:48:25', '2018-03-07 06:21:48'),
(15, 'P6789', 'yolla.yolanda@gmail.com', 'Yolla Yolanda', 'Jakarta', '1982-07-07', 'Wanita', 'Islam', 'Jl. Raden Saleh Padang', '081374567721', '12878-images (2).jpg', 8, '2018-02-28 22:59:53', '2018-03-07 06:28:49'),
(16, 'P7890', 'vona.yufani@gmail.com', 'Vona Yufani', 'Jakarta', '1983-10-07', 'Wanita', 'Buddha', 'Jl. Sukajati, Jakarta Pusat', '081977889111', '55720-images (3).jpg', 5, '2018-02-28 23:01:05', '2018-03-07 06:30:53'),
(17, 'P8901', 'muh.fahmi@gmail.com', 'Muh. Fahmi', 'Padang', '1981-09-01', 'Pria', 'Islam', 'Jl. Ampang No 13 Padang', '081266613133', '33485-images (3).jpg', 11, '2018-02-28 23:02:52', '2018-03-08 00:45:25'),
(18, 'P9012', 'imam.subekti@gmail.com', 'Imam Subekti', 'Samarinda', '1970-01-01', 'Pria', 'Islam', 'Jl. Jati Negara, Jakarta Pusat', '087812345612', '42057-images (7).jpg', 11, '2018-02-28 23:13:09', '2018-03-08 00:51:30'),
(19, 'P9123', 'andra.djunaidy@gmail.com', 'Andra Djunaidy', 'Lubuk Alung', '1970-12-01', 'Pria', 'Islam', 'Jl. Lintas Bukittinggi, Lubuk Alung', '08199987651', '74143-images (10).jpg', 3, '2018-02-28 23:14:36', '2018-03-08 00:59:40'),
(20, 'P9234', 'mustofa@gmail.com', 'Mustofa', 'Semarang', '1979-10-28', 'Pria', 'Islam', 'Blok E Gang Jati, Jakarta Pusat', '081966677721', '96290-images (15).jpg', 5, '2018-02-28 23:25:55', '2018-03-08 01:10:19'),
(21, 'P9345', 'alnafiah.alius@gmail.com', 'Alnafiah Alius', 'Padang', '1960-01-14', 'Wanita', 'Islam', 'Tabing Padang No 45', '081977828911', '47326-images (18).jpg', 3, '2018-02-28 23:27:20', '2018-03-08 01:15:42'),
(22, 'P89148035', 'nining.purnama.sari@gmail.com', 'Nining Purnama Sari', 'Jakarta', '1990-08-25', 'Wanita', 'Islam', 'Jln. Diponegoro Manado', '087712312332', '19529-images (5).jpg', 9, '2018-02-28 23:41:52', '2018-03-08 00:48:20'),
(25, 'P921613093', 'aulia.akbar@gmail.com', 'T. Aulia Akbar', 'Padang', '1985-06-20', 'Pria', 'Islam', 'Jln Cendana Mata air No 87', '08116654679', '70227-images (13).jpg', 5, '2018-03-01 00:33:40', '2018-03-08 01:06:29'),
(26, 'P941613121', 'chandra.muliawan@gmail.com', 'Chandra Muliawan', 'Jambi', '1981-05-01', 'Pria', 'Hindu', 'Jl. Jambi No 151', '08116657565', '77486-images (19).jpg', 11, '2018-03-01 00:35:00', '2018-03-08 01:18:01'),
(27, 'P851511776', 'rudi.kencana@gmail.com', 'Rudi Kencana', 'Bukittinggi', '1981-06-03', 'Pria', 'Protestan', 'Jl Medan No 14', '08116613456', '18036-images (7).jpg', 4, '2018-03-01 00:36:16', '2018-03-07 07:06:55'),
(28, 'P931613056', 'rezha.pratama.lubis@gmail.com', 'Rezha Pratama Lubis', 'Solok', '1980-02-13', 'Pria', 'Islam', 'Jl. Sisingamangaraja No 99', '08116678911', '68818-images (16).jpg', 1, '2018-03-01 00:36:54', '2018-03-08 01:12:33'),
(29, 'P921613458', 'rizky.rizali@gmail.com', 'Rizky Rizali Wardana', 'Padang', '1970-07-26', 'Pria', 'Islam', 'Jl. Jundol No 3A', '08116678950', '97047-images (14).jpg', 5, '2018-03-01 00:37:45', '2018-03-08 01:08:15'),
(30, 'P88149178', 'endang.sri@gmail.com', 'Endang Sri Wardani', 'Bandung', '1985-11-01', 'Wanita', 'Katolik', 'Jl. Bandung No. 87', '08126644599', '41796-images (2).jpg', 12, '2018-03-01 00:38:41', '2018-03-08 00:44:32'),
(31, 'P931613673', 'dhanton.anut@gmail.com', 'Dhanton Anut Panjaitan', 'Medan', '1980-04-15', 'Pria', 'Protestan', 'Jl. Medan Sakti No 17 C', '08116656421', '18346-images (17).jpg', 12, '2018-03-01 00:42:42', '2018-03-08 01:14:14'),
(32, 'P921613071', 'muflih.rori@gmail.com', 'Muflih Rori Putra Harahap', 'Padang', '1975-01-15', 'Pria', 'Katolik', 'Jl. Melati No 93', '08116612356', '94249-images (12).jpg', 1, '2018-03-01 00:43:26', '2018-03-08 01:05:00'),
(33, 'P85148081', 'aradea.anabrang@gmail.com', 'Aradea Anabrang', 'Padang', '1980-08-19', 'Pria', 'Islam', 'Jl. Palembang No 134', '08116612131', '68387-images (7).jpg', 1, '2018-03-01 00:43:57', '2018-03-07 07:05:05'),
(34, 'P861511874', 'siti.rahmadhani@gmail.com', 'Siti Rahmadhani Nasution', 'Painan', '1984-12-14', 'Wanita', 'Islam', 'Jl. Surabaya No 56', '08116689763', '86717-download (6).jpg', 3, '2018-03-01 00:44:31', '2018-03-07 07:23:06'),
(35, 'P91149229', 'marizana@gmail.com', 'Marizana Ramadhani', 'Padang', '1988-11-28', 'Wanita', 'Buddha', 'Jl Kalimantan No. 11', '08126656766', '61451-images (9).jpg', 8, '2018-03-01 00:45:05', '2018-03-08 00:57:39'),
(36, 'P87149143', 'dini.sinaga@gmail.com', 'Dini Hanisyahfitri Sinaga', 'Payakumbuh', '1988-08-09', 'Wanita', 'Islam', 'Jl. Pekanbaru No. 52', '08116625237', '11383-images.jpg', 1, '2018-03-01 00:45:34', '2018-03-08 00:35:28'),
(37, 'P82149256', 'teja.ogan@gmail.com', 'Teja Ogan Andalusia', 'Padang', '1985-03-20', 'Pria', 'Islam', 'Jln. Batipuah No 139 F', '085263156780', '92044-download.jpg', 1, '2018-03-01 00:50:14', '2018-03-07 06:36:24'),
(38, 'P86149109', 'herman.sibarani@gmail.com', 'Herman Putra Sibarani', 'Solok', '1986-09-16', 'Pria', 'Islam', 'Jl. Irian Jaya No 16', '08116656780', '23174-images (9).jpg', 1, '2018-03-01 00:51:20', '2018-03-07 07:19:20'),
(39, 'P87149168', 'emma.sari@gmail.com', 'Meriam Emma Sari Simanjuntak', 'Medan', '1986-07-25', 'Wanita', 'Islam', 'Jln Palembang No. 98', '08116615144', '40421-images (1).jpg', 1, '2018-03-01 00:51:49', '2018-03-08 00:41:25'),
(40, 'P84149273', 'irwan@gmail.com', 'Irwan', 'Padang', '1987-02-02', 'Pria', 'Islam', 'Jln Kampung Nias V No 46', '085264236754', '22316-images (6).jpg', 10, '2018-03-01 00:52:17', '2018-03-07 06:47:46'),
(41, 'P90149495', 'yepta@gmail.com', 'Yepta T.', 'Jakarta', '1981-09-22', 'Wanita', 'Protestan', 'Jl. Madura No. 39', '08116698799', '88597-images (8).jpg', 4, '2018-03-01 00:53:03', '2018-03-08 00:54:55'),
(42, 'P86149104', 'a.hasibuan@gmail.com', 'Muhammad Januspati A. Hasibuan', 'Pasaman', '1975-11-19', 'Pria', 'Protestan', 'Jln Merdeka No 19', '08126615673', '48314-images (10).jpg', 1, '2018-03-01 00:53:30', '2018-03-07 07:14:26'),
(43, 'P921613065', 'fitri.sundari@gmail.com', 'Fitri Sundari', 'Painan', '1979-10-16', 'Wanita', 'Islam', 'Jl. Puas No 98', '081266887799', '44628-images (11).jpg', 6, '2018-03-01 00:54:02', '2018-03-08 01:01:42'),
(44, 'P89148037', 'br.tarigan@gmail.com', 'Hetti Keristina BR. Tarigan', 'Jakarta', '1983-03-30', 'Wanita', 'Katolik', 'Jl. Jakarta No. 159', '08116689898', '29312-images (6).jpg', 1, '2018-03-01 00:54:32', '2018-03-08 00:50:22'),
(45, '061234543', 'budi.hariyanto@gmail.com', 'Budi Hariyanto', 'Padang', '1980-02-08', 'Pria', 'Islam', 'Padang', '081268280648', '', 1, '2018-03-10 16:47:37', '2018-03-10 16:47:37');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angkatan_peserta`
--
ALTER TABLE `angkatan_peserta`
  ADD CONSTRAINT `angkatan_peserta_angkatan_diklat_id_foreign` FOREIGN KEY (`angkatan_diklat_id`) REFERENCES `angkatan_diklat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `angkatan_peserta_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD CONSTRAINT `chat_message_chat_room_id_foreign` FOREIGN KEY (`chat_room_id`) REFERENCES `chat_room` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_message_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD CONSTRAINT `chat_room_users_one_id_foreign` FOREIGN KEY (`users_one_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_room_users_two_id_foreign` FOREIGN KEY (`users_two_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_comment`
--
ALTER TABLE `forum_comment`
  ADD CONSTRAINT `forum_comment_forum_post_id_foreign` FOREIGN KEY (`forum_post_id`) REFERENCES `forum_post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forum_comment_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_post`
--
ALTER TABLE `forum_post`
  ADD CONSTRAINT `forum_post_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas_comment`
--
ALTER TABLE `kelas_comment`
  ADD CONSTRAINT `kelas_comment_kelas_post_id_foreign` FOREIGN KEY (`kelas_post_id`) REFERENCES `kelas_post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_comment_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas_post`
--
ALTER TABLE `kelas_post`
  ADD CONSTRAINT `kelas_post_kelas_virtual_id_foreign` FOREIGN KEY (`kelas_virtual_id`) REFERENCES `kelas_virtual` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_post_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas_virtual`
--
ALTER TABLE `kelas_virtual`
  ADD CONSTRAINT `kelas_virtual_angkatan_diklat_id_foreign` FOREIGN KEY (`angkatan_diklat_id`) REFERENCES `angkatan_diklat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_virtual_mata_pelajaran_id_foreign` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_virtual_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materi_pelajaran`
--
ALTER TABLE `materi_pelajaran`
  ADD CONSTRAINT `materi_pelajaran_mata_pelajaran_id_foreign` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materi_pelajaran_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `polling_detail`
--
ALTER TABLE `polling_detail`
  ADD CONSTRAINT `polling_detail_polling_post_id_foreign` FOREIGN KEY (`polling_post_id`) REFERENCES `polling_post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `polling_hasil`
--
ALTER TABLE `polling_hasil`
  ADD CONSTRAINT `polling_hasil_polling_detail_id_foreign` FOREIGN KEY (`polling_detail_id`) REFERENCES `polling_detail` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `polling_hasil_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `polling_post`
--
ALTER TABLE `polling_post`
  ADD CONSTRAINT `polling_post_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reward_to`
--
ALTER TABLE `reward_to`
  ADD CONSTRAINT `reward_to_kelas_virtual_id_foreign` FOREIGN KEY (`kelas_virtual_id`) REFERENCES `kelas_virtual` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reward_to_reward_list_id_foreign` FOREIGN KEY (`reward_list_id`) REFERENCES `reward_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reward_to_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tugas_jawaban`
--
ALTER TABLE `tugas_jawaban`
  ADD CONSTRAINT `tugas_jawaban_tugas_post_id_foreign` FOREIGN KEY (`tugas_post_id`) REFERENCES `tugas_post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_jawaban_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tugas_nilai`
--
ALTER TABLE `tugas_nilai`
  ADD CONSTRAINT `tugas_nilai_tugas_jawaban_id_foreign` FOREIGN KEY (`tugas_jawaban_id`) REFERENCES `tugas_jawaban` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tugas_post`
--
ALTER TABLE `tugas_post`
  ADD CONSTRAINT `tugas_post_kelas_virtual_id_foreign` FOREIGN KEY (`kelas_virtual_id`) REFERENCES `kelas_virtual` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_account`
--
ALTER TABLE `users_account`
  ADD CONSTRAINT `users_account_hak_akses_id_foreign` FOREIGN KEY (`hak_akses_id`) REFERENCES `hak_akses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_profil`
--
ALTER TABLE `users_profil`
  ADD CONSTRAINT `users_profil_id_foreign` FOREIGN KEY (`id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
