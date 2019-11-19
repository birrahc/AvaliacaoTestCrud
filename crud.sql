create database crud;
use crud;

create table especialidades(
cod int auto_increment,
especialidade varchar (45),
primary key(cod)
);

create table medicos(
id int auto_increment,
nome varchar(45),
nascimento date,
cpf varchar(11) unique key,
crm varchar(10) unique key,
email varchar(35) unique key,
telefone varchar(12),
whatsapp varchar(12),
salario double,
especialidade_medico int,
primary key(id),
foreign key(especialidade_medico) references especialidades(cod)
);