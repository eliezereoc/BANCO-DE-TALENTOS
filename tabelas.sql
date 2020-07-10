CREATE DATABASE IF NOT EXISTS rotar160_bd_tel;

USE rotar160_bd_tel;

CREATE TABLE candidatos(
	id integer auto_increment primary key,
	nome VARCHAR(255) NOT NULL,
	cpf varchar(20) NOT NULL,
	data_nascimento VARCHAR(20) NOT NULL,
	possui_filhos VARCHAR(10),
	qtd_filhos int(11),
	estado_civil VARCHAR(20),
	nacionalidade VARCHAR(50),
	possui_deficiencia VARCHAR(10),
	qual_deficiencia VARCHAR(100),
	endereco VARCHAR(255) NOT NULL,
	complemento VARCHAR(255) NOT NULL,	
	estado_1 VARCHAR(100) NOT NULL,
	cidade_1 VARCHAR(100) NOT NULL,
	cep VARCHAR(20) NOT NULL,
	pais_1 VARCHAR(100),
	email VARCHAR(50) NOT NULL,
	telefone VARCHAR(20) NOT NULL,
	celular VARCHAR(20) NOT NULL,
	temWhatsapp VARCHAR(10),
	rede_social_1 VARCHAR(200),
	rede_social_2 VARCHAR(200),
	rede_social_3 VARCHAR(200),
	pretencao_salario VARCHAR(20),
	objetivo VARCHAR(500),
	pais VARCHAR(100),
	estado_2 VARCHAR(100),
	cidade_2 VARCHAR(100),
	raio INT(11),
	viajar VARCHAR(10),
	transferencia VARCHAR(100),
	nivel_1 VARCHAR(100),
	area_1 VARCHAR(100),
	resumo_profissional VARCHAR(2000),
	empresa1 VARCHAR(200),
	segmento1 VARCHAR(200),
	porte1 VARCHAR(200),
	data_inicio1 VARCHAR(50),
	data_termino1 VARCHAR(50),
	ultimo_cargo1 VARCHAR(100),
	descricao1 VARCHAR(2000),
	empresa2 VARCHAR(200),
	segmento2 VARCHAR(200),
	porte2 VARCHAR(200),
	data_inicio2 VARCHAR(50),
	data_termino2 VARCHAR(50),
	ultimo_cargo2 VARCHAR(100),
	descricao2 VARCHAR(2000),
	empresa3 VARCHAR(200),
	segmento3 VARCHAR(200),
	porte3 VARCHAR(200),
	data_inicio3 VARCHAR(50),
	data_termino3 VARCHAR(50),
	ultimo_cargo3 VARCHAR(100),
	descricao3 VARCHAR(2000),
	formacaoAcademica VARCHAR(100),
	instituicao VARCHAR(100),	
	curso VARCHAR(100),
	data_inicio_academico VARCHAR(20),
	data_termino_academico VARCHAR(20),
	outras_formacao1 VARCHAR(100),
	instituicao_outras1 VARCHAR(100),
	data_inicio_curso1 VARCHAR(20),
	data_termino_curso1 VARCHAR(20),
	outras_formacao2 VARCHAR(100),
	instituicao_outras2 VARCHAR(100),
	data_inicio_curso2 VARCHAR(20),
	data_termino_curso2 VARCHAR(20),
	outras_formacao3 VARCHAR(100),
	instituicao_outras3 VARCHAR(100),
	data_inicio_curso3 VARCHAR(20),
	data_termino_curso3 VARCHAR(20),
	nome_file varchar(200) NULL
);


CREATE TABLE IF NOT EXISTS usuarios (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(220) NOT NULL,
  email VARCHAR(520) NOT NULL,
  senha VARCHAR(50) NOT NULL,
  situacoe_id int(11) NOT NULL DEFAULT 0,
  niveis_acesso_id int(11) NOT NULL,
  created VARCHAR(20) NOT NULL,
  modified VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS mastersistema (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(220) NOT NULL,
  email VARCHAR(520) NOT NULL,
  senha VARCHAR(50) NOT NULL,
  situacoe_id int(11) NOT NULL DEFAULT 0,
  niveis_acesso_id int(11) NOT NULL,
  status_sistema int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO mastersistema (id, nome, email, senha, situacoe_id, niveis_acesso_id, status_sistema) VALUES
(1, 'Eliézer de Oliveira', 'eliezeroc@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 255, 185);

CREATE TABLE IF NOT EXISTS niveis_acessos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  created VARCHAR(20) NOT NULL,
  modified VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO niveis_acessos (id, nome, created, modified) VALUES
(1, 'Administrador', '2019-00-00 00:00:00', NULL),
(2, 'Colaborador', '2019-00-00 00:00:00', NULL),
(3, 'Usuário', '2019-00-00 00:00:00', NULL);
(4, 'Rotarianos', '2019-00-00 00:00:00', NULL);