-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 12:31 AM
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
-- Database: `facture_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `idClient` int(11) NOT NULL,
  `nomClient` varchar(128) NOT NULL,
  `prenomClient` varchar(128) NOT NULL,
  `telephoneClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`idClient`, `nomClient`, `prenomClient`, `telephoneClient`) VALUES
(1, 'Smith', 'John', 2147483647),
(2, 'Johnson', 'Emily', 2147483647),
(3, 'Jones', 'Michael', 2147483647),
(4, 'Davis', 'Jessica', 2147483647),
(5, 'Brown', 'Christopher', 2147483647),
(6, 'Miller', 'Amanda', 2147483647),
(7, 'Wilson', 'Brian', 2147483647),
(8, 'Moore', 'Megan', 2147483647),
(9, 'Taylor', 'Andrew', 2147483647),
(10, 'Anderson', 'Sophia', 2147483647),
(11, 'Thomas', 'David', 2147483647),
(12, 'Jackson', 'Olivia', 2147483647),
(13, 'White', 'Matthew', 2147483647),
(14, 'Harris', 'Emma', 2147483647),
(15, 'Martin', 'Daniel', 2147483647),
(16, 'Thompson', 'Isabella', 2147483647),
(17, 'Garcia', 'Joshua', 2147483647),
(18, 'Martinez', 'Ava', 2147483647),
(19, 'Robinson', 'James', 2147483647),
(20, 'Clark', 'Sophie', 2147483647),
(21, 'Yassine', 'Kish', 687522677),
(27, 'mohammed', 'kish', 658842997),
(28, 'Yassine', 'Bahadi', 27867826),
(29, 'Ali', 'Arbani', 694334270),
(30, 'ilyass', 'arbani', 628262419),
(31, 'ihssan', 'Boulaid', 87687585),
(32, 'Jannat', 'Berrad', 2147483647),
(33, 'Hanae', 'Zwennaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 693470327),
(34, 'Marwan', 'Ait Lhaj', 2147483647),
(35, 'Hassan', 'Kich', 922973287),
(36, 'Brahim', 'Kich', 98798798),
(37, 'Mohammed', 'Kish', 1288311);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `idDetail` int(11) NOT NULL,
  `prixVente` float NOT NULL,
  `quantite` int(11) NOT NULL,
  `idFacture` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`idDetail`, `prixVente`, `quantite`, `idFacture`, `idArticle`) VALUES
(61, 500, 2, 1703432127, 1),
(62, 900, 3, 1703432127, 2),
(63, 500, 2, 1703507498, 1),
(64, 900, 4, 1703507498, 2),
(65, 60, 5, 1703507498, 7),
(66, 1200, 3, 1703507622, 1703379005),
(67, 1200, 7, 1703525377, 1703379007),
(68, 500, 2, 1703525831, 1),
(69, 1200, 1, 1703525831, 1703379007),
(70, 60, 1, 1703525831, 7),
(71, 120, 9, 1703525950, 1703379008),
(72, 120, 11, 1703526040, 1703379008),
(73, 500, 5, 1703612494, 1),
(74, 160, 2, 1703612494, 12),
(75, 60, 1, 1703612494, 7),
(77, 900, 1, 1705341143, 2),
(78, 500, 2, 1705576240, 1),
(79, 900, 2, 1705576240, 2),
(80, 60, 3, 1705576240, 7),
(81, 100000, 2, 1705884118, 1703379012),
(82, 100000, 1, 1705884173, 1703379012),
(83, 100000, 9, 1705884657, 1703379012),
(84, 450, 2, 1705884972, 5),
(85, 450, 2, 1706374379, 5),
(86, 800, 1, 1706374379, 3),
(87, 130, 1, 1706377680, 8),
(88, 3000, 2, 1706446268, 1703379013),
(89, 12, 1, 1706446390, 1703379011),
(90, 500, 2, 1706737463, 1),
(91, 900, 2, 1706737463, 2),
(92, 800, 1, 1706737463, 3),
(93, 12, 221, 1707328591, 1703379011),
(94, 12, 14, 1707328591, 1703379011);

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `idFacture` int(11) NOT NULL,
  `dateFacture` date NOT NULL,
  `regler` tinyint(1) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `factures`
--

INSERT INTO `factures` (`idFacture`, `dateFacture`, `regler`, `idClient`) VALUES
(1703432127, '2023-12-24', 1, 29),
(1703507498, '2023-12-25', 0, 30),
(1703507622, '2023-12-25', 0, 30),
(1703525377, '2023-12-25', 0, 21),
(1703525831, '2023-12-25', 0, 31),
(1703525950, '2023-12-25', 0, 31),
(1703526040, '2023-12-25', 0, 21),
(1703612494, '2023-12-26', 0, 32),
(1703612757, '2023-12-26', 0, 32),
(1705341123, '2024-01-15', 0, 12),
(1705341143, '2024-01-15', 0, 3),
(1705576240, '2024-01-18', 0, 12),
(1705884118, '2024-01-22', 0, 3),
(1705884173, '2024-01-22', 0, 9),
(1705884657, '2024-01-22', 1, 33),
(1705884972, '2024-01-22', 0, 1),
(1706374379, '2024-01-27', 0, 5),
(1706377680, '2024-01-27', 0, 1),
(1706446268, '2024-01-28', 1, 27),
(1706446390, '2024-01-28', 1, 34),
(1706737463, '2024-01-31', 0, 21),
(1707328591, '2024-02-07', 0, 28);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idArticle` int(11) NOT NULL,
  `designation` varchar(128) NOT NULL,
  `prixUnitaire` int(11) NOT NULL,
  `quantiteStock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idArticle`, `designation`, `prixUnitaire`, `quantiteStock`) VALUES
(1, 'Smartphone', 500, 246),
(2, 'Laptop', 900, 24),
(3, 'Smart TV', 800, 88),
(4, 'Wireless Earbuds', 80, 102),
(5, 'Digital Camera', 450, 11),
(6, 'Gaming Console', 300, 23),
(7, 'Bluetooth Speaker', 60, 40),
(8, 'Fitness Tracker', 130, 35),
(9, 'Headphones', 130, 30),
(10, 'Tablet', 350, 20),
(11, 'VR Headset', 200, 10),
(12, 'Smart Watch', 160, 33),
(13, 'Home Security Camera', 130, 18),
(14, 'Drones', 500, 14),
(15, 'Computer Monitor', 250, 22),
(16, 'External Hard Drive', 120, 45),
(17, 'Graphic Card', 400, 13),
(18, 'Wireless Router', 80, 31),
(19, 'Smart Home Hub', 150, 20),
(20, 'Printers', 200, 20),
(1703379003, 'Keyboard GX', 13, 112),
(1703379004, 'Mouse HP', 14, 22),
(1703379005, 'PC', 1200, 95),
(1703379007, 'TV SAMSUNG', 1200, 292),
(1703379008, 'DataShow', 120, 5),
(1703379011, 'BATATA', 12, -14),
(1703379012, 'Guitar', 100000, 9),
(1703379013, 'Pc Gamer', 3000, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idClient`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`idDetail`),
  ADD KEY `idFacture` (`idFacture`),
  ADD KEY `idArticle` (`idArticle`);

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`idFacture`),
  ADD KEY `idClient` (`idClient`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idArticle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `idDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1703379014;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `stock` (`idArticle`),
  ADD CONSTRAINT `details_ibfk_2` FOREIGN KEY (`idFacture`) REFERENCES `factures` (`idFacture`);

--
-- Constraints for table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
