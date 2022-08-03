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
(1, 'Kwetiau goreng', 'Makanan', 25000, 20000, 'Kwetiau goreng adalah kwetiau yang digoreng yang merupakan masakan Tionghoa Indonesia, itu adalah hidangan mie yang digoreng yang beraroma dan pedas yang umum dijumpai di Indonesia', 'ketiauw_goreng2.jpg', 'Ready'),
(2, 'Mie Ayam', 'Makanan', 7000, 0, 'Mi ayam adalah hidangan khas Indonesia yang terbuat dari mi gandum kuning yang dibumbui dengan daging ayam yang biasanya dipotong dadu', 'Mie_Ayam1.jpg', 'Ready'),
(3, 'Nasi Goreng', 'Makanan', 12000, 0, 'Nasi goreng adalah sebuah makanan berupa nasi yang digoreng dan diaduk dalam minyak goreng, margarin, atau mentega', 'Nasi_Goreng1.jpg', 'Ready'),
(4, 'Empek-empek Kapal Selam', 'Makanan', 25000, 0, 'Pempek atau empek-empek adalah makanan yang terbuat dari daging ikan yang digiling lembut yang dicampur tepung kanji atau tepung sagu, serta komposisi beberapa bahan lain seperti telur, bawang putih yang dihaluskan, penyedap rasa, dan garam', 'Pek_Empek_Kapal_Selam2.jpg', 'Ready'),
(5, 'Ice Tea', 'Ice', 4000, 0, 'Es teh atau Teh es adalah teh yang didinginkan dengan es batu. Es teh sering kali ditambahkan rasa seperti melati, dan buah-buahan seperti limun, ceri, dan arbei, atau susu.', 'es_teh4.jpg', 'Ready'),
(6, 'Cappuccino', 'Hot', 20000, 0, 'Kapucino adalah minuman khas Italia yang dibuat dari espreso dan susu, tetapi referensi lain juga ada yang menyebutkan bahwa kapucino berawal dari biji biji kopi tentara Turki yang tertinggal setelah peperangan yang di pimpin oleh Kara Mustapha Pasha di Wina, Austria melawan tentara gabungan Polandia-Germania', 'Cappuccino-PNG-File1.png', 'Ready');

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
(1, 'admin@gmail.com', 'admin', 'admin', 1),
(2, 'admin2@gmail.com', 'admin2', '1234', 2);

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
