/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.16-0ubuntu0.16.04.1 : Database - elearningdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `angkatan_diklat` */

DROP TABLE IF EXISTS `angkatan_diklat`;

CREATE TABLE `angkatan_diklat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_diklat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `angkatan_diklat` */

insert  into `angkatan_diklat`(`id`,`nama_diklat`,`tanggal_mulai`,`tanggal_selesai`,`keterangan`,`status`,`created_at`,`updated_at`) values (1,'DIKLAT PENAKSIR & ANALIS KREDIT MUDA ANGKATAN XI TAHUN 2017','2017-03-07','2017-04-29','-',1,'2018-02-28 16:27:31','2018-02-28 16:27:31');

/*Table structure for table `angkatan_peserta` */

DROP TABLE IF EXISTS `angkatan_peserta`;

CREATE TABLE `angkatan_peserta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `angkatan_diklat_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `angkatan_peserta_angkatan_diklat_id_foreign` (`angkatan_diklat_id`),
  KEY `angkatan_peserta_users_account_id_foreign` (`users_account_id`),
  CONSTRAINT `angkatan_peserta_angkatan_diklat_id_foreign` FOREIGN KEY (`angkatan_diklat_id`) REFERENCES `angkatan_diklat` (`id`) ON DELETE CASCADE,
  CONSTRAINT `angkatan_peserta_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `angkatan_peserta` */

insert  into `angkatan_peserta`(`id`,`angkatan_diklat_id`,`users_account_id`,`created_at`,`updated_at`) values (1,1,22,'2018-02-28 18:41:52','2018-02-28 18:41:52'),(2,1,25,'2018-02-28 19:33:40','2018-02-28 19:33:40'),(3,1,26,'2018-02-28 19:35:00','2018-02-28 19:35:00'),(4,1,27,'2018-02-28 19:36:16','2018-02-28 19:36:16'),(5,1,28,'2018-02-28 19:36:54','2018-02-28 19:36:54'),(6,1,29,'2018-02-28 19:37:45','2018-02-28 19:37:45'),(7,1,30,'2018-02-28 19:38:41','2018-02-28 19:38:41'),(8,1,31,'2018-02-28 19:42:42','2018-02-28 19:42:42'),(9,1,32,'2018-02-28 19:43:26','2018-02-28 19:43:26'),(10,1,33,'2018-02-28 19:43:57','2018-02-28 19:43:57'),(11,1,34,'2018-02-28 19:44:31','2018-02-28 19:44:31'),(12,1,35,'2018-02-28 19:45:05','2018-02-28 19:45:05'),(13,1,36,'2018-02-28 19:45:34','2018-02-28 19:45:34'),(14,1,37,'2018-02-28 19:50:14','2018-02-28 19:50:14'),(15,1,38,'2018-02-28 19:51:20','2018-02-28 19:51:20'),(16,1,39,'2018-02-28 19:51:49','2018-02-28 19:51:49'),(17,1,40,'2018-02-28 19:52:17','2018-02-28 19:52:17'),(18,1,41,'2018-02-28 19:53:03','2018-02-28 19:53:03'),(19,1,42,'2018-02-28 19:53:30','2018-02-28 19:53:30'),(20,1,43,'2018-02-28 19:54:02','2018-02-28 19:54:02'),(21,1,44,'2018-02-28 19:54:32','2018-02-28 19:54:32');

/*Table structure for table `chat_message` */

DROP TABLE IF EXISTS `chat_message`;

CREATE TABLE `chat_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chat_room_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_message_chat_room_id_foreign` (`chat_room_id`),
  KEY `chat_message_users_account_id_foreign` (`users_account_id`),
  CONSTRAINT `chat_message_chat_room_id_foreign` FOREIGN KEY (`chat_room_id`) REFERENCES `chat_room` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chat_message_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `chat_message` */

/*Table structure for table `chat_room` */

DROP TABLE IF EXISTS `chat_room`;

CREATE TABLE `chat_room` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_one_id` int(10) unsigned NOT NULL,
  `users_two_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_room_users_one_id_foreign` (`users_one_id`),
  KEY `chat_room_users_two_id_foreign` (`users_two_id`),
  CONSTRAINT `chat_room_users_one_id_foreign` FOREIGN KEY (`users_one_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chat_room_users_two_id_foreign` FOREIGN KEY (`users_two_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `chat_room` */

/*Table structure for table `forum_comment` */

DROP TABLE IF EXISTS `forum_comment`;

CREATE TABLE `forum_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forum_post_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forum_comment_forum_post_id_foreign` (`forum_post_id`),
  KEY `forum_comment_users_account_id_foreign` (`users_account_id`),
  CONSTRAINT `forum_comment_forum_post_id_foreign` FOREIGN KEY (`forum_post_id`) REFERENCES `forum_post` (`id`) ON DELETE CASCADE,
  CONSTRAINT `forum_comment_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `forum_comment` */

/*Table structure for table `forum_post` */

DROP TABLE IF EXISTS `forum_post`;

CREATE TABLE `forum_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_account_id` int(10) unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forum_post_users_account_id_foreign` (`users_account_id`),
  CONSTRAINT `forum_post_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `forum_post` */

/*Table structure for table `hak_akses` */

DROP TABLE IF EXISTS `hak_akses`;

CREATE TABLE `hak_akses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hak_akses_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hak_akses` */

insert  into `hak_akses`(`id`,`nama`,`slug`,`deskripsi`,`created_at`,`updated_at`) values (1,'Staff','staff','','2018-02-28 16:17:38','2018-02-28 16:17:38'),(2,'Pimpinan','pimpinan','','2018-02-28 16:17:38','2018-02-28 16:17:38'),(3,'Instruktur','instruktur','','2018-02-28 16:17:38','2018-02-28 16:17:38'),(4,'Peserta','peserta','','2018-02-28 16:17:38','2018-02-28 16:17:38');

/*Table structure for table `kantor_cabang` */

DROP TABLE IF EXISTS `kantor_cabang`;

CREATE TABLE `kantor_cabang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `kantor_cabang` */

insert  into `kantor_cabang`(`id`,`nama`,`alamat`,`telepon`,`created_at`,`updated_at`) values (1,'KANWIL MEDAN','Jl. Pegadaian No. 112, Medan - Sumatera Utara','0614567247',NULL,NULL),(2,'KANWIL BALIKPAPAN','Jl. Jenderal Sudirman Stalkuda, Balikpapan - Riau','0542762002',NULL,NULL),(3,'KANWIL PEKANBARU','Jl. Jend. Sudirman No. 167 A-B, Pekanbaru - Riau','076139195',NULL,NULL),(4,'KANWIL PALEMBANG','Jl. Merdeka No. 11, Palembang - Sumatera Selatan','0711361529',NULL,NULL),(5,'KANWIL JAKARTA 1','Jl. Senen Raya No. 36, Jakarta Pusat - DKI Jakarta','0213505151',NULL,NULL),(6,'KANWIL MAKASSAR','Ruko Kumala Raya A No. 76/78, Jl. Kumala Raya No. 76/78, Makassar - Sulawesi Selatan','0411856613/14',NULL,NULL),(7,'KANWIL BANDUNG','Jl. Pugkur No. 125, Bandung - Jawa Barat','0224262280',NULL,NULL),(8,'KANWIL SURABAYA','Jl. Dinoyotangsi, Surabaya - Jawa Timur','0315675294',NULL,NULL),(9,'KANWIL MANADO','Jl. Dr.Soetomo No. 199, Manado - Sulawesi Utara','0431869262',NULL,NULL),(10,'KANWIL DENPASAR','Jl. Raya Puputan No. 23.C, Denpasar - Bali','0361242011',NULL,NULL),(11,'KANWIL JAKARTA 2','Jl. Pasar Senen, Jakarta Pusat - DKI Jakarta','0213450759',NULL,NULL),(12,'KANWIL SEMARANG','Jl. Kimangun Sarkoro No. 7, Semarang - Jawa Tengah','0248415896',NULL,NULL);

/*Table structure for table `kelas_comment` */

DROP TABLE IF EXISTS `kelas_comment`;

CREATE TABLE `kelas_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelas_post_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kelas_comment_kelas_post_id_foreign` (`kelas_post_id`),
  KEY `kelas_comment_users_account_id_foreign` (`users_account_id`),
  CONSTRAINT `kelas_comment_kelas_post_id_foreign` FOREIGN KEY (`kelas_post_id`) REFERENCES `kelas_post` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kelas_comment_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `kelas_comment` */

/*Table structure for table `kelas_post` */

DROP TABLE IF EXISTS `kelas_post`;

CREATE TABLE `kelas_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_account_id` int(10) unsigned NOT NULL,
  `kelas_virtual_id` int(10) unsigned NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kelas_post_users_account_id_foreign` (`users_account_id`),
  KEY `kelas_post_kelas_virtual_id_foreign` (`kelas_virtual_id`),
  CONSTRAINT `kelas_post_kelas_virtual_id_foreign` FOREIGN KEY (`kelas_virtual_id`) REFERENCES `kelas_virtual` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kelas_post_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `kelas_post` */

/*Table structure for table `kelas_virtual` */

DROP TABLE IF EXISTS `kelas_virtual`;

CREATE TABLE `kelas_virtual` (
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
  KEY `kelas_virtual_users_account_id_foreign` (`users_account_id`),
  CONSTRAINT `kelas_virtual_angkatan_diklat_id_foreign` FOREIGN KEY (`angkatan_diklat_id`) REFERENCES `angkatan_diklat` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kelas_virtual_mata_pelajaran_id_foreign` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kelas_virtual_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `kelas_virtual` */

insert  into `kelas_virtual`(`id`,`nama_kelas`,`keterangan`,`status`,`angkatan_diklat_id`,`mata_pelajaran_id`,`users_account_id`,`created_at`,`updated_at`) values (1,'DIKLAT MUDA XI 2017 - MTLP','-','0',1,2,9,'2018-02-28 19:59:56','2018-03-01 02:49:19');

/*Table structure for table `mata_pelajaran` */

DROP TABLE IF EXISTS `mata_pelajaran`;

CREATE TABLE `mata_pelajaran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_pelajaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mata_pelajaran` */

insert  into `mata_pelajaran`(`id`,`slug`,`nama_pelajaran`,`created_at`,`updated_at`) values (1,'HJF','Hukum Jaminan Fidusia','2018-02-28 16:17:38','2018-02-28 16:17:38'),(2,'MTLP','Metode Teknik Menaksir Logam Perhiasan','2018-02-28 16:17:38','2018-02-28 16:17:38'),(3,'DPP','Dasar-dasar Pembiayaan dan Perkreditan','2018-02-28 16:17:38','2018-02-28 16:17:38'),(4,'MTPI','Metode dan Teknik Menaksir Permata Intan','2018-02-28 16:17:38','2018-02-28 16:17:38'),(5,'MTBG','Metode dan Teknik Menaksir Barang Gudang','2018-02-28 16:17:38','2018-02-28 16:17:38'),(6,'POBF','Pedoman Operasional Bisnis Fidusia','2018-02-28 16:17:38','2018-02-28 16:17:38'),(7,'PKP','Proses Kerja Penaksir','2018-02-28 16:17:38','2018-02-28 16:17:38'),(8,'PAS','Pegadaian Sistem Informasi Online','2018-02-28 16:17:38','2018-02-28 16:17:38'),(9,'AK','Akuntansi dan Keuangan','2018-02-28 16:17:38','2018-02-28 16:17:38'),(10,'BP','Budaya Perusahaan','2018-02-28 16:17:38','2018-02-28 16:17:38'),(11,'SPP','Standar Pelayanan Pegadaian','2018-02-28 16:17:38','2018-02-28 16:17:38'),(12,'PD','Personality Development','2018-02-28 16:17:38','2018-02-28 16:17:38'),(13,'PMIS','Pemasaran Market Inteligen & Sales','2018-02-28 16:17:38','2018-02-28 16:17:38');

/*Table structure for table `materi_pelajaran` */

DROP TABLE IF EXISTS `materi_pelajaran`;

CREATE TABLE `materi_pelajaran` (
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
  KEY `materi_pelajaran_mata_pelajaran_id_foreign` (`mata_pelajaran_id`),
  CONSTRAINT `materi_pelajaran_mata_pelajaran_id_foreign` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran` (`id`) ON DELETE CASCADE,
  CONSTRAINT `materi_pelajaran_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `materi_pelajaran` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2018_01_08_044745_create_all_tables',1);

/*Table structure for table `polling_detail` */

DROP TABLE IF EXISTS `polling_detail`;

CREATE TABLE `polling_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `polling_post_id` int(10) unsigned NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `polling_detail_polling_post_id_foreign` (`polling_post_id`),
  CONSTRAINT `polling_detail_polling_post_id_foreign` FOREIGN KEY (`polling_post_id`) REFERENCES `polling_post` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `polling_detail` */

/*Table structure for table `polling_hasil` */

DROP TABLE IF EXISTS `polling_hasil`;

CREATE TABLE `polling_hasil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `polling_detail_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `polling_hasil_polling_detail_id_foreign` (`polling_detail_id`),
  KEY `polling_hasil_users_account_id_foreign` (`users_account_id`),
  CONSTRAINT `polling_hasil_polling_detail_id_foreign` FOREIGN KEY (`polling_detail_id`) REFERENCES `polling_detail` (`id`) ON DELETE CASCADE,
  CONSTRAINT `polling_hasil_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `polling_hasil` */

/*Table structure for table `polling_post` */

DROP TABLE IF EXISTS `polling_post`;

CREATE TABLE `polling_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_account_id` int(10) unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `polling_post_users_account_id_foreign` (`users_account_id`),
  CONSTRAINT `polling_post_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `polling_post` */

/*Table structure for table `reward_list` */

DROP TABLE IF EXISTS `reward_list`;

CREATE TABLE `reward_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `reward_list` */

/*Table structure for table `reward_to` */

DROP TABLE IF EXISTS `reward_to`;

CREATE TABLE `reward_to` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelas_virtual_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `reward_list_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reward_to_kelas_virtual_id_foreign` (`kelas_virtual_id`),
  KEY `reward_to_users_account_id_foreign` (`users_account_id`),
  KEY `reward_to_reward_list_id_foreign` (`reward_list_id`),
  CONSTRAINT `reward_to_kelas_virtual_id_foreign` FOREIGN KEY (`kelas_virtual_id`) REFERENCES `kelas_virtual` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reward_to_reward_list_id_foreign` FOREIGN KEY (`reward_list_id`) REFERENCES `reward_list` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reward_to_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `reward_to` */

/*Table structure for table `tugas_jawaban` */

DROP TABLE IF EXISTS `tugas_jawaban`;

CREATE TABLE `tugas_jawaban` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tugas_post_id` int(10) unsigned NOT NULL,
  `users_account_id` int(10) unsigned NOT NULL,
  `file_tugas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tugas_jawaban_tugas_post_id_foreign` (`tugas_post_id`),
  KEY `tugas_jawaban_users_account_id_foreign` (`users_account_id`),
  CONSTRAINT `tugas_jawaban_tugas_post_id_foreign` FOREIGN KEY (`tugas_post_id`) REFERENCES `tugas_post` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tugas_jawaban_users_account_id_foreign` FOREIGN KEY (`users_account_id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tugas_jawaban` */

/*Table structure for table `tugas_nilai` */

DROP TABLE IF EXISTS `tugas_nilai`;

CREATE TABLE `tugas_nilai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tugas_jawaban_id` int(10) unsigned NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tugas_nilai_tugas_jawaban_id_foreign` (`tugas_jawaban_id`),
  CONSTRAINT `tugas_nilai_tugas_jawaban_id_foreign` FOREIGN KEY (`tugas_jawaban_id`) REFERENCES `tugas_jawaban` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tugas_nilai` */

/*Table structure for table `tugas_post` */

DROP TABLE IF EXISTS `tugas_post`;

CREATE TABLE `tugas_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelas_virtual_id` int(10) unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tugas_post_kelas_virtual_id_foreign` (`kelas_virtual_id`),
  CONSTRAINT `tugas_post_kelas_virtual_id_foreign` FOREIGN KEY (`kelas_virtual_id`) REFERENCES `kelas_virtual` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tugas_post` */

insert  into `tugas_post`(`id`,`kelas_virtual_id`,`judul`,`deskripsi`,`created_at`,`updated_at`) values (1,1,'Tugas 1','<p>blahblahlbahl balhallas</p>','2018-03-01 02:48:28','2018-03-01 02:48:28');

/*Table structure for table `users_account` */

DROP TABLE IF EXISTS `users_account`;

CREATE TABLE `users_account` (
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
  KEY `users_account_hak_akses_id_foreign` (`hak_akses_id`),
  CONSTRAINT `users_account_hak_akses_id_foreign` FOREIGN KEY (`hak_akses_id`) REFERENCES `hak_akses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users_account` */

insert  into `users_account`(`id`,`username`,`password`,`hak_akses_id`,`status`,`remember_token`,`created_at`,`updated_at`) values (1,'staff@e-learning.dev','$2y$10$QbMXX0vsls5XG.XV7Z.1HecMhcTNjfIN92PDPOZ/nogCTV3UxNc9G',1,1,'aiO4jkydPzDCYmrYcWnTogXPx8FcVz1a0afQAe85uV4T2vsjuVWq6c3PLxOk','2018-02-28 16:17:38','2018-02-28 16:17:38'),(2,'P84567','$2y$10$5AVsTJJ9KZgGHJSxC8zKjetoKAq60/FvPG7iATx5yo53gR6qJ46ja',2,1,NULL,'2018-02-28 16:25:30','2018-02-28 16:25:30'),(3,'P84778','$2y$10$NPGpb3AHbPckh5RPI2Y/uO8js2eM7VAJ5CACglbWS46XwOaEQc1Wi',2,1,NULL,'2018-02-28 16:26:34','2018-02-28 16:26:34'),(4,'P84123','$2y$10$0Smew3F9NNTWcSRBTcMH7eIelugj/ZeABCbEQIkXTbfX6T4Z6Ucbm',3,1,NULL,'2018-02-28 16:31:23','2018-02-28 16:31:23'),(5,'P84234','$2y$10$MQb7fHJ1M4dtWvESHvTKsugRfg8EsMqQ89LigOnKine5o/8F82AUi',3,1,NULL,'2018-02-28 16:33:55','2018-02-28 16:33:55'),(6,'P84345','$2y$10$YJ30DMEZjFQ4iOLlXPmI5egil1Xp2IkUwip2v1oqgXGrKfQWs/Utq',3,1,NULL,'2018-02-28 16:40:19','2018-02-28 16:40:19'),(7,'P84456','$2y$10$EmfuINTdvkC23WBBW6Q4GeZfLq8c.eicl7MTFrcKd7irGl/eTMobG',3,1,NULL,'2018-02-28 17:21:14','2018-02-28 17:21:14'),(8,'P86123','$2y$10$FsQWk2bBvXx1R2LfrBoxVuOl4t2reW0k3e2b6x/ywdtl4Wif0tJiS',3,1,NULL,'2018-02-28 17:24:16','2018-02-28 17:24:16'),(9,'P86234','$2y$10$L3XzQ8kpgMW1vjCoSpHR1.iavPmb7gQlyB1fqWKSzz8znRvcCkm7i',3,1,NULL,'2018-02-28 17:25:47','2018-02-28 17:25:47'),(10,'P86345','$2y$10$Y5VwbghOwUEPRAEWhgohsOpbDiQt48BON9kuHl6FXUpZu.2SA02Um',3,1,NULL,'2018-02-28 17:27:10','2018-02-28 17:27:10'),(11,'P86567','$2y$10$3HMQvXxzB0cfK12GfwlY1eVpRZKKncN1j.VSHxyfhoGI6bZX1b3dK',3,1,NULL,'2018-02-28 17:28:28','2018-02-28 17:28:28'),(12,'P86678','$2y$10$k36h9.Lix2lCtaU.TidA.ORHIWIvHa0H2eXiAARIehC3iPzV9q07G',3,1,NULL,'2018-02-28 17:30:37','2018-02-28 17:30:37'),(13,'P1234','$2y$10$rUcmKcPzD5h4.jQBbGdIIeTC7jO8CQJtCzSqlOXaSEJtUvNLSKuae',3,1,NULL,'2018-02-28 17:35:05','2018-02-28 17:35:05'),(14,'P4567','$2y$10$6hjCxNg2DCIxb80TsfR9U.LdVEt4pSLay.d1a6VgB6uN/teXkct3O',3,1,NULL,'2018-02-28 17:48:25','2018-02-28 17:48:25'),(15,'P6789','$2y$10$amqTXkLFtGgsFU1LE2PaDeHM7K784ITCgIugvLz9vAY4VMMM0eybC',3,1,NULL,'2018-02-28 17:59:53','2018-02-28 17:59:53'),(16,'P7890','$2y$10$BS/4cbSC/DcMeMMScnCVEe0kOJo6r00tYIon3xZ1kI4OMtgJVWqPu',3,1,NULL,'2018-02-28 18:01:05','2018-02-28 18:01:05'),(17,'P8901','$2y$10$gTWbOEZ3zEAlWfaMemifwets2c7cJaCZRzCtKLJ2Qn4a.demu4Rz.',3,1,NULL,'2018-02-28 18:02:52','2018-02-28 18:02:52'),(18,'P9012','$2y$10$ZcrwcEG9GDSh5xAkLENDru1YYlQSWMyFdgUQP.GGTkkEZyATuOPvC',3,1,NULL,'2018-02-28 18:13:09','2018-02-28 18:13:09'),(19,'P9123','$2y$10$nlZSp6T/N08MfCo.E.tlAOCbsg5dAxFXva1Pk9r6ABK4iUaqF2aj2',3,1,NULL,'2018-02-28 18:14:36','2018-02-28 18:14:36'),(20,'P9234','$2y$10$0rzcC4YSwOiZi7KgAndtf.e/aR3uxpwoFN.zIY0eaCoZ3v097Zcm2',3,1,NULL,'2018-02-28 18:25:55','2018-02-28 18:25:55'),(21,'P9345','$2y$10$DMnX14JelXOBc2G81BRLn.D1YO9yNTlF/Sk6pONgrfdLy0IpR7VfS',3,1,NULL,'2018-02-28 18:27:20','2018-02-28 18:27:20'),(22,'P89148035','$2y$10$tj6KWhOhWN1.ThECgJ63A.dCm1b7EJJhywNb9le1sgMpQWyKcceWS',4,1,NULL,'2018-02-28 18:41:52','2018-02-28 18:41:52'),(25,'P921613093','$2y$10$gxUucgX.wMDakG0caiTu/.iFuOnhrS47gdhcMz7786jr9NGb.Qq4K',4,1,NULL,'2018-02-28 19:33:40','2018-02-28 19:33:40'),(26,'P941613121','$2y$10$b14jyitGRGBJQ4HT72H7V.rekYYTuo9upyhGhREJbG1KMvvbqVGva',4,1,NULL,'2018-02-28 19:35:00','2018-02-28 19:35:00'),(27,'P851511776','$2y$10$iCV2vCdXFtswnaJkEh.ImOXGLer8TUO7YXeIZi26B4WW2U7xxQlU6',4,1,NULL,'2018-02-28 19:36:16','2018-02-28 19:36:16'),(28,'P931613056','$2y$10$2M/t/hFZg12m8mxz9nsVXOG.3DsCjNKOKNWmER5cIyl4TRIdcrp4W',4,1,NULL,'2018-02-28 19:36:54','2018-02-28 19:36:54'),(29,'P921613458','$2y$10$eDvKZmuCS9aZhfSyUO0Rpeu7EdppGzCsh40GYnFC3UMDQUUBZriuC',4,1,NULL,'2018-02-28 19:37:45','2018-02-28 19:37:45'),(30,'P88149178','$2y$10$Kuj2ybMNI4ZFvlgaDoXAAumD9FjyNrqK99r2oadsuWBoB/EWiCx1y',4,1,NULL,'2018-02-28 19:38:41','2018-02-28 19:38:41'),(31,'P931613673','$2y$10$EfyWfOJpCr6163BgrF3EGu3gqeeNqAqbL3ITr5DPrLuaYoU3eIqW2',4,1,NULL,'2018-02-28 19:42:42','2018-02-28 19:42:42'),(32,'P921613071','$2y$10$NyvwXas35qk09yHU0wjZw.kihjPybqmv2ZhSZ9kjqskknbrUgvGl2',4,1,NULL,'2018-02-28 19:43:26','2018-02-28 19:43:26'),(33,'P85148081','$2y$10$CwASCdFQg5fyieVxO86vq.ULp/Raw4Uahq4aDJ8v.kko6bV5MsCmS',4,1,NULL,'2018-02-28 19:43:57','2018-02-28 19:43:57'),(34,'P861511874','$2y$10$xROVk/rIR1OrH575wOJaoOaQ54djMgC0JPVHI9G74NkfsrNs.MTMC',4,1,NULL,'2018-02-28 19:44:31','2018-02-28 19:44:31'),(35,'P91149229','$2y$10$b1aKlgn/f2auXkIHMvPiU.ZCbgbBtfnS1vU7rSAQ5zskxe.nDJkES',4,1,NULL,'2018-02-28 19:45:05','2018-02-28 19:45:05'),(36,'P87149143','$2y$10$KjtUJxIteeVqc87g2bp/5eFRlpU2qmIpW1VaN7bxFr95R15qA6OGO',4,1,NULL,'2018-02-28 19:45:34','2018-02-28 19:45:34'),(37,'P82149256','$2y$10$oxnmRWRSG1pogfXiaxgk4upapocwN9lEinRHSKtRXyuM66Qqy/M7u',4,1,NULL,'2018-02-28 19:50:14','2018-02-28 19:50:14'),(38,'P86149109','$2y$10$kn3lLtXGlRvnzlThytJll.606wOQWmNToSlEW/uRcRGRP5mghpGH2',4,1,NULL,'2018-02-28 19:51:20','2018-02-28 19:51:20'),(39,'P87149168','$2y$10$hUCRwKyeyjvMPphVhZpfo.RjeSgmHufgveJFOhOKXOfOrib6kq5ny',4,1,NULL,'2018-02-28 19:51:49','2018-02-28 19:51:49'),(40,'P84149273','$2y$10$caiJ84/POV67NaHXGf2iVuoMRxbxOfvBXL7pOOz7A44VXUJON7pwe',4,1,NULL,'2018-02-28 19:52:17','2018-02-28 19:52:17'),(41,'P90149495','$2y$10$JaOxKKNFIhrdRca9JqtblO7MjPnF3TbyiS1SkKTIbXrordpxZQRHa',4,1,NULL,'2018-02-28 19:53:03','2018-02-28 19:53:03'),(42,'P86149104','$2y$10$KAtKn7dyp54pO1WYQ1Er9OqpD0S9SOZaMDK2lzdKLyAK2qEO/7IJC',4,1,NULL,'2018-02-28 19:53:30','2018-02-28 19:53:30'),(43,'P921613065','$2y$10$ITu1KA0g.nYUok7ggKk7Yutg7aruz0kQhekR.bZYVdc9TB.KtCtoC',4,1,NULL,'2018-02-28 19:54:02','2018-02-28 19:54:02'),(44,'P89148037','$2y$10$AQ3qqrYy.uzdiFSzIrRGS.e5o4i7.plPAxfCVcFIo6V74PAbWwbr6',4,1,NULL,'2018-02-28 19:54:32','2018-02-28 19:54:32');

/*Table structure for table `users_profil` */

DROP TABLE IF EXISTS `users_profil`;

CREATE TABLE `users_profil` (
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
  UNIQUE KEY `users_profil_email_unique` (`email`),
  CONSTRAINT `users_profil_id_foreign` FOREIGN KEY (`id`) REFERENCES `users_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users_profil` */

insert  into `users_profil`(`id`,`nik`,`email`,`nama`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`agama`,`alamat`,`telepon`,`photo`,`kantor_cabang_id`,`created_at`,`updated_at`) values (1,'P444262','adiraka8@gmail.com','Adi Raka Siwi','Padang','1994-04-29','Pria','Islam','Komplek Filano Mandiri Tabing Padang','081268280648','default-avatar.png',2,'2018-02-28 16:17:38','2018-02-28 16:17:38'),(2,'P84567','yendriwasih@gmail.com','Yendriwasih','Bukittinggi','1976-03-20','Wanita','Islam','Jl. Cengkeh','081374516363','default-avatar.png',1,'2018-02-28 16:25:30','2018-02-28 16:25:30'),(3,'P84778','nadrawati@gmail.com','Nadrawati','Biaro','1965-03-11','Wanita','Islam','Lubuk Minturun','081363346479','default-avatar.png',1,'2018-02-28 16:26:34','2018-02-28 16:26:34'),(4,'P84123','asmadi@gmail.com','Asmadi','Pariaman','1976-03-10','Pria','Islam','Jl. Gunung Pangilun Padang','081363043899','default-avatar.png',8,'2018-02-28 16:31:23','2018-02-28 16:32:05'),(5,'P84234','leny@gmail.com','Leny','Kota Baru','1977-01-16','Wanita','Islam','Jl. Belanti No 34 Padang','081267020616','default-avatar.png',3,'2018-02-28 16:33:55','2018-02-28 16:33:55'),(6,'P84345','edwar@gmail.com','Edwar','Padang','1975-01-07','Pria','Katolik','Jl. Tan Malaka Sawahan Padang','089723112908','default-avatar.png',5,'2018-02-28 16:40:19','2018-02-28 16:40:19'),(7,'P84456','peni.marzuki@gmail.com','Peni Marzuki','Batusangkar','1979-04-28','Pria','Islam','Jl. Andalas Padang','081374990201','default-avatar.png',8,'2018-02-28 17:21:14','2018-02-28 17:21:14'),(8,'P86123','gusti.yeni@gmail.com','Gusti Yeni','Pariaman','1980-04-01','Wanita','Islam','Jl. Nerwana No 31 Padang Barat','081274879811','default-avatar.png',1,'2018-02-28 17:24:16','2018-02-28 17:24:16'),(9,'P86234','hari.subur@gmail.com','Hari Subur Tjahji','Padang','1980-02-01','Pria','Hindu','Jl. Kampar Selatan, Kepulauan Riau','081374562873','77112-images.jpg',3,'2018-02-28 17:25:47','2018-02-28 20:21:47'),(10,'P86345','hari.evy@gmail.com','Hari Evy S','Jakarta','1969-06-09','Pria','Islam','Komp. Sinarmas, Pekanbaru','08779112931','default-avatar.png',3,'2018-02-28 17:27:10','2018-02-28 17:27:10'),(11,'P86567','mery.andriati@gmail.com','Mery Andriati S','Padang','1976-10-11','Wanita','Protestan','Komp. Polda Sumbar, Padang','087911129311','default-avatar.png',1,'2018-02-28 17:28:28','2018-02-28 17:28:28'),(12,'P86678','arifmon@gmail.com','Arifmon','Payakumbuh','1969-09-17','Pria','Islam','Jl. Seroja No 44 Pekanbaru','081319788901','default-avatar.png',3,'2018-02-28 17:30:37','2018-02-28 17:30:37'),(13,'P1234','dwi.hadi.atmaka@gmail.com','Dwi Hadi Atmaka','Solo','1968-07-28','Pria','Islam','Jl. Tanah Sirah No 12, Padang','081374555777','default-avatar.png',12,'2018-02-28 17:35:05','2018-02-28 17:35:05'),(14,'P4567','dilla.kortriza@gmail.com','Dilla Kortriza','Padang','1976-10-18','Wanita','Katolik','Jl. Air Camar Padang','08126742789','default-avatar.png',1,'2018-02-28 17:48:25','2018-02-28 17:48:25'),(15,'P6789','yolla.yolanda@gmail.com','Yolla Yolanda','Jakarta','1982-07-07','Wanita','Islam','Jl. Raden Saleh Padang','081374567721','default-avatar.png',8,'2018-02-28 17:59:53','2018-02-28 17:59:53'),(16,'P7890','vona.yufani@gmail.com','Vona Yufani','Jakarta','1983-10-07','Wanita','Buddha','Jl. Sukajati, Jakarta Pusat','081977889111','default-avatar.png',5,'2018-02-28 18:01:05','2018-02-28 18:01:05'),(17,'P8901','muh.fahmi@gmail.com','Muh. Fahmi','Padang','1981-09-01','Pria','Islam','Jl. Ampang No 13 Padang','081266613133','default-avatar.png',11,'2018-02-28 18:02:52','2018-02-28 18:02:52'),(18,'P9012','imam.subekti@gmail.com','Imam Subekti','Samarinda','1970-01-01','Pria','Islam','Jl. Jati Negara, Jakarta Pusat','087812345612','default-avatar.png',11,'2018-02-28 18:13:09','2018-02-28 18:13:09'),(19,'P9123','andra.djunaidy@gmail.com','Andra Djunaidy','Lubuk Alung','1970-12-01','Pria','Islam','Jl. Lintas Bukittinggi, Lubuk Alung','08199987651','default-avatar.png',3,'2018-02-28 18:14:36','2018-02-28 18:14:36'),(20,'P9234','mustofa@gmail.com','Mustofa','Semarang','1979-10-28','Pria','Islam','Blok E Gang Jati, Jakarta Pusat','081966677721','default-avatar.png',5,'2018-02-28 18:25:55','2018-02-28 18:25:55'),(21,'P9345','alnafiah.alius@gmail.com','Alnafiah Alius','Padang','1960-01-14','Wanita','Islam','Tabing Padang No 45','081977828911','default-avatar.png',3,'2018-02-28 18:27:20','2018-02-28 18:27:20'),(22,'P89148035','nining.purnama.sari@gmail.com','Nining Purnama Sari','Jakarta','1990-08-25','Wanita','Islam','Jln. Diponegoro Manado','087712312332','default-avatar.png',9,'2018-02-28 18:41:52','2018-02-28 18:41:52'),(25,'P921613093','aulia.akbar@gmail.com','T. Aulia Akbar','Padang','1985-06-20','Pria','Islam',NULL,NULL,'default-avatar.png',5,'2018-02-28 19:33:40','2018-02-28 19:33:40'),(26,'P941613121','chandra.muliawan@gmail.com','Chandra Muliawan',NULL,NULL,'Pria',NULL,NULL,NULL,'default-avatar.png',11,'2018-02-28 19:35:00','2018-02-28 19:35:00'),(27,'P851511776','rudi.kencana@gmail.com','Rudi Kencana',NULL,NULL,'Pria',NULL,NULL,NULL,'default-avatar.png',4,'2018-02-28 19:36:16','2018-02-28 19:36:16'),(28,'P931613056','rezha.pratama.lubis@gmail.com','Rezha Pratama Lubis',NULL,NULL,'Pria','Islam',NULL,NULL,'default-avatar.png',1,'2018-02-28 19:36:54','2018-02-28 19:36:54'),(29,'P921613458','rizky.rizali@gmail.com','Rizky Rizali Wardana',NULL,NULL,'Pria','Islam',NULL,NULL,'default-avatar.png',5,'2018-02-28 19:37:45','2018-02-28 19:37:45'),(30,'P88149178','endang.sri@gmail.com','Endang Sri Wardani',NULL,NULL,'Wanita',NULL,NULL,NULL,'default-avatar.png',12,'2018-02-28 19:38:41','2018-02-28 19:38:41'),(31,'P931613673','dhanton.anut@gmail.com','Dhanton Anut Panjaitan',NULL,NULL,'Pria',NULL,NULL,NULL,'default-avatar.png',12,'2018-02-28 19:42:42','2018-02-28 19:42:42'),(32,'P921613071','muflih.rori@gmail.com','Muflih Rori Putra Harahap',NULL,NULL,'Pria','Katolik',NULL,NULL,'default-avatar.png',1,'2018-02-28 19:43:26','2018-02-28 19:43:26'),(33,'P85148081','aradea.anabrang@gmail.com','Aradea Anabrang',NULL,NULL,'Pria',NULL,NULL,NULL,'default-avatar.png',1,'2018-02-28 19:43:57','2018-02-28 19:43:57'),(34,'P861511874','siti.rahmadhani@gmail.com','Siti Rahmadhani Nasution',NULL,NULL,'Wanita',NULL,NULL,NULL,'default-avatar.png',3,'2018-02-28 19:44:31','2018-02-28 19:44:31'),(35,'P91149229','marizana@gmail.com','Marizana Ramadhani',NULL,NULL,'Wanita',NULL,NULL,NULL,'default-avatar.png',8,'2018-02-28 19:45:05','2018-02-28 19:45:05'),(36,'P87149143','dini.sinaga@gmail.com','Dini Hanisyahfitri Sinaga',NULL,NULL,'Wanita',NULL,NULL,NULL,'default-avatar.png',1,'2018-02-28 19:45:34','2018-02-28 19:45:34'),(37,'P82149256','teja.ogan@gmail.com','Teja Ogan Andalusia',NULL,NULL,'Wanita',NULL,NULL,NULL,'default-avatar.png',1,'2018-02-28 19:50:14','2018-02-28 19:50:14'),(38,'P86149109','herman.sibarani@gmail.com','Herman Putra Sibarani',NULL,NULL,'Pria',NULL,NULL,NULL,'default-avatar.png',1,'2018-02-28 19:51:20','2018-02-28 19:51:20'),(39,'P87149168','emma.sari@gmail.com','Meriam Emma Sari Simanjuntak',NULL,NULL,'Wanita',NULL,NULL,NULL,'default-avatar.png',1,'2018-02-28 19:51:49','2018-02-28 19:51:49'),(40,'P84149273','irwan@gmail.com','Irwan',NULL,NULL,'Pria',NULL,NULL,NULL,'default-avatar.png',10,'2018-02-28 19:52:17','2018-02-28 19:52:17'),(41,'P90149495','yepta@gmail.com','Yepta T.',NULL,NULL,'Wanita',NULL,NULL,NULL,'default-avatar.png',4,'2018-02-28 19:53:03','2018-02-28 19:53:03'),(42,'P86149104','a.hasibuan@gmail.com','Muhammad Januspati A. Hasibuan',NULL,NULL,'Pria',NULL,NULL,NULL,'default-avatar.png',1,'2018-02-28 19:53:30','2018-02-28 19:53:30'),(43,'P921613065','fitri.sundari@gmail.com','Fitri Sundari',NULL,NULL,'Wanita',NULL,NULL,NULL,'default-avatar.png',6,'2018-02-28 19:54:02','2018-02-28 19:54:02'),(44,'P89148037','br.tarigan@gmail.com','Hetti Keristina BR. Tarigan',NULL,NULL,'Wanita',NULL,NULL,NULL,'default-avatar.png',1,'2018-02-28 19:54:32','2018-02-28 19:54:32');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
