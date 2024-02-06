-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 10:43 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financebuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accountId` varchar(15) NOT NULL,
  `accountUserId` varchar(15) NOT NULL,
  `accountName` varchar(50) NOT NULL,
  `accountBalance` decimal(9,2) NOT NULL,
  `accountType` enum('personal','business') NOT NULL,
  `accountGoal` decimal(9,2) NOT NULL,
  `accountIsActive` int(1) NOT NULL,
  `accountCreateDate` int(10) NOT NULL,
  `accountDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `budgetId` varchar(15) NOT NULL,
  `budgetUserId` varchar(15) NOT NULL,
  `budgetAccountId` varchar(15) NOT NULL,
  `budgetAmount` decimal(9,2) NOT NULL,
  `budgetIsActive` int(1) NOT NULL,
  `budgetDescription` text NOT NULL,
  `budgetCreateDate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` varchar(15) NOT NULL,
  `categoryEntityId` varchar(15) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `categoryDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `entityhascategories`
--

CREATE TABLE `entityhascategories` (
  `entityId` varchar(15) NOT NULL,
  `categoryId` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `goalId` varchar(15) NOT NULL,
  `goalUserId` varchar(15) NOT NULL,
  `goalAccountId` varchar(15) NOT NULL,
  `goalAmount` decimal(9,2) NOT NULL,
  `goalIsActive` int(1) NOT NULL,
  `goalDescription` text NOT NULL,
  `goalCreateDate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionId` varchar(15) NOT NULL,
  `transactionUserId` varchar(15) NOT NULL,
  `transactionAccountId` varchar(15) NOT NULL,
  `transactionAmount` decimal(9,2) NOT NULL,
  `transactionType` enum('income','expense') NOT NULL,
  `transactionDateType` enum('daily','weekly','monthly') NOT NULL,
  `transactionDescription` text DEFAULT NULL,
  `transactionCreateDate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` varchar(15) NOT NULL,
  `userUserName` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIsActive` int(1) NOT NULL,
  `userCreateDate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accountId`),
  ADD KEY `accountUserId` (`accountUserId`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`budgetId`),
  ADD KEY `budgetAccountId` (`budgetAccountId`),
  ADD KEY `budgetUserId` (`budgetUserId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `entityhascategories`
--
ALTER TABLE `entityhascategories`
  ADD PRIMARY KEY (`entityId`,`categoryId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`goalId`),
  ADD KEY `goalAccountId` (`goalAccountId`),
  ADD KEY `goalUserId` (`goalUserId`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `transactions_ibfk_1` (`transactionAccountId`),
  ADD KEY `transactionUserId` (`transactionUserId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`accountUserId`) REFERENCES `users` (`userId`) ON UPDATE CASCADE;

--
-- Constraints for table `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `budgets_ibfk_1` FOREIGN KEY (`budgetAccountId`) REFERENCES `accounts` (`accountId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `budgets_ibfk_2` FOREIGN KEY (`budgetUserId`) REFERENCES `users` (`userId`) ON UPDATE CASCADE;

--
-- Constraints for table `entityhascategories`
--
ALTER TABLE `entityhascategories`
  ADD CONSTRAINT `entityhascategories_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoryId`) ON UPDATE CASCADE;

--
-- Constraints for table `goals`
--
ALTER TABLE `goals`
  ADD CONSTRAINT `goals_ibfk_1` FOREIGN KEY (`goalAccountId`) REFERENCES `accounts` (`accountId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `goals_ibfk_2` FOREIGN KEY (`goalUserId`) REFERENCES `users` (`userId`) ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`transactionAccountId`) REFERENCES `accounts` (`accountId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`transactionUserId`) REFERENCES `users` (`userId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
