-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 08:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music store`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `fsid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`fsid`, `uid`, `sid`) VALUES
(1, 1, 1),
(2, 1, 2),
(6, 2, 2),
(10, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `plid` int(11) NOT NULL,
  `plname` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`plid`, `plname`, `uid`) VALUES
(2, 'Dance', 2),
(3, 'Fun', 1),
(4, 'GYM', 1),
(8, 'timepass', 2);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rsong` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`rid`, `uid`, `rsong`, `status`) VALUES
(1, 1, 'Wafa Na Raas Aayee', 'Done'),
(2, 1, 'Heartless', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `sartist` varchar(50) NOT NULL,
  `sgenre` varchar(50) NOT NULL,
  `ssong` varchar(50) NOT NULL,
  `simage` varchar(50) NOT NULL,
  `saimage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`sid`, `sname`, `sartist`, `sgenre`, `ssong`, `simage`, `saimage`) VALUES
(1, 'Hardwind - Want Me', 'Mike Archangelo', 'Electronic', 'song1', 'cover1', 'Mike Archangelo'),
(2, 'Bedardi Se Pyaar Ka', 'Jubin Nautiyal', 'Sad', 'song2', 'cover2', 'Jubin Nautiyal'),
(3, 'Kar Har Maidaan Fateh', 'Sukhwinder Singh', 'Rock', 'song3', 'cover3', 'Sukhwinder Singh'),
(4, 'BEAUZ & JVNA - Crazy', 'NCS Release', 'Dance', 'song4', 'cover4', 'NCS Release'),
(5, 'Ikson - Anywhere', 'Ikson', 'Dance', 'song5', 'cover5', 'Ikson'),
(6, 'Sun Goes Down', 'Jim Yosef', 'Pop', 'song6', 'cover6', 'Jim Yosef'),
(7, 'Lost Sky - Vision', 'NCS Release', 'Electronic', 'song7', 'cover7', 'NCS Release'),
(8, 'Wafa Na Raas Aayee', 'Jubin Nautiyal', 'Sad', 'Wafa Na Raas Aayee', 'Wafa Na Raas Aayee', 'Jubin Nautiyal'),
(10, 'Heartless', 'Badshah', 'Pop', 'Heartless', 'Heartless', 'Badshah');

-- --------------------------------------------------------

--
-- Table structure for table `songpl`
--

CREATE TABLE `songpl` (
  `splid` int(11) NOT NULL,
  `plid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songpl`
--

INSERT INTO `songpl` (`splid`, `plid`, `sid`, `uid`) VALUES
(4, 2, 5, 2),
(5, 2, 4, 2),
(7, 2, 1, 2),
(8, 3, 1, 1),
(9, 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `upass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `uemail`, `upass`) VALUES
(1, 'Farhan', 'farhan@gmail.com', 'farhan123'),
(2, 'Salim', 'salim@gmail.com', 'salim123'),
(3, 'Bhavik', 'bhavik@gmail.com', 'bhavik123'),
(4, 'Admin', 'admin@ms.com', 'adminofMS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`fsid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`plid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `songpl`
--
ALTER TABLE `songpl`
  ADD PRIMARY KEY (`splid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `songpl_ibfk_2` (`sid`),
  ADD KEY `plid` (`plid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `fsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `plid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `songpl`
--
ALTER TABLE `songpl`
  MODIFY `splid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `song` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `songpl`
--
ALTER TABLE `songpl`
  ADD CONSTRAINT `songpl_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `songpl_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `song` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `songpl_ibfk_3` FOREIGN KEY (`plid`) REFERENCES `playlist` (`plid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
