-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/06/2024 às 23:05
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `grupo6`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(70) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `endereco_logradouro` varchar(100) NOT NULL,
  `endereco_numero` varchar(6) NOT NULL,
  `endereco_bairro` varchar(20) NOT NULL,
  `endereco_complemento` varchar(40) NOT NULL,
  `endereco_cidade` varchar(25) NOT NULL,
  `endereco_estado` varchar(25) NOT NULL,
  `endereco_cep` varchar(8) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `data_nascimento`, `email`, `telefone`, `endereco_logradouro`, `endereco_numero`, `endereco_bairro`, `endereco_complemento`, `endereco_cidade`, `endereco_estado`, `endereco_cep`, `senha`) VALUES
(1, 'admin', '00000000000', '2024-06-10', 'admin@dominio.com', '82988888888', 'Rua do admin2', '', '', '', '', '', '', '$2y$10$yV9TDxmU9qkR2MezXBmYV..DXLqTjBqJHU4uIL7O73MvKFbKwesFS'),
(2, 'João das Couves', '12345678900', '2024-06-10', 'joaocouves@dominio.com', '82988661234', 'Rua dos Bobos', '0', 'Nenhum', 'Uma casa muito engraçada', 'Maceió', 'AL', '57035000', '$2y$10$yV9TDxmU9qkR2MezXBmYV..DXLqTjBqJHU4uIL7O73MvKFbKwesFS'),
(3, 'Maria do Bairro', '98765432100', '2024-06-09', 'mariabairro@gmail.com', '81899994321', 'Rua Em Projeto', '42', 'Tabuleiro', 'Em frente ao posto de saúde', 'Maceió', 'AL', '57035789', '$2y$10$yV9TDxmU9qkR2MezXBmYV..DXLqTjBqJHU4uIL7O73MvKFbKwesFS'),
(4, 'Zé Sabido', '11111111111', '2024-06-01', 'sabido@outlook.com', '82993456789', 'De barro', '', '', '', '', '', '', '$2y$10$C6ZM9rUH2DVJVKtmNge8R.SwUG7zLfDh8WhqHc9DhY5Dh9QuARFca'),
(5, 'Teste', '123456788', '2024-06-01', 'teste@teste.com', '', '', '', '', '', '', '', '', '$2y$10$MwsjaLBVAWTO6hROZXVhtu5BSihY0BFOmENsBm94GsCDLJsNFeVL6'),
(8, 'João Bobo', '', '0000-00-00', 'joao@gmail.com', '', '', '', '', '', '', '', '', '$2y$10$.hdK6GGZkYNL7374Mv2SKe0ZbpmAe1nV3d3ixewvtPFSn8FtVc9aq'),
(9, 'Jão Javascript', '456.789.456', '0000-00-00', 'jj@gmail.com', '(81)98523-6', '', '', '', '', '', '', '', '$2y$10$vQhDamUHZSeSDmr194RFw.SRYAeAEnRrlO.75ojiWAHHTdtarIWr2'),
(10, 'Teste formatação insert', '12345678900', '0000-00-00', 'testeformatinsert@dominio.com', '82988464321', '', '', '', '', '', '', '', '$2y$10$/DBR.tQ1bvLtr/hEa4oPdOVJG9gAqAboGPA9Mr8jFj5p0z5.2SE0a'),
(11, 'Testilson da Silva', '12345678900', '0000-00-00', 'testilson@outlook.com', '82987465424', '', '', '', '', '', '', '', '$2y$10$iTLd3BsYXUEjTvF9.5yC.OHd.bTz8ZxigxZIPn2ggJSmM5FR/70Oy'),
(12, 'teste', '23212143432', '0000-00-00', 'teste@teste.com', '', '', '', '', '', '', '', '', '$2y$10$wOQX2v7iPB3RCT.lBaZheuQ0iqdiUuXhl4Hr5oxCbZZtzAtdiOlJe'),
(13, 'senha diferente', '', '0000-00-00', 'senhadiferente@outlook.com', '', '', '', '', '', '', '', '', '$2y$10$21jV7kBZ6hQgWns9XCwnpunxFS6PtxxbWL9aDdYShr4XxefFshp/G'),
(14, 'redsfdsaf', '44546545465', '0000-00-00', 'email@email.com', '', '', '', '', '', '', '', '', '$2y$10$bOkPlhWxvzAO45new/8AIeMtg4BcLcYOAshxsKgoca4gq0H/Ifv/G'),
(15, 'redsfdsaf', '44546545465', '0000-00-00', 'email@email.com', '', '', '', '', '', '', '', '', '$2y$10$dBSSOCQPx9OierbH3NzS3emNmTu97VTU3asaASMr6hvYeEWe8Em8O'),
(16, 'testeredesign', '', '0000-00-00', 'fdfdsaf@fdfdasfds.com', '12323213213', '', '', '', '', '', '', '', '$2y$10$prX7VOUnXUxZRTivc86tC.gyhZ3t/0Zxy4ZOf7Gac1CbNYAs6q0o6'),
(17, 'teste', '', '0000-00-00', 'teste@teste.com', '', '', '', '', '', '', '', '', '$2y$10$yuTYw2qgnIxNl7EdV2bMIO/dNvif/AqFChPUqzDR/eDhphnc/sW4m'),
(18, 'teste', '', '0000-00-00', 'teste@teste.com', '', '', '', '', '', '', '', '', '$2y$10$VxgXlLVhjGIQCbbFQPFpcO7Sf4.1.AwVIJr5JD.MWEtTIXwWz5ta6'),
(19, '32132', '', '0000-00-00', '3231@3213.com', '', '', '', '', '', '', '', '', '$2y$10$8yowyBeuY0ueFUvOg3rfCuL7.bvO4V6DysVwxe.kF1D4AwUJ8XV86'),
(20, 'Cadastro com as restrições', '', '0000-00-00', '32113@23213213.com', '', '', '', '', '', '', '', '', '$2y$10$w12/M/eQc2yJeBjFeC2ME.ItFHX8dyiFRuZBO5pPNhBwcGpYOdOzS'),
(21, '32321321', '', '0000-00-00', '9841@8614.com', '', '', '', '', '', '', '', '', '$2y$10$ylZOPCCCg3ppPSJC2bKtSurDb6E4vjpkufwp4weMb/AX440xBywtm');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `data` datetime NOT NULL,
  `total` double NOT NULL,
  `apagado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_id`, `data`, `total`, `apagado`) VALUES
(1, 2, '2024-06-10 16:03:46', 0, 0),
(2, 2, '2024-06-10 16:12:42', 0, 0),
(3, 2, '2024-06-10 16:14:26', 0, 0),
(4, 2, '2024-06-10 16:14:34', 0, 0),
(5, 2, '2024-06-10 16:21:16', 0, 0),
(6, 2, '2024-06-10 16:21:43', 0, 0),
(7, 2, '2024-06-10 16:22:35', 0, 0),
(8, 2, '2024-06-10 16:23:09', 0, 0),
(9, 2, '2024-06-10 16:25:13', 0, 0),
(10, 2, '2024-06-10 16:25:31', 0, 0),
(11, 2, '2024-06-10 16:31:17', 0, 0),
(12, 2, '2024-06-10 16:31:33', 0, 0),
(13, 2, '2024-06-10 16:31:41', 0, 0),
(14, 3, '2024-06-10 17:23:27', 0, 0),
(15, 3, '2024-06-10 17:26:04', 0, 0),
(16, 3, '2024-06-10 17:26:27', 35.8, 0),
(17, 3, '2024-06-10 18:17:38', 31.25, 0),
(18, 1, '2024-06-10 21:05:00', 8.5, 0),
(19, 1, '2024-06-10 21:13:35', 11.5, 0),
(20, 1, '2024-06-10 21:15:59', 8.5, 0),
(21, 1, '2024-06-10 21:19:08', 34.5, 0),
(22, 1, '2024-06-11 01:07:43', 74.65, 0),
(23, 1, '2024-06-12 02:45:58', 189.6, 0),
(24, 1, '2024-06-12 02:48:12', 11.5, 0),
(25, 1, '2024-06-12 12:46:48', 71.25, 0),
(26, 1, '2024-06-12 12:53:25', 7.5, 0),
(27, 1, '2024-06-12 12:59:02', 15.8, 0),
(28, 1, '2024-06-12 13:02:22', 11.5, 0),
(29, 1, '2024-06-12 13:03:17', 11.5, 0),
(30, 1, '2024-06-12 13:06:31', 7.9, 0),
(31, 1, '2024-06-12 13:11:52', 11.5, 0),
(32, 1, '2024-06-12 13:17:18', 11.5, 0),
(33, 1, '2024-06-12 13:17:37', 7.9, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos_produtos`
--

CREATE TABLE `pedidos_produtos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pedido_id` bigint(20) UNSIGNED NOT NULL,
  `produto_id` bigint(20) UNSIGNED NOT NULL,
  `preco_unitario` double NOT NULL,
  `quantidade` tinyint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos_produtos`
--

INSERT INTO `pedidos_produtos` (`id`, `pedido_id`, `produto_id`, `preco_unitario`, `quantidade`) VALUES
(2, 9, 9, 0, 1),
(3, 9, 5, 0, 2),
(4, 10, 9, 0, 1),
(5, 10, 5, 0, 2),
(6, 11, 9, 0, 1),
(7, 11, 5, 0, 2),
(8, 12, 9, 0, 1),
(9, 12, 5, 0, 2),
(10, 14, 9, 0, 2),
(11, 14, 2, 0, 1),
(12, 14, 6, 0, 4),
(13, 15, 9, 0, 1),
(14, 15, 2, 0, 2),
(15, 15, 1, 0, 1),
(16, 16, 9, 11.5, 1),
(17, 16, 2, 7.9, 2),
(18, 16, 1, 8.5, 1),
(19, 17, 9, 11.5, 2),
(20, 17, 8, 8.25, 1),
(21, 18, 1, 8.5, 1),
(22, 19, 9, 11.5, 1),
(23, 20, 1, 8.5, 1),
(24, 21, 9, 11.5, 3),
(25, 22, 9, 11.5, 2),
(26, 22, 2, 7.9, 1),
(27, 22, 5, 8.75, 5),
(28, 23, 2, 7.9, 24),
(29, 24, 9, 11.5, 1),
(30, 25, 9, 11.5, 2),
(31, 25, 2, 7.9, 5),
(32, 25, 5, 8.75, 1),
(33, 26, 6, 7.5, 1),
(34, 27, 2, 7.9, 2),
(35, 28, 9, 11.5, 1),
(36, 29, 9, 11.5, 1),
(37, 30, 2, 7.9, 1),
(38, 31, 9, 11.5, 1),
(39, 32, 9, 11.5, 1),
(40, 33, 2, 7.9, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `preco_unitario` double NOT NULL,
  `imagem` text NOT NULL,
  `excluido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco_unitario`, `imagem`, `excluido`) VALUES
(1, 'Trufa de Chocolate Tradicional', 'Trufa clássica de chocolate ao leite, feita com ingredientes selecionados.', 8.5, 'https://placehold.co/600x400', 1),
(2, 'Trufa de Brigadeiro', 'Deliciosa trufa de brigadeiro, recheada com creme de chocolate e granulados.', 7.9, 'https://placehold.co/600x400', 1),
(3, 'Trufa de Maracujá', 'Trufa com recheio cremoso de maracujá, perfeita para quem gosta de sabores cítricos.', 9.3, 'https://placehold.co/600x400', 1),
(4, 'Trufa de Doce de Leite', 'Trufa recheada com doce de leite artesanal, envolta em chocolate ao leite.', 10, 'https://placehold.co/600x400', 1),
(5, 'Trufa de Café', 'Trufa com intenso sabor de café, ideal para os amantes de café.', 8.75, 'https://placehold.co/600x400', 1),
(6, 'Trufa de Menta', 'Trufa refrescante com recheio cremoso de menta e cobertura de chocolate.', 7.5, 'https://placehold.co/600x400', 1),
(7, 'Trufa de Coco', 'Trufa de coco, recheada com creme de coco e coberta com chocolate branco.', 9.8, 'https://placehold.co/600x400', 1),
(8, 'Trufa de Limão', 'Trufa de limão com sabor cítrico e cobertura de chocolate branco.', 8.25, 'https://placehold.co/600x400', 1),
(9, 'Trufa de Avelã', 'Trufa recheada com creme de avelã, envolta em chocolate ao leite.', 11.5, 'https://placehold.co/600x400', 1),
(10, 'Café Expresso', 'Café feito na hora com grãos selecionados.', 5, 'img/roundCat.png', 0),
(11, 'Café Americano', 'Café diluído em água quente, mais suave.', 6, 'img/moogle.png', 0),
(12, 'Café Mocha', 'Café expresso com chocolate e leite vaporizado.', 9, 'img/roundCat.png', 0),
(13, 'Cappuccino', 'Café expresso com leite vaporizado e espuma de leite.', 8.5, 'img/moogle.png', 0),
(14, 'Caramel Macchiato', 'Café expresso com leite, caramelo e espuma de leite.', 9.5, 'img/roundCat.png', 0),
(15, 'Frappuccino', 'Café gelado com leite e sabor a escolher.', 10, 'img/moogle.png', 0),
(16, 'Croissant', 'Croissant amanteigado, feito na hora.', 4, 'img/roundCat.png', 0),
(17, 'Pão de Queijo', 'Tradicional pão de queijo brasileiro.', 3.5, 'img/moogle.png', 0),
(18, 'Torrada com Manteiga', 'Fatias de pão torrado com manteiga.', 2.5, 'img/roundCat.png', 0),
(19, 'Sanduíche Natural', 'Sanduíche de pão integral com peito de peru e salada.', 7.5, 'img/moogle.png', 0),
(20, 'Bolo de Cenoura', 'Bolo de cenoura com cobertura de chocolate.', 5, 'img/roundCat.png', 0),
(21, 'Bolo de Chocolate', 'Bolo de chocolate com recheio cremoso.', 6, 'img/moogle.png', 0),
(22, 'Biscoitos Caseiros', 'Biscoitos feitos com receita da casa.', 4, 'img/roundCat.png', 0),
(23, 'Torta de Limão', 'Torta de limão com merengue.', 6.5, 'img/moogle.png', 0),
(24, 'Torta de Maçã', 'Torta de maçã com canela e massa crocante.', 6.5, 'img/roundCat.png', 0),
(25, 'Suco de Laranja', 'Suco de laranja natural, feito na hora.', 5, 'img/moogle.png', 0),
(26, 'Muffin de Blueberry', 'Muffin macio com blueberries frescas.', 4.5, 'img/roundCat.png', 0),
(27, 'Empada de Frango', 'Empada de frango com massa crocante.', 5, 'img/moogle.png', 0),
(28, 'Quiche de Queijo', 'Quiche de queijo com massa folhada.', 6, 'img/roundCat.png', 0),
(29, 'Brownie de Chocolate', 'Brownie de chocolate com nozes.', 5.5, 'img/moogle.png', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos_carrinho`
--

CREATE TABLE `produtos_carrinho` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `produto_id` bigint(20) UNSIGNED NOT NULL,
  `quantidade` tinyint(3) UNSIGNED NOT NULL,
  `valor_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessoes`
--

CREATE TABLE `sessoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sessoes`
--

INSERT INTO `sessoes` (`id`, `cliente_id`, `token`, `data_criacao`) VALUES
(1, 1, '6342877ebf700799e12d0534f073b03c643ce1db819a58fc5ef892ec3d68d7c7', '2024-06-10 14:44:58'),
(2, 1, '77767d5eaca68d1b1693e6116010891194ce0e5742a224241f587529a8ac1f39', '2024-06-10 14:51:58'),
(3, 1, 'b6ad3ed3d301f5c84e8f5d72d1134061bd6677a5878b96cb5dcff6faa164aeaa', '2024-06-10 14:57:27'),
(4, 1, '47b7547eefb28dff13b3f9c0262b541fd266ce1bbf3854575e1231a0746dfbf2', '2024-06-10 15:11:11'),
(5, 1, '8ff4c71a2e91d0cd95d608871e5a6d3b4b1543b2657f5d053f8f0dcba9de78b6', '2024-06-10 15:33:55'),
(24, 2, 'f5cc7cf875be2835d7693c4097014b865e3c495caeca6e307c036f666c9f7e1a', '2024-06-10 18:41:13'),
(28, 3, '0555455986793d6314515862936501d6804f9df40989cfd6a6e687b036623fc5', '2024-06-10 20:18:45'),
(47, 1, '7ddf7f7cfd4eb4e47b0479e953cc132b2a60d9450d149d94133ea14c3e42d584', '2024-06-11 02:36:06'),
(48, 1, '1088579ec63038f1479f1e68e86a08721ae8637088735210247b97ff727664cf', '2024-06-11 03:38:13'),
(67, 1, 'd40207815280f5a8f1e1967493f8ac7ad2d7acebdaa93d38602568f65a043a13', '2024-06-12 05:58:43'),
(68, 1, '18bab8d3f4a24313d579d31cb41485591cd9adaa74948345583d99bfdc404e7d', '2024-06-12 13:54:19'),
(77, 1, '5bdfb29b854c97d233715c2bb9c7d62e0d2dd3318950f36b116a4476af84e462', '2024-06-12 18:06:03');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices de tabela `pedidos_produtos`
--
ALTER TABLE `pedidos_produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices de tabela `produtos_carrinho`
--
ALTER TABLE `produtos_carrinho`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `sessoes`
--
ALTER TABLE `sessoes`
  ADD UNIQUE KEY `sessoes` (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `pedidos_produtos`
--
ALTER TABLE `pedidos_produtos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `produtos_carrinho`
--
ALTER TABLE `produtos_carrinho`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de tabela `sessoes`
--
ALTER TABLE `sessoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Restrições para tabelas `pedidos_produtos`
--
ALTER TABLE `pedidos_produtos`
  ADD CONSTRAINT `pedido_id` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `produto_id` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `produtos_carrinho`
--
ALTER TABLE `produtos_carrinho`
  ADD CONSTRAINT `produtos_carrinho_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `produtos_carrinho_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
