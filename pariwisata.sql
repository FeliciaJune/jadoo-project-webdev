-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2025 at 03:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` char(2) NOT NULL,
  `admin_USER` char(30) NOT NULL,
  `admin_PASS` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_USER`, `admin_PASS`) VALUES
('11', 'Paes', '123'),
('12', 'Jay', '8e296a067a37563370ded05f5a3bf3ec');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `berita_ID` char(4) NOT NULL,
  `berita_JUDUL` varchar(120) NOT NULL,
  `berita_ISI` text NOT NULL,
  `berita_SUMBER` varchar(120) NOT NULL,
  `kategori_ID` char(4) NOT NULL,
  `berita_FOTO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`berita_ID`, `berita_JUDUL`, `berita_ISI`, `berita_SUMBER`, `kategori_ID`, `berita_FOTO`) VALUES
('BR1', 'Budaya Jawa', 'Merupakan warisan kebudayaan dari jaman kerajaan yang pertama kali berdiri di tanah Jawa.', 'Media Sosial', 'KT1', 'BudayaJawa.jpg'),
('BR2', 'Budaya Jawa', 'Merupakan warisan kebudayaan dari jaman kerajaan yang pertama kali berdiri di tanah Jawa.', 'Media Sosial', 'KT2', 'BudayaJawa.jpg'),
('BR3', 'Budaya Jawa', 'Merupakan warisan kebudayaan dari jaman kerajaan yang pertama kali berdiri di tanah Jawa.', 'Media Sosial', 'KT3', 'BudayaJawa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasi_ID` char(4) NOT NULL,
  `kategori_ID` char(4) NOT NULL,
  `kabupaten_ID` char(4) NOT NULL,
  `destinasi_NAMA` varchar(120) NOT NULL,
  `destinasi_ALAMAT` varchar(120) NOT NULL,
  `destinasi_FOTO` text NOT NULL,
  `destinasi_TRIP` text NOT NULL,
  `destinasi_IDR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasi_ID`, `kategori_ID`, `kabupaten_ID`, `destinasi_NAMA`, `destinasi_ALAMAT`, `destinasi_FOTO`, `destinasi_TRIP`, `destinasi_IDR`) VALUES
('D1', 'KT1', 'K1', 'Makam Teuku Umar', 'Gampong Mugo Rayeuk kecamatan Panton Reu Aceh Barat', 'Makam.jpeg', 'Salah satu wisata tempat bersejarah, Makam Teuku Umar dulunya sering berpindah dari satu lokasi ke lokasi lainnya guna untuk mengelabui para penjajah agar tidak dapat ditemukan. ', 'Rp 50.000'),
('D10', 'KT3', 'K3', 'RM. Batu Lambuik', 'JL. Raya Lubuk Basung', 'RM2.jpg', 'Rumah makan yang berada di tepian Danau Maninjau ini menyuguhkan makanan spesifik berupa Dendeng Batokok Lado Hijau dan Goreng Bada.', 'Rp 50.000'),
('D11', 'KT3', 'K3', 'Ampera Kelok 27', 'JL. Raya Lubuk Basung', 'RM3.jpg', 'Kalio merupakan kuliner khas Minang dengan bahan utama santan kelapa tua, rempah yang diracik menjadi gulai kental.', 'Rp 60.000'),
('D12', 'KT3', 'K3', 'Sate Mak Sunguik', 'JL. Raya Maninjau', 'RM4.jpg', 'Sate Mak Sunguik yang legendaris akan menyambut perjalanan Anda. Meski sate merupakan makanan yang umum dijumpai, racikan Sate Mak Sunguik akan terasa sangat berbeda.', 'Rp 40.000'),
('D2', 'KT2', 'K2', 'Air Terjun Simonang', 'Perkebunan Padang Pulau, Kec. Bandar Pulau, Kabupaten Asahan', 'AirTerjun.jpg', 'Air Terjun ini memiliki pemandangan yang indah dan alami dengan aliran air yang terbelah menjadi 2 bagian.', 'Rp 20.000'),
('D3', 'KT3', 'K3', 'RM. Edi Tanjung', 'Jalan raya Tiku, Kecamatan Tanjung Mutiara, Kabupaten Agam', 'RM.jpg', 'Rumah makan yang sangat sayang untuk dilewatkan. Betapa tidak, di tempat ini kita bisa menyantap Gulai Kepala Ikan dan Sate Lokan yang nikmat.', 'Rp 100.000'),
('D4', 'KT1', 'K1', 'Masjid Raya Baiturrahman', 'Pusat Kota Banda Aceh', 'Masjid.jpeg', ' Salah satu masjid yang terindah di Indonesia yang memiliki tujuh kubah, empat menara dan satu menara induk.', 'Rp 40.000'),
('D5', 'KT1', 'K1', 'Pinto Khop', 'Kelurahan Sukaramai Kecamatan Baiturrahman Kota Banda Aceh', 'Khop.jpeg', 'Pinto Khop merupakan pintu penghubung antara Istana dan Taman Putroe Phang. Pinto Khop ini merupakan pintu gerbang berbentuk kubah.', 'Rp 35.000'),
('D6', 'KT1', 'K1', 'Gunongan', 'a di Kelurahan Sukaramai, Kecamatan Baiturrahman, Kota Banda Aceh.', 'Gunongan.jpeg', 'Gunongan merupakan simbol dan kekuatan cinta  Sultan Iskandar Muda kepada permaisurinya yang cantik jelita, Putri Phang (Putroe Phang) yang berasal dari Pahang,  Malaysia.', 'Rp 55.000'),
('D7', 'KT2', 'K2', 'Puncak Bukit Galau', 'Desa Mekar Marjanji, Kecamatan Aek Songsongan, Kabupaten Asahan, Sumatera Utara.', 'Galau.jpeg', 'Dari atas puncak bukit, kamu akan disuguhkan pemandangan dari hamparan tumbuhan hijau yang menyejukkan. ', 'Rp 20.000'),
('D8', 'KT2', 'K2', 'Pantai Simallo', 'Desa Aek Nagali, Kecamatan Bandar Pulau, Asahan, Sumatera Utara.', 'Simalo.jpeg', 'Pantai ini cukup unik, karena letaknya yang berada tepat dengan aliran sungai Aek Piasa. Selain itu, terdapat bebatuan yang menjulang tinggi di sekeliling pantai yang menjadi daya tarik tersendiri bagi pengunjung.', 'Rp 60.000'),
('D9', 'KT2', 'K2', 'Wisata Bedeng 7', 'Marjanji Aceh, Kecamatan Aek Songsongan, Kabupaten Asahan.', 'Bedeng.jpeg', 'Wisata Bedeng 7 menawarkan aliran sungai yang tenang dan jernih yang menyejukkan pikiran.', 'Rp 45.000');

-- --------------------------------------------------------

--
-- Table structure for table `felicia`
--

CREATE TABLE `felicia` (
  `perkenalan_ID` int(5) NOT NULL,
  `Yfelicia` varchar(120) NOT NULL,
  `825230136felicia` int(20) NOT NULL,
  `Keterangan` varchar(250) NOT NULL,
  `perkenalan_FOTO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `felicia`
--

INSERT INTO `felicia` (`perkenalan_ID`, `Yfelicia`, `825230136felicia`, `Keterangan`, `perkenalan_FOTO`) VALUES
(12345, 'Felicia June', 825230136, 'Halo, nama saya Felicia June angkatan 2023 kelas A, dengan NIM 825230136 dari jurusan sistem informasi fakultas teknologi.', 'orang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupaten_ID` char(4) NOT NULL,
  `kabupaten_NAMA` varchar(120) NOT NULL,
  `provinsi_ID` char(4) NOT NULL,
  `kabupaten_ALAMAT` varchar(120) NOT NULL,
  `kabupaten_FOTO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`kabupaten_ID`, `kabupaten_NAMA`, `provinsi_ID`, `kabupaten_ALAMAT`, `kabupaten_FOTO`) VALUES
('K1', 'Aceh Barat', 'P1', 'JL. Gajah Mada', 'NADAceh.png'),
('K2', 'Asahan', 'P2', 'JL. Plamboyan Sibogat', 'SumatraUtara.png'),
('K3', 'Agam', 'P3', ' JL. Padang Baru - Lubuk Basung', 'SumateraBarat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_ID` char(4) NOT NULL,
  `kategori_NAMA` char(30) NOT NULL,
  `kategori_KET` varchar(120) NOT NULL,
  `kategori_FOTO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_ID`, `kategori_NAMA`, `kategori_KET`, `kategori_FOTO`) VALUES
('KT1', 'Sejarah', 'Tempat-tempat bersejarah untuk mengenal lebih jauh tentang masa lalu suatu tempat.', 'Sejarah.jpeg'),
('KT2', 'Alam', 'Merupakan wisata yang banyak dikaitkan dengan kegemaran akan keindahan alam.', 'Alam.jpg'),
('KT3', 'Kuliner', 'Wisata kuliner untuk mencicipi hidangan khas suatu daerah atau negara.', 'Kuliner.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kecamatan_ID` char(4) NOT NULL,
  `kecamatan_NAMA` varchar(120) NOT NULL,
  `kabupaten_ID` char(4) NOT NULL,
  `kecamatan_FOTO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kecamatan_ID`, `kecamatan_NAMA`, `kabupaten_ID`, `kecamatan_FOTO`) VALUES
('C1', 'Aboy', 'K1', 'gambar1.jpg'),
('C2', 'Abukii', 'K2', 'gambar2.jpeg'),
('C3', 'Abunn', 'K3', 'gambar3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `pengalaman_ID` char(4) NOT NULL,
  `pengalaman_JUDUL` varchar(120) NOT NULL,
  `pengalaman_SUB` varchar(120) NOT NULL,
  `pengalaman_KET` varchar(255) NOT NULL,
  `pengalaman_VID` varchar(255) NOT NULL,
  `pengalaman_FOTO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`pengalaman_ID`, `pengalaman_JUDUL`, `pengalaman_SUB`, `pengalaman_KET`, `pengalaman_VID`, `pengalaman_FOTO`) VALUES
('PN1', 'Best Destinations around the world', 'Travel, enjoy and live a new and full life', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop pu', 'WEaLQvjUWxo', 'hero2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsi_ID` char(4) NOT NULL,
  `provinsi_NAMA` varchar(120) NOT NULL,
  `provinsi_FOTO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`provinsi_ID`, `provinsi_NAMA`, `provinsi_FOTO`) VALUES
('P1', 'NAD Aceh', 'NADAceh.png'),
('P2', 'Sumatera Utara', 'SumatraUtara.png'),
('P3', 'Sumatera Barat', 'SumateraBarat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `testi_ID` char(4) NOT NULL,
  `testi_JUDUL` varchar(120) NOT NULL,
  `testi_ISI` varchar(120) NOT NULL,
  `testi_NAMA` varchar(120) NOT NULL,
  `testi_KotaNeg` varchar(120) NOT NULL,
  `testi_FOTO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`testi_ID`, `testi_JUDUL`, `testi_ISI`, `testi_NAMA`, `testi_KotaNeg`, `testi_FOTO`) VALUES
('T1', 'What People Say About Us.', 'Layanannya sangat memuaskan, staf ramah dan rapih.', 'Joshua', 'Jakarta, Indonesia', 'testi1.jpeg'),
('T2', 'What People Say About Us.', 'Layanannya sangat memuaskan.', 'Mark', 'Bandung, Indonesia', 'testi2.jpg'),
('T3', 'What People Say About Us.', 'Staf ramah dan responsif.', 'Mingyu', 'Surabaya, Indonesia', 'testi3.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_ID`),
  ADD KEY `kategori_ID` (`kategori_ID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasi_ID`);

--
-- Indexes for table `felicia`
--
ALTER TABLE `felicia`
  ADD PRIMARY KEY (`perkenalan_ID`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupaten_ID`),
  ADD KEY `kabupaten_ibfk_1` (`provinsi_ID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_ID`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kecamatan_ID`),
  ADD KEY `kabupaten_ID` (`kabupaten_ID`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`pengalaman_ID`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsi_ID`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`testi_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`kategori_ID`) REFERENCES `kategori` (`kategori_ID`);

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`provinsi_ID`) REFERENCES `provinsi` (`provinsi_ID`);

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`kabupaten_ID`) REFERENCES `kabupaten` (`kabupaten_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
