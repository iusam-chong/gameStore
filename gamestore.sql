-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 06:57 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `user_id`, `identifier`, `token`, `login_time`) VALUES
(98, 1, '$2y$10$gI/voJ59FtSkzKbJbJu0k.Cr/NvEdJtUXDq2ikmcKXglJxSWEo4fy', '1ab6c3b9bc2ffcae7b43612aa807a146', '2020-10-07 04:34:28'),
(99, 1, '$2y$10$29XyTrhUpDdmPxKh8enRVuGpyQprMA4Ur9prou7tvRyWr02NOBgyC', 'c8d4d27d6010ba409ba6801d7aafba5b', '2020-10-07 05:38:54'),
(100, 1, '$2y$10$XhNGgzqZ.YS4vlgOQf4Bhu8./EhjqPBnO0pOeb7.bjFcIajCe5aKC', '775173854e05760ffd82e6fb778ca8a0', '2020-10-07 05:43:32'),
(101, 1, '$2y$10$/xZ75kinTJienY1lMU8iNexVwc4rKv6wLFenWYaDHKxQ3AeP1ma2O', 'bcf831c408010e50949311ac7c091949', '2020-10-07 06:00:48'),
(102, 1, '$2y$10$4EbYlPuGoHZONs3aQ/Ot.udlW5VKoxS61wxafob18EGv9lM1l0KNm', '4ccd9b19992193ccdfaa7f6a665eae26', '2020-10-07 06:01:42'),
(103, 1, '$2y$10$FEClI0L4J.KEX/lMUf640uBLe8PwV5bJmwpUfUfZivOS6jqhboFky', 'c532c7296f5f2c5748a16b96ee3020b5', '2020-10-07 06:05:59'),
(104, 1, '$2y$10$UbQvPv43AX2.a5zGQ0D1Yu1hY38fetBDequETW1a2kG20E.eGFHVK', '59e80d24e566a11839cba375746cfbe1', '2020-10-07 06:06:19'),
(105, 1, '$2y$10$6Qf8dpK4wKTxwQIvuBMkLuKjK/NoVbwTSMLIzSASFgioM845Dz/ri', 'a558e98ddc7b62135fcfee5d699d2ba9', '2020-10-07 06:11:06'),
(106, 1, '$2y$10$dyLWH2UPG9aRqKrNT16x4.ZirJtQ0GPcICG.rbNmgR7B9WPP5Jv0G', '82795859c9c960407ad9f929119a9da4', '2020-10-07 06:11:37'),
(107, 1, '$2y$10$PihpRVpXsRza.uR0cisn0.bFtt2WIv0jG1/EuwoAg/VRC36R2KhBu', '0346eaaf7f5d0b66a52e5317b03673c3', '2020-10-07 06:14:52'),
(108, 1, '$2y$10$ZDWcXkLp0BCtof2OMNfCn.39fOAqQfbKoL/bB9H8gSzwQJvPV06l.', '97711b8f95a5f2d893fca3472066c1c5', '2020-10-07 07:32:22'),
(109, 1, '$2y$10$2vBCCUUrcLn9QZs55c/PveqLdtkbDeUte/gpjZhADJ7Dl4VMfUXRy', 'a7ffdd1aa3775266ec0c899bc0f61380', '2020-10-07 07:39:56'),
(110, 2, '$2y$10$JM8yGcCQLoHEcocQ1eSTmeUJTT48CJLD6GMHtayZ8LQzL2gc67RLa', '4df1ff18236eef85476a210090166d0c', '2020-10-07 07:45:35'),
(111, 1, '$2y$10$INjyD/5ooElxDuI5RP1xQ.O4Q50F2.HB7rCuajgqWco3gcXK9JCI2', '6dc75e914f5be5ad9d702123c0b20b2a', '2020-10-07 07:57:16'),
(112, 1, '$2y$10$wzS7FNjDpxQHX2wOhHFqT.5F.R0htIWVJ830Y7YhCTHrsMg0tkUva', '15c4bb78035bf1f8e5327b2d00191608', '2020-10-07 09:11:31'),
(113, 1, '$2y$10$KhxnWBpzBVVLWfpZ3Yg//OR.TLJkK4AJFS4aC5ltqypzsjQZjbuF6', 'bbbda52c9ba1c230f327c1266bc181cc', '2020-10-07 09:31:03'),
(114, 2, '$2y$10$pwmO4n6p4dL.wgcydDHfdeHR0ZdDRgRF.HiDIDW0RuhSB89W39vNi', '6b0fb44709b79ade41dc94128ea60918', '2020-10-07 09:31:54'),
(115, 2, '$2y$10$IuKgVb4p/icEMnVEroGTKe/n9TQxPH8G60cmIf6kjdKMkSkTN7dBy', '2d0568d6e49ce7f9e818f865769f0bbb', '2020-10-07 09:37:03'),
(116, 1, '$2y$10$YOJPOifXjQrETvmIcuuTVu4ZJr9tJj1Z4mdz1y5hLK4IC7yqH6tBC', 'e9234e53e860d9301a2f612ae486bdfe', '2020-10-07 09:37:52'),
(117, 1, '$2y$10$OCJwGH.e4mFkW4A58fHDJueGvAQH5PHtbBKOabakgErS1QJsQVpwG', 'caf4748a26539ee0369ce44c781440a1', '2020-10-07 09:38:05'),
(118, 1, '$2y$10$sq8MtmUUUU.5hRsNvTI4COU7L.wrZVNDZmKBd9U9RWhr7JbpQR52i', 'f343b5a3b32c6816575b4cc6b01375f8', '2020-10-07 09:38:16'),
(119, 1, '$2y$10$EFr5MPBMouq0DbtaBz1pPucEB7cdC1K8npCOMY.PKJjdth5/CPeMq', '4d969df626ee9a30055aab25565472a5', '2020-10-07 09:42:54'),
(120, 1, '$2y$10$VIlOgQpCDJPcg3KWT03oRegjMh0JxIgQcfnye9Ix5kvV87/HPBsGG', 'a8f05c728b7acf6ad38988b15c29131e', '2020-10-07 09:43:04'),
(121, 1, '$2y$10$KHPgj25gbLGkW6ZOSRyLSetgR7sXS8QJBMFBeR4LJFJJZ9c8RJ/FW', '061da4f5545119d313ff702b5078d903', '2020-10-07 09:43:13'),
(122, 1, '$2y$10$rGY4M9R5UrjVF2giw38hN.gOVb08L8lmIfeLYJK1Ukrn35iRyA46q', '758188f5b6c69f7dcd28e6af870247e2', '2020-10-07 09:43:20'),
(123, 1, '$2y$10$eX.3Na0cSE4vvpHyPv4Qhuv2V2LlirIao7sawBuF3SI4Y8xt0mWpS', '8378030c8c61ebaf4067d56c812a8f47', '2020-10-07 09:43:30'),
(124, 1, '$2y$10$F0fbOtH4rbIoRlOfGmFFDeoHukC2kENuHtXlbHQhpB1BBBUe3SI4C', '5a6219b36acc301eda6a0aa16e1e5a72', '2020-10-07 09:46:06'),
(125, 1, '$2y$10$lIWB7O/X5JBTI78VDayWi.IlzOaTh2VluQkMMuDMywkymnk5fFbTu', '3b654a84548e1e17ab471c2295f0d563', '2020-10-07 09:46:51'),
(126, 2, '$2y$10$ll9ND/EqYRHUzx/LvIULa.QlRrbZbkQZj2dD7kFDr3HS/GisyxCCG', '69453dad580f239bb41f436312b9e321', '2020-10-07 10:06:43'),
(127, 1, '$2y$10$I/GJtcyuDEglKJ48ZkyXt.kxxHIdFJ4fM79bBQ8UVC577Y0LQD7gq', '3da8a365c1ce91e2e08517ca0d5701b8', '2020-10-07 10:17:39'),
(128, 2, '$2y$10$jr69MwqBNHaDOU.lfsR3vOagV57kLbdxVxdGpHswAMEyG8EgEx7RW', 'f1bf21820db42e3e878508f165a3c721', '2020-10-07 10:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `enabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` varchar(10) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `enabled`, `reg_time`, `type`) VALUES
(1, 'admin', '$2y$10$uRAaTnE8pb7kIe1C627/IOmy8X0f/s9i8RIVQpanI/Q4R9bhAk2fG', 1, '2020-10-03 06:08:59', 'admin'),
(2, 'user', '$2y$10$7.HXE7s3F8Lzki85wbT2w.JSm8ylkGgR2sP..zPdccDl4y0dPHbkq', 1, '2020-10-05 02:18:58', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
