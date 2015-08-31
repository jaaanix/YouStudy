-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Host: rdbms
-- Erstellungszeit: 31. Aug 2015 um 22:03
-- Server Version: 5.5.44-log
-- PHP-Version: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `DB2152898`
--
CREATE DATABASE IF NOT EXISTS `wpfmw` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wpfmw`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
`id` int(11) NOT NULL,
  `filename` varchar(150) NOT NULL,
  `poster` mediumblob NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zuo_movie_rating`
--

CREATE TABLE IF NOT EXISTS `zuo_movie_rating` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `movie_rating` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `movies`
--
ALTER TABLE `movies`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `zuo_movie_rating`
--
ALTER TABLE `zuo_movie_rating`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `movies`
--
ALTER TABLE `movies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `zuo_movie_rating`
--
ALTER TABLE `zuo_movie_rating`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Hinzufügen von Testdaten
--

--movies
insert into movies(filename, poster) values("avengers2_poster.jpg", LOAD_FILE('/../images/avengers2_poster.jpg'));
insert into movies(filename, poster) values("Fast&Furious7_poster.jpg", LOAD_FILE('/../images/Fast&Furious7_poster.jpg'));
insert into movies(filename, poster) values("Interstellar_poster.jpg", LOAD_FILE('/../images/Interstellar_poster.jpgg'));
insert into movies(filename, poster) values("TheWolfofWallStreet_poster.jpg", LOAD_FILE('/../images/TheWolfofWallStreet_poster.jpg'));

--users
insert into users(username, password) values("andre", MD5("andre"));

--zuo_movie_rating
insert into zuo_movie_rating(user_id, movie_id, movie_rating) values((select id from users where username like 'andre'), (select id from movies where filename like 'avengers2_poster.jpg'), 8);