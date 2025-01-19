-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2024 a las 19:34:09
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_mvc`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VERIFY_USER` (IN `USUARIO` VARCHAR(255))  SELECT 
users.user_id,
users.user_image,
users.user_name,
users.email,
users.sex,
users.group_id,
users.status,
users.staff_id,
users.hash_password,
users.raw_password,
users.last_login,
users.created_at,
users.updated_at
FROM
users
WHERE users.email = BINARY USUARIO$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_log`
--

CREATE TABLE `login_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `success` tinyint(1) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `code_staff` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_image` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sex` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `hash_password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `raw_password` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_image`, `user_name`, `email`, `sex`, `group_id`, `status`, `staff_id`, `hash_password`, `raw_password`, `last_login`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@admin.com', 'M', 1, 1, NULL, '$2y$12$sOwVmz7mA6lDIwIZB./7XO1X8pnQzdWRQrJW6SaOSV7tzOC762/MS', 'admin', '2023-07-27 06:00:00', '2023-07-27 16:55:06', '2023-07-28 18:09:50'),
(2, NULL, 'salesman', 'salesman@salesman.com', 'M', 2, 1, NULL, 'salesman', 'salesman', '2023-07-27 06:00:00', '2023-07-27 16:55:06', '2023-07-27 16:55:06'),
(3, NULL, 'cashier', 'cashier@cashier.com', 'M', 3, 0, NULL, 'cashier', 'cashier', '2023-07-27 06:00:00', '2023-07-27 16:55:06', '2023-08-04 22:19:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_group`
--

CREATE TABLE `user_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `permission` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user_group`
--

INSERT INTO `user_group` (`group_id`, `group_name`, `slug`, `status`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'admin', 1, NULL, '2023-08-17 22:32:56', '2023-09-11 20:30:06'),
(2, 'SALESMAN', 'salesman', 1, NULL, '2023-08-17 22:32:56', '2023-09-11 17:07:09'),
(3, 'CASHIER', 'cashier', 2, NULL, '2023-08-17 22:32:56', '2023-09-11 20:30:28'),
(5, 'RR-HH', 'rr-hh', 1, NULL, '2023-08-24 16:14:41', '2023-08-24 16:14:41'),
(6, 'STOREHOUSE', 'storehouse', 1, NULL, '2023-08-24 16:18:56', '2023-09-11 20:30:22'),
(10, 'TREASURY', 'treasury', 1, NULL, '2023-08-24 16:46:55', '2023-09-11 16:19:37'),
(14, 'MANAGER', 'manager', 2, NULL, '2023-09-11 16:59:23', '2023-09-11 20:30:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indices de la tabla `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`group_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login_log`
--
ALTER TABLE `login_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user_group`
--
ALTER TABLE `user_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `user_group` (`group_id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `user_group` (`group_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
