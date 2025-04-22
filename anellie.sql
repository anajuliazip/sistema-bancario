-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 10-Jul-2024 às 14:55
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anellie`
--
CREATE DATABASE IF NOT EXISTS `anellie` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `anellie`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chefe`
--

DROP TABLE IF EXISTS `chefe`;
CREATE TABLE `chefe` (
  `id` int(11) NOT NULL,
  `Nome` varchar(35) NOT NULL,
  `Senha` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `chefe`
--

TRUNCATE TABLE `chefe`;
--
-- Extraindo dados da tabela `chefe`
--

INSERT DELAYED IGNORE INTO `chefe` (`id`, `Nome`, `Senha`, `email`) VALUES
(1, 'Danielle Cristine Rocha de Amorim', 'boss@98', 'daniboss@anelliesolution.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `estado civil` varchar(15) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `datadenascimento` date NOT NULL,
  `idGerente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `clientes`
--

TRUNCATE TABLE `clientes`;
--
-- Extraindo dados da tabela `clientes`
--

INSERT DELAYED IGNORE INTO `clientes` (`id`, `nome`, `senha`, `e-mail`, `telefone`, `estado civil`, `cpf`, `datadenascimento`, `idGerente`) VALUES
(1, 'Ana Júlia Nascimento da Cruz', '123456', 'anajulianasci02@gmail.com', '47997090461', 'Casado', '123.123.123-50', '2006-07-04', 1),
(10, 'Luiza Santos', '1213', 'luizasantos@gmail.com', '47997090461', 'Viúvo', '123.123.123-50', '1998-07-20', 1),
(11, 'Amelia Amorim', '147852', 'ameliaamorim@gmail.com', '47997090461', 'Solteiro', '874.854.965-98', '2005-12-20', 1),
(13, 'Wellington Silveira', '852369', 'wellingonf@gmail.com', '47997090461', 'Divorciado', '741.569.745-99', '1988-02-29', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `credito`
--

DROP TABLE IF EXISTS `credito`;
CREATE TABLE `credito` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idGerente` int(11) NOT NULL,
  `NumeroCartao` int(11) DEFAULT NULL,
  `limite` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `credito`
--

TRUNCATE TABLE `credito`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `gerentes`
--

DROP TABLE IF EXISTS `gerentes`;
CREATE TABLE `gerentes` (
  `id` int(11) NOT NULL,
  `Nome` varchar(35) NOT NULL,
  `Senha` varchar(20) NOT NULL,
  `E-mail` varchar(50) NOT NULL,
  `Cargo` varchar(20) NOT NULL,
  `cpf` varchar(15) NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `gerentes`
--

TRUNCATE TABLE `gerentes`;
--
-- Extraindo dados da tabela `gerentes`
--

INSERT DELAYED IGNORE INTO `gerentes` (`id`, `Nome`, `Senha`, `E-mail`, `Cargo`, `cpf`) VALUES
(1, 'Fabiana GonÃ§alves', '123456', 'fabianagoncalves@anelliesolution.com', 'sub-gerente', '123.123.123-50'),
(2, 'Rafael Baumann', '963258', 'rafaelbaumann@anelliesolution.com', 'gerente', '745.965.741-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chefe`
--
ALTER TABLE `chefe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idCliente` (`idCliente`),
  ADD UNIQUE KEY `idGerente` (`idGerente`);

--
-- Indexes for table `gerentes`
--
ALTER TABLE `gerentes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chefe`
--
ALTER TABLE `chefe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `gerentes`
--
ALTER TABLE `gerentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
