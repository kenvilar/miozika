<?php

ob_start();
session_start();

$DB_LOCAL = '';
$DB_ROOT = '';
$DB_PASS = '';
$DB_NAME = '';
$timezone = date_default_timezone_set('Asia/Hong_Kong');
$con = mysqli_connect($DB_LOCAL, $DB_ROOT, $DB_PASS, $DB_NAME);

if (mysqli_connect_errno()) {
    echo 'Failed to connect: ' . mysqli_connect_errno();
}

/*
 * DB TABLES
 * */
/*
CREATE TABLE `albums` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `artist` int(11) DEFAULT NULL,
  `genre` int(11) DEFAULT NULL,
  `artworkPath` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `artists` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `genres` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `playlists` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `playlistSongs` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `songId` int(11) DEFAULT NULL,
  `playlistId` int(11) DEFAULT NULL,
  `playlistOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
*/
