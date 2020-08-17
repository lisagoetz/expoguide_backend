-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: sql61.your-server.de
-- Erstellungszeit: 17. Aug 2020 um 16:52
-- Server-Version: 5.7.31-1
-- PHP-Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `expoguidedb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES
(3, 'kristin', 'expoguide', 'kristin.opp@web.de'),
(4, 'profroderus', 'expoguide', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `beacons`
--

CREATE TABLE `beacons` (
  `beaconID` int(6) NOT NULL,
  `beaconBTID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `beacons`
--

INSERT INTO `beacons` (`beaconID`, `beaconBTID`) VALUES
(384754, 11111111),
(384755, 22222222),
(878473, 333333333),
(878474, 33333333);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items`
--

CREATE TABLE `items` (
  `itemID` int(6) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `date` int(4) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `roomID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `items`
--

INSERT INTO `items` (`itemID`, `itemname`, `artist`, `date`, `description`, `image`, `roomID`) VALUES
(38, 'Sternennacht', 'Vincent van Goth', 1889, 'Mit seinem bekannten und von der Ã–ffentlichkeit bewunderten Werk ist Vincent van Gogh wohl einer der ikonischsten KÃ¼nstler aller Zeiten. Als wegweisende PersÃ¶nlichkeit des Post-Impressionismus ebnete van Gogh den Weg fÃ¼r weitere avantgardistische KÃ¼nstler und spielte eine SchlÃ¼sselrolle in der Entstehung der modernen Kunst.\r\n\r\nUnter seinen vielen weltberÃ¼hmten GemÃ¤lden nimmt die Sternennacht (1889), ein sehr spÃ¤tes GemÃ¤lde in der auÃŸergewÃ¶hnlich kurzen Schaffensperiode des KÃ¼nstlers, einen besonders wichtigen Platz in der Kunstgeschichte ein.', 'sternennacht.jpg', 1),
(39, 'Mona Lisa', 'Leonardo da Vinci', 1505, 'Die Mona Lisa von Leonardo da Vinci ist das wohl berÃ¼hmteste GemÃ¤lde der Welt. Heute befindet es sich im Louvre in Paris, damals wurde es allerdings in Florenz gemalt, als da Vinci von etwa 1500 bis 1508 dorthin zog.', 'monalisa.JPG', 1),
(40, 'Das MÃ¤dchen mit dem PerlenohrgehÃ¤nge', 'Jan Vermeer', 1665, 'Dieses schÃ¶ne GemÃ¤lde - eines der berÃ¼hmtesten barocken PortrÃ¤ts - trÃ¤gt den Spitznamen &amp;quot;Mona Lisa des Nordens&amp;quot; und zeigt, dass Jan Vermeer neben seiner meisterlichen realistischen Genremalerei auch ein MeisterportrÃ¤tist war.\r\n\r\nSeine FÃ¤higkeit, die KÃ¶pfe junger Frauen zu malen, hat er vielfach unter Beweis gestellt. Das MÃ¤dchen mit dem PerlenohrgehÃ¤nge ist jedoch aufgrund der Bildwirkung und des Motivs noch einmal etwas Besonderes', 'perle.JPG', 1),
(41, 'Die Nachtwache', 'Rembrandt van Rijn', 1642, 'Die Nachtwache ist eines der bekanntesten Werke von Rembrandt. Es zeigt eine BÃ¼gerwehr, die unter der FÃ¼hrung ihres KapitÃ¤ns Frans Banning Cocq marschiert. Es ist derzeit im Rijksmuseum Amsterdam zu finden.\r\n\r\nEinzigartig ist die Dunkelheit des GemÃ¤ldes. Einige Stellen sind durch den Firnisauftrag soweit ausgedunkelt, dass sich Details kaum noch ausmachen lassen. Die Gesamtkomposition wird durch die zwei hellen Figuren abseits des Bildmittelpunkts bestimmt. ', 'nachtwache.JPG', 1),
(42, 'Die Erschaffung Adams', 'Michelangelo', 1512, 'Das 1512 fertiggestellte Werk zeigt den Ausschnitt der biblischen SchÃ¶pfungsgeschichte, als Gott Adam erschuf. Vor allem der Bildausschnitt der sich beinahe berÃ¼hrenden HÃ¤nde wurde unvorstellbar oft reproduziert. Eben jener Ausschnitt ist es auch, der verdeutlichen soll, dass Adam als Abbild Gottes erschaffen wurde.', 'adam.JPG', 2),
(43, 'Das Abendmahl', 'Leonardo da Vinci', 1497, 'Das Abendmahl ist das wohl berÃ¼hmteste Fresko der Welt, geschaffen von Leonardo da Vinci. Zur Fertigstellung benÃ¶tigte der Meister mehrere Jahre, was bei einer GrÃ¶ÃŸe von 422 Ã— 904 cm und einer solchen Detailtreue nicht verwunderlich war. Leider sind groÃŸe Teile des Freskos abgeplatzt, da da Vinci fÃ¼r mehr Leuchtkraft darauf verzichtete, auf noch frischen Kalkputz zu malen.', 'abendmahl.JPG', 2),
(44, 'Guernica', 'Pablo Picasso', 1937, 'Die \"Guernica\" von Picasso zeigt die Bombardierung der Stadt Guernica wÃ¤hrend des spanischen BÃ¼rgerkriegs. Es ist ein Schwarz-WeiÃŸ-GemÃ¤lde, das die VerwÃ¼stung des Bombenangriffs der deutsch-spanischen Legion Condor darstellt. Bei der ZerstÃ¶rung der Stadt kamen Hunderte Zivilisten ums Leben.', 'guernica.JPG', 2),
(45, 'Seerosenteich', 'Claude Monet', 1950, 'Die Seerosen, die von Claude Monet gemalt wurden, sind eine Serie von 250 Ã–lgemÃ¤lden, die auf seinem eigenen Blumengarten basieren. Diese Bilder befinden sich in verschiedenen Kunstmuseen auf der ganzen Welt.', 'seerosen.JPG', 2),
(46, 'Die Geburt der Venus', 'Sandro Botticelli', 1484, 'Botticelli malte Die Geburt der Venus zwischen 1484-85. Es wurde von einem Mitglied der florentinischen Medici-Familie in Auftrag gegeben. Man nimmt an, dass Lorenzo di Pierfrancesco der unmittelbare Auftraggeber war. Er beauftragte den KÃ¼nstler auch mit der Illustration von Dantes GÃ¶ttlicher KomÃ¶die. Die Geburt der Venus wurde in seinem Schlafzimmer in der Villa in Castello in der NÃ¤he von Florenz aufgehÃ¤ngt.', 'venus.JPG', 2),
(47, 'Der Schrei', 'Edvard Munch', 1917, 'Edvard Munch (1863-1944) ist vielleicht einer der berÃ¼hmtesten KÃ¼nstler des 19. und 20. Jahrhunderts. Jahrhunderts. Als Wegbereiter des Expressionismus und im weiteren Sinne auch als Pionier der modernen Kunst insgesamt anerkannt, ist Der Schrei die Arbeit, die ihn in der Kunstwelt bekannt machte.\r\n\r\nUrsprÃ¼nglich wurde das Motiv von Munch in Tempura auf Karton gemalt, bevor er es mehrfach in unterschiedlichen Medien wiederholte. Es existierens fÃ¼nf Versionen desselben Werkes, die alle zwischen 1893 und 1917 entstanden sind. Drei davon sind GemÃ¤lde, eine ist eine Pastellzeichnung und die finale Version eine Lithographie.', 'schrei.JPG', 1),
(58, 'Agnus Dei', 'Francisco de Zurbaran', 1636, 'The Lamb of God', 'Agnus_Dei.jpg', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rooms`
--

CREATE TABLE `rooms` (
  `roomID` int(6) NOT NULL,
  `roomname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `rooms`
--

INSERT INTO `rooms` (`roomID`, `roomname`) VALUES
(1, 'Raum 1'),
(2, 'Raum 2');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `beacons`
--
ALTER TABLE `beacons`
  ADD PRIMARY KEY (`beaconID`);

--
-- Indizes für die Tabelle `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `roomID` (`roomID`);

--
-- Indizes für die Tabelle `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomID`),
  ADD UNIQUE KEY `name` (`roomname`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `beacons`
--
ALTER TABLE `beacons`
  MODIFY `beaconID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=878475;

--
-- AUTO_INCREMENT für Tabelle `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT für Tabelle `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`roomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
