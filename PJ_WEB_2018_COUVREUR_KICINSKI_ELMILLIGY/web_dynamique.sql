-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 05 mai 2018 à 21:31
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `web dynamique`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_envoyeur` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_message`,`id_envoyeur`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id_message`, `id_envoyeur`, `message`) VALUES
(1, 12, 'Avez-vous des contacts pour trouver un stage ?'),
(3, 1, 'Regarde dans l\'onglet emploi, il peut y avoir des offres intéressantes'),
(4, 2, 'De nouvelles offres de stages viennent d\'être ajoutées'),
(5, 12, 'Merci pour les infos !');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_evenement`
--

DROP TABLE IF EXISTS `commentaire_evenement`;
CREATE TABLE IF NOT EXISTS `commentaire_evenement` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `id_evenement` int(11) NOT NULL,
  `id_auteur_commentaire` int(11) NOT NULL,
  `commentaire` varchar(500) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_commentaire`,`id_evenement`,`id_auteur_commentaire`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire_evenement`
--

INSERT INTO `commentaire_evenement` (`id_commentaire`, `id_evenement`, `id_auteur_commentaire`, `commentaire`, `Nom`, `Prenom`) VALUES
(13, 1, 2, 'Va falloir que je vienne !', 'Kicinski', 'Ghislain'),
(14, 1, 12, 'Très bon événement, je remercie l\'ECE d\'organiser ce genre d\'events.', 'Truand', 'Camille'),
(15, 3, 1, 'J\'espère trouver un stage', 'Couvreur', 'Adrien');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_photo`
--

DROP TABLE IF EXISTS `commentaire_photo`;
CREATE TABLE IF NOT EXISTS `commentaire_photo` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `id_photo` int(11) NOT NULL,
  `id_auteur_commentaire` int(11) NOT NULL,
  `commentaire` varchar(500) NOT NULL,
  `Nom` varchar(500) NOT NULL,
  `Prenom` varchar(500) NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire_photo`
--

INSERT INTO `commentaire_photo` (`id_commentaire`, `id_photo`, `id_auteur_commentaire`, `commentaire`, `Nom`, `Prenom`) VALUES
(1, 2, 2, 'Tres beau logo !', 'Kicinski', 'Ghislain'),
(8, 10, 1, 'C\'était cool !', 'Couvreur', 'Adrien');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_publication`
--

DROP TABLE IF EXISTS `commentaire_publication`;
CREATE TABLE IF NOT EXISTS `commentaire_publication` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_auteur_commentaire` int(11) NOT NULL,
  `commentaire` varchar(500) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire_publication`
--

INSERT INTO `commentaire_publication` (`id_commentaire`, `id_post`, `id_auteur_commentaire`, `commentaire`, `Nom`, `Prenom`) VALUES
(1, 10, 2, 'Je suis un professionnel sur le sujet', 'Kicinski', 'Ghislain'),
(2, 2, 1, 'ça va le faire', 'Couvreur', 'Adrien'),
(3, 2, 10, 'Courage !', 'Dupont', 'Jean');

-- --------------------------------------------------------

--
-- Structure de la table `emplois`
--

DROP TABLE IF EXISTS `emplois`;
CREATE TABLE IF NOT EXISTS `emplois` (
  `id_offre` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur` int(11) NOT NULL,
  `type_offre` varchar(255) NOT NULL,
  `nom_offre` varchar(255) NOT NULL,
  `descriptif_offre` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_offre`,`id_auteur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emplois`
--

INSERT INTO `emplois` (`id_offre`, `id_auteur`, `type_offre`, `nom_offre`, `descriptif_offre`) VALUES
(1, 1, 'Stage', 'Stage 1 mois ECE', 'Vous réaliserez la promotion de l\'école'),
(2, 2, 'CDD', 'Chercheur en laboratoire', 'Recherches scientifiques'),
(3, 1, 'CDI', 'SFR', 'Vente de smartphones et de contrats');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur_evenement` int(11) NOT NULL,
  `nom_evenement` varchar(255) NOT NULL,
  `date_evenement` date NOT NULL,
  `heure_evenement` time NOT NULL,
  `lieu_evenement` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_evenement`,`id_auteur_evenement`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `id_auteur_evenement`, `nom_evenement`, `date_evenement`, `heure_evenement`, `lieu_evenement`, `Nom`) VALUES
(1, 1, 'Journée des langues', '2018-05-15', '14:00:00', 'ECE Paris', 'Couvreur'),
(7, 10, 'Forum des stages', '2018-06-10', '13:30:00', 'Versailles', 'Dupont'),
(2, 2, 'Remise des diplomes', '2018-05-29', '17:00:00', 'Paris', 'Kicinski'),
(3, 12, 'Conférence sur la cybersécurité', '2018-07-01', '19:00:00', 'Campus Eiffel 1', 'Truand');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur_photo` int(11) NOT NULL,
  `lieu_photo` varchar(255) NOT NULL,
  `date_photo` date NOT NULL,
  `heure_photo` time NOT NULL,
  `ressenti_photo` varchar(1000) NOT NULL,
  `activite_photo` varchar(1000) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo_auteur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_photo`,`id_auteur_photo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `id_auteur_photo`, `lieu_photo`, `date_photo`, `heure_photo`, `ressenti_photo`, `activite_photo`, `photo`, `photo_auteur`) VALUES
(1, 12, 'ECE Paris', '2018-04-30', '13:00:00', 'Ma nouvelle école!', '', 'Icones/ece_paris.png', 'Truand'),
(2, 1, 'ECE', '2017-09-01', '12:00:00', '', 'Nouveau logo de l\'ECE', 'Icones/ece2.png', 'Couvreur'),
(11, 10, 'ECE Paris', '2018-02-20', '14:00:00', '', 'Cours avec Monsieur Le Cor dans 5 min !', 'Icones/amphi.jpg', 'Dupont'),
(10, 2, 'Kfet e2', '2018-05-10', '18:00:00', 'After work', '', 'Icones/cafet.jpg', 'Kicinski');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur_post` int(11) NOT NULL,
  `texte_post` varchar(1000) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_post`,`id_auteur_post`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `id_auteur_post`, `texte_post`, `Nom`) VALUES
(2, 2, 'Projet de web dynamique à rendre bientôt, ça va être tendu !', 'Kicinski'),
(3, 10, 'Cherche un ING3 pour avoir des conseils sur l\'analyse de Fourier', 'Dupont'),
(4, 12, 'Hâte d\'avoir cours à E4!', 'Truand');

-- --------------------------------------------------------

--
-- Structure de la table `réseau`
--

DROP TABLE IF EXISTS `réseau`;
CREATE TABLE IF NOT EXISTS `réseau` (
  `id_auteur_reseau` int(11) NOT NULL,
  `id_reseau` int(11) NOT NULL,
  PRIMARY KEY (`id_auteur_reseau`,`id_reseau`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `réseau`
--

INSERT INTO `réseau` (`id_auteur_reseau`, `id_reseau`) VALUES
(1, 2),
(1, 10),
(1, 12),
(2, 1),
(2, 10),
(10, 1),
(10, 2),
(12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur2`
--

DROP TABLE IF EXISTS `utilisateur2`;
CREATE TABLE IF NOT EXISTS `utilisateur2` (
  `id_auteur` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `image_fond` varchar(255) NOT NULL,
  `photo_auteur` varchar(255) NOT NULL,
  `type_utilisateur` varchar(255) NOT NULL,
  `Description` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id_auteur`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur2`
--

INSERT INTO `utilisateur2` (`id_auteur`, `login`, `prenom`, `nom`, `mdp`, `image_fond`, `photo_auteur`, `type_utilisateur`, `Description`) VALUES
(1, 'adrien.couvreur@edu.ece.fr', 'Adrien', 'Couvreur', 'Zlatanpower', 'image_fond.jpg', 'psg.jpg', 'Administrateur', 'Elève en 3ème année à l\'ECE Paris'),
(2, 'ghislain.kicinski@edu.ece.fr', 'Ghislain', 'Kicinski', 'faker', 'default_cover_pic.jpg', 'Ghislain.jpg', 'Administrateur', 'Admin du site'),
(10, 'jean.dupont@edu.ece.fr', 'Jean', 'Dupont', 'coucou', 'default_cover_pic.jpg', 'profile.png', 'Membre', 'Elève en 1ère année à l\'ECE Paris'),
(12, 'camille.truand@edu.ece.fr', 'Camille', 'Truand', 'lacalotte', 'default_cover_pic.jpg', 'profile.png', 'Membre', 'Recherche un stage de fin d\'étude'),
(15, 'akram.elmilligy@edu.ece.fr', 'Akram', 'Elmilligy', 'Akram', 'default_cover_pic.jpg', 'profile.png', 'Administrateur', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur_video` int(11) NOT NULL,
  `lieu_video` varchar(255) NOT NULL,
  `date_video` date NOT NULL,
  `heure_video` time NOT NULL,
  `ressenti_video` varchar(1000) NOT NULL,
  `activite_video` varchar(1000) NOT NULL,
  `video` varchar(255) NOT NULL,
  `video_auteur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_video`,`id_auteur_video`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id_video`, `id_auteur_video`, `lieu_video`, `date_video`, `heure_video`, `ressenti_video`, `activite_video`, `video`, `video_auteur`) VALUES
(2, 1, 'ECE ', '2017-11-27', '14:00:00', '', 'Les atouts du groupe INSEEC', 'https://www.youtube.com/embed/bCXhjNgHfXE', 'Couvreur'),
(1, 2, '', '2018-01-31', '14:00:00', 'Interessant', 'Présentation des majeures de l\'ECE', 'https://www.youtube.com/embed/z2P0AZ3a7O8', 'Kicinski');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
