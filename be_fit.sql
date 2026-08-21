-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/06/2026 às 07:28
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
(4, 'Promoções');

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
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `descricao`, `preco`, `estoque`, `imagem`, `link`) VALUES
(1, 'Raquete de Beach Tennis Mormaii Vitoria Marquezini', '', 2499.90, 5, 'img/raquetemormaivt.webp', 'infoprodutos/raquetevitoriamormaii.php'),
(2, 'Raquete de Beach Tennis Heroes Starlight Ruby 2026', '', 3499.00, 5, 'img/raqueteheroesstarlight.webp', 'infoprodutos/raqueteheroesstarlight.php'),
(3, 'Raquete de Beach Tennis Kona Gladiator Steel 2026', '', 2499.00, 5, 'img/raquetekonagladiator.png', 'infoprodutos/raquetekonagladiator.php'),
(4, 'Raquete de Beach Tennis Fobel Husky 25/26', '', 2159.90, 5, 'img/raquetefobelhusky.png', 'infoprodutos/raquetefobelhusky.php'),
(5, 'Raquete de Beach Tennis Fobel Fox 2025', '', 2019.90, 5, 'img/raquetefobelfox.png', 'infoprodutos/raquetefobelfox.php'),
(6, 'Raquete de Beach Tennis Zand Bruxo 2026', '', 2789.10, 5, 'img/raquetezandbruxo2026.jpeg', 'infoprodutos/raquetezandbruxo2026.php'),
(7, 'Raquete de Beach Tennis Fobel Macaw Onyx - Limited Edition', '', 3259.70, 5, 'img/raquetefobelmacawonyx.png.png', 'infoprodutos/raquetefobelmacawonyx.php'),
(8, 'Raquete de Beach Tennis Zand Z Jump 2026', '', 2200.90, 5, 'img/raquetezandzjump.jpeg', 'infoprodutos/raquetezandzjump.php'),
(9, 'Raquete de Beach Tennis Vision Precision 2026', '', 1789.90, 5, 'img/raquetevisionprecision.jpeg', 'infoprodutos/raquetevisionprecision.php'),
(10, 'Raquete de Beach Tennis Drop Shot CANYON PRO 3.0 2026 Nikita', '', 2229.30, 5, 'img/raquetedropshotnikita.php', 'infoprodutos/raquetedropshotnikita.php'),
(11, 'Camiseta Zand Z Extreme', '', 139.00, 10, 'img/camisa-zand-extreme.png', 'infoprodutos/camisetazandzextreme.php'),
(12, 'Camiseta Kona Preta e Dourado', '', 159.00, 10, 'img/camisetakonapretaedourado.png', 'infoprodutos/camiseta-kona-preta-e-dourado.php'),
(13, 'Short Drop Shot Preto Team Pro W25', '', 134.90, 10, 'img/shortsmasculinodropshotpreto.webp', 'infoprodutos/short-preto-drop-shot.php'),
(14, 'Camiseta Polo Nox Masculina Esportiva', '', 339.80, 10, 'img/camisetapolonox.png', 'infoprodutos/camiseta-polo-nox.php'),
(15, 'Camiseta Fobel Preta', '', 149.00, 10, 'img/camiseta-fobel-preta.png', 'infoprodutos/camiseta-preta-fobel.php'),
(16, 'Camiseta Zand Z Jump Preta', '', 129.00, 10, 'img/camisetazandzjumppreta.png', 'infoprodutos/camiseta-zand-z-jump.php'),
(17, 'Camiseta Fobel Gustavo Russo', '', 149.90, 10, 'img/camiseta-fobel-gustavorusso.png', 'infoprodutos/camiseta-fobel-gustavo-russo.php'),
(18, 'Camiseta Zeiq Preta', '', 139.00, 10, 'img/camisetazeiqpreta.webp', 'infoprodutos/camiseta-zeiq-preta.php'),
(19, 'Short Kona Basic Preto', '', 149.90, 10, 'img/shortskonapretobasic.png', 'infoprodutos/short-kona-basic.php'),
(20, 'Camiseta Mormaii Vini Font 2025', '', 255.00, 10, 'img/camisetamormaiivinifont.jpeg', 'infoprodutos/camiseta-mormaii-vini-font.php'),
(21, 'Vestido Macaquinho Mormaii Beach Tennis Vitória Marchezini', '', 359.00, 10, 'img/vestido-mormaii-vitoriamarchezini.png', 'infoprodutos/vestido-mormaii-vitoria-marchezini.php'),
(22, 'Top alcinha Drop Shot Basic Preto', '', 129.90, 10, 'img/topdropshot.png', 'infoprodutos/top-drop-shot.php'),
(23, 'Saia Feminina Kona Basic', '', 149.00, 10, 'img/saiakonabasic.png', 'infoprodutos/saia-kona-basic.php'),
(24, 'Baby Look Dry Leo Branco - Zeiq', '', 139.00, 10, 'img/babylookzeiq.webp', 'infoprodutos/baby-look-zeiq.php'),
(25, 'Regata Cropped Mormaii Vitoria Marchezini', '', 169.00, 10, 'img/regatacroppedvitoriamarchezini.jpeg', 'infoprodutos/regata-cropped-vitoria-marchezini.php'),
(26, 'Top Alca Fina Mormaii Rosa', '', 128.00, 10, 'img/topalcafinamormaii.png', 'infoprodutos/top-alca-fina-mormaii-rosa.php'),
(27, 'Regata Feminina Cropped Mormaii 2776', '', 99.90, 10, 'img/regatacroppedpreto.jpeg', 'infoprodutos/regata-cropped-mormaii-preta.php'),
(28, 'Top Feminino Move Fobel', '', 149.00, 10, 'img/topfemininofobel.png', 'infoprodutos/top-feminino-fobel.php'),
(29, 'Short Feminino Move Fobel', '', 149.90, 10, 'img/shortfemininofobel.png', 'infoprodutos/short-feminino-fobel.php'),
(30, 'Vestido Macaquinho Mormaii Beach Tennis Vitória Marchezini Branco', '', 359.00, 10, 'img/vestido-mormaii-vitoriamarchezini-branco.png', 'infoprodutos/vestido-mormaii-vitoria-marchezini-branco.php');

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
(30, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

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
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
