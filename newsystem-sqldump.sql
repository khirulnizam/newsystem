-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for newsystem
CREATE DATABASE IF NOT EXISTS `newsystem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `newsystem`;

-- Dumping structure for table newsystem.activities
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityname` varchar(50) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `speaker` varchar(50) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.activities: ~2 rows (approximately)
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` (`id`, `activityname`, `time`, `date`, `speaker`, `userid`) VALUES
	(1, 'wewwe', '16:05:00', '2020-09-03', 'Ali', 3),
	(2, 'masak bubur lambuk', '22:55:00', '2020-09-24', 'Tan Sri Farid', 3);
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;

-- Dumping structure for table newsystem.insts
CREATE TABLE IF NOT EXISTS `insts` (
  `institution_code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` blob,
  PRIMARY KEY (`institution_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.insts: ~5 rows (approximately)
/*!40000 ALTER TABLE `insts` DISABLE KEYS */;
INSERT INTO `insts` (`institution_code`, `name`, `address`) VALUES
	('KUIS', 'Kolej Universiti Islam Selangor', _binary 0x42616E64617220536572692050757472612C204B616A616E672C2053656C616E676F72),
	('MMU', 'Multimedia Universiti', _binary 0x43796265726A6179612C204D616C6179736961),
	('UKM', 'Universiti Kebangsaan Malaysia', _binary 0x42616E67692C204B616A616E672C2053656C616E676F72),
	('UM', 'Universiti Malaya', _binary 0x3530363033204B75616C61204C756D7075722C204D616C6179736961),
	('USIM', 'Universiti Sains Islam Malaysia', _binary 0x4E696C61692C204E65676572692053656D62696C616E2C204D616C6179736961);
/*!40000 ALTER TABLE `insts` ENABLE KEYS */;

-- Dumping structure for table newsystem.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodjbtn` varchar(50) NOT NULL,
  `namajbtn` varchar(50) DEFAULT NULL,
  `ketuajbtn` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodjbtn`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.jabatan: ~2 rows (approximately)
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` (`id`, `kodjbtn`, `namajbtn`, `ketuajbtn`) VALUES
	(3, 'JKKT', 'Jabatan Kemahiran Kursus Teras', 'Siti Noor'),
	(2, 'JMM', 'Jabatan Multimedia', 'Nurul Ibtisam'),
	(1, 'JSK', 'Jabatan Sains Komputer', 'Khirulnizam');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table newsystem.mentors
CREATE TABLE IF NOT EXISTS `mentors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentorname` varchar(100) DEFAULT NULL,
  `dept` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.mentors: ~0 rows (approximately)
/*!40000 ALTER TABLE `mentors` DISABLE KEYS */;
/*!40000 ALTER TABLE `mentors` ENABLE KEYS */;

-- Dumping structure for table newsystem.papers
CREATE TABLE IF NOT EXISTS `papers` (
  `id` varchar(6) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `institution_code` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `abstract` blob,
  `keywords` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.papers: ~3 rows (approximately)
/*!40000 ALTER TABLE `papers` DISABLE KEYS */;
INSERT INTO `papers` (`id`, `title`, `author`, `institution_code`, `email`, `abstract`, `keywords`) VALUES
	('ITS002', 'Students\' Attitude towards Focused Educational Video', 'Sazanah Mohd Ali', 'KUIS', 'sazanah@kuis.edu.my', _binary 0x41627374726163743A20546869732073747564792069732061696D656420746F20616E616C797365207468652070737963686F6C6F676963616C20666163746F72732C20736F6369616C2C20746563686E6F6C6F676963616C20616E64, 'Focused educational video sharing site, YouTube, TAM, New media'),
	('ITS015', 'Financial News Sentiment Analysis Using LexiconBased Web Labelling and Machine Learning-Based', 'Ling Wu', 'UM', 'wuling@siswa.um.edu.my', _binary 0x41627374726163742E2046696E616E6369616C206E6577732073656E74696D656E74206861732073686F776E20677265617420696E666C75656E6365206F6E2073746F636B206D61726B6574, 'Financial News Sentiment, Lexicon-based Labelling, Machine Learningbased Algorithm'),
	('ITS022', 'A Website Builder for Mosque and Surau: Towards A Secured and Standardized Platform', 'Zarina Che Embi', 'MMU', 'zarina.embi@mmu.edu.my', _binary 0x41627374726163742E204D75736C696D20636F6D6D756E69747920686173206869676820636F6E6E65637469766974792077697468207468652068656C70206F66206D6F6465726E, 'Muslim, ICT, website builder, community, technology, community,');
/*!40000 ALTER TABLE `papers` ENABLE KEYS */;

-- Dumping structure for table newsystem.pelajar
CREATE TABLE IF NOT EXISTS `pelajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namapelajar` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `nomatrix` varchar(10) NOT NULL,
  `noic` varchar(12) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`nomatrix`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.pelajar: ~9 rows (approximately)
/*!40000 ALTER TABLE `pelajar` DISABLE KEYS */;
INSERT INTO `pelajar` (`id`, `namapelajar`, `alamat`, `nomatrix`, `noic`, `dob`) VALUES
	(1, 'Ali ABbu', 'Bangi', '012345', '', NULL),
	(2, 'Ali Ahmad', 'Kuala Selangor', '012346', '', NULL),
	(3, 'Amirul Farhan', 'Kajang', '012347', '', NULL),
	(4, 'Amirul Nizar', 'Seremban', '012348', '', NULL),
	(5, 'Mohamad Ali', 'Kajang', '012349', '', NULL),
	(6, 'Mohamad Carian', 'Bukit Cari', '012350', '', NULL),
	(7, 'Mohamad Ali Khan', 'Nilai', '123466', '', NULL),
	(9, 'Ali Ahmad', 'Nilai', '123470', '', NULL),
	(10, 'Aminah Hassan', 'Muar, Johor', '123471', '030303030303', '2021-08-31'),
	(11, 'Ali Ahmad Hanafi', 'Bangi', '123473', NULL, NULL),
	(12, 'Ridhwan', 'Banting', '123480', NULL, NULL);
/*!40000 ALTER TABLE `pelajar` ENABLE KEYS */;

-- Dumping structure for table newsystem.programs
CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programcode` varchar(6) NOT NULL DEFAULT '0',
  `programname` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.programs: ~5 rows (approximately)
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` (`id`, `programcode`, `programname`) VALUES
	(1, 'MS36', 'Diploma in Multimedia'),
	(2, 'MS39', 'Diploma in Computer Science'),
	(3, 'BT01', 'Bach. Creative Multimedia'),
	(4, 'BT02', 'Bach. Networking Technology'),
	(5, 'BT05', 'Bach. Info System');
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;

-- Dumping structure for table newsystem.shortcourses
CREATE TABLE IF NOT EXISTS `shortcourses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sccode` varchar(10) NOT NULL,
  `sctitle` varchar(100) DEFAULT NULL,
  `scdesc` varchar(200) DEFAULT NULL,
  `sctrainer` varchar(100) DEFAULT NULL,
  `scdate` date DEFAULT NULL,
  `sctime` time DEFAULT NULL,
  PRIMARY KEY (`sccode`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.shortcourses: ~6 rows (approximately)
/*!40000 ALTER TABLE `shortcourses` DISABLE KEYS */;
INSERT INTO `shortcourses` (`id`, `sccode`, `sctitle`, `scdesc`, `sctrainer`, `scdate`, `sctime`) VALUES
	(4, 'CV01', 'Canva Graphic Basics', 'Basics Graphic Editing Using Canva', 'MS', '2021-09-30', '09:00:00'),
	(5, 'CV02', 'Canva Intermediate', 'Intermediate Graphics Editing', 'MS', '2021-10-07', '09:00:00'),
	(1, 'FL01', 'Flutter Basics', 'Mobile development using Flutter and Android Studio', 'KN', '2021-10-07', '09:00:00'),
	(2, 'IN01', 'Ionic Basics', 'Mobile development using Ionic and VScode', 'KN', '2021-09-30', '09:00:00'),
	(3, 'LR01', 'Laravel Web', 'Web Developement using Laravel PHP Framework', 'KN', '2021-11-11', '09:00:00'),
	(6, 'MS01', 'MSWord Basics', 'Microsoft Office MSWord', 'CW', '2021-11-11', '09:00:00');
/*!40000 ALTER TABLE `shortcourses` ENABLE KEYS */;

-- Dumping structure for table newsystem.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `matrixno` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` blob,
  `dob` date DEFAULT NULL,
  `programcode` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.students: ~7 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `matrixno`, `name`, `address`, `dob`, `programcode`) VALUES
	(4, '123456', 'Khirulnizam Abd Rahman', _binary 0x42616E6769, '2000-03-28', 'MS36'),
	(5, '123457', 'Azman Ali', _binary 0x4E696C6169, '2000-11-24', 'MS39'),
	(6, '123458', 'Syarifah Rahman', _binary 0x536572656D62616E65, '2000-10-19', 'MS36'),
	(7, '123459', 'Aminah Hassan', _binary 0x4D656C616B61, '2000-03-10', 'MS39'),
	(8, '123460', 'Ali Bakar Abu', _binary 0x5061726F69, '2000-08-05', 'MS36'),
	(9, '123460', 'Amin bin Rahman', _binary 0x536572656D62616E, '2000-03-12', 'MS39'),
	(10, '123455', 'Abu Bakar Atan', _binary 0x4E696C61692C204E2E2053656D62696C616E, '2000-04-05', 'BT05');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table newsystem.students_register_scourses
CREATE TABLE IF NOT EXISTS `students_register_scourses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matrixno` varchar(10) NOT NULL,
  `sccode` varchar(10) NOT NULL,
  `datetimereg` datetime NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.students_register_scourses: ~5 rows (approximately)
/*!40000 ALTER TABLE `students_register_scourses` DISABLE KEYS */;
INSERT INTO `students_register_scourses` (`id`, `matrixno`, `sccode`, `datetimereg`) VALUES
	(1, '123455', 'CV02', '2021-09-07 14:18:45'),
	(2, '123455', 'FL01', '2021-09-07 14:18:45'),
	(3, '123456', 'FL01', '2021-09-07 14:32:38'),
	(4, '123456', 'IN01', '2021-09-07 14:32:38'),
	(5, '123456', 'LR01', '2021-09-07 14:32:38');
/*!40000 ALTER TABLE `students_register_scourses` ENABLE KEYS */;

-- Dumping structure for table newsystem.students_result
CREATE TABLE IF NOT EXISTS `students_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matrixno` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.students_result: ~5 rows (approximately)
/*!40000 ALTER TABLE `students_result` DISABLE KEYS */;
INSERT INTO `students_result` (`id`, `matrixno`, `name`, `mark`) VALUES
	(1, '123', 'amin', 69),
	(2, '234', 'iman', 96),
	(3, '345', 'muna', 100),
	(4, '345', 'minah', 49),
	(5, '543', 'ahmad', 31);
/*!40000 ALTER TABLE `students_result` ENABLE KEYS */;

-- Dumping structure for table newsystem.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profileimage` varchar(255) DEFAULT NULL,
  `accesslevel` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table newsystem.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`, `profileimage`, `accesslevel`, `fullname`) VALUES
	(2, 'ali', 'ali@gmail.com', '984d8144fa08bfc637d2825463e184fa', NULL, 'guest', 'Ali bin Ahmad'),
	(1, 'kerul', 'kerul@gmail.com', 'e99a18c428cb38d5f260853678922e03', NULL, 'admin', 'Khirulnizam Abd Rahman'),
	(4, 'khirul', 'khirulnizam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin', 'Khirulnizam'),
	(3, 'mutu', 'mutu@gmail.com', 'd45d1570a1d9fd458fd192f180944948', NULL, 'admin', 'Ilmu Mutu dan Budi');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
