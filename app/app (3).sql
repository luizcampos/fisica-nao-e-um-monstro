-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Out-2015 às 18:22
-- Versão do servidor: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conquistas`
--

CREATE TABLE IF NOT EXISTS `conquistas` (
  `id_con` int(10) unsigned NOT NULL,
  `Monstrinho_id_mon` int(10) unsigned NOT NULL,
  `usuarios_id_usu` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conquistas`
--

INSERT INTO `conquistas` (`id_con`, `Monstrinho_id_mon`, `usuarios_id_usu`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo`
--

CREATE TABLE IF NOT EXISTS `conteudo` (
  `id_cont` int(10) unsigned NOT NULL,
  `Sub_Materia_id_sub` int(10) unsigned NOT NULL,
  `conteudo_cont` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conteudo`
--

INSERT INTO `conteudo` (`id_cont`, `Sub_Materia_id_sub`, `conteudo_cont`) VALUES
(1, 1, 'A notação científica é usada para expressar valores muito grandes ou muito pequenos. A notação é usada por cientistas, como astrônomos, físicos, biólogos, químicos entre outros.\r\n\r\nExemplos: \r\n\r\n6 120 000, podemos representá-lo usando a seguinte notação decimal 6,12 * 106\r\n\r\n0,00012, pode ser representado por 1,2 * 10-4.\r\n\r\nTransformando:\r\n\r\nPara transformar um numero grande qualquer em notação cientifica, devemos deslocar a vírgula para a esquerda até o primeiro algarismo desta forma:\r\n\r\n200 000 000 000 » 2,00 000 000 000\r\n\r\nVeja que a vírgula avançou 11 casas para a esquerda, então em notação científica este número fica: 2 . 1011.\r\nPara com valores muito pequenos, é só mover a virgula para a direita, e a cada casa avançada, diminuir 1 da ordem de grandeza:\r\n\r\n0,0000000586 » movendo a vírgula para direita » 5,86 (avanço de 8 casas) » 5,86 . 10-8\r\n\r\n-12.000.000.000.000 » -1,2 . 10 elevado a 13\r\n\r\nOBS: O número antes da vírgula tem que ser maior ou igual a 1 e menor que 10. E o número que será o expoente tem que ser inteiro.\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `id_mat` int(10) unsigned NOT NULL,
  `topico_mat` varchar(255) DEFAULT NULL,
  `ano_mat` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materias`
--

INSERT INTO `materias` (`id_mat`, `topico_mat`, `ano_mat`) VALUES
(1, 'Revisão', 1),
(2, 'Cinemática escalar', 1),
(3, 'Cinemática vetorial', 1),
(4, 'Forças', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `monstrinho`
--

CREATE TABLE IF NOT EXISTS `monstrinho` (
  `id_mon` int(10) unsigned NOT NULL,
  `descricao_mon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `monstrinho`
--

INSERT INTO `monstrinho` (`id_mon`, `descricao_mon`) VALUES
(1, 'Newton'),
(2, 'Pitágoras');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas_exercicios`
--

CREATE TABLE IF NOT EXISTS `perguntas_exercicios` (
  `id_perg` int(10) unsigned NOT NULL,
  `Sub_Materia_id_sub` int(10) unsigned NOT NULL,
  `conteudo_perg` varchar(255) DEFAULT NULL,
  `alternativa_letra_resp` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perguntas_exercicios`
--

INSERT INTO `perguntas_exercicios` (`id_perg`, `Sub_Materia_id_sub`, `conteudo_perg`, `alternativa_letra_resp`) VALUES
(1, 1, 'Escreva o número -0,000000000000384 em notação científica.', 'a'),
(2, 1, 'Escreva o número 256800000000 em notação científica.', 'b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas_forum`
--

CREATE TABLE IF NOT EXISTS `perguntas_forum` (
  `id_per` int(10) unsigned NOT NULL,
  `usuarios_id_usu` int(10) unsigned NOT NULL,
  `conteudo_per` varchar(255) DEFAULT NULL,
  `data_per` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontuacao`
--

CREATE TABLE IF NOT EXISTS `pontuacao` (
  `id_pon` int(10) unsigned NOT NULL,
  `Sub_Materia_id_sub` int(10) unsigned NOT NULL,
  `usuarios_id_usu` int(10) unsigned NOT NULL,
  `pontos_pon` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas_exercicios`
--

CREATE TABLE IF NOT EXISTS `respostas_exercicios` (
  `id_resp` int(10) unsigned NOT NULL,
  `Perguntas_Exercicios_id_perg` int(10) unsigned NOT NULL,
  `alternativa_resp` varchar(45) DEFAULT NULL,
  `letra_resp` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `respostas_exercicios`
--

INSERT INTO `respostas_exercicios` (`id_resp`, `Perguntas_Exercicios_id_perg`, `alternativa_resp`, `letra_resp`) VALUES
(1, 1, '-3,84 * 10(-13)', 'a'),
(2, 1, '-3,84 * 10(-2)', 'b'),
(3, 1, '-3,84 * 10(-9)', 'c'),
(4, 1, '-38,4 * 10(-10)', 'd'),
(5, 1, '-38,4 * 10(-7)', 'e'),
(6, 2, '2,568 * 10(10)', 'a'),
(7, 2, '2,568 * 10(11)', 'b'),
(8, 2, '25,68 * 10(11)', 'c'),
(9, 2, '2,568 * 10(7)', 'd'),
(10, 2, '2,568 * 10(13)', 'e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas_forum`
--

CREATE TABLE IF NOT EXISTS `respostas_forum` (
  `id_res` int(10) unsigned NOT NULL,
  `Perguntas_Forum_id_per` int(10) unsigned NOT NULL,
  `id_usu_fk` int(10) unsigned DEFAULT NULL,
  `data_res` date DEFAULT NULL,
  `conteudo_res` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_materia`
--

CREATE TABLE IF NOT EXISTS `sub_materia` (
  `id_sub` int(10) unsigned NOT NULL,
  `Materias_id_mat` int(10) unsigned NOT NULL,
  `conteudo_sub` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sub_materia`
--

INSERT INTO `sub_materia` (`id_sub`, `Materias_id_mat`, `conteudo_sub`) VALUES
(1, 1, 'Notação Científica'),
(2, 1, 'Potenciação'),
(3, 1, 'Regra de três simples'),
(4, 1, 'Teorema de Pitágoras'),
(5, 1, 'Transformação de unidades'),
(6, 2, 'Movimento Uniforme'),
(7, 2, 'Movimento uniformemente variado'),
(8, 2, 'Movimento Circular'),
(9, 4, 'Leis de Newton'),
(10, 4, 'Aplicações');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int(10) unsigned NOT NULL,
  `nome_usu` varchar(255) DEFAULT NULL,
  `senha_usu` varchar(45) DEFAULT NULL,
  `ano_usu` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nome_usu`, `senha_usu`, `ano_usu`) VALUES
(1, 'felipinho', '123', 3),
(2, 'xxxx', 'xxx', 1),
(3, 'luiz', '123', 2),
(4, 'cc', 'cc', 2),
(5, 'q', 'q', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conquistas`
--
ALTER TABLE `conquistas`
  ADD PRIMARY KEY (`id_con`), ADD KEY `Conquistas_FKIndex1` (`usuarios_id_usu`), ADD KEY `Conquistas_FKIndex2` (`Monstrinho_id_mon`), ADD KEY `Monstrinho_id_mon` (`Monstrinho_id_mon`), ADD KEY `usuarios_id_usu` (`usuarios_id_usu`);

--
-- Indexes for table `conteudo`
--
ALTER TABLE `conteudo`
  ADD PRIMARY KEY (`id_cont`), ADD KEY `Conteudo_FKIndex1` (`Sub_Materia_id_sub`), ADD KEY `Sub_Materia_id_sub` (`Sub_Materia_id_sub`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_mat`);

--
-- Indexes for table `monstrinho`
--
ALTER TABLE `monstrinho`
  ADD PRIMARY KEY (`id_mon`);

--
-- Indexes for table `perguntas_exercicios`
--
ALTER TABLE `perguntas_exercicios`
  ADD PRIMARY KEY (`id_perg`), ADD KEY `Perguntas_Exercicios_FKIndex1` (`Sub_Materia_id_sub`), ADD KEY `Sub_Materia_id_sub` (`Sub_Materia_id_sub`), ADD KEY `alternativa_id_resp` (`alternativa_letra_resp`), ADD KEY `alternativa_letra_resp` (`alternativa_letra_resp`);

--
-- Indexes for table `perguntas_forum`
--
ALTER TABLE `perguntas_forum`
  ADD PRIMARY KEY (`id_per`), ADD KEY `Perguntas_Forum_FKIndex1` (`usuarios_id_usu`);

--
-- Indexes for table `pontuacao`
--
ALTER TABLE `pontuacao`
  ADD PRIMARY KEY (`id_pon`), ADD KEY `Pontuacao_FKIndex1` (`usuarios_id_usu`), ADD KEY `Pontuacao_FKIndex2` (`Sub_Materia_id_sub`), ADD KEY `usuarios_id_usu` (`usuarios_id_usu`), ADD KEY `Sub_Materia_id_sub` (`Sub_Materia_id_sub`);

--
-- Indexes for table `respostas_exercicios`
--
ALTER TABLE `respostas_exercicios`
  ADD PRIMARY KEY (`id_resp`), ADD KEY `Respostas_Exercicios_FKIndex1` (`Perguntas_Exercicios_id_perg`), ADD KEY `Perguntas_Exercicios_id_perg` (`Perguntas_Exercicios_id_perg`);

--
-- Indexes for table `respostas_forum`
--
ALTER TABLE `respostas_forum`
  ADD PRIMARY KEY (`id_res`), ADD KEY `Respostas_Forum_FKIndex1` (`Perguntas_Forum_id_per`);

--
-- Indexes for table `sub_materia`
--
ALTER TABLE `sub_materia`
  ADD PRIMARY KEY (`id_sub`), ADD KEY `Sub_Materia_FKIndex1` (`Materias_id_mat`), ADD KEY `Materias_id_mat` (`Materias_id_mat`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conquistas`
--
ALTER TABLE `conquistas`
  MODIFY `id_con` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id_cont` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `id_mat` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `monstrinho`
--
ALTER TABLE `monstrinho`
  MODIFY `id_mon` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `perguntas_exercicios`
--
ALTER TABLE `perguntas_exercicios`
  MODIFY `id_perg` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `perguntas_forum`
--
ALTER TABLE `perguntas_forum`
  MODIFY `id_per` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pontuacao`
--
ALTER TABLE `pontuacao`
  MODIFY `id_pon` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respostas_exercicios`
--
ALTER TABLE `respostas_exercicios`
  MODIFY `id_resp` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `respostas_forum`
--
ALTER TABLE `respostas_forum`
  MODIFY `id_res` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_materia`
--
ALTER TABLE `sub_materia`
  MODIFY `id_sub` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
