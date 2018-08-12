-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2018 at 10:45 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_about`
--

CREATE TABLE IF NOT EXISTS `admin_about` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `p_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `about` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin_about`
--

INSERT INTO `admin_about` (`id`, `p_id`, `user_id`, `about`) VALUES
(1, 1, 4, 0x496e2047637566207765206f666665727320427320436f6d707574657220536369656e6365),
(2, 3, 4, 0x41626f7574),
(3, 4, 4, 0x686868),
(6, 7, 4, 0x61626f7574),
(8, 9, 4, 0x53454c454354202a2046524f4d206061646d696e5f61626f75746020574845524520705f6964203d2039),
(9, 8, 4, 0x6368656d6973747274);

-- --------------------------------------------------------

--
-- Table structure for table `admin_a_schedule`
--

CREATE TABLE IF NOT EXISTS `admin_a_schedule` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `p_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `admission_date` varchar(255) NOT NULL,
  `test_date` varchar(255) NOT NULL,
  `test_venue` varchar(255) NOT NULL,
  `test_time` varchar(255) NOT NULL,
  `merit_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin_a_schedule`
--

INSERT INTO `admin_a_schedule` (`id`, `p_id`, `user_id`, `admission_date`, `test_date`, `test_venue`, `test_time`, `merit_date`) VALUES
(1, 1, 4, '2018-08-31', '2018-07-21', 'Faisalabad', '13:03', '2018-08-30'),
(2, 3, 4, '2018-07-18', '2018-07-21', 'Faisalabad', '21:12', '2018-08-22'),
(6, 7, 4, '2018-08-26', '', '', '', '2018-07-31'),
(7, 8, 4, '2018-08-12', '', '', '', '2018-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_criteria_list`
--

CREATE TABLE IF NOT EXISTS `admin_criteria_list` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `p_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `t_seats` varchar(255) NOT NULL,
  `quota` varchar(255) NOT NULL,
  `punjab` varchar(255) NOT NULL,
  `sindh` varchar(255) NOT NULL,
  `kpk` varchar(255) NOT NULL,
  `bal` varchar(255) NOT NULL,
  `fed` varchar(255) NOT NULL,
  `fata` varchar(255) NOT NULL,
  `sports` varchar(255) NOT NULL,
  `handicaped` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin_criteria_list`
--

INSERT INTO `admin_criteria_list` (`id`, `p_id`, `user_id`, `t_seats`, `quota`, `punjab`, `sindh`, `kpk`, `bal`, `fed`, `fata`, `sports`, `handicaped`) VALUES
(1, 1, 4, '10', 'Quota System', '5', '5', '', '', '', '', '', ''),
(2, 3, 4, '2', 'Quota System', '1', '1', '', '', '', '', '', ''),
(6, 7, 4, '2', 'Quota System', '1', '1', '', '', '', '', '', ''),
(7, 8, 4, '10', 'Quota System', '5', '', '', '', '5', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_e_criteria`
--

CREATE TABLE IF NOT EXISTS `admin_e_criteria` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `p_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `matric_marks` varchar(255) NOT NULL,
  `inter_marks` varchar(255) NOT NULL,
  `bachlor_marks` varchar(255) NOT NULL,
  `master_marks` varchar(255) NOT NULL,
  `mphil_marks` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sat` varchar(255) NOT NULL,
  `hec` varchar(255) NOT NULL,
  `nat` varchar(255) NOT NULL,
  `nts` varchar(255) NOT NULL,
  `af_matric` varchar(255) NOT NULL,
  `af_inter` varchar(255) NOT NULL,
  `af_bachlor` varchar(255) NOT NULL,
  `af_master` varchar(255) NOT NULL,
  `af_mphil` varchar(255) NOT NULL,
  `ahq` varchar(255) NOT NULL,
  `aet` varchar(255) NOT NULL,
  `ait` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `admin_e_criteria`
--

INSERT INTO `admin_e_criteria` (`id`, `p_id`, `user_id`, `program`, `matric_marks`, `inter_marks`, `bachlor_marks`, `master_marks`, `mphil_marks`, `type`, `sat`, `hec`, `nat`, `nts`, `af_matric`, `af_inter`, `af_bachlor`, `af_master`, `af_mphil`, `ahq`, `aet`, `ait`) VALUES
(4, 4, 4, 'BA/BSC/BCOM/BBA', '99', '999', '', '', '', 'openMerit', '', '', '', '', '75', '12', '', '', '', '', '30', '5'),
(7, 3, 4, 'PHD', '50%', '50%', '', '', '', 'openMerit', '', '', '', '', '75', '15', '', '', '', '', '30', '5'),
(8, 1, 4, 'BS/MSC', '50%', '50%', '50%', '', '', 'enteryTest', '', '', '', '', '75', '15', '', '', '', '', '5', '5'),
(10, 7, 4, 'PHD', '45', '45', '45', '45', '45', 'openMerit', '55', '', '', '555', '75', '10', '5', '', '', '', '5', '5'),
(11, 8, 4, 'BS/MSC', '30', '30', '30', '', '', 'openMerit', '', '', '', '', '50', '40', '', '', '', '', '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_late_admission`
--

CREATE TABLE IF NOT EXISTS `admin_late_admission` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `p_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `late_title` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin_late_admission`
--

INSERT INTO `admin_late_admission` (`id`, `p_id`, `user_id`, `late_title`) VALUES
(1, 1, 4, 0x4c4154452041444d495353494f4e20504f4c4943592048455245),
(2, 3, 4, 0x506f6c696379),
(5, 6, 4, 0x706f6c696379),
(6, 7, 4, 0x706f6c696379),
(7, 8, 4, 0x61646d697373696f6e20706f6c696379);

-- --------------------------------------------------------

--
-- Table structure for table `admin_p_detail`
--

CREATE TABLE IF NOT EXISTS `admin_p_detail` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `p_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `degreeLevel` varchar(255) NOT NULL,
  `uni_name` varchar(255) NOT NULL,
  `uni_program` varchar(255) NOT NULL,
  `uni_dept` varchar(255) NOT NULL,
  `uni_campus` varchar(255) NOT NULL,
  `max_duration` varchar(255) NOT NULL,
  `min_duration` varchar(255) NOT NULL,
  `t_courses` varchar(255) NOT NULL,
  `t_hours` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `p_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `admin_p_detail`
--

INSERT INTO `admin_p_detail` (`id`, `p_id`, `user_id`, `degreeLevel`, `uni_name`, `uni_program`, `uni_dept`, `uni_campus`, `max_duration`, `min_duration`, `t_courses`, `t_hours`, `img`, `status`, `p_status`) VALUES
(1, 1, 4, 'BS', 'gcuf', 'Bs Computer Science', 'Computer Science', 'Faisalabad Main Campus', '4 Years', '4 Years', '8', '3', 'Documentation.docx', '1', 'Completed'),
(4, 3, 4, 'BS', 'gcuf', 'Bs Information technology', 'Computer Science', 'Faisalabad Main Campus', '4 Years', '4 Years', '8', '3', 'Muhammad Zahid Tufail-CV.pdf', '1', 'Completed'),
(6, 7, 4, 'MS', 'gcuf', 'Physics', 'physics', 'fsd', '4 years', '4 years', '8', '20', 'Documentation1.docx', '1', 'Completed'),
(7, 9, 4, 'MS', 'gcuf', 'Biology', 'op', 'o', 'po', 'po', 'p', 'op', 'Documentation.docx', '1', ''),
(8, 8, 4, 'BS', 'gcuf', 'Bs Chemistry', 'chemistry', 'islamabad', '6 years', '4 years', '12', '32', 'f10.txt', '1', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'kk', 'k@gmail.com', 'kk', 'k', 0x6b),
(2, 'Rimsha', 'rimsha@gmail.com', '03148789783', 'testing', 0x6d6573736167652068657265);

-- --------------------------------------------------------

--
-- Table structure for table `course_enrolled`
--

CREATE TABLE IF NOT EXISTS `course_enrolled` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `p_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `marks` varchar(244) NOT NULL,
  `E_total` varchar(255) NOT NULL,
  `interview_marks` varchar(255) NOT NULL,
  `I_total` varchar(255) NOT NULL,
  `by_` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `course_enrolled`
--

INSERT INTO `course_enrolled` (`id`, `p_id`, `user_id`, `cnic`, `marks`, `E_total`, `interview_marks`, `I_total`, `by_`, `status`) VALUES
(2, 1, 9, '33098978787878', '', '', '', '', '4', ''),
(3, 8, 9, '33098978787878', '', '', '', '', '4', ''),
(54, 8, 11, '33098978787878', '', '', '', '', '4', ''),
(55, 8, 38, '6110198527482', '', '', '', '', '4', ''),
(56, 8, 39, '6110198527482', '', '', '', '', '4', ''),
(57, 8, 41, '6110189737762', '', '', '', '', '4', ''),
(58, 8, 42, '6110198527482', '', '', '', '', '4', ''),
(59, 8, 43, '6110189737762', '', '', '', '', '4', ''),
(60, 8, 44, '6110198527482', '', '', '', '', '4', ''),
(61, 8, 45, '6110189737762', '', '', '', '', '4', ''),
(62, 8, 46, '6110198527482', '', '', '', '', '4', ''),
(63, 8, 47, '6110189737762', '', '', '', '', '4', ''),
(64, 8, 48, '6110198527482', '', '', '', '', '4', ''),
(65, 8, 49, '6110198527482', '', '', '', '', '4', ''),
(66, 8, 50, '6110178546748', '', '', '', '', '4', ''),
(67, 8, 51, '6110189737762', '', '', '', '', '4', ''),
(68, 8, 52, '6110178546748', '', '', '', '', '4', '');

-- --------------------------------------------------------

--
-- Table structure for table `meritlist`
--

CREATE TABLE IF NOT EXISTS `meritlist` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_cnic` varchar(255) NOT NULL,
  `s_domicile` varchar(255) NOT NULL,
  `s_aggregate` varchar(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `s_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `merit_list_no` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `meritlist`
--

INSERT INTO `meritlist` (`id`, `p_name`, `p_id`, `s_email`, `s_name`, `s_cnic`, `s_domicile`, `s_aggregate`, `admin_id`, `s_id`, `status`, `merit_list_no`) VALUES
(1, 'Bs Chemistry', 8, 'jk1@gmail.com', 'jk1', '33098978787878', 'Federal', '51.791', 4, 9, '', 0),
(2, 'Bs Chemistry', 8, 'jk3@gmail.com', 'jk3', '33098978787878', 'Punjab', '75.104', 4, 11, '', 0),
(3, 'Bs Chemistry', 8, 'izza@gmail.com', 'izza', '6110198527482', 'Punjab', '75.654', 4, 38, '', 0),
(4, 'Bs Chemistry', 8, 'alisha@gmail.com', 'alisha', '6110198527482', 'Punjab', '65.721', 4, 39, '', 0),
(5, 'Bs Chemistry', 8, 'nasir@gmail.com', 'nasir', '6110189737762', 'Punjab', '78.864', 4, 41, '', 0),
(6, 'Bs Chemistry', 8, 'sahir@gmail.com', 'sahir', '6110198527482', 'Punjab', '71.045', 4, 42, '', 0),
(7, 'Bs Chemistry', 8, 'anum@gmail.com', 'anum', '6110189737762', 'Punjab', '73.358', 4, 43, '', 0),
(8, 'Bs Chemistry', 8, 'amir@gmail.com', 'amir', '6110198527482', 'Punjab', '67.055', 4, 44, '', 0),
(9, 'Bs Chemistry', 8, 'husna@gmail.com', 'husna', '6110189737762', 'Federal', '70.939', 4, 45, '', 0),
(10, 'Bs Chemistry', 8, 'preesa@gmail.com', 'preesa', '6110198527482', 'Federal', '73.289', 4, 46, '', 0),
(11, 'Bs Chemistry', 8, 'ayyan@gmail.com', 'ayyan', '6110189737762', 'Federal', '74.771', 4, 47, '', 0),
(12, 'Bs Chemistry', 8, 'sameer@gmail.com', 'sameer', '6110198527482', 'Federal', '79.39', 4, 48, '', 0),
(13, 'Bs Chemistry', 8, 'alia@gmail.com', 'alia', '6110198527482', 'Federal', '72.996', 4, 49, '', 0),
(14, 'Bs Chemistry', 8, 'ayesha@gmail.com', 'ayesha', '6110178546748', 'Federal', '70.883', 4, 50, '', 0),
(15, 'Bs Chemistry', 8, 'sidra@gmail.com', 'sidra', '6110189737762', 'Federal', '80.844', 4, 51, '', 0),
(16, 'Bs Chemistry', 8, 'sameena@gmail.com', 'sameena', '6110178546748', 'Federal', '80.844', 4, 52, '', 0),
(17, 'Bs Computer Science', 1, 'jk1@gmail.com', 'jk1', '33098978787878', 'Federal', '', 4, 9, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `toNot` varchar(255) NOT NULL,
  `fromNot` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `toNot`, `fromNot`, `p_id`) VALUES
(17, 'Yours Entry Test Marks 000 are added.', '', '4', ''),
(41, 'Yours Interview Marks 90 are added for program Physics', '11', '4', '7'),
(42, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(43, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(44, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(45, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(46, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(47, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(48, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(49, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(50, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(51, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(52, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(53, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(54, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(55, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(56, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(57, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8'),
(58, 'Yours Entry Test Marks 94 are added for program Bs Chemistry', '46', '4', '8');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  `p_status` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `user_id`, `status`, `p_status`, `fees`) VALUES
(1, 'Bs Computer Science', 4, 1, 'Completed', '90000'),
(3, 'Bs Information technology', 4, 1, 'Completed', '1000'),
(7, 'Physics', 4, 1, 'Completed', '89000'),
(8, 'Bs Chemistry', 4, 1, 'Completed', 'fee'),
(9, 'Biology', 4, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_address`
--

CREATE TABLE IF NOT EXISTS `student_address` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `city1` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `city2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `student_address`
--

INSERT INTO `student_address` (`id`, `user_id`, `permanent_address`, `city1`, `postal_address`, `city2`) VALUES
(1, 2, 'p', 'c', 'a', 'c'),
(2, 38, 'abc', 'islam', 'hbds', 'ed'),
(3, 39, 'abc', 'islam', 'hbds', 'wad'),
(4, 41, 'wdqw', 'islam', 'wq', 'wad'),
(5, 42, 'sa', 'islam', 'wq', 'ed'),
(6, 43, 'wdqw', 'abc', 'hbds', 'wad'),
(7, 44, 'abc', 'islamabad', 'wq', 'ed'),
(8, 45, 'wdqw', 'islam', 'hbds', 'wad'),
(9, 46, 'as', 'qw', 'hbds', 'ed'),
(10, 47, 'abc', 'zs', 'hbds', 'wad'),
(11, 48, 'as', 'qw', 'wq', 'swa'),
(12, 49, 'as', 'zs', 'hbds', 'ed'),
(13, 50, 'wdqw', 'islamabad', 'hbds', 'ed'),
(14, 51, 'i-8/2', 'islamabad', 'wq', 'wad'),
(15, 52, 'abc', 'abc', 'hbds', 'wad');

-- --------------------------------------------------------

--
-- Table structure for table `student_doc_detail`
--

CREATE TABLE IF NOT EXISTS `student_doc_detail` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `img5` varchar(255) NOT NULL,
  `img6` varchar(255) NOT NULL,
  `img7` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `student_doc_detail`
--

INSERT INTO `student_doc_detail` (`id`, `user_id`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`) VALUES
(2, 2, 'logo.png', 'logo.png', 'logo.png', 'logo.png', 'logo.png', 'logo.png', 'logo.png'),
(3, 6, 'logo.png', 'logo.png', 'logo.png', 'logo.png', 'logo.png', 'logo.png', 'logo.png'),
(4, 38, 'f10.txt', '', '', '', '', '', ''),
(5, 39, 'f10.txt', '', '', '', '', '', ''),
(6, 41, 'f10.txt', '', '', '', '', '', ''),
(7, 42, 'f10.txt', '', '', '', '', '', ''),
(8, 43, 'f10.txt', '', '', '', '', '', ''),
(9, 44, 'f10.txt', '', '', '', '', '', ''),
(10, 45, 'f10.txt', '', '', '', '', '', ''),
(11, 46, 'f10.txt', '', '', '', '', '', ''),
(12, 47, 'f10.txt', '', '', '', '', '', ''),
(13, 48, 'f10.txt', '', '', '', '', '', ''),
(14, 49, 'f10.txt', '', '', '', '', '', ''),
(15, 50, '', '', '', '', '', '', ''),
(16, 51, '', '', '', '', '', '', ''),
(17, 52, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_e_detail`
--

CREATE TABLE IF NOT EXISTS `student_e_detail` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `ms_pass_year` varchar(255) NOT NULL,
  `bs_pass_year` varchar(255) NOT NULL,
  `ba_pass_year` varchar(255) NOT NULL,
  `fa_pass_year` varchar(255) NOT NULL,
  `ssc_pass_year` varchar(255) NOT NULL,
  `ms_uni_board` varchar(255) NOT NULL,
  `bs_uni_board` varchar(255) NOT NULL,
  `ba_uni_board` varchar(255) NOT NULL,
  `fa_uni_board` varchar(255) NOT NULL,
  `ssc_uni_board` varchar(255) NOT NULL,
  `ms_sub` varchar(255) NOT NULL,
  `bs_sub` varchar(255) NOT NULL,
  `ba_sub` varchar(255) NOT NULL,
  `fa_sub` varchar(255) NOT NULL,
  `ssc_sub` varchar(255) NOT NULL,
  `ms_max_marks` varchar(255) NOT NULL,
  `bs_max_marks` varchar(255) NOT NULL,
  `ba_max_marks` varchar(255) NOT NULL,
  `fa_max_marks` varchar(255) NOT NULL,
  `ssc_max_marks` varchar(255) NOT NULL,
  `ms_obtained` varchar(255) NOT NULL,
  `bs_obtained` varchar(255) NOT NULL,
  `ba_obtained` varchar(255) NOT NULL,
  `fa_obtained` varchar(255) NOT NULL,
  `ssc_obtained` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `student_e_detail`
--

INSERT INTO `student_e_detail` (`id`, `user_id`, `degree`, `ms_pass_year`, `bs_pass_year`, `ba_pass_year`, `fa_pass_year`, `ssc_pass_year`, `ms_uni_board`, `bs_uni_board`, `ba_uni_board`, `fa_uni_board`, `ssc_uni_board`, `ms_sub`, `bs_sub`, `ba_sub`, `fa_sub`, `ssc_sub`, `ms_max_marks`, `bs_max_marks`, `ba_max_marks`, `fa_max_marks`, `ssc_max_marks`, `ms_obtained`, `bs_obtained`, `ba_obtained`, `fa_obtained`, `ssc_obtained`) VALUES
(5, 9, 'BS/MSC', '', '2010', '2012', '2011', '2011', '', 'hhh', 'gg', 'Bahawalpur', 'Bahawalpur', '', 'hh', 'hh', 'jj', 'kk', '', '4', '1100', '1100', '1100', '', '3.4', '633', '633', '633'),
(6, 10, 'BS/MSC', '', '2018', '2014', '2012', '2012', '', 'll', 'kk', 'Gujranwala', 'Bahawalpur', '', 'lll', 'kk', 'kk', 'll', '', '4', '1100', '1100', '850', '', '3', '633', '633', '629'),
(7, 11, 'BS/MSC', '', '2012', '2011', '2013', '2011', '', 'll', 'kk', 'Sahiwal', 'Rawalpindi', '', 'lll', 'kk', 'kk', 'll', '', '4', '1100', '1100', '850', '', '3', '833', '933', '700'),
(8, 38, 'Inter/Fsc/A-level', '', '', '', '2018', '2016', '', '', '', 'Multan', 'Hyderabad', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '915', '890'),
(9, 39, 'Inter/Fsc/A-level', '2018', '', '', '2018', '2018', '', '', '', 'Karachi', 'Hyderabad', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '799', '770'),
(10, 41, 'Inter/Fsc/A-level', '', '', '', '2018', '2016', '', '', '', 'Sahiwal', 'Larkana', '', '', '', 'ics', 'general science', '', '', '', '1100', '1100', '', '', '', '920', '999'),
(11, 42, 'Inter/Fsc/A-level', '', '', '', '2016', '2018', '', '', '', 'Sahiwal', 'Larkana', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '876', '823'),
(12, 43, 'Inter/Fsc/A-level', '', '', '', '2016', '2018', '', '', '', 'Sargodha', 'Sahiwal', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '899', '854'),
(13, 44, 'Inter/Fsc/A-level', '', '', '', '2018', '2016', '', '', '', 'Hyderabad', 'Sahiwal', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '799', '798'),
(14, 45, 'Inter/Fsc/A-level', '', '', '', '2016', '2016', '', '', '', 'Karachi', 'Sukkur', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '915', '791'),
(15, 46, 'Inter/Fsc/A-level', '', '', '', '2018', '2016', '', '', '', 'Dera Ghazi Khan', 'Mirpur Khas', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '867', '877'),
(16, 47, 'Inter/Fsc/A-level', '', '', '', '2018', '2016', '', '', '', 'Sahiwal', 'Dera Ghazi Khan', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '765', '986'),
(17, 48, 'Inter/Fsc/A-level', '', '', '', '2018', '2016', '', '', '', 'Sukkur', 'Sukkur', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '875', '999'),
(18, 49, 'Inter/Fsc/A-level', '2018', '', '', '2011', '2016', '', '', '', 'Sahiwal', 'Mirpur Khas', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '855', '880'),
(19, 50, 'Inter/Fsc/A-level', '', '', '', '2018', '2016', '', '', '', 'Sargodha', 'Larkana', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '920', '786'),
(20, 51, 'Inter/Fsc/A-level', '', '', '', '2018', '2016', '', '', '', 'Sargodha', 'Sukkur', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '915', '999'),
(21, 52, 'Inter/Fsc/A-level', '', '', '', '2018', '2016', '', '', '', 'Sargodha', 'Abbottabad', '', '', '', 'ics', 'general science', '', '', '', '1100', '1050', '', '', '', '915', '999');

-- --------------------------------------------------------

--
-- Table structure for table `student_p_detail`
--

CREATE TABLE IF NOT EXISTS `student_p_detail` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `domicile` varchar(255) NOT NULL,
  `domicileDistrict` varchar(255) NOT NULL,
  `hq` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `handicaped` varchar(255) NOT NULL,
  `sm` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `student_p_detail`
--

INSERT INTO `student_p_detail` (`id`, `user_id`, `img`, `name`, `f_name`, `dob`, `gender`, `nationality`, `domicile`, `domicileDistrict`, `hq`, `cnic`, `mobile`, `email`, `handicaped`, `sm`) VALUES
(3, 6, '764070681_l.gif', 'Student', 'saleem', '2-FEB-1961', 'Male', 'Pakistani', 'Bahawalpur', 'Federal', 'no', '33098978787878', '03148767873', 'student@gmail.com', 'no', 'no'),
(4, 9, '', 'jk1', 'saleem', '2-FEB-1961', 'Male', 'Others', 'Bahawalnagar', 'Federal', 'yes', '33098978787878', '03148767873', 'jk1@gmail.com', 'no', 'no'),
(5, 10, '', 'jk2', 'saleem', '2-FEB-1961', 'Female', 'Others', 'Bahawalnagar', 'Federal', 'no', '33098978787878', '03148767873', 'jk2@gmail.com', 'no', 'no'),
(6, 11, '', 'jk3', 'saleem', '2-FEB-1964', 'Female', 'Others', 'D.G Khan', 'Punjab', 'no', '33098978787878', '03148767873', 'jk3@gmail.com', 'no', 'no'),
(7, 38, '', 'izza', 'shokat ali', '12-FEB-1996', 'Female', 'Pakistani', 'Federal', 'Punjab', 'no', '6110198527482', '03360112333', 'izza@gmail.com', 'no', 'no'),
(8, 39, '', 'alisha', 'shahzad ali', '11-SEP-1996', 'Female', 'Pakistani', 'Federal', 'Punjab', 'no', '6110198527482', '03360112333', 'alisha@gmail.com', 'no', 'no'),
(9, 41, '', 'nasir', 'altaf ali khan', '8-OCT-1996', 'Male', 'Pakistani', 'Federal', 'Punjab', 'no', '6110189737762', '03005524226', 'nasir@gmail.com', 'no', 'no'),
(10, 42, '', 'sahir', 'alim khan', '11-SEP-1996', 'Male', 'Pakistani', 'Federal', 'Punjab', 'no', '6110198527482', '03005524226', 'sahir@gmail.com', 'no', 'no'),
(11, 43, '', 'anum', 'ali khan', '9-JUN-1996', 'Female', 'Pakistani', 'Federal', 'Punjab', 'no', '6110189737762', '03005524226', 'anum@gmail.com', 'no', 'no'),
(12, 44, '', 'amir', 'shokat ali', '12-OCT-1996', 'Male', 'Pakistani', 'Federal', 'Punjab', 'no', '6110198527482', '03360112333', 'amir@gmail.com', 'no', 'no'),
(13, 45, '', 'husna', 'hasan ali', '11-SEP-1996', 'Female', 'Pakistani', 'Lahore', 'Federal', 'no', '6110189737762', '03360112333', 'husna@gmail.com', 'no', 'no'),
(14, 46, '', 'preesa', 'fiayaz siddiqui', '10-AUG-1996', 'Female', 'Pakistani', 'Lahore', 'Federal', 'no', '6110198527482', '03360112333', 'preesa@gmail.com', 'no', 'no'),
(15, 47, '', 'ayyan', 'shokat ali', '11-JUN-1996', 'Male', 'Pakistani', 'Lahore', 'Federal', 'no', '6110189737762', '03005524226', 'ayyan@gmail.com', 'no', 'no'),
(16, 48, '', 'sameer', 'shokat ali', '13-SEP-1996', 'Male', 'Pakistani', 'Jhelum', 'Federal', 'no', '6110198527482', '03360112333', 'sameer@gmail.com', 'no', 'no'),
(17, 49, '', 'alia', 'fiayaz siddiqui', '11-AUG-1996', 'Female', 'Pakistani', 'Jhang', 'Federal', 'no', '6110198527482', '03005524226', 'alia@gmail.com', 'no', 'no'),
(18, 50, '', 'ayesha', 'jamil siddiqui', '12-JUL-1996', 'Female', 'Pakistani', 'Lahore', 'Federal', 'no', '6110178546748', '03005524226', 'ayesha@gmail.com', 'no', 'no'),
(19, 51, '', 'sidra', 'altaf ali khan', '10-OCT-1996', 'Female', 'Pakistani', 'Attock', 'Federal', 'no', '6110189737762', '03360112333', 'sidra@gmail.com', 'no', 'no'),
(20, 52, '', 'sameena', 'fiayaz siddiqui', '1-MAR-1996', 'Female', 'Pakistani', 'Attock', 'Federal', 'no', '6110178546748', '03005524226', 'sameena@gmail.com', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `request` varchar(255) NOT NULL,
  `uni_name` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `status`, `role`, `request`, `uni_name`, `created_date`) VALUES
(4, 'Admin', 'admin@gmail.com', '123', '0', 'admin', '', 'gcuf', '18-Jul-2018 04:12:48pm'),
(6, 'Student', 'student@gmail.com', '123', '0', 'student', '', '', '18-Jul-2018 08:09:55pm'),
(7, 'Super Admin', 'superadmin@gmail.com', '123', '0', 'superadmin', '', '', '18-Jul-2018 04:12:48pm'),
(8, 'Mujahid', 'mujahid@gmail.com', '123', '0', 'admin', '', 'NTU', '24-Jul-2018 08:26:05pm'),
(9, 'jk1', 'jk1@gmail.com', '123', '', 'student', '', '', ''),
(10, 'jk2', 'jk2@gmail.com', '123', '', 'student', '', '', ''),
(11, 'jk3', 'jk3@gmail.com', '123', '', 'student', '', '', ''),
(12, 'jk4', 'jk4@gmail.com', '123', '', 'student', '', '', ''),
(13, 'jk5', 'jk5@gmail.com', '123', '', 'student', '', '', ''),
(14, 'jk6', 'jk6@gmail.com', '123', '', 'student', '', '', ''),
(15, 'jk7', 'jk7@gmail.com', '123', '', 'student', '', '', ''),
(16, 'jk8', 'jk8@gmail.com', '123', '', 'student', '', '', ''),
(17, 'jk9', 'jk9@gmail.com', '123', '', 'student', '', '', ''),
(18, 'jk10', 'jk10@gmail.com', '123', '', 'student', '', '', ''),
(19, 'jk11', 'jk11@gmail.com', '123', '', 'student', '', '', ''),
(20, 'jk12', 'jk12@gmail.com', '123', '', 'student', '', '', ''),
(21, 'jk13', 'jk13@gmail.com', '123', '', 'student', '', '', ''),
(22, 'jk14', 'jk14@gmail.com', '123', '', 'student', '', '', ''),
(23, 'jk15', 'jk15@gmail.com', '123', '', 'student', '', '', ''),
(24, 'jk16', 'jk16@gmail.com', '123', '', 'student', '', '', ''),
(25, 'jk17', 'jk17@gmail.com', '123', '', 'student', '', '', ''),
(26, 'jk18', 'jk18@gmail.com', '123', '', 'student', '', '', ''),
(27, 'jk19', 'jk19@gmail.com', '123', '', 'student', '', '', ''),
(28, 'jk20', 'jk20@gmail.com', '123', '', 'student', '', '', ''),
(29, 'jk21', 'jk21@gmail.com', '123', '', 'student', '', '', ''),
(30, 'jk22', 'jk22@gmail.com', '123', '', 'student', '', '', ''),
(31, 'jk23', 'jk23@gmail.com', '123', '', 'student', '', '', ''),
(32, 'jk24', 'jk24@gmail.com', '123', '', 'student', '', '', ''),
(33, 'jk25', 'jk25@gmail.com', '123', '', 'student', '', '', ''),
(34, 'jk26', 'jk26@gmail.com', '123', '', 'student', '', '', ''),
(35, 'jk27', 'jk27@gmail.com', '123', '', 'student', '', '', ''),
(36, 'jk28', 'jk28@gmail.com', '123', '', 'student', '', '', ''),
(37, 'jk29', 'jk29@gmail.com', '123', '', 'student', '', '', ''),
(38, 'izza', 'izza@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 01:27:38pm'),
(39, 'alisha', 'alisha@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 01:32:03pm'),
(40, 'jamil', 'jamil2gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 01:34:05pm'),
(41, 'nasir', 'nasir@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 01:34:37pm'),
(42, 'sahir', 'sahir@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 01:38:17pm'),
(43, 'anum', 'anum@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 01:43:10pm'),
(44, 'amir', 'amir@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 01:48:25pm'),
(45, 'husna', 'husna@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 01:51:50pm'),
(46, 'preesa', 'preesa@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 01:54:28pm'),
(47, 'ayyan', 'ayyan@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 01:56:37pm'),
(48, 'sameer', 'sameer@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 01:59:45pm'),
(49, 'alia', 'alia@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 02:01:35pm'),
(50, 'ayesha', 'ayesha@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 02:03:49pm'),
(51, 'sidra', 'sidra@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 02:09:00pm'),
(52, 'sameena', 'sameena@gmail.com', '123', 'active', 'student', '', '', '11-Aug-2018 02:10:44pm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
