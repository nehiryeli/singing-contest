# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.29)
# Database: db_name
# Generation Time: 2020-03-17 23:45:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table contest
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contest`;

CREATE TABLE `contest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_completed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contest` WRITE;
/*!40000 ALTER TABLE `contest` DISABLE KEYS */;

INSERT INTO `contest` (`id`, `is_completed`)
VALUES
	(1,1);

/*!40000 ALTER TABLE `contest` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contest_contestant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contest_contestant`;

CREATE TABLE `contest_contestant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contest_id` int(11) NOT NULL,
  `contestant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AC1CEB11CD0F0DE` (`contest_id`),
  KEY `IDX_AC1CEB1AF70032D` (`contestant_id`),
  CONSTRAINT `FK_AC1CEB11CD0F0DE` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`),
  CONSTRAINT `FK_AC1CEB1AF70032D` FOREIGN KEY (`contestant_id`) REFERENCES `contestant` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contest_contestant` WRITE;
/*!40000 ALTER TABLE `contest_contestant` DISABLE KEYS */;

INSERT INTO `contest_contestant` (`id`, `contest_id`, `contestant_id`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,1,3),
	(4,1,4),
	(5,1,5),
	(6,1,6),
	(7,1,7),
	(8,1,8),
	(9,1,9),
	(10,1,10);

/*!40000 ALTER TABLE `contest_contestant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contest_judges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contest_judges`;

CREATE TABLE `contest_judges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contest_id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_347C353F1CD0F0DE` (`contest_id`),
  KEY `IDX_347C353FB7D66194` (`judge_id`),
  CONSTRAINT `FK_347C353F1CD0F0DE` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`),
  CONSTRAINT `FK_347C353FB7D66194` FOREIGN KEY (`judge_id`) REFERENCES `judge` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contest_judges` WRITE;
/*!40000 ALTER TABLE `contest_judges` DISABLE KEYS */;

INSERT INTO `contest_judges` (`id`, `contest_id`, `judge_id`)
VALUES
	(1,1,3),
	(2,1,2),
	(3,1,1);

/*!40000 ALTER TABLE `contest_judges` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contest_winner
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contest_winner`;

CREATE TABLE `contest_winner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contest_id` int(11) NOT NULL,
  `contestant_id` int(11) NOT NULL,
  `total_score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_394FB5841CD0F0DE` (`contest_id`),
  KEY `IDX_394FB584AF70032D` (`contestant_id`),
  CONSTRAINT `FK_394FB5841CD0F0DE` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`),
  CONSTRAINT `FK_394FB584AF70032D` FOREIGN KEY (`contestant_id`) REFERENCES `contestant` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contest_winner` WRITE;
/*!40000 ALTER TABLE `contest_winner` DISABLE KEYS */;

INSERT INTO `contest_winner` (`id`, `contest_id`, `contestant_id`, `total_score`)
VALUES
	(1,1,4,581);

/*!40000 ALTER TABLE `contest_winner` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contestant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contestant`;

CREATE TABLE `contestant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_sick` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contestant` WRITE;
/*!40000 ALTER TABLE `contestant` DISABLE KEYS */;

INSERT INTO `contestant` (`id`, `is_sick`)
VALUES
	(1,0),
	(2,0),
	(3,0),
	(4,0),
	(5,0),
	(6,0),
	(7,0),
	(8,0),
	(9,0),
	(10,0);

/*!40000 ALTER TABLE `contestant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contestant_score
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contestant_score`;

CREATE TABLE `contestant_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contestant_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_60219BD5AF70032D` (`contestant_id`),
  KEY `IDX_60219BD54296D31F` (`genre_id`),
  CONSTRAINT `FK_60219BD54296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`),
  CONSTRAINT `FK_60219BD5AF70032D` FOREIGN KEY (`contestant_id`) REFERENCES `contestant` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contestant_score` WRITE;
/*!40000 ALTER TABLE `contestant_score` DISABLE KEYS */;

INSERT INTO `contestant_score` (`id`, `contestant_id`, `genre_id`, `score`)
VALUES
	(1,1,1,7),
	(2,1,2,1),
	(3,1,3,3),
	(4,1,4,2),
	(5,1,5,1),
	(6,1,6,9),
	(7,2,1,6),
	(8,2,2,6),
	(9,2,3,7),
	(10,2,4,4),
	(11,2,5,4),
	(12,2,6,2),
	(13,3,1,5),
	(14,3,2,7),
	(15,3,3,9),
	(16,3,4,9),
	(17,3,5,6),
	(18,3,6,6),
	(19,4,1,10),
	(20,4,2,6),
	(21,4,3,3),
	(22,4,4,6),
	(23,4,5,6),
	(24,4,6,3),
	(25,5,1,5),
	(26,5,2,1),
	(27,5,3,7),
	(28,5,4,1),
	(29,5,5,7),
	(30,5,6,8),
	(31,6,1,5),
	(32,6,2,7),
	(33,6,3,2),
	(34,6,4,7),
	(35,6,5,10),
	(36,6,6,6),
	(37,7,1,6),
	(38,7,2,6),
	(39,7,3,9),
	(40,7,4,8),
	(41,7,5,2),
	(42,7,6,2),
	(43,8,1,4),
	(44,8,2,6),
	(45,8,3,1),
	(46,8,4,6),
	(47,8,5,5),
	(48,8,6,9),
	(49,9,1,2),
	(50,9,2,6),
	(51,9,3,2),
	(52,9,4,7),
	(53,9,5,4),
	(54,9,6,5),
	(55,10,1,2),
	(56,10,2,1),
	(57,10,3,1),
	(58,10,4,7),
	(59,10,5,3),
	(60,10,6,9);

/*!40000 ALTER TABLE `contestant_score` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table genre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;

INSERT INTO `genre` (`id`, `name`)
VALUES
	(1,'Rock'),
	(2,'Country'),
	(3,'Pop'),
	(4,'Disco'),
	(5,'Jazz'),
	(6,'The Blues');

/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table judge
# ------------------------------------------------------------

DROP TABLE IF EXISTS `judge`;

CREATE TABLE `judge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `judge` WRITE;
/*!40000 ALTER TABLE `judge` DISABLE KEYS */;

INSERT INTO `judge` (`id`, `type`)
VALUES
	(1,'rockJudge'),
	(2,'meanJudge'),
	(3,'friendlyJudge');

/*!40000 ALTER TABLE `judge` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migration_versions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration_versions`;

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;

INSERT INTO `migration_versions` (`version`, `executed_at`)
VALUES
	('20200317233759','2020-03-17 23:38:18');

/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table round
# ------------------------------------------------------------

DROP TABLE IF EXISTS `round`;

CREATE TABLE `round` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contest_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `is_completed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C5EEEA341CD0F0DE` (`contest_id`),
  KEY `IDX_C5EEEA344296D31F` (`genre_id`),
  CONSTRAINT `FK_C5EEEA341CD0F0DE` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`),
  CONSTRAINT `FK_C5EEEA344296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `round` WRITE;
/*!40000 ALTER TABLE `round` DISABLE KEYS */;

INSERT INTO `round` (`id`, `contest_id`, `genre_id`, `is_completed`)
VALUES
	(1,1,6,1),
	(2,1,3,1),
	(3,1,5,1),
	(4,1,4,1),
	(5,1,1,1),
	(6,1,2,1);

/*!40000 ALTER TABLE `round` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table round_contestant_score
# ------------------------------------------------------------

DROP TABLE IF EXISTS `round_contestant_score`;

CREATE TABLE `round_contestant_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `round_id` int(11) NOT NULL,
  `contestant_id` int(11) NOT NULL,
  `score` decimal(4,1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B5B66325A6005CA0` (`round_id`),
  KEY `IDX_B5B66325AF70032D` (`contestant_id`),
  CONSTRAINT `FK_B5B66325A6005CA0` FOREIGN KEY (`round_id`) REFERENCES `round` (`id`),
  CONSTRAINT `FK_B5B66325AF70032D` FOREIGN KEY (`contestant_id`) REFERENCES `contestant` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `round_contestant_score` WRITE;
/*!40000 ALTER TABLE `round_contestant_score` DISABLE KEYS */;

INSERT INTO `round_contestant_score` (`id`, `round_id`, `contestant_id`, `score`)
VALUES
	(1,1,1,31.5),
	(2,1,1,86.4),
	(3,1,1,38.7),
	(4,1,1,23.4),
	(5,1,1,57.6),
	(6,1,1,84.6),
	(7,1,2,19.2),
	(8,1,2,4.0),
	(9,1,2,6.4),
	(10,1,2,8.4),
	(11,1,2,4.6),
	(12,1,2,19.8),
	(13,1,3,19.2),
	(14,1,3,49.2),
	(15,1,3,54.0),
	(16,1,3,46.2),
	(17,1,3,26.4),
	(18,1,3,38.4),
	(19,1,4,4.7),
	(20,1,4,7.7),
	(21,1,4,2.6),
	(22,1,4,11.4),
	(23,1,4,10.1),
	(24,1,4,9.8),
	(25,1,5,10.4),
	(26,1,5,30.8),
	(27,1,5,24.0),
	(28,1,5,19.2),
	(29,1,5,30.0),
	(30,1,5,3.6),
	(31,1,6,36.0),
	(32,1,6,56.4),
	(33,1,6,41.4),
	(34,1,6,33.6),
	(35,1,6,7.8),
	(36,1,6,48.6),
	(37,1,7,9.2),
	(38,1,7,7.2),
	(39,1,7,1.6),
	(40,1,7,7.6),
	(41,1,7,17.6),
	(42,1,7,13.6),
	(43,1,8,36.0),
	(44,1,8,25.2),
	(45,1,8,24.3),
	(46,1,8,41.4),
	(47,1,8,16.2),
	(48,1,8,65.7),
	(49,1,9,40.0),
	(50,1,9,48.5),
	(51,1,9,21.5),
	(52,1,9,6.5),
	(53,1,9,30.0),
	(54,1,9,5.5),
	(55,1,10,36.9),
	(56,1,10,3.6),
	(57,1,10,65.7),
	(58,1,10,28.8),
	(59,1,10,74.7),
	(60,1,10,82.8),
	(61,2,1,10.8),
	(62,2,1,6.6),
	(63,2,1,3.0),
	(64,2,1,4.2),
	(65,2,1,11.7),
	(66,2,1,25.2),
	(67,2,2,52.5),
	(68,2,2,11.9),
	(69,2,2,64.4),
	(70,2,2,28.0),
	(71,2,2,11.2),
	(72,2,2,21.0),
	(73,2,3,84.6),
	(74,2,3,32.4),
	(75,2,3,9.0),
	(76,2,3,65.7),
	(77,2,3,52.2),
	(78,2,3,35.1),
	(79,2,4,22.8),
	(80,2,4,23.7),
	(81,2,4,12.0),
	(82,2,4,21.0),
	(83,2,4,17.1),
	(84,2,4,21.9),
	(85,2,5,17.5),
	(86,2,5,15.8),
	(87,2,5,9.5),
	(88,2,5,7.4),
	(89,2,5,3.9),
	(90,2,5,2.5),
	(91,2,6,2.8),
	(92,2,6,5.6),
	(93,2,6,19.0),
	(94,2,6,7.4),
	(95,2,6,4.8),
	(96,2,6,3.4),
	(97,2,7,82.8),
	(98,2,7,30.6),
	(99,2,7,33.3),
	(100,2,7,87.3),
	(101,2,7,27.9),
	(102,2,7,72.9),
	(103,2,8,4.6),
	(104,2,8,2.8),
	(105,2,8,3.1),
	(106,2,8,0.9),
	(107,2,8,3.7),
	(108,2,8,4.3),
	(109,2,9,6.4),
	(110,2,9,5.6),
	(111,2,9,6.0),
	(112,2,9,8.2),
	(113,2,9,10.6),
	(114,2,9,19.4),
	(115,2,10,4.6),
	(116,2,10,3.8),
	(117,2,10,2.0),
	(118,2,10,8.3),
	(119,2,10,3.9),
	(120,2,10,5.5),
	(121,3,1,6.7),
	(122,3,1,3.6),
	(123,3,1,4.5),
	(124,3,1,2.9),
	(125,3,1,7.0),
	(126,3,1,7.7),
	(127,3,2,37.2),
	(128,3,2,4.0),
	(129,3,2,29.2),
	(130,3,2,15.2),
	(131,3,2,4.8),
	(132,3,2,7.6),
	(133,3,3,1.8),
	(134,3,3,38.4),
	(135,3,3,20.4),
	(136,3,3,18.6),
	(137,3,3,22.2),
	(138,3,3,19.8),
	(139,3,4,33.0),
	(140,3,4,29.4),
	(141,3,4,60.0),
	(142,3,4,6.6),
	(143,3,4,2.4),
	(144,3,4,12.0),
	(145,3,5,3.5),
	(146,3,5,39.2),
	(147,3,5,33.6),
	(148,3,5,35.7),
	(149,3,5,32.9),
	(150,3,5,60.9),
	(151,3,6,66.0),
	(152,3,6,32.0),
	(153,3,6,91.0),
	(154,3,6,64.0),
	(155,3,6,8.0),
	(156,3,6,12.0),
	(157,3,7,10.4),
	(158,3,7,6.2),
	(159,3,7,18.4),
	(160,3,7,4.6),
	(161,3,7,19.4),
	(162,3,7,4.2),
	(163,3,8,2.5),
	(164,3,8,49.5),
	(165,3,8,35.5),
	(166,3,8,37.0),
	(167,3,8,18.5),
	(168,3,8,36.0),
	(169,3,9,19.6),
	(170,3,9,40.0),
	(171,3,9,15.2),
	(172,3,9,37.2),
	(173,3,9,31.2),
	(174,3,9,10.8),
	(175,3,10,30.0),
	(176,3,10,20.4),
	(177,3,10,24.9),
	(178,3,10,4.5),
	(179,3,10,10.8),
	(180,3,10,14.1),
	(181,4,1,15.6),
	(182,4,1,11.0),
	(183,4,1,18.2),
	(184,4,1,19.0),
	(185,4,1,10.2),
	(186,4,1,15.2),
	(187,4,2,16.4),
	(188,4,2,19.6),
	(189,4,2,25.6),
	(190,4,2,30.0),
	(191,4,2,16.8),
	(192,4,2,4.4),
	(193,4,3,19.8),
	(194,4,3,15.8),
	(195,4,3,39.2),
	(196,4,3,37.4),
	(197,4,3,21.6),
	(198,4,3,44.1),
	(199,4,4,9.0),
	(200,4,4,48.0),
	(201,4,4,44.4),
	(202,4,4,3.6),
	(203,4,4,54.6),
	(204,4,4,47.4),
	(205,4,5,4.8),
	(206,4,5,9.0),
	(207,4,5,0.2),
	(208,4,5,8.4),
	(209,4,5,1.5),
	(210,4,5,7.1),
	(211,4,6,31.5),
	(212,4,6,64.4),
	(213,4,6,60.9),
	(214,4,6,35.0),
	(215,4,6,26.6),
	(216,4,6,31.5),
	(217,4,7,14.4),
	(218,4,7,48.8),
	(219,4,7,68.0),
	(220,4,7,42.4),
	(221,4,7,6.4),
	(222,4,7,39.2),
	(223,4,8,52.8),
	(224,4,8,42.0),
	(225,4,8,58.8),
	(226,4,8,21.0),
	(227,4,8,46.2),
	(228,4,8,4.2),
	(229,4,9,19.6),
	(230,4,9,4.9),
	(231,4,9,63.0),
	(232,4,9,39.9),
	(233,4,9,58.8),
	(234,4,9,65.8),
	(235,4,10,53.2),
	(236,4,10,13.3),
	(237,4,10,11.9),
	(238,4,10,25.2),
	(239,4,10,9.8),
	(240,4,10,49.7),
	(241,5,1,4.2),
	(242,5,1,6.3),
	(243,5,1,31.9),
	(244,5,1,4.2),
	(245,5,1,28.0),
	(246,5,1,24.2),
	(247,5,2,13.8),
	(248,5,2,57.6),
	(249,5,2,10.8),
	(250,5,2,38.4),
	(251,5,2,31.2),
	(252,5,2,7.2),
	(253,5,3,14.5),
	(254,5,3,8.0),
	(255,5,3,49.0),
	(256,5,3,21.5),
	(257,5,3,49.0),
	(258,5,3,39.5),
	(259,5,4,48.0),
	(260,5,4,18.0),
	(261,5,4,93.0),
	(262,5,4,39.0),
	(263,5,4,75.0),
	(264,5,4,47.0),
	(265,5,5,41.5),
	(266,5,5,47.0),
	(267,5,5,26.0),
	(268,5,5,35.5),
	(269,5,5,43.0),
	(270,5,5,15.0),
	(271,5,6,15.3),
	(272,5,6,20.3),
	(273,5,6,2.5),
	(274,5,6,0.5),
	(275,5,6,20.5),
	(276,5,6,22.8),
	(277,5,7,59.4),
	(278,5,7,3.0),
	(279,5,7,42.0),
	(280,5,7,18.6),
	(281,5,7,27.6),
	(282,5,7,25.8),
	(283,5,8,12.0),
	(284,5,8,26.0),
	(285,5,8,33.2),
	(286,5,8,1.6),
	(287,5,8,1.2),
	(288,5,8,1.6),
	(289,5,9,12.8),
	(290,5,9,20.0),
	(291,5,9,7.6),
	(292,5,9,16.6),
	(293,5,9,8.4),
	(294,5,9,14.2),
	(295,5,10,13.6),
	(296,5,10,5.2),
	(297,5,10,0.8),
	(298,5,10,8.2),
	(299,5,10,13.0),
	(300,5,10,4.2),
	(301,6,1,8.5),
	(302,6,1,6.6),
	(303,6,1,1.0),
	(304,6,1,2.4),
	(305,6,1,8.1),
	(306,6,1,1.0),
	(307,6,2,57.0),
	(308,6,2,3.0),
	(309,6,2,58.2),
	(310,6,2,48.6),
	(311,6,2,16.2),
	(312,6,2,2.4),
	(313,6,3,30.1),
	(314,6,3,63.7),
	(315,6,3,17.5),
	(316,6,3,32.2),
	(317,6,3,2.1),
	(318,6,3,67.2),
	(319,6,4,8.4),
	(320,6,4,27.6),
	(321,6,4,53.4),
	(322,6,4,19.8),
	(323,6,4,31.8),
	(324,6,4,36.0),
	(325,6,5,3.0),
	(326,6,5,3.3),
	(327,6,5,4.1),
	(328,6,5,6.9),
	(329,6,5,2.7),
	(330,6,5,6.1),
	(331,6,6,25.2),
	(332,6,6,17.5),
	(333,6,6,35.7),
	(334,6,6,26.6),
	(335,6,6,32.2),
	(336,6,6,10.5),
	(337,6,7,51.0),
	(338,6,7,19.2),
	(339,6,7,5.4),
	(340,6,7,7.8),
	(341,6,7,22.8),
	(342,6,7,57.6),
	(343,6,8,53.4),
	(344,6,8,45.0),
	(345,6,8,1.8),
	(346,6,8,47.4),
	(347,6,8,40.2),
	(348,6,8,57.0),
	(349,6,9,40.8),
	(350,6,9,46.2),
	(351,6,9,13.2),
	(352,6,9,33.0),
	(353,6,9,19.8),
	(354,6,9,28.2),
	(355,6,10,4.6),
	(356,6,10,2.2),
	(357,6,10,0.6),
	(358,6,10,1.0),
	(359,6,10,5.9),
	(360,6,10,3.9);

/*!40000 ALTER TABLE `round_contestant_score` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table round_judge_score
# ------------------------------------------------------------

DROP TABLE IF EXISTS `round_judge_score`;

CREATE TABLE `round_judge_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `round_id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `contestant_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_95A36EC9A6005CA0` (`round_id`),
  KEY `IDX_95A36EC9B7D66194` (`judge_id`),
  KEY `IDX_95A36EC9AF70032D` (`contestant_id`),
  CONSTRAINT `FK_95A36EC9A6005CA0` FOREIGN KEY (`round_id`) REFERENCES `round` (`id`),
  CONSTRAINT `FK_95A36EC9AF70032D` FOREIGN KEY (`contestant_id`) REFERENCES `contestant` (`id`),
  CONSTRAINT `FK_95A36EC9B7D66194` FOREIGN KEY (`judge_id`) REFERENCES `judge` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `round_judge_score` WRITE;
/*!40000 ALTER TABLE `round_judge_score` DISABLE KEYS */;

INSERT INTO `round_judge_score` (`id`, `round_id`, `judge_id`, `contestant_id`, `score`)
VALUES
	(1,1,3,1,8),
	(2,1,3,1,8),
	(3,1,3,1,8),
	(4,1,3,1,8),
	(5,1,3,1,8),
	(6,1,3,1,8),
	(7,1,3,2,8),
	(8,1,3,2,8),
	(9,1,3,2,8),
	(10,1,3,2,8),
	(11,1,3,2,8),
	(12,1,3,2,8),
	(13,1,3,3,8),
	(14,1,3,3,8),
	(15,1,3,3,8),
	(16,1,3,3,8),
	(17,1,3,3,8),
	(18,1,3,3,8),
	(19,1,3,4,9),
	(20,1,3,4,9),
	(21,1,3,4,8),
	(22,1,3,4,9),
	(23,1,3,4,9),
	(24,1,3,4,9),
	(25,1,3,5,9),
	(26,1,3,5,9),
	(27,1,3,5,9),
	(28,1,3,5,9),
	(29,1,3,5,9),
	(30,1,3,5,9),
	(31,1,3,6,8),
	(32,1,3,6,8),
	(33,1,3,6,8),
	(34,1,3,6,8),
	(35,1,3,6,8),
	(36,1,3,6,8),
	(37,1,3,7,8),
	(38,1,3,7,8),
	(39,1,3,7,7),
	(40,1,3,7,8),
	(41,1,3,7,8),
	(42,1,3,7,8),
	(43,1,3,8,8),
	(44,1,3,8,8),
	(45,1,3,8,8),
	(46,1,3,8,8),
	(47,1,3,8,8),
	(48,1,3,8,8),
	(49,1,3,9,8),
	(50,1,3,9,8),
	(51,1,3,9,8),
	(52,1,3,9,8),
	(53,1,3,9,8),
	(54,1,3,9,8),
	(55,1,3,10,8),
	(56,1,3,10,8),
	(57,1,3,10,8),
	(58,1,3,10,8),
	(59,1,3,10,8),
	(60,1,3,10,8),
	(61,1,2,1,2),
	(62,1,2,1,2),
	(63,1,2,1,2),
	(64,1,2,1,2),
	(65,1,2,1,2),
	(66,1,2,1,2),
	(67,1,2,2,2),
	(68,1,2,2,2),
	(69,1,2,2,2),
	(70,1,2,2,2),
	(71,1,2,2,2),
	(72,1,2,2,2),
	(73,1,2,3,2),
	(74,1,2,3,2),
	(75,1,2,3,2),
	(76,1,2,3,2),
	(77,1,2,3,2),
	(78,1,2,3,2),
	(79,1,2,4,2),
	(80,1,2,4,2),
	(81,1,2,4,2),
	(82,1,2,4,2),
	(83,1,2,4,2),
	(84,1,2,4,2),
	(85,1,2,5,2),
	(86,1,2,5,2),
	(87,1,2,5,2),
	(88,1,2,5,2),
	(89,1,2,5,2),
	(90,1,2,5,2),
	(91,1,2,6,2),
	(92,1,2,6,2),
	(93,1,2,6,2),
	(94,1,2,6,2),
	(95,1,2,6,2),
	(96,1,2,6,2),
	(97,1,2,7,2),
	(98,1,2,7,2),
	(99,1,2,7,2),
	(100,1,2,7,2),
	(101,1,2,7,2),
	(102,1,2,7,2),
	(103,1,2,8,2),
	(104,1,2,8,2),
	(105,1,2,8,2),
	(106,1,2,8,2),
	(107,1,2,8,2),
	(108,1,2,8,2),
	(109,1,2,9,2),
	(110,1,2,9,2),
	(111,1,2,9,2),
	(112,1,2,9,2),
	(113,1,2,9,2),
	(114,1,2,9,2),
	(115,1,2,10,2),
	(116,1,2,10,2),
	(117,1,2,10,2),
	(118,1,2,10,2),
	(119,1,2,10,2),
	(120,1,2,10,2),
	(121,1,1,1,7),
	(122,1,1,1,4),
	(123,1,1,1,8),
	(124,1,1,1,0),
	(125,1,1,1,6),
	(126,1,1,1,5),
	(127,1,1,2,5),
	(128,1,1,2,4),
	(129,1,1,2,7),
	(130,1,1,2,1),
	(131,1,1,2,8),
	(132,1,1,2,8),
	(133,1,1,3,0),
	(134,1,1,3,2),
	(135,1,1,3,2),
	(136,1,1,3,6),
	(137,1,1,3,6),
	(138,1,1,3,5),
	(139,1,1,4,6),
	(140,1,1,4,10),
	(141,1,1,4,8),
	(142,1,1,4,0),
	(143,1,1,4,8),
	(144,1,1,4,9),
	(145,1,1,5,0),
	(146,1,1,5,2),
	(147,1,1,5,9),
	(148,1,1,5,5),
	(149,1,1,5,8),
	(150,1,1,5,8),
	(151,1,1,6,9),
	(152,1,1,6,1),
	(153,1,1,6,6),
	(154,1,1,6,0),
	(155,1,1,6,4),
	(156,1,1,6,5),
	(157,1,1,7,2),
	(158,1,1,7,4),
	(159,1,1,7,2),
	(160,1,1,7,0),
	(161,1,1,7,0),
	(162,1,1,7,1),
	(163,1,1,8,10),
	(164,1,1,8,0),
	(165,1,1,8,3),
	(166,1,1,8,8),
	(167,1,1,8,0),
	(168,1,1,8,10),
	(169,1,1,9,0),
	(170,1,1,9,5),
	(171,1,1,9,0),
	(172,1,1,9,9),
	(173,1,1,9,4),
	(174,1,1,9,10),
	(175,1,1,10,7),
	(176,1,1,10,1),
	(177,1,1,10,1),
	(178,1,1,10,10),
	(179,1,1,10,3),
	(180,1,1,10,4),
	(181,2,3,1,8),
	(182,2,3,1,8),
	(183,2,3,1,7),
	(184,2,3,1,8),
	(185,2,3,1,8),
	(186,2,3,1,8),
	(187,2,3,2,8),
	(188,2,3,2,8),
	(189,2,3,2,8),
	(190,2,3,2,8),
	(191,2,3,2,8),
	(192,2,3,2,8),
	(193,2,3,3,8),
	(194,2,3,3,8),
	(195,2,3,3,8),
	(196,2,3,3,8),
	(197,2,3,3,8),
	(198,2,3,3,8),
	(199,2,3,4,8),
	(200,2,3,4,8),
	(201,2,3,4,8),
	(202,2,3,4,8),
	(203,2,3,4,8),
	(204,2,3,4,8),
	(205,2,3,5,9),
	(206,2,3,5,9),
	(207,2,3,5,9),
	(208,2,3,5,9),
	(209,2,3,5,9),
	(210,2,3,5,8),
	(211,2,3,6,7),
	(212,2,3,6,8),
	(213,2,3,6,8),
	(214,2,3,6,8),
	(215,2,3,6,8),
	(216,2,3,6,8),
	(217,2,3,7,8),
	(218,2,3,7,8),
	(219,2,3,7,8),
	(220,2,3,7,8),
	(221,2,3,7,8),
	(222,2,3,7,8),
	(223,2,3,8,9),
	(224,2,3,8,8),
	(225,2,3,8,9),
	(226,2,3,8,8),
	(227,2,3,8,9),
	(228,2,3,8,9),
	(229,2,3,9,8),
	(230,2,3,9,8),
	(231,2,3,9,8),
	(232,2,3,9,8),
	(233,2,3,9,8),
	(234,2,3,9,8),
	(235,2,3,10,8),
	(236,2,3,10,8),
	(237,2,3,10,7),
	(238,2,3,10,8),
	(239,2,3,10,8),
	(240,2,3,10,8),
	(241,2,2,1,2),
	(242,2,2,1,2),
	(243,2,2,1,2),
	(244,2,2,1,2),
	(245,2,2,1,2),
	(246,2,2,1,2),
	(247,2,2,2,2),
	(248,2,2,2,2),
	(249,2,2,2,2),
	(250,2,2,2,2),
	(251,2,2,2,2),
	(252,2,2,2,2),
	(253,2,2,3,2),
	(254,2,2,3,2),
	(255,2,2,3,2),
	(256,2,2,3,2),
	(257,2,2,3,2),
	(258,2,2,3,2),
	(259,2,2,4,2),
	(260,2,2,4,2),
	(261,2,2,4,2),
	(262,2,2,4,2),
	(263,2,2,4,2),
	(264,2,2,4,2),
	(265,2,2,5,2),
	(266,2,2,5,2),
	(267,2,2,5,2),
	(268,2,2,5,2),
	(269,2,2,5,2),
	(270,2,2,5,2),
	(271,2,2,6,2),
	(272,2,2,6,2),
	(273,2,2,6,2),
	(274,2,2,6,2),
	(275,2,2,6,2),
	(276,2,2,6,2),
	(277,2,2,7,2),
	(278,2,2,7,2),
	(279,2,2,7,2),
	(280,2,2,7,2),
	(281,2,2,7,2),
	(282,2,2,7,2),
	(283,2,2,8,2),
	(284,2,2,8,2),
	(285,2,2,8,2),
	(286,2,2,8,2),
	(287,2,2,8,2),
	(288,2,2,8,2),
	(289,2,2,9,2),
	(290,2,2,9,2),
	(291,2,2,9,2),
	(292,2,2,9,2),
	(293,2,2,9,2),
	(294,2,2,9,2),
	(295,2,2,10,2),
	(296,2,2,10,2),
	(297,2,2,10,2),
	(298,2,2,10,2),
	(299,2,2,10,2),
	(300,2,2,10,2),
	(301,2,1,1,5),
	(302,2,1,1,6),
	(303,2,1,1,2),
	(304,2,1,1,5),
	(305,2,1,1,7),
	(306,2,1,1,10),
	(307,2,1,2,2),
	(308,2,1,2,6),
	(309,2,1,2,3),
	(310,2,1,2,6),
	(311,2,1,2,8),
	(312,2,1,2,2),
	(313,2,1,3,10),
	(314,2,1,3,3),
	(315,2,1,3,1),
	(316,2,1,3,4),
	(317,2,1,3,2),
	(318,2,1,3,1),
	(319,2,1,4,5),
	(320,2,1,4,1),
	(321,2,1,4,4),
	(322,2,1,4,3),
	(323,2,1,4,5),
	(324,2,1,4,2),
	(325,2,1,5,8),
	(326,2,1,5,2),
	(327,2,1,5,1),
	(328,2,1,5,7),
	(329,2,1,5,1),
	(330,2,1,5,3),
	(331,2,1,6,1),
	(332,2,1,6,8),
	(333,2,1,6,9),
	(334,2,1,6,0),
	(335,2,1,6,3),
	(336,2,1,6,10),
	(337,2,1,7,5),
	(338,2,1,7,7),
	(339,2,1,7,7),
	(340,2,1,7,6),
	(341,2,1,7,3),
	(342,2,1,7,6),
	(343,2,1,8,6),
	(344,2,1,8,1),
	(345,2,1,8,0),
	(346,2,1,8,6),
	(347,2,1,8,10),
	(348,2,1,8,4),
	(349,2,1,9,0),
	(350,2,1,9,0),
	(351,2,1,9,8),
	(352,2,1,9,3),
	(353,2,1,9,10),
	(354,2,1,9,2),
	(355,2,1,10,10),
	(356,2,1,10,2),
	(357,2,1,10,9),
	(358,2,1,10,5),
	(359,2,1,10,8),
	(360,2,1,10,5),
	(361,3,3,1,8),
	(362,3,3,1,8),
	(363,3,3,1,8),
	(364,3,3,1,7),
	(365,3,3,1,8),
	(366,3,3,1,8),
	(367,3,3,2,8),
	(368,3,3,2,8),
	(369,3,3,2,8),
	(370,3,3,2,8),
	(371,3,3,2,8),
	(372,3,3,2,8),
	(373,3,3,3,7),
	(374,3,3,3,8),
	(375,3,3,3,8),
	(376,3,3,3,8),
	(377,3,3,3,8),
	(378,3,3,3,8),
	(379,3,3,4,8),
	(380,3,3,4,8),
	(381,3,3,4,8),
	(382,3,3,4,8),
	(383,3,3,4,7),
	(384,3,3,4,8),
	(385,3,3,5,8),
	(386,3,3,5,8),
	(387,3,3,5,8),
	(388,3,3,5,8),
	(389,3,3,5,8),
	(390,3,3,5,8),
	(391,3,3,6,8),
	(392,3,3,6,8),
	(393,3,3,6,8),
	(394,3,3,6,8),
	(395,3,3,6,8),
	(396,3,3,6,8),
	(397,3,3,7,8),
	(398,3,3,7,8),
	(399,3,3,7,8),
	(400,3,3,7,8),
	(401,3,3,7,8),
	(402,3,3,7,8),
	(403,3,3,8,7),
	(404,3,3,8,8),
	(405,3,3,8,8),
	(406,3,3,8,8),
	(407,3,3,8,8),
	(408,3,3,8,8),
	(409,3,3,9,8),
	(410,3,3,9,8),
	(411,3,3,9,8),
	(412,3,3,9,8),
	(413,3,3,9,8),
	(414,3,3,9,8),
	(415,3,3,10,8),
	(416,3,3,10,8),
	(417,3,3,10,8),
	(418,3,3,10,8),
	(419,3,3,10,8),
	(420,3,3,10,8),
	(421,3,2,1,2),
	(422,3,2,1,2),
	(423,3,2,1,2),
	(424,3,2,1,2),
	(425,3,2,1,2),
	(426,3,2,1,2),
	(427,3,2,2,2),
	(428,3,2,2,2),
	(429,3,2,2,2),
	(430,3,2,2,2),
	(431,3,2,2,2),
	(432,3,2,2,2),
	(433,3,2,3,2),
	(434,3,2,3,2),
	(435,3,2,3,2),
	(436,3,2,3,2),
	(437,3,2,3,2),
	(438,3,2,3,2),
	(439,3,2,4,2),
	(440,3,2,4,2),
	(441,3,2,4,2),
	(442,3,2,4,2),
	(443,3,2,4,2),
	(444,3,2,4,2),
	(445,3,2,5,2),
	(446,3,2,5,2),
	(447,3,2,5,2),
	(448,3,2,5,2),
	(449,3,2,5,2),
	(450,3,2,5,2),
	(451,3,2,6,2),
	(452,3,2,6,2),
	(453,3,2,6,10),
	(454,3,2,6,2),
	(455,3,2,6,2),
	(456,3,2,6,2),
	(457,3,2,7,2),
	(458,3,2,7,2),
	(459,3,2,7,2),
	(460,3,2,7,2),
	(461,3,2,7,2),
	(462,3,2,7,2),
	(463,3,2,8,2),
	(464,3,2,8,2),
	(465,3,2,8,2),
	(466,3,2,8,2),
	(467,3,2,8,2),
	(468,3,2,8,2),
	(469,3,2,9,2),
	(470,3,2,9,2),
	(471,3,2,9,2),
	(472,3,2,9,2),
	(473,3,2,9,2),
	(474,3,2,9,2),
	(475,3,2,10,2),
	(476,3,2,10,2),
	(477,3,2,10,2),
	(478,3,2,10,2),
	(479,3,2,10,2),
	(480,3,2,10,2),
	(481,3,1,1,6),
	(482,3,1,1,4),
	(483,3,1,1,0),
	(484,3,1,1,1),
	(485,3,1,1,5),
	(486,3,1,1,5),
	(487,3,1,2,7),
	(488,3,1,2,7),
	(489,3,1,2,3),
	(490,3,1,2,8),
	(491,3,1,2,2),
	(492,3,1,2,9),
	(493,3,1,3,0),
	(494,3,1,3,6),
	(495,3,1,3,0),
	(496,3,1,3,5),
	(497,3,1,3,7),
	(498,3,1,3,1),
	(499,3,1,4,7),
	(500,3,1,4,10),
	(501,3,1,4,2),
	(502,3,1,4,9),
	(503,3,1,4,2),
	(504,3,1,4,10),
	(505,3,1,5,2),
	(506,3,1,5,4),
	(507,3,1,5,3),
	(508,3,1,5,1),
	(509,3,1,5,0),
	(510,3,1,5,9),
	(511,3,1,6,9),
	(512,3,1,6,3),
	(513,3,1,6,4),
	(514,3,1,6,7),
	(515,3,1,6,4),
	(516,3,1,6,4),
	(517,3,1,7,3),
	(518,3,1,7,0),
	(519,3,1,7,1),
	(520,3,1,7,6),
	(521,3,1,7,7),
	(522,3,1,7,9),
	(523,3,1,8,6),
	(524,3,1,8,9),
	(525,3,1,8,2),
	(526,3,1,8,3),
	(527,3,1,8,3),
	(528,3,1,8,3),
	(529,3,1,9,2),
	(530,3,1,9,1),
	(531,3,1,9,5),
	(532,3,1,9,2),
	(533,3,1,9,8),
	(534,3,1,9,6),
	(535,3,1,10,6),
	(536,3,1,10,3),
	(537,3,1,10,3),
	(538,3,1,10,9),
	(539,3,1,10,3),
	(540,3,1,10,7),
	(541,4,3,1,8),
	(542,4,3,1,8),
	(543,4,3,1,8),
	(544,4,3,1,8),
	(545,4,3,1,8),
	(546,4,3,1,8),
	(547,4,3,2,8),
	(548,4,3,2,8),
	(549,4,3,2,8),
	(550,4,3,2,8),
	(551,4,3,2,8),
	(552,4,3,2,8),
	(553,4,3,3,9),
	(554,4,3,3,9),
	(555,4,3,3,9),
	(556,4,3,3,9),
	(557,4,3,3,9),
	(558,4,3,3,9),
	(559,4,3,4,8),
	(560,4,3,4,8),
	(561,4,3,4,8),
	(562,4,3,4,8),
	(563,4,3,4,8),
	(564,4,3,4,8),
	(565,4,3,5,8),
	(566,4,3,5,8),
	(567,4,3,5,7),
	(568,4,3,5,8),
	(569,4,3,5,7),
	(570,4,3,5,8),
	(571,4,3,6,8),
	(572,4,3,6,8),
	(573,4,3,6,8),
	(574,4,3,6,8),
	(575,4,3,6,8),
	(576,4,3,6,8),
	(577,4,3,7,8),
	(578,4,3,7,8),
	(579,4,3,7,8),
	(580,4,3,7,8),
	(581,4,3,7,8),
	(582,4,3,7,8),
	(583,4,3,8,8),
	(584,4,3,8,8),
	(585,4,3,8,8),
	(586,4,3,8,8),
	(587,4,3,8,8),
	(588,4,3,8,8),
	(589,4,3,9,8),
	(590,4,3,9,8),
	(591,4,3,9,8),
	(592,4,3,9,8),
	(593,4,3,9,8),
	(594,4,3,9,8),
	(595,4,3,10,8),
	(596,4,3,10,8),
	(597,4,3,10,8),
	(598,4,3,10,8),
	(599,4,3,10,8),
	(600,4,3,10,8),
	(601,4,2,1,2),
	(602,4,2,1,2),
	(603,4,2,1,2),
	(604,4,2,1,2),
	(605,4,2,1,2),
	(606,4,2,1,2),
	(607,4,2,2,2),
	(608,4,2,2,2),
	(609,4,2,2,2),
	(610,4,2,2,2),
	(611,4,2,2,2),
	(612,4,2,2,2),
	(613,4,2,3,2),
	(614,4,2,3,2),
	(615,4,2,3,2),
	(616,4,2,3,2),
	(617,4,2,3,2),
	(618,4,2,3,2),
	(619,4,2,4,2),
	(620,4,2,4,2),
	(621,4,2,4,2),
	(622,4,2,4,2),
	(623,4,2,4,2),
	(624,4,2,4,2),
	(625,4,2,5,2),
	(626,4,2,5,2),
	(627,4,2,5,2),
	(628,4,2,5,2),
	(629,4,2,5,2),
	(630,4,2,5,2),
	(631,4,2,6,2),
	(632,4,2,6,2),
	(633,4,2,6,2),
	(634,4,2,6,2),
	(635,4,2,6,2),
	(636,4,2,6,2),
	(637,4,2,7,2),
	(638,4,2,7,2),
	(639,4,2,7,2),
	(640,4,2,7,2),
	(641,4,2,7,2),
	(642,4,2,7,2),
	(643,4,2,8,2),
	(644,4,2,8,2),
	(645,4,2,8,2),
	(646,4,2,8,2),
	(647,4,2,8,2),
	(648,4,2,8,2),
	(649,4,2,9,2),
	(650,4,2,9,2),
	(651,4,2,9,2),
	(652,4,2,9,2),
	(653,4,2,9,2),
	(654,4,2,9,2),
	(655,4,2,10,2),
	(656,4,2,10,2),
	(657,4,2,10,2),
	(658,4,2,10,2),
	(659,4,2,10,2),
	(660,4,2,10,2),
	(661,4,1,1,8),
	(662,4,1,1,10),
	(663,4,1,1,8),
	(664,4,1,1,1),
	(665,4,1,1,6),
	(666,4,1,1,8),
	(667,4,1,2,5),
	(668,4,1,2,10),
	(669,4,1,2,7),
	(670,4,1,2,0),
	(671,4,1,2,8),
	(672,4,1,2,1),
	(673,4,1,3,3),
	(674,4,1,3,0),
	(675,4,1,3,7),
	(676,4,1,3,9),
	(677,4,1,3,10),
	(678,4,1,3,8),
	(679,4,1,4,9),
	(680,4,1,4,10),
	(681,4,1,4,3),
	(682,4,1,4,6),
	(683,4,1,4,7),
	(684,4,1,4,7),
	(685,4,1,5,9),
	(686,4,1,5,6),
	(687,4,1,5,10),
	(688,4,1,5,5),
	(689,4,1,5,0),
	(690,4,1,5,1),
	(691,4,1,6,1),
	(692,4,1,6,3),
	(693,4,1,6,0),
	(694,4,1,6,4),
	(695,4,1,6,4),
	(696,4,1,6,10),
	(697,4,1,7,6),
	(698,4,1,7,0),
	(699,4,1,7,8),
	(700,4,1,7,4),
	(701,4,1,7,5),
	(702,4,1,7,7),
	(703,4,1,8,6),
	(704,4,1,8,0),
	(705,4,1,8,9),
	(706,4,1,8,7),
	(707,4,1,8,9),
	(708,4,1,8,2),
	(709,4,1,9,6),
	(710,4,1,9,10),
	(711,4,1,9,4),
	(712,4,1,9,6),
	(713,4,1,9,5),
	(714,4,1,9,10),
	(715,4,1,10,1),
	(716,4,1,10,7),
	(717,4,1,10,9),
	(718,4,1,10,4),
	(719,4,1,10,2),
	(720,4,1,10,2),
	(721,5,3,1,9),
	(722,5,3,1,9),
	(723,5,3,1,9),
	(724,5,3,1,9),
	(725,5,3,1,9),
	(726,5,3,1,9),
	(727,5,3,2,8),
	(728,5,3,2,8),
	(729,5,3,2,8),
	(730,5,3,2,8),
	(731,5,3,2,8),
	(732,5,3,2,8),
	(733,5,3,3,8),
	(734,5,3,3,8),
	(735,5,3,3,8),
	(736,5,3,3,8),
	(737,5,3,3,8),
	(738,5,3,3,8),
	(739,5,3,4,8),
	(740,5,3,4,8),
	(741,5,3,4,8),
	(742,5,3,4,8),
	(743,5,3,4,8),
	(744,5,3,4,8),
	(745,5,3,5,8),
	(746,5,3,5,8),
	(747,5,3,5,8),
	(748,5,3,5,8),
	(749,5,3,5,8),
	(750,5,3,5,8),
	(751,5,3,6,9),
	(752,5,3,6,9),
	(753,5,3,6,8),
	(754,5,3,6,8),
	(755,5,3,6,9),
	(756,5,3,6,9),
	(757,5,3,7,8),
	(758,5,3,7,7),
	(759,5,3,7,8),
	(760,5,3,7,8),
	(761,5,3,7,8),
	(762,5,3,7,8),
	(763,5,3,8,8),
	(764,5,3,8,8),
	(765,5,3,8,8),
	(766,5,3,8,7),
	(767,5,3,8,7),
	(768,5,3,8,7),
	(769,5,3,9,8),
	(770,5,3,9,8),
	(771,5,3,9,8),
	(772,5,3,9,8),
	(773,5,3,9,8),
	(774,5,3,9,8),
	(775,5,3,10,8),
	(776,5,3,10,8),
	(777,5,3,10,7),
	(778,5,3,10,8),
	(779,5,3,10,8),
	(780,5,3,10,8),
	(781,5,2,1,2),
	(782,5,2,1,2),
	(783,5,2,1,2),
	(784,5,2,1,2),
	(785,5,2,1,2),
	(786,5,2,1,2),
	(787,5,2,2,2),
	(788,5,2,2,2),
	(789,5,2,2,2),
	(790,5,2,2,2),
	(791,5,2,2,2),
	(792,5,2,2,2),
	(793,5,2,3,2),
	(794,5,2,3,2),
	(795,5,2,3,2),
	(796,5,2,3,2),
	(797,5,2,3,2),
	(798,5,2,3,2),
	(799,5,2,4,2),
	(800,5,2,4,2),
	(801,5,2,4,10),
	(802,5,2,4,2),
	(803,5,2,4,2),
	(804,5,2,4,2),
	(805,5,2,5,2),
	(806,5,2,5,2),
	(807,5,2,5,2),
	(808,5,2,5,2),
	(809,5,2,5,2),
	(810,5,2,5,2),
	(811,5,2,6,2),
	(812,5,2,6,2),
	(813,5,2,6,2),
	(814,5,2,6,2),
	(815,5,2,6,2),
	(816,5,2,6,2),
	(817,5,2,7,2),
	(818,5,2,7,2),
	(819,5,2,7,2),
	(820,5,2,7,2),
	(821,5,2,7,2),
	(822,5,2,7,2),
	(823,5,2,8,2),
	(824,5,2,8,2),
	(825,5,2,8,2),
	(826,5,2,8,2),
	(827,5,2,8,2),
	(828,5,2,8,2),
	(829,5,2,9,2),
	(830,5,2,9,2),
	(831,5,2,9,2),
	(832,5,2,9,2),
	(833,5,2,9,2),
	(834,5,2,9,2),
	(835,5,2,10,2),
	(836,5,2,10,2),
	(837,5,2,10,2),
	(838,5,2,10,2),
	(839,5,2,10,2),
	(840,5,2,10,2),
	(841,5,1,1,5),
	(842,5,1,1,5),
	(843,5,1,1,5),
	(844,5,1,1,5),
	(845,5,1,1,5),
	(846,5,1,1,5),
	(847,5,1,2,5),
	(848,5,1,2,8),
	(849,5,1,2,5),
	(850,5,1,2,5),
	(851,5,1,2,5),
	(852,5,1,2,5),
	(853,5,1,3,5),
	(854,5,1,3,5),
	(855,5,1,3,5),
	(856,5,1,3,5),
	(857,5,1,3,5),
	(858,5,1,3,5),
	(859,5,1,4,5),
	(860,5,1,4,5),
	(861,5,1,4,10),
	(862,5,1,4,5),
	(863,5,1,4,10),
	(864,5,1,4,5),
	(865,5,1,5,5),
	(866,5,1,5,5),
	(867,5,1,5,5),
	(868,5,1,5,5),
	(869,5,1,5,5),
	(870,5,1,5,5),
	(871,5,1,6,5),
	(872,5,1,6,5),
	(873,5,1,6,5),
	(874,5,1,6,5),
	(875,5,1,6,5),
	(876,5,1,6,5),
	(877,5,1,7,8),
	(878,5,1,7,5),
	(879,5,1,7,5),
	(880,5,1,7,5),
	(881,5,1,7,5),
	(882,5,1,7,5),
	(883,5,1,8,5),
	(884,5,1,8,5),
	(885,5,1,8,5),
	(886,5,1,8,5),
	(887,5,1,8,5),
	(888,5,1,8,5),
	(889,5,1,9,5),
	(890,5,1,9,5),
	(891,5,1,9,5),
	(892,5,1,9,5),
	(893,5,1,9,5),
	(894,5,1,9,5),
	(895,5,1,10,5),
	(896,5,1,10,5),
	(897,5,1,10,5),
	(898,5,1,10,5),
	(899,5,1,10,5),
	(900,5,1,10,5),
	(901,6,3,1,8),
	(902,6,3,1,8),
	(903,6,3,1,7),
	(904,6,3,1,7),
	(905,6,3,1,8),
	(906,6,3,1,7),
	(907,6,3,2,8),
	(908,6,3,2,7),
	(909,6,3,2,8),
	(910,6,3,2,8),
	(911,6,3,2,8),
	(912,6,3,2,7),
	(913,6,3,3,8),
	(914,6,3,3,8),
	(915,6,3,3,8),
	(916,6,3,3,8),
	(917,6,3,3,7),
	(918,6,3,3,8),
	(919,6,3,4,8),
	(920,6,3,4,8),
	(921,6,3,4,8),
	(922,6,3,4,8),
	(923,6,3,4,8),
	(924,6,3,4,8),
	(925,6,3,5,7),
	(926,6,3,5,8),
	(927,6,3,5,8),
	(928,6,3,5,8),
	(929,6,3,5,7),
	(930,6,3,5,8),
	(931,6,3,6,8),
	(932,6,3,6,8),
	(933,6,3,6,8),
	(934,6,3,6,8),
	(935,6,3,6,8),
	(936,6,3,6,8),
	(937,6,3,7,8),
	(938,6,3,7,8),
	(939,6,3,7,8),
	(940,6,3,7,8),
	(941,6,3,7,8),
	(942,6,3,7,8),
	(943,6,3,8,8),
	(944,6,3,8,8),
	(945,6,3,8,7),
	(946,6,3,8,8),
	(947,6,3,8,8),
	(948,6,3,8,8),
	(949,6,3,9,8),
	(950,6,3,9,8),
	(951,6,3,9,8),
	(952,6,3,9,8),
	(953,6,3,9,8),
	(954,6,3,9,8),
	(955,6,3,10,8),
	(956,6,3,10,7),
	(957,6,3,10,7),
	(958,6,3,10,7),
	(959,6,3,10,8),
	(960,6,3,10,8),
	(961,6,2,1,2),
	(962,6,2,1,2),
	(963,6,2,1,2),
	(964,6,2,1,2),
	(965,6,2,1,2),
	(966,6,2,1,2),
	(967,6,2,2,2),
	(968,6,2,2,2),
	(969,6,2,2,2),
	(970,6,2,2,2),
	(971,6,2,2,2),
	(972,6,2,2,2),
	(973,6,2,3,2),
	(974,6,2,3,2),
	(975,6,2,3,2),
	(976,6,2,3,2),
	(977,6,2,3,2),
	(978,6,2,3,2),
	(979,6,2,4,2),
	(980,6,2,4,2),
	(981,6,2,4,2),
	(982,6,2,4,2),
	(983,6,2,4,2),
	(984,6,2,4,2),
	(985,6,2,5,2),
	(986,6,2,5,2),
	(987,6,2,5,2),
	(988,6,2,5,2),
	(989,6,2,5,2),
	(990,6,2,5,2),
	(991,6,2,6,2),
	(992,6,2,6,2),
	(993,6,2,6,2),
	(994,6,2,6,2),
	(995,6,2,6,2),
	(996,6,2,6,2),
	(997,6,2,7,2),
	(998,6,2,7,2),
	(999,6,2,7,2),
	(1000,6,2,7,2),
	(1001,6,2,7,2),
	(1002,6,2,7,2),
	(1003,6,2,8,2),
	(1004,6,2,8,2),
	(1005,6,2,8,2),
	(1006,6,2,8,2),
	(1007,6,2,8,2),
	(1008,6,2,8,2),
	(1009,6,2,9,2),
	(1010,6,2,9,2),
	(1011,6,2,9,2),
	(1012,6,2,9,2),
	(1013,6,2,9,2),
	(1014,6,2,9,2),
	(1015,6,2,10,2),
	(1016,6,2,10,2),
	(1017,6,2,10,2),
	(1018,6,2,10,2),
	(1019,6,2,10,2),
	(1020,6,2,10,2),
	(1021,6,1,1,3),
	(1022,6,1,1,1),
	(1023,6,1,1,8),
	(1024,6,1,1,9),
	(1025,6,1,1,10),
	(1026,6,1,1,7),
	(1027,6,1,2,5),
	(1028,6,1,2,9),
	(1029,6,1,2,1),
	(1030,6,1,2,7),
	(1031,6,1,2,3),
	(1032,6,1,2,4),
	(1033,6,1,3,0),
	(1034,6,1,3,7),
	(1035,6,1,3,5),
	(1036,6,1,3,0),
	(1037,6,1,3,3),
	(1038,6,1,3,10),
	(1039,6,1,4,5),
	(1040,6,1,4,2),
	(1041,6,1,4,7),
	(1042,6,1,4,6),
	(1043,6,1,4,2),
	(1044,6,1,4,4),
	(1045,6,1,5,5),
	(1046,6,1,5,5),
	(1047,6,1,5,7),
	(1048,6,1,5,8),
	(1049,6,1,5,4),
	(1050,6,1,5,8),
	(1051,6,1,6,4),
	(1052,6,1,6,6),
	(1053,6,1,6,8),
	(1054,6,1,6,8),
	(1055,6,1,6,7),
	(1056,6,1,6,2),
	(1057,6,1,7,2),
	(1058,6,1,7,10),
	(1059,6,1,7,6),
	(1060,6,1,7,4),
	(1061,6,1,7,2),
	(1062,6,1,7,5),
	(1063,6,1,8,7),
	(1064,6,1,8,3),
	(1065,6,1,8,6),
	(1066,6,1,8,2),
	(1067,6,1,8,3),
	(1068,6,1,8,3),
	(1069,6,1,9,5),
	(1070,6,1,9,2),
	(1071,6,1,9,6),
	(1072,6,1,9,2),
	(1073,6,1,9,0),
	(1074,6,1,9,1),
	(1075,6,1,10,6),
	(1076,6,1,10,5),
	(1077,6,1,10,6),
	(1078,6,1,10,5),
	(1079,6,1,10,5),
	(1080,6,1,10,2);

/*!40000 ALTER TABLE `round_judge_score` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
