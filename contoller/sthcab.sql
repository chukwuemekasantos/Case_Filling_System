-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 09:48 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sthcab`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL,
  `complaint_subject` text NOT NULL,
  `complaint_message` mediumtext NOT NULL,
  `complaint_message_reply` longtext NOT NULL,
  `status` varchar(20) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `complaint_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `defendants`
--

CREATE TABLE `defendants` (
  `id` int(11) NOT NULL,
  `case_defending_id` varchar(20) NOT NULL,
  `defendant_claim` varchar(200) NOT NULL,
  `case_defending_status` varchar(10) NOT NULL,
  `member_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defendants`
--

INSERT INTO `defendants` (`id`, `case_defending_id`, `defendant_claim`, `case_defending_status`, `member_id`) VALUES
(1, 'STHC/AB/CASE/832', 'IMG-20181018-WA0000.jpg', 'completed', 'STHC/AB/776');

-- --------------------------------------------------------

--
-- Table structure for table `file_case`
--

CREATE TABLE `file_case` (
  `file_case_id` varchar(25) NOT NULL,
  `name_of_division` varchar(100) NOT NULL,
  `name_of_plaintiff` varchar(200) NOT NULL,
  `add_of_plaintiff` text NOT NULL,
  `name_of_defendants` varchar(100) NOT NULL,
  `add_of_defendants` text NOT NULL,
  `cat_of_defendants` varchar(18) NOT NULL,
  `claims_document` varchar(500) NOT NULL,
  `claims_amount` varchar(30) NOT NULL,
  `defendant_claim` varchar(500) NOT NULL,
  `name_of_practitioner` varchar(100) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `date_of_file_case` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_case`
--

INSERT INTO `file_case` (`file_case_id`, `name_of_division`, `name_of_plaintiff`, `add_of_plaintiff`, `name_of_defendants`, `add_of_defendants`, `cat_of_defendants`, `claims_document`, `claims_amount`, `defendant_claim`, `name_of_practitioner`, `member_id`, `date_of_file_case`) VALUES
('STHC/AB/CASE/495', 'Abakaliki Division', 'chukwu daniel', 'No 7 ogaja Road Abakaliki', 'chisom chukwuemeka', 'No 8 Bassey Street off water works', 'individual', 'login.PNG', 'N250,001 - N500,000', '', '', 'STHC/AB/146', '2019-08-18 09:58:30'),
('STHC/AB/CASE/832', 'Abakaliki Division', 'chukwu daniel', 'No 7 ogaja Road Abakaliki', 'chisom chukwuemeka', 'No 8 Bassey Street off water works', 'individual', 'ANALOGO.png', 'N250,001 - N500,000', '', '', 'STHC/AB/146', '2019-08-05 04:14:07'),
('STHC/AB/CASE/871', 'Abakaliki Division', 'Ogbonna', 'No 8', 'Gideon', 'no 7 ', 'individual', 'IMG-20181018-WA0000.jpg', 'N250,001 - N500,000', '', '', 'STHC/AB/146', '2019-08-05 04:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `judgement`
--

CREATE TABLE `judgement` (
  `id` int(11) NOT NULL,
  `judgement_note` longtext NOT NULL,
  `judgement_document` varchar(100) NOT NULL,
  `case_id` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judgement`
--

INSERT INTO `judgement` (`id`, `judgement_note`, `judgement_document`, `case_id`, `date`) VALUES
(1, 'sentence to 5 years in prisonment', '', 'STHC/AB/CASE/832', '2019-08-05 03:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `preceedings`
--

CREATE TABLE `preceedings` (
  `preceeding_id` int(11) NOT NULL,
  `preceeding` longtext NOT NULL,
  `proceeding_document` varchar(100) NOT NULL,
  `status` varchar(7) NOT NULL,
  `case_id` varchar(20) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `date_of_preceeding` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preceedings`
--

INSERT INTO `preceedings` (`preceeding_id`, `preceeding`, `proceeding_document`, `status`, `case_id`, `member_id`, `date_of_preceeding`) VALUES
(1, 'The Checkbutton widget is used to display a number of options to a user as toggle buttons. The user can then select one or more options by clicking the button corresponding to each option.', '', 'new', 'STHC/AB/CASE/832', '', '2019-08-05 04:22:25'),
(2, 'The Checkbutton widget is used to display a number of options to a user as toggle buttons. The user can then select one or more options by clicking the button corresponding to each option.', '', 'new', 'STHC/AB/CASE/832', 'STHC/AB/146', '2019-08-05 03:37:46'),
(3, 'Images comes in all sizes. So do screens. Responsive images automatically adjust to fit the size of the screen.', 'C:\\xampp\\tmp\\phpEEC0.tmp', 'new', 'STHC/AB/CASE/832', 'STHC/AB/146', '2019-08-20 05:47:04'),
(4, 'Images comes in all sizes. So do screens. Responsive images automatically adjust to fit the size of the screen.', 'C:\\xampp\\tmp\\phpCAE7.tmp', 'new', 'STHC/AB/CASE/832', 'STHC/AB/146', '2019-08-20 05:58:55'),
(5, 'Images comes in all sizes. So do screens. Responsive images automatically adjust to fit the size of the screen.', '', 'new', 'STHC/AB/CASE/832', 'STHC/AB/146', '2019-08-20 06:03:15'),
(6, 'Images comes in all sizes. So do screens. Responsive images automatically adjust to fit the size of the screen.', 'IMG_20190703_123709_0.jpg', 'new', 'STHC/AB/CASE/832', 'STHC/AB/146', '2019-08-20 06:08:31'),
(7, 'Images comes in all sizes. So do screens. Responsive images automatically adjust to fit the size of the screen.', 'IMG_20190703_123709_0.jpg', 'new', 'STHC/AB/CASE/832', 'STHC/AB/146', '2019-08-20 06:10:27'),
(8, 'Chukwu Chukwuebuka D.', 'IMG_20190802_161844_7.jpg', 'new', 'STHC/AB/CASE/832', 'STHC/AB/146', '2019-08-20 06:20:12'),
(9, 'Chukwu Chukwuebuka D.', 'IMG_20190802_161844_7.jpg', 'new', 'STHC/AB/CASE/832', 'STHC/AB/146', '2019-08-20 06:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `registered_admin`
--

CREATE TABLE `registered_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(360) NOT NULL,
  `admin_phone` varchar(11) NOT NULL,
  `date_of_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_admin`
--

INSERT INTO `registered_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`, `date_of_reg`) VALUES
(1, 'chukwu chukwuemeka', 'ccc@gmail.com', '$2y$10$ZWODNU5OU2oM9gdQMCkw5eP9Q4S/sIKi3k8L.n7J6EXQrvbrcExta', '09054599180', '2020-07-07 00:13:50'),
(2, 'chukwu chukwuemka', 'admin@gmail.com', '$2y$10$WY4JK0gZ5QILPfstVn8xaef2/3t7WpgOvXaQWQQFale95FcBdBsYa', '08103209296', '2019-08-20 06:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `registered_individual`
--

CREATE TABLE `registered_individual` (
  `individual_id` varchar(16) NOT NULL,
  `individual_title` text NOT NULL,
  `individual_fullname` text NOT NULL,
  `individual_country` text NOT NULL,
  `individual_state` text NOT NULL,
  `individual_lga` text NOT NULL,
  `individual_dob` varchar(21) NOT NULL,
  `individual_gender` text NOT NULL,
  `individual_address` varchar(200) NOT NULL,
  `individual_city` text NOT NULL,
  `individual_phone` varchar(11) NOT NULL,
  `individual_email` varchar(200) NOT NULL,
  `individual_password` varchar(255) NOT NULL,
  `individual_date_of_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_individual`
--

INSERT INTO `registered_individual` (`individual_id`, `individual_title`, `individual_fullname`, `individual_country`, `individual_state`, `individual_lga`, `individual_dob`, `individual_gender`, `individual_address`, `individual_city`, `individual_phone`, `individual_email`, `individual_password`, `individual_date_of_reg`) VALUES
('STHC/AB/146', 'Mr', 'Daberechi Okoh', 'Nigeria', 'Ebonyi State', 'Ikwo LGA', '14th - August - 201', 'Male', 'N0 7 Bassey Street Off Water Works', 'Abakaliki', '08103209296', 'do@gmail.com', '$2y$10$54/7uwbKj2fmaHTHMMhiy.glSEZdWHlMNW6ganA.5aDwjujTFIEcy', '2019-08-05 04:13:21'),
('STHC/AB/776', 'Mr', 'dan chisom keneth', 'Nigeria', 'Ebonyi State', 'Ikwo LGA', '15th - August - 2019', 'Male', 'N0 7 Bassey Street Off Water Works', 'Abakaliki', '08103209296', 'dck@gmail.com', '$2y$10$aaKzYuJS9wPcWd9ilQgw4.Vo4KFn/mSHc3xLyGTGMRRLIMIhVQ5aW', '2019-08-05 04:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `registered_organization`
--

CREATE TABLE `registered_organization` (
  `organization_id` varchar(18) NOT NULL,
  `organization_name` text NOT NULL,
  `organization_country` text NOT NULL,
  `organization_state` text NOT NULL,
  `organization_city` varchar(50) NOT NULL,
  `organization_lga` text NOT NULL,
  `organization_type` varchar(50) NOT NULL,
  `organization_address` varchar(200) NOT NULL,
  `organization_phone` varchar(11) NOT NULL,
  `organization_email` varchar(100) NOT NULL,
  `organization_password` varchar(255) NOT NULL,
  `organization_date_of_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `defendants`
--
ALTER TABLE `defendants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_case`
--
ALTER TABLE `file_case`
  ADD PRIMARY KEY (`file_case_id`);

--
-- Indexes for table `judgement`
--
ALTER TABLE `judgement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preceedings`
--
ALTER TABLE `preceedings`
  ADD PRIMARY KEY (`preceeding_id`);

--
-- Indexes for table `registered_admin`
--
ALTER TABLE `registered_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `defendants`
--
ALTER TABLE `defendants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `judgement`
--
ALTER TABLE `judgement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preceedings`
--
ALTER TABLE `preceedings`
  MODIFY `preceeding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registered_admin`
--
ALTER TABLE `registered_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
