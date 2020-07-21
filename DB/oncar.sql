-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jul-2020 às 01:49
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oncar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `veiculo` varchar(191) DEFAULT NULL,
  `marca` varchar(191) DEFAULT NULL,
  `ano` int(4) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `vendido` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cars`
--

INSERT INTO `cars` (`id`, `veiculo`, `marca`, `ano`, `descricao`, `vendido`, `created`, `updated`) VALUES
(4, 'Nissan 350Z', 'Nissan', 2014, 'Nissan 350Z VQ35DE 2006 Manual', 0, '2020-07-20 16:55:44', '2020-07-21 20:45:52'),
(5, 'Mitsubishi Lancer Evolution John Easton', 'Mitsubishi', 2015, 'Mitsubishi Lancer Evolution John Easton Branco 2015/2016', 1, '2020-07-21 18:03:57', '2020-07-21 18:04:23');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
