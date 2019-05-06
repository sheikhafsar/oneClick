-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2019 at 11:54 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oneclick`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL,
  `membership` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryagent`
--

CREATE TABLE `deliveryagent` (
  `agent_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `retailer_id` int(5) NOT NULL,
  `storeName` varchar(50) NOT NULL,
  `storeAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`retailer_id`, `storeName`, `storeAddress`) VALUES
(2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userType` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `profile_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstName`, `lastName`, `dob`, `gender`, `username`, `password`, `userType`, `address`, `email`, `contact_number`, `profile_pic`) VALUES
(1, 'aa', 'aa', '2019-05-07', 'm', 'aa', 'aa', 'admin', 'Margao', 'sheikhafsar72@gmail.com', '7038137214', 'afsdf'),
(2, 'rr', 'rr', '2019-05-07', 'f', 'rr', 'rr', 'retailer', 'Margao', 'sheikhafsar72@gmail.com', '7038137214', 'rr');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `insert_user` AFTER INSERT ON `user` FOR EACH ROW BEGIN

IF	new.userType like "customer"
	THEN
	insert into customer(customer_id) VALUES (new.user_id);
END IF;

IF	new.userType like "retailer"
	THEN
	insert into retailer(retailer_id) VALUES (new.user_id);
END IF;

IF	new.userType like "deliveryagent"
	THEN
	insert into deliveryagent(retailer_id) VALUES (new.user_id);
END IF;

IF	new.userType like "admin"
	THEN
	insert into admin(admin_id) VALUES (new.user_id);
END IF;


END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `admin_ibfk_1` (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD KEY `customer_ibfk_1` (`customer_id`);

--
-- Indexes for table `deliveryagent`
--
ALTER TABLE `deliveryagent`
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD KEY `retailer_ibfk_1` (`retailer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `deliveryagent`
--
ALTER TABLE `deliveryagent`
  ADD CONSTRAINT `deliveryagent_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `retailer`
--
ALTER TABLE `retailer`
  ADD CONSTRAINT `retailer_ibfk_1` FOREIGN KEY (`retailer_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
