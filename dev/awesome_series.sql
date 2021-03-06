-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 18 Juillet 2013 à 21:57
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
-- Structure de la table `casting_serie`
--

CREATE TABLE IF NOT EXISTS `casting_serie` (
  `id_casting` int(11) NOT NULL AUTO_INCREMENT,
  `serie_id_serie` int(11) NOT NULL,
  `nom_acteur` varchar(45) DEFAULT NULL,
  `role_acteur` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_casting`),
  KEY `fk_table1_serie1_idx` (`serie_id_serie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- Contenu de la table `casting_serie`
--

INSERT INTO `casting_serie` (`id_casting`, `serie_id_serie`, `nom_acteur`, `role_acteur`) VALUES
(1, 1, 'Bryan Cranston', 'Walt "Walter"  White/Heisenberg'),
(2, 1, 'Aaron Paul', 'Jesse Pinkman'),
(3, 1, 'Anna Gunn', 'Skyler White'),
(4, 1, 'Dean Norris', 'Hank Schrader'),
(5, 1, 'Betsy Brandt', 'Marie Schrader'),
(6, 1, 'Rj Mitte', 'Walter White Junior "Junior"'),
(7, 1, 'Giancarlo Esposito', 'Gustavo "Gus" Fring'),
(8, 1, 'Jonathan Banks', 'Mike Ehrmantraut'),
(9, 1, 'Bob Odenkirk', 'Saul Goodman'),
(10, 2, 'Charlie Hunam', 'Jackson "Jax" Teller'),
(11, 2, 'Ron Perlman', 'Clarence "Clay" Morrow'),
(12, 2, 'Katey Sagal', 'Gemma Teller-Morrow'),
(13, 2, 'Maggie Siff', 'Dr Tara Knowles'),
(14, 2, 'Kim Coates', 'Alex " Tig" Trager'),
(15, 2, 'Ryan Hurst', 'Harry "Opie" Winston'),
(16, 2, 'Mark Boone', 'Robert "Bobby" Munson'),
(17, 2, 'Tommy Flanagan', 'Filip "Chibs" '),
(18, 2, 'Theo Rossi', 'Juan Carlos "Juice" Ortiz'),
(19, 4, 'Sean Bean', 'Lord Eddard "Ned" Stark'),
(20, 4, 'Nikolaj Coster-Waldau', 'Jamie Lannister'),
(21, 4, 'Michelle Fairley', 'Catelyn Stark'),
(22, 4, 'Lena Headey', 'Cersei Lannister'),
(23, 4, 'Peter Dinklage', 'Tyrion Lannister'),
(24, 4, 'Emilia Clarke', 'Daenerys Targaryen'),
(27, 4, 'Richard Madden', 'Robb Stark'),
(29, 4, 'Kit Harington', 'Jon Snow'),
(30, 4, 'Jack Gleeson', 'Geoffrey Bratheon'),
(31, 5, 'Travis Fimmel', 'Ragnar Lothbrok'),
(32, 5, 'Katheryn Winnick', 'Lagertha Lothbrok'),
(33, 5, 'Clive Standen', 'Rollo Lothbrok'),
(34, 5, 'Gabriel Byrne', 'Earl Haraldson'),
(35, 5, 'Jessalyn Gilsig', 'Siggy Haraldson'),
(40, 5, 'George Blagden', 'Athelstan'),
(41, 5, 'Gustaf Skarsgard', 'Floki'),
(44, 5, 'Donal Logue', 'Roi Horik'),
(45, 5, 'Nathan O''Toole', 'Bjorn Lothbrok'),
(46, 15, 'Patrick J.Adams', 'Michaël "Mike" Ross'),
(47, 15, 'Gabriel Macht', 'Harvey Specter'),
(48, 15, 'Gina Torres', 'Jessica Pearson'),
(49, 15, 'Rick Hoffman', 'Louis Litt'),
(50, 15, 'Meghan Markle', 'Rachel Zane'),
(51, 15, 'Sarah Rafferty', 'Donna'),
(52, 15, 'Tom Lipinski', 'Trevor Evans'),
(53, 15, 'David Costabile', 'Daniel Hardman'),
(54, 15, 'Vanessa Ray', 'Jenny Griffith'),
(55, 13, 'Jim Parsons', 'Sheldon Cooper'),
(56, 13, 'Johnny Galecki', 'Leonard Hofstadter'),
(57, 13, 'Kaley Cuoco', 'Penny'),
(58, 13, 'Simon Helberg', 'Howard Wolowitz'),
(59, 13, 'Kunal Nayyar', ' Rajesh "Raj" Koothrappali'),
(60, 13, 'Melissa Rauch', 'Bernadette "Bernie" Maryann Rostenkowski '),
(61, 13, 'Mayim Bialik', 'Amy Farrah Fowler'),
(72, 7, 'Anson Mount', 'Cullen Bohanon'),
(73, 7, 'Colm Meaney', 'Thomas Durant'),
(74, 7, 'Common', 'Elam Ferguson'),
(75, 7, 'Dominique McElligott', 'Lilly Bell'),
(76, 9, 'Noah Wyle', 'Tom Mason'),
(77, 9, 'Moon Bloodgood', 'Anne Glass'),
(78, 9, 'Drew Roy', 'Hal Mason'),
(79, 9, 'Will Patton', 'Capitaine Weaver'),
(80, 9, 'Connor Jessup', 'Ben Mason'),
(81, 9, 'Sarah Carter', 'Margaret'),
(82, 9, 'Maxim Knight', 'Matt Mason'),
(83, 9, 'Colin Cunningham', 'John Pope'),
(84, 10, 'Billy Burke', 'Miles Matheson'),
(85, 10, 'Tracy Spiridakos', 'Charlotte "Charlie" Matheson'),
(86, 10, 'David Lyons', 'Général Sebastian "Bass" Monroe'),
(87, 10, 'Giancarlo Esposito', 'Tom Neville'),
(88, 10, 'Zak Orth', 'Aaron Pittman'),
(89, 10, 'Daniella Alonso', 'Nora Clayton'),
(90, 10, 'Graham Rogers', 'Danny Matheson'),
(91, 10, 'Elizabeth Mitchell', 'Rachel Matheson'),
(93, 10, 'J.D Pardo', 'Jason Neville'),
(94, 7, 'Christopher Heyerdahl', 'Thor Gundersen dit "le Suedois"'),
(95, 7, 'Robin McLeavy', 'Eva');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_comm` int(11) NOT NULL AUTO_INCREMENT,
  `titre_com` varchar(70) DEFAULT NULL,
  `contenu_comm` longtext,
  `resume_comm` longtext,
  `user_id_user` int(11) NOT NULL,
  `serie_id_serie` int(11) NOT NULL,
  PRIMARY KEY (`id_comm`),
  KEY `fk_commentaire_user_idx` (`user_id_user`),
  KEY `fk_commentaire_serie1_idx` (`serie_id_serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `idnews` int(11) NOT NULL,
  `titre_news` varchar(45) DEFAULT NULL,
  `contenu_news` text,
  PRIMARY KEY (`idnews`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `saison_serie`
--

CREATE TABLE IF NOT EXISTS `saison_serie` (
  `id_saison` int(11) NOT NULL AUTO_INCREMENT,
  `serie_id_serie` int(11) NOT NULL,
  `num_saison` int(11) DEFAULT NULL,
  `num_episode` int(11) DEFAULT NULL,
  `titre_episode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_saison`),
  KEY `fk_saison_serie_serie1_idx` (`serie_id_serie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `saison_serie`
--

INSERT INTO `saison_serie` (`id_saison`, `serie_id_serie`, `num_saison`, `num_episode`, `titre_episode`) VALUES
(1, 4, 1, 1, 'L''Hiver vient'),
(2, 4, 1, 2, 'The Kingsroad'),
(3, 4, 1, 3, 'Lord Snow'),
(4, 4, 1, 4, 'Infirmes, bâtards et choses brisées'),
(5, 4, 1, 5, 'The Wolf and The Lion'),
(6, 4, 1, 6, 'A Golden Crown'),
(7, 4, 1, 7, 'You Win or You Die'),
(8, 4, 1, 8, 'Frapper d''estoc'),
(9, 4, 1, 9, 'Baelor'),
(10, 4, 1, 10, 'De feu et de sang'),
(11, 4, 2, 1, 'Le nord se souvient'),
(12, 4, 2, 2, 'Les Contrées nocturnes'),
(13, 4, 2, 3, 'Ce qui est mort ne saurait mourir'),
(14, 4, 2, 4, 'La Cité de Qarth'),
(15, 4, 2, 5, 'Le Fantôme d''Harrenhal'),
(16, 4, 2, 6, 'Les Dieux anciens et nouveaux'),
(17, 4, 2, 7, 'Un homme sans honneur'),
(18, 4, 2, 8, 'Le Prince de Winterfell'),
(19, 4, 2, 9, 'La Néra'),
(20, 4, 2, 10, 'Valar Morghulis'),
(21, 4, 3, 1, 'Valar Dohaeris'),
(22, 4, 3, 2, 'Dark Wings, Dark Words'),
(23, 4, 3, 3, 'Walk of Punishment'),
(24, 4, 3, 4, 'And Now His Watch is Ended'),
(25, 4, 3, 5, 'Kissed by Fire'),
(26, 4, 3, 6, 'The Climb'),
(27, 4, 3, 7, 'The Bear and the Maiden Fair'),
(28, 4, 3, 8, 'Second Sons'),
(29, 4, 3, 9, 'The Rains of Castamere'),
(30, 4, 3, 10, 'Mhysa');

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE IF NOT EXISTS `serie` (
  `id_serie` int(11) NOT NULL AUTO_INCREMENT,
  `titre_serie` varchar(70) DEFAULT NULL,
  `nationalite_serie` varchar(70) DEFAULT NULL,
  `realisateur_serie` varchar(70) DEFAULT NULL,
  `synopsis_serie` longtext CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci,
  `resume_serie` longtext,
  `genre_serie` varchar(70) DEFAULT NULL,
  `annee_serie` varchar(70) DEFAULT NULL,
  `nbre_saisons_serie` int(11) DEFAULT NULL,
  `statut_serie` varchar(70) DEFAULT NULL,
  `format_serie` varchar(45) DEFAULT NULL,
  `trailer_serie` text NOT NULL,
  PRIMARY KEY (`id_serie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `serie`
--

INSERT INTO `serie` (`id_serie`, `titre_serie`, `nationalite_serie`, `realisateur_serie`, `synopsis_serie`, `resume_serie`, `genre_serie`, `annee_serie`, `nbre_saisons_serie`, `statut_serie`, `format_serie`, `trailer_serie`) VALUES
(1, 'Breaking Bad', 'Américaine', 'Vince Gillian', 'Walter White, 50 ans, est professeur de chimie dans un lycée du Nouveau-Mexique. Pour subvenir aux besoins de Skyler,\r\n                    sa femme enceinte, et de Walt Junior, son fils handicapé, il est obligé de travailler doublement. Son quotidien déjà morose devient carrément noir\r\n                    lorsqu''il apprend qu''il est atteint d''un incurable cancer des poumons. Les médecins ne lui donnent pas plus de deux ans à vivre. \r\n                    Pour réunir rapidement beaucoup d''argent afin de mettre sa famille à l''abri, Walter ne voit plus qu''une solution : mettre ses connaissances en chimie\r\n                    à profit pour fabriquer et vendre du crystal meth, une drogue de synthèse qui rapporte beaucoup. Il propose à Jesse, un de ses anciens élèves devenu un petit dealer\r\n                    de seconde zone, de faire équipe avec lui. Le duo improvisé met en place un labo itinérant dans un vieux camping-car. Cette association inattendue va les entraîner dans \r\n                    une série de péripéties tant comiques que pathétiques. ', NULL, 'Drame / Comédie Dramatique', 'Janvier 2008', 5, 'En production', '47 min', 'http://www.youtube.com/embed/kXPfG8C4wpA'),
(2, 'Sons of Anarchy', 'Américaine', 'Kurt Sutter', 'L''histoire se déroule à Charming, ville fictive du comté de San Joaquin en Californie. Une lutte de territoires entre dealers et trafiquants d''armes vient perturber les affaires d''un club de bikers (Motorcycle Club, ou MC en anglais). Ce club, nommé Sons of Anarchy Motorcycle Club Redwood Original, couramment abrégé en SAMCRO, fait régner l''ordre dans Charming. Clay Morrow, président de SAMCRO et patron du garage Teller-Morrow, ainsi que Jax Teller, vice-président, mènent le club.\r\nLes Sons of Anarchy sont à la fois craints par la population mais également très respectés et admirés pour leur code d’honneur et leur capacité à maintenir l’ordre et rendre justice dans les situations délicates. \r\nblablablaaaaaaaaaaaa aaaaaaaaaaaaaa aaa aaaaaaaa aaaaaaaaa aaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaa  aaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaa aaaaaaaaa aaaaaaaaaaaaaa aaaaaaaaaa aaa aaaaa aa aaaaaa   aaaaaaaaaaaaaaaaaaa aaaaaaaaaaa', NULL, 'Drame / Comédie Dramatique', 'Sept 2008', 6, 'En production', '43 min', 'http://www.youtube.com/embed/x3-R7XnfL8U'),
(3, 'The Wire', 'Américaine', 'David Simon et Ed Burns', NULL, NULL, 'Drame / Comédie Dramatique, Policier', 'Juin 2002 - Mars 2008', 5, 'Terminée', '55 min', ''),
(4, 'Game of Thrones', 'Américaine', 'David Benioff et D. B. Weiss', 'Sur le continent de Westeros, le roi Robert Baratheon règne sur le Royaume des Sept Couronnes depuis qu''il a mené à la victoire la rébellion contre le roi fou Aerys II Targaryen, dix-sept ans auparavant. Son guide et principal conseiller, Jon Arryn, venant de décéder, il part dans le nord du royaume demander à son vieil ami Eddard Stark, seigneur suzerain du Nord et de la Maison Stark, de remplacer leur regretté mentor au poste de « main du Roi ». Eddard, peu désireux de quitter ses terres, accepte à contrecœur de partir à la Cour avec ses deux filles, alors que Jon Snow, son fils illégitime, se prépare à intégrer la fameuse Garde de Nuit : la confrérie protégeant le royaume depuis des siècles à son septentrion, de toute créature pouvant provenir d''au-delà du Mur protecteur. Mais, juste avant le départ pour le Sud, Bran, un des jeunes fils d''Eddard, fait une découverte en escaladant une tour de Winterfell dont découleront des conséquences inattendues…\r\nDans le même temps, sur le continent Est, Viserys Targaryen, héritier « légitime » en exil des Sept Couronnes et fils d''Aerys, projette de marier sa jeune sœur Daenerys à Drogo, le chef d''une puissante horde de cavaliers nomades, afin de s''en faire des alliés en vue de la reconquête du royaume. Mais Viserys est presque aussi instable mentalement que son père.', NULL, 'Fantasy', 'Avril 2011', 3, 'En production', '55 min', 'http://www.youtube.com/embed/cdpKzgW3UWE'),
(5, 'Vikings', 'Canada Royaume-Uni Irlande', 'Michael Hirst', NULL, NULL, 'Drame Aventure Historique', 'Mars 2013', 1, 'En production', '44 min', ''),
(6, 'Spartacus', 'États-Unis', 'Steven S. DeKnight', NULL, NULL, 'Drame Peplum Historique', 'Janvier 2010 - Avril 2013', 3, 'Terminée', '42 min (S01) 54 min (S02, S03)', ''),
(7, 'Hell on Weels', 'Etats-Unis', 'Joe et Tony Gayton', NULL, NULL, 'Drame Historique Western', 'Novembre 2011', 2, 'En production', '43 min', ''),
(8, 'Rome', 'États-Unis Royaume-Uni ', ' John Milius, William J. MacDonald et Bruno Heller.', NULL, NULL, 'Drame Historique', 'Août 2005 - Mars 2007', 2, 'Terminée', '52 min', ''),
(9, 'Falling Skies', 'États-Unis', ' Robert Rodat, et produit par Steven Spielberg', NULL, 'Noah Wyle alias Tom Mason\r\nMoon Bloodgood alias Anne Glass\r\nDrew Roy alias Hal Mason\r\nWill Patton alias Capitaine Weaver\r\nConnor Jessup alias Ben Mason\r\nSarah Carter alias Margaret\r\nMaxim Knight alias Matt Mason\r\nColin Cunningham alias John Pope', 'Science-Fiction Post-Apocalyptique', 'Juin 2011', 2, 'En production', '42 min', ''),
(10, 'Révolution', 'États-Unis', 'Eric Kripke', NULL, NULL, 'Science-Fiction', 'Septembre 2012', 1, 'En production', '42 min', ''),
(11, 'Fringe', 'États-Unis', ' J.J. Abrams, Alex Kurtzman et Roberto Orci', NULL, NULL, 'Science-Fiction, Fantastique, Policier', 'Septembre 2008 - Janvier 2013', 5, 'Terminée', '47 min (S01) 42 min (autre saisons)', ''),
(12, 'How I met your mother', 'Etats-Unis', ' Carter Bays et Craig Thomas', NULL, NULL, 'Sitcom Comédie', 'Septembre 2005', 8, 'En production', '22 min', ''),
(13, 'The Big Bang Theory', 'Etats-Unis', 'Chuck Lorre et Bill Prady ', NULL, NULL, 'Sitcom Comédie Geek', 'Septembre 2007 ', 6, 'En production', '22 min', ''),
(14, 'Community', 'Etats-Unis', ' Dan Harmon', NULL, NULL, 'Sitcom Comédie ', 'Septembre 2009', 4, 'En production', '22 min', ''),
(15, 'Suits', 'Etats-Unis', 'Aaron Korsh', NULL, NULL, 'Comédie Judiciaire', 'Juin 2011', 2, 'En production', '43 min', '');

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

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(255) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) DEFAULT NULL,
  `nom` varchar(70) DEFAULT NULL,
  `prenom` varchar(70) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `nom`, `prenom`, `email`, `password`, `avatar`) VALUES
(1, 'djulien83', 'Delucis', 'Julien', 'djulien83@free.fr', 'e10adc3949ba59abbe56e057f20f883e', 'ajax-loader-djulien83');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `casting_serie`
--
ALTER TABLE `casting_serie`
  ADD CONSTRAINT `fk_table1_serie1` FOREIGN KEY (`serie_id_serie`) REFERENCES `serie` (`id_serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_user` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaire_serie1` FOREIGN KEY (`serie_id_serie`) REFERENCES `serie` (`id_serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `saison_serie`
--
ALTER TABLE `saison_serie`
  ADD CONSTRAINT `fk_saison_serie_serie1` FOREIGN KEY (`serie_id_serie`) REFERENCES `serie` (`id_serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `series_vues`
--
ALTER TABLE `series_vues`
  ADD CONSTRAINT `fk_Series_vues_user1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Series_vues_serie1` FOREIGN KEY (`serie_id_serie`) REFERENCES `serie` (`id_serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
