create database site_receitas;
use site_receitas;

drop database site_receitas;

create table usuario(
	id_usuario int(11) not null primary key auto_increment,
    nome_usuario varchar(50) not null,
    email_usuario varchar(100) NOT NULL,
	senha_usuario varchar(100) NOT NULL
);

create table categoria(
	idcadastro_categoria int(11) not null primary key auto_increment,
    nome_categoria varchar(50) not null
);

create table receita(
	idcadastro_receita int(11) not null primary key auto_increment,
    nome_receita varchar(50) not null,
    tempo_preparo int(11) not null,
    porcoes int(11) not null,
    idcategoria int(11) not null , 
    ingredientes varchar(250) not null,
    modo_preparo varchar(250) not null,
    idusuario int(11) not null,
    arquivo varchar(100),
    dat datetime,
    quantidadecurtida INT NULL,
    quantidadefavorita INT NULL,
    CONSTRAINT fk_receitacategoria FOREIGN KEY (idcategoria) REFERENCES categoria (idcadastro_categoria),
    CONSTRAINT fk_receitausuario FOREIGN KEY (idusuario) REFERENCES usuario (id_usuario)
);

insert into usuario (id_usuario,nome_usuario,email_usuario,senha_usuario) values ('1','Hemili', 'hemili@gmail.com','123');
insert into usuario (id_usuario,nome_usuario,email_usuario,senha_usuario) values ('2','Mallu', 'mallu@gmail.com','123');

insert into categoria (idcadastro_categoria,nome_categoria) values ('1','Doce');
insert into categoria (idcadastro_categoria,nome_categoria) values ('2','Sobremesa');

select * from receita;
select * from usuario;
select * from categoria;

create table comentarios ( 
idcomentario int not null auto_increment,
idcadastro_usuario int not null ,
idcadastro_receita int not null ,
datacomentario date not null,
comentario varchar(255) not null,
primary key(idcomentario),
foreign key (idcadastro_usuario)
	references usuario(id_usuario)
		on delete no action
        on update no action,
foreign key (idcadastro_receita)
	references receita(idcadastro_receita)
		on delete no action
        on update no action
);
select * from comentarios;

delimiter |
create trigger receitacomentario_trigger
before delete on receita
for each ROW
begin
delete from comentarios where idcadastro_receita = old.idcadastro_receita;
end
|
delimiter ;

CREATE TABLE favoritar (
  idfavoritar int(20) not null primary key auto_increment,
  idcadastro_usuario int not null ,
  idcadastro_receita int not null ,
  foreign key (idcadastro_usuario)
	references usuario(id_usuario)
		on delete no action
        on update no action,
  foreign key (idcadastro_receita)
	references receita(idcadastro_receita)
		on delete no action
        on update no action
  ); 
  
  select * from favoritar;
    
CREATE TABLE curtidas (
  idcurtida int(20) not null primary key auto_increment,
  idcadastro_usuario int not null ,
  idcadastro_receita int not null ,
  quantidade INT NULL,
  foreign key (idcadastro_usuario)
	references usuario(id_usuario)
		on delete no action
        on update no action,
  foreign key (idcadastro_receita)
	references receita(idcadastro_receita)
		on delete no action
        on update no action
  ); 
  
-- CREATE TABLE bancopesquisa.receita(
-- id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
-- nome VARCHAR(300) NOT NULL,
-- categoria varchar (300), 
-- pessoa varchar (300)
-- );

CREATE TABLE avaliados (
  id int(11) NOT NULL,
  qnt_estrela int(11) NOT NULL,
  created datetime NOT NULL,
  modified datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Trigger para colocar a quantidade de curtidas na tabela Curtida
delimiter |
create trigger quantidade_curtida_trigger
after insert on curtidas
for each ROW
begin
	update site_receitas.receita set quantidadecurtida = quantidadecurtida + 1
		where site_receitas.receita.idcadastro_receita = new.idcadastro_receita;
end
|
delimiter ;

-- Trigger para colocar a quantidade de favoritos Favoritar
delimiter |
create trigger quantidade_favorita_trigger
after insert on favoritar
for each ROW
begin
	update site_receitas.receita set quantidadefavorita = quantidadefavorita + 1
		where site_receitas.receita.idcadastro_receita = new.idcadastro_receita;
end
|
delimiter ;
