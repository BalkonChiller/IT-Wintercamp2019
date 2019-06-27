-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Mai 2019 um 15:37
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wintercamp`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `beitrag`
--

CREATE TABLE `beitrag` (
  `bId` int(11) NOT NULL,
  `nId` int(11) NOT NULL,
  `beitragstitel` varchar(255) NOT NULL,
  `zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kategorie` varchar(255) NOT NULL,
  `beitraginhalt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `beitrag`
--

INSERT INTO `beitrag` (`bId`, `nId`, `beitragstitel`, `zeit`, `kategorie`, `beitraginhalt`) VALUES
(1, 1, 'tEST', '2019-05-31 13:19:40', 'Test', 'Hello');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertung`
--

CREATE TABLE `bewertung` (
  `id` int(11) NOT NULL,
  `nId` int(11) NOT NULL,
  `bId` int(11) NOT NULL,
  `zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `chatreferenz`
--

CREATE TABLE `chatreferenz` (
  `crID` int(11) NOT NULL,
  `nutzer1` int(11) NOT NULL,
  `nutzer2` int(11) NOT NULL,
  `erstellungsdatum` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `aenderungsdatum` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000' ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ch_nid1_nid2`
--

CREATE TABLE `ch_nid1_nid2` (
  `chID` int(11) NOT NULL,
  `crID` int(11) NOT NULL,
  `cnutzer` int(11) NOT NULL,
  `nachricht` text NOT NULL,
  `zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `galerie`
--

CREATE TABLE `galerie` (
  `gId` int(11) NOT NULL,
  `galeriebezeichnung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `galerie`
--

INSERT INTO `galerie` (`gId`, `galeriebezeichnung`) VALUES
(160, 'Sommercamp 2016'),
(170, 'Sommercamp 2017'),
(180, 'Sommercamp 2018'),
(181, 'Wintercamp 2018'),
(191, 'Wintercamp 2019');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `galeriebild`
--

CREATE TABLE `galeriebild` (
  `gbId` int(11) NOT NULL,
  `nId` int(11) NOT NULL,
  `bilderlink` text NOT NULL,
  `zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aktivitaet` tinyint(1) NOT NULL,
  `gId` int(11) NOT NULL,
  `campId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `galeriebild`
--

INSERT INTO `galeriebild` (`gbId`, `nId`, `bilderlink`, `zeit`, `aktivitaet`, `gId`, `campId`) VALUES
(535, 42421, '/homepagebilder/bilder_Galerie/sc2017_3.png', '2019-03-29 16:01:22', 2, 2425, 170),
(2845, 128745, '/homepagebilder/bilder_Galerie/wc2019_4.jpg', '2019-05-10 11:34:34', 25, 964, 191),
(4533, 7648643, '/homepagebilder/bilder_Galerie/sc2017_9.jpg', '2019-03-29 15:16:02', 8, 6463, 170),
(7543, 125467, '/homepagebilder/bilder_Galerie/sc2016_2.jpg', '2019-04-05 12:44:05', 14, 86543, 160),
(8737, 3264, '/homepagebilder/bilder_Galerie/sc2019_4.jpg', '2019-05-10 11:36:16', 28, 3265, 180),
(8753, 67829, '/homepagebilder/bilder_Galerie/wc2019_5.jpg', '2019-05-10 11:34:34', 26, 32521, 94847),
(9437, 34745, '/homepagebilder/bilder_Galerie/sc2018_5.jpg', '2019-05-10 11:37:13', 29, 853452, 170),
(21946, 124215, '/homepagebilder/bilder_Galerie/sc2016.jpg', '2019-04-05 12:30:34', 12, 241297, 160),
(23536, 9872935, '/homepagebilder/bilder_Galerie/sc2017_7.jpg', '2019-04-05 12:39:29', 13, 62362, 170),
(35235, 6453, '/homepagebilder/bilder_Galerie/sc2017_5.jpg', '2019-03-29 15:17:34', 10, 153254, 170),
(47653, 7235, '/homepagebilder/bilder_Galerie/sc2016_5.jpg', '2019-04-05 12:48:03', 18, 6421, 160),
(63462, 25326, '/homepagebilder/bilder_Galerie/wc2019_2.jpg', '2019-04-05 12:42:58', 11, 73423, 191),
(63563, 98435, '/homepagebilder/bilder_Galerie/sc2017_10.jpg', '2019-04-05 12:58:28', 23, 83264, 170),
(64765, 37475, '/homepagebilder/bilder_Galerie/sc2016_8.jpg', '2019-03-29 15:14:40', 6, 32523, 160),
(67324, 982347, '/homepagebilder/bilder_Galerie/sc2018_2.jpg', '2019-04-05 12:56:42', 21, 8346, 180),
(83562, 7352, '/homepagebilder/bilder_Galerie/sc2018.jpg', '2019-04-05 12:54:29', 19, 23532, 180),
(97347, 62534, '/homepagebilder/bilder_Galerie/sc2016_4.jpg', '2019-04-05 12:48:03', 17, 4387, 160),
(98435, 87823, '/homepagebilder/bilder_Galerie/sc2016_6.jpg', '2019-04-05 12:54:29', 20, 3746, 160),
(98765, 9876, '/homepagebilder/bilder_Galerie/wc2019.jpg', '2019-03-29 15:13:17', 5, 987, 191),
(321421, 214214, '/homepagebilder/bilder_Galerie/sc2017_4.png', '2019-03-29 16:00:29', 1, 231, 170),
(324623, 732, '/homepagebilder/bilder_Galerie/sc2018_3.jpg', '2019-05-10 11:36:16', 27, 353, 180),
(342313, 13131, '/homepagebilder/bilder_Galerie/sc2017_6.jpg', '2019-03-29 15:16:40', 9, 2424, 170),
(421412, 1111, '/homepagebilder/bilder_Galerie/sc2017.jpg', '2019-03-29 16:03:27', 4, 14532, 170),
(454347, 96985, '/homepagebilder/bilder_Galerie/sc2017_2.jpg', '2019-03-29 16:02:15', 3, 242, 170),
(893457, 3247, '/homepagebilder/bilder_Galerie/sc2016_7.png', '2019-04-05 12:56:42', 22, 29847, 160),
(965454, 2357, '/homepagebilder/bilder_Galerie/wc2019_3.jpg', '2019-05-10 11:32:02', 24, 7346, 191),
(986986, 76735, '/homepagebilder/bilder_Galerie/sc2016_3', '2019-04-05 12:45:58', 16, 34358, 160),
(8963846, 7345, '/homepagebilder/bilder_Galerie/wc2018.jpg', '2019-04-05 12:45:58', 15, 976, 181),
(64576476, 235263, '/homepagebilder/bilder_Galerie/sc2017_8.jpg', '2019-03-29 15:15:14', 7, 77776, 170);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `globalchat`
--

CREATE TABLE `globalchat` (
  `gcId` int(11) NOT NULL,
  `nId` int(11) NOT NULL,
  `kommentar` text NOT NULL,
  `zeit` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `globalchat`
--

INSERT INTO `globalchat` (`gcId`, `nId`, `kommentar`, `zeit`) VALUES
(1, 1, 'hallo', 1559295926),
(2, 1, 'test', 1559295931),
(3, 1, 'es klappt!', 1559295939),
(4, 1, 'es klappt!', 1559295983),
(5, 1, 'ich', 1559295988),
(6, 1, 'ich', 1559296014),
(7, 1, 'ich', 1559296026),
(8, 1, 'ich', 1559296036),
(9, 1, 'ich', 1559296113),
(10, 1, 'ich', 1559296121),
(11, 1, 'wow', 1559296886),
(12, 1, 'wow', 1559296892),
(13, 1, 'Hello World', 1559308744);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kommentar`
--

CREATE TABLE `kommentar` (
  `kId` int(11) NOT NULL,
  `bId` int(11) NOT NULL,
  `nId` int(11) NOT NULL,
  `zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kommentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer`
--

CREATE TABLE `nutzer` (
  `nID` int(11) NOT NULL,
  `nachname` varchar(255) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `benutzername` varchar(255) NOT NULL,
  `eMail` varchar(255) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `rId` int(11) NOT NULL,
  `teilnahme` varchar(255) NOT NULL,
  `registrierungsdatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aenderungsdatum` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `aktivierung` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nutzer`
--

INSERT INTO `nutzer` (`nID`, `nachname`, `vorname`, `benutzername`, `eMail`, `passwort`, `rId`, `teilnahme`, `registrierungsdatum`, `aenderungsdatum`, `aktivierung`) VALUES
(1, 'Mustermann', 'Maxi', 'tollsterAdmin', 'max.mustermann@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 1, '', '2019-05-31 13:18:46', '0000-00-00 00:00:00', 0),
(2, 'Wendorff', 'Marvin', 'BalkonChiller', 'm.wendorff09@gmail.com', '6f41a341ba6a2db33aa65b9289cb6e38fd17a4b240c95a0978c32baccf5a8dedb97e3f6f996412392485724c6ed874fe32fa67c862c1661128d6ea20978bfb4b', 2, 'WinterCamp 2006', '2019-05-31 13:26:38', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rolle`
--

CREATE TABLE `rolle` (
  `rId` int(11) NOT NULL,
  `rollenname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `rolle`
--

INSERT INTO `rolle` (`rId`, `rollenname`) VALUES
(1, 'admin'),
(2, 'teilnehmer'),
(3, 'interessent');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  ADD PRIMARY KEY (`bId`);

--
-- Indizes für die Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `chatreferenz`
--
ALTER TABLE `chatreferenz`
  ADD PRIMARY KEY (`crID`);

--
-- Indizes für die Tabelle `ch_nid1_nid2`
--
ALTER TABLE `ch_nid1_nid2`
  ADD PRIMARY KEY (`chID`),
  ADD UNIQUE KEY `crID` (`crID`);

--
-- Indizes für die Tabelle `globalchat`
--
ALTER TABLE `globalchat`
  ADD PRIMARY KEY (`gcId`);

--
-- Indizes für die Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  ADD PRIMARY KEY (`kId`);

--
-- Indizes für die Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD PRIMARY KEY (`nID`),
  ADD UNIQUE KEY `benutzername` (`benutzername`);

--
-- Indizes für die Tabelle `rolle`
--
ALTER TABLE `rolle`
  ADD PRIMARY KEY (`rId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `beitrag`
--
ALTER TABLE `beitrag`
  MODIFY `bId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `chatreferenz`
--
ALTER TABLE `chatreferenz`
  MODIFY `crID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `ch_nid1_nid2`
--
ALTER TABLE `ch_nid1_nid2`
  MODIFY `chID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `globalchat`
--
ALTER TABLE `globalchat`
  MODIFY `gcId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  MODIFY `kId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  MODIFY `nID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
