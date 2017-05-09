-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2017 at 03:47 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rdbackend`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=445 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Slider', '', '', 'site/viewslider', 1, 0, 1, 2, 'icon-dashboard'),
(2, 'Sector', '', '', 'site/viewsector', 1, 0, 1, 3, 'icon-dashboard'),
(3, 'Services', '', '', 'site/viewservices', 1, 0, 1, 4, 'icon-dashboard'),
(5, 'Project', '', '', 'site/viewproject', 1, 0, 1, 6, 'icon-dashboard'),
(6, 'Clients', '', '', 'site/viewclients', 1, 0, 1, 7, 'icon-dashboard'),
(7, 'Gallery', '', '', 'site/viewgallery', 1, 0, 1, 7, 'icon-dashboard'),
(111, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(444, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pageaccesslevel`
--

CREATE TABLE IF NOT EXISTS `pageaccesslevel` (
  `id` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `accesslevel` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pageaccesslevel`
--

INSERT INTO `pageaccesslevel` (`id`, `page`, `accesslevel`) VALUES
(1, 4, 'user'),
(2, 4, 'admin'),
(3, 2, 'admin'),
(4, 2, 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `projectimage`
--

CREATE TABLE IF NOT EXISTS `projectimage` (
  `id` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectimage`
--

INSERT INTO `projectimage` (`id`, `project`, `image`, `order`) VALUES
(1, '1', '1_(3).png', 2),
(2, '3', 'SS_Staircase_and_Structure.jpg', 1),
(3, '17', '1.jpg', 0),
(4, '32', '11.jpg', 1),
(5, '32', '21.jpg', 2),
(6, '30', '31.jpg', 1),
(7, '30', '4.jpg', 4),
(8, '4', '12.jpg', 1),
(9, '4', '22.jpg', 2),
(10, '4', '32.jpg', 3),
(11, '4', '41.jpg', 4),
(12, '179', 'Untitled-1.jpg', 1),
(13, '179', 'Untitled-2.jpg', 2),
(14, '179', 'Untitled-3.jpg', 3),
(15, '179', 'Untitled-4.jpg', 4),
(16, '161', 'Untitled-5-SS.jpg', 1),
(17, '161', 'Untitled-6-SS.jpg', 2),
(18, '147', 'Cadbury.jpg', 1),
(19, '140', 'Unilever.jpg', 1),
(20, '145', 'GSk.jpg', 1),
(21, '145', 'GSK2.jpg', 2),
(22, '7', 'Untitled-11.jpg', 1),
(23, '7', 'Untitled-21.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rdbackend_clients`
--

CREATE TABLE IF NOT EXISTS `rdbackend_clients` (
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rdbackend_clients`
--

INSERT INTO `rdbackend_clients` (`name`, `logo`, `order`, `title`, `id`) VALUES
('Abbott', 'abbott.jpg', 1, '0', 3),
('Alfa', 'alfa.jpg', 2, '0', 4),
('AOG', 'aog.jpg', 3, '0', 5),
('Balmer', 'balmer.jpg', 4, '0', 6),
('BASF', 'basf.jpg', 5, '0', 7),
('Cadbury', 'cadbury.jpg', 6, '0', 8),
('Carlsberg', 'carlsberg.jpg', 7, '0', 9),
('Casella Wines', 'casella.jpg', 8, '0', 10),
('CavinKare', 'cavunkare.jpg', 9, '0', 11),
('Cipla', 'cipla.jpg', 10, '0', 12),
('Coca Cola', 'coca_cola.jpg', 11, '0', 13),
('Colgate Palmolive', 'colgate_palmolive.jpg', 12, '0', 14),
('CORE', 'core.jpg', 13, '0', 15),
('ITC', 'endurign_value.jpg', 14, '0', 16),
('Franke', 'franke.jpg', 15, '0', 17),
('Gabriel', 'gabriel.jpg', 16, '0', 18),
('Gapco', 'gapco.jpg', 17, '0', 19),
('Garware', 'garware.jpg', 18, '0', 20),
('German Remedies', 'german_remedies.jpg', 19, '0', 21),
('GlaxoSmithKline', 'gsk.jpg', 20, '0', 22),
('Hindustan Unilever Limited', 'hindustan_unilever.jpg', 21, '0', 23),
('Krones', 'krones.jpg', 22, '0', 24),
('Mylan', 'mylan1.jpg', 23, '0', 26),
('Nivea', 'nivea.jpg', 24, '0', 27),
('ORYX Energies', 'oryx.jpg', 25, '0', 28),
('PepsiCo', 'pepsico.jpg', 26, '0', 29),
('Reckitt Benckiser', 'reckitt_benckiser.jpg', 27, '0', 30),
('Reliance Petroleum', 'reliance_petroleum.jpg', 28, '0', 31),
('Reliance Industries', 'reliance.jpg', 29, '0', 32),
('Sab Miller', 'sab.jpg', 30, '0', 33),
('Shell', 'shell.jpg', 31, '0', 34),
('Tanzania Breweries', 'tanzania.jpg', 32, '0', 35),
('Tata', 'tata.jpg', 33, '0', 36),
('Tetra Pak', 'tetra_pak.jpg', 34, '0', 37),
('Tiper', 'tiper.jpg', 35, '0', 38),
('Total', 'total.jpg', 36, '0', 39),
('Endress + Hauser', 'Untitled-2-Recovered.jpg', 37, '0', 40),
('Wipro', 'wipro.jpg', 38, '0', 41),
('Ziemann', 'ziemann.jpg', 39, '0', 42);

-- --------------------------------------------------------

--
-- Table structure for table `rdbackend_gallery`
--

CREATE TABLE IF NOT EXISTS `rdbackend_gallery` (
  `id` int(11) NOT NULL,
  `sector` varchar(255) DEFAULT NULL,
  `image` varchar(555) DEFAULT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rdbackend_gallery`
--

INSERT INTO `rdbackend_gallery` (`id`, `sector`, `image`, `order`) VALUES
(37, '6', '2015_800x800.jpg', 1),
(38, '6', 'IMG_0139_800x8001.jpg', 2),
(39, '6', 'IMG_0178_800x8001.jpg', 3),
(40, '6', 'IMG_8185_800x8001.jpg', 4),
(41, '6', 'IMG_8186_left_800x800.jpg', 5),
(42, '6', 'IMG_8186_right_800x800.jpg', 6),
(43, '6', 'IMG_8187_800x8001.jpg', 7),
(44, '6', 'IMG_8190_800x800.jpg', 8),
(45, '8', 'Cadbury_800x800.jpg', 1),
(46, '8', 'DSCN8361_800x800.jpg', 2),
(47, '8', 'IMG_0039_800x800.jpg', 3),
(48, '8', 'IMG_0387_800x800.jpg', 4),
(49, '8', 'IMG_8162_800x800.jpg', 4),
(50, '8', 'IMG_8196_800x800.jpg', 5),
(51, '8', 'slide_36_800x800.jpg', 6),
(52, '8', 'unilkever_800x800.jpg', 7),
(53, '4', '138_A_800x8001.jpg', 1),
(54, '4', 'Cold_Insulation_800x800.jpg', 2),
(55, '4', 'IMG_0052_800x8001.jpg', 3),
(56, '4', 'IMG_8165_800x800.jpg', 4),
(57, '4', 'SAM_0662_800x8001.jpg', 5),
(58, '5', 'RD_PPT_800x800.jpg', 1),
(59, '5', 'SAM_0206_800x800.jpg', 2),
(60, '5', 'SAM_0208_800x800.jpg', 3),
(61, '5', 'slide_38_800x800.jpg', 4),
(62, '5', 'slide-42_1_800x800.jpg', 5),
(63, '5', 'slide-42---4_800x8001.jpg', 6),
(64, '7', 'IMG_8143_800x8001.jpg', 1),
(65, '7', 'IMG_8155_800x8001.jpg', 2),
(66, '7', 'IMG_8160_800x8001.jpg', 3),
(67, '7', 'IMG_8161_800x8001.jpg', 4),
(68, '7', 'IMG_8168_800x800.jpg', 5),
(69, '7', 'IMG_20150904_800x800.jpg', 6),
(70, '7', 'SANY1200_800x800.jpg', 7),
(71, '7', 'slide-45_800x800.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `rdbackend_project`
--

CREATE TABLE IF NOT EXISTS `rdbackend_project` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `order` int(11) NOT NULL,
  `services` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rdbackend_project`
--

INSERT INTO `rdbackend_project` (`id`, `title`, `image`, `description`, `order`, `services`) VALUES
(4, 'Unilever - South Asia, South East Asia, Africa', '', '0', 1, 6),
(5, 'Krones - South Asia, South East Asia, Africa, Australia.', '', '0', 2, 6),
(6, 'Ziemann', '', '0', 3, 6),
(7, 'Tetra Pak', '', '0', 4, 6),
(8, 'Abbott', '', '0', 5, 6),
(9, 'Nivea', '', '0', 6, 6),
(11, 'GlaxoSmithKline', '', '0', 7, 6),
(12, 'Reckitt Benckiser', '', '0', 8, 0),
(13, 'Reckitt Benckiser', '', '0', 8, 6),
(14, 'Cadbury (Makson/Barmalt)', '', '0', 9, 6),
(15, 'Citrus', '', '0', 10, 0),
(16, 'Citrus', '', '0', 10, 6),
(17, 'Avalon Cosmetics', '', '0', 11, 6),
(18, 'Wipro', '', '0', 12, 6),
(19, 'Carlsberg', '', '0', 13, 0),
(20, 'test', '', '0', 2, 0),
(22, 'Carlsberg', '', '0', 13, 6),
(24, 'Sab Miller', '', '0', 14, 6),
(25, 'Kals Brewery', '', '0', 15, 6),
(26, 'Laos Brewery', '', '0', 16, 6),
(27, 'Nile Brewery, Uganda', '', '0', 17, 6),
(28, 'Serengeti Brewery - Tanzania', '', '0', 18, 6),
(29, 'Casella Wines - Australia', '', '0', 19, 6),
(30, 'Unilever, South Africa - Waterfall  (Liquid Detergent)', '', '0', 1, 9),
(31, 'Unilever, Ethiopia - EIZ ( Liquid Detergent )', '', '0', 2, 0),
(32, 'Unilever, Ethiopia - EIZ (Liquid Detergent)', '', '0', 2, 9),
(33, 'Unilever - South Asia, South East Asia, Africa', '', '0', 1, 10),
(34, 'Krones - South Asia, South East Asia, Africa, Australia', '', '0', 2, 10),
(35, 'Ziemann', '', '0', 3, 10),
(36, 'Tetra Pak', '', '0', 4, 10),
(37, 'Abbott', '', '0', 5, 10),
(38, 'Nivea', '', '0', 6, 10),
(39, 'Cavinkare', '', '0', 7, 10),
(40, 'GlaxoSmithKline', '', '0', 8, 0),
(41, 'GlaxoSmithKline', '', '0', 8, 10),
(42, 'Reckitt Benckiser', '', '0', 9, 10),
(43, 'Cadbury (Makson/Barmalt)', '', '0', 10, 10),
(44, 'ITC', '', '0', 11, 10),
(45, 'Citrus', '', '0', 12, 13),
(46, 'Avalon Cosmetics', '', '0', 13, 10),
(47, 'Wipro', '', '0', 14, 10),
(48, 'Carlsberg', '', '0', 15, 10),
(49, 'Sabmiller', '', '0', 16, 10),
(50, 'Kals brewery', '', '0', 17, 10),
(51, 'Laos Brewery', '', '0', 18, 10),
(52, 'Nile Brewery, Uganda', '', '0', 19, 10),
(54, 'Serengeti Brewery, Tanzania', '', '0', 20, 10),
(55, 'Casella Wines, Australia', '', '0', 21, 10),
(56, 'Unilever - India', '', '0', 1, 12),
(57, 'Abbott', '', '0', 2, 12),
(58, 'Citrus', '', '0', 3, 12),
(59, 'GlaxoSmithKline', '', '0', 4, 12),
(60, 'Cadbury (Makson/Barmalt)', '', '0', 5, 15),
(61, 'Wipro', '', '0', 6, 12),
(62, 'Sabmiller', '', '0', 7, 12),
(63, 'Unilever - South Asia, South East Asia, Africa', '', '0', 1, 13),
(64, 'Tetra Pak', '', '0', 2, 13),
(65, 'Abbott', '', '0', 3, 13),
(66, 'Nivea', '', '0', 4, 13),
(67, 'GlaxoSmithKline', '', '0', 5, 13),
(68, 'Reckitt Benckiser', '', '0', 6, 13),
(69, 'Cavinkare', '', '0', 7, 13),
(70, 'Cadbury (Makson/Barmalt)', '', '0', 8, 13),
(71, 'Citrus', '', '0', 9, 13),
(72, 'Siemens', '', '0', 10, 13),
(73, 'Avalon Cosmetics', '', '0', 11, 13),
(74, 'Wipro', '', '0', 12, 13),
(75, 'Carlsberg', '', '0', 13, 0),
(76, 'Carlsberg', '', '0', 13, 13),
(77, 'Sabmiller', '', '0', 14, 13),
(78, 'Kals Brewery', '', '0', 15, 13),
(79, 'Laos Brewery', '', '0', 16, 13),
(80, 'Nile Brewery, Uganda', '', '0', 17, 13),
(81, 'Serengeti Brewery, Tanzania', '', '0', 18, 13),
(82, 'Casella Wines, Australia', '', '0', 19, 13),
(83, 'Unilever - South Asia, South East Asia, Africa', '', '0', 1, 15),
(84, 'Tetra Pak', '', '0', 2, 15),
(85, 'Abbott', '', '0', 3, 15),
(86, 'Nivea', '', '0', 4, 15),
(87, 'GlaxoSmithKline', '', '0', 5, 15),
(88, 'Reckitt Benckiser', '', '0', 6, 15),
(89, 'Cadbury (Makson/Barmalt)', '', '0', 7, 15),
(90, 'Citrus', '', '0', 8, 15),
(91, 'Siemens', '', '0', 9, 15),
(92, 'Avalon Cosmetics', '', '0', 10, 15),
(93, 'Wipro', '', '0', 11, 15),
(94, 'Carlsberg', '', '0', 12, 15),
(95, 'Sabmiller', '', '0', 13, 15),
(96, 'Kals brewery', '', '0', 14, 15),
(97, 'Unilever - South Asia, South East Asia, Africa', '', '0', 1, 16),
(98, 'Tetra Pak', '', '0', 2, 16),
(99, 'Abbott', '', '0', 3, 16),
(100, 'Nivea', '', '0', 4, 16),
(101, 'GlaxoSmithKline', '', '0', 5, 16),
(102, 'Reckitt Benckiser', '', '0', 6, 16),
(103, 'Cadbury (Makson/Barmalt)', '', '0', 7, 16),
(104, 'Citrus', '', '0', 8, 16),
(105, 'Siemens', '', '0', 9, 16),
(106, 'Avalon Cosmetics', '', '0', 10, 16),
(107, 'Wipro', '', '0', 11, 16),
(108, 'Carlsberg', '', '0', 12, 16),
(109, 'Sabmiller', '', '0', 13, 16),
(110, 'Kals brewery', '', '0', 14, 16),
(111, 'Unilever - South Asia, South East Asia, Africa', '', '0', 1, 17),
(112, 'Tetra Pak', '', '0', 2, 17),
(113, 'Abbott', '', '0', 3, 17),
(114, 'Nivea', '', '0', 4, 17),
(115, 'GlaxoSmithKline', '', '0', 5, 17),
(116, 'Reckitt Benckiser', '', '0', 6, 17),
(117, 'Cadbury (Makson/Barmalt)', '', '0', 7, 17),
(118, 'Citrus', '', '0', 8, 17),
(119, 'Siemens', '', '0', 9, 17),
(120, 'Avalon Cosmetics', '', '0', 10, 17),
(121, 'Wipro', '', '0', 11, 17),
(122, 'Carlsberg', '', '0', 12, 17),
(123, 'Sabmiller', '', '0', 13, 17),
(124, 'Kals brewery', '', '0', 14, 17),
(125, 'Unilever - South Asia, South East Asia, Africa', '', '0', 1, 18),
(126, 'Tetra Pak', '', '0', 2, 18),
(127, 'Abbott', '', '0', 3, 18),
(128, 'Nivea', '', '0', 4, 18),
(129, 'GlaxoSmithKline', '', '0', 5, 18),
(130, 'Reckitt Benckiser', '', '0', 6, 18),
(131, 'Cadbury (Makson/Barmalt)', '', '0', 7, 18),
(132, 'Citrus', '', '0', 8, 18),
(133, 'Siemens', '', '0', 9, 18),
(134, 'Avalon Cosmetics', '', '0', 10, 18),
(135, 'Wipro', '', '0', 11, 0),
(137, 'Carlsberg', '', '0', 12, 18),
(138, 'Sabmiller', '', '0', 13, 18),
(139, 'Kals brewery', '', '0', 14, 18),
(140, 'Unilever - South Asia, South East Asia, Africa', '', '0', 1, 21),
(141, 'Krones - South Asia, South East Asia, Africa, Australia', '', '0', 2, 21),
(142, 'Tetra Pak', '', '0', 3, 21),
(143, 'Carlsberg', '', '0', 4, 21),
(144, 'Nivea', '', '0', 5, 21),
(145, 'GlaxoSmithKline', '', '0', 6, 21),
(146, 'Reckitt Benckiser', '', '0', 7, 21),
(147, 'Cadbury (Makson/Barmalt)', '', '0', 8, 21),
(148, 'Avalon Cosmetics', '', '0', 9, 21),
(149, 'Wipro', '', '0', 10, 21),
(150, 'Mylan Laboratories', '', '0', 11, 21),
(151, 'Siemens', '', '0', 12, 21),
(152, 'Unilever - South Asia, Africa, South East Asia', '', '0', 1, 22),
(153, 'Krones - South Asia, Africa, South East Asia, Australia', '', '0', 2, 22),
(154, 'Ziemann', '', '0', 3, 22),
(155, 'Tetra Pak', '', '0', 4, 22),
(156, 'Nivea', '', '0', 5, 22),
(157, 'Total LPG', '', '0', 6, 22),
(158, 'Wipro', '', '0', 7, 22),
(159, 'Cadbury (Makson/Barmalt)', '', '0', 8, 0),
(160, 'Nile Breweries, Uganda', '', '0', 9, 22),
(161, 'Unilever - South Asia, South East Asia, Africa', '', '0', 1, 19),
(162, 'Tetra Pak', '', '0', 2, 19),
(163, 'Abbott', '', '0', 3, 19),
(164, 'Nivea', '', '0', 4, 19),
(165, 'Cavinkare', '', '0', 5, 19),
(166, 'GlaxoSmithKline', '', '0', 6, 19),
(167, 'Reckitt Benckiser', '', '0', 7, 19),
(168, 'Cadbury (Makson/Barmalt)', '', '0', 8, 19),
(169, 'Citrus', '', '0', 9, 19),
(170, 'Avalon Cosmetics', '', '0', 10, 19),
(171, 'Wipro', '', '0', 11, 19),
(172, 'Carlsberg', '', '0', 12, 19),
(173, 'Sabmiller', '', '0', 13, 19),
(174, 'Kals Brewery', '', '0', 14, 19),
(175, 'Laos Brewery', '', '0', 15, 19),
(176, 'Nile Brewery, Uganda', '', '0', 16, 19),
(177, 'Serengeti Brewery, Tanzania', '', '0', 17, 19),
(178, 'Casella Wines, Australia', '', '0', 18, 19),
(179, 'Unilever - South Asia, South East Asia, Africa', '', '0', 1, 20),
(180, 'Tetra Pak', '', '0', 2, 20),
(181, 'Abbott', '', '0', 3, 20),
(182, 'Nivea', '', '0', 4, 20),
(183, 'Cavinkare', '', '0', 5, 20),
(184, 'GlaxoSmithKline', '', '0', 6, 20),
(185, 'Reckitt Benckiser', '', '0', 7, 20),
(186, 'Cadbury (Makson/Barmalt)', '', '0', 8, 20),
(187, 'Citrus', '', '0', 9, 20),
(188, 'Avalon Cosmetics', '', '0', 10, 20),
(189, 'Wipro', '', '0', 11, 20),
(190, 'Sabmiller', '', '0', 12, 20);

-- --------------------------------------------------------

--
-- Table structure for table `rdbackend_sector`
--

CREATE TABLE IF NOT EXISTS `rdbackend_sector` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rdbackend_sector`
--

INSERT INTO `rdbackend_sector` (`id`, `name`, `description`, `image1`, `image2`, `order`, `type`) VALUES
(4, 'Hot and Cold Insulation', '<p>Insulation for different grades of pipes, storage tanks, vessels, reactors &amp; various equipment for a wide range of process industries such as Chemical, Oil &amp; Gas, Food &amp; Beverages, Personal Care Products, Pharma, FMCG in stainless steel cladding and aluminum cladding.</p>\n<p>&nbsp;</p>', '138_A_Small_428x330.jpg', 'SAM_0662_Banner.jpg', 2, '1'),
(5, 'Mounted Modular Plants', '<p style="text-align: justify;">Company has expertise over past few years for fabrication and erection of mounted modular units in Asia ( Laos, Indonesia ), Africa and other countries for diversified applications.</p>', 'slide-42---2_428x3302.jpg', '1920-x-595.jpg', 3, '1'),
(6, 'Piping and Erection', '<p style="text-align: justify;">Piping installations and piping systems for a wide range of process industries such as Chemical, Oil &amp; Gas, hygienic high purity pipeline for Food &amp; Beverages, Personal Care Products, Pharma, FMCG in various grades of stainless steel and carbon steel.</p>\n<p style="text-align: justify;">Facilities for design, fabrication and erection related to any type of piping work and installation.</p>\n<p style="text-align: justify;">The company is well equipped with the latest Orbital Welding Machines with feed wire facility. Endoscopy / Boroscopy testing facility for remote visual inspection as part of the quality control program.</p>', '428x660.jpg', 'Landing_1920x595.jpg', 5, '2'),
(7, 'SS and MS steel structure', '<p>Steel structural work for wide range of process industries such as Chemical, Oil &amp; Gas, Food &amp; Beverages, Personal Care Products, Pharma, FMCG.</p>', 'IMG_8160_Small_428x330.jpg', 'IMG_8160_Banner.jpg', 4, '1'),
(8, 'Tanks and Equipments', '<p style="text-align: justify;">Tanks &amp; equipment fabrication, site erection and commissioning for wide range of process industries such as Chemical, Food &amp; Beverages, Personal Care Products, Oil &amp; Gas, Pharma, FMCG - in different grades of stainless steel / carbon steel.</p>\n<p style="text-align: justify;">&nbsp;</p>', '428x330.jpg', 'IMG_8196_Banner.jpg', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `rdbackend_services`
--

CREATE TABLE IF NOT EXISTS `rdbackend_services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `order` int(11) NOT NULL,
  `sector` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rdbackend_services`
--

INSERT INTO `rdbackend_services` (`id`, `name`, `description`, `order`, `sector`) VALUES
(6, 'Hot Insulation', '<p style="text-align: justify;">Carried out for:-</p>\n<ul>\n<li style="text-align: justify;">High, medium and low pressure steam piping</li>\n<li style="text-align: justify;">Condensate piping</li>\n<li style="text-align: justify;">Hot water piping</li>\n<li style="text-align: justify;">Warm water piping</li>\n<li style="text-align: justify;">CIP piping</li>\n<li style="text-align: justify;">Insulation of storage tanks, vessels, reactors and various chemical equipment.</li>\n</ul>', 1, 4),
(7, 'Cold Insulation', '<p style="text-align: justify;">Carried out for:-</p>\n<ul>\n<li style="text-align: justify;">Liquefied air piping</li>\n<li style="text-align: justify;">Liquid ammonia, nitrogen piping</li>\n<li style="text-align: justify;">Glycol piping</li>\n<li style="text-align: justify;">Chilled water piping</li>\n<li style="text-align: justify;">Cold water piping.</li>\n<li style="text-align: justify;">Insulation of storage tanks, vessels, reactors and various chemical equipment used for cryogenic and subzero services.</li>\n</ul>', 2, 4),
(9, 'Skids & Modular Plants', '<p style="text-align: justify;"><strong>Has expertise over past few years for fabrication and erection of mounted modular units.</strong></p>\n<p><strong>The modular assembly includes :-</strong></p>\n<ul>\n<li>Steel structure</li>\n<li>Equipment</li>\n<li>Piping, pipe fittings and valves.</li>\n<li>Various types of instruments for automation</li>\n<li>Cable and junction box installation and connection</li>\n<li>Hot &amp; cold insulation.</li>\n</ul>\n<p><strong>Highlights and benefits of mounted modular plants :-</strong></p>\n<ul>\n<li>Lower construction cost and short time delivery.</li>\n<li>Reduced on-site erection and hookup time.</li>\n<li>Minimal site disruption.</li>\n<li>Manufacturing under improved site safety and good housekeeping.</li>\n<li>Single point construction responsibility.</li>\n<li>Better aesthetics.</li>\n<li>Quality test prior to dispatch.</li>\n</ul>\n<p><strong>Applications of Modular mounted plants :-</strong></p>\n<ul>\n<li>Pasteurization Skids</li>\n<li>Water Softening Plant ( RO System )</li>\n<li>Mounted De-Hydration System</li>\n<li>Mounted Chilling Unit</li>\n<li>Mounted Ice Plants</li>\n<li>Mounted CIP Systems</li>\n<li>Sulphonization Skids for Detergents</li>\n<li>Air-Drying Systems</li>\n<li>Engine Mounted Pump Skids</li>\n<li>Mounted Crushing &amp; Screening Skids</li>\n</ul>', 1, 5),
(10, 'Stainless steel hygienic piping by using orbital welding', '<p style="text-align: justify;"><strong>Stainless steel hygienic high purity piping by using orbital welding / manual welding for foods &amp; beverages, personal care products, pharma, FMGC.</strong></p>\n<p style="text-align: justify;">Carried out for :- Perfume, CIP system, CIP water, wash water, Cream Lotion Soap ( CLS ), chlorinated water, de-chlorinated water, DM water piping, cold process water, enzymes, effluents, fresh milk lines, milk base products, liquid chocolate, butter, Vanaspati, glycerin, preservatives, food pulp, tomato puree, tomato ketchup, palm kernel oil, salphonic acid, instrumentation air, process air, vacuum line etc.</p>', 1, 6),
(11, 'Stainless steel NB process piping', '<p style="text-align: justify;"><strong>Stainless steel NB process piping in various grades of SS304, SS 304L, SS316, SS316L, SS316Ti.</strong>&nbsp;</p>\n<p style="text-align: justify;">Carried out for :- Perfume and color, exhaust / vent, ethyl alcohol, glycerin, glycerol, hot water, cold water, chilled water, cooling water, service seal water, air lines, oil phase slurry, petroleum jelly polymer, non-Ionics, sodium carbonate / soda ash, caustic, Butyl Ether, Castor wax melt, sodium silicate, Vanaspati, vacuum etc.</p>', 2, 6),
(12, 'Carbon steel - Seamless boiler quality (IBR / Non-IBR ) utility piping', '<p style="text-align: justify;">Boiler quality utility piping carried out for :- High pressure steam &amp; condensate piping.</p>\n<p style="text-align: justify;">Non-IBR utility piping carried for :- Low pressure steam &amp; condensate piping, hot water piping, ethyl alcohol piping.</p>', 3, 6),
(13, 'Carbon Steel ERW Piping', '<p style="text-align: justify;">Majority of these pipelines is for utility piping carried out for sealing flush water, process water, water heating circuits, fire water, cooling water, chilled water, raw water, soft treated water, waste water etc.</p>', 4, 6),
(14, 'GI Piping', '<p style="text-align: justify;">Carried out for :- Instrument air, compressed air, plant process air, fire water, portable water, service water etc.</p>', 5, 6),
(15, 'PVC, CPVC, UPVC & HDPE Piping', '<p style="text-align: justify;">Carried out for :- Portable water, service water, raw water etc.</p>', 6, 6),
(16, 'PTFE Lined piping', '<p style="text-align: justify;">Projects Executed :-</p>\n<p style="text-align: justify;">Special piping was done at M/s Unilever &ndash; Waterfall (Liquid detergent) project at&nbsp;South Africa for hydrochloric acid application.</p>', 7, 6),
(17, 'LPG underground above ground piping', '<p style="text-align: justify;">Projects Executed :-</p>\n<ul style="text-align: justify;">\n<li>Total LPG India</li>\n</ul>\n<p style="text-align: justify;">Integration of 12&rdquo; Diameter &ndash; half km long underground cross country pipeline ( SA 333 Gr.6 seamless Schedule 40 ) at Mangalore Port jetty no 12 to existing outside pipeline of port.</p>\n<ul style="text-align: justify;">\n<li>Unilever India</li>\n</ul>\n<p style="text-align: justify;">4&rdquo; to 6&rdquo; above ground pipeline fabrication and erection for 2 kms.</p>', 8, 6),
(19, 'Stainless Steel Structure', '<p style="text-align: justify;">Methodology :-</p>\n<ul style="text-align: justify;">\n<li>Designing of stainless steel structure.</li>\n<li>Preparation of fabrication drawings.</li>\n<li>Pre &ndash; fabrication in workshop and supply at site.</li>\n<li>Site fabrication / assembly &amp; erection of stainless steel structure.</li>\n</ul>\n<p style="text-align: justify;">Eg. Vast variety of stainless steel equipment platform, staircase, piperacks etc.</p>', 1, 7),
(20, 'Mild Steel Structure', '<p style="text-align: justify;">Methodology :-</p>\n<ul style="text-align: justify;">\n<li>Designing of mild steel structure.</li>\n<li>Preparation of fabrication drawings.</li>\n<li>Pre &ndash; fabrication in workshop and supply at site.</li>\n<li>Site fabrication / assembly &amp; erection of mild steel structure.</li>\n</ul>\n<p style="text-align: justify;">Eg. Various type of mild steel pipe supports, high bay structure ranging from 80 Tons to 370 tons.</p>', 2, 7),
(21, 'Stainless Steel / Carbon Steel Tanks & Equipment - Shop Fabrication and Site Erection', '<p style="text-align: justify;">Design, preparation of fabrication drawings, shop fabrication and site erection of :-</p>\n<p style="text-align: justify;">1. Hoppers, storage tanks, weigh/day tanks in various sizes and different MOC stainless steel / carbon steel &amp; other special materials for various end uses such</p>\n<ul style="text-align: justify;">\n<li>Sodal</li>\n<li>Sodium Silicate</li>\n<li>Salphonic Acid</li>\n<li>Caustic Soda</li>\n<li>Furnace Oil</li>\n<li>HSD</li>\n<li>Brine solution &amp; other chemicals.</li>\n</ul>\n<p style="text-align: justify;">2. Boiler flue gas &amp; hot air generator chimneys</p>\n<p style="text-align: justify;">For Mylan Laboratories &ndash; Shop fabrication and site erection of boiler flue gas chimney height 42 meters and top Diameter 0.8 meters.</p>\n<p style="text-align: justify;">3. Stainless steel / carbon steel inlet / outlet chute, outlet vessel, buffer vessel, ventilation vessel, vapor pipe for dryers, CIP systems, filtration systems, storage silos, separators, condenser, vermarmer,&nbsp;various other chemicals equipment done for various projects across continents.</p>', 1, 8),
(22, 'Stainless Steel / Carbon Steel Tanks &Equipment  - Site Fabrication, Site Erection and Commissioning', '<p style="text-align: justify;">1) 750 KL fire water tanks / 500 KL oil storage tanks fabricated in modular network off site. The onsite welding done with automatic MIG welding process along with hydraulic jacking method used for safety site job.</p>\n<p style="text-align: justify;">2) Site fabrication, installation, alignment and commissioning of storage tanks, hygienic tanks, silos having length above 15 meters. These tanks are installed by circumferential seam welding of pre-fabricated sections and erected one above the other.</p>\n<p style="text-align: justify;">3) Unloading, shifting, installation, alignment and commissioning of various equipment such as LPG horizontal storage bullets, band driers, ovens, chemical vessels etc.</p>\n<p style="text-align: justify;">4) Dismantling and re-erection of unloading arm on new foundation at&nbsp;M/s Total LPG - Mangalore.</p>\n<p style="text-align: justify;">5) Fabrication, site assembly, installation and alignment of boiler flue gas &amp; hot air generator chimneys.</p>', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'inactive'),
(2, 'Active'),
(3, 'Waiting'),
(4, 'Active Waiting'),
(5, 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `billingaddress` text NOT NULL,
  `billingcity` varchar(255) NOT NULL,
  `billingstate` varchar(255) NOT NULL,
  `billingcountry` varchar(255) NOT NULL,
  `billingcontact` varchar(255) NOT NULL,
  `billingpincode` varchar(255) NOT NULL,
  `shippingaddress` text NOT NULL,
  `shippingcity` varchar(255) NOT NULL,
  `shippingcountry` varchar(255) NOT NULL,
  `shippingstate` varchar(255) NOT NULL,
  `shippingpincode` varchar(255) NOT NULL,
  `shippingname` varchar(255) NOT NULL,
  `shippingcontact` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `registrationno` varchar(255) NOT NULL,
  `vatnumber` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `firstname`, `lastname`, `phone`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `billingcontact`, `billingpincode`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `shippingname`, `shippingcontact`, `currency`, `credit`, `companyname`, `registrationno`, `vatnumber`, `country`, `fax`, `gender`, `facebook`, `google`, `twitter`, `street`, `address`, `dob`, `city`, `state`, `pincode`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, 'images_(2)1.jpg', '', '', 'Facebook', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '0000-00-00', '', '', ''),
(6, 'Pooja Thakare', '', 'pooja.wohlig@gmail.com', 3, '2015-12-09 06:02:37', 1, 'https://lh5.googleusercontent.com/-5B1PwZZrwdI/AAAAAAAAAAI/AAAAAAAAABw/J3Hf871N8IE/photo.jpg', '', '103402210128529539675', 'Google', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '103402210128529539675', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `logintype`
--
ALTER TABLE `logintype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pageaccesslevel`
--
ALTER TABLE `pageaccesslevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectimage`
--
ALTER TABLE `projectimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rdbackend_clients`
--
ALTER TABLE `rdbackend_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rdbackend_gallery`
--
ALTER TABLE `rdbackend_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rdbackend_project`
--
ALTER TABLE `rdbackend_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rdbackend_sector`
--
ALTER TABLE `rdbackend_sector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rdbackend_services`
--
ALTER TABLE `rdbackend_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logintype`
--
ALTER TABLE `logintype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=445;
--
-- AUTO_INCREMENT for table `pageaccesslevel`
--
ALTER TABLE `pageaccesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `projectimage`
--
ALTER TABLE `projectimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `rdbackend_clients`
--
ALTER TABLE `rdbackend_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `rdbackend_gallery`
--
ALTER TABLE `rdbackend_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `rdbackend_project`
--
ALTER TABLE `rdbackend_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `rdbackend_sector`
--
ALTER TABLE `rdbackend_sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rdbackend_services`
--
ALTER TABLE `rdbackend_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
