-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 08:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokoq`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Minuman', '2021-10-26 19:18:56', '2021-11-08 09:32:58'),
(2, 'Jajanan & Makanan Ringan', '2021-10-26 19:35:02', '2021-11-08 09:48:35'),
(3, 'Sembako', '2021-10-26 19:35:26', '2021-10-26 19:35:26'),
(6, 'Obat-obatan', '2021-10-28 01:16:46', '2021-10-28 01:16:46'),
(7, 'Bumbu dan Mie instan', '2021-11-08 09:49:07', '2021-11-08 09:49:07'),
(8, 'Peralatan Mandi dan Cuci', '2021-11-08 09:49:28', '2021-11-08 09:49:28'),
(9, 'Alat Tulis', '2021-11-08 09:49:43', '2021-11-08 09:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` bigint(20) UNSIGNED NOT NULL,
  `kode_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `kode_member`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(13, '000002', 'rizki fadillah akbar', 'Depok', '7788778877', '2021-10-27 07:59:16', '2021-10-27 07:59:16'),
(15, '000003', 'Bodrex', 'jl.kenangan', '1122334455', '2021-10-27 15:08:13', '2021-10-27 15:08:13'),
(16, '000004', 'rizki fadillah', 'Depok', '7788778877', '2021-10-27 15:09:01', '2021-10-27 15:09:01'),
(17, '000005', 'Londry Yuk!!!', 'Depok', '7788778877', '2021-10-27 15:50:01', '2021-10-27 15:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_10_25_075538_add_coloum_to_users_table', 1),
(7, '2021_10_25_083653_create_category_table', 1),
(8, '2021_10_25_083948_create_product_table', 1),
(9, '2021_10_25_090525_create_member_table', 1),
(10, '2021_10_25_090843_create_supplier_table', 1),
(11, '2021_10_25_091145_create_pembelian_table', 1),
(12, '2021_10_25_091442_create_pembelian_detail_table', 1),
(13, '2021_10_25_091527_create_penjualan_table', 1),
(14, '2021_10_25_091628_create_penjualan_detail_table', 1),
(15, '2021_10_25_091710_create_setting_table', 1),
(16, '2021_10_25_093324_create_pengeluaran_table', 1),
(17, '2021_10_25_121801_create_sessions_table', 1),
(18, '2021_10_26_154252_add_foreign_key_to_product_table', 1),
(19, '2021_10_26_233727_add_column_kode_to_product_table', 1),
(20, '2021_11_01_074225_add_diskon_to_setting_table', 2),
(21, '2021_11_01_194959_edit_id_member_to_penjualan_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` bigint(20) UNSIGNED NOT NULL,
  `id_supplier` bigint(20) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` tinyint(4) NOT NULL DEFAULT 0,
  `bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_supplier`, `total_item`, `total_harga`, `diskon`, `bayar`, `created_at`, `updated_at`) VALUES
(15, 4, 1000, 6794000, 0, 0, '2021-10-30 00:35:11', '2021-10-30 00:43:16'),
(19, 4, 5, 6170, 0, 6170, '2021-10-30 01:20:41', '2021-10-30 01:23:27'),
(21, 4, 315, 495210, 10, 440737, '2021-10-30 02:11:03', '2021-10-30 02:18:06'),
(23, 5, 300, 363400, 10, 327060, '2021-10-31 22:43:24', '2021-10-31 22:45:17'),
(24, 5, 1000, 6794000, 5, 6454300, '2021-11-01 02:26:23', '2021-11-01 02:28:43'),
(25, 5, 450, 3333500, 5, 3166825, '2021-11-01 10:05:54', '2021-11-01 10:10:04'),
(26, 4, 0, 0, 0, 0, '2021-11-01 10:16:46', '2021-11-01 10:16:46'),
(27, 5, 0, 0, 0, 0, '2021-11-01 10:27:54', '2021-11-01 10:27:54'),
(29, 5, 300, 370200, 3, 366498, '2021-11-03 07:52:42', '2021-11-03 08:03:48'),
(30, 4, 0, 0, 0, 0, '2021-11-03 08:57:19', '2021-11-03 08:57:19'),
(31, 4, 1000, 12345000, 5, 11727750, '2021-11-03 14:33:02', '2021-11-03 14:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_pembelian_detail` bigint(20) UNSIGNED NOT NULL,
  `id_pembelian` bigint(20) NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id_pembelian_detail`, `id_pembelian`, `id_produk`, `harga_beli`, `jumlah`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 8, 16, 1234, 1, 1234, '2021-10-29 01:15:50', '2021-10-29 01:15:50'),
(2, 10, 21, 1234, 1, 1234, '2021-10-29 02:18:54', '2021-10-29 02:18:54'),
(3, 10, 21, 1234, 1, 1234, '2021-10-29 02:20:53', '2021-10-29 02:20:53'),
(6, 11, 17, 1234, 100, 123400, '2021-10-29 04:31:50', '2021-10-29 07:43:54'),
(11, 12, 17, 1234, 10, 12340, '2021-10-29 17:25:28', '2021-10-29 20:33:29'),
(14, 12, 19, 12354, 2, 24708, '2021-10-29 18:16:01', '2021-10-29 18:29:21'),
(15, 12, 19, 12354, 7, 86478, '2021-10-29 19:11:13', '2021-10-29 19:13:29'),
(16, 13, 17, 1234, 500, 617000, '2021-10-29 23:19:12', '2021-10-30 00:04:41'),
(17, 13, 19, 12354, 500, 6177000, '2021-10-29 23:19:24', '2021-10-30 00:04:46'),
(18, 15, 17, 1234, 500, 617000, '2021-10-30 00:35:36', '2021-10-30 00:35:54'),
(19, 15, 19, 12354, 500, 6177000, '2021-10-30 00:35:40', '2021-10-30 00:36:48'),
(20, 16, 16, 1234, 100, 123400, '2021-10-30 00:45:51', '2021-10-30 00:46:16'),
(22, 16, 24, 12345, 20, 246900, '2021-10-30 00:46:48', '2021-10-30 00:47:09'),
(23, 17, 17, 1234, 1, 1234, '2021-10-30 00:58:58', '2021-10-30 00:58:58'),
(24, 17, 16, 1234, 5, 6170, '2021-10-30 00:59:11', '2021-10-30 01:07:16'),
(25, 19, 17, 1234, 5, 6170, '2021-10-30 01:21:53', '2021-10-30 01:22:52'),
(26, 20, 24, 12345, 10, 123450, '2021-10-30 01:24:51', '2021-10-30 01:25:16'),
(27, 20, 16, 1234, 100, 123400, '2021-10-30 01:25:00', '2021-10-30 01:25:35'),
(28, 20, 19, 12354, 100, 1235400, '2021-10-30 01:25:09', '2021-10-30 01:25:48'),
(29, 21, 17, 1234, 115, 141910, '2021-10-30 02:11:23', '2021-10-30 02:17:08'),
(30, 21, 23, 321, 100, 32100, '2021-10-30 02:11:28', '2021-10-30 02:16:27'),
(31, 21, 22, 3212, 100, 321200, '2021-10-30 02:11:33', '2021-10-30 02:16:39'),
(32, 23, 16, 1234, 100, 123400, '2021-10-31 22:43:42', '2021-10-31 22:43:56'),
(33, 23, 25, 1200, 200, 240000, '2021-10-31 22:44:09', '2021-10-31 22:44:54'),
(34, 24, 19, 12354, 500, 6177000, '2021-11-01 02:27:47', '2021-11-01 02:28:09'),
(35, 24, 16, 1234, 500, 617000, '2021-11-01 02:27:57', '2021-11-01 02:28:23'),
(36, 25, 24, 12345, 200, 2469000, '2021-11-01 10:06:12', '2021-11-01 10:06:37'),
(37, 25, 16, 1234, 200, 246800, '2021-11-01 10:06:18', '2021-11-01 10:06:45'),
(38, 25, 19, 12354, 50, 617700, '2021-11-01 10:06:25', '2021-11-01 10:06:48'),
(39, 26, 16, 1234, 1, 1234, '2021-11-01 10:17:03', '2021-11-01 10:17:03'),
(40, 29, 17, 1234, 300, 370200, '2021-11-03 07:53:00', '2021-11-03 07:53:13'),
(41, 31, 24, 12345, 1000, 12345000, '2021-11-03 14:33:14', '2021-11-03 14:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `deskripsi`, `nominal`, `created_at`, `updated_at`) VALUES
(1, 'Beli Meja Kasir', 1800000, '2021-10-28 06:44:58', '2021-10-28 06:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` bigint(20) UNSIGNED NOT NULL,
  `id_member` bigint(20) DEFAULT NULL,
  `total_item` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` tinyint(4) NOT NULL DEFAULT 0,
  `bayar` int(11) NOT NULL DEFAULT 0,
  `diterima` int(11) NOT NULL DEFAULT 0,
  `id_user` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_member`, `total_item`, `total_harga`, `diskon`, `bayar`, `diterima`, `id_user`, `created_at`, `updated_at`) VALUES
(2, NULL, 0, 0, 0, 0, 0, 1, '2021-11-02 03:41:21', '2021-11-02 03:41:21'),
(3, NULL, 0, 0, 0, 0, 0, 1, '2021-11-02 04:21:14', '2021-11-02 04:21:14'),
(4, NULL, 0, 0, 0, 0, 0, 1, '2021-11-02 04:47:11', '2021-11-02 04:47:11'),
(6, 16, 3, 36904, 5, 35059, 40000, 1, '2021-11-03 14:09:04', '2021-11-03 14:19:51'),
(7, 15, 300, 4603500, 5, 4373325, 5000000, 1, '2021-11-03 14:35:51', '2021-11-03 14:40:38'),
(9, 16, 100, 2134500, 5, 2027775, 2200000, 1, '2021-11-04 03:55:29', '2021-11-04 04:36:09'),
(10, 16, 10, 213450, 5, 202778, 220000, 1, '2021-11-04 05:53:09', '2021-11-04 06:25:36'),
(11, 15, 8, 49337, 5, 46870, 50000, 1, '2021-11-04 10:41:26', '2021-11-04 10:43:13'),
(12, 13, 6, 73808, 5, 70118, 75000, 1, '2021-11-04 13:02:37', '2021-11-04 13:04:34'),
(13, NULL, 0, 0, 0, 0, 0, 1, '2021-11-06 08:38:18', '2021-11-06 08:38:18'),
(14, NULL, 0, 0, 0, 0, 0, 5, '2021-11-07 10:25:05', '2021-11-07 10:25:05'),
(15, NULL, 0, 0, 0, 0, 0, 1, '2021-11-07 11:15:09', '2021-11-07 11:15:09'),
(16, NULL, 3, 45904, 0, 45904, 46000, 5, '2021-11-07 11:22:07', '2021-11-07 11:24:49'),
(17, NULL, 0, 0, 0, 0, 0, 1, '2021-11-07 11:23:35', '2021-11-07 11:23:35'),
(18, NULL, 42, 153250, 0, 153250, 155000, 5, '2021-11-07 11:38:24', '2021-11-07 11:40:32'),
(19, 16, 5, 106725, 10, 96053, 100000, 5, '2021-11-08 06:14:27', '2021-11-08 06:17:35'),
(20, 13, 5, 106725, 10, 96053, 100000, 5, '2021-11-08 06:18:55', '2021-11-08 06:21:32'),
(21, NULL, 100, 2134500, 0, 2134500, 2200000, 5, '2021-11-08 07:15:19', '2021-11-08 07:16:41'),
(22, NULL, 0, 0, 0, 0, 0, 1, '2021-11-08 07:58:42', '2021-11-08 07:58:42'),
(23, NULL, 20, 30000, 0, 30000, 30000, 1, '2021-11-08 08:01:16', '2021-11-08 08:09:28'),
(24, NULL, 0, 0, 0, 0, 0, 5, '2021-11-08 08:04:24', '2021-11-08 08:04:24'),
(25, NULL, 0, 0, 0, 0, 0, 5, '2021-11-08 08:04:47', '2021-11-08 08:04:47'),
(26, NULL, 1, 12345, 0, 12345, 15000, 1, '2021-11-08 08:10:52', '2021-11-08 08:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` bigint(20) UNSIGNED NOT NULL,
  `id_penjualan` bigint(20) NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` tinyint(4) NOT NULL DEFAULT 0,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `id_penjualan`, `id_product`, `harga_jual`, `jumlah`, `diskon`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 4, 25, 1500, 1, 0, 1500, '2021-11-02 05:01:39', '2021-11-02 05:01:39'),
(7, 6, 24, 21345, 1, 0, 21345, '2021-11-03 14:13:45', '2021-11-03 14:13:45'),
(8, 6, 19, 12345, 1, 0, 12345, '2021-11-03 14:14:01', '2021-11-03 14:14:01'),
(9, 6, 16, 3214, 1, 0, 3214, '2021-11-03 14:14:21', '2021-11-03 14:14:21'),
(10, 7, 19, 12345, 200, 0, 2469000, '2021-11-03 14:36:21', '2021-11-03 14:36:44'),
(11, 7, 24, 21345, 100, 0, 2134500, '2021-11-03 14:36:54', '2021-11-03 14:40:18'),
(14, 9, 24, 21345, 100, 0, 2134500, '2021-11-04 04:34:53', '2021-11-04 04:35:09'),
(15, 10, 24, 21345, 10, 0, 213450, '2021-11-04 06:24:20', '2021-11-04 06:24:28'),
(16, 11, 24, 21345, 1, 0, 21345, '2021-11-04 10:41:45', '2021-11-04 10:41:45'),
(17, 11, 17, 2134, 1, 0, 2134, '2021-11-04 10:41:48', '2021-11-04 10:41:48'),
(18, 11, 16, 3214, 1, 0, 3214, '2021-11-04 10:41:52', '2021-11-04 10:41:52'),
(19, 11, 25, 1500, 1, 0, 1500, '2021-11-04 10:41:58', '2021-11-04 10:41:58'),
(20, 11, 21, 2134, 1, 0, 2134, '2021-11-04 10:42:01', '2021-11-04 10:42:01'),
(21, 11, 19, 12345, 1, 0, 12345, '2021-11-04 10:42:05', '2021-11-04 10:42:05'),
(22, 11, 23, 2344, 1, 0, 2344, '2021-11-04 10:42:08', '2021-11-04 10:42:08'),
(23, 11, 22, 4321, 1, 0, 4321, '2021-11-04 10:42:14', '2021-11-04 10:42:14'),
(24, 12, 24, 21345, 2, 0, 42690, '2021-11-04 13:03:07', '2021-11-04 13:03:30'),
(25, 12, 16, 3214, 2, 0, 6428, '2021-11-04 13:03:12', '2021-11-04 13:03:47'),
(26, 12, 19, 12345, 2, 0, 24690, '2021-11-04 13:03:19', '2021-11-04 13:03:42'),
(27, 16, 24, 21345, 2, 0, 42690, '2021-11-07 11:24:02', '2021-11-07 11:24:10'),
(28, 16, 16, 3214, 1, 0, 3214, '2021-11-07 11:24:14', '2021-11-07 11:24:14'),
(29, 18, 19, 12345, 2, 0, 24690, '2021-11-07 11:39:06', '2021-11-07 11:39:12'),
(30, 18, 16, 3214, 40, 0, 128560, '2021-11-07 11:39:46', '2021-11-07 11:39:59'),
(31, 19, 24, 21345, 5, 0, 106725, '2021-11-08 06:15:11', '2021-11-08 06:15:22'),
(32, 20, 24, 21345, 5, 0, 106725, '2021-11-08 06:20:18', '2021-11-08 06:20:36'),
(33, 21, 24, 21345, 100, 0, 2134500, '2021-11-08 07:15:46', '2021-11-08 07:16:00'),
(34, 23, 25, 1500, 20, 0, 30000, '2021-11-08 08:08:31', '2021-11-08 08:08:54'),
(35, 26, 19, 12345, 1, 0, 12345, '2021-11-08 08:11:19', '2021-11-08 08:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` int(11) NOT NULL,
  `diskon` tinyint(4) NOT NULL DEFAULT 0,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_produk`, `id_kategori`, `nama`, `kode`, `merk`, `harga_beli`, `diskon`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(26, 1, 'Air Aqua Dus', 'P000001', 'Aqua', 18000, 0, 20000, 0, '2021-11-08 09:46:19', '2021-11-08 09:46:19'),
(27, 1, 'Susu Beruang', 'P000027', 'Bear Brand', 7000, 0, 10000, 0, '2021-11-08 09:47:40', '2021-11-08 09:47:40'),
(28, 7, 'Mie Instan Goreng', 'P000028', 'Indomie', 1200, 0, 1500, 0, '2021-11-08 09:54:48', '2021-11-08 09:54:48'),
(29, 1, 'Susu Coklat Kotak Kecil 200ml', 'P000029', 'Milo', 3000, 0, 3500, 0, '2021-11-08 09:55:52', '2021-11-08 09:55:52'),
(30, 8, 'Sabun Mandi', 'P000030', 'Lifeboy', 800, 0, 1000, 0, '2021-11-08 09:56:30', '2021-11-08 09:56:30'),
(31, 8, 'Shampo sachet', 'P000031', 'Sunsilk', 400, 0, 500, 0, '2021-11-08 09:57:35', '2021-11-08 09:57:35'),
(32, 9, 'Pulpen Standart', 'P000032', 'Standart', 1200, 0, 1500, 0, '2021-11-08 09:58:23', '2021-11-08 09:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('fRbiRwd57w7HCY52cZuYeW7Jvm01FjznItQUcsrI', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOUE1bWJhTDM2N3NSdUQxUDc5RlpicFRqeE1uNEhmWEd4N0lZWjF5bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFuc2Frc2kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkU2ZEaFhCMVlzTllQd0diQmZQNEx4LkRqVlFSZlFyWVBuYTFRVXBoY25jNkV6Sm1RWmJDQmUiO3M6MTI6ImlkX3Blbmp1YWxhbiI7aToyNTt9', 1636358728),
('Y74w1khKf6sX91f8IKwQhAh86kSIQuS3ZKQ6tAuW', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36 Edg/95.0.1020.30', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYklRMVUwZnNUVk5hcTVwQ1BpdlRja2lZb2xpMmY2cTl0NU9HY3pBZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODA4MC9tZW1iZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWUFzVFhMZjhtcnljZlVUNi9lUkJlLnJFSHZHRHFNSnMveFAzTFdkMk5oYkxreUxtUzdNemkiO3M6MTI6ImlkX3Blbmp1YWxhbiI7aToyNjt9', 1636365508);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` bigint(20) UNSIGNED NOT NULL,
  `nama_toko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telpon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_nota` tinyint(4) NOT NULL,
  `diskon` smallint(6) NOT NULL,
  `path_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_kartu_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_toko`, `alamat`, `telpon`, `tipe_nota`, `diskon`, `path_logo`, `path_kartu_member`, `created_at`, `updated_at`) VALUES
(1, 'Toko Abah Barokah', 'Jl. Angkrek Situ Sumedang Utara', '087965431234', 2, 10, '/img/logo-2021-11-06195650.png', '/img/kartu-member-2021-11-06195652.jpeg', NULL, '2021-11-07 11:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(6, 'Standard Alfa Tip', 'Jln. Yos sudarso Cikarang Barat', '02177889966', '2021-11-08 09:28:28', '2021-11-08 09:28:28'),
(7, 'Aqua', 'Jl. Cut Mutia Jakarta Pusat', '02177445566', '2021-11-08 09:43:14', '2021-11-08 09:43:14'),
(8, 'Indofood', 'Jl. TB Simatupang Jakarta Selatan', '021444333', '2021-11-08 09:44:12', '2021-11-08 09:44:12'),
(9, 'Mayora', 'Jl. Kalideres Jakarta Barat', '02188776655', '2021-11-08 09:45:00', '2021-11-08 09:45:00'),
(10, 'Dove', 'Jl. Rasuna Said Jakarta Selatan', '02188776644', '2021-11-08 09:50:52', '2021-11-08 09:50:52'),
(11, 'Lifeboy Group', 'Jl. Panjang Jakarta Barat', '02199887766', '2021-11-08 09:51:46', '2021-11-08 09:51:46'),
(12, 'Wings', 'Jl. Abi Manyu Karawang Barat', '02177883452', '2021-11-08 09:52:43', '2021-11-08 09:52:43'),
(13, 'Netsle', 'jl. TB Simatupang Jakarta Selatan', '02133445566', '2021-11-08 09:53:35', '2021-11-08 09:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lavel` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `foto`, `lavel`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin toko', 'Kasirdua@gmail.com', '/img/profil-2021-11-06210940.png', 1, NULL, '$2y$10$YAsTXLf8mrycfUT6/eRBe.rEHvGDqMJs/xP3LWd2NhbLkyLmS7Mzi', NULL, NULL, NULL, NULL, NULL, '2021-10-26 19:13:46', '2021-11-07 09:47:47'),
(4, 'Ade', 'adelondo@gmail.com', '/images/logo.png', 2, NULL, '$2y$10$U6kCNheQsHN4gV/CYr.71Oq41hHrT/wPaU2PQVV6pSxMRJxgkfpt2', NULL, NULL, NULL, NULL, NULL, '2021-11-07 09:47:10', '2021-11-07 09:47:10'),
(5, 'Jaja', 'jaja@gmail.com', '/img/profil-2021-11-07170934.JPG', 2, NULL, '$2y$10$SfDhXB1YsNYPwGbBfP4Lx.DjVQRfQrYPna1QUphcnc6EzJmQZbCBe', NULL, NULL, NULL, NULL, NULL, '2021-11-07 09:49:03', '2021-11-07 10:09:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `category_nama_kategori_unique` (`nama_kategori`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `member_kode_member_unique` (`kode_member`);

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
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `product_nama_unique` (`nama`),
  ADD UNIQUE KEY `product_kode_unique` (`kode`),
  ADD KEY `product_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_pembelian_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_penjualan_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `category` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
