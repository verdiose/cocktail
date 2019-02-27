-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 fév. 2019 à 17:43
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `breuvage`
--

-- --------------------------------------------------------

--
-- Structure de la table `agrement`
--

DROP TABLE IF EXISTS `agrement`;
CREATE TABLE IF NOT EXISTS `agrement` (
  `idA` int(11) NOT NULL AUTO_INCREMENT,
  `nomA` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idC` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idC`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idC`, `type`) VALUES
(1, 'Alcool'),
(2, 'Soft'),
(3, 'Fruit'),
(4, 'Divers'),
(5, 'liqueur');

-- --------------------------------------------------------

--
-- Structure de la table `comporter`
--

DROP TABLE IF EXISTS `comporter`;
CREATE TABLE IF NOT EXISTS `comporter` (
  `idR` int(11) NOT NULL,
  `idA` int(11) NOT NULL,
  `quantA` float NOT NULL,
  `unit` int(11) NOT NULL,
  KEY `idA` (`idA`),
  KEY `idR` (`idR`),
  KEY `unit` (`unit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `idI` int(11) NOT NULL,
  `idR` int(11) NOT NULL,
  `quantI` float NOT NULL,
  `unite` int(11) NOT NULL,
  KEY `idI` (`idI`),
  KEY `idR` (`idR`),
  KEY `unite` (`unite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`idI`, `idR`, `quantI`, `unite`) VALUES
(13, 1, 13.7, 7),
(16, 1, 2, 2),
(17, 2, 5, 3),
(16, 2, 1, 2),
(13, 2, 4.5, 7),
(15, 2, 4.5, 7),
(14, 2, 4.5, 7);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `det1`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `det1`;
CREATE TABLE IF NOT EXISTS `det1` (
`idR` int(11)
,`intit` varchar(20)
,`realiz` text
,`annee` year(4)
,`pays` varchar(10)
,`createur` varchar(15)
,`lib` varchar(15)
,`quantI` float
,`denom` varchar(3)
);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `idI` int(11) NOT NULL AUTO_INCREMENT,
  `lib` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `catego` int(11) NOT NULL,
  `px` float NOT NULL,
  `unité` int(11) NOT NULL,
  PRIMARY KEY (`idI`),
  KEY `catego` (`catego`),
  KEY `unité` (`unité`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`idI`, `lib`, `catego`, `px`, `unité`) VALUES
(11, 'coca', 2, 1.1, 1),
(12, 'jus orange', 2, 1.97, 1),
(13, 'rhum blanc', 1, 20.86, 1),
(14, 'rhum paille', 1, 28.5, 1),
(15, 'rhum vieux', 1, 39.43, 1),
(16, 'sucre canne', 4, 5.64, 1),
(17, 'lime', 3, 3.98, 6),
(18, 'citron', 3, 2.49, 6),
(19, 'pulco', 4, 1.56, 1),
(20, 'jus ananas', 2, 2.36, 7);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `idL` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idL`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`idL`, `code`) VALUES
(1, '@L-cool');

-- --------------------------------------------------------

--
-- Structure de la table `origine`
--

DROP TABLE IF EXISTS `origine`;
CREATE TABLE IF NOT EXISTS `origine` (
  `idO` int(11) NOT NULL AUTO_INCREMENT,
  `pays` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `createur` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `annee` year(4) NOT NULL,
  PRIMARY KEY (`idO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `origine`
--

INSERT INTO `origine` (`idO`, `pays`, `createur`, `annee`) VALUES
(1, 'Cuba', 'Jennings Cox', 1902),
(2, 'Hollywood', 'Ernest Gantt', 1934);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `idR` int(11) NOT NULL AUTO_INCREMENT,
  `intit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `origine` int(11) DEFAULT NULL,
  `nbIng` int(2) NOT NULL,
  `nbAgr` int(2) NOT NULL,
  `realiz` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idR`),
  KEY `origine` (`origine`),
  KEY `nbIng` (`nbIng`),
  KEY `nbAgr` (`nbAgr`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idR`, `intit`, `origine`, `nbIng`, `nbAgr`, `realiz`) VALUES
(1, 'Daiquiri', 1, 3, 1, '- Verser 1 tasse de glace dans 1 shaker\r\n- y napper les 3 liquides\r\n- secouer jusqu\'à formation de buée sur la timbale'),
(2, 'Zombie', 2, 6, 1, 'Bla bla bla');

-- --------------------------------------------------------

--
-- Structure de la table `unites`
--

DROP TABLE IF EXISTS `unites`;
CREATE TABLE IF NOT EXISTS `unites` (
  `idU` int(11) NOT NULL AUTO_INCREMENT,
  `denom` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idU`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `unites`
--

INSERT INTO `unites` (`idU`, `denom`) VALUES
(1, 'L'),
(2, 'cc'),
(3, 'CS'),
(4, 'pc'),
(5, 'gr'),
(6, 'kg'),
(7, 'cl'),
(8, 'oz'),
(9, '%');

-- --------------------------------------------------------

--
-- Structure de la vue `det1`
--
DROP TABLE IF EXISTS `det1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `det1`  AS  select `r`.`idR` AS `idR`,`r`.`intit` AS `intit`,`r`.`realiz` AS `realiz`,`o`.`annee` AS `annee`,`o`.`pays` AS `pays`,`o`.`createur` AS `createur`,`i`.`lib` AS `lib`,`ci`.`quantI` AS `quantI`,`u`.`denom` AS `denom` from ((((`origine` `o` join `recette` `r` on((`o`.`idO` = `r`.`origine`))) join `contenir` `ci` on((`r`.`idR` = `ci`.`idR`))) join `ingredient` `i` on((`ci`.`idI` = `i`.`idI`))) join `unites` `u` on((`u`.`idU` = `ci`.`unite`))) ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comporter`
--
ALTER TABLE `comporter`
  ADD CONSTRAINT `comporter_ibfk_1` FOREIGN KEY (`idA`) REFERENCES `agrement` (`idA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comporter_ibfk_2` FOREIGN KEY (`idR`) REFERENCES `recette` (`idR`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comporter_ibfk_3` FOREIGN KEY (`unit`) REFERENCES `unites` (`idU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`idI`) REFERENCES `ingredient` (`idI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`idR`) REFERENCES `recette` (`idR`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contenir_ibfk_3` FOREIGN KEY (`unite`) REFERENCES `unites` (`idU`);

--
-- Contraintes pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `ingredient_ibfk_1` FOREIGN KEY (`catego`) REFERENCES `categorie` (`idC`),
  ADD CONSTRAINT `ingredient_ibfk_2` FOREIGN KEY (`unité`) REFERENCES `unites` (`idU`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `recette_ibfk_1` FOREIGN KEY (`origine`) REFERENCES `origine` (`idO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
