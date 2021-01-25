-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2021 pada 13.10
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
-- Database: `db_codeigniter_pemesanan_makanan`
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

--
-- Dumping data untuk tabel `tb_detail_orders`
--

INSERT INTO `tb_detail_orders` (`no_invoice`, `kode`, `nama`, `meja`, `qty`, `harga`, `sub_total`) VALUES
('ABC25012021-001', 'MKN-200121-3', 'Nasi Goreng', 3, 1, 10000, 10000),
('ABC25012021-001', 'MKN-200121-4', 'Empek-Empel Kapal Selam', 3, 1, 25000, 25000),
('ABC25012021-001', 'MMN-210121-1', 'Ice - Hot Tea', 3, 1, 5000, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menus`
--

CREATE TABLE `tb_menus` (
  `kode_menu` varchar(25) NOT NULL,
  `nama_menu` varchar(225) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(225) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_menus`
--

INSERT INTO `tb_menus` (`kode_menu`, `nama_menu`, `kategori`, `harga`, `deskripsi`, `foto`, `status`) VALUES
('MKN-200121-1', 'Kwetiao Goreng', 'Makanan', 20000, 'Kwetiau goreng adalah kwetiau yang digoreng yang merupakan masakan Tionghoa Indonesia, itu adalah hidangan mie yang digoreng yang beraroma dan pedas yang umum dijumpai di Indonesia', 'ketiauw_goreng1.jpg', 'Ready'),
('MKN-200121-2', 'Mie Ayam', 'Makanan', 12000, 'Mi ayam atau bakmi ayam adalah masakan Indonesia yang terbuat dari mi kuning direbus mendidih kemudian ditaburi saus kecap khusus beserta daging ayam dan sayuran', 'Mie_Ayam.jpg', 'Ready'),
('MKN-200121-3', 'Nasi Goreng', 'Makanan', 10000, 'Nasi goreng adalah sebuah makanan berupa nasi yang digoreng dan diaduk dalam minyak goreng, margarin atau mentega, biasanya ditambah kecap manis, bawang merah, bawang putih, asam jawa, lada dan bumbu-bumbu lainnya, seperti telur, ayam, dan kerupuk.', 'Nasi_Goreng.jpg', 'Ready'),
('MKN-200121-4', 'Empek-Empel Kapal Selam', 'Makanan', 25000, 'Pempek atau empek-empek adalah makanan yang terbuat dari daging ikan yang digiling lembut yang dicampur tepung kanji atau tepung sagu, serta komposisi beberapa bahan lain seperti telur, bawang putih yang dihaluskan, penyedap rasa, dan garam', 'Pek_Empek_Kapal_Selam.jpg', 'Kosong'),
('MKN-200121-5', 'Batagor', 'Makanan', 10000, 'Batagor merupakan jajanan khas Bandung yang mengadaptasi gaya Tionghoa-Indonesia dan kini sudah dikenal hampir di seluruh wilayah Indonesia.', 'batagor.jpg', 'Ready'),
('MMN-210121-1', 'Ice - Hot Tea', 'Minuman', 5000, 'Es teh atau Teh es adalah teh yang didinginkan dengan es batusss', 'es_teh3.jpg', 'Ready'),
('MMN-210121-2', 'Ice - Hot Orange', 'Minuman', 5000, 'Es jeruk atau Jeruk es adalah jeruk yang didinginkan dengan es batu yang manus', 'es_jeruk2.jpg', 'Kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_orders`
--

CREATE TABLE `tb_orders` (
  `no_invoice` varchar(25) NOT NULL,
  `tanggal_invoice` varchar(225) NOT NULL,
  `meja` int(11) NOT NULL,
  `status_pesanan` varchar(225) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pelayan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_orders`
--

INSERT INTO `tb_orders` (`no_invoice`, `tanggal_invoice`, `meja`, `status_pesanan`, `id_user`, `nama_pelayan`) VALUES
('ABC25012021-001', '25-Jan-2021', 3, 'Dalam Proses', 2, 'Marcell');

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
(2, 'marcelloimanuel25@gmail.com', 'Marcell', '1234', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `UID` bigint(20) UNSIGNED NOT NULL,
  `Fuid` varchar(100) NOT NULL,
  `Ffname` varchar(60) NOT NULL,
  `Femail` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `UID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
