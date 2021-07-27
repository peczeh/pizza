-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Már 20. 19:52
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `pizza`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ordered_items` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `comment` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `userid`, `ordered_items`, `comment`) VALUES
(27, 1, '3,9;3,9;3,1', 'kjjjjlk'),
(28, 1, '3,9;3,9;3,1', 'kjjjjlk'),
(29, 1, '3,9;3,9;3,1', 'kjjjjlk'),
(32, 1, '1,1', 'őőőőőőőő'),
(34, 12, '3,2', 'em'),
(35, 1, '1,2;2,3;3,6', 'mennyi van a kosárban?'),
(36, 1, '3,1', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pizzak`
--

CREATE TABLE `pizzak` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL DEFAULT '',
  `kep` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `feltet` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `pizzak`
--

INSERT INTO `pizzak` (`id`, `nev`, `kep`, `feltet`, `ar`) VALUES
(1, 'Hawaii pizza (32cm)', 'hawaii.png', 'pizzaszósz, sonka, ananász, mozzarella sajt', 1600),
(2, 'Szalámis pizza (32cm)', 'szalami.jpg', 'pizzaszósz, mozzarella sajt, szalámi', 1400),
(3, 'Spagettis pizza (32cm)', 'spaghetti.jpg', 'bolognai spagetti, sonka, mozzarella sajt', 2100);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userPass` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userEmail` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userFirst` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userLast` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userTel` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userIrsz` int(11) NOT NULL,
  `userVaros` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userUtca` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userEmelet` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `userEgyeb` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `userName`, `userPass`, `userEmail`, `userFirst`, `userLast`, `userTel`, `userIrsz`, `userVaros`, `userUtca`, `userEmelet`, `userEgyeb`) VALUES
(1, 'admin', '$2y$10$L0AoFZe6cwwgAa.y7q6bou1UHOVORZU3oax2B0ikisogEo56aGrXC', 'admin@admin.com', 'Kerep', 'Elek', '+36901234567', 6666, 'Senkiföldje', 'Tulipán utca 2', '2. emelet', 'BÉLA kapucsengő'),
(2, 'anyu', '$2y$10$xVHpnwWAd82i.w.S56h/pOPPjdR1plpYbdMLs/fbLkuDz3MZedN2G', 'anyu@anyu.hu', 'anyu', 'anyu', '0120', 1111, 'szeged', 'szegedi utca', '1', '10'),
(3, 'nemadmin', '$2y$10$Ag7g.mrfJ4qP4C2qHxNKU.CPcW6j2gFfDPuxgOXjpF1yLDL3mqOAW', 'admin@nemadmin.hu', 'admin', 'nem', '1020501', 1101, 'Budapest', 'Kerepesi ', '11', '1'),
(4, 'boni', '$2y$10$wAYmULu9475m/zUA/fWzdOZooToDWKRGuMQ3jeOfQjHHqxHgezYuG', 'boni@boni.hu', 'bonnie', 'boni', '1254', 254, 'Nemtom', 'Eztsem', '1', '1'),
(5, 'uborka', '$2y$10$wqH2KqHlU8Bw.8LjwWzgd.vIZvBoy6Buy.sGUiGMuqfATN/hukfTW', 'uborka@ubi.com', 'Uborka', 'Kigyo', '06705040908', 1106, 'Budapest', 'Kada', '32', '1'),
(6, 'Zsömle', '$2y$10$V2/knZV.1tQBp10Xq7uxMOIOirTfh3SFirOvQsXGVFhG15cjwv9WS', 'veknia@kenyer.com', 'Szömörce', 'Kígyózó', '06705040908', 1106, 'Budapest', 'Kada', '32', '1'),
(7, 'Bela420', '$2y$10$uWzeUUb0yvnOLKa7YYJpfeKP95i81s7kFy0kir0IynfqoTB4vlMOC', 'v.bela@gmail.com', 'Béla', 'Vég', '06942013666', 1377, 'Óbuda', 'that street 3', '13 6', '78'),
(8, 'Ferkó', '$2y$10$fY7LsCe/WlILuxkJCiT6p.lH3K36XfRaJyOzdCJP5o27ZEx6.mu86', 'ferike@xyz.hu', 'Puskás', 'Ferkó', '78942364', 102577963, 'Pécel', 'cimbora 4', '99 4', 'Rákosi'),
(9, 'Matyi', '$2y$10$PP05Cxfm8YLEhzp/vWWNu.OrGWb4JI0PCQ/A56GVijlCMJ0EUJEY.', 'matyi.rak@ourmail.ru', 'Matyi', 'Rákosi', '145236897', 1, 'Mag', 'Láva 3', 'Földszint 1', '1'),
(10, 'Gyuri', '$2y$10$um2Jis2TKgd1SlST8G0tJes0PaXNnXfAxUNRSQeeWK1qC3O2/2/Da', 'ferike@xyz.hu', 'Feri', 'Gyuri', '789465132', 11111, 'Kijev', 'az az utca', '1', 'ami a falon van'),
(11, 'viktor', '$2y$10$tgAPJX61eMVeGqrq3rId0.j1YyxgDVzFci8NEFWbRUopQeCdto70q', 'Ferike@xyz.hu', 'Feri', 'Gyuri', '789465132', 11111, 'Kijev', 'az az utca', '1', 'ami a falon van'),
(12, 'nemtom', '$2y$10$XDnhId9qvfCsNZI/2Wl.ZOGOY5aarSbNrs3L0Euzb9P/HIqRi6IVW', 'nemtom@nem.hu', 'tom', 'nem', '111111', 111, 'nemtom', 'nemtom, 20', 'nincs', 'kovács'),
(13, 'masodikadmin', '$2y$10$MGKfY5B6Kg19jnZ0ixQYa.nOJbKW.89swVDjbE/W6aN3fFemdAd/.', 'masodik@admi.hu', 'Admin', 'Masodik', '06207474744', 2222, 'Budaörs', 'bözsi', 'Nincs', 'Ezsem');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `pizzak`
--
ALTER TABLE `pizzak`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT a táblához `pizzak`
--
ALTER TABLE `pizzak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
