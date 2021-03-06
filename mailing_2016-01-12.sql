# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.42)
# Database: mailing
# Generation Time: 2016-01-12 16:18:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;

INSERT INTO `admins` (`id`, `login`, `password`, `mail`)
VALUES
	(1,'admin','pass','christellebeernaert11@gmail.com');

/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) DEFAULT NULL,
  `timing` datetime NOT NULL,
  `validate` binary(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `mail`, `timing`, `validate`)
VALUES
	(5,'christellebeernaert11@gmail.com','2016-01-12 14:07:19',X'30'),
	(6,'christellebeernaert11@gmail.com','2016-01-12 14:27:24',X'30'),
	(7,'christellebeernaert11@gmail.com','2016-01-12 14:43:15',X'30'),
	(8,'christellebeernaert11@gmail.com','2016-01-12 15:00:04',X'30'),
	(9,'christellebeernaert11@gmail.com','2016-01-12 15:11:21',X'30'),
	(10,'christellebeernaert11@gmail.com','2016-01-12 15:12:24',X'30'),
	(11,'christellebeernaert11@gmail.com','2016-01-12 15:12:27',X'30'),
	(12,'christellebeernaert11@gmail.com','2016-01-12 15:19:56',X'30'),
	(13,'christellebeernaert11@gmail.com','2016-01-12 15:25:46',X'30'),
	(14,'christellebeernaert11@gmail.com','2016-01-12 15:36:49',X'30'),
	(15,'christellebeernaert11@gmail.com','2016-01-12 15:44:13',X'30'),
	(16,'christellebeernaert11@gmail.com','2016-01-12 15:49:34',X'30');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
