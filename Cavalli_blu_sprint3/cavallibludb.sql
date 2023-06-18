-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 31, 2023 alle 17:59
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cavallibludb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `account`
--
DROP DATABASE IF EXISTS cavallibludb;
CREATE DATABASE cavallibludb;
USE cavallibludb;
CREATE TABLE `account` (
  `P_ID` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `account`
--

INSERT INTO `account` (`P_ID`, `email`, `pass`, `admin`) VALUES
(1, 'emailprovata@gmail.com', 'susy2023', 0),
(2, 'utentemisterioso@gmail.com', 'cavalliblu23', 0),
(3, 'emailnonesiste@hotmail.it', 'forzanapoli', 0),
(4, 'adminpocopalese@tiscali.it', 'bravagiovannabrava22', 1),
(5, 'utentesicuro@hotmail.it', 'forzabari', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `blacklist`
--

CREATE TABLE `blacklist` (
  `B_ID` int(11) NOT NULL,
  `sito` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `blacklist`
--

INSERT INTO `blacklist` (`B_ID`, `sito`) VALUES
(1, 'http://www.goggle.com'),
(2, 'https://larefubblica.it/'),
(3, 'https://www.mag24.cloud/'),
(4, 'https://grandeinganno.it/'),
(5, 'https://www.grandeinganno.it/'),
(6, 'https://www.larefubblica.it/'),
(7, 'https://www.rassegneitalia.info/'),
(8, 'https://www.lantidiplomatico.it/'),
(9, 'https://scenarieconomici.it/');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensioni`
--

CREATE TABLE `recensioni` (
  `Rec_ID` int(10) NOT NULL,
  `sito` varchar(100) NOT NULL,
  `recensione` text NOT NULL,
  `voto` tinyint(1) NOT NULL,
  `p_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `recensioni`
--

INSERT INTO `recensioni` (`Rec_ID`, `sito`, `recensione`, `voto`, `p_id`) VALUES
(4, 'https://www.google.it', 'Molto bello 10/10 ', 0, 3),
(5, 'https://milano.repubblica.it/', 'sito della repubblica ma versione milano', 0, 2),
(6, 'https://www.repubblica.it/', 'molto positivo', 0, 3),
(7, 'https://www.libero.it/', 'ci sta anche se un po clickbait', 0, 3),
(8, 'https://milano.repubblica.it/', 'molto chiaro', 0, 3),
(9, 'https://www.agi.it/', 'votato come più sicuro nel 2021', 0, 3),
(10, 'https://www.vogue.it/', 'molto interessante', 0, 3),
(11, 'https://www.vogue.it/', 'moda veritiera', 0, 1),
(12, 'https://www.tgcom24.mediaset.it', 'affidabile e sempre aggiornato sulle ultime notizie', 0, 3),
(13, 'https://www.tgcom24.mediaset.it', 'ho scoperto la morte di berlusconi qui', 0, 2),
(14, 'https://www.tgcom24.mediaset.it', 'sono indinniato perchè dice cose brutte sul mio politico11!!!!!1', 1, 1),
(16, 'https://www.ansa.it/', 'Il sito offre notizie vere di attualita', 0, 3),
(17, 'https://www.ansa.it/', 'Sicurezza garantita', 0, 2),
(18, 'https://www.ansa.it/', 'Censurano la terra piatta!11!!', 1, 5),
(20, 'https://www.lercio.it/', 'sito di satira', 1, 3),
(21, 'https://www.ilparagone.it/', 'dice le fesserie', 1, 3),
(23, 'https://www.imolaoggi.it/', 'cattivi', 1, 3),
(24, 'https://larefubblica.it/', 'brutti', 1, 3),
(25, 'https://www.rassegneitalia.info/', 'dicono le cose false', 1, 3),
(26, 'https://www.lantidiplomatico.it/', 'bho non hanno senso', 1, 3),
(27, 'https://scenarieconomici.it/', 'sono molto cattivi', 1, 3),
(28, 'https://www.mag24.cloud/', 'sono brutti ', 1, 3),
(29, 'https://www.controinformazione.info/', 'cattivonissimi', 1, 3),
(30, 'https://voxnews.info/', 'il loro nome sembra Dux', 1, 3),
(31, 'https://grandeinganno.it/', 'basta leggere il nome', 1, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `whitelist`
--

CREATE TABLE `whitelist` (
  `W_ID` int(2) NOT NULL,
  `sito` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `whitelist`
--

INSERT INTO `whitelist` (`W_ID`, `sito`) VALUES
(2, 'https://www.google.it/'),
(3, 'https://www.tgcom24.mediaset.it'),
(4, 'https://www.ansa.it'),
(5, 'https://milano.repubblica.it'),
(6, 'https://www.agi.it/'),
(7, 'https://www.open.online/'),
(8, 'https://www.ansa.it'),
(9, 'https://www.libero.it/');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indici per le tabelle `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`B_ID`);

--
-- Indici per le tabelle `recensioni`
--
ALTER TABLE `recensioni`
  ADD PRIMARY KEY (`Rec_ID`),
  ADD KEY `p_id` (`p_id`);

--
-- Indici per le tabelle `whitelist`
--
ALTER TABLE `whitelist`
  ADD PRIMARY KEY (`W_ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `account`
--
ALTER TABLE `account`
  MODIFY `P_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  MODIFY `Rec_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `whitelist`
--
ALTER TABLE `whitelist`
  MODIFY `W_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  ADD CONSTRAINT `recensioni_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `account` (`P_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
