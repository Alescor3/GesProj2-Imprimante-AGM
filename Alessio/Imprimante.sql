-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Tue Nov  8 15:11:28 2022 
-- * LUN file: C:\Users\pa44ulq\Desktop\git\GesProj2-Imprimante-AGM\Alessio\Imprimante.lun 
-- * Schema: Imprimande/MLD 
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
	 cliVille varchar(90) not null,
     constraint ID_t_client_ID primary key (idClient));

create table t_commander (
     idClient int not null,
     idImprimante int not null,
     comDate date not null,
     comPrix intnot null,
     constraint ID_t_commander_ID primary key (idImprimante, idClient));

create table t_imprimante (
     idImprimante int not null auto_increment,
     impHauteur int not null,
     impLargeur int not null,
     impModele varchar(50) not null,
	 impNom varchar(50) not null,
     impVitesse int not null,
     impResolution int not null,
     impRectoVerso char not null,
     impBacPapier int not null,
     impPrix int not null,
     impPrixInitial int not null,
     idFabriquant int not null,
     constraint ID_t_imprimante_ID primary key (idImprimante));

create table t_fabriquant (
     idFabriquant int not null auto_increment,
     fabNom varchar(50) not null,
     fabTel varchar(20) not null,
     fabAdresse char(255) not null,
     constraint ID_t_fabriquant_ID primary key (idFabriquant));


-- Constraints Section
-- ___________________ 

alter table t_commander add constraint FKt_c_t_i
     foreign key (idImprimante)
     references t_imprimante (idImprimante);

alter table t_commander add constraint FKt_c_t_c_FK
     foreign key (idClient)
     references t_client (idClient);

alter table t_imprimante add constraint FKt_creer_FK
     foreign key (idFabriquant)
     references t_fabriquant (idFabriquant);


-- Index Section
-- _____________ 

create unique index ID_t_client_IND
     on t_client (idClient);

create unique index ID_t_commander_IND
     on t_commander (idImprimante, idClient);

create index FKt_c_t_c_IND
     on t_commander (idClient);

create unique index ID_t_imprimante_IND
     on t_imprimante (idImprimante);

create index FKt_creer_IND
     on t_imprimante (idFabriquant);

create unique index ID_t_fabriquant_IND
     on t_fabriquant (idFabriquant);

