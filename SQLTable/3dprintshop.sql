-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-02-24 09:29:36
-- 伺服器版本： 10.4.8-MariaDB
-- PHP 版本： 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `3dprintshop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `identityCard` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `verificationCode` varchar(20) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `birthday` date NOT NULL,
  `setDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `identityCard`, `email`, `account`, `password`, `phoneNumber`, `verificationCode`, `level`, `birthday`, `setDate`) VALUES
(0, 'kurt', 'A127272387', 'k0911245920@gmail.com', 'kurt6783', '0458e79dafa4722324061177fe0f578e', '0911245920', 'CeqQuyNopaM4ktHEs9O5', 1, '1992-09-29', '2020-02-24 01:19:30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
