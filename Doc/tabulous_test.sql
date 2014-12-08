-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Décembre 2014 à 02:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tabulous_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE IF NOT EXISTS `artiste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nbTablature` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `artiste`(`id`, `nom`, `nbTablature`) VALUES 
(1, 'Chinese Man', 3),
(2, 'Metallica', 2),
(3, 'Rammstein', 2),
(4, 'Parov Stelar', 2),
(5, 'Die Antwoord', 2),
(6, 'Shaka Ponk', 1),
(7, 'Beyoncé', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `idMembre` int(11) NOT NULL,
  `idTablature` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMembre` (`idMembre`),
  KEY `idTablature` (`idTablature`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id`, `nom`) VALUES
(1, 'Rock'),
(2, 'Metal'),
(3, 'Reggae'),
(4, 'Jazz'),
(5, 'Funk'),
(6, 'Blues'),
(7, 'Classique'),
(8, 'Variete Française'),
(9, 'Electro'),
(10, 'Rap'),
(11, 'R''n''B'),
(12, 'Soul'),
(13, 'Disco'),
(14, 'Pop'),
(15, 'Country'),
(16, 'Pop Rock'),
(17, 'Ska'),
(18, 'Experimentale');

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

CREATE TABLE IF NOT EXISTS `instrument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `instrument`
--

INSERT INTO `instrument` (`id`, `nom`) VALUES
(1, 'Guitare acoustique'),
(2, 'Guitare électrique'),
(3, 'Batterie'),
(4, 'Basse'),
(5, 'Synthétiseur');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `username_canonical` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_canonical` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idGenre` int(11) DEFAULT NULL,
  `idInstrument` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F6B4FB2992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_F6B4FB29A0D96FBF` (`email_canonical`),
  KEY `fk_membre_genre` (`idGenre`),
  KEY `fk_membre_instrument` (`idInstrument`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `idGenre`, `idInstrument`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'test', 'test', 'test@test.fr', 'test@test.fr', 1, 'rxytnq7xuvk8gc4kc808sw0oo0c4k0o', 'IDsIjmWdL2Dk4QdmIjH5+ZNXNSBWW+EInANFQTk2Z4/HtDCllZh0q7ubvkMcSXfnLk7HInUbCVJv79poGJcG2Q==', NULL, NULL, '2014-12-08 02:09:48', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tablature`
--

CREATE TABLE IF NOT EXISTS `tablature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomMusique` varchar(255) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  `album` varchar(100) NOT NULL,
  `accordage` varchar(3) NOT NULL,
  `date` date NOT NULL,
  `derniereConsultation` datetime NOT NULL default now() on update now(),
  `moyenne` double NOT NULL,
  `format` varchar(3) NOT NULL,
  `niveau` int(11) NOT NULL COMMENT 'Difficulté de la tablature',
  `adresseFichier` varchar(255) NOT NULL,
  `idGenre` int(11) NOT NULL,
  `cumulNote` int(11) DEFAULT NULL,
  `nbNote` int(11) DEFAULT NULL,
  `idInstrument` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idGenre` (`idGenre`),
  KEY `idInstrument` (`idInstrument`),
  KEY `idMembre` (`idMembre`),
  KEY `idArtiste` (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `tablature`(`nomMusique`, `idArtiste`, `album`, `accordage`, `derniereConsultation`, `moyenne`, `format`, `niveau`, `adresseFichier`, `idGenre`, `cumulNote`, `nbNote`, `idInstrument`, `idMembre`) 
VALUES 
('Skank in the air',1,'Racing with the sun','E#','2014-11-21 00:34:20','0','txt','3','//schnek.txt',1,0,0,4,1),
('Get up',1,'Racing with the sun','Standard','2014-11-21 00:34:22','0','txt','2','//schnek.txt',3,0,0,2,1),
('Ordinary Man',1,'Racing with the sun','E','2014-11-21 01:34:20','0','pdf','1','//schnek.txt',4,0,0,1,1),
('Mein Teil',3,'Reise, reise','D','2014-11-21 00:36:20','0','txt','4','//schnek.txt',5,0,0,5,1),
('Sonne',3,'Reise, reise','C','2014-11-21 00:34:59','0','txt','1','//schnek.txt',4,0,0,2,1),
('Memory Remains',2,'Battery','A','2014-11-21 10:34:20','0','pdf','1','//schnek.txt',1,0,0,1,1),
('Fuel',2,'Battery','A#','2014-11-21 03:34:20','0','txt','1','//schnek.txt',9,0,0,2,1),
('Catgroove',4,'JazzBeat','D#','2014-11-21 00:44:20','0','txt','3','//schnek.txt',2,0,0,4,1),
('Libella Swing',4,'JazzBeat','C#','2014-11-21 00:14:20','0','txt','5','//schnek.txt',7,0,0,4,1),
('Sum Luv',6,'The Geek and the Jerkin socks','E#','2014-11-21 00:32:20','0','txt','3','//schnek.txt',5,0,0,5,1),
('Hell o',6,'The great babine','D#','2014-11-21 00:15:20','0','gp6','3','//schnek.txt',10,0,0,3,1),
('Run the world',7,'Bitches','D','2014-11-21 08:34:20','0','txt','4','//schnek.txt',4,0,0,2,1),
('Xpensiv Shit',5,'Fjook lo naillers','C','2014-11-21 00:34:50','0','txt','3','//schnek.txt',3,0,0,3,1),
('Rich Bitch',5,'Fjook lo naillers','E','2014-11-21 00:39:20','0','gp6','3','//schnek.txt',1,0,0,2,1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_membre` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `fk_commentaire_tablature` FOREIGN KEY (`idTablature`) REFERENCES `tablature` (`id`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `fk_membre_genre` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `fk_membre_instrument` FOREIGN KEY (`idInstrument`) REFERENCES `instrument` (`id`);

--
-- Contraintes pour la table `tablature`
--
ALTER TABLE `tablature`
  ADD CONSTRAINT `fk_tablature_artiste` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`),
  ADD CONSTRAINT `fk_tablature_genre` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `fk_tablature_instrument` FOREIGN KEY (`idInstrument`) REFERENCES `instrument` (`id`),
  ADD CONSTRAINT `fk_tablature_membre` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
