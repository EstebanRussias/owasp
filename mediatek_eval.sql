-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 09 avr. 2025 à 18:25
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mediatek`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isbn` bigint NOT NULL,
  `title` varchar(150) NOT NULL,
  `summary` text,
  `publication_year` int NOT NULL,
  `issue_date` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `isbn`, `title`, `summary`, `publication_year`, `issue_date`, `updated_at`) VALUES
(12, 9781234567890, 'Les mystères du temps', 'Un voyage à travers les âges.', 2022, '2022-06-20 14:22:00', '2023-01-15 10:10:10'),
(13, 9782345678901, 'Les secrets de l\'océan', 'Exploration des profondeurs marines.', 2021, '2021-08-10 09:45:45', '2021-12-30 17:50:00'),
(14, 9783456789012, 'Voyage au centre de la Terre', 'Une aventure sous terre.', 2023, '2023-02-15 16:30:10', '2023-02-20 12:00:32'),
(15, 9784567890123, 'L\'art de la guerre', 'Stratégies et tactiques militaires.', 2020, '2020-07-10 11:00:00', '2021-03-22 09:15:15'),
(16, 9785678901234, 'Le guide des étoiles', 'Un manuel d\'astronomie.', 2019, '2019-05-05 08:22:40', '2021-05-12 13:44:00'),
(17, 9786789012345, 'La quête de l\'âme', 'Recherche de la vérité intérieure.', 2024, '2024-01-30 07:50:00', '2024-11-03 14:55:23'),
(18, 9787890123456, 'Le royaume des ombres', 'Un conte de fantasy mystérieux.', 2021, '2021-11-01 10:10:10', '2022-01-09 12:34:56'),
(20, 9789012345678, 'L\'héritage du feu', 'Lutte contre un pouvoir ancien.', 2022, '2022-10-18 09:15:30', '2022-12-22 11:45:32'),
(21, 9780123456789, 'Le mystère des pyramides', 'Théories et énigmes sur l\'Égypte ancienne.', 2023, '2023-04-20 14:00:00', '2023-06-10 08:10:15'),
(22, 9781234908765, 'L\'écho des étoiles', 'Des histoires venues de l\'espace.', 2022, '2022-02-12 13:30:30', '2023-04-05 17:00:32'),
(23, 9782345019876, 'La guerre des mondes', 'Conflits interplanétaires.', 2021, '2021-01-05 11:05:00', '2021-11-18 16:40:25'),
(24, 9783456120987, 'Le dernier espoir', 'Un monde en péril et un héros solitaire.', 2024, '2024-09-01 15:10:30', '2024-09-25 12:25:20'),
(25, 9784567231098, 'Au-delà des frontières', 'Voyage dans un monde parallèle.', 2023, '2023-07-22 08:50:45', '2023-08-15 14:40:12'),
(29, 9788901675432, 'Les royaumes perdus', 'Un récit sur des civilisations disparues.', 2022, '2022-09-12 19:50:10', '2022-11-04 15:00:00'),
(30, 1234567891234, 'Test', 'Test', 2005, '2025-04-09 00:00:00', '2025-04-09 18:06:13');

-- --------------------------------------------------------

--
-- Structure de la table `illustration`
--

DROP TABLE IF EXISTS `illustration`;
CREATE TABLE IF NOT EXISTS `illustration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `isCover` tinyint(1) NOT NULL,
  `id_book` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pk` (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `illustration`
--

INSERT INTO `illustration` (`id`, `description`, `filename`, `isCover`, `id_book`) VALUES
(7, 'fds', '05.jpg', 1, 25);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `rank` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`, `rank`) VALUES
(0, 'ROLE_SUPER_ADMIN', 1),
(0, 'ROLE_ADMIN', 2),
(0, 'ROLE_SUBSCRIBER', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_role` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `last_name`, `first_name`, `birth_date`, `email`, `password`, `created_at`, `updated_at`, `id_role`) VALUES
(19, 'Tutu', 'Champion', '2002-07-13', 'esteban.russias@efrei.net', '$2y$10$FAkqRlIQ9lKIV.bgU7F9m.Oe9OJbGSh5GWui0KZ5.3O0CLIewN5tm', '2025-04-08 21:53:27', '2025-04-08 21:53:27', 1),
(22, 'Russias', 'Esteban', '2005-11-22', 'test@test.fr', '$2y$10$O7dKu690BMO3NQvQjnYKAOKp5Uy7LU6Zv6cQwq2yJTL23a9BngB8K', '2025-04-09 18:19:44', '2025-04-09 18:19:44', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `illustration`
--
ALTER TABLE `illustration`
  ADD CONSTRAINT `pk` FOREIGN KEY (`id_book`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
