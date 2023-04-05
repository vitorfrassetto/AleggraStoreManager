-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Abr-2023 às 05:31
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

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
-- Estrutura da tabela `produtos`
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
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codigo_produto`, `descricao_produto`, `modelo_produto`, `tecido_produto`, `cor_produto`, `tamanho_produto`, `quantidade_produto`) VALUES
(34, 'BÁSICA CANELADA', 'ALFAIATARIA / FORRO', 'TWILL SAN MARINO', 'ROSA BARBIE', 'PP', 0),
(35, 'BÁSICA CANELADA', 'MANGA LONG GOLA BAIXA', 'MALHA TRICOT LISA', 'XADREZ PRETO E BRANCO', 'EXG', 1),
(36, 'BÁSICA CANELADA', 'CURTA C/ FENDA FRONTAL', 'MALHA TRICOT LISA', 'XADREZ PRETO E BRANCO', 'EXG', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
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
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`codigo_venda`, `codigo_produto`, `quantidade_venda`, `tipo_venda`, `data_saida`, `data_retorno`, `venda_realizada`) VALUES
(27, 34, 0, 'CONDICIONAL', '2023-04-01 00:00:00', NULL, 'N'),
(30, 34, 30, 'VENDA', '2023-04-01 00:00:00', NULL, 'S'),
(31, 35, 0, 'CONDICIONAL', '2023-04-03 00:00:00', NULL, 'N'),
(33, 35, 1, 'VENDA', '2023-04-04 00:00:00', NULL, 'S'),
(34, 36, 2, 'VENDA', '2023-04-04 00:00:00', NULL, 'S'),
(35, 36, 5, 'CONDICIONAL', '2023-04-04 00:00:00', NULL, 'N');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codigo_produto`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`codigo_venda`),
  ADD KEY `vendas_FK` (`codigo_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codigo_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `codigo_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_FK` FOREIGN KEY (`codigo_produto`) REFERENCES `produtos` (`codigo_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
