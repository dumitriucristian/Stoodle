-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 11:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stoodle`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `validator` char(64) DEFAULT NULL,
  `selector` char(64) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `data` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facultati`
--

CREATE TABLE `facultati` (
  `Indexf` int(11) NOT NULL,
  `Numef` text DEFAULT NULL,
  `Judet` tinytext DEFAULT NULL,
  `Examenadmi` tinyint(1) DEFAULT NULL,
  `Universitatea` varchar(256) DEFAULT NULL,
  `Profil` text DEFAULT NULL,
  `Poza` text NOT NULL DEFAULT 'default.jpg',
  `pasiune_facultati` varchar(64) DEFAULT NULL,
  `job` int(1) DEFAULT NULL,
  `materie1` varchar(64) DEFAULT NULL,
  `materie2` varchar(64) DEFAULT NULL,
  `materie3` varchar(64) DEFAULT NULL,
  `carti` varchar(64) DEFAULT NULL,
  `sociabil` int(1) DEFAULT NULL,
  `sport` varchar(64) DEFAULT NULL,
  `stres` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facultati`
--

INSERT INTO `facultati` (`Indexf`, `Numef`, `Judet`, `Examenadmi`, `Universitatea`, `Profil`, `Poza`, `pasiune_facultati`, `job`, `materie1`, `materie2`, `materie3`, `carti`, `sociabil`, `sport`, `stres`) VALUES
(1, 'Facultatea de Teologie Ortodoxa UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Teologic', 'teologiccluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Facultatea de Automatica si Calculatoare                                                                                                                  ', 'Cluj', 1, 'Universitatea Tehnica Cluj', 'Mate-info', 'ACcluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Facultatea de Psihologie si Stiinte ale Educatiei UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Filologie', 'Pshihologiecluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Facultatea de Biologie si Geologie UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Stiinte ale naturii', 'biologiecluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Facultatea de Chimie si Inginerie Chimica', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Stiinte ale naturii', 'chimiecluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Facultatea de Sociologie si Asistenta Sociala', 'Cluj', 0, 'Universitatea Babes-Bolyai', 'Filologie', 'sociologiecluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Facultatea de Litere', 'Cluj', 0, 'Universitatea Babes-Bolyai', 'Filologie', 'literecluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Facultatea de Business', 'Cluj', 0, 'Universitatea Babes-Bolyai', 'Mate-info', 'businesscluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Facultatea de Istorie si Filozofie', 'Cluj', 0, 'Universitatea Babes-Bolyai', 'Filologie', 'istoriecluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Facultatea de Matematica si Informatica', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Mate-info', '', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Facultatea de Fizica', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Mate-info', 'fizicacluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Facultatea de Geografie', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Filologie', 'geografiecluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Facultatea de Drept', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Filologie', 'dreptcluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Facultatea de Educatie Fizica si Sport', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Sportiv', 'sportcluj.jpg\r\n', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Facultatea de Arhitectura si Urbanism', 'Cluj', 1, 'Universitatea Tehnica Cluj', 'Arhitectura', 'arhitecturacluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Facultatea de Constructii', 'Cluj', 1, 'Universitatea Tehnica Cluj', 'Mate-info', 'constructiicluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Facultatea de Inginerie Electrica', 'Cluj', 0, 'Universitatea Tehnica Cluj', 'Mate-info', 'electricitatecluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Facultatea de Instalatii', 'Cluj', 0, 'Universitatea Tehnica Cluj', 'Mate-info', 'instalatiicluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Facultatea de Farmacie', 'Cluj', 1, 'Universitatea de Medicina si Farmacie Cluj', 'Stiinte ale naturii', 'farmaciecluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Facultatea de Medicina', 'Cluj', 1, 'Universitatea de Medicina si Farmacie Cluj', 'Stiinte ale naturii', 'medicinacluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Facultatea de Medicina Dentara', 'Cluj', 1, 'Universitatea de Medicina si Farmacie Cluj', 'Stiinte ale naturii', 'dentaracluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Facultatea de Nutritie si Dietetica', 'Cluj', 1, 'Universitatea de Medicina si Farmacie Cluj', 'Stiinte ale naturii', '', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Facultatea de Medicina  Veterinara', 'Cluj', 1, 'Universitatea de Stiinte Agricole si Medicina Veterinara', 'Stiinte ale naturii', 'agriculturacluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Facultatea de Agricultura', 'Cluj', 1, 'Universitatea de Stiinte Agricole si Medicina Veterinara', 'Stiinte ale naturii', 'agriculturacluj.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Facultatea de Horticultura', 'Cluj', 0, 'Universitatea de Stiiinte Agricole si Medicina Veterinare', 'Stiinte ale Naturii', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Facultatea de Automatica si Calculatore', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Mate-info', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Facultatea de Inginerie Electrica', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Mate-info', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Facultatea de Chimie Aplicata si Stiinta Materialelor', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Stiinte ale naturii', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Facultatea de Energetica', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Mate-info', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Facultatea de Ingineria Sistemelor Biotehnice', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Stiinte ale Naturii', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Facultatea de Inginerie Aerospatiala', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Mate-info', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Facultatea de Inginerie si Managementul Sistemelor Tehnologice', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Mate-info', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Facultatea de Ingenerie Medicala', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Mate-info', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Facultatea de Stiinta si Ingeneria Materialelor', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Mate-info', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Facultatea de Inginerie Mecanica si Mecatronica', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Mate-info', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Facultatea de Transporturi', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Mate-info', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Facultatea de Electronica,Telecomunicatii si Tehnologia Informatiei', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Mate-info', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Facultatea de Administratie si Afaceri', 'Bucuresti', 0, 'Universitatea Bucuresti', 'Mate-info', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Facultatea de Biologie', 'Bucuresti', 0, 'Universitatea Bucuresti', 'Stiinte ale Naturii', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Facultatea de Chimie', 'Bucuresti', 1, 'Universitatea Bucuresti', 'Stiinte ale Naturii', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Facultatea de Drept', 'Bucuresti', 1, 'Universitatea Bucuresti', 'Filologie', 'default.jpg', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resetare`
--

CREATE TABLE `resetare` (
  `idReset` int(11) NOT NULL,
  `mailReset` text NOT NULL,
  `selectReset` longtext NOT NULL,
  `tokenReset` longtext NOT NULL,
  `expireReset` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `Nume` text NOT NULL,
  `Prenume` text NOT NULL,
  `mailUser` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `Profil` text DEFAULT NULL,
  `Domeniu` text DEFAULT NULL,
  `domeniu_intensitate` int(1) DEFAULT NULL,
  `job` int(1) DEFAULT NULL,
  `materie1` varchar(64) DEFAULT NULL,
  `materie2` varchar(64) DEFAULT NULL,
  `materie3` varchar(64) DEFAULT NULL,
  `carti` varchar(64) DEFAULT NULL,
  `sociabila` int(1) DEFAULT NULL,
  `sport` varchar(64) DEFAULT NULL,
  `stres` int(1) DEFAULT NULL,
  `Judet` text DEFAULT NULL,
  `PozaUser` text DEFAULT 'UserDefault.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_gmail`
--

CREATE TABLE `users_gmail` (
  `idGmail` int(11) NOT NULL,
  `nameGmail` tinytext NOT NULL,
  `mailGmail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_verificare`
--

CREATE TABLE `users_verificare` (
  `idVerificare` int(11) NOT NULL,
  `numeVerificare` tinytext NOT NULL,
  `mailVerificare` text NOT NULL,
  `parolaVerificare` longtext NOT NULL,
  `selectVerificare` longtext NOT NULL,
  `tokenVerificare` longtext NOT NULL,
  `expireVerificare` int(32) NOT NULL,
  `verificare` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facultati`
--
ALTER TABLE `facultati`
  ADD PRIMARY KEY (`Indexf`);

--
-- Indexes for table `resetare`
--
ALTER TABLE `resetare`
  ADD PRIMARY KEY (`idReset`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `users_gmail`
--
ALTER TABLE `users_gmail`
  ADD PRIMARY KEY (`idGmail`);

--
-- Indexes for table `users_verificare`
--
ALTER TABLE `users_verificare`
  ADD PRIMARY KEY (`idVerificare`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facultati`
--
ALTER TABLE `facultati`
  MODIFY `Indexf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `resetare`
--
ALTER TABLE `resetare`
  MODIFY `idReset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_gmail`
--
ALTER TABLE `users_gmail`
  MODIFY `idGmail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_verificare`
--
ALTER TABLE `users_verificare`
  MODIFY `idVerificare` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
