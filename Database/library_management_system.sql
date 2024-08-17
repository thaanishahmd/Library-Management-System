-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 06:48 PM
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
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(10) NOT NULL,
  `a_fname` varchar(255) DEFAULT NULL,
  `a_lname` varchar(255) DEFAULT NULL,
  `a_phone_no` varchar(12) DEFAULT NULL,
  `a_dob` varchar(20) DEFAULT NULL,
  `a_email` varchar(255) DEFAULT NULL,
  `a_address` varchar(255) DEFAULT NULL,
  `a_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `a_fname`, `a_lname`, `a_phone_no`, `a_dob`, `a_email`, `a_address`, `a_password`) VALUES
('AD001', 'Lahiru', 'Perera', '07712345678', '1995-06-21', 'lahiruperera@gmail.com', '123, Kandy road, Colombo', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `tg_admin_insert` BEFORE INSERT ON `admin` FOR EACH ROW BEGIN
  INSERT INTO admin_seq VALUES (NULL);
  SET NEW.admin_id = CONCAT('AD', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_seq`
--

CREATE TABLE `admin_seq` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_seq`
--

INSERT INTO `admin_seq` (`ID`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` varchar(10) NOT NULL,
  `book_category` varchar(30) DEFAULT NULL,
  `book_name` varchar(50) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `publisher_id` varchar(10) DEFAULT NULL,
  `availability` varchar(15) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_category`, `book_name`, `author`, `publisher_id`, `availability`) VALUES
('BK001', 'Adventure', 'Treasure Island', 'Robert Louis Stevenson', 'PUB005', 'Available'),
('BK002', 'Science Fiction', 'The Time Machine', 'H. G. Wells', 'PUB001', 'Available'),
('BK003', 'Comedy', 'The Importance of Being Earnest', 'Oscar Wilde', 'PUB002', 'Available'),
('BK004', 'Auto-Biography', 'The Diary of Anne Frank', 'Anne Frank', 'PUB004', 'Available'),
('BK005', 'Horror', 'Frankinstein', 'Mary Shelley', 'PUB003', 'Available');

--
-- Triggers `books`
--
DELIMITER $$
CREATE TRIGGER `tg_book_insert` BEFORE INSERT ON `books` FOR EACH ROW BEGIN
  INSERT INTO book_seq VALUES (NULL);
  SET NEW.book_id = CONCAT('BK', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book_publish`
--

CREATE TABLE `book_publish` (
  `publisher_id` char(10) NOT NULL,
  `book_id` varchar(10) NOT NULL,
  `published_date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_publish`
--

INSERT INTO `book_publish` (`publisher_id`, `book_id`, `published_date`) VALUES
('PUB001', 'BK001', '2020-11-21'),
('PUB002', 'BK004', '2018-06-12'),
('PUB003', 'BK005', '2020-05-24'),
('PUB004', 'BK003', '2019-02-19'),
('PUB005', 'BK002', '2017-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `book_seq`
--

CREATE TABLE `book_seq` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_seq`
--

INSERT INTO `book_seq` (`ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(13),
(14),
(15);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `m_email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`m_email`, `message`) VALUES
('vimalseneviratna@gmail.com', 'Good service.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `m_email` varchar(100) NOT NULL,
  `feed_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`m_email`, `feed_message`) VALUES
('', ''),
('', 'good'),
('', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `ref_id` varchar(10) NOT NULL,
  `member_id` char(10) NOT NULL,
  `fine_amount` varchar(10) DEFAULT NULL,
  `reasons` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`ref_id`, `member_id`, `fine_amount`, `reasons`) VALUES
('REF001', 'MEM002', 'LKR 500', 'Late return of books'),
('REF003', 'MEM003', 'LKR 3000', 'Books damaged while returning'),
('REF004', 'MEM004', '30', 'BK001'),
('REF005', 'MEM001', '930', 'BK002'),
('REF007', 'MEM001', '960', 'BK001');

--
-- Triggers `fine`
--
DELIMITER $$
CREATE TRIGGER `tg_fine_insert` BEFORE INSERT ON `fine` FOR EACH ROW BEGIN
  INSERT INTO fine_seq VALUES (NULL);
  SET NEW.ref_id = CONCAT('REF', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fine_seq`
--

CREATE TABLE `fine_seq` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine_seq`
--

INSERT INTO `fine_seq` (`ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `library_card`
--

CREATE TABLE `library_card` (
  `barcode_no` varchar(10) NOT NULL,
  `member_id` varchar(10) NOT NULL,
  `issue_date` varchar(12) DEFAULT NULL,
  `expiry_date` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_card`
--

INSERT INTO `library_card` (`barcode_no`, `member_id`, `issue_date`, `expiry_date`) VALUES
('CN00001', 'MEM001', '2020-05-25', '2021-05-26'),
('CN00002', 'MEM002', '2020-06-12', '2021-06-12'),
('CN00003', 'MEM003', '2020-06-29', '2021-06-30'),
('CN00004', 'MEM004', '2020-07-15', '2021-07-16');

--
-- Triggers `library_card`
--
DELIMITER $$
CREATE TRIGGER `tg_libcard_insert` BEFORE INSERT ON `library_card` FOR EACH ROW BEGIN
  INSERT INTO lib_card_seq VALUES (NULL);
  SET NEW.barcode_no = CONCAT('CN', LPAD(LAST_INSERT_ID(), 5, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `lib_card_seq`
--

CREATE TABLE `lib_card_seq` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lib_card_seq`
--

INSERT INTO `lib_card_seq` (`ID`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` varchar(10) NOT NULL,
  `m_fname` varchar(255) DEFAULT NULL,
  `m_lname` varchar(255) DEFAULT NULL,
  `m_phone_no` varchar(12) DEFAULT NULL,
  `m_dob` varchar(20) DEFAULT NULL,
  `m_email` varchar(255) DEFAULT NULL,
  `m_address` varchar(255) DEFAULT NULL,
  `m_username` varchar(255) DEFAULT NULL,
  `m_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `m_fname`, `m_lname`, `m_phone_no`, `m_dob`, `m_email`, `m_address`, `m_username`, `m_password`) VALUES
('MEM001', 'Saman', 'Kumara', '0771695435', '1989-06-23', 'samankumara@gmail.com', '235, Dehiwala road, Colombo', 'saman_kumara', 'e10adc3949ba59abbe56e057f20f883e'),
('MEM002', 'Kasun', 'Bandara', '0771415645', '1996-05-14', 'kasunbandara@gmail.com', '22A, 1st cross road, Kurunegala', 'kasun_bandara', 'e10adc3949ba59abbe56e057f20f883e'),
('MEM003', 'Rajitha', 'Weerasekara', '0774568978', '1997-05-04', 'rajithaweerasekara@gmail.com', '158, Peradeniya road, Gampola', 'rajitha_weerasekara', 'e10adc3949ba59abbe56e057f20f883e'),
('MEM004', 'Vinul', 'Chamod', '0773299874', '1998-12-28', 'vinulchamod@gmail.com', '45, Hill road, Matale', 'vinul_chamod', 'e10adc3949ba59abbe56e057f20f883e'),
('MEM011', 'Thaanish', 'Ahamed', '94770771410', '2021-05-05', 'thaanishahmd250999@gmail.com', '163/4, Devaraja mawatha,', 'thaanish@123', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Triggers `members`
--
DELIMITER $$
CREATE TRIGGER `tg_member_insert` BEFORE INSERT ON `members` FOR EACH ROW BEGIN
  INSERT INTO member_seq VALUES (NULL);
  SET NEW.member_id = CONCAT('MEM', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `member_book`
--

CREATE TABLE `member_book` (
  `reserve_id` int(11) NOT NULL,
  `member_id` char(10) NOT NULL,
  `book_id` char(10) NOT NULL,
  `reserve_date` varchar(12) DEFAULT NULL,
  `return_date` varchar(12) DEFAULT NULL,
  `book_returned` varchar(10) DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_book`
--

INSERT INTO `member_book` (`reserve_id`, `member_id`, `book_id`, `reserve_date`, `return_date`, `book_returned`) VALUES
(1, 'MEM001', 'BK005', '2021-05-30', '2021-06-30', 'YES'),
(2, 'MEM001', 'BK003', '2021-05-30', '2021-04-30', 'YES'),
(3, 'MEM001', 'BK001', '2021-05-30', '2021-06-30', 'YES'),
(5, 'MEM002', 'BK004', '2021-05-30', '2021-06-30', 'YES'),
(6, 'MEM001', 'BK005', '2021-05-30', '2021-06-30', 'YES'),
(7, 'MEM001', 'BK004', '2021-05-30', '2021-06-30', 'YES'),
(8, 'MEM001', 'BK003', '2021-05-30', '2021-06-30', 'YES'),
(9, 'MEM001', 'BK001', '2021-05-30', '2021-06-30', 'YES'),
(10, 'MEM001', 'BK005', '2021-05-31', '2021-07-01', 'YES'),
(11, 'MEM003', 'BK005', '2021-05-31', '2021-07-01', 'YES'),
(12, 'MEM003', 'BK003', '2021-05-31', '2021-07-01', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `member_seq`
--

CREATE TABLE `member_seq` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_seq`
--

INSERT INTO `member_seq` (`ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `card_name` varchar(255) NOT NULL,
  `card_no` int(20) NOT NULL,
  `exp_month` varchar(255) NOT NULL,
  `exp_year` varchar(255) NOT NULL,
  `CVC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`card_name`, `card_no`, `exp_month`, `exp_year`, `CVC`) VALUES
('Thaanish Ahamed', 2147483647, '09', '2021', 333),
('upali', 2147483647, '05', '2025', 321);

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` varchar(10) NOT NULL,
  `pub_name` varchar(50) DEFAULT NULL,
  `pub_address` varchar(255) DEFAULT NULL,
  `pub_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `pub_name`, `pub_address`, `pub_email`) VALUES
('PUB001', 'Cassel Publishers', 'London, UK', 'casselpublishers@gmail.com'),
('PUB002', 'Contact Publishers', 'Chicago, United States', 'contactpublishers@gmail.com'),
('PUB003', 'DNovel Publishers', 'Paris, France', 'dnovelpublishers@gmail.com'),
('PUB004', 'Spectrum Publishers', 'New Delhi, India', 'spectrumpublishers@gmail.com'),
('PUB005', 'Global Publishers', 'Colombo, Sri Lanka', 'globalpublishers@gmail.com');

--
-- Triggers `publishers`
--
DELIMITER $$
CREATE TRIGGER `tg_publisher_insert` BEFORE INSERT ON `publishers` FOR EACH ROW BEGIN
  INSERT INTO publisher_seq VALUES (NULL);
  SET NEW.publisher_id = CONCAT('PUB', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `publisher_seq`
--

CREATE TABLE `publisher_seq` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher_seq`
--

INSERT INTO `publisher_seq` (`ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_seq`
--
ALTER TABLE `admin_seq`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_publisher_book` (`publisher_id`);

--
-- Indexes for table `book_publish`
--
ALTER TABLE `book_publish`
  ADD PRIMARY KEY (`publisher_id`,`book_id`),
  ADD KEY `FK_book` (`book_id`);

--
-- Indexes for table `book_seq`
--
ALTER TABLE `book_seq`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`ref_id`),
  ADD KEY `FK_member_fine` (`member_id`);

--
-- Indexes for table `fine_seq`
--
ALTER TABLE `fine_seq`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `library_card`
--
ALTER TABLE `library_card`
  ADD PRIMARY KEY (`barcode_no`),
  ADD KEY `FK_member_library_card` (`member_id`);

--
-- Indexes for table `lib_card_seq`
--
ALTER TABLE `lib_card_seq`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_book`
--
ALTER TABLE `member_book`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `FK_books` (`book_id`),
  ADD KEY `FK_member` (`member_id`);

--
-- Indexes for table `member_seq`
--
ALTER TABLE `member_seq`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `publisher_seq`
--
ALTER TABLE `publisher_seq`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_seq`
--
ALTER TABLE `admin_seq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_seq`
--
ALTER TABLE `book_seq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fine_seq`
--
ALTER TABLE `fine_seq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lib_card_seq`
--
ALTER TABLE `lib_card_seq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_book`
--
ALTER TABLE `member_book`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `member_seq`
--
ALTER TABLE `member_seq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `publisher_seq`
--
ALTER TABLE `publisher_seq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_publisher_book` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`publisher_id`);

--
-- Constraints for table `book_publish`
--
ALTER TABLE `book_publish`
  ADD CONSTRAINT `FK_book` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `FK_publish` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`publisher_id`);

--
-- Constraints for table `fine`
--
ALTER TABLE `fine`
  ADD CONSTRAINT `FK_member_fine` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_card`
--
ALTER TABLE `library_card`
  ADD CONSTRAINT `FK_member_library_card` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `member_book`
--
ALTER TABLE `member_book`
  ADD CONSTRAINT `FK_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_member` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
