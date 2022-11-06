-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2022 at 07:39 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `Itemsid` int(11) NOT NULL,
  `colours` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `Lijsten_idLijsten` int(11) NOT NULL,
  PRIMARY KEY (`Itemsid`,`Lijsten_idLijsten`),
  KEY `fk_Items_Lijsten1_idx` (`Lijsten_idLijsten`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lijsten`
--

DROP TABLE IF EXISTS `lijsten`;
CREATE TABLE IF NOT EXISTS `lijsten` (
  `idLijsten` int(11) NOT NULL,
  `naamLijst` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idLijsten`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `e-mail` varchar(45) DEFAULT NULL,
  `Naam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `username`, `password`, `e-mail`, `Naam`) VALUES
(3, 'kipyboy', '$2y$10$MkVlbGKygahCLofpIx0kyOO9oZnTHvZETRdCw2IvM/7yimOOLWLyu', 'jornkamps61@gmail.com', 'Jorn Kamps'),
(4, 'kipyboyt', '$2y$10$iHt1gh6Abz6U3j71iyM4..B7Y1kc3nPkrvzBLPDAI8EYxUIPIzM0e', 'jornkamps61@gmail.com', 'Jorn Kamps');

-- --------------------------------------------------------

--
-- Table structure for table `users_has_lijsten`
--

DROP TABLE IF EXISTS `users_has_lijsten`;
CREATE TABLE IF NOT EXISTS `users_has_lijsten` (
  `Users_idUsers` int(11) NOT NULL,
  `Lijsten_idLijsten` int(11) NOT NULL,
  PRIMARY KEY (`Users_idUsers`,`Lijsten_idLijsten`),
  KEY `fk_Users_has_Lijsten_Lijsten1_idx` (`Lijsten_idLijsten`),
  KEY `fk_Users_has_Lijsten_Users_idx` (`Users_idUsers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_Items_Lijsten1` FOREIGN KEY (`Lijsten_idLijsten`) REFERENCES `lijsten` (`idLijsten`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_has_lijsten`
--
ALTER TABLE `users_has_lijsten`
  ADD CONSTRAINT `fk_Users_has_Lijsten_Lijsten1` FOREIGN KEY (`Lijsten_idLijsten`) REFERENCES `lijsten` (`idLijsten`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Users_has_Lijsten_Users` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
