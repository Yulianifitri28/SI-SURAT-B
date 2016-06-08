-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Jun 2016 pada 06.23
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `suratjsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE IF NOT EXISTS `disposisi` (
`id_disposisi` int(11) NOT NULL,
  `id_sm` int(11) NOT NULL,
  `sifat_disposisi` tinyint(4) NOT NULL,
  `instruksi` text NOT NULL,
  `kirim` tinyint(1) NOT NULL,
  `tanggal` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi_user`
--

CREATE TABLE IF NOT EXISTS `disposisi_user` (
`id` int(11) NOT NULL,
  `id_disposisi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lihat` tinyint(1) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_surat`
--

CREATE TABLE IF NOT EXISTS `jenis_surat` (
`id_surat` int(11) NOT NULL,
  `jenis_surat` varchar(25) NOT NULL,
  `kode_surat` varchar(8) NOT NULL,
  `jabatan` tinyint(4) NOT NULL,
  `penerima` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `jenis_surat`
--

INSERT INTO `jenis_surat` (`id_surat`, `jenis_surat`, `kode_surat`, `jabatan`, `penerima`) VALUES
(1, 'Surat KKN', 'KM', 3, 0),
(2, 'Surat Izin Kuliah', 'PP', 0, 1),
(3, 'Surat Ujian Susulan', 'PP', 3, 1),
(4, 'Surat Izin ', 'DL', 1, 0),
(5, 'Surat Pengajuan Beasiswa', 'PP', 3, 1),
(6, 'Surat Pengajuan Nilai', 'PP', 2, 1),
(7, 'Surat Permintaan', 'PP', 0, 0),
(8, 'Surat Permohonan', 'PP', 1, 0),
(9, 'Surat Tugas', 'PM', 0, 0),
(10, 'Surat Undangan', 'PP', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_04_23_214142_bikin_tabel_orang', 1),
('2014_10_12_000000_create_users_table', 2),
('2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratkeluars`
--

CREATE TABLE IF NOT EXISTS `suratkeluars` (
`id_sk` int(11) NOT NULL,
  `no_sk` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_sk` date NOT NULL,
  `hal_sk` text NOT NULL,
  `alamat_surat` varchar(50) NOT NULL,
  `isi_sk` text NOT NULL,
  `lampiran_sk` varchar(50) NOT NULL,
  `tembusan` varchar(100) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `file` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `req` tinyint(4) NOT NULL,
  `no` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratmasuks`
--

CREATE TABLE IF NOT EXISTS `suratmasuks` (
`id_sm` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `tgl_terima` date NOT NULL,
  `no_sm` varchar(20) NOT NULL,
  `tgl_sm` date NOT NULL,
  `hal_sm` text NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `file_sm` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `asal_sm` varchar(50) NOT NULL,
  `lihat` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_user`
--

CREATE TABLE IF NOT EXISTS `surat_user` (
`id` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lihat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nim` int(25) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `nim`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 0, 'admin@portal.co.id', '$2y$10$WwAZkiEuw0IdPgdt.XJJEuE5xR449LLlkyjD.IwDrCOEtkTH..jgu', 0, 'uFikzKi1clzZiSfbNILdWoWQvPoHKNLWpPmy6FAkxCR4fmsOCGxHePmvQS3G', '2016-05-29 21:46:36', '2016-06-06 16:10:51'),
(2, 'kevin', 'Kevin Valdi Arrestino', 1311522014, 'kevin@gmail.com', '$2y$10$PutiIK7.sVL4uXUQXJHGReW8Q9B8bEG90fn3iKKb5n.23rgJAVsDG', 2, 'PLZo9frEyl7528uWAtWVxWVRc1jgZIMPQbTJ9SPWVfhwRXGS22WHo5syKVVy', '2016-06-04 05:19:53', '2016-06-06 15:28:30'),
(3, 'uul', 'Ezmul Mawardi', 1311521000, 'uul@gmail.com', '$2y$10$5JkGY4WaVgzIDmWIY4OcFOo0E251jJF5mUvPYYiKE88LUqCWs.9RO', 1, 'vWir9twHcpJzJLADQ8sSplhu5zWDNF8g0PwMVTD67ZDkUO9SdsshoPeSAGKf', '2016-06-04 05:23:52', '2016-06-06 16:03:30'),
(4, 'opit', 'Ofitra Imazhona', 1110961000, 'opit@gmail.com', '$2y$10$5iKHNSXbyD3EeOrkgEA5Eeb0H4/x3CzgoBywLCEpuaPG.sPUMI.j6', 2, 'seAEQjufWgilNkmlRDKmsGU99gYiubdcZsvuAkSHPYUxrRXh6hvtHpf6nkPr', '2016-06-04 05:24:25', '2016-06-06 12:54:46'),
(5, 'riri', 'Fitri Yuliani', 1311521008, 'riri@gmail.com', '$2y$10$Utx1DJ7REAuE4hro8s/UAe9Zw14B74Ps91Ds7CVhEpYEKxtguPL0S', 3, 'OkM7PYrgJhMjw0AOkaUEOkZ2r7LhEo24oyhFhxbyxiMsZO7d0FSccgXoBTmL', '2016-06-04 05:24:42', '2016-06-06 15:34:34'),
(6, 'ala', 'Frisca Ferla', 1311521000, 'ala@gmail.com', '$2y$10$D6lVIDs9HvU4ghpYJu1gfew6E6Dn7OTb5BUoaXqdACdcW/oSoabPm', 3, 'NziaQIT1lf4cHk09jK1u2Ta72Fa4MQ7tOKPnpAG0ikHLwenMwhJXwJFJsUOG', '2016-06-04 05:25:02', '2016-06-06 16:07:29'),
(7, 'dela', 'Desla Sari', 1311521000, 'dela@gmail.com', '$2y$10$8HHGBqv.nZzaXBSn/7iSuOIh2RjR6qoMh6EDOCOR7UaEF33t4FQn.', 3, NULL, '2016-06-04 05:25:25', '2016-06-04 05:25:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
 ADD PRIMARY KEY (`id_disposisi`), ADD KEY `id_sm` (`id_sm`);

--
-- Indexes for table `disposisi_user`
--
ALTER TABLE `disposisi_user`
 ADD PRIMARY KEY (`id_disposisi`,`id_user`), ADD UNIQUE KEY `id` (`id`), ADD KEY `id_user` (`id_user`), ADD KEY `id_2` (`id`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
 ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `suratkeluars`
--
ALTER TABLE `suratkeluars`
 ADD PRIMARY KEY (`id_sk`), ADD KEY `id_jenis_surat` (`id_jenis_surat`);

--
-- Indexes for table `suratmasuks`
--
ALTER TABLE `suratmasuks`
 ADD PRIMARY KEY (`id_sm`), ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `surat_user`
--
ALTER TABLE `surat_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `disposisi_user`
--
ALTER TABLE `disposisi_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `suratkeluars`
--
ALTER TABLE `suratkeluars`
MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suratmasuks`
--
ALTER TABLE `suratmasuks`
MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `surat_user`
--
ALTER TABLE `surat_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_sm`) REFERENCES `suratmasuks` (`id_sm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `disposisi_user`
--
ALTER TABLE `disposisi_user`
ADD CONSTRAINT `disposisi_user_ibfk_1` FOREIGN KEY (`id_disposisi`) REFERENCES `disposisi` (`id_disposisi`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `disposisi_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `suratkeluars`
--
ALTER TABLE `suratkeluars`
ADD CONSTRAINT `suratkeluars_ibfk_1` FOREIGN KEY (`id_jenis_surat`) REFERENCES `jenis_surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `suratmasuks`
--
ALTER TABLE `suratmasuks`
ADD CONSTRAINT `suratmasuks_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `jenis_surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
