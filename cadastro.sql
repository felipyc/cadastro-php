-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jul-2019 às 22:46
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--
CREATE DATABASE IF NOT EXISTS `cadastro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cadastro`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `logradouro` varchar(150) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(150) NOT NULL,
  `bairro` varchar(150) NOT NULL,
  `localidade` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `data_nascimento`, `cpf`, `telefone`, `email`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `localidade`) VALUES
(2, 'Vania', '1999-11-02', '05784951236', '47984765412', 'vaniamax@gmail.com', '99452125', 'sergipe almeida junior', 245, 'sem complemento', 'sorocaba', 'floripa - santa catarina'),
(3, 'Antonia', '1991-01-29', '07542345688', '47999998888', 'antonia@gmail.com', '77444654', 'pulo do gato', 123, 'na frente do hospital', 'barro', 'brusque'),
(4, 'Jose dirceu', '1992-12-01', '12345678909', '47984756309', 'josedirceu@gmail.com', '55426541', 'estefano jose vanolis', 214, 'perto da pizaria disco voador', 'sao vicente', 'itajai - santa catarina'),
(8, 'Cesar', '2005-10-28', '76030747037', '47953461252', 'cesar@gmail.com', '77745620', 'schmitausen', 123, 'casa 2', 'promorar', 'itajai - santa catarina'),
(9, 'Silva', '1998-02-11', '28839684034', '47985467812', 'silva@gmail.com', '88452123', 'lorem ipsum', 113, 'apartamento 22', 'bom jesus', 'balneario - santa catarina');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
