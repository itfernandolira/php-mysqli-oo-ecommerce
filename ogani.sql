-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jul-2021 às 22:56
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ogani`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `linksuteis`
--

CREATE TABLE `linksuteis` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `texto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `linksuteis`
--

INSERT INTO `linksuteis` (`id`, `link`, `texto`) VALUES
(1, '#', 'Link 1'),
(2, '#', 'Link 2'),
(3, '#', 'Link 3'),
(4, '#', 'Link 4'),
(5, '#', 'Link 5'),
(6, '#', 'Link6'),
(7, '#', 'Link 7'),
(8, '#', 'Link 8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `redessociais`
--

CREATE TABLE `redessociais` (
  `id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `link` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `redessociais`
--

INSERT INTO `redessociais` (`id`, `class`, `link`) VALUES
(1, 'fa fa-facebook', '#'),
(2, 'fa fa-instagram', '#'),
(3, 'fa fa-twitter', '#'),
(4, 'fa fa-linkedin', '#');

-- --------------------------------------------------------

--
-- Estrutura da tabela `variaveisen`
--

CREATE TABLE `variaveisen` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `textotopo` varchar(250) NOT NULL,
  `logotipo` varchar(25) DEFAULT NULL,
  `morada` varchar(80) DEFAULT NULL,
  `telefone` varchar(30) NOT NULL,
  `emailFooter` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `variaveisen`
--

INSERT INTO `variaveisen` (`id`, `email`, `textotopo`, `logotipo`, `morada`, `telefone`, `emailFooter`) VALUES
(1, 'info@ogani.pt', 'FREE!!!!', 'logo.png', 'Adress: Av. da estrada, 1', 'Phone: +351 912 345 678', 'E-mail: info@ogani.pt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `variaveispt`
--

CREATE TABLE `variaveispt` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `textotopo` varchar(250) NOT NULL,
  `logotipo` varchar(25) DEFAULT NULL,
  `morada` varchar(80) DEFAULT NULL,
  `telefone` varchar(30) NOT NULL,
  `emailFooter` varchar(80) NOT NULL,
  `linksUteis` varchar(50) DEFAULT NULL,
  `joinNewsletter` varchar(100) DEFAULT NULL,
  `textoNewsletter` varchar(100) DEFAULT NULL,
  `inputNewsletter` varchar(100) DEFAULT NULL,
  `buttonNewsletter` varchar(25) DEFAULT NULL,
  `suporteTelefone` varchar(30) DEFAULT NULL,
  `suporteTexto` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `variaveispt`
--

INSERT INTO `variaveispt` (`id`, `email`, `textotopo`, `logotipo`, `morada`, `telefone`, `emailFooter`, `linksUteis`, `joinNewsletter`, `textoNewsletter`, `inputNewsletter`, `buttonNewsletter`, `suporteTelefone`, `suporteTexto`) VALUES
(1, 'info@ogani.pt', 'Entregas grátis em todo o país!', 'logo.png', 'Morada: Av. da estrada, 1', 'Telefone: +351 912 345 678', 'E-mail: info@ogani.pt', 'Links', 'Subscreva a newsletter', 'Acesso a todas as promoções', 'Indique o e-mail', 'Subscrever', '+351 912 345 678', 'Suporte 24/7');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `linksuteis`
--
ALTER TABLE `linksuteis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `redessociais`
--
ALTER TABLE `redessociais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `variaveisen`
--
ALTER TABLE `variaveisen`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `variaveispt`
--
ALTER TABLE `variaveispt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `linksuteis`
--
ALTER TABLE `linksuteis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `redessociais`
--
ALTER TABLE `redessociais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
