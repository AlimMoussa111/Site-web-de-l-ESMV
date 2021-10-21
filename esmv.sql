-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 14 juin 2021 à 20:17
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `esmv`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `creer_par` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `description`, `date`, `creer_par`) VALUES
(1, 'Developpement des tic', 'distribution des ordinateurs pbhev pour promouvoir le developpement des tic. le ministre des enseignements superieurs se rend dans la', '2021-05-25', NULL),
(2, 'cdtic et site web', 'Les membres du projet de conception et de realisation des sites web des etablissements se reunissent...', '2021-05-25', NULL),
(3, 'concours esmv 2021/2022', 'Concours d\'entrée en première année du cycle des docteurs vétérinaires de l\'Ecole des Sciences et de Medecine Vétérinaire...', '2021-05-25', NULL),
(4, 'enseignement', 'le recteur de l\'universite de ngaoundere a lance un projet de construction des salles de classe pour accuaillir les etudiants de la', '2021-05-25', NULL),
(5, 'soutenance', 'les soutenances des etudiants doctorants prevues pour le mois de novembre 2021, les enseignamts', '2021-05-25', NULL),
(6, 'covid 19 et fete nationale', 'le 20 mai, le defile annule par le president de la republique, le recteur de l\'universite de ngaoundere invite les etudiants a ', '2021-05-25', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

CREATE TABLE `concours` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `arrete` varchar(100) DEFAULT NULL,
  `fiche_inscription` varchar(100) DEFAULT NULL,
  `resultat` varchar(100) DEFAULT NULL,
  `creer_par` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `concours`
--

INSERT INTO `concours` (`id`, `titre`, `description`, `date`, `arrete`, `fiche_inscription`, `resultat`, `creer_par`) VALUES
(15, 'A', 'ab', '0001-01-01', NULL, NULL, NULL, NULL),
(16, 'B', 'bb', '0888-08-08', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cooperation`
--

CREATE TABLE `cooperation` (
  `id` int(11) NOT NULL,
  `organe` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `creer_par` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cooperation`
--

INSERT INTO `cooperation` (`id`, `organe`, `description`, `date`, `creer_par`) VALUES
(1, 'LANAVET', 'Un partenariat avec le laboratoire national vétérinaire pour assurer les soins de qualité aux animaux.', '1996-06-17', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `fiche_prospection` varchar(100) NOT NULL,
  `creer_par` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `titre`, `date`, `description`, `fiche_prospection`, `creer_par`) VALUES
(1, 'Docteur veterinaire', '1995-03-01', 'Docteur en médecine vétérinaire.', '', NULL),
(2, 'Ingénieur des travaux vétérinaire', '1999-05-01', 'Formation d\'ingénieurs en outil de médecine vétérinaire', '', NULL),
(6, 'pp', '2021-06-10', 'pp', '', NULL),
(7, 'p', '2021-06-05', 'p', '', NULL),
(8, 'q', '2021-06-10', 'q', '', NULL),
(9, 'Q', '2021-06-04', 'q', '1623694503326.pdf', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `creer_par` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `titre`, `description`, `date`, `creer_par`) VALUES
(1, 'Pont dans le campus', 'Nous construirons plusieurs ponts dans le campus près du lac.', '2021-06-11', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `statut` enum('0','1','','') NOT NULL DEFAULT '1',
  `creer_par` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `email`, `password`, `statut`, `creer_par`) VALUES
(1, 'Charres bullard', 'charles@yahoo.fr', '011c945f30ce2cbafc452f39840f025693339c42', '1', NULL),
(5, 'Roger holstein', 'roger@yahoo.fr', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', '1', 1),
(7, 'Adama', 'adama@yahoo.fr', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', '1', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `concours`
--
ALTER TABLE `concours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cooperation`
--
ALTER TABLE `cooperation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `concours`
--
ALTER TABLE `concours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `cooperation`
--
ALTER TABLE `cooperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
