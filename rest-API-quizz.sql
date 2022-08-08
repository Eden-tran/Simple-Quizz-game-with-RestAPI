-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 08, 2022 at 03:43 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest-API-quizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `Quizz`
--

CREATE TABLE `Quizz` (
  `Id` int(5) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `AnswerA` varchar(200) NOT NULL,
  `AnswerB` varchar(200) NOT NULL,
  `AnswerC` varchar(200) NOT NULL,
  `CorrectAnswer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Quizz`
--

INSERT INTO `Quizz` (`Id`, `Title`, `AnswerA`, `AnswerB`, `AnswerC`, `CorrectAnswer`) VALUES
(1, 'Bóng rổ ra đời tại nước nào - năm bao nhiêu? ', 'Brazil - năm 1895', 'Mỹ - năm 1890', 'Mỹ - năm 1891', 'c'),
(6, 'Fan Mu ở đâu', 'ở trong hang', 'ở ngoài hang', 'Ở trong tim người hâm mộ', 'C'),
(8, 'MU tuổi gì', 'Tổn lùi', 'Mu vô đối', 'Mân Đàn', 'A'),
(9, 'Fan SE ở đâu', 'Ở đáy xã hội', 'ở trong hang', 'A và B chính xác', 'C'),
(17, 'Mân đàn ăn gì', 'Ở đáy xã hộiỞ đáy xã hộiỞ đáy xã hộiỞ đáy xã hộiỞ đáy xã hộiỞ đáy xã hộiỞ đáy xã hội', 'ở trong hang', 'A và B chính xác', 'C'),
(18, 'Nước Mỹ có bao nhiêu bang', '50', '52', '51', 'A'),
(19, 'Việt nam có bao nhiêu tỉnh thành', '63', '60', '65', 'A'),
(20, 'MU có bao nhiê EPL', '21', '20', '19', 'B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Quizz`
--
ALTER TABLE `Quizz`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Quizz`
--
ALTER TABLE `Quizz`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
