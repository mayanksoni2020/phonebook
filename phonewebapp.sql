-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2020 at 10:57 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonewebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `phonedetails`
--

CREATE TABLE `phonedetails` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date-Of-Birth` date NOT NULL,
  `Phone Number` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonedetails`
--

INSERT INTO `phonedetails` (`id`, `Name`, `Date-Of-Birth`, `Phone Number`, `Email`) VALUES
(1, 'Deepak Rathor', '1999-05-25', '7986194736', 'deepakrathor@gmail.com'),
(2, 'Saurabh Singh', '2000-10-04', '8619549916', 'saurabhsingh@gmail.com'),
(3, 'Dilip Kumar', '1998-07-18', '8283041567', 'dilipkumar@gmail.com'),
(6, 'Nihal Jain', '2000-03-12', '9494076513', 'nihaljain@gmail.com'),
(9, 'Mayank Soni', '1999-05-25', '7986194736', 'deepakthakur@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phonedetails`
--
ALTER TABLE `phonedetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phonedetails`
--
ALTER TABLE `phonedetails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
