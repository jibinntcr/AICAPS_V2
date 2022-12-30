-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 11:05 AM
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
  `lastID` int(10) NOT NULL,
  `paperId` varchar(100) NOT NULL,
  `paperName` varchar(250) NOT NULL,
  `autherName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `lastID`, `paperId`, `paperName`, `autherName`) VALUES
(1, 8059, 'ICA_2023_paper_8059', 'A Rule Based Secure Network System - Prevents\r\nLog4jshell and SSH Intrusions', 'M A Samid Arsalan1,S Suryaraman2, Mrs. Sujatha G3\r\n'),
(2, 3321, 'ICA_2023_paper_3321', 'Student performance prediction in e-learning system\r\nand evaluating effectiveness of online courses', 'Blessy Paul P, Dr.Cini Kurian'),
(3, 1324, 'ICA_2023_paper_1324', 'Gradient Enhanced Regressive Multivariate\r\nArtificial Fish Swarm Optimized Data\r\nCollection for IoT-', 'Sheeja Rani S, Reham Mostfa and Ahmed M. Khedr'),
(4, 3034, 'ICA_2023_paper_3034', 'Smart Irrigation management system for Precision Agriculture', 'D Venkata Sarath Chandra,Gagandeep Kaur,Mahua Bhattacharya'),
(5, 5999, 'ICA_2023_paper_5999', 'On  the Role  of  Encryption  in  Big  Data  Analytics over Cloud', 'Sangeeta Rani,, Vikram Singh, Kapil Kaswan\r\n'),
(6, 1164, 'ICA_2023_paper_1164', 'Covid-19 crowd detection and alert system usingage processing', 'Nitin Lodha and Harshvardhan Singh Gahlaut'),
(7, 2995, 'ICA_2023_paper_2995', 'Yatish Sekaran, Shubh Oswal, Sai Dileep Suvvari, Tanmoy Debnath and Taeesh Azal Assadi', 'Yatish Sekaran, Shubh Oswal, Sai Dileep Suvvari, Tanmoy Debnath and Taeesh Azal Assadi'),
(8, 5208, 'ICA_2023_paper_5208', 'Transformer based multimodal similarity search method for E-Commerce platforms', 'Chandan Charchit Sahoo, Yogesh Kumar Sharma and Deepak Singh Tomar'),
(9, 1688, 'ICA_2023_paper_1688', 'Guided Cost Learning for Lunar Lander\r\nEnvironment Using Human Demonstrated\r\nExpert Trajectories', 'Deepak Dharrao,Shilpa Gite,Rahee Walambe'),
(10, 3519, 'ICA_2023_paper_3519', 'Prediction of Autism and Dyslexia Using Machine Learning and Clinical Data Balancing', 'Swati Shilaskar, Shripad Bhatlawande, Harshal Dhande and Shivpriya Deshmukh'),
(11, 4841, 'ICA_2023_paper_4841', 'IoT Based Smart Irrigation and Farm Protection System', 'Swati Shilaskar, Shripad Bhatlawande, Jayesh Deshmukh and Shreya Dehankar'),
(12, 710, 'ICA_2023_paper_710', 'Using ARIMA and LSTM to Implement Stock Market Analysis', 'Avinash Pandey, Gurneet Singh, Herjuno Hadiyudono Hadiyudono, Kolli Mourya and Mir Junaid Rasool Rasool'),
(13, 5644, 'ICA_2023_paper_5644', 'A Deep Learning based approach to stock market price prediction using technical indicators', 'Nirupama Parida, Bunil Kumar Balabantaray, Rajashree Nayak and Jitendra Kumar Rout'),
(14, 1269, 'ICA_2023_paper_1269', 'Pandemic Outbreak Time: Evaluation of Public Tweet Opinion by Machine Learning', 'Md Babul Islam, Swarna Hasibunnahar, Dr Piyush Kumar Shukla and Dr. Prashant Kumar Shukla'),
(15, 3051, 'ICA_2023_paper_3051', 'Machine Learning Based Patient Classification In Emergency Department', 'Mehanas Shahul and Pushpalatha K.P'),
(16, 9793, 'ICA_2023_paper_9793', 'Detecting Macro less and Anti-evasive Malware in Malspam Word Attachments Using Anergy Scoring Metho', 'Shyam Sundar Ramaswami and Dr. Gandharba Swain'),
(17, 9964, 'ICA_2023_paper_9964', 'E-dive:Underwater Fish Detection and Classification for Indian Waters', 'Kuldeep Vayadande'),
(18, 1556, 'ICA_2023_paper_1556', 'Malware Detection using Dynamic Analysis', 'V Anandhi, Varun G Menon, P Vinod and E R Abhijith Krishna\r\n'),
(19, 1737, 'ICA_2023_paper_1737', 'Patients’ Medical History Summarizer using NLP', 'Deepak Dharrao, Anupkumar Bongale, Vikrant Kadalaskar, Utkarsh Singh and Tathagata Singharoy'),
(20, 2256, 'ICA_2023_paper_2256', 'DEEP LEARNING VIRTUAL ASSISTANT FOR VISUALLY IMPAIRED PEOPLE', 'Kancherla Sai Haritha, Ravulapalli Girija and Nalluri Sunny'),
(21, 3044, 'ICA_2023_paper_3044', 'Evaluation of Dilated CNN for Hand Gestures Classification', 'Yasir Altaf and Abdul Wahid'),
(22, 5520, 'ICA_2023_paper_5520', 'An Optimal Differential Evolution Based XGB Classifier for IoMT malware classification', 'Dhanya L and Dr.Chitra R'),
(23, 6033, 'ICA_2023_paper_6033', 'Machine learning approaches to detect the discussion on Hacker forum.\r\n', 'Sindhya K Nambiar, Arundathi A, Anagha K J and Aromal Sujith'),
(24, 6363, 'ICA_2023_paper_6363', 'Diagnosis of Middle Ear Diseases using Deep Learning Paradigms', 'Devendra K. Tayal, Neha Srivastava and Urshi Singh'),
(25, 7782, 'ICA_2023_paper_7782', 'A New Clustering Approach based on Trust and\r\nRat Swarm Algorithm for WSN Applications', 'Walid Osamy, Ahmed Salim,Amel Al Ali'),
(26, 2135, 'ICA_2023_paper_2135', 'Intelligent Papilledema Detector (IPD)', 'Priya Thiagarajan and Suguna M'),
(27, 8481, 'ICA_2023_paper_8481', 'Automatic feedback captions for eye-tracker based online assessment', 'Ujjwal Kumar, Amudha Joseph and Chandrika K R'),
(28, 9026, 'ICA_2023_paper_9026', 'AI Powered Screening Aid for Dyslexic Children in Tamil', 'Dr. Banumathi K, Dr. Sudhasadasivam G, Dr Banurekha B and Vaishnavi K'),
(29, 3713, 'ICA_2023_paper_3713', 'Hierarchical vision transformer model for polyp segmentation', 'S Geetha, C Gopakumar and Vishnu Vinod'),
(30, 1288, 'ICA_2023_paper_1288', 'Time Series Analysis and Forecasting of Air Quality in India', 'Vanshay Gupta, Samit Kapadia and Chetashri Bhadane'),
(31, 6505, 'ICA_2023_paper_6505', 'VR for automobile customization and its feedback analysis', 'Premanand Ghadekar, Khushi Jhanwar, Ameya Karpe, Tanishka Shetty, Akash Sivanandan and Prannay Khushalani'),
(32, 6100, 'ICA_2023_paper_6100', 'A Semi-Supervised GAN Architecture for Video Classification', 'Dr. Premanand Ghadekar, Dhruva Khanwelkar, Nirvisha Soni, Harsh More, Juhi Rajani and Chirag Vaswani'),
(33, 3399, 'ICA_2023_paper_3399', 'Blockchain based Secure Erlang Server for Request based Group Communication over XMPP', 'Johnpaul C I, Manojkumar Vivekanandan, Praveen Kumar Premkamal and Ramya R'),
(34, 6691, 'ICA_2023_paper_6691', 'Reducing The Effects of DDos Attacks in Software Defined Networks Using Cloud Computing', 'Radha K and Dr.Parameswari R'),
(35, 5597, 'ICA_2023_paper_5597', 'Identification of Tuberculosis Bacilli from Bright Field Microscopic Sputum Smear Images using UNet and Random Forest Classification Algorithm', 'Greeshma K and Vishnukumar S'),
(36, 5939, 'ICA_2023_paper_5939', 'DeepHyperv: A deep neural network based virtual memory analysis for malware detection at hypervisor-layer', 'Avantika Gaur, Arjun Singh, Gaurav Kothari, Aditya Nautiyal, Aman Jha and Preeti Mishra'),
(37, 4058, 'ICA_2023_paper_4058', 'Multi-Label Classification On Aerial Images Using Deep Learning Techniques', 'Jonnadula Jayasree, Angaluri Venu Madhavi and Guttikonda Geetha'),
(38, 7550, 'ICA_2023_paper_7550', 'Unsupervised Domain Adaptation Approaches for ASR Development of Languages with Limited Resources', 'Shambhu Sharan, Dr. Amita Dev and Dr. Poonam Bansal'),
(39, 6427, 'ICA_2023_paper_6427', 'Feature Selection using Generalized Linear Model for Machine Learning-based Sepsis Prediction', 'Mohammed Ashikur Rahman'),
(40, 153, 'ICA_2023_paper_153', 'Feature Selection Using Enhanced Nature Optimization Technique', 'Devendra K. Tayal, Neha Sirvastava and Neha Rana'),
(41, 7916, 'ICA_2023_paper_7916', 'IoT Based Smart Sensor Data : Occupancy Detection with Machine Learning and Deep Learning Methods', 'Md Babul Islam, Khandaker Sajidul Islam, Swarna Hasibunnahar, Dr. Piyush Kumar Shukla and Dr Prashant Kumar Shukla'),
(42, 8739, 'ICA_2023_paper_8739', 'Wind profiler Doppler power spectrum segmentation using U-Net', 'Baazil P. Thampy, Judy M. V. and Ajil Kottayil'),
(43, 432, 'ICA_2023_paper_432', 'Detection of Brain Tumor Using Image Processing Techniques', 'Chandini Nekkanti, Venkata Ratna Prabha K, Ravikiran Gujjarlapudi and Sravya Ravi'),
(44, 307, 'ICA_2023_paper_307', 'Stiffness Analysis for the Prediction of Fake News through Online Digital Networks in India', 'Sreeraag G and Shynu P G'),
(45, 986, 'ICA_2023_paper_986', 'A Sentiment Analysis based Intelligent System for Summarizing the Feedback of Educational Institutions', 'Sai Naveen Katla, Nikhila Korivi and Manikandan V M'),
(46, 448, 'ICA_2023_paper_448', 'Kidney Disease Detection from CT Images using a customized CNN model and Deep Learning', 'Mohammad Sakib Hossain, S.M. Nazmul Hassan, Mohammad Al-Amin, Md. Nakib Rahaman, Rakib Hossain and Muhammad Iqbal Hossain'),
(48, 3923, 'ICA_2023_paper_3923', 'Enhancing Immersive User Experience Quality of StudoBot Telepresence Robots with Reinforcement Learning', 'Rajanikanth N. Kashi, Mohammed Sait and Sumukh Kashi.'),
(49, 6177, 'ICA_2023_paper_6177', '\"Deep Learning-Based Brain Tumor Classification Prototype Using Transfer Learning\r\n\"', 'Binju Saju, Fredy Varghese, Laiby Thomas and Arpana Prasad. '),
(50, 3127, 'ICA_2023_paper_3127', 'Kidney Stone Detection from CT images using Probabilistic Neural Network(PNN) and Watershed Algorithm', 'Sabitha Rani, Malu G and Elizabeth Sherly'),
(51, 8253, 'ICA_2023_paper_8253', 'Statistical Modelling of Massive MIMO Channel at FR2 Frequency Bands for B5G Networks', 'Sharini D L, Ravilla Dilli and Kanthi M'),
(52, 5334, 'ICA_2023_paper_5334', 'Measuring the Effectiveness of LDA-Based Clustering for Social Media Data', 'Aysha Khan and Rashid Ali'),
(53, 8212, 'ICA_2023_paper_8212', 'CapDC: A new capuchin search based algorithm for efficient data collection in Wireless Sensor Networks', 'Pavija Raj and Ahmed Khedr'),
(54, 8667, 'ICA_2023_paper_8667', 'ChainHire: A Privacy-Preserving and Transparent Job Search Portal Using an Enterprise-Level Permissioned Blockchain Framework', 'Satyajit Ghosh, Rakibul Islam, Aditya Jaman, Aratrika Bose and Abhishek Roy'),
(55, 6554, 'ICA_2023_paper_6554', 'EXECUTION TIME ANALYSIS OF MULTITHREADING AND MULTIPROCESSING ON SEAM CARVING ALGORITHM', 'Aditya Joshi, Rajarshi Bhattacharyay, Garvit Luhadia and Vijayarajan V'),
(56, 7602, 'ICA_2023_paper_7602', 'Sarcasm Detection followed by Sentiment Analysis for Bengali Language: Neural Network & Supervised Approach', 'Moumita Pal and Rajesh Prasad'),
(57, 121, 'ICA_2023_paper_121', 'Malayalam Handwritten Character Recognition Using Transfer Learning', 'Bineesh Jose and K. P. Pushpalatha'),
(58, 1084, 'ICA_2023_paper_1084', 'Labeled Hands in Wild', 'Kavita Chachadi, Shilpa Kamath, Aashish Kalra, Aishwarya Salunke, Pooja Majali, Preeti Bhandiwad, Sandeep Jana and Rajas Joshi'),
(59, 9414, 'ICA_2023_paper_9414', 'Impact of Stain Normalisation Technique on Deep Learning based Nuclei Segmentation in Histopathological Image', 'Kishankumar Vaishnani, Bakul Gohel and Avik Hati'),
(60, 4759, 'ICA_2023_paper_4759', 'Hybrid Perception Analysis of World Leaders in Reddit using Sentiment Analysis', 'Varun Rishwandh Sekar, Thuhin Khanna Rajesh Kannan, Suraj N and Priya Vijay'),
(61, 9146, 'ICA_2023_paper_9146', 'MSCAUNet-3D: Multiscale Spatial Channel Attention 3D-UNet for Lung Carcinoma Segmentation on CT Image', 'Poonkodi S and Kanchana M'),
(62, 5726, 'ICA_2023_paper_5726', 'Simplified Micropayment Mechanism to Eliminate the Risk of Double Payment in E-Commerce', 'Narendra Chahar, Krishan Pal Singh and Muzzammil Hussain'),
(63, 3529, 'ICA_2023_paper_3529', 'Opinion Detection in Hinglish News Reporting', 'Ananya Sharma and Rishabh Kaushal'),
(64, 211, 'ICA_2023_paper_211', 'Analysis of Plantar Pressure to detect Foot Abnormalities among various subjects', 'Dwitrisha Saha, Shwetha Prabhu, Ananya Thapliyal and Manohara M M Pai'),
(65, 4669, 'ICA_2023_paper_4669', 'Smart River Water Quality and Level Monitoring: a Hybrid Neural Network Approach', 'Chellaswamy C C, Geetha T S, Ramasubramaniyan B, Dhelipan Raj A, Dhilipkumar S and Koushikkaran K'),
(66, 2694, 'ICA_2023_paper_2694', 'Design of IoT based hybrid Red LED VLC-fiber communication system', 'Meet Kumari'),
(67, 8254, 'ICA_2023_paper_8254', 'TRAINING JUNIOR DOCTORS USING VR', 'S Trisheela, Dr. Dileep Reddy Bolla, Alisha Ahmed and Gagana M');

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
  `PresentationMode` varchar(250) DEFAULT NULL,
  `Type` varchar(100) NOT NULL,
  `category` varchar(250) NOT NULL,
  `paymentStatus` tinyint(1) DEFAULT NULL,
  `registerStatus` varchar(10) DEFAULT NULL,
  `transactionId` varchar(250) NOT NULL,
  `receipt` varchar(250) NOT NULL,
  `cameraReadyPaper` varchar(250) NOT NULL,
  `copyright` varchar(250) DEFAULT NULL,
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
