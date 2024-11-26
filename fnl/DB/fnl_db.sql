-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 02:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fnl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1844156d4166d94387f1a4ad031ca5fa');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quntity` int(4) NOT NULL,
  `last_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`id`, `name`, `quntity`, `last_update`) VALUES
(1, 'A+', 12, '2024-09-11'),
(2, 'A-', 1, '2024-09-11'),
(3, 'B+', 5, '2024-09-11'),
(4, 'B-', 2, '2024-09-11'),
(5, 'AB+', 10, '2024-09-11'),
(6, 'AB-', 0, '2024-09-11'),
(7, 'O+', 9, '2024-09-11'),
(8, 'O-', 3, '2024-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `camp`
--

CREATE TABLE `camp` (
  `c_id` int(3) NOT NULL,
  `c_hostNm` varchar(30) NOT NULL,
  `c_campNm` varchar(255) NOT NULL,
  `c_phone` int(10) NOT NULL,
  `c_adr` text NOT NULL,
  `c_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camp`
--

INSERT INTO `camp` (`c_id`, `c_hostNm`, `c_campNm`, `c_phone`, `c_adr`, `c_date`) VALUES
(1, 'M.B. Arts & Commerce College, ', 'M.B. Arts & Commerce College, Gondal', 2147483647, 'SWAMI VIVEKANAND ROAD\r\nMAHADEV WADI\r\nGONDAL - 360 311\r\nGUJARAT', '2024-12-23'),
(2, 'SHREE RAM SARVAJANIK HOSPITAL', 'SHREE RAM SARVAJANIK HOSPITAL', 2147483647, 'Kashi Vishavanath Road,Ramji Mandir Chowk,\r\nVardhman Nagar,\r\nGondal, Gujarat 360311', '2024-12-18'),
(3, 'SHREE RAM SARVAJANIK HOSPITAL', 'SHREE RAM SARVAJANIK HOSPITAL', 2147483647, 'Kashi Vishavanath Road,Ramji Mandir Chowk,\r\nVardhman Nagar,\r\nGondal, Gujarat 360311', '2024-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_img` varchar(255) NOT NULL,
  `d_blood` varchar(5) NOT NULL,
  `d_gender` varchar(8) NOT NULL,
  `d_dob` varchar(30) NOT NULL,
  `d_phone` varchar(12) NOT NULL,
  `d_mail` varchar(39) NOT NULL,
  `d_adr` text NOT NULL,
  `d_password` varchar(70) NOT NULL,
  `last_donate_b` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`d_id`, `d_name`, `d_img`, `d_blood`, `d_gender`, `d_dob`, `d_phone`, `d_mail`, `d_adr`, `d_password`, `last_donate_b`) VALUES
(1, 'akshay', 'images/akshay.2005.png', 'A-', 'male', '2005-05-08', '9586364151', 'vaghelaakshay9823@gmail.com', 'bhagwan paru,vasavad 364490', '80c9ef0fb86369cd25f90af27ef53a9e', '2024-07-12'),
(2, 'vishvarajsinh jadeja', 'images/vishvarajsinh jadeja.2005.png', 'B+', 'male', '2005-02-16', '9313840842', 'vishvaraj1602@gmail.com', 'kailash bag,\"jay Aashapura\", Gondal.', '81dc9bdb52d04dc20036dbd8313ed055', '2024-07-01'),
(3, 'kaushik', 'images/kaushik.2005.png', 'AB-', 'male', '2005-05-11', '9099636452', 'kaushiklila5@gmail.com', 'khodiyar krupa, shivalay shocity,behind gov. hospital,charakhadi, gondal , rajkot , gujarat - 360311', '1d430d0a0757ca4b16a57dbc5c436353', '2024-05-01'),
(4, 'vadukiya parag', '', 'AB-', 'male', '2005-04-22', '9909548401', 'paragvadukiya81@gmail.com', 'near by highschool,charakhadi,gondal -360311', '46bf36a7193438f81fccc9c4bcc8343e', ''),
(5, 'krushit', 'images/krushit.2005.png', 'O+', 'male', '2005-09-26', '7984086783', 'krushit@gmail.com', 'khat para vasavad,364490', '7fc402f2322cca4f190c20ac36f6bf57', ''),
(6, 'jainish', 'images/jainish.2006.png', 'B+', 'male', '2006-02-25', '9624911521', 'solankijitu744@gmail.com', 'kotda sangani road maruti dham society gondal', '3b29ba53c507b00a745ca7e2cbfd6acf', ''),
(7, 'darshan', 'images/darshan.2006.png', 'AB+', 'male', '2006-05-10', '7894561230', 'darshan@gmail.com', 'new shyam gondal360311', '0ad7fdbf8f687a5c0f40cbe1a9ca0ce5', ''),
(8, 'pathan samirkhan', 'images/pathan samirkhan.2005.png', 'B+', 'male', '2005-11-11', '6355433919', 'sameerpathan111105@gmail.com', 'gondal', 'ed6a5d43b2ec1b22e57b12a08ac439ce', ''),
(9, 'Kureshi Rustam', 'images/Kureshi Rustam.2005.png', 'O+', 'male', '2005-12-25', '8733865524', 'rustam4670@gmail.com', 'mota devaliya ', 'e12dde3f375761a9c1985b95e5a5b88b', '');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `f_id` int(4) NOT NULL,
  `f_que` varchar(255) NOT NULL,
  `f_ans` varchar(255) NOT NULL,
  `last_update` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`f_id`, `f_que`, `f_ans`, `last_update`) VALUES
(1, 'I had alcohol before going to donate blood. Is it Okay?', '  No. We do not take blood from anyone under the influence of alcohol. This is because being intoxicated              can affect your ability to understand and answer the donor questionnaire and declaration.', '2024-07-27'),
(2, 'I am taking antibiotics. Can I donate blood?', ' It depends on why you are taking the antibiotics and it may also depend after doctor counselling.', '2024-07-28'),
(3, 'How does age affects my ability to donate blood?', '  Minimum age for whole blood donation is 18 years in India. The maximum age for blood donation depends on the kind of donation.', '2024-07-28'),
(4, 'Are there any side effects of Blood donations?', ' There are no side effects of blood donation. The blood bank staff ensures that your blood donation is a good experience so as to             make you a regular blood donor. There are a number of people who have donated more than 25-100 times in their ent', '2024-07-28'),
(5, 'How often can I donate Blood ?', ' After every three –four months you can donate blood.', '2024-07-28'),
(6, 'What should I eat before blood-donation ?', ' Anything that you normally eat at home. Eating a light snacks and having a soft drink before blood donation is sufficient.', '2024-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(4) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `f_mail` varchar(30) NOT NULL,
  `f_message` varchar(255) NOT NULL,
  `f_rating` int(1) NOT NULL,
  `f_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_name`, `f_mail`, `f_message`, `f_rating`, `f_date`) VALUES
(1, 'mohan', 'mohan@gmail.com', 'good website', 4, '2024-09-23'),
(2, 'parag', 'parag@gmail.com', 'very fast respond and good support team', 4, '2024-09-23'),
(3, 'vadukiya parag', 'vp@gmail.com', 'good work\r\n', 4, '2024-09-23'),
(4, 'rohan', 'rohan@gmail.com', 'fix css', 2, '2024-09-23'),
(5, 'prashant', 'prashant@gmail.com', 'Excellent service, efficient staff, and a vital resource for saving lives—highly recommended!', 4, '2024-09-23'),
(6, 'kaushik', 'kaushiklila5@gmail.com', 'making blood donations easy and impactful—truly', 5, '2024-09-23'),
(7, 'viraj', 'viraj@gmail.com', 'amazing website\r\n ', 5, '2024-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `g_id` int(2) NOT NULL,
  `g_name` varchar(90) NOT NULL,
  `g_path` varchar(255) NOT NULL,
  `g_type` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `g_name`, `g_path`, `g_type`) VALUES
(1, 'img', '../uploads/img.jpg', 'photo'),
(2, 'img2', '../uploads/img2.jpg', 'photo'),
(3, 'im3', '../uploads/im3.jpg', 'photo'),
(4, 'img4', '../uploads/img4.jpg', 'photo'),
(5, 'img5', '../uploads/img5.jpeg', 'photo'),
(6, 'img6', '../uploads/img6.jpg', 'photo'),
(7, 'img7', '../uploads/img7.jpg', 'photo'),
(8, 'img8', '../uploads/img8.jpg', 'photo'),
(9, 'img9', '../uploads/img9.jpg', 'photo');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `set_id` int(1) NOT NULL,
  `set_title` varchar(50) NOT NULL,
  `set_logo` varchar(255) NOT NULL,
  `set_address` varchar(200) NOT NULL,
  `set_phone` varchar(15) NOT NULL,
  `set_mail` varchar(30) NOT NULL,
  `update_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`set_id`, `set_title`, `set_logo`, `set_address`, `set_phone`, `set_mail`, `update_date`) VALUES
(1, 'AASTHA Blood Bank', 'logo.png', 'OLD MARKETING YARD, opp. BUS STATION, above ICICI BANK, Mani Nagar, Gundala, Gondal, Gujarat 360311', '02825 220828', 'aasthabloodbank@yahoo.com', '2024-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(1) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `s_contact` varchar(10) NOT NULL,
  `s_roll` varchar(30) NOT NULL,
  `s_shift` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `s_name`, `s_contact`, `s_roll`, `s_shift`) VALUES
(1, 'ajay chavda', '9988776600', 'administrator', '0'),
(2, 'raju bhai', '9998880001', 'operator', '9:00 AM to 5:00 PM'),
(3, 'chirag vyas', '9998880002', 'operator', '5:00 PM to 1:00 AM'),
(4, 'mohan chavda', '9998880003', 'operator', '1:00 AM to 9:00 AM ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camp`
--
ALTER TABLE `camp`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `camp`
--
ALTER TABLE `camp`
  MODIFY `c_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `f_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `set_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
