-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 05 2016 г., 10:08
-- Версия сервера: 5.6.28-0ubuntu0.15.10.1
-- Версия PHP: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `money`
--

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_admaccounts`
--

CREATE TABLE IF NOT EXISTS `hyip_admaccounts` (
  `id` int(11) NOT NULL,
  `paysystem_id` int(11) NOT NULL,
  `paynumber` varchar(128) NOT NULL,
  `account` text,
  `password` varchar(32) NOT NULL,
  `currency` varchar(4) NOT NULL DEFAULT 'RUB',
  `inout` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_admaccounts`
--

INSERT INTO `hyip_admaccounts` (`id`, `paysystem_id`, `paynumber`, `account`, `password`, `currency`, `inout`) VALUES
(1, 0, '123', 'P30818941', '3Zk84pwS97', 'RUB', 0),
(2, 0, '', 'P30818941', '3Zk84pwS97', 'USD', 0),
(6, 4, '', '4092807', 'Pw3h735vKT', 'USD', 0),
(7, 5, '', 'nosra787@gmail.com', 'P521ws37FK', 'USD', 0),
(8, 0, '', 'test@test.ru', '123456', 'RUB', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_advcash`
--

CREATE TABLE IF NOT EXISTS `hyip_advcash` (
  `id` int(11) NOT NULL,
  `in_acc` varchar(64) NOT NULL,
  `in_name` varchar(64) NOT NULL,
  `in_sign` varchar(64) NOT NULL,
  `out_api_name` varchar(64) NOT NULL,
  `out_key` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_advcash`
--

INSERT INTO `hyip_advcash` (`id`, `in_acc`, `in_name`, `in_sign`, `out_api_name`, `out_key`, `active`) VALUES
(1, 'nosra787@gmail.com', 'IT Invest Project', 'e9dd6f1d4927fbbad1c3590df8fd1b5459d98567e2edb75a5e3b048e893982c4', 'IT Invest Project', 'P521ws37FK', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_bitcoin`
--

CREATE TABLE IF NOT EXISTS `hyip_bitcoin` (
  `id` int(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  `secret_key` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_bitcoin`
--

INSERT INTO `hyip_bitcoin` (`id`, `token`, `secret_key`, `active`) VALUES
(1, '97d26baa4d4c2d24ab7ced91f44ae65afbf69327b9281e369f4e5bbba78d4365', '464a91535c82b2ea4b8168f0d8667267', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_cash`
--

CREATE TABLE IF NOT EXISTS `hyip_cash` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payaccount_id` int(11) NOT NULL,
  `cash` double unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `outs` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_cash`
--

INSERT INTO `hyip_cash` (`id`, `user_id`, `payaccount_id`, `cash`, `created`, `outs`) VALUES
(37, 2, 15, 100, '2016-04-04 05:59:24', 15),
(44, 2, 22, 10, '2016-04-04 05:59:23', 10),
(47, 2, 15, 10, '2016-04-04 05:59:24', 11),
(51, 2, 22, 10, '2016-04-04 05:59:23', 10),
(53, 2, 22, 10, '2016-04-04 05:59:23', 10),
(54, 2, 22, 10, '2016-04-04 05:59:23', 10),
(59, 2, 22, 1001, '2016-04-04 05:59:23', 10),
(61, 2, 22, 10.03, '2016-04-04 05:59:23', 10),
(63, 2, 22, 10, '2016-04-04 05:59:23', 8),
(64, 2, 22, 10, '2016-04-04 05:59:23', 8),
(70, 2, 22, 1000, '2016-04-04 05:59:23', 4),
(71, 2, 22, 10000000, '2016-04-04 05:59:23', 3),
(72, 2, 22, 10000000, '2016-04-04 05:59:23', 3),
(73, 2, 22, 10000000, '2016-04-04 05:59:23', 3),
(74, 2, 22, 10, '2016-04-04 05:59:23', 2),
(75, 2, 22, 10, '2016-04-04 05:59:23', 2),
(76, 2, 22, 10, '2016-04-04 05:59:23', 2),
(77, 2, 22, 10, '2016-04-04 05:59:23', 2),
(78, 2, 22, 10, '2016-04-04 05:59:24', 2),
(79, 2, 22, 10, '2016-04-04 05:59:24', 2),
(80, 2, 22, 10, '2016-04-04 05:59:24', 2),
(81, 2, 22, 10, '2016-04-04 05:59:24', 2),
(82, 2, 22, 10, '2016-04-04 05:59:24', 2),
(83, 2, 22, 10, '2016-04-04 05:59:24', 1),
(84, 2, 31, 10, '2016-04-01 09:17:44', 0),
(85, 2, 31, 10, '2016-04-01 09:22:32', 0),
(86, 2, 31, 10, '2016-04-01 09:23:24', 0),
(87, 2, 31, 10, '2016-04-01 09:30:18', 0),
(92, 13, 33, 1000, '2016-04-04 12:42:29', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_orders`
--

CREATE TABLE IF NOT EXISTS `hyip_orders` (
  `id` int(11) NOT NULL,
  `cash_id` int(11) NOT NULL,
  `operation` tinyint(1) NOT NULL,
  `sum` double NOT NULL,
  `code` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_orders`
--

INSERT INTO `hyip_orders` (`id`, `cash_id`, `operation`, `sum`, `code`, `date`) VALUES
(69, 37, 0, 100, 0, '2016-03-02 21:00:00'),
(72, 37, 1, 2.35, 0, '2016-03-02 21:00:00'),
(84, 37, 1, 2.35, 0, '2016-03-02 21:00:00'),
(87, 37, 1, 1, 0, '2016-03-04 21:00:00'),
(90, 59, 0, 1001, 0, '2016-03-14 07:42:59'),
(92, 61, 0, 10.03, 0, '2016-03-14 12:30:48'),
(98, 37, 1, 0.055225, 0, '2016-03-15 11:31:48'),
(100, 44, 1, 0.0055225, 0, '2016-03-15 11:31:48'),
(101, 47, 1, 0.0055225, 0, '2016-03-15 11:31:48'),
(102, 51, 1, 0.0055225, 0, '2016-03-15 11:31:48'),
(103, 53, 1, 0.0055225, 0, '2016-03-15 11:31:48'),
(104, 54, 1, 0.0055225, 0, '2016-03-15 11:31:48'),
(105, 59, 1, 0.55280225, 0, '2016-03-15 11:31:48'),
(106, 61, 1, 0.0055390675, 0, '2016-03-15 11:31:48'),
(108, 63, 0, 10, 0, '2016-03-16 12:39:01'),
(109, 64, 0, 10, 0, '2016-03-16 12:50:36'),
(111, 37, 1, 0.055696, 0, '2016-03-21 14:33:55'),
(113, 44, 1, 0.0055696, 0, '2016-03-21 14:33:55'),
(114, 47, 1, 0.0055696, 0, '2016-03-21 14:33:55'),
(115, 51, 1, 0.0055696, 0, '2016-03-21 14:33:55'),
(116, 53, 1, 0.0055696, 0, '2016-03-21 14:33:56'),
(117, 54, 1, 0.0055696, 0, '2016-03-21 14:33:56'),
(118, 59, 1, 0.55751696, 0, '2016-03-21 14:33:56'),
(119, 61, 1, 0.0055863088, 0, '2016-03-21 14:33:56'),
(120, 63, 1, 0.0055696, 0, '2016-03-21 14:33:56'),
(121, 64, 1, 0.0055696, 0, '2016-03-21 14:33:56'),
(122, 44, 1, 0.0055696, 0, '2016-03-22 09:27:00'),
(123, 51, 1, 0.0055696, 0, '2016-03-22 09:27:00'),
(124, 53, 1, 0.0055696, 0, '2016-03-22 09:27:00'),
(125, 54, 1, 0.0055696, 0, '2016-03-22 09:27:00'),
(126, 59, 1, 0.55751696, 0, '2016-03-22 09:27:00'),
(127, 61, 1, 0.0055863088, 0, '2016-03-22 09:27:00'),
(128, 63, 1, 0.0055696, 0, '2016-03-22 09:27:00'),
(129, 64, 1, 0.0055696, 0, '2016-03-22 09:27:00'),
(132, 37, 1, 0.055696, 0, '2016-03-22 09:27:00'),
(133, 47, 1, 0.0055696, 0, '2016-03-22 09:27:00'),
(134, 44, 1, 0.0055696, 0, '2016-03-22 12:26:01'),
(135, 51, 1, 0.0055696, 0, '2016-03-22 12:26:01'),
(136, 53, 1, 0.0055696, 0, '2016-03-22 12:26:01'),
(137, 54, 1, 0.0055696, 0, '2016-03-22 12:26:01'),
(138, 59, 1, 0.55751696, 0, '2016-03-22 12:26:01'),
(139, 61, 1, 0.0055863088, 0, '2016-03-22 12:26:01'),
(140, 63, 1, 0.0055696, 0, '2016-03-22 12:26:01'),
(141, 64, 1, 0.0055696, 0, '2016-03-22 12:26:02'),
(144, 37, 1, 0.055696, 0, '2016-03-22 12:26:02'),
(145, 47, 1, 0.0055696, 0, '2016-03-22 12:26:02'),
(146, 44, 1, 0.0055696, 0, '2016-03-22 12:27:52'),
(147, 51, 1, 0.0055696, 0, '2016-03-22 12:27:52'),
(148, 53, 1, 0.0055696, 0, '2016-03-22 12:27:52'),
(149, 54, 1, 0.0055696, 0, '2016-03-22 12:27:53'),
(150, 59, 1, 0.55751696, 0, '2016-03-22 12:27:53'),
(151, 61, 1, 0.0055863088, 0, '2016-03-22 12:27:53'),
(152, 63, 1, 0.0055696, 0, '2016-03-22 12:27:53'),
(153, 64, 1, 0.0055696, 0, '2016-03-22 12:27:53'),
(156, 37, 1, 0.055696, 0, '2016-03-22 12:27:53'),
(157, 47, 1, 0.0055696, 0, '2016-03-22 12:27:53'),
(162, 70, 0, 1000, 0, '2016-03-23 13:49:08'),
(163, 71, 0, 10000000, 1, '2016-03-29 11:32:06'),
(164, 72, 0, 10000000, 1, '2016-03-29 11:34:49'),
(165, 73, 0, 10000000, 1, '2016-03-29 11:37:45'),
(166, 44, 1, 0.0055696, 0, '2016-03-29 14:48:37'),
(167, 51, 1, 0.0055696, 0, '2016-03-29 14:48:37'),
(168, 53, 1, 0.0055696, 0, '2016-03-29 14:48:37'),
(169, 54, 1, 0.0055696, 0, '2016-03-29 14:48:37'),
(170, 59, 1, 0.55751696, 0, '2016-03-29 14:48:38'),
(171, 61, 1, 0.0055863088, 0, '2016-03-29 14:48:38'),
(172, 63, 1, 0.0055696, 0, '2016-03-29 14:48:38'),
(173, 64, 1, 0.0055696, 0, '2016-03-29 14:48:38'),
(174, 70, 1, 0.55696, 0, '2016-03-29 14:48:38'),
(175, 37, 1, 0.055696, 0, '2016-03-29 14:48:38'),
(176, 47, 1, 0.0055696, 0, '2016-03-29 14:48:38'),
(177, 44, 1, 0.0055696, 0, '2016-03-29 14:50:15'),
(178, 51, 1, 0.0055696, 0, '2016-03-29 14:50:15'),
(179, 53, 1, 0.0055696, 0, '2016-03-29 14:50:15'),
(180, 54, 1, 0.0055696, 0, '2016-03-29 14:50:15'),
(181, 59, 1, 0.55751696, 0, '2016-03-29 14:50:15'),
(182, 61, 1, 0.0055863088, 0, '2016-03-29 14:50:15'),
(183, 63, 1, 0.0055696, 0, '2016-03-29 14:50:15'),
(184, 64, 1, 0.0055696, 0, '2016-03-29 14:50:15'),
(185, 70, 1, 0.55696, 0, '2016-03-29 14:50:15'),
(186, 37, 1, 0.055696, 0, '2016-03-29 14:50:15'),
(187, 47, 1, 0.0055696, 0, '2016-03-29 14:50:15'),
(188, 74, 0, 10, 1, '2016-03-31 08:30:58'),
(189, 75, 0, 10, 1, '2016-03-31 08:33:11'),
(190, 76, 0, 10, 1, '2016-03-31 08:33:41'),
(191, 77, 0, 10, 1, '2016-03-31 08:34:05'),
(192, 78, 0, 10, 1, '2016-03-31 08:35:17'),
(193, 79, 0, 10, 1, '2016-03-31 08:35:43'),
(194, 80, 0, 10, 1, '2016-03-31 08:43:58'),
(195, 81, 0, 10, 1, '2016-03-31 08:45:36'),
(196, 82, 0, 10, 0, '2016-03-31 09:19:52'),
(197, 44, 1, 0.0055696, 0, '2016-03-31 11:27:14'),
(198, 51, 1, 0.0055696, 0, '2016-03-31 11:27:15'),
(199, 53, 1, 0.0055696, 0, '2016-03-31 11:27:15'),
(200, 54, 1, 0.0055696, 0, '2016-03-31 11:27:15'),
(201, 59, 1, 0.55751696, 0, '2016-03-31 11:27:15'),
(202, 61, 1, 0.0055863088, 0, '2016-03-31 11:27:15'),
(203, 63, 1, 0.0055696, 0, '2016-03-31 11:27:15'),
(204, 64, 1, 0.0055696, 0, '2016-03-31 11:27:15'),
(205, 70, 1, 0.55696, 0, '2016-03-31 11:27:15'),
(206, 71, 1, 5569.6, 0, '2016-03-31 11:27:15'),
(207, 72, 1, 5569.6, 0, '2016-03-31 11:27:15'),
(208, 73, 1, 5569.6, 0, '2016-03-31 11:27:15'),
(209, 37, 1, 0.055696, 0, '2016-03-31 11:27:15'),
(210, 47, 1, 0.0055696, 0, '2016-03-31 11:27:15'),
(211, 44, 1, 0.0055696, 0, '2016-04-01 07:24:53'),
(212, 51, 1, 0.0055696, 0, '2016-04-01 07:24:53'),
(213, 53, 1, 0.0055696, 0, '2016-04-01 07:24:53'),
(214, 54, 1, 0.0055696, 0, '2016-04-01 07:24:53'),
(215, 59, 1, 0.55751696, 0, '2016-04-01 07:24:53'),
(216, 61, 1, 0.0055863088, 0, '2016-04-01 07:24:53'),
(217, 63, 1, 0.0055696, 0, '2016-04-01 07:24:53'),
(218, 64, 1, 0.0055696, 0, '2016-04-01 07:24:53'),
(219, 70, 1, 0.55696, 0, '2016-04-01 07:24:53'),
(220, 71, 1, 5569.6, 0, '2016-04-01 07:24:53'),
(221, 72, 1, 5569.6, 0, '2016-04-01 07:24:53'),
(222, 73, 1, 5569.6, 0, '2016-04-01 07:24:53'),
(223, 74, 1, 0.0055696, 0, '2016-04-01 07:24:53'),
(224, 75, 1, 0.0055696, 0, '2016-04-01 07:24:54'),
(225, 76, 1, 0.0055696, 0, '2016-04-01 07:24:54'),
(226, 77, 1, 0.0055696, 0, '2016-04-01 07:24:54'),
(227, 78, 1, 0.0055696, 0, '2016-04-01 07:24:54'),
(228, 79, 1, 0.0055696, 0, '2016-04-01 07:24:54'),
(229, 80, 1, 0.0055696, 0, '2016-04-01 07:24:54'),
(230, 81, 1, 0.0055696, 0, '2016-04-01 07:24:54'),
(231, 82, 1, 0.0055696, 0, '2016-04-01 07:24:54'),
(232, 37, 1, 0.055696, 0, '2016-04-01 07:24:54'),
(233, 47, 1, 0.0055696, 0, '2016-04-01 07:24:54'),
(238, 83, 0, 10, 1, '2016-04-01 09:17:33'),
(239, 84, 0, 10, 1, '2016-04-01 09:17:44'),
(240, 85, 0, 10, 1, '2016-04-01 09:22:32'),
(241, 86, 0, 10, 1, '2016-04-01 09:23:24'),
(242, 87, 0, 10, 1, '2016-04-01 09:30:18'),
(243, 44, 1, 0.0055696, 0, '2016-04-04 05:59:23'),
(244, 51, 1, 0.0055696, 0, '2016-04-04 05:59:23'),
(245, 53, 1, 0.0055696, 0, '2016-04-04 05:59:23'),
(246, 54, 1, 0.0055696, 0, '2016-04-04 05:59:23'),
(247, 59, 1, 0.55751696, 0, '2016-04-04 05:59:23'),
(248, 61, 1, 0.0055863088, 0, '2016-04-04 05:59:23'),
(249, 63, 1, 0.0055696, 0, '2016-04-04 05:59:23'),
(250, 64, 1, 0.0055696, 0, '2016-04-04 05:59:23'),
(251, 70, 1, 0.55696, 0, '2016-04-04 05:59:23'),
(252, 71, 1, 5569.6, 0, '2016-04-04 05:59:23'),
(253, 72, 1, 5569.6, 0, '2016-04-04 05:59:23'),
(254, 73, 1, 5569.6, 0, '2016-04-04 05:59:23'),
(255, 74, 1, 0.0055696, 0, '2016-04-04 05:59:23'),
(256, 75, 1, 0.0055696, 0, '2016-04-04 05:59:23'),
(257, 76, 1, 0.0055696, 0, '2016-04-04 05:59:23'),
(258, 77, 1, 0.0055696, 0, '2016-04-04 05:59:23'),
(259, 78, 1, 0.0055696, 0, '2016-04-04 05:59:24'),
(260, 79, 1, 0.0055696, 0, '2016-04-04 05:59:24'),
(261, 80, 1, 0.0055696, 0, '2016-04-04 05:59:24'),
(262, 81, 1, 0.0055696, 0, '2016-04-04 05:59:24'),
(263, 82, 1, 0.0055696, 0, '2016-04-04 05:59:24'),
(264, 83, 1, 0.0055696, 0, '2016-04-04 05:59:24'),
(265, 37, 1, 0.055696, 0, '2016-04-04 05:59:24'),
(266, 47, 1, 0.0055696, 0, '2016-04-04 05:59:24'),
(271, 92, 0, 1000, 0, '2016-04-04 12:43:01');

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_payaccounts`
--

CREATE TABLE IF NOT EXISTS `hyip_payaccounts` (
  `id` int(11) NOT NULL,
  `paysystem_id` int(11) NOT NULL,
  `account` text
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_payaccounts`
--

INSERT INTO `hyip_payaccounts` (`id`, `paysystem_id`, `account`) VALUES
(0, 0, NULL),
(1, 4, NULL),
(5, 0, 'cde'),
(12, 0, NULL),
(15, 4, 'def'),
(22, 0, 'payeeeeeeeer'),
(23, 0, NULL),
(24, 0, NULL),
(25, 0, NULL),
(26, 9, NULL),
(27, 9, NULL),
(28, 9, NULL),
(29, 9, NULL),
(30, 9, NULL),
(31, 9, NULL),
(33, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_payeer`
--

CREATE TABLE IF NOT EXISTS `hyip_payeer` (
  `id` int(11) NOT NULL,
  `in_shop` varchar(64) NOT NULL,
  `in_key` varchar(64) NOT NULL,
  `out_acc` varchar(64) NOT NULL,
  `out_api_id` varchar(64) NOT NULL,
  `out_api_key` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_payeer`
--

INSERT INTO `hyip_payeer` (`id`, `in_shop`, `in_key`, `out_acc`, `out_api_id`, `out_api_key`, `active`) VALUES
(1, '144310282', 'URIqne6w0NXbg9GI', 'P30818941', '147701619', 'URIqne6w0NXbg9GI', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_paysystems`
--

CREATE TABLE IF NOT EXISTS `hyip_paysystems` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_paysystems`
--

INSERT INTO `hyip_paysystems` (`id`, `name`, `code`) VALUES
(0, 'Payeer', 2609),
(4, 'PerfectMoney', 84686071),
(5, 'Advcash', 0),
(9, 'Bitcoin', 0),
(10, 'Payeer RUB', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_percents`
--

CREATE TABLE IF NOT EXISTS `hyip_percents` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_percents`
--

INSERT INTO `hyip_percents` (`id`, `name`, `amount`) VALUES
(1, 'business_day', 0.0236),
(2, 'holiday', 0.01),
(3, 'referral_first', 0.01),
(4, 'referral_second', 0.01);

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_perfectmoney`
--

CREATE TABLE IF NOT EXISTS `hyip_perfectmoney` (
  `id` int(11) NOT NULL,
  `in_acc` varchar(64) NOT NULL,
  `in_name` varchar(64) NOT NULL,
  `out_id` varchar(64) NOT NULL,
  `out_pass` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_perfectmoney`
--

INSERT INTO `hyip_perfectmoney` (`id`, `in_acc`, `in_name`, `out_id`, `out_pass`, `active`) VALUES
(1, 'U11720744', 'IT Invest Project', '4092807', 'Pw3h735vKT', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_rate`
--

CREATE TABLE IF NOT EXISTS `hyip_rate` (
  `id` int(11) NOT NULL,
  `dollar_rate` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_rate`
--

INSERT INTO `hyip_rate` (`id`, `dollar_rate`, `date`) VALUES
(1, 70, '2016-03-14 08:53:34'),
(2, 70, '2016-03-15 11:17:27'),
(3, 70, '2016-03-16 12:22:44'),
(4, 71, '2016-03-17 07:25:10'),
(5, 68, '2016-03-18 06:30:35'),
(6, 68, '2016-03-21 05:43:25'),
(7, 68, '2016-03-22 07:18:10'),
(8, 67, '2016-03-23 06:40:47'),
(9, 67, '2016-03-24 05:45:36'),
(10, 68, '2016-03-25 06:18:37'),
(11, 68, '2016-03-28 12:30:28'),
(12, 68, '2016-03-30 08:50:45'),
(13, 67, '2016-04-01 08:55:19'),
(14, 67, '2016-04-04 05:59:18');

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_translations`
--

CREATE TABLE IF NOT EXISTS `hyip_translations` (
  `id` int(11) NOT NULL,
  `tag` varchar(64) NOT NULL,
  `russian` varchar(1024) DEFAULT NULL,
  `english` varchar(1024) DEFAULT NULL,
  `vietnamese` varchar(1024) DEFAULT NULL,
  `chinese` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_translations`
--

INSERT INTO `hyip_translations` (`id`, `tag`, `russian`, `english`, `vietnamese`, `chinese`) VALUES
(1, 'auth_email', 'E-mail', '', '', ''),
(2, 'auth_password', 'Пароль', '', '', ''),
(3, 'login_noacc', 'Еще нет аккаунта?', '', '', ''),
(4, 'login_register', 'Регистрация', '', '', ''),
(5, 'auth_copyright', 'Copyright 2015 ITInvestProject. Все права защищены.', '', '', ''),
(6, 'auth_message_emptyfields', 'Заполните все поля.', '', '', ''),
(7, 'login_message_incorrect', 'Неправильный e-mail или пароль. Повторите попытку.', '', '', ''),
(8, 'login_message_ipchange', 'Ваш ip-адрес изменился с последнего входа', '', '', ''),
(9, 'login_message_browserchange', 'Ваш браузер изменился с последнего входа', '', '', ''),
(10, 'login_message_error', 'Произошла ошибка входа', '', '', ''),
(11, 'login_message_activate', 'Ваш аккаунт еще не активирован', '', '', ''),
(12, 'register_fullname', 'Полное имя', '', '', ''),
(13, 'register_repeat_password', 'Повторите пароль', '', '', ''),
(14, 'register_button', 'Зарегистрироваться', '', '', ''),
(15, 'register_haveacc', 'Уже зарегистрированы?\r\n', '', '', ''),
(16, 'login_button', 'Войти', '', '', ''),
(17, 'register_message_passwords_notmatch', 'Пароли не совпадают', '', '', ''),
(18, 'register_message_email', 'Этот e-mail уже занят', '', '', ''),
(19, 'register_message_dberror', 'Ошибка записи в базу данных', '', '', ''),
(20, 'register_message_mailsend_error', 'Ошибка отправления письма, обратитесь в поддержку сайта', '', '', ''),
(21, 'register_message_mailsend_ok', 'Письмо для активации отправлено на ваш e-mail', '', '', ''),
(22, 'register_message_ok', 'Регистрация прошла успешно', '', '', ''),
(23, 'leftmenu_private', 'Кабинет', '', '', ''),
(24, 'leftmenu_deposits', 'Инвестиции', '', '', ''),
(25, 'leftmenu_newdeposit', 'Внести вклад', '', '', ''),
(26, 'leftmenu_referral', 'Рефералы', '', '', ''),
(27, 'leftmenu_settings', 'Настройки', '', '', ''),
(28, 'leftmenu_logout', 'Выход', '', '', ''),
(29, 'reflink', 'Реферальная ссылка', '', '', ''),
(30, 'private_balance', 'Баланс', '', '', ''),
(31, 'private_create_deposit', 'Создать вклад', '', '', ''),
(32, 'private_operation', 'Операция', '', '', ''),
(33, 'private_sum', 'Сумма', '', '', ''),
(34, 'private_system', 'Система', '', '', ''),
(35, 'private_date', 'Дата', '', '', ''),
(36, 'private_operation_in', 'Пополнение', '', '', ''),
(37, 'private_operation_out', 'Вывод', '', '', ''),
(38, 'private_status_ok', 'Выполнено', '', '', ''),
(39, 'private_status_wait', 'Ожидается', '', '', ''),
(40, 'deposits_payed', 'Выплачено', '', '', ''),
(41, 'deposits_lastpay', 'Последняя выплата', '', '', ''),
(42, 'deposits_nextpay', 'Следующая выплата\r\n', '', '', ''),
(43, 'deposits_pay_notyet', 'Еще не было', '', '', ''),
(44, 'newdeposit_sum', 'Сумма вклада\n', '', '', ''),
(45, 'newdeposit_addsystem', 'Выберите систему', '', '', ''),
(46, 'ref_inviteyou', 'Вас пригласил', '', '', ''),
(47, 'ref_num_referrals', 'Рефералы', '', '', ''),
(48, 'ref_active_referrals', 'Активные рефералы', '', '', ''),
(49, 'ref_percents', 'Ваши проценты', '', '', ''),
(50, 'settings_oldname', 'Ваше имя', '', '', ''),
(51, 'settings_newname', 'Новое имя', '', '', ''),
(52, 'settings_oldpass', 'Старый пароль', '', '', ''),
(53, 'settings_newpass', 'Новый пароль', '', '', ''),
(54, 'settings_email', 'E-mail адрес', '', '', ''),
(55, 'settings_apply', 'Сохранить изменения', '', '', ''),
(56, 'settings_safety', 'Безопасность', '', '', ''),
(57, 'settings_iptrack', 'Обнаружение IP-адреса', '', '', ''),
(58, 'settings_browser_track', 'Обнаружение браузера', '', '', ''),
(59, 'settings_turn_on', 'Включить', '', '', ''),
(60, 'settings_turn_off', 'Выключить', '', '', ''),
(61, 'private_status', 'Статус', '', '', ''),
(62, 'newdeposit_empty_field', 'Укажите сумму и платежную систему', '', '', ''),
(63, 'newdeposit_error_file', 'Произошла ошибка. Попробуйте позже', '', '', ''),
(64, 'newdeposit_system', 'Выбранная система', '', '', ''),
(65, 'settings_data_changed', 'Данные успешно изменены', '', '', ''),
(66, 'settings_repeat', 'Повторите пароль', '', '', ''),
(67, 'leftmenu_admin_accounts', 'Платежные аккаунты', '', '', ''),
(68, 'leftmenu_translation', 'Перевод', '', '', ''),
(69, 'topmenu_main', 'Главная', NULL, NULL, NULL),
(70, 'topmenu_aboutus', 'О нас', NULL, NULL, NULL),
(71, 'topmenu_investors', 'Инвесторам', NULL, NULL, NULL),
(72, 'topmenu_rules', 'Правила', NULL, NULL, NULL),
(73, 'topmenu_faq', 'Вопрос-ответ', NULL, NULL, NULL),
(74, 'topmenu_contacts', 'Контакты', NULL, NULL, NULL),
(75, 'register_login', 'Войти', NULL, NULL, NULL),
(76, 'register_rulesfollow', 'Регистрируясь, Вы соглашаетесь с ', NULL, NULL, NULL),
(77, 'register_rules', 'правилами', NULL, NULL, NULL),
(78, 'register_itinvest', 'ITInvestProject', NULL, NULL, NULL),
(79, 'register_activate_email_title', 'Вы зарегистрировались на сайте', NULL, NULL, NULL),
(80, 'register_activate_email_text', 'Для активации перейдите по ссылке', NULL, NULL, NULL),
(81, 'newdeposit_calc_profit', 'Расчет прибыли', NULL, NULL, NULL),
(82, 'newdeposit_calc_range', 'Диапазон', NULL, NULL, NULL),
(83, 'newdeposit_calc_input', 'Ручной ввод', NULL, NULL, NULL),
(84, 'newdeposit_calc_placeholder', 'введите сумму', NULL, NULL, NULL),
(85, 'newdeposit_calculate', 'Рассчитать', NULL, NULL, NULL),
(86, 'newdeposit_calc_sum', 'Сумма', NULL, NULL, NULL),
(87, 'newdeposit_calc_day', 'Доход в день', NULL, NULL, NULL),
(88, 'newdeposit_calc_month', 'Доход в месяц', NULL, NULL, NULL),
(89, 'newdeposit_calc_3month', 'Доход за 3 месяца', NULL, NULL, NULL),
(90, 'newdeposit_calc_6month', 'Доход за полгода', NULL, NULL, NULL),
(91, 'newdeposit_calc_year', 'Доход за год', NULL, NULL, NULL),
(92, 'leftmenu_reflink', 'Рекламные материалы', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `hyip_users`
--

CREATE TABLE IF NOT EXISTS `hyip_users` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(32) NOT NULL DEFAULT 'user',
  `parent_id` int(11) DEFAULT NULL,
  `percents` double NOT NULL,
  `last_ip` varchar(32) NOT NULL,
  `ip_track` tinyint(1) NOT NULL DEFAULT '0',
  `last_browser` varchar(128) NOT NULL,
  `browser_track` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hyip_users`
--

INSERT INTO `hyip_users` (`id`, `full_name`, `email`, `password`, `active`, `role`, `parent_id`, `percents`, `last_ip`, `ip_track`, `last_browser`, `browser_track`) VALUES
(12, 'Переподвыподверт', 'ak@rocketstation.ru', '$2y$10$/ppVJxGdwovP0FPFhqiz8eL8friAUx/73gGQSfwdlmsDFr5/zSBXC', 1, 'user', NULL, 0, '127.0.0.1', 0, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 0),
(7, 'Ivan Petrov', 'dezalator@gmail.com', '$2y$10$mxm5jyCihq/Lvx0WpTn3Gu5JH.6F.yHIaziAT1NrqIVWLJEz6BJyS', 1, 'admin', NULL, 0, '127.0.0.1', 0, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 1),
(13, 'Тирьямпампам', 'test@test.bz', '$2y$10$DryQ4Ly64B7ph3vtRla5GeJllcDxhO8g7qDnNXVADRt1iFwB6scyS', 1, 'user', 2, 0, '127.0.0.1', 0, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 0),
(3, 'TEST NAME', 'test@test.com', '123456', 1, 'user', 2, 0, '', 0, '', 0),
(5, 'Gans', 'test@test.eu', '123456', 1, 'user', 2, 0, '', 0, '', 0),
(2, 'parampampam', 'test@test.ru', '$2y$10$LXneZrY9khNruirwMQLLY.hEBZwI2vbOUu45TJYIzMfOvDAHTA/P.', 1, 'user', NULL, 1.79, '127.0.0.1', 0, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 1),
(4, 'Mykola', 'test@test.ua', '123456', 1, 'user', 2, 0, '', 0, '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `hyip_admaccounts`
--
ALTER TABLE `hyip_admaccounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paysystem_id` (`paysystem_id`);

--
-- Индексы таблицы `hyip_advcash`
--
ALTER TABLE `hyip_advcash`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hyip_bitcoin`
--
ALTER TABLE `hyip_bitcoin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hyip_cash`
--
ALTER TABLE `hyip_cash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payaccount_id` (`payaccount_id`);

--
-- Индексы таблицы `hyip_orders`
--
ALTER TABLE `hyip_orders`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `cash_id` (`cash_id`);

--
-- Индексы таблицы `hyip_payaccounts`
--
ALTER TABLE `hyip_payaccounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paysystem_id` (`paysystem_id`);

--
-- Индексы таблицы `hyip_payeer`
--
ALTER TABLE `hyip_payeer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hyip_paysystems`
--
ALTER TABLE `hyip_paysystems`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hyip_percents`
--
ALTER TABLE `hyip_percents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hyip_perfectmoney`
--
ALTER TABLE `hyip_perfectmoney`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hyip_rate`
--
ALTER TABLE `hyip_rate`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hyip_translations`
--
ALTER TABLE `hyip_translations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hyip_users`
--
ALTER TABLE `hyip_users`
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `hyip_admaccounts`
--
ALTER TABLE `hyip_admaccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `hyip_advcash`
--
ALTER TABLE `hyip_advcash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `hyip_bitcoin`
--
ALTER TABLE `hyip_bitcoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `hyip_cash`
--
ALTER TABLE `hyip_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT для таблицы `hyip_orders`
--
ALTER TABLE `hyip_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=272;
--
-- AUTO_INCREMENT для таблицы `hyip_payaccounts`
--
ALTER TABLE `hyip_payaccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `hyip_payeer`
--
ALTER TABLE `hyip_payeer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `hyip_paysystems`
--
ALTER TABLE `hyip_paysystems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `hyip_percents`
--
ALTER TABLE `hyip_percents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `hyip_perfectmoney`
--
ALTER TABLE `hyip_perfectmoney`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `hyip_rate`
--
ALTER TABLE `hyip_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `hyip_translations`
--
ALTER TABLE `hyip_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT для таблицы `hyip_users`
--
ALTER TABLE `hyip_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `hyip_admaccounts`
--
ALTER TABLE `hyip_admaccounts`
  ADD CONSTRAINT `hyip_admaccounts_ibfk_1` FOREIGN KEY (`paysystem_id`) REFERENCES `hyip_paysystems` (`id`);

--
-- Ограничения внешнего ключа таблицы `hyip_cash`
--
ALTER TABLE `hyip_cash`
  ADD CONSTRAINT `hyip_cash_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `hyip_users` (`id`),
  ADD CONSTRAINT `hyip_cash_ibfk_2` FOREIGN KEY (`payaccount_id`) REFERENCES `hyip_payaccounts` (`id`);

--
-- Ограничения внешнего ключа таблицы `hyip_orders`
--
ALTER TABLE `hyip_orders`
  ADD CONSTRAINT `hyip_orders_ibfk_3` FOREIGN KEY (`cash_id`) REFERENCES `hyip_cash` (`id`);

--
-- Ограничения внешнего ключа таблицы `hyip_payaccounts`
--
ALTER TABLE `hyip_payaccounts`
  ADD CONSTRAINT `hyip_payaccounts_ibfk_1` FOREIGN KEY (`paysystem_id`) REFERENCES `hyip_paysystems` (`id`);

--
-- Ограничения внешнего ключа таблицы `hyip_users`
--
ALTER TABLE `hyip_users`
  ADD CONSTRAINT `hyip_users_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `hyip_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
