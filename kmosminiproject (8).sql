-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2017 at 09:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmosminiproject`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_on_down` (IN `dcount` INT, IN `pid` INT)  BEGIN
if dcount>=10
THEN
DELETE from post WHERE post_id=pid;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_on_resolved` (IN `rcount` INT, IN `pid` INT)  NO SQL
BEGIN
if rcount>=10
THEN
INSERT INTO resolved_issues (SELECT * from post WHERE post_id=pid);
DELETE from post WHERE post_id=pid;
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `a_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `party` varchar(40) NOT NULL,
  `location` varchar(40) NOT NULL,
  `TimeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`a_id`, `email`, `password`, `salt`, `name`, `party`, `location`, `TimeCreated`) VALUES
(4, 'rajlaxmishinde@gmail.com', 'b2fd4e24ebf37dfaf9cc82db7ca3095526ca0d3d6112a56f3f00e6cb38bde77f', '80447608259d28fa32aab28.95199825', 'Rajlaxmi Shinde', 'NCP', 'Pimpri Chinchwad', '2017-10-02 19:12:35'),
(5, 'tupe_vitthal@gmail.com', 'bda926cb2cb3108455565b3a2f7c7ef9fc8e4508f370ecf798d6048d8a68730d', '93557570559d28fed2298a8.52994740', 'Vitthal Tupe', 'Congress', 'Warje', '2017-10-02 19:13:49'),
(6, 'girishbapat@gmail.com', 'e2e6dfb6da752af486be6c4831bd2327652d1cb93d1e0253b3c12a3a39c484e1', '37797813359d2905f8eb0d6.22936513', 'Girish Bapat', 'BJP', 'Warje', '2017-10-02 19:15:43'),
(7, 'mohanjoshi@gmail.com', 'ed7142094e75f32a6b0edc1005ff6e997e9a278252d6c1088cf73ae607ef6741', '107032325859d29094c97887.24205117', 'Mohan Joshi', 'Congress', 'Katraj', '2017-10-02 19:16:36'),
(8, 'shankarpatil@gmail.com', '5b5c23702ba2ac7252321880ea6e5bd8b19bd726eb75b0918d461ba974476e3f', '190163653959d291c8ecf0a0.44838565', 'Shankar Patil', 'BJP', 'Swargate', '2017-10-02 19:21:45'),
(9, 'vijaytalwalkar@gmail.com', '11ce0707f33935a0a72803d97a03578ee80b1bb5acfd01dd9204cea3ff318641', '63639783059d29202a2daf9.13423180', 'Vijay Talwalkar', 'Shiv Sena', 'Laxmi Road', '2017-10-02 19:22:42'),
(10, 'gajananbabar@gmail.com', '58db25edbdba2f04a6f57b3b4525a1f378113b215d8ee9bcce875489db1313bd', '81677890759d29229915d03.66787254', 'Gajanan Babar', 'Shiv Sena', 'Laxmi Road', '2017-10-02 19:23:21'),
(11, 'rajaylonkar@gmail.com', 'd8421cf226c966826a87c304bdaa4fab7fc604cc8d2704c9f522df8c05c07c0e', '188595717459d29256360020.76615426', 'Rajay Lonkar', 'BSP', 'Deccan', '2017-10-02 19:24:06'),
(12, 'vikramrathod@gmail.com', '477354ae03ccb232441f7ce08058f13376ef7e7dac86e87ee71108c16bcd67e1', '124525073659d292990cb984.27766735', 'Vikram Rathod', 'R.P.I', 'Kothrud', '2017-10-02 19:25:13'),
(13, 'pradeepdeshkmukh@gmail.com', 'ee7442c84122d030b6137deb54723bc2cb18db53bbf7b44e07fbe190c52eea32', '48859814159d292de0a8f05.47934553', 'Pradeep Deshmukh', 'MNS', 'Aundh', '2017-10-02 19:26:22'),
(14, 'rohitkumar@gmail.com', '52e9cb06ff6b97d4ca03bc62212f5aadaffbd6740c9a5d763ef646fc8e5cace5', '62998752959d293075e9d61.54680531', 'Rohit Kumar', 'Janata Dal', 'Viman Nagar ', '2017-10-02 19:27:03'),
(15, 'sayalishinde@gmail.com', 'c3eb9c44aefb4980cda04c4bf6da5f8e771dc9430ae368136353b7adf31b6420', '164542259d29385892c30.88816791', 'Sayali Shinde', 'AAP', 'Khadki', '2017-10-02 19:29:09'),
(16, 'deepalirao@gmail.com', '06bd159f998db1832ee2eaf5311e54fdc22b69785b42fe7b541969a09302570e', '12665111359d293cf4000c0.57808396', 'Deepali Rao', 'Communist Party', 'Khadki', '2017-10-02 19:30:23'),
(19, 'rajat@gmail.com', '7a7c3fecd693e0981cf8c7f420ca04a6b89131b40675cb5d48bf8376b76265bf', '25587918959dbae0a0544c8.02814311', 'Rajat Palliwal', 'BJP', 'Baner', '2017-10-09 17:12:42'),
(20, 'ashutoshs@gmail.com', '5f03133621ac2ad2a21d6b99fd549444c192aa832065694a71fefcbf0f99c294', '199907371659dc3b6d8f04d3.87283923', 'Ashutosh Shinde', 'NCP', 'Laxmi Road', '2017-10-10 03:15:57');

--
-- Triggers `authority`
--
DELIMITER $$
CREATE TRIGGER `addtogroup_a` AFTER INSERT ON `authority` FOR EACH ROW BEGIN 
DECLARE id INT; 
DECLARE uid INT; 
SELECT gid_a INTO id from grouptable_authority where party=any(SELECT new.party from authority); 
INSERT INTO group_authority VALUES(id,new.a_id); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `authority_chat`
--

CREATE TABLE `authority_chat` (
  `chat_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `TimeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authority_chat`
--

INSERT INTO `authority_chat` (`chat_id`, `g_id`, `u_id`, `message`, `TimeCreated`) VALUES
(1, 4, 9, 'Public is raising the issue of the roads', '2017-10-07 09:13:32'),
(2, 4, 9, 'We need to take action .... ', '2017-10-07 09:14:00'),
(3, 4, 10, 'Yes we will see if proper funds are available', '2017-10-07 09:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `post_id`, `comment`, `time`) VALUES
(1, 2, 64, 'Issue is getting more serious now', '2017-10-04 18:57:41'),
(2, 4, 64, 'Yes very true', '2017-10-04 19:17:02'),
(3, 4, 64, 'Yes very true', '2017-10-04 19:17:45'),
(4, 4, 64, 'Quick action is needed', '2017-10-04 19:17:45'),
(5, 5, 77, 'Condition is getting worse', '2017-10-10 04:37:38'),
(6, 6, 77, 'Condition is getting worse', '2017-10-10 04:39:12'),
(7, 7, 77, 'I hope issue will get resolved soon', '2017-10-10 04:39:12'),
(8, 8, 77, 'Should get resolved by now', '2017-10-10 04:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `downvote`
--

CREATE TABLE `downvote` (
  `d_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downvote`
--

INSERT INTO `downvote` (`d_id`, `u_id`, `p_id`) VALUES
(1, 8, 71),
(2, 8, 72),
(3, 8, 71),
(4, 8, 71),
(5, 8, 71),
(6, 8, 71),
(7, 8, 71),
(8, 8, 71),
(9, 8, 71),
(10, 8, 71),
(11, 8, 71),
(12, 8, 71),
(13, 8, 71),
(14, 1, 72),
(15, 1, 71),
(16, 20, 76);

--
-- Triggers `downvote`
--
DELIMITER $$
CREATE TRIGGER `downtrigger` BEFORE INSERT ON `downvote` FOR EACH ROW BEGIN
DECLARE total INT;
SELECT COUNT(*) into total from downvote WHERE p_id=new.p_id;
call delete_on_down(total,new.p_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `grouptable`
--

CREATE TABLE `grouptable` (
  `group_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `grouptable`
--

INSERT INTO `grouptable` (`group_id`, `name`, `Location`) VALUES
(1, 'Katraj Issues', 'Katraj'),
(2, 'Aundh Issues', 'Aundh'),
(3, 'Warje Issues', 'Warje'),
(4, 'Deccan Issues', 'Deccan'),
(5, 'Swargate Issues', 'Swargate'),
(6, 'Kothrud Issues', 'Kothrud'),
(7, 'Viman Nagar Issues', 'Viman Nagar'),
(8, 'Laxmi Road Issues', 'Laxmi Road'),
(9, 'Pimpri Chinchwad Issues', 'Pimpri Chinchwad'),
(10, 'Khadki Issues', 'Khadki');

-- --------------------------------------------------------

--
-- Table structure for table `grouptable_authority`
--

CREATE TABLE `grouptable_authority` (
  `gid_a` int(11) NOT NULL,
  `group_name_a` varchar(50) NOT NULL,
  `party` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grouptable_authority`
--

INSERT INTO `grouptable_authority` (`gid_a`, `group_name_a`, `party`) VALUES
(1, 'BJP group', 'BJP'),
(2, 'Pune City Congress(I) group', 'Congress'),
(3, 'Nationalist Congress Party(NCP) group', 'NCP'),
(4, 'Shiv Sena group', 'Shiv Sena'),
(5, 'Pune City Janata Dal group', 'Janata Dal'),
(6, 'Pune City Communist Party', 'Communist Party'),
(7, 'Republican Party of India', 'R.P.I'),
(8, 'Maharashtra Navanirman Sena ', 'MNS'),
(9, 'Bahujan Samaj Party group', 'BSP'),
(10, 'Aam Aadmi Party', 'AAP');

-- --------------------------------------------------------

--
-- Table structure for table `grouptable_media`
--

CREATE TABLE `grouptable_media` (
  `gid_m` int(11) NOT NULL,
  `group_name_m` varchar(25) NOT NULL,
  `agency` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grouptable_media`
--

INSERT INTO `grouptable_media` (`gid_m`, `group_name_m`, `agency`) VALUES
(1, 'Lokmat group', 'Lokmat'),
(2, 'Sakal group', 'Sakal'),
(3, 'Loksatta group', 'Loksatta'),
(4, 'Times Of India group', 'Times of India'),
(5, 'Pudhari group', 'Pudhari'),
(6, 'Maharashtra Times group', 'Maharashtra Times '),
(7, 'Deshonatti group', 'Deshonatti '),
(8, 'Divya Marathi group', 'Divya Marathi'),
(9, 'Dainik Bhaskar group', 'Dainik Bhaskar'),
(10, 'The Indian Express group', 'The Indian Express');

-- --------------------------------------------------------

--
-- Table structure for table `group_authority`
--

CREATE TABLE `group_authority` (
  `gid` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_authority`
--

INSERT INTO `group_authority` (`gid`, `aid`) VALUES
(3, 4),
(2, 5),
(1, 6),
(2, 7),
(1, 8),
(4, 9),
(4, 10),
(9, 11),
(7, 12),
(8, 13),
(5, 14),
(10, 15),
(6, 16),
(1, 19),
(3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `group_media`
--

CREATE TABLE `group_media` (
  `gid` int(11) NOT NULL,
  `mid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_media`
--

INSERT INTO `group_media` (`gid`, `mid`) VALUES
(1, 1),
(2, 2),
(4, 3),
(9, 4),
(5, 5),
(6, 6),
(3, 7),
(10, 8),
(7, 9),
(8, 10),
(1, 11),
(9, 12),
(2, 13),
(4, 14),
(10, 15),
(5, 16),
(8, 17),
(1, 18),
(6, 19);

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`user_id`, `group_id`) VALUES
(1, 3),
(2, 1),
(3, 1),
(4, 5),
(5, 4),
(6, 8),
(7, 5),
(8, 9),
(9, 9),
(10, 10),
(11, 6),
(12, 7),
(13, 2),
(14, 6),
(15, 3),
(16, 8),
(17, 1),
(18, 4),
(19, 10),
(20, 2),
(23, 1),
(25, 1),
(30, 6);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `m_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `agency` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `TimeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`m_id`, `name`, `email`, `password`, `salt`, `agency`, `location`, `TimeCreated`) VALUES
(1, 'Janak Dave', 'janakdave@gmail.com', 'cf9f141078b063553cf50d9a4ee5c103551b0cdd9a9e05450dd8052434d648cd', '186278669459d295285057e2.39328739', 'Lokmat', 'Swargate', '2017-10-02 19:36:08'),
(2, 'Ayush Bharshankar', 'ayushbharshankar@gmail.com', '7915f87a8b40b7751de7478aaf11d1bfcc21a6a436b0d7f438a3bdf5e8dfca15', '166589565159d2955825bc78.87270382', 'Sakal', 'Pimpri Chinchwad', '2017-10-02 19:36:56'),
(3, 'Riya Potdar', 'riyapotdar@gmail.com', '7434a9e6c1c169c5924765f668209a4359ce6660af8d5381a4ac3eea1667b31d', '66692546259d2958ca79655.16267496', 'Times of India ', 'Warje', '2017-10-02 19:37:48'),
(4, 'Chinmay Verma', 'chinmayverma@gmail.com', 'c1ef10d749db86596e7c206befdde309c53021e11e961f55bd8a4a3204007bf7', '114556648059d295d26292e1.11425331', 'Dainik Bhaskar', 'Deccan', '2017-10-02 19:38:58'),
(5, 'Deepak Jadhav', 'deepakjadhav@gmail.com', 'a7315a6080809f55a6cd877283be97574c062fe3a382661695706abae70781a4', '116260229259d2960bad11e3.69597744', 'Pudhari', 'Katraj', '2017-10-02 19:39:55'),
(6, 'Bhumi Rao', 'bhumirao@gmail.com', '616d2b89a90027ecf6cc3767dc04aaf8d08f173cc0ddee5b140d5188b9933c55', '206764490759d2963f3a3ed1.76380594', 'Maharashtra Times', 'Katraj', '2017-10-02 19:40:47'),
(7, 'Swapnil Yadav', 'swapnilyadav@gmail.com', 'd4da1d6398d5173352cee59e7b3aa0b191ad8e979648582f8d445898ab77a1f8', '86045234759d2966cc725a5.19637441', 'Loksatta', 'Kothrud', '2017-10-02 19:41:32'),
(8, 'Aboli Ghodekar', 'abolighodekar@gmail.com', '73fd6dcf22c78874d5fac9a3ba21a65e9c32caba001c17336d55a832ff728ad0', '70691708259d29697e5ae76.78920757', 'The Indian Express', 'Khadki', '2017-10-02 19:42:16'),
(9, 'Amit Joshi', 'amitjoshi@gmail.com', '096f838979ac7912a71a3996dbb00b45ebae6974582f61242cc3414f89897a32', '11056183759d296c8b68d68.78543299', 'Deshonatti', 'Viman Nagar ', '2017-10-02 19:43:04'),
(10, 'Akash Patil', 'akashpatil@gmail.com', '3ada47cdcb7eec17bdeebf79b825f94e4fea5cc197c0d9f90eebbf5451cc4fc1', '198060270859d29709e593f9.96583505', 'Divya Marathi', 'Aundh', '2017-10-02 19:44:10'),
(11, 'Sonali Gulve', 'sonaligulve@gmail.com', '4509af72e782d01a3b9d260a636f7f7702d489d7508308e579e3e34ed2ef8096', '79109655359d297510f7bf5.09056992', 'Lokmat', 'Aundh', '2017-10-02 19:45:21'),
(12, 'Bhushan Khandelwal', 'bhushankhandelwal@gmail.com', '40bebc9f90ea46d1f464a46850d37c7513f90489e8d36763b98c6f8c000be125', '185103298059d2977c781683.68371238', 'Dainik Bhaskar', 'Viman Nagar ', '2017-10-02 19:46:04'),
(13, 'Dilip Raut', 'dilipraut@gmail.com', '59fcf4829a4e13c6a053ec125c38737c16a37ca478a435f681574e2ca7de570e', '209371923559d2979fc29ab8.32859056', 'Sakal', 'Kothrud', '2017-10-02 19:46:39'),
(14, 'Raj Londhe', 'rajlondhe@gmail.com', '6810215bbc959fe094cf5537f51de3811a847cfb94c05f200b5b5178860d994e', '96096285659d297c46f01e1.79938959', 'Times of India ', 'Katraj', '2017-10-02 19:47:16'),
(15, 'Ketan Supe', 'ketansupe@gmail.com', 'f3ed0c4358a793ed045ee1e9ba5b660965a155a8ca7decc529c0658a97a77c62', '5910178859d297fdd730b4.87363288', 'The Indian Express ', 'Swargate', '2017-10-02 19:48:13'),
(16, 'Rahul Chatte', 'rahulchatte@gmail.com', 'f8025d5160b44181a6340ed91af3b81fa35c7cac369238a944e3b0a8f8f8b76b', '19092746159d29824793fc0.93072176', 'Pudhari', 'Deccan', '2017-10-02 19:48:52'),
(17, 'Monali Kadam', 'monalikadam@gmail.com', 'd434224a26d867d77160ef759b808d4d4c779ed98ca2a7caa93c27dd61bf9b8e', '194948804359d29852c37f58.23364279', 'Divya Marathi', 'Aundh', '2017-10-02 19:49:38'),
(18, 'Ashish Kshirsagar', 'ashish@gmail.com', '61d98b86611cb2e8e5c22958714cd6ba40e5239a5cfe4e38972d13b3e4ca26b0', '170384357759dbaf2d12c1d7.99506412', 'Lokmat', 'Warje', '2017-10-09 17:17:33'),
(19, 'Gunjan Manore', 'gunjanm@gmail.com', '161c81c70f320c7da26b1e01b166ea2efef62c0e8e3087d3c41ee6ffc9512f22', '112135300759dc3cfa972225.58025687', 'Maharashtra Times', 'Pimpri Chinchwad', '2017-10-10 03:22:34');

--
-- Triggers `media`
--
DELIMITER $$
CREATE TRIGGER `addtogroup_m` AFTER INSERT ON `media` FOR EACH ROW BEGIN DECLARE id INT; DECLARE uid INT; SELECT gid_m INTO id from grouptable_media where agency=any(SELECT new.agency from media) ; INSERT INTO group_media VALUES(id,new.m_id); END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `media_chat`
--

CREATE TABLE `media_chat` (
  `chat_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `TimeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_chat`
--

INSERT INTO `media_chat` (`chat_id`, `g_id`, `u_id`, `message`, `TimeCreated`) VALUES
(5, 1, 11, 'Tomorrow I will cover the issue in my area in our issue section', '2017-10-07 13:52:17'),
(6, 1, 11, 'The is getting serious and public is raising the issue', '2017-10-07 13:52:39'),
(7, 1, 1, 'Yes you can go ahead', '2017-10-07 13:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(140) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `type` varchar(50) NOT NULL,
  `location` varchar(128) NOT NULL,
  `TimeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `type`, `location`, `TimeCreated`, `user_id`) VALUES
(63, 'Broken pipeline system', 'Pipeline system broken near Warje  since 3 days.', 'Drainage', 'Warje', '2017-10-02 15:37:14', 1),
(65, 'Flyover left under construction', 'Swargate flyover left under construction causing traffic jam frequently', 'Roads', 'Swargate', '2017-10-02 15:53:38', 4),
(67, 'Misuse of BRTS ', 'BRTS is being  misused by the bus drivers as well as other vehicles near swargate', 'Other', 'Swargate', '2017-09-22 16:00:02', 3),
(72, ' Footpath broken ', 'Broken footpath causing a problem for pedestrians near Dapodi', 'Roads', 'Pimpri Chinchwad', '2017-10-02 16:33:25', 9),
(73, 'Traffic signal broken ', 'The broken traffic signal near Khadki market since two months is creating traffic issues', 'Roads', 'Khadki', '2017-10-02 16:43:43', 10),
(74, 'Large water puddles', 'The potholes near MIT college on Paud road is dangerous for commuters ', 'Roads', 'Kothrud', '2017-10-02 16:48:57', 11),
(76, 'No Water supply', 'No water supply in Aundh ,due to which water is brought through tankers from one week', 'Water Supply', 'Aundh', '2017-10-02 17:01:09', 13),
(79, 'River choking on pollution', 'Deterioration of water quality of the Mula-Mutha due to domestic sewage   ', 'Cleanliness', 'Laxmi Road', '2017-10-02 17:15:15', 16),
(97, 'Traffic Problem on Pune Satara Road', 'Traffic on Pune satara road since last few days...', 'Roads', 'Katraj', '2017-10-05 09:25:38', 2),
(98, 'Unauthorized Shops', 'There are many unauthorized shops near Dattanagar Chowk Ambegaon BK which, even after many notices were not removed or taken care of.', 'Other', 'Katraj', '2017-10-09 17:39:10', 25);

-- --------------------------------------------------------

--
-- Table structure for table `resolved`
--

CREATE TABLE `resolved` (
  `r_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resolved`
--

INSERT INTO `resolved` (`r_id`, `u_id`, `p_id`) VALUES
(13, 2, 97),
(24, 6, 68),
(25, 3, 75),
(26, 3, 75),
(27, 3, 75),
(28, 3, 75),
(29, 3, 75),
(30, 3, 75),
(31, 5, 75),
(32, 5, 75),
(33, 3, 75),
(34, 6, 75),
(35, 6, 75),
(36, 25, 97),
(37, 25, 98),
(38, 23, 98),
(39, 11, 77),
(40, 8, 77),
(41, 8, 77),
(42, 8, 77),
(43, 8, 77),
(44, 8, 77),
(45, 8, 77),
(46, 8, 77),
(47, 8, 77),
(48, 8, 77),
(49, 8, 77);

--
-- Triggers `resolved`
--
DELIMITER $$
CREATE TRIGGER `resovetrigger` BEFORE INSERT ON `resolved` FOR EACH ROW BEGIN
DECLARE total INT;
SELECT count(*) into total from resolved WHERE p_id=new.p_id;
call delete_on_resolved(total,new.p_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `resolved_issues`
--

CREATE TABLE `resolved_issues` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `TimeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resolved_issues`
--

INSERT INTO `resolved_issues` (`post_id`, `title`, `description`, `type`, `location`, `TimeCreated`, `user_id`) VALUES
(75, 'Bus stop railing broken ', 'Broken bus stop railing near Viman Nagar from several months', 'Other', 'Viman Nagar ', '2017-10-02 16:59:12', 12),
(77, 'Water-logging due to rains', 'Rains throw traffic out of gear in Kothrud,water-logging makes it worse', 'Logging', 'Kothrud', '2017-10-02 17:04:17', 14);

-- --------------------------------------------------------

--
-- Table structure for table `upvote`
--

CREATE TABLE `upvote` (
  `up_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvote`
--

INSERT INTO `upvote` (`up_id`, `u_id`, `p_id`) VALUES
(5, 3, 97),
(7, 2, 97),
(11, 25, 97),
(12, 25, 98),
(13, 23, 98),
(14, 23, 97),
(15, 11, 74),
(17, 20, 76);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `TimeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `salt`, `Contact`, `Location`, `TimeCreated`) VALUES
(1, 'Kshama Nagrale', 'kshamanagrale@gmail.com', 'b9e1455fc70c04f1888074c6b583f276a8c49c0bae1a52dedaa84841a7972dfa', '28617883059d2255a84f8e7.33147824', '9158576958', 'Warje', '2017-10-02 11:39:06'),
(2, 'Omkesh Mitkari', 'mitkariomkesh@gmail.com', '6afeb189f5e0a1d613f20d2c6c9302e4557aebb8ee9e026387e67a2904e974a9', '105887294259d2271090b979.30225498', '7776887398', 'Katraj', '2017-10-02 11:46:24'),
(3, 'Saunved Mutalik', 'saunvedmutalik@gmail.com', 'ca500920a8cd168f0e01cc6959ab8a753be280d1e6fa0f0d4e38ba8bde6c77c8', '164586147759d227591d75d3.03705585', '9730324066', 'Katraj', '2017-10-02 11:47:37'),
(4, 'Mihir Karkare', 'mihirkarkare@gmail.com', '709d99ee0ca1faf50e8f0b2915d81f1463fb0890e5f5d551b20451cefc9a752b', '27664201459d227a180dcb9.07176457', '9322215775', 'Swargate', '2017-10-02 11:48:49'),
(5, 'Eshita Khandelwal ', 'eshitakhandelwal@gmail.com', 'fe76b102e2f4158452d7c8717691ab871298729cff9dd7f1fe6700bfa7d8a5f4', '47087528759d2280e825c41.81120631', '9673605223', 'Deccan', '2017-10-02 11:50:38'),
(6, 'Valay Gundecha ', 'valaygundecha@gmail.com', 'd0a713cc7684c8a7d6a6896e86ac164929a0b204ef678b55723555afd85a6b26', '6665175959d228391d4eb4.41877633', '8407992629', 'Laxmi Road', '2017-10-02 11:51:21'),
(7, 'Gaurang Londhe', 'gauranglondhe@gmail.com', '10c9a772abf533833683aa2a0062bcb37903ba8589f8c56833263eb2b5aa0106', '191644648459d22888a986a6.89456694', '9765565465', 'Swargate', '2017-10-02 11:52:40'),
(8, 'Darshan Tawari', 'darshantawari@gmail.com', 'eec9c7c1113b35c454da69f401dcff27ce23f95a65df1b9eff4fc27d26f4da9d', '103985552259d228d79d7572.37297158', '9457328574', 'Pimpri Chinchwad', '2017-10-02 11:53:59'),
(9, 'Shubham Joshi', 'shubhamjoshi@gmail.com', '4b874c2df3f6e0e081dd540fb707fe553f3e47ce28c3315397fbced9a0acb27c', '76543127459d22909c88720.98689169', '8675940234', 'Pimpri Chinchwad', '2017-10-02 11:54:49'),
(10, 'Sayali Ghodekar', 'sayalighodekar@gmail.com', '2ca127be7ef3d9b20de1acae44d83c905631af01ae0caeb783f031aab6a45c7e', '37363039459d22931cfed41.90018059', '8765904433', 'Khadki', '2017-10-02 11:55:29'),
(11, 'Rupali Gulve', 'rupaligulve@gmail.com', 'be32035beafdff9a2b8ba0fcb2bf8eed8eb0f2ab21b2738574425ae99fde6d53', '55185351259d229724ea391.60679296', '9125627683', 'Kothrud', '2017-10-02 11:56:34'),
(12, 'Aman Agarwal', 'amanagarwal@gmail.com', 'b1d0974378ac8055604100ab836654a67dcaf5d6152e2931466dd1bf10d7f476', '169299732159d229a79003f9.94247931', '8866774410', 'Viman Nagar', '2017-10-02 11:57:27'),
(13, 'Saie Khude', 'saiekhude@gmail.com', '23ebff7f2a1079d5b765d96bde147028e26c52c70415f95a5860901a931d69c6', '164654211559d22a031b7e30.04881888', '7089654388', 'Aundh', '2017-10-02 11:58:59'),
(14, 'Sanika Magar', 'sanikamagar@gmail.com', '57b842cd2bff9878a3644a828e9cfc6be7b716dc905024c2edac8d90acc37fe8', '183587576259d22a43ea7bd9.49105949', '8123423157', 'Kothrud', '2017-10-02 12:00:04'),
(15, 'Samyak Nagrale', 'samyaknagrale@gmail.com', '45216660c484ad96f5a56080c989a134caeea1a45c3223090453cd7197c41393', '157700434959d22b7604b384.49910819', '9822095176', 'Warje', '2017-10-02 12:05:10'),
(16, 'Piyush Pimplikar', 'piyushpimplikar@gmail.com', '35e4e91b29536cde3e499ed328387a996f4d8fbdeea25398a637eed48109d12f', '21256412259d22be07e4994.61033978', '7865409123', 'Laxmi Road', '2017-10-02 12:06:56'),
(17, 'Onkar Ingale', 'ingaleonkar@gmail.com', '73872aaa20bb4a3f8f863d289933b8e2a403394b53405ee87d47454a3c193e60', '213255565959d22c284d0f64.13405664', '9870123456', 'Katraj', '2017-10-02 12:08:08'),
(18, 'Madhuri Bharshankar', 'madhuribharshankar@gmail.com', '7b5ec602f5e11615f06a044eaabde8a1536a2bbecff8e74fe70cd7c0204ed2fb', '100571825859d22c66d7c2d7.94566788', '9850212193', 'Deccan', '2017-10-02 12:09:10'),
(19, 'Melvyn Binoy', 'melvynbinoy@hgmail.com', 'e8daba93c9f6d039c5ce36496c19b0a145e85fc8f78babca49d2fb391c13e983', '778288959d22cb1e9dde6.14207155', '8604453232', 'Khadki', '2017-10-02 12:10:26'),
(20, 'Manasi Remane', 'manasiremane@gmail.com', '8851925599b6ac9061c35b5a6dfac1069355d22730a2ffdcc12d67887324522c', '169297762859d22ced8d9555.90294952', '7765880981', 'Aundh', '2017-10-02 12:11:25'),
(23, 'Pranav Agraval', 'pranav@gmail.com', '83930381a6b42cd9a68a28a6a188f268db5f32192b8a412e7be12da354356d4a', '28055847559dbabb78f84d7.45401949', '9876543217', 'Katraj', '2017-10-09 17:02:47'),
(25, 'Motish Mehta', 'mehta.motish1197@gmail.com', 'f486b6699622a2cd8cb192f39564ef0f0fc2933b1c7b60f52b397a8d8924990d', '5020970759dbb0a64e3f77.68360059', '9422247762', 'Katraj', '2017-10-09 17:23:50'),
(30, 'Rajat Raghuvanshi', 'rajatr1@gmail.com', '8bd15e345e9562a3ff40deae769470e56a3defb6c7d68b005fa302632f314d0c', '74990122759dc39c41ea182.91115003', '5648641351', 'Kothrud', '2017-10-10 03:08:52');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `addtogroup` AFTER INSERT ON `user` FOR EACH ROW BEGIN 
DECLARE id INT; DECLARE uid INT;
SELECT group_id INTO id from grouptable where Location=any(SELECT new.Location from user) ; 
INSERT INTO group_user VALUES(new.user_id,id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_chat`
--

CREATE TABLE `user_chat` (
  `chat_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `TimeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_chat`
--

INSERT INTO `user_chat` (`chat_id`, `g_id`, `u_id`, `message`, `TimeCreated`) VALUES
(1, 1, 2, 'Hello Everyone....', '2017-10-06 17:14:55'),
(2, 1, 2, 'The Road issue is getting very serious now', '2017-10-06 17:15:36'),
(3, 1, 3, 'Yes, We need to do something....', '2017-10-06 17:16:03'),
(4, 1, 17, 'Yes we will plan something very soon', '2017-10-06 17:16:33'),
(13, 1, 2, 'How are you people', '2017-10-06 18:02:47'),
(14, 1, 2, 'How are you people', '2017-10-06 18:03:23'),
(18, 1, 17, 'I think the construction work will start soon', '2017-10-06 18:15:24'),
(19, 6, 11, 'water logging issue is getting more serious day by day', '2017-10-06 18:22:09'),
(20, 6, 11, 'Its the consistant issue of this area since last few years during rainy season', '2017-10-06 18:22:54'),
(21, 6, 14, 'Yes but authority is not worried about it', '2017-10-06 18:24:56'),
(22, 1, 2, 'Have you seen any sign of that???', '2017-10-06 18:25:48'),
(23, 1, 2, 'mosvkso', '2017-10-06 18:56:53'),
(24, 1, 3, 'Tommorrow I will Cover the road issue in my area ', '2017-10-06 19:22:39'),
(25, 1, 2, 'Ok fine', '2017-10-06 19:34:52'),
(26, 1, 3, 'Ya cool!!!', '2017-10-06 19:35:29'),
(27, 1, 2, ':)', '2017-10-07 05:02:07'),
(28, 1, 2, 'Hey There!!!', '2017-10-07 08:47:00'),
(29, 1, 3, 'Hi Buddy!!', '2017-10-07 08:48:04'),
(30, 6, 11, 'Hey There!!!', '2017-10-07 08:50:26'),
(32, 4, 5, 'Garbage issue is getting serious....', '2017-10-08 05:23:50'),
(33, 4, 5, 'still no responce from authority...', '2017-10-08 05:24:13'),
(34, 4, 18, 'Yes we can meet to the Nagar Sevak of Deccan and we will talk to them regarding this', '2017-10-08 05:26:38'),
(36, 4, 18, 'Is it OK for you.....', '2017-10-08 05:28:44'),
(38, 3, 1, 'The pipeline issue is still not resolved...', '2017-10-08 15:03:04'),
(39, 3, 1, 'Need to do something!!', '2017-10-08 15:03:34'),
(40, 3, 15, 'I hope we will see the action from authority soon:)', '2017-10-08 15:05:52'),
(41, 1, 2, 'Hello', '2017-10-08 15:15:50'),
(42, 1, 2, 'hi', '2017-10-09 05:19:00'),
(43, 1, 2, 'Hello there!!!!', '2017-10-09 06:46:43'),
(44, 1, 25, 'Hey Guys', '2017-10-09 17:34:00'),
(45, 1, 25, 'Any updates on the traffic issue on the highway????', '2017-10-09 17:34:29'),
(46, 6, 11, 'issue is serious', '2017-10-10 05:15:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `authority_chat`
--
ALTER TABLE `authority_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `downvote`
--
ALTER TABLE `downvote`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `grouptable`
--
ALTER TABLE `grouptable`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `grouptable_authority`
--
ALTER TABLE `grouptable_authority`
  ADD PRIMARY KEY (`gid_a`);

--
-- Indexes for table `grouptable_media`
--
ALTER TABLE `grouptable_media`
  ADD PRIMARY KEY (`gid_m`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `media_chat`
--
ALTER TABLE `media_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `resolved`
--
ALTER TABLE `resolved`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `resolved_issues`
--
ALTER TABLE `resolved_issues`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `upvote`
--
ALTER TABLE `upvote`
  ADD PRIMARY KEY (`up_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `Contact` (`Contact`);

--
-- Indexes for table `user_chat`
--
ALTER TABLE `user_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `authority_chat`
--
ALTER TABLE `authority_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `downvote`
--
ALTER TABLE `downvote`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `grouptable`
--
ALTER TABLE `grouptable`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `grouptable_authority`
--
ALTER TABLE `grouptable_authority`
  MODIFY `gid_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `grouptable_media`
--
ALTER TABLE `grouptable_media`
  MODIFY `gid_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `media_chat`
--
ALTER TABLE `media_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `resolved`
--
ALTER TABLE `resolved`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `resolved_issues`
--
ALTER TABLE `resolved_issues`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `upvote`
--
ALTER TABLE `upvote`
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user_chat`
--
ALTER TABLE `user_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `group_user_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `grouptable` (`group_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `upvote`
--
ALTER TABLE `upvote`
  ADD CONSTRAINT `upvote_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upvote_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
