-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 15 nov. 2022 à 13:31
-- Version du serveur :  5.7.11
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_imprimande`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_commander`
--

CREATE TABLE `t_commander` (
  `idClient` int(11) NOT NULL,
  `idImprimante` int(11) NOT NULL,
  `comDate` date NOT NULL,
  `comPrix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_fabriquant`
--

CREATE TABLE `t_fabriquant` (
  `idFabriquant` int(11) NOT NULL,
  `fabNom` varchar(50) NOT NULL,
  `fabTel` varchar(20) NOT NULL,
  `fabAdresse` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_fabriquant`
--

INSERT INTO `t_fabriquant` (`idFabriquant`, `fabNom`, `fabTel`, `fabAdresse`) VALUES
(1, 'a', 'a', 'a'),
(2, 'b', 'b', 'b');

-- --------------------------------------------------------

--
-- Structure de la table `t_imprimante`
--

CREATE TABLE `t_imprimante` (
  `idImprimante` int(11) NOT NULL,
  `impHauteur` int(11) NOT NULL,
  `impLargeur` int(11) NOT NULL,
  `impModele` varchar(50) NOT NULL,
  `impNom` varchar(50) NOT NULL,
  `impVitesse` int(11) NOT NULL,
  `impResolution` int(11) NOT NULL,
  `impRectoVerso` char(1) NOT NULL,
  `impBacPapier` int(11) NOT NULL,
  `impPrix` int(11) NOT NULL,
  `impPrixInitial` int(11) NOT NULL,
  `idFabriquant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`idImprimante`,`idClient`),
  ADD UNIQUE KEY `ID_t_commander_IND` (`idImprimante`,`idClient`),
  ADD KEY `FKt_c_t_c_IND` (`idClient`);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_client`
--
ALTER TABLE `t_client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_fabriquant`
--
ALTER TABLE `t_fabriquant`
  MODIFY `idFabriquant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_imprimante`
--
ALTER TABLE `t_imprimante`
  MODIFY `idImprimante` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
