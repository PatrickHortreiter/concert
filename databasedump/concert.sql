-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Jul 2017 um 18:34
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

--
-- Daten für Tabelle `act`
--

INSERT INTO `act` (`actID`, `name`, `members`, `organizerID`) VALUES
(1, 'SQL-Guys', 3, 1),
(2, 'Moneyboy', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `concert`
--

CREATE TABLE `concert` (
  `concertID` int(11) NOT NULL,
  `date` date NOT NULL,
  `venueName` varchar(255) NOT NULL,
  `organizerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `concert`
--

INSERT INTO `concert` (`concertID`, `date`, `venueName`, `organizerID`) VALUES
(1, '2017-07-30', 'Qlympiastadion', 1),
(2, '2017-07-31', 'Turnhalle', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `organizer`
--

CREATE TABLE `organizer` (
  `organizerID` int(11) NOT NULL,
  `organizerName` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `organizer`
--

INSERT INTO `organizer` (`organizerID`, `organizerName`, `password`) VALUES
(1, 'Redbull ', '$2y$10$kj948N34ZY2hSoZVx2/R3.TxaRwV7Qc4JzVMJE0MC3q5HiqvSAegK');

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

--
-- Daten für Tabelle `performance`
--

INSERT INTO `performance` (`startTime`, `endTime`, `actID`, `concertID`) VALUES
('20:30:00', '22:00:00', 1, 1),
('20:00:00', '21:30:00', 1, 2),
('23:00:00', '23:30:00', 2, 1),
('22:45:00', '23:45:00', 2, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ticket`
--

CREATE TABLE `ticket` (
  `ticketID` int(11) NOT NULL,
  `concertID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `UserName`, `email`, `password`) VALUES
(6, 'TheKing', 'patrick.h1997@web.de', '$2y$10$IGG4szJWM0CH8oukB6ckeeE596r0ZgAPbaNxebD9CztDgqQceIE/W'),
(7, 'KING', 'ichderking@king.de', '$2y$10$NCAi0yll5IyfevptaMF63e5KP5QlofdvGQvs5BJ70U4aWpBE8RE3u');

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
  ADD KEY `venueID` (`venueName`),
  ADD KEY `organizerID` (`organizerID`);

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
-- Indizes für die Tabelle `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketID`),
  ADD KEY `concertID` (`concertID`),
  ADD KEY `userID` (`userID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `act`
--
ALTER TABLE `act`
  MODIFY `actID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `concert`
--
ALTER TABLE `concert`
  MODIFY `concertID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `organizer`
--
ALTER TABLE `organizer`
  MODIFY `organizerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  ADD CONSTRAINT `concert_ibfk_1` FOREIGN KEY (`organizerID`) REFERENCES `organizer` (`organizerID`);

--
-- Constraints der Tabelle `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_ibfk_1` FOREIGN KEY (`concertID`) REFERENCES `concert` (`concertID`),
  ADD CONSTRAINT `performance_ibfk_2` FOREIGN KEY (`actID`) REFERENCES `act` (`actID`);

--
-- Constraints der Tabelle `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`concertID`) REFERENCES `concert` (`concertID`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
