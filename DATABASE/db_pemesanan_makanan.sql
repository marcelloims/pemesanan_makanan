-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2022 pada 19.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemesanan_makanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_orders`
--

CREATE TABLE `tb_detail_orders` (
  `no_invoice` varchar(25) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `meja` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menus`
--

CREATE TABLE `tb_menus` (
  `kode_menu` int(11) NOT NULL,
  `nama_menu` varchar(225) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `promo` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(225) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_menus`
--

INSERT INTO `tb_menus` (`kode_menu`, `nama_menu`, `kategori`, `harga`, `promo`, `deskripsi`, `foto`, `status`) VALUES
(1, 'Indomie Goreng', 'Makanan', 15000, 0, 'Indomie Goreng Jaju Coffe berisikan telur mata sapi, krupuk, tomat, timun dan sayuran', 'mie-goreng.jpg', 'Ready'),
(2, 'Indomie Kuah', 'Makanan', 15000, 0, 'Indomie Kuah Jaju Coffe berisikan telur dan sayuran', 'mie-kuah.jpg', 'Ready'),
(3, 'Nasi Goreng', 'Makanan', 17000, 0, 'Nasi goreng Jaju Coffee dibuat dengan menggunakan nasi, telur, sayuran dan daging ayam yang diaduk rata', 'nasi-goreng.jpg', 'Ready'),
(4, 'Kentang Goreng', 'Makanan', 15000, 0, 'Kentang Goreng yang disajikan dengan saus tomat dan mayones', 'kentang-goreng.jpg', 'Ready'),
(5, 'Ice Tea', 'Ice', 8000, 0, 'Es teh atau Teh es adalah teh yang disajikan dengan air dan es batu. Es teh sering kali ditambahkan rasa seperti melati, dan buah-buahan seperti limun, ceri, dan arbei, atau susu.', 'ice-tea.jpg', 'Ready'),
(6, 'Americano', 'Hot', 19000, 0, 'Americano merupakan kopi yang terbuat dari satu sloki espresso dan 8 ons air panas', 'americano-coffee.png', 'Ready'),
(7, 'Caffe Latte', 'Hot', 20000, 0, 'minuman yang berasal dari Italia yang berarti Kopi Susu. Minuman yang berbahan dasar espresso, dan susu dengan perbandingan 2:1 antara susu dan kopi. Latte atau Caffe Latte sekarang ini sedang banyak digemari oleh anak muda yang memiliki kecintaan kepada kopi tetapi tidak kuat dengan pekatnya kandungan kopi.', 'caffe-late.png', 'Ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_orders`
--

CREATE TABLE `tb_orders` (
  `no_invoice` varchar(25) NOT NULL,
  `tanggal_invoice` datetime NOT NULL,
  `meja` int(11) NOT NULL,
  `status_pesanan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `email`, `username`, `password`, `role_id`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_menus`
--
ALTER TABLE `tb_menus`
  ADD PRIMARY KEY (`kode_menu`);

--
-- Indeks untuk tabel `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`no_invoice`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_menus`
--
ALTER TABLE `tb_menus`
  MODIFY `kode_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
