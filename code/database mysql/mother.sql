-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2015 at 11:20 AM
-- Server version: 5.0.91
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mother`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisory`
--

CREATE TABLE IF NOT EXISTS `advisory` (
  `m_in` int(10) NOT NULL auto_increment,
  `sender_user` varchar(50) NOT NULL,
  `messcontent` varchar(1000) NOT NULL,
  `reciever_user` varchar(50) NOT NULL,
  `sent_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY  (`m_in`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `advisory`
--

INSERT INTO `advisory` (`m_in`, `sender_user`, `messcontent`, `reciever_user`, `sent_time`, `status`) VALUES
(13, 'ph', ' helloooooooooooo', 'mother', '2015-06-16 09:56:23', 'read'),
(14, 'ph', ' hello men', 'mother', '2015-06-16 10:52:48', 'read'),
(15, 'mother', ' can you help me', 'fp', '2015-06-16 10:53:52', 'read'),
(26, 'ph', ' if you do not take this advice proojk[', 'b', '2015-06-18 10:21:58', 'read'),
(24, 'ph', ' helloo boss', 'ramee', '2015-06-17 21:20:28', 'unread'),
(20, 'ch', ' hello can you help me', 'fp', '2015-06-16 18:02:18', 'read'),
(25, 'mother', ' hhhh', 'yutjyu', '2015-06-17 21:46:32', 'unread'),
(23, 'ph', ' helloo how are you now', 'mother', '2015-06-17 21:39:03', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `appo`
--

CREATE TABLE IF NOT EXISTS `appo` (
  `appo_id` int(10) NOT NULL auto_increment,
  `mother_id` varchar(50) NOT NULL,
  `appo_description` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY  (`appo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `appo`
--

INSERT INTO `appo` (`appo_id`, `mother_id`, `appo_description`, `date`, `time`) VALUES
(19, '24', 'pregancy check up', '2022-03-04', '10:00:00'),
(20, '24', 'kkkkkkkkkkkkkkkkkkkkkk', '2022-03-04', '10:00:00'),
(27, '24', 'youehdjdjkk', '2015-06-01', '04:57:00'),
(24, '24', 'hellooooooo', '2016-03-03', '10:00:00'),
(25, '24', 'check up', '2015-06-01', '10:49:00'),
(26, '29', 'check up', '2015-06-02', '10:00:00'),
(28, '34', 'check up for pregan', '2015-06-02', '10:00:00'),
(29, '34', 'chgg', '2015-06-01', '10:56:00'),
(30, '34', 'hellooo', '2015-06-02', '03:00:00'),
(31, '29', 'hhhhhhhhhh', '2015-06-01', '10:11:00'),
(32, '29', 'hdgfmkadsym,loas', '2015-06-03', '10:00:00'),
(33, '24', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '2015-06-13', '10:00:00'),
(34, '24', 'gbggggggggggg', '2015-07-02', '10:00:00'),
(35, '38', 'contact the physician', '2015-06-19', '10:00:00'),
(36, '38', 'contant', '2015-06-18', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `hist_id` int(5) NOT NULL auto_increment,
  `mother_id` int(5) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `physician` varchar(50) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`hist_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`hist_id`, `mother_id`, `description`, `physician`, `date`) VALUES
(1, 24, ' hhhi', 'firomsa taye chali', '2015-06-12 20:11:32'),
(2, 24, ' hellooooo', 'firomsa taye chali', '2015-06-12 22:55:46'),
(3, 24, ' mmmmmmmmmmm', 'firomsa taye chali', '2015-06-13 00:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `info_id` int(10) NOT NULL auto_increment,
  `inforname` varchar(50) NOT NULL,
  `infortype` varchar(50) NOT NULL,
  `infordesc` varchar(1000) NOT NULL,
  PRIMARY KEY  (`info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`info_id`, `inforname`, `infortype`, `infordesc`) VALUES
(24, 'preganancy', ' 2-4 pregancy', 'to diagnose pregnancy and identify any complications during pregnancy'),
(25, 'aa', ' bbb', 'ccc'),
(26, 'antcare', ' 3 month check up', 'bajaklabam,ka.'),
(27, 'antena', ' 2 visit', 'fjj,k'),
(28, 'about preganancy', ' check up', 'if prr less than 1 month do....');

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE IF NOT EXISTS `medical` (
  `med_id` int(10) NOT NULL auto_increment,
  `symptom` varchar(1000) NOT NULL,
  `disease` varchar(1000) NOT NULL,
  `medication` varchar(1000) NOT NULL,
  PRIMARY KEY  (`med_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`med_id`, `symptom`, `disease`, `medication`) VALUES
(6, ' nnn', 'mmm', 'ooo'),
(7, ' kkk', 'lll', 'mmm'),
(8, ' ', '', ''),
(9, ' hiv', 'cold', 'eat balanced food'),
(10, ' your disease my be headache', 'high temperture,hh', 'take cipro twice a day'),
(11, ' your disease may be headache', 'high temp,lowe', 'take paracetamol'),
(12, ' cold', 'high temp', 'take cipro');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `datebirth` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `maritalstatus` varchar(40) NOT NULL,
  `usertype` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `fullname` (`fullname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `gender`, `datebirth`, `phone`, `email`, `maritalstatus`, `usertype`, `username`, `password`) VALUES
(25, 'hiwot tasfaye', 'female', '2015-05-12', '0924548792', 'hiwot@gmail.com', 'married', 'fp worker', 'fp', '0666f0acdeed38d4cd9084ade1739498'),
(24, 'toltu chala tufa', 'female', '2015-05-18', '0924548792', 'toltu@gmail.com', 'married', 'mother', 'mother', '6f8f57715090da2632453988d9a1501b'),
(26, 'firomsa taye chali', 'male', '0000-00-00', '8737987444', 'firo@gma.com', 'sigle', 'physician', 'ph', 'da984e42a5899bbdac496ef0cbadcee2'),
(27, 'gudissa gabissa', 'male', '1992-05-07', '0923588792', 'gudissa@gmail.com', 'sigle', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(38, 'bontu', 'female', '2000-04-04', '0916613278', 'ayya@gmail.com', 'single', 'mother', 'b', '0cc175b9c0f1b6a831c399e269772661'),
(39, 'gamade', 'female', '2002-03-03', '0923456678', 'aaaa@gmail.com', 'single', 'mother', '09', '0a8005f5594bd67041f88c6196192646');
