-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2022 pada 11.58
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webspp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `user_admin` varchar(50) NOT NULL,
  `pass_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `user_admin`, `pass_admin`) VALUES
(5, 'Siti Fatimah', 'siti', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkatan`
--

CREATE TABLE `angkatan` (
  `id_angkatan` int(11) NOT NULL,
  `nama_angkatan` varchar(50) NOT NULL,
  `biaya` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `angkatan`
--

INSERT INTO `angkatan` (`id_angkatan`, `nama_angkatan`, `biaya`) VALUES
(4, '2020/2021', '250000'),
(5, '2021/2022', '275000'),
(6, '2022/2023', '300000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Multimedia'),
(2, 'Akuntansi Keuangan Dan Lembaga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `kelas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kelas`) VALUES
(1, 'X AKL 1', 10),
(5, 'X AKL 2', 10),
(6, 'X MM 1', 10),
(7, 'X MM 2', 10),
(8, 'XI AKL 1 ', 11),
(9, 'XI AKL 2', 11),
(10, 'XI MM 1', 11),
(11, 'XI MM 2', 11),
(12, 'XII AKL 1', 12),
(13, 'XII AKL 2', 12),
(14, 'XII MM 1', 12),
(15, 'XII MM 2', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idspp` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jatuhtempo` varchar(50) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `nobayar` varchar(50) NOT NULL,
  `tglbayar` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `ket` varchar(50) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `kelas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idspp`, `id_siswa`, `jatuhtempo`, `bulan`, `nobayar`, `tglbayar`, `jumlah`, `ket`, `id_admin`, `tahun`, `kelas`) VALUES
(1, 1, '2020', 'Juli 2020', '010820221136443644', '2022-08-01', '250000', 'LUNAS', 0, 2020, 10),
(2, 1, '2020', 'Agustus 2020', '010820221143474347', '2022-08-01', '250000', 'LUNAS', 0, 2020, 10),
(3, 1, '2020', 'September 2020', '010820221148564856', '2022-08-01', '250000', 'LUNAS', 0, 2020, 10),
(4, 1, '2020', 'Oktober 2020', '010820221148584858', '2022-08-01', '250000', 'LUNAS', 0, 2020, 10),
(5, 1, '2020', 'November 2020', '010820221157335733', '2022-08-01', '250000', 'LUNAS', 5, 2020, 10),
(6, 1, '2020', 'Desember 2020', '', '', '250000', 'BELUM DIBAYAR', 0, 2020, 10),
(7, 1, '2021', 'Januari 2021', '010820221158075807', '2022-08-01', '250000', 'LUNAS', 5, 2020, 10),
(8, 1, '2021', 'Februari 2021', '', '', '250000', 'BELUM DIBAYAR', 0, 2020, 10),
(9, 1, '2021', 'Maret 2021', '', '', '250000', 'BELUM DIBAYAR', 0, 2020, 10),
(10, 1, '2021', 'April 2021', '010820221156145614', '2022-08-01', '250000', 'LUNAS', 5, 2020, 10),
(11, 1, '2021', 'Mei 2021', '', '', '250000', 'BELUM DIBAYAR', 0, 2020, 10),
(12, 1, '2021', 'Juni 2021', '', '', '250000', 'BELUM DIBAYAR', 0, 2020, 10),
(13, 2, '2020', 'Juli 2020', '010820221137033703', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(14, 2, '2020', 'Agustus 2020', '010820221137053705', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(15, 2, '2020', 'September 2020', '010820221137073707', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(16, 2, '2020', 'Oktober 2020', '010820221138233823', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(17, 2, '2020', 'November 2020', '010820221138263826', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(18, 2, '2020', 'Desember 2020', '010820221138323832', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(19, 2, '2021', 'Januari 2021', '010820221138303830', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(20, 2, '2021', 'Februari 2021', '010820221138283828', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(21, 2, '2021', 'Maret 2021', '010820221138343834', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(22, 2, '2021', 'April 2021', '010820221138363836', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(23, 2, '2021', 'Mei 2021', '010820221138383838', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(24, 2, '2021', 'Juni 2021', '010820221138403840', '2022-08-01', '250000', 'LUNAS', 0, 2020, 11),
(25, 2, '2021', 'Juli 2021', '010820221139473947', '2022-08-01', '275000', 'LUNAS', 0, 2021, 12),
(26, 2, '2021', 'Agustus 2021', '010820221148404840', '2022-08-01', '275000', 'LUNAS', 0, 2021, 12),
(27, 2, '2021', 'September 2021', '010820221143314331', '2022-08-01', '275000', 'LUNAS', 0, 2021, 12),
(28, 2, '2021', 'Oktober 2021', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(29, 2, '2021', 'November 2021', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(30, 2, '2021', 'Desember 2021', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(31, 2, '2022', 'Januari 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(32, 2, '2022', 'Februari 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(33, 2, '2022', 'Maret 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(34, 2, '2022', 'April 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(35, 2, '2022', 'Mei 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(36, 2, '2022', 'Juni 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(37, 3, '2021', 'Juli 2021', '010820221156525652', '2022-08-01', '275000', 'LUNAS', 5, 2021, 12),
(38, 3, '2021', 'Agustus 2021', '010820221156545654', '2022-08-01', '275000', 'LUNAS', 5, 2021, 12),
(39, 3, '2021', 'September 2021', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(40, 3, '2021', 'Oktober 2021', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(41, 3, '2021', 'November 2021', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(42, 3, '2021', 'Desember 2021', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(43, 3, '2022', 'Januari 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(44, 3, '2022', 'Februari 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(45, 3, '2022', 'Maret 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(46, 3, '2022', 'April 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(47, 3, '2022', 'Mei 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12),
(48, 3, '2022', 'Juni 2022', '', '', '275000', 'BELUM DIBAYAR', 0, 2021, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_angkatan` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `id_angkatan`, `id_jurusan`, `id_kelas`, `alamat`) VALUES
(1, '20220801113335', 'W', '2020/2021', 1, 5, 'Asdasd'),
(2, '20220801113359', 'R', '2021/2022', 1, 14, 'Adsds'),
(3, '20220801115635', 'Rty', '2021/2022', 1, 14, 'Sdfsfsdfsdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswatemp`
--

CREATE TABLE `siswatemp` (
  `nisn` varchar(25) NOT NULL,
  `kls10` varchar(10) NOT NULL,
  `kls11` varchar(10) NOT NULL,
  `kls12` varchar(10) NOT NULL,
  `tahun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswatemp`
--

INSERT INTO `siswatemp` (`nisn`, `kls10`, `kls11`, `kls12`, `tahun`) VALUES
('20220801113335', 'X AKL 2', '', '', '2020/2021'),
('20220801113359', '', 'XI MM 2', 'XII MM 1', '2020/2021'),
('20220801115635', '', '', 'XII MM 1', '2021/2022');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idspp`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `siswatemp`
--
ALTER TABLE `siswatemp`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idspp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
