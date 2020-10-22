-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Out-2020 às 17:36
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Banco de dados: `sistemaos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE login (
  `id` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `usuario`, `senha`) VALUES
(18, 'usuario anonimo teste', 'usuario@teste', '$2y$10$g8tRtmQE6Qty4DF2OaFyMeiAKKRLKzwv35f8GY2tI4vVlceCv8pnG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE services (
  `id` int(4) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `servico` varchar(500) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `datas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `cliente`, `servico`, `valor`, `datas`) VALUES
(14, 'Jose Fulano', 'Formatação do Computador', 'R$:100,00', '2020-10-07');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

