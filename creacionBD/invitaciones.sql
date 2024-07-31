-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql209.infinityfree.com
-- Tiempo de generación: 20-07-2024 a las 19:18:24
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_36530582_invitaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `id` int(11) NOT NULL,
  `invitado_de` enum('lilian','david') NOT NULL,
  `familia` tinyint(1) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `numero_pases` int(11) NOT NULL DEFAULT 3,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`id`, `invitado_de`, `familia`, `nombre`, `numero_pases`, `slug`) VALUES
(1, 'lilian', 1, 'FAM. FERRER HERNANDEZ', 6, 'fam-ferrer-hernandez'),
(2, 'lilian', 0, 'SRA. REYNA MORAN', 1, 'sra-reyna-moran'),
(3, 'lilian', 1, 'FAM. HERNANDEZ MARTINEZ', 4, 'fam-hernandez-martinez'),
(4, 'lilian', 1, 'FAM. TELLES HERNANDEZ', 5, 'fam-telles-hernandez'),
(5, 'lilian', 0, 'SRA. MARINA MORAN', 2, 'sra-marina-moran'),
(6, 'lilian', 1, 'FAM. HERNANDEZ BARRERA', 4, 'fam-hernandez-barrera'),
(7, 'lilian', 0, 'SRTA. LETICIA DAMIAN', 3, 'srta-leticia-damian'),
(8, 'lilian', 0, 'SRTA. ARACELI CRUZ', 4, 'srta-araceli-cruz'),
(9, 'lilian', 0, 'SRA. JUANA MARTINEZ', 2, 'sra-juana-martinez'),
(10, 'lilian', 1, 'FAM. VARGAS AMBROSIO', 3, 'fam-vargas-ambrosio'),
(11, 'lilian', 0, 'SRTA. JUANA OLVERA', 2, 'srta-juana-olvera'),
(12, 'lilian', 1, 'FAM. ORTEGA DAVILA', 3, 'fam-ortega-davila'),
(13, 'lilian', 0, 'SRTA. YOJAIRA', 2, 'srta-yojaira'),
(14, 'lilian', 0, 'SR. MARCO MONJARAS', 2, 'sr-marco-monjaras'),
(15, 'lilian', 1, 'FAM. GONZALEZ APELLANIZ', 4, 'fam-gonzalez-apellaniz'),
(16, 'lilian', 0, 'SR. IVAN MARQUEZ', 2, 'sr-ivan-marquez'),
(17, 'lilian', 0, 'SR. CESAR GARCIA', 2, 'sr-cesar-garcia'),
(18, 'lilian', 0, 'SRTA. ESMERALDA LOPEZ', 2, 'srta-esmeralda-lopez'),
(19, 'lilian', 0, 'PBRO JUAN MANUEL CAMBRON', 2, 'pbro-juan-manuel-cambron'),
(20, 'lilian', 1, 'FAM. RUIZ GARCIA', 5, 'fam-ruiz-garcia'),
(21, 'lilian', 0, 'SRTA. ANA MARIA', 2, 'srta-ana-maria'),
(22, 'david', 1, 'SR. JOSE ANTONIO LOPEZ Y FAM.', 5, 'sr-jose-antonio-lopez-y-fam-'),
(23, 'david', 1, 'FAM. VELAZQUEZ LOPEZ', 2, 'fam-velazquez-lopez'),
(24, 'david', 1, 'FAM. SOLORZANO LOPEZ', 2, 'fam-solorzano-lopez'),
(25, 'david', 1, 'FAM. SOLORZANO OJEDA', 2, 'fam-solorzano-ojeda'),
(26, 'david', 1, 'FAM. LOPEZ BRITO', 2, 'fam-lopez-brito'),
(27, 'david', 1, 'FAM. LOPEZ MONTESINOS', 2, 'fam-lopez-montesinos'),
(28, 'david', 1, 'FAM. OROZCO LOPEZ', 6, 'fam-orozco-lopez'),
(29, 'david', 1, 'FAM. TORRES OROZCO', 5, 'fam-torres-orozco'),
(30, 'david', 1, 'SRA. LIDIA OROZCO Y FAMILIA', 5, 'sra-lidia-orozco-y-familia'),
(31, 'david', 1, 'FAM. OROZCO ESQUERRA', 6, 'fam-orozco-esquerra'),
(32, 'david', 1, 'SR. DANIEL OROZCO Y FAMILIA', 5, 'sr-daniel-orozco-y-familia'),
(33, 'david', 1, 'SRA. XOCHITL OROZCO Y FAMILIA', 4, 'sra-xochitl-orozco-y-familia'),
(34, 'david', 1, 'SRTA. NADIA SANCHEZ Y FAMILIA', 2, 'srta-nadia-sanchez-y-familia'),
(35, 'david', 1, 'FAM. ALVAREZ FLORES', 4, 'fam-alvarez-flores'),
(40, 'david', 0, 'lic. JESUS LOPEZ B', 1, 'lic-jesus-lopez-b'),
(41, 'david', 0, 'SRTA. KARLA SANCHEZ', 2, 'srta-karla-sanchez'),
(42, 'david', 0, 'SRTA. AZUL SCARLETH', 2, 'srta-azul-scarleth'),
(43, 'david', 0, 'SRTA. DOREYDI BERNAL', 2, 'srta-doreydi-bernal'),
(44, 'david', 0, 'SRTA. MARCELA MARTINEZ', 2, 'srta-marcela-martinez'),
(45, 'lilian', 0, 'SRTA. YURIDIA PEREGRINA', 3, 'srta-yuridia-peregrina'),
(46, 'david', 0, 'SR. CARLOS HERNANDEZ', 2, 'sr-carlos-hernandez'),
(47, 'david', 0, 'SR. DAVID MORALES', 2, 'sr-david-morales');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
