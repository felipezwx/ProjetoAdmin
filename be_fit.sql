-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/09/2026 às 22:24
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
-- Banco de dados: `be_fit`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_relatorio_produtos` (IN `p_categoria` VARCHAR(100), IN `p_busca` VARCHAR(150), IN `p_limite` INT, IN `p_offset` INT)   BEGIN

    SELECT
        id_produto,
        nome,
        categoria,
        preco,
        estoque,
        fn_valor_estoque(preco, estoque) AS valor_estoque

    FROM vw_produtos_categorias

    WHERE
        (p_categoria = 'todos' OR categoria = p_categoria)

        AND

        (p_busca = '' OR nome LIKE CONCAT('%', p_busca, '%'))

    ORDER BY nome

    LIMIT p_limite OFFSET p_offset;

END$$

--
-- Funções
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_valor_estoque` (`p_preco` DECIMAL(10,2), `p_estoque` INT) RETURNS DECIMAL(12,2) DETERMINISTIC BEGIN

    RETURN ROUND(p_preco * p_estoque, 2);

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome`) VALUES
(1, 'Raquetes'),
(2, 'Roupas Masculinas'),
(3, 'Roupas Femininas'),
(6, 'mochila');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `id_contato` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `status` varchar(20) DEFAULT 'Novo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `promocao` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `descricao`, `preco`, `estoque`, `imagem`, `link`, `promocao`) VALUES
(1, 'Raquete beach tennis Mormaii vitoria marchezini ii', '', 2499.90, 4, 'img/raquetemormaivt.webp', 'infoprodutos/raquetevitoriamormaii.php', 0),
(2, 'Raquete de Beach Tennis Heroes Starlight Ruby 2026', '', 3499.00, 5, 'img/raqueteheroesstarlight.webp', 'infoprodutos/raqueteheroesstarlight.php', 0),
(3, 'Raquete de Beach Tennis Kona Gladiator Steel 2026', '', 2499.00, 5, 'img/raquetekonagladiator.png', 'infoprodutos/raquetekonagladiator.php', 1),
(4, 'Raquete de Beach Tennis Fobel Husky 25/26', '', 2159.90, 5, 'img/raquetefobelhusky.png', 'infoprodutos/raquetefobelhusky.php', 0),
(5, 'Raquete de Beach Tennis Fobel Fox 2025', '', 2019.90, 5, 'img/raquetefobelfox.png', 'infoprodutos/raquetefobelfox.php', 0),
(6, 'Raquete de Beach Tennis Zand Bruxo 2026', '', 2789.10, 5, 'img/raquetezandbruxo2026.jpeg', 'infoprodutos/raquetezandbruxo2026.php', 0),
(7, 'Raquete de Beach Tennis Fobel Macaw Onyx - Limited Edition', '', 3259.70, 5, 'img/raquetefobelmacawonyx.png.png', 'infoprodutos/raquetefobelmacawonyx.php', 0),
(8, 'Raquete de Beach Tennis Zand Z Jump 2026', '', 2200.90, 5, 'img/raquetezandzjump.jpeg', 'infoprodutos/raquetezandzjump.php', 0),
(9, 'Raquete de Beach Tennis Vision Precision 2026', '', 1789.90, 5, 'img/raquetevisionprecision.jpeg', 'infoprodutos/raquetevisionprecision.php', 0),
(10, 'Raquete de Beach Tennis Drop Shot CANYON PRO 3.0 2026 Nikita', '', 2229.30, 5, 'img/raquetedropshotnikita.php', 'infoprodutos/raquetedropshotnikita.php', 0),
(11, 'Camiseta Zand Z Extreme', '', 139.00, 10, 'img/camisa-zand-extreme.png', 'infoprodutos/camisetazandzextreme.php', 0),
(12, 'Camiseta Kona Preta e Dourado', '', 159.00, 10, 'img/camisetakonapretaedourado.png', 'infoprodutos/camiseta-kona-preta-e-dourado.php', 1),
(13, 'Short Drop Shot Preto Team Pro W25', '', 134.90, 10, 'img/shortsmasculinodropshotpreto.webp', 'infoprodutos/short-preto-drop-shot.php', 0),
(14, 'Camiseta Polo Nox Masculina Esportiva', '', 339.80, 10, 'img/camisetapolonox.png', 'infoprodutos/camiseta-polo-nox.php', 0),
(15, 'Camiseta Fobel Preta', '', 149.00, 10, 'img/camiseta-fobel-preta.png', 'infoprodutos/camiseta-preta-fobel.php', 0),
(16, 'Camiseta Zand Z Jump Preta', '', 129.00, 10, 'img/camisetazandzjumppreta.png', 'infoprodutos/camiseta-zand-z-jump.php', 0),
(17, 'Camiseta Fobel Gustavo Russo', '', 149.90, 10, 'img/camiseta-fobel-gustavorusso.png', 'infoprodutos/camiseta-fobel-gustavo-russo.php', 0),
(18, 'Camiseta Zeiq Preta', '', 139.00, 10, 'img/camisetazeiqpreta.webp', 'infoprodutos/camiseta-zeiq-preta.php', 0),
(19, 'Short Kona Basic Preto', '', 149.90, 10, 'img/shortskonapretobasic.png', 'infoprodutos/short-kona-basic.php', 1),
(20, 'Camiseta Mormaii Vini Font 2025', '', 255.00, 10, 'img/camisetamormaiivinifont.jpeg', 'infoprodutos/camiseta-mormaii-vini-font.php', 0),
(21, 'Vestido Macaquinho Mormaii Beach Tennis Vitória Marchezini', '', 359.00, 10, 'img/vestido-mormaii-vitoriamarchezini.png', 'infoprodutos/vestido-mormaii-vitoria-marchezini.php', 0),
(22, 'Top alcinha Drop Shot Basic Preto', '', 129.90, 10, 'img/topdropshot.png', 'infoprodutos/top-drop-shot.php', 0),
(23, 'Saia Feminina Kona Basic', '', 149.00, 10, 'img/saiakonabasic.png', 'infoprodutos/saia-kona-basic.php', 1),
(24, 'Baby Look Dry Leo Branco - Zeiq', '', 139.00, 10, 'img/babylookzeiq.webp', 'infoprodutos/baby-look-zeiq.php', 0),
(25, 'Regata Cropped Mormaii Vitoria Marchezini', '', 169.00, 10, 'img/regatacroppedvitoriamarchezini.jpeg', 'infoprodutos/regata-cropped-vitoria-marchezini.php', 0),
(26, 'Top Alca Fina Mormaii Rosa', '', 128.00, 10, 'img/topalcafinamormaii.png', 'infoprodutos/top-alca-fina-mormaii-rosa.php', 0),
(27, 'Regata Feminina Cropped Mormaii 2776', '', 99.90, 10, 'img/regatacroppedpreto.jpeg', 'infoprodutos/regata-cropped-mormaii-preta.php', 0),
(28, 'Top Feminino Move Fobel', '', 149.00, 10, 'img/topfemininofobel.png', 'infoprodutos/top-feminino-fobel.php', 0),
(29, 'Short Feminino Move Fobel', '', 149.90, 10, 'img/shortfemininofobel.png', 'infoprodutos/short-feminino-fobel.php', 0),
(30, 'Vestido Macaquinho Mormaii Beach Tennis Vitória Marchezini Branco', '', 359.00, 10, 'img/vestido-mormaii-vitoriamarchezini-branco.png', 'infoprodutos/vestido-mormaii-vitoria-marchezini-branco.php', 0),
(34, 'Mochila Heroes Starlight', 'Mochila Bonita', 999.99, 2, 'sem.png', NULL, 0);

--
-- Acionadores `produtos`
--
DELIMITER $$
CREATE TRIGGER `trg_produtos_valores_positivos` BEFORE UPDATE ON `produtos` FOR EACH ROW SET NEW.preco = ABS(NEW.preco), NEW.estoque = ABS(NEW.estoque)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_categoria`
--

CREATE TABLE `produto_categoria` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto_categoria`
--

INSERT INTO `produto_categoria` (`id_produto`, `id_categoria`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(34, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'Administrador', 'adminbefit@gmail.com', '$2y$10$/GKFqkm5no.xEXXpYn7Ryu2Z.DdyoU6pEJp2aAICDAN86dU6E.pXK');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_produtos_categorias`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_produtos_categorias` (
`id_produto` int(11)
,`nome` varchar(150)
,`descricao` text
,`preco` decimal(10,2)
,`estoque` int(11)
,`imagem` varchar(255)
,`promocao` tinyint(1)
,`id_categoria` int(11)
,`categoria` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura para view `vw_produtos_categorias`
--
DROP TABLE IF EXISTS `vw_produtos_categorias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_produtos_categorias`  AS SELECT `p`.`id_produto` AS `id_produto`, `p`.`nome` AS `nome`, `p`.`descricao` AS `descricao`, `p`.`preco` AS `preco`, `p`.`estoque` AS `estoque`, `p`.`imagem` AS `imagem`, `p`.`promocao` AS `promocao`, `c`.`id_categoria` AS `id_categoria`, `c`.`nome` AS `categoria` FROM ((`produtos` `p` join `produto_categoria` `pc` on(`p`.`id_produto` = `pc`.`id_produto`)) join `categorias` `c` on(`pc`.`id_categoria` = `c`.`id_categoria`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id_contato`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `produto_categoria`
--
ALTER TABLE `produto_categoria`
  ADD PRIMARY KEY (`id_produto`,`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produto_categoria`
--
ALTER TABLE `produto_categoria`
  ADD CONSTRAINT `produto_categoria_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`),
  ADD CONSTRAINT `produto_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
