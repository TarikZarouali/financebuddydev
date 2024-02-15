-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 12:46 PM
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
  `accountIsActive` int(1) NOT NULL,
  `accountCreateDate` int(10) NOT NULL,
  `accountDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountId`, `accountUserId`, `accountName`, `accountBalance`, `accountType`, `accountIsActive`, `accountCreateDate`, `accountDescription`) VALUES
('AsgEUsAsQLss0iV', 'twTYXKTK2bEMbtP', 'Moneys', '0.00', 'personal', 1, 1707314186, 'This account is for my personal use');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `budgetId` varchar(15) NOT NULL,
  `budgetAccountId` varchar(15) NOT NULL,
  `budgetName` varchar(50) NOT NULL,
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
  `categoryName` varchar(50) NOT NULL,
  `categoryDescription` text NOT NULL,
  `categoryIsActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`, `categoryDescription`, `categoryIsActive`) VALUES
('16Zk1dvkbXxCfjc', 'Petty cash', '', 0),
('4wuGUpB6b0e9e31', 'Healthcare', '', 1),
('7AoQS1tlg05WUc4', 'Education', '', 1),
('Env8LPBHUUvcv5F', 'Household', '', 1),
('fh36NuRXp1lBHmJ', 'Beauty', '', 1),
('h7XrUkZZp1TRn4f', 'Allowance', '', 1),
('Ikt3cJPouB0lmkG', 'Culture', '', 1),
('illWfJd7tZn8gWy', 'Transport', '', 1),
('jWLg4VeULgOOsrK', 'Food', '', 1),
('MmdkbJUJgztWGUY', 'Other', '', 1),
('nUhSg7XGGl2d45p', 'Bonus', '', 1),
('xhRVH7naEbrcQtJ', 'Gift', '', 1),
('Y3JL6NB8OWSE4vy', 'Social life', '', 1),
('YdQuJEuRywKcqP0', 'Pets', '', 1),
('YQLK95c0YhqEXsq', 'Beauty', '', 1),
('z2RAKIoebHzbKeY', 'Salary', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `goalId` varchar(15) NOT NULL,
  `goalAccountId` varchar(15) NOT NULL,
  `goalName` varchar(50) NOT NULL,
  `goalAmount` decimal(9,2) NOT NULL,
  `goalIsActive` int(1) NOT NULL,
  `goalDescription` text DEFAULT NULL,
  `goalCreateDate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`goalId`, `goalAccountId`, `goalName`, `goalAmount`, `goalIsActive`, `goalDescription`, `goalCreateDate`) VALUES
('DbeEcK4RM0G9YPG', 'AsgEUsAsQLss0iV', 'Vacation', '1000.00', 0, '', 1707988410),
('fHCSd4qux2k1cpO', 'AsgEUsAsQLss0iV', 'Vacation', '900.00', 0, '', 1707905181);

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `screenId` varchar(15) NOT NULL,
  `screenEntityId` varchar(15) NOT NULL,
  `screenCreateDate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionId` varchar(15) NOT NULL,
  `transactionName` varchar(255) NOT NULL,
  `transactionAccountId` varchar(15) NOT NULL,
  `transactionCategoryId` varchar(15) NOT NULL,
  `transactionAmount` decimal(9,2) NOT NULL,
  `transactionDescription` text DEFAULT NULL,
  `transactionCreateDate` int(10) NOT NULL,
  `transactionIsActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionId`, `transactionName`, `transactionAccountId`, `transactionCategoryId`, `transactionAmount`, `transactionDescription`, `transactionCreateDate`, `transactionIsActive`) VALUES
('3NsVCx7TvLxzTpr', 'asd', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '100.00', '', 1707993145, 0),
('81SRCApjzHs2Nat', 'school', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '-200.00', '', 1707992451, 0),
('8JDpHGhn88XxpXq', 'School', 'AsgEUsAsQLss0iV', '7AoQS1tlg05WUc4', '150.00', '', 1707991418, 0),
('ar67pf98B7QwPjU', '', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '-200.00', '', 1707993217, 0),
('g3SZ8KBrnRhpbeL', 'Money', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '400.00', '', 1707993321, 0),
('JYnNj3EyPeJPd8J', '', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '-300.00', '', 1707993093, 0),
('kXWPkiMoLhQZuVT', '', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '-200.00', '', 1707993153, 0),
('lfppnxBOY0AEyA2', 'school', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '-100.00', '', 1707992747, 0),
('m00lXTiXJeXb4FT', 'Internship', 'AsgEUsAsQLss0iV', 'MmdkbJUJgztWGUY', '200.00', 'no description needed', 1707991017, 0),
('NiTUt58DJ72h9pa', 'Internship', 'AsgEUsAsQLss0iV', 'nUhSg7XGGl2d45p', '1000.00', '', 1707993837, 0),
('ojPfODHyx40fg0K', '', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '-100.00', '', 1707993132, 0),
('pdGlTsA62JDtOBS', 'school', 'AsgEUsAsQLss0iV', '7AoQS1tlg05WUc4', '-150.00', '', 1707993957, 0),
('qjaEvq9SpiZcayS', 'Internship', 'AsgEUsAsQLss0iV', 'nUhSg7XGGl2d45p', '-200.00', '', 1707991409, 0),
('qLS36lwJL2Xx56q', 'school', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '300.00', 'asd', 1707992704, 0),
('sDYr3rZ79bjhtna', '', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '400.00', '', 1707992511, 0),
('wZ6VrGqgQU8SlG0', 'School', 'AsgEUsAsQLss0iV', 'nUhSg7XGGl2d45p', '-150.00', '', 1707990985, 0),
('XhDe59r8jFvrNBC', 'money ', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '300.00', 'ad', 1707993308, 0),
('ZKNe9TAaxZzsQFd', '', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '5000.00', '', 1707993283, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` varchar(15) NOT NULL,
  `userFirstName` varchar(255) NOT NULL,
  `userLastName` varchar(255) NOT NULL,
  `userUserName` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userType` enum('admin','user') NOT NULL,
  `userIsActive` int(1) NOT NULL,
  `userCreateDate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userFirstName`, `userLastName`, `userUserName`, `userPassword`, `userEmail`, `userType`, `userIsActive`, `userCreateDate`) VALUES
('B1EnzNRTbyKxBV8', 'Tarik', 'Zarouali', 'Financeadmin01!', 'ThisIsAPassword007!', 'tarikzarouali15@gmail.com', 'admin', 1, 1707126055),
('twTYXKTK2bEMbtP', 'John', 'Doe', 'JohnDoe2', 'John123!', 'JohnDoe2@gmail.com', 'user', 1, 1707228201);

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
  ADD KEY `budgetAccountId` (`budgetAccountId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`goalId`),
  ADD KEY `goalAccountId` (`goalAccountId`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`screenId`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `transactions_ibfk_1` (`transactionAccountId`),
  ADD KEY `transactionCategoryId` (`transactionCategoryId`);

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
  ADD CONSTRAINT `budgets_ibfk_1` FOREIGN KEY (`budgetAccountId`) REFERENCES `accounts` (`accountId`) ON UPDATE CASCADE;

--
-- Constraints for table `goals`
--
ALTER TABLE `goals`
  ADD CONSTRAINT `goals_ibfk_1` FOREIGN KEY (`goalAccountId`) REFERENCES `accounts` (`accountId`) ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`transactionAccountId`) REFERENCES `accounts` (`accountId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`transactionCategoryId`) REFERENCES `categories` (`categoryId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
