
CREATE TABLE `controle` (
  `id` int(11) NOT NULL,
  `data_acesso` varchar(15) DEFAULT NULL,
  `hora_acesso` varchar(15) DEFAULT NULL,
  `id_usuario` varchar(50) DEFAULT NULL,
  `recurso_cadastrado` int(11) DEFAULT NULL,
  `semana` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `area` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `curso` (`id`, `area`, `nome`) VALUES
(1, 'Humanas', 'Administração'),
(2, 'Humanas', 'Arquitetura e Urbanismo'),
(3, 'Humanas', 'Comunicação Social - Publicidade e Propaganda'),
(4, 'Humanas', 'Pedagogia'),
(5, 'Exatas', 'Engenharia Civil'),
(6, 'Exatas', 'Engenharia de Produção'),
(7, 'Exatas', 'Sistemas de Informação'),
(8, 'Saúde e Biológicas', 'Educação Física - Licenciatura'),
(9, 'Saúde e Biológicas', 'Educação Física - Bacharelado'),
(10, 'Saúde e Biológicas', 'Farmácia'),
(11, 'Saúde e Biológicas', 'Fisioterapia'),
(12, 'Saúde e Biológicas', 'Nutrição'),
(13, 'Tecnólogos', 'Design de Interiores'),
(14, 'Tecnólogos', 'Gestão Financeira'),
(15, 'Tecnólogos', 'Gestão da Produção Industrial');

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `horario` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `horario` (`id`, `horario`) VALUES
(1, '19:10'),
(2, '20:50');

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `item` (`id`, `nome`, `descricao`) VALUES
(1, 'Datashow 1', NULL),
(2, 'Datashow 2', NULL),
(3, 'Datashow 3', NULL),
(4, 'Datashow 4', NULL),
(5, 'Datashow 5', NULL),
(6, 'Datashow 6', NULL),
(7, 'Datashow 7', NULL),
(8, 'Datashow 8', NULL),
(9, 'Datashow 9', NULL),
(10, 'Datashow 10', NULL),
(11, 'Datashow 11', NULL),
(12, 'Retro Projetor 1 - Transparencias', NULL),
(13, 'Retro Projetor 2 - Transparencias', NULL),
(14, 'Retro Projetor 3 - Transparencias', NULL),
(15, 'Retro Projetor 4 - Transparencias', NULL),
(16, 'Televisao 1', NULL),
(17, 'Televisao 2', NULL),
(18, 'Anfiteatro', NULL),
(19, 'Brinquedoteca', NULL),
(20, 'Quadra Poliesportiva', NULL);

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `senha` varchar(15) DEFAULT NULL,
  `dt_alteracao` varchar(10) DEFAULT NULL,
  `validar` tinyint(1) NOT NULL,
  `id_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`id`, `login`, `nome`, `senha`, `dt_alteracao`, `validar`, `id_curso`) VALUES
(1, 'admin', 'Administrador do sistema', 'abc123', NULL, 1, 7),
(2, 'professor', 'Professor Teste', 'abc123', NULL, 1, 5);


CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `datahj` varchar(10) DEFAULT NULL,
  `curso` varchar(75) DEFAULT NULL,
  `horario` varchar(5) DEFAULT NULL,
  `localizacao` varchar(50) DEFAULT NULL,
  `obs` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

