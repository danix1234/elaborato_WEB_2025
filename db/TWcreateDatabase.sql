-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Thu Nov 28 12:11:32 2024 
-- * LUN file: C:\Users\Franco\Downloads\ER.lun 
-- * Schema: LogicaFinale/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database TWDatabase;
use TWDatabase;


-- Tables Section
-- _____________ 

create table if not exists CARRELLO (
     codUtente int not null,
     codProdotto int not null,
     quantita int not null,
     constraint SID_CARRELLO_ID unique (codUtente, codProdotto));

create table if not exists CATEGORIE (
     codCategoria int not null auto_increment,
     nome varchar(20) not null,
     descrizione varchar(500) not null,
     constraint ID_CATEGORIE_ID primary key (codCategoria));

create table if not exists DETTAGLIO_ORDINE (
     codOrdine int not null,
     codProdotto int not null,
     quantita int not null,
     constraint ID_DETTAGLIO_ORDINE_ID primary key (codProdotto, codOrdine));

create table if not exists ORDINE (
     codUtente int not null,
     codOrdine int not null auto_increment,
     dataOrdine date not null,
     statoOrdine varchar(20) not null,
     totale double(8,2) not null,
     pagato char not null,
     constraint ID_ORDINE_ID primary key (codOrdine));

create table if not exists PRODOTTO (
     codProdotto int not null auto_increment,
     nome varchar(50) not null,
     descrizione varchar(200) not null,
     quantitaResidua int not null,
     immagine varchar(100) not null,
     prezzo double(8,2) not null,
     codCategoria int not null,
     constraint ID_PRODOTTO_ID primary key (codProdotto));

create table if not exists UTENTE (
     codUtente int not null auto_increment,
     nomeUtente varchar(50) not null,
     password varchar(50) not null,
     email varchar(50) not null,
     privilegi char not null,
     indirizzo varchar(50) not null,
     citta varchar(20) not null,
     constraint ID_UTENTE_ID primary key (codUtente),
     constraint ID_UTENTE_1 unique (email));


-- Constraints Section
-- ___________________ 

alter table CARRELLO add constraint FKpossiede
     foreign key (codUtente)
     references UTENTE (codUtente);

alter table CARRELLO add constraint FKcontiene_FK
     foreign key (codProdotto)
     references PRODOTTO (codProdotto);

-- Not implemented
-- alter table CATEGORIE add constraint ID_CATEGORIE_CHK
--     check(exists(select * from PRODOTTO
--                  where PRODOTTO.codCategoria = codCategoria)); 

alter table DETTAGLIO_ORDINE add constraint FKDET_PRO
     foreign key (codProdotto)
     references PRODOTTO (codProdotto);

alter table DETTAGLIO_ORDINE add constraint FKDET_ORD_FK
     foreign key (codOrdine)
     references ORDINE (codOrdine);

alter table ORDINE add constraint FKeffetuare
     foreign key (codUtente)
     references UTENTE (codUtente);

alter table PRODOTTO add constraint FKfa_parte_FK
     foreign key (codCategoria)
     references CATEGORIE (codCategoria);


-- Index Section
-- _____________ 

create unique index SID_CARRELLO_IND
     on CARRELLO (codUtente, codProdotto);

create index FKcontiene_IND
     on CARRELLO (codProdotto);

create unique index ID_CATEGORIE_IND
     on CATEGORIE (codCategoria);

create unique index ID_DETTAGLIO_ORDINE_IND
     on DETTAGLIO_ORDINE (codProdotto, codOrdine);

create index FKDET_ORD_IND
     on DETTAGLIO_ORDINE (codOrdine);

create unique index ID_ORDINE_IND
     on ORDINE (codOrdine);

create unique index ID_PRODOTTO_IND
     on PRODOTTO (codProdotto);

create index FKfa_parte_IND
     on PRODOTTO (codCategoria);

create unique index ID_UTENTE_IND
     on UTENTE (codUtente);

