-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Mai 2019 um 16:10
-- Server-Version: 10.1.37-MariaDB
-- PHP-Version: 7.3.1

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
(535, 42421, '/homepagebilder/bilder_Galerie/sc2017_3.png', '2019-03-29 17:01:22', 2, 2425, 170),
(2845, 128745, '/homepagebilder/bilder_Galerie/wc2019_4.jpg', '2019-05-10 13:34:34', 25, 964, 191),
(4533, 7648643, '/homepagebilder/bilder_Galerie/sc2017_9.jpg', '2019-03-29 16:16:02', 8, 6463, 170),
(7543, 125467, '/homepagebilder/bilder_Galerie/sc2016_2.jpg', '2019-04-05 14:44:05', 14, 86543, 160),
(8737, 3264, '/homepagebilder/bilder_Galerie/sc2019_4.jpg', '2019-05-10 13:36:16', 28, 3265, 180),
(8753, 67829, '/homepagebilder/bilder_Galerie/wc2019_5.jpg', '2019-05-10 13:34:34', 26, 32521, 94847),
(9437, 34745, '/homepagebilder/bilder_Galerie/sc2018_5.jpg', '2019-05-10 13:37:13', 29, 853452, 170),
(21946, 124215, '/homepagebilder/bilder_Galerie/sc2016.jpg', '2019-04-05 14:30:34', 12, 241297, 160),
(23536, 9872935, '/homepagebilder/bilder_Galerie/sc2017_7.jpg', '2019-04-05 14:39:29', 13, 62362, 170),
(35235, 6453, '/homepagebilder/bilder_Galerie/sc2017_5.jpg', '2019-03-29 16:17:34', 10, 153254, 170),
(47653, 7235, '/homepagebilder/bilder_Galerie/sc2016_5.jpg', '2019-04-05 14:48:03', 18, 6421, 160),
(63462, 25326, '/homepagebilder/bilder_Galerie/wc2019_2.jpg', '2019-04-05 14:42:58', 11, 73423, 191),
(63563, 98435, '/homepagebilder/bilder_Galerie/sc2017_10.jpg', '2019-04-05 14:58:28', 23, 83264, 170),
(64765, 37475, '/homepagebilder/bilder_Galerie/sc2016_8.jpg', '2019-03-29 16:14:40', 6, 32523, 160),
(67324, 982347, '/homepagebilder/bilder_Galerie/sc2018_2.jpg', '2019-04-05 14:56:42', 21, 8346, 180),
(83562, 7352, '/homepagebilder/bilder_Galerie/sc2018.jpg', '2019-04-05 14:54:29', 19, 23532, 180),
(97347, 62534, '/homepagebilder/bilder_Galerie/sc2016_4.jpg', '2019-04-05 14:48:03', 17, 4387, 160),
(98435, 87823, '/homepagebilder/bilder_Galerie/sc2016_6.jpg', '2019-04-05 14:54:29', 20, 3746, 160),
(98765, 9876, '/homepagebilder/bilder_Galerie/wc2019.jpg', '2019-03-29 16:13:17', 5, 987, 191),
(321421, 214214, '/homepagebilder/bilder_Galerie/sc2017_4.png', '2019-03-29 17:00:29', 1, 231, 170),
(324623, 732, '/homepagebilder/bilder_Galerie/sc2018_3.jpg', '2019-05-10 13:36:16', 27, 353, 180),
(342313, 13131, '/homepagebilder/bilder_Galerie/sc2017_6.jpg', '2019-03-29 16:16:40', 9, 2424, 170),
(421412, 1111, '/homepagebilder/bilder_Galerie/sc2017.jpg', '2019-03-29 17:03:27', 4, 14532, 170),
(454347, 96985, '/homepagebilder/bilder_Galerie/sc2017_2.jpg', '2019-03-29 17:02:15', 3, 242, 170),
(893457, 3247, '/homepagebilder/bilder_Galerie/sc2016_7.png', '2019-04-05 14:56:42', 22, 29847, 160),
(965454, 2357, '/homepagebilder/bilder_Galerie/wc2019_3.jpg', '2019-05-10 13:32:02', 24, 7346, 191),
(986986, 76735, '/homepagebilder/bilder_Galerie/sc2016_3', '2019-04-05 14:45:58', 16, 34358, 160),
(8963846, 7345, '/homepagebilder/bilder_Galerie/wc2018.jpg', '2019-04-05 14:45:58', 15, 976, 181),
(64576476, 235263, '/homepagebilder/bilder_Galerie/sc2017_8.jpg', '2019-03-29 16:15:14', 7, 77776, 170);

--
-- Indizes der exportierten Tabellen
--

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
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `galerie`
--
ALTER TABLE `galerie`
  MODIFY `gId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT für Tabelle `galeriebild`
--
ALTER TABLE `galeriebild`
  MODIFY `gbId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64576477;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
