-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 22, 2020 at 06:01 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projektverwaltung`
--

-- --------------------------------------------------------

--
-- Table structure for table `abteilung`
--

CREATE TABLE `abteilung` (
  `id` int(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `Leiter` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `abteilung`
--

INSERT INTO `abteilung` (`id`, `name`, `Leiter`) VALUES
(1, 'Raumfahrt', 2),
(2, 'Fuhrpark', 4),
(3, 'Verwaltung', 3);

-- --------------------------------------------------------

--
-- Table structure for table `arbeitet_an`
--

CREATE TABLE `arbeitet_an` (
  `id` int(50) NOT NULL,
  `mitarbeiter` int(50) NOT NULL,
  `projekt` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arbeitet_an`
--

INSERT INTO `arbeitet_an` (`id`, `mitarbeiter`, `projekt`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 3),
(4, 5, 1),
(5, 1, 2),
(6, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mitarbeiter`
--

CREATE TABLE `mitarbeiter` (
  `id` int(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `vorname` varchar(30) NOT NULL,
  `abt` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mitarbeiter`
--

INSERT INTO `mitarbeiter` (`id`, `name`, `vorname`, `abt`) VALUES
(1, 'Müller', 'Anton', NULL),
(2, 'Geiger', 'Sven', 1),
(3, 'Schwab', 'Anita', 3),
(4, 'Görgens', 'Margit', 2),
(5, 'Hurz', 'Willy', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projekt`
--

CREATE TABLE `projekt` (
  `id` int(50) NOT NULL,
  `bezeichner` varchar(30) NOT NULL,
  `zugeord_abt` int(50) NOT NULL,
  `verantw_mitarb` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projekt`
--

INSERT INTO `projekt` (`id`, `bezeichner`, `zugeord_abt`, `verantw_mitarb`) VALUES
(1, 'Apollo13', 1, 5),
(2, 'Challenger', 1, 4),
(3, 'WebSeiten', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abteilung`
--
ALTER TABLE `abteilung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arbeitet_an`
--
ALTER TABLE `arbeitet_an`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abteilung`
--
ALTER TABLE `abteilung`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `arbeitet_an`
--
ALTER TABLE `arbeitet_an`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projekt`
--
ALTER TABLE `projekt`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
