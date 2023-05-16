drop database if exists test;
create database test;
use test;
drop table if exists pub;
create table users (UserId int primary key NOT NULL auto_increment,typ varchar(255),email varchar(255), mdp varchar(255),NomUser varchar(255),nom varchar(255), prenom varchar (255), specialite varchar(255),bio varchar(255), emplacement varchar (255),numero int(10),Somme_note int default 0,Nombre_com int default 0,note decimal(20,2) AS (Somme_note/Nombre_com));
create table pub (pubID int primary key auto_increment, cont varchar(255),persID int NOT NULL,FOREIGN KEY(persID) REFERENCES users(UserId));
create table commentaire (comid int primary key not NULL auto_increment,comment varchar(255),commentateur int, user int,valeur int); 
insert into users (email,mdp,NomUser) values ("admin@admin.com","admin","admin");
CREATE TABLE preserveradmin (
  permission_id INT PRIMARY KEY,
  FOREIGN KEY (permission_id) REFERENCES users (UserId)
);
INSERT INTO preserveradmin (permission_id) VALUES (1);

/*la clé étrangère ne va pas permettre la suppression de l'admin qui a l'ID de 1*/
insert into pub (cont, persID) values ("Bienvenu sur notre site!",1);
/*update pub set persID=1 where pubID=1;*/
/*create table commentaire (comid int primary key not NULL auto_increment,commentateur int, user int, FOREIGN KEY(commentateur) REFERENCES users(UserId),FOREIGN KEY(user) REFERENCES users(UserId));*/