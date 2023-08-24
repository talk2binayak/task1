-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 23, 2023 at 10:39 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empfile`
--

DROP TABLE IF EXISTS `tbl_empfile`;
CREATE TABLE IF NOT EXISTS `tbl_empfile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `uploaded_on` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_empfile`
--

INSERT INTO `tbl_empfile` (`id`, `emp_id`, `file_name`, `uploaded_on`) VALUES
(1, 2, 'Home-Page-Side-Photo.jpg', '2023-08-24 02:40:45'),
(2, 2, 'Home-Page-Side-Photo_small.jpg', '2023-08-24 02:42:01'),
(3, 2, '1516782483493.jfif', '2023-08-24 02:46:47'),
(4, 2, '1516782483493.jpg', '2023-08-24 02:54:20'),
(5, 2, 'amex.png', '2023-08-24 03:57:25'),
(6, 2, 'Form_pdf_162151840030823.pdf', '2023-08-24 04:00:51'),
(7, 2, 'Home-Page-Side-Photo.jpg', '2023-08-24 04:01:16'),
(8, 2, '1516782483493.jpg', '2023-08-24 04:03:37'),
(9, 1, '1516782483493.jpg', '2023-08-24 04:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

DROP TABLE IF EXISTS `tbl_employee`;
CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `doj` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `emp_name`, `designation`, `dob`, `doj`, `blood_group`, `mobile`, `email`, `address`) VALUES
(1, 'John Doe', 'Software Engineer', '1990-05-15', '2015-10-01', 'A+', '1234567890', 'john.doe@example.com', '123 Main St'),
(2, 'Jane Smith', 'Product Manager', '1985-08-20', '2012-04-15', 'B-', '9876543210', 'jane.smith@example.com', '456 Elm St'),
(3, 'Employee 100', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee100@example.com', 'Address 100'),
(4, 'Employee 101', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee101@example.com', 'Address 101'),
(5, 'Employee 200', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee200@example.com', 'Address 200'),
(6, 'John Doe', 'Software Engineer', '1990-05-15', '2015-10-01', 'A+', '1234567890', 'john.doe@example.com', '123 Main St'),
(7, 'Jane Smith', 'Product Manager', '1985-08-20', '2012-04-15', 'B-', '9876543210', 'jane.smith@example.com', '456 Elm St'),
(8, 'Employee 100', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee100@example.com', 'Address 100'),
(9, 'Employee 101', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee101@example.com', 'Address 101'),
(10, 'Employee 200', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee200@example.com', 'Address 200'),
(11, 'John Doe', 'Software Engineer', '1990-05-15', '2015-10-01', 'A+', '1234567890', 'john.doe@example.com', '123 Main St'),
(12, 'Jane Smith', 'Product Manager', '1985-08-20', '2012-04-15', 'B-', '9876543210', 'jane.smith@example.com', '456 Elm St'),
(13, 'Employee 100', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee100@example.com', 'Address 100'),
(14, 'Employee 101', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee101@example.com', 'Address 101'),
(15, 'Employee 200', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee200@example.com', 'Address 200'),
(16, 'John Doe', 'Software Engineer', '1990-05-15', '2015-10-01', 'A+', '1234567890', 'john.doe@example.com', '123 Main St'),
(17, 'Jane Smith', 'Product Manager', '1985-08-20', '2012-04-15', 'B-', '9876543210', 'jane.smith@example.com', '456 Elm St'),
(18, 'Employee 100', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee100@example.com', 'Address 100'),
(19, 'Employee 101', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee101@example.com', 'Address 101'),
(20, 'Employee 200', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee200@example.com', 'Address 200'),
(21, 'John Doe', 'Software Engineer', '1990-05-15', '2015-10-01', 'A+', '1234567890', 'john.doe@example.com', '123 Main St'),
(22, 'Jane Smith', 'Product Manager', '1985-08-20', '2012-04-15', 'B-', '9876543210', 'jane.smith@example.com', '456 Elm St'),
(23, 'Employee 100', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee100@example.com', 'Address 100'),
(24, 'Employee 101', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee101@example.com', 'Address 101'),
(25, 'Employee 200', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee200@example.com', 'Address 200'),
(26, 'John Doe', 'Software Engineer', '1990-05-15', '2015-10-01', 'A+', '1234567890', 'john.doe@example.com', '123 Main St'),
(27, 'Jane Smith', 'Product Manager', '1985-08-20', '2012-04-15', 'B-', '9876543210', 'jane.smith@example.com', '456 Elm St'),
(28, 'Employee 100', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee100@example.com', 'Address 100'),
(29, 'Employee 101', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee101@example.com', 'Address 101'),
(30, 'Employee 200', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee200@example.com', 'Address 200'),
(31, 'John Doe', 'Software Engineer', '1990-05-15', '2015-10-01', 'A+', '1234567890', 'john.doe@example.com', '123 Main St'),
(32, 'Jane Smith', 'Product Manager', '1985-08-20', '2012-04-15', 'B-', '9876543210', 'jane.smith@example.com', '456 Elm St'),
(33, 'Employee 100', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee100@example.com', 'Address 100'),
(34, 'Employee 101', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee101@example.com', 'Address 101'),
(35, 'Employee 200', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee200@example.com', 'Address 200'),
(36, 'John Doe', 'Software Engineer', '1990-05-15', '2015-10-01', 'A+', '1234567890', 'john.doe@example.com', '123 Main St'),
(37, 'Jane Smith', 'Product Manager', '1985-08-20', '2012-04-15', 'B-', '9876543210', 'jane.smith@example.com', '456 Elm St'),
(38, 'Employee 100', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee100@example.com', 'Address 100'),
(39, 'Employee 101', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee101@example.com', 'Address 101'),
(40, 'Employee 200', 'Position', '1990-01-01', '2020-01-01', 'O+', '1234567890', 'employee200@example.com', 'Address 200');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `prof_pic` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `role_type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `last_login_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `fullname`, `gender`, `email`, `mobile`, `prof_pic`, `dob`, `role_type`, `status`, `created_at`, `last_login_time`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Binayak Das', 'Male', 'talk2binayak@gmail.com', '9861180447', 'upload/1692815549.png', '06-12-1984', 'Super Admin', 'active', '2023-02-20 07:45:40', '2023-08-23 06:58:08'),
(2, 'talk2binayak', '0192023a7bbd73250516f069df18b500', 'Binayak Das22', 'Male', 'swetalina.maastrix@gmail.com', '9861180448', '', '22-05-1992', 'Admin', 'active', '2023-03-22 12:55:28', '2023-03-25 04:55:16'),
(8, 'puja.gupta', '317419d46c44c40b99f7351739dbec74', 'Pooja Gupta', 'Female', 'pooja@gmail.com', '986554445', NULL, '22-05-1992', 'User', 'active', '2023-08-23 12:38:09', NULL),
(9, 'shreenath.ojha', '317419d46c44c40b99f7351739dbec74', 'Shreenath Ojha', 'Male', 'shreenath@gmail.com', '9865555555', NULL, '22-08-1994', 'User', 'active', '2023-08-23 12:42:20', NULL),
(13, 'talk2prangya', '317419d46c44c40b99f7351739dbec74', 'Prangya Samantray', 'Female', 'talk2prangya@gmail.com', '9861150445', 'upload/1692829344.png', '09-11-1986', 'User', 'active', '2023-08-23 06:22:30', '2023-08-23 07:00:09'),
(12, 'talk2nirved', '317419d46c44c40b99f7351739dbec74', 'Nirved Das', 'Male', 'talk2nirved@gmail.com', '9861180448', NULL, '22-02-2022', 'User', 'inactive', '2023-08-23 06:05:09', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
