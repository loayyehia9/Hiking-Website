-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 10:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiking`
--
CREATE DATABASE IF NOT EXISTS `hiking` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hiking`;

-- --------------------------------------------------------

--
-- Table structure for table `auditor`
--

DROP TABLE IF EXISTS `auditor`;
CREATE TABLE `auditor` (
  `ID` int(255) NOT NULL,
  `adminemail` varchar(80) NOT NULL,
  `message` varchar(255) NOT NULL,
  `addcomment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditor`
--

INSERT INTO `auditor` (`ID`, `adminemail`, `message`, `addcomment`) VALUES
(3, 'Moataz@gmail.com            ', 'ant 3aml eh a5bark', ''),
(4, 'Moataz@gmail.com            ', 'el7mdallah ya kbeer', 'Word is not good'),
(6, 'Moataz@gmail.com            ', 'el7mdallah ya kbeer', 'Kbeer is not good word'),
(7, 'Moataz@gmail.com            ', 'b5er ya 3mohom ant 3aml eh', '3mohom bad word'),
(8, 'Moataz@gmail.com            ', 'ant 3aml eh a5bark', 'please man');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `ID` int(255) NOT NULL,
  `Sender` varchar(80) NOT NULL,
  `Receiver` varchar(80) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ID`, `Sender`, `Receiver`, `Message`, `Status`) VALUES
(245, 'Doba@gmail.com      ', 'Moataz@gmail.com    ', 'azik', 'Read'),
(246, 'Doba@gmail.com      ', 'Moataz@gmail.com    ', 'hi', 'Read'),
(247, 'Moataz@gmail.com      ', 'Doba@gmail.com          ', 'el7mdallah ya kbeer', 'Read'),
(248, 'Moataz@gmail.com      ', 'Doba@gmail.com          ', 'ant 3aml eh a5bark', 'Read'),
(249, 'Ali@gmail.com      ', 'Moataz@gmail.com    ', 'Azik ya a5oya', 'Read'),
(250, 'Moataz@gmail.com      ', 'Ali@gmail.com          ', 'b5er ya 3mohom ant 3aml eh', 'Delivered'),
(251, 'Doba@gmail.com      ', 'Moataz@gmail.com    ', 'Azik ya a5o', 'Read'),
(252, 'Moataz@gmail.com      ', 'Doba@gmail.com          ', '7pypy', 'Read'),
(253, 'Doba@gmail.com      ', 'Moataz@gmail.com    ', 'aeh ua a5o', 'Read'),
(254, 'Moataz@gmail.com      ', 'Doba@gmail.com          ', '7pypy 3aml eh', 'Read'),
(255, 'Doba@gmail.com      ', 'Moataz@gmail.com          ', 'b5er', 'Read'),
(256, 'Moataz@gmail.com      ', 'Doba@gmail.com          ', '2lby', 'Read'),
(257, 'Doba@gmail.com      ', 'Moataz@gmail.com          ', 'ssa', 'Read'),
(258, 'Moataz@gmail.com      ', 'Doba@gmail.com          ', 'sd', 'Read'),
(259, 'Doba@gmail.com      ', 'Moataz@gmail.com    ', 'xcw', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE `checkout` (
  `ID` int(100) NOT NULL,
  `totalAmount` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `product_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`ID`, `totalAmount`, `email`, `product_id`) VALUES
(30, '                2048', 'Doba@gmail.com', '16'),
(31, '                2400', 'Ali@gmail.com', '15,17'),
(32, '                1024', 'Doba@gmail.com', '16'),
(33, '                1536', 'Doba@gmail.com', '20,16');

-- --------------------------------------------------------

--
-- Table structure for table `contuct`
--

DROP TABLE IF EXISTS `contuct`;
CREATE TABLE `contuct` (
  `ID` int(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `suggestion` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contuct`
--

INSERT INTO `contuct` (`ID`, `email`, `suggestion`, `image`) VALUES
(1, 'Doba@gmail.com', ' saacsxza', 'orange.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `groupId` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `groupLocation` varchar(50) NOT NULL,
  `groupDescription` text NOT NULL,
  `groupDifficulty` varchar(50) NOT NULL,
  `groupImage` varchar(255) NOT NULL,
  `groupDistance` int(50) NOT NULL,
  `groupDuration` int(11) NOT NULL,
  `Taxes` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`groupId`, `groupName`, `groupLocation`, `groupDescription`, `groupDifficulty`, `groupImage`, `groupDistance`, `groupDuration`, `Taxes`) VALUES
(36, 'Hiking', 'China', 'We will start at 4pm ', 'Easy', 'China.png', 300, 11, 10),
(37, 'Hiking', 'United States', 'Good place to make hiking', 'Medium', 'UnitedStates.png', 100, 3, 18);

-- --------------------------------------------------------

--
-- Table structure for table `hrau`
--

DROP TABLE IF EXISTS `hrau`;
CREATE TABLE `hrau` (
  `ID` int(255) NOT NULL,
  `adminemail` varchar(255) NOT NULL,
  `auditoremail` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `investigate` varchar(255) NOT NULL,
  `penalty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hrau`
--

INSERT INTO `hrau` (`ID`, `adminemail`, `auditoremail`, `message`, `investigate`, `penalty`) VALUES
(1, 'Moataz@gmail.com            ', 'kareem@gmail.com', 'el7mdallah ya kbeer', 'investigated', 0),
(2, 'Moataz@gmail.com            ', 'kareem@gmail.com', 'b5er ya 3mohom ant 3aml eh', 'pending investagation', 0),
(3, 'Moataz@gmail.com            ', 'kareem@gmail.com', 'ant 3aml eh a5bark', 'pending investagation', 0),
(4, 'Moataz@gmail.com            ', 'kareem@gmail.com', '2lby', 'pending investagation', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `ID` int(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `groupId` int(11) NOT NULL,
  `Taxes` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `email`, `groupId`, `Taxes`) VALUES
(36, 'Doba@gmail.com', 37, 18),
(37, 'Doba@gmail.com', 36, 10),
(39, 'Ali@gmail.com', 37, 18),
(40, 'Ali@gmail.com', 36, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `ID` int(40) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `productPrice` varchar(255) NOT NULL,
  `productImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `productName`, `productDescription`, `productPrice`, `productImg`) VALUES
(16, 'Sticks', 'Strong Sticks', '800', 'sticks.jpg'),
(20, 'bottle', 'strong bottle', '400', 'bottle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rate_groups`
--

DROP TABLE IF EXISTS `rate_groups`;
CREATE TABLE `rate_groups` (
  `ID` int(255) NOT NULL,
  `groupid` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `rating` int(10) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate_groups`
--

INSERT INTO `rate_groups` (`ID`, `groupid`, `email`, `rating`, `review`) VALUES
(1, 36, 'Doba@gmail.com', 2, 'not good'),
(2, 36, 'Doba@gmail.com', 3, 'pls');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `ID` int(255) NOT NULL,
  `product_id` int(40) NOT NULL,
  `email` varchar(80) NOT NULL,
  `rating` int(10) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`ID`, `product_id`, `email`, `rating`, `review`) VALUES
(10, 16, 'Doba@gmail.com', 2, 'Good product'),
(12, 15, 'Doba@gmail.com', 3, 'good bottle'),
(13, 15, 'Doba@gmail.com', 2, 'Good product'),
(14, 15, 'Doba@gmail.com', 4, 'Awesome product'),
(15, 15, 'Doba@gmail.com', 5, 'Awesome'),
(16, 15, 'Doba@gmail.com', 5, 'Awesome Rate'),
(24, 16, 'Doba@gmail.com', 3, 'awesome sticks'),
(25, 15, 'Ali@gmail.com', 4, 'This bottle awesome'),
(26, 17, 'Ali@gmail.com', 2, 'not good'),
(27, 20, 'moatazkamel@gmail.com', 5, 'very nice product'),
(28, 16, 'moatazkamel@gmail.com', 5, 'nn');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration` (
  `ID` int(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `userType` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`ID`, `firstName`, `lastName`, `email`, `password`, `Image`, `userType`) VALUES
(22, 'joo', 'assem', 'joo22@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '', 4),
(36, 'Omar', 'Samir', 'Omar10@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'omar.png', 1),
(37, 'reem', 'hoosam', 'reem@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'reem.png', 1),
(38, 'Mohamed', 'moataz', 'Moataz@gmail.com', '7bccfde7714a1ebadf06c5f4cea752c1', '', 2),
(40, 'Kareem', 'Ehab', 'kareem@gmail.com', '202cb962ac59075b964b07152d234b70', '', 3),
(42, 'Ahmed', 'Ali', 'Ali@gmail.com', '26588e932c7ccfa1df309280702fe1b5', 'Ahmed.png', 1),
(47, 'Ali', 'Hassan', 'Ali50@gmail.com', '309fee4e541e51de2e41f21bebb342aa', 'prof.png', 1),
(55, 'Philip', 'George', 'Doba@gmail.com', '202cb962ac59075b964b07152d234b70', 'doba.jpg', 1),
(64, 'Saad', 'Ali', 'Ali40@gmail.com', '202cb962ac59075b964b07152d234b70', '', 2),
(67, 'Mohamed', 'Moataz', 'Mohamedmoataz266@gmail.com', '309cd3800aacbd003ac36199fa537295', 'doba.jpg', 1),
(78, 'mohamed', 'moataz', 'mohamed111@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Bhutan.png', 1),
(98, 'mohamed', 'moataz', 'v@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Sunflower_from_Silesia2.jpg', 1),
(99, 'mohamed', 'kamel', 'e@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Sunflower_from_Silesia2.jpg', 1),
(100, 'mohamed', 'moataz', 'p@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Sunflower_from_Silesia2.jpg', 1),
(101, 'mohamed', 'moataz', 'uu@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Sunflower_from_Silesia2.jpg', 1),
(102, 'mohamed', 'moataz', 'uuuu@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Sunflower_from_Silesia2.jpg', 1),
(103, 'mohamed', 'moataz', 'ooo@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Sunflower_from_Silesia2.jpg', 1),
(104, 'mohamed', 'moataz', 'hhhhh@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Sunflower_from_Silesia2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
CREATE TABLE `survey` (
  `ID` int(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`ID`, `email`, `question`) VALUES
(59, 'kareem@gmail.com', 'How R U ?'),
(60, 'kareem@gmail.com', 'What is your favorite player ?'),
(61, 'kareem@gmail.com', 'Azik ?'),
(62, 'kareem@gmail.com', 'What is your favorite food ?'),
(63, 'kareem@gmail.com', 'What is your favorite phone ?');

-- --------------------------------------------------------

--
-- Table structure for table `surveyhiker`
--

DROP TABLE IF EXISTS `surveyhiker`;
CREATE TABLE `surveyhiker` (
  `ID` int(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`) VALUES
(1, 'Hiker'),
(2, 'Administrator'),
(3, 'Auditor'),
(4, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

DROP TABLE IF EXISTS `user_cart`;
CREATE TABLE `user_cart` (
  `ID` int(255) NOT NULL,
  `product_id` int(40) NOT NULL,
  `productPrice` int(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditor`
--
ALTER TABLE `auditor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contuct`
--
ALTER TABLE `contuct`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `hrau`
--
ALTER TABLE `hrau`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rate_groups`
--
ALTER TABLE `rate_groups`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `groupid` (`groupid`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `userType` (`userType`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `surveyhiker`
--
ALTER TABLE `surveyhiker`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditor`
--
ALTER TABLE `auditor`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contuct`
--
ALTER TABLE `contuct`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `hrau`
--
ALTER TABLE `hrau`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rate_groups`
--
ALTER TABLE `rate_groups`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `surveyhiker`
--
ALTER TABLE `surveyhiker`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=653;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `Registration_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
