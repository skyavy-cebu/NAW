-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2012 at 06:45 AM
-- Server version: 5.5.16-log
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sf_naw`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 5, 'Los Angeles', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 5, 'San Diego', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 5, 'San Francisco', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 43, 'Houston', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 43, 'San Antonio', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 43, 'Dallas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 43, 'Texas City', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text,
  `event_date` datetime DEFAULT NULL,
  `city_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `venue` varchar(150) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `prepay_slots` smallint(5) unsigned NOT NULL DEFAULT '0',
  `max_capacity` smallint(5) unsigned NOT NULL DEFAULT '0',
  `admission_prepay` decimal(18,2) NOT NULL DEFAULT '0.00',
  `admission_at_door` decimal(18,2) NOT NULL DEFAULT '0.00',
  `admission_no_rsvp` decimal(18,2) NOT NULL DEFAULT '0.00',
  `image_full` varchar(150) NOT NULL,
  `image_small` varchar(150) NOT NULL,
  `event_admin1` int(10) unsigned NOT NULL DEFAULT '0',
  `event_admin2` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `event_date`, `city_id`, `venue`, `address`, `prepay_slots`, `max_capacity`, `admission_prepay`, `admission_at_door`, `admission_no_rsvp`, `image_full`, `image_small`, `event_admin1`, `event_admin2`, `created_at`, `updated_at`) VALUES
(1, 'Thaddy''s 1st Birthday', 'This is description of the events blah blah blah weeee', '2012-11-12 00:00:00', 1, '', 'Falcon Lounge', 0, 0, '0.00', '0.00', '0.00', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_attendee`
--

DROP TABLE IF EXISTS `event_attendee`;
CREATE TABLE IF NOT EXISTS `event_attendee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `industry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `paid` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

DROP TABLE IF EXISTS `industry`;
CREATE TABLE IF NOT EXISTS `industry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accounting', '2012-10-25 06:28:07', '2012-10-25 06:28:07'),
(2, 'Legal', '2012-10-25 06:29:12', '2012-10-25 06:29:22'),
(3, 'Small Business', '2012-10-25 06:30:05', '2012-10-25 06:30:05'),
(4, 'Sales', '2012-10-25 06:30:13', '2012-10-25 06:30:13'),
(5, 'Advertising', '2012-10-25 06:30:25', '2012-10-25 06:30:25'),
(6, 'Web Design', '2012-10-25 06:30:37', '2012-10-25 06:30:37'),
(7, 'Education', '2012-10-25 06:30:47', '2012-10-25 06:30:47'),
(8, 'IT', '2012-10-25 06:30:54', '2012-10-25 06:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `post_date` datetime NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text,
  `image_full` varchar(150) NOT NULL,
  `image_small` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `post_date`, `title`, `content`, `image_full`, `image_small`, `created_at`, `updated_at`) VALUES
(1, '2012-11-09 20:19:15', 'Network After Work is now hosting events in San Diego!', ' 	Nulla egestas ultrices pharetra. Praesent tempor ultrices arcu vitae auctor. Cras et ligula libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mollis libero a nulla viverra vestibulum. Proin viverra tristique libero sed fermentum. Nunc at orci id felis dictum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla at velit nunc, eu aliquet odio. Donec quam mi, commodo ut fermentum et, laoreet sit amet felis. Aliquam consectetur est id nibh viverra molestie. Duis semper eleifend volutpat. Vivamus molestie pharetra risus, vitae vehicula nisl pretium at. Suspendisse bibendum rhoncus gravida. ', '', '', '2012-11-08 00:00:00', '0000-00-00 00:00:00'),
(2, '2012-11-06 10:09:23', 'Mauris mollis libero a nulla viverra vestibulum', ' 	Nulla egestas ultrices pharetra. Praesent tempor ultrices arcu vitae auctor. Cras et ligula libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mollis libero a nulla viverra vestibulum. Proin viverra tristique libero sed fermentum. Nunc at orci id felis dictum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla at velit nunc, eu aliquet odio. Donec quam mi, commodo ut fermentum et, laoreet sit amet felis. Aliquam consectetur est id nibh viverra molestie. Duis semper eleifend volutpat. Vivamus molestie pharetra risus, vitae vehicula nisl pretium at. Suspendisse bibendum rhoncus gravida. ', '', '', '2012-11-07 00:00:00', '0000-00-00 00:00:00'),
(3, '2012-11-07 07:27:10', 'Duis semper eleifend volutpat', ' 	Nulla egestas ultrices pharetra. Praesent tempor ultrices arcu vitae auctor. Cras et ligula libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mollis libero a nulla viverra vestibulum. Proin viverra tristique libero sed fermentum. Nunc at orci id felis dictum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla at velit nunc, eu aliquet odio. Donec quam mi, commodo ut fermentum et, laoreet sit amet felis. Aliquam consectetur est id nibh viverra molestie. Duis semper eleifend volutpat. Vivamus molestie pharetra risus, vitae vehicula nisl pretium at. Suspendisse bibendum rhoncus gravida. ', '', '', '2012-11-05 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(5) NOT NULL,
  `company` varchar(150) NOT NULL,
  `state_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `city_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `address` varchar(255) NOT NULL,
  `ido` text,
  `to_meet` text,
  `image_full` varchar(150) NOT NULL,
  `image_small` varchar(150) NOT NULL,
  `linkedin_url` varchar(150) NOT NULL,
  `fb_url` varchar(150) NOT NULL,
  `twitter_url` varchar(150) NOT NULL,
  `olio_url` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `title`, `company`, `state_id`, `city_id`, `address`, `ido`, `to_meet`, `image_full`, `image_small`, `linkedin_url`, `fb_url`, `twitter_url`, `olio_url`, `created_at`, `updated_at`) VALUES
(6, 'AM', 'Forty Degrees Celsius', 43, 4, 'B. Rodriguez Street, Cebu City', 'Nulla egestas ultrices pharetra. Praesent tempor ultrices arcu vitae auctor. Cras et ligula libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mollis libero a nulla viverra vestibulum. Proin viverra tristique libero sed fermentum. Nunc at orci id felis dictum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla at velit nunc, eu aliquet odio. Donec quam mi, commodo ut fermentum et, laoreet sit amet felis. Aliquam consectetur est id nibh viverra molestie. Duis semper eleifend volutpat. Vivamus molestie pharetra risus, vitae vehicula nisl pretium at. Suspendisse bibendum rhoncus gravida.', 'Nulla egestas ultrices pharetra. Praesent tempor ultrices arcu vitae auctor. Cras et ligula libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mollis libero a nulla viverra vestibulum. Proin viverra tristique libero sed fermentum. Nunc at orci id felis dictum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla at velit nunc, eu aliquet odio. Donec quam mi, commodo ut fermentum et, laoreet sit amet felis. Aliquam consectetur est id nibh viverra molestie. Duis semper eleifend volutpat. Vivamus molestie pharetra risus, vitae vehicula nisl pretium at. Suspendisse bibendum rhoncus gravida.', '4uDEnc3Wy5p_.jpg', '4uDEnc3Wy5p__thumb.jpg', 'http://www.linkedin.com/pub/jerry-bwoy/5a/851/93b', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.twitter2.com', '2012-10-29 01:58:16', '2012-11-09 06:42:35'),
(10, '', '', 0, 0, 'Shibuya, Tokyo', 'I can wiggle my ears. (without touching them of course)\nMy upper and lower teeth don''t touch in front so when I bite down, there''s a gap about the width of my pinky.\nI sleep flat on my back with a pillow underneath my legs (it''s good for your back), with my arms on my chest. Some have observed that while sleeping I resemble a mummy.\nMy name was initially going to be Dale but it was changed to Daniel while I was still in the hospital.\nI can walk on my hands.', NULL, '4uDEnc3Wy5p6YQ.jpg', '4uDEnc3Wy5p6YQ_thumb.jpg', '', 'http://www.facebook.com/jerry.bwoy.3', '', '', '2012-10-29 03:39:03', '2012-10-29 03:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `profile_industry`
--

DROP TABLE IF EXISTS `profile_industry`;
CREATE TABLE IF NOT EXISTS `profile_industry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `industry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type_id` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=my industry, 1=industries I want to meet',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `profile_industry`
--

INSERT INTO `profile_industry` (`id`, `user_id`, `industry_id`, `type_id`, `created_at`, `updated_at`) VALUES
(138, 6, 1, '0', '2012-11-12 05:25:35', '2012-11-12 05:25:35'),
(139, 6, 2, '0', '2012-11-12 05:25:35', '2012-11-12 05:25:35'),
(140, 6, 1, '1', '2012-11-12 05:25:35', '2012-11-12 05:25:35'),
(141, 6, 2, '1', '2012-11-12 05:25:35', '2012-11-12 05:25:35'),
(142, 6, 3, '1', '2012-11-12 05:25:35', '2012-11-12 05:25:35'),
(143, 6, 6, '1', '2012-11-12 05:25:35', '2012-11-12 05:25:35'),
(144, 6, 8, '1', '2012-11-12 05:25:36', '2012-11-12 05:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
CREATE TABLE IF NOT EXISTS `sponsor` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(1) NOT NULL,
  `company` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL,
  `status_id` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id`, `position`, `company`, `image`, `url`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'A', 'Clear', 'sponsors_1.png', 'http://ww.yelp.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'B', 'Heavy Water', 'sponsors_2.png', 'http://ww.yelp.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'C', 'Red Door Spas', 'sponsors_3.png', 'http://ww.yelp.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'D', 'Kind Healthy Snacks', 'sponsors_4.png', 'http://ww.yelp.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'E', 'Yes', 'sponsors_5.png', 'http://ww.yelp.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'F', 'Verizon Wireless', 'sponsors_6.png', 'http://ww.yelp.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AL', 'Alabama', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'AK', 'Alaska', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'AZ', 'Arizona', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'AR', 'Arkansas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'CA', 'California', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'CO', 'Colorado', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'CT', 'Connecticut', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'DE', 'Delaware', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'FL', 'Florida', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'GA', 'Georgia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'HI', 'Hawaii', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'ID', 'Idaho', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'IL', 'Illinois', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'IN', 'Indiana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'IA', 'Iowa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'KS', 'Kansas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'KY', 'Kentucky', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'LA', 'Louisiana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'ME', 'Maine', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'MD', 'Maryland', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'MA', 'Massachusetts', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'MI', 'Michigan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'MN', 'Minnesota', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'MS', 'Mississippi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'MO', 'Missouri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'MT', 'Montana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'NE', 'Nebraska', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'NV', 'Nevada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'NH', 'New Hampshire', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'NJ', 'New Jersey', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'NM', 'New Mexico', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'NY', 'New York', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'NC', 'North Carolina', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'ND', 'North Dakota', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'OH', 'Ohio', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'OK', 'Oklahoma', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'OR', 'Oregon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'PA', 'Pennsylvania', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'RI', 'Rhode Island', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'SC', 'South Carolina', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'SD', 'South Dakota', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'TN', 'Tennessee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'TX', 'Texas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'UT', 'Utah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'VT', 'Vermont', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'VA', 'Virginia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'WA', 'Washington', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'WV', 'West Virginia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'WI', 'Wisconsin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `dob` date DEFAULT NULL,
  `type_id` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=normal, 1=admin',
  `app_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0=normal, 1=fb, 2=linkin',
  `app_id` varchar(150) NOT NULL,
  `activation` varchar(150) NOT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `fname`, `lname`, `dob`, `type_id`, `app_type`, `app_id`, `activation`, `last_login_at`, `active`, `created_at`, `updated_at`) VALUES
(6, 'jerrybwoy1@gmail.com', '67ca51a65c6caefc73392f26e7cc934d', 'Jerry', 'Bwoy1', '1976-01-17', '0', 0, '', '', NULL, '1', '2012-10-29 01:58:16', '2012-11-07 08:27:50'),
(10, 'jerrybwoy@gmail.com', '', 'Jerry', 'Bwoy', '1990-06-24', '0', 1, '100004221753392', '', NULL, '1', '2012-10-29 03:39:03', '2012-10-29 03:39:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
