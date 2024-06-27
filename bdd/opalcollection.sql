-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 27 juin 2024 à 19:53
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `opalcollection`
--

-- --------------------------------------------------------

--
-- Structure de la table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `changed` datetime DEFAULT NULL,
  `titleodile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageodile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentodile` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `titlevision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentvision` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `about`
--

INSERT INTO `about` (`id`, `created`, `changed`, `titleodile`, `imageodile`, `contentodile`, `titlevision`, `contentvision`, `language`) VALUES
(1, '2024-06-16 11:40:01', '2024-06-27 10:51:00', 'Odile Palustran', '2034ce0fe546e7ced53c587d6f98f3b4-1718539037.png', '<p>Odile Palustran, born from a French father and Chilean mother has lived in France, Argentina, USA, Chile, Brazil, Australia and UK, allowing her to be fluent in Spanish, English, French and Portuguese.</p>\r\n\r\n<p>After obtaining her business degree, she worked in Marketing, in industries such as aircraft, medical and cosmetic. Nevertheless her love of travelling sent her off to visit over 40 countries in the world and led her to refocus her career towards her passion: travel.</p>', 'Our Vision', '<p>To be a brand that represents its client&rsquo;s ideologies and values:</p>\r\n\r\n<ul>\r\n	<li>Quality</li>\r\n	<li>Unique experiences</li>\r\n	<li>High end service</li>\r\n	<li>Personalized attention</li>\r\n	<li>Sustainability</li>\r\n	<li>Preservation of local culture and heritage</li>\r\n</ul>', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `aboutfull`
--

DROP TABLE IF EXISTS `aboutfull`;
CREATE TABLE IF NOT EXISTS `aboutfull` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `changed` datetime DEFAULT NULL,
  `titleodile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentodile` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `titlephilo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentphilo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `titlemission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentmission` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `titlevision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentvision` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageodile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `aboutfull`
--

INSERT INTO `aboutfull` (`id`, `created`, `changed`, `titleodile`, `contentodile`, `titlephilo`, `contentphilo`, `titlemission`, `contentmission`, `titlevision`, `contentvision`, `imageodile`, `language`) VALUES
(1, '2024-06-26 20:27:43', '2024-06-27 10:52:11', 'Odile Palustran', '<p>Odile Palustran, born from a French father and Chilean mother has lived in France, Argentina, USA, Chile, Brazil, Australia and UK, allowing her to be fluent in Spanish, English, French and Portuguese.</p>\r\n\r\n<p>After obtaining her business degree, she worked in Marketing, in industries such as aircraft, medical and cosmetic. Nevertheless her love of travelling sent her off to visit over 40 countries in the world and led her to refocus her career towards her passion: travel.</p>\r\n\r\n<p>Odile Palustran, born from a French father and Chilean mother has lived in France, Argentina, USA, Chile, Brazil, Australia and UK, allowing her to be fluent in Spanish, English, French and Portuguese.</p>\r\n\r\n<p>After obtaining her business degree, she worked in Marketing, in industries such as aircraft, medical and cosmetic. Nevertheless her love of travelling sent her off to visit over 40 countries in the world and led her to refocus her career towards her passion: travel.</p>\r\n\r\n<p>Odile Palustran, born from a French father and Chilean mother has lived in France, Argentina, USA, Chile, Brazil, Australia and UK, allowing her to be fluent in Spanish, English, French and Portuguese.</p>\r\n\r\n<p>&nbsp;</p>', 'Our philosophy', '<p>Travelling is an experience that opens your eyes towards other cultures, marvels you with wonderful landscapes, offers new flavours, produces unforgettable memories, draws you closer to different realities and different people and through this helps you appreciate and reconnect with the world as a whole.</p>', 'Our mission', '<p>To create a close business relationship and continuous presence within the tourism industry, to promote the benefits and values of its clients, as well as be able to have access to opportunities that will showcase the products and generate more sales in the European market.</p>', 'Our Vision', '<p>To be a brand that represents its client&rsquo;s ideologies and values:</p>\r\n\r\n<ul>\r\n	<li>Quality</li>\r\n	<li>Unique experiences</li>\r\n	<li>High end service</li>\r\n	<li>Personalized attention</li>\r\n	<li>Sustainability</li>\r\n	<li>Preservation of local culture and heritage</li>\r\n</ul>', '2034ce0fe546e7ced53c587d6f98f3b4-1719433663.png', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `avant`
--

DROP TABLE IF EXISTS `avant`;
CREATE TABLE IF NOT EXISTS `avant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `changed` datetime DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avant`
--

INSERT INTO `avant` (`id`, `created`, `changed`, `title`, `resume`, `content`, `is_active`, `image`, `language`) VALUES
(1, '2024-06-16 09:11:36', '2024-06-27 10:46:18', 'Lorem ipsum', 'Lorem ipsum dolor sit amet consectetur. Eros eget imperdiet pretium mollis. Laoreet donec odio risus faucibus elementum amet odio. Etiam eu urna etiam sit fermentum.', '<ul>\r\n	<li>Lorem ipsum dolor sit amet consectetur. A hendrerit.</li>\r\n	<li>Lorem ipsum dolor sit amet consectetur. A hendrerit.</li>\r\n	<li>Lorem ipsum dolor sit amet consectetur. A hendrerit.</li>\r\n	<li>Lorem ipsum dolor sit amet consectetur. A hendrerit.</li>\r\n</ul>', 1, '907eae69b411f8e74f692b8435d08ca9-1718529122.jpg', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `block`
--

DROP TABLE IF EXISTS `block`;
CREATE TABLE IF NOT EXISTS `block` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `changed` datetime DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240611160525', '2024-06-11 16:05:28', 72),
('DoctrineMigrations\\Version20240612181744', '2024-06-12 18:17:53', 69),
('DoctrineMigrations\\Version20240615120238', '2024-06-15 12:02:43', 66),
('DoctrineMigrations\\Version20240615133824', '2024-06-15 13:38:28', 13),
('DoctrineMigrations\\Version20240615150540', '2024-06-15 15:05:43', 15),
('DoctrineMigrations\\Version20240616085733', '2024-06-16 08:57:38', 63),
('DoctrineMigrations\\Version20240616090215', '2024-06-16 09:02:18', 12),
('DoctrineMigrations\\Version20240616113140', '2024-06-16 11:31:48', 15),
('DoctrineMigrations\\Version20240616174726', '2024-06-16 17:47:32', 19),
('DoctrineMigrations\\Version20240616212312', '2024-06-16 21:23:17', 14),
('DoctrineMigrations\\Version20240618093116', '2024-06-18 09:31:21', 66),
('DoctrineMigrations\\Version20240618095049', '2024-06-18 09:50:53', 72),
('DoctrineMigrations\\Version20240618190617', '2024-06-18 19:06:22', 154),
('DoctrineMigrations\\Version20240626155039', '2024-06-26 15:50:44', 77),
('DoctrineMigrations\\Version20240626160040', '2024-06-26 16:00:46', 14),
('DoctrineMigrations\\Version20240626160544', '2024-06-26 16:05:48', 14),
('DoctrineMigrations\\Version20240627103336', '2024-06-27 10:33:42', 68),
('DoctrineMigrations\\Version20240627103757', '2024-06-27 10:38:00', 11),
('DoctrineMigrations\\Version20240627104129', '2024-06-27 10:41:32', 12),
('DoctrineMigrations\\Version20240627104312', '2024-06-27 10:43:15', 21),
('DoctrineMigrations\\Version20240627104550', '2024-06-27 10:45:52', 12),
('DoctrineMigrations\\Version20240627105001', '2024-06-27 10:50:04', 14),
('DoctrineMigrations\\Version20240627105135', '2024-06-27 10:51:38', 15),
('DoctrineMigrations\\Version20240627105244', '2024-06-27 10:52:47', 13);

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

DROP TABLE IF EXISTS `galerie`;
CREATE TABLE IF NOT EXISTS `galerie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `changed` datetime DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id`, `created`, `changed`, `title`, `is_active`) VALUES
(6, '2024-06-18 19:22:43', '2024-06-19 15:45:40', 'Galerie 1', 1),
(7, '2024-06-18 19:51:50', '2024-06-19 15:45:54', 'Galerie 2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `galerieimage`
--

DROP TABLE IF EXISTS `galerieimage`;
CREATE TABLE IF NOT EXISTS `galerieimage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `galerie_id` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C017D875825396CB` (`galerie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `galerieimage`
--

INSERT INTO `galerieimage` (`id`, `galerie_id`, `url`, `created`) VALUES
(4, 6, '4af13fa7dc25ef001a60ce1cffcc72e4-1718738564.jpg', '2024-06-18 19:22:43'),
(5, 6, '969f1a082621308f1ff3e23038d20ac0-1718738564.jpg', '2024-06-18 19:22:43'),
(6, 6, '1149d6a6209c644b2d4d066de3932a6f-1718738565.jpg', '2024-06-18 19:22:43'),
(7, 6, 'af214a9efa9f79c4486d81a4d421d7b1-1718738565.jpg', '2024-06-18 19:22:43'),
(8, 6, 'c3d56b19342a335dfceb2469eeb572ac-1718738566.jpg', '2024-06-18 19:22:43'),
(9, 6, 'c3d56b19342a335dfceb2469eeb572ac-1718738566.jpg', '2024-06-18 19:22:43'),
(10, 6, 'cb535ea56712b68ab0298db9a1dfa94a-1718738566.jpg', '2024-06-18 19:22:43'),
(11, 6, 'dea8a65fb1088994cf2fe39af135ac7e-1718738567.jpg', '2024-06-18 19:22:43'),
(12, 6, 'f3759f6ea362234d02146fbd71ee8ca9-1718738567.jpg', '2024-06-18 19:22:43'),
(14, 7, 'image-1-1718811980.jpg', '2024-06-19 15:46:20'),
(15, 7, 'image-2-1718811981.jpg', '2024-06-19 15:46:20'),
(16, 7, 'image-3-1718811981.jpg', '2024-06-19 15:46:20');

-- --------------------------------------------------------

--
-- Structure de la table `headerimage`
--

DROP TABLE IF EXISTS `headerimage`;
CREATE TABLE IF NOT EXISTS `headerimage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `the_collection_id` int NOT NULL,
  `created` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_359C0EC9CA1A9EB5` (`the_collection_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `headerimage`
--

INSERT INTO `headerimage` (`id`, `the_collection_id`, `created`, `url`) VALUES
(16, 7, '2024-06-16 17:38:52', 'image-1-1718559532.jpg'),
(17, 7, '2024-06-16 17:38:52', 'image-2-1718559532.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `headers`
--

DROP TABLE IF EXISTS `headers`;
CREATE TABLE IF NOT EXISTS `headers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `changed` datetime DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `headers`
--

INSERT INTO `headers` (`id`, `created`, `changed`, `title`, `image`, `is_active`, `link`, `language`) VALUES
(1, '2024-06-15 12:41:47', '2024-06-27 10:42:23', 'Adventure & Experience The Travel !', 'image-1-1718455307.jpg', 1, NULL, 'en'),
(2, '2024-06-15 12:41:54', '2024-06-27 10:42:18', 'Adventure & Experience The Travel !', 'image-2-1718455314.jpg', 1, 'https://css-tricks.com/snippets/css/a-guide-to-flexbox/', 'en'),
(3, '2024-06-15 12:42:00', '2024-06-27 10:42:12', 'Adventure & Experience The Travel !', 'image-3-1718455320.jpg', 1, 'https://css-tricks.com/snippets/css/a-guide-to-flexbox/', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `changed` datetime DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `created`, `changed`, `name`, `code`, `color`, `image`, `language`) VALUES
(1, '2024-06-11 16:26:18', '2024-06-27 10:36:22', 'Peru', 'PE', '#5FA10C', 'peru-1718464710.png', 'en'),
(2, '2024-06-11 16:26:57', '2024-06-27 10:36:17', 'Argentina', 'AR', '#78BBDE', 'argentina-1718465582.png', 'en'),
(3, '2024-06-11 16:27:17', '2024-06-27 10:36:07', 'Chile', 'CH', '#CF0000', 'chile-1718464694.png', 'en'),
(4, '2024-06-11 16:27:41', '2024-06-27 10:36:00', 'Costa rica', 'CR', '#D1AE84', 'costa-rica-1718464686.png', 'en'),
(5, '2024-06-11 16:28:08', '2024-06-27 10:35:54', 'Panama', 'PA', '#58BAB0', 'panama-1718465217.png', 'en'),
(6, '2024-06-11 16:28:25', '2024-06-27 10:35:49', 'Colombia', 'CO', '#FCB704', 'colombia-1718464673.png', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `changed` datetime DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `created`, `changed`, `title`, `image`, `content`, `categorie`, `is_active`, `language`) VALUES
(2, '2024-06-27 10:12:44', NULL, 'Service name', 'df0282c521d8941cb0447489077edfc8-1719483164.jpg', 'Lorem ipsum dolor sit amet consectetur. Blandit eget rhoncus tellus a sit nec. Ac egestas erat eu orci id tortor pharetra habitant auctor. Sed scelerisque in viverra nunc habitasse id.', 'trade', 1, 'en'),
(3, '2024-06-27 10:13:50', NULL, 'Service name', 'df0282c521d8941cb0447489077edfc8-1719483230.jpg', 'Lorem ipsum dolor sit amet consectetur. Blandit eget rhoncus tellus a sit nec. Ac egestas erat eu orci id tortor pharetra habitant auctor. Sed scelerisque in viverra nunc habitasse id.', 'consult', 1, 'en'),
(4, '2024-06-27 10:14:02', NULL, 'Service name', 'df0282c521d8941cb0447489077edfc8-1719483242.jpg', 'Lorem ipsum dolor sit amet consectetur. Blandit eget rhoncus tellus a sit nec. Ac egestas erat eu orci id tortor pharetra habitant auctor. Sed scelerisque in viverra nunc habitasse id.', 'online', 1, 'en'),
(5, '2024-06-27 10:14:21', NULL, 'Service name', 'df0282c521d8941cb0447489077edfc8-1719483261.jpg', 'Lorem ipsum dolor sit amet consectetur. Blandit eget rhoncus tellus a sit nec. Ac egestas erat eu orci id tortor pharetra habitant auctor. Sed scelerisque in viverra nunc habitasse id.', 'market', 1, 'en');

-- --------------------------------------------------------

--
-- Structure de la table `telechargement`
--

DROP TABLE IF EXISTS `telechargement`;
CREATE TABLE IF NOT EXISTS `telechargement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `the_collection_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E8C7D809CA1A9EB5` (`the_collection_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `telechargement`
--

INSERT INTO `telechargement` (`id`, `created`, `title`, `url`, `the_collection_id`) VALUES
(17, '2024-06-17 10:35:11', 'qsdsqdq', '2034ce0fe546e7ced53c587d6f98f3b4-1718620512.png', 7),
(18, '2024-06-17 10:35:11', 'qsdsdq', 'lorem-ipsum-1718620512.pdf', 7),
(19, '2024-06-17 10:35:11', 'qsdsqdsqdq', 'lorem-ipsum-1718620512.pdf', 7),
(20, '2024-06-17 10:35:11', 'qsdsqdsq', 'rectangle-2-1718620512.png', 7),
(21, '2024-06-17 10:35:34', 'dqsdqds', 'lorem-ipsum-1718620535.pdf', 7);

-- --------------------------------------------------------

--
-- Structure de la table `thecollection`
--

DROP TABLE IF EXISTS `thecollection`;
CREATE TABLE IF NOT EXISTS `thecollection` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `changed` datetime DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `imagecarte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays_id` int NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_65237D58A6E44244` (`pays_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `thecollection`
--

INSERT INTO `thecollection` (`id`, `created`, `changed`, `title`, `slug`, `logo`, `resume`, `content`, `is_active`, `imagecarte`, `pays_id`, `youtube`, `facebook`, `linkedin`, `instagram`, `link`, `language`) VALUES
(7, '2024-06-11 16:41:49', '2024-06-27 10:44:55', 'Hotel name', 'hotel-name', 'vector-1718470534.png', 'Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their', '<h2>Delfin Amazon Cruises</h2>\r\n\r\n<p>Delfin Amazon Cruises is composed of 3 vessels: Delfin I, Delfin II and Delfin III, that navigate the natural reserve of Pacaya Samiria in the Peruvian Amazon each week for 3 and 4 nights, year round.</p>\r\n\r\n<p>Pacaya Samiria is the second largest national reserve in Peru, spanning over 5 million acres. Also known as the Jungle of Mirrors it is also the world&#39;s largest protected flooded forest in the world, making it one of the prime intact swaths of rainforest in the Peruvian Amazon. During the Andean rainy season, water levels rises flooding 85% of the reserve, making it accessible only by boat. It is like no other protected area in Peru and it&rsquo;s directly linked to the economic well-being of a large native resident population. At least 100,000 Ribere&ntilde;os - people living along its riverbanks - rely on its aquatic and terrestrial resources for food and income.</p>\r\n\r\n<p>Delfin Amazon Cruises is owned and decorated by a Peruvian couple, Aldo and Lissy who have implemented everything to allow guests to immerse themselves in nature in the most beautiful authentic setting. And they took a deeper step into the jungle by creating the Kuyapa Foundation to help the communities the vessels visit.<br />\r\n&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"/img/ckeditor/Image%201.jpg\" style=\"height:448px; width:800px\" /><br />\r\n&nbsp;</p>\r\n\r\n<p>The itineraries have been carefully planned and can vary according to High Water Season (December to May) and Low Water Season (June to October) to offer an unforgettable experience. Guests will have no shortage of up close rainforest experience and gourmet food to complement. Onboard activities are available such as wildlife lectures, cooking classes. For a more up close and personal experience of the rainforest guests get to explore through jungle walk trails and can get out on the water with kayaks and stand up paddle boards, on board of the skiffs for birdwatching and wildlife spotting, night safaris, as well as visiting local communities.</p>\r\n\r\n<h3>Delfin III (Every Saturday and Tuesday)</h3>\r\n\r\n<p>The newest vessel, offering guests an immersive rainforest experience while simultaneously treating them to the highest levels of luxury. Launched in 2015, it is the largest in the fleet, with 22 suites. The ship has been beautifully finished with hardwood floors, designer furniture, and handmade Peruvian art and crafts.<br />\r\nOn the first deck there are 9 Suites with floor to ceiling panoramic windows as well as 2 spacious Corner Suites facing the front of the ship. On the second deck you&rsquo;ll find 10 Upper Suites and the largestof all, the Owner&rsquo;s Suite. The top deck features a beautiful indoor and outdoor lounge, a sundeck with plunge pool, a spa and gym, and of course the bar.</p>\r\n\r\n<h3>Delfin I (Every Monday and Thursday)</h3>\r\n\r\n<p>The most exclusive vessel that sails in the Peruvian Amazon region, offering just 4 oversized suites with panoramic private terraces; 2 of these offer a private whirlpool for the ultimate treat. Travellers will be spoiled by the floor-to-ceiling windows that allow nature to be part of the natural suite d&eacute;cor. The 3 times per day cabin service will ensure you the most optimal personalised experience. On the top deck, guests will find a lounge area, bar and entertainment center which are perfect places to relax in, while the jungle unfolds before their eyes.</p>\r\n\r\n<h3>Delfin II (A few dates are open in 2024 for Sunday and Wednesday)</h3>\r\n\r\n<p>The Expedition Cruise vessel launched in March 2009 boasts 14 oversized suites: 4 master suites and 10 suites. Each with movie screen sized windows and natural elements, they offer all the comforts provided by world class lodging yet with the spirit of casual and refined elegance. The dining room, observation deck and lounge, bar, entertainment center, and library are the ideal gathering places for all our guests. To compliment your daily excursions in the rainforest, guests are welcomed to use of the exercise and wellness space.</p>\r\n\r\n<p>Only available in Charter during 2024 when booking minimum 5 of the 14 suites. Availability below, contact me for more information:</p>', 1, 'image-1-1718470468.jpg', 4, 'https://lucpinelli.fr/', 'https://lucpinelli.fr/', 'https://lucpinelli.fr/', 'https://lucpinelli.fr/', 'https://openai.com/index/chatgpt/', 'en'),
(8, '2024-06-16 08:24:40', '2024-06-27 10:44:49', 'Hotel name', 'hotel-name-2', 'vector-1718526280.png', 'Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their', '<p>dsdsqdq</p>', 1, 'image-3-1718526280.jpg', 3, NULL, NULL, NULL, NULL, NULL, 'en'),
(9, '2024-06-16 08:45:33', '2024-06-27 10:44:43', 'Hotel name', 'hotel-name', 'vector-1718527533.png', 'Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their', '<p>Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their</p>', 1, 'image-2-1718527533.jpg', 1, NULL, NULL, NULL, NULL, NULL, 'en'),
(10, '2024-06-16 08:47:31', '2024-06-27 10:44:37', 'Hotel name', 'hotel-name', 'vector-1718527651.png', 'Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their', '<p>Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their</p>', 1, 'image-1-1718527651.jpg', 2, NULL, NULL, NULL, NULL, NULL, 'en'),
(11, '2024-06-16 08:50:59', '2024-06-27 10:44:26', 'Hotel name', 'hotel-name', 'vector-1718527869.png', 'Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their', '<p>Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their</p>', 1, 'image-3-1718527859.jpg', 5, NULL, NULL, NULL, NULL, NULL, 'en'),
(12, '2024-06-16 08:52:14', '2024-06-27 10:44:17', 'Hotel name CO', 'hotel-name', 'vector-1718527947.png', 'Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their', '<p>Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their</p>', 1, 'image-2-1718527947.jpg', 6, NULL, NULL, NULL, NULL, NULL, 'en'),
(13, '2024-06-16 17:29:19', '2024-06-27 10:44:09', 'Hotel name 2', 'hotel-name', 'vector-1718558959.png', 'Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their', '<p>Opal Collection provides exclusive representation services in the European market for high-end latin american products that help preserve the heritage and culture of their region and whose focus is to deliver unique and unforgettable experiences to their</p>', 1, 'image-1-1718558959.jpg', 6, NULL, NULL, NULL, NULL, NULL, 'en');

-- --------------------------------------------------------

--
-- Structure de la table `the_collection_galerie`
--

DROP TABLE IF EXISTS `the_collection_galerie`;
CREATE TABLE IF NOT EXISTS `the_collection_galerie` (
  `the_collection_id` int NOT NULL,
  `galerie_id` int NOT NULL,
  PRIMARY KEY (`the_collection_id`,`galerie_id`),
  KEY `IDX_ED647118CA1A9EB5` (`the_collection_id`),
  KEY `IDX_ED647118825396CB` (`galerie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `the_collection_galerie`
--

INSERT INTO `the_collection_galerie` (`the_collection_id`, `galerie_id`) VALUES
(7, 6),
(7, 7);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `nom`, `prenom`, `roles`, `password`, `is_active`) VALUES
(1, 'pinelli.luc@outlook.fr', 'Pinelli', 'Luc', '[]', '$2y$13$ID44eljvkrTdYlVc54tnreRH6/KOCz8WPuKrMtzSfColhai1tEBze', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `galerieimage`
--
ALTER TABLE `galerieimage`
  ADD CONSTRAINT `FK_C017D875825396CB` FOREIGN KEY (`galerie_id`) REFERENCES `galerie` (`id`);

--
-- Contraintes pour la table `headerimage`
--
ALTER TABLE `headerimage`
  ADD CONSTRAINT `FK_359C0EC9CA1A9EB5` FOREIGN KEY (`the_collection_id`) REFERENCES `thecollection` (`id`);

--
-- Contraintes pour la table `telechargement`
--
ALTER TABLE `telechargement`
  ADD CONSTRAINT `FK_E8C7D809CA1A9EB5` FOREIGN KEY (`the_collection_id`) REFERENCES `thecollection` (`id`);

--
-- Contraintes pour la table `thecollection`
--
ALTER TABLE `thecollection`
  ADD CONSTRAINT `FK_65237D58A6E44244` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `the_collection_galerie`
--
ALTER TABLE `the_collection_galerie`
  ADD CONSTRAINT `FK_ED647118825396CB` FOREIGN KEY (`galerie_id`) REFERENCES `galerie` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ED647118CA1A9EB5` FOREIGN KEY (`the_collection_id`) REFERENCES `thecollection` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
