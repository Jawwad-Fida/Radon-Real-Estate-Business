-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 04:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `radon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `identity_num` char(5) NOT NULL,
  `admin_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `user_id`, `identity_num`, `admin_type`) VALUES
(1, 'jawwad', 1, 'nvwsl', 'marketing'),
(2, 'mimo', 3, 'kjdhn', 'marketing'),
(3, 'tarin', 17, '', 'finance_and_account'),
(5, 'rafi', 18, '', 'finance_and_account');

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `apartment_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `building_name` varchar(50) NOT NULL,
  `flat_no` varchar(10) NOT NULL,
  `no_of_bedroom` int(11) NOT NULL,
  `no_of_bathroom` int(11) NOT NULL,
  `image` text NOT NULL,
  `buy_price` double NOT NULL,
  `rent_price` double NOT NULL,
  `area` int(50) DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `type` varchar(50) NOT NULL,
  `apartment_status` varchar(50) NOT NULL,
  `features` text NOT NULL,
  `division` varchar(25) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `client_username` varchar(20) NOT NULL,
  `build_num` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`apartment_id`, `building_id`, `building_name`, `flat_no`, `no_of_bedroom`, `no_of_bathroom`, `image`, `buy_price`, `rent_price`, `area`, `status`, `type`, `apartment_status`, `features`, `division`, `address`, `client_username`, `build_num`) VALUES
(1, 20, 'Blue Garden', 'A1', 3, 2, 'images/apartment_images/fp-11.jpg', 2500000, 60000, 1600, 'Not Booked', 'House', 'Rent', 'Air Conditioning,Swimming Pool,Central Heating,Window Covering,Refrigerator,TV Cable & WIFI,', 'Dhaka', 'Dhanmondi', '', 'BLU73'),
(2, 20, 'Blue Garden', 'A3', 3, 3, 'images/apartment_images/p-3.jpg', 4500000, 27000, 2300, 'Booked', 'House', 'Rent', 'Air Conditioning,Gym,Alarm,Microwave,', 'Dhaka', 'Dhanmondi', 'tazree5961', 'BLU73'),
(3, 20, 'Blue Garden', 'A2', 3, 3, 'images/apartment_images/p-5.jpg', 3600000, 25000, 1600, 'Not Booked', 'Commercial', 'Buy', 'Central Heating,Laundry Room,Gym,Alarm,Window Covering,Refrigerator,', 'Dhaka', 'Dhanmondi', '', 'BLU73'),
(6, 21, 'Glass House', 'B3', 3, 2, 'images/apartment_images/fp-1.jpg', 4000000, 27000, 2100, 'Not Booked', 'House', 'Buy', 'Laundry Room,Alarm,Window Covering,TV Cable & WIFI,', 'Dhaka', 'Gulshan', '', 'GLH21'),
(7, 22, 'Sigma House', 'C1', 3, 2, 'images/apartment_images/fp-11.jpg', 3000000, 22000, 2300, 'Not Booked', 'House', 'Rent', 'Swimming Pool,Central Heating,Laundry Room,TV Cable & WIFI,Microwave,', 'Dhaka', 'Banani', '', 'SH75'),
(8, 22, 'Sigma House', 'C2', 2, 2, 'images/apartment_images/p-3.jpg', 3500000, 24000, 2300, 'Not Booked', 'House', 'Buy', 'Swimming Pool,Central Heating,Laundry Room,Alarm,TV Cable & WIFI,Microwave,', 'Dhaka', 'Banani', '', 'SH75'),
(9, 23, 'Garden House', 'D1', 4, 2, 'images/apartment_images/b-10.jpg', 4600000, 21000, 1900, 'Not Booked', 'House', 'Rent', 'Air Conditioning,Central Heating,TV Cable & WIFI,', 'Dhaka', 'Badda', '', 'GDH10'),
(10, 23, 'Garden House', 'D2', 3, 3, 'images/apartment_images/fp-11.jpg', 4300000, 26000, 2000, 'Not Booked', 'House', 'Buy', 'Air Conditioning,Central Heating,Laundry Room,Window Covering,TV Cable & WIFI,', 'Dhaka', 'Badda', '', 'GDH10'),
(11, 21, 'Glass House', 'B1', 3, 1, 'images/apartment_images/fp-1.jpg', 4000000, 25000, 1900, 'Booked', 'House', 'Rent', 'Laundry Room,Gym,Alarm,Refrigerator,TV Cable & WIFI,Microwave,', 'Dhaka', 'Gulshan', 'mahbub7310', 'GLH21'),
(12, 21, 'Glass House', 'B2', 3, 1, 'images/apartment_images/b-10.jpg', 3000000, 21000, 2000, 'Not Booked', 'House', 'Rent', 'Swimming Pool,Central Heating,TV Cable & WIFI,', 'Dhaka', 'Gulshan', '', 'GLH21');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `appoint_date` text NOT NULL,
  `appoint_time` time NOT NULL,
  `message` varchar(255) NOT NULL,
  `building_name` varchar(50) NOT NULL,
  `flat_no` varchar(10) NOT NULL,
  `request_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `building_id` int(11) NOT NULL,
  `building_name` varchar(50) NOT NULL,
  `no_of_flats` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `build_info` varchar(255) NOT NULL,
  `division` varchar(25) NOT NULL,
  `no_of_floors` int(11) NOT NULL,
  `build_num` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`building_id`, `building_name`, `no_of_flats`, `address`, `build_info`, `division`, `no_of_floors`, `build_num`) VALUES
(20, 'Blue Garden', 5, 'Dhanmondi', 'Loren Ipsum', 'Dhaka', 15, 'BLU73'),
(21, 'Glass House', 3, 'Gulshan', 'Loren Ipsum', 'Dhaka', 10, 'GLH21'),
(22, 'Sigma House', 4, 'Banani', 'Nice positioning , near main road , beautiful architecture', 'Dhaka', 11, 'SH75'),
(23, 'Garden House', 3, 'Badda', 'Nice building with lots of facilities', 'Dhaka', 9, 'GDH10');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `identity_num` char(5) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `building_name` varchar(255) DEFAULT NULL,
  `flat_number` varchar(255) DEFAULT NULL,
  `client_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `user_id`, `name`, `username`, `mobile_number`, `email`, `identity_num`, `occupation`, `present_address`, `permanent_address`, `gender`, `nationality`, `building_name`, `flat_number`, `client_type`) VALUES
(16, 24, 'Jannatul Tazree', 'tazree5961', '01521124258', 'tazreesmrity20@gmail.com', '', 'Employer', 'Dhanmondi', 'Eastern Bonobithi Apartment Block-L, Road 1/A,Banashree', 'female', 'Bangladeshi', 'Blue Garden', 'A3', 'Rent'),
(17, 25, 'Mahbub Alam', 'mahbub7310', '01677615892', 'alammahbub789@gmail.com', '', 'Employer', 'Gulshan', '375,baganbari,south badda(green heaven society)', 'male', 'Bangladeshi', 'Glass House', 'B1', 'Rent');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `build_num` varchar(25) NOT NULL,
  `flat_no` varchar(10) NOT NULL,
  `complaint_issue` varchar(50) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_details` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `admin_response` varchar(25) NOT NULL,
  `admin_reply` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `identity_num` char(5) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `division` varchar(50) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `username`, `user_id`, `mobile_number`, `email`, `identity_num`, `occupation`, `present_address`, `permanent_address`, `gender`, `nationality`, `division`, `age`) VALUES
(10, 'jesmine', 21, '01753699852', 'jesmine@hotmail.com', 'h$9wb', 'House Wife', 'Shankor, Dhanmondi', 'Nokhali, Lukhipur', 'male', 'Bangladeshi', 'Dhaka', 45),
(11, 'shafique', 22, '01745633258', 'shafique@gmail.com', 'rpfs(', 'Banker', 'Shankor, Dhanmondi', 'Titas, Comilla', 'male', 'Bangladeshi', 'Dhaka', 52),
(12, 'afia', 23, '01452755413', 'afia@gmail.com', '53z8b', 'Doctor', 'Mohammdpur', 'Chittagong Hill Tracks', 'male', 'Bangladeshi', 'Dhaka', 32);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `building_name` varchar(50) NOT NULL,
  `flat_no` varchar(10) NOT NULL,
  `client_username` varchar(50) NOT NULL,
  `billing_month` varchar(50) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `current_bill` int(11) NOT NULL,
  `arrear` int(11) DEFAULT NULL,
  `due_charge` double DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `total_bill` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `invoice_date` date NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `building_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flat_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_role` char(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_image` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `identity_num` char(5) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_role`, `name`, `username`, `user_email`, `user_password`, `user_image`, `date_of_birth`, `identity_num`, `token`) VALUES
(1, 'admin', 'Mohammed Jawwadul Islam', 'jawwad', 'skyabyss13@gmail.com', '$2y$10$lE8jP2Y3GGirM5wztOBKVuOI.UgrG8qfP/y7TFQ30H3QFlvaMnQXW', 'images/admin_images/Jawwad.jpg', '1998-05-22', 'nvwsl', ''),
(3, 'admin', 'Moumy Kabir', 'mimo', 'mimo@gmail.com', '$2y$10$ad/K2kxyOUx1tVjgAR3ec.ztD5ONd5OltZnGt1eTce2sbxkjx3PTa', 'images/admin_images/Mimo.jpg', '1998-12-06', 'kjdhn', ''),
(17, 'admin', 'Nafisa Tarin', 'tarin', 'tarin@gmail.com', '$2y$10$UVIyy74cC0sEaB/FwPce5OVqsMWT.S45REncde28c5JJ0KkIjd3aW', 'images/admin_images/Tarin.jpg', '1998-05-22', '', ''),
(18, 'admin', 'Fahad Al Rafi', 'rafi', 'rafi@gmail.com', '$2y$10$QIEDFK.YTQaW1eGDG76Eq./4TuiFE24D6zALN4v5Wi345VVz9Ffa2', 'images/admin_images/Rafi.jpg', '1998-05-22', '', ''),
(21, 'customer', 'Jesmine Akhter', 'jesmine', 'jesmine@hotmail.com', '$2y$10$5Bl/EA1xhr4PdnS0VcBimOG3IA7PpeeFKnFymj4nuGYyuF/hI4M.W', 'client_users/images/user_images/t-8.jpg', '1968-01-01', 'h$9wb', ''),
(22, 'customer', 'Shafiqul Islam', 'shafique', 'shafique@gmail.com', '$2y$10$wZPTL4JKsT178W5QFpzAPeVbrUQf5yKc115cbFt/8c8MHlZov5jwe', 'client_users/images/user_images/t-1.jpg', '1968-01-01', 'rpfs(', ''),
(23, 'customer', 'Afia Mohona', 'afia', 'afia@gmail.com', '$2y$10$RIj.lgfBGMX3Z.9BL5KST.HH86RFQa9URDd4wcr//xQO0siGb9xqC', 'client_users/images/user_images/afia.jpg', '1968-01-01', '53z8b', ''),
(24, 'client', 'Jannatul Tazree', 'tazree5961', 'tazreesmrity20@gmail.com', '$2y$10$xduTx5QqRoNfJ9eMvTzKNOdSKyJCc/eHbkT8eboJzJfJwYPQGfikm', 'images/user_images/t-8.jpg', '1993-09-07', '(1q2c', ''),
(25, 'client', 'Mahbub Alam', 'mahbub7310', 'alammahbub789@gmail.com', '$2y$10$IR5PkYMuBaXm9.rxFWGr6OZ5FDNwRk.wxLoC3oESO/MuO6X51ZSV2', 'images/user_images/t-1.jpg', '1983-08-09', '(xmf3', '');

-- --------------------------------------------------------

--
-- Table structure for table `utility_bill`
--

CREATE TABLE `utility_bill` (
  `utility_id` int(11) NOT NULL,
  `building_name` varchar(50) NOT NULL,
  `flat_no` varchar(50) NOT NULL,
  `month` text NOT NULL,
  `flat_status` varchar(50) NOT NULL,
  `rent` int(11) DEFAULT NULL,
  `water_bill` int(11) NOT NULL,
  `gas_bill` int(11) NOT NULL,
  `electricity_bill` int(11) NOT NULL,
  `additional_bill` int(11) NOT NULL,
  `service_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `uk2` (`username`,`identity_num`),
  ADD KEY `fk1` (`user_id`);

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`apartment_id`),
  ADD KEY `fk3` (`building_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`building_id`),
  ADD UNIQUE KEY `uk4` (`building_name`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `uk5` (`username`,`email`),
  ADD KEY `fk4` (`user_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `uk3` (`username`,`email`,`identity_num`),
  ADD KEY `fk2` (`user_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `uk1` (`username`,`user_email`,`identity_num`);

--
-- Indexes for table `utility_bill`
--
ALTER TABLE `utility_bill`
  ADD PRIMARY KEY (`utility_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `apartment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `utility_bill`
--
ALTER TABLE `utility_bill`
  MODIFY `utility_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`building_id`) REFERENCES `building` (`building_id`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
