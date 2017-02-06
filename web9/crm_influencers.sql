-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2017 at 12:24 PM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `crm_influencers`
--
CREATE DATABASE IF NOT EXISTS `crm_influencers` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `crm_influencers`;

-- --------------------------------------------------------

--
-- Table structure for table `idioma`
--

DROP TABLE IF EXISTS `idioma`;
CREATE TABLE IF NOT EXISTS `idioma` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `idioma` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `idioma`
--

INSERT INTO `idioma` (`id`, `idioma`) VALUES
(1, 'español'),
(2, 'ingles');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

DROP TABLE IF EXISTS `keywords`;
CREATE TABLE IF NOT EXISTS `keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listas`
--

DROP TABLE IF EXISTS `listas`;
CREATE TABLE IF NOT EXISTS `listas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_lista` int(10) NOT NULL,
  `keyword` int(10) NOT NULL,
  `red_social` int(2) NOT NULL,
  `seguidores_minimos` int(5) NOT NULL,
  `localizacion` int(3) NOT NULL,
  `idioma` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre_lista` (`nombre_lista`),
  KEY `keyword` (`keyword`),
  KEY `red_social` (`red_social`),
  KEY `seguidores_minimos` (`seguidores_minimos`),
  KEY `localizacion` (`localizacion`),
  KEY `idioma` (`idioma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nombre_listas`
--

DROP TABLE IF EXISTS `nombre_listas`;
CREATE TABLE IF NOT EXISTS `nombre_listas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_lista` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `red_social`
--

DROP TABLE IF EXISTS `red_social`;
CREATE TABLE IF NOT EXISTS `red_social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `red social` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `red_social`
--

INSERT INTO `red_social` (`id`, `red social`) VALUES
(1, 'twitter'),
(2, 'instagram'),
(3, 'youtube');

-- --------------------------------------------------------

--
-- Table structure for table `seguidores_minimos`
--

DROP TABLE IF EXISTS `seguidores_minimos`;
CREATE TABLE IF NOT EXISTS `seguidores_minimos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seguidores_minimos` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_lista` int(10) NOT NULL,
  `red_social` int(1) NOT NULL,
  `usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `bio` varchar(140) COLLATE utf8_spanish_ci DEFAULT NULL,
  `seguidores` int(10) NOT NULL,
  `texto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_str` int(40) NOT NULL,
  `web` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `comunicacion` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `red_social` (`red_social`),
  KEY `id_lista` (`id_lista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listas`
--
ALTER TABLE `listas`
  ADD CONSTRAINT `listas_ibfk_1` FOREIGN KEY (`idioma`) REFERENCES `idioma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `listas_ibfk_2` FOREIGN KEY (`seguidores_minimos`) REFERENCES `seguidores_minimos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listas_ibfk_3` FOREIGN KEY (`keyword`) REFERENCES `keywords` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listas_ibfk_4` FOREIGN KEY (`red_social`) REFERENCES `red_social` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `listas_ibfk_5` FOREIGN KEY (`nombre_lista`) REFERENCES `nombre_listas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`red_social`) REFERENCES `red_social` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`id_lista`) REFERENCES `listas` (`nombre_lista`) ON DELETE CASCADE ON UPDATE CASCADE;
