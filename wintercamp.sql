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
  `bilderlink` text NOT NULL,
  `aktivitaet` tinyint(1) NOT NULL,
  `gId` int(11) NOT NULL,
  `campId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `galeriebild`
--

INSERT INTO `galeriebild` (`gbId`, `bilderlink`, `aktivitaet`, `campId`) VALUES
(1, '/sc2016_1.jpg', 12, 160),
(2, '/sc2016_2.jpg', 14, 160),
(3, '/sc2016_3.jpg', 16, 160),
(4, '/sc2016_4.jpg', 17, 160),
(5, '/sc2016_5.jpg', 18, 160),
(6, '/sc2016_6.jpg', 20, 160),
(7, '/sc2016_7.png', 22, 160),
(8, '/sc2016_8.jpg', 6, 160),
(9, '/sc2017_1.jpg', 4, 170),
(10, '/sc2017_2.jpg', 3, 170),
(11, '/sc2017_3.png', 2, 170),
(12, '/sc2017_4.png', 1, 170),
(13, '/sc2017_5.jpg', 10, 170),
(14, '/sc2017_6.jpg', 9, 170),
(15, '/sc2017_7.jpg', 13, 170),
(16, '/sc2017_8.jpg', 7, 170),
(17, '/sc2017_9.jpg', 8, 170),
(18, '/sc2017_10.jpg', 23, 170),
(19, '/wc2018_1.jpg', 15, 181),
(20, '/sc2018_1.jpg', 19, 180),
(21, '/sc2018_2.jpg', 21, 180),
(22, '/sc2018_3.jpg', 27, 180),
(23, '/sc2018_4.jpg', 28, 80),
(24, '/sc2018_5.jpg', 26, 180),
(25, '/wc2019_1.jpg', 5, 191),
(26, '/wc2019_2.jpg', 11, 191),
(27, '/wc2019_3.jpg', 24, 191),
(28, '/wc2019_4.jpg', 25, 191);


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
(1, 1, 'hallo', 1559295926);

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
  `aktivierung` tinyint(1) NOT NULL,
  `passwortcode` VARCHAR(255) NULL,
  `passwortcode_zeit` int(12) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nutzer`
--

INSERT INTO `nutzer` (`nID`, `nachname`, `vorname`, `benutzername`, `eMail`, `passwort`, `rId`, `teilnahme`, `registrierungsdatum`, `aenderungsdatum`, `aktivierung`, `passwortcode`, `passwortcode_zeit`) VALUES
(1, 'Mustermann', 'Maxi', 'tollsterAdmin', 'max.mustermann@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 1, 'WinterCamp 2019', '2019-05-31 13:18:46', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 'Wendorff', 'Marvin', 'BalkonChiller', 'm.wendorff09@gmail.com', '6f41a341ba6a2db33aa65b9289cb6e38fd17a4b240c95a0978c32baccf5a8dedb97e3f6f996412392485724c6ed874fe32fa67c862c1661128d6ea20978bfb4b', 2, 'WinterCamp 2019', '2019-05-31 13:26:38', '0000-00-00 00:00:00', 0, NULL, NULL),
(3, 'Weickert', 'Max', 'Moorex', 'max.weickert03@gmail.com', '26838b06502abee51b59a7d17647b55f489f955066382e959d097bb7f737331f72ce6924c304f4a6c12db9c1b4ad8a3fd425fe968a767b2f6b9e795e34778202', 2, 'WinterCamp 2019', '2019-07-28 17:14:50', '0000-00-00 00:00:00', 0, NULL, NULL);
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
