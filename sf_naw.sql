-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2012 at 09:31 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
  `description` text,
  `event_date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `description`, `event_date`, `start_time`, `end_time`, `city_id`, `venue`, `address`, `prepay_slots`, `max_capacity`, `admission_prepay`, `admission_at_door`, `admission_no_rsvp`, `image_full`, `image_small`, `event_admin1`, `event_admin2`, `created_at`, `updated_at`) VALUES
(1, 'Hovsgol is just now opening its arms to travelers who come to catch and release taimen, giant salmonid “river wolves” that stalk Hovsgol’s waterways. Others come to ride Mongolian ponies in search of the Tsaatan, small bands of nomadic reindeer herders (above) who live in encampments and follow shamanistic beliefs.', '2012-11-12', '24:59:00', '00:00:00', 1, 'Chateau De Busay', 'Falcon Lounge', 0, 0, '0.00', '0.00', '0.00', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Dusk falls on a primeval landscape on the Snæfellsnes Peninsula. A final relic from the world’s last ice age, this North Atlantic island nation is a world of knife-cut valleys, gargantuan fjords, monumental cliffs, black-sand beaches, thundering waterfalls, and silent white glaciers. Recent volcanic eruptions remind us that Iceland is still a country in the making, with changed landscapes that even Icelanders continue to discover.', '2012-11-14', '00:00:00', '00:00:00', 2, 'Mactan Resort', 'sdfasdf asdf', 0, 0, '0.00', '0.00', '0.00', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Three years of financial recovery have made Iceland more affordable, with consumer prices now largely pegged to the euro. The country’s return to a humbler attitude stems from a thousand-year-old tradition of self-reliance—a tradition that has preserved one of the world’s oldest living languages and harnessed some of the cleanest energy on Earth.', '2012-11-13', '00:00:00', '00:00:00', 5, 'London', NULL, 0, 0, '0.00', '0.00', '0.00', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Crystal waters and pristine reefs surround the island. Up to 25 percent of the world’s tropical fish species swim in the protected waters around Koh Lipe (the island is in Tarutao National Marine Park). Pattaya Beach may be the island’s most developed tourist spot, but head to quieter Sunrise Beach, where a now settled community of “sea gypsies,” the Chao Lei, live and fish. Take in the view from Castaway Resort''s "chill-out deck," above.', '2012-11-13', '00:00:00', '00:00:00', 7, 'Barcelona', NULL, 0, 0, '0.00', '0.00', '0.00', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Dresden shone brightest in the 1700s, when the kings of Saxony spent their wealth to turn their capital into “Florence on the Elbe.” But in February 1945, two days of British and American bombing destroyed much of Dresden’s center and killed tens of thousands of civilians.', '2012-11-04', '00:00:00', '00:00:00', 6, 'Paris', NULL, 0, 0, '0.00', '0.00', '0.00', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Spend some time floating in an inner tube down the Russian River and walking amid ancient giants—one over 1,400 years old—at Armstrong Redwoods State Natural Reserve. Poke around the old Russian stockade at Fort Ross, which turns 200 in 2012, or the Spanish adobe mission, San Francisco Solano, in Sonoma town. Hunt for antiques along Petaluma’s downtown Victorian row, and dine on seasonal sake-steamed, aged abalone at Michelin-starred Cyrus in Healdsburg. And don’t miss a flaky, fruit-packed slice of Gravenstein pie from Mom’s Apple Pie, a roadside stop outside Sebastopol. It ranks up there with a Russian River Valley Pinot Noir as a real taste of Sonoma.', '2012-11-02', '00:00:00', '00:00:00', 4, 'New York City', NULL, 0, 0, '0.00', '0.00', '0.00', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'sdfsadfasdfasdfdasfdsaf sdfsadfsadf', '2012-11-13', '09:23:00', '13:23:00', 6, 'sdfasdf', 'dfdasfasf', 1, 20, '1.00', '1.00', '2.00', '', '', 0, 0, '2012-11-13 09:27:09', '2012-11-13 09:27:09'),
(12, 'Spend some time floating in an inner tube down the Russian River and walking amid ancient giants—one over 1,400 years old—at Armstrong Redwoods State Natural Reserve. Poke around the old Russian stockade at Fort Ross, which turns 200 in 2012, or the Spanish adobe mission, San Francisco Solano, in Sonoma town. Hunt for antiques along Petaluma’s downtown Victorian row, and dine on seasonal sake-steamed, aged abalone at Michelin-starred Cyrus in Healdsburg. And don’t miss a flaky, fruit-packed slice of Gravenstein pie from Mom’s Apple Pie, a roadside stop outside Sebastopol. It ranks up there with a Russian River Valley Pinot Noir as a real taste of Sonoma.', '2012-11-23', '00:00:00', '00:00:00', 4, 'New York City', 'asddfasdfadf', 0, 10, '0.00', '0.00', '0.00', '1-S6pdiXl58.jpg', '1-S6pdiXl58_thumb.jpg', 0, 0, '0000-00-00 00:00:00', '2012-11-16 08:13:45'),
(13, 'Hovsgol is just now opening its arms to travelers who come to catch and release taimen, giant salmonid “river wolves” that stalk Hovsgol’s waterways. Others come to ride Mongolian ponies in search of the Tsaatan, small bands of nomadic reindeer herders (above) who live in encampments and follow shamanistic beliefs.', '2012-11-17', '24:59:00', '00:00:00', 1, 'Chateau De Busay', 'Falcon Lounge', 0, 0, '0.00', '0.00', '0.00', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Spend some time floating in an inner tube down the Russian River and walking amid ancient giants—one over 1,400 years old—at Armstrong Redwoods State Natural Reserve. Poke around the old Russian stockade at Fort Ross, which turns 200 in 2012, or the Spanish adobe mission, San Francisco Solano, in Sonoma town. Hunt for antiques along Petaluma’s downtown Victorian row, and dine on seasonal sake-steamed, aged abalone at Michelin-starred Cyrus in Healdsburg. And don’t miss a flaky, fruit-packed slice of Gravenstein pie from Mom’s Apple Pie, a roadside stop outside Sebastopol. It ranks up there with a Russian River Valley Pinot Noir as a real taste of Sonoma.', '2012-11-23', '00:00:00', '00:00:00', 4, 'New York City', 'R. Duterte St. Banawa', 0, 25, '0.00', '0.00', '0.00', '1-S6pdiXl6E.jpg', '1-S6pdiXl6E_thumb.jpg', 0, 0, '2012-11-14 06:02:07', '2012-11-14 07:06:51'),
(15, '', '2012-11-14', '06:15:00', '10:15:00', 1, 'Larsian', 'Fuente', 0, 10, '0.00', '0.00', '0.00', '1-S6pdiXl6I.jpg', '1-S6pdiXl6I_thumb.jpg', 0, 0, '2012-11-14 06:15:39', '2012-11-15 03:40:08'),
(16, '', '2012-11-14', '06:16:00', '10:16:00', 1, 'New Larsian', 'Fuente Cebu', 0, 50, '0.00', '0.00', '0.00', '1-S6pdiXl6M.jpg', '1-S6pdiXl6M_thumb.jpg', 0, 0, '2012-11-14 06:16:32', '2012-11-14 06:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `event_attendee`
--

DROP TABLE IF EXISTS `event_attendee`;
CREATE TABLE IF NOT EXISTS `event_attendee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `paid` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `event_attendee`
--

INSERT INTO `event_attendee` (`id`, `event_id`, `user_id`, `paid`, `created_at`, `updated_at`) VALUES
(2, 1, 10, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 6, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 11, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 12, 11, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 12, 14, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 12, 15, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 12, 17, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 12, 6, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 12, 10, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 14, 6, '1', '2012-11-19 06:30:27', '2012-11-19 06:30:27'),
(13, 14, 19, '1', '2012-11-19 06:44:48', '2012-11-19 06:44:48'),
(14, 14, 20, '1', '2012-11-19 06:48:52', '2012-11-19 06:48:52');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

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
(8, 'IT', '2012-10-25 06:30:54', '2012-10-25 06:30:54'),
(16, 'Health Care', '2012-11-20 06:43:49', '2012-11-20 06:43:49'),
(17, 'Engineering', '2012-11-20 06:45:37', '2012-11-20 06:45:37');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `post_date`, `title`, `content`, `image_full`, `image_small`, `created_at`, `updated_at`) VALUES
(1, '2012-11-09 20:19:15', 'Network After Work is now hosting events in San Diego!', ' 	Nulla egestas ultrices pharetra. Praesent tempor ultrices arcu vitae auctor. Cras et ligula libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mollis libero a nulla viverra vestibulum. Proin viverra tristique libero sed fermentum. Nunc at orci id felis dictum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla at velit nunc, eu aliquet odio. Donec quam mi, commodo ut fermentum et, laoreet sit amet felis. Aliquam consectetur est id nibh viverra molestie. Duis semper eleifend volutpat. Vivamus molestie pharetra risus, vitae vehicula nisl pretium at. Suspendisse bibendum rhoncus gravida. ', '', '', '2012-11-08 00:00:00', '0000-00-00 00:00:00'),
(2, '2012-11-06 10:09:23', 'Mauris mollis libero a nulla viverra vestibulum', ' 	Nulla egestas ultrices pharetra. Praesent tempor ultrices arcu vitae auctor. Cras et ligula libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mollis libero a nulla viverra vestibulum. Proin viverra tristique libero sed fermentum. Nunc at orci id felis dictum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla at velit nunc, eu aliquet odio. Donec quam mi, commodo ut fermentum et, laoreet sit amet felis. Aliquam consectetur est id nibh viverra molestie. Duis semper eleifend volutpat. Vivamus molestie pharetra risus, vitae vehicula nisl pretium at. Suspendisse bibendum rhoncus gravida. ', '', '', '2012-11-07 00:00:00', '0000-00-00 00:00:00'),
(3, '2012-11-07 07:27:10', 'Duis semper eleifend volutpat', ' 	Nulla egestas ultrices pharetra. Praesent tempor ultrices arcu vitae auctor. Cras et ligula libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mollis libero a nulla viverra vestibulum. Proin viverra tristique libero sed fermentum. Nunc at orci id felis dictum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla at velit nunc, eu aliquet odio. Donec quam mi, commodo ut fermentum et, laoreet sit amet felis. Aliquam consectetur est id nibh viverra molestie. Duis semper eleifend volutpat. Vivamus molestie pharetra risus, vitae vehicula nisl pretium at. Suspendisse bibendum rhoncus gravida. ', '', '', '2012-11-05 00:00:00', '0000-00-00 00:00:00'),
(7, '2012-11-15 00:00:00', 'asdfas asdfdsfasdf sfsa dfasdfsdfasdf', 'asfas fasdfsfsadfasfasdf safdsafasdf asf ', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '0000-00-00 00:00:00', 'sfsadfasff', '<p>\r\n	asdfasdfassa <strong>sfasfasdf sdfd</strong> <u>sdsadfsa</u></p>\r\n', '', '', '2012-11-20 08:42:44', '2012-11-20 08:42:44'),
(14, '2012-11-20 11:25:00', 'safdsafasfd', '<p>\r\n	asdfasdfasdfas</p>\r\n', '', '', '2012-11-20 09:25:28', '2012-11-20 09:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(5) NOT NULL,
  `company` varchar(150) NOT NULL,
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

INSERT INTO `profile` (`id`, `title`, `company`, `city_id`, `address`, `ido`, `to_meet`, `image_full`, `image_small`, `linkedin_url`, `fb_url`, `twitter_url`, `olio_url`, `created_at`, `updated_at`) VALUES
(6, 'AM', 'Forty Degrees Celsius', 4, 'B. Rodriguez Street, Cebu City', 'Nulla egestas ultrices pharetra. Praesent tempor ultrices arcu vitae auctor. Cras et ligula libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mollis libero a nulla viverra vestibulum. Proin viverra tristique libero sed fermentum. Nunc at orci id felis dictum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla at velit nunc, eu aliquet odio. Donec quam mi, commodo ut fermentum et, laoreet sit amet felis. Aliquam consectetur est id nibh viverra molestie. Duis semper eleifend volutpat. Vivamus molestie pharetra risus, vitae vehicula nisl pretium at. Suspendisse bibendum rhoncus gravida.', 'Nulla egestas ultrices pharetra. Praesent tempor ultrices arcu vitae auctor. Cras et ligula libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mollis libero a nulla viverra vestibulum. Proin viverra tristique libero sed fermentum. Nunc at orci id felis dictum ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla at velit nunc, eu aliquet odio. Donec quam mi, commodo ut fermentum et, laoreet sit amet felis. Aliquam consectetur est id nibh viverra molestie. Duis semper eleifend volutpat. Vivamus molestie pharetra risus, vitae vehicula nisl pretium at. Suspendisse bibendum rhoncus gravida.', '4uDEnc3Wy5p_.jpg', '4uDEnc3Wy5p__thumb.jpg', 'http://www.linkedin.com/pub/jerry-bwoy/5a/851/93b', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.twitter2.com', '2012-10-29 01:58:16', '2012-11-09 06:42:35'),
(10, '', 'Forty Degrees Celsius', 0, 'Shibuya, Tokyo', 'I can wiggle my ears. (without touching them of course)\nMy upper and lower teeth don''t touch in front so when I bite down, there''s a gap about the width of my pinky.\nI sleep flat on my back with a pillow underneath my legs (it''s good for your back), with my arms on my chest. Some have observed that while sleeping I resemble a mummy.\nMy name was initially going to be Dale but it was changed to Daniel while I was still in the hospital.\nI can walk on my hands.', NULL, '4uDEnc3Wy5p6YQ.jpg', '4uDEnc3Wy5p6YQ_thumb.jpg', '', 'http://www.facebook.com/jerry.bwoy.3', '', '', '2012-10-29 03:39:03', '2012-11-20 01:42:45'),
(11, 'test', 'fasdfasdfasd', 4, 'asdfsdf', 'sadfasdfasdfadf', 'sdfasdfadsf asdf sadfsdfasdfsadfdsf', '', '', '', '', '', 'http://www.twitter2.com', '2012-11-15 07:54:39', '2012-11-15 07:54:39'),
(14, 'df', 'asdfasdfsaf', 0, 'asdfdasf', 'asdfasdfads', 'asasdfasdf', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '', 'dsfasdfasf', 0, 'asdfasdfa', 'asdfasdf', 'asdfasdfasdf', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '', 'asfdasfdasf', 0, 'sadfasdfadsf', 'sadfasf', 'asdfasdfdsafasd', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '', 'CHN', 3, '', NULL, NULL, '', '', '', '', '', '', '2012-11-19 06:44:47', '2012-11-19 06:44:47'),
(20, '', 'Forty Degrees Celsius', 3, '', NULL, NULL, '', '', '', '', '', '', '2012-11-19 06:48:52', '2012-11-19 06:48:52');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

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
(144, 6, 8, '1', '2012-11-12 05:25:36', '2012-11-12 05:25:36'),
(145, 19, 3, '0', '2012-11-19 06:44:48', '2012-11-19 06:44:48'),
(146, 20, 8, '0', '2012-11-19 06:48:52', '2012-11-19 06:48:52');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `fname`, `lname`, `dob`, `type_id`, `app_type`, `app_id`, `activation`, `last_login_at`, `active`, `created_at`, `updated_at`) VALUES
(6, 'jerrybwoy1@gmail.com', '67ca51a65c6caefc73392f26e7cc934d', 'Jerry', 'Bwoy1', '1976-01-17', '1', 0, '', '', NULL, '1', '2012-10-29 01:58:16', '2012-11-07 08:27:50'),
(10, 'jerrybwoy@gmail.com', '', 'Jerry', 'Bwoy', '1990-06-24', '0', 1, '100004221753392', '', NULL, '1', '2012-10-29 03:39:03', '2012-10-29 03:39:03'),
(11, 'dsfasdfas@gmail.com', '', 'First1', 'Last1', '1983-07-13', '0', 0, '', '', NULL, '0', '2012-11-15 07:54:39', '2012-11-20 01:46:06'),
(14, 'dsfasdfas1@gmail.com', '', 'asdfasdf', 'asdfasdfdasf', NULL, '0', 0, '', '', NULL, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'dsfasdfas2@gmail.com', '', 'asdfasdf', 'asdfdasfas', NULL, '0', 0, '', '', NULL, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'dsfasdfas3@gmail.com', '', 'sadfsadf', 'adsfdasfasf', NULL, '0', 0, '', '', NULL, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'dsfasdfas4@gmail.com', '', 'sadfsdf', 'asfdasdf', NULL, '0', 0, '', '', NULL, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'chenalaba@gmail.com', '', 'Gretchen', 'Alaba', '1985-07-21', '0', 0, '', '', NULL, '0', '2012-11-19 06:44:47', '2012-11-19 09:56:08'),
(20, 'richalaba@gmail.com', '', 'Rich', 'Alaba', '1984-08-21', '0', 0, '', '', NULL, '0', '2012-11-19 06:48:52', '2012-11-19 09:55:52');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
