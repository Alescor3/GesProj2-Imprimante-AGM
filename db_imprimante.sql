-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 13 déc. 2022 à 12:18
-- Version du serveur : 5.7.11
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_imprimante`
--
CREATE DATABASE IF NOT EXISTS `db_imprimante` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_imprimante`;

-- --------------------------------------------------------

--
-- Structure de la table `t_client`
--

CREATE TABLE `t_client` (
  `idClient` int(11) NOT NULL,
  `cliNom` varchar(50) NOT NULL,
  `cliPrenom` varchar(50) NOT NULL,
  `cliTel` varchar(20) NOT NULL,
  `cliAdresse` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_commander`
--

CREATE TABLE `t_commander` (
  `idCommander` int(11) NOT NULL,
  `comDate` date NOT NULL,
  `comPrix` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idImprimante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_consommable`
--

CREATE TABLE `t_consommable` (
  `idConsommable` int(11) NOT NULL,
  `conNom` varchar(100) NOT NULL,
  `conPrix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_consommable`
--

INSERT INTO `t_consommable` (`idConsommable`, `conNom`, `conPrix`) VALUES
(1, 'Canon Multipack de cartouches d\'encre CLI-581 BK/C/M/Y', 32),
(2, 'Photo Value Pack CLI-581 XL (2052C004)', 50),
(3, 'Original Canon 1998C005 / CLI581XXL Tintenpatrone MultiPack', 69),
(4, 'Double A Kopierpapier', 15),
(5, 'Papier photoc. A4 blanc 5×500', 30),
(6, 'Papeteria · Papier copies A4, blanc · 210x297mm - 80g/m2 - sans chlore élémentaire', 9);

-- --------------------------------------------------------

--
-- Structure de la table `t_fabriquant`
--

CREATE TABLE `t_fabriquant` (
  `idFabriquant` int(11) NOT NULL,
  `fabNom` varchar(50) NOT NULL,
  `fabTel` varchar(20) NOT NULL,
  `fabMail` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_fabriquant`
--

INSERT INTO `t_fabriquant` (`idFabriquant`, `fabNom`, `fabTel`, `fabMail`) VALUES
(1, 'Canon', '+41 (0)76 333 04 04', 'press@canon.ch');

-- --------------------------------------------------------

--
-- Structure de la table `t_imprimante`
--

CREATE TABLE `t_imprimante` (
  `idImprimante` int(11) NOT NULL,
  `impHauteur` int(11) NOT NULL,
  `impLargeur` int(11) NOT NULL,
  `impProfondeur` int(11) NOT NULL,
  `impPoids` int(11) NOT NULL,
  `impModele` varchar(50) NOT NULL,
  `impNom` varchar(50) NOT NULL,
  `impVitesse` int(11) NOT NULL,
  `impRectoVerso` tinyint(1) NOT NULL,
  `impBacPapier` int(11) NOT NULL,
  `impResolutionImpression` varchar(15) NOT NULL,
  `impResolutionNumerisation` varchar(15) NOT NULL,
  `impDisponibilite` tinyint(1) NOT NULL,
  `impPrix` int(11) NOT NULL,
  `impPrixInitial` int(11) NOT NULL,
  `idFabriquant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_imprimante`
--

INSERT INTO `t_imprimante` (`idImprimante`, `impHauteur`, `impLargeur`, `impProfondeur`, `impPoids`, `impModele`, `impNom`, `impVitesse`, `impRectoVerso`, `impBacPapier`, `impResolutionImpression`, `impResolutionNumerisation`, `impDisponibilite`, `impPrix`, `impPrixInitial`, `idFabriquant`) VALUES
(1, 193, 468, 366, 9, 'PIXMA', 'TS9550', 15, 1, 100, 'A3, A4, A5, B5,', '1200 x 2400 ppp', 1, 240, 240, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_utiliser`
--

CREATE TABLE `t_utiliser` (
  `idConsommable` int(11) NOT NULL,
  `idImprimante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_utiliser`
--

INSERT INTO `t_utiliser` (`idConsommable`, `idImprimante`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_client`
--
ALTER TABLE `t_client`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `ID_t_client_IND` (`idClient`);

--
-- Index pour la table `t_commander`
--
ALTER TABLE `t_commander`
  ADD PRIMARY KEY (`idCommander`),
  ADD UNIQUE KEY `ID_t_commander_IND` (`idImprimante`,`idClient`,`idCommander`),
  ADD KEY `FKt_c_t_c_IND` (`idClient`);

--
-- Index pour la table `t_consommable`
--
ALTER TABLE `t_consommable`
  ADD PRIMARY KEY (`idConsommable`),
  ADD UNIQUE KEY `ID_t_consommable_IND` (`idConsommable`);

--
-- Index pour la table `t_fabriquant`
--
ALTER TABLE `t_fabriquant`
  ADD PRIMARY KEY (`idFabriquant`),
  ADD UNIQUE KEY `ID_t_fabriquant_IND` (`idFabriquant`);

--
-- Index pour la table `t_imprimante`
--
ALTER TABLE `t_imprimante`
  ADD PRIMARY KEY (`idImprimante`),
  ADD UNIQUE KEY `ID_t_imprimante_IND` (`idImprimante`),
  ADD KEY `FKt_creer_IND` (`idFabriquant`);

--
-- Index pour la table `t_utiliser`
--
ALTER TABLE `t_utiliser`
  ADD PRIMARY KEY (`idConsommable`,`idImprimante`),
  ADD UNIQUE KEY `ID_t_utiliser_IND` (`idConsommable`,`idImprimante`),
  ADD KEY `FKt_u_t_i_IND` (`idImprimante`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_client`
--
ALTER TABLE `t_client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_commander`
--
ALTER TABLE `t_commander`
  MODIFY `idCommander` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_consommable`
--
ALTER TABLE `t_consommable`
  MODIFY `idConsommable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_fabriquant`
--
ALTER TABLE `t_fabriquant`
  MODIFY `idFabriquant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_imprimante`
--
ALTER TABLE `t_imprimante`
  MODIFY `idImprimante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_commander`
--
ALTER TABLE `t_commander`
  ADD CONSTRAINT `FKt_c_t_c_FK` FOREIGN KEY (`idClient`) REFERENCES `t_client` (`idClient`),
  ADD CONSTRAINT `FKt_c_t_i` FOREIGN KEY (`idImprimante`) REFERENCES `t_imprimante` (`idImprimante`);

--
-- Contraintes pour la table `t_imprimante`
--
ALTER TABLE `t_imprimante`
  ADD CONSTRAINT `FKt_creer_FK` FOREIGN KEY (`idFabriquant`) REFERENCES `t_fabriquant` (`idFabriquant`);

--
-- Contraintes pour la table `t_utiliser`
--
ALTER TABLE `t_utiliser`
  ADD CONSTRAINT `FKt_u_t_c` FOREIGN KEY (`idConsommable`) REFERENCES `t_consommable` (`idConsommable`),
  ADD CONSTRAINT `FKt_u_t_i_FK` FOREIGN KEY (`idImprimante`) REFERENCES `t_imprimante` (`idImprimante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
