-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 12 Mai 2014 à 15:49
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
  KEY `idUser1` (`idUser1`),
  KEY `idUser2` (`idUser2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Vider la table avant d'insérer `Conversations`
--

TRUNCATE TABLE `Conversations`;
--
-- Contenu de la table `Conversations`
--

INSERT INTO `Conversations` (`id`, `idUser1`, `idUser2`, `lastUpdatedDate`) VALUES
(1, 1, 2, '2014-05-10'),
(3, 1, 6, '2014-05-10'),
(4, 8, 8, '2014-05-11'),
(5, 8, 7, '2014-05-11'),
(6, 8, 1, '2014-05-11'),
(8, 1, 2, '2014-05-12'),
(9, 1, 2, '2014-05-12'),
(10, 1, 2, '2014-05-12'),
(11, 1, 2, '2014-05-12'),
(12, 1, 2, '2014-05-12'),
(13, 1, 2, '2014-05-12'),
(14, 1, 2, '2014-05-12'),
(15, 1, 2, '2014-05-12');

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
  KEY `idUser` (`idUser`),
  KEY `idConversation` (`idConversation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Vider la table avant d'insérer `Messages`
--

TRUNCATE TABLE `Messages`;
--
-- Contenu de la table `Messages`
--

INSERT INTO `Messages` (`id`, `idUser`, `idConversation`, `createdDate`, `message`) VALUES
(1, 1, 1, '2014-05-10', '0'),
(3, 1, 1, '2014-05-10', 'message 1'),
(5, 1, 1, '2014-05-10', '		test'),
(6, 1, 1, '2014-05-10', 'lol'),
(7, 1, 1, '2014-05-10', '		lk,'),
(8, 1, 1, '2014-05-10', '		test\n'),
(9, 1, 1, '2014-05-10', '		'),
(10, 1, 1, '2014-05-10', '		'),
(11, 1, 1, '2014-05-10', '		'),
(12, 1, 1, '2014-05-10', '		lol'),
(13, 8, 4, '2014-05-11', 'salut\n'),
(14, 8, 4, '2014-05-11', 'salut\n'),
(15, 7, 5, '2014-05-11', 'salut'),
(16, 8, 5, '2014-05-11', 'salut a va ?\n'),
(17, 7, 5, '2014-05-11', 'ouiiiiiiii\n'),
(18, 8, 5, '2014-05-11', 'test'),
(19, 7, 5, '2014-05-11', '		'),
(20, 8, 5, '2014-05-11', 'test'),
(21, 8, 5, '2014-05-11', '		lol'),
(22, 8, 5, '2014-05-11', '		ouiiiii'),
(23, 8, 6, '2014-05-11', 'pl'),
(24, 8, 5, '2014-05-12', 'test'),
(25, 8, 5, '2014-05-12', 'test'),
(26, 8, 5, '2014-05-12', 'test'),
(27, 8, 5, '2014-05-12', 'test'),
(28, 8, 5, '2014-05-12', 'test'),
(29, 8, 5, '2014-05-12', 'test'),
(30, 8, 5, '2014-05-12', 'test'),
(31, 8, 5, '2014-05-12', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `Photos`
--

CREATE TABLE `Photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `idProfil` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProfil` (`idProfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Vider la table avant d'insérer `Photos`
--

TRUNCATE TABLE `Photos`;
--
-- Contenu de la table `Photos`
--

INSERT INTO `Photos` (`id`, `name`, `idProfil`) VALUES
(1, '92a08f65af73cec156d43a47c32b9096.jpg', 3),
(25, '48a42d69293d8dcfdbb89883d785f27c.png', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Profils`
--

CREATE TABLE `Profils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(150) NOT NULL,
  `Hobbies` varchar(100) NOT NULL,
  `Interest` varchar(50) NOT NULL,
  `MaritalSituation` varchar(50) NOT NULL,
  `Sexuality` varchar(100) NOT NULL,
  `Job` varchar(100) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Vider la table avant d'insérer `Profils`
--

TRUNCATE TABLE `Profils`;
--
-- Contenu de la table `Profils`
--

INSERT INTO `Profils` (`id`, `Description`, `Hobbies`, `Interest`, `MaritalSituation`, `Sexuality`, `Job`, `idUser`) VALUES
(1, 'test', 'test', 'Male', 'In couple', 'Heterosexuel', 'test', 1),
(2, 'test', 'test', 'Hommes', 'En couple', 'Hétérosexuel', 'test', 8),
(3, 'clem', 'clem', 'Femmes', 'En couple', 'Hétérosexuel', 'etudiant', 7),
(15, 'julie', 'julie', 'Hommes', 'Célibataire', 'Hétérosexuel', 'etudiant', 35);

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Pass` varchar(128) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Sexe` varchar(25) NOT NULL,
  `BirthDate` date NOT NULL,
  `City` varchar(50) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Mail` (`Mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Vider la table avant d'insérer `Users`
--

TRUNCATE TABLE `Users`;
--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`id`, `Pass`, `Firstname`, `Lastname`, `Sexe`, `BirthDate`, `City`, `Mail`, `Pseudo`) VALUES
(1, 'test', 'Nicolas', 'Sabella', 'Male', '2014-05-09', 'Le Perreux Sur Marne', 'test@test.com', 'Yayap'),
(2, 'toto', '', '', 'Female', '2013-02-03', 'Villejuif', 'lolo@lolo.com', 'Test'),
(6, 'bla', '', '', 'Female', '2014-05-09', 'Villejuif', 'toto@toto', 'Test'),
(7, '49c040447d066cb774f12f6134ff0b7d', 'Clementine', 'Dubois', 'Female', '2014-05-11', 'Villejuif', 'clem@clem', 'Clem'),
(8, '698dc19d489c4e4db73e28a713eab07b', 'teste', 'teste', 'Male', '2014-05-11', 'tese', 'teste@test', 'teste'),
(35, '16f12f5e8379e22be995e505ebfc1b84', 'Dupond', 'Julie', 'Femme', '2014-05-01', 'Villejuif', 'gmail@gmail', 'Julie');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Conversations`
--
ALTER TABLE `Conversations`
  ADD CONSTRAINT `conversations_ibfk_1` FOREIGN KEY (`idUser1`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `conversations_ibfk_2` FOREIGN KEY (`idUser2`) REFERENCES `Users` (`id`);

--
-- Contraintes pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`idConversation`) REFERENCES `Conversations` (`id`);

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
