-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jun-2015 às 21:31
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`email_admin`, `password`) VALUES
('luis.pereira@essl.pt', 'asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `num_processo` int(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `cod_curso` varchar(10) NOT NULL,
  `nome_aluno` varchar(40) NOT NULL,
  `ano` int(5) NOT NULL,
  `turma` varchar(2) NOT NULL,
  `morada_aluno` varchar(40) NOT NULL,
  `codigo_postal_aluno` varchar(10) NOT NULL,
  `bi_cc` varchar(15) NOT NULL,
  `arquivo` int(1) NOT NULL,
  `validade` varchar(10) NOT NULL,
  `contato_aluno` int(9) NOT NULL,
  `email_aluno` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`num_processo`, `cod_anoLetivo`, `cod_curso`, `nome_aluno`, `ano`, `turma`, `morada_aluno`, `codigo_postal_aluno`, `bi_cc`, `arquivo`, `validade`, `contato_aluno`, `email_aluno`, `password`) VALUES
(1, 1, 'TGPSI', 'eduardo', 11, 'c', 'asd', 'asd', 'asd', 1, 'asd', 123456789, 'edu@edu.pt', 'asd'),
(1, 2, 'TGPSI', 'edu', 12, 'c', 'asd', 'asd', 'asd', 1, 'asd', 1, 'edu@edu.pt', 'asd'),
(2, 1, 'TA', 'hugo lemos', 12, 'c', 'rua do hugo', '1234-425', '1234568', 1, '2016/2017', 123546789, 'hugo@hugo.pt', 'asd'),
(3, 1, 'TA', 'bruno silva', 12, 'g', 'rua do bruno', '1234-112', '453243', 1, '1', 91568746, 'bruno@bruno.pt', 'asd'),
(4, 1, 'TGPSI', 'david granja', 11, 'c', 'rua do david', '4561-456', '123465', 1, '1', 1234567, 'david@david.pt', 'asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_monitor`
--

CREATE TABLE IF NOT EXISTS `aluno_monitor` (
  `num_processo` int(10) NOT NULL,
  `cod_monitor` int(5) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_monitor`
--

INSERT INTO `aluno_monitor` (`num_processo`, `cod_monitor`, `cod_anoLetivo`) VALUES
(1, 2, 2),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_professor`
--

CREATE TABLE IF NOT EXISTS `aluno_professor` (
  `num_processo` int(10) NOT NULL,
  `cod_prof` int(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_professor`
--

INSERT INTO `aluno_professor` (`num_processo`, `cod_prof`, `cod_anoLetivo`) VALUES
(1, 1, 1),
(1, 1, 2),
(2, 1, 1),
(3, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ano_letivo`
--

CREATE TABLE IF NOT EXISTS `ano_letivo` (
  `cod_anoLetivo` int(5) NOT NULL,
  `anoLetivo` varchar(10) NOT NULL,
  `ano_atual` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ano_letivo`
--

INSERT INTO `ano_letivo` (`cod_anoLetivo`, `anoLetivo`, `ano_atual`) VALUES
(1, '14/15', 0),
(2, '15/16', 1),
(3, '16/17', 0),
(4, '17/18', 0),
(5, '18/19', 0),
(6, '19/20', 0),
(7, '20/21', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `av_aluno`
--

CREATE TABLE IF NOT EXISTS `av_aluno` (
  `num_processo` int(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `num_objetivo_aluno` int(5) NOT NULL,
  `nota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `av_aluno`
--

INSERT INTO `av_aluno` (`num_processo`, `cod_anoLetivo`, `num_objetivo_aluno`, `nota`) VALUES
(1, 1, 1, 1),
(1, 1, 2, 1),
(1, 1, 3, 1),
(1, 1, 4, 1),
(1, 1, 5, 1),
(1, 1, 6, 1),
(1, 1, 7, 1),
(1, 1, 8, 1),
(1, 1, 9, 1),
(1, 1, 10, 1),
(1, 1, 11, 1),
(1, 1, 12, 1),
(1, 1, 13, 1),
(1, 1, 14, 1),
(1, 2, 1, 2),
(1, 2, 2, 2),
(1, 2, 3, 2),
(1, 2, 4, 2),
(1, 2, 5, 2),
(1, 2, 6, 1),
(1, 2, 7, 2),
(1, 2, 8, 1),
(1, 2, 9, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `av_aluno_total`
--

CREATE TABLE IF NOT EXISTS `av_aluno_total` (
  `num_processo` int(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `bloqueio` int(5) NOT NULL,
  `observacao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `av_aluno_total`
--

INSERT INTO `av_aluno_total` (`num_processo`, `cod_anoLetivo`, `bloqueio`, `observacao`) VALUES
(1, 1, 0, 'sh'),
(1, 2, 0, 'asd\nfg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `av_monitor`
--

CREATE TABLE IF NOT EXISTS `av_monitor` (
  `email_monitor` varchar(50) NOT NULL,
  `num_processo` int(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `num_objetivo_final` int(5) NOT NULL,
  `nota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `av_monitor`
--

INSERT INTO `av_monitor` (`email_monitor`, `num_processo`, `cod_anoLetivo`, `num_objetivo_final`, `nota`) VALUES
('antonio@antonio.pt', 1, 1, 0, 1),
('antonio@antonio.pt', 1, 1, 1, 1),
('antonio@antonio.pt', 1, 1, 2, 1),
('antonio@antonio.pt', 1, 1, 3, 1),
('antonio@antonio.pt', 1, 1, 4, 1),
('antonio@antonio.pt', 1, 1, 5, 1),
('antonio@antonio.pt', 1, 1, 6, 1),
('antonio@antonio.pt', 1, 1, 7, 1),
('antonio@antonio.pt', 1, 1, 9, 1),
('joao@joao.pt', 1, 2, 1, 2),
('joao@joao.pt', 1, 2, 2, 1),
('joao@joao.pt', 1, 2, 3, 2),
('joao@joao.pt', 1, 2, 4, 2),
('joao@joao.pt', 1, 2, 5, 2),
('joao@joao.pt', 1, 2, 6, 2),
('joao@joao.pt', 1, 2, 7, 1),
('joao@joao.pt', 1, 2, 8, 1),
('joao@joao.pt', 1, 2, 9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `av_monitor_total`
--

CREATE TABLE IF NOT EXISTS `av_monitor_total` (
  `email_monitor` varchar(50) NOT NULL,
  `num_processo` int(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `bloqueio` int(5) NOT NULL,
  `observacao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `av_monitor_total`
--

INSERT INTO `av_monitor_total` (`email_monitor`, `num_processo`, `cod_anoLetivo`, `bloqueio`, `observacao`) VALUES
('antonio@antonio.pt', 1, 1, 0, ''),
('joao@joao.pt', 1, 1, 0, 'fcasd'),
('joao@joao.pt', 1, 2, 0, 'a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `av_prof`
--

CREATE TABLE IF NOT EXISTS `av_prof` (
  `email_prof` varchar(50) NOT NULL,
  `num_processo` int(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `num_objetivo_final` int(5) NOT NULL,
  `nota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `av_prof`
--

INSERT INTO `av_prof` (`email_prof`, `num_processo`, `cod_anoLetivo`, `num_objetivo_final`, `nota`) VALUES
('elisabete.inocentes@essl.pt', 1, 1, 0, 1),
('elisabete.inocentes@essl.pt', 1, 1, 1, 1),
('elisabete.inocentes@essl.pt', 1, 1, 2, 1),
('elisabete.inocentes@essl.pt', 1, 1, 3, 2),
('elisabete.inocentes@essl.pt', 1, 1, 4, 1),
('elisabete.inocentes@essl.pt', 1, 1, 5, 1),
('elisabete.inocentes@essl.pt', 1, 1, 6, 1),
('elisabete.inocentes@essl.pt', 1, 1, 7, 1),
('elisabete.inocentes@essl.pt', 1, 1, 9, 1),
('elisabete.inocentes@essl.pt', 1, 2, 1, 3),
('elisabete.inocentes@essl.pt', 1, 2, 2, 3),
('elisabete.inocentes@essl.pt', 1, 2, 3, 3),
('elisabete.inocentes@essl.pt', 1, 2, 4, 3),
('elisabete.inocentes@essl.pt', 1, 2, 5, 3),
('elisabete.inocentes@essl.pt', 1, 2, 6, 3),
('elisabete.inocentes@essl.pt', 1, 2, 7, 3),
('elisabete.inocentes@essl.pt', 1, 2, 8, 3),
('elisabete.inocentes@essl.pt', 1, 2, 9, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `av_prof_total`
--

CREATE TABLE IF NOT EXISTS `av_prof_total` (
  `email_prof` varchar(50) NOT NULL,
  `num_processo` int(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `bloqueio` int(11) NOT NULL,
  `observacao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `av_prof_total`
--

INSERT INTO `av_prof_total` (`email_prof`, `num_processo`, `cod_anoLetivo`, `bloqueio`, `observacao`) VALUES
('elisabete.inocentes@essl.pt', 1, 1, 0, 'asd'),
('elisabete.inocentes@essl.pt', 1, 2, 0, 'f'),
('elisabete.inocentes@essl.pt', 2, 1, 0, 'vcxd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `cod_curso` varchar(10) NOT NULL,
  `curso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`cod_curso`, `curso`) VALUES
('TA', ' Técnico de Audiovisuais '),
('TC', 'Técnico de Comércio'),
('TCMRPP', 'Técnico de Comunicação, Marketing, Relações Públicas e Publicidade'),
('TEAC', 'Técnico de Electrónica, Automação e Comando'),
('TGEI', 'Técnico de Gestão de Equipamentos Informáticos'),
('TGPSI', 'Técnico de Gestão e Programação de Sistemas Informáticos'),
('TM', 'Técnico de Mecatrónica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretor_curso`
--

CREATE TABLE IF NOT EXISTS `diretor_curso` (
  `email_prof` varchar(50) NOT NULL,
  `cod_curso` varchar(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `turma` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `diretor_curso`
--

INSERT INTO `diretor_curso` (`email_prof`, `cod_curso`, `cod_anoLetivo`, `turma`) VALUES
('elisabete.inocentes@essl.pt', 'TGPSI', 2, '12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidade_estagio`
--

CREATE TABLE IF NOT EXISTS `entidade_estagio` (
  `NIF` int(9) NOT NULL,
  `denominacao` varchar(30) NOT NULL,
  `morada_estagio` varchar(40) NOT NULL,
  `codigo_postal_estagio` varchar(10) NOT NULL,
  `contato_estagio` int(10) NOT NULL,
  `email_estagio` varchar(50) NOT NULL,
  `natureza_juridica` varchar(40) NOT NULL,
  `tipo_entidade` varchar(40) NOT NULL,
  `atividade_principal` varchar(40) NOT NULL,
  `cae` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entidade_estagio`
--

INSERT INTO `entidade_estagio` (`NIF`, `denominacao`, `morada_estagio`, `codigo_postal_estagio`, `contato_estagio`, `email_estagio`, `natureza_juridica`, `tipo_entidade`, `atividade_principal`, `cae`) VALUES
(1, 'estagio1', 'rua do estagio1', '1234-432', 123456789, 'estagio1@estagio1.pt', '1', '1', 'pc', 1),
(2, 'estagio2', 'rua do estagio2', '1234-423', 123456789, 'estagio2@estagio2.pt', '1', '1', 'programacao', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidade_estagio_aluno`
--

CREATE TABLE IF NOT EXISTS `entidade_estagio_aluno` (
  `num_processo` int(10) NOT NULL,
  `NIF` int(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entidade_estagio_aluno`
--

INSERT INTO `entidade_estagio_aluno` (`num_processo`, `NIF`, `cod_anoLetivo`) VALUES
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitor`
--

CREATE TABLE IF NOT EXISTS `monitor` (
  `cod_monitor` int(5) NOT NULL,
  `NIF` int(9) NOT NULL,
  `nome_monitor` varchar(40) NOT NULL,
  `contato_monitor` int(10) NOT NULL,
  `email_monitor` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `monitor`
--

INSERT INTO `monitor` (`cod_monitor`, `NIF`, `nome_monitor`, `contato_monitor`, `email_monitor`, `password`, `cargo`) VALUES
(1, 1, 'antonio', 123456789, 'antonio@antonio.pt', 'asd', 0),
(2, 2, 'joão', 123456789, 'joao@joao.pt', 'asd', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `objetivo_aluno`
--

CREATE TABLE IF NOT EXISTS `objetivo_aluno` (
  `cod_curso` varchar(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `num_objetivo_aluno` int(5) NOT NULL,
  `dominio` varchar(250) NOT NULL,
  `objetivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `objetivo_aluno`
--

INSERT INTO `objetivo_aluno` (`cod_curso`, `cod_anoLetivo`, `num_objetivo_aluno`, `dominio`, `objetivo`) VALUES
('TGPSI', 1, 1, 'Cognitivo', 'Observei todas as normas de seguranÃ§a e higiene no trabalho'),
('TGPSI', 1, 2, 'Cognitivo', 'Cumpri o plano estabelecido'),
('TGPSI', 1, 3, 'Cognitivo', 'Cumpri os tempos estabelecidos '),
('TGPSI', 1, 4, 'Cognitivo', 'Utilizei as tÃ©cnicas mais adequadas Ã s tarefas '),
('TGPSI', 1, 5, 'Cognitivo', 'Utilizei os equipamentos corretamente '),
('TGPSI', 1, 6, 'Cognitivo', 'Coloquei em prÃ¡tica os conhecimentos adquiridos nas aulas'),
('TGPSI', 1, 7, 'Cognitivo', 'Adquiri novos conhecimentos '),
('TGPSI', 1, 8, 'Cognitivo', 'Desenvolvi novas tÃ©cnicas '),
('TGPSI', 1, 9, 'Cognitivo', 'Apresentei novas sugestÃµes e soluÃ§Ãµes '),
('TGPSI', 1, 10, 'Socioafetivo', 'Cumpri os horÃ¡rios '),
('TGPSI', 1, 11, 'Socioafetivo', 'Tomei iniciativa '),
('TGPSI', 1, 12, 'Socioafetivo', 'Mantive boas relaÃ§Ãµes humanas'),
('TGPSI', 1, 13, 'Socioafetivo', 'Desenvolvi competÃªncias pessoais e sociais'),
('TGPSI', 1, 14, 'Socioafetivo', 'Desenvolvi competÃªncias tÃ©cnicas e cientÃ­ficas'),
('TGPSI', 2, 1, 'Cognitivo', 'Capacidade de organizaÃ§Ã£o das tarefas a desempenhar'),
('TGPSI', 2, 2, 'Cognitivo', 'DemonstraÃ§Ã£o de conhecimentos tÃ©cnicos'),
('TGPSI', 2, 3, 'Cognitivo', 'Capacidade de Iniciativa'),
('TGPSI', 2, 4, 'Cognitivo', 'Capacidade de aplicaÃ§Ã£o dos conhecimentos'),
('TGPSI', 2, 5, 'Cognitivo', 'Interesse demonstrado em melhorar os conhecimentos e corrigir os defeitos'),
('TGPSI', 2, 6, 'Cognitivo', 'GestÃ£o do tempo para o alcance dos objetivos'),
('TGPSI', 2, 7, 'Socioafetivo', 'Assiduidade'),
('TGPSI', 2, 8, 'Socioafetivo', 'Pontualidade'),
('TGPSI', 2, 9, 'Socioafetivo', 'RelaÃ§Ãµes humanas no trabalho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `objetivo_final`
--

CREATE TABLE IF NOT EXISTS `objetivo_final` (
  `cod_curso` varchar(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `num_objetivo_final` int(5) NOT NULL,
  `dominio` varchar(25) NOT NULL,
  `objetivo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `objetivo_final`
--

INSERT INTO `objetivo_final` (`cod_curso`, `cod_anoLetivo`, `num_objetivo_final`, `dominio`, `objetivo`) VALUES
('TA', 1, 1, 'Cognitivo', 'asd'),
('TA', 1, 2, 'Socioafetivo', 'qwe'),
('TGPSI', 1, 0, 'Cognitivo', 'Capacidade de organizaÃ§Ã£o das tarefas a desempenhar'),
('TGPSI', 1, 1, 'Cognitivo', 'DemonstraÃ§Ã£o de conhecimentos tÃ©cnicos'),
('TGPSI', 1, 2, 'Cognitivo', 'Capacidade de Iniciativa'),
('TGPSI', 1, 3, 'Cognitivo', 'Capacidade de aplicaÃ§Ã£o dos conhecimentos'),
('TGPSI', 1, 4, 'Cognitivo', 'Interesse demonstrado em melhorar os conhecimentos e corrigir os defeitos'),
('TGPSI', 1, 5, 'Cognitivo', 'GestÃ£o do tempo para o alcance dos objetivos'),
('TGPSI', 1, 6, 'Socioafetivo', 'Assiduidade'),
('TGPSI', 1, 7, 'Socioafetivo', 'Pontualidade'),
('TGPSI', 1, 9, 'Socioafetivo', 'RelaÃ§Ãµes humanas no trabalho'),
('TGPSI', 2, 1, 'Cognitivo', 'Capacidade de organizaÃ§Ã£o das tarefas a desempenhar'),
('TGPSI', 2, 2, 'Cognitivo', 'DemonstraÃ§Ã£o de conhecimentos tÃ©cnicos.'),
('TGPSI', 2, 3, 'Cognitivo', 'Capacidade de Iniciativa'),
('TGPSI', 2, 4, 'Cognitivo', 'Capacidade de aplicaÃ§Ã£o dos conhecimentos'),
('TGPSI', 2, 5, 'Cognitivo', 'Interesse demonstrado em melhorar os conhecimentos e corrigir os defeitos'),
('TGPSI', 2, 6, 'Cognitivo', 'GestÃ£o do tempo para o alcance dos objectivos'),
('TGPSI', 2, 7, 'Socioafetivo', 'Assiduidade'),
('TGPSI', 2, 8, 'Socioafetivo', 'Pontualidade'),
('TGPSI', 2, 9, 'Socioafetivo', 'RelaÃ§Ãµes humanas no trabalho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano_estagio`
--

CREATE TABLE IF NOT EXISTS `plano_estagio` (
  `cod_plano` int(5) NOT NULL,
  `num_processo` int(10) NOT NULL,
  `duracao_estagio` int(5) NOT NULL,
  `dias_semana` varchar(25) NOT NULL,
  `periodo_estagio1` varchar(11) NOT NULL,
  `periodo_estagio2` varchar(11) NOT NULL,
  `horario_diario11` varchar(6) NOT NULL,
  `horario_diario12` varchar(6) NOT NULL,
  `horario_diario21` varchar(6) NOT NULL,
  `horario_diario22` varchar(6) NOT NULL,
  `num_visitas` int(2) NOT NULL DEFAULT '6',
  `num_visitas_escola` int(3) NOT NULL,
  `num_visitas_estagio` int(3) NOT NULL,
  `objetivos` varchar(500) NOT NULL,
  `conteudos` varchar(500) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `bloqueio` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `plano_estagio`
--

INSERT INTO `plano_estagio` (`cod_plano`, `num_processo`, `duracao_estagio`, `dias_semana`, `periodo_estagio1`, `periodo_estagio2`, `horario_diario11`, `horario_diario12`, `horario_diario21`, `horario_diario22`, `num_visitas`, `num_visitas_escola`, `num_visitas_estagio`, `objetivos`, `conteudos`, `cod_anoLetivo`, `bloqueio`) VALUES
(4, 3, 232, '2', '0004-03-31', '0024-03-31', '03:24', '03:24', '03:42', '03:42', 32, 4324, 3, '24234', '432', 1, 0),
(5, 1, 1, '1', '0001-01-01', '0001-01-11', '01:01', '11:01', '01:01', '01:11', 1, 1, 11, 'plokookg oixfj o bjxfoih jgoifdsj goipsjdfgoip jofdsjg\nsdsdfg sfd gfds gfds fds gsfdg fdsgdfgfd\n1g sfdg fdsg dfg sfdg dsfg jfyjm ghj mgh jfgj ytjytj gh123', '1', 1, 0),
(6, 1, 420, 'uteis', '2015-03-27', '2015-06-25', '09:00', '12:00', '13:00', '18:00', 6, 0, 6, 'Objetivos EspecÃ­ficos\n', 'Conteudos a abordar\n', 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `cod_prof` int(10) NOT NULL,
  `nome_prof` varchar(50) NOT NULL,
  `contato_prof` int(10) NOT NULL,
  `email_prof` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`cod_prof`, `nome_prof`, `contato_prof`, `email_prof`, `password`) VALUES
(1, 'elisabete inocentes', 123456789, 'elisabete.inocentes@essl.pt', 'asd'),
(2, 'luis pereira', 123456789, 'luis.pereira@essl.pt', 'asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reg_presenca`
--

CREATE TABLE IF NOT EXISTS `reg_presenca` (
  `cod_presenca` int(5) NOT NULL,
  `num_processo` int(10) NOT NULL,
  `data` date NOT NULL,
  `num_hora` int(5) NOT NULL,
  `ass_aluno` varchar(50) NOT NULL,
  `ass_monitor` varchar(50) NOT NULL,
  `observacao` varchar(100) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reg_presenca`
--

INSERT INTO `reg_presenca` (`cod_presenca`, `num_processo`, `data`, `num_hora`, `ass_aluno`, `ass_monitor`, `observacao`, `cod_anoLetivo`) VALUES
(28, 3, '2015-02-25', 5, 'bruno silva', '', 'fdsfdsf', 1),
(93, 1, '2015-03-11', 6, 'eduardo', '', 'gk', 1),
(94, 1, '2015-04-16', 2, 'eduardo', '', 'dfg', 1),
(95, 1, '2015-05-24', 4, 'eduardo', '0', '', 2),
(96, 1, '2015-03-15', 1, '', '', '', 1),
(97, 1, '2015-06-26', 4, 'eduardo', '', '', 1),
(98, 1, '2015-06-28', 2, 'eduardo', '', '', 2),
(99, 1, '2015-07-10', 1, 'eduardo', '', '', 2),
(100, 1, '2015-08-01', 1, 'eduardo', '', '', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio_semanal`
--

CREATE TABLE IF NOT EXISTS `relatorio_semanal` (
  `num_semana` int(5) NOT NULL,
  `num_processo` int(10) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `data_semana1` varchar(20) NOT NULL,
  `data_semana2` varchar(20) NOT NULL,
  `hora1` varchar(5) NOT NULL,
  `hora2` varchar(5) NOT NULL,
  `atividade_desenvolvida` varchar(500) NOT NULL,
  `observacao_aluno` varchar(500) NOT NULL,
  `observacao_monitor` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorio_semanal`
--

INSERT INTO `relatorio_semanal` (`num_semana`, `num_processo`, `cod_anoLetivo`, `data_semana1`, `data_semana2`, `hora1`, `hora2`, `atividade_desenvolvida`, `observacao_aluno`, `observacao_monitor`) VALUES
(1, 1, 1, '2015-04-12', '2015-04-12', '06:57', '05:46', 'yug', 'asd', 'gvbn'),
(1, 1, 2, '', '', '', '', 'asd', '', 'ed'),
(2, 1, 1, '2015-05-09', '2015-05-09', '03:32', '03:24', 'dfzdcvg', 'asd', 'we'),
(2, 1, 2, '', '', '', '', 'qwd', 'qwd', ''),
(3, 1, 1, '2015-06-26', '2015-06-26', '12:03', '03:03', 'aas', 'asd', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel_aluno`
--

CREATE TABLE IF NOT EXISTS `responsavel_aluno` (
  `cod_responsavel` int(5) NOT NULL,
  `nome_ee` varchar(40) NOT NULL,
  `grau_pare` varchar(10) NOT NULL,
  `morada_ee` varchar(40) NOT NULL,
  `codigo_postal_ee` varchar(10) NOT NULL,
  `contato_ee` int(10) NOT NULL,
  `email_ee` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `responsavel_aluno`
--

INSERT INTO `responsavel_aluno` (`cod_responsavel`, `nome_ee`, `grau_pare`, `morada_ee`, `codigo_postal_ee`, `contato_ee`, `email_ee`) VALUES
(1, 'ee1', '1', '1', '1', 1, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel_aluno_aluno`
--

CREATE TABLE IF NOT EXISTS `responsavel_aluno_aluno` (
  `num_processo` int(10) NOT NULL,
  `cod_responsavel` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `responsavel_aluno_aluno`
--

INSERT INTO `responsavel_aluno_aluno` (`num_processo`, `cod_responsavel`) VALUES
(1, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `roteiro_atividade`
--

CREATE TABLE IF NOT EXISTS `roteiro_atividade` (
  `cod_atividade` int(5) NOT NULL,
  `cod_anoLetivo` int(5) NOT NULL,
  `num_processo` int(10) NOT NULL,
  `atividade` varchar(150) NOT NULL,
  `observacao` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `roteiro_atividade`
--

INSERT INTO `roteiro_atividade` (`cod_atividade`, `cod_anoLetivo`, `num_processo`, `atividade`, `observacao`) VALUES
(19, 1, 3, 'asdf', 'asdf'),
(24, 1, 1, 'sdfsdf', 'dsffsd'),
(25, 1, 1, 'sdf', 'sdf'),
(26, 2, 1, 'gfvfdgtyj', 'bn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email_admin`);

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`num_processo`,`cod_anoLetivo`,`email_aluno`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `cod_curso` (`cod_curso`), ADD KEY `cod_curso_2` (`cod_curso`), ADD KEY `email` (`email_aluno`);

--
-- Indexes for table `aluno_monitor`
--
ALTER TABLE `aluno_monitor`
  ADD PRIMARY KEY (`num_processo`,`cod_monitor`,`cod_anoLetivo`), ADD KEY `cod_monitor` (`cod_monitor`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`);

--
-- Indexes for table `aluno_professor`
--
ALTER TABLE `aluno_professor`
  ADD PRIMARY KEY (`num_processo`,`cod_prof`,`cod_anoLetivo`), ADD KEY `cod_prof` (`cod_prof`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`);

--
-- Indexes for table `ano_letivo`
--
ALTER TABLE `ano_letivo`
  ADD PRIMARY KEY (`cod_anoLetivo`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`);

--
-- Indexes for table `av_aluno`
--
ALTER TABLE `av_aluno`
  ADD PRIMARY KEY (`num_processo`,`cod_anoLetivo`,`num_objetivo_aluno`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `num_objetivo_aluno` (`num_objetivo_aluno`);

--
-- Indexes for table `av_aluno_total`
--
ALTER TABLE `av_aluno_total`
  ADD PRIMARY KEY (`num_processo`,`cod_anoLetivo`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`);

--
-- Indexes for table `av_monitor`
--
ALTER TABLE `av_monitor`
  ADD PRIMARY KEY (`email_monitor`,`num_processo`,`cod_anoLetivo`,`num_objetivo_final`), ADD KEY `num_processo` (`num_processo`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `num_objetivo_final` (`num_objetivo_final`);

--
-- Indexes for table `av_monitor_total`
--
ALTER TABLE `av_monitor_total`
  ADD PRIMARY KEY (`email_monitor`,`num_processo`,`cod_anoLetivo`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `num_processo` (`num_processo`);

--
-- Indexes for table `av_prof`
--
ALTER TABLE `av_prof`
  ADD PRIMARY KEY (`email_prof`,`num_processo`,`cod_anoLetivo`,`num_objetivo_final`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `num_objetivo_final` (`num_objetivo_final`), ADD KEY `num_processo` (`num_processo`);

--
-- Indexes for table `av_prof_total`
--
ALTER TABLE `av_prof_total`
  ADD PRIMARY KEY (`email_prof`,`num_processo`,`cod_anoLetivo`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `num_processo` (`num_processo`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Indexes for table `diretor_curso`
--
ALTER TABLE `diretor_curso`
  ADD PRIMARY KEY (`email_prof`,`cod_anoLetivo`,`turma`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `cod_curso` (`cod_curso`);

--
-- Indexes for table `entidade_estagio`
--
ALTER TABLE `entidade_estagio`
  ADD PRIMARY KEY (`NIF`);

--
-- Indexes for table `entidade_estagio_aluno`
--
ALTER TABLE `entidade_estagio_aluno`
  ADD PRIMARY KEY (`num_processo`,`NIF`,`cod_anoLetivo`), ADD KEY `NIF` (`NIF`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`cod_monitor`,`email_monitor`), ADD KEY `NIF` (`NIF`), ADD KEY `NIF_2` (`NIF`), ADD KEY `email` (`email_monitor`);

--
-- Indexes for table `objetivo_aluno`
--
ALTER TABLE `objetivo_aluno`
  ADD PRIMARY KEY (`cod_curso`,`cod_anoLetivo`,`num_objetivo_aluno`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `num_objetivo_aluno` (`num_objetivo_aluno`);

--
-- Indexes for table `objetivo_final`
--
ALTER TABLE `objetivo_final`
  ADD PRIMARY KEY (`cod_curso`,`cod_anoLetivo`,`num_objetivo_final`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `num_objetivo_final` (`num_objetivo_final`);

--
-- Indexes for table `plano_estagio`
--
ALTER TABLE `plano_estagio`
  ADD PRIMARY KEY (`cod_plano`,`num_processo`,`cod_anoLetivo`), ADD KEY `num_processo` (`num_processo`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`cod_prof`,`email_prof`), ADD KEY `email` (`email_prof`);

--
-- Indexes for table `reg_presenca`
--
ALTER TABLE `reg_presenca`
  ADD PRIMARY KEY (`cod_presenca`,`num_processo`,`cod_anoLetivo`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `num_processo` (`num_processo`), ADD KEY `num_processo_2` (`num_processo`);

--
-- Indexes for table `relatorio_semanal`
--
ALTER TABLE `relatorio_semanal`
  ADD PRIMARY KEY (`num_semana`,`num_processo`,`cod_anoLetivo`), ADD KEY `num_processo` (`num_processo`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `cod_relatorio` (`num_semana`), ADD KEY `num_processo_2` (`num_processo`);

--
-- Indexes for table `responsavel_aluno`
--
ALTER TABLE `responsavel_aluno`
  ADD PRIMARY KEY (`cod_responsavel`);

--
-- Indexes for table `responsavel_aluno_aluno`
--
ALTER TABLE `responsavel_aluno_aluno`
  ADD PRIMARY KEY (`num_processo`,`cod_responsavel`), ADD KEY `cod_responsavel` (`cod_responsavel`);

--
-- Indexes for table `roteiro_atividade`
--
ALTER TABLE `roteiro_atividade`
  ADD PRIMARY KEY (`cod_atividade`,`cod_anoLetivo`,`num_processo`), ADD KEY `cod_anoLetivo` (`cod_anoLetivo`), ADD KEY `cod_anoLetivo_2` (`cod_anoLetivo`,`num_processo`), ADD KEY `cod_anoLetivo_3` (`cod_anoLetivo`,`num_processo`), ADD KEY `num_processo` (`num_processo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ano_letivo`
--
ALTER TABLE `ano_letivo`
  MODIFY `cod_anoLetivo` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `monitor`
--
ALTER TABLE `monitor`
  MODIFY `cod_monitor` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `plano_estagio`
--
ALTER TABLE `plano_estagio`
  MODIFY `cod_plano` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `cod_prof` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `reg_presenca`
--
ALTER TABLE `reg_presenca`
  MODIFY `cod_presenca` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `roteiro_atividade`
--
ALTER TABLE `roteiro_atividade`
  MODIFY `cod_atividade` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
ADD CONSTRAINT `aluno_ibfk_5` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `aluno_ibfk_6` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `aluno_monitor`
--
ALTER TABLE `aluno_monitor`
ADD CONSTRAINT `aluno_monitor_ibfk_1` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `aluno_monitor_ibfk_3` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `aluno_monitor_ibfk_4` FOREIGN KEY (`cod_monitor`) REFERENCES `monitor` (`cod_monitor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `aluno_professor`
--
ALTER TABLE `aluno_professor`
ADD CONSTRAINT `aluno_professor_ibfk_2` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `aluno_professor_ibfk_3` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `aluno_professor_ibfk_4` FOREIGN KEY (`cod_prof`) REFERENCES `professor` (`cod_prof`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `av_aluno`
--
ALTER TABLE `av_aluno`
ADD CONSTRAINT `av_aluno_ibfk_1` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_aluno_ibfk_2` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_aluno_ibfk_3` FOREIGN KEY (`num_objetivo_aluno`) REFERENCES `objetivo_aluno` (`num_objetivo_aluno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `av_aluno_total`
--
ALTER TABLE `av_aluno_total`
ADD CONSTRAINT `av_aluno_total_ibfk_1` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_aluno_total_ibfk_2` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `av_monitor`
--
ALTER TABLE `av_monitor`
ADD CONSTRAINT `av_monitor_ibfk_2` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_monitor_ibfk_3` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_monitor_ibfk_4` FOREIGN KEY (`num_objetivo_final`) REFERENCES `objetivo_final` (`num_objetivo_final`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_monitor_ibfk_5` FOREIGN KEY (`email_monitor`) REFERENCES `monitor` (`email_monitor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `av_monitor_total`
--
ALTER TABLE `av_monitor_total`
ADD CONSTRAINT `av_monitor_total_ibfk_1` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_monitor_total_ibfk_3` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_monitor_total_ibfk_4` FOREIGN KEY (`email_monitor`) REFERENCES `monitor` (`email_monitor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `av_prof`
--
ALTER TABLE `av_prof`
ADD CONSTRAINT `av_prof_ibfk_1` FOREIGN KEY (`num_objetivo_final`) REFERENCES `objetivo_final` (`num_objetivo_final`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_prof_ibfk_2` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_prof_ibfk_3` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_prof_ibfk_4` FOREIGN KEY (`email_prof`) REFERENCES `professor` (`email_prof`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `av_prof_total`
--
ALTER TABLE `av_prof_total`
ADD CONSTRAINT `av_prof_total_ibfk_1` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_prof_total_ibfk_2` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `av_prof_total_ibfk_3` FOREIGN KEY (`email_prof`) REFERENCES `professor` (`email_prof`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `diretor_curso`
--
ALTER TABLE `diretor_curso`
ADD CONSTRAINT `diretor_curso_ibfk_2` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `diretor_curso_ibfk_3` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `diretor_curso_ibfk_4` FOREIGN KEY (`email_prof`) REFERENCES `professor` (`email_prof`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `entidade_estagio_aluno`
--
ALTER TABLE `entidade_estagio_aluno`
ADD CONSTRAINT `entidade_estagio_aluno_ibfk_1` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `entidade_estagio_aluno_ibfk_2` FOREIGN KEY (`NIF`) REFERENCES `entidade_estagio` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `entidade_estagio_aluno_ibfk_3` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `monitor`
--
ALTER TABLE `monitor`
ADD CONSTRAINT `monitor_ibfk_1` FOREIGN KEY (`NIF`) REFERENCES `entidade_estagio` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `objetivo_aluno`
--
ALTER TABLE `objetivo_aluno`
ADD CONSTRAINT `objetivo_aluno_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `objetivo_aluno_ibfk_2` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `objetivo_final`
--
ALTER TABLE `objetivo_final`
ADD CONSTRAINT `objetivo_final_ibfk_1` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `objetivo_final_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `plano_estagio`
--
ALTER TABLE `plano_estagio`
ADD CONSTRAINT `plano_estagio_ibfk_1` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `plano_estagio_ibfk_2` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `reg_presenca`
--
ALTER TABLE `reg_presenca`
ADD CONSTRAINT `reg_presenca_ibfk_3` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `reg_presenca_ibfk_4` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `relatorio_semanal`
--
ALTER TABLE `relatorio_semanal`
ADD CONSTRAINT `relatorio_semanal_ibfk_1` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `relatorio_semanal_ibfk_2` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `responsavel_aluno_aluno`
--
ALTER TABLE `responsavel_aluno_aluno`
ADD CONSTRAINT `responsavel_aluno_aluno_ibfk_1` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `responsavel_aluno_aluno_ibfk_2` FOREIGN KEY (`cod_responsavel`) REFERENCES `responsavel_aluno` (`cod_responsavel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `roteiro_atividade`
--
ALTER TABLE `roteiro_atividade`
ADD CONSTRAINT `roteiro_atividade_ibfk_2` FOREIGN KEY (`num_processo`) REFERENCES `aluno` (`num_processo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `roteiro_atividade_ibfk_3` FOREIGN KEY (`cod_anoLetivo`) REFERENCES `ano_letivo` (`cod_anoLetivo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
