-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2013 at 06:10 
-- Server version: 5.6.12
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_vidshare`
--
CREATE DATABASE IF NOT EXISTS `db_vidshare` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_vidshare`;

-- --------------------------------------------------------

--
-- Table structure for table `appbanners`
--

CREATE TABLE IF NOT EXISTS `appbanners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` int(11) DEFAULT NULL,
  `banner_url` varchar(255) DEFAULT NULL,
  `banner_title` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `enabled` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `appbanners`
--

INSERT INTO `appbanners` (`id`, `app_id`, `banner_url`, `banner_title`, `link`, `enabled`) VALUES
(1, 1, 'http://videoshare.loveworldapis.com/lwappconsole/banners/bnr_PastorChrisDigitalLibrabry.jpg', 'Pastor Chris Digital Library', 'http://videoshare.loveworldapis.com/lwappconsole/apks/PastorChrisDigitalLibrary.apk', 1),
(2, 2, 'http://videoshare.loveworldapis.com/lwappconsole/banners/bnr_LiveTvMobile20.jpg', 'Live TV Mobile 2.0', 'http://videoshare.loveworldapis.com/lwappconsole/apks/LiveTvMobile20.apk', 1),
(3, 3, 'http://videoshare.loveworldapis.com/lwappconsole/banners/bnr_LoveWorldSat.jpeg', 'LoveWorld SAT', 'http://videoshare.loveworldapis.com/lwappconsole/apks/LoveWorldSAT.apk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_name` varchar(100) NOT NULL,
  `version` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `ave_rating` decimal(4,2) NOT NULL,
  `crashes` int(11) NOT NULL,
  `upd_time` int(11) NOT NULL,
  `installs` int(11) NOT NULL,
  `install_time` int(11) NOT NULL,
  `apk_path` varchar(100) NOT NULL,
  `icon_path` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `dev_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `trend` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `app_name`, `version`, `description`, `package_name`, `cat_id`, `price`, `ave_rating`, `crashes`, `upd_time`, `installs`, `install_time`, `apk_path`, `icon_path`, `website`, `dev_id`, `status`, `trend`) VALUES
(1, 'Pastor Chris Digital Library', '1.2', 'Through an anointed ministry spanning over 30 years, Pastor, Teacher, Healing Minister, Television Host, and Best Selling Author, Chris Oyakhilome Ph.D has helped millions experience a victorious and purposeful life in God''s Word.\r\n\r\nThe Pastor Chris Digital Library is a mobile platform that let''s you purchase audio and video messages by Pastor Chris, spanning various life issues, such as Healing and Health, Faith, Christian Living, Fellowship with the Holy Spirit, Prayer, Prosperity and Finance right on your Android device.\r\n\r\nDownload messages you''ve successfully purchased straight to your Android device and have all the messages you''ve purchased synced to all your other Android devices when you sign into the app on them.\r\n\r\nYou can also get special notifications for newly published messages of Pastor Chris, and receive alerts on other freebies such as special offers, discounts, and lots more.', 'org.lwnm.digitallib', 1, 0.00, '0.00', 0, 1214748364, 0, 31281198, 'http://videoshare.loveworldapis.com/lwappconsole/apks/PastorChrisDigitalLibrary.apk', 'http://videoshare.loveworldapis.com/lwappconsole/icons/icon_PastorChrisDigitalLibrary.png', '', 2, 1, 1),
(2, 'Live TV Mobile 2.0', '0', 'Watch live streaming of LoveWorld SAT, LoveWorld PLUS and LoveWorld TV', '0', 1, 0.00, '0.00', 0, 1386149015, 0, 0, 'http://videoshare.loveworldapis.com/lwappconsole/apks/LiveTvMobile20.apk', 'http://videoshare.loveworldapis.com/lwappconsole/icons/icon_LiveTvMobile20.png', '', 2, 1, 0),
(3, 'LoveWorld SAT Mobile', '0', 'The LoveWorld Sat App is a very resourceful and on-demand mobile application developed to deliver the TV experience of the LoveWorld Sat satellite station to you on the GO. Watch live streams from the station, participate in TV programs of your choice, send iReport of happenings around you and have it make the news, and enjoy real time TV experience with the LoveWorld Sat App. What are you still waiting for, get it now !!', '0', 2, 0.00, '0.00', 0, 615135838, 0, 138388516, 'http://videoshare.loveworldapis.com/lwappconsole/apks/LoveWorldSat.apk', 'http://videoshare.loveworldapis.com/lwappconsole/icons/icon_LoveWorldSat.png', '', 3, 1, 1),
(4, 'Global Congregation Mobile App', '0', 'A complete content-delivery mobile, application designed to seamlessly deliver the live streaming services of Pastor Chris to your mobile devices. With its specially built-in Live Feed feature,users also have the opportunity to access live feeds from top news agencies Yookos, as well as subscribe to limitless feeds and pod cast of their choice. The Global Congregation application is a package of experience extraordinare`, get yours now!!', '0', 2, 0.00, '0.00', 0, 1386073211, 0, 0, 'http://videoshare.loveworldapis.com/lwappconsole/apks/GlobalCongregation.apk', 'http://videoshare.loveworldapis.com/lwappconsole/icons/icon_GlobalCongregationMobileApp.png', '', 3, 1, 1),
(5, 'Pastor Chris Online', '0', 'The Official Pastor Chris Online application for Android devices.', '0', 1, 0.00, '0.00', 0, 1385404320, 0, 0, 'http://videoshare.loveworldapis.com/lwappconsole/apks/PastorChrisOnline.apk', 'http://videoshare.loveworldapis.com/lwappconsole/icons/icon_PastorChrisOnline.jpg', '', 2, 1, 1),
(6, 'BLW Teens Mobile', '0', 'Welcome to the world of champions! This launcher gives you access to the BLW Teens Ministry portal. Get inspired by the activities of teens all over the world as they minister the gospel of Jesus to other teenagers in their world. Read reports, watch edifying videos, get up-to-date information from the BLW Teens Ministry, and lots more!', '0', 5, 0.00, '0.00', 0, 1385402643, 0, 0, 'http://videoshare.loveworldapis.com/lwappconsole/apks/BLWTeensMobile.apk', 'http://videoshare.loveworldapis.com/lwappconsole/icons/icon_BLWTeensMobile.jpg', '', 2, 1, 0),
(7, 'Thought For Today', '0', 'A very resourceful application developed to bring to you inspirational articles from the man of God Pastor Chris Oyakhilome Ph.D.and to inspire in you Word-based thoughts that will cause you to walk in line with monthly prophetic words from God. This application offers you the opportunity to have access to inspirational and soul lifting articles, make comments on articles of your choice, view comments on articles from other users, share any article of your choice on Facebook and Twitter, and receive prompt notifications when a new article is posted, translate the articles into 5 different languages. The "Thought for Today" application is indeed a must have!!', '0', 21, 0.00, '0.00', 0, 1386091172, 0, 0, 'http://videoshare.loveworldapis.com/lwappconsole/apks/ThoughtForToday.apk', 'http://videoshare.loveworldapis.com/lwappconsole/icons/icon_ThoughtForToday.png', '', 3, 1, 0),
(8, 'BLW Partners App', '0', '', '0', 9, 0.00, '0.00', 0, 1386087000, 0, 0, 'http://videoshare.loveworldapis.com/lwappconsole/apks/BLWPartnersApp.apk', 'http://videoshare.loveworldapis.com/lwappconsole/icons/icon_BLWPartnersApp.png', '', 3, 0, 0),
(9, 'Standard Charter', '', '', '', 8, 0.00, '0.00', 0, 1386778485, 0, 0, 'http://videoshare.loveworldapis.com/lwappconsole/apks/StandardCharter.apk', 'http://videoshare.loveworldapis.com/lwappconsole/icons/icon_StandardCharter.jpg', '', 2, 1, 0),
(10, 'Precious App', '', '', '', 13, 0.00, '0.00', 0, 1386778676, 0, 0, 'http://videoshare.loveworldapis.com/lwappconsole/apks/PreciousApp.apk', 'http://videoshare.loveworldapis.com/lwappconsole/icons/icon_PreciousApp.jpg', '', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `description`) VALUES
(1, 'Comics', ''),
(2, 'Communications', ''),
(3, 'Finance', ''),
(4, 'Health &amp; Fitness', ''),
(5, 'Medical', ''),
(6, 'Lifestyle', ''),
(7, 'Media &amp; Video', ''),
(8, 'Music &amp; Audio', ''),
(9, 'Photography', ''),
(10, 'News &amp; Magazines', ''),
(11, 'Weather', ''),
(12, 'Productivity', ''),
(13, 'Business', ''),
(14, 'Books &amp; Reference', ''),
(15, 'Education', ''),
(16, 'Shopping', ''),
(17, 'Social', ''),
(18, 'Sports', ''),
(19, 'Personalization', ''),
(20, 'Travel &amp; Local', ''),
(21, 'Libraries &amp; Demo', ''),
(22, 'Religious', ''),
(23, 'Programs &amp; Conferences', '');

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE IF NOT EXISTS `developers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pass_hash` int(32) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `name`, `email`, `phone`, `address`, `country`, `state`, `city`, `pass_hash`, `level`) VALUES
(1, 'Seyi', 'seyiakadri@gmail.com', '+2348053266089', 'seyi 1', 'Nigeria', 'Lagos', 'Lagos', 42, 0),
(2, 'Petrelli Studios', 'peter-ojo@hotmail.com', '08000220022', 'Kingstown Estate', 'United Kingdom', 'London', 'Ealing', 5, 0),
(3, 'Mavin', 'mavin@int.com', '09090909090', 'The place of life', 'Belgium', 'Brussels', 'Brussels', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE IF NOT EXISTS `downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL,
  `d_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `summary` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `time_posted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `app_id`, `user`, `summary`, `message`, `rating`, `time_posted`) VALUES
(1, 1, 'Peter', 'peter-ojo@hotmail.com', 'I love this application, it makes me feel good', 0, 156318154),
(2, 1, 'Paul', 'paul@mosugu.osebi', 'Me too walahi, it''s really good', 0, 635168881),
(3, 0, '', '', '', 0, 1379261204),
(4, 4, 'Petros', 'Great app!!', 'Wow!! this version is off the hook', 0, 1379261682),
(5, 3, 'Henry Ford', 'Love It!', 'I love this application so much', 0, 1383579537),
(6, 3, 'Jacob Mellis', 'Love It Too!', 'Me too @Henry', 0, 1383579573),
(7, 1, '', 'Nice', 'Good work', 0, 1385289348),
(8, 1, '', 'Nice', 'Really Nice app', 0, 1385289465),
(9, 2, '', 'Nice', 'Really Nice app', 0, 1385289623),
(10, 2, '', 'Nice', 'Really Nice app', 0, 1385289685),
(11, 1, '', 'Nice', 'really cool app', 0, 1385914266),
(12, 1, 'Sandeep', 'Nice', 'really cool app', 0, 1385914295),
(13, 1, 'Sandeep', 'Nice', 'really cool app', 0, 1385915144),
(14, 5, 'Test', '', 'NIce.........', 0, 1386006031),
(15, 1, 'Jon', '', 'NIce app..........', 0, 1386007152),
(16, 4, 'paul', '', 'lovely', 0, 1386064978);

-- --------------------------------------------------------

--
-- Table structure for table `screenshots`
--

CREATE TABLE IF NOT EXISTS `screenshots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `app_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `screenshots`
--

INSERT INTO `screenshots` (`id`, `name`, `app_id`) VALUES
(1, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/PastorChrisDigitalLibrary_1.png', 1),
(2, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/PastorChrisDigitalLibrary_2.jpg', 1),
(3, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/PastorChrisDigitalLibrary_3.jpg', 1),
(4, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/GlobalCongregation_1.png', 4),
(5, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/GlobalCongregation_2.png', 4),
(6, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/GlobalCongregation_3.png', 4),
(7, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/LoveWorldSat_1.jpg', 3),
(8, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/LoveWorldSat_2.jpg', 3),
(9, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/LoveWorldSat_3.jpg', 3),
(10, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/LiveTvMobile20_1.jpg', 2),
(11, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/LiveTvMobile20_2.jpg', 2),
(12, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/LiveTvMobile20_3.jpg', 2),
(13, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/PastorChrisOnline_1.jpg', 5),
(14, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/PastorChrisOnline_2.jpg', 5),
(15, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/PastorChrisOnline_3.jpg', 5),
(16, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/BLWTeensMobile_1.jpg', 6),
(17, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/BLWTeensMobile_2.jpg', 6),
(18, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/BLWTeensMobile_3.png', 6),
(19, 'ThoughtForToday_1.png', 7),
(20, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/BLWPartnersApp_1.png', 8),
(21, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/BLWPartnersApp_2.png', 8),
(22, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/BLWPartnersApp_3.png', 8),
(23, 'ThoughtForToday_2.png', 7),
(24, 'ThoughtForToday_3.png', 7),
(25, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/StandardCharter_1.png', 9),
(26, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/StandardCharter_2.png', 9),
(27, 'http://videoshare.loveworldapis.com/lwappconsole/screenshots/StandardCharter_3.png', 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
