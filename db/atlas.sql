-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 20 fév. 2022 à 19:49
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `atlas`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_articles`
--

CREATE TABLE `tbl_articles` (
  `ID` int(11) NOT NULL,
  `ARTICLE` varchar(200) DEFAULT NULL,
  `QTE` int(11) DEFAULT 0,
  `PRIX` int(11) DEFAULT NULL,
  `CONDITIONEMMENT` enum('Carton','Paquet','Sac','unite','Autre') NOT NULL,
  `PEREMPTION` date NOT NULL DEFAULT current_timestamp(),
  `PAYSFABR` varchar(50) NOT NULL,
  `MONTANT` int(11) DEFAULT 0,
  `STOCK_OUT` int(11) DEFAULT 0,
  `DATECREAT` date DEFAULT NULL,
  `STATUT` enum('0','1') DEFAULT NULL,
  `IDCAT` int(11) DEFAULT NULL,
  `IDUSER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `ID` int(11) NOT NULL,
  `CATEGORIE` varchar(40) DEFAULT NULL,
  `CREATEDAT` date NOT NULL,
  `STATUT` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_depenses`
--

CREATE TABLE `tbl_depenses` (
  `ID` int(11) NOT NULL,
  `BENEFICIAIRE` varchar(200) DEFAULT NULL,
  `TEL` varchar(20) DEFAULT NULL,
  `ADRESSE` varchar(100) DEFAULT NULL,
  `MOTIF` varchar(150) DEFAULT NULL,
  `MONTANT` int(11) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `DATEINS` date NOT NULL,
  `STATUT` enum('0','1') NOT NULL,
  `IDU` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_historic_appro`
--

CREATE TABLE `tbl_historic_appro` (
  `ID` int(11) NOT NULL,
  `ID_ARTICLE` int(11) NOT NULL,
  `PEREMPTION` date NOT NULL,
  `QTE` int(11) NOT NULL,
  `PAYSFABR` varchar(50) NOT NULL,
  `DATE_APP` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_other_entry`
--

CREATE TABLE `tbl_other_entry` (
  `ID` int(11) NOT NULL,
  `CLIENT` varchar(200) DEFAULT NULL,
  `TEL` varchar(20) DEFAULT NULL,
  `ADRESSE` varchar(100) DEFAULT NULL,
  `MOTIF` varchar(150) DEFAULT NULL,
  `MONTANT` int(11) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `DATEINS` date NOT NULL,
  `STATUT` enum('0','1') NOT NULL,
  `IDU` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_stockm`
--

CREATE TABLE `tbl_stockm` (
  `ID` int(11) NOT NULL,
  `ARTICLE` varchar(200) DEFAULT NULL,
  `QTE` int(11) DEFAULT 0,
  `PRIX` int(11) DEFAULT NULL,
  `CONDITIONEMMENT` enum('Carton','Paquet','Sac','unite','Autre') NOT NULL,
  `PEREMPTION` date NOT NULL DEFAULT current_timestamp(),
  `PAYSFABR` varchar(200) NOT NULL,
  `MONTANT` int(11) DEFAULT 0,
  `STOCK_OUT` int(11) DEFAULT 0,
  `DATERECEIVE` date DEFAULT NULL,
  `STATUT` enum('0','1') DEFAULT NULL,
  `IDCAT` int(11) DEFAULT NULL,
  `IDUSER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_stockq`
--

CREATE TABLE `tbl_stockq` (
  `ID` int(11) NOT NULL,
  `ARTICLE` varchar(200) DEFAULT NULL,
  `QTE` int(11) DEFAULT 0,
  `PRIX` int(11) DEFAULT NULL,
  `CONDITIONEMMENT` enum('Carton','Paquet','Sac','unite','Autre') NOT NULL,
  `PEREMPTION` date NOT NULL DEFAULT current_timestamp(),
  `PAYSFABR` varchar(200) NOT NULL,
  `MONTANT` int(11) DEFAULT 0,
  `STOCK_OUT` int(11) DEFAULT 0,
  `DATERECEIVE` date DEFAULT NULL,
  `STATUT` enum('0','1') DEFAULT NULL,
  `IDCAT` int(11) DEFAULT NULL,
  `IDUSER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(200) DEFAULT NULL,
  `PWD` varchar(200) DEFAULT NULL,
  `NAME` varchar(200) DEFAULT NULL,
  `TYPE` varchar(50) NOT NULL,
  `STATUT` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_users`
--

INSERT INTO `tbl_users` (`ID`, `EMAIL`, `PWD`, `NAME`, `TYPE`, `STATUT`) VALUES
(13, 'admin@gmail.com', '$2y$10$EWVesdGmO7QyX7ZRa/OOb.LmDJrkcd86lTuTGP7KaRZ431RxYLBhe', 'admin', 'admin', '0'),
(29, 'carolle@gmail.com', '$2y$10$8XVXsbgkpax3i.PzOfgIfO5MplZMwOIjf/1FDTWGQ4HPeNWkvswpG', 'Carolle', 'magasinier', '1'),
(30, 'dev@gmail.com', '$2y$10$EwiUv8264lDy3k5kxJfO5.BVrMWaRVs.S9J4NS5He7rC2ZDnOCmcO', 'Dev', 'admin', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_vente`
--

CREATE TABLE `tbl_vente` (
  `ID` int(11) NOT NULL,
  `DATEV` date DEFAULT NULL,
  `CLIENT` varchar(200) DEFAULT NULL,
  `TEL` varchar(150) DEFAULT NULL,
  `STATUTV` enum('totalite','partiel','dette') DEFAULT NULL,
  `MTOTAL` varchar(40) NOT NULL,
  `PAYE` int(11) NOT NULL,
  `RESTE` int(11) NOT NULL,
  `STATUT` enum('0','1') DEFAULT NULL,
  `PTYPE` enum('Cheque','Cash','CC') NOT NULL,
  `DATE` date NOT NULL DEFAULT current_timestamp(),
  `DEPOT` enum('Quincaillerie','Magasin') NOT NULL,
  `IDU` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_vente_article`
--

CREATE TABLE `tbl_vente_article` (
  `ID` int(11) NOT NULL,
  `IDV` int(11) DEFAULT NULL,
  `IDA` int(11) DEFAULT NULL,
  `QTE` int(11) DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL,
  `STATUT` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_articles`
--
ALTER TABLE `tbl_articles`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ARTICLE` (`ARTICLE`),
  ADD KEY `IDCAT` (`IDCAT`),
  ADD KEY `IDUSER` (`IDUSER`);

--
-- Index pour la table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `tbl_depenses`
--
ALTER TABLE `tbl_depenses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDU` (`IDU`);

--
-- Index pour la table `tbl_historic_appro`
--
ALTER TABLE `tbl_historic_appro`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `tbl_other_entry`
--
ALTER TABLE `tbl_other_entry`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDU` (`IDU`);

--
-- Index pour la table `tbl_stockm`
--
ALTER TABLE `tbl_stockm`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDCAT` (`IDCAT`),
  ADD KEY `IDUSER` (`IDUSER`);

--
-- Index pour la table `tbl_stockq`
--
ALTER TABLE `tbl_stockq`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDCAT` (`IDCAT`),
  ADD KEY `IDUSER` (`IDUSER`);

--
-- Index pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Index pour la table `tbl_vente`
--
ALTER TABLE `tbl_vente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_VenteArticle` (`IDU`);

--
-- Index pour la table `tbl_vente_article`
--
ALTER TABLE `tbl_vente_article`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDV` (`IDV`),
  ADD KEY `IDA` (`IDA`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_articles`
--
ALTER TABLE `tbl_articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `tbl_depenses`
--
ALTER TABLE `tbl_depenses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_historic_appro`
--
ALTER TABLE `tbl_historic_appro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_other_entry`
--
ALTER TABLE `tbl_other_entry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_stockm`
--
ALTER TABLE `tbl_stockm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_stockq`
--
ALTER TABLE `tbl_stockq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `tbl_vente`
--
ALTER TABLE `tbl_vente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_vente_article`
--
ALTER TABLE `tbl_vente_article`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tbl_articles`
--
ALTER TABLE `tbl_articles`
  ADD CONSTRAINT `tbl_articles_ibfk_1` FOREIGN KEY (`IDCAT`) REFERENCES `tbl_categories` (`ID`),
  ADD CONSTRAINT `tbl_articles_ibfk_2` FOREIGN KEY (`IDUSER`) REFERENCES `tbl_users` (`ID`);

--
-- Contraintes pour la table `tbl_depenses`
--
ALTER TABLE `tbl_depenses`
  ADD CONSTRAINT `tbl_depenses_ibfk_1` FOREIGN KEY (`IDU`) REFERENCES `tbl_users` (`ID`);

--
-- Contraintes pour la table `tbl_other_entry`
--
ALTER TABLE `tbl_other_entry`
  ADD CONSTRAINT `tbl_other_entry_ibfk_1` FOREIGN KEY (`IDU`) REFERENCES `tbl_users` (`ID`);

--
-- Contraintes pour la table `tbl_stockm`
--
ALTER TABLE `tbl_stockm`
  ADD CONSTRAINT `tbl_stockm_ibfk_1` FOREIGN KEY (`IDCAT`) REFERENCES `tbl_categories` (`ID`),
  ADD CONSTRAINT `tbl_stockm_ibfk_2` FOREIGN KEY (`IDUSER`) REFERENCES `tbl_users` (`ID`);

--
-- Contraintes pour la table `tbl_stockq`
--
ALTER TABLE `tbl_stockq`
  ADD CONSTRAINT `tbl_stockq_ibfk_1` FOREIGN KEY (`IDCAT`) REFERENCES `tbl_categories` (`ID`),
  ADD CONSTRAINT `tbl_stockq_ibfk_2` FOREIGN KEY (`IDUSER`) REFERENCES `tbl_users` (`ID`);

--
-- Contraintes pour la table `tbl_vente`
--
ALTER TABLE `tbl_vente`
  ADD CONSTRAINT `fk_VenteArticle` FOREIGN KEY (`IDU`) REFERENCES `tbl_users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
