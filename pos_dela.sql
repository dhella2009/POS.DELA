-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pos_dela
CREATE DATABASE IF NOT EXISTS `pos_dela` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pos_dela`;

-- Dumping structure for table pos_dela.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.cache: ~0 rows (approximately)

-- Dumping structure for table pos_dela.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.cache_locks: ~0 rows (approximately)

-- Dumping structure for table pos_dela.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pos_dela.item_penjualan
CREATE TABLE IF NOT EXISTS `item_penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `kuantitas` int NOT NULL,
  `harga_satuan` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_penjualan_penjualan_id_foreign` (`penjualan_id`),
  KEY `item_penjualan_produk_id_foreign` (`produk_id`),
  CONSTRAINT `item_penjualan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`),
  CONSTRAINT `item_penjualan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.item_penjualan: ~165 rows (approximately)
INSERT INTO `item_penjualan` (`id`, `penjualan_id`, `produk_id`, `kuantitas`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 1, 40000, 40000, '2026-09-13 19:55:35', '2026-09-13 19:55:35'),
	(2, 1, 1, 1, 200000, 200000, '2026-09-13 19:55:36', '2026-09-13 19:55:36'),
	(3, 2, 2, 1, 40000, 40000, '2026-09-13 20:17:21', '2026-09-13 20:17:21');

-- Dumping structure for table pos_dela.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.jenis: ~0 rows (approximately)
INSERT INTO `jenis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'sepatu', '2026-09-13 19:46:00', '2026-09-13 19:46:00'),
	(2, 'baju', '2026-09-13 19:46:08', '2026-09-13 19:46:08');

-- Dumping structure for table pos_dela.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.jobs: ~0 rows (approximately)

-- Dumping structure for table pos_dela.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.job_batches: ~0 rows (approximately)

-- Dumping structure for table pos_dela.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.migrations: ~1 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_roles_table', 1),
	(2, '0001_01_01_000000_create_users_table', 1),
	(3, '0001_01_01_000001_create_cache_table', 1),
	(4, '0001_01_01_000002_create_jobs_table', 1),
	(5, '2026_04_20_072238_create_produk_table', 1),
	(6, '2026_04_20_072914_create_penjualan_table', 1),
	(7, '2026_04_20_073514_create_item_penjualan_table', 1),
	(8, '2026_08_27_015101_create_jenis_table', 1),
	(9, '2026_08_27_023655_add_jenis_id_to_produk_table', 1),
	(10, '2026_09_11_010905_add_soft_deletes_to_produk_table', 1);

-- Dumping structure for table pos_dela.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table pos_dela.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `total_pembayaran` int NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('OPEN','COMPLETED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_user_id_foreign` (`user_id`),
  CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.penjualan: ~50 rows (approximately)
INSERT INTO `penjualan` (`id`, `user_id`, `total_pembayaran`, `metode_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
	(1, 4, 240000, 'CASH', 'COMPLETED', '2026-09-13 19:55:32', '2026-09-13 19:56:03'),
	(2, 4, 40000, 'CASH', 'COMPLETED', '2026-09-13 20:17:19', '2026-09-13 20:17:35');

-- Dumping structure for table pos_dela.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_user_id_foreign` (`user_id`),
  KEY `produk_nama_index` (`nama`),
  KEY `produk_jenis_id_foreign` (`jenis_id`),
  CONSTRAINT `produk_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE SET NULL,
  CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.produk: ~100 rows (approximately)
INSERT INTO `produk` (`id`, `jenis_id`, `user_id`, `foto`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 5, 'products/YfPMDoo9H797uH3v4C6PECO4OKpjH8fttWMAWMoN.jpg', 'sepatu adidas', 15000, 200000, 24, '2026-09-13 19:46:43', '2026-09-13 19:55:36', NULL),
	(2, 2, 4, 'products/eub8EOe1coPzDPP1hmCe5Gxp0ciuH3EvAgukcs9n.jpg', 'baju adat bali', 12000, 40000, 43, '2026-09-13 19:54:12', '2026-09-13 20:17:21', NULL);

-- Dumping structure for table pos_dela.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', NULL, NULL),
	(2, 'kasir', NULL, NULL);

-- Dumping structure for table pos_dela.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.sessions: ~0 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('rPO2VMkhHC4rtjPis6JvRdv2jde8EdKxnK9qUU6r', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWDVEU1gyQ3lqQXBiTFlzRlF2bG44NmNWWTFRd1dnUTdEV0FtcTU3dSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYm91dCI7czo1OiJyb3V0ZSI7czo1OiJhYm91dCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1789356348);

-- Dumping structure for table pos_dela.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  FULLTEXT KEY `users_name_email_fulltext` (`name`,`email`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_dela.users: ~6 rows (approximately)
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(4, 1, 'dela', 'dela@gmail.com', '2026-09-13 19:36:04', '$2y$12$FkWoaKXmi2pZ0vCKLX3PRO9qXGVW15R2Cz7P63gLPDhTWjeGSKxuq', 'ZgVPWgbM2C7fwtwfbHKncBA0AJzOPbnQLZarSHbh1IDIMbqf9aPd5v821eEb', '2026-09-13 19:36:04', '2026-09-13 19:47:32'),
	(5, 2, 'salsa', 'salsa@gmail.com', '2026-09-13 19:36:04', '$2y$12$eyy/tnaywUYBEwdmYSvpGuOfLFTDCBiXVMrlaHyeSrkMOgAVzFqVm', 'i4L8RMaKH7cNGN2bAzMFd6EuQWkZHYeatfNIb5znrFzi0YP0aHEmNSrgXz7U', '2026-09-13 19:36:04', '2026-09-13 19:48:09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
