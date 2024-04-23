-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2024 pada 11.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gafot`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id` int(10) NOT NULL,
  `nama_album` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id`, `nama_album`, `deskripsi`, `tgl_dibuat`, `user_id`) VALUES
(2, 'kota', 'kota di indonesia', '2024-04-23 00:00:00', 1),
(3, 'sekolah', 'qwert', '2024-04-23 00:00:00', 1),
(7, 'anu', 'anu', '2024-04-23 14:27:55', 3),
(8, 'olahraga', 'foto foto saya ketika berolahragawan', '2024-04-23 15:33:33', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_unggah` datetime NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `album_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id`, `judul`, `deskripsi`, `tgl_unggah`, `lokasifile`, `album_id`, `user_id`) VALUES
(12, 'qq', 'qq', '2024-04-23 14:39:07', 'gf.jpg', 7, 3),
(13, 'qq', 'qq', '2024-04-23 14:39:33', '9442050c-06d5-44e1-a69c-55cd95cc6377.jpeg', 7, 3),
(14, 'malang', 'balaikota kota malang', '2024-04-23 15:34:36', 'Sejarah Alun-alun Malang.jpg', 8, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(10) NOT NULL,
  `foto_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_komentar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `foto_id`, `user_id`, `isi_komentar`, `tgl_komentar`) VALUES
(9, 13, 3, 'qq', '2024-04-23 14:39:44'),
(10, 12, 3, 'anu', '2024-04-23 14:40:21'),
(11, 14, 4, 'qwe', '2024-04-23 15:35:02'),
(12, 14, 4, 'QERWESTDRYTFUGYIHUOIKSDFGHVBJNKMLZXCVBNKLM,;.\'SDXFYCGVHBJNKML,YTUIYUOPIO[P][]', '2024-04-23 15:35:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `id` int(10) NOT NULL,
  `foto_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `tgl_like` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nama_lengkap`, `alamat`) VALUES
(1, 'nauki', '$2y$10$cu4Pjn6ui0uF89380GZIC.9dtvSfo2l3jaemn2RoHsQWKO10Hbnk2', 'nauki@gmail.com', 'naukiatha', 'Bakalan'),
(2, 'fatir', '$2y$10$A8tmOQqUIogSvAwkMWbJhOJSbintrdn76./BJIVSwf8d8G02EfGme', 'rijal@gmail.com', 'fatiraan', 'Bakalan'),
(3, 'kusmadi', '$2y$10$SscIpTpSQ8duZEeLmCMj2.v3UJMNPRgnKT8Dga8AGujKAFQF5tZTG', 'kusmadi@gmail.com', 'kusmadi', 'malang'),
(4, 'farhan', '$2y$10$ll9Ed3/VBtM1DLK0gEuq.OtkJyAazt2C8qSbD6LmFlVonbL3IaVay', 'farhan@gmail.com', 'farhan', 'malang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_album` (`nama_album`),
  ADD KEY `FKalbum346010` (`user_id`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judul` (`judul`),
  ADD KEY `FKfoto401898` (`user_id`),
  ADD KEY `FKfoto129237` (`album_id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKkomentar336920` (`foto_id`),
  ADD KEY `FKkomentar499777` (`user_id`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKlikefoto918430` (`foto_id`),
  ADD KEY `FKlikefoto755128` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `FKalbum346010` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `FKfoto129237` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKfoto401898` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `FKkomentar336920` FOREIGN KEY (`foto_id`) REFERENCES `foto` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKkomentar499777` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `FKlikefoto755128` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FKlikefoto918430` FOREIGN KEY (`foto_id`) REFERENCES `foto` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
