-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2023 at 12:49 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batikku`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `carts_id` int(11) NOT NULL,
  `users_id` int(25) NOT NULL,
  `products_id` int(25) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `photo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `name_category`, `slug`, `photo`) VALUES
(1, 'Batik Tulis', 'batik-tulis', '457934551_4.png'),
(3, 'Batik Sutra', 'batik-sutra', '1796539152_3.png'),
(4, 'Batik Jawa', 'batik-jawa', '808887569_8.png'),
(5, 'Batik Cap', 'batik-cap', '970770525_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `price` int(25) NOT NULL,
  `description` text NOT NULL,
  `weight` float NOT NULL,
  `stock` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `product_name`, `slug`, `categories_id`, `price`, `description`, `weight`, `stock`) VALUES
(1, 'Batik Sutra Type A01', 'batik-sutra-type-a01', 3, 99000, '<p>Produk batik sutra Type A001 adalah karya seni yang memadukan keindahan batik tradisional dengan kemewahan sutra. Batik ini dirancang dengan detail yang halus dan motif yang elegan, menciptakan kesan yang anggun dan istimewa.</p>\r\n', 0.3, 10),
(2, 'Batik Tulis Type D01', 'batik-tulis-type-d01', 1, 45000, '<p>Batik tulis Type D01 adalah bukti nyata dari keindahan dan keahlian tangan para seniman batik. Batik tulis ini dibuat dengan menggunakan teknik tulis yang merupakan salah satu teknik paling kuno dan autentik dalam pembuatan batik. Setiap pola dan motif pada batik ini dihasilkan dengan ketelitian tinggi, melalui proses pembatikan yang dilakukan secara manual.</p>\r\n', 0.3, 78),
(3, 'Batik Jawa Type B01', 'batik-jawa-type-b01', 4, 76000, '<p>Produk batik Jawa Type B001 adalah representasi yang indah dari kekayaan budaya dan warisan seni batik Jawa. Batik ini menggabungkan teknik tradisional dengan sentuhan modern, menghasilkan hasil akhir yang menakjubkan dan memikat.</p>\r\n', 0.3, 20),
(4, 'Batik Cap Type C01', 'batik-cap-type-c01', 5, 85000, '<p>Produk batik cap Type C01 adalah perpaduan yang menawan antara tradisi dan inovasi dalam dunia batik. Batik cap ini dibuat dengan menggunakan teknik cap yang merupakan salah satu teknik tradisional dalam pembuatan batik. Setiap pola dan motif pada batik ini dihasilkan dengan teliti dan hati-hati menggunakan cap tangan yang khas.</p>\r\n', 0.2, 98);

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `galleries_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `photos` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`galleries_id`, `products_id`, `photos`) VALUES
(1, 1, '6482dec54b7b5-Batik Sutra 1 .png'),
(2, 1, '6482dec551055-Batik Sutra 2.png'),
(3, 1, '6482dec552005-Batik Sutra 3.png'),
(4, 2, '64831db4ae35f-Batik Tulis 1.png'),
(5, 2, '64831db4af14d-Batik Tulis 2.png'),
(6, 2, '64831db4b0472-Batik Tulis 3.png'),
(8, 3, '64831dff7c9b1-Batik Jawa 1.png'),
(9, 3, '64831dff7f87b-Batik Jawa 2.png'),
(10, 3, '64831dff85b64-Batik Jawa 4.png'),
(11, 4, '64831e5240350-Batik Cap 1.png'),
(12, 4, '64831e5242c8b-Batik Cap 2.png'),
(13, 4, '64831e5243ff3-Batik Cap 3.png');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `provinces_id` int(11) NOT NULL,
  `provinces_name` varchar(50) NOT NULL,
  `shipping_cost` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`provinces_id`, `provinces_name`, `shipping_cost`) VALUES
(1, 'Default', 0),
(2, 'DKI Jakarta', 45000),
(3, 'Jawa Barat', 52000),
(4, 'Banten', 51000),
(5, 'Jawa Tengah', 52000),
(6, 'Daerah Istimewa Yogyakarta', 59000),
(7, 'Jawa Timur', 46000),
(8, 'Bali', 46000),
(9, 'Nusa Tenggara Barat', 65000),
(10, 'Nusa Tenggara Timur', 76000),
(11, 'Sulawesi Utara', 65000),
(12, 'Sulawesi Barat', 17000),
(13, 'Sulawesi Tengah', 46000),
(14, 'Sulawesi Tenggara', 33000),
(15, 'Sulawesi Selatan', 10000),
(16, 'Gorontalo', 49000),
(17, 'Naggroe Aceh Darussalam', 91000),
(18, 'Sumatra Utara', 72000),
(19, 'Sumatera Barat', 65000),
(20, 'Riau', 63000),
(21, 'Kepulauan Riau,', 82000),
(22, 'Jambi', 51000),
(23, 'Bangka Belitung', 62000),
(24, 'Bengkulu', 64000),
(25, 'Lampung', 56000),
(26, 'Kalimantan Utara', 82000),
(27, 'Kalimantan Barat', 72000),
(28, 'Kalimantan Tengah', 62000),
(29, 'Kalimantan Selatan', 72000),
(30, 'Kalimantan Timur', 78000),
(31, 'Maluku', 72000),
(32, 'Maluku Utara', 103000),
(33, 'Papua Barat', 182000),
(34, 'Papua', 98000),
(35, 'Papua Selatan', 87000),
(36, 'Papua Tengah', 108000),
(37, 'Papua Pegunungan', 108000),
(38, 'Sumatra Selatan', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactions_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `shipping_price` int(50) NOT NULL,
  `total_price` int(50) NOT NULL,
  `unique_code` int(3) NOT NULL,
  `transaction_status` enum('UNPAID','PROCESS','CANCELED','SHIPPING','RECEIVED','RETURN') NOT NULL,
  `resi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactions_id`, `users_id`, `date_transaction`, `shipping_price`, `total_price`, `unique_code`, `transaction_status`, `resi`) VALUES
(2, 3, '2023-06-09 12:06:55', 8500, 377465, 965, 'UNPAID', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `tran_details_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `price` int(25) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`tran_details_id`, `products_id`, `transaction_id`, `price`, `quantity`) VALUES
(2, 1, 2, 99000, 2),
(3, 4, 2, 85000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `email_verified_at` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `provinces_id` int(11) DEFAULT NULL,
  `address` text,
  `zip_code` varchar(11) DEFAULT NULL,
  `roles` enum('USER','ADMIN') NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `username`, `phone_number`, `email`, `email_verified_at`, `password`, `provinces_id`, `address`, `zip_code`, `roles`) VALUES
(1, 'admin', 'mhs', '08534199516', 'admin@gmail.com', NULL, '$2y$10$vwrEDatliszJD4xmAw7K3eGJI1pSaqkpW2g76QIxs50BVzZuOc2vi', 1, 'hh', '91353', 'ADMIN'),
(2, 'user', 'mhs', '08534199516', 'user@gmail.com', NULL, '$2y$10$re0TbD6e4z7WO2nwodA3v.HjrH/NqKvh0DbqnnRGslTEZnFGf9QxO', 13, 'Jl. Poros Majene Mamuju', '91353', 'USER'),
(3, 'ahmad afrisal', 'isal', '08534199515', 'ahmadafrisal2002@gmail.com', NULL, '$2y$10$3UM6x2ANwlmjQtRTVP4pzOGhHS0OueLaO5mOXyh.DatGY.hIk00va', 12, 'Jl. Poros Majene Mamuju No 3', '91353', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`carts_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`galleries_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`provinces_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactions_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`tran_details_id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `provinces_id` (`provinces_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `carts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `galleries_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `provinces_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `tran_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `transaction_items_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transactions_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`provinces_id`) REFERENCES `provinces` (`provinces_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
