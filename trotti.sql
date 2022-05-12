-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2022 at 10:04 AM
-- Server version: 5.7.31
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trotti`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `label_categorie` varchar(200) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `label_categorie`) VALUES
(1, 'Grande format'),
(4, 'Moyenne format'),
(15, 'format');

-- --------------------------------------------------------

--
-- Table structure for table `detaillocation`
--

DROP TABLE IF EXISTS `detaillocation`;
CREATE TABLE IF NOT EXISTS `detaillocation` (
  `iddetaillocation` int(11) NOT NULL,
  `idlocation` int(11) NOT NULL,
  `idtrottinette` int(11) NOT NULL,
  `qte` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detaillocation`
--

INSERT INTO `detaillocation` (`iddetaillocation`, `idlocation`, `idtrottinette`, `qte`) VALUES
(30, 20, 1, 3),
(31, 20, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `idevent` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nbparticipant` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`idevent`, `titre`, `description`, `type`, `lieu`, `date`, `nbparticipant`, `image`) VALUES
(22, 'kjhvzkdhv', 'djkbc', 'forestier', 'sousse', '2022-05-06', 29, 'event.jpg'),
(24, 'azohjmoh', 'amknlkb', 'competition', 'mahdia', '2022-05-04', 23, 'bg5.jpeg'),
(25, 'xzlbj', 'zdjb', 'competition', 'sousse', '2022-04-29', 20, 'bg5.jpeg'),
(26, 'trottii', 'aaa', 'urbain', 'mahdia', '2022-05-07', 100, 'big-ticket-image-60cc4cf3d7487770265345-cropped600-400.jpg'),
(27, 'bpooo', 'energetique', 'urbain', 'gabes', '2022-04-30', 25, 'apple-icon.png'),
(28, 'oooo', 'kkkk', 'urbain', 'sousse', '2022-05-04', 11, '100.jpg'),
(29, 'rym', 'bouzouita', 'forestier', 'sousse', '2022-05-01', 50, '1647267815-161-card.jpg'),
(30, 'trottii', 'aaaaaa', 'forestier', 'bizerte', '2022-05-07', 120, 'big-ticket-image-60cc4cf3d7487770265345-cropped600-400.jpg'),
(31, 'heyyy', 'wasuup', 'forestier', 'monastir', '2022-05-06', 123, 'big-ticket-image-60cc4cf3d7487770265345-cropped600-400.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `numero` int(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `date_debut`, `date_fin`, `numero`, `adresse`, `iduser`) VALUES
(20, '2022-04-29', '2022-05-02', 23456789, 'Tunis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

DROP TABLE IF EXISTS `participation`;
CREATE TABLE IF NOT EXISTS `participation` (
  `idparticipation` int(11) NOT NULL,
  `idevent` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`idparticipation`, `idevent`, `iduser`) VALUES
(36, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reclamations`
--

DROP TABLE IF EXISTS `reclamations`;
CREATE TABLE IF NOT EXISTS `reclamations` (
  `id_reclamation` int(11) NOT NULL AUTO_INCREMENT,
  `type_reclamation` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Non',
  PRIMARY KEY (`id_reclamation`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reclamations`
--

INSERT INTO `reclamations` (`id_reclamation`, `type_reclamation`, `message`, `status`) VALUES
(6, 'Slim Bouchiba', 'hey', 'Oui'),
(7, 'Slim ', 'im in ', 'Oui'),
(9, 'slimaaa', 'slimaaaaa', 'Non'),
(10, 'support ', 'support', 'Non'),
(11, 'Zako', 'zzaza', 'Non'),
(12, 'aaa', 'fsdfs', 'Non');

-- --------------------------------------------------------

--
-- Table structure for table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `id_reclamation` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `feedback` text NOT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `id_reclamation` (`id_reclamation`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reponses`
--

INSERT INTO `reponses` (`id_reponse`, `id_reclamation`, `contenu`, `feedback`) VALUES
(8, 7, 'jjj', 'hela'),
(9, 10, 'kkk', 'lkkkl'),
(10, 11, 'jkk,k', 'kkjh'),
(17, 7, 'gghgh', 'ghghh');

-- --------------------------------------------------------

--
-- Table structure for table `statistique`
--

DROP TABLE IF EXISTS `statistique`;
CREATE TABLE IF NOT EXISTS `statistique` (
  `2020` int(11) NOT NULL,
  `2019` int(11) NOT NULL,
  `2018` int(11) NOT NULL,
  `2017` int(11) NOT NULL,
  `2016` int(11) NOT NULL,
  `2015` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trotinette`
--

DROP TABLE IF EXISTS `trotinette`;
CREATE TABLE IF NOT EXISTS `trotinette` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(200) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trotinette`
--

INSERT INTO `trotinette` (`Id`, `label`, `prix`, `id_categorie`, `image`) VALUES
(62, 'trotti ', 45, 1, 'popular3 (3) - Copie.jpg'),
(63, 'trooo', 25, 4, 'popular1 - Copie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trottinette`
--

DROP TABLE IF EXISTS `trottinette`;
CREATE TABLE IF NOT EXISTS `trottinette` (
  `idTrottinette` int(255) NOT NULL,
  `typeTrottinette` varchar(255) NOT NULL,
  `modelTrottinette` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trottinette`
--

INSERT INTO `trottinette` (`idTrottinette`, `typeTrottinette`, `modelTrottinette`) VALUES
(1, 'electriques', 'Surpass 8 PRO'),
(2, 'a pied', 'Beeper LITE');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `file_name` blob,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `file_name`, `role`) VALUES
(1, 'firass', 'benameur.firas@esprit.tn', '191919', NULL, 'ADMIN'),
(17, 'sarra', 'sarra@esp.tn', '1919', NULL, 'ADMIN'),
(19, 'slim', 'slim@hhh.tn', '7777', NULL, 'USER'),
(20, 'oumeima', 'oumeima.ibnelfekif@esprit.tn', '12345', NULL, 'USER'),
(21, 'fourat', 'benameur.fourat@esprit.tn', '55555', NULL, 'USER');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `reponses_ibfk_1` FOREIGN KEY (`id_reclamation`) REFERENCES `reclamations` (`id_reclamation`) ON DELETE CASCADE;

--
-- Constraints for table `trotinette`
--
ALTER TABLE `trotinette`
  ADD CONSTRAINT `trotinette_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
