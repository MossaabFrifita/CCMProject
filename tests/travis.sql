SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `instagram_poster_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `cataloguetag`
--

CREATE USER 'dev'@'localhost' IDENTIFIED BY 'dev';
GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON *.* TO 'dev'@'localhost';

CREATE DATABASE IF NOT EXISTS `instagram_poster_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `instagram_poster_db`;

--
-- Structure de la table `cataloguelocation`
--

DROP TABLE IF EXISTS `cataloguelocation`;
CREATE TABLE IF NOT EXISTS `cataloguelocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locationAdresse` varchar(100) NOT NULL,
  `photoNumber` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cataloguelocation`
--

INSERT INTO `cataloguelocation` (`id`, `locationAdresse`, `photoNumber`, `user_id`) VALUES
(1, '1245255*365542', 10, 1),
(3, '1245255*365542', 10, 1);

DROP TABLE IF EXISTS `cataloguetag`;
CREATE TABLE IF NOT EXISTS `cataloguetag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL,
  `nb_tag` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cataloguetag`
--

INSERT INTO `cataloguetag` (`id`, `tag`, `nb_tag`, `user_id`) VALUES
(24, 'tag', 10, 1),
(15, 'sousse', 54, 1),
(14, 'sousse', 66, 1),
(4, 'tunis', 20, 1),
(5, 'tunis', 20, 1),
(6, 'tunis', 20, 1),
(7, 'France', 10, 1),
(8, 'aaz', 5, 1),
(12, 'France', 10, 1),
(10, 'Sousse', 40, 1),
(13, 'France', 50, 1),
(25, 'tag', 10, 1),
(17, 'France', 64, 1),
(18, 'tag', 10, 1),
(19, 'tag', 10, 1),
(20, 'tag', 10, 1),
(21, 'tag', 10, 1),
(22, 'tag', 10, 1),
(23, 'tag', 10, 1),
(26, 'tag', 10, 1),
(27, 'tag', 10, 1),
(29, 'tag', 10, 1),
(31, 'tag', 10, 1),
(33, 'tag', 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_token` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `fullname`, `login`, `email`, `password`, `access_token`) VALUES
(1, 'Mossaab Frifita', 'frifita1@gmail.com', '', '123321', '');
COMMIT;
