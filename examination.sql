-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 01:05 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `classSubject` text NOT NULL,
  `limit-marks` text NOT NULL,
  `create-on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update-on` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `description`, `classSubject`, `limit-marks`, `create-on`, `update-on`) VALUES
(1, 'Cloud Computing Models', 'Cloud Providers offer services that can be grouped into three categories', '5', '20', '2018-11-12 06:42:06', ''),
(2, 'Cloud Computing Models', 'Cloud Providers offer services that can be grouped into three categories', '10', '20', '2018-11-12 06:42:13', ''),
(3, 'Derived Data Type', 'Those data types which are implementation independent as they can be implemented in one or the other way are known as derived data types. These data types are normally built by the combination of primary or built-in data types and associated operations on them. For example ?\r\n\r\nList\r\nArray\r\nStack\r\nQueue', '11', '20', '2018-11-12 11:21:02', ''),
(4, 'Cloud Computing Models are like', 'IAAS(Infrastrucutre as a service) ,  PAAS(Platform as a service) , SAAS(softwere as a service)', '12', '20', '2018-11-12 06:42:25', ''),
(5, 'Data Type', 'Data type is a way to classify various types of data such as integer, string, etc. which determines the values that can be used with the corresponding type of data, the type of operations that can be performed on the corresponding type of data. There are two data types ?\r\n\r\nBuilt-in Data Type\r\nDerived Data Type', '11', '20', '2018-11-12 10:49:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(255) NOT NULL,
  `create-on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `title`, `description`, `duration`, `create-on`) VALUES
(5, 'BCA', 'Students who opt for a Bachelor in Computer Applications (BCA) will get skills and information not only about Computer and Information Technology but also in communication, organization and management. One also get to learn programming languages such as Java, C++, HML, SQL, etc. Information about various computer applications and latest developments in IT and communication systems is also provided.', '2018 to 2030', '2018-11-10 15:28:23'),
(6, 'MCA', 'Master of Computer Applications (MCA) is a three-year (six semesters) professional Master''s Degree in computer science awarded in India. The course was designed to meet the growing demand for qualified professionals in the field of Information Technology. ', '2018 to 2030', '2018-11-12 04:38:12'),
(10, 'BBA', 'BBA degree allows candidates to enter into the field of management and teaches them various aspects that are necessary for effective business management. The course is designed in a way to train students effectively in management education and communication skills which further inculcates entrepreneurship skills.', '2018 to 2030', '2018-11-10 16:38:47'),
(11, 'B.com', 'lora ipsum', '2018 to 2030', '2018-11-12 04:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prectical-no` int(11) NOT NULL,
  `theoretical-no` int(11) NOT NULL,
  `examination-time` text NOT NULL,
  `classSubject` text NOT NULL,
  `create-on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update-on` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `title`, `description`, `prectical-no`, `theoretical-no`, `examination-time`, `classSubject`, `create-on`, `update-on`) VALUES
(5, 'cloud computing', 'Cloud computing is shared pools of configurable computer system resources and higher-level services that can be rapidly provisioned with minimal management effort, often over the Internet. ', 40, 60, '1:00pm to 3:00pm', '6', '2018-11-12 04:39:55', ''),
(10, 'cloud computing', 'Cloud computing is shared pools of configurable computer system resources and higher-level services that can be rapidly provisioned with minimal management effort, often over the Internet. ', 40, 60, '1:00pm to 3:00pm', '5', '2018-11-11 07:50:03', ''),
(11, 'Data Structure', 'In computer science, a data structure is a data organization, management and storage format that enables efficient access and modification.', 40, 60, '1:00pm to 3:00pm', '10', '2018-11-11 07:50:14', ''),
(12, 'cloud computing feture', 'tht', 20, 60, '1:00pm to 3:00pm', '11', '2018-11-12 05:48:49', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `activity` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `activity`, `status`) VALUES
(46, 'Frédérique ', 'Citeaux', 'Frédérique Citeaux', 'Frédérique @Citeaux', '509212bb749ae637017c539e2f7983a4', '', 'block'),
(48, 'Eduardo ', 'Saavedra', 'Eduardo Saavedra', 'Eduardo @Saavedra', '2b4c0a8b6c765410a79b194faa0e4843', '', 'unblock'),
(49, 'Mary', 'Young', 'MaryYoung', 'Mary@Young', 'e39e74fb4e80ba656f773669ed50315a', '', 'unblock'),
(50, 'Horst ', 'Kloss', 'Horst Kloss', 'Horst @Kloss', '471071412bc8418c6cafc3cfdc507721', '', 'unblock'),
(54, 'Valarie', 'Thompson', 'ValarieThompson', 'Valarie@Thompson', '991470aff2d666b8b5094e0b32b69338', '', 'unblock'),
(55, 'Helen ', 'Bennett', 'Helen Bennett', 'Helen @Bennett', 'a3dfe29ead5bc05748954c966d17eafe', '', 'unblock'),
(56, 'Annette ', 'Roulet', 'Annette Roulet', 'Annette @Roulet', '6b41ba07a910ad994b2984b0fb431bc2', '', 'unblock'),
(57, 'Renate ', 'Messner', 'Renate Messner', 'Renate @Messner', '0d9ace06c3aac8e86a5c3c73b2ac9f38', '', ''),
(58, 'Paolo ', 'Accorti', 'Paolo Accorti', 'Paolo @Accorti', 'd166ecb731be94baf046a17ac41d1359', '', 'block'),
(59, 'Daniel', 'Da Silva', 'DanielDa Silva', 'Daniel@Da Silva', '262031397020fd8df478ec13b4b096c5', '', 'block'),
(60, 'Daniel ', 'Tonini', 'Daniel Tonini', 'Daniel @Tonini', '75176c722254cc7b4bac30f160034068', '', ''),
(61, 'Henriette ', 'Pfalzheim', 'Henriette Pfalzheim', 'Henriette @Pfalzheim', 'a7f0e26d1a99e36aca35e77cb481ebf2', '', ''),
(62, 'Elizabeth ', 'Lincoln', 'Elizabeth Lincoln', 'Elizabeth @Lincoln', 'fb4e0369679d3dd8ada109f026a6eb22', '', ''),
(63, 'Peter ', 'Franken', 'Peter Franken', 'Peter @Franken', 'd07527e1223fbc89cf8c7ae10252834e', '', ''),
(64, 'Anna', 'O''Hara', 'AnnaO''Hara', 'Anna@O''Hara', '97a9d330e236c8d067f01da1894a5438', '', ''),
(65, 'Giovanni ', 'Rovelli', 'Giovanni Rovelli', 'Giovanni @Rovelli', 'bd82c45da0bde7c3e3f89be04e785c16', '', ''),
(66, 'Adrian', 'Huxley', 'AdrianHuxley', 'Adrian@Huxley', 'c1937b687795ce80be0ecf20e1811441', '', ''),
(67, 'Marta', 'Hernandez', 'MartaHernandez', 'Marta@Hernandez', '83f9c4eb242966cdcada1d01be5d9b15', '', ''),
(68, 'Ed', 'Harrison', 'EdHarrison', 'Ed@Harrison', '30db2fdfdddfb7cc359ce7a36596f3e0', '', ''),
(69, 'Mihael', 'Holz', 'MihaelHolz', 'Mihael@Holz', 'c3c50d77a8e7da84050866e97418066d', '', ''),
(70, 'Jan', 'Klaeboe', 'JanKlaeboe', 'Jan@Klaeboe', 'e68564f23e0e939acea76dc3d2bc01bf', '', ''),
(71, 'Bradley', 'Schuyler', 'BradleySchuyler', 'Bradley@Schuyler', '5257e05cde806e07b405ddcce85114d2', '', ''),
(72, 'Mel', 'Andersen', 'MelAndersen', 'Mel@Andersen', '616089705b0c4edfb6293e50eaccba85', '', ''),
(73, 'Pirkko', 'Koskitalo', 'PirkkoKoskitalo', 'Pirkko@Koskitalo', '75e1fa12ac26556acc46562dafe475e7', '', ''),
(74, 'Catherine ', 'Dewey', 'Catherine Dewey', 'Catherine @Dewey', '7b77a39e1105a78b5e9f83ed2e14517b', '', ''),
(75, 'Steve', 'Frick', 'SteveFrick', 'Steve@Frick', '81b8a1b77068d06e1c8190825253066f', '', ''),
(76, 'Wing', 'Huang', 'WingHuang', 'Wing@Huang', 'a42dc0468329263ee316a61b754bda09', '', ''),
(77, 'Julie', 'Brown', 'JulieBrown', 'Julie@Brown', '2964815d03a032c8ca37ac5d557647dd', '', ''),
(78, 'Mike', 'Graham', 'MikeGraham', 'Mike@Graham', '1b83d5da74032b6a750ef12210642eea', '', ''),
(79, 'Ann ', 'Brown', 'Ann Brown', 'Ann @Brown', 'ad3e33bef1bd0a70b876947de403eedc', '', ''),
(80, 'William', 'Brown', 'WilliamBrown', 'William@Brown', '604c8dd5066ee30539037569a028dc9b', '', ''),
(81, 'Ben', 'Calaghan', 'BenCalaghan', 'Ben@Calaghan', '092f2ba9f39fbc2876e64d12cd662f72', '', ''),
(82, 'Kalle', 'Suominen', 'KalleSuominen', 'Kalle@Suominen', 'b5f51c5c18456ba2e5505e26a1d2ff70', '', ''),
(83, 'Philip ', 'Cramer', 'Philip Cramer', 'Philip @Cramer', 'c187fab56db139f6a44c8da903745627', '', ''),
(84, 'Francisca', 'Cervantes', 'FranciscaCervantes', 'Francisca@Cervantes', '3f8de3c0c541c48584b2da3d7fdaaa8d', '', ''),
(85, 'Jesus', 'Fernandez', 'JesusFernandez', 'Jesus@Fernandez', 'e9829608dd90ff6b8bf7cb50746eae78', '', ''),
(86, 'Brian', 'Chandler', 'BrianChandler', 'Brian@Chandler', '4d236810821e8e83a025f2a83ea31820', '', ''),
(87, 'Patricia ', 'McKenna', 'Patricia McKenna', 'Patricia @McKenna', '5bff3e4c64ecf67270ffb59428b00ca4', '', ''),
(88, 'Laurence ', 'Lebihan', 'Laurence Lebihan', 'Laurence @Lebihan', '06c73624c68f26760645b6ba668c6cf0', '', ''),
(89, 'Paul ', 'Henriot', 'Paul Henriot', 'Paul @Henriot', 'ffc8ac9065dd85b97acd59a293eff29b', '', ''),
(90, 'Armand', 'Kuger', 'ArmandKuger', 'Armand@Kuger', '6a3726b360d4e11255de895686002566', '', ''),
(91, 'Wales', 'MacKinlay', 'WalesMacKinlay', 'Wales@MacKinlay', 'e612e56ca0235a349cffa8331d8a6ad7', '', ''),
(92, 'Karin', 'Josephs', 'KarinJosephs', 'Karin@Josephs', '5b591ed6a915f05e3629a1b5156ad8e7', '', ''),
(93, 'Juri', 'Yoshido', 'JuriYoshido', 'Juri@Yoshido', '1b887d4572186931b6881db43c619365', '', ''),
(94, 'Dorothy', 'Young', 'DorothyYoung', 'Dorothy@Young', '08b7593cde74530e1db316e201363219', '', ''),
(95, 'Lino ', 'Rodriguez', 'Lino Rodriguez', 'Lino @Rodriguez', 'e8a6e80cd13f449bdae8c048ee2e7b9b', '', ''),
(96, 'Braun', 'Urs', 'BraunUrs', 'Braun@Urs', '0d178dd9904716651a1b0cd7c9882568', '', ''),
(97, 'Allen', 'Nelson', 'AllenNelson', 'Allen@Nelson', '9c0ca0cabbd78a5a02bf8447347eced5', '', ''),
(98, 'Pascale ', 'Cartrain', 'Pascale Cartrain', 'Pascale @Cartrain', 'f26dd4bdace1c409b51e0b42c608afc5', '', ''),
(99, 'Georg ', 'Pipps', 'Georg Pipps', 'Georg @Pipps', 'e658fabe1e43ecca3f369423617b431e', '', ''),
(100, 'Arnold', 'Cruz', 'ArnoldCruz', 'Arnold@Cruz', 'd24d17e38303040df00c574b151b424a', '', ''),
(101, 'Maurizio ', 'Moroni', 'Maurizio Moroni', 'Maurizio @Moroni', '803c13e82a0b85ee85884c0f62ad1158', '', ''),
(102, 'Akiko', 'Shimamura', 'AkikoShimamura', 'Akiko@Shimamura', 'd3c949ed8236327a86635893e89e005a', '', ''),
(103, 'Dominique', 'Perrier', 'DominiquePerrier', 'Dominique@Perrier', '8eeaced1f2e0dfc753cc11e63b5abc12', '', ''),
(104, 'Rita ', 'Müller', 'Rita Müller', 'Rita @Müller', 'ebf6a6a1870cf2c0922fa97fc3743c3f', '', 'block'),
(105, 'Sarah', 'McRoy', 'SarahMcRoy', 'Sarah@McRoy', '28e5481a80aa2bd18c8cf35d0495980a', '', ''),
(106, 'Michael', 'Donnermeyer', 'MichaelDonnermeyer', 'Michael@Donnermeyer', '3e06fa3927cbdf4e9d93ba4541acce86', '', ''),
(107, 'Maria', 'Hernandez', 'MariaHernandez', 'Maria@Hernandez', 'cbc19b07662418d5f14cc55657295924', '', ''),
(108, 'Alexander ', 'Feuer', 'Alexander Feuer', 'Alexander @Feuer', 'e94377dc2a9cabd16fa3da5fe7049483', '', ''),
(109, 'Dan', 'Lewis', 'DanLewis', 'Dan@Lewis', '97c8e6d0d14f4e242c3c37af68cc376c', '', ''),
(110, 'Martha', 'Larsson', 'MarthaLarsson', 'Martha@Larsson', 'b4f89f6fa827db5b3ec395059765c714', '', ''),
(111, 'Sue', 'Frick', 'SueFrick', 'Sue@Frick', '4eec8ecba9d91f00de594fa5267d1c88', '', ''),
(112, 'Roland ', 'Mendel', 'Roland Mendel', 'Roland @Mendel', '1f227c72f3d205c1a118952bd259eeb9', '', 'block'),
(113, 'Leslie', 'Murphy', 'LeslieMurphy', 'Leslie@Murphy', '79338f7567adbd87a70fdacd50a980e0', '', ''),
(114, 'Yu', 'Choi', 'YuChoi', 'Yu@Choi', '0af2884fd29ac4bed46fc56851d95768', '', ''),
(115, 'Martín ', 'Sommer', 'Martín Sommer', 'Martín @Sommer', '028b1d39c25e17f87eb1c5967886ea66', '', ''),
(116, 'Sven ', 'Ottlieb', 'Sven Ottlieb', 'Sven @Ottlieb', '5581e2eaee065e1c2dc6361a27916c6a', '', ''),
(117, 'Violeta', 'Benitez', 'VioletaBenitez', 'Violeta@Benitez', '1ebd356ce740fd46d0fcffb2e8e94988', '', ''),
(118, 'Carmen', 'Anton', 'CarmenAnton', 'Carmen@Anton', '7641b5b1c7276c07e11f9cb5b74ddfc9', '', ''),
(119, 'Sean', 'Clenahan', 'SeanClenahan', 'Sean@Clenahan', '40d18d5a7ae85f9597a40f1306041fd1', '', ''),
(120, 'Franco', 'Ricotti', 'FrancoRicotti', 'Franco@Ricotti', '99d2470a3073b4a570031f75896c6ac6', '', ''),
(121, 'Steve', 'Thompson', 'SteveThompson', 'Steve@Thompson', '81b8a1b77068d06e1c8190825253066f', '', ''),
(122, 'Hanna ', 'Moos', 'Hanna Moos', 'Hanna @Moos', '2b690749c7b699990636b17629f33168', '', ''),
(123, 'Alexander ', 'Semenov', 'Alexander Semenov', 'Alexander @Semenov', 'e94377dc2a9cabd16fa3da5fe7049483', '', ''),
(124, 'Raanan', 'Altagar,G M', 'RaananAltagar,G M', 'Raanan@Altagar,G M', 'b9176d8e6876ad232f1cd07cc94e37b2', '', ''),
(125, 'José Pedro ', 'Roel', 'José Pedro Roel', 'José Pedro @Roel', 'a37256674f24c956a8cad4e61e2b61ff', '', ''),
(126, 'Rosa', 'Salazar', 'RosaSalazar', 'Rosa@Salazar', '0856a4aa9c78d62f643a04c64bab47f2', '', ''),
(127, 'Sue', 'Taylor', 'SueTaylor', 'Sue@Taylor', '4eec8ecba9d91f00de594fa5267d1c88', '', ''),
(128, 'Thomas ', 'Smith', 'Thomas Smith', 'Thomas @Smith', '381ab82c5e41c0d15eaa04e385676e0b', '', ''),
(129, 'Valarie', 'Franco', 'ValarieFranco', 'Valarie@Franco', '991470aff2d666b8b5094e0b32b69338', '', ''),
(130, 'Tony', 'Snowden', 'TonySnowden', 'Tony@Snowden', 'eee7ac208064d408e84ab5e26d24b278', '', ''),
(131, 'shubham', 'jyoti', 'shubham Jyoti', 'shubham@jyoti', '903ce9225fca3e988c2af215d4e544d3', '', ''),
(132, 'mahi ', 'mahajan ', 'mahi mahajan', 'mahi@mahajan', '202cb962ac59075b964b07152d234b70', 'deactivate', ''),
(133, 'mitin', 'kumar', 'mitin Kumar', 'mitin@kumar.com', '202cb962ac59075b964b07152d234b70', 'activate', ''),
(134, 'Fiorst', 'Martine RancÃ©', 'username-modified', 'test-modified@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'activate', ''),
(135, 'Fiorst', 'Martine Rancé', 'username', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'activate', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
