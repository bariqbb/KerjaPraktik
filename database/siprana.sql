-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2023 pada 21.41
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siprana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangpinjam`
--

CREATE TABLE `barangpinjam` (
  `id_pinjam` int(7) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barangpinjam`
--

INSERT INTO `barangpinjam` (`id_pinjam`, `nama_barang`, `jumlah`) VALUES
(42, 'Ruang_Kelas_X_1', 1),
(42, 'Laboratorium_Bahasa', 1),
(43, 'Laboratorium_Biologi', 1),
(44, 'Laboratorium_Bahasa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(7) NOT NULL,
  `id_user` int(7) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_balik` date NOT NULL,
  `pj` varchar(100) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `status` enum('Diterima','Menunggu Konfirmasi','Ditolak','Masa Pinjam','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_user`, `tanggal_pinjam`, `tanggal_balik`, `pj`, `no_telp`, `status`) VALUES
(42, 1, '2023-04-01', '2023-04-07', 'Bariq', '1', 'Masa Pinjam'),
(43, 1, '2023-04-01', '2023-04-04', 'Bariq Baharudin Bhagawanta', '1', 'Menunggu Konfirmasi'),
(44, 1, '2023-04-01', '2023-04-20', 'Ahmad', '1', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarpras`
--

CREATE TABLE `sarpras` (
  `id_barang` int(7) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sarpras`
--

INSERT INTO `sarpras` (`id_barang`, `nama_barang`, `keterangan`, `jenis`, `jumlah`, `status`) VALUES
(1, 'Laboratorium Bahasa', 'Bebas', 'Ruangan', 0, 'Tidak Tersedia'),
(2, 'Laboratorium Biologi', 'Bebas', 'Ruangan', 3, 'Tersedia'),
(4, 'Laboratorium Fisika', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(5, 'Laboratorium Kimia', 'Bebas', 'Ruangan', 2, 'Tersedia'),
(7, 'Laboratorium Komputer', 'Bebas', 'Ruangan', 3, 'Tersedia'),
(10, 'Masjid', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(11, 'Perpustakaan', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(12, 'Ruang Rapat TU', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(13, 'Ruang Kelas X 1', 'Bebas', 'Ruangan', 0, 'Tidak Tersedia'),
(14, 'Ruang Kelas X 2', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(15, 'Ruang Kelas X 3', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(16, 'Ruang Kelas X 4', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(17, 'Ruang Kelas X 5', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(18, 'Ruang Kelas X 6', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(19, 'Ruang Kelas X 7', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(20, 'Ruang Kelas X 8', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(21, 'Ruang Kelas X 9', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(22, 'Ruang Kelas X 10', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(23, 'Ruang Kelas X 11', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(24, 'Ruang Kelas XI MIPA 1', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(25, 'Ruang Kelas XI MIPA 2', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(26, 'Ruang Kelas XI MIPA 3', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(27, 'Ruang Kelas XI MIPA 4', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(28, 'Ruang Kelas XI MIPA 5', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(29, 'Ruang Kelas XI MIPA 6', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(30, 'Ruang Kelas XI MIPA 7', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(31, 'Ruang Kelas XI MIPA 8', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(32, 'Ruang Kelas XI IPS 1', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(33, 'Ruang Kelas XI IPS 2', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(34, 'Ruang Kelas XI BAHASA', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(35, 'Ruang Kelas XII MIPA 1', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(36, 'Ruang Kelas XII MIPA 2', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(37, 'Ruang Kelas XII MIPA 3', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(38, 'Ruang Kelas XII MIPA 4', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(39, 'Ruang Kelas XII MIPA 5', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(40, 'Ruang Kelas XII MIPA 6', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(41, 'Ruang Kelas XII MIPA 7', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(42, 'Ruang Kelas XII MIPA 8', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(43, 'Ruang Kelas XII IPS 1', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(44, 'Ruang Kelas XII IPS 2', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(45, 'Ruang Kelas XII BAHASA', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(67, 'Lapangan Bola', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(69, 'Lapangan Basket', 'Bebas', 'Ruangan', 1, 'Tersedia'),
(70, 'Kursi Siswa', 'Bebas', 'Ruangan', 1933, 'Tersedia'),
(71, 'Meja Siswa', 'Terbatas', 'Ruangan', 934, 'Tersedia'),
(72, 'Papan Tulis', 'Terbatas', 'Ruangan', 9, 'Tersedia'),
(76, 'Peralatan Atletik', 'Terbatas', 'Barang ', 20, 'Tersedia'),
(77, 'Peralatan Bola Basket', 'Terbatas', 'Barang ', 10, 'Tersedia'),
(78, 'Peralatan Bola Voli', 'Terbatas', 'Barang ', 10, 'Tersedia'),
(79, 'Peralatan Ketrampilan', 'Terbatas', 'Barang ', 12, 'Tersedia'),
(80, 'Tandu', 'Terbatas', 'Ruangan', 6, 'Tersedia'),
(81, 'Peralatan P3K', 'Terbatas', 'Barang ', 11, 'Tersedia'),
(82, 'Tenda', 'Bebas', 'Barang', 1, 'Tersedia'),
(87, 'LCD Proyektor', 'Bebas', 'Barang', 8, 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(7) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `role`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(2, 'siswa', 'siswa', 'siswa1', 'siswa'),
(3, 'umum', 'umum', 'umum1', 'umum');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangpinjam`
--
ALTER TABLE `barangpinjam`
  ADD KEY `fk_pinjam` (`id_pinjam`),
  ADD KEY `fk_barang` (`nama_barang`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `fk_userpinjam` (`id_user`);

--
-- Indeks untuk tabel `sarpras`
--
ALTER TABLE `sarpras`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `sarpras`
--
ALTER TABLE `sarpras`
  MODIFY `id_barang` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangpinjam`
--
ALTER TABLE `barangpinjam`
  ADD CONSTRAINT `fk_pinjam` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`id_pinjam`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_userpinjam` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
