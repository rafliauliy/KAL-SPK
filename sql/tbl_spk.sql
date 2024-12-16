-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2024 pada 05.30
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_spk`
--

CREATE TABLE `tbl_spk` (
  `id_spk` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `produk` varchar(255) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `asal_muat` varchar(255) DEFAULT NULL,
  `tujuan_bongkar` varchar(255) DEFAULT NULL,
  `tarif_jasa` varchar(255) DEFAULT NULL,
  `nomor_cs` varchar(255) DEFAULT NULL,
  `jenis_pekerjaan` varchar(255) DEFAULT NULL,
  `keterangan_pekerjaan` varchar(255) DEFAULT NULL,
  `tgl_spk` varchar(255) DEFAULT NULL,
  `volume` varchar(255) DEFAULT NULL,
  `jenis_angkutan` varchar(225) DEFAULT NULL,
  `jumlah_unit` varchar(255) DEFAULT NULL,
  `termin` varchar(255) DEFAULT NULL,
  `mincharge` varchar(255) DEFAULT NULL,
  `nama_kapal` varchar(255) DEFAULT NULL,
  `nama_pic` varchar(255) DEFAULT NULL,
  `jabatan_pic` varchar(255) DEFAULT NULL,
  `approval` varchar(255) DEFAULT NULL,
  `rencana_kerja` date DEFAULT NULL,
  `rencana_kerja_akhir` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `status_approval` enum('pending','approved','rejected') DEFAULT 'pending',
  `qr_code` text DEFAULT NULL,
  `status_verifikasi` varchar(225) DEFAULT NULL,
  `nomor_uniq` varchar(10) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_spk`
--
ALTER TABLE `tbl_spk`
  ADD PRIMARY KEY (`id_spk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_spk`
--
ALTER TABLE `tbl_spk`
  MODIFY `id_spk` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
