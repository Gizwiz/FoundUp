-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2017 at 03:12 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(32) NOT NULL,
  `country_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, ' '),
(2, 'Afghanistan'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Antigua and Barbuda'),
(8, 'Argentina'),
(9, 'Armenia'),
(10, 'Aruba'),
(11, 'Australia'),
(12, 'Austria'),
(13, 'Azerbaijan'),
(14, 'Bahamas, The'),
(15, 'Bahrain'),
(16, 'Bangladesh'),
(17, 'Barbados'),
(18, 'Belarus'),
(19, 'Belgium'),
(20, 'Belize'),
(21, 'Benin'),
(22, 'Bhutan'),
(23, 'Bolivia'),
(24, 'Bosnia and Herzegovina'),
(25, 'Botswana'),
(26, 'Brazil'),
(27, 'Brunei'),
(28, 'Bulgaria'),
(29, 'Burkina Faso'),
(30, 'Burma'),
(31, 'Burundi'),
(32, 'Cambodia'),
(33, 'Cameroon'),
(34, 'Canada'),
(35, 'Cabo Verde'),
(36, 'Central African Republic'),
(37, 'Chad'),
(38, 'Chile'),
(39, 'China'),
(40, 'Colombia'),
(41, 'Comoros'),
(42, 'Congo, Democratic Republic of the'),
(43, 'Congo, Republic of the'),
(44, 'Costa Rica'),
(45, 'Cote dIvoire'),
(46, 'Croatia'),
(47, 'Cuba'),
(48, 'Curacao'),
(49, 'Cyprus'),
(50, 'Czechia'),
(51, 'Denmark'),
(52, 'Djibouti'),
(53, 'Dominica'),
(54, 'Dominican Republic'),
(55, 'East Timor (see Timor-Leste)'),
(56, 'Ecuador'),
(57, 'Egypt'),
(58, 'El Salvador'),
(59, 'Equatorial Guinea'),
(60, 'Eritrea'),
(61, 'Estonia'),
(62, 'Ethiopia'),
(63, 'Fiji'),
(64, 'Finland'),
(65, 'France'),
(66, 'Gabon'),
(67, 'Gambia, The'),
(68, 'Georgia'),
(69, 'Germany'),
(70, 'Ghana'),
(71, 'Greece'),
(72, 'Grenada'),
(73, 'Guatemala'),
(74, 'Guinea'),
(75, 'Guinea-Bissau'),
(76, 'Guyana'),
(77, 'Haiti'),
(78, 'Holy See'),
(79, 'Honduras'),
(80, 'Hong Kong'),
(81, 'Hungary'),
(82, 'Iceland'),
(83, 'India'),
(84, 'Indonesia'),
(85, 'Iran'),
(86, 'Iraq'),
(87, 'Ireland'),
(88, 'Israel'),
(89, 'Italy'),
(90, 'Jamaica'),
(91, 'Japan'),
(92, 'Jordan'),
(93, 'Kazakhstan'),
(94, 'Kenya'),
(95, 'Kiribati'),
(96, 'Korea, North'),
(97, 'Korea, South'),
(98, 'Kosovo'),
(99, 'Kuwait'),
(100, 'Kyrgyzstan'),
(101, 'Laos'),
(102, 'Latvia'),
(103, 'Lebanon'),
(104, 'Lesotho'),
(105, 'Liberia'),
(106, 'Libya'),
(107, 'Liechtenstein'),
(108, 'Lithuania'),
(109, 'Luxembourg'),
(110, 'Macau'),
(111, 'Macedonia'),
(112, 'Madagascar'),
(113, 'Malawi'),
(114, 'Malaysia'),
(115, 'Maldives'),
(116, 'Mali'),
(117, 'Malta'),
(118, 'Marshall Islands'),
(119, 'Mauritania'),
(120, 'Mauritius'),
(121, 'Mexico'),
(122, 'Micronesia'),
(123, 'Moldova'),
(124, 'Monaco'),
(125, 'Mongolia'),
(126, 'Montenegro'),
(127, 'Morocco'),
(128, 'Mozambique'),
(129, 'Namibia'),
(130, 'Nauru'),
(131, 'Nepal'),
(132, 'Netherlands'),
(133, 'New Zealand'),
(134, 'Nicaragua'),
(135, 'Niger'),
(136, 'Nigeria'),
(137, 'North Korea'),
(138, 'Norway'),
(139, 'Oman'),
(140, 'Pakistan'),
(141, 'Palau'),
(142, 'Palestinian Territories'),
(143, 'Panama'),
(144, 'Papua New Guinea'),
(145, 'Paraguay'),
(146, 'Peru'),
(147, 'Philippines'),
(148, 'Poland'),
(149, 'Portugal'),
(150, 'Qatar'),
(151, 'Romania'),
(152, 'Russia'),
(153, 'Rwanda'),
(154, 'Saint Kitts and Nevis'),
(155, 'Saint Lucia'),
(156, 'Saint Vincent and the Grenadines'),
(157, 'Samoa'),
(158, 'San Marino'),
(159, 'Sao Tome and Principe'),
(160, 'Saudi Arabia'),
(161, 'Senegal'),
(162, 'Serbia'),
(163, 'Seychelles'),
(164, 'Sierra Leone'),
(165, 'Singapore'),
(166, 'Sint Maarten'),
(167, 'Slovakia'),
(168, 'Slovenia'),
(169, 'Solomon Islands'),
(170, 'Somalia'),
(171, 'South Africa'),
(172, 'South Korea'),
(173, 'South Sudan'),
(174, 'Spain'),
(175, 'Sri Lanka'),
(176, 'Sudan'),
(177, 'Suriname'),
(178, 'Swaziland'),
(179, 'Sweden'),
(180, 'Switzerland'),
(181, 'Syria'),
(182, 'Taiwan'),
(183, 'Tajikistan'),
(184, 'Tanzania'),
(185, 'Thailand'),
(186, 'Timor-Leste'),
(187, 'Togo'),
(188, 'Tonga'),
(189, 'Trinidad and Tobago'),
(190, 'Tunisia'),
(191, 'Turkey'),
(192, 'Turkmenistan'),
(193, 'Tuvalu'),
(194, 'Uganda'),
(195, 'Ukraine'),
(196, 'United Arab Emirates'),
(197, 'United Kingdom'),
(198, 'Uruguay'),
(199, 'Uzbekistan'),
(200, 'Vanuatu'),
(201, 'Venezuela'),
(202, 'Vietnam'),
(203, 'Yemen'),
(204, 'Zambia'),
(205, 'Zimbabwe');

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
(8, 'Designer');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
(1, 'N/A'),
(2, 'Male'),
(3, 'Female'),
(4, '-'),
(5, 'Agender'),
(6, 'Androgyne'),
(7, 'Androgynous'),
(8, 'Bigender'),
(9, 'Cis'),
(10, 'Cisgender'),
(11, 'Cis Female'),
(12, 'Cis Male'),
(13, 'Cis Man'),
(14, 'Cis Woman'),
(15, 'Cisgender Female'),
(16, 'Cisgender Male'),
(17, 'Cisgender Man'),
(18, 'Cisgender Woman'),
(19, 'Female to Male'),
(20, 'FTM'),
(21, 'Gender Fluid'),
(22, 'Gender Nonconforming'),
(23, 'Gender Questioning'),
(24, 'Gender Variant'),
(25, 'Genderqueer'),
(26, 'Intersex'),
(27, 'Male to Female'),
(28, 'MTF'),
(29, 'Neither'),
(30, 'Neutrois'),
(31, 'Non-binary'),
(32, 'Other'),
(33, 'Pangender'),
(34, 'Trans'),
(35, 'Trans*'),
(36, 'Trans Female'),
(37, 'Trans* Female'),
(38, 'Trans Male'),
(39, 'Trans* Male'),
(40, 'Trans Man'),
(41, 'Trans* Man'),
(42, 'Trans Person'),
(43, 'Trans* Person'),
(44, 'Trans Woman'),
(45, 'Trans* Woman'),
(46, 'Transfeminine'),
(47, 'Transgender'),
(48, 'Transgender Female'),
(49, 'Transgender Male'),
(50, 'Transgender Man'),
(51, 'Transgender Person'),
(52, 'Transgender Woman'),
(53, 'Transmasculine'),
(54, 'Transsexual'),
(55, 'Transsexual Female'),
(56, 'Transsexual Male'),
(57, 'Transsexual Man'),
(58, 'Transsexual Person'),
(59, 'Transsexual Woman'),
(60, 'Two-Spirit'),
(61, 'Apache AH-64 Attack Helicopter');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) UNSIGNED NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_contact_email` varchar(255) NOT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_firstname` varchar(64) DEFAULT NULL,
  `user_lastname` varchar(64) DEFAULT NULL,
  `user_phonenumber` text,
  `user_username` varchar(255) DEFAULT NULL,
  `user_avatar` varchar(255) DEFAULT NULL,
  `user_bio` text,
  `user_dob` date DEFAULT NULL,
  `user_profession` int(10) UNSIGNED DEFAULT NULL,
  `user_gender` int(11) DEFAULT NULL,
  `user_maritalstatus` varchar(32) DEFAULT NULL,
  `user_address` text,
  `user_city` varchar(255) NOT NULL,
  `user_joindate` date DEFAULT NULL,
  `user_country` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_contact_email`, `user_password`, `user_firstname`, `user_lastname`, `user_phonenumber`, `user_username`, `user_avatar`, `user_bio`, `user_dob`, `user_profession`, `user_gender`, `user_maritalstatus`, `user_address`, `user_city`, `user_joindate`, `user_country`) VALUES
(47, 'markus.sahrakorpi@gmail.com', 'markus.sahrakorpi@gmail.com', '123123', 'Markus', 'Sahrakorpi', '+123456789', 'MarkusSahrakorpi', '../resources/useravatars/av3.jpg', NULL, '1212-12-12', 19, 2, NULL, 'Gonapolku 57', 'PaskalÃ¤Ã¤vi', '2017-02-12', 64),
(48, 'kana@kalkkuna.fi', '', '456', 'Kana', 'Kalkkuna', '123123123', 'KanaKalkkuna', '../resources/userAvatars/person.jpg', NULL, NULL, 96, NULL, NULL, NULL, '', '2017-02-12', NULL),
(49, 'asd@ggg.com', 'asd@ggg.com', '1234', 'Markus', 'Sahrakorpi', '123123', 'MarkusSahrakorpi6', '../resources/images/userAvatars/person.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '', '2017-02-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `time_start` date DEFAULT NULL,
  `time_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `user_id`, `title`, `description`, `url`, `time_start`, `time_end`) VALUES
(1, 47, 'PHP Application', 'A PHP application for a course in school. The aim is to create a complete, usable application utilizing Apache, MySQL database and PHP.', 'https://github.com/Gizwiz/FoundUp', '2017-02-01', '2017-02-28'),
(3, 47, 'Dynamic Web Application', 'A dynamic Spotify Application for a course in school. The goal was to utilize Javasctipt and Ajax to create a dynamic application.', 'https://github.com/Gizwiz/SpotifyWebApp', '2017-02-02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`field_id`),
  ADD KEY `field_id` (`field_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`profession_id`),
  ADD KEY `profession_field_id` (`profession_field_id`),
  ADD KEY `profession_id` (`profession_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_profession` (`user_profession`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_country` (`user_country`),
  ADD KEY `user_gender` (`user_gender`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `field_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `profession_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `profession`
--
ALTER TABLE `profession`
  ADD CONSTRAINT `profession_ibfk_1` FOREIGN KEY (`profession_field_id`) REFERENCES `field` (`field_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_profession`) REFERENCES `profession` (`profession_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_country`) REFERENCES `country` (`country_id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`user_gender`) REFERENCES `gender` (`gender_id`);

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
