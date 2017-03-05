-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2017 at 08:08 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `companydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(64) NOT NULL,
  `company_password` varchar(64) NOT NULL,
  `company_email` varchar(64) NOT NULL,
  `company_username` varchar(64) NOT NULL,
  `company_joindate` date NOT NULL,
  `company_phonenumber` varchar(32) NOT NULL,
  `company_address` varchar(32) NOT NULL,
  `company_city` varchar(32) NOT NULL,
  `company_country` varchar(32) NOT NULL,
  `company_about_short` varchar(32) NOT NULL,
  `company_avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_password`, `company_email`, `company_username`, `company_joindate`, `company_phonenumber`, `company_address`, `company_city`, `company_country`, `company_about_short`, `company_avatar`) VALUES
(1, 'Testerino ltd.', '123', 'Testing@testing.ton', 'Testerino ltd.', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/startup.jpg'),
(2, 'Testerino ltd. 2', '123', 'Testing2@testing.ton', 'Testerino ltd.', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/ob2.png'),
(3, 'Testerino ltd. 3', '123', 'Testing3@testing.ton', 'Testerino ltd.', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/office_building.png'),
(4, 'Example StartUp', '123', 'Example@testing.com', 'ExampleStartUp', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/office-building-icon-32.png'),
(5, 'Example StartUp2', '123', 'Example@testing.com', 'ExampleStartUp2', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/lol.png'),
(6, 'Example StartUp3', '123', 'Example@testing.com', 'ExampleStartUp3', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/startup.jpg'),
(7, 'Example StartUp4', '123', 'Example@testing.com', 'ExampleStartUp4', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/startup.jpg'),
(8, 'Example StartUp5', '123', 'Example@testing.com', 'ExampleStartUp5', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/startup.jpg'),
(9, 'Example StartUp6', '123', 'Example@testing.com', 'ExampleStartUp6', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/startup.jpg'),
(10, 'Example StartUp7', '123', 'Example@testing.com', 'ExampleStartUp7', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/startup.jpg'),
(11, 'Example StartUp8', '123', 'Example@testing.com', 'ExampleStartUp8', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/startup.jpg'),
(12, 'Example StartUp9', '123', 'Example@testing.com', 'ExampleStartUp9', '2017-02-21', '', '', '', '', '', '../../resources/companyAvatars/startup.jpg'),
(13, 'Wafaa', 'moroporo', 'wafa@wafter.waf', 'Wafaa', '2017-02-22', '', '', '', '', '', '../../resources/companyAvatars/startup.jpg'),
(14, 'CompHash', '$2y$10$dq4pM7JH3WqbSssAp/0RqO4FSMRkv2ZPS5DF8NEvu/2oAEe30uU6.', 'com@hashtest.com', 'CompHash', '2017-03-02', '', '', '', '', '', '../../resources/companyAvatars/startup.jpg'),
(15, 'CompHash2', '$2y$10$lnv16YgHA3eOK0crLpu0oePEcbh4cv1X6yWBXfjjAX8Mu7vxVsSpa', 'comp2@hashtest.com', 'CompHash2', '2017-03-02', '', '', '', '', '', '../../resources/companyAvatars/startup.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `field_id` int(10) UNSIGNED NOT NULL,
  `field_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`field_id`, `field_name`) VALUES
(1, 'Mathematics'),
(2, 'Information Technology (IT)'),
(3, 'Engineering and Technology'),
(4, 'Medical and Health Sciences'),
(5, 'Agricultural sciences'),
(6, 'Social Sciences'),
(7, 'Humanities'),
(8, 'Design');

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE `profession` (
  `profession_id` int(10) UNSIGNED NOT NULL,
  `profession_field_id` int(11) UNSIGNED NOT NULL,
  `profession_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`profession_id`, `profession_field_id`, `profession_name`) VALUES
(1, 2, ' '),
(2, 2, 'Application Developer'),
(3, 2, 'Application Support Analyst'),
(4, 2, 'Applications Engineer'),
(5, 2, 'Associate Developer'),
(6, 2, 'Chief Technology Officer (CTO)'),
(7, 2, 'Chief Information Officer (CIO)'),
(8, 2, 'Computer and Information Systems Manager'),
(9, 2, 'Computer Systems Manager'),
(10, 2, 'Customer Support Administrator'),
(11, 2, 'Customer Support Specialist'),
(12, 2, 'Data Center Support Specialist'),
(13, 2, 'Data Quality Manager'),
(14, 2, 'Database Administrator'),
(15, 2, 'Desktop Support Manager'),
(16, 2, 'Desktop Support Specialist'),
(17, 2, 'Developer'),
(18, 2, 'Director of Technology'),
(19, 2, 'Full-stack Developer'),
(20, 2, 'Front End Developer'),
(21, 2, 'Help Desk Specialist'),
(22, 2, 'Help Desk Technician'),
(23, 2, 'Information Technology Coordinator'),
(24, 2, 'Information Technology Director'),
(25, 2, 'Information Technology Manager'),
(26, 2, 'IT Support Manager'),
(27, 2, 'IT Support Specialist'),
(28, 2, 'IT Systems Administrator'),
(29, 2, 'Java Developer'),
(30, 2, 'Junior Software Engineer'),
(31, 2, 'Management Information Systems Director'),
(32, 2, '.NET Developer'),
(33, 2, 'Network Architect'),
(34, 2, 'Network Engineer'),
(35, 2, 'Network Systems Administrator'),
(36, 2, 'Programmer'),
(37, 2, 'Programmer Analyst'),
(38, 2, 'Security Specialist'),
(39, 2, 'Senior Applications Engineer'),
(40, 2, 'Senior Database Administrator'),
(41, 2, 'Senior Network Architect'),
(42, 2, 'Senior Network Engineer'),
(43, 2, 'Senior Network System Administrator'),
(44, 2, 'Senior Programmer'),
(45, 2, 'Senior Programmer Analyst'),
(46, 2, 'Senior Security Specialist'),
(47, 2, 'Senior Software Engineer'),
(48, 2, 'Senior Support Specialist'),
(49, 2, 'Senior System Administrator'),
(50, 2, 'Senior System Analyst'),
(51, 2, 'Senior System Architect'),
(52, 2, 'Senior System Designer'),
(53, 2, 'Senior Systems Analyst'),
(54, 2, 'Senior Systems Software Engineer'),
(55, 2, 'Senior Web Administrator'),
(56, 2, 'Senior Web Developer'),
(57, 2, 'Software Architect'),
(58, 2, 'Software Developer'),
(59, 2, 'Software Engineer'),
(60, 2, 'Software Quality Assurance Analyst'),
(61, 2, 'Support Specialist'),
(62, 2, 'Systems Administrator'),
(63, 2, 'Systems Analyst'),
(64, 2, 'System Architect'),
(65, 2, 'Systems Designer'),
(66, 2, 'Systems Software Engineer'),
(67, 2, 'Technical Operations Officer'),
(68, 2, 'Technical Support Engineer'),
(69, 2, 'Technical Support Specialist'),
(70, 2, 'Technical Specialist'),
(71, 2, 'Telecommunications Specialist'),
(72, 2, 'Web Administrator'),
(73, 2, 'Web Developer'),
(74, 2, 'Webmaster'),
(75, 3, ' '),
(76, 3, 'Acoustic Engineer'),
(77, 3, 'Aerospace Engineer'),
(78, 3, 'Agricultural Engineer'),
(79, 3, 'Applied Engineer'),
(80, 3, 'Architectural Engineer'),
(81, 3, 'Audio Engineer'),
(82, 3, 'Automotive Engineer'),
(83, 3, 'Biomedical Engineer'),
(84, 3, 'Chemical Engineer'),
(85, 3, 'Civil Engineer'),
(86, 3, 'Computer Engineer'),
(87, 3, 'Electrical Engineer'),
(88, 3, 'Environmental Engineer'),
(89, 3, 'Industrial Engineer'),
(90, 3, 'Marine Engineer'),
(91, 3, 'Materials Science Engineer'),
(92, 3, 'Mechanical Engineer'),
(93, 3, 'Mechatronic Engineer'),
(94, 3, 'Mining and Geological Engineer'),
(95, 3, 'Molecular Engineer'),
(96, 3, 'Nanoengineer'),
(97, 3, 'Nuclear Engineer'),
(98, 3, 'Petroleum Engineer'),
(99, 3, 'Software Engineer'),
(100, 3, 'Structural Engineer'),
(101, 3, 'Telecommunications Engineer'),
(102, 3, 'Thermal Engineer'),
(103, 3, 'Transport Engineer'),
(104, 3, 'Vehicle Engineer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`field_id`),
  ADD KEY `field_id` (`field_id`);

--
-- Indexes for table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`profession_id`),
  ADD KEY `profession_field_id` (`profession_field_id`),
  ADD KEY `profession_id` (`profession_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `field_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `profession_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
