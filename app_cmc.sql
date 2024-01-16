-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jan-2024 às 19:57
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `app_cmc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `postoGrad` varchar(50) DEFAULT NULL,
  `pai` varchar(255) DEFAULT NULL,
  `mae` varchar(255) DEFAULT NULL,
  `naturalidade` varchar(100) DEFAULT NULL,
  `idt` varchar(20) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `ativaReserva` varchar(8) DEFAULT NULL,
  `localTrabalho` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `operador` varchar(50) DEFAULT NULL,
  `criado_por` varchar(50) DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `postoGrad`, `pai`, `mae`, `naturalidade`, `idt`, `cpf`, `ativaReserva`, `localTrabalho`, `email`, `rua`, `numero`, `bairro`, `complemento`, `cep`, `cidade`, `uf`, `telefone`, `celular`, `nascimento`, `operador`, `criado_por`, `situacao`, `data_cadastro`) VALUES
(3, 'Deivide Nascimento de souza', '3º SGT', 'Ivan Santos de Souza', 'Angela Nascimento de Souza', 'Salvador', '0602774176', '863.280.825', 'Ativa', 'Cia C/6ª RM', 'deivide111@gmail.com', 'Vila Cláudia', '', 'Plataforma', 'Fundo', '40718010', 'Salvador', 'BA', '(71) 98501-7014', '(71) 98501-7014', '2000-11-23', '', 'Deivide', 'Ativa', '2024-01-10 01:19:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `token` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `token`, `email`) VALUES
(1, 'Administrador do sistema', 'admin', '202cb962ac59075b964b07152d234b70', '1', ''),
(5, 'Antonio Junior', 'junior', '202cb962ac59075b964b07152d234b70', '74279ec3066c02d25fd213654c059a23', ''),
(6, 'Deivide', '86328082576', '202cb962ac59075b964b07152d234b70', '03ce004d8d02b8d851f687203a74428f', 'deivide111@gmail.com'),
(7, 'Flavio Silva', '00552882571', 'e10adc3949ba59abbe56e057f20f883e', 'eb4918551e6476228b85accf1aefb09b', 'faljs@hotmail.com'),
(8, 'Carlos  Jose', '12345678919', 'e10adc3949ba59abbe56e057f20f883e', '5f6d7d2a7a3aa3364137a4a60df07840', 'carlos@jose.com'),
(9, 'Eu da silva', '0000000000', 'e10adc3949ba59abbe56e057f20f883e', '757d36ba9ce707e6682beddc4f728f09', 'silva@silva.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
