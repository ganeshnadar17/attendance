-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2018 at 05:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gopal_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `artical`
--

CREATE TABLE `artical` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artical_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artical`
--

INSERT INTO `artical` (`id`, `user_id`, `artical_user`) VALUES
(2, 3, 'Ganesh123'),
(3, 2, 'sdsaasdasdasdsad'),
(4, 2, 'ASDDAASS'),
(7, 1, 'Nadar'),
(12, 1, 'MY PHP'),
(13, 1, 'AAAAAAAAAAAAAA ');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `atten_id` int(4) NOT NULL,
  `atten_date` date NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`atten_id`, `atten_date`, `student_id`, `user_id`) VALUES
(6, '2018-08-22', '11|12|13|18|19|20', 1),
(7, '2018-07-25', '12|13|18', 1),
(8, '2018-07-12', '11|13|18|20', 1),
(9, '2018-06-22', '13|18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `id` int(4) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`id`, `user_name`, `password`, `name`, `last_name`, `email_id`) VALUES
(1, 'gan_17', '12345', 'Gopal', 'Nadar', 'gan@gmail.com'),
(2, 'nadar', '12345', 'ganesh', 'Nadar', 'gan@nadar.com'),
(3, 'abc', '12345', 'abc', 'def', 'abc@gmaicom'),
(4, 'xyz', '12345', 'xyz', 'abc', 'xyz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `movie_booking`
--

CREATE TABLE `movie_booking` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `movie_id` int(4) NOT NULL,
  `selected_list` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_booking`
--

INSERT INTO `movie_booking` (`id`, `user_id`, `movie_id`, `selected_list`, `status`, `date_time`) VALUES
(1, 1, 13, 'A2,E3,F3', 1, '2018-07-18 18:15:18'),
(3, 1, 13, 'B1,C1,D1', 1, '2018-07-18 19:07:45'),
(4, 1, 13, 'B2,C2,D2,E2,F2', 1, '2018-07-19 15:43:01'),
(5, 1, 13, 'A4,A5,A6,A7,A8', 1, '2018-07-19 15:44:39'),
(6, 1, 13, 'A1,A3', 1, '2018-07-19 16:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `movie_list`
--

CREATE TABLE `movie_list` (
  `movie_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `movie_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_list`
--

INSERT INTO `movie_list` (`movie_id`, `user_id`, `movie_name`, `from_date`, `to_date`, `movie_image`) VALUES
(8, 1, 'Swamy', '2018-07-04', '2018-07-13', 'ef495380693468e6251c69f96c52bcba.jpg'),
(11, 1, 'Swamy', '2018-07-03', '2018-07-07', 'b1c33d0c9463b11b4b447846cdddf22e.jpg'),
(13, 1, 'Swamy', '2018-07-01', '2018-07-31', '48792a6a83165c852b30da564ca9a42c.jpg'),
(14, 1, 'ABCD', '2018-07-01', '2018-07-06', '8a5f7190faf541f0e939fc2ed4a52d68.jpg'),
(17, 1, 'ABCD_2', '2018-07-12', '2018-07-19', '52a812a2483f908ade704956c832d4a2.jpg'),
(18, 1, 'dell', '2018-07-01', '2018-07-30', 'aac6f067bc099f1f466df606e74b9b29.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `per_data`
--

CREATE TABLE `per_data` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `number` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `age` int(4) NOT NULL,
  `language` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `per_data`
--

INSERT INTO `per_data` (`id`, `user_id`, `name`, `emailid`, `number`, `address`, `age`, `language`, `gender`, `upload_image`) VALUES
(11, 1, 'Ganesh Muthu Raj Nadar', 'ganeshnadar17@gmail.com', 8828616076, 'A/16 Murgan Chawl Near Tamil School Jari Mari Kurla (W)', 9, 'english|marathi', 'male', '4cdefc97e7f144ecb9196341e5602711.jpg'),
(12, 1, 'Ganesh Nadar', 'ganeshnadar17@gmail.com', 918828616076, 'Shop no 2;Ganesh Store Murugan\r\nChawl near tamil school k-a rd', 16, 'english|hindi', 'male', '20130629_171918.jpg'),
(13, 1, 'Ganesh Muthu Raj Nadar', 'ganeshnadar17@gmail.com', 8828616076, 'A/16 Murgan Chawl Near Tamil School Jari Mari Kurla (W)', 14, 'english|hindi|marathi', 'male', '20130629_171939.jpg'),
(18, 1, 'NADAR', 'NADAR@gmail.com', 89784, '5412024121', 4, 'english|hindi|marathi', 'female', '20130629_171939.jpg'),
(19, 1, 'NADAR', 'NADAR@gmail.com', 89784, '5412024121', 4, 'english|hindi|marathi', 'female', '20130629_171939.jpg'),
(20, 1, 'Ganesh Nadar', 'ganeshnadar17@gmail.com', 918828616076, 'Shop no 2;Ganesh Store Murugan\r\nChawl near tamil school k-a rd', 17, 'hindi', 'male', '17e8fddec5c1e9a2434da09ab53e6c7f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table_1`
--

CREATE TABLE `table_1` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_1`
--

INSERT INTO `table_1` (`id`, `first_name`, `last_name`, `city`) VALUES
(1, 'kt', 'nadar', 'mumabi'),
(2, 'gopal', 'nadar', 'mumbai'),
(3, 'gopal', 'nadar', 'mumbai'),
(4, 'John', 'Doe', 'john@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artical`
--
ALTER TABLE `artical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`atten_id`);

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_booking`
--
ALTER TABLE `movie_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_list`
--
ALTER TABLE `movie_list`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `per_data`
--
ALTER TABLE `per_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_1`
--
ALTER TABLE `table_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artical`
--
ALTER TABLE `artical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `atten_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movie_booking`
--
ALTER TABLE `movie_booking`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movie_list`
--
ALTER TABLE `movie_list`
  MODIFY `movie_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `per_data`
--
ALTER TABLE `per_data`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table_1`
--
ALTER TABLE `table_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
