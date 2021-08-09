-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 01 août 2021 à 00:45
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `itakademy1`
--

-- --------------------------------------------------------

--
-- Structure de la table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `pets_category_id` int(11) DEFAULT NULL,
  `name` varchar(120) NOT NULL,
  `age` smallint(2) NOT NULL,
  `age_unit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pets`
--

INSERT INTO `pets` (`id`, `users_id`, `pets_category_id`, `name`, `age`, `age_unit`) VALUES
(1, 2, 36, 'Wuhan', 2, 'annee'),
(2, 2, 2, 'Grizou', 4, 'mois'),
(3, 1, 1, 'Chouquette', 5, 'annee');

-- --------------------------------------------------------

--
-- Structure de la table `pets_category`
--

CREATE TABLE `pets_category` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pets_category`
--

INSERT INTO `pets_category` (`id`, `name`) VALUES
(1, 'Chien'),
(2, 'Chat'),
(3, 'Lapin'),
(4, 'Rat'),
(5, 'Oiseau'),
(6, 'Souris'),
(7, 'Cochon'),
(8, 'Hamster'),
(9, 'Serpent'),
(10, 'Tortue'),
(12, 'Poisson'),
(13, 'Vache'),
(14, 'Chèvre'),
(15, 'Mouton'),
(16, 'Lama'),
(17, 'Furet'),
(18, 'Wapiti'),
(19, 'Wallaby'),
(20, 'Vautour'),
(21, 'Vison'),
(22, 'Varan'),
(23, 'Toucan'),
(24, 'Tigre'),
(25, 'Suricate'),
(26, 'Singe'),
(27, 'Serval'),
(28, 'Sanglier'),
(29, 'Requin'),
(30, 'Ragondin'),
(31, 'Putois'),
(32, 'Puma'),
(33, 'Pingouin'),
(34, 'Phoque'),
(35, 'Phacochère'),
(36, 'Pangolin'),
(37, 'Panda'),
(38, 'Ours'),
(40, 'Poule'),
(41, 'Lynx'),
(42, 'Loup'),
(43, 'Lion'),
(44, 'Lièvre'),
(45, 'Léopard'),
(46, 'Koala'),
(47, 'Jaguar'),
(48, 'Guépard'),
(49, 'Gorille'),
(50, 'Gazelle'),
(51, 'Fouine'),
(52, 'Fennec');

-- --------------------------------------------------------

--
-- Structure de la table `pets_pictures`
--

CREATE TABLE `pets_pictures` (
  `id` int(11) NOT NULL,
  `pets_id` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pets_pictures`
--

INSERT INTO `pets_pictures` (`id`, `pets_id`, `file`) VALUES
(1, 1, '2_1_20210731222814_6105b2.jpg'),
(3, 1, '2_2_20210731222945_6105b2.jpg'),
(8, 2, '2_2_20210801001148_6105ca.jpg'),
(10, 3, '1_3_20210801004153_6105d1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `login` varchar(120) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `login`, `email`, `password`) VALUES
(1, 'PONCET', 'maria', 'maria98540', 'm.poncet@it-students.fr', '94eca0f7e6a3a393fbc4cfabd1b7b5d6'),
(2, 'PONCET', 'Gerald', 'mrtechno01', 'mrtechno01@hotmail.com', '94eca0f7e6a3a393fbc4cfabd1b7b5d6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `pets_category_id` (`pets_category_id`);

--
-- Index pour la table `pets_category`
--
ALTER TABLE `pets_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `pets_pictures`
--
ALTER TABLE `pets_pictures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `pets_id` (`pets_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `pets_category`
--
ALTER TABLE `pets_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `pets_pictures`
--
ALTER TABLE `pets_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pets_ibfk_2` FOREIGN KEY (`pets_category_id`) REFERENCES `pets_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pets_pictures`
--
ALTER TABLE `pets_pictures`
  ADD CONSTRAINT `pets_pictures_ibfk_1` FOREIGN KEY (`pets_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
