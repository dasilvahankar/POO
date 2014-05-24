-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 17 Mai 2014 à 13:02
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `voitures`
--
CREATE DATABASE IF NOT EXISTS `voitures` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `voitures`;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE IF NOT EXISTS `marques` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `m_image` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Contenu de la table `marques`
--

INSERT INTO `marques` (`m_id`, `m_nom`, `m_image`) VALUES
(1, 'Mercedes', 'img/marques/1.png'),
(2, 'Ford', 'img/marques/2.png'),
(3, 'Renault', 'img/marques/3.png'),
(4, 'Lotus', 'img/marques/4.png'),
(5, 'Jeep', 'img/marques/5.png'),
(6, 'Lincoln', 'img/marques/6.png'),
(7, 'Peugeot', 'img/marques/7.png'),
(8, 'Bedford', 'img/marques/8.png'),
(9, 'Chrysler', 'img/marques/9.png'),
(10, 'VW', 'img/marques/10.png');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE IF NOT EXISTS `voiture` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_proprietaire` varchar(20) COLLATE utf8_bin NOT NULL,
  `v_marques_id` int(11) NOT NULL,
  `v_reservoir` int(11) NOT NULL,
  `v_consommation` int(11) NOT NULL,
  `v_plaque` varchar(7) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Contenu de la table `voiture`
--

INSERT INTO `voiture` (`v_id`, `v_proprietaire`, `v_marques_id`, `v_reservoir`, `v_consommation`, `v_plaque`) VALUES
(1, 'Bono', 0, 60, 5, 'ETN-546'),
(2, 'Marco', 0, 55, 8, 'ELU-487'),
(3, 'Pierre', 3, 65, 6, 'DQA-742'),
(4, 'Marco', 1, 60, 5, 'HWK-341'),
(5, 'Bart', 2, 80, 10, 'MUY-141'),
(6, 'Bobo', 1, 60, 5, 'MMK-585');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
