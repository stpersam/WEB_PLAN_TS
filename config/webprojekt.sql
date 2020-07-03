-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Jul 2020 um 10:50
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webprojekt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures`
--

CREATE TABLE `pictures` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `capturedate` date DEFAULT NULL,
  `changedate` date DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `pictures`
--

INSERT INTO `pictures` (`ID`, `Name`, `latitude`, `longitude`, `capturedate`, `changedate`, `state`, `href`, `tags`, `owner`) VALUES
(1, 'Coffee and Clipboard', '49.20', '16.36', '2016-12-17', '2019-12-17', 'freigegeben', 'delicious-hot-coffee-and-clipboard.jpg', 'test,klaus', 'Samuel'),
(2, 'Set of Spoons', '48.20', '16.86', '2018-12-14', '2011-12-17', 'freigegeben', 'set-of-shiny-black-spoons_5efd.jpg', 'test,klaus', 'Samuel'),
(3, 'Scissors and Clips', '48.50', '16.50', '2013-12-17', '2015-12-17', 'freigegeben', 'composition-of-scissors-and-clip.jpg', 'scissors,clip,beige', 'Franz'),
(4, 'Coffee and Diary', '49.20', '16.01', '2020-12-17', '2015-12-17', 'freigegeben', 'cup-of-coffee-and-colorful-diary.jpg', 'coffee,cup,diary,beige', 'Franz');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Anrede` varchar(255) DEFAULT NULL,
  `Vorname` varchar(255) DEFAULT NULL,
  `Nachname` varchar(255) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `PLZ` int(11) DEFAULT NULL,
  `Ort` varchar(255) DEFAULT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Rolle` varchar(10) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `State` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `Anrede`, `Vorname`, `Nachname`, `Adresse`, `PLZ`, `Ort`, `Username`, `Password`, `Email`, `Rolle`, `Status`, `State`) VALUES
(1, 'Mr', 'Admin', 'Admin', 'xx', 1234, 'yy', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin@admin.com', 'admin', 'aktive', 'offline'),
(2, 'Mr', 'User', 'User', 'xx', 1234, 'yy', 'user1', '0a041b9462caa4a31bac3567e0b6e6fd9100787db2ab433d96f6d178cabfce90', 'user1@user1.com', 'user', 'aktive', 'offline'),
(3, 'Mrs', 'User', 'User', 'xx', 1234, 'yy', 'user2', '6025d18fe48abd45168528f18a82e265dd98d421a7084aa09f61b341703901a3', 'user2@user2.com', 'user', 'aktive', 'offline'),
(4, 'Mr', 'Franz', 'S', 'xx', 1234, 'yy', 'Franz', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user1@user1.com', 'user', 'aktive', 'offline'),
(5, 'Mrs', 'Samuel', 'P', 'xx', 1234, 'yy', 'Samuel', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user2@user2.com', 'user', 'aktive', 'offline');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indizes für die Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`ID`,`Name`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `href` (`href`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`,`Username`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `pictures`
--
ALTER TABLE `pictures`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
