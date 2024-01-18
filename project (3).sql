-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 07:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindet`
--

CREATE TABLE `admindet` (
  `adm_user` varchar(50) NOT NULL,
  `adm_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindet`
--

INSERT INTO `admindet` (`adm_user`, `adm_pass`) VALUES
('admin2@kwiqapply.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_add_clg`
--

CREATE TABLE `admin_add_clg` (
  `clg_id` int(10) NOT NULL,
  `clgname` text NOT NULL,
  `address` text NOT NULL,
  `admphone` int(12) NOT NULL,
  `prin_name` text NOT NULL,
  `prin_no` int(12) NOT NULL,
  `clg_email` text NOT NULL,
  `otherno` int(12) NOT NULL,
  `clg_cert` varchar(100) NOT NULL,
  `affiliate` text NOT NULL,
  `auth_stamp_img` varchar(100) NOT NULL,
  `DoE` date NOT NULL,
  `DoB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_add_clg`
--

INSERT INTO `admin_add_clg` (`clg_id`, `clgname`, `address`, `admphone`, `prin_name`, `prin_no`, `clg_email`, `otherno`, `clg_cert`, `affiliate`, `auth_stamp_img`, `DoE`, `DoB`) VALUES
(1, 'Girideepam Institute of Advanced Learning', 'Vadavathoor, Kottayam', 523623513, 'Dr. Antony Thomas', 314124232, 'gdpm@gmail.com', 1645646443, '10th cert.png', 'MGU', 'sidebar 2.png', '2022-02-17', '2022-12-31'),
(2, 'AMAL JYOTHI COLLEGE OF ENGINEERING', 'P.O Kanjirapally - Erumely Road, Koovappally, Kerala 686518', 2147483647, 'Dr. Lillykutty Jacob', 134513452, 'amaljyoti@gmail.com', 2147483647, 'aj_cert.png', 'AICTE', 'aj auth stamp.png', '2008-06-14', '2023-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `applic_det`
--

CREATE TABLE `applic_det` (
  `aplic_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `clg_id` int(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `app_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applic_det`
--

INSERT INTO `applic_det` (`aplic_id`, `user_id`, `course_id`, `clg_id`, `course_name`, `app_status`) VALUES
(7, 6, 8, 1, 'BAE', 'Accepted'),
(11, 16, 7, 1, 'BCA', '');

-- --------------------------------------------------------

--
-- Table structure for table `clg_adm_det`
--

CREATE TABLE `clg_adm_det` (
  `clg_id` int(12) NOT NULL,
  `clg_admin` varchar(50) NOT NULL,
  `clg_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clg_adm_det`
--

INSERT INTO `clg_adm_det` (`clg_id`, `clg_admin`, `clg_pass`) VALUES
(1, 'gdpm_adm1', 'gdpm1'),
(2, 'aj_admn', 'aj12');

-- --------------------------------------------------------

--
-- Table structure for table `clg_page_details`
--

CREATE TABLE `clg_page_details` (
  `cl_id` int(11) NOT NULL,
  `clg_name` varchar(150) NOT NULL,
  `clg_desc` varchar(1000) NOT NULL,
  `clg_courses` varchar(200) NOT NULL,
  `clg_photo` varchar(100) NOT NULL,
  `clg_link` varchar(66) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clg_page_details`
--

INSERT INTO `clg_page_details` (`cl_id`, `clg_name`, `clg_desc`, `clg_courses`, `clg_photo`, `clg_link`) VALUES
(1, 'Girideepam Institute of Advanced Learning', 'Girideepam Institute of Advanced Learning is situated in Kottayam in Kerala state of India. The college is accredited by AICTE. Girideepam Institute of Advanced Learning offers 9 courses across 4 streams namely Management, Commerce and Banking, Arts, IT..Popular degrees offered at Girideepam Institute of Advanced Learning include B.Com, BCA, BA, BBA, M.Com..Besides a robust teaching pedagogy, Girideepam Institute of Advanced Learning is also a leader in research and innovation.Focus is given to activities beyond academics at Girideepam Institute of Advanced Learning, which is evident from its infrastructure, extracurricular activities and national & international collaborations. The placement at Girideepam Institute of Advanced Learning is varied, with recruitment options both in corporates and public sector as well as entrepreneurship.', 'BCA , BBA , BAE , Bcom , B.Sc Pyschology , MBA', 'gdpm1.png', 'www.gial.com'),
(2, 'Amal Jyoti College of Engineering', 'Amal Jyothi College of Engineering, Kanjirapally, is the first engineering college in Kerala to obtain NAAC accreditation with ‘A’ grade, and the first new generation engineering college in the State to secure the prestigious NBA accreditation for prime departments. The main features of the College comprise world-class infrastructure, top-flight faculty, high pass percentage, excellent placement record, unique student projects and first rate start-ups. Amal Jyothi is a mega complex of 16.5 lakh sq.ft. built-up area overlooking the busy Kanjirapally-Erumeli stretch of the Kottayam-Sabarimala state highway. The two campus hostels, taken care of by dedicated Catholic priests and sisters, have a capacity of 2500. The campus has 2.04 Gbps internet connectivity with WiFi.', 'B.Tech , M.Tech , MCA', 'aj.png', 'www.ajce.in');

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `c_id` int(50) NOT NULL,
  `college_id` int(15) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `sem_no` int(12) NOT NULL,
  `sem_fee` varchar(50) NOT NULL,
  `ug_pg` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`c_id`, `college_id`, `course_name`, `sem_no`, `sem_fee`, `ug_pg`, `timestamp`) VALUES
(7, 1, 'BCA', 6, '22,000/Sem', 'UG', '2023-01-30 07:45:21'),
(8, 1, 'BAE', 6, '12000/Sem', 'UG', '2023-01-30 07:45:55'),
(9, 1, 'BBA', 6, '15000/Sem', 'UG', '2023-01-30 07:46:07'),
(12, 1, 'MBA', 4, '15000/Sem', 'PG', '2023-01-30 07:46:50'),
(17, 1, 'B.Sc_Psychology', 6, '14000/Sem', 'UG', '2023-03-06 17:39:41'),
(18, 1, 'Bcom', 6, '15000/Sem', 'UG', '2023-03-06 17:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `userdet`
--

CREATE TABLE `userdet` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `con_pass` varchar(255) NOT NULL,
  `mobilenum` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdet`
--

INSERT INTO `userdet` (`user_id`, `username`, `email`, `pass`, `con_pass`, `mobilenum`) VALUES
(6, 'gary12', 'gary12@gmail.com', 'gary12', '', '3463656547'),
(15, 'Vijaya45', 'vijay@gmail.com', 'vijaya12', 'vijaya12', '3463656547'),
(16, 'Tessa14', 'tess@gmail', 'tess12', 'tess12', '12abc4212'),
(17, 'abi jacob', 'abijacob8888@gmail.com', '12345', '12345', '7025315620');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `fb_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fb_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `u_reg_data`
--

CREATE TABLE `u_reg_data` (
  `u_adm_id` varchar(50) NOT NULL,
  `u_id` int(100) NOT NULL,
  `s_full_name` varchar(200) NOT NULL,
  `s_mob` varchar(12) NOT NULL,
  `s_dob` date NOT NULL,
  `sf_name` varchar(200) NOT NULL,
  `sf_mob` varchar(12) NOT NULL,
  `sm_name` varchar(200) NOT NULL,
  `sm_mob` varchar(12) NOT NULL,
  `s_gen` varchar(50) NOT NULL,
  `s_addr` varchar(200) NOT NULL,
  `s_state` varchar(50) NOT NULL,
  `s_pin` varchar(15) NOT NULL,
  `s_natn` varchar(50) NOT NULL,
  `s_relg` varchar(50) NOT NULL,
  `s_caste` varchar(50) NOT NULL,
  `s_b1` varchar(50) NOT NULL,
  `s_year1` varchar(50) NOT NULL,
  `s_tm1` varchar(10) NOT NULL,
  `s_mo1` varchar(10) NOT NULL,
  `s_pom1` varchar(50) NOT NULL,
  `s_b2` varchar(50) NOT NULL,
  `s_year2` varchar(50) NOT NULL,
  `s_tm2` varchar(50) NOT NULL,
  `s_mo2` varchar(10) NOT NULL,
  `s_pom2` varchar(50) NOT NULL,
  `st_foto` varchar(50) NOT NULL,
  `s_10cert` varchar(100) NOT NULL,
  `s_12cert` varchar(100) NOT NULL,
  `s_othcert` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_reg_data`
--

INSERT INTO `u_reg_data` (`u_adm_id`, `u_id`, `s_full_name`, `s_mob`, `s_dob`, `sf_name`, `sf_mob`, `sm_name`, `sm_mob`, `s_gen`, `s_addr`, `s_state`, `s_pin`, `s_natn`, `s_relg`, `s_caste`, `s_b1`, `s_year1`, `s_tm1`, `s_mo1`, `s_pom1`, `s_b2`, `s_year2`, `s_tm2`, `s_mo2`, `s_pom2`, `st_foto`, `s_10cert`, `s_12cert`, `s_othcert`) VALUES
('DE00000002', 6, 'GARYY', '3464363451', '2023-01-26', 'GARY DAD', '2346314643', 'GARY MOM', '7542454245', 'Female', 'GARY HOUSE', ' MADHYA PRADESH', '754021', 'Madhya pradesh', 'Christian', 'GEN', 'CBSE', '2018', '600', '520', '61%', 'State', '2020', '600', '567', '89%', 'stud3.png', '10th mark sheet.png', '12th mark sheet.png', ''),
('DE00000003', 15, 'Vijaya Lakshmi VP', '3464363451', '2002-04-27', 'Rakesh VP', '6737345412', 'Merin VP', '7346234237', 'Female', 'VP House,Parampuzha PO', 'Kerala', '686019', 'Kerala', 'HINDU', 'GEN', 'CBSE', '2018', '600', '513', '86%', 'CBSE', '2020', '600', '540', '90%', 'stud3.png', '10th cert.png', '12th mark sheet.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_add_clg`
--
ALTER TABLE `admin_add_clg`
  ADD PRIMARY KEY (`clg_id`);

--
-- Indexes for table `applic_det`
--
ALTER TABLE `applic_det`
  ADD PRIMARY KEY (`aplic_id`),
  ADD KEY `user_id` (`user_id`,`course_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `clg_id` (`clg_id`);

--
-- Indexes for table `clg_adm_det`
--
ALTER TABLE `clg_adm_det`
  ADD PRIMARY KEY (`clg_id`);

--
-- Indexes for table `clg_page_details`
--
ALTER TABLE `clg_page_details`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `userdet`
--
ALTER TABLE `userdet`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`fb_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `u_reg_data`
--
ALTER TABLE `u_reg_data`
  ADD PRIMARY KEY (`u_adm_id`),
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_add_clg`
--
ALTER TABLE `admin_add_clg`
  MODIFY `clg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `applic_det`
--
ALTER TABLE `applic_det`
  MODIFY `aplic_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clg_adm_det`
--
ALTER TABLE `clg_adm_det`
  MODIFY `clg_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clg_page_details`
--
ALTER TABLE `clg_page_details`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `c_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `userdet`
--
ALTER TABLE `userdet`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_add_clg`
--
ALTER TABLE `admin_add_clg`
  ADD CONSTRAINT `admin_add_clg_ibfk_1` FOREIGN KEY (`clg_id`) REFERENCES `clg_adm_det` (`clg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applic_det`
--
ALTER TABLE `applic_det`
  ADD CONSTRAINT `applic_det_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userdet` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applic_det_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course_details` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applic_det_ibfk_3` FOREIGN KEY (`clg_id`) REFERENCES `admin_add_clg` (`clg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clg_page_details`
--
ALTER TABLE `clg_page_details`
  ADD CONSTRAINT `clg_page_details_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `admin_add_clg` (`clg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_details`
--
ALTER TABLE `course_details`
  ADD CONSTRAINT `course_details_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `admin_add_clg` (`clg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD CONSTRAINT `user_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userdet` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `u_reg_data`
--
ALTER TABLE `u_reg_data`
  ADD CONSTRAINT `u_reg_data_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `userdet` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
