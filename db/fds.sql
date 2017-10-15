-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 06:54 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fds`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_no` varchar(20) NOT NULL,
  `account_name` varchar(30) NOT NULL,
  `card_no` int(16) NOT NULL,
  `cvv_no` int(3) NOT NULL,
  `expiry_date` date NOT NULL,
  `pin` int(4) NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bankers`
--

CREATE TABLE `bankers` (
  `employee_id` varchar(15) NOT NULL,
  `sso_password` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `answer1` varchar(50) NOT NULL,
  `answer2` varchar(50) NOT NULL,
  `answer3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankers`
--

INSERT INTO `bankers` (`employee_id`, `sso_password`, `username`, `email`, `answer1`, `answer2`, `answer3`) VALUES
('1', 'e5ad7ae0fe48a230165d6b15f5be4e5f', 'shikha', 'shikha735@gmail.com', 'a', 'b', 'c'),
('2', '12ed51686a83dff335014f5960cf94a4', 'Anjali', 'anjali.sharma@gmail.com', '', '', ''),
('3', 'adf825e70a5bd444872f83e35086a851', 'Prasanna', 'prasanna.ailuri@gmail.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fraud`
--

CREATE TABLE `fraud` (
  `transaction_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(10) NOT NULL,
  `account_no` varchar(20) NOT NULL,
  `to_account` varchar(20) NOT NULL,
  `transaction_datetime` datetime NOT NULL,
  `amount` int(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `account_no`, `to_account`, `transaction_datetime`, `amount`, `location`, `ip_address`) VALUES
(1000000001, '1234567890', '9876543210', '2017-03-03 04:30:30', 1000, 'Hyderabad', '94.134.121.123'),
(1000000002, '1218783627351712', '1234432156788765', '2017-03-07 00:00:00', 2000, 'Chennai', '92.121.122.111'),
(1000000003, '1234512345', '6789067890', '2017-03-31 15:23:30', 3000, 'Hyderabad', '131.26.192.174');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankers`
--
ALTER TABLE `bankers`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000004;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
