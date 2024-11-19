-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 19 déc. 2023 à 02:17
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biorelai`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

DROP TABLE IF EXISTS `adherents`;
CREATE TABLE IF NOT EXISTS `adherents` (
  `idAdherent` int NOT NULL,
  PRIMARY KEY (`idAdherent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adherents`
--

INSERT INTO `adherents` (`idAdherent`) VALUES
(1),
(4),
(5),
(10),
(11),
(26),
(30),
(31);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCategorie` int NOT NULL,
  `nomCategorie` varchar(40) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `nomCategorie`) VALUES
(1, 'Légumes'),
(2, 'Fruits'),
(3, 'Fruit_Sec'),
(4, 'Fruit_Exotique');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `idCommande` int NOT NULL AUTO_INCREMENT,
  `dateCommande` timestamp NOT NULL,
  `statutCo` varchar(50) CHARACTER SET utf8mb4  DEFAULT 'EN_COURS',
  `idVente` int DEFAULT NULL,
  `idAdherent` int NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `commandes_ibfk_1` (`idAdherent`),
  KEY `commandes_ibfk_2` (`idVente`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`idCommande`, `dateCommande`, `statutCo`, `idVente`, `idAdherent`) VALUES
(41, '2023-12-19 01:46:32', 'VALIDER', 1, 26),
(44, '0000-00-00 00:00:00', 'EN_COURS', NULL, 26);

-- --------------------------------------------------------

--
-- Structure de la table `lignesCommande`
--

DROP TABLE IF EXISTS `lignesCommande`;
CREATE TABLE IF NOT EXISTS `lignesCommande` (
  `idCommande` int NOT NULL,
  `idProduit` int NOT NULL,
  `quantite` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idCommande`,`idProduit`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lignesCommande` 
--

INSERT INTO `lignesCommande` (`idCommande`, `idProduit`, `quantite`) VALUES
(41, 2, '400.00'),
(44, 3, '50.00');

-- --------------------------------------------------------

--
-- Structure de la table `producteurs`
--

DROP TABLE IF EXISTS `producteurs`;
CREATE TABLE IF NOT EXISTS `producteurs` (
  `idProducteur` int NOT NULL,
  `adresseProducteur` varchar(50) NOT NULL,
  `communeProducteur` varchar(40) NOT NULL,
  `codePostalProduit` varchar(5) NOT NULL,
  `descriptifProducteur` longtext NOT NULL,
  `photoProducteur` varchar(40) NOT NULL,
  PRIMARY KEY (`idProducteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `producteurs`
--

INSERT INTO `producteurs` (`idProducteur`, `adresseProducteur`, `communeProducteur`, `codePostalProduit`, `descriptifProducteur`, `photoProducteur`) VALUES
(2, '15 rue Ferbos', 'Bordeaux', '33800', 'je produit des légumes', ''),
(3, '15 rue Ferbos', 'Bordeaux', '33800', 'je produis des fruits', ''),
(25, '10 impasse de l\'inconnu', 'Darreville', '33720', 'Je produis des fruits sec depuis 15 ans dans le Sud, la production est surtout familiale.', '');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idProduit` int NOT NULL,
  `nomProduit` varchar(50) NOT NULL,
  `descriptifProduit` longtext NOT NULL,
  `photoProduit` varchar(40) NOT NULL,
  `idProducteur` int NOT NULL,
  `idCategorie` int NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `idProducteur` (`idProducteur`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `nomProduit`, `descriptifProduit`, `photoProduit`, `idProducteur`, `idCategorie`) VALUES
(1, 'Carotte', 'Les carottes bien fraiches du Sud.', '', 2, 1),
(2, 'Pêche', 'Les pêches bien juteuses du Sud.', '', 3, 2),
(3, 'Abricot_sec', 'Abricots secs et délicieux.', '', 25, 3);

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

DROP TABLE IF EXISTS `proposer`;
CREATE TABLE IF NOT EXISTS `proposer` (
  `idVente` int NOT NULL,
  `idProduit` int NOT NULL,
  `unite` varchar(10) NOT NULL,
  `quantite` int NOT NULL,
  `prix` int NOT NULL,
  PRIMARY KEY (`idVente`,`idProduit`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `proposer`
--

INSERT INTO `proposer` (`idVente`, `idProduit`, `unite`, `quantite`, `prix`) VALUES
(1, 1, '0,50', 20000, 10000),
(1, 2, '0,30', 10000, 3000),
(1, 3, '0,35', 10000, 3500);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(128) NOT NULL,
  `statut` varchar(15) CHARACTER SET utf8mb4  NOT NULL,
  `nomUtilisateur` varchar(40) NOT NULL,
  `prenomUtilisateur` varchar(40) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `mail`, `mdp`, `statut`, `nomUtilisateur`, `prenomUtilisateur`) VALUES
(1, 'user1@gmail.com', 'user1', 'Client', 'user1', 'user1'),
(2, 'henri.lino@gmail.com', 'Lino2023', 'Producteur', 'Lino', 'Henri'),
(3, 'jean.pierre@gmail.com', 'pierre2023', 'Producteur', 'Pierre', 'Jean'),
(4, 'user4@gmail.com', 'user4', 'Client', 'user4', 'user4'),
(5, 'user5@gmail.com', 'user5', 'Client', 'user5', 'user5'),
(6, 'user6@gmail.com', 'user6', 'Responsable', 'user6', 'user6'),
(10, 'test1@gmail.com', 'test1', 'Client', 'test1', 'test1'),
(11, 'test2@gmail.com', 'test2', 'Client', 'test2', 'test2'),
(25, 'christophe.deterre@gmail.com', 'Deterre2023', 'Producteur', 'Deterre', 'Christophe'),
(26, 'matis.massieu@gmail.com', 'Massieu2023', 'Client', 'Massieu', 'Mathis'),
(30, 'test3@gmail.com', 'test3', 'Client', 'test3', 'test3'),
(31, 'test4@gmail.com', 'test4', 'Client', 'test4', 'test4');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

DROP TABLE IF EXISTS `ventes`;
CREATE TABLE IF NOT EXISTS `ventes` (
  `idVentes` int NOT NULL,
  `dateVente` date NOT NULL,
  `dateDebutProd` date NOT NULL,
  `dateDebutFinProd` date NOT NULL,
  `dateDebutCli` timestamp NOT NULL,
  `dateFinCli` timestamp NOT NULL,
  PRIMARY KEY (`idVentes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`idVentes`, `dateVente`, `dateDebutProd`, `dateDebutFinProd`, `dateDebutCli`, `dateFinCli`) VALUES
(1, '2023-12-17', '2024-01-24', '2024-01-31', '2023-12-18 02:44:57', '2023-12-18 02:44:57');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD CONSTRAINT `adherents_ibfk_1` FOREIGN KEY (`idAdherent`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`idVente`) REFERENCES `ventes` (`idVentes`),
  ADD CONSTRAINT `commandes_ibfk_3` FOREIGN KEY (`idAdherent`) REFERENCES `adherents` (`idAdherent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lignesCommande` 
--
ALTER TABLE `lignescommande`
  ADD CONSTRAINT `lignescommande_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`),
  ADD CONSTRAINT `lignescommande_ibfk_3` FOREIGN KEY (`idCommande`) REFERENCES `commandes` (`idCommande`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `producteurs`
--
ALTER TABLE `producteurs`
  ADD CONSTRAINT `producteurs_ibfk_1` FOREIGN KEY (`idProducteur`) REFERENCES `utilisateurs` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`idProducteur`) REFERENCES `producteurs` (`idProducteur`),
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`);

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `proposer_ibfk_1` FOREIGN KEY (`idVente`) REFERENCES `ventes` (`idVentes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proposer_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
