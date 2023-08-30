-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2023 pada 07.59
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc112`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `counterdb`
--

CREATE TABLE `counterdb` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `counter` varchar(20) NOT NULL,
  `browser` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `counterdb`
--

INSERT INTO `counterdb` (`id`, `tanggal`, `ip_address`, `counter`, `browser`) VALUES
(43284, '2023-01-22 10:40:51', '36.93.164.161', '1', 'Chrome/Opera'),
(43285, '2023-01-23 23:37:56', '36.93.164.161', '1', 'Chrome/Opera'),
(43286, '2023-01-27 19:40:06', '36.93.164.161', '1', ''),
(43287, '2023-01-27 19:40:06', '36.93.164.161', '1', ''),
(43288, '2023-01-27 19:56:45', '36.93.164.161', '1', 'Chrome/Opera'),
(43289, '2023-01-29 13:29:06', '36.93.164.161', '1', 'Firefox'),
(43290, '2023-01-31 04:11:32', '36.93.164.161', '1', 'Firefox'),
(43291, '2023-02-13 22:05:39', '36.93.164.161', '1', 'Chrome/Opera'),
(43292, '2023-02-13 22:05:40', '36.93.164.161', '1', 'Chrome/Opera'),
(43293, '2023-02-17 23:16:15', '36.93.164.161', '1', 'Chrome/Opera'),
(43294, '2023-02-17 23:16:16', '36.93.164.161', '1', 'Chrome/Opera'),
(43295, '2023-02-19 12:21:22', '36.93.164.161', '1', 'Chrome/Opera');

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `nama_desa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id`, `id_kecamatan`, `nama_desa`) VALUES
(2, 1, 'Kalianget Timur'),
(3, 1, 'Kalianget Barat'),
(4, 1, 'Marengan Laok'),
(5, 1, 'Pinggirpapas'),
(6, 1, 'Karanganyar'),
(10, 1, 'Kertasada'),
(11, 1, 'Kalimook'),
(15, 13, 'Ambunten Timur'),
(16, 13, 'Ambunten Tengah'),
(17, 13, 'Ambunten Tengah'),
(18, 13, 'Ambunten Barat'),
(19, 13, 'Belluk Ares'),
(21, 13, 'Belluk Kenek'),
(22, 13, 'Belluk Raja'),
(23, 13, 'Bukabu'),
(24, 13, 'Campor Barat'),
(25, 13, 'Campor Timur'),
(26, 13, 'Tambaagung Ares'),
(27, 13, 'Tambaagung Barat'),
(28, 13, 'Tambaagung Timur'),
(29, 13, 'Tambaagung Tengah'),
(30, 13, 'Keles'),
(31, 13, 'Sogian'),
(32, 25, 'Angkatan'),
(33, 25, 'Angon Angon'),
(34, 25, 'Arjasa'),
(35, 25, 'Bilis Bilis'),
(36, 25, 'Buddi'),
(37, 25, 'Duko'),
(38, 25, 'Gelaman'),
(39, 25, 'Kalikatak'),
(40, 25, 'Kalinganyar'),
(41, 25, 'Kalisangka'),
(42, 25, 'Kolo Kolo'),
(43, 25, 'Laok Jangjang'),
(44, 25, 'Pabean'),
(45, 25, 'Pajanangger'),
(46, 25, 'Pandeman'),
(47, 25, 'Paseraman'),
(48, 25, 'Sambakati'),
(49, 25, 'Sawah Sumur'),
(50, 25, 'Sumbernangka'),
(51, 16, 'Banuaju Barat'),
(52, 16, 'Banuaju Timur'),
(53, 16, 'Batang Batang Daya'),
(54, 16, 'Batang Batang Laok'),
(55, 16, 'Bilangan'),
(56, 16, 'Dapenda'),
(57, 16, 'Jangkong'),
(58, 16, 'Jenangger'),
(59, 16, 'Kolpo'),
(60, 16, 'Legung Barat'),
(61, 16, 'Legung Timur'),
(62, 16, 'Lombang'),
(63, 16, 'Nyabakan Barat'),
(64, 16, 'Nyabakan Timur'),
(65, 16, 'Tamedung'),
(66, 16, 'Totosan'),
(67, 3, 'Babbalan'),
(68, 3, 'Batuan'),
(69, 3, 'Gedungan'),
(70, 3, 'Gelugur'),
(71, 3, 'Gunggung'),
(72, 3, 'Patean'),
(73, 3, 'Torbang'),
(74, 28, 'Aengmerah'),
(75, 28, 'Badur'),
(76, 28, 'Bantelan'),
(77, 28, 'Batuputih Daya'),
(78, 28, 'Batuputih Kenek'),
(79, 28, 'Batuputih Laok'),
(80, 28, 'Bullaan'),
(81, 28, 'Gedang Gedang'),
(82, 28, 'Juruan Daya'),
(83, 28, 'Juruan Laok'),
(84, 28, 'Larangan Barma'),
(85, 28, 'Larangan Kerta'),
(86, 28, 'Sergang'),
(87, 28, 'Tengedan'),
(88, 8, 'Aengbaja Kenek'),
(89, 8, 'Aengbaja Raja'),
(90, 8, 'Aengdake'),
(91, 8, 'Bluto'),
(92, 28, 'Bungbungan'),
(93, 8, 'Errabu'),
(94, 8, 'Gilang'),
(95, 8, 'Ging Ging'),
(96, 8, 'Gulukmanjung'),
(97, 8, 'Kapedi'),
(98, 8, 'Karang Cempaka'),
(99, 8, 'Lobuk'),
(100, 8, 'Masaran'),
(101, 8, 'Pakandangan Barat'),
(102, 8, 'Pakandangan Sangra'),
(103, 8, 'Pakandangan Tengah'),
(104, 8, 'Palongan'),
(105, 8, 'Sera Barat'),
(106, 8, 'Sera Tengah'),
(107, 8, 'Sera Timur'),
(108, 11, 'Bates'),
(109, 11, 'Batubelah Barat'),
(110, 11, 'Batubelah Timur'),
(111, 11, 'Bringin'),
(112, 11, 'Dasuk Barat'),
(113, 11, 'Dasuk Laok'),
(114, 11, 'Dasuk Timur'),
(115, 11, 'Jelbudan'),
(116, 11, 'Kecer'),
(117, 11, 'Kerta Barat'),
(118, 11, 'Kerta Timur'),
(119, 11, 'Mantajun'),
(120, 11, 'Nyapar'),
(121, 11, 'Semaan'),
(122, 11, 'Slopeng'),
(123, 17, 'Bancamara'),
(124, 17, 'Banraas'),
(125, 17, 'Bicabi'),
(126, 17, 'Bungin Bungin'),
(127, 17, 'Bunpenang'),
(128, 17, 'Candi'),
(129, 17, 'Dungkek'),
(130, 17, 'Jadung'),
(131, 17, 'Lapa Daya'),
(132, 17, 'Lapa Laok'),
(133, 17, 'Lapa Taman'),
(134, 17, 'Romben Barat'),
(135, 17, 'Romben Guna'),
(136, 17, 'Romben Rana'),
(137, 17, 'Tamansare'),
(138, 6, 'Bataal Barat'),
(139, 6, 'Bataal Timur'),
(140, 6, 'Bilapora Barat'),
(141, 6, 'Bilapora Timur'),
(142, 6, 'Gadu Barat'),
(143, 6, 'Gadu Timur'),
(144, 6, 'Ganding'),
(145, 6, 'Ketawang Daleman'),
(146, 6, 'Ketawang Karay'),
(147, 6, 'Ketawang Larangan'),
(148, 6, 'Ketawang Parebaan'),
(149, 6, 'Rombiya Barat'),
(150, 6, 'Rombiya Timur'),
(151, 6, 'Talaga'),
(152, 15, 'Andulang'),
(153, 15, 'Baban'),
(154, 15, 'Banjar Barat'),
(155, 15, 'Banjar Timur'),
(156, 15, 'Batudinding'),
(157, 15, 'Beraji'),
(158, 15, 'Gapura Barat'),
(159, 15, 'Gapura Tengah'),
(160, 15, 'Gapura Timur'),
(161, 15, 'Gersik Putih'),
(162, 15, 'Grujugan'),
(163, 15, 'Karang Budi'),
(164, 15, 'Longos'),
(165, 15, 'Mandala'),
(166, 15, 'Palokloan'),
(167, 15, 'Panagan'),
(168, 15, 'Poja'),
(169, 30, 'Gayam'),
(170, 30, 'Gendang Barat'),
(171, 30, 'Gendang Timur'),
(172, 30, 'Jambuir'),
(173, 30, 'Kalowang'),
(174, 30, 'Karang Tengah'),
(175, 30, 'Nyamplong'),
(176, 30, 'Pancor'),
(177, 30, 'Prambanan'),
(178, 30, 'Tarebung'),
(179, 29, 'Aenganyar'),
(180, 29, 'Banbaru'),
(181, 29, 'Banmaleng'),
(182, 29, 'Bringsang'),
(183, 29, 'Galis'),
(184, 29, 'Gedugan'),
(185, 29, 'Jate'),
(186, 29, 'Lombang'),
(187, 9, 'Bakeyong'),
(188, 9, 'Batuampar'),
(189, 9, 'Bragung'),
(190, 9, 'Guluk Guluk'),
(191, 9, 'Ketawang Laok'),
(192, 9, 'Pananggungan'),
(193, 9, 'Payudan Daleman'),
(194, 9, 'Payudan Dundang'),
(195, 9, 'Payudan Karangsokon'),
(196, 9, 'Payudan Nangger'),
(197, 9, 'Pordapor'),
(198, 9, 'Tambuko'),
(199, 26, 'Batuputih'),
(200, 26, 'Cangkramaan'),
(201, 26, 'Daandung'),
(202, 26, 'Jukong Jukong'),
(204, 26, 'Kangayan'),
(205, 26, 'Saobi'),
(206, 26, 'Tembayangan'),
(207, 26, 'Timur Jangjang'),
(208, 26, 'Torjek'),
(209, 2, 'Pamolokan'),
(210, 2, 'Pangarangan'),
(211, 2, 'Kebonagung'),
(212, 2, 'Pandian'),
(213, 2, 'Kepanjin'),
(214, 2, 'Bangselok'),
(215, 2, 'Pajagalan'),
(216, 2, 'Babalan'),
(217, 2, 'Bangkal'),
(218, 2, 'Kacongan'),
(219, 2, 'Karangduak'),
(220, 2, 'Kebunan'),
(221, 2, 'Kolor'),
(222, 2, 'Marengan Daya'),
(223, 2, 'Paberasan'),
(224, 2, 'Pabian'),
(225, 2, 'Parsanga'),
(226, 5, 'Banaresep Barat'),
(227, 5, 'Banaresep Timur'),
(228, 5, 'Bilapora Reba'),
(229, 5, 'Cangkreng'),
(230, 5, 'Daramesta'),
(231, 5, 'Ellak Daya'),
(232, 5, 'Ellak Laok'),
(233, 5, 'Jambu'),
(234, 5, 'Kambingan Barat'),
(235, 5, 'Lembung Barat'),
(236, 5, 'Lembung Timur'),
(237, 5, 'Lenteng Barat'),
(238, 5, 'Lenteng Timur'),
(239, 5, 'Meddelan'),
(240, 5, 'Moncek Barat'),
(241, 5, 'Moncek Tengah'),
(242, 5, 'Moncek Timur'),
(243, 5, 'Poreh'),
(244, 5, 'Sendir'),
(245, 5, 'Tarogan'),
(246, 4, 'Gadding'),
(247, 4, 'Giring'),
(248, 4, 'Gunung Kembar'),
(249, 4, 'Jabaan'),
(250, 4, 'Kasengan'),
(251, 4, 'Lalangon'),
(252, 4, 'Lanjuk'),
(253, 4, 'Manding Daya'),
(254, 4, 'Manding Laok'),
(255, 4, 'Manding Timur'),
(256, 4, 'Tenonan'),
(257, 27, 'Karamian'),
(258, 27, 'Masakambing'),
(259, 27, 'Masalima'),
(260, 27, 'Sukajeruk'),
(261, 31, 'Nonggunong'),
(262, 31, 'Rosong'),
(263, 31, 'Sokarame Paseser'),
(264, 31, 'Sokarame Timur'),
(265, 31, 'Somber'),
(266, 31, 'Sonok'),
(267, 31, 'Talaga'),
(268, 31, 'Tanahmerah'),
(269, 14, 'Campaka'),
(270, 14, 'Lebeng Barat'),
(271, 14, 'Lebeng Timur'),
(272, 14, 'Montorna'),
(273, 14, 'Padangdangan'),
(274, 14, 'Panaongan'),
(275, 14, 'Pasongsongan'),
(276, 14, 'Prancak'),
(277, 14, 'Rajun'),
(278, 14, 'Soddara'),
(279, 10, 'Aengpanas'),
(280, 10, 'Jaddung'),
(281, 10, 'Kaduara Timur'),
(282, 10, 'Karduluk'),
(283, 10, 'Larangan Pereng'),
(284, 10, 'Pakamban Daya'),
(285, 10, 'Pakamban Laok'),
(286, 10, 'Pragaan Daya'),
(287, 10, 'Pragaan Laok'),
(288, 10, 'Prenduan'),
(289, 10, 'Rombasan'),
(290, 10, 'Sendang'),
(291, 10, 'Sentol Daya'),
(292, 10, 'Sentol Laok'),
(293, 32, 'Alasmalang'),
(294, 32, 'Brakas'),
(295, 32, 'Guwa Guwa'),
(296, 32, 'Jungkat'),
(297, 32, 'Karangnangka'),
(298, 32, 'Kropoh'),
(299, 32, 'Ketupat'),
(300, 32, 'Poteran'),
(301, 32, 'Tonduk'),
(302, 12, 'Banasare'),
(303, 12, 'Basoka'),
(304, 12, 'Bunbarat'),
(305, 12, 'Duko'),
(306, 12, 'Kalebengan'),
(307, 12, 'Karangnangka'),
(308, 12, 'Mandala'),
(309, 12, 'Matanair'),
(310, 12, 'Pakondang'),
(311, 12, 'Rubaru'),
(312, 12, 'Tambaksari'),
(313, 24, 'Pagerungan Besar'),
(314, 24, 'Pagerungan Kecil'),
(315, 24, 'Paliat'),
(316, 24, 'Sabuntan'),
(317, 24, 'Sakala'),
(318, 24, 'Sapeken'),
(319, 24, 'Saseel'),
(320, 24, 'Sepanjang'),
(321, 24, 'Tanjungkiaok'),
(322, 7, 'Aengtongtong'),
(323, 7, 'Juluk'),
(324, 7, 'Kambingan Timur'),
(325, 7, 'Kebundadap Barat'),
(326, 7, 'Kebundadap Timur'),
(327, 7, 'Langsar'),
(328, 7, 'Muangan'),
(329, 7, 'Nambakor'),
(330, 7, 'Pagarbatu'),
(331, 7, 'Saroka'),
(332, 7, 'Saronggi'),
(333, 7, 'Talang'),
(334, 7, 'Tanah Merah'),
(335, 7, 'Tanjung'),
(336, 18, 'Cabbiya'),
(337, 18, 'Essang'),
(338, 18, 'Gapurana'),
(339, 18, 'Kombang'),
(340, 18, 'Padike'),
(341, 18, 'Palasa'),
(342, 18, 'Poteran'),
(343, 18, 'Talango');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dusun`
--

CREATE TABLE `dusun` (
  `id` int(11) NOT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `nama_dusun` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dusun`
--

INSERT INTO `dusun` (`id`, `id_desa`, `nama_dusun`) VALUES
(8, 281, 'Pesisir'),
(9, 281, 'Panggulan'),
(10, 281, 'Gunung'),
(11, 290, 'Sendang Timur'),
(12, 290, 'Sendang Barat'),
(13, 290, 'Duwak Pakak'),
(14, 289, 'Kolor'),
(15, 289, 'Kembang'),
(16, 292, 'Lembanah'),
(17, 287, 'Tengginah'),
(18, 283, 'Tengginah'),
(19, 283, 'Lembanah'),
(20, 283, 'Sumber Gentong'),
(21, 283, 'Taretah'),
(22, 283, 'Muccol'),
(23, 283, 'Kerrem'),
(24, 291, 'Masaran'),
(25, 291, 'Sabidak'),
(26, 291, 'Nong Bunter'),
(27, 291, 'Bates'),
(28, 284, 'Panggung'),
(29, 284, 'Tengger'),
(30, 284, 'Preng Tale'),
(31, 284, 'Bakburu'),
(32, 284, 'Telaga'),
(33, 284, 'Preng Alas'),
(34, 284, 'Tambak'),
(35, 284, 'Nong Bunter'),
(36, 285, 'Galis'),
(37, 285, 'Talon'),
(38, 285, 'Kacangan'),
(39, 285, 'Karang Dalem'),
(40, 280, 'Ketapang'),
(41, 280, 'Ponjun'),
(42, 280, 'Galis'),
(43, 280, 'Malakah'),
(44, 280, 'Bulu'),
(45, 287, 'Aeng Soka'),
(46, 287, 'Maronggi Laok'),
(47, 287, 'Maronggi Daja'),
(48, 287, 'Dung Daja'),
(49, 287, 'Mornangka'),
(50, 286, 'Nongpote'),
(51, 286, 'Blumbang'),
(52, 286, 'Rembang'),
(53, 286, 'Bulu'),
(54, 286, 'Dandan'),
(55, 286, 'Batu Jaran'),
(56, 288, 'Pesisir'),
(57, 288, 'Tamanan'),
(58, 288, 'Onggaan'),
(59, 288, 'Ceccek'),
(60, 288, 'Drusah'),
(61, 288, 'Pangelen'),
(62, 279, 'Pesisir'),
(63, 279, 'Nong Malang'),
(64, 279, 'Galis'),
(65, 279, 'Ceccek'),
(66, 282, 'Blajud'),
(67, 282, 'Somangkaan'),
(68, 282, 'Dunggaddung'),
(69, 282, 'Daleman'),
(70, 282, 'Rengperreng'),
(71, 282, 'Palalangan'),
(72, 282, 'Galis'),
(73, 282, 'Berruh'),
(74, 282, 'Moralas'),
(75, 282, 'Topoar'),
(76, 282, 'Bapelle'),
(77, 282, 'Madak'),
(78, 282, 'Bandungan'),
(79, 96, 'Sumber Pandan'),
(80, 96, 'Buraja'),
(81, 97, 'Biyan'),
(82, 97, 'Nyamplong'),
(83, 97, 'Barak Songai'),
(84, 97, 'Aeng Paak'),
(85, 97, 'Sasar'),
(86, 97, 'Aeng Bato'),
(87, 101, 'Pesisir'),
(88, 101, 'Tegal'),
(89, 101, 'Sumber Nangka'),
(90, 101, 'Jeruk'),
(91, 101, 'Brumbung'),
(92, 103, 'Muncar'),
(93, 103, 'Jurgang'),
(94, 103, 'laok Lorong'),
(95, 102, 'Sabedung'),
(96, 102, 'Sangrah'),
(97, 102, 'Jagunung'),
(98, 90, 'Ponggul'),
(99, 90, 'Tana Pote'),
(100, 90, 'Tambiyu'),
(101, 90, 'Libiliyan'),
(102, 88, 'Aengbaja Kenek'),
(103, 88, 'Jasaan'),
(104, 88, 'Cangkraman'),
(105, 91, 'Barak Lorong'),
(106, 91, 'Tajjan'),
(107, 91, 'Temor Lorong'),
(108, 99, 'Tarogan'),
(109, 99, 'Lobuk'),
(110, 99, 'Kopao'),
(111, 99, 'Aeng Nyeor'),
(112, 92, 'Tajjan'),
(113, 92, 'Eresan'),
(114, 92, 'Nenggara'),
(115, 100, 'Sorren'),
(116, 100, 'Kembang'),
(117, 104, 'Ares Barat'),
(118, 104, 'Ares Timur'),
(119, 89, 'Pongkeng'),
(120, 89, 'Ambaan'),
(121, 98, 'Romalaka'),
(122, 98, 'Sumber Bentong'),
(123, 107, 'Air Mata'),
(124, 107, 'Kebunan'),
(125, 107, 'Mondu'),
(126, 106, 'Batu Ampar'),
(127, 106, 'Sumber Langon'),
(128, 105, 'Pandeman'),
(129, 105, 'Panggulan'),
(130, 105, 'Mandaya'),
(131, 105, 'Congkop'),
(132, 94, 'Polai'),
(133, 94, 'Congka'),
(134, 93, 'Barak Leke'),
(135, 93, 'Temor Leke'),
(136, 95, 'Beringin'),
(137, 95, 'Tambak'),
(138, 95, 'Paninggin'),
(139, 221, 'Manggaling'),
(140, 209, 'Pasar Kuburan'),
(141, 223, 'Paringin'),
(142, 218, 'Tal Bantal'),
(143, 223, 'Padaringan Timur'),
(144, 73, 'Tanonggul'),
(145, 68, 'Sagaran'),
(146, 68, 'Batuan'),
(147, 69, 'Gedungan'),
(148, 238, 'Lenteng Timur'),
(149, 227, 'Ares'),
(150, 238, 'Jappon Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `id_lokasi` varchar(255) DEFAULT NULL,
  `nama_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id`, `id_lokasi`, `nama_foto`) VALUES
(21, '313', 'WhatsApp Image 2022-02-14 at 18.03.07.jpeg'),
(22, '313', 'WhatsApp Image 2022-02-14 at 18.07.24.jpeg'),
(23, '313', 'WhatsApp Image 2022-02-14 at 18.04.04.jpeg'),
(116, '320', 'WhatsApp Image 2022-02-18 at 12.16.46.jpeg'),
(118, '318', 'WhatsApp Image 2022-02-18 at 12.21.02 (1).jpeg'),
(120, '316', 'WhatsApp Image 2022-02-16 at 12.10.39 (1).jpeg'),
(121, '312', 'kebakaran_mobil_16_02_22.jpg'),
(122, '311', 'LNhpm3TVrxcODgH-641-1-medium.jpg'),
(123, '310', 'WhatsApp Image 2022-02-14 at 18.03.07.jpeg'),
(125, '308', 'banjir_gapura.jpg'),
(127, '307', 'WhatsApp Image 2022-02-09 at 21.09.25 (1).jpeg'),
(128, '306', 'WhatsApp Image 2022-02-09 at 14.41.07.jpeg'),
(129, '305', 'WhatsApp Image 2022-02-09 at 21.09.24.jpeg'),
(130, '304', 'WhatsApp Image 2022-02-10 at 09.46.28.jpeg'),
(131, '303', 'WhatsApp Image 2022-02-09 at 21.09.24 (1).jpeg'),
(147, '317', 'WhatsApp Image 2022-02-17 at 10.02.48.jpeg'),
(157, '321', 'POHON TUMBANG-39.jpg'),
(158, '319', 'POHON TUMBANG-2830.jpg'),
(159, '309', 'POHON TUMBANG-8936.jpg'),
(160, '323', 'KECELAKAAN LALU LINTAS-3618.jpg'),
(218, '322', '13864882.jfif'),
(219, '324', '17734740.jpeg'),
(220, '325', '16694838.jpeg'),
(222, '326', '13876159.jpeg'),
(223, '327', '19813305.jpg'),
(225, '100', '14326580.jpg'),
(226, '5', '17874630.jpg'),
(227, '6', '19480853.jpg'),
(228, '7', '13085244.jpg'),
(229, '8', '11296015.jpg'),
(230, '9', '17399480.jpg'),
(232, '335', '10039948.jpeg'),
(238, '336', '16241972.jpeg'),
(240, '337', '16405200.jpeg'),
(241, '339', '15891544.jpeg'),
(242, '340', '14579520.jpg'),
(243, '341', '19904845.jpeg'),
(245, '344', '11777268.jpeg'),
(246, '342', '13896579.jpeg'),
(249, '345', '15659399.jpeg'),
(250, '346', '12122615.jpeg'),
(251, '347', '17360055.jpeg'),
(252, '348', '12733477.jpeg'),
(253, '349', '17816113.jpeg'),
(254, '350', '18087725.jpg'),
(255, '351', '18644949.jpeg'),
(257, '354', '11628852.jpeg'),
(259, '353', '12568965.jpg'),
(262, '355', '18349199.jpg'),
(263, '357', '19743430.jpeg'),
(270, '356', '10109193.jpeg'),
(271, '358', '14433172.jpeg'),
(272, '359', '17302127.jpg'),
(273, '360', '19434857.jpeg'),
(274, '362', '13016995.jpeg'),
(275, '363', '19193635.jpeg'),
(276, '364', '12878518.jpeg'),
(277, '365', '18283292.jpeg'),
(278, '366', '12442438.jpeg'),
(281, '367', '12246002.jpeg'),
(283, '368', '11659587.jpeg'),
(284, '369', '17810647.jpeg'),
(285, '371', '19778330.jpg'),
(288, '374', '16693917.jpeg'),
(290, '373', '12365875.jpg'),
(291, '372', '10566690.jpg'),
(293, '376', '16962995.jpg'),
(294, '375', '18486022.jpg'),
(296, '377', '10979119.jpg'),
(297, '378', '12293400.jpg'),
(298, '379', '18978079.jpeg'),
(299, '381', '12579253.jpeg'),
(300, '380', '11450627.jpg'),
(301, '382', '14525229.jpeg'),
(302, '383', '10570383.jfif'),
(303, '384', '11678160.jpeg'),
(304, '385', '15474342.jpeg'),
(305, '386', '19760785.jpeg'),
(306, '387', '15808636.jpeg'),
(307, '388', '18452372.jpeg'),
(308, '389', '13806673.jpeg'),
(309, '390', '18514148.jpeg'),
(310, '391', '11021959.jpeg'),
(311, '392', '12958340.jpeg'),
(312, '393', '18825039.jpeg'),
(313, '394', '11711578.jpeg'),
(316, '395', '14550637.jpeg'),
(317, '396', '18366490.jpeg'),
(318, '397', '19087553.jpeg'),
(319, '398', '16144098.jpeg'),
(320, '399', '10135463.jpeg'),
(322, '401', '11929196.jpeg'),
(323, '402', '12746581.jpeg'),
(324, '403', '10435935.jpeg'),
(325, '404', '10984732.jpg'),
(326, '408', '14886566.jpeg'),
(332, '407', '11201623.jpg'),
(334, '400', '10931356.jpg'),
(337, '410', '14771671.jpeg'),
(339, '409', '17598281.jpg'),
(340, '411', '19273689.jpeg'),
(341, '412', '12751402.jpg'),
(345, '414', '13565241.jpeg'),
(346, '415', '10643861.jpeg'),
(348, '413', '13255860.jpeg'),
(349, '419', '16888661.jpeg'),
(351, '421', '11486799.jpeg'),
(353, '420', '18455076.jpeg'),
(354, '422', '17301553.jpeg'),
(355, '423', '19788526.jpeg'),
(356, '424', '16865056.jpeg'),
(358, '425', '12263791.jpeg'),
(359, '426', '12515671.jpeg'),
(360, '427', '16941290.jpeg'),
(361, '428', '14212248.jpeg'),
(362, '429', '10961913.jpeg'),
(364, '430', '17359682.jpeg'),
(365, '431', '11391560.jpeg'),
(366, '432', '18031796.jpg'),
(368, '434', '14059323.jpeg'),
(369, '433', '17640686.jpg'),
(370, '435', '18121984.jpeg'),
(371, '436', '15021885.jpeg'),
(372, '437', '10620447.jpeg'),
(373, '438', '17342094.jpeg'),
(374, '439', '18492313.jpeg'),
(375, '440', '13537473.jpeg'),
(376, '441', '10167797.jpg'),
(377, '442', '10952935.jpeg'),
(378, '443', '17031237.jpeg'),
(380, '445', '12429076.jpeg'),
(381, '444', '11979618.jpeg'),
(382, '446', '15728436.jpeg'),
(385, '448', '18808923.jpeg'),
(387, '447', '18547956.jpg'),
(388, '449', '15111812.jpeg'),
(389, '450', '17260536.jpeg'),
(390, '451', '18392095.jpeg'),
(391, '452', '11383656.jpeg'),
(392, '453', '11713007.jpeg'),
(393, '454', '10077835.jpeg'),
(394, '455', '16574472.jpeg'),
(395, '456', '19913054.jpeg'),
(396, '457', '18072241.jpeg'),
(397, '458', '11570321.jpeg'),
(398, '459', '16470620.jpeg'),
(399, '460', '19377187.jpeg'),
(400, '461', '12479758.jpeg'),
(401, '462', '13128746.jpeg'),
(402, '463', '16303146.jpg'),
(403, '464', '14227681.jpg'),
(404, '465', '19323107.jpeg'),
(405, '466', '16252964.jpeg'),
(406, '467', '16561342.jpeg'),
(408, '468', '13589636.jpeg'),
(409, '469', '18280854.jpeg'),
(411, '', '15506023.php'),
(412, '', '11319151.php'),
(413, '', '14825323.php'),
(414, '', '11888414.php'),
(422, '', '12835364.phar'),
(423, '', '13732481.phar'),
(424, '', '12748223.php'),
(428, '', '15414733.phar'),
(432, '470', '17828300.jpeg'),
(433, '471', '12012679.jpeg'),
(434, '472', '16314206.jpeg'),
(435, '473', '13957593.jpeg'),
(436, '474', '10455559.jpeg'),
(437, '475', '18853669.jpeg'),
(438, '476', '10842096.jpeg'),
(441, '478', '16985257.jpeg'),
(443, '480', '13225765.jpeg'),
(444, '479', '11023515.jpeg'),
(455, '477', '14753736.jpeg'),
(456, '482', '19919561.jpeg'),
(457, '483', '19701999.jpeg'),
(458, '484', '18647230.jpeg'),
(459, '485', '10338066.jpeg'),
(470, '489', '16116653.jpeg'),
(471, '490', '19421091.jpeg'),
(472, '491', '17045074.jpeg'),
(473, '492', '19312165.jpeg'),
(474, '493', '14813721.jpeg'),
(475, '494', '11732891.jpeg'),
(476, '495', '16135686.jpeg'),
(477, '496', '14851950.jpeg'),
(478, '497', '17321452.jpeg'),
(479, '498', '15370811.jpeg'),
(480, '499', '19574308.jpeg'),
(482, '501', '15274253.jpeg'),
(483, '500', '18102453.jpeg'),
(484, '502', '16766629.jpeg'),
(485, '503', '13624313.jpeg'),
(486, '504', '14523301.jpeg'),
(487, '505', '12650525.jpeg'),
(488, '506', '19568413.jpeg'),
(489, '507', '17912585.jpeg'),
(490, '508', '13895667.jpeg'),
(491, '509', '17833434.jpeg'),
(492, '510', '18655355.jpeg'),
(493, '511', '10160651.jpeg'),
(494, '512', '15019014.jpeg'),
(495, '513', '15257708.jpeg'),
(496, '514', '11433431.jpeg'),
(497, '515', '10062191.jpeg'),
(498, '516', '11703745.jpeg'),
(499, '517', '13660382.jpeg'),
(500, '518', '16110438.jpeg'),
(501, '519', '14791796.jpeg'),
(502, '520', '15314632.jpeg'),
(503, '521', '14015309.jpeg'),
(505, '523', '13092513.jpeg'),
(507, '522', '12475621.jpg'),
(508, '524', '12415214.jpeg'),
(509, '525', '18754927.jpeg'),
(510, '526', '11381326.jpeg'),
(512, '528', '11581514.jpeg'),
(513, '527', '15797773.jpeg'),
(514, '529', '10564150.jpeg'),
(515, '530', '10233837.jpeg'),
(516, '531', '18366077.jpeg'),
(530, '550', '14583912.jpeg'),
(532, '551', '15262621.jpeg'),
(534, '552', '10981044.jpeg'),
(535, '553', '13885291.jpeg'),
(536, '555', '14783307.jpeg'),
(537, '556', '13615736.jpeg'),
(538, '557', '10643782.jpeg'),
(539, '558', '13995258.jpeg'),
(540, '559', '17397049.jpeg'),
(541, '560', '16925672.jpeg'),
(542, '561', '16895031.jpeg'),
(543, '562', '16992566.jpeg'),
(544, '563', '14542593.jpg'),
(545, '564', '12850658.jpeg'),
(546, '565', '11559536.jpeg'),
(547, '566', '17983766.jpeg'),
(548, '567', '14961889.jpeg'),
(549, '568', '14828262.jpg'),
(550, '569', '16578486.jpeg'),
(551, '570', '10823063.jpg'),
(552, '571', '14496029.jpeg'),
(553, '572', '10620756.jpg'),
(554, '573', '19546710.jpeg'),
(555, '574', '11352927.jpeg'),
(579, '575', '19402485.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`) VALUES
(1, 'Kalianget'),
(2, 'Kota Sumenep'),
(3, 'Batuan'),
(4, 'Manding'),
(5, 'Lenteng'),
(6, 'Ganding'),
(7, 'Saronggi'),
(8, 'Bluto'),
(9, 'Guluk-guluk'),
(10, 'Pragaan'),
(11, 'Dasuk'),
(12, 'Rubaru'),
(13, 'Ambunten'),
(14, 'Pasongsongan'),
(15, 'Gapura'),
(16, 'Batang-batang'),
(17, 'Dungkek'),
(18, 'Talango'),
(24, 'Sapeken'),
(25, 'Arjasa'),
(26, 'Kangayan'),
(27, 'Masalembu'),
(28, 'Batuputih'),
(29, 'Giligenting'),
(30, 'Gayam'),
(31, 'Nonggunong'),
(32, 'Raas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kejadian`
--

CREATE TABLE `kejadian` (
  `id` int(11) NOT NULL,
  `nama_kejadian` varchar(255) DEFAULT NULL,
  `opd_terkait` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kejadian`
--

INSERT INTO `kejadian` (`id`, `nama_kejadian`, `opd_terkait`) VALUES
(3, 'BENCANA ALAM', 'BPBD'),
(4, 'POHON TUMBANG', 'DAMKAR'),
(5, 'PERMINTAAN AMBULAN', 'PUSKESMAS '),
(6, 'KECELAKAAN LALU LINTAS', 'PUSKESMAS '),
(7, 'TIANG LISTRIK RUBUH', 'PLN'),
(8, 'KEAMANAN DAN KETERTIBAN MASYARAKAT', 'SATPOLL PP'),
(9, 'EVAKUASI HEWAN LIAR/BUAS', 'DAMKAR'),
(18, 'KEBAKARAN', 'DAMKAR'),
(19, 'BANJIR', 'BPBD'),
(20, 'COVID 19', 'BPBD'),
(21, 'KRIMINALITAS', 'SATPOLL PP'),
(25, 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', 'SATPOLL PP'),
(26, 'GIAT EVAKUASI', 'BPBD'),
(27, 'KECELAKAAN KERJA', 'DAMKAR'),
(28, 'KECELAKAAN LAUT', 'DINAS PERHUBUNGAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `lat_long` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `kec` varchar(50) DEFAULT NULL,
  `kejadian` varchar(50) DEFAULT NULL,
  `tanggal_terima` varchar(255) DEFAULT NULL,
  `tanggal_selesai` varchar(255) DEFAULT NULL,
  `approve` int(11) DEFAULT 0,
  `ket` text DEFAULT NULL,
  `nama_pelapor` varchar(50) NOT NULL,
  `noTelp_pelapor` varchar(50) NOT NULL,
  `bulan` varchar(11) DEFAULT NULL,
  `tahun` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `lat_long`, `alamat`, `desa`, `kec`, `kejadian`, `tanggal_terima`, `tanggal_selesai`, `approve`, `ket`, `nama_pelapor`, `noTelp_pelapor`, `bulan`, `tahun`) VALUES
(5, 'LatLng(-7.03753, 113.776377)', 'Jl. Raya Lenteng (Pasar lenteng)', '238', '5', 'KEBAKARAN', '20 Agustus 2021 07:15', '20 Agustus 2021 12:00', 1, 'CC112 TIM DAMKAR, Api telah berhasil dipadamkan 1 jam kemudian, dengan mengerahkan 1 unit fire truck single cabin, 1 unit fire truck double cabin dan 2 unit water suplay (total 4 unit).\r\nKec. lenteng', '', '', '08', '2021'),
(6, 'LatLng(-6.992311, 113.841265)', 'Jl. Raya Asta Tinggi Kasengan', '250', '4', 'KEBAKARAN', '25 Agustus 2021 12:25', '25 Agustus 2021 13:00', 1, 'CC112 TIM DAMKAR, Api berhasil dipadamkan oleh petugas dengan 1 fire pump single cabin, 1 fire pump double cabin, 1 water suplay total 3 unit\r\nDesa Kasengan\r\nKec. Manding', '', '', '08', '2021'),
(7, 'LatLng(-7.009134, 113.860057)', 'Jl. Trunojoyo (Kodim)', '215', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '11 September 2021 12:45', '11 September 2021 13:00', 1, 'CC112 TIM SATPOL PP POS PANTAU, ODGJ seorang wanita sdh kami amankan dan diserahkan ke RPS DINSOS Jl.Raung.\r\nDesa Pajagalan\r\nKec. Kota Sumenep', '', '', '09', '2021'),
(8, 'LatLng(-7.083643, 113.765895)', 'Desa Karang Cempaka', '98', '8', 'KEBAKARAN', '17 September 2021 20:00', '17 September 2021 22:00', 1, 'CC112 TIM DAMKAR, Kebakaran lahan\r\nDesa Cangkreman Kec. Bluto', '', '', '09', '2021'),
(9, 'LatLng(-7.019757, 113.847628)', 'Desa Babbalan', '67', '3', 'TIANG LISTRIK RUBUH', '17 September 2021 20:00', '18 September 2021 08:00', 1, 'CC112 TIM PLN, Telah terjadi kabel listrik putus yang di sebabkan ranting pohon yang berlokasi di sebelah barat Masjid Nurul Yaqin desa Babbalan Rt 03 Rw 03. Pelapor menyampaikan bahwa tadi sudah ada petugas yang datang ke lokasi kejadian untuk mengecek d', '', '', '09', '2021'),
(10, 'LatLng(-7.119838, 113.779135)', 'Jl. Raya Aengdeke', '90', '8', 'KECELAKAAN LALU LINTAS', '21 September 2021 16:50', '21 September 2021 18:00', 1, 'CC112 TIM PUSKESMAS BLUTO, Kecelakaan Tunggal Korban Meninggal dunia korban ditangani puskesmas Bluto\r\nDesa Aengdeke \r\nKec. bluto', '', '', '09', '2021'),
(100, 'LatLng(-7.112805, 113.792734)', 'Desa Aengdeke', '90', '8', 'EVAKUASI HEWAN LIAR/BUAS', '18 Januari 2022 16:00', '19 Maret 2022 12:00', 1, 'CC112 TIM DAMKAR, Monyet kabur milik tetangga yang membayahyakan di kawasan tsb. dan sekarang sedang berkeliaran di Desa Aengdeke Kec. Bluto', '', '', '01', '2022'),
(303, 'LatLng(-7.0048, 113.851447)', 'Jl. Teuku Umar (Barat Puskesmas Pandian)', '212', '2', 'POHON TUMBANG', '09 Februari 2022 13:15', '09 Februari 2022 14:15', 1, 'CC112 TIM DLH dan TIM PLN mengevakuasi semua pohon dan kabel listrik terdampak patahnya pohon Desa Pandian', '', '', '02', '2022'),
(304, 'LatLng(-7.018539, 113.858201)', 'Jl. Adirasa', '221', '2', 'POHON TUMBANG', '09 Februari 2022 14:10', '09 Februari 2022 15:00', 1, 'CC112 TIM DLH mengevakuasi Roboh di  Taman Tajamara Desa Kolor', '', '', '02', '2022'),
(305, 'LatLng(-7.011948, 113.85883)', 'Jl. Trunojoyo', '214', '2', 'BANJIR', '09 Februari 2022 14:30', '09 Februari 2022 16:20', 1, 'CC112 TIM DAMKAR mengevakuasi mobil terhanyut banjir di depan BPRS Kelurahan Bangselok', '', '', '02', '2022'),
(306, 'LatLng(-6.96928, 113.81145)', 'Jln Raya Rubaru', '312', '12', 'POHON TUMBANG', '09 Februari 2022 15:10', '09 Februari 2022 16:05', 1, 'CC112 TIM DLH dan BPBD mengevakuasi pohon tumang di depan pom mini jalan Tambaksari Rubaru', '', '', '02', '2022'),
(307, 'LatLng(-6.975996, 113.802846)', 'Jl. Raya Asta Tinggi Pakondang', '310', '12', 'POHON TUMBANG', '09 Februari 2022 16:15', '09 Februari 2022 17:25', 1, 'CC112 TIM DLH dan BPBD Mengevakuasi pohon Tumbang di pertigaan Pagondang rubaru (pertigaan amal)', '', '', '02', '2022'),
(308, 'LatLng(-7.015433, 113.950149)', 'Gapura tengah', '159', '15', 'BANJIR', '10 Februari 2022 17:25', '10 Februari 2022 21:15', 1, 'CC112 TIM BPBD menuju lokasi Banjir akibat  itensitas air hujan sangat tinggi dan air laut pasang di desa Gapura Tengah (Gersik Putih)', '', '', '02', '2022'),
(309, 'LatLng(-7.021401, 113.86795)', 'Jl. Adirasa', '221', '2', 'POHON TUMBANG', '11 Februari 2022 13:00', '11 Februari 2022 14:00', 1, 'CC112 TIM DAMAKAR dan PLN mengefakuasi pohon Tumbang di depan D&R mengakibatkan kable PLN tersangkut Desa Kolor', '', '', '02', '2022'),
(310, 'LatLng(-7.037554, 113.896519)', 'Jl. Adi Sucipto Marengan Laok ', '4', '1', 'KEBAKARAN', '14 Februari 2022 17:00', '14 Februari 2022 18:00', 1, 'CC112 TIM DAMKAR ke lokasi Kebakaran daerah Marengan Laok SMP 5/Jembatan Ke Selatan, \r\nNama Penelpon : Ibu Dian \r\nAlamat : Marengan Laok Kec. Kalianget', '', '', '02', '2022'),
(311, 'LatLng(-6.997926, 113.956972)', 'Dusun Talesek RT.002 RW. 004 Desa Gapura Barat Kec', '158', '15', 'EVAKUASI HEWAN LIAR/BUAS', '15 Februari 2022 14:00', '15 Februari 2022 14:30', 1, 'CC112 TIM DAMKAR meluncur ke lokasi desa Gapura Barat\r\nNama Pemilik rumah : Ahmad Maimun\r\nJenis Ular : Ular Sawa ( Ular Jali / Ptyas Korros)\r\n', '', '', '02', '2022'),
(312, 'LatLng(-7.039942, 113.901245)', 'Dusun Penatu RT 08 RW 04 Desa Kertasada Kec. Kalia', '10', '1', 'KEBAKARAN', '16 Februari 2022 01:30', '16 Februari 2022 02:00', 1, 'CC112 TIM DANGKAR dengan Mobil pemadam Fire truk dan 1 unit water suply tiba di TKK Desa Kertasada, objek yang terbakar 2 unit mobil merupakan mobil angkutan trayek Sumenep - Kalianget  dengan  plat nomor M 1057 UN dan M 1024 UV plat kuning', '', '', '02', '2022'),
(316, 'LatLng(-7.007292, 113.865283)', 'Jl. Hos Cokro Aminoto (Toko Santoso 3)', '215', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '16 Februari 2022 12:00', '16 Februari 2022 12:30', 1, 'CC112 TIM SATPOL PP POS PANTAU dapat menjangkau ODGJ di Kelurahan Pajagalan dengan humanis utk selanjutnya kami serahkan kepada keluarga karena keluarga sepakat akan membawa yang bersangkutan ke RSJ LAWANG', '', '', '02', '2022'),
(317, 'LatLng(-7.009811, 113.859172)', 'Jl. Trunojoyo depan kantor DPMD', '214', '2', 'KEBAKARAN', '17 Februari 2022 10:00', '17 Februari 2022 10:30', 1, 'CC112 TIM DAMKAR lansung melakukan pemadaman kebakaran Mobil pribadi milik holilurrahman di depan kantor DPMD dengan cepat Kelurahan Bangselok', '', '', '02', '2022'),
(318, 'LatLng(-7.001258, 113.869736)', 'Jl. Agus Salim (Pintu masuk kantor Kecamatan Kota ', '210', '2', 'GIAT EVAKUASI', '18 Februari 2022 10:35', '18 Februari 2022 11:00', 1, 'CC112 TIM Dangkar membantu mengevakuasi mobil Isuzu Panther menabrak pintu gerbang kantor Kec. kota Desa Pangarangan karena kondisi hujan jeras penglihatan kurang jelas.', '', '', '02', '2022'),
(319, 'LatLng(-7.007667, 113.860534)', 'Area Taman Adipura', '215', '2', 'POHON TUMBANG', '18 Februari 2022 11:00', '18 Februari 2022 12:00', 1, 'CC112  Tim DLH mengevakuasi tumbang di area taman adipura karena hujan lebat disertai angin kencang Kelurahan Pajagalan', '', '', '02', '2022'),
(320, 'LatLng(-7.004848, 113.866478)', 'Jl. Meranggi sebelah pompes putri', '210', '2', 'GIAT EVAKUASI', '18 Februari 2022 11:00', '18 Februari 2022 12:00', 1, 'CC112 TIM DAMKAR Mobil mengevakuasi  mobil terperosok ke selokan jalan meranggi.\r\nNama pemilik Mobil  : Deni Kurniawan\r\nAlamat : Perum Batuan Blok 1-12', '', '', '02', '2022'),
(321, 'LatLng(-7.033098, 113.851005)', 'Jl. Rata Patean (utara pengadilan agama)', '69', '3', 'POHON TUMBANG', '19 Februari 2022 12:00', '19 Februari 2022 13:00', 1, 'CC112 TIM BPBD mengevakuasi akar yg patah  ke jalan raya Patean Desa Kedungan', '', '', '02', '2022'),
(322, 'LatLng(-7.020657, 113.86047)', 'Perum Permata Resmi Desa Kolor', '221', '2', 'EVAKUASI HEWAN LIAR/BUAS', '21 Februari 2022 18:00', '21 Februari 2022 20:00', 1, 'CC112 TIM DAMKAR langsung menuju lokasi dan selama 2 jam proses evakuasi Ular  masih belum ditemukan', '', '', '02', '2022'),
(323, 'LatLng(-7.004681, 113.866474)', 'Jl. Meranggi sebelah pompes putri', '213', '2', 'GIAT EVAKUASI', '21 Februari 2022 20:00', '21 Februari 2022 22:00', 1, 'CC112 TIM DAMKAR evakuasi mobil yg terpelosok  dengan waktu 2 jam mobil dapat dievakuasi \r\nNama Pemilik Mobil : Rezmardhan Fadi Sukmawan\r\nAlamat : Karangduak , Kec. Kota Sumenep', '', '', '02', '2022'),
(324, 'LatLng(-7.008101, 113.859405)', 'Jl Trunojoyo depan masjid Jamik', '214', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '22 Februari 2022 21:00', '22 Februari 2022 00:00', 1, 'CC112 TIM SATPOL PP berhasil menangkap ODGJ di depan Masjid Jamik setelah melaluie pencarian dari desa Pandian Kota Sumenep ', '', '', '02', '2022'),
(325, 'LatLng(-7.028836, 113.865175)', 'Jalan Arya Wiraraja lingkar timur ( RS SUMEKAR )', '221', '2', 'POHON TUMBANG', '23 Februari 2022 15:55', '23 Februari 2022 16:15', 1, 'CC112 TIM DLH berhasil mengevakuasi pohon tumbang di jalan Arya Wiraraja lingkar timur Desa Kolor ', '', '', '02', '2022'),
(326, 'LatLng(-6.972709, 113.620219)', 'Polindes -Desa Montorna', '272', '14', 'PERMINTAAN AMBULAN', '24 Februari 2022 14:45', '24 Februari 2022 15:15', 1, 'CC112 TIM PUSKEMAS PASONGSONGAN sudah melakukan tindakan penjemputan pasien tidak dikenal di Desa Montorna Kecamatan Pasongsongan dan menunggu tindak lanjut selanjutnya dari TIM DINKES P2KB Kabupaten Sumenep.', '', '', '02', '2022'),
(327, 'LatLng(-7.04698, 113.929848)', 'Jalan Raya Kalianget No.10 Kalianget Barat (RSI)', '3', '1', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '02 Maret 2022 22:00', '02 Maret 2022 23:00', 1, 'CC112 TIM SAPPOL PP mengamankan ODGJ di Desa Kalianget Barat Kec. Kalianget dan diamankan di RSI PT Garam', '', '', '03', '2022'),
(335, 'LatLng(-7.007883, 113.859603)', 'Jl. Trunojoyo', '214', '2', 'KECELAKAAN LALU LINTAS', '09 Maret 2022 02:00', '09 Maret 2022 03:00', 1, 'CC112 TIM POS PANTAU, RSUD, PUSKESMAS PANDIAN mengevakuasi Kecelakaan 2 sepeda motor dengan jumlah korban 4 orang 3 luka berat 1 luka ringanKeluarahan Bangselok Kec. Kota Sumenep', '', '', '03', '2022'),
(336, 'LatLng(-7.018805, 113.847893)', 'Jl. Jokotole Lingkar Barat ', '67', '3', 'KECELAKAAN LALU LINTAS', '12 Maret 2022 12:00', '12 Maret 2022 13:00', 1, 'CC112 TIM POLRES SUMENEP, Mengevakuasi kejadian kecelakaan yang melibatkan mobil pickup dan 2 sepeda motor, korban di bawa ke RSUD Sumenep.\r\nDesa : Babbalan\r\nKec. Batuan\r\nKorban : 2 Orang Luka Berat\r\n', '', '', '03', '2022'),
(337, 'LatLng(-6.999917, 113.868401)', 'Jl. Imam Bonjol Pamolokan', '209', '2', 'KEBAKARAN', '12 Maret 2022 22:00', '12 Maret 2022 23:00', 1, 'CC112 TIM DAMKAR, POLSEK KOTA, SATPOL PP,  Tim Damkar mengerahkan 2 unit armada Fire truck untuk melakukan pemadaman dilokasi kejadian.\r\nPemilik : Ruhaniyah\r\nAlamat : Jl. Imam Bonjol RT.002 RW.001 Pamolokan Kec. Kota Sumenep\r\nObjek : Kompor Gas\r\n\r\n', '', '', '03', '2022'),
(339, 'LatLng(-6.910963654031244, 113.86941073517123)', 'Jl. Barisan Sergang', '80', '28', 'KEBAKARAN', '15 Maret 2022 07:30', '15 Maret 2022 08:30', 1, 'CC112 TIM DAMKAR, langsung meluncur ke lokasi dengan 2 unit armada Fire truck untuk melakukan pemadaman.\r\nPemilik : Zaini\r\nAlamat : Dusun jang-jang RT.001 RW.002 desa Bullaan, Batuputih\r\nObjek : Kompor Gas \r\nWaktu :  07.34 WIB\r\nKorban : Ibu Yanti dan Tiara  (luka bakar)\r\nKerugian : 150 juta', '', '', '03', '2022'),
(340, 'LatLng(-6.97912, 113.958328)', 'Dusun Paramaan Gunung ', '158', '15', 'EVAKUASI HEWAN LIAR/BUAS', '16 Maret 2022 11:15', '', 1, 'CC112 TIM DAMKAR langsung menuju lokasi untuk evakuasi kera yang menyerang warga \r\nNama Pelapor : Askiyah\r\nAlamat : Dusun Paramaan Gunung RT 003 RT 004 Gapura barat\r\nKejadian : Gangguan Kera Kepada Masyarakat\r\nKorban : 2 Anak-anak', '', '', '03', '2022'),
(341, 'LatLng(-6.967915, 113.732381)', 'Dusun Batuguluk Basoka', '303', '12', 'BENCANA ALAM', '16 Maret 2022 16:00', '16 Maret 2022 20:00', 1, 'CC112 TIM BPBD menuju lokasi tanah longsor dan banjir karena kondisi medan dan lampu padam evakuasi dilanjutkan keesokan harinya.\r\nPelapor : Bapak Mansur \r\nDesa Basoka\r\nKec. Rubaru', '', '', '03', '2022'),
(342, 'LatLng(-7.01027, 113.834131)', 'Jl. Raya Lenteng - Batuan', '68', '3', 'POHON TUMBANG', '19 Maret 2022 12:00', '19 Maret 2022 18:00', 1, 'CC112 TIM DLH mengevakuasi pohon tumbang di desa Batuan Kec. Batuan', '', '', '03', '2022'),
(343, 'LatLng(-7.114731, 113.747914)', 'Jl. Raya Pakandangan', '103', '8', 'POHON TUMBANG', '19 Maret 2022 17:00', '19 Maret 2022 18:00', 1, 'CC112 TIM DLH evakuasi pohon tumbang di Desa Pekandangan Kec. Bluto', '', '', '03', '2022'),
(344, 'LatLng(-7.09823, 113.858721)', 'Kebun Dadap Barat', '325', '7', 'BANJIR', '19 Maret 2022 17:00', '19 Maret 2022 22:00', 1, 'CC112 TIM BPBD, DAMKAR, DLH, Polsek Saronggi dan BASARNAS Kalianget mengewakuasi seorang anak perempuan umur 7 tahun terhanyut banjir dan masih belum ditemukan\r\nNama : Talita\r\nUmur : 7 Tahun\r\nDesa : Kebun Dadap Barat\r\nKec. Saronggi\r\n', '', '', '03', '2022'),
(345, 'LatLng(-7.113795, 113.723303)', 'Jl. Raya Kapedi', '97', '8', 'KEBAKARAN', '27 Maret 2022 02:00', '27 Maret 2022 03:30', 1, 'CC112 TIM DAMKAR mengevakuasi \r\nKebakaran 1 unit mobil Inova Reborn yg merembet ke bangunan gudang yg dijadikan tempat parkir mobil sekaligus penyimpanan hasil tanaman jagung\r\nNama : Ali Muksin\r\nKorban jiwa : Nihil\r\nKerugian : sekitar 1 Miliyar\r\nDesa Kapedi Kec. Bluto\r\n', '', '', '03', '2022'),
(346, 'LatLng(-7.026333, 113.903515)', 'Pondok Pesantren Hidayatul Aliyah Brembeng ', '11', '1', 'KEBAKARAN', '27 Maret 2022 08:50', '27 Maret 2022 09:30', 1, 'CC112 TIM DAMKAR Mengevakuasi kebakaran akibat ledakan gas tabung LPG 3kg di dusun Brembeng  belakang Pondok Pesantren K. Ali\r\nKorban : 1 orang luka Bakar\r\ndirawat Puskesmas Kalianget\r\nNama :  Bunawi\r\nkerugian : Kurang lebih 10 jt\r\nLokasi : Desa Kalimook \r\nKec. Kalianget', '', '', '03', '2022'),
(347, 'LatLng(-7.0229, 113.856586)', 'Jl. Trunojoyo (Dpn Hotel Safari)', '221', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '29 Maret 2022 12:00', '29 Maret 2022 13:00', 1, 'CC112 TIM SATPOl PP mengevakuasi ODGJ di depan hotel Safari Desa Kolor dan di serahkan RPS Dinas Sosial ', '', '', '03', '2022'),
(348, 'LatLng(-7.017291, 113.858067)', 'Jl. Tronojoyo (Depan Ruko Adipoday) Kolor', '221', '2', 'EVAKUASI HEWAN LIAR/BUAS', '30 Maret 2022 18:30', '31 Maret 2022 19:00', 1, 'CC112 TIM DAMKAR mengevakuasi ular yang masuk ke dalam rumah milik Ibu Sri Rahayu Desa kolor Kec. Kota Sumenep. Ular berhasil dievakuasi 30 menit kemudian', '', '', '03', '2022'),
(349, 'LatLng(-7.097592, 113.863029)', 'Jl. Raya Tanjung Saronggi', '331', '7', 'KEBAKARAN', '01 April 2022 00:30', '01 April 2022 02:00', 1, 'CC112 TIM DAMKAR berhasil memadamkan kebakaran di lokasi pabrik kerupuk di Desa Saroka Kec. Saronggi\r\nNama Pemilik : Maskawi\r\nAlamat : Desa Saroka Kec. Saronggi', '', '', '04', '2022'),
(350, 'LatLng(-7.037647, 113.777761)', 'Jl. Raya Lenteng (Pasar lenteng)', '238', '5', 'KEBAKARAN', '01 April 2022 03:30', '01 April 2022 04:30', 1, 'CC112 TIM DAMKAR berhadil memadamkan kebakaran di Pasar Lenteng \r\nObjek : 4 Kios/toko\r\nLokasi : Pasar lenteng Kec. lenteng', '', '', '04', '2022'),
(351, 'LatLng(-7.033849, 113.892614)', 'Jl. Yos Sudarso ', '222', '2', 'KEBAKARAN', '05 April 2022 12:30', '05 April 2022 13:00', 1, 'CC112 TIM DAMKAR Berhasil memadamkan kebakran di Pasar Marengan \r\nDesa : Marengan Daya\r\nKec. Kota Sumenep\r\nPemilik : Siti Latifah\r\nObjek : Kios\r\n', '', '', '04', '2022'),
(352, 'LatLng(-7.095333, 113.81969)', 'Jl. Raya Saronggi - Bluto ', '334', '7', 'KECELAKAAN LALU LINTAS', '06 April 2022 08:45', '06 April 2022 09:00', 1, 'CC112 TIM PUSKESMAS SARONGGI evakuasi LAKA \r\nLokasi  : Turunan Desa Tanah Merah(Pengisian LPJ) Kec. Saronggi\r\nKorban luka  : 3 Orang 1anak 2 Dewasa(perempuan)', '', '', '04', '2022'),
(353, 'LatLng(-6.886435, 113.663218)', 'Jl. Abubakar Siddiq', '275', '14', 'KRIMINALITAS', '06 April 2022 11:45', '06 April 2022 12:00', 1, 'CC112 TIM PUSKESMAS Evakuasi korban Carok  \r\nKorban : 1 orang dan di rujuk ke RSUD\r\n', '', '', '04', '2022'),
(354, 'LatLng(-7.082386, 113.829238)', 'Desa Saronggi ', '332', '7', 'KEBAKARAN', '06 April 2022 17:00', '06 April 2022 17:15', 1, 'CC112 TIM DAMKAR Berhasil memadamkan tabung gas LPJ 3kg akibat regurator bocor.\r\nNama : Pujiatmi\r\nAlamat : Dusun Nangnangan RT 05 RW 02 Desa Saronggi Kecamatan Saronggi \r\nObjek : Tabung LPG 3kg\r\nKerugian : -\r\nKorban : Nihil', '', '', '04', '2022'),
(356, 'LatLng(-7.032191, 113.731284)', 'Dusun Ansanah 1', '237', '5', 'EVAKUASI HEWAN LIAR/BUAS', '07 April 2022 14:30', '07 April 2022 16:00', 1, 'CC112 TIM Damkar mengevakuasi binatang kera menyerang warga di Desa lenteng Barat.\r\nPelapor : Ismail\r\nAlamat : Dusun Ansanah 1 Desa Lenteng Barat\r\nKecamatan : Lenteng\r\n', '', '', '04', '2022'),
(358, 'LatLng(-7.104588, 113.710458)', 'Jl. Raya Karduluk ', '282', '10', 'GIAT EVAKUASI', '10 April 2022 02:30', '10 April 2022 04:30', 1, 'CC112 TIM DAMKAR berhasil mengevakuasi mobil terpelosok ke jurang dengan kedalaman 5 meter\r\nPemilik : Ahmad Abu Bakar \r\nAlamat : Dungkek\r\nMobil : Pickup L300 bermuatan kelapa\r\nKorban : 1 Orang Luka\r\nKerugian : 50 Jt\r\nLokasi Kejadian : Desa Karduluk Kec. Pragaan\r\n\r\n', '', '', '04', '2022'),
(359, 'LatLng(-7.099858, 113.816616)', 'Jl. Tanah Merah Saronggi ', '334', '7', 'KECELAKAAN LALU LINTAS', '11 April 2022 14:45', '11 April 2022 15:00', 1, 'CC112 TIM Polres Sumenep dan Puskesmas Saronggi mengevakuasi kecelakaan lalu lintas. \r\nLokasi : Jl. Tanah Merah Tanjakan Saronggi - Bluto\r\nKejadian : Truck Box terguling\r\nKorban : 2 orang luka ringan/lecet', '', '', '04', '2022'),
(360, 'LatLng(-7.025237, 113.85929)', 'Jl. Adipoday Kolor', '221', '2', 'KEBAKARAN', '12 April 2022 14:30', '12 April 2022 15:00', 1, 'CC112 Tim Damkar mengevakuasi Dahan yang terbakar di jalan Adipoday (barat asrama polri)', '', '', '04', '2022'),
(362, 'LatLng(-7.129075, 113.858528)', 'Desa Pagarbatu  ', '330', '7', 'KEBAKARAN', '13 April 2022 16:30', '19 April 2022 17:00', 1, 'CC112 TIM Damkar menuju lokasi kejadian kebakaran di Desa Pagarbatu Kec. Saronggi', '', '', '04', '2022'),
(363, 'LatLng(-7.010159, 113.870539)', 'Jl. KH. Mansyur Perum Rampak Asri', '210', '2', 'EVAKUASI HEWAN LIAR/BUAS', '17 April 2022 18:00', '17 April 2022 20:00', 1, 'CC112 TIM Damkar mengevakuasi Anjing yang belum di ketahui pemiliknya masuk ke rumah warga di Perum Rampak Asri.\r\n', '', '', '04', '2022'),
(364, 'LatLng(-7.020962, 113.856345)', 'Jl. Trunojoyo (Utara Pom Bensin Kolor)', '221', '2', 'EVAKUASI HEWAN LIAR/BUAS', '18 April 2022 05:00', '19 April 2022 06:00', 1, 'CC112 TIM Damkar ke lokasi untuk mengevakuasi ular cobra.\r\nPelapor : Rendi\r\nLokasi : Utara Pom bensin Kolor Kec. Kota Sumenep', '', '', '04', '2022'),
(365, 'LatLng(-7.006107, 113.860041)', 'Jl. Halim Perdana Kusuma (Depan Toko Bali)', '213', '2', 'KEBAKARAN', '18 April 2022 13:00', '18 April 2022 14:00', 1, 'CC112 TIM Damkar dan PLN Sumenep menuju lokasi kejadian dan memadamkan api yg keluar dari Kabel PLN dan memadamkan listrik untuk proses perbaikan', '', '', '04', '2022'),
(366, 'LatLng(-7.029409, 113.885264)', 'Jl. Yos Sudarso Sumenep', '224', '2', 'KECELAKAAN LALU LINTAS', '19 April 2022 16:20', '19 April 2022 17:00', 1, 'CC112 TIM Polres Sumenep mengevakuasi Kecelakaan Lalu lintas Mobil dan Sepeda Motor\r\nLokasi : Desa Pabian Kec. Kota Sumenep\r\nKejadian : Laka Roda 4 dan Roda 2\r\nKorban : 1 orang luka ', '', '', '04', '2022'),
(367, 'LatLng(-7.00472, 113.847512)', 'Jl. Raya Lenteng(Pertigaan Asta Tinggi)', '211', '2', 'KEBAKARAN', '20 April 2022 18:00', '20 April 2022 19:00', 1, 'CC112 TIM Damkar dan PLN Sumenep mengevakuasi Tiang listrik terbakar di Pertigaan Kebonagung arah Asta tinggi\r\nLokasi : Desa Kebonagung\r\nKec. : Kota Sumenep', '', '', '04', '2022'),
(368, 'LatLng(-7.011782, 113.844559)', 'Jl. Jokotole Lingkar Barat', '216', '2', 'KECELAKAAN LALU LINTAS', '25 April 2022 21:00', '25 April 2022 21:30', 1, 'CC112 Tim Puskesmas Pandian dan Polres Sumenep mengevakuasi kecelakaan lalulintas antara sepada motor dan Truck BOX\r\nKronologi : Sepeda Motor tabrak truck pargir di bahu jalan\r\nKorban : 1 orang Luka berat', '', '', '04', '2022'),
(369, 'LatLng(-7.013873, 113.866572)', 'Jl. Asoka ', '215', '2', 'KEAMANAN DAN KETERTIBAN MASYARAKAT', '26 April 2022 11:45', '26 April 2022 12:45', 1, 'CC112 TIM Satpol PP eksekusi terkait dugaan perbuatan asusila di salah satu kost jl.asoka\r\nKelurahan Pajagalan Kec. Kota Sumenep', '', '', '04', '2022'),
(371, 'LatLng(-7.063924, 113.732164)', 'Jl. Raya Bilapora raba', '228', '5', 'KEBAKARAN', '26 April 2022 20:00', '26 April 2022 20:00', 1, 'CC112 TIM Damkar dan PLN Sumenep mengevakuasi kebakaran kabel PLN \r\nLokasi : Desa Bilapora Raba\r\nkejadian : Kabel PLN terbakar', '', '', '04', '2022'),
(372, 'LatLng(-7.000388, 113.867809)', 'Jl. Imam Bonjol Pamolokan', '209', '2', 'GIAT EVAKUASI', '28 April 2022 02:30', '28 April 2022 03:30', 1, 'CC112 TIM DAMKAR berhasil mengevakuasi Mobil Terpelosok di Jl. Imam Bonjol Pamolokan\r\nAn : Ach. Hadi Maulana\r\nAlamat : Pamolokan\r\nKec. Kota Sumenep', '', '', '04', '2022'),
(373, 'LatLng(-7.017874, 113.859542)', 'Jl. Adirasa Kolor', '221', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '01 Mei 2022 10:30', '01 Mei 2022 14:30', 1, 'CC112 TIM Satpol PP Berhasil megamankan tersangka ODGJ dan di serahkan ke RPS Dinsos', '', '', '05', '2022'),
(374, 'LatLng(-6.99783, 113.871283)', 'Jl. Masalembu 83 Perum Bankal', '217', '2', 'EVAKUASI HEWAN LIAR/BUAS', '01 Mei 2022 16:00', '01 Mei 2022 16:30', 1, 'CC112 TIM DAMKAR berhasil mengevakuasi ular Cobra yang masuk ke rumah warga.\r\nNama Pelapor : Bapak Abu Bakar\r\nAlamat : Jl. Masalembu 83 RT 003 RW 011 Pamolokan\r\nKec. Kota Sumenep\r\nJenis Ular : Cobra\r\n', '', '', '05', '2022'),
(375, 'LatLng(-7.000016, 113.902573)', 'Jl. Raya Gapura - Braji', '157', '15', 'KECELAKAAN LALU LINTAS', '02 Mei 2022 05:30', '02 Mei 2022 06:30', 1, 'CC112 TIM Polres Sumenep mengevakuasi laka tunggal mobil avansa  jatuh ke sungai jl. Raya Gapura sebelah timur jembatan braji.', '', '', '05', '2022'),
(376, 'LatLng(-7.069399, 114.43222)', 'Perairan Sepudi dan Raas', '294', '32', 'KECELAKAAN LAUT', '03 Mei 2022 12:00', '', 1, 'CC112 TIM Basarnas mendapatkan telegram dari  Basarnas Surabaya tentang hilangnya ABK kapal Cargo Quorn Autralia kewarganegaraan Liberia di Pulau Madura diperairan  Raas dan CC112 Kab Sumenep menintruksikan ke semua TIM di kepulauan untuk melakukan pencairan.', '', '', '05', '2022'),
(377, 'LatLng(-7.008708, 115.705948)', 'Sapekan', '320', '24', 'KRIMINALITAS', '03 Mei 2022 11:00', '03 Mei 2022 14:00', 1, 'CC112 TIM Puskesmas Sapeken berhasil memberikan pertolongan sementara korban penusukan dari pulau Sepanjang dan korban akan di rujuk ke rumah sakit terdekat yaitu ke pulau bali rumah sakit Buleleng Singaraja', '', '', '05', '2022'),
(378, 'LatLng(-6.934853, 115.681572)', 'Pulau Sitabbok', '318', '24', 'KECELAKAAN LAUT', '05 Mei 2022 12:30', '05 Mei 2022 15:00', 1, 'CC112 Responder melaporkan terjadi laka laut kapal sabuk nusaantara 91 tujuan Sapeken - Kalianget menabrak karang di perairan pulau sitabbok desa Sapekan, TIM Dishub Sapeken beserta Pemdes Sapeken lansung melakukan evakuasi penumpang melalui perahu ke pulau Sapeken ', '', '', '05', '2022'),
(379, 'LatLng(-6.999951, 113.854752)', 'Jl. Pahlawan (Barat Pasar Burung)', '209', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '09 Mei 2022 11:00', '12 Mei 2022 12:00', 1, 'CC112 TIM Satpol PP mengevakuasi ODGJ di Jl. Pahlawan (Pasar Burung) Pamolokan\r\nPenelpon : Bpk Feri\r\nAlamat : Pamolokan\r\nLaporan : ODGJ (anggota keluarga yg mengalami depresi(mengamuk) guna mendapatkan perawatan lebih lanjut ke RSJ Menur)', '', '', '05', '2022'),
(380, 'LatLng(-7.006298, 113.855159)', 'Jl. Mutiara 1 No. 6 Bangselok', '214', '2', 'PERMINTAAN AMBULAN', '09 Mei 2022 11:45', '09 Mei 2022 12:00', 1, 'CC112 TIM Puskesmas Pandian mengevakuasi pasien darurat ke RSUD Moh. Anwar Sumenep\r\nPelapor : Bpk Bilal\r\nAlamat : Jl. Mutiara 1 No. 6 \r\nDesa : Keluarahan Bangselok\r\nKec. Kota Sumenep', '', '', '05', '2022'),
(381, 'LatLng(-7.039602, 113.895221)', 'Marengan laok kalianget', '4', '1', 'GIAT EVAKUASI', '12 Mei 2022 12:00', '09 Mei 2022 13:00', 1, 'CC112 TIM Damkar menerima untuk bantuan utk melepaskan cicin dijari manis yg tidak bisa dilepas karena jari manisnya bengkak.\r\nNama : Sulastri\r\nAlamat : Marengan Laok\r\nKec. Kalianget', '', '', '05', '2022'),
(382, 'LatLng(-7.00952, 113.855009)', 'Jl. KH. Sajad Bangselok', '214', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '10 Mei 2022 11:00', '10 Mei 2022 13:00', 1, 'CC112 TIM Satpol PP mengamankan seorang laki-laki yg diduga mengalami depresi(membuang sampah/batu kejalan umum/bakar sampah disebuah rumah kosong) guna mendapatkan perawatan dan penanganan lebih lanjut ke RPS DINSOS', '', '', '05', '2022'),
(383, 'LatLng(-7.002596, 113.856857)', 'Jl. Nangka Karangduak', '219', '2', 'PERMINTAAN AMBULAN', '11 Mei 2022 11:30', '11 Mei 2022 12:00', 1, 'CC112 TIM Puskesmas Pandian mengevakuasi pasien darurat ke RSUD Moh. Anwar Sumenep Alamat : Jl. Nangka Kelurahan : Karangduak Kec. Kota Sumenep', '', '', '05', '2022'),
(384, 'LatLng(-7.002305, 113.980998)', 'Jl. pakamban - Andulang', '152', '15', 'KEBAKARAN', '13 Mei 2022 13:15', '17 Mei 2022 12:00', 1, 'CC112 TIM Damkar dan PLN Sumenep mengevakuasi laporan meter listrik tebakar dan berhasil di amankan\r\nnama pelapor : Abdurraman\r\nAlamat : Andulang - Gapura\r\nNama pemilik rumah : Riskiyah\r\nAlamat : Desa Andulang - Gapura', '', '', '05', '2022'),
(385, 'LatLng(-7.00353, 113.869879)', 'Jl. Mahoni - Pangarangn', '210', '2', 'GIAT EVAKUASI', '14 Mei 2022 16:30', '14 Mei 2022 17:00', 1, 'CC112 TIM Damkar mengevakuasi laporan cincin jatuh ke selokan ', '', '', '05', '2022'),
(386, 'LatLng(-7.118258, 113.889856)', 'Desa Tanjung - Saronggi', '335', '7', 'PERMINTAAN AMBULAN', '16 Mei 2022 07:00', '16 Mei 2022 09:00', 1, 'CC112 TIM Puskesmas Saronggi dan RSUD mengevakuasi menemuan mayat di desa Tanjung kec. Saronggi\r\nMayat : Laki-laki\r\nIndetitas ; Masih belum diketahui', '', '', '05', '2022'),
(387, 'LatLng(-7.025731, 113.859751)', 'Jl. Adipoday', '221', '2', 'KEAMANAN DAN KETERTIBAN MASYARAKAT', '16 Mei 2022 08:40', '16 Mei 2022 11:20', 1, 'CC112 TIM Satpol PP menindaklanjuti laporan masyarakat terkait  dugaan asusila di sebuah rumah kost jl.adi poday ds.kolor kec.kota sumenep.\r\nPelapor : Ibu herlin\r\nAlamat : Kolor', '', '', '05', '2022'),
(388, 'LatLng(-7.06122, 113.944166)', 'Jl. Raya Talango', '343', '18', 'KEAMANAN DAN KETERTIBAN MASYARAKAT', '16 Mei 2022 11:50', '16 Mei 2022 13:15', 1, 'CC112 TIM Polres Sumenep dan Dishub menilanjuti laporan antrian penyeberangan Talango - Kalianget yang mengakibatkan kericuhan akibat saling serobot\r\nPelapor : Pak Tohir\r\nAlamat : Talango ', '', '', '05', '2022'),
(389, 'LatLng(-6.982509, 113.849572)', 'Jl. Raya Rubaru Lalangon ', '251', '4', 'PERMINTAAN AMBULAN', '16 Mei 2022 20:00', '16 Mei 2022 20:10', 1, 'CC112 TIM Puskesmas Manding mengevakuasi pasien darurat di Desa Lalangon Kec. Manding\r\nPelapor : Adi\r\nAlamat : Lalangon \r\nKec. Manding\r\nKejadian : Permintaan ambulan untuk masyarakat kondisi tidak sadar', '', '', '05', '2022'),
(390, 'LatLng(-7.002574, 113.855602)', 'Jl. Pahlawan Pamolokan', '209', '2', 'TIANG LISTRIK RUBUH', '13 Mei 2022 12:00', '30 Mei 2022 19:00', 1, 'CC112 TIM Telkom Sumenep mengevakuasi kabel mengganggu pemilik rumah di jl. Pahlawan dan info dari PT. Telkom ternyata kable milik EFORTE.\r\nPelapor : Ibu Sri Pamolokan', '', '', '05', '2022'),
(391, 'LatLng(-7.035282, 113.675559)', 'Desa Penanggungan Guluk-guluk', '192', '9', 'PERMINTAAN AMBULAN', '23 Mei 2022 17:30', '23 Mei 2022 19:00', 1, 'CC112 TIM BPBD dan Puskesmas Guluk-guluk mengevakuasi korban tenggelam di DAM Penaggungan \r\nPelapor : Camat Guluk-guluk\r\nKorban : 2 Orang Meninggal', '', '', '05', '2022'),
(392, 'LatLng(-6.998566, 113.870008)', 'Desa Bangkal', '217', '2', 'EVAKUASI HEWAN LIAR/BUAS', '27 Mei 2022 11:30', '27 Mei 2022 13:00', 1, 'CC112 TIM Damkar berhasil mengvakuasi sarang lebah di desa Bangkal\r\npenelpon : Angga Gusti Pratama\r\nAlamat : Desa Bangkal \r\nKecamatan Kota Sumenep', '', '', '05', '2022'),
(393, 'LatLng(-6.97686, 113.809175)', 'Jl. Raya Rubaru (Barat asta tinggi)', '307', '12', 'TIANG LISTRIK RUBUH', '27 Mei 2022 17:00', '27 Mei 2022 19:00', 1, 'CC112 TIM Dishub menegevakuasi Tiang PJU di jl. Rubaru(Barat Asta Tinggi \r\nPelapor : Sekcam Rubaru', '', '', '05', '2022'),
(394, 'LatLng(-7.024496, 113.879482)', 'Jl Slamet Riyadi Ds.Pabian Kec.Kota', '224', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '29 Mei 2022 20:00', '29 Mei 2022 21:00', 1, 'CC112 TIM Satpol PP mengevakuasi ODGJ di desa Pabian\r\nPelapor : Moh.Rasidi\r\nAlamat : Jl Slamet Riyadi Ds.Pabian Kec.Kota\r\nObyek Laporan : Orang depresi', '', '', '05', '2022'),
(395, 'LatLng(-7.008641, 113.855406)', 'Jl. Kemala Bangselok ', '214', '2', 'EVAKUASI HEWAN LIAR/BUAS', '30 Mei 2022 09:00', '30 Mei 2022 10:00', 1, 'CC112 TIM Satpol PP dan Damkar berhasil mengevakuasi kuda lepas dari kandang\r\nPelapor : Bintoro\r\nAlamat : Jl Kemala Kel.Bangselok Kec.Kota\r\n', '', '', '05', '2022'),
(396, 'LatLng(-7.019913, 113.864343)', 'Jl. Adirasa (Mini Market Ary)', '221', '2', 'KEBAKARAN', '31 Mei 2022 13:30', '31 Mei 2022 14:00', 1, 'CC112 Tim Damkar dan Puskesmas Pandian berhasil mengevakuasi  kebakaran mini market Ary  di lantai 3(Gudang)\r\nObjek terbakar : Makanan ringan/snak,\r\nKorban : Nihil,\r\nKerugian : - \r\n\r\n', '', '', '05', '2022'),
(397, 'LatLng(-7.033769, 113.891924)', 'Marengan Laok(Selatan Alfamart)', '4', '1', 'KEAMANAN DAN KETERTIBAN MASYARAKAT', '01 Juni 2022 19:30', '01 Juni 2022 20:00', 1, 'CC112 Tim Satpol PP mengevakuasi orang tak dikenal perempuan dari desa saasa mengganggu  ketenangan masyarakat \r\nKejadian : Orang tidak dikenal mengganggu ketentraman \r\nLokasi : Marengan Laok, Kalianget\r\nPelapor : Busrawi\r\nAlamat : Marengan Laok kec. kalianget', '', '', '06', '2022'),
(398, 'LatLng(-7.007317, 113.857184)', 'Jl. Berlian', '214', '2', 'GIAT EVAKUASI', '03 Juni 2022 09:00', '03 Juni 2022 10:00', 1, 'CC112 TIM Damkar berhasil mengevakuasi selokan yg tersumbat dan meluap\r\nPelapor : Lurah Bangselok', '', '', '06', '2022'),
(399, 'LatLng(-6.989654, 113.863807)', 'Desa Kebunan ', '220', '2', 'KEAMANAN DAN KETERTIBAN MASYARAKAT', '07 Juni 2022 14:20', '07 Juni 2022 14:35', 1, 'CC112 TIM Satpol PP Menindaklanjuti laporan masyarakat terkait  orang depresi mengamuk di Ds.Kebunan  Kec.Kota sumenep yang mengakibatkan resah warga setempat\r\nPelapor : Mariam\r\nDesa : Kebunan\r\nKec. Kota Sumenep', '', '', '06', '2022'),
(400, 'LatLng(-7.164637, 114.327464)', 'Pasar Gayam', '169', '30', 'KEBAKARAN', '06 Juni 2022 16:30', '06 Juni 2022 17:30', 1, 'CC112 Tim Damkar Kec. Gayam, semua TIM CC112 Kec. Gayam dan di bantu masyarakat menhasil memamdamkan kebakaran di pasar Gayam Kec. Gayam\r\nKorban Jiwa : Nihil, Kerugian : Ratusan Juta', '', '', '06', '2022'),
(407, 'LatLng(-7.090975, 113.849425)', 'Desa Saroka ', '331', '7', 'KEBAKARAN', '19 Juni 2022 09:45', '19 Juni 2022 11:00', 1, 'CC112 Tim Damkar berhasil memadamkan kebakaran di desa Saroka Kecamatan Saronggi\r\nPelapor : Moh. Ariyanto\r\nAlamat : Desa Saroka\r\nKejadian : Kebakaran\r\nKronologi : Akibat sambungan listrik/stop kontak yg kelebihan beban \r\nKorban : Nihil \r\nKerugian : +- 10Jt\r\n', '', '', '06', '2022'),
(408, 'LatLng(-7.055535, 113.945249)', 'Pelabuhan Kalianget', '2', '1', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '22 Juni 2022 11:00', '22 Juni 2022 13:00', 1, 'CC112 Tim Polairut Polres Sumenep dan Satpol PP menyelamatkan terduga ODGJ tenggelam di pelabuhan Kalianget dan sudah di serahkan ke keluarganya\r\nPenelpon : Herman\r\nAlamat : Kalianget Timur\r\nKondisi Korban : luka Lecet', '', '', '06', '2022'),
(409, 'LatLng(-7.07059, 113.834195)', '', '329', '7', 'KECELAKAAN LALU LINTAS', '28 Juni 2022 01:40', '28 Juni 2022 09:00', 1, 'TIM CC112 Mengamankan dan mengavakuasi kecelakaan tangki Oxigen Samator  terguling  di desa Nambakor kec. Saronggi', '', '', '06', '2022'),
(410, 'LatLng(-7.037764, 113.912215)', 'Jl. Rasa Lojikantang', '11', '1', 'KEBAKARAN', '28 Juni 2022 12:30', '28 Juni 2022 13:00', 1, 'TIM Damkar dan Polsek Kota berhasil memadamkan kebakaran di desa Kalimo ok (Timur SMP 1)Kec. kalianget', '', '', '06', '2022'),
(411, 'LatLng(-7.032765, 113.904367)', 'Perumahan Pondok Mytiara Harum 09', '11', '1', 'KEBAKARAN', '06 Juli 2022 16:30', '06 Juli 2022 18:00', 1, 'CC112 TIM Damkar berhasil memadamkan kebakaran di perumahan pondok mutiara harum desa Kalimo ok kecamtan Kalianget\r\nPenelpon : Candra Cahyadi\r\nAlamat : Pondok Mutiara Harum 09 Kaliamo ok Kalianget\r\nKronologi : Kebocoran Gas LPG', '', '', '07', '2022'),
(412, 'LatLng(-7.005718, 113.863565)', 'Jl. Pendekar Kepanjen', '213', '2', 'PERMINTAAN AMBULAN', '06 Juli 2022 23:25', '06 Juli 2022 23:45', 1, 'CC112 TIM Puskesmas Pandian mengevakuasi Pasien di Jl. Pendekar  Kelurahan Kepanjen Kec. kota Sumenep ke RSUD Sumenep.', '', '', '07', '2022'),
(413, 'LatLng(-7.056244, 113.941993)', 'Jl. Raya Pelabuhan kalianget', '2', '1', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '08 Juli 2022 16:00', '08 Juli 2022 17:00', 1, 'CC112 Tim Satpol PP menegvakuasi terduga ODGJ memukul orang tua  diamankan di Polsek Kalianget dan serahkan ke Dinas Sosial Kab. Sumenep\r\nPelapor : Asmoro\r\nAlamat kalianget Timur Kec. Kalianget', '', '', '07', '2022'),
(414, 'LatLng(-7.003935, 113.864032)', 'Jl. Pujangga  Kelurahan Kepanjen', '213', '2', 'PERMINTAAN AMBULAN', '10 Juli 2022 10:45', '10 Juli 2022 11:00', 1, 'CC112 Tim Puskesmas Pandian mengevakuasi pasien orang tua tidak sadarkan diri.\r\nPelapor : Vety\r\nAlamat : Jl. Pujangga Keluarahan Kepanjin Ke. Kota Sumenep', '', '', '07', '2022'),
(415, 'LatLng(-7.015909, 113.857986)', 'Jl. Trunojoyo (Depan SDN Kolor)', '221', '2', 'KEBAKARAN', '10 Juli 2022 22:00', '10 Juli 2022 22:15', 1, 'CC112 Tim Damkar berhasil memadamkan bak sampah di jl. trunojoyo Desa Kolor Kec. Kota Sumenep\r\nPelapor : Afif\r\nAlamat : Kolor', '', '', '07', '2022'),
(419, 'LatLng(-6.997577, 113.958843)', 'Jl. Raya Gapura (Depan Kecamatan Gapura)', '159', '15', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '13 Juli 2022 08:00', '13 Juli 2022 09:00', 1, 'CC112 Tim Satpol PP mengevakuasi ODGJ di jalan raya Gapura depan kantor Kecamatan Gapura.', '', '', '07', '2022'),
(420, 'LatLng(-7.016148, 113.859236)', 'Jl. Tronojoyo (Pasar Anom)', '221', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '16 Juli 2022 20:30', '16 Juli 2022 21:00', 1, 'CC112 Tim Satpol PP mengevakuasi orang dengan gangguan jiwa  ke RPS Dinsos Kab.Sumenep\r\nPelapor : Pak Ihwan\r\nAlamat : Kolor Sumenep', '', '', '07', '2022'),
(421, 'LatLng(-7.004936, 113.851664)', 'Jl. Teuku Umar (Depan puskesmas Pandian)', '212', '2', 'KEBAKARAN', '18 Juli 2022 08:00', '18 Juli 2022 08:10', 1, 'CC112 Tim Damkar, Polsek Kota dan Babinsa Kota Sumenep berhasil memadamkan kebakaran di Jl. Teuku Umar depan puskesmas pandian\r\nPelapor : Puskesmas Pandian\r\nKronologi : Akibat Konsteling Listrik.', '', '', '07', '2022'),
(422, 'LatLng(-7.021568, 113.85709)', 'Jl. Tronojoyo (Pom bensin Kolor)', '221', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '12 Juli 2022 12:30', '19 Juli 2022 13:00', 1, 'CC112 Tim Satpol PP mengevakuasi ODGJ di jalan Trunojoyo depan POM Bensin Kolor dan di diserahkan RPS Dinas Sosial.\r\nPelapor : Sufiyanti\r\nAlamat : Kolor', '', '', '07', '2022'),
(423, 'LatLng(-7.015259, 113.861591)', 'Jl. Dr. Cipto (Perum BTN)', '221', '2', 'GIAT EVAKUASI', '19 Juli 2022 16:00', '19 Juli 2022 17:00', 1, 'CC112 Tim Damkar melakukan Giat Evakuasi penanganan selokan?irigasi buntu\r\nPelapor : Bapak Kasyfi\r\nAlamat : Perum BTN Kolor', '', '', '07', '2022'),
(424, 'LatLng(-7.013667, 113.858437)', 'Jl. Trunojoyo(Depan BRI)', '221', '2', 'KEAMANAN DAN KETERTIBAN MASYARAKAT', '20 Juli 2022 18:00', '20 Juli 2022 18:15', 1, 'CC112 Tim Satpol PP mengevakuasi seorang perempuan mengandung membawa anaknya berumur 7 tahun dan 4 tahun mengemis dinjalanan\r\nPelapor  : Masyarakat \r\n', '', '', '07', '2022'),
(425, 'LatLng(-7.017592, 113.854929)', 'Jl. Lumba-lumba Kolor', '221', '2', 'KEAMANAN DAN KETERTIBAN MASYARAKAT', '20 Juli 2022 20:00', '22 Juli 2022 20:30', 1, 'CC112 Tim Satpol PP mengevakuasi  orang terlantar dan salah satu meninggal dunia.\r\nPelapor :Achmad Bardi\r\nAlamat : Desa Kolor', '', '', '07', '2022'),
(426, 'LatLng(-7.01367, 113.868857)', 'Jl. Dr. Cipto (Perempatan PLN)', '215', '2', 'KEBAKARAN', '24 Juli 2022 02:50', '24 Juli 2022 03:00', 1, 'CC112 Tim Damkar berhasil memadamkan kebakaran pos rumah potong hewan Kelurahan Pajagalan \r\nKorban : Nihil ', '', '', '07', '2022'),
(427, 'LatLng(-7.009294, 113.854293)', 'Jl. KH. Sajad Bangselok', '214', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '25 Juli 2022 19:30', '25 Juli 2022 20:00', 1, 'CC112 Tim Satpol PP menegvakuasi ODGJ di kelurahan Bangselok\r\nPelapor : Warga Bangselok \r\nKec. : Kota Sumenep', '', '', '07', '2022'),
(428, 'LatLng(-6.884808, 113.976288)', 'Desa Badur Kec. Batuputih', '75', '28', 'BENCANA ALAM', '26 Juli 2022 11:30', '26 Juli 2022 13:00', 1, 'CC112 Tim BPBD langsung melakukan Asessment & Penggalian Data Informasi laporan kekeringan\r\nPelapor : Warga Badur\r\nDesa : Badur\r\nKec. : Batuputih', '', '', '07', '2022'),
(429, 'LatLng(-6.985458, 113.83957)', 'Desa Kasengan RT 01 RW 05 Kecamatan Manding', '250', '4', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '29 Juli 2022 13:25', '29 Juli 2022 15:15', 1, 'CC112 Tim Satpol PP mengevakuasi ODGJ merusak rumah di Desa Kasengan RT 01 RW 05 Kecamatan Manding\r\nPelapor : Dr. Utomo', '', '', '07', '2022'),
(430, 'LatLng(-7.057148, 113.942299)', 'Pelabuhan Kalianget', '2', '1', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '31 Juli 2022 10:25', '31 Juli 2022 11:00', 1, 'CC112 Tim Satpol PP mengevakuasi ODGJ di Pelabuhan Kalianget\r\nPelapor : Bapak Samin', '', '', '08', '2022'),
(431, 'LatLng(-7.014852, 113.858652)', 'Jl. Tronojoyo (Bank BCA)', '221', '2', 'KEBAKARAN', '01 Agustus 2022 14:20', '01 Agustus 2022 14:30', 1, 'CC112 Tim Damkar berhasil memadamkan tumkan kayu digudang yang kosong.\r\nPelapor : Warga Desa Kolor.', '', '', '08', '2022'),
(432, 'LatLng(-7.164709, 114.329897)', 'Desa Gendang Timur', '171', '30', 'KECELAKAAN KERJA', '03 Agustus 2022 21:00', '04 Agustus 2022 01:40', 1, 'CC112 Tim Puskesmas Gayam memberi pertolongan korban kecelakaan kerja\r\nkena poli mesin bata  pelipis kiri  \r\nKorban : Meninggal Dunia\r\nNama : Nawi', '', '', '08', '2022'),
(433, 'LatLng(-7.008971, 113.859231)', 'Jl. Trunojoyo', '214', '2', 'GIAT EVAKUASI', '06 Agustus 2022 13:20', '09 Agustus 2022 13:25', 1, 'CC112 Tim Damkar berhasil mengeluarkan cincin emas yg tidak bisa dilepas dari jarinya dikarenakan cincin yg sudah kekecilan.\r\n', '', '', '08', '2022'),
(434, 'LatLng(-6.999239, 113.87032)', 'Jl. Sapeken Desa Bangkal', '217', '2', 'PERMINTAAN AMBULAN', '09 Agustus 2022 11:45', '09 Agustus 2022 11:50', 1, 'CC112 Tim Puskesmas mengevakuasi korban jatuh sakit tidak sadarkan diri pada saat bertamu dan dinyatakan meninggal dunia sehingga jenazah langsung diantar ke rumahnya di Desa Marengan Daya Kecamatan Kota Sumenep\r\n', '', '', '08', '2022'),
(435, 'LatLng(-7.038678, 113.903643)', 'Jl. Raya Kalianget - Kertasada', '10', '1', 'KEBAKARAN', '09 Agustus 2022 17:00', '09 Agustus 2022 18:00', 1, 'CC112 Tim Damkar berhasil memadamkan Kebakaran tumpukan daun dan batang bambu yang sengaja di bakar selang  10 menit menjalar ke pohon bambu yang berdekatan dengan rumah warga', '', '', '08', '2022'),
(436, 'LatLng(-7.033964, 114.454193)', 'Perairan  Raas', '294', '32', 'KECELAKAAN LAUT', '11 Agustus 2022 00:30', '', 1, 'CC112 menerima laporan hilangnya KLM Putra Kembar bertolak dari pelabuhan kalianget menuju pelabuhan batu guluk kec.arjasa hari minggu tgl 7/8/2022 dengan muatan bahan bangunan dengan 3 ABK dan hilang kontak 8/8/2022 yang seharusnya sudah bersandar di pelabuhan Batu Guluk Kangean\r\nPelapor : Agus Junaedi', '', '', '08', '2022'),
(437, 'LatLng(-7.020471, 113.808135)', 'Jl. Raya Lenteng Desa Daramista', '230', '5', 'KEBAKARAN', '11 Agustus 2022 19:00', '11 Agustus 2022 20:05', 1, 'CC112 Tim Damkar berhasil memadamkan Kebakaran Mobil Sedan Toyota Corona Excellent th 1991, No Pol L 1817 MW kebakaran terjadi di Cap Mobil yg terjadi percikan api selang 5 menit api membesar di mesin mobil pemilik mobil panik segera keluar dari dalam mobil & segera minta bantuan untuk menelp Call Center 112 yg di teruskan ke Mako Damkar \r\nPemilik : Syamsul Arifin\r\nAlamat : Desa Sangra Bluto\r\n', '', '', '08', '2022'),
(438, 'LatLng(-7.039849, 113.901266)', 'Desa Kertasada', '10', '1', 'KEBAKARAN', '12 Agustus 2022 00:00', '12 Agustus 2022 01:00', 1, 'CC112 Tim Damkar berhasil memadamkan kebakaran mobil anggkutan Kalianget - Sumenep dengan nopol M 1357 UV yang sedang parkir di Desa Kertasada Kecamatan Kalianget', '', '', '08', '2022'),
(439, 'LatLng(-7.103383, 113.809605)', 'Jl. Raya Bluto ', '91', '8', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '14 Agustus 2022 15:00', '14 Agustus 2022 17:30', 1, 'CC112 Tim Satpol PP dan Puskesmas Bluto menangani terduga ODGJ meresahkan masyarakat sehingga dilakukan mediasi dengan keluarga dan masyarakat setempat untuk dilakukan tindakan.\r\nPelapor : Fajar', '', '', '08', '2022'),
(440, 'LatLng(-6.99402, 113.864182)', 'Jl. Raya Saluaran Air Pamolokan', '209', '2', 'PERMINTAAN AMBULAN', '15 Agustus 2022 03:30', '15 Agustus 2022 04:45', 1, 'CC112 Tim Puskesmas Pandian mengevakuasi pasien sesak nafas akibat penyakit kangker paru-paru ke RSUD H. Moh. Anwar Sumenep\r\nPelapor : Moh. Iqbal', '', '', '08', '2022'),
(441, 'LatLng(-7.038462, 113.777665)', 'Lteng Timur (Timur Polsek)', '236', '5', 'KEBAKARAN', '23 Agustus 2022 23:25', '24 Agustus 2022 01:30', 1, 'CC112 Tim Damkar berhasil memadamkan kebakaran di rumah Imam di Desa Lenteng Timur \r\nPelapor : Abdi \r\nAlamat : Desa Lenteng Timur', '', '', '08', '2022'),
(442, 'LatLng(-7.082152, 113.763149)', 'Dusun Sumber Langon Desa Sera Tengah', '106', '8', 'KEBAKARAN', '24 Agustus 2022 09:45', '24 Agustus 2022 10:30', 1, 'CC112 Tim Damkar berhasil memadamkan kandang sapi di Dusun Sumber Langon  Desa Serah Tengah Kecamatan Bluto', '', '', '08', '2022'),
(443, 'LatLng(-7.107832, 113.820527)', 'Desa Soronggi', '332', '7', 'KEBAKARAN', '30 Agustus 2022 04:00', '30 Agustus 2022 05:00', 1, 'CC112 Tim Damkar berhasil pemadamkan kebakaran kandang sapi di desa Saronggi Dusun Nang Nangan\r\nPenelpon : Polsek saronggi', '', '', '09', '2022'),
(444, 'LatLng(-7.025208, 113.852863)', 'Desa Gedungan', '216', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '01 September 2022 09:50', '01 September 2022 11:50', 1, 'CC112 Tim Satpol PP mengevakuasi terduga ODGJ ke RPS Dinsos\r\nPelapor : Dita', '', '', '09', '2022'),
(445, 'LatLng(-7.01424, 113.857643)', 'Jl. Trunojoyo (Belakang Kantor Pajak) Kolor', '221', '2', 'EVAKUASI HEWAN LIAR/BUAS', '05 September 2022 05:00', '05 September 2022 06:00', 1, 'CC112 Tim Damkar merhasil mengevakuasi ular yang keluar dari closet kamar mandi warga Kolor\r\nPelapor : Joko', '', '', '09', '2022'),
(446, 'LatLng(-7.02674, 113.632965)', 'Desa Payudan Nangger', '196', '9', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '07 September 2022 08:00', '12 September 2022 10:00', 1, 'CC112 Tim Satpol PP mengamankan dan mengevakuasi  ODGJ ke RSUD Moh. Anwar Sumenep\r\nPelapor : Bapak Didik', '', '', '09', '2022'),
(447, 'LatLng(-7.000469, 113.869965)', 'Jl.  Raya Gapura ( Pertigaan Rumdis Sekda)', '217', '2', 'TIANG LISTRIK RUBUH', '13 September 2022 20:00', '13 September 2022 21:00', 1, 'CC112 Tim Damkar, Satlantas Polres Sumenep, PLN, Telkom mengevakauasi  kabel yg lepas akibat tersangkut Truk yang mengakibatkan tiang Telkom miring dan Lampu Lalin miring\r\nPelapor : Bapak Adi Jaya', '', '', '09', '2022'),
(448, 'LatLng(-7.04749, 113.946156)', 'Jl. Raya Gersik Putih ( Depan SMP 2 Kalianget)', '2', '1', 'KEBAKARAN', '17 September 2022 18:00', '17 September 2022 20:00', 1, 'CC112 Tim Damkar berhasil memadamkan kebakaran di toko dan servis kendaraan roda 2 di Desa Kalianget Timur \r\nPenelpon : Bapak Airlangga\r\n\r\n\r\n', '', '', '09', '2022'),
(449, 'LatLng(-7.105204, 113.811589)', 'Jl. Raya Bluto ', '91', '8', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '21 September 2022 09:00', '26 September 2022 10:00', 1, 'CC112 Tim Satpol PP dan puskesmas Bluto mengevakuasi ODGJ ke RSP dinsos \r\nPelapor : Puskesmas Bluto', '', '', '09', '2022'),
(450, 'LatLng(-6.994872, 113.842832)', 'Jl Raya Asta Tinggi', '211', '2', 'KEBAKARAN', '22 September 2022 13:00', '22 September 2022 15:00', 1, 'CC112 semua Tim memadamkan kebakaran lahan di sebalah barat Asta Tinggi', '', '', '09', '2022'),
(451, 'LatLng(-7.000377, 113.84752)', 'Jl. Asta Tinggi ', '211', '2', 'KEBAKARAN', '25 September 2022 12:00', '25 September 2022 14:00', 1, 'CC112 semua Tim memadamkan kebakaran lahan di Desa Kebonagung', '', '', '09', '2022'),
(452, 'LatLng(-7.005143, 113.857659)', 'Jl. Karangduak', '219', '2', 'PERMINTAAN AMBULAN', '26 September 2022 15:00', '26 September 2022 16:00', 1, 'CC112 Tim Puskesmas Pandian mengevakuasi  permintaan ambulan kepada warga yang tidak punya sanak keluarga di Desa Karangduak  ke RSUD H. Moh. Anwar Sumenep\r\nPelapor  : Novan Kepanjen', '', '', '09', '2022'),
(453, 'LatLng(-7.019087, 113.857884)', 'Jl. Trunojoyo', '221', '2', 'EVAKUASI HEWAN LIAR/BUAS', '02 Oktober 2022 15:00', '02 Oktober 2022 15:30', 1, 'CC112 Tim Damkar mengevakuasi ular masuk kerumah warga di Desa Kolor \r\nPelapor : Moh. hasan Paradisi\r\n', '', '', '10', '2022'),
(454, 'LatLng(-7.120021, 113.786556)', 'Desa Aengdake', '90', '8', 'KEBAKARAN', '04 Oktober 2022 12:00', '05 Oktober 2022 13:00', 1, 'CC112 Tim Damkar dan BPBD memadamkan kebakaran di Desa Aengdake Kec. Bluto', '', '', '10', '2022'),
(455, 'LatLng(-6.978397, 113.882325)', 'Desa Tenonan', '256', '4', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '05 Oktober 2022 20:35', '05 Oktober 2022 21:00', 1, 'CC112 Tim Satpol PP mengavakuasi ODGJ di Desa Tenonan Kecamatan Manding ke RPS Dinsos\r\nPelapor : Bapak Hayyi\r\nAlamat : Desa Tenonan \r\nKec. Manding', '', '', '10', '2022'),
(456, 'LatLng(-7.000972, 113.856661)', 'Jl. Pahlawan Pamolokan', '209', '2', 'PERMINTAAN AMBULAN', '08 Oktober 2022 23:00', '08 Oktober 2022 23:30', 1, 'CC112 Tim Puskesmas Pandian merujuk pasien lumpuh dan sesak ke RSUD Moh. Anwar Sumenep\r\nPenelpon :  Agus \r\nAlamat : Jl. Pahlawan Pamolokan ', '', '', '10', '2022'),
(457, 'LatLng(-7.052851, 113.87917)', 'Desa Karanganyar', '6', '1', 'BENCANA ALAM', '10 Oktober 2022 15:20', '10 Oktober 2022 16:00', 1, 'CC112 Semua Tim mengevakuasi kejadian Angin Puting Beliung di Desa Karangnganyar Kec. Kalianget\r\nKorban Jiwa : Nihil ', '', '', '10', '2022'),
(458, 'LatLng(-7.002396, 113.861071)', 'Simpang Empat jalan Kartini', '209', '2', 'TIANG LISTRIK RUBUH', '10 Oktober 2022 16:30', '10 Oktober 2022 17:00', 1, 'CC112 Tim BPBD dan PLN Sumenep mengevakuasi pohon yang mengenai tegangan tinggi karena angin kencang sehingga dilakukan pemotongan', '', '', '10', '2022'),
(459, 'LatLng(-7.006996, 113.994631)', 'Pelabuhan Bintaro', '164', '15', 'KEBAKARAN', '12 Oktober 2022 13:00', '12 Oktober 2022 15:00', 1, 'CC112 Tim Damkar dan BPBD berhasil memadamkan kebakaran kulit pohon kelapa di seputar pelabuhan Bintaro Desa Longos Kec. Gapura', '', '', '10', '2022'),
(460, 'LatLng(-6.989647, 113.86319)', 'Jl. Raya Manding ', '220', '2', 'PERMINTAAN AMBULAN', '30 Oktober 2022 11:00', '30 Oktober 2022 11:10', 1, 'CC112 Tim Puskesmas Pamolokan mengevakuasi permintaan ambulan pasien menuju RSUD\r\nPelapor : Hernayadi\r\nAlamat : Jl. Raya Manding\r\nDesa : Kebunan\r\nKec. Kota Sumenep', '', '', '10', '2022'),
(461, 'LatLng(-6.968313, 113.802942)', 'Desa Benasare ', '302', '12', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '09 November 2022 21:00', '09 November 2022 22:00', 1, 'CC112 TIM Saptol PP mengevakuasi ODGJ di desa Benasare Kec. Rubaru\r\nPelapor : Kepla Desa Benasare', '', '', '11', '2022'),
(462, 'LatLng(-7.032194, 113.706264)', 'Jl.  Gadu Barat', '143', '6', 'BENCANA ALAM', '10 November 2022 13:00', '10 November 2022 17:00', 1, 'CC112 TIM BPBD melakukan assement jalan ambles yang menyebabkan lubang lebar 5 meter kedalman 15 meter\r\nPelapor : Masyarakat Ganding', '', '', '11', '2022'),
(463, 'LatLng(-7.11289, 113.804487)', 'Jl. Raya Bluto', '91', '8', 'KEBAKARAN', '14 November 2022 18:00', '14 November 2022 19:00', 1, 'CC112 Tim Damkar berhasil memadamkan api di kabel milik telkom di Desa Bluto Kec. Bluto\r\nPelapor : Camat Bluto', '', '', '11', '2022'),
(464, 'LatLng(-7.003695, 113.860787)', 'Jl. Halim Perdana Kusuma ', '213', '2', 'PERMINTAAN AMBULAN', '18 November 2022 15:00', '18 November 2022 15:30', 1, 'CC112 Tim Damkar dan Puskesmas Pamolokan berhasil pengevakuasi pekerja bangunan tersetrom\r\nke RSUD H. Moh. Anwar', '', '', '11', '2022'),
(465, 'LatLng(-6.887042, 113.782654)', 'Desa Slopeng', '122', '11', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '04 Desember 2022 14:30', '04 Desember 2022 17:00', 1, 'CC112 Tim Satpol PP dan Puskesmas Dasuk mengevakuasi ODGJ ke RPS Dinas Sosial\r\nPelapor : Sekdes Slopeng', '', '', '12', '2022'),
(466, 'LatLng(-7.005707, 113.858914)', 'Karangduak', '219', '2', 'PERMINTAAN AMBULAN', '07 Desember 2022 12:00', '09 Desember 2022 15:00', 1, 'CC112 TimPuskesmas Pandian mengevakuasi permintaan ambulan ke RSI\r\nPelapor : Deni\r\nAlamat : Jl. Belimbing \r\nDesa Karangduak\r\nKec. Kota Sumenep', '', '', '12', '2022'),
(467, 'LatLng(-7.014752, 113.818016)', 'Desa Torbang', '73', '3', 'EVAKUASI HEWAN LIAR/BUAS', '12 Desember 2022 08:00', '12 Desember 2022 09:00', 1, 'CC112 Tim Damkar mengvakuasi Ular Sanca di Desa Tobang Kec. Batuan\r\nPelapor : Hj. Erni Fathor\r\nAlamat : Desa Torbang\r\nKec. : Batuan', '', '', '12', '2022'),
(468, 'LatLng(-7.009907, 113.859078)', 'Jl. Tengku Umar', '212', '2', 'KEBAKARAN', '14 Desember 2022 06:00', '14 Desember 2022 07:30', 1, 'CC112 Tim Damkar berhasil memadamkan kebakaran di warung makan Amlalia di desa Pandian Kec. Kota Sumenep\r\nPelapor : Warga Pandian', '', '', '12', '2022'),
(469, 'LatLng(-7.009424, 113.859124)', 'Jl. KH. Sajad Bangselok', '214', '2', 'POHON TUMBANG', '14 Desember 2022 13:00', '14 Desember 2022 13:30', 1, 'CC112 All Tim mengevakuasi pohon tumbang di depan Dinas PMD Kelurahan Bangselok Kec. Kota Sumenep\r\nPelapor : Yogik', '', '', '12', '2022');
INSERT INTO `lokasi` (`id`, `lat_long`, `alamat`, `desa`, `kec`, `kejadian`, `tanggal_terima`, `tanggal_selesai`, `approve`, `ket`, `nama_pelapor`, `noTelp_pelapor`, `bulan`, `tahun`) VALUES
(470, 'LatLng(-7.113743, 113.804138)', 'Jl. Raya Bluto', '91', '8', 'POHON TUMBANG', '23 Desember 2022 16:00', '23 Desember 2022 17:00', 1, 'CC112 Tim BPBD mengevakuasi pohon tumbang di jalan raya Bluto akibat angin kencang', '', '', '12', '2022'),
(471, 'LatLng(-6.887614, 113.662169)', 'Jl. Raya Pasongsongan', '274', '14', 'POHON TUMBANG', '23 Desember 2022 16:00', '23 Desember 2022 17:00', 1, 'CC112 Tim DLH mengavakuasi pohon roboh di jl. raya Pasongsongan(Depan Asta Panaongan)', '', '', '12', '2022'),
(472, 'LatLng(-7.041635, 113.893831)', 'Jl. Adi Sucipto - Desa Marengan Laok - Kalianget', '4', '1', 'TIANG LISTRIK RUBUH', '23 Desember 2022 16:00', '23 Desember 2022 17:00', 1, 'CC112 Tim PLNN dan Telkom melakukan pemeriksaan tiang yg roboh. Setelah dilakukan pemeriksaan bukan milik PLN dan Telkom sehingga taiang yang di amakan  sementara menunggu informasi lebih lanjut', '', '', '12', '2022'),
(473, 'LatLng(-6.957822, 113.759211)', 'Jl. Raya Rubaru', '311', '12', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '25 Desember 2022 19:00', '25 Desember 2022 20:00', 1, 'CC112 Tim Polsek Rubaru, Satpol PP dan Puskesmas Rubaru mengevakuasi ODGJ ke RSP Dinal Soasial', '', '', '12', '2022'),
(474, 'LatLng(-6.890254, 113.743987)', 'Jl. Raya Ambunten', '15', '13', 'POHON TUMBANG', '25 Desember 2022 11:00', '25 Desember 2022 13:00', 1, 'CC112 Tim DLH menvakuasi pohon tumbang di jl. raya Ambunten (Sebelum Patung Kerapan Sapi)', '', '', '12', '2022'),
(475, 'LatLng(-6.913005, 113.815334)', 'Desa Jelbuden - Dasuk', '115', '11', 'EVAKUASI HEWAN LIAR/BUAS', '26 Desember 2022 12:30', '26 Desember 2022 15:00', 1, 'CC112 Tim Damkar menuju lokasi serangan Kera dan telah melakukan pencarian dan belum berhasil menemukan kera tersebut  ', '', '', '12', '2022'),
(476, 'LatLng(-6.997724, 113.912108)', 'Jl. Raya Gapura -Desa Braji', '157', '15', 'KEBAKARAN', '26 Desember 2022 20:00', '26 Desember 2022 21:00', 1, 'CC112 Tim Damkar berhasil memadamkan kebakaran rumah di desa Braji Kec. Gapura', '', '', '12', '2022'),
(477, 'LatLng(-7.005756, 113.861589)', 'Jl. Letnan Ramli', '213', '2', 'PERMINTAAN AMBULAN', '30 Desember 2022 11:00', '30 Desember 2022 12:00', 1, 'CC112 TIM Puskesmas Pandian mengevakuasi pasien jatuh\r\nPelapor : Ibu Nunung', '', '', '01', '2022'),
(482, 'LatLng(-7.033856, 113.893676)', 'Desa Marengan Daya', '222', '2', 'BANJIR', '31 Desember 2022 21:00', '01 Januari 2023 17:00', 1, 'CC112 TIM Damkar melakukan upaya mengurangi terjadinya luapan sungai di desa Marengan Daya yang berdampak masuknya air ke pemukiman warga di 3 Dusun Desa Marengan Daya Kec. kota Sumenep', '', '', '01', '2022'),
(483, 'LatLng(-6.973027, 113.86209)', 'Jl. Raya Manding', '254', '4', 'POHON TUMBANG', '01 Januari 2023 07:00', '01 Januari 2023 08:00', 1, 'CC112 TIM DLH, BPBD dan Damkar berhasil mengevakuasi pohon nangka roboh ke jalan', '', '', '01', '2023'),
(484, 'LatLng(-7.004209, 113.848068)', 'Jl. Raya Lenteng Kebonagung', '211', '2', 'POHON TUMBANG', '01 Januari 2023 11:00', '', 1, 'CC112 TIM DLH dan BPBD mengevakuasi pohon roboh di Desa kebonagung (Selatan Jembatan) Desa Kebonagung Kec. Kota Sumenep', '', '', '01', '2023'),
(485, 'LatLng(-7.032973, 113.892898)', 'Perumahan Pondok Marengan Indah', '222', '2', 'BANJIR', '01 Januari 2023 11:00', '01 Januari 2023 17:00', 1, 'CC112 TIM Dankar berusaha menyedot air akibat luapan sungai dari bandara dan belum berhasil karena ketinggian air semakin bertambah di kawasan bandara', '', '', '01', '2023'),
(489, 'LatLng(-7.003525, 113.84881)', 'Desa Kebonagung', '211', '2', 'GIAT EVAKUASI', '03 Januari 2023 07:30', '03 Januari 2023 09:00', 1, 'CC112 TIM Satpol PP menuju lokasi kejadian gedung/bangunan mau roboh di desa kebonagung untuk dilakukan meninjauan lokasi dan telah dilakukan koordinasi dengan pemilik gedung untuk segera dirobohkan karena membahayakan pengguna jalan ', '', '', '01', '2023'),
(490, 'LatLng(-7.041192, 113.696276)', 'Jl. Raya Ganding', '144', '6', 'POHON TUMBANG', '05 Januari 2023 07:30', '05 Januari 2023 11:00', 1, 'CC112 TIM DLH mengevakuasi pohon tumbang di Kec. Ganding', '', '', '01', '2023'),
(491, 'LatLng(-7.012954, 113.858743)', 'Jl. Tronojoyo', '221', '2', 'KEBAKARAN', '06 Januari 2023 10:00', '06 Januari 2023 11:00', 1, 'CC112 TIM Damkar berhadil memadamkan kebakran gardu PLN di jalan Tronojoyo', '', '', '01', '2023'),
(492, 'LatLng(-7.005883, 113.861468)', 'Jl. Letnan Ramli', '213', '2', 'EVAKUASI HEWAN LIAR/BUAS', '09 Januari 2023 15:00', '09 Januari 2023 16:00', 1, 'CC112 TIM Damkar berhasil mengevakuasi Ular yang masuk kerumahnya.\r\nPelapor : Helmi \r\nAlamat : Kelurahan kepanjen', '', '', '01', '2023'),
(493, 'LatLng(-7.061903, 113.675129)', 'Desa Guluk-guluk', '190', '9', 'GIAT EVAKUASI', '11 Januari 2023 09:00', '11 Januari 2023 13:00', 1, 'CC112 TIM dan DLH melakukan penebangan pohon yang nempel dengan kabel PLN sehingga mengakibatkan keluarnya api saat hujan.\r\nPelapor : Ahmad Irfan', '', '', '01', '2023'),
(494, 'LatLng(-7.111757, 113.650096)', 'Jl. Raya Pakamban', '285', '10', 'GIAT EVAKUASI', '17 Januari 2023 13:00', '17 Januari 2023 15:00', 1, 'CC112 TIM PUPR melakukan giat evakuasi lubang di jembatan Pakamban buntu yang mengakibatkan air tergenang di jembatan.\r\nPelapor : Zubairi', '', '', '01', '2023'),
(495, 'LatLng(-7.023247, 113.805528)', 'Jl. Raya lenteng Daramista', '230', '5', 'PERMINTAAN AMBULAN', '18 Januari 2023 09:00', '18 Januari 2023 10:00', 1, 'CC112 TIM Puskemas Batuan Dan Ambulan RSUD mengevakuasi korban laka ', '', '', '01', '2023'),
(496, 'LatLng(-6.997885, 113.866489)', 'Jl. Raya Manding Pamolokan', '209', '2', 'PERMINTAAN AMBULAN', '18 Januari 2023 13:15', '18 Januari 2023 13:30', 1, 'CC112 TIM Puskemas Pamolokan mengevakuasi pasien permintaan ambula di Desa Pamolokan\r\nPelapor : Dio ', '', '', '01', '2023'),
(497, 'LatLng(-7.015227, 113.814706)', 'Jl. Raya Lenteng Desa Torbang', '73', '3', 'EVAKUASI HEWAN LIAR/BUAS', '22 Januari 2023 07:00', '22 Januari 2023 08:00', 1, 'CC112 TIM Damkar mengevakuasi Ular Piton di Desa Torbang Kecmatan Batuan', '', '', '01', '2023'),
(498, 'LatLng(-7.007741, 113.878806)', 'Desa Kacongan', '218', '2', 'EVAKUASI HEWAN LIAR/BUAS', '22 Januari 2023 08:00', '22 Januari 2023 09:00', 1, 'CC112 TIM Damkar mengevakuasi Ular Piton yang masuk ke rumah warga Desa Kacongan\r\nPelapor : Bpk Sunaryo', '', '', '01', '2023'),
(499, 'LatLng(-7.0428, 113.848851)', 'Jl. Raya Patean  Desa Kedungan', '69', '3', 'EVAKUASI HEWAN LIAR/BUAS', '23 Januari 2023 14:00', '23 Januari 2023 15:00', 1, 'CC112 TIM Damkar belum bisa mengevakuasi Ular Cobra karena setelah di lakukan pencarian belum ditemukan\r\nPelapor : Bpk Muris', '', '', '01', '2023'),
(500, 'LatLng(-7.054814, 113.940344)', 'Jl. Raya Pelabuhan kalianget', '2', '1', 'BENCANA ALAM', '24 Januari 2023 15:00', '24 Januari 2023 16:00', 1, 'CC112 TIM BPBD melakukan Assesmen kejadian angin puting beliaung di Desa kalianget Timur Dusun Tambangan\r\nPelapor : Bpk Rusdi', '', '', '01', '2023'),
(501, 'LatLng(-7.105851, 113.806547)', 'Jl. Raya Bluto - Lenteng', '91', '8', 'KEBAKARAN', '25 Januari 2023 10:30', '25 Januari 2023 14:00', 1, 'CC112 TIM Damkar berhasil memadamkan kebakaran truck bermuatan tabung gas LPG 3kg', '', '', '01', '2023'),
(502, 'LatLng(-7.001155, 113.878806)', 'Desa Parsanga', '225', '2', 'EVAKUASI HEWAN LIAR/BUAS', '29 Januari 2023 03:30', '29 Januari 2023 07:00', 1, 'CC112 TIM Damkar mengevakuasi Kerbau liar mengamuk di pemukiman warga Desa Parsanga\r\nPelpor : Bpk Basid', '', '', '01', '2023'),
(503, 'LatLng(-6.915211, 114.037099)', 'Puskesmas Legung', '61', '16', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '29 Januari 2023 10:50', '29 Januari 2023 13:00', 1, 'CC112 TIM Satpol PP mengamankan ODGJ mengamuk di puskesmas Legung\r\nPelapor : Puskesmas Legung', '', '', '01', '2023'),
(504, 'LatLng(-6.997991, 113.865824)', 'Jl. Raya Manding Pamolokan', '209', '2', 'EVAKUASI HEWAN LIAR/BUAS', '01 Februari 2023 05:00', '01 Februari 2023 06:00', 1, 'CC112 TIM Damkar berhasil mengevakuasi ular Piton di Desa Pamolokan\r\nPelapor : Ibu Titik Sutinah', '', '', '02', '2023'),
(505, 'LatLng(-7.047907, 113.941977)', 'Desa Kalianget Timur', '2', '1', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '02 Februari 2023 09:00', '02 Februari 2023 12:00', 1, 'CC112 TIM Satpol PP dan Puskesmas Kalianget mengevakuasi ODGJ ke RSP Dinsos\r\nPelapor : Camat Kalianget', '', '', '02', '2023'),
(506, 'LatLng(-7.011526, 113.743054)', 'Desa Ellak Laok', '232', '5', 'GIAT EVAKUASI', '03 Februari 2023 13:00', '03 Februari 2023 14:00', 1, 'CC112 All TIM CC112 megevakuasi korban tanah longsor di lokasi tambang batu di Desa Ellak Laok Kec. lenteng', '', '', '02', '2023'),
(508, 'LatLng(-7.014, 113.818443)', 'Jl. Raya Lenteng Desa Torbang', '73', '3', 'EVAKUASI HEWAN LIAR/BUAS', '05 Februari 2023 09:00', '05 Februari 2023 10:00', 1, 'CC112 TIM Damkar berhasil mengevakuasi ular piton di depan Balai Desa Torbang\r\nPelapor : Bpk. Tri', '', '', '02', '2023'),
(509, 'LatLng(-7.008418, 113.842982)', 'Jl. Raya Lenteng Lingkar Barat', '67', '3', 'GIAT EVAKUASI', '06 Februari 2023 18:00', '06 Februari 2023 20:00', 1, 'CC112 ALL TIM mengevakuasi tumpahan bahan cor dari Truck mengangkut semin cor dan mengevakuasi korban jatuh akibat kejadian tersebut\r\nPelapor : Aswar', '', '', '02', '2023'),
(510, 'LatLng(-7.003343, 113.86347)', 'Jl. Kartini', '213', '2', 'PERMINTAAN AMBULAN', '09 Februari 2023 07:00', '09 Februari 2023 08:00', 1, 'CC112 TIM RSUD H. Moh Anwar mengevakuasi tukang becak meninggal dunia di pinggir jalan\r\nPelapor : Andi', '', '', '02', '2023'),
(511, 'LatLng(-7.009285, 113.878452)', 'Desa Kacongan', '218', '2', 'POHON TUMBANG', '07 April 2023 13:00', '07 April 2023 15:00', 1, 'CC112 TIM Damkar mengevakuai pohon tumbang di Desa Kacongan. \r\nPenelpon : Sunarto\r\nAlamat : Kacongan', '', '', '05', '2023'),
(512, 'LatLng(-7.113731, 113.804069)', 'Jl. Raya Bluto', '91', '8', 'POHON TUMBANG', '16 April 2023 17:30', '16 April 2023 19:00', 1, 'CC112 TIM BPBD mengevakuasi pohon tumbang di jl. Raya Bluto depan masjid/Indomaret Bluto', '', '', '05', '2023'),
(513, 'LatLng(-6.999787, 113.890709)', 'Desa Paberasan', '223', '2', 'PERMINTAAN AMBULAN', '14 April 2023 22:00', '14 April 2023 23:45', 1, 'CC112 TIM Puskesmas Pamolokan mengevakuasi pasien permintaan ambulan di Desa Paberasan Kecamatan Kota Sumenep\r\nPelapor : Fitotus\r\nAlamat : Desa Paberasan', '', '', '05', '2023'),
(514, 'LatLng(-6.999997, 113.899995)', 'Jl. Raya Gapura Pasar Jengara Paberasan', '223', '2', 'PERMINTAAN AMBULAN', '22 April 2023 09:00', '22 April 2023 08:30', 1, 'CC112 TIM Puskesmas Pamolokan mengevakuasi korban laka ke RSUD\r\n', '', '', '05', '2023'),
(515, 'LatLng(-7.024987, 113.854414)', 'Jl. Raya Trunojoyo Babbalan(belakang kafe Geslim)', '216', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '25 April 2023 13:00', '25 April 2023 14:00', 1, 'CC112 TIM Saptpol PP mengevakuasi ODGJ di desa Babbalan Kec. Kota Sumenep. \r\nPelapor : Rio\r\nAlamat : Gedungan', '', '', '05', '2023'),
(516, 'LatLng(-7.006202, 113.863345)', 'Kelurahan Kepanjen ', '213', '2', 'KEBAKARAN', '30 April 2023 08:00', '30 April 2023 09:00', 1, 'CC112 TIM Damkar berhasil memadamkan kebakran di kelurahan Kepanjen Kec. Kota Sumenep', '', '', '05', '2023'),
(517, 'LatLng(-7.044758, 113.928716)', ' Jl. Raya Kalianget Dusun Asam Nunggal RT. 01/ RW.', '11', '1', 'EVAKUASI HEWAN LIAR/BUAS', '01 Mei 2023 18:00', '01 Mei 2023 19:00', 1, 'CC112 TIM Damkar mengevakuasi di Desa Kalianget Barat Kec. Kota Sumenep', '', '', '05', '2023'),
(518, 'LatLng(-7.036581, 113.905606)', 'Pertigaan Desa kalimo ok Kec. Kota Sumenep', '11', '1', 'KEBAKARAN', '05 Mei 2023 19:00', '05 Mei 2023 20:00', 1, 'CC112 TIM Damkar berhasil memadamkan kebakaran di Desa Kalimo ok Kec. Kalianget', '', '', '05', '2023'),
(519, 'LatLng(-7.017953, 113.856736)', 'Jl. Trunojoyo belakang RM Padang', '221', '2', 'KEAMANAN DAN KETERTIBAN MASYARAKAT', '05 Mei 2023 22:00', '05 Mei 2023 23:00', 1, 'CC112 TIM Satpol PP melakukan mediasi dengan pemilik Kafe terkait laporan suara musik di jam istirahat.', '', '', '05', '2023'),
(520, 'LatLng(-7.039617, 113.901154)', 'Jl. Raya Kalianget - Kertasada', '10', '1', 'POHON TUMBANG', '16 Mei 2023 14:00', '10 Mei 2023 15:00', 1, 'CC112 TIM BPBD mengevakuasi pohon tumbang di jalan kertasada/tikungan ', '', '', '05', '2023'),
(521, 'LatLng(-7.046952, 113.929682)', 'Jl. Raya Pelabuhan kalianget(RSI Kalianget)', '3', '1', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '11 Mei 2023 10:00', '16 Mei 2023 13:00', 1, 'CC112 TIM Satpol PP mengevakuasi ODGJ di RSi Kalianget', '', '', '05', '2023'),
(522, 'LatLng(-7.015818, 113.879063)', 'Desa kacongan (Perumahan PGRI) ', '218', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '12 Mei 2023 07:00', '12 Mei 2023 11:00', 1, 'CC112 TIM Satpol PP mengawal ODGJ ke RSUD ', '', '', '05', '2023'),
(523, 'LatLng(-7.115505, 113.725662)', 'Desa Kapedi Kec. Bluto', '97', '8', 'KEAMANAN DAN KETERTIBAN MASYARAKAT', '15 Mei 2023 19:00', '15 Mei 2023 20:00', 1, 'CC112 TIM Satpol PP melakukan mediasi terkait laporan orang kesasar di desa Kapedi Kec. Bluto', '', '', '05', '2023'),
(524, 'LatLng(-7.019418, 113.875863)', 'Jl. Raung ', '224', '2', 'PERMINTAAN AMBULAN', '16 Mei 2023 06:30', '16 Mei 2023 07:00', 1, 'CC112 TIM Puskesmas Pamolokan mengevakuasi korban laka di Jl. Raung Pabian ke RSUD', '', '', '05', '2023'),
(525, 'LatLng(-7.067225, 113.737657)', 'Desa Moncek Tengah ', '241', '5', 'KEBAKARAN', '16 Mei 2023 17:30', '16 Mei 2023 19:00', 1, 'CC112 TIM Damkar mendingikan kebakaran kandang sapi di Desa Moncek Tengah Kec. lenteng.\r\nPelapor : Polsek Lenteng', '', '', '06', '2023'),
(526, 'LatLng(-6.991145, 113.836598)', 'jl. Raya Kasengan', '250', '4', 'KEBAKARAN', '06 Juni 2023 12:45', '06 Juni 2023 14:00', 1, 'CC112 TIM Damkar memadamkar kebakaran lahan di Desa Kasengan Kec. Manding\r\nPenelpon : Faisal', '', '', '06', '2023'),
(527, 'LatLng(-7.029749, 113.86375)', 'Jl. Arya Wiraraja Linkar Timur Sumenep', '221', '2', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '07 Juni 2023 12:30', '', 1, 'CC112 Tim Satpol PP menegevakuasi ODGJ di desa Kolor\r\nPelapor : Ruli Kurniadi', '', '', '06', '2023'),
(528, 'LatLng(-7.045697, 113.930197)', 'Desa Kalianget Barat', '3', '1', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '07 Juni 2023 14:00', '', 1, 'CC112 Tim Satpol PP mengevakuasi ODGI ke RSUD H. Moh. Anwar Sumenep\r\nPelapor : Juhari', '', '', '06', '2023'),
(529, 'LatLng(-6.886453, 113.663306)', 'Desa Panaongan', '274', '14', 'ORANG DENGAN GANGGUAN JIWA (ODGJ)', '09 Juni 2023 11:30', '', 1, 'CC112 Tim Satpol PP mengevakuasi ODGJ di Puskesmas Pasongsongan atas laporan dari kepala desa Soddere ', '', '', '06', '2023'),
(530, 'LatLng(-7.026945, 113.854065)', 'Jl. Trunojoyo (Pertigaan linkar timur)', '216', '2', 'KEAMANAN DAN KETERTIBAN MASYARAKAT', '13 Juni 2023 19:00', '', 1, 'CC112 Tim Satpol PP mengevakuasi oarang terlantar di desa babbalan (pertigaan linkar timur) ke RPS Dinsos Sumenep\r\nPelapor : Ibu Shinta', '', '', '06', '2023'),
(531, 'LatLng(-7.004925, 113.868409)', 'Jl. Agus Salim Perempatan Jati mas', '210', '2', 'KEAMANAN DAN KETERTIBAN MASYARAKAT', '20 Juni 2023 15:30', '', 1, 'CC112 Tim Satpol PP mengevakuasi orang terlantar dan terduga ODGJ di perempatan Jl. Agus Salim ke RPS Dinsos\r\nPelopor : Bapak Agus', '', '', '06', '2023'),
(575, 'LatLng(-6.97793, 113.959866)', 'coba', '4', '1', 'KECELAKAAN LALU LINTAS', '28 Agustus 2023 12:00', '', 1, '', 'coba', '1234567890', '08', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opd_terkait`
--

CREATE TABLE `opd_terkait` (
  `id` int(11) NOT NULL,
  `nama_opd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `opd_terkait`
--

INSERT INTO `opd_terkait` (`id`, `nama_opd`) VALUES
(1, 'SATPOLL PP'),
(2, 'BPBD'),
(3, 'DAMKAR'),
(4, 'DLH'),
(5, 'DINAS PERHUBUNGAN'),
(6, 'PUSKESMAS '),
(7, 'PLN'),
(8, 'TELKOM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survey`
--

CREATE TABLE `survey` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `res1` varchar(255) DEFAULT NULL,
  `res2` varchar(255) DEFAULT NULL,
  `res3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `survey`
--

INSERT INTO `survey` (`id`, `nama`, `alamat`, `hp`, `res1`, `res2`, `res3`) VALUES
(5, 'Chairul A. HD', 'Jl. Menari', '081230930200', '100', '100', 'Kinerja Tim CC 112 sdh sangat baik dalam hal melayani masyarakat sumenep serta perlu ditingkatkan kegiatan Sosialiasasi kepada masyarakat terkait layanan CC 112 khususnya kepada masyarakat di pedesaan bahwa layanan CC 112 gratis tanpa dipungut biaya'),
(6, 'Bambang Risdiyanto ', 'Kabupaten Sumenep ', '085259725813', '90', '100', 'Kelengkapan APD untuk petugas pemadam kebakaran, kurang lengkap, demi keselamatan petugas kami mohon untuk segera ditindaklanjuti '),
(11, 'Diah rozah', 'Pajagalan', '085104123987', '100', '90', 'Masyarakat sumnep sangat terbantukan dg adanya call center 112,tp tidak smua masyarakat tahu nomer darurat ini,mohon dtingkatkan sosialisasi thdp call center 112,, misalkan dimedia sosial,media cetak,maupun papan baliho ditempat2 strategis terutama ditemp'),
(12, 'Hendra', 'Kolor', '081703434708', '100', '70', 'Sangat bagus inovasi n kerjasama lintas sektor ini,, saya pernah menggunakan layanan 112 untuk kejadian kebakaran, tim datang respon cepat krg lebih 5mnt…tetapi saya sempat kesusahan menghubungi call centre..jadi saya menghubungi melalui puskesmas terdeka'),
(13, 'Novita elliyanti', 'Meddelan', '082335626667', '70', '70', 'Sangat baik'),
(14, 'Siti fathaniyah', 'Dsn Bukakak 01/01 Ellak Days', '085931140227', '100', '100', 'Tingkat pelayanan'),
(15, 'MASFIYAH, S. Kep., Ns', 'Dusun Dhaleman RT/RW 009/003 Desa Poreh Kecamatan Lenteng', '082230863113', '90', '90', 'semoga lebih meningkatkan ketanggapan dan layanan, semoga semakin sukses kedepannya'),
(16, 'ALMUBARRI', 'Desa Saronggi ', '081703678858', '90', '90', 'Sangat membantu dlm keadaan darurat'),
(17, 'MUDRIKAH', 'KAMBINGAN TIMUR SARONGGI', '087702138666', '80', '70', 'harus  siap siaga'),
(18, 'Koneng A f', 'Jl raya gapura,kacongan ', '081233------', '70', '70', 'Bagus .. tp saya belum tau pasti hehe\r\nLebih ditingkatkan lagi '),
(19, 'Indra ', 'Pajagalan ', '082143337475', '90', '90', 'Dengan adanya call center 112 ini sangat membantu dan memudahkan masyarakat dalam mengatasi kebencanaan dll'),
(20, 'Ir. Budi Prihartini, M.Si', 'Jl. Brawijaya I/4d Kalianget', '081333383453', '80', '70', 'permasalahan bisa di Kabupaten Sumenep secepatnya teratasi karena lokasi wilayah yang terdiri dari banyak pulau'),
(21, 'Mohammad Zainal', 'Jl.  Mutiara 17', '081907917453', '100', '100', 'Dengan kehadiran call center 112, sebagai media informasi lebih menjamin jalinan informasi yg sangat mudah cepat dan akurat,  tingkatkan koneksi  jaringan  yg lebih stabil'),
(22, 'Sustono', 'Jl. Adirasa 23 sumenep', '081330051963', '90', '90', 'Dg call 112 memberikan layanan masy lebih trengginas dan mumpuni dg sdm yg handal baik di bpbp.damkar kominfo dan stakeholder lainnya. Jaga kesehatan dan jangan kendoooor\r\n\r\n'),
(23, 'Mohammad Hasin ', 'DS Kacongan kec Kota Sumenep ', 'O82331791525', '100', '90', 'Terus di pertahankan ditingkatkan '),
(25, 'Miftahorrahman', 'Dsn.Lalangon Rt/Rw 004/002 Ds.Lalangon Kec.Manding', '085336288253', '100', '90', 'Layanan CC112 utk kepulauan mohon diperluas sampai pulau terpencil berikut transportasinya'),
(26, 'Rony Adicandra', 'Perum GAW', '081357538244', '80', '80', 'Cepet tanggap...'),
(27, 'Marina Chan', 'Canada', '08787777777', '', '', 'y'),
(28, 'Karawang Cyber Team', 'karawang cyber team', '08950193932', '10', '100', 'Karawang Cyber Team'),
(29, 'Kobustor Ghost Hacktivis', 'mmk', '079629262822', '60', '50', 'Kobustor Ghost Hacktivis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `noTelp` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hak_akses` enum('Admin','Tim') DEFAULT NULL,
  `kejadian` varchar(300) NOT NULL,
  `online` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `noTelp`, `email`, `hak_akses`, `kejadian`, `online`) VALUES
(1, 'cc112admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Arief Santoso, ST', '', 'admin@gmail.com', 'Admin', 'KECELAKAAN LAUT,KECELAKAAN KERJA,GIAT EVAKUASI,ORANG DENGAN GANGGUAN JIWA (ODGJ),KRIMINALITAS,COVID 19,BANJIR,KEBAKARAN,EVAKUASI HEWAN LIAR/BUAS,KEAMANAN DAN KETERTIBAN MASYARAKAT,TIANG LISTRIK RUBUH,KECELAKAAN LALU LINTAS,PERMINTAAN AMBULAN,POHON TUMBANG,BENCANA ALAM', '0'),
(26, 'damkarcc112', '5f4dcc3b5aa765d61d8327deb882cf99', 'DAMKAR', '', 'damkarcc112@gmail.com', 'Tim', 'KEBAKARAN,EVAKUASI HEWAN LIAR/BUAS,POHON TUMBANG', '0'),
(28, 'satpolppcc112', '5f4dcc3b5aa765d61d8327deb882cf99', 'SATPOL PP', '', 'satpolppcc112@gmail.com', 'Tim', 'ORANG DENGAN GANGGUAN JIWA (ODGJ),KEAMANAN DAN KETERTIBAN MASYARAKAT', '0'),
(29, 'bpbdcc112', '5f4dcc3b5aa765d61d8327deb882cf99', 'BPBD', '', 'bpbdcc112@gmail.com', 'Tim', 'GIAT EVAKUASI,COVID 19,BANJIR,BENCANA ALAM', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `counterdb`
--
ALTER TABLE `counterdb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kejadian`
--
ALTER TABLE `kejadian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `opd_terkait`
--
ALTER TABLE `opd_terkait`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `counterdb`
--
ALTER TABLE `counterdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43296;

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT untuk tabel `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=580;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT untuk tabel `kejadian`
--
ALTER TABLE `kejadian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=576;

--
-- AUTO_INCREMENT untuk tabel `opd_terkait`
--
ALTER TABLE `opd_terkait`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
