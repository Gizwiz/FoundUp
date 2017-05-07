-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:50085
-- Generation Time: May 07, 2017 at 02:07 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(32) UNSIGNED NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_contact_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_firstname` varchar(64) DEFAULT NULL,
  `user_lastname` varchar(64) DEFAULT NULL,
  `user_phonenumber` text,
  `user_username` varchar(255) DEFAULT NULL,
  `user_avatar` varchar(255) NOT NULL DEFAULT '../../resources/useravatars/default.jpg	',
  `user_avatar_small` varchar(255) NOT NULL DEFAULT '../../resources/smalluseravatars/default.jpg',
  `user_bio` text,
  `user_skills` varchar(255) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_profession` int(11) UNSIGNED DEFAULT '1',
  `user_gender` int(11) UNSIGNED DEFAULT '1',
  `user_maritalstatus` varchar(32) DEFAULT NULL,
  `user_address` varchar(64) DEFAULT NULL,
  `user_city` varchar(64) DEFAULT NULL,
  `user_joindate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_country` int(11) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_contact_email`, `user_password`, `user_firstname`, `user_lastname`, `user_phonenumber`, `user_username`, `user_avatar`, `user_avatar_small`, `user_bio`, `user_skills`, `user_dob`, `user_profession`, `user_gender`, `user_maritalstatus`, `user_address`, `user_city`, `user_joindate`, `user_country`) VALUES
(1, 'markus.sahrakorpi@gmail.com', 'markus.sahrakorpi@gmail.com', '$2y$10$/0QQae2.3steXgHbs8a8kOor5RuJTwp.8qtRAorXE50UIduvkf3fm', 'Markus', 'Sahrakorpi', '+123456789', 'MarkusSahrakorpi', '../../resources/useravatars/fea2-chicken-and-egg1.jpg', '../../resources/smalluseravatars/fea2-chicken-and-egg1.jpg', NULL, NULL, '2555-12-26', 19, 61, NULL, 'Gonapolku 27', 'Gonasto', '2017-03-20 22:00:57', 64),
(2, 'kwarren0@ted.com', 'kwarren0@ehow.com', NULL, 'Kathryn', 'Warren', NULL, 'KathrynWarren', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 76, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 31),
(3, 'cking1@alexa.com', 'cking1@oaic.gov.au', NULL, 'Clarence', 'King', NULL, 'ClarenceKing', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 67, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 117),
(4, 'afoster2@chron.com', 'afoster2@deviantart.com', NULL, 'Anthony', 'Foster', NULL, 'AnthonyFoster', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 32, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 140),
(5, 'rgarza3@reddit.com', 'rgarza3@hc360.com', NULL, 'Roy', 'Garza', NULL, 'RoyGarza', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 80, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 148),
(6, 'aevans4@fastcompany.com', 'aevans4@printfriendly.com', NULL, 'Adam', 'Evans', NULL, 'AdamEvans', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 20, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 33),
(7, 'rhicks5@123-reg.co.uk', 'rhicks5@irs.gov', NULL, 'Robin', 'Hicks', NULL, 'RobinHicks', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 84, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 70),
(8, 'hjohnston6@twitpic.com', 'hjohnston6@kickstarter.com', NULL, 'Harold', 'Johnston', NULL, 'HaroldJohnston', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 63, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 133),
(9, 'rchapman7@sakura.ne.jp', 'rchapman7@simplemachines.org', NULL, 'Ryan', 'Chapman', NULL, 'RyanChapman', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 71, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 137),
(10, 'llong8@sina.com.cn', 'llong8@smugmug.com', NULL, 'Laura', 'Long', NULL, 'LauraLong', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 42, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 122),
(11, 'cgardner9@odnoklassniki.ru', 'cgardner9@friendfeed.com', NULL, 'Christopher', 'Gardner', NULL, 'ChristopherGardner', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 25, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 75),
(12, 'jarnolda@dagondesign.com', 'jarnolda@seattletimes.com', NULL, 'Janice', 'Arnold', NULL, 'JaniceArnold', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 57, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 174),
(13, 'gowensb@shop-pro.jp', 'gowensb@biblegateway.com', NULL, 'Gregory', 'Owens', NULL, 'GregoryOwens', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 15, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 205),
(14, 'mlawsonc@devhub.com', 'mlawsonc@unc.edu', NULL, 'Mary', 'Lawson', NULL, 'MaryLawson', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 8, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 196),
(15, 'cellisd@addthis.com', 'cellisd@ovh.net', NULL, 'Carolyn', 'Ellis', NULL, 'CarolynEllis', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 103, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 162),
(16, 'aperkinse@bing.com', 'aperkinse@ifeng.com', NULL, 'Amy', 'Perkins', NULL, 'AmyPerkins', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 57, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 8),
(17, 'wmartinf@state.gov', 'wmartinf@time.com', NULL, 'Wanda', 'Martin', NULL, 'WandaMartin', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 67, 1, NULL, NULL, NULL, '2017-04-07 07:33:47', 69),
(18, 'msnyderg@1und1.de', 'msnyderg@domainmarket.com', NULL, 'Maria', 'Snyder', NULL, 'MariaSnyder', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 105, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 156),
(19, 'afrazierh@businessinsider.com', 'afrazierh@bloglines.com', NULL, 'Anthony', 'Frazier', NULL, 'AnthonyFrazier', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 57, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 51),
(20, 'sthomasi@uol.com.br', 'sthomasi@geocities.jp', NULL, 'Sara', 'Thomas', NULL, 'SaraThomas', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 90, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 11),
(21, 'rstonej@google.ru', 'rstonej@slashdot.org', NULL, 'Russell', 'Stone', NULL, 'RussellStone', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 32, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 20),
(22, 'edixonk@123-reg.co.uk', 'edixonk@surveymonkey.com', NULL, 'Elizabeth', 'Dixon', NULL, 'ElizabethDixon', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 91, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 155),
(23, 'agibsonl@apple.com', 'agibsonl@unicef.org', NULL, 'Anthony', 'Gibson', NULL, 'AnthonyGibson', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 110, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 140),
(24, 'thowardm@parallels.com', 'thowardm@gov.uk', NULL, 'Thomas', 'Howard', NULL, 'ThomasHoward', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 9, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 114),
(25, 'rlarsonn@scribd.com', 'rlarsonn@prlog.org', NULL, 'Ronald', 'Larson', NULL, 'RonaldLarson', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 90, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 1),
(26, 'salvarezo@statcounter.com', 'salvarezo@tinypic.com', NULL, 'Sarah', 'Alvarez', NULL, 'SarahAlvarez', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 29, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 130),
(27, 'rleep@wikia.com', 'rleep@miibeian.gov.cn', NULL, 'Ronald', 'Lee', NULL, 'RonaldLee', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 81, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 31),
(28, 'dhayesq@tinyurl.com', 'dhayesq@foxnews.com', NULL, 'Donna', 'Hayes', NULL, 'DonnaHayes', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 40, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 118),
(29, 'gjamesr@newyorker.com', 'gjamesr@dmoz.org', NULL, 'Gregory', 'James', NULL, 'GregoryJames', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 26, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 26),
(30, 'cbrowns@google.co.uk', 'cbrowns@geocities.jp', NULL, 'Carol', 'Brown', NULL, 'CarolBrown', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 79, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 60),
(31, 'hfordt@ucoz.ru', 'hfordt@ehow.com', NULL, 'Harry', 'Ford', NULL, 'HarryFord', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 106, 1, NULL, NULL, NULL, '2017-04-07 07:33:48', 172),
(32, 'lperezu@jalbum.net', 'lperezu@google.com.hk', NULL, 'Louise', 'Perez', NULL, 'LouisePerez', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 48, 1, NULL, NULL, NULL, '2017-04-07 07:33:49', 48),
(33, 'pharperv@seattletimes.com', 'pharperv@xrea.com', NULL, 'Peter', 'Harper', NULL, 'PeterHarper', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 98, 1, NULL, NULL, NULL, '2017-04-07 07:33:49', 126),
(34, 'fgrayw@dropbox.com', 'fgrayw@hp.com', NULL, 'Fred', 'Gray', NULL, 'FredGray', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 81, 1, NULL, NULL, NULL, '2017-04-07 07:33:49', 18),
(35, 'fjamesx@nature.com', 'fjamesx@google.es', NULL, 'Frank', 'James', NULL, 'FrankJames', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 68, 1, NULL, NULL, NULL, '2017-04-07 07:33:49', 69),
(36, 'fturnery@epa.gov', 'fturnery@dell.com', NULL, 'Frank', 'Turner', NULL, 'FrankTurner', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, '2017-04-07 07:33:49', 30),
(37, 'jhayesz@ftc.gov', 'jhayesz@marriott.com', NULL, 'Johnny', 'Hayes', NULL, 'JohnnyHayes', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 30, 1, NULL, NULL, NULL, '2017-04-07 07:33:49', 159),
(38, 'sarnold10@so-net.ne.jp', 'sarnold10@cdbaby.com', NULL, 'Steven', 'Arnold', NULL, 'StevenArnold', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 54, 1, NULL, NULL, NULL, '2017-04-07 07:33:49', 18),
(39, 'jbryant11@ezinearticles.com', 'jbryant11@army.mil', NULL, 'Jonathan', 'Bryant', NULL, 'JonathanBryant', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, '2017-04-07 07:33:49', 58),
(40, 'jphillips12@typepad.com', 'jphillips12@cam.ac.uk', NULL, 'Jerry', 'Phillips', NULL, 'JerryPhillips', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 19, 1, NULL, NULL, NULL, '2017-04-07 07:33:49', 80),
(41, 'amatthews13@aol.com', 'amatthews13@angelfire.com', NULL, 'Arthur', 'Matthews', NULL, 'ArthurMatthews', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 63, 1, NULL, NULL, NULL, '2017-04-07 07:33:49', 45),
(42, 'dalvarez14@fastcompany.com', 'dalvarez14@webs.com', NULL, 'Douglas', 'Alvarez', NULL, 'DouglasAlvarez', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 95, 1, NULL, NULL, NULL, '2017-04-07 07:33:49', 69),
(43, 'tnguyen15@webmd.com', 'tnguyen15@goo.ne.jp', NULL, 'Teresa', 'Nguyen', NULL, 'TeresaNguyen', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 29, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 57),
(44, 'rwoods16@google.co.uk', 'rwoods16@blogtalkradio.com', NULL, 'Robert', 'Woods', NULL, 'RobertWoods', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 42, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 188),
(45, 'kcole17@hostgator.com', 'kcole17@shop-pro.jp', NULL, 'Kevin', 'Cole', NULL, 'KevinCole', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 44, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 133),
(46, 'jmccoy18@google.com.au', 'jmccoy18@webs.com', NULL, 'Jonathan', 'Mccoy', NULL, 'JonathanMccoy', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 108, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 32),
(47, 'jmitchell19@pinterest.com', 'jmitchell19@issuu.com', NULL, 'Joe', 'Mitchell', NULL, 'JoeMitchell', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 108, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 122),
(48, 'crose1a@myspace.com', 'crose1a@narod.ru', NULL, 'Carolyn', 'Rose', NULL, 'CarolynRose', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 14, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 94),
(49, 'kfuller1b@msu.edu', 'kfuller1b@cnbc.com', NULL, 'Kenneth', 'Fuller', NULL, 'KennethFuller', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 57, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 49),
(50, 'jjones1c@hatena.ne.jp', 'jjones1c@tuttocitta.it', NULL, 'Julia', 'Jones', NULL, 'JuliaJones', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 14, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 1),
(51, 'tharvey1d@dmoz.org', 'tharvey1d@nytimes.com', NULL, 'Terry', 'Harvey', NULL, 'TerryHarvey', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 31, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 141),
(52, 'jwelch1e@cnbc.com', 'jwelch1e@noaa.gov', NULL, 'Julia', 'Welch', NULL, 'JuliaWelch', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 100, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 96),
(53, 'jbennett1f@woothemes.com', 'jbennett1f@shareasale.com', NULL, 'Joshua', 'Bennett', NULL, 'JoshuaBennett', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 85, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 177),
(54, 'eromero1g@feedburner.com', 'eromero1g@berkeley.edu', NULL, 'Edward', 'Romero', NULL, 'EdwardRomero', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 21, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 204),
(55, 'jtorres1h@lulu.com', 'jtorres1h@booking.com', NULL, 'Jane', 'Torres', NULL, 'JaneTorres', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 32, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 170),
(56, 'jcole1i@skype.com', 'jcole1i@weather.com', NULL, 'Jessica', 'Cole', NULL, 'JessicaCole', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 36, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 69),
(57, 'jrichards1j@tripod.com', 'jrichards1j@linkedin.com', NULL, 'Jean', 'Richards', NULL, 'JeanRichards', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 64, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 157),
(58, 'darmstrong1k@upenn.edu', 'darmstrong1k@usgs.gov', NULL, 'Diana', 'Armstrong', NULL, 'DianaArmstrong', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 72, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 32),
(59, 'nkim1l@nymag.com', 'nkim1l@multiply.com', NULL, 'Nicholas', 'Kim', NULL, 'NicholasKim', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 79, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 117),
(60, 'vstone1m@google.fr', 'vstone1m@g.co', NULL, 'Virginia', 'Stone', NULL, 'VirginiaStone', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 35, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 135),
(61, 'llopez1n@parallels.com', 'llopez1n@addthis.com', NULL, 'Lisa', 'Lopez', NULL, 'LisaLopez', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 9, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 115),
(62, 'rramirez1o@jiathis.com', 'rramirez1o@sogou.com', NULL, 'Ralph', 'Ramirez', NULL, 'RalphRamirez', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 87, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 40),
(63, 'chall1p@macromedia.com', 'chall1p@dion.ne.jp', NULL, 'Catherine', 'Hall', NULL, 'CatherineHall', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 32, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 122),
(64, 'rgeorge1q@hao123.com', 'rgeorge1q@foxnews.com', NULL, 'Ruby', 'George', NULL, 'RubyGeorge', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 28, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 173),
(65, 'lschmidt1r@alibaba.com', 'lschmidt1r@illinois.edu', NULL, 'Linda', 'Schmidt', NULL, 'LindaSchmidt', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 104, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 45),
(66, 'dwalker1s@youtu.be', 'dwalker1s@oracle.com', NULL, 'Diane', 'Walker', NULL, 'DianeWalker', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 49, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 53),
(67, 'nmorales1t@columbia.edu', 'nmorales1t@geocities.jp', NULL, 'Nicholas', 'Morales', NULL, 'NicholasMorales', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 86, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 77),
(68, 'jhill1u@nytimes.com', 'jhill1u@ucoz.com', NULL, 'Jose', 'Hill', NULL, 'JoseHill', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 44, 1, NULL, NULL, NULL, '2017-04-07 07:33:50', 198),
(69, 'mwallace1v@stumbleupon.com', 'mwallace1v@slideshare.net', NULL, 'Matthew', 'Wallace', NULL, 'MatthewWallace', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 86, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 159),
(70, 'medwards1w@tmall.com', 'medwards1w@senate.gov', NULL, 'Margaret', 'Edwards', NULL, 'MargaretEdwards', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 63, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 150),
(71, 'pgilbert1x@go.com', 'pgilbert1x@spiegel.de', NULL, 'Paula', 'Gilbert', NULL, 'PaulaGilbert', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 59, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 190),
(72, 'sjordan1y@fda.gov', 'sjordan1y@mapquest.com', NULL, 'Stephen', 'Jordan', NULL, 'StephenJordan', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 93, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 100),
(73, 'panderson1z@canalblog.com', 'panderson1z@nytimes.com', NULL, 'Patricia', 'Anderson', NULL, 'PatriciaAnderson', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 93, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 133),
(74, 'cgreen20@mac.com', 'cgreen20@ovh.net', NULL, 'Chris', 'Green', NULL, 'ChrisGreen', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 89, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 6),
(75, 'jjacobs21@dot.gov', 'jjacobs21@ed.gov', NULL, 'Justin', 'Jacobs', NULL, 'JustinJacobs', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 55, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 88),
(76, 'lhenderson22@skyrock.com', 'lhenderson22@netvibes.com', NULL, 'Lori', 'Henderson', NULL, 'LoriHenderson', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 69, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 178),
(77, 'chart23@jalbum.net', 'chart23@europa.eu', NULL, 'Carol', 'Hart', NULL, 'CarolHart', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 106, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 156),
(78, 'cthomas24@squidoo.com', 'cthomas24@house.gov', NULL, 'Catherine', 'Thomas', NULL, 'CatherineThomas', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 93, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 57),
(79, 'jjenkins25@4shared.com', 'jjenkins25@goo.gl', NULL, 'Jimmy', 'Jenkins', NULL, 'JimmyJenkins', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 98, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 57),
(80, 'tfields26@auda.org.au', 'tfields26@cisco.com', NULL, 'Tina', 'Fields', NULL, 'TinaFields', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 49, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 148),
(81, 'sharvey27@aol.com', 'sharvey27@ycombinator.com', NULL, 'Shawn', 'Harvey', NULL, 'ShawnHarvey', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 104, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 135),
(82, 'hduncan28@jigsy.com', 'hduncan28@scribd.com', NULL, 'Helen', 'Duncan', NULL, 'HelenDuncan', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 109, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 200),
(83, 'jrichardson29@mozilla.com', 'jrichardson29@google.cn', NULL, 'Joe', 'Richardson', NULL, 'JoeRichardson', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 31, 1, NULL, NULL, NULL, '2017-04-07 07:33:51', 145),
(84, 'mruiz2a@nytimes.com', 'mruiz2a@usatoday.com', NULL, 'Michael', 'Ruiz', NULL, 'MichaelRuiz', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 34, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 25),
(85, 'rburns2b@google.com', 'rburns2b@yellowbook.com', NULL, 'Robin', 'Burns', NULL, 'RobinBurns', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 20, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 132),
(86, 'dcunningham2c@who.int', 'dcunningham2c@t-online.de', NULL, 'Daniel', 'Cunningham', NULL, 'DanielCunningham', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 87, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 19),
(87, 'rnichols2d@bandcamp.com', 'rnichols2d@newsvine.com', NULL, 'Ryan', 'Nichols', NULL, 'RyanNichols', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 89, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 69),
(88, 'lellis2e@oracle.com', 'lellis2e@123-reg.co.uk', NULL, 'Lillian', 'Ellis', NULL, 'LillianEllis', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 30, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 45),
(89, 'abrown2f@si.edu', 'abrown2f@meetup.com', NULL, 'Andrea', 'Brown', NULL, 'AndreaBrown', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 112, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 129),
(90, 'kprice2g@yellowbook.com', 'kprice2g@who.int', NULL, 'Kathy', 'Price', NULL, 'KathyPrice', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 67, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 64),
(91, 'lhamilton2h@infoseek.co.jp', 'lhamilton2h@sciencedirect.com', NULL, 'Louis', 'Hamilton', NULL, 'LouisHamilton', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 84, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 5),
(92, 'awright2i@eventbrite.com', 'awright2i@patch.com', NULL, 'Albert', 'Wright', NULL, 'AlbertWright', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 107, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 59),
(93, 'sgardner2j@shinystat.com', 'sgardner2j@facebook.com', NULL, 'Shirley', 'Gardner', NULL, 'ShirleyGardner', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 88, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 43),
(94, 'rfrazier2k@zdnet.com', 'rfrazier2k@stanford.edu', NULL, 'Ruby', 'Frazier', NULL, 'RubyFrazier', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 95, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 95),
(95, 'bmartin2l@pcworld.com', 'bmartin2l@ibm.com', NULL, 'Barbara', 'Martin', NULL, 'BarbaraMartin', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 56, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 121),
(96, 'mcarroll2m@mlb.com', 'mcarroll2m@360.cn', NULL, 'Martha', 'Carroll', NULL, 'MarthaCarroll', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 22, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 109),
(97, 'sriley2n@icq.com', 'sriley2n@reddit.com', NULL, 'Stephanie', 'Riley', NULL, 'StephanieRiley', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 21, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 27),
(98, 'apalmer2o@blogs.com', 'apalmer2o@ucoz.com', NULL, 'Aaron', 'Palmer', NULL, 'AaronPalmer', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 101, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 64),
(99, 'dthomas2p@dagondesign.com', 'dthomas2p@mit.edu', NULL, 'Dorothy', 'Thomas', NULL, 'DorothyThomas', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 46, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 200),
(100, 'fgeorge2q@surveymonkey.com', 'fgeorge2q@pcworld.com', NULL, 'Frank', 'George', NULL, 'FrankGeorge', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 13, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 153),
(101, 'pfrazier2r@biglobe.ne.jp', 'pfrazier2r@theatlantic.com', NULL, 'Phillip', 'Frazier', NULL, 'PhillipFrazier', '../../resources/useravatars/default.png', '../../resources/smalluseravatars/default.png', NULL, NULL, NULL, 84, 1, NULL, NULL, NULL, '2017-04-07 07:33:52', 192),
(102, 'test@test.com', 'test@test.com', '$2y$10$LyiUq61WG0qsm59Qu8YuS.KtUUvnOD.loPMxPaYYZBnR24nSGc532', 'Testi', 'Testertron', NULL, 'TestiTestertron', '../../resources/useravatars/default.jpg	', '../../resources/smalluseravatars/default.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, '2017-04-23 13:52:53', 1),
(103, 'nnnn@kfkf.com', 'nnnn@kfkf.com', '$2y$10$rOLJsj8ZtftBFrV/vDV0CefYG28sXuc8Z/cZ2o4.YcA.zAX4Ei8fe', 'nnnn', 'nnnn', NULL, 'nnnnnnnn', '../../resources/useravatars/default.jpg	', '../../resources/smalluseravatars/default.jpg', NULL, NULL, NULL, 80, 1, NULL, NULL, NULL, '2017-04-24 09:20:11', 1),
(104, 'sadasd@asd.com', 'sadasd@asd.com', '$2y$10$f6FxB4qwdgzb4NlPBIacyuD5Ww7M5hwU2e0/pFKVVMYbbdreL0Xa.', 'cczxc', 'sdfsdf', NULL, 'cczxcsdfsdf', '../../resources/useravatars/default.jpg	', '../../resources/smalluseravatars/default.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, '2017-04-25 09:37:05', 1),
(105, 'asd@asd.asd', 'asd@asd.asd', '$2y$10$N8RTGVRRvF/cCjgV536NGuehE7gIR1UUjaP0jb2qeds6Oz/N4bja.', 'asd', 'asd', NULL, 'asdasd', '../../resources/useravatars/default.jpg	', '../../resources/smalluseravatars/default.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, '2017-05-03 15:00:03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_profession` (`user_profession`),
  ADD KEY `user_gender` (`user_gender`),
  ADD KEY `user_country` (`user_country`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_profession`) REFERENCES `profession` (`profession_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_gender`) REFERENCES `gender` (`gender_id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`user_country`) REFERENCES `country` (`country_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
