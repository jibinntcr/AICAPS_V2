-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 07:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aicapsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id` int(11) NOT NULL,
  `paperId` varchar(100) NOT NULL,
  `paperName` varchar(100) NOT NULL,
  `autherName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `paperId`, `paperName`, `autherName`) VALUES
(1, 'ICA_2023_paper_8059', 'A Rule Based Secure Network System - Prevents\r\nLog4jshell and SSH Intrusions', 'M A Samid Arsalan1,S Suryaraman2, Mrs. Sujatha G3\r\n'),
(2, 'ICA_2023_paper_3321', 'Student performance prediction in e-learning system\r\nand evaluating effectiveness of online courses', 'Blessy Paul P, Dr.Cini Kurian'),
(3, 'ICA_2023_paper_1324', 'Gradient Enhanced Regressive Multivariate\r\nArtificial Fish Swarm Optimized Data\r\nCollection for IoT-', 'Sheeja Rani S, Reham Mostfa and Ahmed M. Khedr'),
(4, 'ICA_2023_paper_3034', 'Smart Irrigation management system for Precision Agriculture', 'D Venkata Sarath Chandra,Gagandeep Kaur,Mahua Bhattacharya'),
(5, 'ICA_2023_paper_5999', 'On  the Role  of  Encryption  in  Big  Data  Analytics over Cloud', 'Sangeeta Rani,, Vikram Singh, Kapil Kaswan\r\n'),
(6, 'ICA_2023_paper_1164', 'Covid-19 crowd detection and alert system usingage processing', 'Nitin Lodha and Harshvardhan Singh Gahlaut'),
(7, 'ICA_2023_paper_2995', 'Yatish Sekaran, Shubh Oswal, Sai Dileep Suvvari, Tanmoy Debnath and Taeesh Azal Assadi', 'Yatish Sekaran, Shubh Oswal, Sai Dileep Suvvari, Tanmoy Debnath and Taeesh Azal Assadi'),
(8, 'ICA_2023_paper_5208', 'Transformer based multimodal similarity search method for E-Commerce platforms', 'Chandan Charchit Sahoo, Yogesh Kumar Sharma and Deepak Singh Tomar'),
(9, 'ICA_2023_paper_1688', 'Guided Cost Learning for Lunar Lander\r\nEnvironment Using Human Demonstrated\r\nExpert Trajectories', 'Deepak Dharrao,Shilpa Gite,Rahee Walambe'),
(10, 'ICA_2023_paper_3519', 'Prediction of Autism and Dyslexia Using Machine Learning and Clinical Data Balancing', 'Swati Shilaskar, Shripad Bhatlawande, Harshal Dhande and Shivpriya Deshmukh'),
(11, 'ICA_2023_paper_4841', 'IoT Based Smart Irrigation and Farm Protection System', 'Swati Shilaskar, Shripad Bhatlawande, Jayesh Deshmukh and Shreya Dehankar'),
(12, 'ICA_2023_paper_710', 'Using ARIMA and LSTM to Implement Stock Market Analysis', 'Avinash Pandey, Gurneet Singh, Herjuno Hadiyudono Hadiyudono, Kolli Mourya and Mir Junaid Rasool Rasool'),
(13, 'ICA_2023_paper_5644', 'A Deep Learning based approach to stock market price prediction using technical indicators', 'Nirupama Parida, Bunil Kumar Balabantaray, Rajashree Nayak and Jitendra Kumar Rout'),
(14, 'ICA_2023_paper_1269', 'Pandemic Outbreak Time: Evaluation of Public Tweet Opinion by Machine Learning', 'Md Babul Islam, Swarna Hasibunnahar, Dr Piyush Kumar Shukla and Dr. Prashant Kumar Shukla'),
(15, 'ICA_2023_paper_3051', 'Machine Learning Based Patient Classification In Emergency Department', 'Mehanas Shahul and Pushpalatha K.P'),
(16, 'ICA_2023_paper_9793', 'Detecting Macro less and Anti-evasive Malware in Malspam Word Attachments Using Anergy Scoring Metho', 'Shyam Sundar Ramaswami and Dr. Gandharba Swain'),
(17, 'ICA_2023_paper_9964', 'E-dive:Underwater Fish Detection and Classification for Indian Waters', 'Kuldeep Vayadande'),
(18, 'ICA_2023_paper_1556', 'Malware Detection using Dynamic Analysis', 'V Anandhi, Varun G Menon, P Vinod and E R Abhijith Krishna\r\n'),
(19, 'ICA_2023_paper_1737', 'Patients’ Medical History Summarizer using NLP', 'Deepak Dharrao, Anupkumar Bongale, Vikrant Kadalaskar, Utkarsh Singh and Tathagata Singharoy'),
(20, 'ICA_2023_paper_2256', 'DEEP LEARNING VIRTUAL ASSISTANT FOR VISUALLY IMPAIRED PEOPLE', 'Kancherla Sai Haritha, Ravulapalli Girija and Nalluri Sunny'),
(21, 'ICA_2023_paper_3044', 'Evaluation of Dilated CNN for Hand Gestures Classification', 'Yasir Altaf and Abdul Wahid'),
(22, 'ICA_2023_paper_5520', 'An Optimal Differential Evolution Based XGB Classifier for IoMT malware classification', 'Dhanya L and Dr.Chitra R'),
(23, 'ICA_2023_paper_6033', 'Machine learning approaches to detect the discussion on Hacker forum.\r\n', 'Sindhya K Nambiar, Arundathi A, Anagha K J and Aromal Sujith'),
(24, 'ICA_2023_paper_6363', 'Diagnosis of Middle Ear Diseases using Deep Learning Paradigms', 'Devendra K. Tayal, Neha Srivastava and Urshi Singh'),
(25, 'ICA_2023_paper_7782', 'A New Clustering Approach based on Trust and\r\nRat Swarm Algorithm for WSN Applications', 'Walid Osamy, Ahmed Salim,Amel Al Ali');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `paperid` varchar(100) DEFAULT NULL,
  `paperTitle` varchar(100) DEFAULT NULL,
  `autherName` varchar(250) NOT NULL,
  `affiliation` varchar(250) NOT NULL,
  `PresentationMode` varchar(250) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `category` varchar(250) NOT NULL,
  `paymentStatus` tinyint(1) DEFAULT NULL,
  `registerStatus` varchar(10) DEFAULT NULL,
  `transactionId` varchar(250) NOT NULL,
  `receipt` varchar(250) NOT NULL,
  `cameraReadyPaper` varchar(250) NOT NULL,
  `FoodPreference` varchar(250) NOT NULL,
  `member_ship` varchar(500) DEFAULT NULL,
  `student_id` varchar(500) DEFAULT NULL,
  `createdTime` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedTime` datetime(6) NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `rate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(600) NOT NULL,
  `password` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userName`, `password`) VALUES
(1, 'jerrysabu', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'aicapadmin', '21577ba90593b9a69ed560d97ed3a3e9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
