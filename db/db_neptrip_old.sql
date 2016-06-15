-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2016 at 01:14 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_neptrip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business`
--

CREATE TABLE `tbl_business` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `business_type` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `ward_number` int(11) NOT NULL,
  `property_block_no` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_person_role` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `orginal_password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0> Not Approved, 1> Approved, 2> Rejected'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_business`
--

INSERT INTO `tbl_business` (`id`, `business_name`, `slug`, `business_type`, `address`, `street_address`, `postal_address`, `city`, `ward_number`, `property_block_no`, `zone`, `district`, `phone1`, `phone2`, `fax`, `email`, `web`, `fb_link`, `contact_person`, `contact_person_role`, `mobile`, `image`, `comments`, `username`, `password`, `orginal_password`, `status`) VALUES
(2, 'Hotel Bhattendanda12', 'hotel-bhattendanda12', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel12', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director of Sales', '9849347506', 'nature-q-c-640-480-7.jpg', '', 'testuser', '255ea84fe6e4692ab8139ec709d2a6dba5a9716b', 'UA3uubV7', 1),
(5, 'Hotel Bhattendanda', 'hotel-bhattendanda-4', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', '', '', '', 0),
(6, 'Hotel Bhattendanda', 'hotel-bhattendanda-5', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', '', '', '', 0),
(7, 'Hotel Bhattendanda', 'hotel-bhattendanda-3', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', '', '', '', 1),
(8, 'Hotel Bhattendanda', 'hotel-bhattendanda-7', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', '', '', '', 0),
(9, 'Hotel Bhattendanda', 'hotel-bhattendanda-2', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', 'testuser1', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'password', 0),
(13, 'Hotel Bhattendanda', 'hotel-bhattendanda-12', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_businesstypes`
--

CREATE TABLE `tbl_businesstypes` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_businesstypes`
--

INSERT INTO `tbl_businesstypes` (`id`, `type`) VALUES
(1, 'Hotel'),
(2, 'Venue'),
(3, 'Resturant'),
(4, 'Transport');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_districts`
--

CREATE TABLE `tbl_districts` (
  `id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `district` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_districts`
--

INSERT INTO `tbl_districts` (`id`, `zone_id`, `district`) VALUES
(1, 1, 'Jhapa'),
(2, 1, 'Ilam'),
(3, 1, 'Panchthar'),
(4, 1, 'Taplejung'),
(5, 2, 'Morang'),
(6, 2, 'Sunsari'),
(7, 2, 'Bhojpur'),
(8, 2, 'Dhankuta'),
(9, 2, 'Terhathum'),
(10, 2, 'Sankhuwasabha'),
(11, 3, 'Saptari'),
(12, 3, 'Siraha'),
(13, 3, 'Udayapur'),
(14, 3, 'Khotang'),
(15, 3, 'Okhaldhunga'),
(16, 3, 'Solukhumbu'),
(17, 4, 'Dhanusa'),
(18, 4, 'Mahottari'),
(19, 4, 'Sarlahi'),
(20, 4, 'Sindhuli'),
(21, 4, 'Ramechhap'),
(22, 4, 'Dolakha'),
(23, 5, 'Bhaktapur'),
(24, 5, 'Dhading'),
(25, 5, 'Kathmandu'),
(26, 5, 'Kavrepalanchok'),
(27, 5, 'Lalitpur'),
(28, 5, 'Nuwakot'),
(29, 5, 'Rasuwa'),
(30, 5, 'Sindhupalchok'),
(31, 6, 'Bara'),
(32, 6, 'Parsa'),
(33, 6, 'Rautahat'),
(34, 6, 'Chitwan'),
(35, 6, 'Makwanpur'),
(36, 7, 'Gorkha'),
(37, 7, 'Kaski'),
(38, 7, 'Lamjung'),
(39, 7, 'Syangja'),
(40, 7, 'Tanahun'),
(41, 7, 'Manang'),
(42, 8, 'Kapilvastu'),
(43, 8, 'Nawalparasi'),
(44, 8, 'Rupandehi'),
(45, 8, 'Arghakhanchi'),
(46, 8, 'Gulmi'),
(47, 8, 'Palpa'),
(48, 9, 'Baglung'),
(49, 9, 'Myagdi'),
(50, 9, 'Parbat'),
(51, 9, 'Mustang'),
(52, 10, 'Dang'),
(53, 10, 'Pyuthan'),
(54, 10, 'Rolpa'),
(55, 10, 'Rukum'),
(56, 10, 'Salyan'),
(57, 11, 'Dolpa'),
(58, 11, 'Humla'),
(59, 11, 'Jumla'),
(60, 11, 'Kalikot'),
(61, 11, 'Mugu'),
(62, 12, 'Banke'),
(63, 12, 'Bardiya'),
(64, 12, 'Surkhet'),
(65, 12, 'Dailekh'),
(66, 12, 'Jajarkot'),
(67, 13, 'Kailali'),
(68, 13, 'Achham'),
(69, 13, 'Doti'),
(70, 13, 'Bajhang'),
(71, 13, 'Bajura'),
(72, 14, 'Kanchanpur'),
(73, 14, 'Dadeldhura'),
(74, 14, 'Baitadi'),
(75, 14, 'Darchula');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facilities`
--

CREATE TABLE `tbl_facilities` (
  `id` int(11) NOT NULL,
  `facility` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_facilities`
--

INSERT INTO `tbl_facilities` (`id`, `facility`, `status`) VALUES
(1, 'TV', 1),
(2, 'Spa', 1),
(3, 'Suites', 1),
(4, 'Safe Box', 1),
(5, 'Fitness Center /Gym', 1),
(6, 'Restaurant with menu', 1),
(7, 'Limited Hours Staffing', 1),
(8, '24-Hour staffing', 1),
(9, 'Bar/Lounge', 1),
(10, 'Sound System', 1),
(11, 'Room Service', 1),
(12, 'Meeting Room', 1),
(13, 'Vehicle Service', 1),
(14, 'Business Center', 1),
(15, 'Event Services', 1),
(16, 'Swimming Pool', 1),
(17, 'Free Parking', 1),
(18, 'Air Condition', 1),
(19, 'Tour Services', 1),
(20, 'Meeting Room', 1),
(21, 'Wheelchair Access', 1),
(22, 'Out Door Area', 1),
(23, 'Airport Transportation', 1),
(24, 'Casino and Gambling', 1),
(25, 'Free High Speed Internet (WiFi)', 1),
(26, 'Pets Allowed (Dog / Pet Friendly)', 1),
(27, 'Children Activities(Kid/Family Friendly)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotelfacilities`
--

CREATE TABLE `tbl_hotelfacilities` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL COMMENT 'fromtbl_hotels',
  `facility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotelgallery`
--

CREATE TABLE `tbl_hotelgallery` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL COMMENT 'from tbl_hotels',
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotels`
--

CREATE TABLE `tbl_hotels` (
  `id` int(11) NOT NULL,
  `business_user_id` int(11) NOT NULL COMMENT 'from tbl_business',
  `hotel_name` varchar(255) NOT NULL,
  `star_rating` tinyint(1) NOT NULL,
  `hotel_image` varchar(255) NOT NULL,
  `hotel_description` text NOT NULL,
  `hotel_type` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city_village` varchar(255) NOT NULL,
  `things_to_do` text NOT NULL,
  `address_on_map` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `checkin_time` time(6) NOT NULL,
  `checkout_time` time(6) NOT NULL,
  `terms_policy` text NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `fax_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `web_url` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zones`
--

CREATE TABLE `tbl_zones` (
  `id` int(11) NOT NULL,
  `zone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_zones`
--

INSERT INTO `tbl_zones` (`id`, `zone`) VALUES
(1, 'Mechi'),
(2, 'Koshi'),
(3, 'Sagarmatha'),
(4, 'Janakpur'),
(5, 'Bagmati'),
(6, 'Narayani'),
(7, 'Gandaki'),
(8, 'Lumbini'),
(9, 'Dhaulagiri'),
(10, 'Rapti'),
(11, 'Karnali'),
(12, 'Bheri'),
(13, 'Seti'),
(14, 'Mahakali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_business`
--
ALTER TABLE `tbl_business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_businesstypes`
--
ALTER TABLE `tbl_businesstypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_facilities`
--
ALTER TABLE `tbl_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotelfacilities`
--
ALTER TABLE `tbl_hotelfacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotelgallery`
--
ALTER TABLE `tbl_hotelgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotels`
--
ALTER TABLE `tbl_hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_zones`
--
ALTER TABLE `tbl_zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_business`
--
ALTER TABLE `tbl_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_businesstypes`
--
ALTER TABLE `tbl_businesstypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `tbl_facilities`
--
ALTER TABLE `tbl_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_hotelfacilities`
--
ALTER TABLE `tbl_hotelfacilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_hotelgallery`
--
ALTER TABLE `tbl_hotelgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_hotels`
--
ALTER TABLE `tbl_hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_zones`
--
ALTER TABLE `tbl_zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
