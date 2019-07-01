-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 juil. 2019 à 02:35
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_comp`
--

DROP TABLE IF EXISTS `categorie_comp`;
CREATE TABLE IF NOT EXISTS `categorie_comp` (
  `id_catcomp` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_catcomp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie_comp`
--

INSERT INTO `categorie_comp` (`id_catcomp`, `libelle`) VALUES
(1, 'web'),
(2, 'logiciel'),
(3, 'infra');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `id_comp` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `id_catcomp` int(11) DEFAULT NULL,
  `alt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_comp`),
  KEY `id_catcomp` (`id_catcomp`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id_comp`, `libelle`, `logo`, `id_catcomp`, `alt`) VALUES
(1, 'HTML5', 'images/html5.png', 1, 'Logo HTML5'),
(2, 'CSS3', 'images/css3.png', 1, 'Logo CSS3'),
(3, 'JavaScript', 'images/javascript.png', 1, 'Logo Javascript'),
(4, 'C', 'images/c.png', 2, 'Logo Langage C'),
(5, 'Python', 'images/python.png', 2, 'Logo Python'),
(6, 'CCNA1', 'images/ccna1.png', 3, 'Logo CCNA1'),
(7, 'PHP', 'images/php.png', 1, 'Logo PHP');

-- --------------------------------------------------------

--
-- Structure de la table `experiences_pro`
--

DROP TABLE IF EXISTS `experiences_pro`;
CREATE TABLE IF NOT EXISTS `experiences_pro` (
  `id_exp` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `contenu` varchar(3000) DEFAULT NULL,
  `alt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_exp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `experiences_pro`
--

INSERT INTO `experiences_pro` (`id_exp`, `titre`, `image`, `contenu`, `alt`) VALUES
(1, 'Mon année de startup', 'images/image.jpg', 'Durant cette année, nous avons été mélangé à des étudiants venant d\'autres filières, et de différents niveau d\'étude afin de réaliser un projet commun. La <strong>startup</strong> dans laquelle j\'ai été embauchée est le Hacking Challenge. Notre projet était de pirater une onde radio. Malheureusement, le matériel dont nous disposions n\'a pas été adapté et chacun a pu se développer professionnellement dans le travail d\'équipe', NULL),
(2, 'Les workshops 2019', 'images/workshop.png', 'Durant cette année, nous avons pu expérimenter ce que sont les <strong>workshops</strong>. Il s\'agit d\'une <strong>compétition</strong> durant laquelle nous sommes en <strong>équipe aléatoire</strong> de 8 à 9 personnes de filières et niveaux différents, afin de répondre à différentes réelles <strong>problématiques d\'entreprises</strong>. Cette compétition dure 2 semaines, et nous devons remettre environ 3 dossiers et une présentation.', 'Logo des workshops 2019');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `message` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `nom`, `prenom`, `mail`, `phone`, `message`) VALUES
(6, 'yybhyhy', 'rtyu', 'julienkuentzmanon@gmail.com', '0626103528', 'jhgf'),
(7, 'JULIEN KUENTZ', 'Manon', 'manon.julienkuentz@ynov.com', '06 26 10 35 28', 'Ceci est un test concluant');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `contenu` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id_projet`, `titre`, `image`, `contenu`, `alt`) VALUES
(1, 'Site CV', 'images/site_cv.png', 'Ce projet est exactement ce que vous avez sous les yeux : mon <strong>site CV</strong>. Pour réaliser ce projet, j\'ai utilisé mes compétences en référencement, ergonomie, <strong>HTML5, CSS3, Javascript, et PHP</strong>.', 'Logo du projet Site CV'),
(2, 'Plante connectée', 'images/plante_connectée.png', 'Durant ce projet, nous avons été en équipe de 2 personnes afin de rendre automatique l\'entretien d\'une plante. Ce projet s\'est fait avec une carte <strong>arduino</strong> qui, reliée à différents capteurs, relève les données de la plante et contrôle les appareils connectés permettant l\'entretien de cette dernière. Le <strong>langage C</strong> a donc été utilisé afin de mettre en place ce projet.', 'Logo du projet Plante Connectée'),
(3, 'Infrastructure réseau', 'images/infrastructure_réseau.png', 'Durant ce projet, nous avons été placés en équipe de 2 personnes afin de simuler un <strong>réseau</strong> d\'entreprise. Nous avons réalisé cela sous <strong>VMWare</strong>.', 'Logo du projet Infrastucture');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_passwd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `user_name` (`user_name`,`user_passwd`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `user_name`, `user_passwd`) VALUES
(1, 'JKManon', 'MJK2000portF0li0');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`id_catcomp`) REFERENCES `categorie_comp` (`id_catcomp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
