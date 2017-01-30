-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2017 at 01:39 PM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `CRM_Influencers`
--
CREATE DATABASE IF NOT EXISTS `CRM_Influencers` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `CRM_Influencers`;

-- --------------------------------------------------------

--
-- Table structure for table `listas`
--

DROP TABLE IF EXISTS `listas`;
CREATE TABLE `listas` (
  `ID` int(70) NOT NULL,
  `nombre_lista` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `keyword` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `red_social` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `seguidores` int(70) NOT NULL,
  `localizacion` varchar(70) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `ID` int(70) NOT NULL,
  `ID_usuario` int(70) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(70) CHARACTER SET ucs2 COLLATE ucs2_swedish_ci NOT NULL,
  `enlace_perfil` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `bio` varchar(1500) COLLATE utf8_spanish_ci NOT NULL,
  `web` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `seguidores` int(70) NOT NULL,
  `localidad` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `texto` varchar(1500) COLLATE utf8_spanish_ci NOT NULL,
  `enlace_publicacion` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listas`
--
ALTER TABLE `listas`
  MODIFY `ID` int(70) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(70) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `listas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
