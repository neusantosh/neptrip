-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2016 at 07:24 AM
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
-- Table structure for table `tbl_banners`
--

CREATE TABLE `tbl_banners` (
  `id` int(11) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1> Active, 0 > Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banners`
--

INSERT INTO `tbl_banners` (`id`, `banner`, `status`) VALUES
(3, 'banner_1465715339.jpg', 1),
(5, 'banner_1465714816.jpg', 1);

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
(5, 'Hotel Bhattendanda', 'hotel-bhattendanda-4', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', 'testuser1', 'bc51a83eea09846dc02407dd0979968912a207a9', 'testuser1', 1),
(6, 'Hotel Bhattendanda', 'hotel-bhattendanda-5', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', '', '', '', 0),
(7, 'Hotel Bhattendanda', 'hotel-bhattendanda-3', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', '', '', '', 1),
(8, 'Hotel Bhattendanda', 'hotel-bhattendanda-7', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', '', '', '', 0),
(9, 'Hotel Bhattendanda', 'hotel-bhattendanda-2', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', 'testuser1', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'password', 0),
(13, 'Hotel Bhattendanda', 'hotel-bhattendanda-12', 'Hotel', 'Bhattendanda', 'Bhattendanda Marg', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490101', '', '', 'info@hotelbhattedanda.com', 'http://www.hotelbhattedanda.com', '', 'Mrs. Phool Maya Tamang', 'Director', '9849347506', 'banner3.jpg', '', '', '', '', 0),
(14, 'Forest Hideaway', 'forest-hideaway', 'Hotel', 'bardia', 'ghorahi', '44600', 'nepalgunj', 4, '7', 'Karnali', 'Taplejung', '9422442424', '', '', 'sdsfdsf@di.fsf', 'http://forest.com', 'http://facebook.com/forest', 'niroz', 'manager', '09880002', '', '', 'username', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 1),
(15, 'Hotel Bhattendanda', 'hotel-bhattendanda', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kathmandu', '011490762', '', '', 'info@hotelbhattedanda.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(16, ' 	Hotel Bhattendanda', 'hotel-bhattendanda-1', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kathmandu', '011490762', '', '', 'info@hotelbhattedanda.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(17, 'Hotel Bhattendanda', 'hotel-bhattendanda-6', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kathmandu', '011490762', '', '', 'info@hotelbhattedanda.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(18, 'Hotel Bhattendanda', 'hotel-bhattendanda-8', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kathmandu', '011490762', '', '', 'info@hotelbhattedanda.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(19, 'Hotel Bhattendanda', 'hotel-bhattendanda-9', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490762', '', '', 'info@hotelbhattedanda.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(20, 'Hotel Bhattendanda', 'hotel-bhattendanda-10', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490762', '', '', 'info@hotelbhattedanda.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(21, 'Hotel Bhattendanda', 'hotel-bhattendanda-11', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kathmandu', '011490762', '', '', 'neu.santosh@gmail.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(22, 'Hotel Bhattendanda', 'hotel-bhattendanda-13', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kathmandu', '011490762', '', '', 'neu.santosh@gmail.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(23, 'Hotel Bhattendanda', 'hotel-bhattendanda-14', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kathmandu', '011490762', '', '', 'neu.santosh@gmail.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(24, 'Hotel Bhattendanda', 'hotel-bhattendanda-15', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kathmandu', '011490762', '', '', 'neu.santosh@gmail.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(25, 'Hotel Bhattendanda', 'hotel-bhattendanda-16', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kathmandu', '011490762', '', '', 'neu.santosh@gmail.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(26, 'Hotel Bhattendanda', 'hotel-bhattendanda-17', 'Hotel', 'Dhulikhel', 'Resort Marga', '44600', 'Dhulikhel', 1, '361', 'Bagmati', 'Kavrepalanchok', '011490762', '', '', 'info@hotelbhattedanda.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0),
(27, 'Hotel Bhattendanda1', 'hotel-bhattendanda1', 'Hotel', 'Dhulikhel', 'Resort Marga', '45200', 'Dhulikhel', 1, '361', 'Bagmati', 'Kathmandu', '011490762', '', '', 'info@hotelbhattedanda1.com', '', '', 'Ram B. Thapa', 'CEO', '9849347506', '', '', '', '', '', 0);

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
-- Table structure for table `tbl_diningstyles`
--

CREATE TABLE `tbl_diningstyles` (
  `id` int(11) NOT NULL,
  `diningstyle` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diningstyles`
--

INSERT INTO `tbl_diningstyles` (`id`, `diningstyle`, `status`) VALUES
(1, 'Breakfast', 1),
(2, 'Delivery', 1),
(3, 'Take Out', 1),
(4, 'Dinner', 1),
(5, 'Lunch', 1),
(6, 'Bar', 1),
(7, 'Late Night', 1),
(8, 'Desert', 1),
(9, 'Late Self Service', 1);

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

--
-- Dumping data for table `tbl_hotelfacilities`
--

INSERT INTO `tbl_hotelfacilities` (`id`, `hotel_id`, `facility`) VALUES
(37, 1, 1),
(38, 1, 2),
(39, 2, 1),
(40, 2, 3),
(41, 2, 4),
(42, 2, 6),
(43, 2, 7),
(44, 2, 9),
(45, 2, 10),
(46, 2, 11),
(47, 2, 12),
(48, 2, 17),
(49, 2, 18),
(50, 2, 21),
(51, 2, 25);

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

--
-- Dumping data for table `tbl_hotelgallery`
--

INSERT INTO `tbl_hotelgallery` (`id`, `hotel_id`, `image`, `status`) VALUES
(1, 1, '140122005134ytmhqs.jpg', 1),
(2, 1, '140122005135c3m8ng.jpg', 1),
(3, 1, '140122005136rmk0s8.jpg', 1),
(4, 1, '140122005136x2hp53.jpg', 1),
(5, 2, '140122005135c3m8ng.jpg', 1),
(6, 2, '140122005134ytmhqs.jpg', 1),
(7, 2, '140122005136rmk0s8.jpg', 1),
(8, 2, '140122005136x2hp53.jpg', 1),
(9, 2, '14012200513373nya6.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotelrooms`
--

CREATE TABLE `tbl_hotelrooms` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL COMMENT 'from tbl_hotels',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `no_rooms` int(11) NOT NULL,
  `minimum_stay` int(11) NOT NULL,
  `room_type` int(11) NOT NULL,
  `max_adults` int(11) NOT NULL,
  `max_children` int(11) NOT NULL,
  `no_extrabed` int(11) NOT NULL,
  `bedcharges` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotelrooms`
--

INSERT INTO `tbl_hotelrooms` (`id`, `hotel_id`, `status`, `name`, `slug`, `description`, `price`, `no_rooms`, `minimum_stay`, `room_type`, `max_adults`, `max_children`, `no_extrabed`, `bedcharges`) VALUES
(1, 2, 1, 'Standard Room', 'standard-room', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '50 ', 10, 1, 14, 2, 1, 1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotels`
--

CREATE TABLE `tbl_hotels` (
  `id` int(11) NOT NULL,
  `business_user_id` int(11) NOT NULL COMMENT 'from tbl_business',
  `hotel_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `star_rating` tinyint(1) NOT NULL,
  `hotel_image` varchar(255) NOT NULL,
  `hotel_description` text NOT NULL,
  `hotel_type` varchar(255) NOT NULL,
  `zone` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `city_village` varchar(255) NOT NULL,
  `things_to_do` text NOT NULL,
  `address_on_map` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `checkin_time` varchar(255) NOT NULL,
  `checkout_time` varchar(255) NOT NULL,
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
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `suspend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0> not suspended, 1> suspended'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotels`
--

INSERT INTO `tbl_hotels` (`id`, `business_user_id`, `hotel_name`, `slug`, `star_rating`, `hotel_image`, `hotel_description`, `hotel_type`, `zone`, `district`, `city_village`, `things_to_do`, `address_on_map`, `latitude`, `longitude`, `checkin_time`, `checkout_time`, `terms_policy`, `phone1`, `phone2`, `fax_no`, `email`, `facebook`, `web_url`, `contact_person`, `role`, `mobile_number`, `status`, `suspend`) VALUES
(1, 2, 'Hotel Araniko Pvt. Ltd', 'hotel-araniko-pvt-ltd', 0, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Hotel', 5, 26, 'Dhulikhel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Hotel Araniko, Araniko Highway, Dhulikhel, Central Region, Nepal', '27.6267302', '85.5381668', '17:00', '12:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '787-454-5645', '', '', 'test@text.com', 'http://facebook.com', 'http://google.com', 'Ram Bahadur', 'CEO', '787-878-7878', 1, 0),
(2, 5, 'Hotel Araniko', 'hotel-araniko', 0, 'hotels_1465731179.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Hotel', 5, 26, 'Dhulikhel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Hotel Araniko, Araniko Highway, Dhulikhel, Central Region, Nepal', '27.6267302', '85.5381668', '17:00', '12:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '011-490-480_', '', '', 'hotelarniko@hotmail.com', 'https://www.facebook.com/pages/Hotel-Arniko/61239333545898', 'http://www.hotelarniko.com/', 'Ram B Thapa', 'Manager', '984-934-7506', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletters`
--

CREATE TABLE `tbl_newsletters` (
  `id` int(11) NOT NULL,
  `newsletter_title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `newsletter_content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1>Published 0>Not Published '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_newsletters`
--

INSERT INTO `tbl_newsletters` (`id`, `newsletter_title`, `slug`, `newsletter_content`, `status`) VALUES
(1, 'New Year', 'new-year', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `page_description` text NOT NULL,
  `page_seo_meta_keywords` varchar(255) NOT NULL,
  `page_seo_meta_title` varchar(255) NOT NULL,
  `page_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1> Published, 0 > Publish Later',
  `page_seo_meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `page_title`, `slug`, `page_description`, `page_seo_meta_keywords`, `page_seo_meta_title`, `page_status`, `page_seo_meta_description`) VALUES
(1, 'About Us', 'about-us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem, Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, ''),
(2, 'Lorem Ipsum12', 'lorem-ipsum12', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem, Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(3, 'test', 'test', '<p>Test</p>', 'test', 'test', 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resturantdiningstyle`
--

CREATE TABLE `tbl_resturantdiningstyle` (
  `id` int(11) NOT NULL,
  `resturant_id` int(11) NOT NULL COMMENT 'from tbl_resturants',
  `resturant_diningstyle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resturantdiningstyle`
--

INSERT INTO `tbl_resturantdiningstyle` (`id`, `resturant_id`, `resturant_diningstyle`) VALUES
(11, 2, '3'),
(12, 2, '4'),
(13, 2, '5'),
(14, 2, '6'),
(15, 2, '7'),
(54, 3, '1'),
(55, 3, '2'),
(56, 3, '3'),
(57, 3, '4'),
(58, 3, '5'),
(59, 3, '6'),
(60, 3, '7'),
(61, 3, '8'),
(62, 3, '9'),
(75, 4, '1'),
(76, 4, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resturantfacilities`
--

CREATE TABLE `tbl_resturantfacilities` (
  `id` int(11) NOT NULL,
  `facility` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resturantfacilities`
--

INSERT INTO `tbl_resturantfacilities` (`id`, `facility`, `status`) VALUES
(1, 'Tv', 1),
(2, 'Bar/Lounge', 1),
(3, 'Vehicle Service', 1),
(4, 'SPA', 1),
(5, 'Sound System', 1),
(6, 'Business Center', 1),
(7, 'Event Services', 1),
(8, 'Safe Box', 1),
(9, 'Meeting Room', 1),
(10, 'Swiming Pool', 1),
(11, 'WheelChair Access', 1),
(12, 'Fitness Center/Gym', 1),
(13, 'High Speed Internet(Wifi)', 1),
(14, 'Out Door Area', 1),
(15, 'Restaurant With Menu', 1),
(16, 'Pets Allowed(Dog/Pet Friendly)', 1),
(17, 'Air Transportation', 1),
(18, 'Limited Hour Staffing', 1),
(19, 'Childern Activity(Kids/Family Friendly)', 1),
(20, 'Casino & Gambling', 1),
(21, '24 Hour Staffing', 1),
(22, 'Mountain View', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resturantfacility`
--

CREATE TABLE `tbl_resturantfacility` (
  `id` int(11) NOT NULL,
  `resturant_id` int(11) NOT NULL COMMENT 'from tbl_resturants',
  `facility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resturantfacility`
--

INSERT INTO `tbl_resturantfacility` (`id`, `resturant_id`, `facility`) VALUES
(8, 2, 1),
(9, 2, 2),
(10, 2, 3),
(11, 2, 6),
(12, 2, 7),
(13, 2, 8),
(14, 2, 11),
(15, 2, 13),
(26, 3, 2),
(27, 3, 5),
(40, 4, 1),
(41, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resturantgallery`
--

CREATE TABLE `tbl_resturantgallery` (
  `id` int(11) NOT NULL,
  `resturant_id` int(11) NOT NULL COMMENT 'from tbl_resturant',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resturantgallery`
--

INSERT INTO `tbl_resturantgallery` (`id`, `resturant_id`, `image`) VALUES
(1, 2, 'food-q-c-640-480-2.jpg'),
(2, 2, 'food-q-c-640-480-3.jpg'),
(3, 2, 'food-q-c-640-480-4.jpg'),
(4, 3, 'bakery-cafe-cakes.jpg'),
(5, 3, 'the-bakery-cafe.jpg'),
(6, 4, 'the-bakery-cafe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resturants`
--

CREATE TABLE `tbl_resturants` (
  `id` int(11) NOT NULL,
  `business_user_id` int(11) NOT NULL COMMENT 'from tbl_business',
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `booking_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `resturant_type` varchar(255) NOT NULL,
  `zone` int(11) NOT NULL COMMENT 'from tbl_zones',
  `district` int(11) NOT NULL COMMENT 'from tbl_districts',
  `city_village` varchar(255) NOT NULL,
  `things_todo` text NOT NULL,
  `addressonmap` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `terms_condition` text NOT NULL,
  `opening_hour` varchar(255) NOT NULL,
  `closing_hour` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `weblink` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `suspend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '> 0 not suspended, 1 > suspended'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resturants`
--

INSERT INTO `tbl_resturants` (`id`, `business_user_id`, `name`, `slug`, `booking_price`, `image`, `description`, `resturant_type`, `zone`, `district`, `city_village`, `things_todo`, `addressonmap`, `latitude`, `longitude`, `terms_condition`, `opening_hour`, `closing_hour`, `phone1`, `phone2`, `fax`, `email`, `fb_link`, `weblink`, `contact_person`, `role`, `mobile_number`, `status`, `suspend`) VALUES
(2, 2, 'Nanglo Express Cafe', 'nanglo-express-cafe', 100, 'resturant_1464768353.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Modern', 5, 25, 'Teku', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Nanglo Express, Naya Sadak, Kathmandu, Central Region, Nepal', '27.7036415', '85.30963320000001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '12:00', '23:00', '123456789', '', '', 'TEST@TEST.COM', 'http://fb.com', 'http://google.com', 'AK Thakuri', 'CEO', '123456789', 1, 0),
(3, 2, 'The Bakery Cafe', 'the-bakery-cafe', 100, 'resturant_1465125850.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Modern', 5, 25, 'Kathmandu', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'The Bakery Cafe, Devkota Sadak, Kathmandu, Central Region, Nepal', '27.699298', '85.33828189999997', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '1100', '2300', '784-531-2311', '456-456-4513', '789-786-4321', 'test@test.com', 'http://facebook.com', 'http://google.com', 'Rambahadur', 'CEo', '787-441-5123', 1, 1),
(4, 2, 'jpt', 'jpt', 1200, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'Classic', 5, 25, 'Kathmandu', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'Kathmandu, Central Region, Nepal', '27.7172453', '85.3239605', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', '1100', '2300', '152-156-4564', '456-487-8742', '154-867-8451', 'test@test.com', 'http://facebook.com', 'http://google.com', 'Ram Bahadur ', 'CEo', '895-456-1564', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomfacilities`
--

CREATE TABLE `tbl_roomfacilities` (
  `id` int(11) NOT NULL,
  `roomfacility` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roomfacilities`
--

INSERT INTO `tbl_roomfacilities` (`id`, `roomfacility`, `status`) VALUES
(1, 'Access via exterior corridors', 1),
(2, 'Bathroom phone', 1),
(3, 'Climate control', 1),
(4, ' Courtyard view', 1),
(5, 'Extra towels/bedding', 1),
(6, 'Hair dryer', 1),
(7, 'Individually decorated', 1),
(8, 'In-room safe (laptop compatible)', 1),
(9, 'Makeup/shaving mirror', 1),
(10, 'Refrigerator', 1),
(11, 'Shower/tub combination', 1),
(12, 'Welcome amenities', 1),
(13, 'Air conditioning', 1),
(14, 'Blackout drapes/curtains', 1),
(15, 'Cribs/infant beds available', 1),
(16, 'Dial-up Internet access (surcharge)', 1),
(17, 'Free Wi-Fi', 1),
(18, 'Handheld showerhead', 1),
(19, 'Iron/ironing board (on request)', 1),
(20, 'Minibar', 1),
(21, 'Satellite TV service', 1),
(22, 'Slippers', 1),
(23, 'Bathrobes', 1),
(24, 'City view', 1),
(25, 'Complimentary weekday newspaper', 1),
(26, 'Daily housekeeping', 1),
(27, 'Direct-dial phone', 1),
(28, 'Free wired high-speed Internet', 1),
(29, 'Hypo-allergenic bedding available', 1),
(30, 'In-room childcare (surcharge)', 1),
(31, 'LCD TV', 1),
(32, 'Private bathroom', 1),
(33, 'Bathrobes', 1),
(34, 'Wake-up calls', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomfacility`
--

CREATE TABLE `tbl_roomfacility` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL COMMENT 'from tbl_room',
  `facility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roomfacility`
--

INSERT INTO `tbl_roomfacility` (`id`, `room_id`, `facility`) VALUES
(109, 8, '1'),
(110, 8, '2'),
(111, 8, '3'),
(112, 2, '1'),
(113, 2, '2'),
(114, 2, '3'),
(115, 2, '4'),
(116, 2, '5'),
(117, 2, '6'),
(118, 2, '7'),
(119, 2, '8'),
(120, 2, '9'),
(121, 2, '10'),
(122, 2, '11'),
(123, 2, '12'),
(124, 2, '13'),
(125, 2, '14'),
(126, 2, '15'),
(127, 2, '16'),
(128, 2, '17'),
(129, 2, '18'),
(130, 2, '19'),
(131, 2, '20'),
(132, 2, '21'),
(133, 2, '22'),
(134, 2, '23'),
(135, 2, '24'),
(136, 2, '25'),
(137, 2, '26'),
(138, 2, '27'),
(139, 2, '28'),
(140, 2, '29'),
(141, 2, '30'),
(142, 2, '31'),
(143, 2, '32'),
(144, 2, '33'),
(145, 2, '34'),
(146, 1, '1'),
(147, 1, '2'),
(148, 1, '3'),
(149, 1, '4'),
(150, 1, '5'),
(151, 1, '6'),
(152, 1, '7'),
(153, 1, '8'),
(154, 1, '9'),
(155, 1, '20'),
(156, 1, '22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomgallery`
--

CREATE TABLE `tbl_roomgallery` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL COMMENT 'from tbl_hotelrooms',
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roomgallery`
--

INSERT INTO `tbl_roomgallery` (`id`, `room_id`, `image`, `status`) VALUES
(7, 2, 'nightlife-q-c-640-480-7.jpg', 1),
(8, 2, 'people-q-c-640-480-3.jpg', 1),
(9, 2, 'common kestrel.jpg', 1),
(10, 1, '140122005134ytmhqs.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomtypes`
--

CREATE TABLE `tbl_roomtypes` (
  `id` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roomtypes`
--

INSERT INTO `tbl_roomtypes` (`id`, `room_type`, `status`) VALUES
(1, 'One-Bedroom Apartment', 1),
(2, 'Two-Bedroom Apartment', 1),
(3, 'Studio Apartment With Creek View', 1),
(4, 'Executive Two-Bedrooms Apartment', 1),
(5, 'Double or Twin Rooms', 1),
(6, 'Triple Rooms', 1),
(7, 'Superior Double', 1),
(8, 'Junior Suites', 1),
(9, 'Classic Double or Twin Rooms', 1),
(10, 'Interconnecting Classic Room', 1),
(11, 'Delux Room', 1),
(12, 'Double Deluxe Rooms', 1),
(13, 'Royal Platinum Suite', 1),
(14, 'Standard Room', 1),
(15, 'One-Bedroom Executive', 1),
(16, 'Studio Premier', 1),
(17, 'Executive Suite', 1),
(18, 'Extra Bed / Child', 1),
(19, 'Presidential Suite', 1),
(20, 'Family Room & Twin / Large Superior', 1),
(21, 'Garden View Room', 1),
(22, 'Ocean View Room', 1),
(23, 'Classic Double Room', 1),
(24, 'Classic Single Room', 1),
(25, 'Superior Single View', 1),
(26, 'Superior Park View', 1),
(27, 'Single', 1),
(28, 'Double', 1),
(29, 'Guest Rooms', 1),
(30, 'Accessible Rooms', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siteconfig`
--

CREATE TABLE `tbl_siteconfig` (
  `id` int(11) NOT NULL,
  `seo_meta_keywords` varchar(255) NOT NULL,
  `seo_meta_title` varchar(255) NOT NULL,
  `seo_meta_description` text NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `google_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siteconfig`
--

INSERT INTO `tbl_siteconfig` (`id`, `seo_meta_keywords`, `seo_meta_title`, `seo_meta_description`, `fb_link`, `google_link`, `twitter_link`) VALUES
(1, 'Neptrip12', 'Neptrip is a nepalese classified portal12', 'Neptriop is a classified travel portal 212121 12 21 21 21', 'http://facebook.com/neptrip1', 'https://plus.google.com/neptrip1', 'https://twitter.com/neptrip1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribers`
--

CREATE TABLE `tbl_subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subscribers`
--

INSERT INTO `tbl_subscribers` (`id`, `email`, `created_on`) VALUES
(1, 'neu.santosh@gmail.com', '2016-6-12\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tours`
--

CREATE TABLE `tbl_tours` (
  `id` int(11) NOT NULL,
  `business_user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `business_name` varchar(255) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tour_description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `zone` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `city_village` varchar(255) NOT NULL,
  `package_price` int(11) NOT NULL,
  `things_to_do` text NOT NULL,
  `terms_and_policy` text NOT NULL,
  `phone_1` varchar(255) NOT NULL,
  `phone_2` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_person_role` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `address_on_map` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `suspend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0> not suspended, 1> suspended'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tours`
--

INSERT INTO `tbl_tours` (`id`, `business_user_id`, `status`, `business_name`, `tour_name`, `slug`, `image`, `tour_description`, `type`, `zone`, `district`, `city_village`, `package_price`, `things_to_do`, `terms_and_policy`, `phone_1`, `phone_2`, `fax`, `email`, `facebook`, `web`, `contact_person`, `contact_person_role`, `mobile_number`, `address_on_map`, `latitude`, `longitude`, `suspend`) VALUES
(2, 2, 1, 'My Business12', 'Manang Trek', 'manang-trek', 'tours_1465109944.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Adventure', 5, 25, 'Kathmandu', 1200, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '123-455-5555', '', '', 'test@test.com', 'http://fb.com', 'http://google.com', 'Mr Sam ', 'CEo', '323', 'Kathmandu Metropolitan City, Central Region, Nepal', 'Kathmandu Metropolitan City, Central Region, Nepal', '85.3239605', 0),
(3, 2, 1, 'ABC Trekking Pvt Ltd', 'Short Hiking', 'short-hiking', 'tours_1465112233.jpg', 'fdsfdsfds', 'Adventure', 10, 17, 'Test', 1200, 'Test Description goes here', 'fsdfdsfdsfsd', '454-545-4545', '211-212-1212', '897-989-0890', 'test@test.com', 'http://facebook.com', 'http://google.com', 'Test', 'Test', '214-748-3647', 'GOSSIP GIRL, Battisputali, Central Region, Nepal', 'GOSSIP GIRL, Battisputali, Central Region, Nepal', '85.34105090000003', 0),
(4, 2, 1, 'asdsadsad', 'dsadsadasdasdsad', 'dsadsadasdasdsad', '', 'dsadsahdsajdskijdsal kjdsakl ', 'Adventure', 1, 1, 'fdsjkfjdklfj', 122, 'fdsjufkdsjfd slkjfdskl jfsdkl', 'fghsij hfdsk hfdkjshfdsk jhfsd', '121-212-1211', '678-678-6786', '565-656-5656', 'test@test.com', 'http://facebook.com', 'http://google.com', 'Test Person', 'CEO', '454-854-5645', 'Kathmandu Durbar Square, Kathmandu, Central Region, Nepal', 'Kathmandu Durbar Square, Kathmandu, Central Region, Nepal', '85.30729610000003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toursgallery`
--

CREATE TABLE `tbl_toursgallery` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL COMMENT 'from tbl_tours',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_toursgallery`
--

INSERT INTO `tbl_toursgallery` (`id`, `tour_id`, `image`) VALUES
(3, 2, 'fashion-q-c-640-480-4.jpg'),
(4, 2, 'food-q-c-640-480-3.jpg'),
(5, 2, 'fashion-q-c-640-480-8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicles`
--

CREATE TABLE `tbl_vehicles` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `business_user_id` int(11) NOT NULL COMMENT 'from tbl_business',
  `car_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `car_description` text NOT NULL,
  `passenger` int(11) NOT NULL,
  `car_door` int(11) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `baggage` varchar(255) NOT NULL,
  `airport_pickup` tinyint(4) NOT NULL DEFAULT '1',
  `car_type` varchar(255) NOT NULL,
  `pick_up_location` varchar(255) NOT NULL,
  `drop_off_location` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `terms_and_condition` text NOT NULL,
  `phone_1` varchar(255) NOT NULL,
  `phone_2` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `address_on_map` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `suspend` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0> not suspended, 1> suspended'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehicles`
--

INSERT INTO `tbl_vehicles` (`id`, `status`, `business_user_id`, `car_name`, `slug`, `image`, `car_description`, `passenger`, `car_door`, `transmission`, `baggage`, `airport_pickup`, `car_type`, `pick_up_location`, `drop_off_location`, `price`, `terms_and_condition`, `phone_1`, `phone_2`, `fax`, `email`, `facebook`, `web`, `contact_person`, `role`, `mobile_number`, `address_on_map`, `latitude`, `longitude`, `suspend`) VALUES
(2, 1, 2, 'Scorpio', 'scorpio', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 8, 5, 'Manual', 'x3', 0, 'Fullsize', 'Chitwan, Central Region, Nepal', 'Kathmandu', '4000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '123456789', '', '', 'test@test.com', 'http://fb.com', 'http://google.com', 'Mr Sant', 'CEO', '984052323', '', '', '', 0),
(3, 1, 2, 'Range Rover', 'range-rover', 'vehicles_1465195408.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 5, 5, 'Auto', 'x4', 0, 'Luxury', 'Kathmandu, Central Region, Nepal', 'Dhulikhel, Central Region, Nepal', '5000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', '011-490-762_', '787-878-5456', '456-456-4564', '4564564564@tesghd.com', 'http://facebook.com', 'http://google.com', 'Ram Bahadur', 'Driver', '984-934-7506', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venuefacilities`
--

CREATE TABLE `tbl_venuefacilities` (
  `id` int(11) NOT NULL,
  `facility` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_venuefacilities`
--

INSERT INTO `tbl_venuefacilities` (`id`, `facility`, `status`) VALUES
(1, 'Tv', 1),
(2, 'Bar/Lounge', 1),
(3, 'Vehicle Service', 1),
(4, 'SPA', 1),
(5, 'Sound System', 1),
(6, 'Business Center', 1),
(7, 'Suite', 1),
(8, 'Room Service', 1),
(9, 'Event Services', 1),
(10, 'Safe Box', 1),
(11, 'Meeting Room', 1),
(12, 'Swiming Pool', 1),
(13, 'WheelChair Access', 1),
(14, 'Fitness Center/Gym', 1),
(15, 'High Speed Internet(Wifi)', 1),
(16, 'Out Door Area', 1),
(17, 'Restaurant With Menu', 1),
(18, 'Pets Allowed(Dog/Pet Friendly)', 1),
(19, 'Restaurant With Menu', 1),
(20, 'Limited Hour Staffing', 1),
(21, 'Childern Activity(Kids/Family Friendly)', 1),
(22, 'Casino & Gambling', 1),
(23, '24 Hour Staffing', 1),
(24, 'Mountain View', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venuefacility`
--

CREATE TABLE `tbl_venuefacility` (
  `id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL COMMENT 'from tbl_venuefacility',
  `facility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_venuefacility`
--

INSERT INTO `tbl_venuefacility` (`id`, `venue_id`, `facility`) VALUES
(65, 1, 11),
(66, 1, 13),
(67, 1, 15),
(68, 1, 16),
(69, 1, 17),
(70, 1, 18),
(71, 1, 19),
(72, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venuegallery`
--

CREATE TABLE `tbl_venuegallery` (
  `id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_venuegallery`
--

INSERT INTO `tbl_venuegallery` (`id`, `venue_id`, `image`) VALUES
(1, 1, '32038eab656e9efc5b8e601955eba881.jpg'),
(2, 1, '93599873.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venues`
--

CREATE TABLE `tbl_venues` (
  `id` int(11) NOT NULL,
  `business_user_id` int(11) NOT NULL COMMENT 'from tbl_business',
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `booking_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `venue_type` varchar(255) NOT NULL,
  `zone` int(11) NOT NULL COMMENT 'from tbl_zones',
  `district` int(11) NOT NULL COMMENT 'from tbl_districts',
  `city_village` varchar(255) NOT NULL,
  `things_todo` text NOT NULL,
  `addressonmap` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `terms_condition` text NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `weblink` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `suspend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0> not suspended, 1> suspended'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_venues`
--

INSERT INTO `tbl_venues` (`id`, `business_user_id`, `name`, `slug`, `booking_price`, `image`, `description`, `venue_type`, `zone`, `district`, `city_village`, `things_todo`, `addressonmap`, `latitude`, `longitude`, `terms_condition`, `phone1`, `phone2`, `fax`, `email`, `fb_link`, `weblink`, `contact_person`, `role`, `mobile_number`, `status`, `suspend`) VALUES
(1, 2, 'Bhrikuti Mandap', 'bhrikuti-mandap', 1200, '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Hotel Venue', 5, 25, 'Kathmandu', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Bhrikuti Mandap Marg, Kathmandu, Central Region, Nepal', '27.7001103', '85.31826590000003', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '565-656-5656', '787-897-8456', '564-164-1756', 'test@test.com', 'http://facebook.com', 'http://google.com', 'Ram Bahadur Thapa', 'Ram Bahadur Thapa', '415-412-1231', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venuespecalities`
--

CREATE TABLE `tbl_venuespecalities` (
  `id` int(11) NOT NULL,
  `venuespecilaties` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_venuespecalities`
--

INSERT INTO `tbl_venuespecalities` (`id`, `venuespecilaties`, `status`) VALUES
(1, 'Exhibition', 1),
(2, 'Entertainment Event', 1),
(3, 'Meeting Conference', 1),
(4, 'Sports Event', 1),
(5, 'Musical Event/Concert', 1),
(6, 'Musical Party', 1),
(7, 'Business Work', 1),
(8, 'Private/Group Party', 1),
(9, 'Weeding Party/Reception', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venuespecality`
--

CREATE TABLE `tbl_venuespecality` (
  `id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL COMMENT 'from tbl_venue',
  `specality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_venuespecality`
--

INSERT INTO `tbl_venuespecality` (`id`, `venue_id`, `specality`) VALUES
(33, 1, 1),
(34, 1, 2),
(35, 1, 4),
(36, 1, 6);

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
-- Indexes for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
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
-- Indexes for table `tbl_diningstyles`
--
ALTER TABLE `tbl_diningstyles`
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
-- Indexes for table `tbl_hotelrooms`
--
ALTER TABLE `tbl_hotelrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotels`
--
ALTER TABLE `tbl_hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_newsletters`
--
ALTER TABLE `tbl_newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resturantdiningstyle`
--
ALTER TABLE `tbl_resturantdiningstyle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resturantfacilities`
--
ALTER TABLE `tbl_resturantfacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resturantfacility`
--
ALTER TABLE `tbl_resturantfacility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resturantgallery`
--
ALTER TABLE `tbl_resturantgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resturants`
--
ALTER TABLE `tbl_resturants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roomfacilities`
--
ALTER TABLE `tbl_roomfacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roomfacility`
--
ALTER TABLE `tbl_roomfacility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roomgallery`
--
ALTER TABLE `tbl_roomgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roomtypes`
--
ALTER TABLE `tbl_roomtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siteconfig`
--
ALTER TABLE `tbl_siteconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tours`
--
ALTER TABLE `tbl_tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_toursgallery`
--
ALTER TABLE `tbl_toursgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_venuefacilities`
--
ALTER TABLE `tbl_venuefacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_venuefacility`
--
ALTER TABLE `tbl_venuefacility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_venuegallery`
--
ALTER TABLE `tbl_venuegallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_venues`
--
ALTER TABLE `tbl_venues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_venuespecalities`
--
ALTER TABLE `tbl_venuespecalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_venuespecality`
--
ALTER TABLE `tbl_venuespecality`
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
-- AUTO_INCREMENT for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_business`
--
ALTER TABLE `tbl_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_businesstypes`
--
ALTER TABLE `tbl_businesstypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_diningstyles`
--
ALTER TABLE `tbl_diningstyles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_hotelgallery`
--
ALTER TABLE `tbl_hotelgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_hotelrooms`
--
ALTER TABLE `tbl_hotelrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_hotels`
--
ALTER TABLE `tbl_hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_newsletters`
--
ALTER TABLE `tbl_newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_resturantdiningstyle`
--
ALTER TABLE `tbl_resturantdiningstyle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `tbl_resturantfacilities`
--
ALTER TABLE `tbl_resturantfacilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_resturantfacility`
--
ALTER TABLE `tbl_resturantfacility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_resturantgallery`
--
ALTER TABLE `tbl_resturantgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_resturants`
--
ALTER TABLE `tbl_resturants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_roomfacilities`
--
ALTER TABLE `tbl_roomfacilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_roomfacility`
--
ALTER TABLE `tbl_roomfacility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `tbl_roomgallery`
--
ALTER TABLE `tbl_roomgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_roomtypes`
--
ALTER TABLE `tbl_roomtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_siteconfig`
--
ALTER TABLE `tbl_siteconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_tours`
--
ALTER TABLE `tbl_tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_toursgallery`
--
ALTER TABLE `tbl_toursgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_venuefacilities`
--
ALTER TABLE `tbl_venuefacilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_venuefacility`
--
ALTER TABLE `tbl_venuefacility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `tbl_venuegallery`
--
ALTER TABLE `tbl_venuegallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_venues`
--
ALTER TABLE `tbl_venues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_venuespecalities`
--
ALTER TABLE `tbl_venuespecalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_venuespecality`
--
ALTER TABLE `tbl_venuespecality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_zones`
--
ALTER TABLE `tbl_zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
