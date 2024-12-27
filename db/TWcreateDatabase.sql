-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Sat Nov 30 14:09:08 2024 
-- * LUN file: C:\Users\Franco\OneDrive\Desktop\Scuola\Elaborato_WEB_2024\db\ER.lun 
-- * Schema: LogicaFinale/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database twdatabase;
use twdatabase;


-- Tables Section
-- _____________ 

create table CARRELLO (
     codUtente int not null,
     codProdotto int not null,
     quantita int not null,
     constraint SID_CARRELLO_ID unique (codUtente, codProdotto));

create table CATEGORIA (
     codCategoria int not null auto_increment,
     nome varchar(50) not null,
     descrizione varchar(511) not null,
     constraint ID_CATEGORIA_ID primary key (codCategoria));

create table DETTAGLIO_ORDINE (
     codOrdine int not null,
     codProdotto int not null,
     quantita int not null,
     constraint ID_DETTAGLIO_ORDINE_ID primary key (codProdotto, codOrdine));

create table NOTIFICA (
     codNotifica int not null auto_increment,
     messaggio varchar(255) not null,
     tipoNotifica varchar(20) not null,
     letto char not null,
     dataNotifica datetime not null,
     codUtente int not null,
     constraint ID_NOTIFICA_ID primary key (codNotifica));

create table RECENSIONE (
     codUtente int not null,
     codProdotto int not null,
     votoRecensione decimal(2,1) not null,
     commento varchar(511) not null,
     dataRecensione datetime not null,
     constraint ID_RECENSIONE_ID primary key (codUtente, codProdotto));

create table ORDINE (
     codOrdine int not null auto_increment,
     dataOrdine date not null,
     statoOrdine varchar(20) not null,
     totale decimal(11,2) not null,
     pagato char not null,
     codUtente int not null,
     constraint ID_ORDINE_ID primary key (codOrdine));

create table PRODOTTO (
     codProdotto int not null auto_increment,
     nome varchar(30) not null,
     descrizione varchar(255) not null,
     quantitaResidua int not null,
     prezzo decimal(11, 2) not null,
     immagine varchar(50) not null,
     disabilitato char not null default false,
     codCategoria int not null,
     constraint ID_PRODOTTO_ID primary key (codProdotto));

create table UTENTE (
     codUtente int not null auto_increment,
     nomeUtente varchar(20) not null,
     password varchar(255) not null,
     email varchar(30) not null,
     privilegi char not null,
     indirizzo varchar(30) not null,
     disabilitato char not null default false,
     citta varchar(20) not null,
     constraint ID_UTENTE_ID primary key (codUtente),
     constraint ID_UTENTE_EMAIL unique (email));


-- Constraints Section
-- ___________________ 

alter table CARRELLO add constraint FKpossiede
     foreign key (codUtente)
     references UTENTE (codUtente);

alter table CARRELLO add constraint FKcontiene_FK
     foreign key (codProdotto)
     references PRODOTTO (codProdotto);

alter table DETTAGLIO_ORDINE add constraint FKDET_PRO
     foreign key (codProdotto)
     references PRODOTTO (codProdotto);

alter table DETTAGLIO_ORDINE add constraint FKDET_ORD_FK
     foreign key (codOrdine)
     references ORDINE (codOrdine);

alter table NOTIFICA add constraint FKpossiede__FK
     foreign key (codUtente)
     references UTENTE (codUtente);

alter table RECENSIONE add constraint FKriceve_FK
     foreign key (codProdotto)
     references PRODOTTO (codProdotto);

alter table RECENSIONE add constraint FKscrive
     foreign key (codUtente)
     references UTENTE (codUtente);

alter table ORDINE add constraint FKeffetuare_FK
     foreign key (codUtente)
     references UTENTE (codUtente);

alter table PRODOTTO add constraint FKfa_parte_FK
     foreign key (codCategoria)
     references CATEGORIA (codCategoria);


-- Index Section
-- _____________ 

create unique index SID_CARRELLO_IND
     on CARRELLO (codUtente, codProdotto);

create index FKcontiene_IND
     on CARRELLO (codProdotto);

create unique index ID_CATEGORIA_IND
     on CATEGORIA (codCategoria);

create unique index ID_DETTAGLIO_ORDINE_IND
     on DETTAGLIO_ORDINE (codProdotto, codOrdine);

create index FKDET_ORD_IND
     on DETTAGLIO_ORDINE (codOrdine);

create unique index ID_NOTIFICA_IND
     on NOTIFICA (codNotifica);

create index FKpossiede__IND
     on NOTIFICA (codUtente);

create unique index ID_RECENSIONE_IND
     on RECENSIONE (codUtente, codProdotto);

create index FKriceve_IND
     on RECENSIONE (codProdotto);

create unique index ID_ORDINE_IND
     on ORDINE (codOrdine);

create index FKeffetuare_IND
     on ORDINE (codUtente);

create unique index ID_PRODOTTO_IND
     on PRODOTTO (codProdotto);

create index FKfa_parte_IND
     on PRODOTTO (codCategoria);

create unique index ID_UTENTE_IND
     on UTENTE (codUtente);

create unique index ID_UTENTE_EM
     on UTENTE (email);
