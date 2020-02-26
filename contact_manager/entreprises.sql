-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 26 fév. 2020 à 13:56
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `addressbook`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--
drop DATABASE IF EXISTS addressbook2
CREATE DATABASE addressbook2

use 

DROP TABLE IF EXISTS `entreprises`;
CREATE TABLE IF NOT EXISTS `entreprises` (
  `ets_id` int(11) NOT NULL AUTO_INCREMENT,
  `ets_name` varchar(255) NOT NULL,
  `ets_city` varchar(100) NOT NULL DEFAULT 'Mulhouse',
  `ets_phone` char(16) NOT NULL,
  PRIMARY KEY (`ets_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`ets_id`, `ets_name`, `ets_city`, `ets_phone`) VALUES
(1, 'SOGETI', 'Blagnac', '05.06.07.08.09'),
(2, 'ALCATEL', 'Paris', '01.23.24.25.98'),
(3, 'ORANGE', 'Strasburg', '03.88.95.95.95'),
(43, 'mdevoldere', 'lile', '0256548563'),
(44, 'franky', 'mulhouse', '0365556365'),
(45, 'franky', 'mulhouse', '0365556365'),
(46, 'franky', 'mulhouse', '0365556365'),
(47, 'tibo', 'paris', '0666666666');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
