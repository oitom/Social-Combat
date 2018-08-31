-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jul 07, 2015 as 04:49 PM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `socialcombat`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigos`
--

CREATE TABLE IF NOT EXISTS `amigos` (
  `codigo_usuario` int(11) NOT NULL,
  `codigo_amigo` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`codigo_usuario`,`codigo_amigo`),
  KEY `fk_usuarios_has_usuarios_usuarios2_idx` (`codigo_amigo`),
  KEY `fk_usuarios_has_usuarios_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `amigos`
--

INSERT INTO `amigos` (`codigo_usuario`, `codigo_amigo`, `datahora`, `ativo`) VALUES
(1, 3, '2015-04-01 22:53:27', 0),
(1, 4, '2015-04-15 22:53:45', 0),
(1, 5, '2015-04-17 22:54:22', 0),
(1, 6, '2015-04-14 22:54:44', 0),
(1, 8, '2015-04-06 22:53:58', 0),
(2, 6, '2015-04-07 22:55:56', 0),
(2, 7, '2015-04-11 22:56:02', 0),
(2, 8, '2015-04-15 22:56:09', 0),
(3, 1, '2015-04-14 22:56:55', 0),
(3, 4, '2015-04-26 22:57:07', 0),
(3, 5, '2015-04-21 22:57:19', 0),
(4, 1, '2015-04-07 22:57:55', 0),
(4, 3, '2015-04-23 22:57:58', 0),
(4, 6, '2015-04-01 22:58:02', 0),
(4, 7, '2007-07-15 01:55:26', 0),
(5, 1, '2015-04-06 22:59:11', 0),
(5, 3, '2015-04-01 22:59:31', 0),
(5, 6, '2015-04-17 22:59:35', 0),
(6, 1, '2015-04-06 23:00:50', 0),
(6, 2, '2015-04-22 23:00:54', 0),
(6, 4, '2015-04-15 23:00:58', 0),
(6, 7, '2015-04-01 23:01:35', 0),
(6, 8, '2015-04-09 23:01:38', 0),
(7, 2, '2015-04-23 23:02:28', 0),
(7, 4, '2015-04-23 23:02:34', 0),
(7, 6, '2015-04-26 23:02:41', 0),
(7, 8, '2015-04-20 23:03:25', 0),
(8, 1, '2015-04-21 23:03:37', 0),
(8, 2, '2015-04-14 23:03:49', 0),
(8, 4, '2015-04-25 23:04:01', 0),
(8, 6, '2015-04-24 23:04:36', 0),
(8, 7, '2015-04-19 23:04:41', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditoria_adm`
--

CREATE TABLE IF NOT EXISTS `auditoria_adm` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_funcoes_adm` int(11) NOT NULL,
  `codigo_usuarios_adm` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  `conteudo` text,
  PRIMARY KEY (`codigo`),
  KEY `fk_auditoria_adm_funcoes_adm1_idx` (`codigo_funcoes_adm`),
  KEY `fk_auditoria_adm_usuarios_adm1_idx` (`codigo_usuarios_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `auditoria_adm`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_denuncias`
--

CREATE TABLE IF NOT EXISTS `categorias_denuncias` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `categorias_denuncias`
--

INSERT INTO `categorias_denuncias` (`codigo`, `titulo`) VALUES
(1, 'Imagem Impropria'),
(2, 'Linguagem Ofensiva'),
(3, 'Preconceito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_topico` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_grupo` int(11) NOT NULL,
  `texto` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_comentarios_topicos1_idx` (`codigo_topico`),
  KEY `fk_comentarios_participantes1_idx` (`codigo_usuario`,`codigo_grupo`),
  KEY `fk_comentarios_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`codigo`, `codigo_topico`, `codigo_usuario`, `codigo_grupo`, `texto`, `status`) VALUES
(1, 1, 2, 1, 'Sera que vao presentear brasileiros, dei meu sangue no World of Warcraft', 0),
(2, 1, 6, 1, 'Nao parece!!!, e um emprego', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios_foto`
--

CREATE TABLE IF NOT EXISTS `comentarios_foto` (
  `codigo_foto` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `texto` text NOT NULL,
  `datahora` datetime NOT NULL,
  PRIMARY KEY (`codigo_foto`,`codigo_usuario`),
  KEY `fk_usuarios_has_fotos_fotos1_idx` (`codigo_foto`),
  KEY `fk_usuarios_has_fotos_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios_foto`
--

INSERT INTO `comentarios_foto` (`codigo_foto`, `codigo_usuario`, `texto`, `datahora`) VALUES
(1, 7, 'Tira essa foto Marcia !!!!!!', '2015-04-26 01:01:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conquistas`
--

CREATE TABLE IF NOT EXISTS `conquistas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `conquistas`
--

INSERT INTO `conquistas` (`codigo`, `titulo`, `imagem`, `tipo`) VALUES
(1, 'Mestre dos Duelos', 'conquista2.png', 1),
(2, 'Noob', 'conquista4.png', 1),
(3, 'Recrutador', 'conquista3.png', 1),
(4, 'O conquistador', 'conquista5.png', 1),
(5, 'O beta', 'conquista1.png', 1),
(6, 'Level 10', 'trofeu.png', 2),
(7, 'Level 25', 'trofeu.png', 2),
(8, 'Level 100 lvl em uma publicacao', 'trofeu.png', 2),
(9, '100 amigos', 'trofeu.png', 2),
(10, 'O beta', 'trofeu.png', 2),
(11, 'Borda 1', 'borda1.jpg', 3),
(12, 'Borda 2', 'borda2.jpg', 3),
(13, 'Borda 3', 'borda3.jpg', 3),
(14, 'Borda 4', 'borda4.jpg', 3),
(15, 'Borda 5', 'borda5.jpg', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conquistas_usuario`
--

CREATE TABLE IF NOT EXISTS `conquistas_usuario` (
  `codigo_conquista` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  PRIMARY KEY (`codigo_conquista`,`codigo_usuario`),
  KEY `fk_usuarios_has_conquistas1_conquistas1_idx` (`codigo_conquista`),
  KEY `fk_usuarios_has_conquistas1_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conquistas_usuario`
--

INSERT INTO `conquistas_usuario` (`codigo_conquista`, `codigo_usuario`, `datahora`) VALUES
(1, 5, '2015-04-24 01:13:48'),
(2, 8, '2015-04-26 01:14:58'),
(3, 4, '2015-04-23 01:13:15'),
(5, 4, '2015-07-06 00:00:00'),
(6, 6, '2015-04-26 01:14:19'),
(6, 7, '2015-04-26 01:14:34'),
(10, 4, '2015-07-06 00:00:00'),
(11, 4, '2015-07-06 00:00:00'),
(12, 1, '2015-04-23 01:13:01'),
(12, 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncias`
--

CREATE TABLE IF NOT EXISTS `denuncias` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_categorias_denuncias` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  `codigo_denunciante` int(11) NOT NULL,
  `codigo_denunciado` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `veracidade` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_denuncias_usuarios1_idx` (`codigo_denunciante`),
  KEY `fk_denuncias_categorias_denuncias1_idx` (`codigo_categorias_denuncias`),
  KEY `fk_denuncias_usuarios2_idx` (`codigo_denunciado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `denuncias`
--

INSERT INTO `denuncias` (`codigo`, `codigo_categorias_denuncias`, `datahora`, `codigo_denunciante`, `codigo_denunciado`, `descricao`, `veracidade`) VALUES
(1, 1, '2015-06-09 20:27:54', 2, 4, 'Colocou uma imagem pornografica!!!', NULL),
(2, 2, '2015-06-10 20:29:56', 4, 1, 'Ficou me xingando de noobb nos forum do Counter Strike', NULL),
(3, 3, '2015-06-12 20:31:44', 6, 2, 'Me chamou de gordo Varias Vezes.', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `desafios`
--

CREATE TABLE IF NOT EXISTS `desafios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_jogo` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  `codigo_usuario_desafiante` int(11) NOT NULL,
  `codigo_usuario_desafiado` int(11) NOT NULL,
  `vitoria` tinyint(1) NOT NULL,
  `confirmacao` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_desafios_amigos1_idx` (`codigo_usuario_desafiante`,`codigo_usuario_desafiado`),
  KEY `fk_desafios_jogos1_idx` (`codigo_jogo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `desafios`
--

INSERT INTO `desafios` (`codigo`, `codigo_jogo`, `datahora`, `codigo_usuario_desafiante`, `codigo_usuario_desafiado`, `vitoria`, `confirmacao`) VALUES
(1, 2, '2015-04-01 23:10:53', 1, 4, 1, 1),
(2, 2, '2015-04-03 23:11:12', 1, 3, 0, 1),
(3, 8, '2015-04-14 23:12:21', 7, 8, 0, 0),
(4, 6, '2015-04-08 23:12:48', 2, 7, 1, 0),
(5, 7, '2015-04-15 23:13:06', 3, 1, 0, 1),
(6, 8, '2015-04-16 23:13:40', 1, 4, 0, 1),
(7, 5, '2015-04-26 23:14:05', 8, 7, 1, 1),
(8, 8, '2015-04-14 23:14:27', 3, 5, 0, 1),
(9, 2, '2015-04-24 23:14:49', 6, 7, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `datahora` datetime NOT NULL,
  `descricao` text NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `inscricao` varchar(45) DEFAULT NULL,
  `razao_social` varchar(45) DEFAULT NULL,
  `imagem` varchar(45) NOT NULL,
  `site` varchar(45) NOT NULL,
  `facebook` varchar(45) NOT NULL,
  `twitter` varchar(45) NOT NULL,
  `endereco` text NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`codigo`, `nome`, `datahora`, `descricao`, `telefone`, `email`, `cnpj`, `inscricao`, `razao_social`, `imagem`, `site`, `facebook`, `twitter`, `endereco`) VALUES
(1, 'Valve Corporation', '2015-04-28 00:00:00', 'Valve Corporation e uma empresa de desenvolvimento de jogos de video e distribuicao digital norte-americana sediada em Bellevue, Washington, Estados Unidos. Seu escritorio de base europeia abriu em 2012 em Luxemburgo.''', '425-889-9642', 'sdk@valvesoftware.com', NULL, NULL, NULL, 'img/empresas/1.jpg', 'http://www.valvesoftware.com', 'www.facebook.com/Valve', 'twitter.com/valvecorp', '520 Kirkland Way Kirkland, WA 98033 Estados Unidos'),
(2, 'Activision Blizzard', '2015-05-01 11:34:19', 'Activision Blizzard e uma desenvolvedora e distribuidora de games dos Estados Unidos da americana Activision, Fundada em 9 de julho de 2008.', '(415) 881-9100', 'contact@activisionblizzard.com', NULL, NULL, NULL, 'img/empresas/2.jpg', 'http://www.activisionblizzard.com', 'www.facebook.com/Activision-Blizzard', 'twitter.com/Acti_pr', '4 Hamilton Landing Novato, CA 94949 Estados Unidos'),
(3, 'Eletroni Arts', '2015-05-02 11:42:36', 'A Electronic ARTS, tambem conhecida como EA Games, e uma desenvolvedora e distribuidora de jogos eletrônicos', '(650) 628-1500', 'suport@ea.com', NULL, NULL, NULL, 'img/empresas/3.jpg', 'http://www.ea.com/', 'www.facebook.com/Ea', 'twitter.com/ea', '209 Redwood Shores Pkwy Redwood City, CA 94065 Estados Unidos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `feed_amigo`
--

CREATE TABLE IF NOT EXISTS `feed_amigo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_feed` int(11) NOT NULL,
  `codigo_amigo` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_feed_idx` (`codigo_feed`),
  KEY `fk_amigo_idx` (`codigo_amigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Extraindo dados da tabela `feed_amigo`
--

INSERT INTO `feed_amigo` (`codigo`, `codigo_feed`, `codigo_amigo`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 1, 5),
(4, 1, 6),
(5, 1, 8),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 3, 1),
(10, 3, 4),
(11, 3, 5),
(12, 4, 1),
(13, 4, 3),
(14, 4, 6),
(15, 4, 7),
(16, 4, 8),
(17, 5, 1),
(18, 5, 3),
(19, 5, 6),
(20, 6, 1),
(21, 6, 2),
(22, 6, 4),
(23, 6, 7),
(24, 6, 8),
(25, 7, 2),
(26, 7, 4),
(27, 7, 6),
(28, 8, 1),
(29, 8, 2),
(30, 7, 8),
(31, 9, 3),
(32, 9, 4),
(33, 9, 5),
(34, 9, 6),
(35, 9, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `feed_jogos`
--

CREATE TABLE IF NOT EXISTS `feed_jogos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_jogo` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `datahora` datetime NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_feed_jogos_jogos1_idx` (`codigo_jogo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `feed_jogos`
--

INSERT INTO `feed_jogos` (`codigo`, `codigo_jogo`, `tipo`, `datahora`, `texto`) VALUES
(1, 1, '', '2015-06-10 20:07:22', 'Valve anuncia Half Life 3 e o jogo sera feito na nova Source Engine'),
(2, 6, '', '2015-06-11 20:08:35', 'Blizzcom 2015 pode ser o palco para anuncio da nova expansao do World of warcraft'),
(3, 5, '', '2015-06-11 20:10:03', 'Novo patch tem correcoes de alguns bugs visuais e atualizacao de alguns modelos.'),
(4, 2, '', '2015-06-12 20:11:34', 'Price Pool para o campeonato mundial de Counter Strike ja ultrapassa 2 milhoes.'),
(5, 3, '', '2015-06-12 20:12:56', 'Novo mapa da vila Sodipe ja esta disponivel para multiplayer.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `feed_usuario`
--

CREATE TABLE IF NOT EXISTS `feed_usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  `conteudo` text,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_feed_usuario_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `feed_usuario`
--

INSERT INTO `feed_usuario` (`codigo`, `codigo_usuario`, `tipo`, `datahora`, `conteudo`, `descricao`) VALUES
(1, 1, 1, '2015-06-09 20:16:40', 'Perdi no jogo mas ganhei na porrada...', ''),
(2, 2, 1, '2015-06-10 20:18:15', 'Fazendo dinheiro vendendo itens no mercado negro.', ''),
(3, 3, 1, '2015-06-10 20:19:13', 'O tcc nao me deixa jogar mais...', ''),
(4, 4, 1, '2015-06-11 20:20:33', 'Vamos falar para o Domingos jogar Counter Strike...', ''),
(5, 5, 1, '2015-06-12 20:21:31', 'Paciência Spider 3D, ja consigo jogar com 2 Naipes', ''),
(6, 6, 1, '2015-06-12 20:22:27', 'Nao consigo sair deste Bronze maldito', ''),
(7, 7, 1, '2015-06-11 20:23:00', 'Ajudando Natan ficar no Bronze', ''),
(8, 8, 1, '2015-06-12 20:23:28', 'Sai da vida dos jogos, agora sou motoqueiro selvagem!!!', ''),
(9, 1, 2, '2015-07-06 13:26:45', 'img_feed.jpg', 'Tomando uns tiro! HA HA HA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_galeria` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  `legenda` varchar(45) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `capa` tinyint(1) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_fotos_galerias1_idx` (`codigo_galeria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`codigo`, `codigo_galeria`, `datahora`, `legenda`, `imagem`, `capa`) VALUES
(1, 1, '2015-04-26 00:57:23', 'Turma do barulho', '1.jpg', 0),
(2, 1, '2015-04-26 00:58:56', 'Meu Amor', '1.jpg', 1),
(3, 2, '2015-07-06 00:00:00', 'minhas fotos', '3.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes_adm`
--

CREATE TABLE IF NOT EXISTS `funcoes_adm` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `funcoes_adm`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `galerias`
--

CREATE TABLE IF NOT EXISTS `galerias` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `datahora` datetime NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_galerias_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `galerias`
--

INSERT INTO `galerias` (`codigo`, `codigo_usuario`, `titulo`, `datahora`) VALUES
(1, 4, 'FPS Locura', '2015-04-24 00:55:12'),
(2, 1, 'Paciencia', '2015-07-06 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`codigo`, `titulo`, `descricao`) VALUES
(1, 'Acao', 'Sua caracteristica principal e exigir habilidade do jogador com os controles e comandos, Envolvem acoes de curta duracao e atividades de causa-e-efeito.'),
(2, 'Aventura', 'Envolvem acoes bem pensadas, dialogos extensos e o uso de itens apropriados a cada situacao, Podem incluir quebra-cabecas e outras atividades lúdicas e de raciocinio'),
(3, 'Estrategia', 'Estimula o raciocinio tatico e o emprego de estrategias'),
(4, 'RPG', 'Os personagens avancam em niveis atraves da aquisicao de experiência, executando acoes como combater ou resolver problemas'),
(5, 'First-Person Shooter', 'Jogos de tiro com personagem em primeiro plano'),
(6, 'Esporte', 'Jogos de Esporte'),
(7, 'Simulacao', 'Jogos que simulam acoes do mundo real');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_jogo` int(11) NOT NULL,
  `codigo_usuario_adm` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `datahora` datetime NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_grupos_jogos1_idx` (`codigo_jogo`),
  KEY `fk_grupos_usuarios1_idx` (`codigo_usuario_adm`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`codigo`, `codigo_jogo`, `codigo_usuario_adm`, `nome`, `descricao`, `datahora`, `imagem`, `status`) VALUES
(1, 6, 2, 'WORLD OF ADS', 'Warcraft - Analistas', '2015-04-01 23:16:10', '1.jpg', 0),
(2, 2, 8, 'Strike Counter', 'nunca sera', '2015-04-24 23:17:31', '2.jpg', 0),
(3, 3, 4, 'Guerrilheiros', 'Clube da Guerra', '2015-04-25 23:18:39', '3.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_adm`
--

CREATE TABLE IF NOT EXISTS `grupos_adm` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `grupos_adm`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens_jogos`
--

CREATE TABLE IF NOT EXISTS `imagens_jogos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_jogo` int(11) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `capa` tinyint(1) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_imagens_jogos_jogos1_idx` (`codigo_jogo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `imagens_jogos`
--

INSERT INTO `imagens_jogos` (`codigo`, `codigo_jogo`, `imagem`, `capa`) VALUES
(1, 1, 'half_life.png', 1),
(2, 2, 'counter_strike.png', 1),
(3, 3, 'call_of_duty.png', 1),
(4, 4, 'dragon_age.png', 1),
(5, 5, 'assasins_creed.png', 1),
(6, 6, 'word_of_warcraft.png', 1),
(7, 7, 'far_cry.png', 1),
(8, 8, 'fifa13.png', 1),
(9, 9, 'sims.png', 1),
(10, 10, 'sim_city.png', 1),
(11, 1, 'half-life1.png', 0),
(12, 1, 'half-life2.png', 0),
(13, 1, 'half-life3.png', 0),
(14, 1, 'half-life4.png', 0),
(15, 2, 'counter_strike1.png', 0),
(16, 2, 'counter_strike2.png', 0),
(17, 2, 'counter_strike3.png', 0),
(18, 2, 'counter_strike4.png', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE IF NOT EXISTS `jogos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_genero` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `datahora` datetime NOT NULL,
  `data_lancamento` date NOT NULL,
  `pagina_oficial` varchar(45) DEFAULT NULL,
  `jogoscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_jogos_genero1_idx` (`codigo_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`codigo`, `codigo_genero`, `titulo`, `descricao`, `datahora`, `data_lancamento`, `pagina_oficial`, `jogoscol`) VALUES
(1, 4, 'Half Life', 'os jogadores assumem o papel de Dr. Gordon Freeman, um fisico teorico que deve lutar para sair de um centro de pesquisa secreto e subterrâneo cujos experimentos e pesquisas com tecnologia de teletransporte deram desastrosamente errados.', '2015-04-26 20:07:21', '1998-11-08', 'half-life.com', NULL),
(2, 5, 'Counter Strike', 'Jogo de Tiro em primeira pessoa', '2015-04-26 20:08:31', '2012-08-21', 'www.counter-strike.net', NULL),
(3, 5, 'Call od Duty', 'Jogos de Tiro em primeira pessoa que simula a segunada guerra mundial', '2015-04-26 22:30:16', '2003-10-29', 'www.callofduty.com', NULL),
(4, 4, 'Dragon Age', 'Um cataclisma lanca a terra de Thedas num turbilhao. Dragoes escurecem o ceu lancando sombras sobre as terras à beira do caos. Magos abrem guerra total contra os templarios opressores. Nacoes se erguem umas contra as outras. e incumbência sua e de seus aliados restaurar a ordem liderando a Inquisicao e perseguindo os agentes do caos.', '2015-04-26 22:31:52', '2014-11-18', 'www.dragonage.com', NULL),
(5, 2, 'Assassin s Creed', 'O jogo gira principalmente em torno da rivalidade entre duas sociedades antigas secretas: os Assassinos e os Cavaleiros Templarios, e sua relacao indireta para uma especie antiga humanidade pre-namoro, cuja sociedade, juntamente com grande parte da biosfera da Terra, foi destruido por um macico tempestade solar.', '2015-04-26 22:33:17', '2017-11-13', 'assassinscreed.ubi.com/en-gb/home', NULL),
(6, 4, 'World of Warcraft', 'Todos os jogos da serie foram, em conjunto e em todo o mundo de Azeroth, um ajuste de alta fantasia. Inicialmente, o inicio da serie focada nas nacoes humanas que compoem o Reinos do Leste, e o Orc Horde que chegaram em Azeroth atraves de um portal escuro, comecando as grandes guerras.', '2015-04-26 22:34:19', '2004-11-23', 'www.warcraft.com', NULL),
(7, 5, 'Far Cry', 'Far Cry 4 e um jogo de tiro em primeira pessoa foi anunciado em 2014 e sera uma das principais atracoes da Ubisoft na E3', '2015-04-26 22:35:17', '2004-03-23', 'www.far-cry.ubi.com/en-us/home', NULL),
(8, 6, 'Fifa 13', 'As inovacoes vao revolucionar a inteligência artificial, o drible, o controlo de bola e as colisoes criando uma verdadeira batalha pela posse de bola em todo o campo e acrescentando liberdade e criatividade ao ataque.', '2015-04-26 22:36:44', '2012-09-25', 'www.ea.com/fifa-soccer-13', NULL),
(9, 7, 'The Sims', 'The Sims jogo de simulacao social que te permite jogar com a vida como nunca antes tinhas imaginado.', '2015-04-26 22:38:12', '2009-06-02', 'www.thesims.com', NULL),
(10, 7, 'Sim City', 'O derradeiro simulador de cidades esta de volta! Cria a cidade que desejas e faz escolhas que a moldam e dao vida aos Sims que a habitam', '2015-04-26 22:39:55', '1989-02-02', 'www.simcity.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos_usuario`
--

CREATE TABLE IF NOT EXISTS `jogos_usuario` (
  `codigo_usuario` int(11) NOT NULL,
  `codigo_jogo` int(11) NOT NULL,
  PRIMARY KEY (`codigo_usuario`,`codigo_jogo`),
  KEY `fk_usuarios_has_jogos_jogos1_idx` (`codigo_jogo`),
  KEY `fk_usuarios_has_jogos_usuarios_idx` (`codigo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogos_usuario`
--

INSERT INTO `jogos_usuario` (`codigo_usuario`, `codigo_jogo`) VALUES
(7, 1),
(1, 2),
(3, 2),
(4, 2),
(7, 2),
(1, 3),
(3, 3),
(4, 3),
(7, 3),
(2, 4),
(6, 4),
(7, 4),
(1, 5),
(7, 5),
(2, 6),
(6, 6),
(7, 6),
(4, 8),
(5, 8),
(7, 8),
(2, 9),
(7, 9),
(1, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo_empresas`
--

CREATE TABLE IF NOT EXISTS `jogo_empresas` (
  `codigo_jogo` int(11) NOT NULL,
  `codigo_empresa` int(11) NOT NULL,
  PRIMARY KEY (`codigo_jogo`,`codigo_empresa`),
  KEY `fk_jogos_has_empresas_empresas1_idx` (`codigo_empresa`),
  KEY `fk_jogos_has_empresas_jogos1_idx` (`codigo_jogo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogo_empresas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo_plataformas`
--

CREATE TABLE IF NOT EXISTS `jogo_plataformas` (
  `codigo_jogo` int(11) NOT NULL,
  `codigo_plataforma` int(11) NOT NULL,
  PRIMARY KEY (`codigo_jogo`,`codigo_plataforma`),
  KEY `fk_jogos_has_plataforma_plataforma1_idx` (`codigo_plataforma`),
  KEY `fk_jogos_has_plataforma_jogos1_idx` (`codigo_jogo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogo_plataformas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_remetente` int(11) NOT NULL,
  `codigo_destinatario` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  `texto` text NOT NULL,
  `visualizada` tinyint(1) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_mensagens_usuarios1_idx` (`codigo_remetente`),
  KEY `fk_mensagens_usuarios2_idx` (`codigo_destinatario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`codigo`, `codigo_remetente`, `codigo_destinatario`, `datahora`, `texto`, `visualizada`) VALUES
(1, 4, 1, '2015-04-15 00:45:43', 'E ai você vai fugir do desafio', 1),
(2, 1, 4, '2015-04-16 00:46:30', 'Vocês sao muito viciados', 1),
(3, 2, 6, '2015-04-16 00:47:57', 'E ai Natan, vai tomar outra surra', 1),
(4, 6, 2, '2015-04-16 00:48:33', 'heheheheh foi pura sorte', 1),
(5, 2, 6, '2015-04-17 00:49:03', 'Agora e sorte', 1),
(6, 8, 7, '2015-04-22 00:50:08', 'Campeonato de FIFA este domingo', 0),
(7, 8, 1, '2015-04-22 00:50:17', 'Campeonato de FIFA este domingo', 1),
(8, 8, 2, '2015-04-22 00:50:23', 'Campeonato de FIFA este domingo', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE IF NOT EXISTS `participantes` (
  `codigo_usuario` int(11) NOT NULL,
  `codigo_grupo` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_usuario`,`codigo_grupo`),
  KEY `fk_grupos_has_usuarios_usuarios1_idx` (`codigo_usuario`),
  KEY `fk_grupos_has_usuarios_grupos1_idx` (`codigo_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `participantes`
--

INSERT INTO `participantes` (`codigo_usuario`, `codigo_grupo`, `datahora`, `status`) VALUES
(1, 2, '2015-04-08 23:21:58', 0),
(1, 3, '2015-04-08 23:22:04', 0),
(2, 1, '2015-04-15 23:22:47', 0),
(4, 2, '2015-04-21 23:22:53', 0),
(4, 3, '2015-04-06 23:23:23', 0),
(6, 1, '2015-04-15 23:23:27', 0),
(7, 1, '2015-04-22 23:24:08', 0),
(7, 2, '2015-04-07 23:24:13', 0),
(7, 3, '2015-04-17 23:24:16', 0),
(8, 1, '2015-04-23 23:24:47', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes_adm`
--

CREATE TABLE IF NOT EXISTS `permissoes_adm` (
  `codigo_funcoes_adm` int(11) NOT NULL,
  `codigo_grupos_adm` int(11) NOT NULL,
  PRIMARY KEY (`codigo_funcoes_adm`,`codigo_grupos_adm`),
  KEY `fk_funcoes_adm_has_grupos_adm_grupos_adm1_idx` (`codigo_grupos_adm`),
  KEY `fk_funcoes_adm_has_grupos_adm_funcoes_adm1_idx` (`codigo_funcoes_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissoes_adm`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `plataformas`
--

CREATE TABLE IF NOT EXISTS `plataformas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `plataformas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `preferencias`
--

CREATE TABLE IF NOT EXISTS `preferencias` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) NOT NULL,
  `cor_layout` varchar(45) NOT NULL,
  `borda` int(11) NOT NULL,
  `id_xbox_live` varchar(45) DEFAULT NULL,
  `id_psn` varchar(45) DEFAULT NULL,
  `id_steam` varchar(45) DEFAULT NULL,
  `id_battlenet` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_preferencias_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `preferencias`
--

INSERT INTO `preferencias` (`codigo`, `codigo_usuario`, `cor_layout`, `borda`, `id_xbox_live`, `id_psn`, `id_steam`, `id_battlenet`) VALUES
(1, 1, 'Azui', 0, NULL, NULL, NULL, NULL),
(2, 2, 'Naranja', 12, NULL, NULL, NULL, NULL),
(3, 3, 'Cinzano', 0, NULL, NULL, NULL, NULL),
(4, 4, 'Cinzano', 0, NULL, NULL, NULL, NULL),
(5, 5, 'Parece Verde', 0, NULL, NULL, NULL, NULL),
(6, 6, 'Verdin', 0, NULL, NULL, NULL, NULL),
(7, 7, 'Azui', 0, NULL, NULL, NULL, NULL),
(8, 8, 'Cinzano', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `preferencias_generos`
--

CREATE TABLE IF NOT EXISTS `preferencias_generos` (
  `codigo_genero` int(11) NOT NULL,
  `codigo_preferencia` int(11) NOT NULL,
  PRIMARY KEY (`codigo_genero`,`codigo_preferencia`),
  KEY `fk_genero_has_preferencias_preferencias2_idx` (`codigo_preferencia`),
  KEY `fk_genero_has_preferencias_genero2_idx` (`codigo_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `preferencias_generos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `preferencias_plataformas`
--

CREATE TABLE IF NOT EXISTS `preferencias_plataformas` (
  `codigo_plataforma` int(11) NOT NULL,
  `codigo_preferencia` int(11) NOT NULL,
  PRIMARY KEY (`codigo_plataforma`,`codigo_preferencia`),
  KEY `fk_plataformas_has_preferencias1_preferencias1_idx` (`codigo_preferencia`),
  KEY `fk_plataformas_has_preferencias1_plataformas1_idx` (`codigo_plataforma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `preferencias_plataformas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos`
--

CREATE TABLE IF NOT EXISTS `topicos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_grupo` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `datahora` datetime NOT NULL,
  `numero_comentarios` int(11) NOT NULL,
  `datahora_ultimo_comentario` datetime NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_topicos_grupos1_idx` (`codigo_grupo`),
  KEY `fk_topicos_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `topicos`
--

INSERT INTO `topicos` (`codigo`, `codigo_grupo`, `codigo_usuario`, `titulo`, `datahora`, `numero_comentarios`, `datahora_ultimo_comentario`, `status`) VALUES
(1, 1, 2, 'Blizzard ira presentear veteranos de World of Warcraft com estatua de orc', '2015-04-14 00:36:28', 1, '2015-04-26 00:36:38', 0),
(2, 1, 6, 'O RPG online "World of Warcraft", da Blizzard, completa 10 anos', '2015-04-23 00:38:32', 2, '2015-04-25 00:38:41', 0),
(3, 2, 4, 'Alemanha sera palco do maior torneio de "Counter-Strike" do mundo em abril', '2015-04-17 00:39:30', 1, '2015-04-26 00:39:39', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `datahora` datetime NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(35) NOT NULL,
  `level` int(11) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `numero_denuncias_falsas` int(11) NOT NULL,
  `numero_vitorias` int(11) NOT NULL,
  `numero_derrotas` int(11) NOT NULL,
  `reputacao` int(11) NOT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `twitter` varchar(45) DEFAULT NULL,
  `google_plus` varchar(45) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nome`, `nickname`, `datahora`, `email`, `senha`, `level`, `imagem`, `numero_denuncias_falsas`, `numero_vitorias`, `numero_derrotas`, `reputacao`, `facebook`, `twitter`, `google_plus`, `website`, `status`) VALUES
(1, 'Rodolfo', 'rodmlemos', '2015-04-26 19:32:41', 'rodolfo@socialcombat.com', '827ccb0eea8a706c4c34a16891f84e7b', 5, 'rodolfo.png', 0, 1, 1, 10, NULL, NULL, NULL, NULL, 0),
(2, 'Marcia', 'ahmarcia', '2015-04-01 19:35:23', 'marcia@socialcombat.com', '827ccb0eea8a706c4c34a16891f84e7b', 6, 'marcia.png', 0, 2, 1, 9, 'https://www.facebook.com/ahmarcia', '@ahmarcia', 'ahmarcia', NULL, 0),
(3, 'Edson', 'kamikaze', '2015-04-16 19:44:07', 'edson@socialcombat.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'edson.png', 0, 2, 1, 8, NULL, NULL, NULL, NULL, 0),
(4, 'Wellington', 'ton', '2015-04-06 19:45:40', 'wellington@socialcombat.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, 'wellington.png', 0, 2, 1, 3, NULL, NULL, NULL, NULL, 0),
(5, 'Emerson', 'emerson', '2015-04-18 19:47:16', 'emerson@socialcombat.com', '827ccb0eea8a706c4c34a16891f84e7b', 4, 'emerson.png', 0, 1, 1, 4, NULL, NULL, NULL, NULL, 0),
(6, 'Natan Silva Greghi', 'greghi', '2015-03-12 19:49:57', 'natan@socialcombat.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'natan.png', 0, 3, 0, 5, 'www.facebook.com/natan.greghi', '@natan.greghi', 'natan.greghi', NULL, 0),
(7, 'pedro', 'marioto', '2015-04-22 19:52:37', 'pedro@socialcombat.com', '827ccb0eea8a706c4c34a16891f84e7b', 5, 'pedro.png', 0, 8, 2, 6, NULL, NULL, NULL, NULL, 0),
(8, 'Andre', 'andre', '2015-04-07 19:54:31', 'andre@socialcombat.com', '698dc19d489c4e4db73e28a713eab07b', 2, 'andre.png', 0, 2, 2, 7, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_adm`
--

CREATE TABLE IF NOT EXISTS `usuarios_adm` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_grupos_adm` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  `nome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_usuarios_adm_grupos_adm1_idx` (`codigo_grupos_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `usuarios_adm`
--


--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `fk_usuarios_has_usuarios_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_usuarios_usuarios2` FOREIGN KEY (`codigo_amigo`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `auditoria_adm`
--
ALTER TABLE `auditoria_adm`
  ADD CONSTRAINT `fk_auditoria_adm_funcoes_adm1` FOREIGN KEY (`codigo_funcoes_adm`) REFERENCES `funcoes_adm` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_auditoria_adm_usuarios_adm1` FOREIGN KEY (`codigo_usuarios_adm`) REFERENCES `usuarios_adm` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_participantes1` FOREIGN KEY (`codigo_usuario`, `codigo_grupo`) REFERENCES `participantes` (`codigo_usuario`, `codigo_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_topicos1` FOREIGN KEY (`codigo_topico`) REFERENCES `topicos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `comentarios_foto`
--
ALTER TABLE `comentarios_foto`
  ADD CONSTRAINT `fk_usuarios_has_fotos_fotos1` FOREIGN KEY (`codigo_foto`) REFERENCES `fotos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_fotos_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `conquistas_usuario`
--
ALTER TABLE `conquistas_usuario`
  ADD CONSTRAINT `fk_usuarios_has_conquistas1_conquistas1` FOREIGN KEY (`codigo_conquista`) REFERENCES `conquistas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_conquistas1_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `denuncias`
--
ALTER TABLE `denuncias`
  ADD CONSTRAINT `fk_denuncias_categorias_denuncias1` FOREIGN KEY (`codigo_categorias_denuncias`) REFERENCES `categorias_denuncias` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_denuncias_usuarios1` FOREIGN KEY (`codigo_denunciante`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_denuncias_usuarios2` FOREIGN KEY (`codigo_denunciado`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `desafios`
--
ALTER TABLE `desafios`
  ADD CONSTRAINT `fk_desafios_amigos1` FOREIGN KEY (`codigo_usuario_desafiante`, `codigo_usuario_desafiado`) REFERENCES `amigos` (`codigo_usuario`, `codigo_amigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_desafios_jogos1` FOREIGN KEY (`codigo_jogo`) REFERENCES `jogos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `feed_amigo`
--
ALTER TABLE `feed_amigo`
  ADD CONSTRAINT `fk_feed` FOREIGN KEY (`codigo_feed`) REFERENCES `feed_usuario` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_amigo` FOREIGN KEY (`codigo_amigo`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `feed_jogos`
--
ALTER TABLE `feed_jogos`
  ADD CONSTRAINT `fk_feed_jogos_jogos1` FOREIGN KEY (`codigo_jogo`) REFERENCES `jogos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `feed_usuario`
--
ALTER TABLE `feed_usuario`
  ADD CONSTRAINT `fk_feed_usuario_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fk_fotos_galerias1` FOREIGN KEY (`codigo_galeria`) REFERENCES `galerias` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `galerias`
--
ALTER TABLE `galerias`
  ADD CONSTRAINT `fk_galerias_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `fk_grupos_jogos1` FOREIGN KEY (`codigo_jogo`) REFERENCES `jogos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupos_usuarios1` FOREIGN KEY (`codigo_usuario_adm`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `imagens_jogos`
--
ALTER TABLE `imagens_jogos`
  ADD CONSTRAINT `fk_imagens_jogos_jogos1` FOREIGN KEY (`codigo_jogo`) REFERENCES `jogos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `jogos`
--
ALTER TABLE `jogos`
  ADD CONSTRAINT `fk_jogos_genero1` FOREIGN KEY (`codigo_genero`) REFERENCES `genero` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `jogos_usuario`
--
ALTER TABLE `jogos_usuario`
  ADD CONSTRAINT `fk_usuarios_has_jogos_jogos1` FOREIGN KEY (`codigo_jogo`) REFERENCES `jogos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_jogos_usuarios` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `jogo_empresas`
--
ALTER TABLE `jogo_empresas`
  ADD CONSTRAINT `fk_jogos_has_empresas_empresas1` FOREIGN KEY (`codigo_empresa`) REFERENCES `empresas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogos_has_empresas_jogos1` FOREIGN KEY (`codigo_jogo`) REFERENCES `jogos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `jogo_plataformas`
--
ALTER TABLE `jogo_plataformas`
  ADD CONSTRAINT `fk_jogos_has_plataforma_jogos1` FOREIGN KEY (`codigo_jogo`) REFERENCES `jogos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogos_has_plataforma_plataforma1` FOREIGN KEY (`codigo_plataforma`) REFERENCES `plataformas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `fk_mensagens_usuarios1` FOREIGN KEY (`codigo_remetente`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensagens_usuarios2` FOREIGN KEY (`codigo_destinatario`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `fk_grupos_has_usuarios_grupos1` FOREIGN KEY (`codigo_grupo`) REFERENCES `grupos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupos_has_usuarios_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `permissoes_adm`
--
ALTER TABLE `permissoes_adm`
  ADD CONSTRAINT `fk_funcoes_adm_has_grupos_adm_funcoes_adm1` FOREIGN KEY (`codigo_funcoes_adm`) REFERENCES `funcoes_adm` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_funcoes_adm_has_grupos_adm_grupos_adm1` FOREIGN KEY (`codigo_grupos_adm`) REFERENCES `grupos_adm` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `preferencias`
--
ALTER TABLE `preferencias`
  ADD CONSTRAINT `fk_preferencias_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `preferencias_generos`
--
ALTER TABLE `preferencias_generos`
  ADD CONSTRAINT `fk_genero_has_preferencias_genero2` FOREIGN KEY (`codigo_genero`) REFERENCES `genero` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_genero_has_preferencias_preferencias2` FOREIGN KEY (`codigo_preferencia`) REFERENCES `preferencias` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `preferencias_plataformas`
--
ALTER TABLE `preferencias_plataformas`
  ADD CONSTRAINT `fk_plataformas_has_preferencias1_plataformas1` FOREIGN KEY (`codigo_plataforma`) REFERENCES `plataformas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plataformas_has_preferencias1_preferencias1` FOREIGN KEY (`codigo_preferencia`) REFERENCES `preferencias` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `topicos`
--
ALTER TABLE `topicos`
  ADD CONSTRAINT `fk_topicos_grupos1` FOREIGN KEY (`codigo_grupo`) REFERENCES `grupos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_topicos_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `usuarios_adm`
--
ALTER TABLE `usuarios_adm`
  ADD CONSTRAINT `fk_usuarios_adm_grupos_adm1` FOREIGN KEY (`codigo_grupos_adm`) REFERENCES `grupos_adm` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
