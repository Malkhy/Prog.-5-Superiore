-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 16, 2024 alle 00:04
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
-- Database: `centro_animali`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `anagrafica_centro`
--

CREATE TABLE `anagrafica_centro` (
  `Codice_Centro` int(11) NOT NULL,
  `Denominazione` varchar(25) NOT NULL,
  `Codice_comune` varchar(4) NOT NULL,
  `Indirizzo` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `anagrafica_centro`
--

INSERT INTO `anagrafica_centro` (`Codice_Centro`, `Denominazione`, `Codice_comune`, `Indirizzo`, `email`, `telefono`) VALUES
(1, 'ciao', 'A007', 'via vigne vecchie 89', 'centro@mail.com', '069078656');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `anagrafica_centro`
--
ALTER TABLE `anagrafica_centro`
  ADD PRIMARY KEY (`Codice_Centro`),
  ADD KEY `Codice_comune` (`Codice_comune`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `anagrafica_centro`
--
ALTER TABLE `anagrafica_centro`
  MODIFY `Codice_Centro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `anagrafica_centro`
--
ALTER TABLE `anagrafica_centro`
  ADD CONSTRAINT `anagrafica_centro_ibfk_1` FOREIGN KEY (`Codice_comune`) REFERENCES `regprovcomune` (`Codice_comune`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
