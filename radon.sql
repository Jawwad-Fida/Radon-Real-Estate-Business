-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 11:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

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
(5, 'rafi', 18, '', 'finance_and_account'),
(6, 'aysha', 14, '', 'marketing');

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
  `area` varchar(50) DEFAULT NULL,
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
(3, 6, 'Rafi Kingdom', 'B2', 4, 5, 'images/apartment_images/fp-11.jpg', 6750000, 50000, '3600 sq ft', 'Booked', 'Commercial', 'Buy', 'Air Conditioning, Central Heating, Alarm', 'Dhaka', 'Badda', 'pranto0432', 'RAF5'),
(6, 3, 'JawwadHarem', 'A3', 3, 3, 'images/apartment_images/p-3.jpg', 560000, 20000, '1300 sq ft', 'Booked', 'House', 'Rent', 'Air Conditioning,Window Covering,', 'Dhaka', 'Dhanmondi', 'pranto3719', 'JH1'),
(8, 12, 'Kabir Apartments', 'A2', 3, 3, 'images/apartment_images/p-3.jpg', 250000, 50000, '1300 sq ft', 'Booked', 'House', 'Rent', 'Air Conditioning,Central Heating,Window Covering,TV Cable & WIFI,', 'Barisal', 'Farmgate', 'imran1111', 'KA64'),
(9, 12, 'Kabir Apartments', 'D1', 4, 4, 'images/apartment_images/p-3.jpg', 3956000, 42000, '2200 sq ft', 'Not Booked', 'Commercial', 'Buy', 'Air Conditioning,Central Heating,Alarm,Window Covering,TV Cable & WIFI,Microwave,', 'Chittagong', 'Farmgate', '', 'KA64'),
(10, 3, 'JawwadHarem', 'D4', 4, 4, 'images/apartment_images/p-3.jpg', 3956000, 42000, '2500 sq ft', 'Booked', 'Commercial', 'Buy', 'Air Conditioning,Central Heating,Alarm,Window Covering,TV Cable & WIFI,Microwave,', 'Dhaka', 'Farmgate', 'afia7839', 'JH1'),
(13, 8, 'Tarin Dream Home', 'D3', 2, 2, 'images/apartment_images/p-3.jpg', 1956000, 42000, '1500 sq ft', 'Not Booked', 'Commercial', 'Rent', 'Air Conditioning,Central Heating,Alarm,Window Covering,TV Cable & WIFI,Microwave,', 'Chittagong', 'Chittagong ', '', 'TAR62'),
(15, 7, 'Pranto Fanta sea', 'C1', 5, 4, 'images/apartment_images/fp-12.jpg', 9800000, 56000, '2400 sq ft', 'Not Booked', 'House', 'Buy', 'Air Conditioning,Swimming Pool,Central Heating,Alarm,Window Covering,Refrigerator,TV Cable & WIFI,', 'Dhaka', 'Gulshan', '', 'POT65'),
(17, 6, 'Rafi Kingdom', 'C5', 4, 4, 'images/apartment_images/fp-12.jpg', 8800000, 46000, '2200 sq ft', 'Not Booked', 'House', 'Rent', 'Air Conditioning,Swimming Pool,Central Heating,Alarm,Window Covering,Refrigerator,TV Cable & WIFI,', 'Dhaka', 'dhanmondi', '', 'RAF5'),
(19, 17, 'Mill Home', 'A2', 4, 4, 'images/apartment_images/fp-12.jpg', 8800000, 46000, '2200 sq ft', 'Not Booked', 'House', 'Buy', 'Air Conditioning,Swimming Pool,Central Heating,Alarm,Window Covering,Refrigerator,TV Cable & WIFI,', 'Dhaka', 'dhanmondi', '', ''),
(20, 17, 'Mill Home', 'C2', 5, 4, 'images/apartment_images/fp-12.jpg', 7800000, 56000, '2400 sq ft', 'Not Booked', 'House', 'Rent', 'Air Conditioning,Swimming Pool,Central Heating,Alarm,Window Covering,Refrigerator,TV Cable & WIFI,', 'Dhaka', 'Dhanmondi ', '', ''),
(21, 18, 'cottage Home', 'D1', 5, 4, 'images/apartment_images/p-3.jpg', 956000, 42000, '2200 sq ft', 'Not Booked', 'Commercial', 'Buy', 'Air Conditioning,Central Heating,Alarm,Window Covering,TV Cable & WIFI,Microwave,', 'Dhaka', 'Badda', '', ''),
(22, 18, 'cottage Home', 'D6', 5, 4, 'images/apartment_images/p-3.jpg', 856000, 42000, '2200 sq ft', 'Not Booked', 'Commercial', 'Rent', 'Air Conditioning,Central Heating,Alarm,Window Covering,TV Cable & WIFI,Microwave,', 'Dhaka', 'Badda', '', ''),
(23, 17, 'Mill Home', 'D4', 5, 4, 'images/apartment_images/fp-12.jpg', 7800000, 56000, '2400 sq ft', 'Not Booked', 'House', 'Rent', 'Air Conditioning,Swimming Pool,Central Heating,Alarm,Window Covering,Refrigerator,TV Cable & WIFI,', 'Dhaka', 'Dhanmondi ', '', ''),
(24, 18, 'cottage Home', 'D8', 5, 4, 'images/apartment_images/p-3.jpg', 856000, 42000, '2200 sq ft', 'Not Booked', 'Commercial', 'Rent', 'Air Conditioning,Central Heating,Alarm,Window Covering,TV Cable & WIFI,Microwave,', 'Dhaka', 'Badda', '', '');

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

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `customer_id`, `customer_name`, `email`, `appoint_date`, `appoint_time`, `message`, `building_name`, `flat_no`, `request_status`) VALUES
(1, 2, 'Jesmine Akhter', 'jesmine@gmail.com', '12/30/2021', '11:08:00', 'bsbsvscav', 'Jawwad\'s Harem', 'B2', 'Rejected'),
(2, 2, 'Jesmine Akhter', 'jesmine@gmail.com', '12/29/2021', '06:09:00', 'vsvsvsv', 'Jawwad\'s Harem', 'B2', 'Confirmed'),
(3, 2, 'Jesmine Akhter', 'jesmine@gmail.com', '12/29/2021', '05:09:00', 'cacac', 'Jawwad\'s Harem', 'B2', 'Confirmed'),
(4, 4, 'Pranto Podder', 'ppodder@gmail.com', '12/31/2021', '05:12:00', 'go', 'Jawwad\'s Harem', 'B2', 'Rejected'),
(5, 4, 'Pranto Podder', 'ppodder@gmail.com', '12/29/2021', '02:56:00', 'gone', 'Jawwad\'s Harem', 'B2', 'Confirmed'),
(6, 2, 'Jesmine Akhter', 'jesmine@gmail.com', '12/29/2021', '03:06:00', 'go', 'Jawwad\'s Harem', 'B2', 'Confirmed'),
(7, 2, 'Jesmine Akhter', 'jesmine@gmail.com', '12/29/2021', '03:08:00', 'go', 'Jawwad\'s Harem', 'B2', 'Pending');

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
(3, 'JawwadHarem', 3, 'Madani Avenue, Badda', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at iaculis massa, ut tempus turpis.', 'Dhaka', 10, 'JH1'),
(5, 'Test Case 2', 2, 'Test Case 2', 'Test Case 2 - Chittagong', 'Chittagong', 5, ''),
(6, 'Rafi Kingdom', 2, 'Testing', 'Testing', 'Dhaka', 5, 'RAF5'),
(7, 'Pranto Fanta sea', 2, 'Testing', 'Testing', 'Dhaka', 5, 'POT65'),
(8, 'Tarin Dream Home', 15, 'Chittagong - Hill Tracks', 'Loren Ipsum', 'Chittagong', 5, 'TAR62'),
(12, 'Kabir Apartments', 4, 'Cox Bazar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra dolor nibh, id volutpat enim rutrum et. Sed tristique mi leo, a tristique orci tristique vel. Phasellus ac ante ut tortor iaculis maximus nec quis felis.', 'Chittagong', 10, 'KA64'),
(17, 'Mill Home', 20, 'Dhanmondi ', '', 'Dhaka', 10, 'TAR63'),
(18, 'cottage Home', 30, 'Badda', '', 'Dhaka', 10, 'TAR67'),
(19, 'Hasan Blue Housing', 4, 'Gulshan', 'Loren Ipsum', 'Dhaka', 10, 'HAS01');

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
(10, 7, 'Shafiqul Islam', 'shafique1273', '01775423659', 'shafiqul@yahoo.com', '', 'Banker', 'Shankor, West Dhanmondi', 'Titas, Comilla', 'male', 'Bangladeshi', NULL, NULL, NULL),
(12, 8, 'Pranto Podder', 'pranto3719', '01753699568', 'ppodder@gmail.com', '', 'House Husband', 'Farmgate', 'Rohingya', 'male', 'Bangladeshi', 'JawwadHarem', 'A3', NULL),
(13, 13, 'Aufi Islam', 'aufi9517', '01715633256', 'aufi@gmail.com', '', 'Businessman', 'Gulshan', 'Badda', 'male', 'Bangladeshi', NULL, NULL, NULL),
(14, 11, 'Imran Sarker', 'imran1111', '01715633256', 'imran@gmail.com', '', 'E sports Gamer', 'Farmgate', 'Comilla', 'male', 'Bangladeshi', 'cottage Home', 'D4', 'Rent'),
(15, 12, 'Afia Mohona', 'afia7839', '01714588523', 'aifa@gmail.com', '', 'Housewife', 'Farmgate', 'Mymensingh', 'female', 'Bangladeshi', 'JawwadHarem', 'D4', 'Buy');

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

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `client_id`, `name`, `mobile_number`, `email`, `build_num`, `flat_no`, `complaint_issue`, `complaint_date`, `complaint_details`, `username`, `admin_response`, `admin_reply`) VALUES
(1, 15, 'Afia Mohona', '01714588523', 'aifa@gmail.com', 'JH1', 'D4', 'Wrong Utility Bill Calculations', '2022-01-15', 'Loren Ipsum', 'afia7839', 'Responded', ''),
(2, 15, 'Afia Mohona', '01714588523', 'aifa@gmail.com', 'JH1', 'D4', 'Light is not working', '2022-01-15', 'Loren Ipsum', 'afia7839', 'Responded', ''),
(3, 15, 'Afia Mohona', '01714588523', 'aifa@gmail.com', 'JH1', 'D4', 'My bill got hijacked', '2022-01-15', 'Pranto took my bill and ate a burger with it.', 'afia7839', 'Responded', ''),
(4, 15, 'Afia Mohona', '01714588523', 'aifa@gmail.com', 'JH1', 'D4', 'My bill got hijacked', '2022-01-15', 'falfkjsafsaf', 'afia7839', 'Responded', ''),
(5, 15, 'Afia Mohona', '01714588523', 'aifa@gmail.com', 'JH1', 'D4', 'My bill got hijacked', '2022-01-15', 'aaaaaaaaaaaaaaf', 'afia7839', 'Responded', 'we will handle it');

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
(5, 'sumayta', 9, '01756322569', 'sumayta@gmail.com', '0stzr', 'Businesswoman', 'Gulshan', 'Badda', 'female', 'Bangladeshi', 'Dhaka', 42);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `invoice_name` varchar(50) NOT NULL,
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

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `invoice_name`, `building_name`, `flat_no`, `client_username`, `billing_month`, `issue_date`, `due_date`, `current_bill`, `arrear`, `due_charge`, `status`, `total_bill`) VALUES
(2, 'tarin', 'JawwadHarem', 'A3', 'Pranto Podder', '2022-03', '2022-01-01', '2022-01-19', 8500, NULL, 0, 'unpaid', 8700),
(4, 'tarin1', 'JawwadHarem', 'A3', 'Pranto Podder', '2022-04', '2022-04-13', '2022-04-19', 8500, 8700, 500, NULL, 17700),
(5, 'tarin2', 'JawwadHarem', 'A3', 'Pranto Podder', '2022-05', '2022-05-13', '2022-04-19', 0, 8700, 500, NULL, 9200);

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
(6, 'client', 'Jesmine Akhter', 'jesmine', 'jesmine@gmail.com', '$2y$10$C6.MklCtWJ/yqYYXSKOfZObj0sGMzgm24CQHyzDPSmUv3YttPni1S', '', '1972-05-05', 'srq3o', ''),
(7, 'client', 'Shafiqul Islam', 'shafique1273', 'shafiqul@yahoo.com', '$2y$10$rurmIwKfz/K5PdXYHdoZ/.lYEyKXfcUQNPp7f4QbWl70Ier25gI3C', '', '1968-01-27', 's17id', ''),
(8, 'client', 'Pranto Podder', 'pranto3719', 'ppodder@gmail.com', '$2y$10$4ggMP/5Kdj/8qQqlfevAZunfMx9U.WT6HfGxSlwujHcsyzfQt.L0u', '', '1974-02-20', 't0j5u', ''),
(9, 'customer', 'Sumayta Khan', 'sumayta', 'sumayta@gmail.com', '$2y$10$EktqzCBeBoJMHxCzxIPfHOZAPFwz212Ungvx144q0rrxDWWkvHLwK', 'images/user_images/sumayta.jpg', '1972-06-28', '0stzr', ''),
(11, 'client', 'Imran Sarker', 'imran1111', 'imran@gmail.com', '$2y$10$ho.CFkF5zy3p.TrhI1GubelhoVa3T3feyEhTITEVCtCJf7BM02Rci', 'images/user_images/imran.jpg', '1968-01-01', '4iq9r', ''),
(12, 'client', 'Afia Mohona', 'afia7839', 'aifa@gmail.com', '$2y$10$5SyqDFopSr6CM8mprKYGQu/7jVU9r81cuBwcWp7sDvIgxUbo.D/G.', 'images/user_images/afia.jpg', '1968-01-01', 'l(gtf', ''),
(13, 'client', 'Aufi Islam', 'aufi9517', 'aufi@gmail.com', '$2y$10$3D4C0S2RHS3LqvTo684zv.KQZepkKtikeaBkd.SK9XDUtv1.65UX6', '', '1968-01-01', '/85mf', ''),
(14, 'admin', 'Aysha Siddika', 'aysha', 'aysha@gmail.com', '12345', '', '1998-05-22', '', ''),
(17, 'admin', 'Nafisa Tarin', 'tarin', 'tarin@gmail.com', '$2y$10$UVIyy74cC0sEaB/FwPce5OVqsMWT.S45REncde28c5JJ0KkIjd3aW', 'images/admin_images/Tarin.jpg', '1998-05-22', '', ''),
(18, 'admin', 'Fahad Al Rafi', 'rafi', 'rafi@gmail.com', '$2y$10$QIEDFK.YTQaW1eGDG76Eq./4TuiFE24D6zALN4v5Wi345VVz9Ffa2', 'images/admin_images/Rafi.jpg', '1998-05-22', '', '');

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
-- Dumping data for table `utility_bill`
--

INSERT INTO `utility_bill` (`utility_id`, `building_name`, `flat_no`, `month`, `flat_status`, `rent`, `water_bill`, `gas_bill`, `electricity_bill`, `additional_bill`, `service_charge`) VALUES
(6, 'Mill Home', 'A3', '2022-01-08', 'buy', 0, 1000, 1200, 10000, 5000, 5000),
(7, 'Mill Home', 'C2', '2022-01-08', 'Rent', 80000, 800, 1200, 6000, 1000, 5000),
(8, 'Mill Home', 'D4', '2022-01-08', 'Rent', 80000, 800, 1200, 6000, 1000, 5000),
(9, 'cottage Home', 'D1', '2022-01-08', 'Buy', 0, 1000, 1500, 7000, 1000, 5000),
(10, 'cottage Home', 'D6', '2022-01-08', 'Rent', 70000, 1000, 1500, 7000, 1000, 5000),
(11, 'cottage Home', 'D8', '2022-01-08', 'Rent', 70000, 1200, 1000, 8000, 1000, 5000),
(13, 'JawwadHarem', 'A3', '2022-01', 'Rent', NULL, 1000, 1000, 1000, 500, 5000),
(14, 'JawwadHarem', 'A3', '2022-02', 'Rent', NULL, 1000, 1000, 1000, 500, 5000),
(15, 'JawwadHarem', 'A3', '2022-03', 'Rent', NULL, 1000, 1000, 1000, 500, 5000),
(16, 'JawwadHarem', 'A3', '2022-04', 'Rent', NULL, 1000, 1000, 1000, 500, 5000);

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
  MODIFY `apartment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `utility_bill`
--
ALTER TABLE `utility_bill`
  MODIFY `utility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
