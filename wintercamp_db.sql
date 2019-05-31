-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Mai 2019 um 13:13
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
  `gId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(12, 1, 'wow', 1559296892);

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
(1, 'Mustermann', 'Max', 'tollerAdmin', 'max.mustermann@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 1, '', '2019-02-28 09:08:04', '0000-00-00 00:00:00', 0);

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
-- Indizes für die Tabelle `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`gId`);

--
-- Indizes für die Tabelle `galeriebild`
--
ALTER TABLE `galeriebild`
  ADD PRIMARY KEY (`gbId`),
  ADD UNIQUE KEY `aktivitaet` (`aktivitaet`);

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
  MODIFY `bId` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT für Tabelle `galerie`
--
ALTER TABLE `galerie`
  MODIFY `gId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `galeriebild`
--
ALTER TABLE `galeriebild`
  MODIFY `gbId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `globalchat`
--
ALTER TABLE `globalchat`
  MODIFY `gcId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  MODIFY `kId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  MODIFY `nID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
