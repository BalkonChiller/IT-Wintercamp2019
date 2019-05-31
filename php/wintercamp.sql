-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Mrz 2019 um 17:16
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.2

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

--
-- Daten für Tabelle `galeriebild`
--

INSERT INTO `galeriebild` (`gbId`, `nId`, `bilderlink`, `zeit`, `aktivitaet`, `gId`) VALUES
(345, 3456, 'Emerald.jpg', '2019-03-22 15:32:38', 3, 34567),
(456, 4567, 'ballon.jpg', '2019-03-22 15:33:32', 4, 45678),
(123456, 1234, 'Beispiel.jpg', '2019-03-15 17:25:40', 1, 12345),
(234567, 234567, 'feuerbei.jpg', '2019-03-22 15:30:09', 2, 234567);

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
(1, 'Mustermann', 'Max', 'tollerAdmin', 'max.mustermann@gmail.com', 'testAdmin2019', 1, '', '2019-02-26 12:41:03', '0000-00-00 00:00:00', 0);

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
-- AUTO_INCREMENT für Tabelle `galerie`
--
ALTER TABLE `galerie`
  MODIFY `gId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `galeriebild`
--
ALTER TABLE `galeriebild`
  MODIFY `gbId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234568;

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