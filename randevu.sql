-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Eyl 2021, 01:25:32
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `pazar`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bayiler`
--

CREATE TABLE `bayiler` (
  `id` int(11) NOT NULL,
  `bayiadi` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lont` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `surathizi` int(11) NOT NULL,
  `kullanici` varchar(50) NOT NULL,
  `sifresi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `bayiler`
--

INSERT INTO `bayiler` (`id`, `bayiadi`, `telefon`, `email`, `adres`, `lat`, `lont`, `start_time`, `end_time`, `surathizi`, `kullanici`, `sifresi`) VALUES
(1, 'Bravo su bayi', ' +90 (850) 840 63 30', 'tupbayi@tupbayi1.com', 'Kızılarık Mah. Gazi Bulvarı Saliha Argın İş Merkezi No: 286/4 Muratpaşa / ANTALYA', '36.9129213', '30.7166692', '08:00:00', '18:00:00', 50, 'bayi1', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `il` varchar(255) NOT NULL,
  `ilce` varchar(255) NOT NULL,
  `sokakveyacadde` varchar(255) NOT NULL,
  `kapino` varchar(255) NOT NULL,
  `tarih` datetime NOT NULL,
  `lat` varchar(255) NOT NULL,
  `log` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`id`, `name`, `email`, `telefon`, `adres`, `il`, `ilce`, `sokakveyacadde`, `kapino`, `tarih`, `lat`, `log`) VALUES
(32, 'mustafa bozkurt', 'fbifbi212@gmail.com', '05539706131', 'Sakıp Sabancı Caddesi 41, 07110 Aksu/Antalya, Turkey', 'Antalya', 'Aksu', 'Sakıp Sabancı Caddesi', ' 41', '2021-09-21 21:32:00', '36.93988', '30.81198'),
(33, 'mustafa bozkurt', 'fbifbi212@gmail.com', '05539706132', '817 Stewart St, Seattle, WA 98101, United States', 'WA', 'Downtown Seattle', 'Stewart St', '817 ', '2021-09-21 22:46:00', '47.61561186221641', '-122.33447425927734'),
(34, 'mustafa bozkurt', 'fbifbi212@gmail.com', '05539706134', '817 Stewart St, Seattle, WA 98101, United States', 'WA', 'Downtown Seattle', 'Stewart St', '817 ', '2021-09-21 22:46:00', '47.61561186221641', '-122.33447425927734'),
(35, 'hasan tokyatan', 'mozkurt212@gmail.com', '05054405040', '469. Sokak 13, 07040 Muratpasa/Antalya, Turkey', 'Antalya', 'Muratpasa', '469. Sokak', ' 13', '2021-09-22 00:20:00', '36.89440707196688', '30.703038426991533'),
(36, 'veli acyatan', 'mozkurt212@gmail.com', '02462221236', '571. Sokak 58, 07010 Muratpasa/Antalya, Turkey', 'Antalya', 'Muratpasa', '571. Sokak', ' 58', '2021-09-22 00:21:00', '36.8975189832876', '30.70203193065126'),
(37, 'Adem zıplayan', 'adem@adem.com', '02462221212', '1058. Sokak 45, 07310 Muratpasa/Antalya, Turkey', 'Antalya', 'Muratpasa', '1058. Sokak', ' 45', '2021-09-22 00:22:00', '36.898146002874', '30.72033012459987'),
(38, 'hakan atlayan', 'adem@adem.com', '02462221213', 'Fatih Caddesi 54A, 07210 Kepez/Antalya, Turkey', 'Antalya', 'Kepez', 'Fatih Caddesi', ' 54A', '2021-09-22 00:23:00', '36.98530310008851', '30.72181780497672');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevular`
--

CREATE TABLE `randevular` (
  `id` int(11) NOT NULL,
  `musteri_id` int(11) NOT NULL,
  `tarih` datetime NOT NULL,
  `bayi_id` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `zaman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `randevular`
--

INSERT INTO `randevular` (`id`, `musteri_id`, `tarih`, `bayi_id`, `km`, `zaman`) VALUES
(99, 35, '2021-09-25 04:14:00', 1, 50, '3 Dakika'),
(100, 36, '2021-09-22 10:10:00', 1, 2, '3 Dakika'),
(101, 37, '2021-09-22 10:45:00', 1, 2, '3 Dakika'),
(102, 38, '2021-09-04 02:06:00', 1, 20, '10 Dakika');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bayiler`
--
ALTER TABLE `bayiler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `randevular`
--
ALTER TABLE `randevular`
  ADD PRIMARY KEY (`id`),
  ADD KEY `musteri_id` (`musteri_id`),
  ADD KEY `bayi_id` (`bayi_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bayiler`
--
ALTER TABLE `bayiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Tablo için AUTO_INCREMENT değeri `randevular`
--
ALTER TABLE `randevular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `randevular`
--
ALTER TABLE `randevular`
  ADD CONSTRAINT `randevular_ibfk_1` FOREIGN KEY (`musteri_id`) REFERENCES `musteriler` (`id`),
  ADD CONSTRAINT `randevular_ibfk_2` FOREIGN KEY (`bayi_id`) REFERENCES `bayiler` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
