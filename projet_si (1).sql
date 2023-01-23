-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 23 jan. 2023 à 09:23
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_si`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `idAdresse` bigint(20) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `pays` varchar(20) NOT NULL,
  PRIMARY KEY (`idAdresse`),
  UNIQUE KEY `idAdresse` (`idAdresse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `statusArticle` enum('en stock','en rupture de stock') NOT NULL,
  `prixUnitaire` int(11) NOT NULL,
  `nbArticle` int(11) NOT NULL,
  PRIMARY KEY (`idArticle`),
  UNIQUE KEY `idArticle` (`idArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `name`, `statusArticle`, `prixUnitaire`, `nbArticle`) VALUES
(1, 'parfum', 'en stock', 30, 30),
(2, 'crème', 'en stock', 20, 20);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `facebook` varchar(20) NOT NULL,
  `instagram` varchar(20) NOT NULL,
  `tel` bigint(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nom`, `prenom`, `facebook`, `instagram`, `tel`, `email`) VALUES
(3, 'morvan', 'tanguy', 'tangobg', 'tangobg', 669696969, 'tango@lasticot.fr'),
(4, 'vaillant', 'remi', 'remibg', 'remibg', 666666666, 'rem@rem.fr'),
(5, 'baugé', 'florian', 'flobg', 'flobg', 674747474, 'flo@lesud.fr');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `numéroCommande` bigint(20) NOT NULL AUTO_INCREMENT,
  `dateCommande` date NOT NULL,
  `nomRéférent` varchar(20) NOT NULL,
  `numéroMois` int(11) NOT NULL,
  `totalCommande` int(11) NOT NULL,
  `dépotTotal` int(11) NOT NULL,
  `àPayer` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `statusCommande` varchar(20) NOT NULL,
  `idClient` bigint(20) NOT NULL,
  PRIMARY KEY (`numéroCommande`),
  UNIQUE KEY `numéroCommande` (`numéroCommande`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`numéroCommande`, `dateCommande`, `nomRéférent`, `numéroMois`, `totalCommande`, `dépotTotal`, `àPayer`, `points`, `statusCommande`, `idClient`) VALUES
(1, '2023-01-01', 'tanguy', 1, 50, 20, 30, 50, 'à payer', 3),
(2, '2023-01-21', 'remi', 2, 30, 10, 20, 30, 'à payer', 4);

-- --------------------------------------------------------

--
-- Structure de la table `envoie`
--

DROP TABLE IF EXISTS `envoie`;
CREATE TABLE IF NOT EXISTS `envoie` (
  `idEnvoie` int(11) NOT NULL AUTO_INCREMENT,
  `idArticle` bigint(11) NOT NULL,
  `idCommande` bigint(11) NOT NULL,
  PRIMARY KEY (`idEnvoie`),
  KEY `idArticle` (`idArticle`),
  KEY `idCommande` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `idFacture` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `noFacture` int(11) NOT NULL,
  `dateFacture` date NOT NULL,
  `maj` date NOT NULL,
  `fraisService` int(11) NOT NULL,
  `promotion` int(11) NOT NULL,
  `depot` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `numéroCommande` bigint(20) NOT NULL,
  PRIMARY KEY (`idFacture`),
  KEY `numéroCommande` (`numéroCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`idFacture`, `noFacture`, `dateFacture`, `maj`, `fraisService`, `promotion`, `depot`, `montant`, `numéroCommande`) VALUES
(1, 1, '2023-01-22', '2023-01-22', 0, 0, 20, 50, 1),
(2, 2, '2023-01-22', '2023-01-22', 0, 0, 10, 30, 2);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `idHistorique` bigint(20) NOT NULL AUTO_INCREMENT,
  `pointDéposé` int(11) NOT NULL,
  `Echange` varchar(20) NOT NULL,
  `idRegle` bigint(20) NOT NULL,
  PRIMARY KEY (`idHistorique`),
  UNIQUE KEY `idHistorique` (`idHistorique`),
  KEY `idRegle` (`idRegle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `idLivraison` bigint(20) NOT NULL AUTO_INCREMENT,
  `gratuité` tinyint(1) NOT NULL,
  `numColis` bigint(20) NOT NULL,
  `nomEntreprise` varchar(20) NOT NULL,
  `nomLivreur` varchar(20) NOT NULL,
  `dateEnvoi` date NOT NULL,
  `dateArrivée` date NOT NULL,
  `note` varchar(50) NOT NULL,
  `idAdresse` bigint(20) NOT NULL,
  PRIMARY KEY (`idLivraison`),
  UNIQUE KEY `idLivraison` (`idLivraison`),
  KEY `idAdresse` (`idAdresse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membership`
--

DROP TABLE IF EXISTS `membership`;
CREATE TABLE IF NOT EXISTS `membership` (
  `idMembership` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  `idRegle` bigint(20) NOT NULL,
  PRIMARY KEY (`idMembership`),
  UNIQUE KEY `idMembership` (`idMembership`),
  KEY `idRegle` (`idRegle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `moyen de paiement`
--

DROP TABLE IF EXISTS `moyen de paiement`;
CREATE TABLE IF NOT EXISTS `moyen de paiement` (
  `idMoyenPaiement` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomPaiement` varchar(20) NOT NULL,
  PRIMARY KEY (`idMoyenPaiement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `idPaiement` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `montant` int(11) NOT NULL,
  `promotion` int(11) NOT NULL,
  `pénalité` int(11) NOT NULL,
  `numPaiement` bigint(20) NOT NULL,
  `paiementPoint` int(11) NOT NULL,
  `idMoyenPaiement` bigint(20) NOT NULL,
  `idPayeur` bigint(20) NOT NULL,
  PRIMARY KEY (`idPaiement`),
  KEY `idMoyenPaiement` (`idMoyenPaiement`),
  KEY `idPayeur_2` (`idPayeur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `idPoints` bigint(20) NOT NULL AUTO_INCREMENT,
  `quantité` int(11) NOT NULL,
  `datePeremption` date NOT NULL,
  PRIMARY KEY (`idPoints`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `regles`
--

DROP TABLE IF EXISTS `regles`;
CREATE TABLE IF NOT EXISTS `regles` (
  `idRegle` bigint(20) NOT NULL AUTO_INCREMENT,
  `quantitéPoint` int(11) NOT NULL,
  `dateUtilisation` date NOT NULL,
  `intitule` varchar(20) NOT NULL,
  PRIMARY KEY (`idRegle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rib/destinataire`
--

DROP TABLE IF EXISTS `rib/destinataire`;
CREATE TABLE IF NOT EXISTS `rib/destinataire` (
  `idPayeur2` bigint(20) NOT NULL AUTO_INCREMENT,
  `RIB` bigint(20) NOT NULL,
  PRIMARY KEY (`idPayeur2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'test@test.fr', 'test');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `test56` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `envoie`
--
ALTER TABLE `envoie`
  ADD CONSTRAINT `testidarticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `testidcommande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`numéroCommande`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `test9` FOREIGN KEY (`numéroCommande`) REFERENCES `commande` (`numéroCommande`);

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `test18` FOREIGN KEY (`idRegle`) REFERENCES `regles` (`idRegle`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `test7` FOREIGN KEY (`idAdresse`) REFERENCES `adresse` (`idAdresse`);

--
-- Contraintes pour la table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`idRegle`) REFERENCES `regles` (`idRegle`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `test` FOREIGN KEY (`idMoyenPaiement`) REFERENCES `moyen de paiement` (`idMoyenPaiement`),
  ADD CONSTRAINT `test2` FOREIGN KEY (`idPayeur`) REFERENCES `rib/destinataire` (`idPayeur2`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
