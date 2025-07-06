-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 03 Jul 2025 pada 06.10
-- Versi server: 8.0.35
-- Versi PHP: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DKP`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','superadmin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nama`, `nip`, `password`, `avatar`, `role`, `created_at`, `updated_at`) VALUES
(12, 'admin', '121212121212121212', '$2y$12$LD9d8dGGLrXiE0ttnfTpoeSVqWxQZgH./YsPCGMM2w0rhKR2noKqO', 'avatars/GGBWkwrNjUpzErqUQX6YzYyyFNIAtKfenvnDhrob.jpg', 'admin', '2025-06-29 03:48:18', '2025-07-01 06:54:08'),
(13, 'superadmin', '12341234123412312', '$2y$12$iRukqsuRACzWDFn74YnLNuntkbJ/ehNfgBT4CJ57opQV1sz51PyFK', 'avatars/i8CA5wdGalxWkAkSD9A3iFYQlk4hewghSjIX3H9X.jpg', 'superadmin', '2025-06-29 05:37:17', '2025-07-01 20:00:43'),
(16, 'asdasd', '1432567234567123', '$2y$12$UbgfY9j.SsLd5nHf.Mc4FuNqC9oblEiQJ1qepG1XiBBKIC/f4ZAbW', 'avatars/3sK4YIAc6SOmuOwA31XhtWQuH9IaIxQ6fe9ix5QQ.png', 'superadmin', '2025-06-30 10:02:42', '2025-07-01 06:16:06'),
(17, 'Slebew', '1606012310040005', '$2y$12$jqG0eVnhq5Ej1caL1GMImO8PaOCuStfRtoUOJ94chFTuXrB53P1tq', 'avatars/IJsh4HOl6ikye3Ys63wY2eNhr9NobStVyI2Dk0bg.jpg', 'admin', '2025-07-01 06:55:47', '2025-07-02 02:00:36'),
(18, 'afdasdfa', '160601231004000512', '$2y$12$xg.egzFwTat9xtsUIxwcO.ULD/G7SwtxOja.RMiA7yJQ7Kl86Tl4m', NULL, 'superadmin', '2025-07-01 07:18:07', '2025-07-01 07:18:07'),
(19, 'asfasdad', '1606012310040005123', '$2y$12$xX5dhK39WqylUFugblMOfu.6/hmTCx9Vdoj8Y1IRg5UvirSrkjaB6', NULL, 'admin', '2025-07-01 20:04:21', '2025-07-01 20:04:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', 'asdas@gmail.com', 'adasdasda', 'asdasda', '2025-07-01 08:27:33', '2025-07-01 08:27:33'),
(2, 'asfas', 'adasd@gmail.com', 'fasdf', 'asdasd', '2025-07-01 08:38:19', '2025-07-01 08:38:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `harga_pangans`
--

CREATE TABLE `harga_pangans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_pangan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `harga_pangans`
--

INSERT INTO `harga_pangans` (`id`, `nama_pangan`, `harga_pangan`, `created_at`, `updated_at`) VALUES
(4, 'DAGING SAPI', 140000, '2025-07-02 02:02:31', '2025-07-02 02:02:31'),
(5, 'CABE', 45000, '2025-07-02 02:02:40', '2025-07-02 02:02:40'),
(6, 'BERAS', 120000, '2025-07-02 02:02:54', '2025-07-02 02:02:54'),
(7, 'DAGING AYAM', 40000, '2025-07-02 02:03:12', '2025-07-02 02:03:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `kwt_galleries`
--

CREATE TABLE `kwt_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kwt_galleries`
--

INSERT INTO `kwt_galleries` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'kwt-galleries/NFY2TzmYZIa1dYlmRFNOi5qw9rwOwrX53Lh5Ecxa.png', '2025-07-01 08:01:03', '2025-07-01 08:01:03'),
(4, 'kwt-galleries/WqvYWPzUFSZDDDJD7YgtP3j2HD9INDbzuWfCqReh.png', '2025-07-01 08:09:15', '2025-07-01 08:09:15'),
(5, 'kwt-galleries/fHyDIl7eI6HrA8k0OhFBDDILIL2AZf4F4OIk6KNi.png', '2025-07-01 08:09:23', '2025-07-01 08:09:23'),
(6, 'kwt-galleries/rEk2N47SpdVWE8jf2KevaChZV6rNqCqneQXwRCGk.png', '2025-07-01 08:09:28', '2025-07-01 08:09:28'),
(7, 'kwt-galleries/q9mqx7f6P0QBGDw9ZKBVJw6mOzBpJAoSYaxkNpkA.png', '2025-07-01 08:09:33', '2025-07-01 08:09:33'),
(8, 'kwt-galleries/tz87LYmGVEEOUjy7Y5YddcTjEn9z3Gzu5K5eVeQJ.png', '2025-07-01 08:09:39', '2025-07-01 08:09:39'),
(9, 'kwt-galleries/XyDFAZR2v4Gge5bsBVbrZqieezRl0jwX9BVrkuHE.png', '2025-07-01 08:09:45', '2025-07-01 08:09:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `jenis_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketua_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporans`
--

INSERT INTO `laporans` (`id`, `user_id`, `jenis_kegiatan`, `nama_kelompok`, `ketua_kelompok`, `tanggal_laporan`, `file`, `created_at`, `updated_at`) VALUES
(12, 1, 'sdfgsa', 'sdgasfd', 'sdgasdfs', '2025-07-01', 'laporan_files/qfmW1kzTzEIzfSXyrwmcDdYh3WjHrmcsqAMasqoJ.jpg', '2025-07-01 09:14:31', '2025-07-01 09:14:31'),
(13, 1, 'afsgdfa', 'asgas', 'gasfa', '2025-08-01', 'laporan_files/Q1ww8u7eJOPTo23eODsmRONmdO5juvplX6bEV58U.jpg', '2025-07-01 09:14:51', '2025-07-01 09:14:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_29_081908_create_proposals_table', 2),
(5, '2025_06_29_090551_create_admins_table', 3),
(6, '2025_06_30_004343_create_laporans_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketua_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` enum('diproses','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'diproses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proposals`
--

INSERT INTO `proposals` (`id`, `user_id`, `nama_kelompok`, `alamat`, `ketua_kelompok`, `file`, `keterangan`, `created_at`, `updated_at`) VALUES
(6, 1, 'dsadasd', 'asdasd', 'asdfasd', 'proposals/r2qHNcBdiITBDwF6K0ALzLxpYSM23bm4PvpNKCkp.pdf', 'ditolak', '2025-06-30 09:37:44', '2025-07-01 22:46:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` bigint NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `nik`, `no_hp`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Roby', 1606012310040005, '082178172201', '$2y$12$UwEWUP.iKY.KdDOocW3/bebQvbcaxSDtVnfYhjAo3TrhiBr4ASvRC', 'user-avatars/iMCc1TEZRLEZ7qblyvKt0shHzNZJGUvtJXrJ6Y9r.png', NULL, '2025-06-29 00:11:40', '2025-07-01 07:10:10'),
(2, 'Gacor', 1243134134512341, '08121312312213', '$2y$12$j43euC8y4k5448NVswMP8uYg2jiu2NSEl/jPf9SysQutGano8T5Ze', NULL, NULL, '2025-06-29 18:32:22', '2025-07-01 07:41:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_nip_unique` (`nip`);

--
-- Indeks untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `harga_pangans`
--
ALTER TABLE `harga_pangans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kwt_galleries`
--
ALTER TABLE `kwt_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `harga_pangans`
--
ALTER TABLE `harga_pangans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kwt_galleries`
--
ALTER TABLE `kwt_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporans`
--
ALTER TABLE `laporans`
  ADD CONSTRAINT `laporans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
