-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2016 at 05:30 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hyip_new`
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
(1, '4b88661478c1d8fc26aa8294cf8938a7cba649f5012a1eb2b778d7dd2d29c2f9', '464a91535c82b2ea4b8168f0d8667267', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=428 ;

--
-- Dumping data for table `hyip_cash`
--

INSERT INTO `hyip_cash` (`id`, `user_id`, `payaccount_id`, `cash`, `created`, `outs`) VALUES
(376, 37, 221, 10, '2016-04-14 16:01:00', 1),
(384, 37, 223, 10, '2016-04-14 16:01:02', 1),
(387, 37, 222, 10, '2016-04-14 16:01:04', 1),
(397, 39, 237, 10, '2016-04-14 16:01:04', 1),
(405, 40, 243, 10, '2016-04-14 16:01:05', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=233 ;

--
-- Dumping data for table `hyip_orders`
--

INSERT INTO `hyip_orders` (`id`, `cash_id`, `operation`, `sum`, `code`, `date`) VALUES
(218, 376, 0, 10, 0, '2016-04-13 15:19:42'),
(219, 384, 0, 10, 0, '2016-04-13 15:25:56'),
(222, 387, 0, 10, 0, '2016-04-13 15:30:31'),
(225, 397, 0, 10, 0, '2016-04-14 15:58:33'),
(226, 405, 0, 10, 0, '2016-04-13 16:01:37'),
(228, 376, 1, 0.15, 1, '2016-04-14 16:01:00'),
(229, 384, 1, 0.15, 1, '2016-04-14 16:01:02'),
(230, 387, 1, 0.15, 0, '2016-04-14 16:03:35'),
(231, 397, 1, 0.15, 1, '2016-04-14 16:01:04'),
(232, 405, 1, 0.15, 0, '2016-04-14 16:03:39');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=270 ;

--
-- Dumping data for table `hyip_payaccounts`
--

INSERT INTO `hyip_payaccounts` (`id`, `paysystem_id`, `account`, `user_id`) VALUES
(221, 0, 'P31975140', 37),
(222, 4, 'U11224281', 37),
(223, 5, 'U 0334 6625 5829', 37),
(235, 0, NULL, 39),
(236, 4, NULL, 39),
(237, 5, 'bdfhfghfgfg', 39),
(242, 0, 'P30818941', 40),
(243, 4, 'U11720744', 40),
(244, 5, NULL, 40),
(249, 0, 'hfhfhfjfjgjghjf', 41),
(250, 4, 'ghjghj', 41),
(251, 5, 'ghjgjghjghjghj', 41),
(256, 0, '123321', 42),
(257, 4, '4325', 42),
(258, 5, '54352345345634', 42),
(264, 4, '3e2', 43),
(265, 5, 'dfbvmkgj.l,', 43);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
(5, 'Advcash', 0);

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
(1, 'business_day', 0.015),
(2, 'holiday', 0.001),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `hyip_translations`
--

INSERT INTO `hyip_translations` (`id`, `tag`, `russian`, `english`, `vietnamese`, `chinese`) VALUES
(1, 'auth_email', 'E-mail', 'E-mail_en', '', ''),
(2, 'auth_password', 'Пароль', 'Пароль_en', '', ''),
(3, 'login_noacc', 'Еще нет аккаунта?', 'Еще нет аккаунта?_en', '', ''),
(4, 'login_register', 'Регистрация', 'Регистрация_en', '', ''),
(5, 'auth_copyright', 'Copyright 2015 ITInvestProject. Все права защищены.', 'Copyright 2015 ITInvestProject. Все права защищены._en', '', ''),
(6, 'auth_message_emptyfields', 'Заполните все поля.', 'Заполните все поля._en', '', ''),
(7, 'login_message_incorrect', 'Неправильный e-mail или пароль. Повторите попытку.', 'Неправильный e-mail или пароль. Повторите попытку._en', '', ''),
(8, 'login_message_ipchange', 'Ваш ip-адрес изменился с последнего входа', 'Ваш ip-адрес изменился с последнего входа_en', '', ''),
(9, 'login_message_browserchange', 'Ваш браузер изменился с последнего входа', 'Ваш браузер изменился с последнего входа_en', '', ''),
(10, 'login_message_error', 'Произошла ошибка входа', 'Произошла ошибка входа_en', '', ''),
(11, 'login_message_activate', 'Ваш аккаунт еще не активирован', 'Ваш аккаунт еще не активирован_en', '', ''),
(12, 'register_fullname', 'Полное имя', 'Полное имя_en', '', ''),
(13, 'register_repeat_password', 'Повторите пароль', 'Повторите пароль_en', '', ''),
(14, 'register_button', 'Зарегистрироваться', 'Зарегистрироваться_en', '', ''),
(15, 'register_haveacc', 'Уже зарегистрированы?\r\n', 'Уже зарегистрированы?\r\n_en', '', ''),
(16, 'login_button', 'Войти', 'Войти_en', '', ''),
(17, 'register_message_passwords_notmatch', 'Пароли не совпадают', 'Пароли не совпадают_en', '', ''),
(18, 'register_message_email', 'Этот e-mail уже занят', 'Этот e-mail уже занят_en', '', ''),
(19, 'register_message_dberror', 'Ошибка записи в базу данных', 'Ошибка записи в базу данных_en', '', ''),
(20, 'register_message_mailsend_error', 'Ошибка отправления письма, обратитесь в поддержку сайта', 'Ошибка отправления письма, обратитесь в поддержку сайта_en', '', ''),
(21, 'register_message_mailsend_ok', 'Письмо для активации отправлено на ваш e-mail', 'Письмо для активации отправлено на ваш e-mail_en', '', ''),
(22, 'register_message_ok', 'Регистрация прошла успешно', 'Регистрация прошла успешно_en', '', ''),
(23, 'leftmenu_private', 'Кабинет', 'Кабинет_en', '', ''),
(24, 'leftmenu_deposits', 'Инвестиции', 'Инвестиции_en', '', ''),
(25, 'leftmenu_newdeposit', 'Внести вклад', 'Внести вклад_en', '', ''),
(26, 'leftmenu_referral', 'Рефералы', 'Рефералы_en', '', ''),
(27, 'leftmenu_settings', 'Настройки', 'Настройки_en', '', ''),
(28, 'leftmenu_logout', 'Выход', 'Выход_en', '', ''),
(29, 'reflink', 'Реферальная ссылка', 'Реферальная ссылка_en', '', ''),
(30, 'private_balance', 'Баланс', 'Баланс_en', '', ''),
(31, 'private_create_deposit', 'Создать вклад', 'Создать вклад_en', '', ''),
(32, 'private_operation', 'Операция', 'Операция_en', '', ''),
(33, 'private_sum', 'Сумма', 'Сумма_en', '', ''),
(34, 'private_system', 'Система', 'Система_en', '', ''),
(35, 'private_date', 'Дата', 'Дата_en', '', ''),
(36, 'private_operation_in', 'Пополнение', 'Пополнение_en', '', ''),
(37, 'private_operation_out', 'Вывод', 'Вывод_en', '', ''),
(38, 'private_status_ok', 'Выполнено', 'Выполнено_en', '', ''),
(39, 'private_status_wait', 'Ожидается', 'Ожидается_en', '', ''),
(40, 'deposits_payed', 'Выплачено', 'Выплачено_en', '', ''),
(41, 'deposits_lastpay', 'Последняя выплата', 'Последняя выплата_en', '', ''),
(42, 'deposits_nextpay', 'Следующая выплата\r\n', 'Следующая выплата\r\n_en', '', ''),
(43, 'deposits_pay_notyet', 'Еще не было', 'Еще не было_en', '', ''),
(44, 'newdeposit_sum', 'Сумма вклада\r\n', 'Сумма вклада\r\n_en', '', ''),
(45, 'newdeposit_addsystem', 'Выберите систему', 'Выберите систему_en', '', ''),
(46, 'ref_inviteyou', 'Вас пригласил', 'Вас пригласил_en', 'fgfdg', 'dfgfdg'),
(47, 'ref_num_referrals', 'Рефералы', 'Рефералы_en', '', ''),
(48, 'ref_active_referrals', 'Активные рефералы', 'Активные рефералы_en', '', ''),
(49, 'ref_percents', 'Ваши проценты', 'Ваши проценты_en', '', ''),
(50, 'settings_oldname', 'Ваше имя', 'Ваше имя_en', '', ''),
(51, 'settings_newname', 'Новое имя', 'Новое имя_en', '', ''),
(52, 'settings_oldpass', 'Старый пароль', 'Старый пароль_en', '', ''),
(53, 'settings_newpass', 'Новый пароль', 'Новый пароль_en', '', ''),
(54, 'settings_email', 'E-mail адрес', 'E-mail адрес_en', '', ''),
(55, 'settings_apply', 'Сохранить изменения', 'Сохранить изменения_en', '', ''),
(56, 'settings_safety', 'Безопасность', 'Безопасность_en', '', ''),
(57, 'settings_iptrack', 'Обнаружение IP-адреса', 'Обнаружение IP-адреса_en', '', ''),
(58, 'settings_browser_track', 'Обнаружение браузера', 'Обнаружение браузера_en', '', ''),
(59, 'settings_turn_on', 'Включить', 'Включить_en', '', ''),
(60, 'settings_turn_off', 'Выключить', 'Выключить_en', '', ''),
(61, 'private_status', 'Статус', 'Статус_en', '', ''),
(62, 'newdeposit_empty_field', 'Укажите сумму и платежную систему', 'Укажите сумму и платежную систему_en', '', ''),
(63, 'newdeposit_error_file', 'Произошла ошибка. Попробуйте позже', 'Произошла ошибка. Попробуйте позже_en', '', ''),
(64, 'newdeposit_system', 'Выбранная система', 'Выбранная система_en', '', ''),
(65, 'settings_data_changed', 'Данные успешно изменены', 'Данные успешно изменены_en', '', ''),
(66, 'settings_repeat', 'Повторите пароль', 'Повторите пароль_en', '', ''),
(67, 'leftmenu_admin_accounts', 'Платежные аккаунты', 'Платежные аккаунты_en', '', ''),
(68, 'leftmenu_translation', 'Перевод', 'Перевод_en', '', ''),
(69, 'topmenu_main', 'Главная', 'Главная_en', NULL, NULL),
(70, 'topmenu_aboutus', 'О нас', 'О нас_en', NULL, NULL),
(71, 'topmenu_investors', 'Инвесторам', 'Инвесторам_en', NULL, NULL),
(72, 'topmenu_rules', 'Правила', 'Правила_en', NULL, NULL),
(73, 'topmenu_faq', 'Вопрос-ответ', 'Вопрос-ответ_en', NULL, NULL),
(74, 'topmenu_contacts', 'Контакты', 'Контакты_en', NULL, NULL),
(75, 'register_login', 'Войти', 'Войти_en', NULL, NULL),
(76, 'register_rulesfollow', 'Регистрируясь, Вы соглашаетесь с ', 'Регистрируясь, Вы соглашаетесь с _en', NULL, NULL),
(77, 'register_rules', 'правилами', 'правилами_en', NULL, NULL),
(78, 'register_itinvest', 'ITInvestProject', 'ITInvestProject_en', NULL, NULL),
(79, 'register_activate_email_title', 'Вы зарегистрировались на сайте', 'Вы зарегистрировались на сайте_en', NULL, NULL),
(80, 'register_activate_email_text', 'Для активации перейдите по ссылке', 'Для активации перейдите по ссылке_en', NULL, NULL),
(81, 'newdeposit_calc_profit', 'Расчет прибыли', 'Расчет прибыли_en', NULL, NULL),
(82, 'newdeposit_calc_range', 'Диапазон', 'Диапазон_en', NULL, NULL),
(83, 'newdeposit_calc_input', 'Ручной ввод', 'Ручной ввод_en', NULL, NULL),
(84, 'newdeposit_calc_placeholder', 'введите сумму', 'введите сумму_en', NULL, NULL),
(85, 'newdeposit_calculate', 'Рассчитать', 'Рассчитать_en', NULL, NULL),
(86, 'newdeposit_calc_sum', 'Сумма', 'Сумма_en', NULL, NULL),
(87, 'newdeposit_calc_day', 'Доход в день', 'Доход в день_en', NULL, NULL),
(88, 'newdeposit_calc_month', 'Доход в месяц', 'Доход в месяц_en', NULL, NULL),
(89, 'newdeposit_calc_3month', 'Доход за 3 месяца', 'Доход за 3 месяца_en', NULL, NULL),
(90, 'newdeposit_calc_6month', 'Доход за полгода', 'Доход за полгода_en', NULL, NULL),
(91, 'newdeposit_calc_year', 'Доход за год', 'Доход за год_en', NULL, NULL),
(92, 'leftmenu_reflink', 'Рекламные материалы', 'Рекламные материалы_en', NULL, NULL),
(93, 'ref_out_percent', 'Вывести процент', 'Вывести процент_en', NULL, NULL),
(94, 'auth_forgot', 'Забыли пароль?', 'Забыли пароль?_en', NULL, NULL),
(95, 'leftmenu_userlist', 'пользователи', 'пользователи_en', NULL, NULL),
(96, 'banned', 'Ваш аккаунт заблокирован', 'Ваш аккаунт заблокирован_en', NULL, NULL),
(97, 'not_active', 'Ваш аккаунт не подтвержден', 'Ваш аккаунт не подтвержден_en', NULL, NULL),
(98, 'register_activate_email_body', 'Уважаемый(ая) Инвестор, вы зарегистрировались на сайте https://itinvestproject.com\r\nПросим подтвердить вашу электронную почту для продолжения работы с системой.', NULL, NULL, NULL),
(99, 'register_activate_email_footer', 'С уважением, админмстрация  IT Invest Project.', NULL, NULL, NULL),
(100, 'password_restore_message', 'Восстановление пароля'', "Уважаемый(ая) инвестор, Вы совершили операцию на сайте pa.itinvestproject.com Для подтверждения совершаемый действий следуйте нижепреведенным инструкциям:\r\nВы запросили восстановление пароля. Ваш новый пароль', NULL, NULL, NULL),
(101, 'restore_mail_header', 'Восстановление пароля', NULL, NULL, NULL),
(102, 'email_enter_operation', 'Подтвердите операцию входа'',''Уважаемый(ая) инвестор, Вы совершили операцию на сайте pa.itinvestproject.com Для подтверждения совершаемых действий следуйте нижепреведенным инструкциям:\r\nПерейдите по ссылке: https://pa.itinvestproject.com/auth?verify=', NULL, NULL, NULL),
(103, 'referal_warning_header', 'Уважаемый Инвестор, для участия в реферальной программе вы должны зарегистрировать аккаунты всех доступных платежных систем', 'Уважаемый Инвестор, для участия в реферальной программе вы должны зарегистрировать аккаунты всех доступных платежных систем EN', NULL, NULL),
(104, 'referal_warning_text', '        <h2>О реферальной системе</h2>\r\n        <h4>Вознаграждение за привлеченных инвесторов - 5%</h4>\r\n        <p>Выплаты реферальных процентов происходят в автоматическом режиме. </p>\r\n        <p>Для участия в реферальной программе инвестору необходимо указать кошельки всех платежных систем.</p>', '        <h2>О реферальной системе EN</h2>\r\n        <h4>Вознаграждение за привлеченных инвесторов - 5%</h4>\r\n        <p>Выплаты реферальных процентов происходят в автоматическом режиме.EN </p>\r\n        <p>Для участия в реферальной программе инвестору необходимо указать кошельки всех платежных систем.EN</p>', NULL, NULL),
(105, 'money_export', 'ВЫВЕДЕНО', 'ВЫВЕДЕНО EN', NULL, NULL),
(106, 'newdeposit_warning', 'Введите значение от 10 до 10 000', 'Введите значение от 10 до 10 000 EN', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `hyip_users`
--

INSERT INTO `hyip_users` (`id`, `full_name`, `email`, `password`, `active`, `role`, `parent_id`, `percents`, `last_ip`, `ip_track`, `last_browser`, `browser_track`, `banned`) VALUES
(42, 'Petr Ivanov', 'ak@rocketstation.ru', '$2y$10$2rkpEGfYLLCqT1iCcDDOPusnz0/9SxNLZkAi4S7ZpuuNJNNVwFTjW', 1, 'user', NULL, 0, '109.254.64.10', 0, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', 0, 0),
(41, 'alextim373', 'alextim373@gmail.com', '$2y$10$S5SJwgShCnHIIYdxm3lPDOSkTkDA6fc3iJmTmqf0qgo6thrFyZlVu', 0, 'user', NULL, 0, '37.0.124.57', 0, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', 0, 0),
(7, 'Ivan Petrov', 'dezalator@gmail.com', '$2y$10$mxm5jyCihq/Lvx0WpTn3Gu5JH.6F.yHIaziAT1NrqIVWLJEz6BJyS', 1, 'admin', NULL, 0, '127.0.0.1', 0, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/49.0.2623.108 Chrome/49.0.2623.108 Safari', 0, 0),
(40, 'nosra787', 'nosra787@gmail.com', '$2y$10$5ulDIy4N6DXvFZ/Lle8ua.q8rizTNp.wAX5wANQgTpP.zvkA6oTFO', 1, 'user', 39, 0, '37.0.124.57', 0, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', 0, 0),
(39, 'romako686', 'romako686@gmail.com', '$2y$10$p8RDJaNzCms9Hu/wQbtd8.hCKaTzX.VQ6AMtAWHv.i84E3/lp7DA2', 1, 'user', NULL, 0, '37.0.124.57', 0, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', 0, 0),
(43, 'Petr Petrov', 'test@test.ru', '$2y$10$VncM2NyQVbnhgRkmPUP60O2H1zV5fAW/vCvWDIU4fo4MGgrMgwlwO', 0, 'user', 42, 0, '127.0.0.1', 0, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/49.0.2623.108 Chrome/49.0.2623.108 Safari', 0, 0),
(37, 'viktor80', 'viktorgrek70@gmail.com', '$2y$10$tOju7SuUx4rdkW.8SWAnb.6C1xuneeBkpMgbnpWJuj2RCErltlR4y', 1, 'user', NULL, 0, '37.0.124.57', 0, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36', 0, 0);

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
  ADD CONSTRAINT `hyip_cash_ibfk_2` FOREIGN KEY (`payaccount_id`) REFERENCES `hyip_payaccounts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `hyip_cash_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `hyip_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `hyip_orders`
--
ALTER TABLE `hyip_orders`
  ADD CONSTRAINT `hyip_orders_ibfk_3` FOREIGN KEY (`cash_id`) REFERENCES `hyip_cash` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `hyip_payaccounts`
--
ALTER TABLE `hyip_payaccounts`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `hyip_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hyip_payaccounts_ibfk_1` FOREIGN KEY (`paysystem_id`) REFERENCES `hyip_paysystems` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
