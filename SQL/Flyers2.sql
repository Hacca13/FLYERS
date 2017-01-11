-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Gen 11, 2017 alle 12:57
-- Versione del server: 10.1.19-MariaDB
-- Versione PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Flyers`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ANNUNCIO`
--

CREATE TABLE `ANNUNCIO` (
  `KEYANNUNCIO` int(11) NOT NULL,
  `TITOLO` varchar(70) NOT NULL,
  `DESCRIZIONE` varchar(300) DEFAULT NULL,
  `CONTATTO` varchar(70) DEFAULT NULL,
  `DATADICARICAMENTO` date NOT NULL,
  `KEYUTENTE` int(11) DEFAULT NULL,
  `KEYCATEGORIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ANNUNCIO`
--

INSERT INTO `ANNUNCIO` (`KEYANNUNCIO`, `TITOLO`, `DESCRIZIONE`, `CONTATTO`, `DATADICARICAMENTO`, `KEYUTENTE`, `KEYCATEGORIA`) VALUES
(1, 'cerco un pelo', 'ripeto cerco un elo', '33333', '2017-01-08', 1, 1),
(2, 'x', 'x', 'x', '2017-01-02', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `CATEGORIA`
--

CREATE TABLE `CATEGORIA` (
  `KEYCATEGORIA` int(11) NOT NULL,
  `NOME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `CATEGORIA`
--

INSERT INTO `CATEGORIA` (`KEYCATEGORIA`, `NOME`) VALUES
(1, 'Capocchia'),
(2, 'Informatica'),
(3, 'Matematica');

-- --------------------------------------------------------

--
-- Struttura della tabella `OBJECTFILE`
--

CREATE TABLE `OBJECTFILE` (
  `KEYFILE` int(11) NOT NULL,
  `NOME` varchar(70) NOT NULL,
  `DESCRIZIONE` varchar(300) DEFAULT NULL,
  `RAITING` double DEFAULT NULL,
  `FILE` varchar(250) NOT NULL,
  `DATADICARICAMENTO` date NOT NULL,
  `KEYCATEGORIA` int(11) DEFAULT NULL,
  `KEYUTENTE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `TAG`
--

CREATE TABLE `TAG` (
  `KEYTAG` int(11) NOT NULL,
  `NOME` varchar(10) DEFAULT NULL,
  `KEYANNUNCIO` int(11) DEFAULT NULL,
  `KEYFILE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `UTENTE`
--

CREATE TABLE `UTENTE` (
  `KEYUTENTE` int(11) NOT NULL,
  `ID` varchar(32) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `CITTA` varchar(70) DEFAULT NULL,
  `PASS` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `UTENTE`
--

INSERT INTO `UTENTE` (`KEYUTENTE`, `ID`, `EMAIL`, `CITTA`, `PASS`) VALUES
(1, 'pelo', 'ciao', 'striano', '11');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ANNUNCIO`
--
ALTER TABLE `ANNUNCIO`
  ADD PRIMARY KEY (`KEYANNUNCIO`),
  ADD KEY `KEYCATEGORIA` (`KEYCATEGORIA`),
  ADD KEY `KEYUTENTE` (`KEYUTENTE`);

--
-- Indici per le tabelle `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  ADD PRIMARY KEY (`KEYCATEGORIA`);

--
-- Indici per le tabelle `OBJECTFILE`
--
ALTER TABLE `OBJECTFILE`
  ADD PRIMARY KEY (`KEYFILE`),
  ADD KEY `KEYCATEGORIA` (`KEYCATEGORIA`),
  ADD KEY `KEYUTENTE` (`KEYUTENTE`);

--
-- Indici per le tabelle `TAG`
--
ALTER TABLE `TAG`
  ADD PRIMARY KEY (`KEYTAG`),
  ADD KEY `KEYANNUNCIO` (`KEYANNUNCIO`),
  ADD KEY `KEYFILE` (`KEYFILE`);

--
-- Indici per le tabelle `UTENTE`
--
ALTER TABLE `UTENTE`
  ADD PRIMARY KEY (`KEYUTENTE`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`,`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ANNUNCIO`
--
ALTER TABLE `ANNUNCIO`
  MODIFY `KEYANNUNCIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  MODIFY `KEYCATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `OBJECTFILE`
--
ALTER TABLE `OBJECTFILE`
  MODIFY `KEYFILE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `UTENTE`
--
ALTER TABLE `UTENTE`
  MODIFY `KEYUTENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `ANNUNCIO`
--
ALTER TABLE `ANNUNCIO`
  ADD CONSTRAINT `annuncio_ibfk_1` FOREIGN KEY (`KEYCATEGORIA`) REFERENCES `CATEGORIA` (`KEYCATEGORIA`),
  ADD CONSTRAINT `annuncio_ibfk_2` FOREIGN KEY (`KEYUTENTE`) REFERENCES `UTENTE` (`KEYUTENTE`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Limiti per la tabella `OBJECTFILE`
--
ALTER TABLE `OBJECTFILE`
  ADD CONSTRAINT `objectfile_ibfk_1` FOREIGN KEY (`KEYCATEGORIA`) REFERENCES `CATEGORIA` (`KEYCATEGORIA`),
  ADD CONSTRAINT `objectfile_ibfk_2` FOREIGN KEY (`KEYUTENTE`) REFERENCES `UTENTE` (`KEYUTENTE`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Limiti per la tabella `TAG`
--
ALTER TABLE `TAG`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`KEYANNUNCIO`) REFERENCES `ANNUNCIO` (`KEYANNUNCIO`),
  ADD CONSTRAINT `tag_ibfk_2` FOREIGN KEY (`KEYFILE`) REFERENCES `OBJECTFILE` (`KEYFILE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
