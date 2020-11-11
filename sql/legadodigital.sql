-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-05-2019 a las 19:44:48
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `legadodigital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta_user`
--

CREATE TABLE `consulta_user` (
  `user_id` int(11) NOT NULL,
  `consulta_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `text_consulta` text,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lawyer`
--

CREATE TABLE `lawyer` (
  `user_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lawyer`
--

INSERT INTO `lawyer` (`user_id`, `lawyer_id`) VALUES
(43, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lawyer_asociated`
--

CREATE TABLE `lawyer_asociated` (
  `lawyer_asociated_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testament_user`
--

CREATE TABLE `testament_user` (
  `user_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `text_testament` text,
  `text_annexed` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_associated`
--

CREATE TABLE `user_associated` (
  `associated_firstname` varchar(255) NOT NULL,
  `associated_lastname` varchar(255) NOT NULL,
  `associated_DNI` varchar(9) NOT NULL,
  `associated_email` varchar(255) NOT NULL,
  `associated_id` int(11) NOT NULL,
  `associated_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_DNI` varchar(9) DEFAULT NULL,
  `user_birth_date` date DEFAULT NULL,
  `user_age` int(5) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_telephone` int(50) DEFAULT NULL,
  `date_account_create` date DEFAULT NULL,
  `date_account_remove` date DEFAULT NULL,
  `user_rate` enum('limitado','platinium','básico','') NOT NULL DEFAULT 'básico',
  `user_question` varchar(255) DEFAULT NULL,
  `user_response` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_data`
--

INSERT INTO `user_data` (`user_id`, `user_name`, `user_lastname`, `user_DNI`, `user_birth_date`, `user_age`, `user_email`, `user_telephone`, `date_account_create`, `date_account_remove`, `user_rate`, `user_question`, `user_response`, `user_image`) VALUES
(1, 'Peter', 'Pan', '98765221R', '1983-02-02', 18, 'admin@legadodigital.com', 1234546122, '2019-05-16', NULL, 'platinium', NULL, NULL, NULL),
(46, 'user', 'Navarra', NULL, NULL, NULL, 'user@user.com', NULL, '2019-05-17', NULL, 'básico', NULL, NULL, 'img/miembros/blank-profile.png'),
(47, 'abogado', 'abogado', NULL, NULL, NULL, 'abogado@email.com', NULL, '2019-05-17', NULL, 'básico', NULL, NULL, 'img/miembros/blank-profile.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `user_nickname` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email_login` varchar(255) NOT NULL,
  `user_type` enum('user_admin','user_lawer','user_client','user_partner') NOT NULL DEFAULT 'user_client',
  `user_banned` tinyint(2) NOT NULL DEFAULT '0',
  `user_safe_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_nickname`, `user_password`, `user_email_login`, `user_type`, `user_banned`, `user_safe_password`) VALUES
(1, 'admin', '$2y$12$BpQt3Yw1Jh7R2RRShp2qc.Y/CS7JYW.D5elmRYVs.3QSRH5uLyEq.', 'admin@legadodigital.com', 'user_admin', 0, ''),
(46, 'useraw', '$2y$10$722WUpdBD.5RBi7yKt/i2elqlWVV8CiC0zu7dR5bGHaeuFVP8ovta', 'user@user.com', 'user_client', 0, ''),
(47, 'abogado', '$2y$10$n13r5gs3.y..MdYS0xL1K.GafEzlibcxPIysOlWv/aJ/THDN3UVp2', 'abogado@email.com', 'user_client', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_path`
--

CREATE TABLE `user_path` (
  `user_id` int(11) NOT NULL,
  `name_path` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta_user`
--
ALTER TABLE `consulta_user`
  ADD PRIMARY KEY (`consulta_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`lawyer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `lawyer_asociated`
--
ALTER TABLE `lawyer_asociated`
  ADD KEY `lawyer_asociated_id` (`lawyer_asociated_id`,`user_id`);

--
-- Indices de la tabla `testament_user`
--
ALTER TABLE `testament_user`
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user_associated`
--
ALTER TABLE `user_associated`
  ADD PRIMARY KEY (`associated_id`),
  ADD KEY `associated_user_id` (`associated_user_id`);

--
-- Indices de la tabla `user_data`
--
ALTER TABLE `user_data`
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `user_path`
--
ALTER TABLE `user_path`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consulta_user`
--
ALTER TABLE `consulta_user`
  MODIFY `consulta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `lawyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_associated`
--
ALTER TABLE `user_associated`
  MODIFY `associated_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `testament_user`
--
ALTER TABLE `testament_user`
  ADD CONSTRAINT `testament_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_associated`
--
ALTER TABLE `user_associated`
  ADD CONSTRAINT `user_associated_ibfk_1` FOREIGN KEY (`associated_user_id`) REFERENCES `user_login` (`user_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_path`
--
ALTER TABLE `user_path`
  ADD CONSTRAINT `user_path_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
