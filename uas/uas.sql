-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2022 pada 05.11
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buy`
--

INSERT INTO `buy` (`id`, `barang`, `nama_barang`, `nama`, `email`, `alamat`, `harga`, `jumlah`, `nama_file`, `waktu`) VALUES
(49, 'advan.jpg', 'advan', 'maulana', 'maulanasmd123@gmail.com', 'panjaitan', 5000000, 3, '63886f80bbbfe.png', '2022-12-01 09:10:24'),
(50, 'BFGoodrich KO-2.png', 'BFGoodrich KO-2', 'maulana', 'maulanasmd123@gmail.com', 'panjaitan', 6000000, 3, '63887d3c9a359.png', '2022-12-01 10:09:00'),
(51, 'Brixton Rs.png', 'Brixton Rs', 'maulana', 'maulanasmd123@gmail.com', 'Juanda', 120000000, 0, '6388ad4641b7a.png', '2022-12-01 13:33:58'),
(52, 'Brixton Rs.png', 'Brixton Rs', 'maulana', 'maulanasmd123@gmail.com', 'Juanda', 120000000, 1, '6388ad6b337df.png', '2022-12-01 13:34:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `nama`, `jenis`, `harga`, `nama_file`, `waktu`) VALUES
(43, 'Work Kiwami', 'Velg', 25000000, 'Work Kiwami.png', '2022-12-01 09:11:45'),
(75, 'Advan Neova', 'Tire', 5000000, 'Advan Neova.jpg', '2022-12-01 09:12:21'),
(77, 'Volk Rays TE-37', 'Velg', 35000000, 'Volk Rays TE-37.png', '2022-12-01 09:13:33'),
(78, 'BFGoodrich KO-2', 'Tire', 6000000, 'BFGoodrich KO-2.png', '2022-12-01 09:13:04'),
(79, 'Brixton Rs', 'Velg', 120000000, 'Brixton Rs.png', '2022-12-01 09:14:25'),
(80, 'BBS LS', 'Velg', 30000000, 'BBS LS.png', '2022-12-01 09:15:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`) VALUES
(12, 'eko', '$2y$10$QbcmgzibDFoQBSFWVMWBXuIoNvrGZboBTS.YnxqvxsKTl3/PP1Jzu', 'eko@gmail.com', 'user'),
(20, 'admin', '$2y$10$2Igsq4EE3g8SIB.xN39zruRoceqUooISSEvQdBsvqKpNryttOd04W', '', 'admin'),
(22, 'admin123', '$2y$10$XPlgImrZB5x2bHistmiXeOk.KkKEF9pvhMkHpubpTvuiK8PHCU8bK', '', 'admin'),
(24, 'user', '$2y$10$1KdCB7FpZPA0j3e4GiIMquqGIqh.homB05VUfxKHMwmkn03m1c.sy', 'user@gmail.com', 'user'),
(25, 'user1', '$2y$10$9u73c/ahdjQw9uIqU7O5MenRH/kpHyHKpdBfSfU9L0anPvNujf2B6', 'user123@gmail.com', 'user'),
(29, 'admin1', '$2y$10$I/1LN/fz3IkAxlA1/ar0IurbewWAOnwDK0LoEvBA7HhpGKMW2Qada', '', 'admin'),
(30, 'dimas', '$2y$10$KtRW0UlvvgAA3uBcVU6Re..h.kRQXoHpSkqQg4aFXKG56yKURLVgm', 'dimas@gmail.com', 'user'),
(31, 'admin2', '$2y$10$1bxmUowAnZ4xq8cJf7KGQOmX.Le8d524o0pgrnIyc6eGLtu/bcFam', '', 'admin'),
(32, 'tes', '$2y$10$7VlMtfgygPGNwgTiz/hrO.xlgs9fBGiB6RUVVDhysDSy3yBQwXzea', '', 'admin'),
(33, 'admin111', '$2y$10$4QIQkk6xCX.xwuQ90gURuOB0uqodNwutVoDhFHFLm07QCjhRX18Am', '', 'admin'),
(34, 'maulana', '$2y$10$QvRbzCFtGj3xsWATwiTcqu5Eo2l1DXp9GkCTmwXwxoL/W899wThfa', 'maulanasmd123@gmail.com', 'user'),
(35, 'oyan', '$2y$10$eAQxdDH96hjwfDAVfUXqM.6CMfY8A4IhiVoIsplRvvZ0O/Mt4Ulre', '', 'admin'),
(36, 'scasc', '$2y$10$JdIK6I.or5DH.shy6fNuHurpALwkKWRFGWTq9YJZ/T5OI4dEyqa3a', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
