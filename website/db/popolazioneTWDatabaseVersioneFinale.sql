-- Insert Admin User
INSERT INTO UTENTE (nomeUtente, password, email, privilegi, indirizzo, disabilitato, citta)
VALUES 
('Admin',      '$2y$10$3TVwpYu41fudJSgJVFf3FOgXn/RQspOUtpBXwAbd7vVBXKybbosHS', 'admin@unibo.it',             1, 'Via Giovanni 3',            0, 'Cesena'),    -- pw: admin
('Daniele',    '$2y$10$U62OmutMlh7GNvR8VbYJluVMpNE/oF1KRlj3TKRASYkq7/a9d50AO', 'daniele@studio.unibo.it',    0, 'Via Roma 12',               0, 'Bologna'),   -- pw: daniele
('Franco',     '$2y$10$PATF1eeMpWf8QU0Di4G8F.ZqFoRiSJHpGfQgMFlqnv63ismaJ4Cji', 'franco@studio.unibo.it',     0, 'Viale delle rose 99',       0, 'Firenze'),   -- pw: franco
('Giuseppe',   '$2y$10$H8cOAl86UxfOjw0A.5Oc8e8suZZ/MBG7GgpURH9OjAE4ncRz6CO3O', 'giuseppe@studio.unibo.it',   0, 'Via Martini 120',           0, 'Rimini'),    -- pw: giuseppe
('Filippo',    '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'filippo@studio.unibo.it',    0, 'Via Levaldigi, 420',        0, 'Forli'),     -- pw (from here on): password
('Marco',      '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'marco@studio.unibo.it',      0, 'Via Dante Alighieri, 35',   0, 'Bologna'),
('Luca',       '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'luca@studio.unibo.it',       0, 'Via Garibaldi, 12',         0, 'Ravenna'),
('Giovanni',   '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'giovanni@studio.unibo.it',   0, 'Corso Italia, 80',          0, 'Venezia'),
('Antonio',    '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'antonio@studio.unibo.it',    0, 'Via Roma, 54',              0, 'Napoli'),
('Francesco',  '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'francesco@studio.unibo.it',  0, 'Via Torino, 70',            0, 'Milano'),
('Stefano',    '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'stefano@studio.unibo.it',    0, 'Piazza San Giovanni, 10',   0, 'Genova'),
('Alessandro', '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'alessandro@studio.unibo.it', 0, 'Via delle Magnolie, 45',    0, 'Torino'),
('Matteo',     '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'matteo@studio.unibo.it',     0, 'Via della Libertà, 13',     0, 'Firenze'),
('Simone',     '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'simone@studio.unibo.it',     0, 'Via Guglielmo Marconi, 22', 0, 'Roma'),
('Maria',      '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'maria@studio.unibo.it',      0, 'Via Giuseppe Mazzini, 28',  0, 'Napoli'),
('Giulia',     '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'giulia@studio.unibo.it',     0, 'Piazza del Duomo, 4',       0, 'Milano'),
('Sofia',      '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'sofia@studio.unibo.it',      0, 'Via San Giovanni, 56',      0, 'Torino'),
('Alessandra', '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'alessandra@studio.unibo.it', 0, 'Viale Europa, 18',          0, 'Bologna'),
('Martina',    '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'martina@studio.unibo.it',    0, 'Via Dante, 42',             0, 'Roma'),
('Francesca',  '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'francesca@studio.unibo.it',  0, 'Piazza Venezia, 15',        0, 'Venezia'),
('Sara',       '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'sara@studio.unibo.it',       0, 'Corso Trieste, 10',         0, 'Firenze'),
('Elena',      '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'elena@studio.unibo.it',      0, 'Via Roma, 85',              0, 'Genova'),
('Beatrice',   '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'beatrice@studio.unibo.it',   0, 'Viale dei Colli, 23',       0, 'Palermo'),
('Valentina',  '$2y$10$jtePgbT5r5v1eew3DZjhhuJ8X6/yYDXyVDCNfJpcah9AwIL/aFxPq', 'valentina@studio.unibo.it',  0, 'Via delle Rose, 78',        0, 'Catania');


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
(2, 7,  1),
(2, 8,  1),
(2, 10, 1),
(3, 3,  1),
(3, 12, 4);

-- Insert Orders
INSERT INTO ORDINE (dataOrdine, dataConsegna, statoOrdine, totale, pagato, codUtente)
VALUES 
('2025-01-13 21:01:39', '2025-01-13 21:02:34', 'Spedito',    1450.00, 1, 2),
('2025-01-13 21:01:54', '2025-01-13 21:02:09', 'Spedito',    400.00,  1, 2),
('2025-01-13 21:02:01', NULL,                  'Cancellato', 500.00,  0, 2),
('2025-01-13 21:04:13', '2025-01-13 21:04:25', 'Spedito',    2400.00, 1, 4),
('2025-01-13 21:04:21', '2025-01-13 21:04:34', 'Spedito',    1000.00, 1, 4);

-- Insert Order Details
INSERT INTO DETTAGLIO_ORDINE (codOrdine, codProdotto, quantita)
VALUES 
(1, 5,  2),
(1, 8,  1),
(1, 10, 1),
(2, 14, 1),
(3, 13, 1),
(4, 1,  1),
(4, 7,  2),
(5, 4,  1);

-- Insert Notifications
INSERT INTO NOTIFICA (messaggio, tipoNotifica, letto, dataNotifica, codUtente)
VALUES 
("Ciao Daniele, Hai completato il pagamento dell'ordine #2",  'Pagamento Ordine', 1, '2025-01-13 21:01:58', 2),
("Ciao Daniele, Hai cancellato il pagamento dell'ordine #3",  'Pagamento Ordine', 1, '2025-01-13 21:02:03', 2),
("Ciao Daniele, L'ordine #2 è arrivata!",                     'Arrivo Ordine',    1, '2025-01-13 21:02:09', 2),
("Ciao Daniele, Hai completato il pagamento dell'ordine #1",  'Pagamento Ordine', 1, '2025-01-13 21:02:23', 2),
("Ciao Daniele, L'ordine #1 è arrivata!",                     'Arrivo Ordine',    1, '2025-01-13 21:02:34', 2),
("Ciao Giuseppe, Hai completato il pagamento dell'ordine #4", 'Pagamento Ordine', 0, '2025-01-13 21:04:14', 4),
("Ciao Giuseppe, Hai completato il pagamento dell'ordine #5", 'Pagamento Ordine', 0, '2025-01-13 21:04:22', 4),
("Ciao Giuseppe, L'ordine #4 è arrivata!",                    'Arrivo Ordine',    0, '2025-01-13 21:04:25', 4),
("Ciao Giuseppe, L'ordine #5 è arrivata!",                    'Arrivo Ordine',    0, '2025-01-13 21:04:34', 4);

-- Insert Recensions
INSERT INTO RECENSIONE (codUtente, codProdotto, votoRecensione, commento, dataRecensione)
VALUES
(2, 5,  5, "Sono perfette per quando l'ambiente è rumoroso, proteggono dai rumori forti!", '2025-01-13 21:18:30'),
(2, 8,  1, 'Non ne vale la pena per il prezzo! Troppo costoso!!!',                         '2025-01-13 21:19:27'),
(2, 10, 1, '350 euro per un orologio??? ma siamo matti?',                                  '2025-01-13 21:19:57'),
(2, 14, 5, 'Adoro la nintendo switch!!!',                                                  '2025-01-13 21:17:20'),
(4, 1,  1, 'Decisamente costa troppo, ha solo 4GB di ram. Non compratelo!',                '2025-01-13 21:15:44'),
(4, 4,  4, 'Adoro gli iphone, decisamente superiore a samsung, ma costano troppo!',        '2025-01-13 21:06:39'),
(4, 7,  5, 'Decisamente un prodotto valido! Lo consiglierei a tutti!',                     '2025-01-13 21:15:02');
