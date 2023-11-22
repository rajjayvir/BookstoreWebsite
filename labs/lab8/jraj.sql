-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: db.cs.dal.ca
-- Generation Time: Nov 08, 2023 at 07:56 PM
-- Server version: 10.3.21-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jraj`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `ISBN` varchar(255) NOT NULL,
  `CoverImage` varchar(255) DEFAULT NULL,
  `Author` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `PublicationYear` int(11) DEFAULT NULL,
  `NIT` varchar(255) DEFAULT NULL,
  `YEAR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CustomerID` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Phone` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` varchar(255) DEFAULT NULL,
  `ISBN` varchar(255) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `CustomerID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `FK_User_Customer` (`CustomerID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`),
  ADD CONSTRAINT `Orders_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`),
  ADD CONSTRAINT `Orders_ibfk_3` FOREIGN KEY (`ISBN`) REFERENCES `Book` (`ISBN`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `FK_User_Customer` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
