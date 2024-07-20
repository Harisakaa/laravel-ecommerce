-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 06:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `id_pembelian` bigint(20) UNSIGNED NOT NULL,
  `no_bukti` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_pemasok` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`id_pembelian`, `no_bukti`, `tanggal`, `keterangan`, `id_pemasok`) VALUES
(35, 'B-1721153440', '2024-07-17', 'Barang Masuk', 10);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_stok` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(225) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `gambar`, `created_at`, `updated_at`) VALUES
(5, 'Sofa', 'kategori_1718749540.png', '2024-06-18 15:25:40', '2024-06-18 15:25:40'),
(6, 'Lemari', 'kategori_1718749555.png', '2024-06-18 15:25:55', '2024-06-18 15:25:55'),
(7, 'Meja Makan', 'kategori_1718749572.png', '2024-06-18 15:26:12', '2024-06-18 15:26:12'),
(8, 'Meja Kerja', 'kategori_1718749589.png', '2024-06-18 15:26:29', '2024-06-18 15:26:29'),
(9, 'Kursi', 'kategori_1718749606.png', '2024-06-18 15:26:46', '2024-06-18 15:26:46'),
(10, 'Springbed', 'kategori_1718749642.png', '2024-06-18 15:27:22', '2024-06-18 15:27:22');

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
(5, '2024_03_11_151624_create_tbsatuan', 2),
(6, '2024_03_11_151657_create_tbpelanggan', 2),
(7, '2024_03_11_151701_create_tbpemasok', 2),
(8, '2024_03_18_080840_create_tbkategori', 2),
(9, '2024_03_11_151717_create_jual', 3),
(10, '2024_03_11_151720_create_beli', 3),
(11, '2024_03_18_073803_create_tbstok', 4),
(12, '2024_03_11_151727_create_mutasi', 5),
(13, '2023_10_24_182842_table_barang', 6),
(14, '2014_10_12_000000_create_users_table', 7),
(15, '2014_10_12_100000_create_password_reset_tokens_table', 7),
(16, '2019_08_19_000000_create_failed_jobs_table', 7),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 7),
(18, '2024_05_26_113730_create_cart_table', 8),
(19, '2024_06_17_194505_create_tbpelanggan', 9),
(21, '2024_06_25_162054_create_tbalamat', 10),
(22, '2024_06_17_204909_create_tbjual', 11);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_bukti` varchar(225) NOT NULL,
  `masuk_keluar` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` bigint(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `id_stok` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id`, `no_bukti`, `masuk_keluar`, `qty`, `total`, `kode`, `id_stok`, `status`, `created_at`, `updated_at`) VALUES
(87, 'J220240717003147', 'Keluar', 2, 1700000, 'J', 70, 'OK', '2024-07-16 17:31:47', '2024-07-16 17:31:47'),
(92, 'B-1721153440', 'Masuk', 2, 840000, 'B', 66, 'OK', '2024-07-16 18:10:54', '2024-07-16 18:10:54'),
(93, 'B-1721153440', 'Masuk', 2, 400000, 'B', 59, 'OK', '2024-07-16 18:11:17', '2024-07-16 18:11:17'),
(94, 'J220240717011439', 'Keluar', 3, 1050000, 'J', 59, 'OK', '2024-07-16 18:14:39', '2024-07-16 18:14:39'),
(95, 'J220240717011439', 'Keluar', 2, 3100000, 'J', 64, 'OK', '2024-07-16 18:14:39', '2024-07-16 18:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pemasok` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id`, `kode_pemasok`, `nama`, `alamat`, `nohp`) VALUES
(9, 1123, 'PT Sanko Material Indonesia', 'KAWASAN INDUSTRI JABABEKA I , JALAN JABABEKA XVII BLOK U NO 21 J , HARJA MEKAR, Bekasi, Bandung, Indonesia', '082371723138'),
(10, 1124, 'Kings Furniture', 'Jl. Maulana Hasanudin No.108A, Tanah Tinggi, Tangerang, Tangerang, Tangerang, Indonesia', '08923323623'),
(11, 1125, 'PT. Semesta Alam', 'Jl. Tuanku Tambusai No.65, Tengkerang Bar., Kec. Marpoyan Damai, Kota Pekanbaru', '098321871232');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` bigint(20) UNSIGNED NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'unit', NULL, NULL),
(2, 'sets', '2024-07-01 21:55:26', '2024-07-01 21:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbalamat`
--

CREATE TABLE `tbalamat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(200) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbalamat`
--

INSERT INTO `tbalamat` (`id`, `user_id`, `label`, `alamat`, `nohp`, `kode_pos`, `created_at`, `updated_at`) VALUES
(1, 2, 'Rumah', 'PERUM BMP 1 BLOK F 31, Kec. Tenayan Raya, Kota Pekanbaru, Riau', '0896232266816', '2823', '2024-06-25 09:33:30', '2024-07-02 00:41:06'),
(2, 4, 'Rumah', 'Perumahan Jala Utama Tahap 1, Jalan Garuda Sakti Pekanbaru', '087867051220', '28295', '2024-06-25 11:15:54', '2024-06-25 11:23:04'),
(4, 5, 'Rumah', 'Perumahan Jala Utama Tahap 1, Jalan Garuda Sakti Blok 28', '08966632323', '28295', '2024-06-25 14:23:21', '2024-06-25 14:23:21'),
(5, 7, 'Rumah', 'Tes', '0892939213', '28289', '2024-06-29 17:50:00', '2024-06-29 17:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbjual`
--

CREATE TABLE `tbjual` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `no_bukti` varchar(255) NOT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `bukti_pembayaran` varchar(1000) NOT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbjual`
--

INSERT INTO `tbjual` (`id`, `id_pelanggan`, `no_bukti`, `pesan`, `bukti_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
(26, 2, 'J220240717003147', NULL, 'bukti_transfer_2.jpg', 'verified', '2024-07-16 17:31:47', '2024-07-16 17:31:47'),
(27, 2, 'J220240717011439', NULL, 'bukti_transfer_2.jpg', 'verified', '2024-07-16 18:14:39', '2024-07-16 18:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbpelanggan`
--

CREATE TABLE `tbpelanggan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`id`, `id_pelanggan`, `nama`, `alamat`, `nohp`, `kode_pos`, `created_at`, `updated_at`) VALUES
(49, 2, 'Abdel Haris Aragati', 'PERUM BMP 1 BLOK F 31, Kec. Tenayan Raya, Kota Pekanbaru, Riau', '0896232266816', 2829, '2024-07-08 15:14:59', '2024-07-08 15:14:59'),
(52, 18, 'Randy', 'PERUM BMP 1 BLOK F 31, Kec. Tenayan Raya, Kota Pekanbaru, Riau', '08966632323', 28289, '2024-07-09 08:36:18', '2024-07-09 08:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbstok`
--

CREATE TABLE `tbstok` (
  `id_stok` bigint(20) UNSIGNED NOT NULL,
  `kode_stok` int(11) NOT NULL,
  `nama_stok` varchar(255) NOT NULL,
  `saldo_awal` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(225) DEFAULT NULL,
  `harga_modal` varchar(255) NOT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `pajang` varchar(255) NOT NULL,
  `id_satuan` bigint(20) UNSIGNED DEFAULT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `jenis_ruangan` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbstok`
--

INSERT INTO `tbstok` (`id_stok`, `kode_stok`, `nama_stok`, `saldo_awal`, `harga_beli`, `harga_jual`, `harga_modal`, `foto`, `deskripsi`, `pajang`, `id_satuan`, `id_kategori`, `jenis_ruangan`, `created_at`, `updated_at`) VALUES
(59, 1234, 'Dalecraft 75 Cm Jace Meja Makan - Putih', '12', '200000', '350000', '5000000', '1718749796_meja-kaca1-removebg-preview.png,1718749796_meja-kaca2.jpg,1718749796_meja-kaca1.jpg', 'Meja makan Jace hadir dengan desain minimalis yang cocok untuk melengkapi hunian Anda. Rangka meja yang kuat dan kokoh memastikan stabilitas saat digunakan. Material PB (particle board) berkualitas dibalut finishing melamine yang halus dan mudah dibersihkan. Sementara itu, kaki-kaki meja dari logam dibalut powder coating untuk memberikan sentuhan estetika yang menawan.', 'YA', 1, 7, 'Ruang Makan', '2024-06-23 19:11:12', NULL),
(60, 1235, 'Abney Sofa Sectional Leather Reversible - Cokelat Tua', '5', '5400000', '6300000', '15000000', '1718750217_sofa-1.png,1718750217_sofa-3.jpeg,1718750217_sofa-2.png', 'shley sofa L sectional seri Abney menawan dengan desain yang elegan dan menawan. Menampilkan sandaran dan dudukan empuk yang memberikan kenyamanan maksimal saat bersantai. Dilengkapi dengan rangka kokoh dan stabil, serta material berkualitas yang memastikan daya tahan sofa ini.', 'YA', 1, 5, 'Ruang Tamu', '2024-06-25 03:28:24', '2024-06-25 03:28:24'),
(61, 12342, 'Kasur Springbed Eden - Fullset', '9', '2400000', '2800000', '15000000', '1718750309_set-kasur1-.png,1718750309_set-kasur3.jpeg', 'Kasur Springbed Eden hadir untuk memastikan kamu mendapatkan tidur yang nyenyak dan nyaman setiap malam. Lapisan busa berdensitas tinggi ini memperhalus gerakan di atas matras, memberikan sensasi lembut dan menyenangkan saat beristirahat. Rasakan kenyamanan yang luar biasa dan tidur yang pulas dengan Kasur Springbed Eden.  Kasur Springbed Eden dilengkapi dengan Reinforced PE Encasement, proteksi ekstra kokoh di setiap sudut matras', 'YA', 2, 10, 'Ruang Tidur', '2024-06-22 19:13:17', NULL),
(63, 23311, 'Gio Lemari Pakaian 2 Pintu - Cokelat Euro Oak', '12', '949000', '1200000', '15000000', '1718750783_ezgif-6-2780637457-removebg-preview.png', 'Tambahkan koleksi furnitur di kamar tidur atau closet room Anda dengan menghadirkan Gio lemari pakaian persembahan dari Informa ini. Lemari pakaian 2 pintu tarik ini dirancang menggunakan material berkualitas dengan finishing sempurna sehingga rangka kokoh, stabil, dan awet.', 'YA', 1, 6, 'Ruang Tidur', '2024-06-22 18:51:24', NULL),
(64, 32144, 'Rana Lemari Pakaian 2 Pintu - Putih/cokelat Maple', '7', '1399000', '1550000', '15000000', '1718750884_Lemari-Pakaian-removebg-preview.png', 'Pakaian Anda akan lebih tertata dan terjaga keamanannya dengan lemari pakaian 2 pintu seri Rana. Didesain dengan model pintu geser yang dapat menghemat ruang, dilengkapi dengan cermin refleksi jernih, serta kunci untuk keamanan maksimal. Dihiasi dengan motif serat kayu natural, lemari pakaian ini tidak hanya memenuhi kebutuhan penyimpanan pakaian Anda, tetapi juga menambah sentuhan estetika pada ruangan.', 'YA', 1, 6, 'Ruang Tidur', '2024-06-22 19:11:02', NULL),
(65, 32131, 'Gio Lemari Pakaian 2 Pintu - Putih', '10', '942000', '1380000', '15000000', '1718750985_ezgif-6-cab9b3e9f6-removebg-preview.png', 'Lengkapi koleksi furnitur di kamar tidur atau closet room Anda dengan menghadirkan Gio lemari pakaian persembahan dari Informa ini. Lemari pakaian 2 pintu tarik ini dirancang menggunakan material berkualitas dengan finishing sempurna sehingga rangka kokoh, stabil, dan awet.', 'YA', 1, 6, 'Ruang Tamu', '2024-06-22 19:10:37', NULL),
(66, 23443, 'Beck Meja Kantor - Hitam', '8', '420000', '699000', '15000000', '1718751340_ezgif-6-b8855ddb09-removebg-preview.png', 'Meja kantor Beck adalah solusi ideal untuk ruang kerja Anda. Dengan permukaan meja yang luas dan dilengkapi rak, meja ini cocok digunakan untuk bekerja dan belajar. Rangka yang kuat, kokoh, dan stabil membuatnya dapat digunakan untuk waktu yang lama. Cocok diletakkan di kantor dan ruang kerja, meja ini memberikan kesan profesional dan membantu menciptakan lingkungan kerja yang produktif.', 'YA', 1, 8, 'Ruang Tamu', '2024-06-09 19:11:28', NULL),
(68, 4342, 'Delcraft Sleep 120x200 Cm Kasur 4 In 1 - Abu-abu', '10', '7300000', '8660000', '15000000', '1718751625_ezgif-6-9f2ae41453-removebg-preview.png', 'Hadirkan set tempat tidur dari Informa Sleep ini sebagai solusi ruang minimalis Anda. Kasur bagian bawah dapat ditarik sebelum digunakan. Matras bagian atas dan bawah terpisah dari dipannya sehingga lebih fleksibel jika ingin dipindahkan atau mengganti matras.', 'YA', 1, 10, 'Ruang Tidur', '2024-06-23 19:11:55', NULL),
(70, 23834, 'Selma Cosmo Kursi Kantor Sandaran Rendah - Hitam', '19', '700000', '850000', '10000000', '1719344175_kursi-kantor-removebg-preview.png', 'Gunakan kursi yang nyaman merupakan salah satu faktor penting untuk meningkatkan performa Anda. Cosmo kursi kantor sandaran rendah ini hadir untuk membantu Anda lebih rileks saat duduk di kantor atau area belajar. Kursi ini memiliki dudukan serta sandaran yang empuk dan nyaman untuk penggunaan dalam waktu yang lama. Selain itu, dilengkapi tuas pengatur tinggi dudukan dan roda  untuk mobilitas tinggi.\"\"\"', 'YA', 1, 9, 'Ruang Tamu', '2024-06-25 12:36:15', '2024-06-25 12:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Abdel Haris Aragati', 'johndoe@gmail.com', 'admin', NULL, '$2y$10$1VJjCnN1hKGY0Hvjh2X1wOO6EDGywZ/4JD6nWEyTOhb1qAvjbnoOa', NULL, '2024-05-28 08:10:09', '2024-06-25 10:48:55'),
(4, 'Abdel Haris Aragati', 'del@gmail.com', 'admin', NULL, '$2y$10$04rvjSXKo2/dsujSC2EL7e0r4DA8D0C9fJ/JdYJfrq1WCgFLPWZNa', NULL, '2024-06-21 10:15:26', '2024-06-21 10:15:26'),
(5, 'Abdel Haris Aragati', 'wlee@gmail.com', 'admin', NULL, '$2y$10$lsRWtJXmNs3ZMZm50CzgUeBAz0GrB73hINVCQzpR6UKoJJAjso30a', NULL, '2024-06-25 11:38:09', '2024-06-25 11:38:09'),
(6, 'Abdel Haris Aragati', 'abdelharris@gmail.com', 'admin', NULL, '$2y$10$D/rduqlJH2f4WWctn1EURO1H7/Xag5tsGz/0gjLZAepBEUMmIYsqi', NULL, '2024-06-25 14:56:15', '2024-06-25 15:02:15'),
(7, 'Abdel Haris Aragati', 'kkkk@gmail.com', 'admin', NULL, '$2y$10$Frcwnm3cXsGbUo.9TMyIROx5zSjVWrUD8wv02P2CgG.Q6grz2l3Ci', NULL, '2024-06-29 17:49:13', '2024-06-29 17:49:13'),
(8, 'Abdel Haris Aragati', 'aaaadsada@gmail.com', 'admin', NULL, '$2y$10$csw2oCLx.dn39xnDYXWRtuxLBcnFaff557SUQ.mXh1SO6/BF0vhF2', NULL, '2024-07-07 04:52:42', '2024-07-07 04:52:42'),
(9, 'Abdel Haris Aragati', 'test@gmail.com', 'user', NULL, '$2y$10$ebWoFZNoKWlhH1Va3eFUluqEHCyzYWidV/y9g6LEqtughMw/UoY9i', NULL, '2024-07-07 05:58:27', '2024-07-07 05:58:27'),
(17, 'Ahmad', 'test1@gmail.com', 'admin', NULL, '$2y$10$c9ObnYPRUtpYsBstPnZ4wejjS8c4IDtzgAZfTnqsX./bU8q6XfrtO', NULL, '2024-07-07 08:52:09', '2024-07-07 08:52:09'),
(18, 'Randy', 'user1@gmail.com', 'user', NULL, '$2y$10$CAuWQUZe9HKguyYVmnYraOo7.Fd5n8IGu8/Ruli9h0bEDocgwpbo6', NULL, '2024-07-09 07:29:50', '2024-07-09 07:29:50');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsaldo`
-- (See below for the actual view)
--
CREATE TABLE `vsaldo` (
`id_stok` bigint(20) unsigned
,`Masuk` decimal(32,0)
,`Keluar` decimal(32,0)
,`saldo` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsaldoakhir`
-- (See below for the actual view)
--
CREATE TABLE `vsaldoakhir` (
`id_stok` bigint(20) unsigned
,`nama_stok` varchar(255)
,`saldo_awal` varchar(255)
,`masuk` decimal(32,0)
,`keluar` decimal(32,0)
,`saldoakhir` double
);

-- --------------------------------------------------------

--
-- Structure for view `vsaldo`
--
DROP TABLE IF EXISTS `vsaldo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsaldo`  AS SELECT `mutasi`.`id_stok` AS `id_stok`, sum(if(`mutasi`.`masuk_keluar` = 'Masuk',`mutasi`.`qty`,0)) AS `Masuk`, sum(if(`mutasi`.`masuk_keluar` = 'Keluar',`mutasi`.`qty`,0)) AS `Keluar`, sum(if(`mutasi`.`masuk_keluar` = 'Masuk',`mutasi`.`qty`,0)) - sum(if(`mutasi`.`masuk_keluar` = 'Keluar',`mutasi`.`qty`,0)) AS `saldo` FROM `mutasi` GROUP BY `mutasi`.`id_stok` ;

-- --------------------------------------------------------

--
-- Structure for view `vsaldoakhir`
--
DROP TABLE IF EXISTS `vsaldoakhir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsaldoakhir`  AS SELECT `tbstok`.`id_stok` AS `id_stok`, `tbstok`.`nama_stok` AS `nama_stok`, `tbstok`.`saldo_awal` AS `saldo_awal`, coalesce(`vsaldo`.`Masuk`,0) AS `masuk`, coalesce(`vsaldo`.`Keluar`,0) AS `keluar`, `tbstok`.`saldo_awal`- coalesce(`vsaldo`.`Keluar`,0) + coalesce(`vsaldo`.`Masuk`,0) AS `saldoakhir` FROM (`tbstok` left join (select `mutasi`.`id_stok` AS `id_stok`,sum(case when `mutasi`.`masuk_keluar` = 'Masuk' then `mutasi`.`qty` else 0 end) AS `Masuk`,sum(case when `mutasi`.`masuk_keluar` = 'Keluar' then `mutasi`.`qty` else 0 end) AS `Keluar` from `mutasi` group by `mutasi`.`id_stok`) `vsaldo` on(`tbstok`.`id_stok` = `vsaldo`.`id_stok`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `beli_id_pemasok_index` (`id_pemasok`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_id_stok_foreign` (`id_stok`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mutasi_id_stok_index` (`id_stok`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbalamat`
--
ALTER TABLE `tbalamat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbalamat_user_id_foreign` (`user_id`);

--
-- Indexes for table `tbjual`
--
ALTER TABLE `tbjual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbjual_id_pelanggan_foreign` (`id_pelanggan`);

--
-- Indexes for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbpelanggan_id_pelanggan_foreign` (`id_pelanggan`);

--
-- Indexes for table `tbstok`
--
ALTER TABLE `tbstok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `tbstok_id_satuan_index` (`id_satuan`),
  ADD KEY `tbstok_id_kategori_index` (`id_kategori`);

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
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id_pembelian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbalamat`
--
ALTER TABLE `tbalamat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbjual`
--
ALTER TABLE `tbjual`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbstok`
--
ALTER TABLE `tbstok`
  MODIFY `id_stok` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_id_pemasok_foreign` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_id_stok_foreign` FOREIGN KEY (`id_stok`) REFERENCES `tbstok` (`id_stok`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD CONSTRAINT `mutasi_id_stok_foreign` FOREIGN KEY (`id_stok`) REFERENCES `tbstok` (`id_stok`) ON DELETE CASCADE;

--
-- Constraints for table `tbalamat`
--
ALTER TABLE `tbalamat`
  ADD CONSTRAINT `tbalamat_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbjual`
--
ALTER TABLE `tbjual`
  ADD CONSTRAINT `tbjual_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD CONSTRAINT `tbpelanggan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbstok`
--
ALTER TABLE `tbstok`
  ADD CONSTRAINT `tbstok_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbstok_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
