-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 11 Juillet 2013 à 13:24
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `awesome_series`
--

-- --------------------------------------------------------

--
-- Structure de la table `series_vues`
--

CREATE TABLE IF NOT EXISTS `series_vues` (
  `id_Series_vues` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_user` int(11) NOT NULL,
  `serie_id_serie` int(11) NOT NULL,
  PRIMARY KEY (`id_Series_vues`),
  KEY `fk_Series_vues_user1_idx` (`user_id_user`),
  KEY `fk_Series_vues_serie1_idx` (`serie_id_serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `series_vues`
--
ALTER TABLE `series_vues`
  ADD CONSTRAINT `fk_Series_vues_user1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Series_vues_serie1` FOREIGN KEY (`serie_id_serie`) REFERENCES `serie` (`id_serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
