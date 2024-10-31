create database colecao_mangas;
use colecao_mangas;

create table lista_de_mangas (
id int(15) auto_increment,
titulo varchar(80),
autor varchar(80),
volume varchar(15),
editora varchar(45),
edicao varchar(45),
colecao varchar(50),
primary key (id)
)
CHARACTER SET = latin1;

