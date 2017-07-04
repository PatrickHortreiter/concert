-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Jul 2017 um 00:02
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `concert`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `act`
--

CREATE TABLE `act` (
  `actID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `members` int(11) NOT NULL,
  `organizerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `concert`
--

CREATE TABLE `concert` (
  `concertID` int(11) NOT NULL,
  `date` date NOT NULL,
  `venueID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `organizer`
--

CREATE TABLE `organizer` (
  `organizerID` int(11) NOT NULL,
  `organizerName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `performance`
--

CREATE TABLE `performance` (
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `actID` int(11) NOT NULL,
  `concertID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `concertID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `venue`
--

CREATE TABLE `venue` (
  `venueID` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `organizerID` int(11) NOT NULL,
  `concertID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `act`
--
ALTER TABLE `act`
  ADD PRIMARY KEY (`actID`),
  ADD KEY `organizerID` (`organizerID`);

--
-- Indizes für die Tabelle `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`concertID`),
  ADD KEY `venueID` (`venueID`);

--
-- Indizes für die Tabelle `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`organizerID`);

--
-- Indizes für die Tabelle `performance`
--
ALTER TABLE `performance`
  ADD KEY `performance_ibfk_1` (`concertID`),
  ADD KEY `actID` (`actID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `concertID` (`concertID`);

--
-- Indizes für die Tabelle `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venueID`),
  ADD KEY `organizerID` (`organizerID`),
  ADD KEY `concertID` (`concertID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `act`
--
ALTER TABLE `act`
  MODIFY `actID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `concert`
--
ALTER TABLE `concert`
  MODIFY `concertID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `organizer`
--
ALTER TABLE `organizer`
  MODIFY `organizerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `venue`
--
ALTER TABLE `venue`
  MODIFY `venueID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `act`
--
ALTER TABLE `act`
  ADD CONSTRAINT `act_ibfk_1` FOREIGN KEY (`organizerID`) REFERENCES `organizer` (`organizerID`);

--
-- Constraints der Tabelle `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `concert_ibfk_1` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`);

--
-- Constraints der Tabelle `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_ibfk_1` FOREIGN KEY (`concertID`) REFERENCES `concert` (`concertID`),
  ADD CONSTRAINT `performance_ibfk_2` FOREIGN KEY (`actID`) REFERENCES `act` (`actID`);

--
-- Constraints der Tabelle `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`concertID`) REFERENCES `concert` (`concertID`);

--
-- Constraints der Tabelle `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`organizerID`) REFERENCES `organizer` (`organizerID`),
  ADD CONSTRAINT `venue_ibfk_2` FOREIGN KEY (`concertID`) REFERENCES `concert` (`concertID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
