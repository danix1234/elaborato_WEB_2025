-- Insert Admin User
INSERT INTO UTENTE (nomeUtente, password, email, privilegi, indirizzo, disabilitato, citta)
VALUES 
('Admin',    '$2y$10$3TVwpYu41fudJSgJVFf3FOgXn/RQspOUtpBXwAbd7vVBXKybbosHS', 'admin@unibo.it',           1, 'Via Giovanni 3',      0, 'Cesena'),    -- pw: admin
('Daniele',  '$2y$10$U62OmutMlh7GNvR8VbYJluVMpNE/oF1KRlj3TKRASYkq7/a9d50AO', 'daniele@studio.unibo.it',  0, 'Via Roma 12',         0, 'Bologna'),   -- pw: daniele
('Franco',   '$2y$10$PATF1eeMpWf8QU0Di4G8F.ZqFoRiSJHpGfQgMFlqnv63ismaJ4Cji', 'franco@studio.unibo.it',   0, 'Viale delle rose 99', 0, 'Firenze'),   -- pw: franco
('Giuseppe', '$2y$10$H8cOAl86UxfOjw0A.5Oc8e8suZZ/MBG7GgpURH9OjAE4ncRz6CO3O', 'giuseppe@studio.unibo.it', 0, 'Via Martini 120',     0, 'Rimini');    -- pw: giuseppe

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
