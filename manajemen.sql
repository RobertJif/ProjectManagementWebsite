-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2019 pada 06.23
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_charter`
--

CREATE TABLE `project_charter` (
  `id` int(11) NOT NULL,
  `project_name` varchar(35) NOT NULL,
  `project_desc` varchar(35) NOT NULL,
  `start_date` varchar(35) NOT NULL,
  `end_date` varchar(35) NOT NULL,
  `duration` int(35) NOT NULL,
  `budget` varchar(35) NOT NULL,
  `project_manager` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project_charter`
--

INSERT INTO `project_charter` (`id`, `project_name`, `project_desc`, `start_date`, `end_date`, `duration`, `budget`, `project_manager`) VALUES
(44, 'test', 'test1', '10-02-2019', '10-02-2019', 1, '5000', 'a'),
(45, 'lala', 'lala', '21-02-2019', '28-02-2019', 7, '5000', 'wa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `project_charter`
--
ALTER TABLE `project_charter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `project_charter`
--
ALTER TABLE `project_charter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
