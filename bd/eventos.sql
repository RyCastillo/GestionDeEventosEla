-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-11-2024 a las 15:51:59
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_eventos`
--

CREATE TABLE `t_eventos` (
  `id_evento` int NOT NULL,
  `nombre_evento` varchar(245) NOT NULL,
  `id_usuario` int NOT NULL,
  `hora_inicio` datetime NOT NULL,
  `hora_fin` datetime NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(245) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recursos` text,
  `numeros` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_eventos`
--

INSERT INTO `t_eventos` (`id_evento`, `nombre_evento`, `id_usuario`, `hora_inicio`, `hora_fin`, `fecha`, `lugar`, `recursos`, `numeros`) VALUES
(1, 'olimpiadas', 1, '2024-11-07 14:07:49', '2024-11-07 15:07:49', '2024-06-11', 'Canchas de gras', 'Pelota\r\nCamisetas\r\n', '3A vs 3B\r\n4D vs 4G'),
(2, 'Serenata', 1, '2024-11-08 12:05:00', '2024-11-08 13:05:00', '2024-11-08', 'Plataforma principal', 'consola, parlantes, microfonos', '1. cantar'),
(3, 'Futbol', 1, '2024-11-09 13:18:00', '2024-11-09 14:18:00', '2024-11-09', 'Canchitas', 'pelota', ''),
(4, 'Aniversario', 1, '2024-11-08 09:19:00', '2024-11-08 10:00:00', '2024-11-08', 'Plataforma principal', 'Parlantes y microfonos', 'mi chilala'),
(14, 'conferencia', 2, '2024-11-22 16:51:00', '2024-11-22 17:51:00', '2024-11-22', 'Auditorio', 'Equipo Sonido, Proyector', '- charla sobre save the children '),
(16, 'conferencia2', 2, '2024-11-21 08:00:00', '2024-11-21 11:00:00', '2024-11-21', 'Auditorio', 'Equipo Sonido2, Proyector2', '- charla sobre save the children2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_invitados`
--

CREATE TABLE `t_invitados` (
  `id_invitado` int NOT NULL,
  `id_evento` int NOT NULL,
  `nombre_invitado` varchar(245) NOT NULL,
  `email` varchar(245) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_invitados`
--

INSERT INTO `t_invitados` (`id_invitado`, `id_evento`, `nombre_invitado`, `email`) VALUES
(2, 1, 'Gabriel Castillo', 'gabrielcastillo10v@gmail.com'),
(5, 16, 'Belen Valdiviezo', 'racastillov@ucvvirtual.edu.pe'),
(6, 1, 'Carmen Valdiviezo', 'carmen@gmail.com'),
(7, 14, 'Gabriel Castillo', 'racastillov@ucvvirtual.edu.pe'),
(10, 3, 'Ronny castillo', 'ronnycastillo29v@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_recursos`
--

CREATE TABLE `t_recursos` (
  `idRecurso` int NOT NULL,
  `nombreRecurso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_recursos`
--

INSERT INTO `t_recursos` (`idRecurso`, `nombreRecurso`) VALUES
(9, 'Microfonos'),
(13, 'Cable HDMI'),
(14, 'Laptop Lenovo'),
(15, 'Consola de Sonido'),
(16, 'Parlantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `usuario`, `password`) VALUES
(1, 'admin', '$2y$10$wtaBkcz1VYhJMw1txM3ujuGfm/Z3pcsKty11Uj2.tv.L1dgzQWhtO'),
(2, 'usuario1', '$2y$10$xJPfHeVViMcQgQOFiOGpPuTgZ75Q2SC4b7WKXNKoBZNNOQtIdhxom');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_invitados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_invitados` (
`idInvitado` int
,`id_usuario` int
,`nombreEvento` varchar(245)
,`email` varchar(245)
,`idEvento` int
,`nombre` varchar(245)
,`fechaEvento` varchar(10)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_invitados`
--
DROP TABLE IF EXISTS `v_invitados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_invitados` AS
SELECT 
    `invitados`.`id_invitado` AS `idInvitado`, 
    `id_usuario` AS `id_usuario`, 
    `nombre_evento` AS `nombreEvento`, 
    `invitados`.`email` AS `email`, 
    `invitados`.`id_evento` AS `idEvento`, 
    `invitados`.`nombre_invitado` AS `nombre`, 
    DATE_FORMAT(`fecha`, '%d-%m-%Y') AS `fechaEvento`
FROM 
    `t_invitados` AS `invitados`
JOIN 
    `t_eventos` AS `eventos`
ON 
    `invitados`.`id_evento` = `eventos`.`id_evento`;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_eventos`
--
ALTER TABLE `t_eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `FOREING` (`id_usuario`);

--
-- Indices de la tabla `t_invitados`
--
ALTER TABLE `t_invitados`
  ADD PRIMARY KEY (`id_invitado`),
  ADD KEY `FOREING` (`id_evento`);

--
-- Indices de la tabla `t_recursos`
--
ALTER TABLE `t_recursos`
  ADD PRIMARY KEY (`idRecurso`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_eventos`
--
ALTER TABLE `t_eventos`
  MODIFY `id_evento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `t_invitados`
--
ALTER TABLE `t_invitados`
  MODIFY `id_invitado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `t_recursos`
--
ALTER TABLE `t_recursos`
  MODIFY `idRecurso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_eventos`
--
ALTER TABLE `t_eventos`
  ADD CONSTRAINT `FOREING` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `t_invitados`
--
ALTER TABLE `t_invitados`
  ADD CONSTRAINT `t_eventos_id_evento_t_invitados` FOREIGN KEY (`id_evento`) REFERENCES `t_eventos` (`id_evento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
