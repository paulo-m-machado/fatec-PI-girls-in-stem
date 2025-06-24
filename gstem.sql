-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/06/2025 às 06:06
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gstem`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `artigos`
--

CREATE TABLE `artigos` (
  `id_artigo` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `data_publicacao` datetime DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  `tipo` enum('Artigo','Noticia','Evento') NOT NULL DEFAULT 'Artigo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `artigos`
--

INSERT INTO `artigos` (`id_artigo`, `usuario_id`, `titulo`, `data_publicacao`, `conteudo`, `tipo`) VALUES
(1, 1, 'Artigo de teste', '2025-06-21 01:49:09', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at varius purus. Vivamus bibendum tortor libero, vitae elementum ipsum venenatis eget. \r\nVestibulum id ipsum elementum, fermentum nisl vel, rhoncus augue. Nunc fermentum maximus lorem id tincidunt. Nullam at purus sagittis quam iaculis gravida. In ornare mauris non facilisis ornare. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum at pretium augue, in fermentum sem. Nulla diam felis, semper ornare molestie quis, hendrerit a dolor. Ut vitae vehicula ipsum, ut rutrum ipsum. Donec ut massa a ligula eleifend pretium eget eu ipsum. Sed laoreet mi quis nisi elementum, at viverra libero efficitur. Mauris dapibus tortor id justo lobortis, sed ornare ligula commodo.\r\n\r\nPhasellus volutpat nunc erat, sed ultricies mauris ullamcorper eget. Etiam commodo augue vitae urna consectetur bibendum. Vivamus ornare rhoncus nisi, nec hendrerit urna elementum dapibus. Maecenas semper orci nec libero faucibus mattis. Integer vestibulum turpis ut felis dapibus, in tempor nulla fringilla. Vivamus placerat bibendum mi, eget semper orci imperdiet non. Morbi sodales arcu iaculis, blandit mauris sed, aliquam dolor. Pellentesque aliquet vestibulum dapibus. In hendrerit dignissim lacus, a feugiat ligula efficitur id. Etiam congue massa quam. Praesent at velit sodales, rhoncus nulla sit amet, gravida arcu. Donec quis diam eleifend, vulputate nisl ut, interdum erat. Integer lacus tellus, varius at facilisis a, porttitor vel velit. Praesent consectetur felis non vulputate feugiat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vestibulum sodales sapien. Fusce nec dignissim purus, sit amet viverra sapien. Proin venenatis justo tortor, quis interdum justo mattis at.\r\n\r\nMaecenas eget euismod ipsum. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam lobortis quis libero eget tempus. Nulla elementum iaculis elit. Quisque faucibus scelerisque turpis. Aliquam erat volutpat. Nullam faucibus nisl a ullamcorper ullamcorper. Vestibulum a metus eros. Sed auctor dui purus, nec aliquet justo fermentum sit amet.\r\n\r\nMorbi pellentesque ante vitae dolor vulputate lobortis. Phasellus nec lorem sit amet ante commodo pellentesque in facilisis turpis. Duis at leo pulvinar elit tristique sagittis et a risus. Donec quis lobortis turpis, sit amet scelerisque mi. Proin augue nibh, auctor sit amet ultricies non, imperdiet vel eros. Ut ex mauris, cursus vehicula aliquam vel, consequat at ipsum. Praesent fringilla, ligula quis pulvinar vulputate, augue nulla molestie nisl, at egestas purus orci eget turpis. Cras sollicitudin nunc vitae elementum fringilla. Pellentesque ornare nulla a massa rhoncus ullamcorper.\r\n\r\nPhasellus nec lacus non augue lacinia sagittis eu ut erat. Cras eu rhoncus urna. Etiam aliquet, nisl a semper blandit, lectus leo feugiat enim, quis efficitur sapien nunc ac odio. Mauris placerat quis ligula eget porttitor. Proin hendrerit augue eu blandit rutrum. Sed ut porta massa, at iaculis sem. Cras posuere facilisis nisi, ut tristique sem convallis sed. Vestibulum pretium lectus eu ante tincidunt, quis viverra neque tempor. Donec quam enim, consectetur id arcu fermentum, tempor imperdiet dui. Cras iaculis iaculis nisl iaculis aliquet. In vitae convallis dolor. Etiam elementum massa sit amet nisi viverra scelerisque. Phasellus vulputate ex a laoreet malesuada. Praesent fermentum cursus sem, sit amet accumsan nunc maximus a. Fusce quam purus, ultricies sed odio eget, ullamcorper commodo tellus. Aliquam augue metus, porta a leo vitae, placerat aliquam leo.\r\n\r\nMaecenas commodo felis sed massa tempor, vitae gravida urna bibendum. Curabitur quis turpis odio. Proin massa diam, scelerisque in auctor in, sodales sed sapien. Sed mollis, orci vitae molestie vestibulum, erat libero vestibulum arcu, in varius neque leo ut orci. Suspendisse non mauris ut velit ultricies finibus ut at libero. Ut luctus lorem erat, eget convallis sem aliquet ut. Curabitur orci magna, congue imperdiet eleifend sit amet, volutpat sit amet lacus. Curabitur condimentum rhoncus enim ac viverra. Maecenas accumsan rhoncus volutpat. Etiam rhoncus, quam ut sollicitudin aliquet, nunc sapien semper risus, sed semper sem lorem id dolor. In ornare, metus in eleifend dapibus, metus mi cursus diam, viverra eleifend nibh lacus vel eros.\r\n\r\nMorbi malesuada condimentum leo, a auctor ipsum pellentesque sit amet. ', 'Artigo'),
(2, 1, 'Teste noticia', '2025-06-21 15:22:11', 'Teste de noticia', 'Noticia'),
(6, 3, 'n sei', '2025-06-23 10:32:19', 'asdfdsgdfshgstd  hrthcwdfebtrn', 'Artigo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id_mensagem` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `conteudo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mensagens`
--

INSERT INTO `mensagens` (`id_mensagem`, `usuario_id`, `email`, `nome`, `conteudo`) VALUES
(1, NULL, 'teste@gmail.com', 'Teste', 'teste\r\nteste\r\nteste\r\nteste\r\nteste\r\nteste'),
(3, NULL, '', 'msgTeste', '1q234512341234'),
(5, NULL, 'teste@gmail.com', 'teste', 'sera q funciona'),
(6, 1, 'teste@gmail.com', 'teste', 'aaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `sobre` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `notificacao` tinyint(1) DEFAULT NULL,
  `administrador` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `telefone`, `sobre`, `foto`, `notificacao`, `administrador`) VALUES
(1, 'teste', 'teste@gmail.com', '12345', '14999998997', 'nada', '[value-7]', 0, 1),
(2, 'usuarioTeste', 'emailteste@gmail.com', '12345', '14999999999', NULL, NULL, NULL, 0),
(3, 'usuario novo', 'emailfalso@hotmail.com', '54321', '14888888888', NULL, NULL, NULL, 1),
(4, 'ninguem', 'ninguem@gmail.com', '12345', '14999988888', NULL, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`id_artigo`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id_mensagem`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `id_artigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_mensagem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `artigos`
--
ALTER TABLE `artigos`
  ADD CONSTRAINT `artigos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para tabelas `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
