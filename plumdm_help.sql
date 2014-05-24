-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2014 at 11:17 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `plumdm_help`
--
CREATE DATABASE IF NOT EXISTS `plumdm_help` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `plumdm_help`;

-- --------------------------------------------------------

--
-- Table structure for table `clientemail`
--

CREATE TABLE IF NOT EXISTS `clientemail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salesrep_id` int(11) DEFAULT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `send_date` varchar(50) DEFAULT NULL,
  `email_list` varchar(100) DEFAULT NULL,
  `notes` text,
  `leads` int(11) DEFAULT NULL,
  `page_complete` tinyint(4) DEFAULT NULL,
  `attachment_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `clientlp`
--

CREATE TABLE IF NOT EXISTS `clientlp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salesrep_id` int(11) DEFAULT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `expire_date` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website_url` varchar(100) DEFAULT NULL,
  `google_ad` tinyint(4) DEFAULT NULL,
  `google_ad_setup` tinyint(4) DEFAULT NULL,
  `page_complete` tinyint(4) DEFAULT NULL,
  `review_page` tinyint(4) DEFAULT NULL,
  `leads` int(11) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `notes` text,
  `attachment_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plumemail`
--

CREATE TABLE IF NOT EXISTS `plumemail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salesrep_id` int(11) DEFAULT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `send_date` varchar(50) DEFAULT NULL,
  `email_list` varchar(100) DEFAULT NULL,
  `notes` text,
  `leads` int(11) DEFAULT NULL,
  `page_complete` tinyint(4) DEFAULT NULL,
  `attachment_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plumlp`
--

CREATE TABLE IF NOT EXISTS `plumlp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salesrep_id` int(11) DEFAULT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `expire_date` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website_url` varchar(100) DEFAULT NULL,
  `google_ad` tinyint(4) DEFAULT NULL,
  `google_ad_setup` tinyint(4) DEFAULT NULL,
  `page_complete` tinyint(4) DEFAULT NULL,
  `review_page` tinyint(4) DEFAULT NULL,
  `leads` int(11) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `notes` text,
  `attachment_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salesrep`
--

CREATE TABLE IF NOT EXISTS `salesrep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `website_url` varchar(100) DEFAULT 'http://suryakiran.com',
  `url_path` varchar(100) DEFAULT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `type`, `website_url`, `url_path`, `visibility`) VALUES
(1, 'p_e', 'http://www.plumdm.com/email', '../template_images/email_images/plum_email/01.png', 1),
(2, 'p_e', 'http://www.plumdm.com/johnandjaneemail', '../template_images/email_images/plum_email/02.png', 1),
(3, 'c_e', 'http://www.plumdm.com/redkestleremail', '../template_images/email_images/client_email/03.png', 1),
(4, 'c_e', 'http://www.plumdm.com/401k/email', '../template_images/email_images/client_email/04.png', 1),
(5, 'c_e', 'http://suryakiran.com', '../template_images/email_images/05.png', 0),
(6, 'c_e', 'http://www.plumdm.com/guarantee/email', '../template_images/email_images/client_email/06.png', 1),
(7, 'p_e', 'http://www.plumdm.com/kestler/email', '../template_images/email_images/plum_email/07.png', 1),
(8, 'c_e', 'http://www.plumdm.com/redkestleremail2', '../template_images/email_images/client_email/08.png', 1),
(9, 'c_e', 'http://www.plumdm.com/life/email', '../template_images/email_images/client_email/09.png', 1),
(10, 'p_e', 'http://plumdm.com/emailblasts/My%20SS%20Leads', '../template_images/email_images/plum_email/10.png', 1),
(11, 'c_e', 'http://www.plumdm.com/redkestleremail2', '../template_images/email_images/client_email/11.png', 1),
(12, 'p_e', 'http://plumdm.com/emailblasts/Annuity%20Internet%20Leads%20Email/', '../template_images/email_images/plum_email/12.png', 1),
(13, 'c_e', 'http://www.plumdm.com/SOFA', '../template_images/email_images/client_email/13.png', 1),
(14, 'c_e', 'http://www.plumdm.com/today/email', '../template_images/email_images/client_email/14.png', 1),
(15, 'c_e', 'http://www.plumdm.com/referafriend', '../template_images/email_images/client_email/15.png', 1),
(16, 'p_e', 'http://www.plumdm.com/emailblasts/allannuityquotes', '../template_images/email_images/plum_email/16.png', 1),
(17, 'p_e', 'http://www.plumdm.com/emailblasts/weeklyseed01', '../template_images/email_images/plum_email/17.png', 1),
(18, 'p_e', 'http://www.plumdm.com/emailblasts/weeklyseed02', '../template_images/email_images/plum_email/18.png', 1),
(19, 'c_e', 'http://www.plumdm.com/emailblasts/altitude', '../template_images/email_images/client_email/19.png', 1),
(20, 'p_e', 'http://www.plumdm.com/emailblasts/weeklyseed03', '../template_images/email_images/plum_email/20.png', 1),
(21, 'p_e', 'http://www.plumdm.com/emailblasts/Weekly%20Seed/weeklyseed04/', '../template_images/email_images/plum_email/21.png', 1),
(22, 'p_e', 'http://www.plumdm.com/emailblasts/Weekly%20Seed/weeklyseed05', '../template_images/email_images/plum_email/22.png', 1),
(23, 'p_e', 'http://www.plumdm.com/emailblasts/appointments', '../template_images/email_images/plum_email/23.png', 1),
(24, 'p_e', 'http://www.plumdm.com/emailblasts/customlanding', '../template_images/email_images/plum_email/24.png', 1),
(25, 'p_e', 'http://www.plumdm.com/emailblasts/guaranteed', '../template_images/email_images/plum_email/25.png', 1),
(26, 'p_e', 'http://www.plumdm.com/emailblasts/ipad', '../template_images/email_images/plum_email/26.png', 1),
(27, 'p_e', 'http://www.plumdm.com/emailblasts/likeus', '../template_images/email_images/plum_email/27.png', 1),
(28, 'p_e', 'http://www.plumdm.com/emailblasts/lockinseminar', '../template_images/email_images/plum_email/28.png', 1),
(29, 'p_e', 'http://www.plumdm.com/emailblasts/raffle', '../template_images/email_images/plum_email/29.png', 1),
(30, 'c_e', 'http://www.plumdm.com/emailblasts/revolution', '../template_images/email_images/client_email/30.png', 1),
(31, 'p_e', 'http://www.plumdm.com/emailblasts/seminar', '../template_images/email_images/plum_email/31.png', 1),
(32, 'p_e', 'http://www.plumdm.com/emailblasts/ssoptions', '../template_images/email_images/plum_email/32.png', 1),
(33, 'p_e', 'http://www.plumdm.com/emailblasts/webinar', '../template_images/email_images/plum_email/33.png', 1),
(34, 'p_e', 'http://www.plumdm.com/emailblasts/websites', '../template_images/email_images/plum_email/34.png', 1),
(35, 'p_e', 'http://www.plumdm.com/nafaemail', '../template_images/email_images/plum_email/35.png', 1),
(36, 'p_e', 'http://www.plumdm.com/revolutionemail', '../template_images/email_images/plum_email/36.png', 1),
(37, 'p_e', 'http://plumdm.com/emailblasts/plumoffers/womens/', '../template_images/email_images/plum_email/37.png', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
