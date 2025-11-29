-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 28/11/2025 às 23:41
-- Versão do servidor: 8.0.43
-- Versão do PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bleedwithdignity_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `calendario_menstrual`
--

CREATE TABLE `calendario_menstrual` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `fluxo` enum('leve','moderado','intenso') DEFAULT NULL,
  `humor` varchar(100) DEFAULT NULL,
  `remedios` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` int NOT NULL,
  `autor_id` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `data_postagem` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `forum_posts`
--

INSERT INTO `forum_posts` (`id`, `autor_id`, `titulo`, `conteudo`, `data_postagem`) VALUES
(10, 5, 'ffkfjf', 'sdfsdf', '2025-11-25 22:50:24'),
(11, 5, 'dd', 'ddd', '2025-11-25 22:51:40'),
(12, 5, 'dd', 'ddd', '2025-11-25 22:51:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `forum_respostas`
--

CREATE TABLE `forum_respostas` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `autor_id` int NOT NULL,
  `conteudo` text NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts_salvos`
--

CREATE TABLE `posts_salvos` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `data_salvo` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_confirmado` tinyint(1) DEFAULT '0',
  `Data_Nascimento` date DEFAULT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` enum('admin','user') NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`user_id`, `nome`, `email`, `email_confirmado`, `Data_Nascimento`, `senha`, `tipo`, `foto_perfil`) VALUES
(1, 'Administrador Geral', 'admin@sistema.com', 1, NULL, '$2y$10$rbxJ94pgEgzZj.6J3XXFkuoABZPzhoBHeIpKLSAqC6Y7ryHybbhU6', 'admin', NULL),
(5, 'miiii sutel', 'piipiipoopii@gmail.com', 0, '2003-02-01', '$2y$10$JIU1R3WXDYnUKW0PmRkxFO.gBFpoESxdHi7qkym0JjIGOJvwbIiKS', 'user', 'uploads/avatars/user_5_1764111131_6926331bc1a17.png'),
(10, 'Milena Sutel', 'sutelmilena@gmail.com', 0, '2004-12-01', '$2y$10$8ro6z6UJGdn/6RXhqvrZUupIqZ3Jgckw8Ax7A4.69vrOqil0yMyPW', 'user', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `calendario_menstrual`
--
ALTER TABLE `calendario_menstrual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor_id` (`autor_id`);

--
-- Índices de tabela `forum_respostas`
--
ALTER TABLE `forum_respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `autor_id` (`autor_id`);

--
-- Índices de tabela `posts_salvos`
--
ALTER TABLE `posts_salvos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_salvo` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `calendario_menstrual`
--
ALTER TABLE `calendario_menstrual`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `forum_respostas`
--
ALTER TABLE `forum_respostas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `posts_salvos`
--
ALTER TABLE `posts_salvos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `calendario_menstrual`
--
ALTER TABLE `calendario_menstrual`
  ADD CONSTRAINT `calendario_menstrual_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Restrições para tabelas `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD CONSTRAINT `forum_posts_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `users` (`user_id`);

--
-- Restrições para tabelas `forum_respostas`
--
ALTER TABLE `forum_respostas`
  ADD CONSTRAINT `forum_respostas_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `forum_posts` (`id`),
  ADD CONSTRAINT `forum_respostas_ibfk_2` FOREIGN KEY (`autor_id`) REFERENCES `users` (`user_id`);

--
-- Restrições para tabelas `posts_salvos`
--
ALTER TABLE `posts_salvos`
  ADD CONSTRAINT `posts_salvos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_salvos_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `forum_posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
