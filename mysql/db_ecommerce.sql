-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 01:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagebanner` varchar(255) NOT NULL,
  `type` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `imagebanner`, `type`, `created_at`, `updated_at`) VALUES
(1, 'fs.jpg', 'banner', '2022-12-08 01:23:38', NULL),
(2, 'fs.jpg', 'banner', '2022-12-08 01:23:54', NULL),
(3, 'fs.jpg', 'banner', '2022-12-08 01:23:49', NULL),
(4, 'fs.jpg', 'banner', '2022-12-08 01:23:45', NULL),
(5, 'fs.jpg', 'flashsale', NULL, NULL),
(6, 'fs.jpg', 'flashsale', NULL, NULL),
(9, '1670558513_bglaut.jpg', 'banner', '2022-12-08 21:01:53', '2022-12-08 21:01:53'),
(10, '1670558530_langit.jpg', 'flashsale', '2022-12-08 21:02:10', '2022-12-08 21:02:10'),
(11, '1670662887_bglaut.jpg', 'flashsale', '2022-12-10 02:01:27', '2022-12-10 02:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id_kategori`, `icon`, `judul`, `created_at`, `updated_at`) VALUES
(2, 'sale.jpg', 'Elektronik', '2022-12-08 01:42:23', NULL),
(3, 'sale.jpg', 'Pakaian', '2022-12-08 01:42:23', NULL),
(4, 'sale.jpg', 'Aksesoris', '2022-12-08 01:42:23', NULL),
(5, 'sale.jpg', 'Kesehatan', '2022-12-08 01:42:23', NULL),
(6, 'sale.jpg', 'Olahraga', '2022-12-08 01:42:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id_keranjang` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `harga` varchar(250) DEFAULT NULL,
  `bukti_pembayaran` varchar(250) DEFAULT NULL,
  `nama_pemesan` varchar(250) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `alasan` varchar(500) DEFAULT NULL,
  `penilaian` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_08_011931_create_banners_table', 2),
(6, '2022_12_08_013721_create_kategoris_table', 3),
(7, '2022_12_08_055335_create_products_table', 4),
(8, '2022_12_09_025202_create_keranjangs_table', 5),
(9, '2022_12_09_090243_create_pembayarans_table', 6),
(10, '2022_12_09_092348_create_tentangs_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `atasnama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `jenis`, `nomor`, `atasnama`, `created_at`, `updated_at`) VALUES
(2, 'BRI', '92991099', 'AMKAK', '2022-12-09 03:50:30', '2022-12-09 03:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `featured_image` varchar(250) NOT NULL,
  `nama_produk` mediumtext NOT NULL,
  `harga` varchar(255) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `spesifikasi` mediumtext NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `terjual` int(11) DEFAULT NULL,
  `suka` bigint(20) DEFAULT NULL,
  `tidaksuka` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_produk`, `id_kategori`, `featured_image`, `nama_produk`, `harga`, `diskon`, `spesifikasi`, `deskripsi`, `kuantitas`, `terjual`, `suka`, `tidaksuka`, `created_at`, `updated_at`) VALUES
(1, 5, 'sale.jpg', 'COD SEMI PARKA Canvas Tr/JAKET PRIA/JAKET CANVAS', '120000', 50, 'Motif: Polos <br />\r\nUkuran Jumbo : Ya <br />\r\nNegara Asal : Indonesia <br />\r\nPanjang Luaran : Panjang <br />\r\nTipe Jaket : Lainnya <br />\r\nGaya : Casual <br />\r\nBahan : Kanvas TR <br />\r\nPanjang Lengan : full <br />\r\nModel Kancing : Snap Button <br />\r\n', 'Jaket ini cocok untuk acara formal / resmi , karna design nya mirip seperti kemeja akan terlihat rapih bila kancing dipasang dan akan terlihat keren bila kancing di lepas, \r\ndan cocok untuk komunitas ataupun organisasi lainnya\r\nbahan tebal, tidak panas da', 3382, 1, 2, 5, NULL, '2022-12-09 04:29:15'),
(3, 6, 'sale.jpg', 'COD SEMI PARKA Canvas Tr/JAKET PRIA/JAKET CANVAS', '120000', 73, 'Motif: Polos <br />\r\nUkuran Jumbo : Ya <br />\r\nNegara Asal : Indonesia <br />\r\nPanjang Luaran : Panjang <br />\r\nTipe Jaket : Lainnya <br />\r\nGaya : Casual <br />\r\nBahan : Kanvas TR <br />\r\nPanjang Lengan : full <br />\r\nModel Kancing : Snap Button <br />\r\nStok Diskon : 3383 <br />\r\nStok Lain : 67581 <br />\r\nDikirim Dari : KAB. BANDUNG - KUTAWARINGIN, JAWA BARAT, ID <br />', 'Jaket ini cocok untuk acara formal / resmi , karna design nya mirip seperti kemeja akan terlihat rapih bila kancing dipasang dan akan terlihat keren bila kancing di lepas, \r\ndan cocok untuk komunitas ataupun organisasi lainnya\r\nbahan tebal, tidak panas dan kancing berwarna hitam', 3380, 3, 1, 0, NULL, '2022-12-14 23:34:31'),
(4, 4, 'sale.jpg', 'ACOD SEMI PARKA Canvas Tr/JAKET PRIA/JAKET CANVAS', '100000', 73, 'Motif: Polos <br />\r\nUkuran Jumbo : Ya <br />\r\nNegara Asal : Indonesia <br />\r\nPanjang Luaran : Panjang <br />\r\nTipe Jaket : Lainnya <br />\r\nGaya : Casual <br />\r\nBahan : Kanvas TR <br />\r\nPanjang Lengan : full <br />\r\nModel Kancing : Snap Button <br />\r\nStok Diskon : 3383 <br />\r\nStok Lain : 67581 <br />\r\nDikirim Dari : KAB. BANDUNG - KUTAWARINGIN, JAWA BARAT, ID <br />', 'Jaket ini cocok untuk acara formal / resmi , karna design nya mirip seperti kemeja akan terlihat rapih bila kancing dipasang dan akan terlihat keren bila kancing di lepas, \r\ndan cocok untuk komunitas ataupun organisasi lainnya\r\nbahan tebal, tidak panas dan kancing berwarna hitam', 3383, 10, 3, 0, NULL, NULL),
(5, 3, 'sale.jpg', 'ZCOD SEMI PARKA Canvas Tr/JAKET PRIA/JAKET CANVAS', '120000', 73, 'Motif: Polos <br />\r\nUkuran Jumbo : Ya <br />\r\nNegara Asal : Indonesia <br />\r\nPanjang Luaran : Panjang <br />\r\nTipe Jaket : Lainnya <br />\r\nGaya : Casual <br />\r\nBahan : Kanvas TR <br />\r\nPanjang Lengan : full <br />\r\nModel Kancing : Snap Button <br />\r\nStok Diskon : 3383 <br />\r\nStok Lain : 67581 <br />\r\nDikirim Dari : KAB. BANDUNG - KUTAWARINGIN, JAWA BARAT, ID <br />', 'Jaket ini cocok untuk acara formal / resmi , karna design nya mirip seperti kemeja akan terlihat rapih bila kancing dipasang dan akan terlihat keren bila kancing di lepas, \r\ndan cocok untuk komunitas ataupun organisasi lainnya\r\nbahan tebal, tidak panas dan kancing berwarna hitam', 3383, 0, 0, 0, NULL, NULL),
(6, 2, 'sale.jpg', 'DCOD SEMI PARKA Canvas Tr/JAKET PRIA/JAKET CANVAS', '120000', 73, 'Motif: Polos <br />\r\nUkuran Jumbo : Ya <br />\r\nNegara Asal : Indonesia <br />\r\nPanjang Luaran : Panjang <br />\r\nTipe Jaket : Lainnya <br />\r\nGaya : Casual <br />\r\nBahan : Kanvas TR <br />\r\nPanjang Lengan : full <br />\r\nModel Kancing : Snap Button <br />\r\nStok Diskon : 3383 <br />\r\nStok Lain : 67581 <br />\r\nDikirim Dari : KAB. BANDUNG - KUTAWARINGIN, JAWA BARAT, ID <br />', 'Jaket ini cocok untuk acara formal / resmi , karna design nya mirip seperti kemeja akan terlihat rapih bila kancing dipasang dan akan terlihat keren bila kancing di lepas, \r\ndan cocok untuk komunitas ataupun organisasi lainnya\r\nbahan tebal, tidak panas dan kancing berwarna hitam', 3383, 0, 0, 0, NULL, NULL),
(8, 6, 'sale.jpg', 'COD SEMI PARKA Canvas Tr/JAKET PRIA/JAKET CANVAS', '120000', 50, 'Motif: Polos <br />\r\nUkuran Jumbo : Ya <br />\r\nNegara Asal : Indonesia <br />\r\nPanjang Luaran : Panjang <br />\r\nTipe Jaket : Lainnya <br />\r\nGaya : Casual <br />\r\nBahan : Kanvas TR <br />\r\nPanjang Lengan : full <br />\r\nModel Kancing : Snap Button <br />\r\nStok Diskon : 3383 <br />\r\nStok Lain : 67581 <br />\r\nDikirim Dari : KAB. BANDUNG - KUTAWARINGIN, JAWA BARAT, ID <br />', 'Jaket ini cocok untuk acara formal / resmi , karna design nya mirip seperti kemeja akan terlihat rapih bila kancing dipasang dan akan terlihat keren bila kancing di lepas, \r\ndan cocok untuk komunitas ataupun organisasi lainnya\r\nbahan tebal, tidak panas dan kancing berwarna hitam', 3383, 0, 0, 0, NULL, NULL),
(9, 4, 'sale.jpg', 'KCOD SEMI PARKA Canvas Tr/JAKET PRIA/JAKET CANVAS', '120000', 73, '<p>Motif: Polos<br />\r\nUkuran Jumbo : Ya<br />\r\nNegara Asal : Indonesia<br />\r\nPanjang Luaran : Panjang<br />\r\nTipe Jaket : Lainnya<br />\r\nGaya : Casual<br />\r\nBahan : Kanvas TR<br />\r\nPanjang Lengan : full<br />\r\nModel Kancing : Snap Button<br />\r\nStok Diskon : 3383<br />\r\nStok Lain : 67581<br />\r\nDikirim Dari : KAB. BANDUNG - KUTAWARINGIN, JAWA BARAT, ID</p>', '<p>Jaket ini cocok untuk acara formal / resmi , karna design nya mirip seperti kemeja akan terlihat rapih bila kancing dipasang dan akan terlihat keren bila kancing di lepas, dan cocok untuk komunitas ataupun organisasi lainnya bahan tebal, tidak panas dan kancing berwarna hitam</p>', 3383, 0, 0, 0, NULL, '2022-12-09 03:41:26'),
(10, 5, '1670582831_bglaut.jpg', 'DOC SEMI PARKA Canvas Tr/JAKET PRIA/JAKET CANVAS', '120000', 73, '<p>Motif: Polos<br />\r\nUkuran Jumbo : Ya<br />\r\nNegara Asal : Indonesia<br />\r\nPanjang Luaran : Panjang<br />\r\nTipe Jaket : Lainnya<br />\r\nGaya : Casual<br />\r\nBahan : Kanvas TR<br />\r\nPanjang Lengan : full<br />\r\nModel Kancing : Snap Button<br />\r\nStok Diskon : 3383<br />\r\nStok Lain : 67581<br />\r\nDikirim Dari : KAB. BANDUNG - KUTAWARINGIN, JAWA BARAT, ID</p>', '<p>Jaket ini cocok untuk acara formal / resmi , karna design nya mirip seperti kemeja akan terlihat rapih bila kancing dipasang dan akan terlihat keren bila kancing di lepas, dan cocok untuk komunitas ataupun organisasi lainnya bahan tebal, tidak panas dan kancing berwarna hitam</p>', 3382, 1, 0, 0, NULL, '2022-12-09 03:58:40'),
(13, 3, '1670616722_langit.jpg', 'No Name', '213000', NULL, '<ol>\r\n	<li>ajajaj</li>\r\n	<li>ada</li>\r\n	<li>kab</li>\r\n</ol>', '<ul>\r\n	<li>ie</li>\r\n	<li>oke</li>\r\n</ul>', 3381, 2, 1, NULL, '2022-12-09 13:12:02', '2022-12-10 01:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `tentangs`
--

CREATE TABLE `tentangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(225) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tentangs`
--

INSERT INTO `tentangs` (`id`, `logo`, `nama`, `whatsapp`, `facebook`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, '1670659801_bglaut.jpg', 'Halo Guys', '6282275713049', NULL, NULL, NULL, NULL, '2022-12-10 01:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `handphone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `is_admin` int(11) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `status_user` varchar(250) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `handphone`, `password`, `image`, `is_admin`, `alamat`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(18, 'Admin', 'admin03', 'admin@gmail.com', '981671', '$2y$10$M8o9gtVl.pXW0jEEiTXSOe16Lmkb/wJbMuIBRPx6A3U7U8N8ZO65C', '1670663265_langit.jpg', 0, NULL, 'Bronze', NULL, '2022-12-10 01:43:56', '2022-12-10 02:07:45'),
(19, 'Zero', 'zero03', 'zero@gmail.com', '0822716719', '$2y$10$TQiVVihEQ7ZQOTqybgT.jOhlsGY6DXDpFjVxdCIJl5veC6xScx4nu', '1671082378_images (1) (2).jpeg', 1, 'Manambin', 'Gold', NULL, '2022-12-14 22:17:48', '2022-12-14 23:39:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id_keranjang`);

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
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tentangs`
--
ALTER TABLE `tentangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_handphone_unique` (`handphone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id_keranjang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tentangs`
--
ALTER TABLE `tentangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
