-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2025 a las 03:49:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VERIFY_USER` (IN `USUARIO` VARCHAR(255))   SELECT 
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
-- Estructura de tabla para la tabla `group_permissions`
--

CREATE TABLE `group_permissions` (
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `group_permissions`
--

INSERT INTO `group_permissions` (`group_id`, `permission_id`, `status`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 0),
(2, 1, 1),
(2, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_log`
--

CREATE TABLE `login_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `success` tinyint(1) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`permission_id`, `permission_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Eliminar', 1, '2025-03-30 21:08:03', '2025-03-30 21:08:03'),
(2, 'Actualizar', 1, '2025-03-30 21:08:10', '2025-03-30 21:08:10'),
(3, 'Editar', 1, '2025-03-30 21:08:16', '2025-03-30 21:08:16'),
(4, 'Activar ', 1, '2025-03-30 21:08:34', '2025-03-30 21:08:34'),
(5, 'Desactivar', 1, '2025-03-30 21:08:40', '2025-03-30 21:08:40'),
(6, 'Crear', 1, '2025-03-30 21:08:55', '2025-03-30 21:08:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `code_staff` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dni` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `staff`
--

INSERT INTO `staff` (`staff_id`, `group_id`, `code_staff`, `first_name`, `last_name`, `email`, `dni`, `phone`, `department`, `salary`, `hire_date`, `address`, `city`, `country`, `birthdate`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'W957787', 'Kevin Mike', 'Garcia Morales', 'KEVINMIKEGARCIAMORALES61@GMAIL.COM', '007-160296-0001Y', '+50589874521', 'Managua', NULL, '2025-01-25', 'La Borgoña, Km 20.5 Carretera Hacia La Concepción', 'Ticuantepe', 'Nicaragua', '1996-02-16', 1, '2025-01-26 00:24:23', '2025-03-08 18:27:35'),
(6, 18, 'A449048', 'Maria Luisa', 'Parpera Pereira', 'perpeira@gmail.com', '007-160296-0008Y', '+50589874555', 'Carazo', NULL, '2025-03-08', 'La Borgoña, km 20.5 carretera hacia la concepción', 'Santa Teresa', 'Nicaragua', '1990-01-01', 1, '2025-03-08 18:31:03', '2025-03-08 18:31:03'),
(7, 1, 'M541399', 'Kevin', 'Garcia', 'kevinmikegarciamorales61@gmail.com', '007-160296-0001U', '+50589855555', 'Managua', NULL, '2025-03-30', 'La Borgoña, km 20.5 carretera hacia la concepción', 'Ticuantepe', 'Nicaragua', '1996-02-16', 1, '2025-03-30 18:08:15', '2025-03-30 18:08:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `hash_password` varchar(255) NOT NULL,
  `raw_password` varchar(255) DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_image`, `user_name`, `email`, `sex`, `group_id`, `status`, `staff_id`, `hash_password`, `raw_password`, `last_login`, `created_at`, `updated_at`) VALUES
(5, '../uploads/profile_images/profile_67cc7995713be6.85322205.png', 'Kevin Garcia', 'Kgarcia', '', 18, 1, 1, '$2y$10$GqEA0n7ehhvm37tECOIxAO4yeZeussU3Dwiw1FMppCzzMN0gXEqYe', '1234', '2025-03-08 17:08:55', '2025-03-08 17:08:55', '2025-03-30 18:10:35'),
(9, '../uploads/profile_images/profile_67e9896b0169b4.08320022.png', 'Kevin Garcia', 'Mgarcia', '', 1, 1, 7, '$2y$10$6Rx9SXS2/CbWqXCOA0qCeOMjTnH0A.Kd5F1nu2b9d27lWoUlxC/9u', '123456', '2025-03-30 18:12:08', '2025-03-30 18:12:08', '2025-03-30 18:12:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_group`
--

CREATE TABLE `user_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(64) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `permission` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user_group`
--

INSERT INTO `user_group` (`group_id`, `group_name`, `slug`, `status`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRADOR', 'administrador', 1, NULL, '2023-08-17 22:32:56', '2025-03-19 02:10:10'),
(2, 'VENDEDOR', 'vendedor', 1, NULL, '2023-08-17 22:32:56', '2025-01-19 04:00:51'),
(5, 'RR-HH', 'rr-hh', 1, NULL, '2023-08-24 16:14:41', '2023-08-24 16:14:41'),
(14, 'SUPERVISOR', 'supervisor', 2, NULL, '2023-09-11 16:59:23', '2025-02-05 02:27:21'),
(18, 'TESORERO', 'tesorero', 1, NULL, '2025-01-19 03:22:42', '2025-01-19 03:22:42'),
(19, 'CAJERO', 'cajero', 1, NULL, '2025-03-30 18:12:54', '2025-03-30 18:12:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `group_permissions`
--
ALTER TABLE `group_permissions`
  ADD PRIMARY KEY (`group_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indices de la tabla `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indices de la tabla `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

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
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user_group`
--
ALTER TABLE `user_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `group_permissions`
--
ALTER TABLE `group_permissions`
  ADD CONSTRAINT `group_permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `user_group` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`) ON DELETE CASCADE;

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
