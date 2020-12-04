-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `avis`;
CREATE TABLE `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(10) unsigned NOT NULL,
  `idSpot` int(11) NOT NULL,
  `avis` text DEFAULT NULL,
  `note` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `heureDebut` time DEFAULT NULL,
  `heureFin` time DEFAULT NULL,
  `duree` time DEFAULT NULL,
  `nbBaigneurs` int(11) DEFAULT NULL,
  `nbPAN` int(11) DEFAULT NULL,
  `nbBateau` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idSpot` (`idSpot`),
  CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`idSpot`) REFERENCES `spots` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `bieres`;
CREATE TABLE `bieres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `ingredients` text NOT NULL,
  `brasserie` varchar(100) NOT NULL,
  `prix` text DEFAULT NULL,
  `fermentation` int(11) DEFAULT NULL,
  `degre` int(11) NOT NULL,
  `nbLike` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `idlike` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbiere` int(11) NOT NULL,
  `dateLike` date NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idlike`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `spots`;
CREATE TABLE `spots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `idVille` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idVille` (`idVille`),
  CONSTRAINT `spots_ibfk_1` FOREIGN KEY (`idVille`) REFERENCES `villes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verifcode` varchar(100) NOT NULL,
  `isVerified` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `villes`;
CREATE TABLE `villes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2020-12-04 05:10:47
