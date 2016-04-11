-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2016 at 01:24 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.6.18-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hyip`
--

-- --------------------------------------------------------

--
-- Table structure for table `hyip_admaccounts`
--

CREATE TABLE IF NOT EXISTS `hyip_admaccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paysystem_id` int(11) NOT NULL,
  `paynumber` varchar(128) NOT NULL,
  `account` text,
  `password` varchar(32) NOT NULL,
  `currency` varchar(4) NOT NULL DEFAULT 'RUB',
  `inout` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paysystem_id` (`paysystem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `hyip_admaccounts`
--

INSERT INTO `hyip_admaccounts` (`id`, `paysystem_id`, `paynumber`, `account`, `password`, `currency`, `inout`) VALUES
(1, 0, '123', 'P30818941', '3Zk84pwS97', 'RUB', 0),
(2, 0, '', 'P30818941', '3Zk84pwS97', 'USD', 0),
(6, 4, '', '4092807', 'Pw3h735vKT', 'USD', 0),
(7, 5, '', 'nosra787@gmail.com', 'P521ws37FK', 'USD', 0),
(8, 0, '', 'test@test.ru', '123456', 'RUB', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hyip_advcash`
--

CREATE TABLE IF NOT EXISTS `hyip_advcash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_acc` varchar(64) NOT NULL,
  `in_name` varchar(64) NOT NULL,
  `in_sign` varchar(64) NOT NULL,
  `out_api_name` varchar(64) NOT NULL,
  `out_key` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hyip_advcash`
--

INSERT INTO `hyip_advcash` (`id`, `in_acc`, `in_name`, `in_sign`, `out_api_name`, `out_key`, `active`) VALUES
(1, 'nosra787@gmail.com', 'IT Invest Project', 'e9dd6f1d4927fbbad1c3590df8fd1b5459d98567e2edb75a5e3b048e893982c4', 'IT Invest Project', 'P521ws37FK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hyip_bitcoin`
--

CREATE TABLE IF NOT EXISTS `hyip_bitcoin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(64) NOT NULL,
  `secret_key` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hyip_bitcoin`
--

INSERT INTO `hyip_bitcoin` (`id`, `token`, `secret_key`, `active`) VALUES
(1, '97d26baa4d4c2d24ab7ced91f44ae65afbf69327b9281e369f4e5bbba78d4365', '464a91535c82b2ea4b8168f0d8667267', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hyip_cash`
--

CREATE TABLE IF NOT EXISTS `hyip_cash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payaccount_id` int(11) NOT NULL,
  `cash` double unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `outs` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `payaccount_id` (`payaccount_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `hyip_cash`
--

INSERT INTO `hyip_cash` (`id`, `user_id`, `payaccount_id`, `cash`, `created`, `outs`) VALUES
(93, 18, 88, 0, '2016-04-10 21:52:46', 0),
(94, 18, 89, 0, '2016-04-10 21:52:46', 0),
(95, 18, 90, 0, '2016-04-10 21:52:46', 0),
(96, 18, 91, 0, '2016-04-10 21:52:46', 0),
(97, 18, 92, 0, '2016-04-10 21:52:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hyip_orders`
--

CREATE TABLE IF NOT EXISTS `hyip_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cash_id` int(11) NOT NULL,
  `operation` tinyint(1) NOT NULL,
  `sum` double NOT NULL,
  `code` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`),
  KEY `cash_id` (`cash_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hyip_payaccounts`
--

CREATE TABLE IF NOT EXISTS `hyip_payaccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paysystem_id` int(11) NOT NULL,
  `account` text,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paysystem_id` (`paysystem_id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `hyip_payaccounts`
--

INSERT INTO `hyip_payaccounts` (`id`, `paysystem_id`, `account`, `user_id`) VALUES
(88, 0, 'yyuuunn', 18),
(89, 4, 'asdasd', 18),
(90, 5, 'sdscx', 18),
(91, 9, 'xcxcx', 18),
(92, 10, 'qwerty', 18);

-- --------------------------------------------------------

--
-- Table structure for table `hyip_payeer`
--

CREATE TABLE IF NOT EXISTS `hyip_payeer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_shop` varchar(64) NOT NULL,
  `in_key` varchar(64) NOT NULL,
  `out_acc` varchar(64) NOT NULL,
  `out_api_id` varchar(64) NOT NULL,
  `out_api_key` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hyip_payeer`
--

INSERT INTO `hyip_payeer` (`id`, `in_shop`, `in_key`, `out_acc`, `out_api_id`, `out_api_key`, `active`) VALUES
(1, '144310282', 'URIqne6w0NXbg9GI', 'P30818941', '147701619', 'URIqne6w0NXbg9GI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hyip_paysystems`
--

CREATE TABLE IF NOT EXISTS `hyip_paysystems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hyip_paysystems`
--

INSERT INTO `hyip_paysystems` (`id`, `name`, `code`) VALUES
(0, 'Payeer', 2609),
(4, 'PerfectMoney', 84686071),
(5, 'Advcash', 0),
(9, 'Bitcoin', 0),
(10, 'Payeer RUB', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hyip_percents`
--

CREATE TABLE IF NOT EXISTS `hyip_percents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hyip_percents`
--

INSERT INTO `hyip_percents` (`id`, `name`, `amount`) VALUES
(1, 'business_day', 0.0236),
(2, 'holiday', 0.01),
(3, 'referral_first', 0.01),
(4, 'referral_second', 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `hyip_perfectmoney`
--

CREATE TABLE IF NOT EXISTS `hyip_perfectmoney` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_acc` varchar(64) NOT NULL,
  `in_name` varchar(64) NOT NULL,
  `out_id` varchar(64) NOT NULL,
  `out_pass` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hyip_perfectmoney`
--

INSERT INTO `hyip_perfectmoney` (`id`, `in_acc`, `in_name`, `out_id`, `out_pass`, `active`) VALUES
(1, 'U11720744', 'IT Invest Project', '4092807', 'Pw3h735vKT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hyip_rate`
--

CREATE TABLE IF NOT EXISTS `hyip_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dollar_rate` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `hyip_rate`
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
(14, 67, '2016-04-04 05:59:18'),
(15, 68, '2016-04-05 07:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `hyip_translations`
--

CREATE TABLE IF NOT EXISTS `hyip_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(64) NOT NULL,
  `russian` varchar(1024) DEFAULT NULL,
  `english` varchar(1024) DEFAULT NULL,
  `vietnamese` varchar(1024) DEFAULT NULL,
  `chinese` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `hyip_translations`
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
(92, 'leftmenu_reflink', 'Рекламные материалы', NULL, NULL, NULL),
(93, 'ref_out_percent', 'Вывести процент', NULL, NULL, NULL),
(94, 'auth_forgot', 'Забыли пароль?', NULL, NULL, NULL),
(95, 'leftmenu_userlist', 'пользователи', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hyip_users`
--

CREATE TABLE IF NOT EXISTS `hyip_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `browser_track` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(4) NOT NULL DEFAULT '0',
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `id` (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `hyip_users`
--

INSERT INTO `hyip_users` (`id`, `full_name`, `email`, `password`, `active`, `role`, `parent_id`, `percents`, `last_ip`, `ip_track`, `last_browser`, `browser_track`, `banned`) VALUES
(12, 'Переподвыподверт', 'ak@rocketstation.ru', '$2y$10$/ppVJxGdwovP0FPFhqiz8eL8friAUx/73gGQSfwdlmsDFr5/zSBXC', 1, 'user', NULL, 0, '127.0.0.1', 0, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 0, 0),
(7, 'Ivan Petrov', 'dezalator@gmail.com', '$2y$10$mxm5jyCihq/Lvx0WpTn3Gu5JH.6F.yHIaziAT1NrqIVWLJEz6BJyS', 1, 'admin', NULL, 0, '192.168.1.29', 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 0, 0),
(18, 'onemore', 'onemore@test.ru', '$2y$10$hVaHNS4D7wWj9MiyFpnsKu94xsA.vDPkhEfSVclffq.RVtQvoBDMu', 0, 'user', NULL, 0, '192.168.1.29', 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 0, 0),
(15, 'test4@test.ru', 'test4@test.ru', '$2y$10$7eJMVhstiRV6olnuHkqhYenZE0T8VZW2/IqZLaPyQdk5/lIr80zby', 0, 'user', NULL, 0, '192.168.1.29', 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 0, 0),
(16, 'serg', 'test5@test.ru', '$2y$10$la477pQ1fyRjXFnHTHFB5uiMDok40vsIkliiUWTwVowYbLxkPznte', 0, 'user', NULL, 0, '192.168.1.29', 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 0, 0),
(13, 'Тирьямпампам', 'test@test.bz', '$2y$10$DryQ4Ly64B7ph3vtRla5GeJllcDxhO8g7qDnNXVADRt1iFwB6scyS', 1, 'user', 2, 0, '127.0.0.1', 0, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 0, 0),
(3, 'TEST NAME', 'test@test.com', '123456', 1, 'user', 2, 0, '', 0, '', 0, 0),
(5, 'Gans', 'test@test.eu', '123456', 1, 'user', 2, 0, '', 0, '', 0, 1),
(2, 'parampampam', 'test@test.ru', '$2y$10$LXneZrY9khNruirwMQLLY.hEBZwI2vbOUu45TJYIzMfOvDAHTA/P.', 1, 'user', NULL, 1.79, '192.168.1.29', 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 0, 1),
(4, 'Mykola', 'test@test.ua', '123456', 1, 'user', 2, 0, '', 0, '', 0, 1),
(14, 'test3@test.ru', 'test@test3.ru', '$2y$10$g.b5P2NS5cjiGpMd6CWrdOHhuS.52t6vIDkjnWLCAxKxcjCE5oXLq', 0, 'user', NULL, 0, '192.168.1.29', 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 0, 0),
(17, 'testtest@test.ru', 'testtest@test.ru', '$2y$10$6Xr3VaMoyErzTUW0.64e9eFZyzmNYw/V16PCVnekz73XIRyY2h3W2', 0, 'user', NULL, 0, '192.168.1.29', 0, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hyip_admaccounts`
--
ALTER TABLE `hyip_admaccounts`
  ADD CONSTRAINT `hyip_admaccounts_ibfk_1` FOREIGN KEY (`paysystem_id`) REFERENCES `hyip_paysystems` (`id`);

--
-- Constraints for table `hyip_cash`
--
ALTER TABLE `hyip_cash`
  ADD CONSTRAINT `hyip_cash_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `hyip_users` (`id`),
  ADD CONSTRAINT `hyip_cash_ibfk_2` FOREIGN KEY (`payaccount_id`) REFERENCES `hyip_payaccounts` (`id`);

--
-- Constraints for table `hyip_orders`
--
ALTER TABLE `hyip_orders`
  ADD CONSTRAINT `hyip_orders_ibfk_3` FOREIGN KEY (`cash_id`) REFERENCES `hyip_cash` (`id`);

--
-- Constraints for table `hyip_payaccounts`
--
ALTER TABLE `hyip_payaccounts`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `hyip_users` (`id`),
  ADD CONSTRAINT `hyip_payaccounts_ibfk_1` FOREIGN KEY (`paysystem_id`) REFERENCES `hyip_paysystems` (`id`);

--
-- Constraints for table `hyip_users`
--
ALTER TABLE `hyip_users`
  ADD CONSTRAINT `hyip_users_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `hyip_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
