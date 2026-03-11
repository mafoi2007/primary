-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 11 mars 2026 à 18:11
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `primary`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee_scolaire`
--

CREATE TABLE `annee_scolaire` (
  `id` int(11) NOT NULL,
  `libelle_pays_fr` varchar(255) NOT NULL,
  `libelle_pays_en` varchar(255) NOT NULL,
  `libelle_devise_fr` varchar(255) NOT NULL,
  `libelle_devise_en` varchar(255) NOT NULL,
  `libelle_ministere_fr` varchar(255) NOT NULL,
  `libelle_ministere_en` varchar(255) NOT NULL,
  `region` int(11) NOT NULL,
  `departement` int(11) NOT NULL,
  `arrondissement` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `nom_etablissement_fr` varchar(255) NOT NULL,
  `nom_etablissement_en` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `boite_postale` int(10) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `nom_chef` varchar(255) NOT NULL,
  `libelle_annee` varchar(15) NOT NULL,
  `type_etablissement` varchar(100) NOT NULL,
  `statut` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `appreciation`
--

CREATE TABLE `appreciation` (
  `id` int(11) NOT NULL,
  `libelle_appreciation_fr` varchar(100) NOT NULL,
  `libelle_appreciation_en` varchar(100) NOT NULL,
  `cote` varchar(5) NOT NULL,
  `interv_ouvert` int(2) DEFAULT NULL,
  `interv_fermet` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bull_annuel`
--

CREATE TABLE `bull_annuel` (
  `id` int(11) NOT NULL,
  `classe` int(11) DEFAULT NULL,
  `pret` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bull_mensuel`
--

CREATE TABLE `bull_mensuel` (
  `id` int(11) NOT NULL,
  `classe` int(11) DEFAULT NULL,
  `pret` varchar(5) DEFAULT NULL,
  `mois` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bull_trimestriel`
--

CREATE TABLE `bull_trimestriel` (
  `id` int(11) NOT NULL,
  `classe` int(11) NOT NULL,
  `trimestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `section` varchar(5) NOT NULL,
  `libelle_classe` varchar(100) NOT NULL,
  `code_classe` varchar(10) NOT NULL,
  `niveau_classe` int(2) NOT NULL,
  `etat_classe` varchar(10) NOT NULL,
  `enseignant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `nom_court_fr` varchar(255) NOT NULL,
  `nom_court_en` varchar(255) NOT NULL,
  `libelle_departement_fr` varchar(255) NOT NULL,
  `libelle_departement_en` varchar(255) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id` int(11) NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `statut` varchar(1) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` varchar(255) DEFAULT NULL,
  `classe` int(11) NOT NULL,
  `nom_pere` varchar(255) DEFAULT NULL,
  `nom_mere` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `contact_parent` varchar(255) NOT NULL,
  `matricule` varchar(25) NOT NULL,
  `etat` varchar(15) NOT NULL,
  `annee_scolaire` int(11) NOT NULL,
  `num_rand` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `type_utilisateur` int(11) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `journal_connexion`
--

CREATE TABLE `journal_connexion` (
  `id` int(11) NOT NULL,
  `utilisateur` int(11) DEFAULT NULL,
  `adresse_ip` varchar(100) NOT NULL,
  `periode` datetime DEFAULT NULL,
  `type_machine` varchar(100) NOT NULL,
  `nom_machine` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `liste_competence`
--

CREATE TABLE `liste_competence` (
  `id` int(11) NOT NULL,
  `code_competence` varchar(10) NOT NULL,
  `libelle_competence_fr` varchar(255) NOT NULL,
  `libelle_competence_en` varchar(255) NOT NULL,
  `statut_competence` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `liste_sous_competence`
--

CREATE TABLE `liste_sous_competence` (
  `id` int(11) NOT NULL,
  `code_sous_competence` varchar(100) NOT NULL,
  `libelle_sous_competence_fr` varchar(255) NOT NULL,
  `libelle_sous_competence_en` varchar(255) NOT NULL,
  `statut_sous_competence` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `id_classe` int(11) DEFAULT NULL,
  `id_competence` int(11) DEFAULT NULL,
  `id_sous_competence` int(11) DEFAULT NULL,
  `nb_point` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matiere_niveau`
--

CREATE TABLE `matiere_niveau` (
  `id` int(11) NOT NULL,
  `id_niveau` int(11) DEFAULT NULL,
  `id_competence` int(11) DEFAULT NULL,
  `id_sous_competence` int(11) DEFAULT NULL,
  `nb_point` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_1`
--

CREATE TABLE `mensuel_1_1` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_2`
--

CREATE TABLE `mensuel_1_2` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_3`
--

CREATE TABLE `mensuel_1_3` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_4`
--

CREATE TABLE `mensuel_1_4` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_5`
--

CREATE TABLE `mensuel_1_5` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_6`
--

CREATE TABLE `mensuel_1_6` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_7`
--

CREATE TABLE `mensuel_1_7` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_8`
--

CREATE TABLE `mensuel_1_8` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_9`
--

CREATE TABLE `mensuel_1_9` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_10`
--

CREATE TABLE `mensuel_1_10` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_11`
--

CREATE TABLE `mensuel_1_11` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_12`
--

CREATE TABLE `mensuel_1_12` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_13`
--

CREATE TABLE `mensuel_1_13` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_14`
--

CREATE TABLE `mensuel_1_14` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_1_15`
--

CREATE TABLE `mensuel_1_15` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_1`
--

CREATE TABLE `mensuel_2_1` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_2`
--

CREATE TABLE `mensuel_2_2` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_3`
--

CREATE TABLE `mensuel_2_3` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_4`
--

CREATE TABLE `mensuel_2_4` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_5`
--

CREATE TABLE `mensuel_2_5` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_6`
--

CREATE TABLE `mensuel_2_6` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_7`
--

CREATE TABLE `mensuel_2_7` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_8`
--

CREATE TABLE `mensuel_2_8` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_9`
--

CREATE TABLE `mensuel_2_9` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_10`
--

CREATE TABLE `mensuel_2_10` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_11`
--

CREATE TABLE `mensuel_2_11` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_12`
--

CREATE TABLE `mensuel_2_12` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_13`
--

CREATE TABLE `mensuel_2_13` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_14`
--

CREATE TABLE `mensuel_2_14` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_2_15`
--

CREATE TABLE `mensuel_2_15` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_1`
--

CREATE TABLE `mensuel_3_1` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_2`
--

CREATE TABLE `mensuel_3_2` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_3`
--

CREATE TABLE `mensuel_3_3` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_4`
--

CREATE TABLE `mensuel_3_4` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_5`
--

CREATE TABLE `mensuel_3_5` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_6`
--

CREATE TABLE `mensuel_3_6` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_7`
--

CREATE TABLE `mensuel_3_7` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_8`
--

CREATE TABLE `mensuel_3_8` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_9`
--

CREATE TABLE `mensuel_3_9` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_10`
--

CREATE TABLE `mensuel_3_10` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_11`
--

CREATE TABLE `mensuel_3_11` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_12`
--

CREATE TABLE `mensuel_3_12` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_13`
--

CREATE TABLE `mensuel_3_13` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_14`
--

CREATE TABLE `mensuel_3_14` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mensuel_3_15`
--

CREATE TABLE `mensuel_3_15` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `code_niveau` varchar(5) NOT NULL,
  `libelle_niveau_fr` varchar(255) NOT NULL,
  `libelle_niveau_en` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `classe` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `competence` int(11) NOT NULL,
  `oral` decimal(4,2) DEFAULT NULL,
  `ecrit` decimal(4,2) DEFAULT NULL,
  `prat` decimal(4,2) DEFAULT NULL,
  `se` decimal(4,2) DEFAULT NULL,
  `total` decimal(4,2) DEFAULT NULL,
  `cote` varchar(100) DEFAULT NULL,
  `appr` varchar(100) DEFAULT NULL,
  `observation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `eleve` int(11) DEFAULT NULL,
  `classe` int(11) DEFAULT NULL,
  `competence` int(11) DEFAULT NULL,
  `sous_competence` int(11) DEFAULT NULL,
  `matiere` int(11) DEFAULT NULL,
  `sous_matiere` int(11) DEFAULT NULL,
  `periode` int(11) DEFAULT NULL,
  `note` decimal(4,2) DEFAULT NULL,
  `observation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `note_saisie`
--

CREATE TABLE `note_saisie` (
  `classe` int(11) DEFAULT NULL,
  `matiere` int(11) DEFAULT NULL,
  `periode` int(11) DEFAULT NULL,
  `date_saisie` datetime DEFAULT NULL,
  `date_modification` datetime DEFAULT NULL,
  `ip_saisie` varchar(100) DEFAULT NULL,
  `type_machine` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `libelle_periode` varchar(255) NOT NULL,
  `code_periode_fr` varchar(15) DEFAULT NULL,
  `code_periode_en` varchar(15) DEFAULT NULL,
  `date_ouvert` date DEFAULT NULL,
  `date_fermet` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `nom_court_fr` varchar(255) NOT NULL,
  `nom_court_en` varchar(255) NOT NULL,
  `libelle_region_fr` varchar(255) NOT NULL,
  `libelle_region_en` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `code_section` varchar(5) NOT NULL,
  `libelle_section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_1`
--

CREATE TABLE `trimestre_1_1` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_2`
--

CREATE TABLE `trimestre_1_2` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_3`
--

CREATE TABLE `trimestre_1_3` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_4`
--

CREATE TABLE `trimestre_1_4` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_5`
--

CREATE TABLE `trimestre_1_5` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_6`
--

CREATE TABLE `trimestre_1_6` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_7`
--

CREATE TABLE `trimestre_1_7` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_8`
--

CREATE TABLE `trimestre_1_8` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_9`
--

CREATE TABLE `trimestre_1_9` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_10`
--

CREATE TABLE `trimestre_1_10` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_11`
--

CREATE TABLE `trimestre_1_11` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_12`
--

CREATE TABLE `trimestre_1_12` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_13`
--

CREATE TABLE `trimestre_1_13` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_14`
--

CREATE TABLE `trimestre_1_14` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trimestre_1_15`
--

CREATE TABLE `trimestre_1_15` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `art_1` float(4,2) DEFAULT NULL,
  `art_2` float(4,2) DEFAULT NULL,
  `art_3` float(4,2) DEFAULT NULL,
  `art` float(4,2) DEFAULT NULL,
  `art_cote` varchar(5) DEFAULT NULL,
  `art_appr` varchar(10) DEFAULT NULL,
  `citoyen_1` float(4,2) DEFAULT NULL,
  `citoyen_2` float(4,2) DEFAULT NULL,
  `citoyen_3` float(4,2) DEFAULT NULL,
  `citoyen` float(4,2) DEFAULT NULL,
  `citoyen_cote` varchar(5) DEFAULT NULL,
  `citoyen_appr` varchar(10) DEFAULT NULL,
  `english_1` float(4,2) DEFAULT NULL,
  `english_2` float(4,2) DEFAULT NULL,
  `english_3` float(4,2) DEFAULT NULL,
  `english` float(4,2) DEFAULT NULL,
  `english_cote` varchar(5) DEFAULT NULL,
  `english_appr` varchar(10) DEFAULT NULL,
  `esprit_1` float(4,2) DEFAULT NULL,
  `esprit_2` float(4,2) DEFAULT NULL,
  `esprit_3` float(4,2) DEFAULT NULL,
  `esprit` float(4,2) DEFAULT NULL,
  `esprit_cote` varchar(5) DEFAULT NULL,
  `esprit_appr` varchar(10) DEFAULT NULL,
  `francais_1` float(4,2) DEFAULT NULL,
  `francais_2` float(4,2) DEFAULT NULL,
  `francais_3` float(4,2) DEFAULT NULL,
  `francais` float(4,2) DEFAULT NULL,
  `francais_cote` varchar(5) DEFAULT NULL,
  `francais_appr` varchar(10) DEFAULT NULL,
  `info_1` float(4,2) DEFAULT NULL,
  `info_2` float(4,2) DEFAULT NULL,
  `info_3` float(4,2) DEFAULT NULL,
  `info` float(4,2) DEFAULT NULL,
  `info_cote` varchar(5) DEFAULT NULL,
  `info_appr` varchar(10) DEFAULT NULL,
  `langue_1` float(4,2) DEFAULT NULL,
  `langue_2` float(4,2) DEFAULT NULL,
  `langue_3` float(4,2) DEFAULT NULL,
  `langue` float(4,2) DEFAULT NULL,
  `langue_cote` varchar(5) DEFAULT NULL,
  `langue_appr` varchar(10) DEFAULT NULL,
  `maths_1` float(4,2) DEFAULT NULL,
  `maths_2` float(4,2) DEFAULT NULL,
  `maths_3` float(4,2) DEFAULT NULL,
  `maths` float(4,2) DEFAULT NULL,
  `maths_cote` varchar(5) DEFAULT NULL,
  `maths_appr` varchar(10) DEFAULT NULL,
  `science_1` float(4,2) DEFAULT NULL,
  `science_2` float(4,2) DEFAULT NULL,
  `science_3` float(4,2) DEFAULT NULL,
  `science` float(4,2) DEFAULT NULL,
  `science_cote` varchar(5) DEFAULT NULL,
  `science_appr` varchar(10) DEFAULT NULL,
  `social_1` float(4,2) DEFAULT NULL,
  `social_2` float(4,2) DEFAULT NULL,
  `social_3` float(4,2) DEFAULT NULL,
  `social` float(4,2) DEFAULT NULL,
  `social_cote` varchar(5) DEFAULT NULL,
  `social_appr` varchar(10) DEFAULT NULL,
  `sportapte_1` float(4,2) DEFAULT NULL,
  `sportapte_2` float(4,2) DEFAULT NULL,
  `sportapte_3` float(4,2) DEFAULT NULL,
  `sportapte` float(4,2) DEFAULT NULL,
  `sportapte_cote` varchar(5) DEFAULT NULL,
  `sportapte_appr` varchar(10) DEFAULT NULL,
  `moyenne_1` float(4,2) DEFAULT NULL,
  `moyenne_2` float(4,2) DEFAULT NULL,
  `moyenne_3` float(4,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `cote` varchar(5) DEFAULT NULL,
  `appr` varchar(10) DEFAULT NULL,
  `moyenne` decimal(4,2) DEFAULT NULL,
  `evalues` int(11) DEFAULT NULL,
  `moy_gen` decimal(4,2) DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `ponderation_classe` decimal(5,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE `type_utilisateur` (
  `id` int(11) NOT NULL,
  `code_poste` varchar(100) NOT NULL,
  `libelle_poste` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee_scolaire`
--
ALTER TABLE `annee_scolaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `appreciation`
--
ALTER TABLE `appreciation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bull_annuel`
--
ALTER TABLE `bull_annuel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bull_mensuel`
--
ALTER TABLE `bull_mensuel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bull_trimestriel`
--
ALTER TABLE `bull_trimestriel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_region` (`id_region`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `journal_connexion`
--
ALTER TABLE `journal_connexion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `liste_competence`
--
ALTER TABLE `liste_competence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `liste_sous_competence`
--
ALTER TABLE `liste_sous_competence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiere_niveau`
--
ALTER TABLE `matiere_niveau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_1`
--
ALTER TABLE `mensuel_1_1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_2`
--
ALTER TABLE `mensuel_1_2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_3`
--
ALTER TABLE `mensuel_1_3`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_4`
--
ALTER TABLE `mensuel_1_4`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_5`
--
ALTER TABLE `mensuel_1_5`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_6`
--
ALTER TABLE `mensuel_1_6`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_7`
--
ALTER TABLE `mensuel_1_7`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_8`
--
ALTER TABLE `mensuel_1_8`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_9`
--
ALTER TABLE `mensuel_1_9`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_10`
--
ALTER TABLE `mensuel_1_10`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_11`
--
ALTER TABLE `mensuel_1_11`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_12`
--
ALTER TABLE `mensuel_1_12`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_13`
--
ALTER TABLE `mensuel_1_13`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_14`
--
ALTER TABLE `mensuel_1_14`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_1_15`
--
ALTER TABLE `mensuel_1_15`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_1`
--
ALTER TABLE `mensuel_2_1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_2`
--
ALTER TABLE `mensuel_2_2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_3`
--
ALTER TABLE `mensuel_2_3`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_4`
--
ALTER TABLE `mensuel_2_4`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_5`
--
ALTER TABLE `mensuel_2_5`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_6`
--
ALTER TABLE `mensuel_2_6`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_7`
--
ALTER TABLE `mensuel_2_7`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_8`
--
ALTER TABLE `mensuel_2_8`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_9`
--
ALTER TABLE `mensuel_2_9`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_10`
--
ALTER TABLE `mensuel_2_10`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_11`
--
ALTER TABLE `mensuel_2_11`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_12`
--
ALTER TABLE `mensuel_2_12`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_13`
--
ALTER TABLE `mensuel_2_13`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_14`
--
ALTER TABLE `mensuel_2_14`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_2_15`
--
ALTER TABLE `mensuel_2_15`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_1`
--
ALTER TABLE `mensuel_3_1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_2`
--
ALTER TABLE `mensuel_3_2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_3`
--
ALTER TABLE `mensuel_3_3`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_4`
--
ALTER TABLE `mensuel_3_4`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_5`
--
ALTER TABLE `mensuel_3_5`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_6`
--
ALTER TABLE `mensuel_3_6`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_7`
--
ALTER TABLE `mensuel_3_7`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_8`
--
ALTER TABLE `mensuel_3_8`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_9`
--
ALTER TABLE `mensuel_3_9`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_10`
--
ALTER TABLE `mensuel_3_10`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_11`
--
ALTER TABLE `mensuel_3_11`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_12`
--
ALTER TABLE `mensuel_3_12`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_13`
--
ALTER TABLE `mensuel_3_13`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_14`
--
ALTER TABLE `mensuel_3_14`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mensuel_3_15`
--
ALTER TABLE `mensuel_3_15`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_1`
--
ALTER TABLE `trimestre_1_1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_2`
--
ALTER TABLE `trimestre_1_2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_3`
--
ALTER TABLE `trimestre_1_3`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_4`
--
ALTER TABLE `trimestre_1_4`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_5`
--
ALTER TABLE `trimestre_1_5`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_6`
--
ALTER TABLE `trimestre_1_6`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_7`
--
ALTER TABLE `trimestre_1_7`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_8`
--
ALTER TABLE `trimestre_1_8`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_9`
--
ALTER TABLE `trimestre_1_9`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_10`
--
ALTER TABLE `trimestre_1_10`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_11`
--
ALTER TABLE `trimestre_1_11`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_12`
--
ALTER TABLE `trimestre_1_12`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_13`
--
ALTER TABLE `trimestre_1_13`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_14`
--
ALTER TABLE `trimestre_1_14`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trimestre_1_15`
--
ALTER TABLE `trimestre_1_15`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee_scolaire`
--
ALTER TABLE `annee_scolaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `appreciation`
--
ALTER TABLE `appreciation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bull_annuel`
--
ALTER TABLE `bull_annuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bull_mensuel`
--
ALTER TABLE `bull_mensuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bull_trimestriel`
--
ALTER TABLE `bull_trimestriel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `journal_connexion`
--
ALTER TABLE `journal_connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `liste_competence`
--
ALTER TABLE `liste_competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `liste_sous_competence`
--
ALTER TABLE `liste_sous_competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matiere_niveau`
--
ALTER TABLE `matiere_niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_1`
--
ALTER TABLE `mensuel_1_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_2`
--
ALTER TABLE `mensuel_1_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_3`
--
ALTER TABLE `mensuel_1_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_4`
--
ALTER TABLE `mensuel_1_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_5`
--
ALTER TABLE `mensuel_1_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_6`
--
ALTER TABLE `mensuel_1_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_7`
--
ALTER TABLE `mensuel_1_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_8`
--
ALTER TABLE `mensuel_1_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_9`
--
ALTER TABLE `mensuel_1_9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_10`
--
ALTER TABLE `mensuel_1_10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_11`
--
ALTER TABLE `mensuel_1_11`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_12`
--
ALTER TABLE `mensuel_1_12`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_13`
--
ALTER TABLE `mensuel_1_13`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_14`
--
ALTER TABLE `mensuel_1_14`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_1_15`
--
ALTER TABLE `mensuel_1_15`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_1`
--
ALTER TABLE `mensuel_2_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_2`
--
ALTER TABLE `mensuel_2_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_3`
--
ALTER TABLE `mensuel_2_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_4`
--
ALTER TABLE `mensuel_2_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_5`
--
ALTER TABLE `mensuel_2_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_6`
--
ALTER TABLE `mensuel_2_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_7`
--
ALTER TABLE `mensuel_2_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_8`
--
ALTER TABLE `mensuel_2_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_9`
--
ALTER TABLE `mensuel_2_9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_10`
--
ALTER TABLE `mensuel_2_10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_11`
--
ALTER TABLE `mensuel_2_11`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_12`
--
ALTER TABLE `mensuel_2_12`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_13`
--
ALTER TABLE `mensuel_2_13`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_14`
--
ALTER TABLE `mensuel_2_14`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_2_15`
--
ALTER TABLE `mensuel_2_15`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_1`
--
ALTER TABLE `mensuel_3_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_2`
--
ALTER TABLE `mensuel_3_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_3`
--
ALTER TABLE `mensuel_3_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_4`
--
ALTER TABLE `mensuel_3_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_5`
--
ALTER TABLE `mensuel_3_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_6`
--
ALTER TABLE `mensuel_3_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_7`
--
ALTER TABLE `mensuel_3_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_8`
--
ALTER TABLE `mensuel_3_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_9`
--
ALTER TABLE `mensuel_3_9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_10`
--
ALTER TABLE `mensuel_3_10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_11`
--
ALTER TABLE `mensuel_3_11`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_12`
--
ALTER TABLE `mensuel_3_12`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_13`
--
ALTER TABLE `mensuel_3_13`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_14`
--
ALTER TABLE `mensuel_3_14`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mensuel_3_15`
--
ALTER TABLE `mensuel_3_15`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_1`
--
ALTER TABLE `trimestre_1_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_2`
--
ALTER TABLE `trimestre_1_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_3`
--
ALTER TABLE `trimestre_1_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_4`
--
ALTER TABLE `trimestre_1_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_5`
--
ALTER TABLE `trimestre_1_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_6`
--
ALTER TABLE `trimestre_1_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_7`
--
ALTER TABLE `trimestre_1_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_8`
--
ALTER TABLE `trimestre_1_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_9`
--
ALTER TABLE `trimestre_1_9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_10`
--
ALTER TABLE `trimestre_1_10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_11`
--
ALTER TABLE `trimestre_1_11`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_12`
--
ALTER TABLE `trimestre_1_12`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_13`
--
ALTER TABLE `trimestre_1_13`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_14`
--
ALTER TABLE `trimestre_1_14`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trimestre_1_15`
--
ALTER TABLE `trimestre_1_15`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
