-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2023 a las 06:04:25
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `users_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `userID` int(20) NOT NULL,
  `question1` varchar(100) NOT NULL,
  `res1` varchar(255) NOT NULL,
  `question2` varchar(100) NOT NULL,
  `res2` varchar(255) NOT NULL,
  `question3` varchar(100) NOT NULL,
  `res3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`userID`, `question1`, `res1`, `question2`, `res2`, `question3`, `res3`) VALUES
(74, 'nombre de su primera mascota', '$2y$10$aF5846Nwsw5ukWd/gZIvTeH1KUO.9Gc86yG5jdCM6fdlE7KZC5eEC', 'color favorito', '$2y$10$n3oDItWzZUi8enmF6vF1mu3l.tWGWUxLG87zSvC8VsUkwTnSSxGp2', 'libro favorito', '$2y$10$lWFvm/YJxud.DUFF1tKrqeL.iJuPewRfv/VcTOL8503GAgVcZRMfG'),
(75, 'Nombre de su primera mascota', '$2y$10$u374XvxT7dBlftlJ2/OqwuyqGFQ94ePoVBpmKcS87h3qiR6fNCRRi', 'Color favorito', '$2y$10$a.biJh1LpCONsRjL27IFNOVDKj6/8CKJGctcPqYwIldl5Nv6EnqO6', 'Libro favorito', '$2y$10$3PE4UxOjGzgdulMuH7tHy.boBLG4OmacbgHd0E/oFtunaBXLwpTvu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_short`
--

CREATE TABLE `users_short` (
  `userID` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users_short`
--

INSERT INTO `users_short` (`userID`, `name`, `email`, `password`) VALUES
(74, 'miguel', 'laravel12@gmail.com', '$2y$10$7MyKmt.LUwNceOoiqanXsOv37fpSuNsbqm.SdpavWENenW7fQRZDK'),
(75, 'nono', 'debil12@gmail.com', '$2y$10$RVzoCVv6jlSeI04jrjxuX./a5P80tpKBJ43NeEDFa3eU8AFgutN.6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD KEY `userID` (`userID`);

--
-- Indices de la tabla `users_short`
--
ALTER TABLE `users_short`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users_short`
--
ALTER TABLE `users_short`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users_short` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
