-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 19 2014 г., 06:21
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `reactive`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `login` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `password`, `name`, `email`) VALUES
('user_0001', '5ad770f09d71f0d988bc19fba8daf0f346b4da44', 'user_1', 'user_1@example.com'),
('user_0002', '5faa1cfb8af8fc5c7b6183eca16d04328d7807c0', 'user_2', 'user_0002@example.com'),
('user_0003', '5c2c307ae573b5f2a0b8ca3d61afb07e1152c7a3', ' ', 'user_0003@example.com'),
('user_0004', '366680789370c56b9254de845711fe88b9a26315', 'user_4', 'user_0004@example.com'),
('user_0005', '689901adf00639ae63b008c3fd59d6bd681ecd09', 'user_0005', 'user_0005@example.com'),
('user_0006', '764ddabff8cbcef44496a4ab716f736e4d08e32e', 'user_0006', 'user_0006@mail.com'),
('user_0007', 'ace2bdca404325ea35b6db40daea8f619d6739bc', 'user_0007', 'user_0007@mail.com'),
('user_0008', '0bfcf19f8bb9e10a6ffa20483028a7f0500dc2aa', 'user_0008', 'user_0008@mail.com'),
('user_0009', '1d70f2ee605f51b186ce72bcb2c98ba8059a1394', 'user_9', 'user_09@mail.com'),
('user_0010', 'e583dc8037b312f9ffaa200b66a10bb421700a36', 'user_10', 'user_10@mail.com'),
('user_0011', 'ef37b3d8a46295459157a245dbd54d860b8aabf3', 'user_11', 'user_11@mail.com'),
('user_0012', '7d84ae5d5e2f3883391980ba9a7f7cf792f09a62', 'user_12', 'user_12@mail.com'),
('user_0013', '69fe191dd2f45cdfc91f3d277f3d9501a35749ba', 'user_13', 'user_13@mail.com'),
('user_0014', 'ba3edfbbf44e81be23bda3c01f65bb71170c41ed', 'user_14', 'user_14@mail.com'),
('user_0015', 'd2a7a7626b7b5af6fe1b9013afbef30ab2cbf69f', 'user_15', 'user_15@mail.com'),
('user_0016', '498a86838575e1359616c1b95915890ac6b807df', 'user_0016', 'user_16@mail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
