-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 17 Novembre 2014 à 11:03
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `basek1`
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
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dateNaissance` date NOT NULL,
  `adressMail` varchar(50) NOT NULL,
  `photoMembre` varchar(50) NOT NULL,
  `idInstrument` int(11) NOT NULL,
  `moyenne` double NOT NULL,
  `password` varchar(32) NOT NULL,
  `pseudo` varchar(32) NOT NULL,
  `idGenre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idInstrument` (`idInstrument`),
  KEY `idGenre` (`idGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_tablature` FOREIGN KEY (`idTablature`) REFERENCES `tablature` (`id`),
  ADD CONSTRAINT `fk_commentaire_membre` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `fk_membre_instrument` FOREIGN KEY (`idInstrument`) REFERENCES `instrument` (`id`),
  ADD CONSTRAINT `fk_membre_genre` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`id`);

--
-- Contraintes pour la table `tablature`
--
ALTER TABLE `tablature`
  ADD CONSTRAINT `fk_tablature_instrument` FOREIGN KEY (`idInstrument`) REFERENCES `instrument` (`id`),
  ADD CONSTRAINT `fk_tablature_membre` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `fk_tablature_artiste` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`),
  ADD CONSTRAINT `fk_tablature_genre` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
