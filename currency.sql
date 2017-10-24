-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 15 okt 2017 om 18:42
-- Serverversie: 5.6.34-log
-- PHP-versie: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `currency`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `abbr` varchar(3) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Value for 1 EUR';

--
-- Gegevens worden geëxporteerd voor tabel `currency`
--

INSERT INTO `currency` (`id`, `abbr`, `value`, `updated_at`) VALUES
(3, 'BGN', 1.96, '2017-10-15 12:34:44'),
(5, 'DKK', 7.44, '2017-10-15 12:34:44'),
(6, 'GBP', 0.89, '2017-10-15 12:34:44'),
(8, 'PLN', 4.26, '2017-10-15 12:34:44'),
(9, 'RON', 4.59, '2017-10-15 12:34:44'),
(10, 'SEK', 9.61, '2017-10-15 12:34:44'),
(11, 'CHF', 1.15, '2017-10-15 12:34:44'),
(12, 'NOK', 9.34, '2017-10-15 12:34:44'),
(13, 'HRK', 7.51, '2017-10-15 12:34:44'),
(14, 'RUB', 68.12, '2017-10-15 12:34:44'),
(15, 'TRY', 4.32, '2017-10-15 12:34:44'),
(16, 'AUD', 1.51, '2017-10-15 12:34:44'),
(17, 'BRL', 3.75, '2017-10-15 12:34:44'),
(18, 'CAD', 1.48, '2017-10-15 12:34:44'),
(19, 'CNY', 7.78, '2017-10-15 12:34:44'),
(20, 'HKD', 9.22, '2017-10-15 12:34:44'),
(21, 'IDR', 15938.78, '2017-10-15 12:34:44'),
(22, 'ILS', 4.13, '2017-10-15 12:34:44'),
(23, 'INR', 76.71, '2017-10-15 12:34:44'),
(24, 'KRW', 1333.88, '2017-10-15 12:34:44'),
(25, 'MXN', 22.39, '2017-10-15 12:34:44'),
(26, 'MYR', 4.98, '2017-10-15 12:34:44'),
(27, 'NZD', 1.65, '2017-10-15 12:34:44'),
(28, 'PHP', 60.73, '2017-10-15 12:34:44'),
(29, 'SGD', 1.60, '2017-10-15 12:34:44'),
(30, 'THB', 39.12, '2017-10-15 12:34:44'),
(31, 'ZAR', 15.80, '2017-10-15 12:34:44'),
(32, 'USD', 1.18, '2017-10-15 12:34:44'),
(33, 'JPY', 132.49, '2017-10-15 12:34:44'),
(34, 'CZK', 25.81, '2017-10-15 12:34:44'),
(35, 'HUF', 308.64, '2017-10-15 12:34:44');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
