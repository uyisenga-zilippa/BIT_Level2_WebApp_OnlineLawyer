-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2021 at 07:54 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_lawyer_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@lawyers.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `attachment_id` int(11) NOT NULL,
  `case_id` int(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `file` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `case_title` varchar(500) NOT NULL,
  `case_description` varchar(500) NOT NULL,
  `document` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL DEFAULT '0',
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `time` varchar(10) NOT NULL,
  `day` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `client_id`, `lawyer_id`, `case_title`, `case_description`, `document`, `price`, `status`, `time`, `day`, `month`, `year`) VALUES
(1, 1, 1, 'about sexoul harasement', '                                                take me lang time ggjjj                                           ', 'files/cases/DisplayArticle40 GCC LTD.pdf', '2000', 'paid', '17:32', '04', '12', '2021'),
(2, 1, 1, 'land issue', '                                                my case is about land                                                ', 'files/cases/DisplayArticle40 GCC LTD.pdf', '2500', 'accepted', '10:52', '05', '12', '2021'),
(3, 3, 2, 'ITANGAZO RY AKAZI KANJYE', '                                                hello lawyer i have serioux                                                ', 'files/cases/DisplayArticle40.pdf', '50000', 'accepted', '15:46', '05', '12', '2021'),
(4, 4, 1, 'ubujura', 'kwibwa isakoshi kumanywa', 'files/cases/Rene Sincere OTB assignment.pdf', '10000', 'accepted', '17:44', '05', '12', '2021'),
(6, 6, 4, 'ubujura', 'gfghkjhjdksmnjhgfhjdmjhgfg', 'files/cases/DisplayArticle40 (1).pdf', '80000', 'accepted', '12:32', '07', '12', '2021'),
(7, 7, 4, 'gukubita no gukomeretsa', 'hgfdfghjkjhgfdfjklkjhgtyuilkjhgghjkljh', 'files/cases/DisplayArticle40 (1).pdf', '30000', 'paid', '15:40', '07', '12', '2021'),
(9, 8, 1, 'GUSABA GUTANDUKANA', 'JHGFDHJKJHGVFUDIDKJHFDUIKJ', 'files/cases/DisplayArticle40 (1).pdf', '20000', 'won', '06:54', '08', '12', '2021'),
(10, 9, 2, 'gutanga ruswa', 'gdjhghjxlksajhdfnd', 'files/cases/DisplayArticle40.pdf', '2000', 'signed', '09:18', '08', '12', '2021'),
(11, 7, 4, 'INAMA Y ABABYEYI', 'trhjkl', 'files/cases/DisplayArticle40.pdf', '20000', 'paid', '12:07', '09', '12', '2021'),
(12, 7, 4, 'Kwiba', 'this is for just testing', 'files/cases/DisplayArticle40.pdf', '1000', 'signed', '13:40', '11', '12', '2021'),
(13, 10, 2, 'ruswa', 'hgfdhjksladjfhjkdslkjdfbnmv,smdnfdss,mnvcmx,zmcvnjcccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 'files/cases/DisplayArticle40.pdf', '1000', 'signed', '16:25', '11', '12', '2021'),
(14, 10, 2, 'ruswa', 'hgfdhjksladjfhjkdslkjdfbnmv,\r\nkjxhbdfjkljfdjklm,hgfdsfgh,kjhgfvbhjgf\r\nfghjkhgftjkhgfghjkjhftykhgdffs\r\njhfdfgtyuihgfferdfgjktre', 'files/cases/DisplayArticle40.pdf', '2000', 'signed', '16:36', '11', '12', '2021'),
(15, 5, 4, 'ubujura', 'kjhghJKDLFNKJGSKDS', 'files/cases/DisplayArticle40.pdf', '1000', 'signed', '08:13', '13', '12', '2021'),
(16, 12, 1, 'Amahugu', 'Gdhsusuehdhdh', 'files/cases/MY MEMORY PROJECT REPORTT6K.pdf', '0', 'pending', '10:47', '13', '12', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `names` varchar(200) NOT NULL,
  `father_name` varchar(40) NOT NULL,
  `mother_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `province` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `sector` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `names`, `father_name`, `mother_name`, `gender`, `dob`, `email`, `password`, `phone`, `id_number`, `province`, `district`, `sector`) VALUES
(1, 'tresor alain', '', '', 'M', '2021-12-05', 'tresoralain35@gmail.com ', '1234', '0780591269', '1866768786778778767', 'South', 'Huye', 'Tumba'),
(2, 'erick', '', '', 'M', '2021-12-16', 'erick@gmail.com   ', '1234', '0784366616', '11', 'Kigali', 'Nyarugenge', 'Muhima'),
(3, 'Daniel TUYIZERE', '', '', 'M', '2021-12-24', 'tuyizere925@gmail.com ', '123', '0788930898', '234234442345678', 'Kigali', 'Nyarugenge', 'Kimisagara'),
(4, 'ingabire jeanne', '', '', 'F', '2019-09-12', 'ingabire@gmail.com ', '123', '0789675431', '1194567893456723', 'Kigali', 'Nyarugenge', 'Kimisagara'),
(5, 'alice niyirora', '', '', 'F', '2021-12-16', 'imuragijemariya@gmail.com', '1234', '+250780591269', '199470067895432', 'South', 'Huye', 'Tumba'),
(6, 'habimana jeaque', '', '', 'M', '2020-10-15', 'habimana@gmail.com ', '123', '+250780591269', '119938001345678', 'South', 'Huye', 'Tumba'),
(7, 'kubwina marc', 'kabandana erick', 'kabatesi divine', 'M', '2021-12-02', 'kubwimana@gmail.com ', '123', '+250780591269', '19902675345256367', 'South', 'Nyanza', 'Busasamana'),
(8, 'ndimbati jean', '', '', 'M', '2021-12-24', 'ndimbati@gmail.com  ', '123', '0785678987', '19968002345678', 'Kigali', 'Nyarugenge', 'Kimisagara'),
(9, 'ishimwe samuel', '', '', 'M', '2021-06-10', 'ishimwe@gmail.com ', '123', '+250780591269', '119788005674345', 'Kigali', 'Nyarugenge', 'Kimisagara'),
(10, 'NDAYISENGA Alexis', 'Mugisha Peter', 'mukanama alice', 'M', '2021-12-25', 'ndayisenga@gmail.com ', '123', '0783567862', '112000800345678654', 'Kigali', 'Nyarugenge', 'Muhima'),
(11, 'muragijemariya immacule', '', '', '', '0000-00-00', 'imuragijemariya@gmail.com', '1234', '0784628745', '', '', '', ''),
(12, 'Muragijemariya immaculee', 'Mukama jean', 'Mykamana jeanne', 'F', '2021-12-23', 'imuragijemariya@gmail.com ', '123', '0784628745', '1199270223626126', 'South', 'Huye', 'Tumba');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `comment` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `payment_option` varchar(200) NOT NULL,
  `remain_amount` varchar(200) DEFAULT NULL,
  `remain_paying_data` varchar(200) DEFAULT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `case_id`, `payment_option`, `remain_amount`, `remain_paying_data`, `status`) VALUES
(8, 7, '25', '15000', '2021-12-11', 'signed'),
(9, 9, '25', '10000', '2021-12-22', 'signed'),
(10, 10, '25', '1000', '2021-12-09', 'signed'),
(11, 11, '25', '10000', '2021-12-21', 'signed'),
(12, 12, '25', '500', '2021-12-25', 'signed'),
(13, 13, '25', '500', '2021-12-25', 'signed'),
(14, 14, '25', '1000', '2021-12-25', 'signed'),
(15, 14, '25', '1000', '2021-12-25', 'signed'),
(16, 12, '25', '500', '2022-01-08', 'signed'),
(17, 15, '21', '210', '2021-12-21', 'signed');

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `id` int(11) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `names` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `province` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `langauges` varchar(200) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_account` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`id`, `picture`, `names`, `email`, `id_number`, `password`, `qualification`, `phone`, `gender`, `province`, `district`, `langauges`, `bio`, `bank_name`, `bank_account`, `status`) VALUES
(1, 'img/uploadDSC_0194.JPG', 'cedrick mwamba', 'cedrickmwamba@gmail.com', '1010000', 'cedro', 'A0', '9090', 'M', 'Kigali', 'Nyarugenge', 'KINYARWANDA,ENGLISH', ' my name is mwamba                     ', 'EQUIT BANK', '5758687-87787-13', 'active'),
(2, 'img/uploadme.jpeg', 'habimana isaie', 'habimanaisaie2@gmail.com', '1020203404000988', '123', 'PHD', '0783066017', 'M', 'South', 'Kamonyi', 'KINYARWANDA,ENGLISH', ' i won all cases i meet  ', 'BK', '4002-9217-5678-2237', 'active'),
(3, 'img/uploadme2.jpeg', 'ahayo gentil', 'ahayo@gmail.com', '1198567345690123', '123', 'A0', '0785647651', 'M', 'Kigali', 'Gasabo', 'KINYARWANDA,ENGLISH', ' ytrteyruioiuytuiowilduyteuiwo;lioeu', 'EQUIT BANK', '400657387436793', 'active'),
(4, 'img/upload1.PNG', 'MUKAMA Elias', 'mukama@gmail.com', '1197880034567689', '1234', 'A0', '0780591269', 'M', 'North', 'Burera', 'KINYARWANDA,ENGLISH', ' tfdghjkjhhksjgydfghdgddjksjhgdhg ', 'BPR', '5758687-87787-13', 'active'),
(5, 'img/uploadIMG_20211012_115410_3.jpg', 'MUTUYIMANA Immaculee', 'mutuyimana@gmail.com', '1199270034567898', '1234', 'PHD', '+250780591269', 'F', 'South', 'Huye', 'KINYARWANDA,ENGLISH', ' hgfdghjksduysfijsdhgwejdkflgjfh', 'EQUIT BANK', '400657387436793', 'rejected'),
(6, 'img/uploadDSC_0196.JPG', 'muragijemariya immaculee', 'imuragijemariya@gmail.com', '119927034567231', '123', 'PHD', '0784628745', 'F', 'South', 'Huye', 'KINYARWANDA,ENGLISH', ' i am good lawyer ', 'BK', '12403-3673-25', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_documents`
--

CREATE TABLE `lawyer_documents` (
  `id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `id_copy` varchar(200) NOT NULL,
  `qualification_copy` varchar(200) NOT NULL,
  `licence_copy` varchar(200) NOT NULL,
  `justification_copy` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyer_documents`
--

INSERT INTO `lawyer_documents` (`id`, `lawyer_id`, `id_copy`, `qualification_copy`, `licence_copy`, `justification_copy`) VALUES
(1, 1, 'files/lawyerDocuments/DisplayArticle40.pdf', 'files/lawyerDocuments/DisplayArticle40.pdf', 'files/lawyerDocuments/DisplayArticle40 (1).pdf', 'files/lawyerDocuments/DisplayArticle40 GCC LTD.pdf'),
(2, 2, 'files/lawyerDocuments/DisplayArticle40.pdf', 'files/lawyerDocuments/DisplayArticle40 (1).pdf', 'files/lawyerDocuments/DisplayArticle40 (1).pdf', 'files/lawyerDocuments/DisplayArticle40 GCC LTD.pdf'),
(3, 4, 'files/lawyerDocuments/DisplayArticle40.pdf', 'files/lawyerDocuments/DisplayArticle40.pdf', 'files/lawyerDocuments/DisplayArticle40.pdf', 'files/lawyerDocuments/DisplayArticle40.pdf'),
(4, 6, 'files/lawyerDocuments/DisplayArticle40 (1).pdf', 'files/lawyerDocuments/DisplayArticle40.pdf', 'files/lawyerDocuments/DisplayArticle40.pdf', 'files/lawyerDocuments/DisplayArticle40.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `payer_id` int(123) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `reason` varchar(123) NOT NULL,
  `amount` int(123) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'received',
  `case_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `day`, `month`, `year`, `payer_id`, `receiver_id`, `reason`, `amount`, `status`, `case_id`) VALUES
(1, '05', '12', '2021', 1, 1, 'Half payment for about sexoul harasement case', 1000, 'sent', 1),
(3, '07', '12', '2021', 4, 1, 'Half payment for ubujura case', 50000, 'sent', 4),
(4, '07', '12', '2021', 5, 4, 'Half payment for ubwambuzi case', 5000, 'sent', 5),
(6, '07', '12', '2021', 7, 4, 'Half payment for gukubita no gukomeretsa case', 15000, 'sent', 7),
(8, '08', '12', '2021', 7, 4, 'Remaining amount on gukubita no gukomeretsa case', 30000, 'sent', 7),
(9, '08', '12', '2021', 8, 1, 'Half payment for GUSABA GUTANDUKANA case', 10000, 'sent', 9),
(10, '11', '12', '2021', 7, 4, 'Half payment for INAMA Y ABABYEYI case', 15000, 'received', 7),
(11, '11', '12', '2021', 7, 4, 'Half payment for INAMA Y ABABYEYI case', 10000, 'received', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `day` varchar(5) NOT NULL,
  `month` varchar(5) NOT NULL,
  `year` varchar(5) NOT NULL,
  `lawyer_id` int(10) NOT NULL,
  `tax_type` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `tax_reciept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`attachment_id`),
  ADD KEY `case_id` (`case_id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_documents`
--
ALTER TABLE `lawyer_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_id` (`case_id`),
  ADD KEY `payer_id` (`payer_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_id` (`lawyer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lawyer_documents`
--
ALTER TABLE `lawyer_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
