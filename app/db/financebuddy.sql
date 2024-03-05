-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 10:17 AM
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
('1cyRhrnJsdgkZLO', 'aPVzuXiJZk7Hmjg', '', '0.00', 'personal', 0, 1709297093, ''),
('2A1D2zLYHDns8KV', 'twTYXKTK2bEMbtP', 'main account', '500.00', 'personal', 0, 1708953257, ''),
('5fMshSCQXMcpdTW', 'aPVzuXiJZk7Hmjg', 'asdas', '213.00', 'personal', 0, 1709284889, ''),
('6kHwjv6tcaAcRX7', 'aPVzuXiJZk7Hmjg', '', '0.00', 'personal', 0, 1709296699, ''),
('80Za4DABYHDXmAp', 'twTYXKTK2bEMbtP', 'Zakelijk', '700.00', 'personal', 0, 1708953401, ''),
('8CJbmVkhyGg1l7Y', 'aPVzuXiJZk7Hmjg', 'asd', '123.00', 'personal', 0, 1709222821, ''),
('99qFmkPDAG1QFtS', 'aPVzuXiJZk7Hmjg', 'asda', '0.00', 'personal', 0, 1709298210, ''),
('9UT1tFuaYFOhUVU', 'aPVzuXiJZk7Hmjg', 'asdas', '21.00', 'personal', 0, 1709223699, ''),
('CtaFX2UFDReSwAi', 'aPVzuXiJZk7Hmjg', '', '0.00', 'personal', 0, 1709296761, ''),
('cvN6Jt5xVi0Zsnh', 'aPVzuXiJZk7Hmjg', 'business', '300.00', 'business', 0, 1709292863, ''),
('d1BAb76gq2Rw5IG', 'aPVzuXiJZk7Hmjg', 'asda', '123.00', 'personal', 0, 1709298373, ''),
('ePN0imV3BeAUvWK', 'aPVzuXiJZk7Hmjg', 'asd', '213.00', 'personal', 0, 1709223523, ''),
('euAzObeOfYOiZIO', 'aPVzuXiJZk7Hmjg', 'asdas', '123.00', 'personal', 0, 1709216545, 'asd'),
('eYdotr8Axxxbuaa', 'aPVzuXiJZk7Hmjg', 'user', '600.00', 'personal', 0, 1709289326, ''),
('f0w90Gg9rOg4JHo', 'aPVzuXiJZk7Hmjg', 'asd', '213.00', 'personal', 0, 1709298134, ''),
('fJRg9kPi9zVY54Q', 'aPVzuXiJZk7Hmjg', 'Business', '213.00', 'business', 0, 1709285745, ''),
('g6nnhv2SVF4WoWQ', 'aPVzuXiJZk7Hmjg', 'asd', '213.00', 'personal', 0, 1709298383, ''),
('HbCvJggTQL43c1n', 'aPVzuXiJZk7Hmjg', '', '300.00', 'personal', 0, 1709286169, ''),
('HfJvnD6peFKwboG', 'aPVzuXiJZk7Hmjg', 'Hellos', '0.00', 'personal', 0, 1709285729, ''),
('jApEfmPJHyZIABg', 'aPVzuXiJZk7Hmjg', '', '0.00', 'personal', 0, 1709292885, ''),
('JBZBg3G9W4GTPje', 'aPVzuXiJZk7Hmjg', 'asda', '1231.00', 'personal', 0, 1709219045, 'asd'),
('JJzFCX2h0dConty', 'aPVzuXiJZk7Hmjg', 'asd', '213.00', 'personal', 0, 1709298330, ''),
('JVcMrTbLKwaWiGq', 'aPVzuXiJZk7Hmjg', 'asdas', '213.00', 'personal', 0, 1709223595, ''),
('KhfWOvngbnF1uy9', 'aPVzuXiJZk7Hmjg', 'asd', '213.00', 'personal', 0, 1709223643, ''),
('kiAvRXx3NJIDHX4', 'aPVzuXiJZk7Hmjg', 'jkkj', '20.00', 'personal', 0, 1709215142, ''),
('kYmI83gtdRAeEe2', 'aPVzuXiJZk7Hmjg', 'asd', '213.00', 'personal', 0, 1709284838, ''),
('LxJlwJDvwwLtByD', 'aPVzuXiJZk7Hmjg', 'asad', '213.00', 'personal', 0, 1709219246, 'asd'),
('MgxXFFIQOhmUHFq', 'aPVzuXiJZk7Hmjg', 'dsa', '213.00', 'personal', 0, 1709223690, ''),
('NSpU1lcELSaWCo5', 'aL8AFCkzlVnehJl', '456546', '4564564.00', 'personal', 1, 1709047943, ''),
('nSr2jEsHG4KT583', 'aL8AFCkzlVnehJl', 'zaken', '1300.00', 'personal', 1, 1709047831, ''),
('NySWD9CWuwJ0Raw', 'aPVzuXiJZk7Hmjg', 'asda', '213.00', 'personal', 0, 1709298408, ''),
('OqOUoh84VLiB2rb', 'aPVzuXiJZk7Hmjg', 'asd', '213.00', 'personal', 0, 1709298128, ''),
('PqB56GLopdqQmll', 'aPVzuXiJZk7Hmjg', 'asdsa', '213.00', 'personal', 0, 1709284882, ''),
('rmpwTTYS8w6xK04', 'aPVzuXiJZk7Hmjg', 'asdas', '213.00', 'personal', 0, 1709289071, ''),
('rXRsoORLbdnVNKV', 'aPVzuXiJZk7Hmjg', 'asdas', '213.00', 'personal', 0, 1709285207, ''),
('sDfkLHKhLZcOprt', 'aPVzuXiJZk7Hmjg', '', '0.00', 'personal', 0, 1709296848, ''),
('sfoWshmSydcy9uo', 'aPVzuXiJZk7Hmjg', 'asd', '21.00', 'personal', 0, 1709285044, ''),
('TqnWkkL0EEyepk3', 'aPVzuXiJZk7Hmjg', 'asdas', '213.00', 'personal', 0, 1709223652, ''),
('TvlmykXn8xLRXWS', 'aPVzuXiJZk7Hmjg', 'asd', '213.00', 'personal', 0, 1709222847, ''),
('udd22T0RXUWFXzv', 'aPVzuXiJZk7Hmjg', 'asdas', '213.00', 'personal', 0, 1709298254, ''),
('UdIElBNOitMFf3A', 'twTYXKTK2bEMbtP', 'asda', '513.00', 'business', 1, 1709204791, ''),
('UgbJ9QtiuC5EYIw', 'aPVzuXiJZk7Hmjg', 'asdas', '215.00', 'personal', 0, 1709285518, ''),
('UvTGL3wTejbS3Es', 'aPVzuXiJZk7Hmjg', 'sadaasdsa', '73.00', 'personal', 1, 1709299428, ''),
('wXwsWYuZPZXocQe', 'aPVzuXiJZk7Hmjg', 'asd', '213.00', 'business', 0, 1709298005, ''),
('XijwrazrgBDkVgS', 'aPVzuXiJZk7Hmjg', '', '0.00', 'personal', 0, 1709286814, ''),
('yAepRR1xMOPzYyZ', 'aPVzuXiJZk7Hmjg', 'asd', '213.00', 'personal', 0, 1709298486, '');

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

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`budgetId`, `budgetAccountId`, `budgetCategoryId`, `budgetName`, `budgetAmount`, `budgetIsActive`, `budgetDescription`, `budgetCreateDate`) VALUES
('8y6vkMlrYQ3f7JO', 'nSr2jEsHG4KT583', 'jWLg4VeULgOOsrK', 'food', '70.00', 1, '', 1709048108),
('bN9JCTCjFYP6Nrq', 'kiAvRXx3NJIDHX4', 'jWLg4VeULgOOsrK', 'food', '30.00', 1, '', 1709215157),
('gH76TDx4sKuS9Qc', 'HbCvJggTQL43c1n', 'h7XrUkZZp1TRn4f', 'tyjty', '7567567.00', 1, 'kyukyukyukyu', 1709286732),
('HEAqN964btzYJI7', 'HbCvJggTQL43c1n', 'h7XrUkZZp1TRn4f', 'luiluilui', '50000.00', 1, '', 1709286346),
('jueSEwHpHAsl5ru', 'UvTGL3wTejbS3Es', 'h7XrUkZZp1TRn4f', 'sda', '21.00', 0, '', 1709318046),
('KXxZ1EAzG01cfGR', 'UvTGL3wTejbS3Es', 'jWLg4VeULgOOsrK', 'food', '100.00', 1, '', 1709630184),
('Nw1m3l4IaHfaT4h', 'fJRg9kPi9zVY54Q', 'jWLg4VeULgOOsrK', 'food', '100.00', 0, '', 1709285778),
('TxZjYCQfhytN7J9', '80Za4DABYHDXmAp', 'jWLg4VeULgOOsrK', 'eten', '300.00', 1, '', 1708953521),
('VpN7lZSH6NoTl5f', 'UvTGL3wTejbS3Es', '7AoQS1tlg05WUc4', 'asd', '213.00', 0, '', 1709317816),
('ZhVfOVHecUUJfYn', 'UvTGL3wTejbS3Es', 'nUhSg7XGGl2d45p', 'asd', '213.00', 0, '', 1709315351);

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
('0BlSC3N89dy5TtU', 'HbCvJggTQL43c1n', '', '10.00', 0, '', 1709286380),
('0Ojur3mEfdC5JIB', 'UvTGL3wTejbS3Es', 'asdas', '123.00', 0, '', 1709304788),
('28K6ra2Yq7BKLVv', 'nSr2jEsHG4KT583', 'Vacation', '1500.00', 0, '', 1709048063),
('2FUhRpnTruwloMv', 'UvTGL3wTejbS3Es', 'asdas', '123.00', 0, '', 1709304784),
('6BWw2X2Ma03V3ka', 'UvTGL3wTejbS3Es', 'asdas', '123.00', 0, '', 1709306833),
('7Jnb1YuyHW8zbUJ', 'UvTGL3wTejbS3Es', 'asdas', '213.00', 0, '', 1709306760),
('7MfWgHtVP4s0oOY', 'UvTGL3wTejbS3Es', 'Goals', '123.00', 0, '', 1709307171),
('82jr1sPuRdcFQVk', 'nSr2jEsHG4KT583', 'Vacation', '100.00', 0, '', 1709048016),
('8K1nL68gWIaMJsO', 'UvTGL3wTejbS3Es', 'asdas', '213.00', 0, '', 1709306863),
('AV5paYEK32Sby5Q', 'UvTGL3wTejbS3Es', 'asdsa', '213.00', 0, '', 1709304625),
('B16VRzEVHiHF36m', 'UvTGL3wTejbS3Es', 'asd', '213.00', 0, '', 1709309548),
('c0bZlKtmjsUPjyb', 'UdIElBNOitMFf3A', 'sada', '1321.00', 1, '', 1709207673),
('CE6V1BQke2mTdZy', 'UvTGL3wTejbS3Es', 'asdas', '21.00', 0, '', 1709306269),
('EBpkZUvaH9ZajZt', 'UvTGL3wTejbS3Es', 'asdas', '213.00', 0, '', 1709305652),
('eJ0FKjgnYNkJInA', 'UvTGL3wTejbS3Es', 'asdas', '123.00', 0, '', 1709304576),
('evphdtv6Kg6ddfK', 'UvTGL3wTejbS3Es', 'asdas', '123.00', 0, '', 1709304760),
('EXTlejWCwQhoBo4', 'UvTGL3wTejbS3Es', 'asds', '123.00', 0, '', 1709306963),
('fzV4tPNBbT4R59D', 'UvTGL3wTejbS3Es', 'kyukyu', '575675.00', 0, '', 1709306520),
('GgaDkDiiRLZhbCh', 'UvTGL3wTejbS3Es', 'asdas', '123.00', 0, '', 1709306699),
('gmfS0btxJcaOucI', 'nSr2jEsHG4KT583', 'fds', '1100.00', 0, '', 1709048516),
('HiNtzYHvSHiZnm7', 'HbCvJggTQL43c1n', 'Vacation', '500.00', 0, '', 1709286482),
('hTh5uXA4TrbuA1N', 'UvTGL3wTejbS3Es', 'asds', '123.00', 0, '', 1709306963),
('jDphr5O6PvkVeV3', 'UvTGL3wTejbS3Es', 'asds', '123.00', 0, '', 1709306962),
('k6OamrgDugwhvOZ', 'UvTGL3wTejbS3Es', 'asda', '213.00', 0, '', 1709306057),
('kV5E7LrAEmzLhS9', 'UvTGL3wTejbS3Es', 'ad', '213.00', 0, '', 1709318035),
('o4JUbnuFUiqKGub', 'UvTGL3wTejbS3Es', 'das', '12.00', 0, '', 1709306086),
('oJLkiLUN24Wtgk0', 'nSr2jEsHG4KT583', '', '1500.00', 1, '', 1709048523),
('PEwwfqYJHWjQgWg', 'UvTGL3wTejbS3Es', 'asd', '213.00', 0, '', 1709305994),
('PHBvyZ3me1XfhzL', 'UvTGL3wTejbS3Es', 'asdsa', '213.00', 0, '', 1709306673),
('puCv965rRWrPMSQ', 'UvTGL3wTejbS3Es', 'asdsa', '213.00', 0, '', 1709306622),
('QSwrNyCkaerlIlb', 'UvTGL3wTejbS3Es', 'asd', '123.00', 0, '', 1709306580),
('qzhgQVco0eRwZvr', 'UvTGL3wTejbS3Es', 'asdas', '500.00', 1, '', 1709630157),
('s7dugE8MZIkyRJS', 'UvTGL3wTejbS3Es', 'asdas', '213.00', 0, '', 1709305618),
('t5Ha2DhxHAeXeeP', 'UvTGL3wTejbS3Es', 'das', '123.00', 0, '', 1709306633),
('tbmiO19vg65i5eO', 'UvTGL3wTejbS3Es', 'asdas', '123.00', 0, '', 1709304787),
('tbXanBjreh3Zzl0', 'UvTGL3wTejbS3Es', 'das', '213.00', 0, '', 1709306651),
('tu2KKGZkGABOdDb', 'UvTGL3wTejbS3Es', 'asdas', '213.00', 0, '', 1709307092),
('u7MQjr9xOhCDK7H', 'UgbJ9QtiuC5EYIw', 'hehe', '213.00', 1, '', 1709285549),
('uceiH1mizDCmSd1', 'UgbJ9QtiuC5EYIw', 'asd', '213.00', 0, '', 1709285543),
('uwGDxi64kmWHSAh', 'UvTGL3wTejbS3Es', 'asd', '213.00', 0, '', 1709304694),
('vIpKV5fMKODBRPn', 'UvTGL3wTejbS3Es', 'asdas', '123.00', 0, '', 1709304858),
('w34YtuzzchoXvjb', 'UvTGL3wTejbS3Es', 'asds', '123.00', 0, '', 1709306963),
('wPi4INSeeYwUZHJ', 'UvTGL3wTejbS3Es', 'asds', '123.00', 0, '', 1709306961),
('X6E2SNZJvvJ5oSn', 'UvTGL3wTejbS3Es', 'asda', '213.00', 0, '', 1709307041),
('y6yETQmdh0KI5TG', 'UvTGL3wTejbS3Es', 'asdas', '123.00', 0, '', 1709306834),
('YUPBPquOMplLC8m', 'fJRg9kPi9zVY54Q', 'vacay', '2000.00', 0, '', 1709285753),
('zCMgP7IoUkDy7Ed', '80Za4DABYHDXmAp', 'vacay', '800.00', 1, '', 1709034024),
('ZJBck4pbNejMQuA', 'UvTGL3wTejbS3Es', 'asdsa', '213.00', 0, '', 1709306570),
('ZVyUaS7g32GqRmG', 'UvTGL3wTejbS3Es', 'asd', '213.00', 0, '', 1709305594),
('ZXz7vIZCmA600ei', 'UvTGL3wTejbS3Es', 'asds', '213.00', 0, '', 1709304538);

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
('6LvUKONVqdIxIIN', 'food', 'fJRg9kPi9zVY54Q', 'jWLg4VeULgOOsrK', '-100.00', '', 1709285768, 0),
('9NutpF6UKOJmukq', 'asdas', 'UvTGL3wTejbS3Es', '7AoQS1tlg05WUc4', '213.00', '', 1709311712, 0),
('aS8LHzwIqRwro2Y', 'food', '80Za4DABYHDXmAp', 'jWLg4VeULgOOsrK', '-20.00', '', 1709035703, 0),
('b01LJ9m0hXAS2o5', 'food', '80Za4DABYHDXmAp', 'jWLg4VeULgOOsrK', '-20.00', '', 1709034130, 0),
('BtFCL6LuLuIdaLk', 'food', '80Za4DABYHDXmAp', 'jWLg4VeULgOOsrK', '-20.00', '', 1709043153, 0),
('eBNeqFdmpx571gf', 'asda', 'UdIElBNOitMFf3A', 'h7XrUkZZp1TRn4f', '300.00', 'asd', 1709204807, 0),
('EDnG00vw7WV2LPE', 'school', 'nSr2jEsHG4KT583', '7AoQS1tlg05WUc4', '300.00', '', 1709048092, 1),
('GBpckIcli9OXqQF', '', 'HbCvJggTQL43c1n', 'h7XrUkZZp1TRn4f', '0.00', '', 1709286394, 0),
('hI2DX5PpQQ6bc9O', 'food', '80Za4DABYHDXmAp', 'jWLg4VeULgOOsrK', '-20.00', '', 1709038141, 0),
('LbH9hJs1uzP9Aix', '', '80Za4DABYHDXmAp', 'jWLg4VeULgOOsrK', '-20.00', '', 1709043882, 0),
('oFcNSO788Uid7aN', 'food', 'kiAvRXx3NJIDHX4', 'jWLg4VeULgOOsrK', '-10.00', '', 1709215225, 1),
('rZxiol248n8p78G', 'Salary', '80Za4DABYHDXmAp', 'z2RAKIoebHzbKeY', '700.00', '', 1709034080, 1),
('ta5fIFzLocQP6ey', 'food', 'UvTGL3wTejbS3Es', 'jWLg4VeULgOOsrK', '-50.00', '', 1709630171, 1),
('Uy10br044FLkdwi', 'asd', 'UdIElBNOitMFf3A', 'h7XrUkZZp1TRn4f', '300.00', '', 1709204896, 1),
('vEz7A2JEItPbx4Q', 'helloaas', 'UvTGL3wTejbS3Es', 'h7XrUkZZp1TRn4f', '123.00', '', 1709312014, 0),
('XwznlZWPCqQ0Kgl', 'school', 'HbCvJggTQL43c1n', 'Ikt3cJPouB0lmkG', '300.00', 'jytjty', 1709286418, 1),
('ZGkWee3HnpbYemB', 'food', '80Za4DABYHDXmAp', 'jWLg4VeULgOOsrK', '-20.00', '', 1709042000, 0);

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
('95A6X2yGidRoLnK', 'Ouassim', 'Philip', 'Ouasim0343', 'Ouassim0343!', 'Ouassim@gmail.com', 'user', 1, 1709217267),
('aL8AFCkzlVnehJl', 'rewwerew', 'werwerewr', '12345678', '1q@W3e$R', '12345678@12345678.com', 'user', 1, 1709047615),
('aPVzuXiJZk7Hmjg', 'Ouassim', 'Philip', 'johndoe2', 'John123!', 'Ouassim@gmail.com', 'user', 1, 1709214374),
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
