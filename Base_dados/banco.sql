CREATE DATABASE systce;
USE systce;

CREATE TABLE tb_usuarios(
  id_user int not null auto_increment primary key,
  username varchar(255),
  usernascimento varchar(30),
  useremail varchar(255),
  usertipo varchar(30),
  password varchar(255),
  user_foto varchar(255)
);
CREATE TABLE tb_instituicao(
  id_inst int not null auto_increment primary key,
  nome_instituicao varchar(255),
  fone1_instituicao varchar(30),
  fone2_instituicao varchar(30),
  email_instituicao varchar(255),
  endereco_instituicao varchar(900),
  direcao_instituicao varchar(255),
  logo_instituicao varchar(255),
  frase_instituicao varchar(900)
);
CREATE TABLE tb_disciplinas(
	id_discip int not null auto_increment primary key,
    nome_discip varchar (255),
	hora_discip varchar (30)
);

CREATE TABLE  tb_professores(
	id_prof int not null auto_increment primary key,
    nome_prof varchar (255),
	fone_prof varchar (30),
    email_prof varchar (255),
    password varchar(255),
    usertipo varchar(20),
	endereco_prof varchar (900),
    foto_prof varchar (255)
);
CREATE TABLE  tb_disciplina_prof(
	id_discip_pf int not null auto_increment primary key,
    prof_id int,
	discip_id int,
    turno_prof varchar (255),
    foreign key (prof_id) references tb_professores (id_prof),
    foreign key (discip_id) references tb_disciplinas (id_discip)
);
CREATE TABLE  tb_professor_estud(
	id_prof_estud int not null auto_increment primary key,
    matric int,
    prof int,
    foreign key (matric) references tb_matriculas (id_matric),
    foreign key (prof) references tb_professores (id_prof)

);
CREATE TABLE  tb_disciplina_estud(
	id_discip_estud int not null auto_increment primary key,
    matric_estud_cod int,
    disciplina_cod int,
    foreign key (matric_estud_cod) references tb_matriculas (id_matric),
    foreign key (disciplina_cod) references tb_disciplinas (id_discip)
);
CREATE TABLE  tb_estudantes(
	id_estud int not null auto_increment primary key,
    nome_estud varchar (255),
	fone_estud varchar (30),
    respo_estud varchar (30),
    fone_resp varchar (30),
    endereco_estud varchar (900),
    cidade_estud varchar (255),
    foto_estud varchar (255)
);
CREATE TABLE  tb_matriculas(
	id_matric int not null auto_increment primary key,
    estud_cod int,
    prof_cod int,
    serie_estud varchar (255),
	turno_estud varchar (30),
    codigo_estud varchar (255),
    foreign key (estud_cod) references tb_estudantes (id_estud),
    foreign key (prof_cod) references tb_professores (id_prof)
);
CREATE TABLE  tb_frequencias(
	id_freq int not null auto_increment primary key,
    matricula int,
	dia_freq varchar(30),
    data_freq varchar (255),
	status_freq varchar (30),
    foreign key (matricula) references tb_matriculas (id_matric)
);
CREATE TABLE  tb_notas_estudante(
	id_nota int not null auto_increment primary key,
    prof int,
    matricula_nota int,
    disciplina_nota int,
	bimestre_nota varchar (30),
    nota varchar(30),
    anotacao varchar(900),
    foreign key (prof) references tb_professores (id_prof),
    foreign key (matricula_nota) references tb_matriculas (id_matric),
    foreign key (disciplina_nota) references tb_disciplinas (id_discip)
);
CREATE TABLE  tb_series(
	id_serie int not null auto_increment primary key,
    nome_serie varchar (255)
);


