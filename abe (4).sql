-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2021 at 02:13 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `isactive` enum('iya','tidak') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `nama_user`, `email`, `telp`, `password`, `alamat`, `type`, `isactive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'buk ayu', 'head_admin', 'example@gmail.com', '200000000', '7bf2fdbe4e28bf4a7ea60e6d0e2af546', 'non', 1, 'iya', '2021-06-10 04:23:28', '2021-08-28 09:12:50', NULL),
(10, 'wallaby', 'admin1', 'kadek.kusuma.wardana@gmail.com', '234234', '7bf2fdbe4e28bf4a7ea60e6d0e2af546', 'Sibang Kaja, Abiansemal, Badung Regency, Bali', 2, 'iya', '2021-08-25 04:32:48', '2021-08-28 09:14:45', '2021-08-28 17:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE `admin_type` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'super admin', '2021-06-02 10:54:49', '0000-00-00 00:00:00', NULL),
(2, 'admin', '2021-06-02 10:54:49', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id` int(11) NOT NULL,
  `nama_anak` varchar(255) NOT NULL,
  `kelamin` enum('laki_laki','perempuan') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id`, `nama_anak`, `kelamin`, `tempat_lahir`, `tanggal_lahir`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'carmilla', 'laki_laki', 'denpasar', '2020-11-17', '2020-12-01 05:36:50', '2020-11-30 08:49:47', NULL),
(2, 'mahesa putra', 'laki_laki', 'denpasar', '2020-11-30', '2021-08-27 05:53:09', '2020-11-30 07:05:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_token`
--

CREATE TABLE `auth_token` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_device` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_token`
--

INSERT INTO `auth_token` (`id`, `nama`, `token`, `id_user`, `id_device`, `created_at`, `updated_at`) VALUES
(86, 'mahesa', '7bf2fdbe4e28bf4a7ea60e6d0e2af546', 67, 'undefined', '2021-04-29 01:57:08', '2021-04-29 01:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `bedakan_konten`
--

CREATE TABLE `bedakan_konten` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `attachment1` varchar(255) NOT NULL,
  `attachment2` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenispengguna` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `id_user`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 1, 'ada', 'adad', '2020-11-30 14:53:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `flashcard`
--

CREATE TABLE `flashcard` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `status` enum('valid','invalid') NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flashcard_dibagikan`
--

CREATE TABLE `flashcard_dibagikan` (
  `id` int(11) NOT NULL,
  `id_flashcard` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flashcard_dibagikan`
--

INSERT INTO `flashcard_dibagikan` (`id`, `id_flashcard`, `id_pengirim`, `id_penerima`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 65, 68, 67, '2021-02-26 14:21:23', '2021-02-26 14:21:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hubungan`
--

CREATE TABLE `hubungan` (
  `id` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `id_orangtua` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hubungan`
--

INSERT INTO `hubungan` (`id`, `id_anak`, `id_orangtua`, `created_at`, `updated_at`) VALUES
(25, 1, 4, '2021-09-16 07:02:04', '2021-09-15 23:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_flashcard`
--

CREATE TABLE `jenis_flashcard` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengguna`
--

CREATE TABLE `jenis_pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pengguna`
--

INSERT INTO `jenis_pengguna` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'terapis', '2020-08-30 16:52:49', '0000-00-00 00:00:00', NULL),
(2, 'orang tua', '2020-08-30 16:52:49', '2020-12-01 07:34:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `dibaca` int(11) NOT NULL,
  `dilihat` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orangtua_anak`
--

CREATE TABLE `orangtua_anak` (
  `id` int(11) NOT NULL,
  `nama_orangtua` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` text NOT NULL,
  `kelamin` enum('laki_laki','perempuan') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orangtua_anak`
--

INSERT INTO `orangtua_anak` (`id`, `nama_orangtua`, `pekerjaan`, `agama`, `alamat`, `telp`, `kelamin`, `updated_at`, `created_at`) VALUES
(3, 'mahesa putra', 'programmer', 'Islam', 'singaraja', '234234', 'laki_laki', '2021-08-28 10:20:40', '2020-11-29 07:53:16'),
(4, 'kusuma wardana', 'programmer', 'Islam', 'singaraja', '324234', 'laki_laki', '2020-11-30 08:59:05', '2020-11-30 08:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perkembangan_anak`
--

CREATE TABLE `perkembangan_anak` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_terapis` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respon_perkembangan`
--

CREATE TABLE `respon_perkembangan` (
  `id` int(11) NOT NULL,
  `id_perkembangan` int(11) NOT NULL,
  `id_orang_tua` int(11) NOT NULL,
  `id_terapis` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `terapis`
--

CREATE TABLE `terapis` (
  `id` int(11) NOT NULL,
  `nama_terapis` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` text NOT NULL,
  `kelamin` enum('laki_laki','perempuan') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terapis`
--

INSERT INTO `terapis` (`id`, `nama_terapis`, `agama`, `alamat`, `telp`, `kelamin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'baron', 'islam', 'denpasar', '2345678', 'laki_laki', '2021-01-02 07:29:11', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `password` varchar(255) NOT NULL,
  `isactive` enum('iya','tidak') NOT NULL,
  `id_jenispengguna` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `nama_user`, `created_at`, `updated_at`, `password`, `isactive`, `id_jenispengguna`, `deleted_at`) VALUES
(68, 'baron', 'baron', '2021-01-12 02:15:46', '2021-01-12 02:15:46', '7bf2fdbe4e28bf4a7ea60e6d0e2af546', 'iya', 1, NULL),
(70, 'mahesa putra', 'tomorrow', '2021-08-28 18:20:40', '2021-08-28 10:20:40', '7bf2fdbe4e28bf4a7ea60e6d0e2af546', 'iya', 2, NULL),
(73, 'baron', 'head_admin', '2021-08-29 09:37:26', '2021-08-29 01:37:26', '7bf2fdbe4e28bf4a7ea60e6d0e2af546', 'tidak', 1, '2021-08-29 09:37:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_type`
--
ALTER TABLE `admin_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_token`
--
ALTER TABLE `auth_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bedakan_konten`
--
ALTER TABLE `bedakan_konten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flashcard`
--
ALTER TABLE `flashcard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flashcard_dibagikan`
--
ALTER TABLE `flashcard_dibagikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hubungan`
--
ALTER TABLE `hubungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_flashcard`
--
ALTER TABLE `jenis_flashcard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pengguna`
--
ALTER TABLE `jenis_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orangtua_anak`
--
ALTER TABLE `orangtua_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perkembangan_anak`
--
ALTER TABLE `perkembangan_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respon_perkembangan`
--
ALTER TABLE `respon_perkembangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terapis`
--
ALTER TABLE `terapis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_type`
--
ALTER TABLE `admin_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_token`
--
ALTER TABLE `auth_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `bedakan_konten`
--
ALTER TABLE `bedakan_konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `flashcard`
--
ALTER TABLE `flashcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `flashcard_dibagikan`
--
ALTER TABLE `flashcard_dibagikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hubungan`
--
ALTER TABLE `hubungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jenis_flashcard`
--
ALTER TABLE `jenis_flashcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_pengguna`
--
ALTER TABLE `jenis_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `orangtua_anak`
--
ALTER TABLE `orangtua_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `perkembangan_anak`
--
ALTER TABLE `perkembangan_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `respon_perkembangan`
--
ALTER TABLE `respon_perkembangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `terapis`
--
ALTER TABLE `terapis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
