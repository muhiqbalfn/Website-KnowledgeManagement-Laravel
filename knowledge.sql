-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 03:28 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledge`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2019_01_17_073917_modul', 2),
('2019_01_17_075358_laporan', 2),
('2019_01_17_075419_sertifikat', 2),
('2019_01_17_091338_diklat', 2),
('2019_01_21_074055_evaluasi', 3),
('2019_01_25_124953_saran', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fnfirdaus45@gmail.com', '40724fcf13695ad65a3ba714a83132f778ae0fdc3130a8461c3edf4d9ec66603', '2019-01-09 22:58:36'),
('fnfirdaus12@gmail.com', '19b7fe587a04a69447c464d0b7a7b5564297d21a5d7c28cd087cdf262ef9e3ab', '2019-01-09 22:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_counter`
--

CREATE TABLE `tb_counter` (
  `id` varchar(11) NOT NULL,
  `ip_addres` text NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_counter`
--

INSERT INTO `tb_counter` (`id`, `ip_addres`, `visit_date`, `created_at`, `updated_at`) VALUES
('', '', '2019-01-28 15:31:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('::1', '::1', '2019-01-27 07:44:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diklat`
--

CREATE TABLE `tb_diklat` (
  `id_diklat` int(11) NOT NULL,
  `nama_diklat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_provider` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_diklat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_sub_ktg` int(11) NOT NULL,
  `waktu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_diklat`
--

INSERT INTO `tb_diklat` (`id_diklat`, `nama_diklat`, `nama_provider`, `tempat_diklat`, `id_sub_ktg`, `waktu`, `created_at`, `updated_at`) VALUES
(1, 'Diklat teknologi', 'User max', 'PDAM', 10, '07.00 s/d 12.00', '2019-01-01 17:00:00', '2019-02-02 02:08:09'),
(2, 'Diklat ekonomi', '', 'Graha pena', 10, '', '2019-01-08 17:00:00', '2019-01-20 21:56:04'),
(3, 'Diklat kebangsaan', '', 'PDAM', 10, '', '2019-01-20 21:46:41', '2019-01-20 21:54:41'),
(5, 'Diklat management', '', 'Grapari sby', 10, '', '2019-01-20 22:04:20', '2019-01-20 22:06:17'),
(6, 'Diklat umum', '', 'Graha pena', 11, '', '2019-01-28 21:59:45', '2019-01-28 21:59:45'),
(7, 'Diklat wawasan IT', '', 'Gedung serbaguna sby', 12, '', '2019-01-28 22:00:27', '2019-01-28 22:00:27'),
(8, 'Diklat satisfaction', '', 'Terminal sby', 13, '', '2019-01-28 22:01:20', '2019-01-28 22:01:20'),
(9, 'Diklat motifasi berprestasi', '', 'Gedung PDAM', 11, '', '2019-01-28 22:01:48', '2019-01-28 22:01:48'),
(10, 'Diklat integritas', '', 'PDAM Surabaya', 10, '', '2019-01-28 22:02:20', '2019-01-28 22:02:20'),
(11, 'Diklat sosial karyawan', '', 'PDAM Bandung', 16, '', '2019-01-28 22:03:14', '2019-01-28 22:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_evaluasi`
--

CREATE TABLE `tb_evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `nama_evaluasi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ss` int(255) NOT NULL,
  `s` int(255) NOT NULL,
  `ts` int(255) NOT NULL,
  `sts` int(255) NOT NULL,
  `id_diklat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_evaluasi`
--

INSERT INTO `tb_evaluasi` (`id_evaluasi`, `nama_evaluasi`, `ss`, `s`, `ts`, `sts`, `id_diklat`, `created_at`, `updated_at`) VALUES
(1, 'Materi yang disampaikan menambah pengetahuan', 10, 5, 10, 5, 1, '2019-01-21 07:19:33', '2019-02-17 06:53:57'),
(2, 'Materi yang disampaikan dapat diterapkan di tempat kerja', 10, 15, 10, 15, 1, '2019-01-21 07:20:35', '2019-01-21 07:20:35'),
(3, 'Instruktur menjelaskan tujuan materi yang disampaikan', 20, 15, 20, 15, 1, '2019-01-21 07:21:04', '2019-01-21 07:21:04'),
(4, 'Instruktur menguasai materi yang disampaikan', 20, 25, 20, 25, 1, '2019-01-21 07:21:22', '2019-01-21 07:21:22'),
(5, 'Menggunakan beberapa metode (diskusi, bermain peran, dll)', 15, 25, 15, 25, 1, '2019-01-21 07:21:48', '2019-01-21 07:21:48'),
(6, 'Fasilitas atau alat praktek memadai', 30, 15, 30, 15, 1, '2019-01-21 07:22:05', '2019-01-21 07:22:05'),
(7, 'Waktu pelaksanaan mencukupi', 20, 20, 35, 20, 1, '2019-01-21 07:22:19', '2019-01-21 07:22:19'),
(8, 'Apakah anda akan merekomendasikan pelatihan ini kepada rekan lain ?', 25, 15, 25, 15, 1, '2019-01-21 07:22:46', '2019-01-21 07:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ktg`
--

CREATE TABLE `tb_ktg` (
  `id_ktg` int(11) NOT NULL,
  `nama_ktg` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ktg`
--

INSERT INTO `tb_ktg` (`id_ktg`, `nama_ktg`, `created_at`, `updated_at`) VALUES
(1, 'Kompetensi inti', '2019-01-08 17:00:00', '2019-01-15 17:00:00'),
(2, 'Kompetensi peran umum', '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(3, 'Kompetensi peran spesifik', '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(4, 'Kompetensi teknis umum', '2019-01-13 17:00:00', '2019-01-13 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuisioner`
--

CREATE TABLE `tb_kuisioner` (
  `id_kuisioner` int(11) NOT NULL,
  `nilai_kuisioner` varchar(3) NOT NULL,
  `id_evaluasi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kuisioner`
--

INSERT INTO `tb_kuisioner` (`id_kuisioner`, `nilai_kuisioner`, `id_evaluasi`, `created_at`, `updated_at`) VALUES
(1, 's', 1, '2019-02-13 17:00:00', '2019-02-05 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL,
  `nama_laporan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ket_laporan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_laporan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_diklat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `nama_laporan`, `ket_laporan`, `file_laporan`, `type`, `id_diklat`, `created_at`, `updated_at`) VALUES
(1, 'laporan 1', 'ket laporan 1, ket laporan 1ket laporan  1ket laporan 1ket laporan 1ket laporan 1ket laporan 1ket laporan 1ket laporan 1', 'laporan1.pdf', 'pdf', 1, '2019-01-13 17:00:00', '2019-01-20 22:22:02'),
(2, 'laporan 3', 'ket laporan 3ket laporan 3ket 3ket laporan 3ket laporan 3ket laporan 3ket laporan 3ket laporan 3ket laporan 3', 'laporan2.pdf', 'pdf', 1, '2019-01-08 17:00:00', '2019-01-20 22:22:17'),
(3, 'Laporan diklat database TSI', 'Laporan diklat database TSI untuk karyawan PDAM Surabaya yang terhormat sebagai penunjang kinerja selalu', 'QMS.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1, '2019-01-20 22:12:02', '2019-01-20 22:12:02'),
(4, 'Laporan kampanye', 'Kampanye presiden di perusahaan daerah air minum surabaya di kota aman terkendali sentosa', 'bayes.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 1, '2019-01-20 22:13:13', '2019-01-20 22:22:31'),
(5, 'Laporan direktur', 'Laporan direktur Laporan direktur Laporan direktur Laporan direktur Laporan direktur Laporan direktur Laporan direktur ', 'bukalapak.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1, '2019-01-20 22:13:56', '2019-01-20 22:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_modul`
--

CREATE TABLE `tb_modul` (
  `id_modul` int(11) NOT NULL,
  `nama_modul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ket_modul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_modul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_diklat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_modul`
--

INSERT INTO `tb_modul` (`id_modul`, `nama_modul`, `ket_modul`, `file_modul`, `type`, `id_diklat`, `created_at`, `updated_at`) VALUES
(2, 'Modul pelatihan organisasi', 'Modul  tentang pelatihan kepemimpinan organisasi pelatihan tentang pelatihan kepemimpinan organisasi', 'Bismillah Laporan KWU.pdf', 'pdf', 1, '2019-01-29 17:00:00', '2019-01-20 22:19:56'),
(3, 'Modul pemrograman', 'Modul pemrograman TSI Modul pemrograman TS TSI Modul diklat management', 'Bismillah Laporan KWU.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1, '2019-01-19 23:59:07', '2019-01-20 22:20:12'),
(4, 'Modul management', 'Modul diklat management Modul diklat management Modul diklat management Modul diklat management', 'logo.jpg', 'image/jpeg', 1, '2019-01-20 00:01:36', '2019-01-21 09:10:14'),
(5, 'Materi database TSI', 'Materi database untuk karyawan TSI vModul diklat management Modul diklat management', 'Cerpen_UTS.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1, '2019-01-20 22:09:04', '2019-01-20 22:20:37'),
(6, 'Diklat sumber daya manusia', 'Pemeberisn materi untuk semua karyawan PDAM surya sembada surabaya', 'teruntuk Iqbal.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1, '2019-01-20 22:09:59', '2019-01-20 22:09:59'),
(7, 'Materi majalah PDAM', 'Maeri majalah PDAM untuk evalusai kinerja karyawan PDAM Surabaya joss', 'Bismillah Laporan KWU.pdf', 'application/pdf', 1, '2019-01-20 22:10:59', '2019-01-20 22:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_saran`
--

CREATE TABLE `tb_saran` (
  `id_saran` int(11) NOT NULL,
  `saran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_diklat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_saran`
--

INSERT INTO `tb_saran` (`id_saran`, `saran`, `id_diklat`, `created_at`, `updated_at`) VALUES
(1, 'mantab !!', 1, '2019-01-30 00:43:25', '2019-01-30 00:43:25'),
(2, 'saran dari aku !\r\n', 1, '2019-01-30 00:44:14', '2019-01-30 00:44:14'),
(3, 'Diklat sukses !', 1, '2019-01-30 08:53:03', '2019-01-30 08:53:03'),
(4, '', 1, '2019-02-02 01:55:31', '2019-02-02 01:55:31'),
(5, '', 1, '2019-02-03 04:12:33', '2019-02-03 04:12:33'),
(6, 'saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba saran uji coba ', 1, '2019-02-05 17:15:00', '2019-02-05 17:15:00'),
(7, 'fgfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 1, '2019-02-05 17:17:57', '2019-02-05 17:17:57'),
(8, 'ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy ajjhgzayzgyagzy', 1, '2019-02-05 17:19:14', '2019-02-05 17:19:14'),
(9, 'saraaaannnnnnnnnnnn !!!!!!!!!!!!!', 1, '2019-02-17 06:53:57', '2019-02-17 06:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sertifikat`
--

CREATE TABLE `tb_sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `nama_sertifikat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ket_sertifikat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_sertifikat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_diklat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_sertifikat`
--

INSERT INTO `tb_sertifikat` (`id_sertifikat`, `nama_sertifikat`, `ket_sertifikat`, `file_sertifikat`, `type`, `id_diklat`, `created_at`, `updated_at`) VALUES
(1, 'sertifikat 1', 'ket sertifikat 1ket sertifikat 1ket sertifikat 1ket sertifikat 1ket sertifikat 1ket sertifikat 1ket sertifikat 1', 'sertifikat1.pdf', 'pdf', 1, '2019-01-29 17:00:00', '2019-01-20 22:23:22'),
(2, 'sertifikat 3', 'ket sertifikat 3ket sertifikat 3ket t 3ket sertifikat 3ket sertifikat 3ket sertifikat 3ket sertifikat 3ket sertifikat 3', 'sertifikat2.pdf', 'pdf', 1, '2019-01-15 17:00:00', '2019-01-20 22:25:16'),
(3, 'sertifikat 4', 'sertifikat 3ket sertifikat 3ket sertifikat 3ket sertifikat 3ket sertifikat 3ket sertifikat 3ket sertifikat 3ket sertifikat 3ket sertifikat 3ket', 'capt.PNG', 'image/png', 1, '2019-01-20 22:15:34', '2019-01-20 22:24:02'),
(4, 'seertifikat 5', 'seertifikat 5seertifikat 5seertifikat 5seertifikat 5seertifikat 5seertifikat 5seertifikat 5seertifikat 5seertifikat 5seertifikat 5seertifikat 5seertifi', 'Flowchart.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1, '2019-01-20 22:16:01', '2019-01-20 22:24:18'),
(5, 'sertifikat 6', 'sertifikat 6sertifikat 6sertifikat 6sertifikat 6sertifikat 6sertifikat 6sertifikat 6sertifikat 6sertifikat 6sertifikat 6', 'PPT.pptx', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 1, '2019-01-20 22:16:26', '2019-01-20 22:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_ktg`
--

CREATE TABLE `tb_sub_ktg` (
  `id_sub_ktg` int(11) NOT NULL,
  `nama_sub_ktg` varchar(255) NOT NULL,
  `id_ktg` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sub_ktg`
--

INSERT INTO `tb_sub_ktg` (`id_sub_ktg`, `nama_sub_ktg`, `id_ktg`, `created_at`, `updated_at`) VALUES
(10, 'Customer focus', 1, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(11, 'Motifasi berprestasi', 1, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(12, 'Integritas', 1, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(13, 'Kepemimpinan', 1, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(14, 'Kemampuan interpersonal', 1, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(15, 'Perbaikan berkesinambungan', 1, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(16, 'Mandiri', 1, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(17, 'Berwawasan global', 1, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(18, 'Pemikiran terbuka', 1, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(19, 'Perencanaan & pengorganisasian', 2, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(20, 'Berpikir analitis-Sintesis', 2, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(21, 'Pengambilan keputusan', 2, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(22, 'Memotivasi dan mengembangkan orang lain', 2, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(23, 'Managemen diri', 2, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(24, 'Visionary', 3, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(25, 'Orientasi bisnis', 3, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(26, 'Kepedulian sosial', 3, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(27, 'Example 1', 4, '2019-01-13 17:00:00', '2019-01-13 17:00:00'),
(28, 'Example 2', 4, '2019-01-13 17:00:00', '2019-01-13 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nuzul', 'nuzul', 'fnfirdaus45@gmail.com', '$2y$10$iUP/jrlYlakvy.6V9dIwc./xpiCelrZ3cCLF61A3C.LWRfUiyi3.a', 'admin', 'LvDg55hu8kgpEPzefzeSlRuaTwVxP89JwlNwpC9viu8jLNQn7QogFAdxeE11', '2019-01-09 22:11:50', '2019-02-17 07:21:03'),
(2, 'admin', 'admin', 'admin@gmail.com', '$2y$10$32o02hz7Pc8QIgtkT0NB6uKrtYruB6lQz4oGjMZltbQ9E4pgecFLa', 'admin', 'iaCdbowtS2bCMgDAD02v6hNEPF7wytbMoUWClQZVHyjVmLiLPZJht9cOqiWm', '2019-02-17 07:23:22', '2019-02-17 07:23:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tb_counter`
--
ALTER TABLE `tb_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_diklat`
--
ALTER TABLE `tb_diklat`
  ADD PRIMARY KEY (`id_diklat`),
  ADD KEY `id_sub_ktg` (`id_sub_ktg`);

--
-- Indexes for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `id_diklat` (`id_diklat`);

--
-- Indexes for table `tb_ktg`
--
ALTER TABLE `tb_ktg`
  ADD PRIMARY KEY (`id_ktg`);

--
-- Indexes for table `tb_kuisioner`
--
ALTER TABLE `tb_kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`),
  ADD KEY `id_evaluasi` (`id_evaluasi`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_diklat` (`id_diklat`);

--
-- Indexes for table `tb_modul`
--
ALTER TABLE `tb_modul`
  ADD PRIMARY KEY (`id_modul`),
  ADD KEY `id_diklat` (`id_diklat`);

--
-- Indexes for table `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD PRIMARY KEY (`id_saran`),
  ADD KEY `id_evaluasi` (`id_diklat`);

--
-- Indexes for table `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `id_diklat` (`id_diklat`);

--
-- Indexes for table `tb_sub_ktg`
--
ALTER TABLE `tb_sub_ktg`
  ADD PRIMARY KEY (`id_sub_ktg`),
  ADD KEY `id_kategori` (`id_ktg`);

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
-- AUTO_INCREMENT for table `tb_diklat`
--
ALTER TABLE `tb_diklat`
  MODIFY `id_diklat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_ktg`
--
ALTER TABLE `tb_ktg`
  MODIFY `id_ktg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_kuisioner`
--
ALTER TABLE `tb_kuisioner`
  MODIFY `id_kuisioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_modul`
--
ALTER TABLE `tb_modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_saran`
--
ALTER TABLE `tb_saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_sub_ktg`
--
ALTER TABLE `tb_sub_ktg`
  MODIFY `id_sub_ktg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_diklat`
--
ALTER TABLE `tb_diklat`
  ADD CONSTRAINT `tb_diklat_ibfk_1` FOREIGN KEY (`id_sub_ktg`) REFERENCES `tb_sub_ktg` (`id_sub_ktg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD CONSTRAINT `tb_evaluasi_ibfk_1` FOREIGN KEY (`id_diklat`) REFERENCES `tb_diklat` (`id_diklat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kuisioner`
--
ALTER TABLE `tb_kuisioner`
  ADD CONSTRAINT `tb_kuisioner_ibfk_1` FOREIGN KEY (`id_evaluasi`) REFERENCES `tb_evaluasi` (`id_evaluasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`id_diklat`) REFERENCES `tb_diklat` (`id_diklat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_modul`
--
ALTER TABLE `tb_modul`
  ADD CONSTRAINT `tb_modul_ibfk_1` FOREIGN KEY (`id_diklat`) REFERENCES `tb_diklat` (`id_diklat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD CONSTRAINT `tb_saran_ibfk_1` FOREIGN KEY (`id_diklat`) REFERENCES `tb_diklat` (`id_diklat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  ADD CONSTRAINT `tb_sertifikat_ibfk_1` FOREIGN KEY (`id_diklat`) REFERENCES `tb_diklat` (`id_diklat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sub_ktg`
--
ALTER TABLE `tb_sub_ktg`
  ADD CONSTRAINT `tb_sub_ktg_ibfk_1` FOREIGN KEY (`id_ktg`) REFERENCES `tb_ktg` (`id_ktg`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
