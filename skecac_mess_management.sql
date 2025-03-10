-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2023 at 12:47 PM
-- Server version: 5.7.44
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skecac_mess_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_item_list`
--

CREATE TABLE `food_item_list` (
  `id` int(11) NOT NULL,
  `day` varchar(100) DEFAULT NULL,
  `breakfast` varchar(100) DEFAULT NULL,
  `lunch` varchar(100) DEFAULT NULL,
  `dinner` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_item_list`
--

INSERT INTO `food_item_list` (`id`, `day`, `breakfast`, `lunch`, `dinner`) VALUES
(2, 'Monday', 'idly,sambar', 'pappu,aalu', 'sambar ,upama'),
(3, 'Tuesday', 'Poori, Bonda,Dosa', 'Papad, Chicken', 'Roti, Butternon'),
(4, 'Wednesday', 'set dosa', 'sambar ', 'paneer,chicken'),
(5, 'Thursday', 'pav bhaji', 'rasam', 'paneer(special)');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(100) NOT NULL,
  `current_password` varchar(100) DEFAULT NULL,
  `new_password` varchar(100) DEFAULT NULL,
  `confirm_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`id`, `current_password`, `new_password`, `confirm_password`) VALUES
(1, '456', '999', '999'),
(2, '111', '666', '666');

-- --------------------------------------------------------

--
-- Table structure for table `leave_form`
--

CREATE TABLE `leave_form` (
  `id` int(11) NOT NULL,
  `student_roll_no` varchar(100) DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `date_of_leave` varchar(100) DEFAULT NULL,
  `date_of_return` varchar(100) DEFAULT NULL,
  `total_days` varchar(100) DEFAULT NULL,
  `reason_for_leave` varchar(10000) DEFAULT NULL,
  `leave_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_form`
--

INSERT INTO `leave_form` (`id`, `student_roll_no`, `student_name`, `date_of_leave`, `date_of_return`, `total_days`, `reason_for_leave`, `leave_status`) VALUES
(1, '789', 'sam', '2023-11-29T17:00', '2023-11-30T17:00', '1', 'Sick Leave', 'Pending'),
(2, '789', 'sam', '2023-11-20T17:00', '2023-12-02T17:00', '12', 'Holiday Trip', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `mess_feedback`
--

CREATE TABLE `mess_feedback` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `food` varchar(100) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `kitchen` varchar(100) DEFAULT NULL,
  `seating` varchar(100) DEFAULT NULL,
  `staff` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess_feedback`
--

INSERT INTO `mess_feedback` (`id`, `full_name`, `email`, `phone_number`, `message`, `food`, `material`, `kitchen`, `seating`, `staff`) VALUES
(1, 'manoj', 'manoj@gmail.com', '123467891', 'Seating arrangement is good', '3', '3', '3', '3', '3'),
(2, 'Priya', 'priya@gmail.com', '1234567890', 'Food is very tasty', '3', '3', '3', '3', '3'),
(3, 'mounika', 'demo@gmail.com', '9876543221', 'dont use food colors', '3', '2', '3', '4', '5'),
(4, 'Priya', 'priya@gmail.com', '1234567890', 'Food is very tasty', '3', '3', '3', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `admin_id` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `phone_number`, `email`, `admin_id`, `password`) VALUES
(1, 'Admin', '1234567890', 'demo@gmail.com', 'admin', '456'),
(3, 'Sudhamsh ', '6304403424', 'sudhamsh04@gmail.com', '192312', '1234'),
(4, 'Sudhamsh', '6894541548', 'sudhamsh04@gmail.com', 'siddu', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `id` int(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_registrationdetails`
--

CREATE TABLE `student_registrationdetails` (
  `id` int(100) NOT NULL,
  `registration_date` varchar(100) DEFAULT NULL,
  `student_rollno` varchar(100) DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registrationdetails`
--

INSERT INTO `student_registrationdetails` (`id`, `registration_date`, `student_rollno`, `student_name`, `phone_number`, `gender`, `email`, `username`, `password`, `address`) VALUES
(1, '2023-10-31', '789', 'sam', '1234567890', 'Male', 'demo@gmail.com', 'sam', '123', 'kmm'),
(2, '2023-11-16', '1234556789', 'Uttej', '12345678991', 'Male', 'demo@gmail.com', 'Uttej12', '1234', 'Khammam'),
(3, '2023-10-31', 'cs21b1026', 'Sathvik ', '9704905749', 'Male', 'cs21b1026@iiitr.ac.in', 'sathvikpalde', 'sathvik.123', 'nirmal'),
(4, '2023-12-31', 'cs21b1031', 'sudhamsh', '9704905577', 'Male', 'paldesathvik@gmail.com', 'sheru009', '456', 'nirmal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_item_list`
--
ALTER TABLE `food_item_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_form`
--
ALTER TABLE `leave_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mess_feedback`
--
ALTER TABLE `mess_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registrationdetails`
--
ALTER TABLE `student_registrationdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_item_list`
--
ALTER TABLE `food_item_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_form`
--
ALTER TABLE `leave_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mess_feedback`
--
ALTER TABLE `mess_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_registrationdetails`
--
ALTER TABLE `student_registrationdetails`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
