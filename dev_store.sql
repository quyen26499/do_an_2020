-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 09, 2020 lúc 09:50 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dev_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `role` int(1) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_job` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_country` text COLLATE utf8_unicode_ci NOT NULL,
  `admin_image` text COLLATE utf8_unicode_ci NOT NULL,
  `admin_about` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `role`, `admin_name`, `admin_email`, `admin_pass`, `admin_job`, `admin_contact`, `admin_country`, `admin_image`, `admin_about`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '123456', 'Student', '012-345-6789', 'Vietnam', 'avatar.jpg', 'John Cenaaaaaa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text COLLATE utf8_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Men', '...'),
(2, 'Woman', '...'),
(3, 'New', '...'),
(4, 'Sale', '...');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_contact` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` text COLLATE utf8_unicode_ci NOT NULL,
  `customer_image` text COLLATE utf8_unicode_ci NOT NULL,
  `customer_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(7, 'John Cena', 'cena@gmail.com', '123456', '0123456789', 'Đà Nẵng', 'avatar.jpg', '::1'),
(8, 'Trần Gia Quyền', 'giaquyen.tran@gmail.com', '123456', '0773293173', 'Nguyễn Công Hoan - Cẩm Lệ - Đà Nẵng', 'avatar.jpg', '::1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `invoice_no`, `due_amount`, `product_id`, `qty`, `order_date`, `order_status`) VALUES
(1, 7, 1902002733, 960, 8, 3, '2020-07-13', 'Complete'),
(2, 7, 554573414, 4500, 17, 5, '2020-07-13', 'Complete'),
(3, 7, 1853120043, 3500, 12, 5, '2020-07-14', 'waiting'),
(4, 8, 1580048679, 9000, 17, 10, '2020-07-14', 'Complete');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_payment`
--

CREATE TABLE `customer_payment` (
  `invoice_no` int(100) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `mode` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `feedback_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feedback_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feedback_subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feedback_message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `mode` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `due_amount`, `product_id`, `qty`, `order_date`, `order_status`, `name`, `phone`, `address`, `mode`) VALUES
(1, 7, 1902002733, 960, 8, 3, '2020-07-13', 'Complete', 'John Cena', '0123456789', 'Đà Nẵng', ''),
(2, 7, 554573414, 4500, 17, 5, '2020-07-13', 'Complete', 'John Cena', '0123456789', 'Đà Nẵng', ''),
(3, 7, 1853120043, 3500, 12, 5, '2020-07-14', 'waiting', 'John Cena', '0123456789', 'Cẩm Lệ - Đà Nẵng', ''),
(4, 8, 1580048679, 9000, 17, 10, '2020-07-14', 'Complete', 'Trần Gia Quyền', '0905472680', 'Nguyễn Công Hoan - Cẩm Lệ - Đà Nẵng', 'offline');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_title` text COLLATE utf8_unicode_ci NOT NULL,
  `product_img1` text COLLATE utf8_unicode_ci NOT NULL,
  `product_img2` text COLLATE utf8_unicode_ci NOT NULL,
  `product_img3` text COLLATE utf8_unicode_ci NOT NULL,
  `product_price` text COLLATE utf8_unicode_ci NOT NULL,
  `product_sold` int(10) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_sold`, `product_quantity`, `product_desc`) VALUES
(7, 1, 3, '2020-07-09 04:55:31', 'The Electricianz Carbon Z Black', 'electricianz1a.png', 'electricianz1b.png', 'electricianz1c.png', '400', 0, 5, '    Electricity keeps the world moving. The Electricianz is on a mission to put that energy in the spotlight. They combine watchmaking techniques with bold colors and patterns for a line of watches that is both creative and reliable.\r\n\r\n    '),
(8, 1, 3, '2020-06-27 10:16:31', 'The Electricianz Cable Z Yellow Blue', 'electricianz2a.png', 'electricianz2b.png', 'electricianz2c.png', '320', 3, 10, ' The Cable Z is an ode to electricity: its explosive bouquet of enmeshed and colorful cables playfully revisits the brand’s distinctive design. Electric-blue meets thunder-yellow, a festival of high-energy.\r\n\r\n '),
(9, 1, 3, '2020-07-08 11:23:07', 'The Electricianz Ammeter Yellow Black', 'electricianz3a.png', 'electricianz3b.png', 'electricianz3c.png', '320', 0, 10, ' Light is an integral part of the design: an exclusive in-house electric module powers four LEDs giving it a spectacular look in the dark. '),
(10, 1, 3, '2020-05-09 15:53:31', 'The Electricianz Dezert Grey Sand', 'electricianz4a.png', 'electricianz4b.png', 'electricianz4c.png', '370', 0, 15, 'The Dezert brings to mind a Mad Max-esque scene of metal in the desert. The watch\'s sharp, clear-cut dial contrasts beautifully in both color and texture to the sand-colored leather NATO strap. The Dezert is a strong contemporary piece featuring a double-battery design - for double the fun. The two visible batteries ensure a long power supply to the LED. When the first one runs off, a tiny red LED goes on, letting you know to switch to the reserve.'),
(11, 2, 1, '2020-05-09 16:01:06', 'Xeric Leadfoot Automatic Silver Navy ', 'xeric1a.png', 'xeric1b.png', 'xeric1c.png', '1000', 0, 15, 'Xeric set out to design a driver’s watch that pays tribute to the iconic cars of the \'60s and \'70s. '),
(12, 2, 1, '2020-05-09 16:13:27', 'Xeric Invertor Automatic Rose Gold ', 'xeric2a.png', 'xeric2c.png', 'xeric2b.png', '700', 5, 15, 'The unique curved case and crystal shape as well as the impressive mechanics allow you to see the time and automatic rotor in the same glance. Each watch colorway is limited to 999 individually numbered pieces.'),
(13, 2, 4, '2020-05-09 16:23:45', 'Xeric Halograph II Automatic Bronze Blue', 'xeric3a.png', 'xeric3b.png', 'xeric3c.png', '500\r\n', 0, 15, 'NOW IN A BRONZE CASE - This natural bronze will patina over time'),
(14, 2, 4, '2020-05-16 08:15:08', 'Xeric Soloscope  RQ  Black  Tan         ', 'xeric4a.png', 'xeric4b.png', 'xeric4c.png', '350', 0, 20, 'Time is read using a single hour hand, fusing hours and minutes. Xeric\'s signature \"halo\" hand encircles the hour and points to the minutes. Each line on the dial is a 5 minute increment so you\'re not stressing about every minute. Sometimes we need to be reminded to relax.'),
(15, 3, 1, '2020-05-16 09:17:21', 'SISU Carburetor  CQ4-50  Swiss        ', 'sisu1a.png', 'sisu1b.png', 'sisu1c.png', '795', 0, 20, 'The CARBURETOR Q4 is an individually serial numbered Limited Edition timepiece.'),
(16, 3, 3, '2020-05-16 09:20:04', 'SISU Bravado A1-50-SS Swiss \r\n', 'sisu2a.png', 'sisu2b.png', 'sisu2c.png', '1000', 0, 16, 'The BRAVADO A1-50 is an individually serial numbered Limited Edition timepiece. '),
(17, 3, 1, '2020-05-17 11:36:24', 'SISU Bravado BA7-50-RB CAGE Swiss', 'sisu3a.png', 'sisu3b.png', 'sisu3c.png', '900', 15, 5, 'The BRAVADO A7-50 is an individually serial numbered Limited Edition timepiece.'),
(18, 3, 3, '2020-05-17 11:39:13', 'SISU Guardian GA4-50-RB Eclipse Swiss', 'sisu4a.png', 'sisu4b.png', 'sisu4c.png', '900', 0, 0, 'The GUARDIAN A4-50 is an individually serial numbered Limited Edition timepiece.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text COLLATE utf8_unicode_ci NOT NULL,
  `p_cat_desc` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Electricianz', '...'),
(2, 'Xeric', '...'),
(3, 'SISU', '...'),
(4, 'CA Watch', '...'),
(5, 'Nixon', '...');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide Number 1', 'slide_1.jpg'),
(2, 'Slide Number 2', 'slide_2.jpg'),
(3, 'Slide Number 3', 'slide_3.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_name`);

--
-- Chỉ mục cho bảng `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `invoice_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1248422850;

--
-- AUTO_INCREMENT cho bảng `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
