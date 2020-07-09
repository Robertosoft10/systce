DROP TABLE IF EXISTStb_disciplina_estud;

CREATE TABLE `tb_disciplina_estud` (
  `id_discip_estud` int(11) NOT NULL AUTO_INCREMENT,
  `matric_estud_cod` int(11) DEFAULT NULL,
  `disciplina_cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_discip_estud`),
  KEY `matric_estud_cod` (`matric_estud_cod`),
  KEY `disciplina_cod` (`disciplina_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTStb_disciplina_prof;

CREATE TABLE `tb_disciplina_prof` (
  `id_discip_pf` int(11) NOT NULL AUTO_INCREMENT,
  `prof_id` int(11) DEFAULT NULL,
  `discip_id` int(11) DEFAULT NULL,
  `turno_prof` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_discip_pf`),
  KEY `prof_id` (`prof_id`),
  KEY `discip_id` (`discip_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTStb_disciplinas;

CREATE TABLE `tb_disciplinas` (
  `id_discip` int(11) NOT NULL AUTO_INCREMENT,
  `nome_discip` varchar(255) DEFAULT NULL,
  `hora_discip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_discip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTStb_estudantes;

CREATE TABLE `tb_estudantes` (
  `id_estud` int(11) NOT NULL AUTO_INCREMENT,
  `nome_estud` varchar(255) DEFAULT NULL,
  `fone_estud` varchar(30) DEFAULT NULL,
  `respo_estud` varchar(30) DEFAULT NULL,
  `fone_resp` varchar(30) DEFAULT NULL,
  `endereco_estud` varchar(900) DEFAULT NULL,
  `cidade_estud` varchar(255) DEFAULT NULL,
  `foto_estud` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_estud`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tb_estudantesVALUES("1","roberto","11 99999-9999","Maria","11 8888-8888","rua da programação","Quipapá","8a842d66f7bc8e24d4cdb45f82b175d27579e53f.jpg");


DROP TABLE IF EXISTStb_frequencias;

CREATE TABLE `tb_frequencias` (
  `id_freq` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(11) DEFAULT NULL,
  `dia_freq` varchar(30) DEFAULT NULL,
  `data_freq` varchar(255) DEFAULT NULL,
  `status_freq` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_freq`),
  KEY `matricula` (`matricula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTStb_instituicao;

CREATE TABLE `tb_instituicao` (
  `id_inst` int(11) NOT NULL AUTO_INCREMENT,
  `nome_instituicao` varchar(255) DEFAULT NULL,
  `fone1_instituicao` varchar(30) DEFAULT NULL,
  `fone2_instituicao` varchar(30) DEFAULT NULL,
  `email_instituicao` varchar(255) DEFAULT NULL,
  `endereco_instituicao` varchar(900) DEFAULT NULL,
  `direcao_instituicao` varchar(255) DEFAULT NULL,
  `logo_instituicao` varchar(255) DEFAULT NULL,
  `frase_instituicao` varchar(900) DEFAULT NULL,
  PRIMARY KEY (`id_inst`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTStb_matriculas;

CREATE TABLE `tb_matriculas` (
  `id_matric` int(11) NOT NULL AUTO_INCREMENT,
  `estud_cod` int(11) DEFAULT NULL,
  `prof_cod` int(11) DEFAULT NULL,
  `serie_estud` varchar(255) DEFAULT NULL,
  `turno_estud` varchar(30) DEFAULT NULL,
  `codigo_estud` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_matric`),
  KEY `estud_cod` (`estud_cod`),
  KEY `prof_cod` (`prof_cod`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tb_matriculasVALUES("1","1","","1 Ano","Manha","da4b9237bacccdf19c0760cab7aec4a8359010b0");


DROP TABLE IF EXISTStb_notas_estudante;

CREATE TABLE `tb_notas_estudante` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `prof` int(11) DEFAULT NULL,
  `matricula_nota` int(11) DEFAULT NULL,
  `disciplina_nota` int(11) DEFAULT NULL,
  `bimestre_nota` varchar(30) DEFAULT NULL,
  `nota` varchar(30) DEFAULT NULL,
  `anotacao` varchar(900) DEFAULT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `prof` (`prof`),
  KEY `matricula_nota` (`matricula_nota`),
  KEY `disciplina_nota` (`disciplina_nota`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTStb_professor_estud;

CREATE TABLE `tb_professor_estud` (
  `id_prof_estud` int(11) NOT NULL AUTO_INCREMENT,
  `matric` int(11) DEFAULT NULL,
  `prof` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prof_estud`),
  KEY `matric` (`matric`),
  KEY `prof` (`prof`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTStb_professores;

CREATE TABLE `tb_professores` (
  `id_prof` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prof` varchar(255) DEFAULT NULL,
  `fone_prof` varchar(30) DEFAULT NULL,
  `email_prof` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usertipo` varchar(20) DEFAULT NULL,
  `endereco_prof` varchar(900) DEFAULT NULL,
  `foto_prof` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTStb_series;

CREATE TABLE `tb_series` (
  `id_serie` int(11) NOT NULL AUTO_INCREMENT,
  `nome_serie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_serie`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tb_seriesVALUES("1","1 Ano");


DROP TABLE IF EXISTStb_usuarios;

CREATE TABLE `tb_usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `usernascimento` varchar(30) DEFAULT NULL,
  `useremail` varchar(255) DEFAULT NULL,
  `usertipo` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tb_usuariosVALUES("2","","2020-07-09","admin@hotmail.com.br","1","608e01334f5575f10813efa40ce0102f2dc0a75e","");


