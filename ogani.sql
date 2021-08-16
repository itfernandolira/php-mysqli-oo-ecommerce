-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Ago-2021 às 22:51
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
-- Estrutura da tabela `categoriaspt`
--

CREATE TABLE `categoriaspt` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `imagem` varchar(80) NOT NULL,
  `menu` tinyint(1) NOT NULL DEFAULT 1,
  `scroll` tinyint(1) NOT NULL DEFAULT 0,
  `destaque` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoriaspt`
--

INSERT INTO `categoriaspt` (`id`, `categoria`, `imagem`, `menu`, `scroll`, `destaque`, `slug`) VALUES
(1, 'Fruta', 'cat-1.jpg', 1, 1, 1, 'fruta'),
(2, 'Frutos Secos', 'cat-2.jpg', 1, 1, 1, 'frutos-secos'),
(3, 'Vegetais', 'cat-3.jpg', 1, 1, 0, 'vegetais'),
(4, 'Sumos', 'cat-4.jpg', 1, 1, 0, 'sumos'),
(5, 'Carne', 'cat-5.jpg', 1, 1, 1, 'carne'),
(6, 'Iogurtes', '', 1, 0, 0, 'iogurtes'),
(7, 'Ovos', '', 0, 0, 0, 'ovos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendasdetpt`
--

CREATE TABLE `encomendasdetpt` (
  `numEncomenda` int(11) NOT NULL,
  `produto` varchar(25) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` double NOT NULL,
  `estado` varchar(25) NOT NULL DEFAULT 'Pendente',
  `designacao` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `encomendasdetpt`
--

INSERT INTO `encomendasdetpt` (`numEncomenda`, `produto`, `quantidade`, `preco`, `estado`, `designacao`) VALUES
(6, 'product-11', 1, 2, 'Pendente', 'Sumo laranja'),
(6, 'product-9', 1, 4, 'Pendente', 'Uvas Passas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendaspt`
--

CREATE TABLE `encomendaspt` (
  `numEncomenda` int(11) NOT NULL,
  `dataEncomenda` date NOT NULL DEFAULT current_timestamp(),
  `utilizador` varchar(80) NOT NULL,
  `rua` varchar(80) NOT NULL,
  `localidade` varchar(80) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'Pendente',
  `pagamento` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `encomendaspt`
--

INSERT INTO `encomendaspt` (`numEncomenda`, `dataEncomenda`, `utilizador`, `rua`, `localidade`, `estado`, `pagamento`) VALUES
(6, '2021-08-16', 'it.fernandolira@gmail.com', 'Av.', 'Gaia', 'Pendente', 'visa');

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
-- Estrutura da tabela `produtospt`
--

CREATE TABLE `produtospt` (
  `referencia` varchar(25) NOT NULL,
  `designacao` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `preco` double(4,2) NOT NULL,
  `categoria` int(11) NOT NULL,
  `destaque` tinyint(1) NOT NULL DEFAULT 0,
  `desconto` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtospt`
--

INSERT INTO `produtospt` (`referencia`, `designacao`, `imagem`, `preco`, `categoria`, `destaque`, `desconto`) VALUES
('product-1', 'Carne de Vitela', 'product-1.jpg', 16.00, 5, 1, 20),
('product-10', 'Frango frito', 'product-10.jpg', 3.00, 5, 0, 0),
('product-11', 'Sumo laranja', 'product-11.jpg', 2.00, 4, 1, 0),
('product-12', 'Cabaz de fruta', 'product-12.jpg', 6.90, 1, 1, 30),
('product-2', 'Bananas', 'product-2.jpg', 2.00, 1, 0, 0),
('product-3', 'Goiaba', 'product-3.jpg', 3.40, 1, 1, 15),
('product-4', 'Uvas', 'product-4.jpg', 1.70, 1, 0, 0),
('product-5', 'Hamburger', 'product-5.jpg', 7.50, 5, 1, 10),
('product-6', 'Manga', 'product-6.jpg', 2.00, 1, 1, 0),
('product-7', 'Melancia', 'product-7.jpg', 0.80, 1, 1, 0),
('product-8', 'Maçãs', 'product-8.jpg', 1.50, 1, 1, 15),
('product-9', 'Uvas Passas', 'product-9.jpg', 4.00, 2, 1, 0);

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
-- Estrutura da tabela `userspt`
--

CREATE TABLE `userspt` (
  `email` varchar(80) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `rua` varchar(80) NOT NULL,
  `localidade` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `userspt`
--

INSERT INTO `userspt` (`email`, `password`, `nome`, `rua`, `localidade`) VALUES
('it.fernandolira@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fernando', 'Av.', 'Gaia'),
('prof.lira@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fernando Lira', '53', 'Gaia');

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
-- Índices para tabela `categoriaspt`
--
ALTER TABLE `categoriaspt`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `encomendasdetpt`
--
ALTER TABLE `encomendasdetpt`
  ADD PRIMARY KEY (`numEncomenda`,`produto`);

--
-- Índices para tabela `encomendaspt`
--
ALTER TABLE `encomendaspt`
  ADD PRIMARY KEY (`numEncomenda`),
  ADD KEY `fkUser` (`utilizador`);

--
-- Índices para tabela `linksuteis`
--
ALTER TABLE `linksuteis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtospt`
--
ALTER TABLE `produtospt`
  ADD PRIMARY KEY (`referencia`),
  ADD KEY `FK_categoria` (`categoria`);

--
-- Índices para tabela `redessociais`
--
ALTER TABLE `redessociais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `userspt`
--
ALTER TABLE `userspt`
  ADD PRIMARY KEY (`email`);

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
-- AUTO_INCREMENT de tabela `categoriaspt`
--
ALTER TABLE `categoriaspt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `encomendaspt`
--
ALTER TABLE `encomendaspt`
  MODIFY `numEncomenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `encomendasdetpt`
--
ALTER TABLE `encomendasdetpt`
  ADD CONSTRAINT `fkEncomenda` FOREIGN KEY (`numEncomenda`) REFERENCES `encomendaspt` (`numEncomenda`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `encomendaspt`
--
ALTER TABLE `encomendaspt`
  ADD CONSTRAINT `fkUser` FOREIGN KEY (`utilizador`) REFERENCES `userspt` (`email`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produtospt`
--
ALTER TABLE `produtospt`
  ADD CONSTRAINT `FK_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoriaspt` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
