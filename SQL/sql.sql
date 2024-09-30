create database bloconotasjk
use bloconotasjk

create table usuario(
id int primary key auto_increment,
nome varchar(50) not null,
email varchar(100) not null,
senha varchar(25) not null
);

create table notas (
id int primary key auto_increment,
data_criaçao datetime not null,
usuario_id int,
titulo varchar(25),
conteudo varchar(5000),
inportante bool,
foreign key (usuario_id) references usuario(id)
);