/*table utilisateur*/
CREATE DATABASE the;
use the;
CREATE TABLE user(
    id_user int primary key auto_increment,
    nom varchar (20),
    prenom varchar(20),
    email varchar(40),
    mdp varchar(512),
    type_user varchar(20)
)engine=innodb;

CREATE TABLE variete_the(
   id_variete_the int primary key auto_increment,
   nom_variete varchar(20),
   ocupation real,
   rendement_mensuel real
   )engine=innodb;

CREATE TABLE parcelle(
    id_parcelle int primary key auto_increment,
    surface_en_hectare real,
    id_variete_the int,
    foreign key (id_variete_the) references variete_the(id_variete_the)
)engine=innodb;

CREATE TABLE cueilleur(
    id_ceuilleur int primary key auto_increment,
    nom varchar(20),
    genre varchar(20),
    date_naissance date
)engine=innodb;



CREATE TABLE categorie_depense(
 id_categorie_depense int primary key auto_increment,
 type_categorie_depense varchar(20)
 )engine=innodb;

 CREATE TABLE config_salaire(
id_config_salaire int primary key auto_increment,
salaire_kg real
 )engine=innodb;



CREATE TABLE ceuillette(
    id_ceuillette int primary key auto_increment,
    date_ceuillette date,
    id_ceuilleur int,
    id_parcelle int,
    poid_ceuillette real,
    foreign key (id_ceuilleur) references cueilleur(id_ceuilleur),
    foreign key (id_parcelle) references parcelle(id_parcelle)
)engine=innodb;

CREATE TABLE depense(
  id_depense int primary key auto_increment,
  date_depense date,
  id_categorie_depense int,
  montant real,
  foreign key (id_categorie_depense) references categorie_depense(id_categorie_depense)
  )engine=innodb;

insert into user values(default,"Angelo","Emadaly","angelo@gmail.com",sha1("angelo"),"admin");

insert into user values(default,"Manda","Luc","manda@gmail.com",sha1("manda"),"client");



sudo /opt/lampp/bin/mysql -h 172.20.0.167 -u ETU002658 -p