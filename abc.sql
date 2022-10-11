-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220707.a5d60f5698
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 11 Okt 2022 pada 08.03
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `deskripsi`, `image`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Atem Mini', 'ATEM Mini merupakan sebuah pengubah produksi langsung empat input dengan panel kontrol terintegrasi.', 'atemmini.jpeg', '5000000', '2022-07-05 07:09:09', NULL),
(2, 'Mac Mini M1', 'Mac Mini dengan processor Apple M1 Chip berbasis ARM dengan dukungan memory unified sebesar 8GB.', 'macminim1.jpeg', '11500000', '2022-07-05 06:57:46', '2022-07-05 06:57:46'),
(3, 'Logitech G733', 'Headset Wireless dengan teknologi lightspeed yang memiliki fitur daya tahan baterai lebih dari 29 jam dan fitur wireless sejauh 20 meter.', 'logi.jpg', '1900000', '2022-07-05 07:08:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `pesanan_id` varchar(255) NOT NULL,
  `barang_id` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `province_id` varchar(255) NOT NULL,
  `city_id` varchar(255) NOT NULL,
  `kurir` varchar(255) NOT NULL,
  `layanan_kurir` varchar(255) NOT NULL,
  `ongkir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'Kozzen', '$2y$10$VvZBvhKVSyiJfQzfhzzekOoSYf967gqnp7XFlheVTjtfl3SkGfwn6'),
(2, 'tim', '$2a$10$l.hYR5MnfErL2fHgPlUlneB2tX7reXEm6XxMjRNmbYEyQHB19EPd.'),
(3, 'tim123', '$2y$10$WIB3D/6XVFlVm5aQBQWy9ui0Z1JHExSNREuyAofFB830EbbaVsoiy'),
(4, 'tim12345', '$2y$10$WDiGuZkAL0J3tannkKkq5Os9jAqP8Zqpn2rZPFfFb.96NDdGnwNwi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



