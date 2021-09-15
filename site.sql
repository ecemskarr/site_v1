-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Eyl 2021, 14:28:01
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `site`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anasayfa`
--

CREATE TABLE `anasayfa` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `anasayfa`
--

INSERT INTO `anasayfa` (`id`, `baslik`, `aciklama`) VALUES
(2, 'ECEM SIKAR TİC LTD ŞTİ', 'Yazılım hizmetleriii');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_baslik`, `site_logo`) VALUES
(1, 'deneme12', 'foto1.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `galeri`
--

INSERT INTO `galeri` (`id`, `resim`, `aciklama`) VALUES
(1, 'logo.jpg', 'deneme123'),
(2, 'logo.jpg', 'deneme12'),
(3, 'logo.jpg', 'deneme12'),
(4, 'foto2.jpg', 'Puma Spor Ayakkabı'),
(8, 'foto1.jpg', 'deneme');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haber`
--

CREATE TABLE `haber` (
  `id` int(11) NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `zaman` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `haber`
--

INSERT INTO `haber` (`id`, `resim`, `baslik`, `aciklama`, `zaman`) VALUES
(2, 'foto1.jpg', 'haber başlık deneme', '<p>haber içerik denemeeeee</p>\r\n', '2021-09-12 15:03:03'),
(3, 'foto2.jpg', 'haber başlığı test', '<p>haber i&ccedil;erik test</p>\r\n', '2021-09-12 15:35:41'),
(4, 'foto1.jpg', 'test', '<p>test</p>\r\n', '2021-09-13 09:51:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `id` int(11) NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `video` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `aciklama`, `video`) VALUES
(1, '<h2><strong>HAKKIMDA</strong></h2>\r\n\r\n<p><em>Buraya neden lorem geliyor. Deneme.</em></p>\r\n\r\n<h2 style=\"font-style:italic\"><strong>KURUMSAL</strong></h2>\r\n\r\n<ol>\r\n	<li>Bilgi, teknik</li>\r\n</ol>\r\n', '67hFHk7M5u8      ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetlerimiz`
--

CREATE TABLE `hizmetlerimiz` (
  `hizmetID` int(11) NOT NULL,
  `hizmetAdi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `hizmetAciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hizmetlerimiz`
--

INSERT INTO `hizmetlerimiz` (`hizmetID`, `hizmetAdi`, `hizmetAciklama`) VALUES
(2, 'yazılım', 'yazılımmm'),
(3, '7/24 destek', '7/24 destek'),
(5, 'wordpress', 'wordpress site yapımı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `tel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `map` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `google` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `tel`, `email`, `adres`, `map`, `facebook`, `twitter`, `google`) VALUES
(1, '+90 532 390 73 31', 'info@stepsoftyazilim.com', 'Çekmece, Empire Sitesi Yanı Sınav Koleji Karşısı, 522.Sokak No:1 Kat:3, 31141 Defne/Hatay', 'pb=!1m18!1m12!1m3!1d3218.9972984151436!2d36.12165861462192!3d36.21526060810724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1525c38e1c7a5491%3A0xb9110e4988275745!2zU1RFUFNPRlQgWUFaSUxJTSBCxLBMxLDFnsSwTSBBU0FOU8OWUg!5e0!3m2!1str!2str!4v1631611484113', 'https://tr-tr.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `kategoriAd` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategoriAd`) VALUES
(1, 'İnşaat Sektörü'),
(2, 'Sağlık sektörü'),
(3, 'Sağlık Sektörü'),
(5, 'deneme'),
(9, 'test');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referans`
--

CREATE TABLE `referans` (
  `referans_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `referansAd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `referans`
--

INSERT INTO `referans` (`referans_id`, `kategori_id`, `referansAd`, `resim`) VALUES
(1, 2, 'denemedeneme1', 'foto5.png'),
(2, 1, 'türk telekomm', 'foto5.png'),
(4, 2, '3', 'foto4.png'),
(7, 1, 'test3', 'sedas61.png'),
(8, 1, 'test1', 'foto1.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `access_token` text COLLATE utf8_turkish_ci NOT NULL,
  `permissions` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `mail_confirmation` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL,
  `full_name` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `access_token`, `permissions`, `mail_confirmation`, `is_active`, `full_name`, `mail`, `phone`) VALUES
(1, 'ecem', '202cb962ac59075b964b07152d234b70', '', '1', 1, 1, '', 'ecemskarr@gmail.com', ''),
(5, 'root', '123456', '', '', 1, 0, '', 'root@gmail.com', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `anasayfa`
--
ALTER TABLE `anasayfa`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `haber`
--
ALTER TABLE `haber`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hizmetlerimiz`
--
ALTER TABLE `hizmetlerimiz`
  ADD PRIMARY KEY (`hizmetID`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `referans`
--
ALTER TABLE `referans`
  ADD PRIMARY KEY (`referans_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `haber`
--
ALTER TABLE `haber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `hizmetlerimiz`
--
ALTER TABLE `hizmetlerimiz`
  MODIFY `hizmetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `referans`
--
ALTER TABLE `referans`
  MODIFY `referans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
