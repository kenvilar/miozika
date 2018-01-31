# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.19)
# Database: miozika
# Generation Time: 2018-01-31 15:30:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table albums
# ------------------------------------------------------------

DROP TABLE IF EXISTS `albums`;

CREATE TABLE `albums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `artist` int(11) DEFAULT NULL,
  `genre` int(11) DEFAULT NULL,
  `artworkPath` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`)
VALUES
	(1,'Bacon and Eggs',2,4,'assets/images/artwork/clearday.jpg'),
	(2,'Pizza head',5,10,'assets/images/artwork/energy.jpg'),
	(3,'Pizza Head',5,10,'assets/images/artwork/energy.jpg'),
	(4,'Summer Hits',3,1,'assets/images/artwork/goinghigher.jpg'),
	(5,'The Movie Soundtrack',2,9,'assets/images/artwork/funkyelement.jpg'),
	(6,'Best of the Worst',1,3,'assets/images/artwork/popdance.jpg'),
	(7,'Hello World',3,6,'assets/images/artwork/ukulele.jpg'),
	(8,'Best Beats',4,7,'assets/images/artwork/sweet.jpg');

/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table artists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `artists`;

CREATE TABLE `artists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `artists` WRITE;
/*!40000 ALTER TABLE `artists` DISABLE KEYS */;

INSERT INTO `artists` (`id`, `name`)
VALUES
	(1,'Captain Planet'),
	(2,'CoCo'),
	(3,'Naruto'),
	(4,'Goku'),
	(5,'Ken Vilar');

/*!40000 ALTER TABLE `artists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table genres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genres`;

CREATE TABLE `genres` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;

INSERT INTO `genres` (`id`, `name`)
VALUES
	(1,'Rock'),
	(2,'Pop'),
	(3,'Hip-hop'),
	(4,'Rap'),
	(5,'R&B'),
	(6,'Classical'),
	(7,'Techno'),
	(8,'Jazz'),
	(9,'Folk'),
	(10,'Country');

/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table playlists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `playlists`;

CREATE TABLE `playlists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table playlistSongs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `playlistSongs`;

CREATE TABLE `playlistSongs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `songId` int(11) DEFAULT NULL,
  `playlistId` int(11) DEFAULT NULL,
  `playlistOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table songs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `songs`;

CREATE TABLE `songs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT '',
  `artist` int(11) DEFAULT NULL,
  `album` int(11) DEFAULT NULL,
  `genre` int(11) DEFAULT NULL,
  `duration` varchar(8) DEFAULT NULL,
  `path` varchar(500) DEFAULT NULL,
  `albumOrder` int(11) DEFAULT NULL,
  `plays` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `songs` WRITE;
/*!40000 ALTER TABLE `songs` DISABLE KEYS */;

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`)
VALUES
	(1,'Acoustic Breeze',1,1,8,'2:37','assets/music/bensound-acousticbreeze.mp3',1,30),
	(2,'A new beginning',1,5,1,'2:35','assets/music/bensound-anewbeginning.mp3',2,25),
	(3,'Better Days',1,5,2,'2:33','assets/music/bensound-betterdays.mp3',3,8),
	(4,'Buddy',1,5,3,'2:02','assets/music/bensound-buddy.mp3',4,14),
	(5,'Clear Day',1,5,4,'1:29','assets/music/bensound-clearday.mp3',5,9),
	(6,'Going Higher',2,1,1,'4:04','assets/music/bensound-goinghigher.mp3',1,19),
	(7,'Funny Song',2,4,2,'3:07','assets/music/bensound-funnysong.mp3',2,11),
	(8,'Funky Element',2,1,3,'3:08','assets/music/bensound-funkyelement.mp3',2,16),
	(9,'Extreme Action',2,1,4,'8:03','assets/music/bensound-extremeaction.mp3',3,13),
	(10,'Epic',2,4,5,'2:58','assets/music/bensound-epic.mp3',3,7),
	(11,'Energy',2,1,6,'2:59','assets/music/bensound-energy.mp3',4,47),
	(12,'Dubstep',2,1,7,'2:03','assets/music/bensound-dubstep.mp3',5,10),
	(13,'Happiness',3,6,8,'4:21','assets/music/bensound-happiness.mp3',5,13),
	(14,'Happy Rock',3,6,9,'1:45','assets/music/bensound-happyrock.mp3',4,9),
	(15,'Jazzy Frenchy',3,6,10,'1:44','assets/music/bensound-jazzyfrenchy.mp3',3,10),
	(16,'Little Idea',3,6,1,'2:49','assets/music/bensound-littleidea.mp3',2,18),
	(17,'Memories',3,6,2,'3:50','assets/music/bensound-memories.mp3',1,15),
	(18,'Moose',4,7,1,'2:43','assets/music/bensound-moose.mp3',5,2),
	(19,'November',4,7,2,'3:32','assets/music/bensound-november.mp3',4,16),
	(20,'Of Elias Dream',4,7,3,'4:58','assets/music/bensound-ofeliasdream.mp3',3,8),
	(21,'Pop Dance',4,7,2,'2:42','assets/music/bensound-popdance.mp3',2,17),
	(22,'Retro Soul',4,7,5,'3:36','assets/music/bensound-retrosoul.mp3',1,7),
	(23,'Sad Day',5,2,1,'2:28','assets/music/bensound-sadday.mp3',1,20),
	(24,'Sci-fi',5,2,2,'4:44','assets/music/bensound-scifi.mp3',2,12),
	(25,'Slow Motion',5,2,3,'3:26','assets/music/bensound-slowmotion.mp3',3,10),
	(26,'Sunny',5,2,4,'2:20','assets/music/bensound-sunny.mp3',4,11),
	(27,'Sweet',5,2,5,'5:07','assets/music/bensound-sweet.mp3',5,15),
	(28,'Tenderness ',3,3,7,'2:03','assets/music/bensound-tenderness.mp3',4,15),
	(29,'The Lounge',3,3,8,'4:16','assets/music/bensound-thelounge.mp3 ',3,7),
	(30,'Ukulele',3,3,9,'2:26','assets/music/bensound-ukulele.mp3 ',2,5),
	(31,'Tomorrow',3,3,1,'4:54','assets/music/bensound-tomorrow.mp3 ',1,9);

/*!40000 ALTER TABLE `songs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(25) NOT NULL DEFAULT '',
  `firstName` varchar(50) NOT NULL DEFAULT '',
  `lastName` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `userName`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`)
VALUES
	(11,'kenvilar','Ken','Vilar','Kenvilar@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','2018-01-21 00:00:00','assets/images/profile-pics/prof-pic.png');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
