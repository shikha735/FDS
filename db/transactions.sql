-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 04:51 PM
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
(3714496353984310, 3380, 'Ebay', '', 'AUS', 'Ukraine', 555055, 'USD', 'mitsue_tollner@yahoo.com', '8 W Cerritos Ave #54', 'Ukraine', '8 W Cerritos Ave #54', 'Ukraine', '131.26.192.174', 'IT1584', '2015-01-02 16:34:52.000000', 1, 0, 'completed'),
(3714496353984310, 1670, 'CPC', 'Dehiwela', 'SL', 'Sri Lanka', 303030, 'LKR', 'calbares@gmail.com', '3 Mcauley Dr', 'Sri Lanka', '3 Mcauley Dr', 'Sri Lanka', '131.26.192.174', 'IT1584', '2015-01-02 16:35:00.000000', 2, 0, 'blocked'),
(3714496353984310, 601960, 'Sri Lankan Airlines', '', 'UK', 'Kenya', 355612, 'EUR', 'tawna@gmail.com', '322 New Horizon Blvd', 'Kenya', '322 New Horizon Blvd', 'Kenya', '115.137.172.173', 'IT1302', '2015-01-02 23:45:08.000000', 3, 0, 'pending'),
(3782822463100050, 44737, 'Singer', '', 'US', 'Nigeria', 305520, 'LKR', 'lpaprocki@hotmail.com', '4 B Blue Ridge Blvd', 'Nigeria', '4 B Blue Ridge Blvd', 'Nigeria', '94.154.94.130', 'IT1496', '2015-01-03 01:35:51.000000', 4, 0, 'detected'),
(3782822463100050, 700, 'Cargills', 'Pasyala', 'SL', 'Sri Lanka', 404090, 'LKR', 'bfigeroa@aol.com', '2371 Jerrold Ave', 'Sri Lanka', '2371 Jerrold Ave', 'Sri Lanka', '32.139.71.59', 'IT1491', '2015-01-04 14:34:33.000000', 5, 0, 'completed'),
(3782822463100050, 2515935, 'Vogue Jewellers', 'Colombo 03', 'SL', 'Sri Lanka', 407856, 'LKR', 'shenika@gmail.com', '56 E Morehead St', 'Sri Lanka', '56 E Morehead St', 'Sri Lanka', '48.154.179.86', 'IT1344', '2015-01-04 23:10:20.000000', 6, 0, 'blocked'),
(3782822463100050, 166, 'Keels Super', 'Jaffna', 'SL', 'Sri Lanka', 589632, 'LKR', 'delmy.ahle@hotmail.com', '73 State Road 434 E', 'Sri Lanka', '73 State Road 434 E', 'Sri Lanka', '120.94.72.95', 'IT1066', '2015-01-05 02:56:25.000000', 7, 0, 'pending'),
(3782822463100050, 1432941, 'Vogue Jewellers', 'Colombo 03', 'SL', 'US', 412352, 'USD', 'micaela_rhymes@gmail.com', '74 S Westgate St', 'US', '74 S Westgate St', 'US', '58.183.75.123', 'IT1825', '2015-01-05 07:45:08.000000', 8, 0, 'detected'),
(3787344936710000, 2590, 'Ebay', '', 'US', 'Japan', 403855, 'JPY', 'leota@hotmail.com', '639 Main St', 'Japan', '639 Main St', 'Japan', '192.113.129.59', 'IT1928', '2015-01-06 02:14:38.000000', 9, 0, 'completed'),
(3787344936710000, 478, 'Cargills', 'Kandy', 'SL', 'Sri Lanka', 407856, 'LKR', 'meaghan@hotmail.com', '7 Eads St', 'Sri Lanka', '7 Eads St', 'Sri Lanka', '151.125.145.178', 'IT1912', '2015-01-06 20:06:11.000000', 10, 0, 'blocked'),
(3787344936710000, 3181, 'Cargills', 'Matara', 'SL', 'Sri Lanka', 404090, 'LKR', 'elly_morocco@gmail.com', '1 State Route 27', 'Sri Lanka', '1 State Route 27', 'Sri Lanka', '116.40.85.35', 'IT1427', '2015-01-06 23:47:36.000000', 11, 0, 'pending'),
(4078560052521110, 2043, 'Keels Super', 'Colombo 01', 'SL', 'Sri Lanka', 407856, 'LKR', 'jbutt@gmail.com', '6649 N Blue Gum St', 'Sri Lanka', '6649 N Blue Gum St', 'Sri Lanka', '13.33.21.149', 'IT1506', '2015-01-07 00:40:52.000000', 12, 0, 'detected'),
(4078560052521110, 289176, 'Sri Lankan Airlines', 'Colombo 01', 'SL', 'UK ', 555222, 'GBP', 'kris@gmail.com', '34 Center St', 'UK ', '34 Center St', 'UK ', '27.114.94.126', 'IT1549', '2015-01-07 15:52:51.000000', 13, 0, 'completed'),
(4078560052521110, 3594, 'Keels Super', 'Galle', 'SL', 'Sri Lanka', 589632, 'LKR', 'fletcher.flosi@yahoo.com', '5 Boston Ave #88', 'Sri Lanka', '5 Boston Ave #88', 'Sri Lanka', '35.103.76.170', 'IT1154', '2015-01-09 14:39:48.000000', 14, 0, 'blocked'),
(4078560052521110, 23704, 'Damro', 'Nawala', 'SL', 'Sri Lanka', 465221, 'LKR', 'asergi@gmail.com', '25 E 75th St #69', 'Sri Lanka', '25 E 75th St #69', 'Sri Lanka', '32.179.84.157', 'IT1027', '2015-01-09 20:03:28.000000', 15, 0, 'pending'),
(4078560052521110, 1000, 'Cargills', 'Negombo', 'SL', 'Sri Lanka', 465221, 'LKR', 'kallie.blackwood@gmail.com', '6 S 33rd St', 'Sri Lanka', '6 S 33rd St', 'Sri Lanka', '173.168.30.45', 'IT1906', '2015-01-09 20:59:36.000000', 16, 0, 'detected'),
(4078560052521110, 147368, 'PC House', 'Colombo 04', 'SL', 'Sri Lanka', 465221, 'LKR', 'laurel_reitler@reitler.com', '3273 State St', 'Sri Lanka', '3273 State St', 'Sri Lanka', '84.82.129.59', 'IT1824', '2015-01-10 01:27:23.000000', 17, 0, 'completed'),
(4088530014523650, 888664, 'Sri Lankan Airlines', '', 'US', 'US', 405055, 'USD', 'brhym@rhym.com', '618 W Yakima Ave', 'US', '618 W Yakima Ave', 'US', '96.61.140.185', 'IT1015', '2015-01-11 13:53:28.000000', 18, 0, 'blocked'),
(5055210036965540, 5442, 'Keels Super', 'Galle', 'SL', 'Sri Lanka', 465221, 'LKR', 'gladys.rim@rim.org', '7 W Jackson Blvd', 'Sri Lanka', '7 W Jackson Blvd', 'Sri Lanka', '111.179.68.33', 'IT1026', '2015-01-12 04:58:36.000000', 19, 0, 'pending'),
(5055210036965540, 1047967, 'Vogue Jewellers', 'Colombo 03', 'SL', 'Italy', 545452, 'LKR', 'wkusko@yahoo.com', '228 Runamuck Pl #2808', 'Italy', '228 Runamuck Pl #2808', 'Italy', '71.155.65.35', 'IT1133', '2015-01-13 02:58:26.000000', 20, 0, 'detected'),
(5055210036965540, 28124, 'Singer', 'Kurunegala', 'SL', 'Sri Lanka', 407856, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', 'Sri Lanka', '37275 St  Rt 17m M', 'Sri Lanka', '108.68.115.103', 'IT1573', '2015-01-13 11:48:00.000000', 21, 0, 'completed'),
(5055210036965540, 694, 'Arpico', 'Hyde Park Corner', 'SL', 'Sri Lanka', 589632, 'LKR', 'lperin@perin.org', '98 Connecticut Ave Nw', 'Sri Lanka', '98 Connecticut Ave Nw', 'Sri Lanka', '102.76.99.192', 'IT1150', '2015-01-13 15:39:25.000000', 22, 0, 'blocked'),
(5055210036965540, 26500, 'Keels Super', 'Trincomalee', 'SL', 'Sri Lanka', 404090, 'LKR', 'deeanna_juhas@gmail.com', '69734 E Carrillo St', 'Sri Lanka', '69734 E Carrillo St', 'Sri Lanka', '173.83.99.127', 'IT1849', '2015-01-13 15:51:20.000000', 23, 0, 'pending'),
(5055210036965540, 500, 'Carnival', 'Colombo 03', 'SL', 'Sri Lanka', 407856, 'LKR', 'vmondella@mondella.com', '394 Manchester Blvd', 'Sri Lanka', '394 Manchester Blvd', 'Sri Lanka', '29.188.20.178', 'IT1227', '2015-01-14 20:48:06.000000', 24, 0, 'detected'),
(5055210036965540, 24100, 'Dankotuwa', 'Colombo 03', 'SL', 'Sri Lanka', 407856, 'LKR', 'johnetta_abdallah@aol.com', '6 Greenleaf Ave', 'Sri Lanka', '6 Greenleaf Ave', 'Sri Lanka', '192.89.105.91', 'IT1945', '2015-01-15 20:33:08.000000', 25, 0, 'completed'),
(1020304050607080, 2000, 'Singer', 'Kurunegala', 'SL', 'Sri Lanka', 407856, 'LKR', 'ammie@corrio.com', '37275 St  Rt 17m M', 'Sri Lanka', '37275 St  Rt 17m M', 'Sri Lanka', '108.68.115.103', 'IT1573', '2017-03-31 19:48:00.000000', 26, 0, ''),
(13091994130910994, 3000, 'Amazon', 'Hyderabad', 'IND', 'India', 512398, 'INR', 'abc@company.com', '17 Sneha Enclave Dovton', 'India', '17 Sneha Enclave Dovton', 'India', '183.83.239.121', 'IT1309', '2017-04-02 10:20:30.210592', 27, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD UNIQUE KEY `txnid` (`txnid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `txnid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
