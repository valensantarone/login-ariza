-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 02:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registro`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `phone`) VALUES
('', '', '', ''),
('', '', '', ''),
('juan', 'juan@gmail.com', '12345', '1145454545'),
('hugo', 'hugo@gmail.com', '4321', '1167676767'),
('ricardo', 'ricardo@gmail.com', '$2y$10$qh8Xk9QFg1.rxDpqbn8/muriYBQ4LvRHr.w53c8kuxbs3Vvdrc3D.', '1123232323'),
('ricardo', 'ricardo@gmail.com', '$2y$10$8OLcWbpQzDhcisWVEM8R6eUVO2F0AoVXm7Mu/4N4K8zjtRr0B3V7i', '1123232323'),
('pablo', 'pablo@gmail.com', '$2y$10$XBQh7Vsie8a4qh3yFafNse.Yu10fkEqqPcSRAbduwO8H4REYfnM4y', '1156565656'),
('tiago', 'tiago@gmail.com', '$2y$10$38/Jt/AnjK7T8TsLe6AxieC/G0Duj6EmqmdWISg0SVoYjO1vyrn0q', '1178787878'),
('valentino', 'valentino@gmail.com', '$2y$10$SoXcVEiXOylMHx3/oNBuuOtlAbuHDCQNImJ7gM6eBkkb7crrpDn9S', '1189898989'),
('valentino', 'valentino@gmail.com', '$2y$10$NKBe8zrx0IA8xxxtdH9gneVegRj8oTjuqCjl0IwVGbnTEuvxH9k22', '1189898989'),
('pedro', 'pedro@gmail.com', '$2y$10$pklO14ZniOgcxpxwrQrSGO7ofMQndhnKirhlMGtJe3CGrbpKfEVC.', '1134343434');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
