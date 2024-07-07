-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 10:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Acc_ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL DEFAULT '00000000000',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Acc_ID`, `username`, `password`, `phone_number`, `status`) VALUES
(1, 'alice_smith', 'password123', '01155566666', 'active'),
(2, 'bob_jones', 'securepwd456', '01345532557', 'active'),
(3, 'charlie_brown', 'strongpwd789', '01255577775', 'active'),
(4, 'diana_clark', 'safe1234', '01566622225', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_description` longtext DEFAULT NULL,
  `Customer_Address` longtext DEFAULT NULL,
  `order_status` enum('processing','delivered','cancelled') NOT NULL DEFAULT 'processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_name`, `order_description`, `Customer_Address`, `order_status`) VALUES
(12, 'bob_jones', 'banana leaf rice - Quantity: 2 beef rendang - Quantity: 2', 'jalan D1,ixora apartment', 'processing'),
(13, 'bob_jones', 'banana leaf rice - Quantity: 2 beef rendang - Quantity: 2', '12,jalan melur 3', 'processing'),
(14, 'bob_jones', 'banana leaf rice - Quantity: 2 beef rendang - Quantity: 2', 'jalan D1,ixora apartment', 'processing'),
(15, 'bob_jones', 'banana leaf rice - Quantity: 2 beef rendang - Quantity: 2', 'jalan D1,ixora apartment', 'processing'),
(16, 'bob_jones', 'banana leaf rice - Quantity: 2 beef rendang - Quantity: 2', 'jalan D1,ixora apartment', 'processing'),
(17, 'bob_jones', 'banana leaf rice - Quantity: 2 beef rendang - Quantity: 2', '12,jalan melur 3,taman sri alam', 'processing'),
(18, 'bob_jones', 'banana leaf rice - Quantity: 2 beef rendang - Quantity: 2', '12,jalan melur 3,taman sri alam', 'processing'),
(19, 'bob_jones', 'banana leaf rice - Quantity: 2 beef rendang - Quantity: 2', '12,jalan melur 3,taman sri alam', 'processing'),
(21, 'bob_jones', 'banana leaf rice - Quantity: 2 beef rendang - Quantity: 2', '12,jalan melur 3,taman sri alam', 'processing'),
(22, 'bob_jones', 'banana leaf rice - Quantity: 2 beef rendang - Quantity: 2', 'jalan D1,ixora apartment', 'processing'),
(23, 'bob_jones', 'banana leaf rice - Quantity: 2 beef rendang - Quantity: 2', '12,jalan melur 3,taman sri alam', 'processing'),
(24, 'bob_jones', 'banana leaf rice - Quantity: 1 beef rendang - Quantity: 1', '213123', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(11) NOT NULL,
  `staff_username` varchar(50) NOT NULL,
  `staff_password` varchar(255) NOT NULL,
  `staff_status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `staff_username`, `staff_password`, `staff_status`) VALUES
(1, 'john_doe', 'johnspwd123', 'active'),
(2, 'jane_smith', 'janesecure456', 'active'),
(3, 'sam_wilson', 'samstrongpwd789', 'active'),
(4, 'emily_parker', 'emilysafe1234', 'active'),
(6, 'wong kok seng', 'wong83856789', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tran_id` int(11) NOT NULL,
  `Acc_ID` int(11) DEFAULT NULL,
  `cardholder_name` longtext DEFAULT NULL,
  `billing_address` longtext DEFAULT NULL,
  `city` longtext DEFAULT NULL,
  `state` longtext DEFAULT NULL,
  `zip_code` longtext DEFAULT NULL,
  `card_number` longtext DEFAULT NULL,
  `exp_date` longtext DEFAULT NULL,
  `cvv` longtext DEFAULT NULL,
  `tran_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tran_id`, `Acc_ID`, `cardholder_name`, `billing_address`, `city`, `state`, `zip_code`, `card_number`, `exp_date`, `cvv`, `tran_time`) VALUES
(1, 2, 'Wong Kok Seng', '12,jalan melur 3', 'Segamat', 'Johor', '85100', '4283322177563490', '12/24', '134', '2024-07-07 04:13:01'),
(2, 2, 'Wong Kok Seng', '10,jalan melur', 'Segamat', 'Johor', '12345', '43284028349024', '24/32', '123', '2024-07-07 06:59:45'),
(3, 2, 'wong', '12,jalan melur 3', 'Segamat', 'Johor', '1231221', '21312312312123', '12312312', '12312312', '2024-07-07 07:08:15'),
(4, 2, 'Wong Kok Seng', '12,jalan melur 3', 'Segamat', 'Johor', '1231221', '1212312312321123', '123123132', '1312123', '2024-07-07 07:10:37'),
(5, 2, 'Wong Kok Seng', '12,jalan melur 3', 'Segamat', 'Johor', '1231221', '1231321312312', '123123213', '321132123', '2024-07-07 07:14:46'),
(6, 2, 'Wong Kok Seng', '12,jalan melur 3', 'Segamat', 'Johor', '1231221', '2131231231223', '12312321', '123132', '2024-07-07 07:23:36'),
(7, 2, 'Wong Kok Seng', '12,jalan melur 3', 'Segamat', '1232131', '1231221', '213123132123', '132213', '213132123', '2024-07-07 08:03:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Acc_ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_customer_name` (`customer_name`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD UNIQUE KEY `staff_username` (`staff_username`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tran_id`),
  ADD KEY `Acc_ID` (`Acc_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Acc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_customer_name` FOREIGN KEY (`customer_name`) REFERENCES `customer` (`username`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`Acc_ID`) REFERENCES `customer` (`Acc_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
