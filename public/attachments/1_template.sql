-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2014 at 11:18 AM
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
(37, 'p_e', 'http://plumdm.com/emailblasts/plumoffers/womens/', '../template_images/email_images/plum_email/37.png', 1),
(38, 'p_lp', 'http://www.plumdm.com/august', '../template_images/lp_images/plum_lp/03.png', 1),
(39, 'p_lp', 'http://www.plumdm.com/guaranteedannuityappointmentscomold', '../template_images/lp_images/plum_lp/06.png', 1),
(40, 'p_lp', 'http://www.plumdm.com/guaranteedannuityappointmentscomold2', '../template_images/lp_images/plum_lp/07.png', 1),
(41, 'p_lp', 'http://plumdm.com/annuityinternetleads', '../template_images/lp_images/plum_lp/11.png', 1),
(42, 'p_lp', 'http://www.freedripcampaign.com', '../template_images/lp_images/plum_lp/13.png', 1),
(43, 'p_lp', 'http://www.plumdm.com/guaranteedannuityappointmentscom', '../template_images/lp_images/plum_lp/17.png', 1),
(44, 'p_lp', 'http://www.johnandjanestory.com', '../template_images/lp_images/plum_lp/18.png', 1),
(45, 'p_lp', 'http://www.plumdm.com/landing2', '../template_images/lp_images/plum_lp/22.png', 1),
(46, 'p_lp', 'http://www.plumdm.com/myssleads', '../template_images/lp_images/plum_lp/26.png', 1),
(47, 'p_lp', 'http://www.plumdm.com/novideo', '../template_images/lp_images/plum_lp/27.png', 1),
(48, 'p_lp', 'http://www.plumdm.com/outreach', '../template_images/lp_images/plum_lp/28.png', 1),
(49, 'p_lp', 'http://www.plumdm.com/landings/webinar', '../template_images/lp_images/plum_lp/45.png', 1),
(50, 'p_lp', 'http://www.plumdm.com/landings/customlanding', '../template_images/lp_images/plum_lp/47.png', 1),
(51, 'p_lp', 'http://www.plumdm.com/landings/appointments', '../template_images/lp_images/plum_lp/48.png', 1),
(52, 'p_lp', 'http://www.plumorders.com', '../template_images/lp_images/plum_lp/50.png', 1),
(53, 'p_lp', 'http://www.plumdm.com/seminar', '../template_images/lp_images/plum_lp/51.png', 1),
(54, 'p_lp', 'http://www.seminar-mailers.com', '../template_images/lp_images/plum_lp/52.png', 1),
(55, 'p_lp', 'http://plumdm.com/weeklyseed/', '../template_images/lp_images/plum_lp/53.png', 1),
(56, 'p_lp', 'http://plumdm.com/qualifiedannuityleads/001/', '../template_images/lp_images/plum_lp/67.png', 1),
(57, 'p_lp', 'http://plumdm.com/plumoffer/womens/', '../template_images/lp_images/plum_lp/68.png', 1),
(58, 'c_lp', 'http://www.plumdm.com/401k', '../template_images/lp_images/client_lp/01.png', 1),
(59, 'c_lp', 'http://www.plumdm.com/agent', '../template_images/lp_images/client_lp/02.png', 1),
(60, 'c_lp', 'http://www.plumdm.com/bhclanding', '../template_images/lp_images/client_lp/04.png', 1),
(61, 'c_lp', 'http://www.plumdm.com/fig', '../template_images/lp_images/client_lp/05.png', 1),
(62, 'c_lp', 'http://www.plumdm.com/johnandjane', '../template_images/lp_images/client_lp/08.png', 1),
(63, 'c_lp', 'http://www.plumdm.com/johnandjanesorry', '../template_images/lp_images/client_lp/09.png', 1),
(64, 'c_lp', 'http://www.plumdm.com/johnandjanethanks', '../template_images/lp_images/client_lp/10.png', 1),
(65, 'c_lp', 'http://www.plumdm.com/bankonyourself', '../template_images/lp_images/client_lp/12.png', 1),
(66, 'c_lp', 'http://www.freessreport.com', '../template_images/lp_images/client_lp/14.png', 1),
(67, 'c_lp', 'http://www.plumdm.com/greenwired', '../template_images/lp_images/client_lp/15.png', 1),
(68, 'c_lp', 'http://www.plumdm.com/guarantee', '../template_images/lp_images/client_lp/16.png', 1),
(69, 'c_lp', 'http://www.plumdm.com/johnandjaneworkshops', '../template_images/lp_images/client_lp/19.png', 1),
(70, 'c_lp', 'http://www.plumdm.com/kestler', '../template_images/lp_images/client_lp/20.png', 1),
(71, 'c_lp', 'http://www.plumdm.com/legacy', '../template_images/lp_images/client_lp/23.png', 1),
(72, 'c_lp', 'http://www.plumdm.com/life', '../template_images/lp_images/client_lp/24.png', 1),
(73, 'c_lp', 'http://www.plumdm.com/agent2', '../template_images/lp_images/client_lp/25.png', 1),
(74, 'c_lp', 'http://www.plumdm.com/pinnacle', '../template_images/lp_images/client_lp/29.png', 1),
(75, 'c_lp', 'http://www.saferetirementinvestment.com', '../template_images/lp_images/client_lp/30.png', 1),
(76, 'c_lp', 'http://www.seminarreserve.com', '../template_images/lp_images/client_lp/31.png', 1),
(77, 'c_lp', 'http://www.plumdm.com/seminarsurvey', '../template_images/lp_images/client_lp/32.png', 1),
(78, 'c_lp', 'http://www.plumdm.com/socialsecurity', '../template_images/lp_images/client_lp/33.png', 1),
(79, 'c_lp', 'http://www.socialsecurityleads.com', '../template_images/lp_images/client_lp/34.png', 1),
(80, 'c_lp', 'http://www.plumdm.com/ssoptimization', '../template_images/lp_images/client_lp/37.png', 1),
(81, 'c_lp', 'http://www.plumdm.com/today', '../template_images/lp_images/client_lp/38.png', 1),
(82, 'c_lp', 'http://www.allannuityquotes.com', '../template_images/lp_images/client_lp/40.png', 1),
(83, 'c_lp', 'http://www.plumdm.com/template2', '../template_images/lp_images/client_lp/41.png', 1),
(84, 'c_lp', 'http://www.plumdm.com/template3', '../template_images/lp_images/client_lp/42.png', 1),
(85, 'c_lp', 'http://www.plumdm.com/landings/altitude', '../template_images/lp_images/client_lp/43.png', 1),
(86, 'c_lp', 'http://www.plumdm.com/akar', '../template_images/lp_images/client_lp/44.png', 1),
(87, 'c_lp', 'http://www.plumdm.com/landings/sneakpeak', '../template_images/lp_images/client_lp/46.png', 1),
(88, 'c_lp', 'http://www.plumdm.com/ohlson', '../template_images/lp_images/client_lp/49.png', 1),
(89, 'c_lp', 'http://www.myssreport.org', '../template_images/lp_images/client_lp/54.png', 1),
(90, 'c_lp', 'http://www.allannuityquotes.com/008', '../template_images/lp_images/client_lp/55.png', 1),
(91, 'c_lp', 'http://www.allannuityquotes.com/006', '../template_images/lp_images/client_lp/56.png', 1),
(92, 'c_lp', 'http://www.allannuityquotes.com/007', '../template_images/lp_images/client_lp/57.png', 1),
(93, 'c_lp', 'http://www.oakleyseminar.com', '../template_images/lp_images/client_lp/58.png', 1),
(94, 'c_lp', 'http://www.ssbenefits.us/report', '../template_images/lp_images/client_lp/59.png', 1),
(95, 'c_lp', 'http://www.mcelroyreserve.com', '../template_images/lp_images/client_lp/60.png', 1),
(96, 'c_lp', 'http://www.twincitiesretirementsummit.com', '../template_images/lp_images/client_lp/61.png', 1),
(97, 'c_lp', 'http://www.getmyreport.org', '../template_images/lp_images/client_lp/62.png', 1),
(98, 'c_lp', 'http://www.getmyreport.org/qualifier', '../template_images/lp_images/client_lp/63.png', 1),
(99, 'c_lp', 'http://www.plumdm.com/readyforretirement', '../template_images/lp_images/client_lp/64.png', 1),
(100, 'c_lp', 'http://www.lakepointseminar.com', '../template_images/lp_images/client_lp/65.png', 1),
(101, 'c_lp', 'http://www.maximizemyretirement.org/', '../template_images/lp_images/client_lp/66.png', 1);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
