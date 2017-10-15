-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 04:17 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fraud`
--

-- --------------------------------------------------------

--
-- Table structure for table `abnormaltimes`
--

CREATE TABLE `abnormaltimes` (
  `itemNo` varchar(255) DEFAULT NULL,
  `fromTime` datetime(6) DEFAULT NULL,
  `toTime` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `averageamounttable`
--

CREATE TABLE `averageamounttable` (
  `AmountID` int(11) DEFAULT NULL,
  `AverageAmount` decimal(40,15) DEFAULT NULL,
  `AmountCount` decimal(40,15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `averageamounttable`
--

INSERT INTO `averageamounttable` (`AmountID`, `AverageAmount`, `AmountCount`) VALUES
(1, '835.536454336147000', '1303.000000000000000');

-- --------------------------------------------------------

--
-- Table structure for table `averagedurationtable`
--

CREATE TABLE `averagedurationtable` (
  `DurationID` int(11) DEFAULT NULL,
  `AverageDuration` decimal(40,15) DEFAULT NULL,
  `DurationCount` decimal(40,15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `averagedurationtable`
--

INSERT INTO `averagedurationtable` (`DurationID`, `AverageDuration`, `DurationCount`) VALUES
(1, '-8372384315.046931000000000', '1662.000000000000000');

-- --------------------------------------------------------

--
-- Table structure for table `avgqty`
--

CREATE TABLE `avgqty` (
  `ITEMNO` varchar(255) DEFAULT NULL,
  `AVG` int(11) DEFAULT NULL,
  `STDEV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avgqty`
--

INSERT INTO `avgqty` (`ITEMNO`, `AVG`, `STDEV`) VALUES
('I0011', 4, 10),
('I0010', 2, 3),
('I0012', 1, 1),
('I0015', 4, 9),
('I0016', 100, 100),
('I0013', 10, 10),
('I0014', 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `blacklisted`
--

CREATE TABLE `blacklisted` (
  `id` int(11) NOT NULL,
  `cardnum` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blacklisted`
--

INSERT INTO `blacklisted` (`id`, `cardnum`) VALUES
(1, 5055210036965540),
(2, 3714496353984310),
(3, 3772822463100050),
(4, 1020304050607080);

-- --------------------------------------------------------

--
-- Table structure for table `comparestream`
--

CREATE TABLE `comparestream` (
  `cardnum` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(13) NOT NULL,
  `scoresum` float NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countstream`
--

CREATE TABLE `countstream` (
  `txnid` int(20) NOT NULL,
  `cardnum` bigint(20) NOT NULL,
  `counter` int(5) NOT NULL,
  `txnamt` double NOT NULL,
  `currency` varchar(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shippingaddress` varchar(255) NOT NULL,
  `billingaddress` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `itemNo` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countstream`
--

INSERT INTO `countstream` (`txnid`, `cardnum`, `counter`, `txnamt`, `currency`, `email`, `shippingaddress`, `billingaddress`, `ip`, `itemNo`, `timestamp`) VALUES
(26, 1020304050607080, 1, 2000, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', '37275 St  Rt 17m M', '108.68.115.103', 'IT1573', '2017-03-31 19:48:00.000000'),
(1, 3714496353984310, 3, 3380, 'USD', 'mitsue_tollner@yahoo.com', '8 W Cerritos Ave #54', '8 W Cerritos Ave #54', '131.26.192.174', 'IT1584', '2015-01-02 16:34:52.000000'),
(4, 3782822463100050, 5, 44737, 'LKR', 'lpaprocki@hotmail.com', '4 B Blue Ridge Blvd', '4 B Blue Ridge Blvd', '94.154.94.130', 'IT1496', '2015-01-03 01:35:51.000000'),
(9, 3787344936710000, 3, 2590, 'JPY', 'leota@hotmail.com', '639 Main St', '639 Main St', '192.113.129.59', 'IT1928', '2015-01-06 02:14:38.000000'),
(12, 4078560052521110, 6, 2043, 'LKR', 'jbutt@gmail.com', '6649 N Blue Gum St', '6649 N Blue Gum St', '13.33.21.149', 'IT1506', '2015-01-07 00:40:52.000000'),
(18, 4088530014523650, 1, 888664, 'USD', 'brhym@rhym.com', '618 W Yakima Ave', '618 W Yakima Ave', '96.61.140.185', 'IT1015', '2015-01-11 13:53:28.000000'),
(19, 5055210036965540, 7, 5442, 'LKR', 'gladys.rim@rim.org', '7 W Jackson Blvd', '7 W Jackson Blvd', '111.179.68.33', 'IT1026', '2015-01-12 04:58:36.000000'),
(27, 13091994130910994, 1, 3000, 'INR', 'abc@company.com', '17 Sneha Enclave Dovton', '17 Sneha Enclave Dovton', '183.83.239.121', 'IT1309', '2017-04-02 10:20:30.210592');

-- --------------------------------------------------------

--
-- Table structure for table `expensiveitem`
--

CREATE TABLE `expensiveitem` (
  `itemNo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensiveitem`
--

INSERT INTO `expensiveitem` (`itemNo`) VALUES
('I0013'),
('I0014');

-- --------------------------------------------------------

--
-- Table structure for table `firstcounttable`
--

CREATE TABLE `firstcounttable` (
  `firstState` varchar(255) DEFAULT NULL,
  `count` decimal(40,15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firstcounttable`
--

INSERT INTO `firstcounttable` (`firstState`, `count`) VALUES
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000'),
('HFS', '5.000000000000000');

-- --------------------------------------------------------

--
-- Table structure for table `fraudcount`
--

CREATE TABLE `fraudcount` (
  `CARDNUM` bigint(20) DEFAULT NULL,
  `TXNID` int(20) DEFAULT NULL,
  `rtcount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fraudcount`
--

INSERT INTO `fraudcount` (`CARDNUM`, `TXNID`, `rtcount`) VALUES
(1234509876120938, NULL, 3),
(8901219576982303, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fraudtxn`
--

CREATE TABLE `fraudtxn` (
  `cardnum` bigint(20) DEFAULT NULL,
  `txnamt` double DEFAULT NULL,
  `merchantid` varchar(255) DEFAULT NULL,
  `terminalloc` varchar(255) DEFAULT NULL,
  `terminalcountry` varchar(255) DEFAULT NULL,
  `acquirercountry` varchar(255) DEFAULT NULL,
  `acquirerid` bigint(20) DEFAULT NULL,
  `currency` varchar(4) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `shippingaddress` varchar(255) DEFAULT NULL,
  `shippingcountry` varchar(255) DEFAULT NULL,
  `billingaddress` varchar(255) DEFAULT NULL,
  `billingcountry` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `itemNo` varchar(255) DEFAULT NULL,
  `timestamp` datetime(6) DEFAULT NULL,
  `txnid` int(20) NOT NULL,
  `score` float NOT NULL,
  `fraudflag` tinyint(1) NOT NULL,
  `phone` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fraudtxn`
--

INSERT INTO `fraudtxn` (`cardnum`, `txnamt`, `merchantid`, `terminalloc`, `terminalcountry`, `acquirercountry`, `acquirerid`, `currency`, `email`, `shippingaddress`, `shippingcountry`, `billingaddress`, `billingcountry`, `ip`, `itemNo`, `timestamp`, `txnid`, `score`, `fraudflag`, `phone`) VALUES
(3714496353984310, 3380, 'Ebay', '', 'AUS', 'Ukraine', 555055, 'USD', 'mitsue_tollner@yahoo.com', '8 W Cerritos Ave #54', 'Ukraine', '8 W Cerritos Ave #54', 'Ukraine', '131.26.192.174', 'IT1584', '2015-01-02 16:34:52.000000', 1, 0, 1, 0),
(3782822463100050, 44737, 'Singer', '', 'US', 'Nigeria', 305520, 'LKR', 'lpaprocki@hotmail.com', '4 B Blue Ridge Blvd', 'Nigeria', '4 B Blue Ridge Blvd', 'Nigeria', '94.154.94.130', 'IT1496', '2015-01-03 01:35:51.000000', 4, 0, 1, 0),
(3787344936710000, 2590, 'Ebay', '', 'US', 'Japan', 403855, 'JPY', 'leota@hotmail.com', '639 Main St', 'Japan', '639 Main St', 'Japan', '192.113.129.59', 'IT1928', '2015-01-06 02:14:38.000000', 9, 0, 1, 0),
(4078560052521110, 2043, 'Keels Super', 'Colombo 01', 'SL', 'Sri Lanka', 407856, 'LKR', 'jbutt@gmail.com', '6649 N Blue Gum St', 'Sri Lanka', '6649 N Blue Gum St', 'Sri Lanka', '13.33.21.149', 'IT1506', '2015-01-07 00:40:52.000000', 12, 0, 1, 0),
(5055210036965540, 5442, 'Keels Super', 'Galle', 'SL', 'Sri Lanka', 465221, 'LKR', 'gladys.rim@rim.org', '7 W Jackson Blvd', 'Sri Lanka', '7 W Jackson Blvd', 'Sri Lanka', '111.179.68.33', 'IT1026', '2015-01-12 04:58:36.000000', 19, 0, 1, 0),
(1234509876120938, 1243, 'Flipkart', 'Hyderabad', 'IND', 'India', 142351, 'INR', 'katelee@gmail.com', '6 B Blue Ridge Rd', 'India', '6 B Blue Ridge Rd', 'India', '94.154.94.133', 'IT1324', '2017-04-05 02:10:17.686545', 28, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `markovmodeltable`
--

CREATE TABLE `markovmodeltable` (
  `transition` varchar(10) DEFAULT NULL,
  `firstState` varchar(10) DEFAULT NULL,
  `count` double DEFAULT NULL,
  `probability` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markovmodeltable`
--

INSERT INTO `markovmodeltable` (`transition`, `firstState`, `count`, `probability`) VALUES
('LFSLFS', 'LFS', 1, 0),
('LFSHFH', 'LFS', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `metricstream`
--

CREATE TABLE `metricstream` (
  `txnid` int(20) NOT NULL,
  `cardnum` bigint(16) NOT NULL,
  `itemNo` varchar(255) NOT NULL,
  `txnamt` double NOT NULL,
  `currency` varchar(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shippingaddress` varchar(255) NOT NULL,
  `billingaddress` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `timestamp` datetime(6) NOT NULL,
  `nextstate` varchar(255) NOT NULL,
  `transition` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metricstream`
--

INSERT INTO `metricstream` (`txnid`, `cardnum`, `itemNo`, `txnamt`, `currency`, `email`, `shippingaddress`, `billingaddress`, `ip`, `qty`, `timestamp`, `nextstate`, `transition`) VALUES
(27, 13091994130910994, 'IT1309', 3000, 'INR', 'abc@company.com', '17 Sneha Enclave Dovton', '17 Sneha Enclave Dovton', '183.83.239.121', 2, '2017-04-02 10:20:30.210592', 'A', 'AA'),
(27, 13091994130910994, 'IT1309', 3000, 'INR', 'abc@company.com', '17 Sneha Enclave Dovton', '17 Sneha Enclave Dovton', '183.83.239.121', 2, '2017-04-02 10:20:30.210592', 'D', 'DA'),
(26, 1020304050607080, 'IT1573', 2000, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', '37275 St  Rt 17m M', '108.68.115.103', 1, '2017-03-31 19:48:00.000000', 'A', 'AD'),
(26, 1020304050607080, 'IT1573', 2000, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', '37275 St  Rt 17m M', '108.68.115.103', 1, '2017-03-31 19:48:00.000000', 'D', 'DD');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedtxns`
--

CREATE TABLE `rejectedtxns` (
  `cardnum` bigint(20) DEFAULT NULL,
  `txnid` int(20) DEFAULT NULL,
  `timestamp` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejectedtxns`
--

INSERT INTO `rejectedtxns` (`cardnum`, `txnid`, `timestamp`) VALUES
(1234509876120938, 1000000004, '0000-00-00 00:00:00.000000'),
(1234509876120938, 1000000005, '0000-00-00 00:00:00.000000'),
(8901219576982303, 1000000007, '0000-00-00 00:00:00.000000'),
(1234509876120938, 1000000006, '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `scorestream`
--

CREATE TABLE `scorestream` (
  `txnid` int(20) NOT NULL,
  `cardnum` bigint(20) NOT NULL,
  `txnamt` double NOT NULL,
  `currency` varchar(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shippingaddress` varchar(255) NOT NULL,
  `billingaddress` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `itemno` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `timestamp` datetime(6) NOT NULL,
  `score` int(4) NOT NULL,
  `phone` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scorestream`
--

INSERT INTO `scorestream` (`txnid`, `cardnum`, `txnamt`, `currency`, `email`, `shippingaddress`, `billingaddress`, `ip`, `itemno`, `qty`, `timestamp`, `score`, `phone`) VALUES
(4, 3782822463100050, 44737, 'LKR', 'lpaprocki@hotmail.com', '4 B Blue Ridge Blvd', '4 B Blue Ridge Blvd', '94.154.94.130', 'IT1496', 0, '2015-01-03 01:35:51.000000', 5, 0),
(12, 4078560052521110, 2043, 'LKR', 'jbutt@gmail.com', '6649 N Blue Gum St', '6649 N Blue Gum St', '13.33.21.149', 'IT1506', 0, '2015-01-07 00:40:52.000000', 5, 0),
(19, 5055210036965540, 5442, 'LKR', 'gladys.rim@rim.org', '7 W Jackson Blvd', '7 W Jackson Blvd', '111.179.68.33', 'IT1026', 0, '2015-01-12 04:58:36.000000', 5, 0),
(4, 3782822463100050, 44737, 'LKR', 'lpaprocki@hotmail.com', '4 B Blue Ridge Blvd', '4 B Blue Ridge Blvd', '94.154.94.130', 'IT1496', 0, '2015-01-03 01:35:51.000000', 5, 0),
(12, 4078560052521110, 2043, 'LKR', 'jbutt@gmail.com', '6649 N Blue Gum St', '6649 N Blue Gum St', '13.33.21.149', 'IT1506', 0, '2015-01-07 00:40:52.000000', 5, 0),
(19, 5055210036965540, 5442, 'LKR', 'gladys.rim@rim.org', '7 W Jackson Blvd', '7 W Jackson Blvd', '111.179.68.33', 'IT1026', 0, '2015-01-12 04:58:36.000000', 5, 0),
(4, 3782822463100050, 44737, 'LKR', 'lpaprocki@hotmail.com', '4 B Blue Ridge Blvd', '4 B Blue Ridge Blvd', '94.154.94.130', 'IT1496', 0, '2015-01-03 01:35:51.000000', 5, 0),
(12, 4078560052521110, 2043, 'LKR', 'jbutt@gmail.com', '6649 N Blue Gum St', '6649 N Blue Gum St', '13.33.21.149', 'IT1506', 0, '2015-01-07 00:40:52.000000', 5, 0),
(19, 5055210036965540, 5442, 'LKR', 'gladys.rim@rim.org', '7 W Jackson Blvd', '7 W Jackson Blvd', '111.179.68.33', 'IT1026', 0, '2015-01-12 04:58:36.000000', 5, 0),
(4, 3782822463100050, 44737, 'LKR', 'lpaprocki@hotmail.com', '4 B Blue Ridge Blvd', '4 B Blue Ridge Blvd', '94.154.94.130', 'IT1496', 0, '2015-01-03 01:35:51.000000', 5, 0),
(12, 4078560052521110, 2043, 'LKR', 'jbutt@gmail.com', '6649 N Blue Gum St', '6649 N Blue Gum St', '13.33.21.149', 'IT1506', 0, '2015-01-07 00:40:52.000000', 5, 0),
(19, 5055210036965540, 5442, 'LKR', 'gladys.rim@rim.org', '7 W Jackson Blvd', '7 W Jackson Blvd', '111.179.68.33', 'IT1026', 0, '2015-01-12 04:58:36.000000', 5, 0),
(26, 1020304050607080, 2000, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', '37275 St  Rt 17m M', '108.68.115.103', 'IT1573', 0, '2017-03-31 19:48:00.000000', 0, 0),
(1, 3714496353984310, 3380, 'USD', 'mitsue_tollner@yahoo.com', '8 W Cerritos Ave #54', '8 W Cerritos Ave #54', '131.26.192.174', 'IT1584', 0, '2015-01-02 16:34:52.000000', 0, 0),
(9, 3787344936710000, 2590, 'JPY', 'leota@hotmail.com', '639 Main St', '639 Main St', '192.113.129.59', 'IT1928', 0, '2015-01-06 02:14:38.000000', 0, 0),
(18, 4088530014523650, 888664, 'USD', 'brhym@rhym.com', '618 W Yakima Ave', '618 W Yakima Ave', '96.61.140.185', 'IT1015', 0, '2015-01-11 13:53:28.000000', 0, 0),
(27, 13091994130910994, 3000, 'INR', 'abc@company.com', '17 Sneha Enclave Dovton', '17 Sneha Enclave Dovton', '183.83.239.121', 'IT1309', 0, '2017-04-02 10:20:30.210592', 0, 0),
(11, 3787344936710000, 3181, 'LKR', 'elly_morocco@gmail.com', '1 State Route 27', '1 State Route 27', '116.40.85.35', 'IT1427', 0, '2015-01-06 23:47:36.000000', 0, 0),
(20, 5055210036965540, 1047967, 'LKR', 'wkusko@yahoo.com', '228 Runamuck Pl #2808', '228 Runamuck Pl #2808', '71.155.65.35', 'IT1133', 0, '2015-01-13 02:58:26.000000', 0, 0),
(5, 3782822463100050, 700, 'LKR', 'bfigeroa@aol.com', '2371 Jerrold Ave', '2371 Jerrold Ave', '32.139.71.59', 'IT1491', 0, '2015-01-04 14:34:33.000000', 0, 0),
(15, 4078560052521110, 23704, 'LKR', 'asergi@gmail.com', '25 E 75th St #69', '25 E 75th St #69', '32.179.84.157', 'IT1027', 0, '2015-01-09 20:03:28.000000', 0, 0),
(2, 3714496353984310, 1670, 'LKR', 'calbares@gmail.com', '3 Mcauley Dr', '3 Mcauley Dr', '131.26.192.174', 'IT1584', 0, '2015-01-02 16:35:00.000000', 0, 0),
(3, 3714496353984310, 601960, 'EUR', 'tawna@gmail.com', '322 New Horizon Blvd', '322 New Horizon Blvd', '115.137.172.173', 'IT1302', 0, '2015-01-02 23:45:08.000000', 0, 0),
(17, 4078560052521110, 147368, 'LKR', 'laurel_reitler@reitler.com', '3273 State St', '3273 State St', '84.82.129.59', 'IT1824', 0, '2015-01-10 01:27:23.000000', 0, 0),
(13, 4078560052521110, 289176, 'GBP', 'kris@gmail.com', '34 Center St', '34 Center St', '27.114.94.126', 'IT1549', 0, '2015-01-07 15:52:51.000000', 0, 0),
(21, 5055210036965540, 28124, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', '37275 St  Rt 17m M', '108.68.115.103', 'IT1573', 0, '2015-01-13 11:48:00.000000', 0, 0),
(24, 5055210036965540, 500, 'LKR', 'vmondella@mondella.com', '394 Manchester Blvd', '394 Manchester Blvd', '29.188.20.178', 'IT1227', 0, '2015-01-14 20:48:06.000000', 0, 0),
(4, 3782822463100050, 44737, 'LKR', 'lpaprocki@hotmail.com', '4 B Blue Ridge Blvd', '4 B Blue Ridge Blvd', '94.154.94.130', 'IT1496', 0, '2015-01-03 01:35:51.000000', 0, 0),
(14, 4078560052521110, 3594, 'LKR', 'fletcher.flosi@yahoo.com', '5 Boston Ave #88', '5 Boston Ave #88', '35.103.76.170', 'IT1154', 0, '2015-01-09 14:39:48.000000', 0, 0),
(6, 3782822463100050, 2515935, 'LKR', 'shenika@gmail.com', '56 E Morehead St', '56 E Morehead St', '48.154.179.86', 'IT1344', 0, '2015-01-04 23:10:20.000000', 0, 0),
(25, 5055210036965540, 24100, 'LKR', 'johnetta_abdallah@aol.com', '6 Greenleaf Ave', '6 Greenleaf Ave', '192.89.105.91', 'IT1945', 0, '2015-01-15 20:33:08.000000', 0, 0),
(16, 4078560052521110, 1000, 'LKR', 'kallie.blackwood@gmail.com', '6 S 33rd St', '6 S 33rd St', '173.168.30.45', 'IT1906', 0, '2015-01-09 20:59:36.000000', 0, 0),
(18, 4088530014523650, 888664, 'USD', 'brhym@rhym.com', '618 W Yakima Ave', '618 W Yakima Ave', '96.61.140.185', 'IT1015', 0, '2015-01-11 13:53:28.000000', 0, 0),
(9, 3787344936710000, 2590, 'JPY', 'leota@hotmail.com', '639 Main St', '639 Main St', '192.113.129.59', 'IT1928', 0, '2015-01-06 02:14:38.000000', 0, 0),
(12, 4078560052521110, 2043, 'LKR', 'jbutt@gmail.com', '6649 N Blue Gum St', '6649 N Blue Gum St', '13.33.21.149', 'IT1506', 0, '2015-01-07 00:40:52.000000', 0, 0),
(23, 5055210036965540, 26500, 'LKR', 'deeanna_juhas@gmail.com', '69734 E Carrillo St', '69734 E Carrillo St', '173.83.99.127', 'IT1849', 0, '2015-01-13 15:51:20.000000', 0, 0),
(10, 3787344936710000, 478, 'LKR', 'meaghan@hotmail.com', '7 Eads St', '7 Eads St', '151.125.145.178', 'IT1912', 0, '2015-01-06 20:06:11.000000', 0, 0),
(19, 5055210036965540, 5442, 'LKR', 'gladys.rim@rim.org', '7 W Jackson Blvd', '7 W Jackson Blvd', '111.179.68.33', 'IT1026', 0, '2015-01-12 04:58:36.000000', 0, 0),
(7, 3782822463100050, 166, 'LKR', 'delmy.ahle@hotmail.com', '73 State Road 434 E', '73 State Road 434 E', '120.94.72.95', 'IT1066', 0, '2015-01-05 02:56:25.000000', 0, 0),
(8, 3782822463100050, 1432941, 'USD', 'micaela_rhymes@gmail.com', '74 S Westgate St', '74 S Westgate St', '58.183.75.123', 'IT1825', 0, '2015-01-05 07:45:08.000000', 0, 0),
(1, 3714496353984310, 3380, 'USD', 'mitsue_tollner@yahoo.com', '8 W Cerritos Ave #54', '8 W Cerritos Ave #54', '131.26.192.174', 'IT1584', 0, '2015-01-02 16:34:52.000000', 0, 0),
(22, 5055210036965540, 694, 'LKR', 'lperin@perin.org', '98 Connecticut Ave Nw', '98 Connecticut Ave Nw', '102.76.99.192', 'IT1150', 0, '2015-01-13 15:39:25.000000', 0, 0),
(26, 1020304050607080, 2000, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', '37275 St  Rt 17m M', '108.68.115.103', 'IT1573', 0, '2017-03-31 19:48:00.000000', 0, 0),
(1, 3714496353984310, 3380, 'USD', 'mitsue_tollner@yahoo.com', '8 W Cerritos Ave #54', '8 W Cerritos Ave #54', '131.26.192.174', 'IT1584', 0, '2015-01-02 16:34:52.000000', 0, 0),
(9, 3787344936710000, 2590, 'JPY', 'leota@hotmail.com', '639 Main St', '639 Main St', '192.113.129.59', 'IT1928', 0, '2015-01-06 02:14:38.000000', 0, 0),
(18, 4088530014523650, 888664, 'USD', 'brhym@rhym.com', '618 W Yakima Ave', '618 W Yakima Ave', '96.61.140.185', 'IT1015', 0, '2015-01-11 13:53:28.000000', 0, 0),
(11, 3787344936710000, 3181, 'LKR', 'elly_morocco@gmail.com', '1 State Route 27', '1 State Route 27', '116.40.85.35', 'IT1427', 0, '2015-01-06 23:47:36.000000', 0, 0),
(20, 5055210036965540, 1047967, 'LKR', 'wkusko@yahoo.com', '228 Runamuck Pl #2808', '228 Runamuck Pl #2808', '71.155.65.35', 'IT1133', 0, '2015-01-13 02:58:26.000000', 0, 0),
(5, 3782822463100050, 700, 'LKR', 'bfigeroa@aol.com', '2371 Jerrold Ave', '2371 Jerrold Ave', '32.139.71.59', 'IT1491', 0, '2015-01-04 14:34:33.000000', 0, 0),
(15, 4078560052521110, 23704, 'LKR', 'asergi@gmail.com', '25 E 75th St #69', '25 E 75th St #69', '32.179.84.157', 'IT1027', 0, '2015-01-09 20:03:28.000000', 0, 0),
(2, 3714496353984310, 1670, 'LKR', 'calbares@gmail.com', '3 Mcauley Dr', '3 Mcauley Dr', '131.26.192.174', 'IT1584', 0, '2015-01-02 16:35:00.000000', 0, 0),
(3, 3714496353984310, 601960, 'EUR', 'tawna@gmail.com', '322 New Horizon Blvd', '322 New Horizon Blvd', '115.137.172.173', 'IT1302', 0, '2015-01-02 23:45:08.000000', 0, 0),
(17, 4078560052521110, 147368, 'LKR', 'laurel_reitler@reitler.com', '3273 State St', '3273 State St', '84.82.129.59', 'IT1824', 0, '2015-01-10 01:27:23.000000', 0, 0),
(13, 4078560052521110, 289176, 'GBP', 'kris@gmail.com', '34 Center St', '34 Center St', '27.114.94.126', 'IT1549', 0, '2015-01-07 15:52:51.000000', 0, 0),
(21, 5055210036965540, 28124, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', '37275 St  Rt 17m M', '108.68.115.103', 'IT1573', 0, '2015-01-13 11:48:00.000000', 0, 0),
(24, 5055210036965540, 500, 'LKR', 'vmondella@mondella.com', '394 Manchester Blvd', '394 Manchester Blvd', '29.188.20.178', 'IT1227', 0, '2015-01-14 20:48:06.000000', 0, 0),
(4, 3782822463100050, 44737, 'LKR', 'lpaprocki@hotmail.com', '4 B Blue Ridge Blvd', '4 B Blue Ridge Blvd', '94.154.94.130', 'IT1496', 0, '2015-01-03 01:35:51.000000', 0, 0),
(14, 4078560052521110, 3594, 'LKR', 'fletcher.flosi@yahoo.com', '5 Boston Ave #88', '5 Boston Ave #88', '35.103.76.170', 'IT1154', 0, '2015-01-09 14:39:48.000000', 0, 0),
(6, 3782822463100050, 2515935, 'LKR', 'shenika@gmail.com', '56 E Morehead St', '56 E Morehead St', '48.154.179.86', 'IT1344', 0, '2015-01-04 23:10:20.000000', 0, 0),
(25, 5055210036965540, 24100, 'LKR', 'johnetta_abdallah@aol.com', '6 Greenleaf Ave', '6 Greenleaf Ave', '192.89.105.91', 'IT1945', 0, '2015-01-15 20:33:08.000000', 0, 0),
(16, 4078560052521110, 1000, 'LKR', 'kallie.blackwood@gmail.com', '6 S 33rd St', '6 S 33rd St', '173.168.30.45', 'IT1906', 0, '2015-01-09 20:59:36.000000', 0, 0),
(18, 4088530014523650, 888664, 'USD', 'brhym@rhym.com', '618 W Yakima Ave', '618 W Yakima Ave', '96.61.140.185', 'IT1015', 0, '2015-01-11 13:53:28.000000', 0, 0),
(9, 3787344936710000, 2590, 'JPY', 'leota@hotmail.com', '639 Main St', '639 Main St', '192.113.129.59', 'IT1928', 0, '2015-01-06 02:14:38.000000', 0, 0),
(12, 4078560052521110, 2043, 'LKR', 'jbutt@gmail.com', '6649 N Blue Gum St', '6649 N Blue Gum St', '13.33.21.149', 'IT1506', 0, '2015-01-07 00:40:52.000000', 0, 0),
(23, 5055210036965540, 26500, 'LKR', 'deeanna_juhas@gmail.com', '69734 E Carrillo St', '69734 E Carrillo St', '173.83.99.127', 'IT1849', 0, '2015-01-13 15:51:20.000000', 0, 0),
(10, 3787344936710000, 478, 'LKR', 'meaghan@hotmail.com', '7 Eads St', '7 Eads St', '151.125.145.178', 'IT1912', 0, '2015-01-06 20:06:11.000000', 0, 0),
(19, 5055210036965540, 5442, 'LKR', 'gladys.rim@rim.org', '7 W Jackson Blvd', '7 W Jackson Blvd', '111.179.68.33', 'IT1026', 0, '2015-01-12 04:58:36.000000', 0, 0),
(7, 3782822463100050, 166, 'LKR', 'delmy.ahle@hotmail.com', '73 State Road 434 E', '73 State Road 434 E', '120.94.72.95', 'IT1066', 0, '2015-01-05 02:56:25.000000', 0, 0),
(8, 3782822463100050, 1432941, 'USD', 'micaela_rhymes@gmail.com', '74 S Westgate St', '74 S Westgate St', '58.183.75.123', 'IT1825', 0, '2015-01-05 07:45:08.000000', 0, 0),
(1, 3714496353984310, 3380, 'USD', 'mitsue_tollner@yahoo.com', '8 W Cerritos Ave #54', '8 W Cerritos Ave #54', '131.26.192.174', 'IT1584', 0, '2015-01-02 16:34:52.000000', 0, 0),
(22, 5055210036965540, 694, 'LKR', 'lperin@perin.org', '98 Connecticut Ave Nw', '98 Connecticut Ave Nw', '102.76.99.192', 'IT1150', 0, '2015-01-13 15:39:25.000000', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `statestream`
--

CREATE TABLE `statestream` (
  `txnid` int(20) NOT NULL,
  `cardnum` bigint(16) NOT NULL,
  `itemNo` varchar(255) NOT NULL,
  `txnamt` double NOT NULL,
  `currency` varchar(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shippingaddress` varchar(255) NOT NULL,
  `billingaddress` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `timestamp` datetime(6) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statestream`
--

INSERT INTO `statestream` (`txnid`, `cardnum`, `itemNo`, `txnamt`, `currency`, `email`, `shippingaddress`, `billingaddress`, `ip`, `qty`, `timestamp`, `state`) VALUES
(27, 13091994130910994, 'IT1309', 3000, 'INR', 'abc@company.com', '17 Sneha Enclave Dovton', '17 Sneha Enclave Dovton', '183.83.239.121', 2, '2017-04-02 10:20:30.210592', 'A'),
(26, 1020304050607080, 'IT1573', 2000, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', '37275 St  Rt 17m M', '108.68.115.103', 1, '2017-03-31 19:48:00.000000', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `suspiciousactivity`
--

CREATE TABLE `suspiciousactivity` (
  `cardnum` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(13) NOT NULL,
  `scoresum` float NOT NULL,
  `timestamp` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suspiciousip`
--

CREATE TABLE `suspiciousip` (
  `id` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suspiciousip`
--

INSERT INTO `suspiciousip` (`id`, `ip`) VALUES
(1, '94.154.94.130');

-- --------------------------------------------------------

--
-- Table structure for table `suspiciousmail`
--

CREATE TABLE `suspiciousmail` (
  `id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suspiciousmail`
--

INSERT INTO `suspiciousmail` (`id`, `email`) VALUES
(1, 'katelee@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `table2`
--

CREATE TABLE `table2` (
  `SYMBOL` varchar(255) DEFAULT NULL,
  `PRICE` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempstream`
--

CREATE TABLE `tempstream` (
  `txnid` int(20) NOT NULL,
  `cardnum` bigint(20) NOT NULL,
  `txnCount` int(5) NOT NULL,
  `txnamt` double NOT NULL,
  `currency` varchar(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shippingaddress` varchar(255) NOT NULL,
  `billingaddress` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `itemNo` varchar(255) NOT NULL,
  `timestamp` datetime(6) NOT NULL,
  `fraudflag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `cardnum` bigint(20) DEFAULT NULL,
  `txnamt` double DEFAULT NULL,
  `merchantid` varchar(255) DEFAULT NULL,
  `terminalloc` varchar(255) DEFAULT NULL,
  `terminalcountry` varchar(255) DEFAULT NULL,
  `acquirercountry` varchar(255) DEFAULT NULL,
  `acquirerid` bigint(20) DEFAULT NULL,
  `currency` varchar(4) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `shippingaddress` varchar(255) DEFAULT NULL,
  `shippingcountry` varchar(255) DEFAULT NULL,
  `billingaddress` varchar(255) DEFAULT NULL,
  `billingcountry` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `itemNo` varchar(255) DEFAULT NULL,
  `timestamp` datetime(6) DEFAULT NULL,
  `txnid` int(20) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`cardnum`, `txnamt`, `merchantid`, `terminalloc`, `terminalcountry`, `acquirercountry`, `acquirerid`, `currency`, `email`, `shippingaddress`, `shippingcountry`, `billingaddress`, `billingcountry`, `ip`, `itemNo`, `timestamp`, `txnid`, `phone`, `status`) VALUES
(3714496353984310, 3380, 'Ebay', '', 'AUS', 'Ukraine', 555055, 'USD', 'mitsue_tollner@yahoo.com', '8 W Cerritos Ave #54', 'Ukraine', '8 W Cerritos Ave #54', 'Ukraine', '131.26.192.174', 'IT1584', '2015-01-02 16:34:52.000000', 1, 0, ''),
(3714496353984310, 1670, 'CPC', 'Dehiwela', 'SL', 'Sri Lanka', 303030, 'LKR', 'calbares@gmail.com', '3 Mcauley Dr', 'Sri Lanka', '3 Mcauley Dr', 'Sri Lanka', '131.26.192.174', 'IT1584', '2015-01-02 16:35:00.000000', 2, 0, ''),
(3714496353984310, 601960, 'Sri Lankan Airlines', '', 'UK', 'Kenya', 355612, 'EUR', 'tawna@gmail.com', '322 New Horizon Blvd', 'Kenya', '322 New Horizon Blvd', 'Kenya', '115.137.172.173', 'IT1302', '2015-01-02 23:45:08.000000', 3, 0, ''),
(3782822463100050, 44737, 'Singer', '', 'US', 'Nigeria', 305520, 'LKR', 'lpaprocki@hotmail.com', '4 B Blue Ridge Blvd', 'Nigeria', '4 B Blue Ridge Blvd', 'Nigeria', '94.154.94.130', 'IT1496', '2015-01-03 01:35:51.000000', 4, 0, ''),
(3782822463100050, 700, 'Cargills', 'Pasyala', 'SL', 'Sri Lanka', 404090, 'LKR', 'bfigeroa@aol.com', '2371 Jerrold Ave', 'Sri Lanka', '2371 Jerrold Ave', 'Sri Lanka', '32.139.71.59', 'IT1491', '2015-01-04 14:34:33.000000', 5, 0, ''),
(3782822463100050, 2515935, 'Vogue Jewellers', 'Colombo 03', 'SL', 'Sri Lanka', 407856, 'LKR', 'shenika@gmail.com', '56 E Morehead St', 'Sri Lanka', '56 E Morehead St', 'Sri Lanka', '48.154.179.86', 'IT1344', '2015-01-04 23:10:20.000000', 6, 0, ''),
(3782822463100050, 166, 'Keels Super', 'Jaffna', 'SL', 'Sri Lanka', 589632, 'LKR', 'delmy.ahle@hotmail.com', '73 State Road 434 E', 'Sri Lanka', '73 State Road 434 E', 'Sri Lanka', '120.94.72.95', 'IT1066', '2015-01-05 02:56:25.000000', 7, 0, ''),
(3782822463100050, 1432941, 'Vogue Jewellers', 'Colombo 03', 'SL', 'US', 412352, 'USD', 'micaela_rhymes@gmail.com', '74 S Westgate St', 'US', '74 S Westgate St', 'US', '58.183.75.123', 'IT1825', '2015-01-05 07:45:08.000000', 8, 0, ''),
(3787344936710000, 2590, 'Ebay', '', 'US', 'Japan', 403855, 'JPY', 'leota@hotmail.com', '639 Main St', 'Japan', '639 Main St', 'Japan', '192.113.129.59', 'IT1928', '2015-01-06 02:14:38.000000', 9, 0, ''),
(3787344936710000, 478, 'Cargills', 'Kandy', 'SL', 'Sri Lanka', 407856, 'LKR', 'meaghan@hotmail.com', '7 Eads St', 'Sri Lanka', '7 Eads St', 'Sri Lanka', '151.125.145.178', 'IT1912', '2015-01-06 20:06:11.000000', 10, 0, ''),
(3787344936710000, 3181, 'Cargills', 'Matara', 'SL', 'Sri Lanka', 404090, 'LKR', 'elly_morocco@gmail.com', '1 State Route 27', 'Sri Lanka', '1 State Route 27', 'Sri Lanka', '116.40.85.35', 'IT1427', '2015-01-06 23:47:36.000000', 11, 0, ''),
(4078560052521110, 2043, 'Keels Super', 'Colombo 01', 'SL', 'Sri Lanka', 407856, 'LKR', 'jbutt@gmail.com', '6649 N Blue Gum St', 'Sri Lanka', '6649 N Blue Gum St', 'Sri Lanka', '13.33.21.149', 'IT1506', '2015-01-07 00:40:52.000000', 12, 0, ''),
(4078560052521110, 289176, 'Sri Lankan Airlines', 'Colombo 01', 'SL', 'UK ', 555222, 'GBP', 'kris@gmail.com', '34 Center St', 'UK ', '34 Center St', 'UK ', '27.114.94.126', 'IT1549', '2015-01-07 15:52:51.000000', 13, 0, ''),
(4078560052521110, 3594, 'Keels Super', 'Galle', 'SL', 'Sri Lanka', 589632, 'LKR', 'fletcher.flosi@yahoo.com', '5 Boston Ave #88', 'Sri Lanka', '5 Boston Ave #88', 'Sri Lanka', '35.103.76.170', 'IT1154', '2015-01-09 14:39:48.000000', 14, 0, ''),
(4078560052521110, 23704, 'Damro', 'Nawala', 'SL', 'Sri Lanka', 465221, 'LKR', 'asergi@gmail.com', '25 E 75th St #69', 'Sri Lanka', '25 E 75th St #69', 'Sri Lanka', '32.179.84.157', 'IT1027', '2015-01-09 20:03:28.000000', 15, 0, ''),
(4078560052521110, 1000, 'Cargills', 'Negombo', 'SL', 'Sri Lanka', 465221, 'LKR', 'kallie.blackwood@gmail.com', '6 S 33rd St', 'Sri Lanka', '6 S 33rd St', 'Sri Lanka', '173.168.30.45', 'IT1906', '2015-01-09 20:59:36.000000', 16, 0, ''),
(4078560052521110, 147368, 'PC House', 'Colombo 04', 'SL', 'Sri Lanka', 465221, 'LKR', 'laurel_reitler@reitler.com', '3273 State St', 'Sri Lanka', '3273 State St', 'Sri Lanka', '84.82.129.59', 'IT1824', '2015-01-10 01:27:23.000000', 17, 0, ''),
(4088530014523650, 888664, 'Sri Lankan Airlines', '', 'US', 'US', 405055, 'USD', 'brhym@rhym.com', '618 W Yakima Ave', 'US', '618 W Yakima Ave', 'US', '96.61.140.185', 'IT1015', '2015-01-11 13:53:28.000000', 18, 0, ''),
(5055210036965540, 5442, 'Keels Super', 'Galle', 'SL', 'Sri Lanka', 465221, 'LKR', 'gladys.rim@rim.org', '7 W Jackson Blvd', 'Sri Lanka', '7 W Jackson Blvd', 'Sri Lanka', '111.179.68.33', 'IT1026', '2015-01-12 04:58:36.000000', 19, 0, ''),
(5055210036965540, 1047967, 'Vogue Jewellers', 'Colombo 03', 'SL', 'Italy', 545452, 'LKR', 'wkusko@yahoo.com', '228 Runamuck Pl #2808', 'Italy', '228 Runamuck Pl #2808', 'Italy', '71.155.65.35', 'IT1133', '2015-01-13 02:58:26.000000', 20, 0, ''),
(5055210036965540, 28124, 'Singer', 'Kurunegala', 'SL', 'Sri Lanka', 407856, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', 'Sri Lanka', '37275 St  Rt 17m M', 'Sri Lanka', '108.68.115.103', 'IT1573', '2015-01-13 11:48:00.000000', 21, 0, ''),
(5055210036965540, 694, 'Arpico', 'Hyde Park Corner', 'SL', 'Sri Lanka', 589632, 'LKR', 'lperin@perin.org', '98 Connecticut Ave Nw', 'Sri Lanka', '98 Connecticut Ave Nw', 'Sri Lanka', '102.76.99.192', 'IT1150', '2015-01-13 15:39:25.000000', 22, 0, ''),
(5055210036965540, 26500, 'Keels Super', 'Trincomalee', 'SL', 'Sri Lanka', 404090, 'LKR', 'deeanna_juhas@gmail.com', '69734 E Carrillo St', 'Sri Lanka', '69734 E Carrillo St', 'Sri Lanka', '173.83.99.127', 'IT1849', '2015-01-13 15:51:20.000000', 23, 0, ''),
(5055210036965540, 500, 'Carnival', 'Colombo 03', 'SL', 'Sri Lanka', 407856, 'LKR', 'vmondella@mondella.com', '394 Manchester Blvd', 'Sri Lanka', '394 Manchester Blvd', 'Sri Lanka', '29.188.20.178', 'IT1227', '2015-01-14 20:48:06.000000', 24, 0, ''),
(5055210036965540, 24100, 'Dankotuwa', 'Colombo 03', 'SL', 'Sri Lanka', 407856, 'LKR', 'johnetta_abdallah@aol.com', '6 Greenleaf Ave', 'Sri Lanka', '6 Greenleaf Ave', 'Sri Lanka', '192.89.105.91', 'IT1945', '2015-01-15 20:33:08.000000', 25, 0, ''),
(1020304050607080, 2000, 'Singer', 'Kurunegala', 'SL', 'Sri Lanka', 407856, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', 'Sri Lanka', '37275 St  Rt 17m M', 'Sri Lanka', '108.68.115.103', 'IT1573', '2017-03-31 19:48:00.000000', 26, 0, ''),
(13091994130910994, 3000, 'Amazon', 'Hyderabad', 'IND', 'India', 512398, 'INR', 'abc@company.com', '17 Sneha Enclave Dovton', 'India', '17 Sneha Enclave Dovton', 'India', '183.83.239.121', 'IT1309', '2017-04-02 10:20:30.210592', 27, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklisted`
--
ALTER TABLE `blacklisted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comparestream`
--
ALTER TABLE `comparestream`
  ADD PRIMARY KEY (`cardnum`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD UNIQUE KEY `txnid` (`txnid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blacklisted`
--
ALTER TABLE `blacklisted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `txnid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
