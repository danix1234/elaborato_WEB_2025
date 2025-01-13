-- Insert Admin User
INSERT INTO UTENTE (nomeUtente, password, email, privilegi, indirizzo, disabilitato, citta)
VALUES 
('Admin',      '$2y$10$0qmNsbN2TY0qsujQ53.2uu94QOuGd2SCk5gqaHGB7bL/SzHPWam.S', 'admin@unibo.it',             1, 'Via Giovanni 3',            0, 'Cesena'),    -- pw: admin
('Daniele',    '$2y$10$DaiLPazr8HtU9L4UFCDTYuh5cSFsLmhc7/3bBtg37/8kEfmTXE6ZK', 'daniele@studio.unibo.it',    0, 'Via Roma 12',               0, 'Bologna'),   -- pw: daniele
('Franco',     '$2y$10$aQCNn0Gdy18uEPbsdUlKde4xavxRDqKwASHbqzZhbVPv2ObD9YLKi', 'franco@studio.unibo.it',     0, 'Viale delle rose 99',       0, 'Firenze'),   -- pw: franco
('Giuseppe',   '$2y$10$Sed2fudiWpjyYKjz1KTB4OA8oc8Rl61S6KS/vQjnuCVhmKCV8vtu2', 'giuseppe@studio.unibo.it',   0, 'Via Martini 120',           0, 'Rimini'),    -- pw: giuseppe
('Filippo',    '$2y$10$pLCFL8T0.PZ/6fZZobTxSO0DTl9D95pLFF64DSewdzExaaxW818Jq', 'filippo@studio.unibo.it',    0, 'Via Levaldigi, 420',        0, 'Forli'),     -- pw: filippo               
('Marco',      '$2y$10$NpArsrxKjnPIz/6ey2/71erWiGtHW/GCXyulrPJhBu9jX/GJR757G', 'marco@studio.unibo.it',      0, 'Via Dante Alighieri, 35',   0, 'Bologna'),   -- pw: marco               
('Luca',       '$2y$10$wdUqe.cUiy.G.7rfN0pkS.4apoSkflIep8h/2FZUcew6L9UeKd9F6', 'luca@studio.unibo.it',       0, 'Via Garibaldi, 12',         0, 'Ravenna'),   -- pw: luca               
('Giovanni',   '$2y$10$bZ9JRSXww/TK2UYmuwID3.f5jVsj8N38/2MQscVy1hKicN1Bh8auC', 'giovanni@studio.unibo.it',   0, 'Corso Italia, 80',          0, 'Venezia'),   -- pw: giovanni               
('Antonio',    '$2y$10$lWMgm8GbpSbJ/gbS8TU/CuH7i.odrWxI2NRoG2KH3XHHSdY68XtF.', 'antonio@studio.unibo.it',    0, 'Via Roma, 54',              0, 'Napoli'),    -- pw: antonio               
('Francesco',  '$2y$10$QwsxxQq1Ps3BxTLBKY77wetJdRkdgDbhBxAxutVhWG8DjzKlHhE7i', 'francesco@studio.unibo.it',  0, 'Via Torino, 70',            0, 'Milano'),    -- pw: francesco               
('Stefano',    '$2y$10$I9m2.1IBUubT0L4NIbh.UeRbsi8Gbh.Zxe4xSMlmF3e.0FAl0XGlK', 'stefano@studio.unibo.it',    0, 'Piazza San Giovanni, 10',   0, 'Genova'),    -- pw: stefano               
('Alessandro', '$2y$10$H4eHQ3KXBehC0tq9kICG3eIou5qKGyNY7.gR0a5uCNHiKXn8uspA2', 'alessandro@studio.unibo.it', 0, 'Via delle Magnolie, 45',    0, 'Torino'),    -- pw: alessandro               
('Matteo',     '$2y$10$Cr/gFfwQbSNpJ20gcarIt.teoiHDjE09WcYtFI252K5sTAdZk4fXC', 'matteo@studio.unibo.it',     0, 'Via della Libertà, 13',     0, 'Firenze'),   -- pw: matteo               
('Simone',     '$2y$10$2FEnK.xCiDwqZxfZWzNJb.8YhaQylr7NuQVny/lWDhdA2RxXMQVhq', 'simone@studio.unibo.it',     0, 'Via Guglielmo Marconi, 22', 0, 'Roma'),      -- pw: simone               
('Maria',      '$2y$10$5Wor8RgJmOeffRxx7WCerO29jAc77NTwMRHabIv5ANZoA5DZkMVz2', 'maria@studio.unibo.it',      0, 'Via Giuseppe Mazzini, 28',  0, 'Napoli'),    -- pw: maria               
('Giulia',     '$2y$10$.fpisTxjgBMHG56FxMCOremTGswi1Oc.nhJZWRapb46VXsOc0nKbS', 'giulia@studio.unibo.it',     0, 'Piazza del Duomo, 4',       0, 'Milano'),    -- pw: giulia               
('Sofia',      '$2y$10$Cbh4MfwsohHj0u0GJnrZz.Q6//9N03Vv9xnb6PHkmisfq6ksMURV6', 'sofia@studio.unibo.it',      0, 'Via San Giovanni, 56',      0, 'Torino'),    -- pw: sofia               
('Alessandra', '$2y$10$GG6gE9Fxy50M137pCRIKB.8tsnsPUE0DmfVbxdTBAQml/bqGPJERi', 'alessandra@studio.unibo.it', 0, 'Viale Europa, 18',          0, 'Bologna'),   -- pw: alessandra               
('Martina',    '$2y$10$HAgHaTFdIaqOQNjxxf0B4.huvJy7QfDpH1arBTV7GtW3CWZ97LIkm', 'martina@studio.unibo.it',    0, 'Via Dante, 42',             0, 'Roma'),      -- pw: martina               
('Francesca',  '$2y$10$4tYYQSKmqjzFIfvs/ywGdeqseZUiwU5W1PvBOshVJG29snhGhUxV2', 'francesca@studio.unibo.it',  0, 'Piazza Venezia, 15',        0, 'Venezia'),   -- pw: francesca               
('Sara',       '$2y$10$KLjjplhDaajPmi8/jydhx.L0Rq7K727J0DGfz4fOHEkO36eNE1Cs.', 'sara@studio.unibo.it',       0, 'Corso Trieste, 10',         0, 'Firenze'),   -- pw: sara               
('Elena',      '$2y$10$WduRoRvGSpFpqRy/gG6gVOX5OdR/r7viW4bZTY4HB3WX0OuxQCeKu', 'elena@studio.unibo.it',      0, 'Via Roma, 85',              0, 'Genova'),    -- pw: elena               
('Beatrice',   '$2y$10$TKkhrzV.fNgA4Zg4LKUfD.DT75BH3wlKC6hnkTokI.eNg5I.Hzqt6', 'beatrice@studio.unibo.it',   0, 'Viale dei Colli, 23',       0, 'Palermo'),   -- pw: beatrice               
('Valentina',  '$2y$10$DZL2i3LtEnGmZXS/RpXiXeObIQJP7SF1Q/8KzizpnZMXKpaXXJOeG', 'valentina@studio.unibo.it',  0, 'Via delle Rose, 78',        0, 'Catania');   -- pw: valentina               

-- Insert Categories
INSERT INTO CATEGORIA (nome, descrizione)
VALUES 
('Computer',    "Laptop e computer per l'uso quotidiano"),
('Telefono',    'Dispositivi portatili con varie funzionalità'),
('Auricolari',  'Dispositivi per ascoltare musica e audio di alta qualità'),
('Tablet',      'Dispositivi tablet per produttività e intrattenimento'),
('Smartwatch',  'Orologi intelligenti con touchscreen e funzioni avanzate'),
('Fotocamera',  'Fotocamere digitali e accessori per la fotografia'),
('Videogiochi', 'Console e accessori per il mondo dei videogiochi');

-- Insert Products
INSERT INTO PRODOTTO (nome, descrizione, quantitaResidua, prezzo, immagine, disabilitato, codCategoria)
VALUES 
('Dell XPS 13',             'Laptop ad alte prestazioni con display da 13 pollici', 10, 1200.00, 'dell_xps_13.jpg',          0, 1),
('MacBook Pro',             'MacBook Pro Apple con chip M1',                        8,  1500.00, 'macbook_pro.jpg',          0, 1),
('Samsung Galaxy S21',      'Ultimo modello di smartphone Samsung',                 20, 800.00,  'galaxy_s21.jpg',           0, 2),
('iPhone 13',               'Apple iPhone 13 con chip A15 Bionic',                  15, 1000.00, 'iphone_13.jpg',            0, 2),
('Sony WH-1000XM4',         'Cuffie over-ear con cancellazione del rumore',         15, 200.00,  'sony_wh1000xm4.jpg',       0, 3),
('Bose QuietComfort 35 II', 'Cuffie wireless con cancellazione del rumore',         12, 250.00,  'bose_qc35_ii.jpg',         0, 3),
('iPad Pro',                'Apple iPad Pro con display da 12,9 pollici',           10, 600.00,  'ipad_pro.jpg',             0, 4),
('Samsung Galaxy Tab S7',   'Tablet ad alta risoluzione di Samsung',                8,  700.00,  'galaxy_tab_s7.jpg',        0, 4),
('Apple Watch Series 7',    'Smartwatch con monitoraggio delle attività fisiche',   20, 300.00,  'apple_watch_series_7.jpg', 0, 5),
('Samsung Galaxy Watch 4',  'Smartwatch con monitoraggio della frequenza cardiaca', 18, 350.00,  'galaxy_watch_4.jpg',       0, 5),
('Canon EOS R5',            'Fotocamera digitale ad alta risoluzione',              10, 900.00,  'canon_eos_r5.jpg',         0, 6),
('Sony Alpha a7 III',       'Fotocamera compatta con obiettivo zoom',               12, 850.00,  'sony_alpha_a7_iii.jpg',    0, 6),
('PlayStation 5',           'Console di gioco di nuova generazione di Sony',        5,  500.00,  'ps5.jpg',                  0, 7),
('Nintendo Switch',         'Console portatile per videogiochi di Nintendo',        7,  400.00,  'nintendo_switch.jpg',      0, 7);

-- Insert Cart
INSERT INTO CARRELLO (codUtente, codProdotto, quantita)
VALUES 
(2,  7,  1),
(2,  8,  1),
(2,  10, 1),
(3,  3,  1),
(3,  12, 4),
(6,  11, 1),
(7,  4,  1),
(7,  11, 1),
(8,  8,  1),
(9,  11, 1),
(11, 9,  1),
(11, 14, 2),
(12, 14, 1),
(16, 1,  1),
(20, 4,  3),
(20, 5,  1),
(21, 3,  18);

-- Insert Orders
INSERT INTO ORDINE (dataOrdine, dataConsegna, statoOrdine, totale, pagato, codUtente)
VALUES 
('2025-01-13 21:01:39', '2025-01-13 21:02:34', 'Spedito',    1450.00, 1, 2),
('2025-01-13 21:01:54', '2025-01-13 21:02:09', 'Spedito',    400.00,  1, 2),
('2025-01-13 21:02:01', NULL,                  'Cancellato', 500.00,  0, 2),
('2025-01-13 21:04:13', '2025-01-13 21:04:25', 'Spedito',    2400.00, 1, 4),
('2025-01-13 21:04:21', '2025-01-13 21:04:34', 'Spedito',    1000.00, 1, 4),
('2025-01-13 22:39:05', '2025-01-13 22:39:22', 'Spedito',    3850.00, 1, 5),
('2025-01-13 22:41:17', '2025-01-13 22:41:32', 'Spedito',    250.00,  1, 5),
('2025-01-13 22:42:27', '2025-01-13 22:42:39', 'Spedito',    1750.00, 1, 6),
('2025-01-13 22:43:18', '2025-01-13 22:43:30', 'Spedito',    1500.00, 1, 6),
('2025-01-13 22:43:34', '2025-01-13 22:43:49', 'Spedito',    1500.00, 1, 6),
('2025-01-13 22:46:55', '2025-01-13 22:47:07', 'Spedito',    500.00,  1, 7),
('2025-01-13 22:47:00', '2025-01-13 22:47:12', 'Spedito',    400.00,  1, 7),
('2025-01-13 22:50:36', '2025-01-13 22:50:48', 'Spedito',    850.00,  1, 8),
('2025-01-13 22:51:06', '2025-01-13 22:51:18', 'Spedito',    1400.00, 1, 8),
('2025-01-13 22:55:12', '2025-01-13 22:55:25', 'Spedito',    600.00,  1, 9),
('2025-01-13 22:56:47', '2025-01-13 22:56:59', 'Spedito',    1500.00, 1, 10),
('2025-01-13 22:58:12', '2025-01-13 22:58:25', 'Spedito',    700.00,  1, 10),
('2025-01-13 23:01:19', '2025-01-13 23:01:32', 'Spedito',    4550.00, 1, 15),
('2025-01-13 23:07:09', '2025-01-13 23:07:21', 'Spedito',    350.00,  1, 17),
('2025-01-13 23:07:54', '2025-01-13 23:08:07', 'Spedito',    850.00,  1, 17),
('2025-01-13 23:08:46', '2025-01-13 23:08:58', 'Spedito',    850.00,  1, 18),
('2025-01-13 23:10:19', '2025-01-13 23:10:31', 'Spedito',    900.00,  1, 19),
('2025-01-13 23:11:47', '2025-01-13 23:11:59', 'Spedito',    1500.00, 1, 19),
('2025-01-13 23:12:56', '2025-01-13 23:13:07', 'Spedito',    1500.00, 1, 20),
('2025-01-13 23:14:27', '2025-01-13 23:14:38', 'Spedito',    1500.00, 1, 21),
('2025-01-13 23:16:05', '2025-01-13 23:16:17', 'Spedito',    2050.00, 1, 22);

-- Insert Order Details
INSERT INTO DETTAGLIO_ORDINE (codOrdine, codProdotto, quantita)
VALUES 
(4,  1, 1),
(6,  1, 1),
(10, 1, 1),
(9,  2, 1),
(16, 2, 1),
(18, 2, 1),
(23, 2, 1),
(24, 2, 1),
(25, 2, 1),
(26, 2, 1),
(6,  3, 1),
(18, 3, 1),
(5,  4, 1),
(6,  4, 1),
(1,  5, 2),
(17, 5, 1),
(18, 5, 1),
(26, 5, 1),
(7,  6, 1),
(14, 6, 1),
(4,  7, 2),
(15, 7, 1),
(1,  8, 1),
(18, 8, 1),
(10, 9, 1),
(14, 9, 1),
(1,  10,1),
(19, 10,1),
(26, 10,1),
(8,  11,1),
(22, 11,1),
(6,  12,1),
(8,  12,1),
(13, 12,1),
(14, 12,1),
(18, 12,1),
(20, 12,1),
(21, 12,1),
(3,  13,1),
(11, 13,1),
(17, 13,1),
(18, 13,1),
(2,  14,1),
(12, 14,1);

-- Insert Notifications
INSERT INTO NOTIFICA (messaggio, tipoNotifica, letto, dataNotifica, codUtente)
VALUES 
("Ciao Daniele, Hai completato il pagamento dell'ordine #2",     "Pagamento Ordine", 1, "2025-01-13 21:01:58", 2),
("Ciao Daniele, Hai cancellato il pagamento dell'ordine #3",     "Pagamento Ordine", 1, "2025-01-13 21:02:03", 2),
("Ciao Daniele, L'ordine #2 è arrivata!",                        "Arrivo Ordine",    1, "2025-01-13 21:02:09", 2),
("Ciao Daniele, Hai completato il pagamento dell'ordine #1",     "Pagamento Ordine", 1, "2025-01-13 21:02:23", 2),
("Ciao Daniele, L'ordine #1 è arrivata!",                        "Arrivo Ordine",    1, "2025-01-13 21:02:34", 2),
("Ciao Giuseppe, Hai completato il pagamento dell'ordine #4",    "Pagamento Ordine", 0, "2025-01-13 21:04:14", 4),
("Ciao Giuseppe, Hai completato il pagamento dell'ordine #5",    "Pagamento Ordine", 0, "2025-01-13 21:04:22", 4),
("Ciao Giuseppe, L'ordine #4 è arrivata!",                       "Arrivo Ordine",    0, "2025-01-13 21:04:25", 4),
("Ciao Giuseppe, L'ordine #5 è arrivata!",                       "Arrivo Ordine",    0, "2025-01-13 21:04:34", 4),
("Ciao Filippo, Hai completato il pagamento dell'ordine #6",     "Pagamento Ordine", 1, "2025-01-13 22:39:07", 5),
("Ciao Filippo, L'ordine #6 è arrivata!",                        "Arrivo Ordine",    1, "2025-01-13 22:39:22", 5),
("Ciao Filippo, Hai completato il pagamento dell'ordine #7",     "Pagamento Ordine", 1, "2025-01-13 22:41:21", 5),
("Ciao Filippo, L'ordine #7 è arrivata!",                        "Arrivo Ordine",    1, "2025-01-13 22:41:32", 5),
("Ciao Marco, Hai completato il pagamento dell'ordine #8",       "Pagamento Ordine", 1, "2025-01-13 22:42:28", 6),
("Ciao Marco, L'ordine #8 è arrivata!",                          "Arrivo Ordine",    1, "2025-01-13 22:42:39", 6),
("Ciao Marco, Hai completato il pagamento dell'ordine #9",       "Pagamento Ordine", 1, "2025-01-13 22:43:19", 6),
("Ciao Marco, L'ordine #9 è arrivata!",                          "Arrivo Ordine",    1, "2025-01-13 22:43:30", 6),
("Ciao Marco, Hai completato il pagamento dell'ordine #10",      "Pagamento Ordine", 1, "2025-01-13 22:43:37", 6),
("Ciao Marco, L'ordine #10 è arrivata!",                         "Arrivo Ordine",    1, "2025-01-13 22:43:49", 6),
("Ciao Luca, Hai completato il pagamento dell'ordine #11",       "Pagamento Ordine", 1, "2025-01-13 22:46:56", 7),
("Ciao Luca, Hai completato il pagamento dell'ordine #12",       "Pagamento Ordine", 1, "2025-01-13 22:47:01", 7),
("Ciao Luca, L'ordine #11 è arrivata!",                          "Arrivo Ordine",    1, "2025-01-13 22:47:07", 7),
("Ciao Luca, L'ordine #12 è arrivata!",                          "Arrivo Ordine",    1, "2025-01-13 22:47:12", 7),
("Ciao Giovanni, Hai completato il pagamento dell'ordine #13",   "Pagamento Ordine", 0, "2025-01-13 22:50:37", 8),
("Ciao Giovanni, L'ordine #13 è arrivata!",                      "Arrivo Ordine",    0, "2025-01-13 22:50:48", 8),
("Ciao Giovanni, Hai completato il pagamento dell'ordine #14",   "Pagamento Ordine", 0, "2025-01-13 22:51:07", 8),
("Ciao Giovanni, L'ordine #14 è arrivata!",                      "Arrivo Ordine",    0, "2025-01-13 22:51:18", 8),
("Ciao Antonio, Hai completato il pagamento dell'ordine #15",    "Pagamento Ordine", 0, "2025-01-13 22:55:14", 9),
("Ciao Antonio, L'ordine #15 è arrivata!",                       "Arrivo Ordine",    0, "2025-01-13 22:55:25", 9),
("Ciao Francesco, Hai completato il pagamento dell'ordine #16",  "Pagamento Ordine", 0, "2025-01-13 22:56:48", 10),
("Ciao Francesco, L'ordine #16 è arrivata!",                     "Arrivo Ordine",    0, "2025-01-13 22:56:59", 10),
("Ciao Francesco, Hai completato il pagamento dell'ordine #17",  "Pagamento Ordine", 0, "2025-01-13 22:58:14", 10),
("Ciao Francesco, L'ordine #17 è arrivata!",                     "Arrivo Ordine",    0, "2025-01-13 22:58:25", 10),
("Ciao Maria, Hai completato il pagamento dell'ordine #18",      "Pagamento Ordine", 0, "2025-01-13 23:01:21", 15),
("Ciao Maria, L'ordine #18 è arrivata!",                         "Arrivo Ordine",    0, "2025-01-13 23:01:32", 15),
("Ciao Sofia, Hai completato il pagamento dell'ordine #19",      "Pagamento Ordine", 0, "2025-01-13 23:07:10", 17),
("Ciao Sofia, L'ordine #19 è arrivata!",                         "Arrivo Ordine",    0, "2025-01-13 23:07:21", 17),
("Ciao Sofia, Hai completato il pagamento dell'ordine #20",      "Pagamento Ordine", 0, "2025-01-13 23:07:56", 17),
("Ciao Sofia, L'ordine #20 è arrivata!",                         "Arrivo Ordine",    0, "2025-01-13 23:08:07", 17),
("Ciao Alessandra, Hai completato il pagamento dell'ordine #21", "Pagamento Ordine", 0, "2025-01-13 23:08:47", 18),
("Ciao Alessandra, L'ordine #21 è arrivata!",                    "Arrivo Ordine",    0, "2025-01-13 23:08:58", 18),
("Ciao Martina, Hai completato il pagamento dell'ordine #22",    "Pagamento Ordine", 1, "2025-01-13 23:10:20", 19),
("Ciao Martina, L'ordine #22 è arrivata!",                       "Arrivo Ordine",    1, "2025-01-13 23:10:31", 19),
("Ciao Martina, Hai completato il pagamento dell'ordine #23",    "Pagamento Ordine", 0, "2025-01-13 23:11:48", 19),
("Ciao Martina, L'ordine #23 è arrivata!",                       "Arrivo Ordine",    0, "2025-01-13 23:11:59", 19),
("Ciao Francesca, Hai completato il pagamento dell'ordine #24",  "Pagamento Ordine", 1, "2025-01-13 23:12:56", 20),
("Ciao Francesca, L'ordine #24 è arrivata!",                     "Arrivo Ordine",    1, "2025-01-13 23:13:07", 20),
("Ciao Sara, Hai completato il pagamento dell'ordine #25",       "Pagamento Ordine", 0, "2025-01-13 23:14:27", 21),
("Ciao Sara, L'ordine #25 è arrivata!",                          "Arrivo Ordine",    0, "2025-01-13 23:14:38", 21),
("Ciao Elena, Hai completato il pagamento dell'ordine #26",      "Pagamento Ordine", 0, "2025-01-13 23:16:06", 22),
("Ciao Elena, L'ordine #26 è arrivata!",                         "Arrivo Ordine",    0, "2025-01-13 23:16:17", 22);

-- Insert Recensions
INSERT INTO RECENSIONE (codUtente, codProdotto, votoRecensione, commento, dataRecensione)
VALUES
(2,  5,  5, "Sono perfette per quando l'ambiente è rumoroso, proteggono dai rumori forti!",                                                                                         '2025-01-13 21:18:30'),
(2,  8,  1, "Non ne vale la pena per il prezzo! Troppo costoso!!!",                                                                                                                 '2025-01-13 21:19:27'),
(2,  10, 1, "350 euro per un orologio??? Ma siamo matti?",                                                                                                                          '2025-01-13 21:19:57'),
(2,  14, 5, "Adoro la Nintendo Switch!!!",                                                                                                                                          '2025-01-13 21:17:20'),
(4,  1,  1, "Decisamente costa troppo, ha solo 4GB di RAM. Non compratelo!",                                                                                                        '2025-01-13 21:15:44'),
(4,  4,  4, "Adoro gli iPhone, decisamente superiore a Samsung, ma costano troppo!",                                                                                                '2025-01-13 21:06:39'),
(4,  7,  5, "Decisamente un prodotto valido! Lo consiglierei a tutti!",                                                                                                             '2025-01-13 21:15:02'),
(5,  1,  4, "Bel computer",                                                                                                                                                         '2025-01-13 22:39:55'),
(5,  3,  2, "Sul mio iPhone precedente, la fotocamera era molto migliore",                                                                                                          '2025-01-13 22:40:36'),
(5,  4,  1, "Meh. Niente di che",                                                                                                                                                   '2025-01-13 22:40:55'),
(6,  1,  2, "Costa troppo",                                                                                                                                                         '2025-01-13 22:44:13'),
(6,  2,  3, "Costa 1500 euro, ma ha solo 8GB di RAM. Se non fosse per i chip ARM e la durata della batteria, non lo comprerei mai!",                                                '2025-01-13 22:46:07'),
(6,  11, 5, "Adatta per professionisti!",                                                                                                                                           '2025-01-13 22:42:47'),
(7,  13, 1, "Ahahahahah, l'innovazione di avere una console verticale a doppio il costo della PS4. Ma fatemi il piacere!",                                                          '2025-01-13 22:48:33'),
(7,  14, 2, "Niente di che",                                                                                                                                                        '2025-01-13 22:47:45'),
(8,  6,  4, "Non male",                                                                                                                                                             '2025-01-13 22:51:30'),
(8,  9,  5, "Sono comodi per evitare di portarsi il telefono dietro, ma avere accesso ad applicazioni utili, come la calcolatrice o le statistiche mentre corro",                   '2025-01-13 22:52:28'),
(8,  12, 4, "Buon rapporto qualità/prezzo! Ci sono fotocamere migliori, ma per il prezzo è molto valido!",                                                                          '2025-01-13 22:54:27'),
(9,  7,  2, "Me ne sono pentito subito! Mi piace la telecamera, ma la batteria dura solo 3 ore!",                                                                                   '2025-01-13 22:56:22'),
(10, 2,  5, "Fantastico! Ha una batteria di 14 ore, che è perfetta per me, in quanto viaggio spesso",                                                                               '2025-01-13 22:58:06'),
(15, 2,  2, "Brutto! macOS ha molte meno funzionalità di un qualunque sistema Linux. L'ho comprato perché il mio amico Gian Giovanni me lo aveva consigliato, ma ne sono pentito!", '2025-01-13 23:06:08'),
(15, 3,  5, "Android batte iOS sempre!",                                                                                                                                            '2025-01-13 23:02:03'),
(15, 5,  2, "Chi comprerebbe delle cuffie a 200 euro???",                                                                                                                           '2025-01-13 23:02:29'),
(15, 12, 1, "Niente di che!",                                                                                                                                                       '2025-01-13 23:02:43'),
(15, 13, 4, "Non vedo l'ora di giocare a Diablo 3!",                                                                                                                                '2025-01-13 23:03:10'),
(17, 10, 1, "Adoro il design. Il prezzo è un po' esagerato, però!",                                                                                                                 '2025-01-13 23:07:35'),
(17, 12, 3, "Niente di che, ma non è neanche male.",                                                                                                                                '2025-01-13 23:08:22'),
(18, 12, 5, "Adoro! Fa delle foto molto belle!",                                                                                                                                    '2025-01-13 23:09:05'),
(19, 2,  4, "Lo consiglio per la batteria. Dura 13 ore!",                                                                                                                           '2025-01-13 23:12:17'),
(19, 11, 4, "Preferisco le fotocamere della Sony!",                                                                                                                                 '2025-01-13 23:11:00'),
(20, 2,  4, "Sempre usato Windows, ma macOS non è male!",                                                                                                                           '2025-01-13 23:13:23'),
(21, 2,  1, "Troppo costoso!",                                                                                                                                                      '2025-01-13 23:14:54'),
(22, 2,  2, "Niente di che",                                                                                                                                                        '2025-01-13 23:16:27'),
(22, 10, 5, "Lo consiglierò a tutte le mie amiche!",                                                                                                                                '2025-01-13 23:17:25');
