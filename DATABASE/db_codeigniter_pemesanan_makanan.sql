-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Apr 2022 pada 02.31
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
('ABC26042022-001', 'MMN-210121-2', 'Ice Coffee', 5, 1, 12000, 12000),
('ABC26042022-001', 'MKN-200121-2', 'Mie Ayam', 5, 1, 12000, 12000),
('ABC26042022-002', 'MKN-200121-2', 'Mie Ayam', 2, 1, 12000, 12000),
('ABC26042022-002', 'MKN-200121-1', 'Kwetiao Goreng', 2, 1, 20000, 20000),
('ABC26042022-002', 'MKN-200121-3', 'Nasi Goreng', 2, 1, 10000, 10000),
('ABC26042022-002', 'MMN-210121-2', 'Ice Coffee', 2, 1, 12000, 12000),
('ABC26042022-002', 'MMN-210121-1', 'Vietnam Drip', 2, 1, 10000, 10000),
('ABC26042022-003', 'MKN-200121-2', 'Mie Ayam', 1, 1, 12000, 12000),
('ABC26042022-003', 'MKN-200121-3', 'Nasi Goreng', 1, 2, 10000, 20000);

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
('MMN-210121-1', 'Vietnam Drip', 'Minuman', 10000, 'Lorem Ipsum', 'es_teh3.jpg', 'Ready'),
('MMN-210121-2', 'Ice Coffee', 'Minuman', 12000, 'Lorem Ipsuum', 'ice_coffee.jpg', 'Ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_orders`
--

CREATE TABLE `tb_orders` (
  `no_invoice` varchar(25) NOT NULL,
  `tanggal_invoice` varchar(225) NOT NULL,
  `meja` int(11) NOT NULL,
  `status_pesanan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_orders`
--

INSERT INTO `tb_orders` (`no_invoice`, `tanggal_invoice`, `meja`, `status_pesanan`) VALUES
('ABC26042022-001', '26-Apr-2022', 5, 'Lunas'),
('ABC26042022-002', '26-Apr-2022', 2, 'Dalam Proses'),
('ABC26042022-003', '26-Apr-2022', 1, 'Dalam Proses');

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
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
