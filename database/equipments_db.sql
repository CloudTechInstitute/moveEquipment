-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 03:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `equipments_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_phone` varchar(50) NOT NULL,
  `department_officer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_phone`, `department_officer`) VALUES
(1, 'Accounts', '0245111523', 'Emmanuel Abobila'),
(2, 'Reception', '0245111524', 'Regina Ossom'),
(4, 'Conference Room', '0245111525', 'Dugbatey Jonas');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `serial` varchar(100) NOT NULL,
  `item` varchar(255) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `officer` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `serial`, `item`, `brand`, `department`, `officer`, `image`, `date`) VALUES
(5, 'HPLV1911', 'HP monitor', 'canon', 'Reception', 'Emmanuel', 'abstractbackground25.jpg', '2023-09-02'),
(6, '5K430', 'HARD DRIVE', 'HITACHI', 'Conference Room', 'DR AMANKWAA', 'F6918140-01.jpg', '2023-09-02'),
(7, 'hpwe23', 'monitor', 'dell', 'Conference Room', 'Emmanuel', 'hp-lv1911-185-inch-led-backlit-lcd-monitor.jpg', '2023-09-02'),
(8, 'HPLV1910', 'printer', 'hp', 'Reception', 'DR AMANKWAA', 'istockphoto-1138979744-612x612.jpg', '2023-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `movements_tbl`
--

CREATE TABLE `movements_tbl` (
  `id` int(11) NOT NULL,
  `serial` varchar(100) NOT NULL,
  `item` varchar(255) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `imgFile` varchar(100) NOT NULL,
  `deptTaking` varchar(50) NOT NULL,
  `inCharge` varchar(100) NOT NULL,
  `defect` varchar(500) NOT NULL,
  `deptReceiving` varchar(50) NOT NULL,
  `inChargeReceive` varchar(100) NOT NULL,
  `returnDate` date NOT NULL,
  `authority` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movements_tbl`
--

INSERT INTO `movements_tbl` (`id`, `serial`, `item`, `brand`, `imgFile`, `deptTaking`, `inCharge`, `defect`, `deptReceiving`, `inChargeReceive`, `returnDate`, `authority`, `date`) VALUES
(1, 'HPLV1911', 'HP monitor', 'canon', 'abstractbackground25.jpg', 'Reception', 'Emmanuel', 'no', 'Accounts', 'Regymanuel', '2023-09-15', 'admin', '2023-09-02'),
(2, '5K430', 'HARD DRIVE', 'HITACHI', 'F6918140-01.jpg', 'Conference Room', 'DR AMANKWAA', 'yes', 'Reception', 'Regymanuel', '2023-09-27', 'admin', '2023-09-02'),
(3, 'hpwe23', 'monitor', 'dell', 'hp-lv1911-185-inch-led-backlit-lcd-monitor.jpg', 'Conference Room', 'Emmanuel', 'no', 'Accounts', 'Regymanuel', '2023-09-29', 'admin', '2023-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gps` varchar(50) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `department`, `position`, `address`, `password`, `city`, `phone`, `gps`, `profile_pic`, `date`) VALUES
(1, 'emma', 'springmediastreams@gmail.com', 'accounts', 'accountant', 'lemu', '123wer', 'Accra', '0244780456', 'G-043-0546', 'WhatsApp Image 2023-08-18 at 9.41.21 AM.jpeg', '2023-08-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movements_tbl`
--
ALTER TABLE `movements_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `movements_tbl`
--
ALTER TABLE `movements_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
