-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 02:13 PM
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
  `validator` text DEFAULT NULL,
  `selector` text DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `data` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`

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
  `job` int(1) DEFAULT NULL,
  `pasiune_facultati` varchar(64) NOT NULL,
  `materie1` varchar(64) DEFAULT NULL,
  `materie2` varchar(64) DEFAULT NULL,
  `materie3` varchar(64) DEFAULT NULL,
  `carti` varchar(64) DEFAULT NULL,
  `sociabil` int(1) DEFAULT NULL,
  `sport` varchar(64) DEFAULT NULL,
  `stres` int(1) DEFAULT NULL,
  `link_facultate` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facultati`
--

INSERT INTO `facultati` (`Indexf`, `Numef`, `Judet`, `Examenadmi`, `Universitatea`, `Profil`, `Poza`, `job`, `pasiune_facultati`, `materie1`, `materie2`, `materie3`, `carti`, `sociabil`, `sport`, `stres`, `link_facultate`) VALUES
(1, 'Facultatea de Teologie Ortodoxa UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Teologic', 'teologiccluj.jpg', 1, 'Religie', 'Religie', 'Istorie', 'Muzica', 'Religie', 1, '0', 0, 'http://ot.ubbcluj.ro/'),
(2, 'Facultatea de Automatica si Calculatoare                                                                                                                  ', 'Cluj', 1, 'Universitatea Tehnica Cluj', 'Mate-info', 'ACcluj.jpg', 0, 'Programare/Calculatoare', 'Informatica', 'Matematica', 'Fizica', 'Tehnica si tehnologie', 0, '0', 1, 'https://acs.pub.ro/'),
(3, 'Facultatea de Psihologie si Stiinte ale Educatiei UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Filologie', 'Pshihologiecluj.jpg', 1, 'Psihologie', 'Psihologie', 'Limba si literatura romana', 'Sociologie', 'Psihologie', 1, '0', 0, 'https://psiedu.ubbcluj.ro/'),
(4, 'Facultatea de Biologie si Geologie UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Stiinte ale naturii', 'biologiecluj.jpg', 1, 'Biologie', 'Biologie', 'Chimie', 'Fizica', 'Enciclopedii', 0, '0', 0, 'http://bioge.ubbcluj.ro/'),
(5, 'Facultatea de Chimie si Inginerie Chimica', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Stiinte ale naturii', 'chimiecluj.jpg', 0, 'Chimie', 'Chimmie', 'Fizica', 'Matematica', 'Stiinte exacte', 0, '0', 1, 'http://chem.ubbcluj.ro/'),
(6, 'Faculatatea de Istorie UniBuc ', 'Bucuresti', 1, 'UniBuc', 'Filologie', 'default.jpg', 1, 'Istorie', 'Istorie', 'Religie', 'Geografie', 'Istorie', 0, '0', 0, 'https://istorie.unibuc.ro/'),
(8, 'Facultatea de Jurnalism si Stiintele Comunicarii UniBuc', 'Bucuresti', 1, 'UniBuc', 'Stiinte-sociale', 'default.jpg', 1, 'Jurnalism', 'Limba si literatura romana', 'Educatie civica', 'Engleza', 'Stiinte sociale,politica', 1, '1', 0, 'http://www.fjsc.unibuc.ro/'),
(9, 'Facultatea de Limbi si Literaturi Straine UniBuc ', 'Bucuresti', 1, 'Unibuc', 'Filologie', 'default.jpg', 1, 'Limbi straine', 'Engleza', 'Franceza', 'Germana', 'Limbi straine', 1, '0', 0, 'http://lls.unibuc.ro/'),
(10, 'Facultatea de litere UniBuc', 'Bucuresti', 0, 'UniBuc', 'Filologie', 'default.jpg', 1, 'Literatura', 'Limba si literatura romana', 'Engleza', 'Franceza', 'Poezie/Literatura', 1, '0', 1, 'https://unibuc.ro/studii/facultati/facultatea-de-litere/'),
(11, 'Facultatea de Matematica si Informatica UniBuc', 'Bucuresti', 1, 'UniBuc', 'Mate-info', 'default.jpg', 0, 'Matematica', 'Matematica', 'Informatica', 'TIC', 'Stiinte exacte', 0, '0', 1, 'http://fmi.unibuc.ro/ro/');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `Indexf` int(11) DEFAULT NULL,
  `tip` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite`
--

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
  `sociabil` int(1) DEFAULT NULL,
  `sport` varchar(64) DEFAULT NULL,
  `stres` int(1) DEFAULT NULL,
  `Judet` text DEFAULT NULL,
  `PozaUser` text DEFAULT 'UserDefault.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- --------------------------------------------------------

--
-- Table structure for table `users_gmail`
--

CREATE TABLE `users_gmail` (
  `idGmail` int(11) NOT NULL,
  `numeGmail` text NOT NULL,
  `prenumeGmail` text NOT NULL,
  `mailGmail` text NOT NULL,
  `Profil` text NOT NULL,
  `Domeniu` text NOT NULL,
  `domeniu_intensitate` int(1) NOT NULL,
  `job` int(1) NOT NULL,
  `materie1` text NOT NULL,
  `materie2` text NOT NULL,
  `materie3` text NOT NULL,
  `carti` text NOT NULL,
  `sociabil` int(1) NOT NULL,
  `sport` int(1) NOT NULL,
  `stres` int(1) NOT NULL,
  `Judet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--


-- --------------------------------------------------------

--
-- Table structure for table `users_verificare`
--

CREATE TABLE `users_verificare` (
  `idVerificare` int(11) NOT NULL,
  `numeVerificare` tinytext NOT NULL,
  `prenumeVerificare` varchar(64) NOT NULL,
  `mailVerificare` text NOT NULL,
  `parolaVerificare` longtext NOT NULL,
  `selectVerificare` longtext NOT NULL,
  `tokenVerificare` longtext NOT NULL,
  `expireVerificare` int(32) NOT NULL,
  `verificare` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_verificare`
--
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
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facultati`
--
ALTER TABLE `facultati`
  MODIFY `Indexf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `resetare`
--
ALTER TABLE `resetare`
  MODIFY `idReset` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_gmail`
--
ALTER TABLE `users_gmail`
  MODIFY `idGmail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_verificare`
--
ALTER TABLE `users_verificare`
  MODIFY `idVerificare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
