-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/10/2025 às 14:07
-- Versão do servidor: 8.0.21
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `farmacia_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `preco`, `quantidade`) VALUES
(1, 'Paracetamol 1000mg', 8.50, 100),
(2, 'Ibuprofeno 400mg', 12.90, 80),
(3, 'Dipirona Sódica 1g', 6.75, 150),
(4, 'Amoxicilina 500mg', 24.90, 60),
(5, 'Azitromicina 500mg', 29.90, 45),
(6, 'Omeprazol 20mg', 15.50, 90),
(7, 'Loratadina 10mg', 9.80, 110),
(8, 'Cetirizina 10mg', 11.60, 75),
(9, 'Álcool 70% 1L', 7.90, 200),
(10, 'Algodão Hidrófilo 50g', 5.50, 180),
(11, 'Gaze Estéril 7,5x7,5cm', 4.20, 250),
(12, 'Soro Fisiológico 500ml', 6.90, 130),
(13, 'Máscara Cirúrgica (cx c/50)', 18.90, 40),
(14, 'Luvas Descartáveis (par)', 1.50, 300),
(15, 'Termômetro Digital', 32.00, 25),
(16, 'Esparadrapo 2,5cm x 4,5m', 6.30, 90),
(17, 'Band-Aid (caixa c/10)', 5.90, 70),
(18, 'Creme Hidratante Nivea 100g', 14.90, 50),
(19, 'Sabonete Antisséptico Protex 90g', 4.80, 100),
(20, 'Shampoo Anticaspa Clear 200ml', 18.50, 60),
(21, 'Condicionador Dove 200ml', 17.90, 60),
(22, 'Pomada Nebacetin 15g', 13.50, 40),
(23, 'Pomada Bepantol 20g', 22.90, 30),
(24, 'Vitamina C 1g (efervescente)', 19.90, 55),
(25, 'Complexo B (com 60 cápsulas)', 27.90, 35),
(26, 'Água Oxigenada 10 volumes 100ml', 3.90, 120),
(27, 'Soro de Reidratação Oral', 5.20, 80),
(28, 'Analgésico Infantil Tylenol Baby 60ml', 21.50, 45),
(29, 'Xarope para Tosse Vick 120ml', 23.90, 40),
(30, 'Spray Antisséptico Nexcare 60ml', 16.90, 50),
(31, 'Avaiana veia ', 30.00, 1),
(32, 'Androloxina', 0.50, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `senha`) VALUES
(1, 'euu', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
