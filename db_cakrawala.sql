-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Des 2024 pada 10.10
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cakrawala`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'superadmin', '2024-12-02 14:07:48'),
(2, 2, 'admin', '2024-12-02 19:44:37'),
(3, 3, 'admin', '2024-12-04 18:08:05'),
(4, 4, 'admin', '2024-12-04 22:18:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', NULL, 'superadmin@admin.com', '$2y$12$37wyTuVspgAQLCaJpoBaU.xHZUwDvXvby5buXYa8yY8/0ENMgG.kW', NULL, NULL, 0, '2024-12-04 22:26:25', '2024-12-02 14:07:48', '2024-12-04 22:26:25'),
(2, 2, 'email_password', NULL, 'demo@example.com', '$2y$12$uuMl0OtizdBk7eHjlmdnSuJzCuAHqjRQiS4rR/NIX1JwyavPJ.VG6', NULL, NULL, 0, '2024-12-03 09:10:40', '2024-12-02 19:44:36', '2024-12-03 09:10:40'),
(3, 3, 'email_password', NULL, 'demo2@example.com', '$2y$12$dB3CJFokRB3Gs/iJuexJvOrpe.xm5wW5IknfHBaTOF.mkz/8nr8wm', NULL, NULL, 0, NULL, '2024-12-04 18:08:05', '2024-12-04 18:08:05'),
(4, 4, 'email_password', NULL, 'demo24@example.com', '$2y$12$8tGsw8HxT55uSfJ1.x4Z/.v98A0fitDxwsPSjKbF.6Mbp7K5ibTzm', NULL, NULL, 0, '2024-12-04 22:19:23', '2024-12-04 22:18:28', '2024-12-04 22:19:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'demo@example.com', 2, '2024-12-02 19:45:15', 1),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-02 19:46:11', 1),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-02 19:52:40', 1),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-02 22:07:35', 1),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-03 06:50:33', 1),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', NULL, '2024-12-03 09:09:05', 0),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-03 09:09:17', 1),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'demo@example.com', 2, '2024-12-03 09:10:41', 1),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-03 09:11:04', 1),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2025-12-03 09:19:50', 1),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-03 11:56:20', 1),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-03 20:59:46', 1),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-03 21:47:52', 1),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-04 15:24:24', 1),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-04 16:14:07', 1),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-04 21:44:34', 1),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-23 21:47:56', 1),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'demo24@example.com', 4, '2024-12-04 22:19:23', 1),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'email_password', 'superadmin@admin.com', 1, '2024-12-04 22:26:25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(127) NOT NULL,
  `author` varchar(64) NOT NULL,
  `publisher` varchar(64) NOT NULL,
  `panggil` varchar(15) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `year` year NOT NULL,
  `rack_id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `book_cover` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `slug`, `title`, `author`, `publisher`, `panggil`, `isbn`, `year`, `rack_id`, `category_id`, `book_cover`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'si-anak-spesial-135', 'Si Anak Spesial', 'Tere Liye', 'Jakarta, Republika ', '899.221 3 TER s', '9786025734441', '2018', 1, 1, '1733137104_8cd31c664c2684b67582.png', '2024-12-02 08:29:03', '2024-12-02 10:58:24', NULL),
(2, 'daun-yang-jatuh-tak-pernah-membenci-angin-639', 'Daun yang Jatuh Tak Pernah Membenci Angin', 'Tere Liye', 'PT Gramedia Pustaka Utama ', '899.221 3 TER d', '9786020331607', '2018', 1, 1, '1733130102_742175a49693b61919a3.png', '2024-12-02 09:01:42', '2024-12-02 10:54:37', NULL),
(3, 'administrasi-jaringan-komputer-769', 'Administrasi jaringan komputer', 'Andry Maulana, Ahmad Fauzi', 'Graha Ilmu', '004.68 AND a', '9786232281837', '2020', 2, 2, '1733137038_90c732248ee0e7f158ab.png', '2024-12-02 10:53:05', '2024-12-02 10:57:18', NULL),
(4, 'administrasi-system-jaringan-858', ' Administrasi system jaringan', 'Muhammad Sawalludin Damanik', 'Kun Fayakun', '004.68 DAM a', '9786232103290', '2019', 1, 2, '1733137313_43afe39e2b6b742d8d81.png', '2024-12-02 11:01:53', '2024-12-02 11:02:18', NULL),
(5, 'buku-ajar-filsafat-ilmu-367', 'Buku ajar filsafat ilmu', 'Drs. H. Agus Thoha, M.Si.', 'Deepublish', '101 AGU b', '9786230209017', '2020', 1, 3, '1733137793_69a580287ebb09d95584.png', '2024-12-02 11:09:22', '2024-12-02 11:09:53', NULL),
(6, 'agama-bawa-pesan-baru-326', 'Agama bawa pesan baru', 'Johannes Berchmans Bali', 'Gita Kasih', '200.1 JOH a', '9793748060', '2005', 1, 4, '1733137980_49db2673a3aabc2e5513.png', '2024-12-02 11:13:00', '2024-12-02 11:13:00', NULL),
(7, 'perencanaan-pembelajaran-ilmu-ilmu-sosial-209', 'Perencanaan pembelajaran ilmu-ilmu sosial', 'H.Nurochim', 'Rajawali', '371.1 NUR p', '9789797695964', '2012', 3, 5, '1733138262_e0d625b7199510dd759b.png', '2024-12-02 11:17:42', '2024-12-02 11:17:42', NULL),
(8, 'jalan-bahasa-pelajaran-praktis-tata-bahasa-bahasa-indonesia-669', 'Jalan bahasa :pelajaran praktis tata bahasa bahasa Indonesia', 'Totok Suhardiyanto', 'Wedatama Widya Sastra', '415 TOT j', '9793258453', '2005', 2, 6, '1733138484_a46ca93501a4552b7df2.png', '2024-12-02 11:21:24', '2024-12-02 11:21:24', NULL),
(9, 'sains-fisika-694', 'Sains fisika', 'Mikrajuddin Abdullah', 'Esis ', '530.7 MIK s', '9797341399', '2004', 2, 7, '1733138801_43a91aa3bba628799758.png', '2024-12-02 11:26:41', '2024-12-02 11:26:41', NULL),
(10, 'teknologi-pengolahan-beras-397', 'Teknologi pengolahan beras', 'Haryadi', 'Gadjah Mada University Press', '633.18 HAR t', '9794206164', '2005', 3, 8, '1733138966_a6993a26ec4b8caee666.png', '2024-12-02 11:29:26', '2024-12-02 11:29:26', NULL),
(11, 'rekreasi-998', 'Rekreasi', 'Nur Iffah', 'Deepublish Publisher', '790.07 NUR r', '9786230237429', '2020', 3, 9, '1733139102_2c30e12cd643969d7a60.png', '2024-12-02 11:31:42', '2024-12-02 11:31:42', NULL),
(12, 'sastra-dan-ilmu-sastra-pengantar-teori-sastra-198', 'Sastra dan ilmu sastra : pengantar teori sastra', 'A. Teeuw', 'Dunia Pustaka Jaya', '800 TEE s', '9789794194157', '2016', 2, 10, '1733139242_9e3fb1fc9c0cf4807bc1.png', '2024-12-02 11:33:53', '2024-12-02 11:34:02', NULL),
(13, 'geografi-sejarah-53', 'Geografi sejarah', 'Dr. Lukitaningsih, M. Hum', 'Yayasan Kita Menulis', '911.598 28 LUK ', '9786239175832', '2017', 2, 11, '1733139388_d0dd0ed51da110fa82d6.png', '2024-12-02 11:36:28', '2024-12-04 14:29:14', NULL),
(14, 'sxdsds-87', 'sxdsds', 'sds', 'sds', 'sd', '123456734567', '0000', 3, 7, NULL, '2024-12-02 12:47:46', '2024-12-02 12:47:50', '2024-12-02 12:47:50'),
(15, 'kisah-tanah-sunda-583', 'Kisah Tanah sunda', 'Ghiyats', 'Malik', '123', '12234567881', '2020', 1, 11, '1733192062_811d5f1d892e26a44197.png', '2024-12-03 02:13:47', '2024-12-03 02:14:37', '2024-12-03 02:14:37'),
(16, 'perang-607', 'perang ', 'James goddwin', 'Yayasan Kita Menulis', '800 TEE s', '1234567890', '2021', 1, 5, '1733325137_b3d05c4ac58df7e01738.png', '2024-12-04 15:12:17', '2024-12-04 15:12:33', '2024-12-04 15:12:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_stock`
--

CREATE TABLE `book_stock` (
  `id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `book_stock`
--

INSERT INTO `book_stock` (`id`, `book_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, '2024-12-02 08:29:03', '2024-12-02 10:58:24', NULL),
(2, 2, 3, '2024-12-02 09:01:42', '2024-12-02 10:54:37', NULL),
(3, 3, 2, '2024-12-02 10:53:05', '2024-12-02 10:57:18', NULL),
(4, 4, 3, '2024-12-02 11:01:53', '2024-12-02 11:02:18', NULL),
(5, 5, 5, '2024-12-02 11:09:22', '2024-12-02 11:09:53', NULL),
(6, 6, 4, '2024-12-02 11:13:00', '2024-12-02 11:13:00', NULL),
(7, 7, 5, '2024-12-02 11:17:42', '2024-12-02 11:17:42', NULL),
(8, 8, 3, '2024-12-02 11:21:24', '2024-12-02 11:21:24', NULL),
(9, 9, 2, '2024-12-02 11:26:41', '2024-12-02 11:26:41', NULL),
(10, 10, 5, '2024-12-02 11:29:26', '2024-12-02 11:29:26', NULL),
(11, 11, 1, '2024-12-02 11:31:42', '2024-12-02 11:31:42', NULL),
(12, 12, 3, '2024-12-02 11:33:53', '2024-12-02 11:34:02', NULL),
(13, 13, 4, '2024-12-02 11:36:28', '2024-12-04 14:29:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fiksi', '2024-12-02 08:28:45', '2024-12-02 08:28:45', NULL),
(2, ' Komputer, informasi dan referensi umum', '2024-12-02 10:37:50', '2024-12-02 10:37:50', NULL),
(3, ' Filsafat dan psikologi', '2024-12-02 10:38:06', '2024-12-02 10:38:06', NULL),
(4, 'Agama', '2024-12-02 10:38:16', '2024-12-02 10:38:16', NULL),
(5, 'Ilmu sosial', '2024-12-02 10:38:28', '2024-12-02 10:38:28', NULL),
(6, 'Bahasa', '2024-12-02 10:38:35', '2024-12-02 10:38:35', NULL),
(7, 'Sains dan matematika', '2024-12-02 10:38:43', '2024-12-02 10:38:43', NULL),
(8, 'Teknologi', '2024-12-02 10:38:49', '2024-12-02 10:38:49', NULL),
(9, 'Kesenian dan rekreasi', '2024-12-02 10:38:58', '2024-12-02 10:38:58', NULL),
(10, 'Sastra', '2024-12-02 10:39:20', '2024-12-02 10:39:20', NULL),
(11, ' Sejarah dan geografi', '2024-12-02 10:39:30', '2024-12-02 10:39:30', NULL),
(12, 'komik', '2024-12-04 15:13:01', '2024-12-04 15:13:12', '2024-12-04 15:13:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fines`
--

CREATE TABLE `fines` (
  `id` int UNSIGNED NOT NULL,
  `loan_id` bigint UNSIGNED DEFAULT NULL,
  `amount_paid` int UNSIGNED DEFAULT NULL,
  `fine_amount` int UNSIGNED NOT NULL,
  `paid_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `fines`
--

INSERT INTO `fines` (`id`, `loan_id`, `amount_paid`, `fine_amount`, `paid_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 365000, 365000, '2024-12-02 18:43:47', '2024-12-02 11:43:25', '2024-12-02 11:43:47', NULL),
(2, 2, 2000, 363000, NULL, '2024-12-02 11:47:07', '2024-12-03 05:41:12', '2024-12-03 05:41:12'),
(3, 2, 2000, 2000, '2024-12-03 12:42:13', '2024-12-03 05:41:45', '2024-12-03 05:42:13', NULL),
(4, 9, 13000, 13000, '2024-12-23 21:48:27', '2024-12-23 14:48:12', '2024-12-23 14:48:27', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fines_per_day`
--

CREATE TABLE `fines_per_day` (
  `id` int UNSIGNED NOT NULL,
  `amount` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `fines_per_day`
--

INSERT INTO `fines_per_day` (`id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1000, '2024-12-02 07:07:39', '2024-12-04 13:51:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loans`
--

CREATE TABLE `loans` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL DEFAULT '1',
  `member_id` int UNSIGNED NOT NULL,
  `loan_date` datetime NOT NULL,
  `due_date` date NOT NULL,
  `return_date` datetime DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `loans`
--

INSERT INTO `loans` (`id`, `uid`, `book_id`, `quantity`, `member_id`, `loan_date`, `due_date`, `return_date`, `qr_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '22984a5a2306db0f1ac299cee0468c5491b1692b', 11, 1, 13, '2024-12-02 18:37:05', '2023-12-03', '2024-12-02 18:43:16', 'david-wahyu_rek_97e6b_1733320461.png', '2023-12-03 11:37:05', '2024-12-04 13:54:21', NULL),
(2, 'bf3a0cea9d8cebfa0cc7645541456707691436e8', 11, 1, 13, '2024-11-02 18:44:12', '2024-12-01', '2024-12-03 12:41:39', 'david-wahyu_rek_bafe2_1733238263.png', '2024-11-01 11:44:12', '2024-12-03 15:04:23', NULL),
(3, 'dbac7252dafa2c125db128931492c35eea8e0989', 3, 1, 13, '2024-12-02 18:46:49', '2025-01-06', NULL, 'david-wahyu_adm_13a36_1733140009.png', '2024-12-07 11:46:49', '2024-12-23 14:57:21', NULL),
(4, '82755c59bb0a4367547e8463c0846be44c59862c', 13, 2, 12, '2024-12-02 19:50:49', '2024-12-09', '2024-12-02 19:51:28', 'divo-reza-f_geo_0e7ad_1733200600.png', '2024-12-02 12:50:49', '2024-12-03 04:36:40', NULL),
(8, '8179966d27fc07909c7f674beb8ba05a8bc5506b', 11, 1, 15, '2024-12-03 09:16:19', '2025-01-06', NULL, 'puja-harni-p_rek_f8662_1733192179.png', '2024-12-03 02:16:19', '2024-12-23 14:57:44', NULL),
(9, 'a51ae1c148a244c823b82a3cd8f093a9d9447993', 13, 1, 12, '2024-12-03 09:53:30', '2024-12-10', '2024-12-23 21:48:08', 'divo-reza-f_geo_4fe9e_1733326564.png', '2024-12-03 02:53:30', '2024-12-04 15:36:04', NULL),
(10, '8d072ee552b91397c16ce37dbe81abd41bda37af', 3, 1, 14, '2024-12-03 12:13:59', '2024-12-10', '2024-12-03 12:14:26', 'aji-ngamart_adm_be51e_1733202894.png', '2024-12-03 05:13:59', '2024-12-03 05:14:54', NULL),
(11, 'd7d3f97e6e3547d6917616b427ced9635966d60d', 1, 1, 14, '2024-12-04 20:27:41', '2024-12-11', '2024-12-15 20:48:06', 'aji-ngamart_si_dc475_1733321785.png', '2024-12-04 13:27:41', '2024-12-04 14:16:25', NULL),
(12, '1fb516ee52fc63e4d6840f643a1b79af96078a5e', 2, 1, 14, '2024-12-04 21:14:55', '2024-12-11', '2024-12-20 21:17:16', 'aji-ngamart_dau_4de7a_1733321695.png', '2024-12-04 14:14:55', '2024-12-04 14:14:55', NULL),
(13, '77de68daecd823babbb58edb1c8e14d7106e83bb', 7, 1, 13, '2024-12-04 14:42:45', '2024-11-02', '2024-12-19 19:15:51', NULL, '2024-12-04 14:44:13', '2024-12-04 14:44:13', NULL),
(14, '691bdaf675797c3ad758e48422ef290bc1dea7a1', 1, 1, 11, '2024-12-04 22:02:22', '2024-12-18', '2024-12-04 22:03:51', 'ghiyats-al-_si_7a5eb_1733324664.png', '2024-12-04 15:02:22', '2024-12-04 15:04:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` int UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `Nik` bigint NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `uid`, `foto`, `Nik`, `first_name`, `last_name`, `email`, `phone`, `address`, `date_of_birth`, `gender`, `qr_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'd86f9a288d31125324011707e12afbe9db3066f4', '3216081211209549.png', 3216081211209549, 'Ghiyats ', 'Al Malik', 'Ghiyats@gmail.com', '+62987627374', 'Vinewood Hills 50 Street, Los Santos', '2004-04-02', 'Male', 'ghiyats-al-mali_7ddfd_1733123793.png', '2024-12-02 07:16:33', '2024-12-02 07:36:17', NULL),
(12, '52d51da65e1d86c51d8cbf95c144633aa7ce0fdb', '3216081211200008.jpeg', 3216081211200008, 'Divo ', 'Reza Fahlevi', 'Divo@gmail.com', '+62903877464', 'Central Vinewood 09 Street, Los Santos', '2006-08-17', 'Male', 'divo-reza-fahle_a942d_1733125242.png', '2024-12-02 07:40:42', '2024-12-02 07:40:48', NULL),
(13, '0ab2481c8675e8e1cec9bb2a685d53670102822a', '3327658987676750.png', 3327658987676750, 'David ', 'Wahyu Firmansyah', 'david@gmail.com', '+629877766564', 'Del Peiro 41 Street, Los Santos', '2005-04-02', 'Male', 'david-wahyu-fir_19cc9_1733125436.png', '2024-12-02 07:43:56', '2024-12-02 07:43:56', NULL),
(14, '754b6842850656636d6f08ca26c85ee31da9e6a2', '3345894935059339.jpg', 3345894935059339, 'Aji ', 'Ngamarta Ramadhan', 'Aji@gmail.com', '+628492478274', 'Rocksford Central Apart 23 Street, Los Santos', '2008-02-02', 'Male', 'aji-ngamarta-ra_94c02_1733125669.png', '2024-12-02 07:47:49', '2024-12-02 08:57:13', NULL),
(15, '4a80bb9599f0129b56f46ee388ad24401fe653fb', '3216081211209565.jpg', 3216081211209565, 'Puja', 'Harni P', 'demo@example.com', '8953792437124', 'Strowbery 50 Street, Losa', '2006-02-01', 'Female', 'puja-harni-p_03af0_1733192135.png', '2024-12-02 07:58:49', '2024-12-03 02:15:36', NULL),
(21, '261a06a2aa93fba42e75fb8cd9a848ed78e2fee3', '3216081311229595.jpg', 3216081311229595, 'Clarrisa ', 'Ellen ', 'clarrisa@gmail.com', '+34204952525', 'rodeo freeway', '2024-12-04', 'Female', 'clarrisa-ellen_00084_1733324933.png', '2024-12-04 15:08:22', '2024-12-04 15:09:18', '2024-12-04 15:09:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1733123258, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1733123258, 1),
(3, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1733123258, 1),
(4, '2023-08-12-000001', 'App\\Database\\Migrations\\CreateRacksTable', 'default', 'App', 1733123258, 1),
(5, '2023-08-12-000002', 'App\\Database\\Migrations\\CreateCategoriesTable', 'default', 'App', 1733123258, 1),
(6, '2023-08-12-000003', 'App\\Database\\Migrations\\CreateBooksTable', 'default', 'App', 1733123258, 1),
(7, '2023-08-12-000004', 'App\\Database\\Migrations\\CreateBookStockTable', 'default', 'App', 1733123258, 1),
(8, '2023-08-12-000005', 'App\\Database\\Migrations\\CreateMembersTable', 'default', 'App', 1733123259, 1),
(9, '2023-08-12-000006', 'App\\Database\\Migrations\\CreateLoansTable', 'default', 'App', 1733123259, 1),
(10, '2023-08-12-000007', 'App\\Database\\Migrations\\CreateFinesTable', 'default', 'App', 1733123259, 1),
(11, '2024-07-08-045735', 'App\\Database\\Migrations\\CreateFinesPerDayTable', 'default', 'App', 1733123259, 1),
(12, '2024-12-03-000008', 'App\\Database\\Migrations\\CreateSettingTable', 'default', 'App', 1733329336, 2),
(13, '2024-12-03-000009', 'App\\Database\\Migrations\\CreateSettingTable', 'default', 'App', 1733329591, 3),
(14, '2024-12-03-000010', 'App\\Database\\Migrations\\CreateAuthGroupsUsersTable', 'default', 'App', 1733329591, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `racks`
--

CREATE TABLE `racks` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(8) NOT NULL,
  `floor` varchar(16) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `racks`
--

INSERT INTO `racks` (`id`, `name`, `floor`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1A', '1', '2024-12-02 08:28:54', '2024-12-02 08:28:54', NULL),
(2, '1B', '1', '2024-12-02 10:36:54', '2024-12-02 10:36:54', NULL),
(3, '1C', '1', '2024-12-02 10:40:00', '2024-12-02 10:40:00', NULL),
(4, '1E', '1', '2024-12-04 15:13:36', '2024-12-04 15:13:47', '2024-12-04 15:13:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int NOT NULL,
  `logo` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `maps` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamattext` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `logo`, `nama`, `maps`, `alamattext`) VALUES
(1, 'Cakrawala_logo.svg', 'Cakrawala', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.6670313867517!2d110.43564185500144!3d-7.048356956136295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c0230b5b061%3A0xfef333e5f3860212!2sLibrary%20and%20UNDIP%20Press!5e0!3m2!1sen!2sid!4v1732886727427!5m2!1sen!2sid', 'Komplek Gedung Widya Puraya Jl. Prof. Soedarto No.13, Tembalang, Kec. Tembalang, Kota Semarang, Jawa Tengah 50275');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin', NULL, NULL, 1, '2024-12-04 23:32:05', '2024-12-02 14:07:47', '2024-12-02 14:07:48', NULL),
(2, 'admin', NULL, NULL, 1, '2024-12-03 09:10:41', '2024-12-02 19:44:36', '2024-12-03 09:10:15', NULL),
(3, 'acehtime', NULL, NULL, 1, NULL, '2024-12-04 18:08:05', '2024-12-04 18:08:05', NULL),
(4, 'Ajirtysd', NULL, NULL, 1, '2024-12-04 22:26:08', '2024-12-04 22:18:28', '2024-12-04 22:19:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `books_rack_id_foreign` (`rack_id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `book_stock`
--
ALTER TABLE `book_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_stock_book_id_foreign` (`book_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fines_loan_id_foreign` (`loan_id`);

--
-- Indeks untuk tabel `fines_per_day`
--
ALTER TABLE `fines_per_day`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD KEY `loans_book_id_foreign` (`book_id`),
  ADD KEY `loans_member_id_foreign` (`member_id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `book_stock`
--
ALTER TABLE `book_stock`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `fines`
--
ALTER TABLE `fines`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `fines_per_day`
--
ALTER TABLE `fines_per_day`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `racks`
--
ALTER TABLE `racks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `books_rack_id_foreign` FOREIGN KEY (`rack_id`) REFERENCES `racks` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `book_stock`
--
ALTER TABLE `book_stock`
  ADD CONSTRAINT `book_stock_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `loans_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
