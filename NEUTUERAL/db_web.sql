-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2023 pada 10.33
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `password` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`) VALUES
(10, 'root', 'root@gmail.com', '$2y$10$1PvBj.oKFqA9bZpvx16z7esYsdKTC0u77lQAljbh.ar'),
(11, 'rafliansyah', 'raflisurya824@gmail.com', '$2y$10$n6hoIRzeYG.ukvpVk7bVhOy/s3xuklGQF1dgAkg4DzX'),
(12, 'a', 'admin@gmail.com', '$2y$10$AOwFU.tZXKDigX9ZmkM67.YB.RWyWvmmoC9yhcvGdsm'),
(13, 'vikka', 'vikka@gmail.com', '$2y$10$Z0kZEhESluiPG1O/QuYrb.vgqNeUwZtyd/id3R3SmRN'),
(14, 'aliyayah', 'ali@gmail.com', 'alii');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `category` char(50) NOT NULL,
  `body` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `operasional` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id`, `name`, `alamat`, `category`, `body`, `gambar`, `operasional`) VALUES
(6, 'balekambang', ' Kecamatan Bantur, dengan jarak 65km arah ke Selatan dari Kota Kabupaten Malang dan berada di laut S', 'waterfall', 'Pantai Balekambang adalah sebuah pantai di pesisir selatan yang terletak di tepi Samudra Indonesia secara administratif masuk wilayah Dusun Sumber Jambe, Desa Srigonco, Kecamatan Bantur, Kabupaten Malang, Jawa Timur dan merupakan salah satu wisata di', 'download.jpg', '03:58:00'),
(7, 'Sendang Biru', 'Desa Sumber Agung, Kecamatan Sumber Manjing Wetan, 69 km ke arah selatan dari pusat Kota Malang', 'Beach', 'Terdapat beberapa fasilitas penunjang pariwisata di Pantai Sendang Biru, diantaranya tersedianya lahan parkir, WC kamar mandi, mushola, warung makan, penginapan, rumah jaga dan persewaan perahu. Selain itu, pengunjung juga dapat mendirikan tenda di pinggir pantai sambil membakar ikan dan menikmati pesona indahnya Pantai Sendang Biru. Pantai Sendang Biru sering dikatakan sebagai pintu masuk untuk menuju Pulau Sempu, karena persis terletak di seberang Pulau Sempu. Selain itu, Pantai Sendang Biru juga dikenal sebagai tempat pelelangan ikan dan sebagai tempat mendarat perahu nelayan.\r\n\r\nPengunjung dapat membeli ikan-ikan segar hasil tangkapan langsung dari para nelayan sebagai oleh-oleh maupun disantap langsung di tempat. Perahu-perahu yang disewakan untuk wisatawan yang ingin berkeliling menikmati panorama Pantai Sendang Biru biasanya disewakan dengan harga 100 ribu untuk perahu bermotor dan 50 ribu untuk perahu dayung. Cobalah berhenti sejenak di tengah lautan untuk menikmati pemandangan bawah laut yang dapat terlihat jelas.', 'pantai-sendang-biru-1-1.jpg', '15:29:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
