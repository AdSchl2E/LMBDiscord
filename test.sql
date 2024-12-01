-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 16 fév. 2020 à 19:12
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
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(15, 'Tommy', '$2y$10$hCIno2uWzz01DZdtJud3B.Mca/3yonVMQWeWrK.4J8H9V8qjB1Oy.', 'heitz.tom09@gmail.com', '2020-02-10'),
(1, 'RayquaZ', '$2y$10$IB1sD7NWBlmnFpyzLc13nuRqU9mZKiXrJIRm4Fkk.uYCXzhZBqZSK', 'ad.schlee@gmail.com', '2020-02-09'),
(14, 'Benji', '$2y$10$BT5OwseP58eupw2/R0EbGORfZJq/F1MsA0vaBgn1GHURNFZnVAyRq', 'benjamin.sipp@gmail.com', '2020-02-10'),
(21, 'Koyori', '$2y$10$7vIRsE2/nd664IixJpf4zu0gSbnsLZ.QfiGpt2AQUvgsrmgt/AzTC', 'Koyori.Kanda@gmail.com', '2020-02-14'),
(17, 'tuna', '$2y$10$Xmia.jH3gBko7fVZQxw2gecnHBTtn5y8PhNumiKT9SVHzCdN9Sh7K', 'batikanogaming3@gmail.com', '2020-02-10'),
(19, 'sauveteur67', '$2y$10$L7IkwEYoLno8puRVZ2fXQO9j4Nlizj6N2UkByQksRUEx2Oiy8zg5a', 'paulbaroit@yahoo.com', '2020-02-10');

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

DROP TABLE IF EXISTS `minichat`;
CREATE TABLE IF NOT EXISTS `minichat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=265 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `minichat`
--

INSERT INTO `minichat` (`ID`, `pseudo`, `message`) VALUES
(204, 'RayquaZ', 'Test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
