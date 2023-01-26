-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 26 jan. 2023 à 06:43
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tennis`
--
DROP DATABASE if exists `tennis`;
 
CREATE DATABASE `tennis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tennis`;
-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_j` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pj_mm`
--

CREATE TABLE `pj_mm` (
  `id` int(10) UNSIGNED NOT NULL,
  `joueur_id` int(10) UNSIGNED NOT NULL,
  `planning_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `code_date` int(10) UNSIGNED NOT NULL,
  `terrain_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `terrain`
--

CREATE TABLE `terrain` (
  `id` int(10) UNSIGNED NOT NULL,
  `libelle_t` varchar(64) NOT NULL,
  `code_t` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Crée utilisateur pour la BDD
--

DROP USER if exists 'clubt'@'%';

CREATE USER 'clubt'@'%' IDENTIFIED BY 'tball';

GRANT SELECT, INSERT, UPDATE, DELETE ON `tennis`.* TO 'clubt'@'%'; 

--
-- Déchargement des données de la table `terrain`
--

INSERT INTO `terrain` (`id`, `libelle_t`, `code_t`) VALUES
(1, 'TERRAIN A', 1),
(2, 'TERRAIN B', 2),
(3, 'TERRAIN C', 3),
(4, 'TERRAIN D', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_u` varchar(64) NOT NULL,
  `mdp` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom_u`, `mdp`) VALUES
(1, 'admin_tennis', '$2y$10$vLL.s/PQQDk33jA2FArX8OqGE0dtBAENmrqXa0KKXLwsXViBdR.5e');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `joueur_UNIQUE` (`nom_j`);

--
-- Index pour la table `pj_mm`
--
ALTER TABLE `pj_mm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pj_mm_joueur_id` (`joueur_id`),
  ADD KEY `fk_pj_mm_planning_id` (`planning_id`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_date_UNIQUE` (`code_date`),
  ADD KEY `fk_planning_terrain_id` (`terrain_id`);

--
-- Index pour la table `terrain`
--
ALTER TABLE `terrain`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `terrain_UNIQUE` (`code_t`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_UNIQUE` (`nom_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pj_mm`
--
ALTER TABLE `pj_mm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `terrain`
--
ALTER TABLE `terrain`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pj_mm`
--
ALTER TABLE `pj_mm`
  ADD CONSTRAINT `fk_pj_mm_joueur_id` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pj_mm_planning_id` FOREIGN KEY (`planning_id`) REFERENCES `planning` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `fk_planning_terrain_id` FOREIGN KEY (`terrain_id`) REFERENCES `terrain` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
