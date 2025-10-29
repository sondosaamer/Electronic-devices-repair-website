-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2025 at 12:49 AM
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
-- Database: `soumi_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','individual','bussiness','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `password`, `type`) VALUES
(1, 'admin', '$2y$10$vmIMuzN9qq45zdigVQE5ZusjZNCDHWwaf4Ll/Fgiy4vy7Ejf88cRC', 'admin'),
(2, 'user1', '$2y$10$72xeug4mgdN.t6LL9aowt.fegzrADymAKEVhWKooYqII8eio4P6.i', 'individual'),
(3, 'user2', '$2y$10$aR/qWBLILi19.wXdS0PRpe3inBudmRhLN40wFWGWJhSmHvJZ8yAdi', 'individual'),
(4, 'company', '$2y$10$0LeD/VU7bJGAOlVakbeRDOMjOZfKQAYtkytS7sRglIFRCtAWJwe3y', 'bussiness');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `client_id`, `title`, `feedback`) VALUES
(3, 2, 'Excellent Computer Repair Service', 'I had a great experience with this computer fixing service. They quickly diagnosed the issue, explained everything clearly, and repaired my device in a short time. The staff were professional, friendly, and reasonably priced. I’d definitely recommend them to anyone needing reliable computer repairs.'),
(4, 3, 'Fast and Reliable Service', 'The team fixed my computer efficiently and kept me updated throughout the process. The problem was solved quickly, and my device is working perfectly now. Great customer service and fair pricing—I’ll definitely return if I need help again.'),
(5, 3, 'Very Satisfied with the Repair', 'My computer was running slow, and they managed to fix it in no time. The service was professional, affordable, and hassle-free. I’m really happy with the results and would recommend them without hesitation.'),
(6, 4, 'Reliable IT Support for Our Office', 'We are very satisfied with the computer fixing service provided. The technicians quickly resolved multiple issues across our office computers, ensuring minimal downtime for our team. Their professionalism, quick response, and fair pricing make them a trusted partner for our company’s IT needs.');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `problem` varchar(500) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `state` enum('Pending','In progress','Done','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `client_id`, `title`, `problem`, `location`, `price`, `state`) VALUES
(1, 2, 'Screen Replacement Needed', 'The screen of my laptop is cracked and showing lines. I need a screen replacement as soon as possible.', 'Giza, Mohandessin', 300, 'Done'),
(2, 3, 'Computer Not Turning On', 'My desktop won’t power on even after checking the cables and trying a different outlet. I need someone to diagnose whether it’s the power supply or another hardware issue.', 'Downtown Cairo, near Tahrir Square', 0, 'In progress'),
(3, 3, 'Laptop Overheating Issue', 'My laptop gets very hot and shuts down after 15–20 minutes of use. I think the cooling fan or thermal paste needs checking.', 'Alexandria, Smouha Area', 550, 'Done'),
(4, 4, 'Urgent Network and Computer Issues at Office', 'Several workstations in our office are experiencing slow performance, frequent crashes, and connection issues with our internal network. We need a technician to diagnose and fix both hardware and network-related problems.', 'ABC Company Headquarters, Smart Village, Giza', 0, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
