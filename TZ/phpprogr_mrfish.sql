-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Сер 09 2021 р., 11:57
-- Версія сервера: 10.1.46-MariaDB-cll-lve
-- Версія PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `phpprogr_mrfish`
--

-- --------------------------------------------------------

--
-- Структура таблиці `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `total_hours` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `partners`
--

INSERT INTO `partners` (`id`, `name`, `surname`, `total_hours`, `status`) VALUES
(1, 'Volodymyr ', 'Vikarchuk', 321, 1),
(2, 'Elizabeth ', 'Velazquez', 0, 0),
(3, 'Victoria ', 'Mcgee', 1500, 1),
(4, 'John ', 'Long', 18, 0),
(5, 'Melanie ', 'Wagner', 128, 1),
(6, 'Nicholas ', 'Stone', 0, 1),
(7, 'David ', 'Schwartz', 1, 1),
(8, 'Tamara ', 'Chung', 24, 1),
(9, 'Stephen ', 'Stephen ', 14, 0),
(10, 'Ashley ', 'Davis', 1020, 0),
(11, 'Eric ', 'Clark', 23, 0),
(12, 'Rhonda ', 'Perez', 14, 1),
(13, 'Ashley ', 'Wilson', 0, 1),
(14, 'Briana ', 'Miller', 22, 0),
(15, 'Anne ', 'Williams', 4, 0),
(16, 'Karen ', 'Cortez', 420, 1),
(17, 'Alexander ', 'Fleming', 0, 1),
(18, 'William ', 'Chase Jr.', 0, 0),
(19, 'Kathy ', 'Molina', 3, 0),
(20, 'Volodymyr ', 'Bennett', 1, 1),
(21, 'Jared ', 'Hickman', 0, 1);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
