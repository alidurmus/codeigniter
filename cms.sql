-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Kas 2019, 15:45:13
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cms`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands`
--

CREATE TABLE `brands` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT '',
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT '',
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brands`
--

INSERT INTO `brands` (`id`, `title`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(4, '<p>a<span style=\"background-color: rgb(255, 255, 0);\"><b>naysaslkdfhsldkfhdflkj lkasj</b></span>dflksasjdlk alk lkasdalksjd</p>', '<p>iletimsisdmidsmf sidmfisdmsdifms imsdfisdmismd </p>', 0, 1, '2017-12-29 08:04:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `courses`
--

CREATE TABLE `courses` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `courses`
--

INSERT INTO `courses` (`id`, `url`, `title`, `description`, `img_url`, `event_date`, `rank`, `isActive`, `createdAt`) VALUES
(2, 'codeigniter-4-egitimi-2', 'Codeigniter 4 Eğitimi 2', '<p>Bu eğitimde codeigniter ile ilgili birçok kavramı elden geçireceğiz..</p>', 'videosinif-proje.png', '2018-02-24 12:00:00', 0, 1, '2017-12-29 00:41:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `protocol` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `host` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `port` varchar(10) COLLATE utf8_turkish_ci DEFAULT '',
  `user` varchar(100) COLLATE utf8_turkish_ci DEFAULT '',
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT '',
  `from` varchar(100) COLLATE utf8_turkish_ci DEFAULT '',
  `to` varchar(100) COLLATE utf8_turkish_ci DEFAULT '',
  `user_name` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `email_settings`
--

INSERT INTO `email_settings` (`id`, `protocol`, `host`, `port`, `user`, `password`, `from`, `to`, `user_name`, `isActive`, `createdAt`) VALUES
(2, 'smtp', 'ssl://smtp.gmail.com', '465', 'mailkedisi@gmail.com', '123456', 'mailkedisi@gmail.com', 'mailkedisi@gmail.com', 'CMS', 1, '2018-01-14 14:57:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `files`
--

CREATE TABLE `files` (
  `id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `files`
--

INSERT INTO `files` (`id`, `gallery_id`, `url`, `rank`, `isActive`, `createdAt`) VALUES
(1, 11, 'uploads/galleries_v/files/kataloglarimiz/web-tasarim-fiyat-teklifi.pdf', 1, 0, '2018-01-06 21:38:13'),
(4, 11, 'uploads/galleries_v/files/kataloglarimiz/nodejs-icerik.docx', 0, 1, '2018-01-06 22:05:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `final_gorsel`
--

CREATE TABLE `final_gorsel` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `adi` varchar(15) NOT NULL,
  `uygun` varchar(15) NOT NULL,
  `sartli` varchar(15) NOT NULL,
  `kaldi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `final_gorsel`
--

INSERT INTO `final_gorsel` (`id`, `form_id`, `adi`, `uygun`, `sartli`, `kaldi`) VALUES
(1, 9, '1', '1', '1', '1'),
(2, 17, '12', '13', '15', '16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `final_kontrol`
--

CREATE TABLE `final_kontrol` (
  `id` int(11) NOT NULL,
  `urun_adi` int(11) NOT NULL,
  `lot` varchar(15) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `barkod` int(11) NOT NULL,
  `kontrol_no` int(11) NOT NULL,
  `kontrol_eden` int(11) NOT NULL,
  `kutu_no` varchar(15) NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `final_kontrol`
--

INSERT INTO `final_kontrol` (`id`, `urun_adi`, `lot`, `tarih`, `barkod`, `kontrol_no`, `kontrol_eden`, `kutu_no`, `aciklama`) VALUES
(1, 1, '123', '2019-10-26 15:09:05', 123, 3, 1, '1', 'sadasd'),
(2, 1, '1111', '2019-10-26 16:44:43', 12312, 11, 1, '12', 'asdasd'),
(3, 1, '333', '2019-10-26 16:47:14', 11, 12, 1, '11111', '1asdas');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `final_olcum`
--

CREATE TABLE `final_olcum` (
  `id` int(11) NOT NULL,
  `adi` varchar(25) NOT NULL,
  `olcu` varchar(15) NOT NULL,
  `deger` varchar(15) NOT NULL,
  `tolerans` varchar(15) NOT NULL,
  `final_id` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `final_olcum`
--

INSERT INTO `final_olcum` (`id`, `adi`, `olcu`, `deger`, `tolerans`, `final_id`, `tarih`, `aciklama`) VALUES
(1, 'K01', '1', '1', '1', 1, '2019-10-26 14:59:08', 'açıklama');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `gallery_type` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `folder_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `galleries`
--

INSERT INTO `galleries` (`id`, `url`, `title`, `gallery_type`, `folder_name`, `isActive`, `createdAt`, `rank`) VALUES
(1, '/yilbasi-partisi', 'Yılbaşı Partisi', 'image', 'yilbasi-partisi', 1, NULL, 2),
(3, 'https://www.youtube.com/embed/2eZRRRiPQo8222', 'Yılbaşı Özel Konsepti', 'image', 'yilbasi-ozel-konsepti', 1, '2018-01-03 22:27:53', 0),
(9, 'videosinif-egitimleri', 'VideoSinif Eğitimleri', 'image', 'videosinif-egitimleri', 1, '2018-01-03 23:53:09', 1),
(10, 'youtube-kanali', 'Youtube Kanalı', 'video', '', 1, '2018-01-04 00:06:52', 0),
(11, 'kataloglarimiz', 'Kataloglarımız', 'file', 'kataloglarimiz', 1, '2018-01-04 00:07:06', 0),
(12, 'bayram-resimleri', 'Bayram Resimleri', 'image', 'bayram-resimleri', 1, '2018-01-06 23:32:37', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `girdi_gorsel`
--

CREATE TABLE `girdi_gorsel` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `adi` varchar(15) NOT NULL,
  `uygun` varchar(15) NOT NULL,
  `sartli` varchar(15) NOT NULL,
  `kaldi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `girdi_gorsel`
--

INSERT INTO `girdi_gorsel` (`id`, `form_id`, `adi`, `uygun`, `sartli`, `kaldi`) VALUES
(1, 9, '1', '1', '1', '1'),
(2, 17, '12', '13', '15', '16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `girdi_kontrol`
--

CREATE TABLE `girdi_kontrol` (
  `id` int(11) NOT NULL,
  `malzeme` int(11) NOT NULL,
  `tedarikci` int(11) NOT NULL,
  `irsaliye` varchar(15) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parti_no` varchar(15) NOT NULL,
  `kontrol_no` int(11) NOT NULL,
  `aciklama` text NOT NULL,
  `kullanici` int(11) NOT NULL,
  `sonuc` varchar(15) NOT NULL,
  `olcum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `girdi_kontrol`
--

INSERT INTO `girdi_kontrol` (`id`, `malzeme`, `tedarikci`, `irsaliye`, `tarih`, `parti_no`, `kontrol_no`, `aciklama`, `kullanici`, `sonuc`, `olcum`) VALUES
(34, 2, 2, '1', '1989-11-23 00:00:00', '1', 1, '', 1, '1', '{\"olcum\":{\"k1\":{\"adi\":\"Nihil hic eligendi o\",\"olcu\":\"96\",\"tolerans\":\"18\",\"alt_limit\":\"100\",\"ust_limit\":\"47\",\"olcum\":\"80\",\"sonuc\":\"Earum elit quia ips\",\"kontrol_noktasi\":\"Fugiat alias sequi \",\"gorsel\":\"3\"},\"k2\":{\"adi\":\"Ipsum vel rem nulla \",\"olcu\":\"22\",\"tolerans\":\"57\",\"alt_limit\":\"66\",\"ust_limit\":\"24\",\"olcum\":\"54\",\"sonuc\":\"Consequat Et incidu\",\"kontrol_noktasi\":\"Aut est ea iusto exc\",\"gorsel\":\"1\"},\"k3\":{\"adi\":\"Consequatur minima o\",\"olcu\":\"28\",\"tolerans\":\"99\",\"alt_limit\":\"27\",\"ust_limit\":\"10\",\"olcum\":\"81\",\"sonuc\":\"Debitis qui commodo \",\"kontrol_noktasi\":\"Temporibus dolor acc\",\"gorsel\":\"2\"},\"k4\":{\"adi\":\"Ducimus alias quide\",\"olcu\":\"34\",\"tolerans\":\"16\",\"alt_limit\":\"81\",\"ust_limit\":\"84\",\"olcum\":\"29\",\"sonuc\":\"Magni ut autem enim \",\"kontrol_noktasi\":\"Deleniti aspernatur \",\"gorsel\":\"3\"},\"k5\":{\"adi\":\"Facere quis eligendi\",\"olcu\":\"61\",\"tolerans\":\"1\",\"alt_limit\":\"76\",\"ust_limit\":\"79\",\"olcum\":\"85\",\"sonuc\":\"Accusantium qui fugi\",\"kontrol_noktasi\":\"Ut sint qui nesciunt\",\"gorsel\":\"3\"},\"k6\":{\"adi\":\"Rerum temporibus cup\",\"olcu\":\"59\",\"tolerans\":\"29\",\"alt_limit\":\"89\",\"ust_limit\":\"12\",\"olcum\":\"21\",\"sonuc\":\"Natus voluptatem nem\",\"kontrol_noktasi\":\"Autem aut pariatur \",\"gorsel\":\"3\"},\"k7\":{\"adi\":\"Fuga Minus labore o\",\"olcu\":\"68\",\"tolerans\":\"40\",\"alt_limit\":\"70\",\"ust_limit\":\"59\",\"olcum\":\"75\",\"sonuc\":\"Quo soluta minus ut \",\"kontrol_noktasi\":\"Facilis deleniti ame\",\"gorsel\":\"2\"},\"k8\":{\"adi\":\"Ipsam do magnam even\",\"olcu\":\"38\",\"tolerans\":\"12\",\"alt_limit\":\"84\",\"ust_limit\":\"27\",\"olcum\":\"86\",\"sonuc\":\"Neque est doloribus\",\"kontrol_noktasi\":\"Cum irure ratione mi\",\"gorsel\":\"3\"},\"k9\":{\"adi\":\"Consequatur fugiat \",\"olcu\":\"71\",\"tolerans\":\"89\",\"alt_limit\":\"1\",\"ust_limit\":\"2\",\"olcum\":\"8\",\"sonuc\":\"Dolor officia amet \",\"kontrol_noktasi\":\"Quos id et laborum\",\"gorsel\":\"2\"},\"k10\":{\"adi\":\"Corporis est consequ\",\"olcu\":\"8\",\"tolerans\":\"64\",\"alt_limit\":\"53\",\"ust_limit\":\"26\",\"olcum\":\"57\",\"sonuc\":\"Aliquid unde minim u\",\"kontrol_noktasi\":\"Et eu quia voluptas \",\"gorsel\":\"1\"},\"k11\":{\"adi\":\"A iure quas deserunt\",\"olcu\":\"2\",\"tolerans\":\"68\",\"alt_limit\":\"31\",\"ust_limit\":\"74\",\"olcum\":\"95\",\"sonuc\":\"Ad aliquam officiis \",\"kontrol_noktasi\":\"Nisi ipsum architect\",\"gorsel\":\"1\"},\"k12\":{\"adi\":\"Laborum a sequi veri\",\"olcu\":\"29\",\"tolerans\":\"14\",\"alt_limit\":\"94\",\"ust_limit\":\"94\",\"olcum\":\"52\",\"sonuc\":\"Voluptatum dolores s\",\"kontrol_noktasi\":\"Ut officia eligendi \",\"gorsel\":\"3\"},\"k13\":{\"adi\":\"Dolores do ratione c\",\"olcu\":\"69\",\"tolerans\":\"47\",\"alt_limit\":\"67\",\"ust_limit\":\"62\",\"olcum\":\"24\",\"sonuc\":\"Et omnis facilis pra\",\"kontrol_noktasi\":\"Magna quod quis sunt\",\"gorsel\":\"1\"},\"k14\":{\"adi\":\"Dicta earum sunt et \",\"olcu\":\"32\",\"tolerans\":\"74\",\"alt_limit\":\"17\",\"ust_limit\":\"81\",\"olcum\":\"42\",\"sonuc\":\"Excepteur autem nemo\",\"kontrol_noktasi\":\"Ad voluptas harum et\",\"gorsel\":\"3\"},\"k15\":{\"adi\":\"Id eligendi volupta\",\"olcu\":\"83\",\"tolerans\":\"91\",\"alt_limit\":\"28\",\"ust_limit\":\"6\",\"olcum\":\"53\",\"sonuc\":\"Ex deleniti sint ex \",\"kontrol_noktasi\":\"Excepteur esse volu\",\"gorsel\":\"2\"},\"k16\":{\"adi\":\"Tempor laudantium t\",\"olcu\":\"23\",\"tolerans\":\"43\",\"alt_limit\":\"61\",\"ust_limit\":\"92\",\"olcum\":\"25\",\"sonuc\":\"Dolores iusto est om\",\"kontrol_noktasi\":\"Fugiat voluptates no\",\"gorsel\":\"3\"}}}');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `girdi_olcum`
--

CREATE TABLE `girdi_olcum` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `en` varchar(15) NOT NULL,
  `boy` varchar(15) NOT NULL,
  `kalinlik` varchar(15) NOT NULL,
  `yukseklik` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `girdi_olcum`
--

INSERT INTO `girdi_olcum` (`id`, `form_id`, `en`, `boy`, `kalinlik`, `yukseklik`) VALUES
(1, 9, '1', '1', '1', '1'),
(2, 17, '12', '13', '15', '16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorsel_kontrol`
--

CREATE TABLE `gorsel_kontrol` (
  `id` int(11) NOT NULL,
  `final_id` int(11) NOT NULL,
  `girdi_id` int(11) NOT NULL,
  `proses_id` int(11) NOT NULL,
  `adi` varchar(15) NOT NULL,
  `uygun` varchar(15) NOT NULL,
  `sartli` varchar(15) NOT NULL,
  `kaldi` varchar(15) NOT NULL,
  `tarih` datetime NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `gorsel_kontrol`
--

INSERT INTO `gorsel_kontrol` (`id`, `final_id`, `girdi_id`, `proses_id`, `adi`, `uygun`, `sartli`, `kaldi`, `tarih`, `aciklama`) VALUES
(1, 9, 0, 0, '1', '1', '1', '1', '0000-00-00 00:00:00', ''),
(2, 17, 0, 0, '12', '13', '15', '16', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `gallery_id`, `url`, `rank`, `isActive`, `createdAt`) VALUES
(27, 12, 'uploads/galleries_v/images/bayram-resimleri/ekran-resmi-2018-01-03-23-52-59.png', 1, 1, '2018-01-06 23:32:59'),
(28, 12, 'uploads/galleries_v/images/bayram-resimleri/ekran-resmi-2018-01-03-23-52-34.png', 2, 1, '2018-01-06 23:32:59'),
(30, 12, 'uploads/galleries_v/images/bayram-resimleri/ekran-resmi-2018-01-04-00-09-58.png', 3, 1, '2018-01-06 23:32:59'),
(31, 3, 'logo.png', 0, 1, '2019-11-03 12:21:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `is_emri`
--

CREATE TABLE `is_emri` (
  `id` int(11) NOT NULL,
  `lot` varchar(15) NOT NULL,
  `urun` int(11) NOT NULL,
  `musteri` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `siparis_no` int(11) NOT NULL,
  `uretim_tarihi` date NOT NULL,
  `sevk_tarihi` date NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `is_emri`
--

INSERT INTO `is_emri` (`id`, `lot`, `urun`, `musteri`, `adet`, `siparis_no`, `uretim_tarihi`, `sevk_tarihi`, `tarih`) VALUES
(1, '19EKİM001', 1, 1, 19, 50, '2019-10-26', '2019-10-27', '2019-10-26 14:02:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kontrol_no`
--

CREATE TABLE `kontrol_no` (
  `id` int(11) NOT NULL,
  `process_isim` varchar(15) NOT NULL,
  `parti_no` int(11) NOT NULL,
  `lot_no` int(11) NOT NULL,
  `kutu_no` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kontrol_no`
--

INSERT INTO `kontrol_no` (`id`, `process_isim`, `parti_no`, `lot_no`, `kutu_no`, `tarih`) VALUES
(1, 'Girdi Kontrol', 0, 0, 0, '0000-00-00 00:00:00'),
(2, 'Process', 0, 0, 0, '0000-00-00 00:00:00'),
(3, 'Final', 0, 0, 0, '0000-00-00 00:00:00'),
(5, 'Girdi Kontrol', 0, 0, 0, '0000-00-00 00:00:00'),
(6, 'Girdi Kontrol', 0, 0, 0, '0000-00-00 00:00:00'),
(7, 'Girdi', 0, 0, 0, '0000-00-00 00:00:00'),
(8, 'Girdi', 0, 0, 0, '0000-00-00 00:00:00'),
(9, 'Girdi', 1, 0, 0, '2019-10-26 16:41:15'),
(10, 'Process', 321321, 123123, 0, '2019-10-26 16:43:24'),
(11, 'Final', 0, 1111, 0, '2019-10-26 16:44:56'),
(12, 'Final', 0, 333, 11111, '2019-10-26 16:47:35'),
(13, 'Girdi', 1, 0, 0, '2019-10-26 17:54:11'),
(14, 'girdikontrol', 55555, 0, 0, '2019-11-05 19:02:01'),
(15, 'girdikontrol', 11111, 0, 0, '2019-11-05 19:17:01'),
(16, 'girdikontrol', 11111, 0, 0, '2019-11-05 19:18:59'),
(17, 'girdikontrol', 11111, 0, 0, '2019-11-05 19:18:59'),
(18, 'girdikontrol', 11111, 0, 0, '2019-11-05 19:24:26'),
(19, 'girdikontrol', 11111, 0, 0, '2019-11-05 19:24:26'),
(20, 'girdikontrol', 11111, 0, 0, '2019-11-05 19:32:48'),
(21, 'girdikontrol', 11111, 0, 0, '2019-11-05 19:32:48'),
(22, 'girdikontrol', 11111, 0, 0, '2019-11-05 19:33:46'),
(23, 'girdikontrol', 11111, 0, 0, '2019-11-05 19:33:46'),
(24, 'girdikontrol', 11111, 0, 0, '2019-11-05 19:35:36'),
(25, 'girdikontrol', 11111, 0, 0, '2019-11-05 19:35:36'),
(26, 'girdikontrol', 11111, 0, 0, '2019-11-05 20:04:54'),
(27, 'girdikontrol', 11111, 0, 0, '2019-11-05 20:04:54'),
(28, 'girdikontrol', 6666, 0, 0, '2019-11-05 20:06:10'),
(29, 'girdikontrol', 6666, 0, 0, '2019-11-05 20:06:10'),
(30, 'girdikontrol', 7777, 0, 0, '2019-11-05 20:06:47'),
(31, 'girdikontrol', 7777, 0, 0, '2019-11-05 20:06:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `adi` varchar(25) NOT NULL,
  `sifre` varchar(20) NOT NULL,
  `rol` int(11) NOT NULL,
  `isActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `adi`, `sifre`, `rol`, `isActive`) VALUES
(1, 'Kalite', '123456', 1, 1),
(2, 'Planlama', '123456', 1, 1),
(3, 'Arge', '123456', 1, 1),
(4, 'Yonetim', '123456', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `malzemeler`
--

CREATE TABLE `malzemeler` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) NOT NULL,
  `kodu` varchar(15) NOT NULL,
  `firma` varchar(120) NOT NULL,
  `isActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `malzemeler`
--

INSERT INTO `malzemeler` (`id`, `adi`, `kodu`, `firma`, `isActive`) VALUES
(1, 'Malzeme 1', '1234567890', 'MALZEME FİRMA', 1),
(2, 'Malzeme 2', '1234567890', 'MALZEME FİRMA', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

CREATE TABLE `members` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `id` int(11) NOT NULL,
  `adi` varchar(25) NOT NULL,
  `kodu` varchar(25) NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`id`, `adi`, `kodu`, `aciklama`) VALUES
(1, 'Musteri 1', '123', 'açıklama'),
(2, 'Musteri 2', '123', 'açıklama');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `news_type` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `start` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `url`, `title`, `description`, `news_type`, `img_url`, `video_url`, `rank`, `count`, `isActive`, `createdAt`, `start`) VALUES
(2, 'iphonex-satislari-beklenilenin-altindaaaaaa', 'iphoneX Satışları Beklenilenin altındaaaaaa', '<p>iphoneX Satışları <b>Beklenilenin altındaaaaaaaa</b><br></p>', 'image', 'ipphone8.jpeg', '#', 1, 0, 1, '2017-12-25 22:59:32', 0),
(3, 'kablosuzkedi-den-yeni-bir-egitim-serisi-geldi-like/dislike', 'kablosuzkedi den yeni bir egitim serisi geldi like/dislike', '<p>kablosuzkedi den yeni bir egitim serisi geldi like/dislike<br></p>', 'image', 'kablosuzkedi-2-768x858.png', '#', 0, 0, 1, '2017-12-25 23:02:02', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `olcu_kontrol`
--

CREATE TABLE `olcu_kontrol` (
  `id` int(11) NOT NULL,
  `adi` varchar(25) NOT NULL,
  `olcu` varchar(15) NOT NULL,
  `deger` varchar(15) NOT NULL,
  `tolerans` varchar(15) NOT NULL,
  `final_id` int(11) NOT NULL,
  `girdi_id` int(11) NOT NULL,
  `proses_id` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aciklama` text NOT NULL,
  `urun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `olcu_kontrol`
--

INSERT INTO `olcu_kontrol` (`id`, `adi`, `olcu`, `deger`, `tolerans`, `final_id`, `girdi_id`, `proses_id`, `tarih`, `aciklama`, `urun_id`) VALUES
(1, 'K01', '1', '1', '1', 1, 0, 0, '2019-10-26 14:59:08', 'açıklama', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `popups`
--

CREATE TABLE `popups` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `page` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `finishedAt` datetime DEFAULT NULL,
  `client` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `place` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `portfolio_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolios`
--

INSERT INTO `portfolios` (`id`, `url`, `title`, `description`, `finishedAt`, `client`, `category_id`, `place`, `portfolio_url`, `rank`, `isActive`, `createdAt`) VALUES
(2, 'abc-bilgisayarin-yazilim-isi-1', 'ABC Bilgisayarın Yazılım İşi 1', '                            <p>yok yok yok yok 11111</p>                        ', '2018-01-17 04:03:02', 'ABC Bilgisayar 2', 1, 'İstanbul 1', 'http://gokhankandemir.com 1', 0, 1, '2018-01-15 19:10:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `title`, `isActive`, `createdAt`) VALUES
(1, 'Web Tasarım', 0, NULL),
(2, 'Yazılım', 1, '2018-01-15 16:08:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolio_images`
--

CREATE TABLE `portfolio_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `portfolio_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(11) DEFAULT NULL,
  `isCover` tinyint(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolio_images`
--

INSERT INTO `portfolio_images` (`id`, `portfolio_id`, `img_url`, `rank`, `isActive`, `isCover`, `createdAt`) VALUES
(1, 2, 'cards-business.png', 2, 1, 0, '2018-01-15 20:58:58'),
(3, 2, 'cards-photography.png', 1, 1, 0, '2018-01-15 20:58:58'),
(4, 2, 'cards-software.png', 0, 1, 1, '2018-01-15 20:58:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `url`, `title`, `description`, `rank`, `isActive`, `createdAt`) VALUES
(2, 'deneme-url-2', 'Deneme Ürünü 2', 'Bu bir deneme ürünü aciklamasidir 2', 4, 1, NULL),
(6, 'monitor-askisi-50-45-cm-buyuklugundedir', 'Monitör Askısı 50.45 cm büyüklüğündedir', '<p>test amacli üretildi..</p>', 1, 1, '2017-12-14 00:43:46'),
(9, 'testt-testt', 'testt testt', '<p>alert denemesidier..</p>', 2, 1, '2017-12-20 01:22:10'),
(11, 'asda', 'asda', '<p>sdsdsds</p>', 3, 1, '2017-12-20 01:24:32'),
(12, 'mantar-tablo', 'Mantar Tablo', 'Bu tablo o kadar güzel bir tablodur ki!!!', 0, 1, '2018-01-11 13:39:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(11) DEFAULT NULL,
  `isCover` tinyint(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `img_url`, `rank`, `isActive`, `isCover`, `createdAt`) VALUES
(44, NULL, 'kablosuzkedi-2-768x858.png', 15, 0, 0, '2017-12-29 08:22:07'),
(45, NULL, 'videosinif-proje.png', 14, 0, 0, '2017-12-29 08:22:07'),
(46, NULL, 'ipphone8.jpeg', 0, 1, 0, '2017-12-29 08:25:35'),
(47, 6, 'ekran-resmi-2017-12-30-00-23-49--2-.png', 0, 1, 0, '2018-01-06 20:02:16'),
(48, 6, 'ekran-resmi-2017-12-30-00-26-11--2-.png', 2, 1, 0, '2018-01-06 20:02:16'),
(49, 6, 'ekran-resmi-2017-12-30-00-26-19--2-.png', 3, 1, 0, '2018-01-06 20:02:16'),
(50, 6, 'ekran-resmi-2017-12-30-00-27-36--2-.png', 1, 1, 0, '2018-01-06 20:02:16'),
(51, 12, 'ekran-resmi-2018-01-05-23-44-19--2-.png', 1, 1, 0, '2018-01-11 13:39:57'),
(52, 12, 'ekran-resmi-2018-01-05-23-44-19.png', 2, 1, 0, '2018-01-11 13:39:57'),
(53, 12, 'ekran-resmi-2018-01-05-18-47-54.png', 0, 1, 0, '2018-01-11 13:39:57'),
(54, 12, 'ekran-resmi-2018-01-04-00-38-12.png', 3, 1, 1, '2018-01-11 13:39:57'),
(55, 12, 'ekran-resmi-2018-01-04-00-38-12--2-.png', 4, 1, 0, '2018-01-11 13:39:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proses_gorsel`
--

CREATE TABLE `proses_gorsel` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `adi` varchar(15) NOT NULL,
  `uygun` varchar(15) NOT NULL,
  `sartli` varchar(15) NOT NULL,
  `kaldi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `proses_gorsel`
--

INSERT INTO `proses_gorsel` (`id`, `form_id`, `adi`, `uygun`, `sartli`, `kaldi`) VALUES
(1, 9, '1', '1', '1', '1'),
(2, 17, '12', '13', '15', '16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proses_kontrol`
--

CREATE TABLE `proses_kontrol` (
  `id` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kontrol_eden` int(11) NOT NULL,
  `malzeme` int(11) NOT NULL,
  `urun` int(11) NOT NULL,
  `lot` varchar(15) NOT NULL,
  `parti_no` varchar(25) NOT NULL,
  `kontrol_no` varchar(15) NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `proses_kontrol`
--

INSERT INTO `proses_kontrol` (`id`, `tarih`, `kontrol_eden`, `malzeme`, `urun`, `lot`, `parti_no`, `kontrol_no`, `aciklama`) VALUES
(1, '2019-10-26 14:54:14', 1, 1, 1, '123', '12313', '2', 'açıklama'),
(2, '2019-10-26 16:43:12', 1, 1, 1, '123123', '321321', '10', 'asdasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proses_olcum`
--

CREATE TABLE `proses_olcum` (
  `id` int(11) NOT NULL,
  `adi` varchar(25) NOT NULL,
  `olcu` varchar(15) NOT NULL,
  `deger` varchar(15) NOT NULL,
  `tolerans` varchar(15) NOT NULL,
  `process_id` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `proses_olcum`
--

INSERT INTO `proses_olcum` (`id`, `adi`, `olcu`, `deger`, `tolerans`, `process_id`, `tarih`, `aciklama`) VALUES
(2, 'K01', '1', '1', '1', 1, '2019-10-26 15:52:19', 'asdasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `references`
--

CREATE TABLE `references` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `references`
--

INSERT INTO `references` (`id`, `url`, `title`, `description`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(2, 'bu-bir-deneme-referans-bilgisidir---2', 'bu bir deneme referans bilgisidir.. 2', '<p>asdasdasd bu refransimiza cok güveniyoruz.. 2</p>', 'videosinif-proje.png', 1, 1, '2017-12-27 00:18:34');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roller`
--

CREATE TABLE `roller` (
  `id` int(11) NOT NULL,
  `adi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `roller`
--

INSERT INTO `roller` (`id`, `adi`) VALUES
(1, 'Kalite Kontrol'),
(2, 'Planlama'),
(3, 'Operatör'),
(4, 'Yönetim'),
(5, 'Arge');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `url`, `title`, `description`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(2, 'makyaj', 'Makyaj', '<p>majyaz hizmetimiz 10 kişilik personellerimiz tarafından verilmektedir.</p>', 'kurs1.jpg', 0, 1, '2018-01-15 15:40:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `address` text COLLATE utf8_turkish_ci,
  `about_us` longtext COLLATE utf8_turkish_ci,
  `mission` longtext COLLATE utf8_turkish_ci,
  `vision` longtext COLLATE utf8_turkish_ci,
  `logo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mobile_logo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone_1` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone_2` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fax_1` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fax_2` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `lat` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `long` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `homepage_references_description` text COLLATE utf8_turkish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `slogan`, `address`, `about_us`, `mission`, `vision`, `logo`, `mobile_logo`, `favicon`, `phone_1`, `phone_2`, `fax_1`, `fax_2`, `email`, `facebook`, `twitter`, `instagram`, `linkedin`, `lat`, `long`, `createdAt`, `updatedAt`, `homepage_references_description`) VALUES
(1, 'Form İşlem', NULL, '                                        <p>asdsadad</p>                                    ', '                                        <p>ssadad</p>                                    ', '                                        <p>asdasdad</p>                                    ', '                                        <p>asdada</p>                                    ', 'asdada.png', 'asdada.png', 'asdada.png', '2131231', '12313', '12313131', '12313131', 'gokhan@gkandemir.com', 'https://www.facebook.com/loocasoft', 'https://www.twitter.com/loocasoft', 'https://www.facebook.com/loocasoft', 'https://www.linkedin.com/in/loocasoft', NULL, NULL, '2018-05-09 20:57:16', '2019-11-02 17:57:17', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slides`
--

CREATE TABLE `slides` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `allowButton` tinyint(4) DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `button_caption` varchar(25) COLLATE utf8_turkish_ci DEFAULT NULL,
  `animation_type` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `animation_time` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tedarikciler`
--

CREATE TABLE `tedarikciler` (
  `id` int(11) NOT NULL,
  `adi` varchar(120) NOT NULL,
  `kodu` varchar(15) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tedarikciler`
--

INSERT INTO `tedarikciler` (`id`, `adi`, `kodu`, `isActive`) VALUES
(1, 'Tedarikçi Firma 1', '12345789', 1),
(2, 'Tedarikçi Firma 2', '12345789', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `company` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` tinyint(4) DEFAULT '-99',
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `description`, `full_name`, `company`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(1, 'Muazzam', 'Gerçekten mükemmel iş çıkartmışsınız', 'Gökhan Kandemir', 'VideoSınıf', '10531396-10152394756859998-380871812882375062-o.jpg', -99, 1, '2018-05-08 22:08:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `adi` varchar(25) NOT NULL,
  `kodu` varchar(25) NOT NULL,
  `aciklama` text NOT NULL,
  `barkod` varchar(25) NOT NULL,
  `isActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `adi`, `kodu`, `aciklama`, `barkod`, `isActive`) VALUES
(1, 'urun 1', '1345646', 'urun açıklaması', '1321548', 1),
(2, 'urun2', '1345646', 'urun açıklaması', '1321548', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `user_role_id` varchar(10) COLLATE utf8_turkish_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `email`, `password`, `isActive`, `createdAt`, `user_role_id`) VALUES
(1, 'alidurmus', 'Ali DURMUŞ', 'alidurmus1981@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, '1'),
(2, 'kalite', 'kalite', 'kalite@tempar.com.tr', 'e10adc3949ba59abbe56e057f20f883e', 1, '2018-01-08 22:40:53', '2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_turkish_ci,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user_roles`
--

INSERT INTO `user_roles` (`id`, `title`, `permissions`, `isActive`, `createdAt`) VALUES
(1, 'Admin', '{\"arge\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"brands\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"courses\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"emailsettings\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"etiketler\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"finalkontrol\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"galleries\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"girdikontrol\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"kalite\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"kontrol_no\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"kullanicilar\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"malzemeler\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"musteriler\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"news\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"planlama\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"popups\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"portfolio\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"portfolio_categories\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"products\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"proseskontrol\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"references\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"services\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"settings\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"slides\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"tedarikciler\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"testimonials\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"urunler\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"userop\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"welcome\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 1, '2018-07-04 00:16:24'),
(2, 'Kullanıcı', '{\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"girdikontrol\":{\"read\":\"on\",\"write\":\"on\"},\"kalite\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"userop\":{\"read\":\"on\"},\"users\":{\"read\":\"on\"}}', 1, '2018-07-04 00:16:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `videos`
--

CREATE TABLE `videos` (
  `id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `videos`
--

INSERT INTO `videos` (`id`, `gallery_id`, `url`, `rank`, `isActive`, `createdAt`) VALUES
(1, 10, 'https://www.youtube.com/embed/2eZRRRiPQo8', 1, 1, NULL),
(3, 10, 'https://www.youtube.com/embed/2eZRRRiPQo8', 0, 1, '2018-01-06 22:55:52');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `final_gorsel`
--
ALTER TABLE `final_gorsel`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `final_kontrol`
--
ALTER TABLE `final_kontrol`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `final_olcum`
--
ALTER TABLE `final_olcum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `girdi_gorsel`
--
ALTER TABLE `girdi_gorsel`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `girdi_kontrol`
--
ALTER TABLE `girdi_kontrol`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `girdi_olcum`
--
ALTER TABLE `girdi_olcum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gorsel_kontrol`
--
ALTER TABLE `gorsel_kontrol`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `is_emri`
--
ALTER TABLE `is_emri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kontrol_no`
--
ALTER TABLE `kontrol_no`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `malzemeler`
--
ALTER TABLE `malzemeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `olcu_kontrol`
--
ALTER TABLE `olcu_kontrol`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `popups`
--
ALTER TABLE `popups`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proses_gorsel`
--
ALTER TABLE `proses_gorsel`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proses_kontrol`
--
ALTER TABLE `proses_kontrol`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proses_olcum`
--
ALTER TABLE `proses_olcum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `roller`
--
ALTER TABLE `roller`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tedarikciler`
--
ALTER TABLE `tedarikciler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `final_gorsel`
--
ALTER TABLE `final_gorsel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `final_kontrol`
--
ALTER TABLE `final_kontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `final_olcum`
--
ALTER TABLE `final_olcum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `girdi_gorsel`
--
ALTER TABLE `girdi_gorsel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `girdi_kontrol`
--
ALTER TABLE `girdi_kontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `girdi_olcum`
--
ALTER TABLE `girdi_olcum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `gorsel_kontrol`
--
ALTER TABLE `gorsel_kontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `is_emri`
--
ALTER TABLE `is_emri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kontrol_no`
--
ALTER TABLE `kontrol_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `malzemeler`
--
ALTER TABLE `malzemeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `olcu_kontrol`
--
ALTER TABLE `olcu_kontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `popups`
--
ALTER TABLE `popups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `portfolio_images`
--
ALTER TABLE `portfolio_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Tablo için AUTO_INCREMENT değeri `proses_gorsel`
--
ALTER TABLE `proses_gorsel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `proses_kontrol`
--
ALTER TABLE `proses_kontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `proses_olcum`
--
ALTER TABLE `proses_olcum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `references`
--
ALTER TABLE `references`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `roller`
--
ALTER TABLE `roller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `tedarikciler`
--
ALTER TABLE `tedarikciler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
