-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 01:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bywho` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `description`, `post_date`, `bywho`) VALUES
(174, 'PKP FASA 4 LABUAN!', '	Congrats . boleh rentas negeri ~', '2021-10-18 22:08:51', 'Sadiq'),
(199, '#letstalkmindasihat', 'Bagi setiap kejadian bunuh diri, ramai ahli keluarga dan masyarakat yang terkesan dari segi emosi.\r\n\r\nDengarkan cerita mereka.\r\n\r\nBertindak segera, harapan terbina.', '2021-10-18 22:08:39', 'Sumail'),
(200, 'Fully digitalised 400-bed UMS hospital to be completed by 2023', 'KOTA KINABALU: Universiti Malaysia Sabah Hospital (HUMS) is expected to be completed by 2023.\r\n\r\nIts Vice Chancellor Professor Datuk Dr Taufiq Yap Yun Hin said it was the varsity\'s mission to complete the hospital as stated in the 12th Malaysia Plan on Monday.\r\n\r\nThe 400-bed building will have 22 operation theatres and 145 clinics.\r\n\r\n\"Among facilities available for the public are consultation services and treatment by specialists, 24-hour emergency and trauma centre, orthodontic services, pharmacy, diagnostic labs and radiology centre.\r\n\r\n\"This will definitely improve medical accessibility, especially in terms of specialist doctors in the state, thus helping to improve the level of better health in Sabah,\" he said in a statement.', '2021-10-18 21:17:53', 'EC'),
(201, 'UMS students happy, excited  ', 'KOTA KINABALU: Universiti Malaysia Sabah (UMS) students have expressed their happiness and excitement after they are allowed to return to their respective hometowns to celebrate the coming Hari Raya Aidilfitri with their families.\r\n\r\nMost of those met at the UMS Balik Raya Student Programme at the UMS parade ground, Saturday, were thankful to the Government, especially the Higher Education Ministry, for permitting the movement of the students.\r\n\r\nMohd Azman Amran said the opportunity to return to his hometown, let alone during the festive season, was indeed a moment to look forward to as he had missed his family the most.\r\n\r\n“I am very grateful because not everyone gets an opportunity like this to go home for Hari Raya and celebrate with their families. Of course, I miss my family in the village and to make lemang (glutinous rice cooked in bamboo) and ketupat (rice cake) with my mother in the backyard,” said the 21-year-old student who hails from Negeri Sembilan.\r\n\r\nAnother UMS student, Awg Azreezan Awg Kasim from Tawau, also did not expect that the students would be allowed to return to their hometown and described it as a golden opportunity for he had not met his family for some time.\r\n\r\n“Previously, we stayed on the campus and could not meet our families, so when we are allowed to return home, it will be a joyful event for us,” he said.\r\n\r\nBoth Mohd Azman and Awg Azreezan are among 2,000 UMS students expected to return to their hometowns in conjunction with the Hari Raya Aidilfitri celebration from May 7 to 12.\r\n\r\nMeanwhile, UMS Vice-Chancellor Datuk Taufiz Yap Yun Hin said the university had prepared various initiatives to ease the movement of the students, including providing rental buses and shuttle services that travel back and forth twice a day to the airport.\r\n\r\n“We also distribute face masks, hand sanitisers and food for students before all students return home,” he said, adding a total of 4,500 students have opted to remain on campus during the Hari Raya ', '2021-10-18 21:18:50', 'EC'),
(202, '2,000 UMS students start \'balik kampung\' journey', 'KOTA KINABALU: Some 2,000 Universiti Malaysia Sabah students are expected to return to their hometowns in conjunction with Raya Aidilfitri Aidilfitri.\r\n\"The students are expected to return to campus on May 15, which they have to inform us beforehand.\r\n\r\n\"Students who return to campus will not have to go through the quarantine procedure,\" he said when met by reporters, adding that returnees only need to maintain the standard operating procedures (SOP).\r\n\r\nHowever, for students returning from the Peninsula especially from areas under Movement Control Order, they will be required to undergo isolation for 10 days.', '2021-10-18 21:55:35', 'EC');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `applicationID` int(11) NOT NULL,
  `svProjectID` int(11) NOT NULL,
  `studID` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applicationID`, `svProjectID`, `studID`, `status`) VALUES
(16, 5, '123demo123', 'Pending'),
(18, 5, '321dem321', 'Pending'),
(19, 7, '1234b', 'Student 1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` int(11) NOT NULL,
  `CourseCode` varchar(4) NOT NULL,
  `CourseName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `CourseCode`, `CourseName`) VALUES
(1, 'HC12', 'Multimedia'),
(2, 'HC13', 'E-Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `disclaimer` varchar(20) DEFAULT NULL,
  `year` varchar(20) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `byWho` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `disclaimer`, `year`, `title`, `byWho`) VALUES
(1, 'Copyright ©', '2021/2022', 'FCI FINAL YEAR PROJECT MANAGEMENT SYSTEM', 'MUHAMMAD IBRAHIM BIN AZMI (BI18110099)');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `id` int(11) NOT NULL,
  `images` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`id`, `images`, `file`, `text`) VALUES
(34, '', '2f_FYPGuideline2021_15Mac2021.pdf', 'Thesis Dissertation: Submission and Writing Guideline'),
(35, '', 'FYP1PresentationGuideline_01Jun2020.pdf', 'FYP1 PresentationGuideline_01Jun2020'),
(36, '', 'FYP2PresentationGuideline_01Jun2020.pdf', 'FYP2 PresentationGuideline_01Jun2020'),
(37, '', '1c_FYP_Briefing_cohort_2018_LBN_19Jan2021_Updated.pdf', 'FYP Briefing Cohort 2018_LBN_19Jan2021_Updated'),
(73, 'poster.png', '', 'Poster - A3 format');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(11) NOT NULL,
  `lectID` varchar(50) NOT NULL,
  `programme` varchar(5) DEFAULT NULL,
  `lectName` varchar(100) DEFAULT NULL,
  `lectEmail` varchar(100) DEFAULT NULL,
  `lectPhone` varchar(100) DEFAULT NULL,
  `workload` int(20) DEFAULT 5,
  `workload_status` varchar(20) NOT NULL DEFAULT 'Ongoing',
  `code` mediumint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `lectID`, `programme`, `lectName`, `lectEmail`, `lectPhone`, `workload`, `workload_status`, `code`) VALUES
(5, 'MI23123', 'HC13', 'Zaidatol Haslinda', 'linda.Sani@ums.edu.my', '0123456789', 16, 'Full', 0),
(6, 'admin', 'HC13', 'EC', 'support@umskalfyp2.com', '135432', 5, 'Ongoing', 0),
(27, 'tgif123', 'HC13', 'HADZARIAH ISMAIL', 'had.ismail@ums.edu.my', '', 13, 'Ongoing', 0),
(28, 'M31234', 'HC12', 'NUR FARAHAH MOHD NAIM', 'faraha.naim@ums.edu.my', '', 5, 'Ongoing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `logID` int(11) NOT NULL,
  `Pid` int(11) DEFAULT NULL,
  `activities` varchar(100) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `svComment` varchar(500) DEFAULT NULL,
  `pType` varchar(20) DEFAULT NULL,
  `week` varchar(20) DEFAULT NULL,
  `logdate` date DEFAULT NULL,
  `stud1` varchar(20) DEFAULT NULL,
  `stud2` varchar(20) DEFAULT NULL,
  `stud3` varchar(20) DEFAULT NULL,
  `svid` varchar(20) DEFAULT NULL,
  `nextPlan` varchar(200) DEFAULT NULL,
  `byWho` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`logID`, `Pid`, `activities`, `comment`, `svComment`, `pType`, `week`, `logdate`, `stud1`, `stud2`, `stud3`, `svid`, `nextPlan`, `byWho`, `status`) VALUES
(1, 32, 'Proposal revision with supervisor.', 'Rethink the title. \r\nReconstruct abstract.\r\nRedo the problem statement. \r\nReconstruct objective according to the new problem statement.\r\nRead more journals/articles about techniques to develop the system.\r\nIllustrate a proper Gantt chart. \r\nRefer to Dr. Dinna for the proper reference format for the proposal.', 'demo', 'FYP 1', 'Week 1', '2021-03-26', 'BI18110099', NULL, NULL, 'MI23123', 'consultation', 'BI18110099', 1),
(2, 32, 'Proposal revision with supervisor.', '1.	Read and include more literature review about techniques and management system.\r\ni)	Interview/questionnaire\r\nii)	Propose low-fi prototype to coordinator.\r\niii)	Evaluate usability of low-fi prototype using expert evaluation.\r\n2.	List out potential questions for FYP coordinator\r\n3.	Relate problem statements with literature review\r\n4.	Try to fulfil objective one before May.\r\n5. try to comeup with something fressh\r\n6.youkendudis\r\n7.justdoit', '', 'FYP 1', 'Week 2', '2021-02-17', 'BI18110099', NULL, NULL, 'MI23123', 'no plan YET, later we think bout it ', 'BI18110099', 1),
(3, 32, 'Proposal revision with supervisor.', 'Rethink the title. \r\nReconstruct abstract.\r\nRedo the problem statement. \r\nReconstruct objective according to the new problem statement.\r\nRead more journals/articles about techniques to develop the system.\r\nIllustrate a proper Gantt chart. \r\nRefer to Dr. Dinna for the proper reference format for the proposal.', 'demo', 'FYP 1', 'Week 3', '2021-03-09', 'BI18110099', NULL, NULL, 'MI23123', 'CONSULT FOR FINAL PRESENT', 'BI18110099', 1),
(4, 59, 'Proposal revision with supervisor.', 'Rethink the title. \r\nReconstruct abstract.\r\nRedo the problem statement. \r\nReconstruct objective according to the new problem statement.\r\nRead more journals/articles about techniques to develop the system.\r\nIllustrate a proper Gantt chart. \r\nRefer to Dr. Dinna for the proper reference format for the proposal.', NULL, 'FYP 1', 'Week 1', '2021-03-26', 'BI18110241', NULL, NULL, 'MI23123', 'consultation', 'BI18110099', 1),
(5, 32, 'Proposal revision with supervisor.', 'Rethink the title. \r\nReconstruct abstract.\r\nRedo the problem statement. \r\nReconstruct objective according to the new problem statement.\r\nRead more journals/articles about techniques to develop the system.\r\nIllustrate a proper Gantt chart. \r\nRefer to Dr. Dinna for the proper reference format for the proposal.', NULL, 'FYP 1', 'Week 4', '2021-03-09', 'BI18110099', NULL, NULL, 'MI23123', 'CONSULT FOR FINAL PRESENT', 'BI18110099', 0),
(6, 32, 'Proposal revision with supervisor.', 'Rethink the title. \r\nReconstruct abstract.\r\nRedo the problem statement. \r\nReconstruct objective according to the new problem statement.\r\nRead more journals/articles about techniques to develop the system.\r\nIllustrate a proper Gantt chart. \r\nRefer to Dr. Dinna for the proper reference format for the proposal.', NULL, 'FYP 1', 'Week 5', '2021-03-09', 'BI18110099', NULL, NULL, 'MI23123', 'CONSULT FOR FINAL PRESENT', 'BI18110099', 0),
(7, 32, 'Proposal revision with supervisor.', 'Rethink the title. \r\nReconstruct abstract.\r\nRedo the problem statement. \r\nReconstruct objective according to the new problem statement.\r\nRead more journals/articles about techniques to develop the system.\r\nIllustrate a proper Gantt chart. \r\nRefer to Dr. Dinna for the proper reference format for the proposal.', NULL, 'FYP 1', 'Week 6', '2021-03-09', 'BI18110099', NULL, NULL, 'MI23123', 'CONSULT FOR FINAL PRESENT', 'BI18110099', 0),
(13, 60, 'test', 'test', NULL, 'FYP 1', 'Week 6', '2021-10-21', 'BI18110232', '', '', 'MI23123', 'test', 'BI18110232', 0),
(14, 32, 'test', 'test', 'demo', 'FYP 1', 'Week 12', '2021-10-22', 'BI18110099', '', '', 'MI23123', 'test', 'BI18110099', 1),
(15, 32, 'demo', 'demo', '', 'FYP 2', 'Week 7', '2021-11-24', 'BI18110099', '', '', 'MI23123', 'demo', 'BI18110099', 1),
(16, 0, '', '', NULL, 'FYP 1', 'Week 1', '2021-11-25', '', '', '', '', '', 'demo123', 0),
(17, 167, 'demo', 'demo', NULL, 'FYP 1', 'Week 7', '2021-11-25', 'demo123', '', '', 'admin', 'demo', 'demo123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `marking`
--

CREATE TABLE `marking` (
  `studID` varchar(20) NOT NULL,
  `fyp1SVreportW7` float DEFAULT NULL,
  `fyp1SVreportW14` float DEFAULT NULL,
  `fyp1SVprotoW14` float DEFAULT NULL,
  `fyp1SVlogW7` float DEFAULT NULL,
  `fyp1SVlogW14` float DEFAULT NULL,
  `fyp1EX1reportW14` float DEFAULT NULL,
  `fyp1EX1protoW14` float DEFAULT NULL,
  `fyp1EX1presentW7` float DEFAULT NULL,
  `fyp1EX1presentW14` float DEFAULT NULL,
  `fyp1EX2reportW14` float DEFAULT NULL,
  `fyp1EX2protoW14` float DEFAULT NULL,
  `fyp1EX2presentW7` float DEFAULT NULL,
  `fyp1EX2presentW14` float DEFAULT NULL,
  `fyp2SVreportW7` float DEFAULT NULL,
  `fyp2SVreportW14` float DEFAULT NULL,
  `fyp2SVimplementW7` float DEFAULT NULL,
  `fyp2SVimplementW14` float DEFAULT NULL,
  `fyp2SVlogW7` float DEFAULT NULL,
  `fyp2SVlogW14` float DEFAULT NULL,
  `fyp2SVposterW14` float DEFAULT NULL,
  `fyp2EX1reportW14` float DEFAULT NULL,
  `fyp2EX1demoW7` float DEFAULT NULL,
  `fyp2EX1demoW14` float DEFAULT NULL,
  `fyp2EX1presentW7` float DEFAULT NULL,
  `fyp2EX1presentW14` float DEFAULT NULL,
  `fyp2EX2reportW14` float DEFAULT NULL,
  `fyp2EX2demoW7` float DEFAULT NULL,
  `fyp2EX2demoW14` float DEFAULT NULL,
  `fyp2EX2presentW7` float DEFAULT NULL,
  `fyp2EX2presentW14` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marking`
--

INSERT INTO `marking` (`studID`, `fyp1SVreportW7`, `fyp1SVreportW14`, `fyp1SVprotoW14`, `fyp1SVlogW7`, `fyp1SVlogW14`, `fyp1EX1reportW14`, `fyp1EX1protoW14`, `fyp1EX1presentW7`, `fyp1EX1presentW14`, `fyp1EX2reportW14`, `fyp1EX2protoW14`, `fyp1EX2presentW7`, `fyp1EX2presentW14`, `fyp2SVreportW7`, `fyp2SVreportW14`, `fyp2SVimplementW7`, `fyp2SVimplementW14`, `fyp2SVlogW7`, `fyp2SVlogW14`, `fyp2SVposterW14`, `fyp2EX1reportW14`, `fyp2EX1demoW7`, `fyp2EX1demoW14`, `fyp2EX1presentW7`, `fyp2EX1presentW14`, `fyp2EX2reportW14`, `fyp2EX2demoW7`, `fyp2EX2demoW14`, `fyp2EX2presentW7`, `fyp2EX2presentW14`) VALUES
('BI18110083', 5, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('BI18110099', 10, 15, 5, 5, 5, 15, 5, 5, 5, 15, 5, 5, 5, 5, 10, 5, 10, 2.5, 2.5, 5, 10, 5, 10, 2.5, 2.5, 10, 5, 10, 2.5, 2.5),
('BI18160287', 5, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 2.5, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('BI18110206', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 0, 0, 0, 0),
('BI18110246', NULL, NULL, NULL, NULL, NULL, 10, 5, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
('BI18160304', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0),
('BI18110191', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0),
('BI18110142', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0),
('123demo123', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Pid` int(11) NOT NULL,
  `ProjectTitle` varchar(200) DEFAULT NULL,
  `stud1` varchar(20) DEFAULT NULL,
  `stud2` varchar(20) DEFAULT NULL,
  `stud3` varchar(20) DEFAULT NULL,
  `proposalFileWord` varchar(100) DEFAULT NULL,
  `fyp1FilePDF` varchar(100) DEFAULT NULL,
  `fyp1FileWord` varchar(100) DEFAULT NULL,
  `fyp2FilePDF` varchar(100) DEFAULT NULL,
  `fyp2FileWord` varchar(100) DEFAULT NULL,
  `poster` varchar(50) NOT NULL,
  `source_file` varchar(50) NOT NULL,
  `LastUpdateBy` varchar(100) DEFAULT NULL,
  `svid` varchar(20) DEFAULT NULL,
  `exid1` varchar(20) DEFAULT NULL,
  `exid2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Pid`, `ProjectTitle`, `stud1`, `stud2`, `stud3`, `proposalFileWord`, `fyp1FilePDF`, `fyp1FileWord`, `fyp2FilePDF`, `fyp2FileWord`, `poster`, `source_file`, `LastUpdateBy`, `svid`, `exid1`, `exid2`) VALUES
(32, 'FCI FYP MANAGEMENT SYSTEM USING USER CENTRED DEVELOPEMENT', 'BI18110099', '', NULL, 'FYP PROPOSAL_BI18110099.docx', 'FYP1_Report_MuhammadIbrahimBinAzmi_BI18110099.pdf', 'FYP1_Report_MuhammadIbrahimBinAzmi_BI18110099.docx', NULL, NULL, '', '', 'BI18110099', 'MI23123', '', 'M31234'),
(39, 'LANGUAGE DIGITAL : MANDARIN AND KOREAN LANGUAGE ONLINE LEARNING USING GAMIFICATION ELEMENTS\r\n', 'BI18110033', 'BI18110053', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110033', '', 'admin', ''),
(40, '3D ANIMATION TO INTRODUCE SABAH\r\n', 'BI18110042', 'BI18110048', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110042', '', NULL, NULL),
(41, 'FOOD JOURNAL MOBILE APP FOR DIET MONITORING AMONG OBESE YOUTH USING GAMIFICATION APPROACH\r\n', 'BI18110021', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110021', '', NULL, NULL),
(42, '3D ANIMATION VIRTUAL TOUR OF KELLIE\'S CASTLE\r\n', 'BI18110141', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110141', '', NULL, NULL),
(43, 'EDUCATIONAL APPLICATION QUIZ WITH GAMIFICATION ELEMENT \r\n', 'BI18110229', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110229', '', NULL, NULL),
(44, 'CIK SITI WAN KEMBANG: INTERACTIVE MARKER-BASED MOBILE AUGMENTED REALITY (MAR) KELANTANESE STORYTELLI', 'BI18110158', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110158', '', NULL, NULL),
(45, 'SMART-DENTAL APPS WITH GPS COORDINATE FUNCTIONALITY\r\n', 'BI18110273', 'BI18110177', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110273', '', NULL, NULL),
(46, 'EDUCATIONAL GAMES WITH LEARNING ANALYTIC APPROACH: MATHEMATIC YEAR 4\r\n', 'BI18110230', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110230', '', NULL, NULL),
(47, 'APPLYING GAMIFIED MOBILE APPLICATION TO PROMOTE TOURISM IN SABAH\r\n', 'BI18110246', 'BI18110034', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110246', '', 'MI23123', NULL),
(48, 'AUGMENTED REALITY (AR) ACCEPTANCE IN ART GALLERY\r\n', 'BI18110178', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110178', '', 'MI23123', NULL),
(49, 'SPROUT – A MOBILE APPLICATION FOR GARDENING\r\n', 'BI18110046', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110046', '', 'MI23123', NULL),
(50, 'A SELF-MONITORING READ-A-THON APPLICATION TO SUPPORT READING INTERVENTION AMONG CHILDREN\r\n', 'BI18110083', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110083', '', 'MI23123', NULL),
(51, 'RingSEN A DIGITAL EDUCATIONAL GAME FOR CHILDREN TO LEARN MONEY CONCEPTS\r\n', 'BI18160297', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18160297', '', 'MI23123', NULL),
(52, 'LEARNING PROGRAMMING CONCEPT FOR YOUNG CHILDREN USING AR APPLICATION\r\n', 'BI18110198', 'BI18110156', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110198', '', 'MI23123', NULL),
(53, 'PERSUASIVE LEARNING MANAGEMENT SYSTEM (PLMS) TO ENHANCED STUDENT LEARNING EXPERIENCE\r\n', 'BI18110257', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110257', '', 'MI23123', NULL),
(54, '\"KAAMATAN: TALE OF HARVEST\" STORYTELLING MOBILE APP WITH GAMIFICATION FOR YOUNG CHILDREN\r\n', 'BI18110191', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110191', '', '', 'M31234'),
(55, 'GAME-BASED LEARNING APP FOR PRESCHOOL CHILDREN LITERACY SKILL\r\n', 'BI18110013 ', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110013 ', '', NULL, NULL),
(56, 'LEARN PROGRAMMING CONCEPT PLATFORM FOR YOUNG CHILDREN USING MOBILE APPLICATION\r\n', 'BI18110054', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110054', '', NULL, NULL),
(57, 'APAI SALO: AN INTERACTIVE 2D ANIMTION IBAN STORYTELLING IN AUGMENTED REALITY (MARKED-BASED)\r\n', 'BI18160286', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18160286', '', NULL, NULL),
(58, 'ANTANOM : AN INTERACTIVE 2D ANIMATION MURUT STORYTELLING IN AUGMENTED REALITY (MARKER-BASED)\r\n', 'BI18110049 ', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110049 ', '', NULL, NULL),
(59, 'AN APP FOR MUTE DEAF CHILDREN AND DYSARTHRIA PATIENTS: A USER-CENTERED TEXT TO SPEECH TECHNOLOGY\r\n', 'BI18110241', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110241', 'MI23123', NULL, NULL),
(60, 'A DAY AT GAH, UMS: AUGMENTING THE MUSEUM EXPERIENCE\r\n', 'BI18110232', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110232', 'MI23123', NULL, NULL),
(61, 'A REWARD-BASED HOMEWORK APPLICATION TO ADDRESS THE MOTIVATION OF LEARNING AMONG THE CHILDREN\r\n', 'BI18110069', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110069', '', NULL, NULL),
(62, 'Fun Science- GAMIFICATION FOR LEARNING \r\n', 'BI18110089', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110089', '', NULL, NULL),
(63, 'BE GOOD: A REWARD-BASED POSITIVE BEHAVIOUR MOTIVATION APP FOR CHILDREN\r\n', 'BI18110234', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110234', '', NULL, NULL),
(64, 'LEARNING A CULTURAL HERITAGE USING MARKER-BASED AUGMENTED REALITY APPLICATIONS FOR YOUNG CHILDREN\r\n', 'BI18110162', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110162', '', NULL, NULL),
(65, 'SCIENCE VIRTUAL QUIZ: AN APPLICATION SYSTEM OF GENERAL SCIENCE KNOWLEDGE QUIZ WITH GAMIFICATION ELEM', 'BI18110105', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110105', '', NULL, NULL),
(66, '\"THE SAGE AND THE MOUSE\" AN INTERACTIVE AUGMENTED REALITY STORYTELLING MOBILE APP BASED ON IND*IAN F', 'BI18110251', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110251', '', NULL, NULL),
(67, 'THE INTEGRATION OF PERSUASIVE AND GAMIFICATION TECHNIQUES TO PROMOTE POSITIVE EMOTIONAL QUALITIES\r\n', 'BI18110150', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110150', '', NULL, NULL),
(68, 'TURNING YOUR LIFE TO A GAMELIKE SYSTEM\r\n', 'BI18110206', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110206', '', '', 'tgif123'),
(69, 'C-FIR A DIGITAL EDUCATIONAL GAME FOR CHILDREN TO LEARN MULTIPLICATION\r\n', 'BI18110020', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110020', '', '', 'tgif123'),
(70, 'ONLINE GROCERY SHOPPING SYSTEM USING GAMIFICATION ELEMENT\r\n', 'BI18160292', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18160292', '', '', 'tgif123'),
(71, 'MENTAL AWARENESS SELF-GUIDE WITH GAMIFICATION ELEMENT\r\n', 'BI18110218', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110218', '', '', 'tgif123'),
(72, 'E-AGRISHOP: AN E-COMMERCE MOBILE APPLICATION FOR LOCAL CROPS TRADING USING GAMIFICATION APPROACH\r\n', 'BI18110104', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110104', '', '', 'tgif123'),
(73, 'QUIZVIRTUAL: AN APPLICATION SYSTEM OF MALAYSIAN HISTORY QUIZ WITH GAMIFICATION ELEMENT\r\n', 'BI18110157', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110157', '', '', 'tgif123'),
(74, 'AN AUGMENTED REALITY APPLICATION FOR YOUNG CHILDREN TO LEARN ALPHABETS THROUGH PHONICS\r\n', 'BI18110231', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110231', '', NULL, NULL),
(75, 'APPLYING GAMIFIED MOBILE APPLICATION IN LEARNING MATHEMATICS FOR STANDARD 4 STUDENT\r\n', 'BI18110074', 'BI18160303', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110074', '', NULL, NULL),
(76, 'TRADITIONAL KADAZANDUSUN KULINTANGAN APP: PRESERVING CULTURE THROUGH MOBILE APPLICATION\r\n', 'BI18110059', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110059', '', NULL, NULL),
(77, 'INTERACTIVR CULTURAL FOLKLORE STORY BOOK (SI TANGGANG) THROUGH AUGMENTED REALITY\r\n', 'BI18160307', 'BI18110044', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18160307', '', NULL, NULL),
(79, 'BREATHE: A SELF-MONITORING APPLICATION TO ADDRESS THE PROBLEM OF MENTAL HEALTH AMONG UNIVERSITY STUDENTS USING USER-CENTERED DESIGN\r\n', 'BI18110205', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110205', 'MI23123', NULL, NULL),
(80, 'MENTAL HEALTH APPLICATION WITH GPS FUNCTIONALITY AND PHARMACY FEATURE\r\n', 'BI18110244', 'BI18110070', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110244', '', NULL, NULL),
(81, 'GENETIC ALGORITHM FOR COURSE TIMETABLING IN UMSKAL\r\n', 'BI18110170', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110170', '', NULL, NULL),
(82, 'GREAT DELUGE FOR COURSE TIMETABLING IN UMSKAL\r\n', 'BI18110201', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110201', '', NULL, NULL),
(83, 'CAKEREADY: ANALYTIC WEB BASED APPLICATION FOR CAKE ORDERING\r\n', 'BI18160287', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18160287', 'tgif123', '', ''),
(84, 'WEB BASED MUSLIM PRODUCT E-COMMERCE DEVELOPMENT WITH MODEL-BASED TESTING\r\n', 'BI18110252', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110252', '', NULL, NULL),
(85, 'ADOPTING B2C ONLINE GROCERY IN A NEW NORMS USING CHATBOT\r\n', 'BI18110028', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110028', '', NULL, NULL),
(86, 'E-HOMESTAY BOOKING SYSTEM\r\n', 'BI18110107', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110107', '', NULL, NULL),
(87, 'SIMULATED ANNEALING FOR COURSE TIMETABLING IN UMSKAL\r\n', 'BI18110253', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110253', '', NULL, NULL),
(88, 'ONLINE ORDERING MEDICINE SYSTEM WITH GAMIFICATION ELEMENT\r\n', 'BI18110087', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110087', 'tgif123', '', ''),
(89, 'PILL- ASSISTANCE MEDICINE REMINDER APP\r\n', 'BI18110249', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110249', 'tgif123', '', ''),
(90, 'ALUMNI MANAGEMENT SYSTEM WITH IMPLEMENTATION OF DESCRIPTIVE ANALYTICS.\r\n', 'BI18110039', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110039', '', NULL, NULL),
(91, 'E-PHARMACY MOBILE APPLICATION WITH GAMIFICATION FEATURES\r\n', 'BI18160284', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18160284', '', NULL, NULL),
(92, 'E-BAZAAR ORDER FOOD SYSTEM WITH GAMIFICATION ELEMENT\r\n', 'BI18110090', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110090', '', NULL, NULL),
(93, 'AUGMENTED REALITY OF ANDROID BASED PLANTS RECOGNITION USING MARKER BASED TRACKING METHODS\r\n', 'BI18110096', 'BI18110073', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110096', '', 'MI23123', NULL),
(94, 'E-COMMERCE MOBILE APPLICATION WITH THE ELEMENT OF GAMIFICATION FOR TAMU VENDORS (E-TAMU)\r\n', 'BI18110226', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110226', 'tgif123', '', ''),
(95, ' WEBSITE DEVELOPMENT AND MODEL BASED TESTING FOR KEREPEK MARI E-COMMERCE\r\n', 'BI18160298', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18160298', '', NULL, NULL),
(96, 'TOUCHBOT : A CHATBOT FOR AN E-COMMERCE ONLINE SHOPPING \r\n', 'BI18110060', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110060', '', NULL, NULL),
(97, 'FCI INDUSTRIAL TRAINING MANAGEMENT SYSTEM USING FEEDFORWARD TECHNIQUES\r\n', 'BI18110233', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110233', 'MI23123', NULL, NULL),
(98, 'FCI INDUSTRIAL TRAINING MANAGEMENT SYSTEM\r\n', 'BI18110221', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110221', '', NULL, NULL),
(99, 'APPLYING LEARNING ANALYTICS IN DEVELOPING EASY MATH LEARNING WEBSITE \r\n', 'BI18160304', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18160304', '', 'M31234', ''),
(100, 'Breast Cancer APP\r\n', 'BI18160285 ', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18160285 ', '', NULL, NULL),
(101, 'UMSKAL CAR RENTAL SYSTEM WITH GAMIFICATION ELEMENT \r\n', 'BI18110142', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110142', 'tgif123', '', ''),
(102, 'WEB-BASED HUMAN RESOURCES MANAGEMENT AND PERFORMANCE EVALUATION USING DESCRIPTIVE ANALYTICS\r\n', 'BI18110172', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110172', '', NULL, NULL),
(103, 'HALAL KOREAN FOODS AND RESTAURANTS WEB BASED FOR MUSLIM TRAVELLER IN SOUTH KOREA WITH VISUAL ANALYTICS\r\n', 'BI18110219', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110219', '', NULL, NULL),
(104, 'EMARKETPLACE FOR FARMING MANAGEMENT SYSTEM USING TWO FACTOR AUTHENTICATION (2FA)\r\n', 'BI18110180', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18110180', '', NULL, NULL),
(105, 'A WEB BASED  TRANSPORT RENTAL SYSTEM USING SCHEDULING IN UMSKAL\r\n', 'BI18160311', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'BI18160311', '', NULL, NULL),
(212, 'Emotion recognition software ', '123demo123', '321dem321', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `year` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `type`, `year`) VALUES
(1, 'FYP 2', '1-2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `studID` varchar(50) NOT NULL,
  `Pid` int(11) DEFAULT NULL,
  `programme` varchar(5) DEFAULT NULL,
  `studName` varchar(100) DEFAULT NULL,
  `studEmail` varchar(100) DEFAULT NULL,
  `studPhone` varchar(100) DEFAULT NULL,
  `studP1score` float DEFAULT 0,
  `studP2score` float DEFAULT 0,
  `studPhoto` varchar(200) DEFAULT NULL,
  `code` mediumint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studID`, `Pid`, `programme`, `studName`, `studEmail`, `studPhone`, `studP1score`, `studP2score`, `studPhoto`, `code`) VALUES
(1, 'BI18110099', 32, 'HC13', 'MUHAMMAD IBRAHIM BIN AZMI', 'BI18110099@student.ums.edu.my', '01118796926', 100, 100, 'ib.jpg', 0),
(2, 'BI18110048', 40, 'HC12 ', 'TAN SIN SIN', 'BI18110048@student.ums.edu.my', '', 0, 0, NULL, 0),
(3, 'BI18110042', 40, 'HC12 ', 'KARYN FERDINAND SITAIM', 'BI18110042@student.ums.edu.my', '', 0, 0, NULL, 0),
(4, 'BI18110021', 41, 'HC12 ', 'MUHAMMAD ZULQARNAIN BIN SHAHRIL', 'BI18110021@student.ums.edu.my', '', 0, 0, NULL, 0),
(5, 'BI18110141', 42, 'HC12 ', 'TNIOH KOCK THAI', 'BI18110141@student.ums.edu.my', '', 0, 0, NULL, 0),
(6, 'BI18110229', 43, 'HC12 ', 'SHARUL FAHMI BIN RUHIZAT', 'BI18110229@student.ums.edu.my', '', 0, 0, NULL, 0),
(7, 'BI18110158', 44, 'HC12 ', 'NIK NURSYAFIQAH BINTI LOKMAN', 'BI18110158@student.ums.edu.my', '', 0, 0, NULL, 0),
(8, 'BI18110273', 45, 'HC13 ', 'NOR FADIAH BINTI SHAMRIH', 'BI18110273@student.ums.edu.my', '', 0, 0, NULL, 0),
(9, 'BI18110177', 45, 'HC13 ', 'NAZIYAH BINTI ISA', 'BI18110177@student.ums.edu.my', '', 0, 0, NULL, 0),
(10, 'BI18110230', 46, 'HC12 ', 'MUHAMMAD FAKHRUL IMAN', 'BI18110230@student.ums.edu.my', '', 0, 0, NULL, 0),
(11, 'BI18110246', 47, 'HC13 ', 'MOHD SHAHRIL ANWAR BIN NORSAID', 'BI18110246@student.ums.edu.my', '', 0, 0, NULL, 0),
(12, 'BI18110034', 47, 'HC12 ', 'RUSSEL ROSMIN', 'BI18110034@student.ums.edu.my', '', 0, 0, NULL, 0),
(13, 'BI18110178', 48, 'HC12 ', 'LEE CHENG', 'BI18110178@student.ums.edu.my', '', 0, 0, NULL, 0),
(14, 'BI18110046', 49, 'HC12 ', 'MOHD MUNAWIR PUTTRA BIN ASMUWI', 'BI18110046@student.ums.edu.my', '', 0, 0, NULL, 0),
(15, 'BI18110083', 50, 'HC12 ', 'ABIGAYLE TIPUNG MATIUS', 'BI18110083@student.ums.edu.my', '', 85, 90, NULL, 0),
(16, 'BI18160297', 51, 'HC12 ', 'KHAIRUNNISSA BINTI ROSLIZAM', 'BI18160297@student.ums.edu.my', '', 0, 0, NULL, 0),
(17, 'BI18110198', 52, 'HC12 ', 'CHEN LI MIN', 'BI18110198@student.ums.edu.my', '', 0, 0, NULL, 0),
(18, 'BI18110156', 52, 'HC12 ', 'GOH SHIN SHIN', 'BI18110156@student.ums.edu.my', '', 0, 0, NULL, 0),
(19, 'BI18110257', 53, 'HC12 ', 'VOON MEI LUAN', 'BI18110257@student.ums.edu.my', '', 0, 0, NULL, 0),
(20, 'BI18110191', 54, 'HC12 ', 'MARLENE MARSHA', 'BI18110191@student.ums.edu.my', '', 0, 0, NULL, 0),
(21, 'BI18110013 ', 55, 'HC12 ', 'KHAIRUN AMIZA BINTI SHIM NORAMINE ', 'BI18110013@student.ums.edu.my', '', 0, 0, NULL, 0),
(22, 'BI18110054', 56, 'HC12 ', 'NURUL ARIFAH BINTI HALUDDIN', 'BI18110054@student.ums.edu.my', '', 0, 0, NULL, 0),
(23, 'BI18160286', 57, 'HC12 ', 'VELISYA SARAN BARAOK', 'BI18160286@student.ums.edu.my', '', 0, 0, NULL, 0),
(24, 'BI18110049 ', 58, 'HC12 ', 'CLOUDIA UKONG', 'BI18110049@student.ums.edu.my', '', 0, 0, NULL, 0),
(25, 'BI18110241', 59, 'HC12 ', 'SITI HAJAR BINTI MOHD ALI', 'BI18110241@student.ums.edu.my', '', 0, 0, NULL, 0),
(26, 'BI18110232', 60, 'HC12 ', 'ARNIE NASUHA BINTI MOHD ARMAN', 'BI18110232@student.ums.edu.my', '', 70, 50, NULL, 0),
(27, 'BI18110069', 61, 'HC12 ', 'SURIANA BINTI TAWASIL', 'BI18110069@student.ums.edu.my', '', 0, 0, NULL, 0),
(28, 'BI18110089', 62, 'HC13 ', 'NURFADHILAH AZMAN', 'BI18110089@student.ums.edu.my', '', 0, 0, NULL, 0),
(29, 'BI18110234', 63, 'HC12 ', 'LEE XIN YI', 'BI18110234@student.ums.edu.my', '', 0, 0, NULL, 0),
(30, 'BI18110162', 64, 'HC12 ', 'NURUL IZNI NADIRAH BINTI AMINUDDIN', 'BI18110162@student.ums.edu.my', '', 0, 0, NULL, 0),
(31, 'BI18110105', 65, 'HC12 ', 'NUR ELLIKA BINTI ALI HATTA', 'BI18110105@student.ums.edu.my', '', 0, 0, NULL, 0),
(32, 'BI18110251', 66, 'HC12 ', 'NIVASHINIE MURTHY', 'BI18110251@student.ums.edu.my', '', 0, 0, NULL, 0),
(33, 'BI18110150', 67, 'HC12 ', 'LIU YING QIAN', 'BI18110150@student.ums.edu.my', '', 0, 0, NULL, 0),
(34, 'BI18110206', 68, 'HC12 ', 'NATHANEAL MICHAEL BONAVENTURE', 'BI18110206@student.ums.edu.my', '', 0, 0, NULL, 0),
(35, 'BI18110020', 69, 'HC12 ', 'LINA INSYIRAH BINTI KAMAL', 'BI18110020@student.ums.edu.my', '', 0, 0, NULL, 0),
(36, 'BI18160292', 70, 'HC13 ', 'LIM CHEW SHEN', 'BI18160292@student.ums.edu.my', '', 0, 0, NULL, 0),
(37, 'BI18110218', 71, 'HC12 ', 'MAIZHATUL EZLIENA BINTI MAHADI', 'BI18110218@student.ums.edu.my', '', 0, 0, NULL, 0),
(38, 'BI18110104', 72, 'HC13 ', 'SUSSAN ANAK MENGGAT', 'BI18110104@student.ums.edu.my', '', 0, 0, NULL, 0),
(39, 'BI18110157', 73, 'HC12 ', 'NUR NADHIRA NATASHA BINTI MOHD FIRDAUS', 'BI18110157@student.ums.edu.my', '', 0, 0, NULL, 0),
(40, 'BI18110231', 74, 'HC12 ', 'CHANG KHAI JIET', 'BI18110231@student.ums.edu.my', '', 0, 0, NULL, 0),
(41, 'BI18110074', 75, 'HC13 ', 'SUMAYYAH BINTI SUTIJO', 'BI18110074@student.ums.edu.my', '', 0, 0, NULL, 0),
(42, 'BI18160303', 75, 'HC13 ', 'NUR HAFIZAH BINTI INBRAIN@EMRAN', 'BI18160303@student.ums.edu.my', '', 0, 0, NULL, 0),
(43, 'BI18110059', 76, 'HC12 ', 'JEGATHISAN A/L SIVANESAN', 'BI18110059@student.ums.edu.my', '', 0, 0, NULL, 0),
(44, 'BI18160307', 77, 'HC12 ', 'MUHAMMAD IZZAT BIN MOHD SAFIAN', 'BI18160307@student.ums.edu.my', '', 0, 0, NULL, 0),
(45, 'BI18110044', 77, 'HC12 ', 'MOHD AMIR HAMZAH BIN MOHD GASING', 'BI18110044@student.ums.edu.my', '', 0, 0, NULL, 0),
(46, 'BI18110205', 79, 'HC12 ', 'TRACY NG QI QI', 'BI18110205@student.ums.edu.my', '', 0, 0, NULL, 0),
(47, 'BI18110244', 80, 'HC13 ', 'NURUL SYAHFIQA NATASYAH BINTI SADY', 'BI18110244@student.ums.edu.my', '', 0, 0, NULL, 0),
(48, 'BI18110070', 80, 'HC12 ', 'AZERA DINSIN', 'BI18110070@student.ums.edu.my', '', 0, 0, NULL, 0),
(49, 'BI18110170', 81, 'HC13 ', 'WONG CHEE HUNG', 'BI18110170@student.ums.edu.my', '', 70, 50, NULL, 0),
(50, 'BI18110201', 82, 'HC13 ', 'LOKE ZI XUAN', 'BI18110201@student.ums.edu.my', '', 0, 0, NULL, 0),
(51, 'BI18160287', 83, 'HC13 ', 'SYASYA IZZATI BINTI MOHAMAD FAUZI', 'BI18160287@student.ums.edu.my', '', 0, 0, NULL, 0),
(52, 'BI18110252', 84, 'HC13 ', 'NUR SHADA NADHERAH BINTI ABDUL GHANI', 'BI18110252@student.ums.edu.my', '', 0, 0, NULL, 0),
(53, 'BI18110028', 85, 'HC13 ', 'MOHD FARUQ BIN GULAM RABANI', 'BI18110028@student.ums.edu.my', '', 0, 0, NULL, 0),
(54, 'BI18110107', 86, 'HC13 ', 'NUR SYAFIQAH BINTI ARBANI', 'BI18110107@student.ums.edu.my', '', 0, 0, NULL, 0),
(55, 'BI18110253', 87, 'HC13 ', 'LEONG CHEE SENG', 'BI18110253@student.ums.edu.my', '', 0, 0, NULL, 0),
(56, 'BI18110087', 88, 'HC13 ', 'SITI KHADIJAH BINTI ABDUL KADARI', 'BI18110087@student.ums.edu.my', '', 0, 0, NULL, 0),
(57, 'BI18110249', 89, 'HC12 ', 'THINESH VARMA A/L SIVAKKUMAR', 'BI18110249@student.ums.edu.my', '', 0, 0, NULL, 0),
(58, 'BI18110039', 90, 'HC13 ', 'MASLINA BINTI SARADIL', 'BI18110039@student.ums.edu.my', '', 0, 0, NULL, 0),
(59, 'BI18160284', 91, 'HC13 ', 'NAOMIE RINA NAWAN', 'BI18160284@student.ums.edu.my', '', 0, 0, NULL, 0),
(60, 'BI18110090', 92, 'HC13 ', 'SITI NURHAFIZA BINTI JAFREY', 'BI18110090@student.ums.edu.my', '', 0, 0, NULL, 0),
(61, 'BI18110096', 93, 'HC12 ', 'MUHAMMAD HAFIZ BIN JAMALI', 'BI18110096@student.ums.edu.my', '', 0, 0, NULL, 0),
(62, 'BI18110073', 93, 'HC12 ', 'MOHAMAD FARHAN BIN SAMSULBAHRI', 'BI18110073@student.ums.edu.my', '', 0, 0, NULL, 0),
(63, 'BI18110226', 94, 'HC13 ', 'MADELEINE UYO ', 'BI18110226@student.ums.edu.my', '', 0, 0, NULL, 0),
(64, 'BI18160298', 95, 'HC13 ', 'SITI AISYAH BINTI ABU BAKAR', 'BI18160298@student.ums.edu.my', '', 0, 0, NULL, 0),
(65, 'BI18110060', 96, 'HC13 ', 'NURUL FARAHIDA BINTI ABDUL JALIL', 'BI18110060@student.ums.edu.my', '', 0, 0, NULL, 0),
(66, 'BI18110233', 97, 'HC12 ', 'YAP WEN WEI', 'BI18110233@student.ums.edu.my', '', 90, 90, NULL, 0),
(67, 'BI18110221', 98, 'HC12 ', 'LIM JIAN ZHONG', 'BI18110221@student.ums.edu.my', '', 0, 0, NULL, 0),
(68, 'BI18160304', 99, 'HC13 ', 'NURUL ATIQAH BINTI HALUDDIN ', 'BI18160304@student.ums.edu.my', '', 0, 0, NULL, 0),
(69, 'BI18160285 ', 100, 'HC12 ', 'PRIYAMUNIAYA ', 'BI18160285@student.ums.edu.my', '', 0, 0, NULL, 0),
(70, 'BI18110142', 101, 'HC13 ', 'LEONG HO YAN', 'BI18110142@student.ums.edu.my', '', 0, 0, NULL, 0),
(71, 'BI18110033', 39, 'HC13 ', 'TIMOTHY CHOK CHUN KHEE', 'BI18110033@student.ums.edu.my', '', 0, 0, NULL, 166073),
(72, 'BI18110053', 39, 'HC13 ', 'MOHD FIRDAUS BIN MOHD HANAPIAH', 'BI18110053@student.ums.edu.my', '', 0, 0, NULL, 0),
(73, 'BI18110172', 102, 'HC12 ', 'NURFAUZIAH BINTI LILIT SUHENDER', 'BI18110172@student.ums.edu.my', '', 0, 0, NULL, 0),
(74, 'BI18110219', 103, 'HC12 ', 'NURSHAFINAH BINTI HAIRI HISHAM', 'BI18110219@student.ums.edu.my', '', 0, 0, NULL, 0),
(75, 'BI18110180', 104, 'HC12 ', 'WELLEANA WELLTY ANAK WILLIAM', 'BI18110180@student.ums.edu.my', '', 0, 0, NULL, 0),
(76, 'BI18160311', 105, 'HC13 ', 'HAIRI IWAWAN OKTOBRIADI BIN SUDIRMAN', 'BI18160311@student.ums.edu.my', '', 0, 0, NULL, 0),
(81, '123demo123', NULL, 'HC12 ', '123demo123', '123@demo.com', '3123', 0, 0, NULL, 0),
(82, '321dem321', NULL, 'HC12 ', 'Siakap Keli', '', '', 0, 0, NULL, 0),
(83, 'kk123kk', NULL, 'HC12 ', 'Siapa ', 'dsa@gmail.com', '', 0, 0, NULL, 0),
(84, '1234b', NULL, 'HC12 ', 'hehe', '', '', 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `svproject`
--

CREATE TABLE `svproject` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `requirement` varchar(500) DEFAULT NULL,
  `svid` varchar(25) DEFAULT NULL,
  `stud1` varchar(20) DEFAULT NULL,
  `stud2` varchar(20) DEFAULT NULL,
  `stud3` varchar(20) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending',
  `total_applicant` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `svproject`
--

INSERT INTO `svproject` (`id`, `title`, `description`, `type`, `requirement`, `svid`, `stud1`, `stud2`, `stud3`, `status`, `total_applicant`) VALUES
(3, 'demo', 'demo', 'demo', 'demo	', 'admin', '123demo123', NULL, NULL, 'Approve', 3),
(4, 'demooo', 'demo', 'demo', 'demoooo	', 'admin', NULL, NULL, NULL, 'Decline', 3),
(5, 'Emotion recognition software ', 'In this project, you will develop an emotion recognition system with integrated audio input. It is a simple yet practical final year project for students to build their real-world skills. ', 'Machine Learning ', 'Requirement:\r\n-Python \r\n-Support Vector Machine, \r\n-RNN algorithm, \r\n-Convolutional Neural Network\r\n', 'admin', '123demo123', '321dem321', NULL, 'Done', 2),
(6, '123', 'Demo', 'Demo', 'AR\r\nSQL', 'admin', NULL, NULL, NULL, 'Pending', 10),
(7, 'Covid-19 Contact Tracing System Web App with QR Code Scanning using PHP', 'This project was inspired by the LGU\'s Contact Tracking System here in the Philippines. The Contact Tracing System logs all individuals that are visiting a certain establishment. The system has 2 sides of the user interface which are the Admin Panel and the Establishments Log\'s Side.', 'Web App', 'discuss later', 'M31234', '1234b', NULL, NULL, 'Approve', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `password`, `role`) VALUES
('1234b', '1234b', 'student'),
('123demo123', '123demo123', 'student'),
('321dem321', '321dem321', 'student'),
('admin', '123', 'admin'),
('BI18110013 ', 'BI18110013 ', 'student'),
('BI18110020', 'BI18110020', 'student'),
('BI18110021', 'BI18110021', 'student'),
('BI18110028', 'BI18110028', 'student'),
('BI18110033', 'BI18110033', 'student'),
('BI18110034', 'BI18110034', 'student'),
('BI18110039', 'BI18110039', 'student'),
('BI18110042', 'BI18110042', 'student'),
('BI18110044', 'BI18110044', 'student'),
('BI18110046', 'BI18110046', 'student'),
('BI18110048', 'BI18110048', 'student'),
('BI18110049 ', 'BI18110049 ', 'student'),
('BI18110053', 'BI18110053', 'student'),
('BI18110054', 'BI18110054', 'student'),
('BI18110059', 'BI18110059', 'student'),
('BI18110060', 'BI18110060', 'student'),
('BI18110069', 'BI18110069', 'student'),
('BI18110070', 'BI18110070', 'student'),
('BI18110073', 'BI18110073', 'student'),
('BI18110074', 'BI18110074', 'student'),
('BI18110083', 'BI18110083', 'student'),
('BI18110087', 'BI18110087', 'student'),
('BI18110089', 'BI18110089', 'student'),
('BI18110090', 'BI18110090', 'student'),
('BI18110096', 'BI18110096', 'student'),
('BI18110099', '123', 'student'),
('BI18110104', 'BI18110104', 'student'),
('BI18110105', 'BI18110105', 'student'),
('BI18110107', 'BI18110107', 'student'),
('BI18110141', 'BI18110141', 'student'),
('BI18110142', 'BI18110142', 'student'),
('BI18110150', 'BI18110150', 'student'),
('BI18110156', 'BI18110156', 'student'),
('BI18110157', 'BI18110157', 'student'),
('BI18110158', 'BI18110158', 'student'),
('BI18110162', 'BI18110162', 'student'),
('BI18110170', 'BI18110170', 'student'),
('BI18110172', 'BI18110172', 'student'),
('BI18110177', 'BI18110177', 'student'),
('BI18110178', 'BI18110178', 'student'),
('BI18110180', 'BI18110180', 'student'),
('BI18110191', 'BI18110191', 'student'),
('BI18110198', 'BI18110198', 'student'),
('BI18110201', 'BI18110201', 'student'),
('BI18110205', 'BI18110205', 'student'),
('BI18110206', 'BI18110206', 'student'),
('BI18110218', 'BI18110218', 'student'),
('BI18110219', 'BI18110219', 'student'),
('BI18110221', 'BI18110221', 'student'),
('BI18110226', 'BI18110226', 'student'),
('BI18110229', 'BI18110229', 'student'),
('BI18110230', 'BI18110230', 'student'),
('BI18110231', 'BI18110231', 'student'),
('BI18110232', 'BI18110232', 'student'),
('BI18110233', 'BI18110233', 'student'),
('BI18110234', 'BI18110234', 'student'),
('BI18110241', 'BI18110241', 'student'),
('BI18110244', 'BI18110244', 'student'),
('BI18110246', 'BI18110246', 'student'),
('BI18110249', 'BI18110249', 'student'),
('BI18110251', 'BI18110251', 'student'),
('BI18110252', 'BI18110252', 'student'),
('BI18110253', 'BI18110253', 'student'),
('BI18110257', 'BI18110257', 'student'),
('BI18110273', 'BI18110273', 'student'),
('BI18160284', 'BI18160284', 'student'),
('BI18160285 ', 'BI18160285 ', 'student'),
('BI18160286', 'BI18160286', 'student'),
('BI18160287', 'BI18160287', 'student'),
('BI18160292', 'BI18160292', 'student'),
('BI18160297', 'BI18160297', 'student'),
('BI18160298', 'BI18160298', 'student'),
('BI18160303', 'BI18160303', 'student'),
('BI18160304', 'BI18160304', 'student'),
('BI18160307', 'BI18160307', 'student'),
('BI18160311', 'BI18160311', 'student'),
('kk123kk', 'kk123kk', 'student'),
('M31234', 'M31234', 'admin'),
('MI23123', 'MI23123', 'lecturer'),
('tgif123', 'tgif123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`applicationID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `lectID` (`lectID`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `svproject`
--
ALTER TABLE `svproject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `applicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `svproject`
--
ALTER TABLE `svproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
