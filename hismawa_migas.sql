-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 03:56 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hismawa_migas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_eponensial`
--

CREATE TABLE IF NOT EXISTS `hasil_eponensial` (
  `id_exponensial` int(11) NOT NULL AUTO_INCREMENT,
  `kabupaten` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `tahunawal` int(4) NOT NULL,
  `tahunakhir` int(4) NOT NULL,
  `tahun` int(4) NOT NULL,
  `jan` int(11) NOT NULL,
  `feb` int(11) NOT NULL,
  `mar` int(11) NOT NULL,
  `apr` int(11) NOT NULL,
  `mei` int(11) NOT NULL,
  `jun` int(11) NOT NULL,
  `jul` int(11) NOT NULL,
  `agu` int(11) NOT NULL,
  `sep` int(11) NOT NULL,
  `okt` int(11) NOT NULL,
  `nov` int(11) NOT NULL,
  `des` int(11) NOT NULL,
  `sse` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `mse` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `mape` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alpha` varchar(6) COLLATE latin1_general_ci DEFAULT NULL,
  `gamma` varchar(6) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_exponensial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `hasil_eponensial`
--

INSERT INTO `hasil_eponensial` (`id_exponensial`, `kabupaten`, `tahunawal`, `tahunakhir`, `tahun`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`, `sse`, `mse`, `mape`, `alpha`, `gamma`) VALUES
(34, 'Sleman', 2016, 2017, 2018, 1157650, 1172197, 1186744, 1201290, 1215837, 1230384, 1244931, 1259478, 1274025, 1288571, 1303118, 1317665, '130886919821.65', '5453621659.2354', '5', '0.2', '0.9'),
(37, 'Kulonprogo', 2016, 2017, 2018, 623230, 642921, 662612, 682303, 701994, 721685, 741375, 761066, 780757, 800448, 820139, 839830, '590705878526.69', '24612744938.612', '12.437601531431', '0.1', '0.2'),
(39, 'Kota Madya', 2016, 2016, 2017, 530666, 521798, 512929, 504060, 495191, 486322, 477454, 468585, 459716, 450847, 441979, 433110, '49954408539.744', '4162867378.312', '9.7712715937563', '0.3', '0.1'),
(40, 'Gunung Kidul', 2016, 2017, 2018, 333106, 334414, 335722, 337030, 338339, 339647, 340955, 342263, 343572, 344880, 346188, 347496, '17412709402.907', '725529558.45444', '6.6501146854901', '0.3', '0.2'),
(41, 'Gunung Kidul', 2016, 2016, 2017, 335678, 352156, 368635, 385113, 401591, 418070, 434548, 451026, 467505, 483983, 500461, 516940, '19388049474.766', '1615670789.5638', '10.21766367381', '0.1', '0.9'),
(42, 'Sleman', 2016, 2016, 2017, 759884, 752606, 745329, 738051, 730773, 723495, 716218, 708940, 701662, 694384, 687106, 679829, '558103970549.66', '46508664212.471', '19.089526051824', '0.1', '0.2'),
(43, 'Sleman', 2016, 2016, 2017, 759884, 752606, 745329, 738051, 730773, 723495, 716218, 708940, 701662, 694384, 687106, 679829, '558103970549.66', '46508664212.471', '19.089526051824', '0.1', '0.2'),
(44, 'Sleman', 2016, 2016, 2017, 759884, 752606, 745329, 738051, 730773, 723495, 716218, 708940, 701662, 694384, 687106, 679829, '558103970549.66', '46508664212.471', '19.089526051824', '0.1', '0.2'),
(45, 'Sleman', 2016, 2016, 2017, 759884, 752606, 745329, 738051, 730773, 723495, 716218, 708940, 701662, 694384, 687106, 679829, '558103970549.66', '46508664212.471', '19.089526051824', '0.1', '0.2'),
(46, 'Kulonprogo', 2016, 2016, 2017, 281329, 290802, 300275, 309749, 319222, 328695, 338169, 347642, 357115, 366589, 376062, 385535, '6050687279.4482', '504223939.95401', '7.0214423374256', '0.1', '0.8'),
(47, 'Bantul', 2016, 2017, 2018, 778536, 780559, 782582, 784605, 786628, 788651, 790674, 792697, 794720, 796743, 798766, 800789, '111617922979.33', '4650746790.8056', '7.1032336514279', '0.3', '0.1');

-- --------------------------------------------------------

--
-- Table structure for table `kab`
--

CREATE TABLE IF NOT EXISTS `kab` (
  `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT,
  `kabupaten` varchar(25) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kabupaten`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kab`
--

INSERT INTO `kab` (`id_kabupaten`, `kabupaten`) VALUES
(1, 'Sleman'),
(2, 'Kota Madya'),
(3, 'Bantul'),
(4, 'Gunung Kidul'),
(5, 'Kulonprogo');

-- --------------------------------------------------------

--
-- Table structure for table `pasokan`
--

CREATE TABLE IF NOT EXISTS `pasokan` (
  `id_pasokan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kab` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jan` int(11) NOT NULL,
  `feb` int(11) NOT NULL,
  `mar` int(11) NOT NULL,
  `apr` int(11) NOT NULL,
  `mei` int(11) NOT NULL,
  `jun` int(11) NOT NULL,
  `jul` int(11) NOT NULL,
  `agu` int(11) NOT NULL,
  `sep` int(11) NOT NULL,
  `okt` int(11) NOT NULL,
  `nov` int(11) NOT NULL,
  `des` int(11) NOT NULL,
  PRIMARY KEY (`id_pasokan`),
  KEY `id_pasokan` (`id_pasokan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `pasokan`
--

INSERT INTO `pasokan` (`id_pasokan`, `nama_kab`, `tahun`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`) VALUES
(16, 'sleman', '2016', 946200, 902240, 970400, 909640, 919560, 950200, 1038040, 1014200, 949400, 935440, 1005840, 1042680),
(23, 'kota madya', '2016', 569960, 545240, 572000, 538760, 544120, 554200, 586080, 595160, 560640, 548760, 562720, 601760),
(24, 'bantul', '2016', 658360, 633000, 677760, 635480, 647280, 681000, 728880, 730520, 703960, 673080, 735000, 764160),
(25, 'gunung kidul', '2016', 280640, 266600, 285320, 266960, 274720, 286240, 318680, 309400, 304440, 293520, 307520, 321040),
(26, 'Kulonprogo', '2016', 256520, 256280, 264040, 247160, 249400, 254800, 269760, 279160, 266880, 258480, 273880, 290960),
(27, 'sleman', '2017', 985000, 901800, 986080, 915880, 991280, 977480, 985000, 901800, 986080, 915880, 991280, 977480),
(28, 'kota madya', '2017', 568440, 518600, 574120, 527760, 575360, 568061, 567779, 591983, 607880, 573600, 573560, 621560),
(29, 'bantul', '2017', 735960, 675040, 745760, 691440, 748040, 760720, 729800, 771360, 761480, 747040, 741440, 758320),
(33, 'Gunung Kidul', '2017', 311520, 273200, 299040, 281360, 301000, 321360, 307080, 326480, 319200, 306680, 310560, 312360),
(34, 'Kulonprogo', '2017', 282680, 255160, 279000, 269360, 287080, 298360, 277680, 289040, 295800, 285000, 283280, 1042680);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE IF NOT EXISTS `persediaan` (
  `id_persediaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kab` varchar(25) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jan` int(11) NOT NULL,
  `feb` int(11) NOT NULL,
  `mar` int(11) NOT NULL,
  `apr` int(11) NOT NULL,
  `mei` int(11) NOT NULL,
  `jun` int(11) NOT NULL,
  `jul` int(11) NOT NULL,
  `agu` int(11) NOT NULL,
  `sep` int(11) NOT NULL,
  `okt` int(11) NOT NULL,
  `nov` int(11) NOT NULL,
  `des` int(11) NOT NULL,
  PRIMARY KEY (`id_persediaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id_persediaan`, `nama_kab`, `tahun`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`) VALUES
(3, 'Sleman', '2016', 85260, 81130, 88950, 80920, 82630, 86010, 91400, 90040, 84350, 83150, 90100, 90000),
(4, 'Kota Madya', '2016', 48770, 46470, 49980, 45500, 46620, 47420, 50640, 51200, 48700, 46550, 48890, 52640),
(5, 'Bantul', '2016', 57710, 55350, 59910, 55900, 56600, 60100, 64520, 65500, 62880, 59410, 65720, 68430),
(6, 'Gunung Kidul', '2016', 16680, 14080, 16840, 14100, 15520, 16360, 19240, 18200, 18530, 17760, 19850, 20860),
(7, 'Kulonprogo', '2016', 12620, 12860, 13580, 11120, 11940, 12800, 13720, 14100, 13800, 12240, 14450, 17890),
(8, 'Sleman', '2017', 89500, 81810, 90250, 82350, 93500, 91700, 92840, 84500, 92960, 85800, 95610, 93900),
(9, 'Kota Madya', '2017', 43000, 38100, 44910, 39520, 44500, 43240, 43800, 46660, 47500, 44840, 44600, 44960),
(10, 'Bantul', '2017', 80100, 74300, 81430, 76820, 71830, 76900, 78850, 74540, 79800, 78840, 76990, 77320),
(11, 'Gunung Kidul', '2017', 28500, 24870, 26470, 25500, 27510, 29860, 27700, 29950, 28480, 27000, 26800, 27750),
(12, 'Kulonprogo', '2017', 17900, 98500, 16430, 15360, 17240, 19300, 18500, 19320, 20100, 19900, 19440, 16320);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
