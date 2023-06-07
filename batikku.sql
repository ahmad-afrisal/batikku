-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2023 at 01:40 PM
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
  `products_id` int(25) NOT NULL
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
(1, 'Makanan', 'makanan', '244060577_makanan.svg'),
(2, 'Kain', 'kain', '537402405_kain.svg'),
(3, 'Baju', 'baju', '1668815106_baju.svg'),
(4, 'Celana', 'celana', '2062739558_celana.svg'),
(6, 'Souvenir', 'souvenir', '1522619992_souvenir.svg');

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
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `product_name`, `slug`, `categories_id`, `price`, `description`, `weight`, `stock`) VALUES
(1, 'kain saqbe motif arajang', 'kain-saqbe-motif-arajang', 2, 100000, '<p>Salah satu produk tenun berbenang sutra adalah sarung sutra asal Suku Mandar yang mendiami wilayah Kabupaten Polewali Mandar (Polman) di Provinsi Sulawesi Barat. Tenun sarung sutra Mandar telah diproduksi sejak abad ke-16 serta dikenal memiliki kualitas halus dan tidak mudah luntur. Sarung sutra Mandar dikenal juga dengan sebutan lipa saqbe Mandar.</p>\r\n', 1, 6),
(2, 'Bagea', 'bagea', 1, 1000, '<p>Kue bagea adalah kue yang berasal dari Ternate di Maluku Utara, Indonesia. Bentuknya bulat dan berwarna krem. Bagea memiliki konsistensi keras yang dapat dilunakkan dalam teh atau air, agar lebih mudah dikunyah. Ini disiapkan menggunakan sagu, pati nabati yang berasal dari pohon sagu atau sagu sikas</p>\r\n', 0.2, 98),
(3, 'Jepa Mandar', 'jepa-mandar', 1, 2000, '<p>dfdgf</p>\r\n', 1, 20);

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
(3, 1, '1728135775_gold-saqbe.png'),
(4, 1, '1423618709_purple-saqbe.png'),
(5, 2, '63bd0f4d9f55a-bagea-1.png'),
(6, 3, '63bfd4418010c-jepa-1-product.png'),
(7, 3, '63bfd441832b3-jepa-2-product.png');

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
(1, 3, '2023-01-10 07:01:36', 17000, 27813, 813, 'SHIPPING', '4578399'),
(2, 3, '2023-01-10 07:01:37', 20400, 32287, 887, 'UNPAID', ''),
(3, 4, '2023-01-12 09:01:42', 59000, 159604, 604, 'RECEIVED', '5454'),
(4, 3, '2023-01-16 01:01:15', 17000, 117383, 383, 'UNPAID', ''),
(5, 4, '2023-06-06 08:06:58', 11800, 12949, 149, 'UNPAID', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `tran_details_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `price` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`tran_details_id`, `products_id`, `transaction_id`, `price`) VALUES
(1, 1, 1, 10000),
(2, 1, 2, 10000),
(3, 2, 2, 1000),
(4, 1, 3, 100000),
(5, 1, 4, 100000),
(6, 2, 5, 1000);

--
-- Triggers `transaction_items`
--
DELIMITER $$
CREATE TRIGGER `CREATE_TRANSACTION_UPDATE_STOCK` BEFORE INSERT ON `transaction_items` FOR EACH ROW BEGIN
	UPDATE products SET stock=stock-1 WHERE products_id=NEW.products_id;
END
$$
DELIMITER ;

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
(2, 'admin', '', '', 'admin@gmail.com', NULL, '$2y$10$eWo.BPshb4I/ab/UPl82oOPNaRIL5Jn2ZYPaKhOq1HJgaoM6cEI8G', 1, '', '', 'ADMIN'),
(3, 'ahmad afrisal', 'isal', '085341995516', 'ahmadafrisal2002@gmail.com', NULL, '$2y$10$/zGuz7upxvM5.bdDWidfeuJ6BwqImzxGX14tjYoBtkwWFDC5gVx0q', 12, 'Ceppa Desa Botto', '91353', 'USER'),
(4, 'isal', 'isal22', '085341995516', 'isal@gmail.com', NULL, '$2y$10$albTnwZxNRMxiitYM.A0ZuxOw4DOTgtH/eqCgHS3DPzVrloWGexre', 6, 'klaten', '91353', 'USER'),
(5, 'ahmad afrisal', '', '', 'aaisal@gmail.com', NULL, '$2y$10$HGQ89J9WMueR.otnEpnPquxvrZPplTDP1XlUqantExtfHbSSB6J/a', 1, '', '', 'USER');

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
  MODIFY `carts_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `galleries_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `provinces_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `tran_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
