-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Tue Nov 22 14:06:42 2022 
-- * LUN file: C:\Users\pa44ulq\Desktop\git\GesProj2-Imprimante-AGM\Alessio\Imprimante.lun 
-- * Schema: db_Imprimante/MCD 
-- ********************************************* 


-- Database Section
-- ________________ 

create database db_Imprimante;
use db_Imprimante;


-- Tables Section
-- _____________ 

create table t_client (
     idClient int not null auto_increment,
     cliNom varchar(50) not null,
     cliPrenom varchar(50) not null,
     cliTel varchar(20) not null,
     cliAdresse char(255) not null,
     constraint IDt_client primary key (idClient));

create table t_consommable (
     idConsommable int not null auto_increment,
     conNom varchar(100) not null,
     conPrix int not null,
     constraint IDt_consommable primary key (idConsommable));

create table t_fabriquant (
     idFabriquant int not null auto_increment,
     fabNom varchar(50) not null,
     fabTel varchar(20) not null,
     fabMail char(255) not null,
     constraint IDt_fabriquant primary key (idFabriquant));

create table t_imprimante (
     idImprimante int not null auto_increment,
     impHauteur int not null,
     impLargeur int not null,
     impProfondeur int not null,
     impPoids int not null,
     impModele varchar(50) not null,
     impNom varchar(50) not null,
     impVitesse int not null,
     impRectoVerso char not null,
     impBacPapier int not null,
     impResolutionImpression varchar(15) not null,
     impResolutionNumerisation varchar(15) not null,
     impDisponibilite char not null,
     impPrix int not null,
     impPrixInitial int not null,
     constraint IDt_imprimante primary key (idImprimante));


-- Constraints Section
-- ___________________ 


-- Index Section
-- _____________ 

