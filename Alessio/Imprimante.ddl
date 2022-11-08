-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Tue Nov  8 15:09:16 2022 
-- * LUN file: C:\Users\pa44ulq\Desktop\git\GesProj2-Imprimante-AGM\Alessio\Imprimante.lun 
-- * Schema: Imprimande/MLD 
-- ********************************************* 


-- Database Section
-- ________________ 

create database Imprimande;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table t_client (
     idClient -- Sequence attribute not implemented -- not null,
     cliNom char(1) not null,
     cliTel char(1) not null,
     cliAdresse char(1) not null,
     constraint ID_t_client_ID primary key (idClient));

create table t_commander (
     idClient numeric(1) not null,
     idImprimante numeric(1) not null,
     comDate date not null,
     comPrix char(1) not null,
     constraint ID_t_commander_ID primary key (idImprimante, idClient));

create table t_imprimante (
     idImprimante -- Sequence attribute not implemented -- not null,
     impHauteur numeric(1) not null,
     impLargeur numeric(1) not null,
     impModele char(1) not null,
     impVitesse numeric(1) not null,
     impResolution numeric(1) not null,
     impRectoVerso char not null,
     impBacPapier numeric(1) not null,
     impPrix char(1) not null,
     impPrixInitial char(1) not null,
     idFabriquant numeric(1) not null,
     constraint ID_t_imprimante_ID primary key (idImprimante));

create table t_fabriquant (
     idFabriquant -- Sequence attribute not implemented -- not null,
     fabNom char(1) not null,
     fabTel char(1) not null,
     fabAdresse char(1) not null,
     constraint ID_t_fabriquant_ID primary key (idFabriquant));


-- Constraints Section
-- ___________________ 

alter table t_commander add constraint FKt_c_t_i
     foreign key (idImprimante)
     references t_imprimante;

alter table t_commander add constraint FKt_c_t_c_FK
     foreign key (idClient)
     references t_client;

alter table t_imprimante add constraint FKt_creer_FK
     foreign key (idFabriquant)
     references t_fabriquant;


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

