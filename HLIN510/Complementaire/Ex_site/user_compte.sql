-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 12 déc. 2018 à 18:29
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `compte`
--

-- --------------------------------------------------------

--
-- Structure de la table `user_compte`
--

DROP TABLE IF EXISTS `user_compte`;
CREATE TABLE IF NOT EXISTS `user_compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` text NOT NULL,
  `pass` text NOT NULL,
  `color` char(7) NOT NULL,
  `daten` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pays` varchar(255) NOT NULL,
  `droit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_compte`
--

INSERT INTO `user_compte` (`id`, `pseudo`, `mail`, `pass`, `color`, `daten`, `avatar`, `description`, `pays`, `droit`) VALUES
(1, 'jeris', 'jeris@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '#eb417c', '2018-12-21', '1.png', 'bfdjbjfd', 'france', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
