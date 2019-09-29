-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 29 sep. 2019 à 14:23
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mcs_sbj`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `article_author` varchar(50) DEFAULT NULL,
  `article_title` varchar(255) DEFAULT NULL,
  `article_datetime` datetime DEFAULT NULL,
  `article_pic` varchar(255) DEFAULT NULL,
  `article_content` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID`, `article_author`, `article_title`, `article_datetime`, `article_pic`, `article_content`) VALUES
(1, 'Baptiste', 'Test', '2019-09-27 20:09:01', 'uploads/hello.jpg', 'enregistrement bdd #1'),
(2, 'Baptiste', 'Test', '2019-09-29 14:37:54', 'uploads/hello.jpg', 'enregistrement bdd #2'),
(3, 'Baptiste', 'Test', '2019-09-29 14:38:26', 'uploads/hello.jpg', 'enregistrement bdd #3'),
(4, 'Baptiste', 'Test', '2019-09-29 14:39:45', 'uploads/hello.jpg', 'enregistrement bdd #4'),
(5, 'Baptiste', 'Test', '2019-09-29 14:39:59', 'uploads/hello.jpg', 'enregistrement bdd #5'),
(6, 'Baptiste', 'Test', '2019-09-29 14:40:18', 'uploads/hello.jpg', 'enregistrement bdd #6'),
(7, 'Baptiste', 'Test', '2019-09-29 14:40:32', 'uploads/hello.jpg', 'enregistrement bdd #7'),
(8, 'Baptiste', 'Test', '2019-09-29 14:40:47', 'uploads/hello.jpg', 'enregistrement bdd #8'),
(9, 'Baptiste', 'Test', '2019-09-29 14:41:05', 'uploads/hello.jpg', 'enregistrement bdd #9'),
(10, 'ROOT', 'BONJOUR', '2019-09-29 16:16:39', 'uploads/root.jpg', 'JE S\'APPELLE ROOT');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
