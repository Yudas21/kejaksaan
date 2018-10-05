-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 02:16 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eoffice_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `id_level` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id`, `id_menu`, `id_level`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_bagian` varchar(100) NOT NULL,
  `parent` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(70) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_level` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', NULL, NULL, NULL),
(2, 'Admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `no_urut` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `icon`, `url`, `parent`, `no_urut`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dashboard', 'fa fa-home', 'admin/dashboard', 0, 1, NULL, NULL, NULL),
(2, 'Administrasi', 'fa fa-sitemap', NULL, 0, 1, NULL, '2018-10-04 23:04:51', NULL),
(3, 'Surat Masuk', 'fa fa-clipboard', NULL, 0, 1, NULL, '2018-10-04 23:07:30', NULL),
(4, 'Surat Keluar', 'fa fa-paper-plane-o', NULL, 0, 1, NULL, '2018-10-04 23:08:15', NULL),
(5, 'Laporan', 'fa fa-folder-o', NULL, 0, 1, NULL, '2018-10-04 23:08:55', NULL),
(6, 'Monitoring', 'fa fa-computer', NULL, 0, 1, NULL, '2018-10-04 23:17:42', NULL),
(7, 'Supporting', 'fa fa-help', NULL, 0, 1, NULL, '2018-10-04 23:18:23', NULL),
(8, 'Jenis Surat', NULL, 'jenis_surat', 2, NULL, '2018-10-04 23:30:21', '2018-10-04 23:33:29', NULL),
(9, 'Klasifikasi Surat', NULL, 'klasifikasi_surat', 2, NULL, '2018-10-04 23:32:41', '2018-10-04 23:32:41', NULL),
(10, 'Sifat Surat', NULL, 'sifat_surat', 2, NULL, '2018-10-04 23:34:55', '2018-10-04 23:34:55', NULL),
(11, 'Penomoran Surat', NULL, 'penomoran_surat', 2, NULL, '2018-10-04 23:36:57', '2018-10-04 23:54:46', NULL),
(12, 'User Management', NULL, NULL, 2, NULL, '2018-10-04 23:40:39', '2018-10-04 23:55:29', NULL),
(13, 'Menu', NULL, 'menu', 12, NULL, '2018-10-04 23:41:18', '2018-10-04 23:56:14', NULL),
(14, 'Level', NULL, 'level', 12, NULL, '2018-10-04 23:42:21', '2018-10-04 23:56:45', NULL),
(15, 'Bagian', NULL, 'bagian', 12, NULL, '2018-10-04 23:42:39', '2018-10-04 23:57:15', NULL),
(16, 'Jabatan', NULL, 'jabatan', 12, NULL, '2018-10-04 23:43:28', '2018-10-04 23:57:46', NULL),
(17, 'User', NULL, 'user', 12, NULL, '2018-10-04 23:58:13', '2018-10-04 23:58:13', NULL),
(18, 'Scanning Surat', NULL, 'surat_masuk/scanning', 3, NULL, '2018-10-04 23:59:15', '2018-10-04 23:59:15', NULL),
(19, 'Agenda Surat', NULL, 'surat_masuk/agenda', 3, NULL, '2018-10-05 00:00:48', '2018-10-05 00:01:56', NULL),
(20, 'Pendistribusian Surat', NULL, 'surat_masuk/distribusi', 3, NULL, '2018-10-05 00:01:34', '2018-10-05 00:01:34', NULL),
(21, 'Disposisi Surat', NULL, 'surat_masuk/disposisi', 3, NULL, '2018-10-05 00:02:54', '2018-10-05 00:02:54', NULL),
(22, 'Memo', NULL, 'surat_masuk/memo', 3, NULL, '2018-10-05 00:03:56', '2018-10-05 00:03:56', NULL),
(23, 'Tracking Surat', NULL, 'surat_masuk/tracking', 3, NULL, '2018-10-05 00:05:26', '2018-10-05 00:05:26', NULL),
(24, 'Agenda Surat', NULL, 'surat_keluar/agenda', 4, NULL, '2018-10-05 00:07:47', '2018-10-05 00:07:47', NULL),
(25, 'Pendistribusian Surat', NULL, 'surat_keluar/distribusi', 4, NULL, '2018-10-05 00:08:25', '2018-10-05 00:08:25', NULL),
(26, 'Rekapitulasi Surat Masuk', NULL, 'laporan/surat_masuk', 5, NULL, '2018-10-05 00:09:53', '2018-10-05 00:09:53', NULL),
(27, 'Rekapitulasi Surat Keluar', NULL, 'laporan/surat_keluar', 5, NULL, '2018-10-05 00:10:22', '2018-10-05 00:10:22', NULL),
(28, 'Email', NULL, 'supporting/email', 7, NULL, '2018-10-05 00:13:22', '2018-10-05 00:13:22', NULL),
(29, 'Kalender', NULL, 'supporting/kalender', 7, NULL, '2018-10-05 00:14:25', '2018-10-05 00:14:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handphone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_level` int(5) DEFAULT NULL,
  `id_jabatan` int(5) DEFAULT NULL,
  `id_bagian` int(5) DEFAULT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `email`, `password`, `tempat_lahir`, `tgl_lahir`, `alamat`, `handphone`, `id_level`, `id_jabatan`, `id_bagian`, `photo`, `aktif`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'spadmin', 'baim.moh@gmail.com', '$2y$10$7NFskwPSYS.3KDdtLZs1N.xWkcpZ27adcXqZ6bvcei3ljaFgGF56e', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '1', 'zZnZU7pkyx6pYnu1qsVxYv7Vlzvrucw9y9cRNnlIj4V3myuMx4911Pa9YYkT', '2018-10-04 02:59:54', '2018-10-04 02:59:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
