-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 04 Mai 2014 à 20:31
-- Version du serveur: 5.5.33
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `booda`
--
CREATE DATABASE IF NOT EXISTS `booda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `booda`;

-- --------------------------------------------------------

--
-- Structure de la table `Conversations`
--

CREATE TABLE `Conversations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser1` int(11) NOT NULL,
  `idUser2` int(11) NOT NULL,
  `lastUpdatedDate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser1` (`idUser1`),
  UNIQUE KEY `idUser2` (`idUser2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `Conversations`
--

TRUNCATE TABLE `Conversations`;
-- --------------------------------------------------------

--
-- Structure de la table `Messages`
--

CREATE TABLE `Messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idConversation` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`),
  UNIQUE KEY `idConversation` (`idConversation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `Messages`
--

TRUNCATE TABLE `Messages`;
-- --------------------------------------------------------

--
-- Structure de la table `Photos`
--

CREATE TABLE `Photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `idProfil` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idProfil` (`idProfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `Photos`
--

TRUNCATE TABLE `Photos`;
-- --------------------------------------------------------

--
-- Structure de la table `Profils`
--

CREATE TABLE `Profils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(150) NOT NULL,
  `Hobbies` varchar(100) NOT NULL,
  `Interest` enum('"Women"','"Men"','"Both"') NOT NULL,
  `MaritalSituation` enum('"In couple"','"Single"') NOT NULL,
  `Sexuality` varchar(100) NOT NULL,
  `Job` varchar(100) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `Profils`
--

TRUNCATE TABLE `Profils`;
-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Pass` varchar(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Sexe` varchar(25) NOT NULL,
  `BirthDate` date NOT NULL,
  `City` varchar(50) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `Users`
--

TRUNCATE TABLE `Users`;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Conversations`
--
ALTER TABLE `Conversations`
  ADD CONSTRAINT `conversations_ibfk_2` FOREIGN KEY (`idUser2`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `conversations_ibfk_1` FOREIGN KEY (`idUser1`) REFERENCES `Users` (`id`);

--
-- Contraintes pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`idConversation`) REFERENCES `Conversations` (`id`),
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`id`);

--
-- Contraintes pour la table `Photos`
--
ALTER TABLE `Photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`idProfil`) REFERENCES `Profils` (`id`);

--
-- Contraintes pour la table `Profils`
--
ALTER TABLE `Profils`
  ADD CONSTRAINT `profils_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `booda`.`users` 
CHANGE COLUMN `Pass` `Pass` VARCHAR(128) NOT NULL ;

ALTER TABLE `booda`.`users` 
ADD UNIQUE INDEX `Mail_UNIQUE` (`Mail` ASC);

