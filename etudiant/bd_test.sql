-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 02 sep. 2021 à 16:42
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `genre` varchar(250) NOT NULL,
  `classe` varchar(200) NOT NULL,
  `matricule` varchar(15) NOT NULL,
  `date_poste` date NOT NULL,
  `motdepasse` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `genre`, `classe`, `matricule`, `date_poste`, `motdepasse`) VALUES
(14, 'kone', 'dani', 'femme', 'cp1', '010203P', '2021-09-01', ''),
(16, 'kone', 'kones', 'homme', 'cp1', '010280P', '2021-09-01', ''),
(17, 'coulibaly', 'tata', 'femme', 'cp1', '6958Q', '2021-09-01', ''),
(21, 'FRANCE', 'Leo', 'homme', 'cm1', '1127m', '2021-09-02', 'Azerty'),
(22, 'Nesmonde', '', 'femme', '6eme', '01235', '2021-09-02', '01235'),
(23, 'YAO', 'axelle', 'femme', 'cp1', '8974', '2021-09-02', '337cd73a31464dd4adfc3c5dbc356cd0'),
(24, 'essai', 'de france', 'autre', 'master 2', '20180649m', '2021-09-02', 'c036876ff8745da434b80be47e274f7b');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
