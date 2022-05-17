-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 apr 2021 om 18:53
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opdrachthashing`
--
DROP schema IF EXISTS `opdrachthashing`;
CREATE schema `opdrachthashing`;

USE `opdrachthashing`; 
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personeel`
--

CREATE TABLE `personeel` (
  `id` int(11) NOT NULL,
  `gebruikersnaam` varchar(50) NOT NULL,
  `wachtwoord` varchar(50) NOT NULL,
  `ww_hash` varchar(255) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `personeel`
--

INSERT INTO `personeel` (`id`, `gebruikersnaam`, `wachtwoord`, `rol_id`) VALUES
(1, 'medewerker', 'geheim', 1),
(2, 'bedrijfsleider', 'geheim', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `rol`
--

INSERT INTO `rol` (`id`, `naam`) VALUES
(1, 'medewerker'),
(2, 'bedrijfsleider');

-- --------------------------------------------------------
--
-- Tabelstructuur voor tabel `klant`
--

DROP TABLE IF EXISTS klant;
CREATE TABLE klant (
  id int(11) NOT NULL AUTO_INCREMENT,
  voornaam varchar(15) NOT NULL,
  tussenvoegsel varchar(10) DEFAULT NULL,
  achternaam varchar(25) NOT NULL,
  straat varchar(35) NOT NULL,
  postcode varchar(6) NOT NULL,
  woonplaats varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  createdate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--
insert into klant
(voornaam, achternaam, straat, postcode, woonplaats, email)
values
('Dylan', 'Huisden', 'Middenweg 11', '1088VV', 'Amsterdam', 'dhuisden@roc.nl'),
('Nitin', 'Bosman', 'Leidseweg 22', '9900BB', 'Amsterdam', 'nbosman@roc.nl'),
('Joseph', 'Demirel', 'Leidseplein 33', '9988BB', 'Utrecht', 'Josdem@hotmail.com'),
('Franco', 'Tasiyan', 'Kruislaan 444', '3300VV', 'Utrecht', 'frantas@wanadoo.nl'),
('Akash', 'Kabli', 'Galileiplanstoen 333', '2299NN', 'Amstelveen', 'aka@hetnet.nl'),
('Tamara', 'Kabli', 'Mozartstraat 22', '3388XX', 'Amsterdam', 'tamka@hotmail.com'),
('Arnold', 'Shaw', 'Kruislaan 1', '9876FF', 'Rotterdam', 'asha@roc.nl');

--
-- Indexen voor tabel `personeel`
--
ALTER TABLE `personeel`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `personeel`
--
ALTER TABLE `personeel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
