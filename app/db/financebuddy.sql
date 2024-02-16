-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 05:38 PM
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
('AsgEUsAsQLss0iV', 'twTYXKTK2bEMbtP', 'Moneys', '50.00', 'personal', 1, 1707314186, 'This account is for my personal use'),
('C18erto9a6hp0EY', 'twTYXKTK2bEMbtP', 'asdas', '213.00', 'personal', 1, 1708077960, 'as'),
('cHVzk4HY4oa4QHa', 'twTYXKTK2bEMbtP', 'Saving', '0.00', 'personal', 0, 1707998032, ''),
('cRz9jHOiOKHJrf6', 'twTYXKTK2bEMbtP', 'sad', '23.00', 'personal', 0, 1708078017, ''),
('IWAq1YceS89nfMi', 'twTYXKTK2bEMbtP', 'Saving', '0.00', 'personal', 0, 1708007976, '');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `budgetId` varchar(15) NOT NULL,
  `budgetAccountId` varchar(15) NOT NULL,
  `budgetCategoryId` varchar(15) NOT NULL,
  `budgetName` varchar(50) NOT NULL,
  `budgetAmount` decimal(9,2) NOT NULL,
  `budgetIsActive` int(1) NOT NULL,
  `budgetDescription` text DEFAULT NULL,
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
('0DQirTELV6ipfhV', 'AsgEUsAsQLss0iV', 'asd', '21.00', 0, '', 1708084333),
('SLGNdfZEy7fVrnb', 'C18erto9a6hp0EY', 'asdas', '1.00', 0, '', 1708082879);

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
('0lMUOzrdh61DbUC', 'work', 'AsgEUsAsQLss0iV', 'nUhSg7XGGl2d45p', '400.00', '', 1708010973, 0),
('144guMsIml3vFPu', 'Netflix', 'AsgEUsAsQLss0iV', 'MmdkbJUJgztWGUY', '-12.00', '', 1708010420, 0),
('6katqrlJzUzNlGd', 'asd', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '-21.00', '', 1708085730, 0),
('Cn7lR90yGsgaP6a', 'DUO', 'AsgEUsAsQLss0iV', 'z2RAKIoebHzbKeY', '508.00', '', 1708010269, 0),
('GjbNgxa5zIZrnLo', 'amazon', 'AsgEUsAsQLss0iV', 'MmdkbJUJgztWGUY', '-5.00', '', 1708010443, 0),
('gwgfcV6kYcKQ13x', 'School', 'AsgEUsAsQLss0iV', '7AoQS1tlg05WUc4', '-150.00', '', 1708084864, 1),
('htpJcz5wPoV8vXG', 'sada', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '314234.00', 'asd', 1708077001, 0),
('hUFOwUbbrE9CPCQ', 'internship', 'AsgEUsAsQLss0iV', 'nUhSg7XGGl2d45p', '200.00', '', 1708010300, 0),
('HWzNQHtWKTzMZsE', 'asd', 'C18erto9a6hp0EY', '4wuGUpB6b0e9e31', '213.00', '', 1708080193, 0),
('Ic9qOUiMDFq5T1O', 'phone bill', 'AsgEUsAsQLss0iV', 'MmdkbJUJgztWGUY', '-20.00', '', 1708010485, 0),
('krOjJ4PEZU3XfV0', 'school', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '-150.00', '', 1708010308, 0),
('lbc0D3afxCoJpSD', 'insurance money', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '123.00', '', 1708010292, 0),
('m5NUNurmwwU1L48', 'asd', 'C18erto9a6hp0EY', '4wuGUpB6b0e9e31', '2.00', '', 1708082885, 0),
('nQfhhAozZD0s53g', 'school', 'AsgEUsAsQLss0iV', '7AoQS1tlg05WUc4', '-150.00', '', 1708008711, 0),
('o3ritCSjicfB8MS', 'health insurance', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '-140.00', '', 1708010383, 0),
('Owt6j2CTppeOTnD', 'duo', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '510.00', '', 1708008720, 0),
('pO5LEDC3aRgMrRb', 'DUO', 'AsgEUsAsQLss0iV', '7AoQS1tlg05WUc4', '508.00', '', 1708075661, 0),
('r3CtSBmnXps8AS1', 'Spotify', 'AsgEUsAsQLss0iV', 'Ikt3cJPouB0lmkG', '-11.99', '', 1708010407, 0),
('rMWJLVLLKKPsjVU', 'internship', 'AsgEUsAsQLss0iV', 'nUhSg7XGGl2d45p', '200.00', '', 1708084874, 1),
('touWsjfT2qhQ7Jv', '21', 'C18erto9a6hp0EY', '4wuGUpB6b0e9e31', '123.00', '', 1708080198, 0),
('TvuifcQ2GY762Bx', 'sad', 'C18erto9a6hp0EY', '4wuGUpB6b0e9e31', '123.00', '', 1708080213, 0),
('zcMSqOOIM6lsQw6', 'SADA', 'AsgEUsAsQLss0iV', '4wuGUpB6b0e9e31', '2131.00', '', 1708077227, 0);

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
  ADD KEY `budgetAccountId` (`budgetAccountId`),
  ADD KEY `budgetCategoryId` (`budgetCategoryId`);

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
  ADD CONSTRAINT `budgets_ibfk_1` FOREIGN KEY (`budgetAccountId`) REFERENCES `accounts` (`accountId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `budgets_ibfk_2` FOREIGN KEY (`budgetCategoryId`) REFERENCES `categories` (`categoryId`) ON UPDATE CASCADE;

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
