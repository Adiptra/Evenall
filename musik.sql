-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2022 pada 13.50
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `audio`
--

CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `nm_lagu` varchar(100) NOT NULL,
  `audio_url` text CHARACTER SET latin1 NOT NULL,
  `nm_artis` varchar(100) NOT NULL,
  `img_url` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `audio`
--

INSERT INTO `audio` (`id`, `nm_lagu`, `audio_url`, `nm_artis`, `img_url`) VALUES
(12, 'Right Now', 'audio-6373b84c4f4554.93269428.mp3', 'One Direction', 'image-6373b84c4fc8c2.35496707.jpg'),
(13, 'Strong', 'audio-6373b885ef1f45.58938034.mp3', 'One Direction', 'image-6373b885f012f7.27375493.jpg'),
(14, 'Snowman', 'audio-6373bc6b385646.80793421.mp3', 'Sia', 'image-6373bc6b3973a2.43707137.png'),
(15, 'Line Without A Hook', 'audio-6373be64726989.35887241.mp3', 'Ricky Montgomery', 'image-6373be6472ec56.93196411.jpg'),
(16, 'Hati - hati di Jalan', 'audio-6373bedd64f4e2.60527700.mp3', 'Tulus', 'image-6373bedd6578e9.26167116.jfif'),
(17, 'Under The Influence', 'audio-637a5a634f6cd8.38372876.mp3', 'Chris Brown', 'image-637a5a634fd9a8.50613577.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
