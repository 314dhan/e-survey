-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 05:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `ds`
--

CREATE TABLE `ds` (
  `id_dosen` int(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ds`
--

INSERT INTO `ds` (`id_dosen`, `nama`, `email`, `password`) VALUES
(1, 'akip', 'akip@gmail.com', '$2y$10$iZvZ735BLRgJ7j3pef4oCOlt4V7MAepW2Ygu.fNnZeMJYc4EYPv0a'),
(2, 'doni', 'doni@gmail.com', '$2y$10$cG0xtXVcIjK6DVQKhZCCL.uJgEDuUdKzfSqwgnMjnollhidqv3Ip6'),
(3, 'nurkholis', 'olis@gmail.com', '$2y$10$mCPZzQutVXLAEARSC1kbH.KPgzqDWEGyz/.d.bSLeonGxZmKA7Xv2'),
(4, 'kahfi', 'kahfi@gmail.com', '$2y$10$uc8FW8hJJYFLKEwNMrL.8.4CJtty3ZCNcFO.8flilCYA/3d.391vu'),
(5, 'fani', 'fani@mail.com', '$2y$10$fgL/LtPI71vbht402dpdPOYDj8.H1dSOc5/KTEZLLX3uMY7Mi817O'),
(6, 'boim', 'ibrohim@gmail.com', '$2y$10$tg7C/hfbITuzitxeOa.0bepfxbHrhoC3CcWn/.BmmqXLNJJ5kGFH2'),
(7, 'dian', 'dian@gmail.com', '$2y$10$ncPzmb9H/PTTfSoFWSBgQ.mKtvMc.ckXkASR7vrzYKS6WnlBaVshO'),
(8, 'dimas', 'dimas@mail.com', '$2y$10$Vsz7smfnRie1bZxhoOfazeXhAsBTwtUt2S.BG1WXbxgQca4MJvlJO'),
(9, 'eka', 'eka@mail.com', '$2y$10$6WBEcEMuVnVzuUAdDlinruHfkTkW23uZpmRzMfR/5cUVp1XQyjUxe'),
(10, 'ema', 'ema@mail.com', '$2y$10$JQk6o909VwbjdnJwlNICcOlzKhxEoMM6ny.qbre6daLS.uD/rBgWC'),
(11, 'fika', 'fika@gmail.com', '$2y$10$kp9KieyaIDIePp6NuuCRnOO0tUjPqa3.AfP8MJ9UHy6HZrhjZvv9q'),
(12, 'gading', 'gading@mail.com', '$2y$10$y6GszhgfFIhX9cLcy0cOVeY1Ftu.8OO6Jk2.rJlYe0zyfEajOdwfa'),
(13, 'fitri', 'fitri@gmail.com', '$2y$10$CRRCRU2M9Jexkxo0e15h7OdyKNHz6ffHKWYu3k97UR.pCB8sUQAXO'),
(14, 'hisyam', 'hisyam@gmail.com', '$2y$10$rJbOqLqDk5ycZiHVKjNBkeoLT09Dj5b/qInGG/TaHxIhwbKbJJqvy'),
(15, 'david', 'david@gmail.com', '$2y$10$nG3QuuBz9SwM6pIMnql4qePHNaNR1apZLuXsOr5vB.gmdt7yPbFV2'),
(16, 'reynaldi', 'reynaldi@mail.com', '$2y$10$kEAt0ijymi/n/c8AUa9AEOes3i1W.fGOph1rKNgPCmD7Wb7.46uMi'),
(17, 'eli', 'eli@mail.com', '$2y$10$c9vbPJnAgVG6guu2DQe6F.jbivCln4QEnpd5CWjgWepf3ReYU47R.');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id_mahasiswa` int(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id_mahasiswa`, `email`, `nama`, `password`) VALUES
(1, 'rohmat@gmail.com', 'rohmat', '$2y$10$1eKERXSfNsGd9LTq.qXa3O8REVTcd8lwNlZjoXERK6ce/JEF2jHda'),
(2, 'adrian@gmail.com', 'adri fachrezi', '$2y$10$pIIyrXh2YWz4Bm2PMwb5HuUcB.ChoUnatkCd4pEwrpK9g70jrriN.'),
(3, 'kris@gmail.com', 'kris', '$2y$10$c7wBzhKUCx2nab3UUOBUTOkJBBD8Wb0xXwCGqELrHd2zvW3baKodK'),
(4, 'willy@gmail.com', 'willy', '$2y$10$NCuidlEisas5fqVtKuC1.ukQFwDJjYKNNiqeWye2zZWoy7BKF8roG'),
(5, 'prima@gmail.co', 'primana', '$2y$10$Toq7BWJR0tRw544I73uKb.665qKPFbRBy3YPfdnsvL..LsIu91bMe'),
(6, 'danang@mail.com', 'danang', '$2y$10$M1D91W45TKHa.atLb6QPA.KU3kxBx5pLScYLObwsBsa/5coRlh7hO'),
(7, 'daniel@mail.com', 'daniel', '$2y$10$4ggXdl/DAEPTYYKtWcKqOOVGPlWXrdpYPMkK5ODgdiNe2a8JE5W.6'),
(8, 'ian@mail.com', 'ian', '$2y$10$IoHc4342rEWFxq3ypvAf3usq70CmGvi2OdaBYJgl3gdQpddUwEd6W'),
(9, 'sam@mail.com', 'sam', '$2y$10$4qoGBHlTkxDnxhTgdIkf0OPpphDmO0nwC1dvctUDDnlufSJQeuHYC'),
(10, 'melda@mail.com', 'melda', '$2y$10$7RvkTD3Zh3TzkQPUHwuWFegAasuCGvF2r/dKXKPhsb14hDTXQosK6'),
(11, 'ikbal@mail.com', 'ikbal', '$2y$10$KVgZo6ngL.tnVxIIutZhhuc3SYYWjOEkRfqNDAMaj7AMZfRNCXm36'),
(12, 'joko@mail.com', 'joko', '$2y$10$4ofnrWFbqwYkLPgiBUFgge4ZaNpqiWsCsuXbpDy1Wy/FPQBiD20/a'),
(13, 'josua@mail.com', 'josua', '$2y$10$YEP130qmGNJMvTH068Evjed6GDZ1b0z3VStBaYbSF/JeJvsphs9qC'),
(14, 'kevin@mail.com', 'kevin', '$2y$10$AqI2lXtU6wcL7HEvjcnule.0b5yCAaiatnTruK6l2V05HndL0uusK'),
(15, 'lala@mail.com', 'lala', '$2y$10$IIB9emUdY/.M.2M8crRKwukPjmT77Fvyjbio8GWs6b4tBU98eWftq'),
(16, 'leon@mail.com', 'leon', '$2y$10$kV0oCMRaaR3cOiSQOVlDGeOCvAYNSKGLQbwcDhwf4Ygo30.oY/lHe'),
(17, 'okta@mail.com', 'okta', '$2y$10$ttaOdTIY75WP2r7fXZs0MeQmBlhF2RSXQPQ1DbUsGTAQtuWbGqAQu'),
(18, 'rola@mail.com', 'rola', '$2y$10$d58b8tffuNBNpFrOMwwuU.26SpnwxX5F8tz6LoHpPT0gqb9lI0ge.');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_ds`
--

CREATE TABLE `pertanyaan_ds` (
  `no` int(11) NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertanyaan_ds`
--

INSERT INTO `pertanyaan_ds` (`no`, `pertanyaan`) VALUES
(1, 'Saya merasa dihargai dan diakui atas kontribusi saya di kampus saya.'),
(2, 'Saya merasa puas dengan kompensasi dan insentif yang saya terima dari kampus saya.'),
(3, 'Seberapa baik Anda dalam memberikan umpan balik yang konstruktif kepada mahasiswa mengenai kinerja dan kemajuan akademik mereka?'),
(4, 'Saya merasa memiliki kesempatan yang cukup untuk mengembangkan kompetensi dan karier saya.'),
(5, 'Saya merasa nyaman dengan lingkungan dan budaya kerja di kampus saya.'),
(6, 'Seberapa baik Anda dalam memfasilitasi diskusi terbuka dan interaktif di kelas guna mendorong partisipasi aktif mahasiswa?'),
(7, 'Saya merasa termotivasi untuk mengajar dan meneliti di kampus saya.'),
(8, 'Sejauh mana Anda memberikan kesempatan bagi mahasiswa untuk mengembangkan keterampilan praktis yang relevan dengan bidang studi mereka?');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_mhs`
--

CREATE TABLE `pertanyaan_mhs` (
  `no` int(11) NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertanyaan_mhs`
--

INSERT INTO `pertanyaan_mhs` (`no`, `pertanyaan`) VALUES
(1, 'Seberapa puas Anda dengan fasilitas kampus?'),
(2, 'Bagaimana penilaian Anda terhadap kualitas pengajaran yang diberikan oleh dosen di kampus ini?'),
(3, 'Sejauh mana kampus ini menyediakan fasilitas yang memadai untuk mendukung kegiatan belajar-mengajar?'),
(4, 'Bagaimana tingkat kepuasan Anda terhadap layanan administrasi dan pelayanan mahasiswa di kampus ini?'),
(5, 'Seberapa efektif sistem penilaian dan evaluasi di kampus ini dalam mengukur kemajuan dan pencapaian mahasiswa?'),
(6, 'Seberapa baik kampus ini memberikan kesempatan bagi mahasiswa untuk mengembangkan potensi dan minat di luar kegiatan akademik?'),
(7, 'Seberapa baik kampus ini memberikan kesempatan bagi mahasiswa untuk mengembangkan potensi dan minat di luar kegiatan akademik?'),
(8, 'Seberapa efektif kampus ini dalam memberikan dukungan dan bimbingan karier bagi mahasiswa?');

-- --------------------------------------------------------

--
-- Table structure for table `survey_ds`
--

CREATE TABLE `survey_ds` (
  `no` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jawaban1` varchar(255) DEFAULT NULL,
  `jawaban2` varchar(255) DEFAULT NULL,
  `jawaban3` varchar(255) DEFAULT NULL,
  `jawaban4` varchar(255) DEFAULT NULL,
  `jawaban5` varchar(255) DEFAULT NULL,
  `jawaban6` varchar(255) DEFAULT NULL,
  `jawaban7` varchar(255) DEFAULT NULL,
  `jawaban8` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_ds`
--

INSERT INTO `survey_ds` (`no`, `nama`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban5`, `jawaban6`, `jawaban7`, `jawaban8`) VALUES
(1, 'akip', '1', '2', '3', '3', '2', '3', '1', '2'),
(2, 'doni', '2', '2', '1', '2', '3', '2', '3', '2'),
(3, 'nurkholis', '3', '2', '3', '1', '2', '2', '2', '3'),
(4, 'kahfi', '2', '3', '3', '3', '2', '2', '3', '2'),
(17, 'fani', '2', '1', '3', '2', '2', '3', '1', '2'),
(30, 'boim', '3', '2', '3', '2', '1', '2', '2', '3'),
(31, 'dian', '1', '2', '2', '1', '3', '2', '3', '1'),
(32, 'dimas', '2', '3', '1', '2', '3', '1', '3', '3'),
(33, 'eka', '3', '3', '2', '3', '1', '1', '1', '3'),
(34, 'ema', '2', '1', '3', '2', '2', '3', '2', '3'),
(35, 'fika', '3', '2', '3', '1', '1', '3', '2', '2'),
(36, 'gading', '2', '2', '3', '2', '3', '2', '3', '1'),
(37, 'fitri', '3', '2', '1', '2', '3', '2', '1', '2'),
(38, 'hisyam', '1', '3', '1', '1', '3', '2', '3', '3'),
(39, 'david', '2', '1', '3', '1', '3', '2', '3', '2'),
(40, 'reynaldi', '2', '3', '3', '2', '1', '2', '3', '2'),
(42, 'eli', '3', '3', '2', '2', '2', '1', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `survey_mhs`
--

CREATE TABLE `survey_mhs` (
  `no` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jawaban1` varchar(255) DEFAULT NULL,
  `jawaban2` varchar(255) DEFAULT NULL,
  `jawaban3` varchar(255) DEFAULT NULL,
  `jawaban4` varchar(255) DEFAULT NULL,
  `jawaban5` varchar(255) DEFAULT NULL,
  `jawaban6` varchar(255) DEFAULT NULL,
  `jawaban7` varchar(255) DEFAULT NULL,
  `jawaban8` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_mhs`
--

INSERT INTO `survey_mhs` (`no`, `nama`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban5`, `jawaban6`, `jawaban7`, `jawaban8`) VALUES
(1, 'adri fachrezi', '1', '2', '3', '2', '3', '1', '3', '2'),
(2, 'kris', '3', '3', '2', '1', '3', '2', '2', '2'),
(3, 'willy', '2', '2', '2', '2', '1', '3', '2', '1'),
(8, 'danang', '2', '3', '2', '1', '2', '2', '3', '1'),
(9, 'daniel', '3', '2', '1', '2', '2', '3', '1', '2'),
(37, 'ian', '1', '2', '3', '2', '1', '2', '2', '3'),
(38, 'sam', '3', '2', '3', '2', '3', '3', '2', '3'),
(39, 'melda', '1', '2', '1', '2', '1', '2', '1', '2'),
(40, 'ikbal', '2', '1', '2', '1', '2', '1', '2', '1'),
(41, 'joko', '2', '3', '2', '3', '2', '3', '2', '3'),
(42, 'josua', '2', '1', '2', '2', '3', '2', '2', '1'),
(43, 'kevin', '2', '2', '1', '2', '2', '3', '2', '2'),
(44, 'lala', '3', '2', '3', '2', '1', '2', '1', '2'),
(45, 'rohmat', '1', '2', '1', '2', '3', '2', '1', '1'),
(46, 'primana', '3', '2', '2', '3', '1', '2', '2', '2'),
(47, 'leon', '1', '2', '3', '2', '2', '3', '1', '2'),
(48, 'okta', '3', '1', '2', '2', '3', '2', '1', '1'),
(49, 'rola', '3', '2', '2', '1', '2', '2', '3', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds`
--
ALTER TABLE `ds`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `idx_nama` (`nama`);

--
-- Indexes for table `pertanyaan_ds`
--
ALTER TABLE `pertanyaan_ds`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `pertanyaan_mhs`
--
ALTER TABLE `pertanyaan_mhs`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `survey_ds`
--
ALTER TABLE `survey_ds`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `survey_mhs`
--
ALTER TABLE `survey_mhs`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ds`
--
ALTER TABLE `ds`
  MODIFY `id_dosen` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id_mahasiswa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pertanyaan_ds`
--
ALTER TABLE `pertanyaan_ds`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pertanyaan_mhs`
--
ALTER TABLE `pertanyaan_mhs`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `survey_ds`
--
ALTER TABLE `survey_ds`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `survey_mhs`
--
ALTER TABLE `survey_mhs`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `survey_ds`
--
ALTER TABLE `survey_ds`
  ADD CONSTRAINT `survey_ds_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `ds` (`nama`);

--
-- Constraints for table `survey_mhs`
--
ALTER TABLE `survey_mhs`
  ADD CONSTRAINT `survey_mhs_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `mhs` (`nama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
