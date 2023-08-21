-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26/04/2023 às 00:28
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `allegrastore`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `param_cores`
--

CREATE TABLE `param_cores` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `param_cores`
--

INSERT INTO `param_cores` (`codigo`, `descricao`) VALUES
(1, 'branco');

-- --------------------------------------------------------

--
-- Estrutura para tabela `param_modelos`
--

CREATE TABLE `param_modelos` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `param_modelos`
--

INSERT INTO `param_modelos` (`codigo`, `descricao`) VALUES
(6, 'CURTA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `param_produtos`
--

CREATE TABLE `param_produtos` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `param_produtos`
--

INSERT INTO `param_produtos` (`codigo`, `descricao`) VALUES
(24, 'SAIA'),
(25, 'BLUSA'),
(26, 'LINHO'),
(30, 'BUM'),
(32, 'A'),
(33, 'AA'),
(34, 'AAAA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `param_tecidos`
--

CREATE TABLE `param_tecidos` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `param_tecidos`
--

INSERT INTO `param_tecidos` (`codigo`, `descricao`) VALUES
(1, 'linho');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `codigo_produto` int(11) NOT NULL,
  `descricao_produto` varchar(250) DEFAULT NULL,
  `modelo_produto` varchar(250) NOT NULL,
  `tecido_produto` varchar(250) NOT NULL,
  `cor_produto` varchar(250) NOT NULL,
  `tamanho_produto` varchar(5) NOT NULL,
  `quantidade_produto` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`codigo_produto`, `descricao_produto`, `modelo_produto`, `tecido_produto`, `cor_produto`, `tamanho_produto`, `quantidade_produto`) VALUES
(18, 'BÁSICA CANELADA', 'ALFAIATARIA / FORRO', 'TWILL SAN MARINO', 'ROSA BARBIE', 'PP', 0),
(19, 'BÁSICA CANELADA', 'ALFAIATARIA / FORRO', 'TWILL SAN MARINO', 'ROSA BARBIE', 'EXG', 0),
(20, 'BÁSICA CANELADA', 'MANGA LONG GOLA BAIXA', 'TWILL SAN MARINO', 'XADREZ PRETO E BRANCO', 'EXG', 0),
(21, 'blusa', 'longo', 'linho', 'branco', 'M', 0),
(22, 'SAIA', 'longo', 'linho', 'PRETO', 'M', 0),
(23, 'SAIA', 'CURTA', 'linho', 'branco', 'PP', 9),
(24, 'BLUSA', 'CURTA', 'linho', 'branco', 'P', 4),
(25, 'TESTE', 'CURTA', 'linho', 'branco', 'M', 7),
(26, 'A', 'CURTA', 'linho', 'branco', 'M', 10),
(27, 'AA', 'CURTA', 'linho', 'branco', 'GG', 3),
(28, 'TESTANDO', 'CURTA', 'linho', 'branco', 'M', 3),
(29, 'TESTANDO', 'CURTA', 'linho', 'branco', 'G', 6),
(30, 'BUM', 'CURTA', 'linho', 'branco', 'EXG', 8),
(31, 'BLUSA', 'CURTA', 'linho', 'branco', 'G', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `codigo_venda` int(11) NOT NULL,
  `codigo_produto` int(11) NOT NULL,
  `quantidade_venda` float NOT NULL DEFAULT 0,
  `tipo_venda` varchar(20) NOT NULL,
  `data_saida` datetime NOT NULL,
  `data_retorno` datetime DEFAULT NULL,
  `venda_realizada` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`codigo_venda`, `codigo_produto`, `quantidade_venda`, `tipo_venda`, `data_saida`, `data_retorno`, `venda_realizada`) VALUES
(8, 19, 4, 'VENDA', '2023-04-23 00:00:00', NULL, 'S'),
(9, 18, 1, 'VENDA', '2023-04-23 00:00:00', NULL, 'S'),
(10, 19, 0, 'CONDICIONAL', '2023-04-23 00:00:00', NULL, 'N'),
(11, 18, 1, 'CONDICIONAL', '2023-04-23 00:00:00', NULL, 'N'),
(12, 20, 1, 'VENDA', '2023-04-23 00:00:00', NULL, 'S'),
(13, 21, 2, 'VENDA', '2023-04-23 00:00:00', NULL, 'S'),
(14, 21, 0, 'CONDICIONAL', '2023-04-23 00:00:00', NULL, 'N'),
(15, 23, 1, 'VENDA', '2023-04-23 00:00:00', NULL, 'S'),
(16, 30, 7, 'VENDA', '2023-04-24 00:00:00', NULL, 'S'),
(17, 30, 0, 'CONDICIONAL', '2023-04-24 00:00:00', NULL, 'N');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `param_cores`
--
ALTER TABLE `param_cores`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `param_modelos`
--
ALTER TABLE `param_modelos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `param_produtos`
--
ALTER TABLE `param_produtos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `param_tecidos`
--
ALTER TABLE `param_tecidos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codigo_produto`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`codigo_venda`),
  ADD KEY `vendas_FK` (`codigo_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `param_cores`
--
ALTER TABLE `param_cores`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `param_modelos`
--
ALTER TABLE `param_modelos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `param_produtos`
--
ALTER TABLE `param_produtos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `param_tecidos`
--
ALTER TABLE `param_tecidos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codigo_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `codigo_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_FK` FOREIGN KEY (`codigo_produto`) REFERENCES `produtos` (`codigo_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
