-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 01 Nis 2023, 09:01:01
-- Sunucu sürümü: 5.7.41
-- PHP Sürümü: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `maxkreatifcom_cafe`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ausers`
--

CREATE TABLE `ausers` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `soyad` varchar(255) NOT NULL,
  `eposta` varchar(255) NOT NULL,
  `sifre` varchar(2555) NOT NULL,
  `dogumtarihi` varchar(255) NOT NULL,
  `dogrulamakod` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ausers`
--

INSERT INTO `ausers` (`id`, `ad`, `soyad`, `eposta`, `sifre`, `dogumtarihi`, `dogrulamakod`, `role`) VALUES
(1, 'CAFE', 'SİSTEMİ', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilardomasa`
--

CREATE TABLE `bilardomasa` (
  `id` int(11) NOT NULL,
  `masaad` varchar(255) NOT NULL,
  `saatucret` varchar(255) NOT NULL,
  `dkucret` varchar(255) NOT NULL,
  `masadurumu` varchar(255) NOT NULL DEFAULT '0',
  `zamantur` varchar(255) NOT NULL DEFAULT '0',
  `zamanbaslangic` varchar(255) NOT NULL DEFAULT '0',
  `zamanbitis` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `bilardomasa`
--

INSERT INTO `bilardomasa` (`id`, `masaad`, `saatucret`, `dkucret`, `masadurumu`, `zamantur`, `zamanbaslangic`, `zamanbitis`) VALUES
(4, 'Bilardo-1', '20', '0.33333333333333', '0', '0', '0', '0'),
(5, 'Bilardo-2', '20', '0.33333333333333', '0', '0', '0', '0'),
(6, 'Bilardo-3', '20', '0.33333333333333', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cafemasa`
--

CREATE TABLE `cafemasa` (
  `id` int(11) NOT NULL,
  `masaad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `cafemasa`
--

INSERT INTO `cafemasa` (`id`, `masaad`) VALUES
(7, 'Masa-1'),
(8, 'Masa-2'),
(9, 'Masa-3'),
(10, 'Masa-4'),
(11, 'Masa-5'),
(12, 'Masa-6'),
(13, 'Masa-7'),
(14, 'Masa-8');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelir`
--

CREATE TABLE `gelir` (
  `id` int(11) NOT NULL,
  `geliradi` varchar(255) NOT NULL,
  `geliricerik` varchar(2555) NOT NULL,
  `gelirtutar` varchar(255) NOT NULL,
  `tarih` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `gelir`
--

INSERT INTO `gelir` (`id`, `geliradi`, `geliricerik`, `gelirtutar`, `tarih`) VALUES
(21, 'Cafe', '', '9', '2022-03-06 18:33:26'),
(22, 'Cafe', '<tr><td><strong>Çay</strong></td><td>5 Adet</td><td>15TL</td><td>2023-03-30 05:35:59</td></tr>', '15', '2023-03-30 05:35:59'),
(23, 'Cafe', '<tr><td><strong>Nargile</strong></td><td>2 Adet</td><td>100TL</td><td>2023-03-30 05:41:14</td></tr>', '100', '2023-03-30 05:41:14'),
(24, 'Bilardo', 'Bilardo-1 Adl? Masada Süresiz Bir ?ekilde 0.61666666666667dk Oynand? ve Al?nan Tutar 0.20555555555555TL', '0.205', '2023-03-30 15:17:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategoriad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `kategoriad`) VALUES
(8, 'Sıcak İçeçek'),
(9, 'Soğuk İçeçek'),
(10, 'Nargile'),
(11, 'FastFood'),
(12, 'Atıştırmalık');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `masaurunler`
--

CREATE TABLE `masaurunler` (
  `id` int(11) NOT NULL,
  `masaid` varchar(255) NOT NULL,
  `urunid` varchar(255) NOT NULL,
  `urunadet` varchar(255) NOT NULL,
  `uruntutar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `masaurunler`
--

INSERT INTO `masaurunler` (`id`, `masaid`, `urunid`, `urunadet`, `uruntutar`) VALUES
(35, '7', '10', '1', '3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `tutar` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `ad`, `tutar`, `kategori`, `resim`) VALUES
(10, 'Çay', '3', '8', '../../resimler/2333321970.jpg'),
(11, 'Oralet Çeşitleri', '4', '8', '../../resimler/2651825824.jpg'),
(12, 'Türk Kahvesi', '12', '8', '../../resimler/2383922219.jpg'),
(13, 'Bitki Çayları', '12', '8', '../../resimler/2938330216.jpg'),
(14, 'Yeşil Çay', '8', '8', '../../resimler/2003627340.jpg'),
(15, 'Sıcak Çikolata', '8', '8', '../../resimler/3111830554.jpg'),
(17, 'Salep', '12', '8', '../../resimler/2740724137.jpg'),
(18, 'Kutu Cola', '12', '9', '../../resimler/2145226406.jpg'),
(19, 'Kutu Fanta', '12', '9', '../../resimler/2408226867.jpg'),
(20, 'Şişe Kola', '8', '9', '../../resimler/2539627386.jpg'),
(21, 'Şişe Fanta', '8', '9', '../../resimler/2721031234.jpg'),
(22, 'Kutu Sprite', '12', '9', '../../resimler/2596824489.jpg'),
(23, 'Şişe Gazoz', '8', '9', '../../resimler/2406226765.jpg'),
(24, 'Fuse Tea', '12', '9', '../../resimler/2544622822.jpg'),
(25, 'Meyveli Soda', '7', '9', '../../resimler/2051728598.jpg'),
(26, 'Sade Soda', '5', '9', '../../resimler/2767526261.jpg'),
(27, 'Churchill ', '10', '9', '../../resimler/2886730541.jpg'),
(28, 'Meyve İçecekli Atom', '15', '9', '../../resimler/3050624496.jpg'),
(29, 'Redbull', '15', '9', '../../resimler/2156126225.jpg'),
(30, 'Redbull Atom', '20', '9', '../../resimler/2858030891.jpg'),
(31, 'Su', '3', '9', '../../resimler/2415024991.jpg'),
(32, 'Ayran', '5', '9', '../../resimler/2904127686.jpg'),
(33, 'Nargile', '50', '10', '../../resimler/2939923875.jpg'),
(34, 'Nescafe', '10', '8', '../../resimler/3143824393.jpg'),
(35, 'Cips Çeşitleri', '12', '12', '../../resimler/2692831739.jpg'),
(36, 'Kek Çeşitleri', '6', '12', '../../resimler/2379422853.jpg'),
(37, 'Çikolata Çeşitleri', '7', '12', '../../resimler/3160824823.jpg'),
(38, 'Sade Tost', '20', '11', '../../resimler/2966924679.jpg'),
(39, 'Karışık Tost', '25', '11', '../../resimler/2278126530.jpg'),
(40, 'Kavurmalı Tost', '30', '11', '../../resimler/2727622114.jpg'),
(41, 'Omlet', '20', '11', '../../resimler/2160827210.jpg'),
(42, 'Sucuklu Yumurta', '25', '11', '../../resimler/2133223295.jpg'),
(43, 'Kavurmalı Yumurta', '30', '11', '../../resimler/2080427613.jpg'),
(44, 'Patates Kızartması', '18', '11', '../../resimler/2853429921.jpg'),
(45, 'Sıcak Sepeti', '30', '11', '../../resimler/2364224003.jpg'),
(46, 'Köfte', '40', '11', '../../resimler/2126621124.jpg'),
(47, 'Hamburger', '35', '11', '../../resimler/2278730543.jpg'),
(48, 'Köri Soslu Tavuk ', '40', '11', '../../resimler/2434920479.jpg'),
(49, 'Akdeniz Salatası', '30', '11', '../../resimler/2658827291.jpg'),
(50, 'Kuruyemiş', '25', '12', '../../resimler/2062226620.jpg'),
(51, 'Yaş Pasta Çeşitleri', '25', '12', '../../resimler/2191226552.jpg'),
(52, 'Kıyma Soslu Makarna', '35', '11', '../../resimler/2552623626.jpg'),
(53, 'Kremalı Makarna', '30', '11', '../../resimler/2045430708.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ausers`
--
ALTER TABLE `ausers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bilardomasa`
--
ALTER TABLE `bilardomasa`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cafemasa`
--
ALTER TABLE `cafemasa`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gelir`
--
ALTER TABLE `gelir`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `masaurunler`
--
ALTER TABLE `masaurunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ausers`
--
ALTER TABLE `ausers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `bilardomasa`
--
ALTER TABLE `bilardomasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `cafemasa`
--
ALTER TABLE `cafemasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `gelir`
--
ALTER TABLE `gelir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `masaurunler`
--
ALTER TABLE `masaurunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
