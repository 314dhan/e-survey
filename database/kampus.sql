-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 06:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(2, 'doni', 'doni@gmail.com', '$2y$10$cG0xtXVcIjK6DVQKhZCCL.uJgEDuUdKzfSqwgnMjnollhidqv3Ip6');

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
(5, 'prima@gmail.co', 'primana', '$2y$10$Toq7BWJR0tRw544I73uKb.665qKPFbRBy3YPfdnsvL..LsIu91bMe');

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
(1, 'akip', '1', '2', '3', '4', '5', '4', '3', '2');

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
(1, 'adri fachrezi', '1', '2', '3', '4', '5', '4', '3', '2'),
(2, 'kris', '3', '3', '4', '4', '3', '2', '2', '2');

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
  MODIFY `id_dosen` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id_mahasiswa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `survey_ds`
--
ALTER TABLE `survey_ds`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_mhs`
--
ALTER TABLE `survey_mhs`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
