-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2017 at 12:56 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prinpreajma`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_categorii`
--

CREATE TABLE `cat_categorii` (
  `cat_id` bigint(20) NOT NULL,
  `cat_nume` varchar(255) NOT NULL,
  `cat_type` int(11) NOT NULL COMMENT '0: locatie | 1:servicii'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat_categorii`
--

INSERT INTO `cat_categorii` (`cat_id`, `cat_nume`, `cat_type`) VALUES
(1, 'Restaurante', 0),
(2, 'Magazine', 0),
(3, 'Sanatate', 0),
(4, 'Transport', 1),
(5, 'Institutiile statului', 0),
(6, 'Banci si amaneturi', 0),
(7, 'Prestari servicii', 1),
(8, 'Frumusete', 0),
(9, 'Cazinouri si Pariuri sportive', 0),
(10, 'Pub-uri si Cluburi', 0),
(11, 'Matrimoniale', 1),
(12, 'Benzinarii', 0),
(13, 'Puncte turistice', 0),
(14, 'Cazare', 0),
(15, 'Diverse', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cou_county_list`
--

CREATE TABLE `cou_county_list` (
  `cou_id` bigint(20) NOT NULL,
  `cou_short` varchar(255) NOT NULL,
  `cou_long` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cou_county_list`
--

INSERT INTO `cou_county_list` (`cou_id`, `cou_short`, `cou_long`) VALUES
(1, 'AB', 'Alba'),
(2, 'AG', 'Arges'),
(3, 'AR', 'Arad'),
(4, 'B', 'Bucuresti'),
(5, 'BC', 'Bacau'),
(6, 'BH', 'Bihor'),
(7, 'BN', 'Bistrita-Nasaud'),
(8, 'BR', 'Braila'),
(9, 'BT', 'Botosani'),
(10, 'BV', 'Brasov'),
(11, 'BZ', 'Buzau'),
(12, 'CJ', 'Cluj'),
(13, 'CL', 'Calarasi'),
(14, 'CS', 'Caras-Severin'),
(15, 'CT', 'Constanta'),
(16, 'CV', 'Covasna'),
(17, 'DB', 'Dambovita'),
(18, 'DJ', 'Dolj'),
(19, 'GJ', 'Gorj'),
(20, 'GL', 'Galati'),
(21, 'GR', 'Giurgiu'),
(22, 'HD', 'Hunedoara'),
(23, 'HG', 'Harghita'),
(24, 'IF', 'Ilfov'),
(25, 'IL', 'Ialomita'),
(26, 'IS', 'Iasi'),
(27, 'MH', 'Mehedinti'),
(28, 'MM', 'Maramures'),
(29, 'MS', 'Mures'),
(30, 'NT', 'Neamt'),
(31, 'OT', 'Olt'),
(32, 'PH', 'Prahova'),
(33, 'SB', 'Sibiu'),
(34, 'SJ', 'Salaj'),
(35, 'SM', 'Satu-Mare'),
(36, 'SV', 'Suceava'),
(37, 'TL', 'Tulcea'),
(38, 'TM', 'Timis'),
(39, 'TR', 'Teleorman'),
(40, 'VL', 'Valcea'),
(41, 'VN', 'Vrancea'),
(42, 'VS', 'Vaslui');

-- --------------------------------------------------------

--
-- Table structure for table `loc_locatii`
--

CREATE TABLE `loc_locatii` (
  `loc_id` bigint(20) NOT NULL,
  `usr_id` bigint(20) NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `loc_pseudonim` varchar(255) NOT NULL,
  `loc_nume_firma` varchar(255) NOT NULL,
  `loc_adresa_locatie` text NOT NULL,
  `cou_id` int(11) NOT NULL,
  `ors_id` int(11) NOT NULL,
  `loc_contact` text NOT NULL,
  `loc_despre` text NOT NULL,
  `loc_poza_profil` text NOT NULL,
  `loc_promovat` int(11) NOT NULL,
  `loc_data_adaugarii` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loc_locatii`
--

INSERT INTO `loc_locatii` (`loc_id`, `usr_id`, `cat_id`, `loc_pseudonim`, `loc_nume_firma`, `loc_adresa_locatie`, `cou_id`, `ors_id`, `loc_contact`, `loc_despre`, `loc_poza_profil`, `loc_promovat`, `loc_data_adaugarii`) VALUES
(1, 0, 1, '123', '0', 'sadad', 13, 0, '0', '123', '0', 0, '0000-00-00 00:00:00'),
(2, 0, 1, '123', '0', 'sadad', 13, 0, '0', '123', '0', 0, '0000-00-00 00:00:00'),
(3, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:38:34'),
(4, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:41:03'),
(5, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:41:52'),
(6, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:42:10'),
(7, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:42:43'),
(8, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:43:04'),
(9, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:43:46'),
(10, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:44:00'),
(11, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:44:27'),
(12, 0, 1, 'lol', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:44:52'),
(13, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:46:07'),
(14, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:46:19'),
(15, 0, 1, 'ads', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:47:37'),
(16, 0, 1, 'hgjgh', '0', 'o addresa', 15, 96, '0', 'asd', '0', 0, '2017-02-05 01:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `ors_orase`
--

CREATE TABLE `ors_orase` (
  `ors_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `ors_denumire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ors_orase`
--

INSERT INTO `ors_orase` (`ors_id`, `cou_id`, `ors_denumire`) VALUES
(1, 2, 'Pitești'),
(2, 2, 'Câmpulung'),
(3, 2, 'Curtea de Argeș'),
(4, 2, 'Ștefănești'),
(5, 2, 'Costești'),
(6, 2, 'Topoloveni'),
(7, 1, 'Alba Iulia'),
(8, 1, 'Sebeș'),
(9, 1, 'Aiud'),
(10, 1, 'Cugir'),
(11, 1, 'Blaj'),
(12, 1, 'Ocna Mureș'),
(13, 1, 'Zlatna'),
(14, 1, 'Câmpeni'),
(15, 1, 'Teiuș'),
(16, 1, 'Abrud'),
(17, 1, 'Baia de Arieș'),
(18, 3, 'Arad'),
(19, 3, 'Pecica'),
(20, 3, 'Sântana'),
(21, 3, 'Lipova'),
(22, 3, 'Ineu'),
(23, 3, 'Chișineu-Criș'),
(24, 3, 'Nădlac'),
(25, 3, 'Curtici'),
(26, 3, 'Pâncota'),
(27, 3, 'Sebiș'),
(28, 4, 'București'),
(29, 5, 'Bacău'),
(30, 5, 'Onești'),
(31, 5, 'Moinești'),
(32, 5, 'Comănești'),
(33, 5, 'Buhuși'),
(34, 5, 'Dărmănești'),
(35, 5, 'Târgu Ocna'),
(36, 5, 'Slănic Moldova'),
(37, 6, 'Oradea'),
(38, 6, 'Salonta'),
(39, 6, 'Marghita'),
(40, 6, 'Săcueni'),
(41, 6, 'Beiuș'),
(42, 6, 'Valea lui Mihai'),
(43, 6, 'Aleșd'),
(44, 6, 'Ștei'),
(45, 6, 'Vașcău'),
(46, 6, 'Nucet'),
(47, 7, 'Bistrița'),
(48, 7, 'Beclean'),
(49, 7, 'Sângeorz-Băi'),
(50, 7, 'Năsăud'),
(51, 8, 'Brăila'),
(52, 8, 'Ianca'),
(53, 8, 'Însurăței'),
(54, 8, 'Făurei'),
(55, 9, 'Botoșani'),
(56, 9, 'Dorohoi'),
(57, 9, 'Darabani'),
(58, 9, 'Flămânzi'),
(59, 9, 'Săveni'),
(60, 9, 'Ștefănești'),
(61, 9, 'Bucecea'),
(62, 10, 'Brașov'),
(63, 10, 'Săcele'),
(64, 10, 'Făgăraș'),
(65, 10, 'Zărnești'),
(66, 10, 'Codlea'),
(67, 10, 'Râșnov'),
(68, 10, 'Victoria'),
(69, 10, 'Rupea'),
(70, 10, 'Ghimbav'),
(71, 10, 'Predeal'),
(72, 11, 'Buzău'),
(73, 11, 'Râmnicu Sărat'),
(74, 11, 'Nehoiu'),
(75, 11, 'Pătârlagele'),
(76, 11, 'Pogoanele'),
(77, 12, 'Cluj-Napoca'),
(78, 12, 'Turda'),
(79, 12, 'Dej'),
(80, 12, 'Câmpia Turzii'),
(81, 12, 'Gherla'),
(82, 12, 'Huedin'),
(83, 13, 'Călărași'),
(84, 13, 'Oltenița'),
(85, 13, 'Budești'),
(86, 13, 'Fundulea'),
(87, 13, 'Lehliu Gară'),
(88, 14, 'Reșița'),
(89, 14, 'Caransebeș'),
(90, 14, 'Bocșa'),
(91, 14, 'Moldova Nouă'),
(92, 14, 'Oravița'),
(93, 14, 'Oțelu Roșu'),
(94, 14, 'Anina'),
(95, 14, 'Băile Herculane'),
(96, 15, 'Constanța'),
(97, 15, 'Medgidia'),
(98, 15, 'Mangalia'),
(99, 15, 'Năvodari'),
(100, 15, 'Cernavodă'),
(101, 15, 'Ovidiu'),
(102, 15, 'Murfatlar'),
(103, 15, 'Hârșova'),
(104, 15, 'Eforie'),
(105, 15, 'Techirghiol'),
(106, 15, 'Băneasa'),
(107, 15, 'Negru Vodă'),
(108, 16, 'Sfântu Gheorghe'),
(109, 16, 'Târgu Secuiesc'),
(110, 16, 'Covasna'),
(111, 16, 'Baraolt'),
(112, 16, 'Întorsura Buzăului'),
(113, 17, 'Târgoviște'),
(114, 17, 'Moreni'),
(115, 17, 'Pucioasa'),
(116, 17, 'Găești'),
(117, 17, 'Titu'),
(118, 17, 'Fieni'),
(119, 17, 'Răcari'),
(120, 18, 'Craiova'),
(121, 18, 'Băilești'),
(122, 18, 'Calafat'),
(123, 18, 'Filiași'),
(124, 18, 'Dăbuleni'),
(125, 18, 'Segarcea'),
(126, 18, 'Bechet'),
(127, 20, 'Galați'),
(128, 20, 'Tecuci'),
(129, 20, 'Târgu Bujor'),
(130, 20, 'Berești'),
(131, 19, 'Târgu Jiu'),
(132, 19, 'Motru'),
(133, 19, 'Rovinari'),
(134, 19, 'Bumbești-Jiu'),
(135, 19, 'Târgu Cărbunești'),
(136, 19, 'Tismana'),
(137, 19, 'Novaci'),
(138, 19, 'Țicleni'),
(139, 21, 'Giurgiu'),
(140, 21, 'Bolintin-Vale'),
(141, 21, 'Mihăilești'),
(142, 22, 'Deva'),
(143, 22, 'Hunedoara'),
(144, 22, 'Petroșani'),
(145, 22, 'Vulcan'),
(146, 22, 'Lupeni'),
(147, 22, 'Petrila'),
(148, 22, 'Orăștie'),
(149, 22, 'Brad'),
(150, 22, 'Simeria'),
(151, 22, 'Călan'),
(152, 22, 'Hațeg'),
(153, 22, 'Uricani'),
(154, 22, 'Geoagiu'),
(155, 22, 'Aninoasa'),
(156, 23, 'Miercurea Ciuc'),
(157, 23, 'Odorheiu Secuiesc'),
(158, 23, 'Gheorgheni'),
(159, 23, 'Toplița'),
(160, 23, 'Cristuru Secuiesc'),
(161, 23, 'Vlăhița'),
(162, 23, 'Bălan'),
(163, 23, 'Borsec'),
(164, 23, 'Băile Tușnad'),
(165, 24, 'Voluntari'),
(166, 24, 'Pantelimon'),
(167, 24, 'Buftea'),
(168, 24, 'Popești-Leordeni'),
(169, 24, 'Bragadiru'),
(170, 24, 'Chitila'),
(171, 24, 'Otopeni'),
(172, 24, 'Măgurele'),
(173, 25, 'Slobozia'),
(174, 25, 'Fetești'),
(175, 25, 'Urziceni'),
(176, 25, 'Țăndărei'),
(177, 25, 'Amara'),
(178, 25, 'Fierbinți-Târg'),
(179, 25, 'Căzănești'),
(180, 26, 'Iași'),
(181, 26, 'Pașcani'),
(182, 26, 'Hârlău'),
(183, 26, 'Târgu Frumos'),
(184, 26, 'Podu Iloaiei'),
(185, 26, 'Voluntari'),
(186, 27, 'Drobeta-Turnu Severin'),
(187, 27, 'Strehaia'),
(188, 27, 'Orșova'),
(189, 27, 'Baia de Aramă'),
(190, 27, 'Vânju Mare'),
(191, 28, 'Baia Mare'),
(192, 28, 'Sighetu Marmației'),
(193, 28, 'Borșa'),
(194, 28, 'Baia Sprie'),
(195, 28, 'Vișeu de Sus'),
(196, 28, 'Târgu Lăpuș'),
(197, 28, 'Seini'),
(198, 28, 'Șomcuta Mare'),
(199, 28, 'Ulmeni'),
(200, 28, 'Tăuții-Măgherăuș'),
(201, 28, 'Cavnic'),
(202, 28, 'Săliștea de Sus'),
(203, 28, 'Dragomirești'),
(204, 29, 'Târgu Mureș'),
(205, 29, 'Sighișoara'),
(206, 29, 'Reghin'),
(207, 29, 'Târnăveni'),
(208, 29, 'Luduș'),
(209, 29, 'Sovata'),
(210, 29, 'Iernut'),
(211, 29, 'Sărmașu'),
(212, 29, 'Ungheni'),
(213, 29, 'Miercurea Nirajului'),
(214, 29, 'Sângeorgiu de Pădure'),
(215, 30, 'Piatra Neamț'),
(216, 30, 'Roman'),
(217, 30, 'Târgu Neamț'),
(218, 30, 'Roznov'),
(219, 30, 'Bicaz'),
(220, 31, 'Slatina'),
(221, 31, 'Caracal'),
(222, 31, 'Balș'),
(223, 31, 'Corabia'),
(224, 31, 'Scornicești'),
(225, 31, 'Drăgănești-Olt'),
(226, 31, 'Piatra-olt'),
(227, 31, 'Potcoava'),
(228, 32, 'Ploiești'),
(229, 32, 'Câmpina'),
(230, 32, 'Băicoi'),
(231, 32, 'Breaza'),
(232, 32, 'Mizil'),
(233, 32, 'Comarnic'),
(234, 32, 'Vălenii de Munte'),
(235, 32, 'Boldești-Scăeni'),
(236, 32, 'Urlați'),
(237, 32, 'Sinaia'),
(238, 32, 'Bușteni'),
(239, 32, 'Plopeni'),
(240, 32, 'Slănic'),
(241, 32, 'Azuga'),
(242, 33, 'Sibiu'),
(243, 33, 'Mediaș'),
(244, 33, 'Cisnădie'),
(245, 33, 'Avrig'),
(246, 33, 'Agnita'),
(247, 33, 'Dumbrăveni'),
(248, 33, 'Tălmaciu'),
(249, 33, 'Copșa Mică'),
(250, 33, 'Săliște'),
(251, 2, 'Mioveni'),
(252, 33, 'Miercurea Sibiului'),
(253, 33, 'Ocna Sibiului'),
(254, 34, 'Zalău'),
(255, 34, 'Șimleu Silvaniei'),
(256, 34, 'Jibou'),
(257, 34, 'Cehu Silvaniei'),
(258, 35, 'Satu Mare'),
(259, 35, 'Carei'),
(260, 35, 'Negrești-Oaș'),
(261, 35, 'Tășnad'),
(262, 35, 'Livada'),
(263, 35, 'Abrud'),
(264, 36, 'Suceava'),
(265, 36, 'Fălticeni'),
(266, 36, 'Rădăuți'),
(267, 36, 'Câmpulung Moldovenesc'),
(268, 36, 'Vatra Dornei'),
(269, 36, 'Vicovu de Sus'),
(270, 36, 'Gura Humorului'),
(271, 36, 'Dolhasca'),
(272, 36, 'Liteni'),
(273, 36, 'Salcea'),
(274, 36, 'Siret'),
(275, 36, 'Cajvana'),
(276, 36, 'Frasin'),
(277, 36, 'Broșteni'),
(278, 36, 'Milișăuți'),
(279, 36, 'Solca'),
(280, 37, 'Tulcea'),
(281, 37, 'Babadag'),
(282, 37, 'Măcin'),
(283, 37, 'Isaccea'),
(284, 37, 'Sulina'),
(285, 38, 'Timișoara'),
(286, 38, 'Lugoj'),
(287, 38, 'Sânnicolau Mare'),
(288, 38, 'Jimbolia'),
(289, 38, 'Recaș'),
(290, 38, 'Făget'),
(291, 38, 'Buziaș'),
(292, 38, 'Deta'),
(293, 38, 'Gătaia'),
(294, 38, 'Ciacova'),
(295, 39, 'Alexandria'),
(296, 39, 'Roșiorii de Vede'),
(297, 39, 'Turnu Măgurele'),
(298, 39, 'Zimnicea'),
(299, 39, 'Videle'),
(300, 40, 'Râmnicu Vâlcea'),
(301, 40, 'Drăgășani'),
(302, 40, 'Băbeni'),
(303, 40, 'Călimănești'),
(304, 40, 'Horezu'),
(305, 40, 'Brezoi'),
(306, 40, 'Bălcești'),
(307, 40, 'Berbești'),
(308, 40, 'Băile Olănești'),
(309, 40, 'Ocnele Mari'),
(310, 40, 'Băile Govora'),
(311, 40, 'Bârlad'),
(312, 41, 'Focșani'),
(313, 41, 'Adjud'),
(314, 41, 'Mărășești'),
(315, 41, 'Odobești'),
(316, 41, 'Panciu'),
(317, 42, 'Vaslui'),
(318, 42, 'Huși'),
(319, 42, 'Negrești'),
(320, 42, 'Murgeni');

-- --------------------------------------------------------

--
-- Table structure for table `prg_program`
--

CREATE TABLE `prg_program` (
  `prg_id` bigint(20) NOT NULL,
  `loc_id` bigint(20) NOT NULL,
  `prg_day` varchar(255) NOT NULL,
  `prg_day_short` char(1) NOT NULL,
  `prg_oc` int(11) DEFAULT NULL,
  `prg_hour` varchar(255) NOT NULL,
  `prg_nonstop` int(11) NOT NULL,
  `prg_closed_all_day` int(11) NOT NULL,
  `prg_type` int(11) NOT NULL COMMENT 'se refera la tipul programuluidaca alege la fel in fiecare zi atunci completeaza automat toate zilele, daca nu atunci le baga el manual in formular.',
  `prg_open_close_hour_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prg_program`
--

INSERT INTO `prg_program` (`prg_id`, `loc_id`, `prg_day`, `prg_day_short`, `prg_oc`, `prg_hour`, `prg_nonstop`, `prg_closed_all_day`, `prg_type`, `prg_open_close_hour_type`) VALUES
(1, 16, 'Luni', 'L', NULL, '13', 0, 0, 0, 0),
(2, 16, 'Luni', 'L', NULL, '13', 0, 0, 0, 0),
(3, 16, 'Marti', 'M', NULL, '13', 0, 0, 0, 0),
(4, 16, 'Marti', 'M', NULL, '13', 0, 0, 0, 0),
(5, 16, 'Miercuri', 'M', NULL, '13', 0, 0, 0, 0),
(6, 16, 'Miercuri', 'M', NULL, '13', 0, 0, 0, 0),
(7, 16, 'Joi', 'j', NULL, '13', 0, 0, 0, 0),
(8, 16, 'Joi', 'J', NULL, '13', 0, 0, 0, 0),
(9, 16, 'Vineri', 'V', NULL, '13', 0, 0, 0, 0),
(10, 16, 'Vineri', 'V', NULL, '13', 0, 0, 0, 0),
(11, 16, 'Sambata', 'S', NULL, '13', 0, 0, 0, 0),
(12, 16, 'Sambata', 'S', NULL, '', 0, 0, 0, 0),
(13, 16, 'Duminica', 'D', NULL, '13', 0, 0, 0, 0),
(14, 16, 'Duminica', 'D', NULL, '13', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usr_users`
--

CREATE TABLE `usr_users` (
  `usr_id` bigint(20) NOT NULL,
  `usr_username` varchar(255) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_rank` int(11) NOT NULL,
  `usr_premium` int(11) NOT NULL,
  `usr_register_date` datetime NOT NULL,
  `usr_last_login` datetime NOT NULL,
  `usr_persoana_juridica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usr_users`
--

INSERT INTO `usr_users` (`usr_id`, `usr_username`, `usr_email`, `usr_password`, `usr_rank`, `usr_premium`, `usr_register_date`, `usr_last_login`, `usr_persoana_juridica`) VALUES
(2, 'someuserspec1', 'mateikind1@gmail.com', '123456', 0, 0, '2016-12-24 00:45:18', '0000-00-00 00:00:00', 0),
(3, 'someuser1', 'mateikind2@gmail.com', 'oparola123', 0, 0, '2016-12-24 00:49:52', '0000-00-00 00:00:00', 0),
(4, 'someuser5', 'mateikind3@gmail.com', 'oparola123', 0, 0, '2016-12-24 00:51:38', '0000-00-00 00:00:00', 0),
(5, 'someuser6', 'mateikind6@gmail.com', 'oparola123', 1, 0, '2016-12-24 00:53:05', '0000-00-00 00:00:00', 0),
(6, 'andrei', 'mateikind7@gmail.com', 'mateiandrei', 0, 0, '2017-01-13 11:41:10', '0000-00-00 00:00:00', 0),
(7, 'andrei1', 'mateikind10@gmail.com', '123456', 0, 0, '2017-02-08 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'andrei2', 'mateikind11@gmail.com', '123456', 0, 0, '2017-02-08 00:00:00', '0000-00-00 00:00:00', 0),
(9, 'andrei3', 'mateikind12@gmail.com', '123456', 0, 0, '2017-03-01 00:00:00', '0000-00-00 00:00:00', 0),
(10, 'andrei4', 'mateikind13@gmail.com', '', 0, 0, '2017-02-08 00:00:00', '0000-00-00 00:00:00', 0),
(11, 'andrei5', 'mateikind14@gmail.com', '123456', 0, 0, '2017-02-08 00:00:00', '0000-00-00 00:00:00', 0),
(12, 'andrei6', 'mateikind16@gmail.com', '123456', 0, 0, '2017-02-08 00:00:00', '0000-00-00 00:00:00', 0),
(13, 'andrei7', 'mateikind17@gmail.com', '123456', 0, 0, '2017-02-08 00:00:00', '0000-00-00 00:00:00', 0),
(14, 'andrei8', 'mateikind18@gmail.com', '123456', 0, 0, '2017-02-08 00:00:00', '0000-00-00 00:00:00', 0),
(15, 'andrei9', 'mateikind19@gmail.com', '123456', 0, 0, '2017-02-08 00:00:00', '2017-02-08 00:00:00', 0),
(16, 'andrei10', 'mateikind20@gmail.com', '123456', 0, 0, '2017-02-08 00:00:00', '2017-02-08 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_categorii`
--
ALTER TABLE `cat_categorii`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `cou_county_list`
--
ALTER TABLE `cou_county_list`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `loc_locatii`
--
ALTER TABLE `loc_locatii`
  ADD PRIMARY KEY (`loc_id`),
  ADD KEY `usr_id` (`usr_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `ors_orase`
--
ALTER TABLE `ors_orase`
  ADD PRIMARY KEY (`ors_id`),
  ADD KEY `cou_id` (`cou_id`);

--
-- Indexes for table `prg_program`
--
ALTER TABLE `prg_program`
  ADD PRIMARY KEY (`prg_id`);

--
-- Indexes for table `usr_users`
--
ALTER TABLE `usr_users`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_categorii`
--
ALTER TABLE `cat_categorii`
  MODIFY `cat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `cou_county_list`
--
ALTER TABLE `cou_county_list`
  MODIFY `cou_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `loc_locatii`
--
ALTER TABLE `loc_locatii`
  MODIFY `loc_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ors_orase`
--
ALTER TABLE `ors_orase`
  MODIFY `ors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;
--
-- AUTO_INCREMENT for table `prg_program`
--
ALTER TABLE `prg_program`
  MODIFY `prg_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `usr_users`
--
ALTER TABLE `usr_users`
  MODIFY `usr_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
