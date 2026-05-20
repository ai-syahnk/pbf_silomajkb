-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2026 at 03:19 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbf_silomajkb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kompetisi`
--

CREATE TABLE `kompetisi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat_ketentuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kompetisi`
--

INSERT INTO `kompetisi` (`id`, `nama`, `periode_pendaftaran`, `deskripsi`, `syarat_ketentuan`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'Information Technology Creative Competition', '1 Juli - 31 Agustus 2026', 'ITCC adalah kompetisi tahunan yang diselenggarakan oleh JKB untuk mendorong kreativitas dan inovasi di bidang teknologi informasi. Kompetisi ini terbuka untuk mahasiswa dari berbagai jurusan di seluruh Indonesia, dengan tujuan untuk menemukan solusi kreatif terhadap tantangan teknologi saat ini.', 'Ketentuan Peserta\r\nStatus Peserta: Terbuka bagi siswa SMA/K sederajat, Mahasiswa aktif (D3/D4/S1), atau Umum (sesuai kategori yang dipilih).\r\nBentuk Tim: Peserta dapat mendaftar secara Individu atau dalam Tim (maksimal 3 orang per tim).\r\nIdentitas: Setiap peserta wajib melampirkan kartu identitas yang berlaku (Kartu Pelajar/KTM/KTP) saat pendaftaran.\r\nOriginalitas: Karya yang dilombakan harus bersifat orisinal, belum pernah memenangkan kompetisi serupa sebelumnya, dan tidak sedang diikutkan dalam lomba lain secara bersamaan.', 'kompetisi/9RxSECGnhVMwb8DpByLupcPCjLQqhsLLPv2ghi0K.jpg', '2026-04-25 09:19:11', '2026-04-25 09:23:11'),
(3, 'UI/UX Design Competition', '1 Juli - 31 Agustus 2026', 'adalah wadah prestisius bagi para inovator muda dan penggiat teknologi untuk mengeksplorasi batasan kreativitas mereka dalam dunia digital. Kompetisi ini dirancang tidak hanya untuk menguji kemampuan teknis seperti pemrograman atau desain, tetapi juga untuk menantang peserta dalam menciptakan solusi solutif atas permasalahan nyata melalui pemanfaatan teknologi informasi.', 'Ketentuan Peserta\r\nStatus Peserta: Terbuka bagi siswa SMA/K sederajat, Mahasiswa aktif (D3/D4/S1), atau Umum (sesuai kategori yang dipilih).\r\nBentuk Tim: Peserta dapat mendaftar secara Individu atau dalam Tim (maksimal 3 orang per tim).\r\nIdentitas: Setiap peserta wajib melampirkan kartu identitas yang berlaku (Kartu Pelajar/KTM/KTP) saat pendaftaran.\r\nOriginalitas: Karya yang dilombakan harus bersifat orisinal, belum pernah memenangkan kompetisi serupa sebelumnya, dan tidak sedang diikutkan dalam lomba lain secara bersamaan.', 'kompetisi/G2JAQcMoo0NUbQPkC9ZZ8eKJjMW52iIBPVo3tNsj.jpg', '2026-04-25 10:09:12', '2026-04-25 10:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `kompetisi_peserta`
--

CREATE TABLE `kompetisi_peserta` (
  `id` bigint UNSIGNED NOT NULL,
  `kompetisi_id` bigint UNSIGNED NOT NULL,
  `peserta_id` bigint UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggota` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `catatan_admin` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kompetisi_peserta`
--

INSERT INTO `kompetisi_peserta` (`id`, `kompetisi_id`, `peserta_id`, `kategori`, `nama_tim`, `anggota`, `status`, `catatan_admin`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Desain Web', 'TIM V-MILAN', 'Valen', 'diterima', 'Good luck!', '2026-04-27 20:56:06', '2026-04-27 21:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_25_082356_add_role_to_users_table', 2),
(6, '2026_04_25_153900_create_kompetisi_table', 3),
(7, '2026_04_26_000001_create_peserta_table', 4),
(8, '2026_04_26_120000_add_document_fields_to_peserta_table', 5),
(9, '2026_04_26_061944_create_kompetisi_peserta_table', 6),
(10, '2026_04_28_090000_add_team_fields_to_kompetisi_peserta_table', 7),
(11, '2026_04_28_100000_add_status_fields_to_kompetisi_peserta_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nim` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portofolio_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktm_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `user_id`, `nim`, `telepon`, `prodi`, `portofolio_path`, `ktm_path`, `created_at`, `updated_at`) VALUES
(1, 2, '240302031', '+6289747354534', 'D3 Teknik Informatika', 'peserta/portofolio/LftpCqZOozaTZQjopP2mGFNGijHM1qbuc8E1H3wF.pdf', 'peserta/ktm/NDwdcOEOc2Qvm3lWjCSIExSM6NZnu6zwaUL1RjPC.png', '2026-04-25 20:31:13', '2026-04-25 22:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4aaTiKv62TuXEI7llXf3Q4D5DbMxsQUqKeJP2Lu3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.120.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFJxNFZYWGtGcHZpaGNVM1ZxeWJrcEFQTkVJNkJNSElFUThDVmVhayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czoxMToid2ViLmJlcmFuZGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1779287156),
('I9885fY8glFJAtA6C2dV3oYzWNg4c4IYL7xkhkHu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0FwNEtCSUFrSUZxNFh5VDVteTJNZjdqeFg2R0VZeUZTenNnOGRBVSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czoxMToid2ViLmJlcmFuZGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1779287164),
('LBbwlvNSwDNs35uQj8azkLMFjDhV4APrGEHOfTLu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjFwejdhWVJMbUxLY3BiOFNGb0tkNlkwaEwzUWRwYTVLM1ZYZ2RJViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9hcHAubGFic2kubXkuaWQvYWRtaW4vbG9naW4iO3M6NToicm91dGUiO3M6MTE6ImFkbWluLmxvZ2luIjt9fQ==', 1779290279),
('nzglzwbv0M7dFb2va2qks1HnMNzqLeuIoLzeNagC', NULL, '127.0.0.1', 'WhatsApp/2.2616.100 W', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnF2dWdDT0IwNW9WME1sZHdnMWVrNGJJbEtBNWNkT2RBUUh4dk1aSiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9hcHAubGFic2kubXkuaWQiO3M6NToicm91dGUiO3M6MTE6IndlYi5iZXJhbmRhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779288201),
('xPgrNQXEQenjEYqUkImGXur9ovTPXPk2k9tShuIL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzRWYWVkRTdURURrVG5XczF4WmwwYmpNTXlUREdBR0t0cndlb1RpTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9rb21wZXRpc2kvMyI7czo1OiJyb3V0ZSI7czoyMDoid2ViLmtvbXBldGlzaS5kZXRhaWwiO319', 1779290176);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'peserta',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@silomajkb.com', 'admin', NULL, '$2y$12$YxhU3wiQ4NZJNhoQdwu0NuulWt5RWDydsbzpjl6ZrS7b7bFphJLkm', NULL, '2026-04-25 01:25:23', '2026-04-25 01:25:23'),
(2, 'Valen Milan Ananta', 'valenmilana@gmail.com', 'peserta', NULL, '$2y$12$YkbVv4VD/2avoojGHJSNx.IgrzJwozy437REXHChmzyAkJB0EeHam', NULL, '2026-04-25 20:31:13', '2026-04-25 20:31:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kompetisi`
--
ALTER TABLE `kompetisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kompetisi_peserta`
--
ALTER TABLE `kompetisi_peserta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kompetisi_peserta_kompetisi_id_peserta_id_unique` (`kompetisi_id`,`peserta_id`),
  ADD KEY `kompetisi_peserta_peserta_id_foreign` (`peserta_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `peserta_nim_unique` (`nim`),
  ADD KEY `peserta_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kompetisi`
--
ALTER TABLE `kompetisi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kompetisi_peserta`
--
ALTER TABLE `kompetisi_peserta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kompetisi_peserta`
--
ALTER TABLE `kompetisi_peserta`
  ADD CONSTRAINT `kompetisi_peserta_kompetisi_id_foreign` FOREIGN KEY (`kompetisi_id`) REFERENCES `kompetisi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kompetisi_peserta_peserta_id_foreign` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
