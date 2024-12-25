INSERT INTO UTENTE (nomeUtente, password, email, privilegi, indirizzo, citta)
VALUES 
('Mattia Negri', 'Polypoly', 'polipoly@example.com', 1, 'Via Libia Valdagno 10', 'Milano'),
('Luisa Bianchi', 'securePass456', 'luisa.bianchi@example.com', 0, 'Via Milano 5', 'Roma');

INSERT INTO CATEGORIA (nome, descrizione)
VALUES 
('Computer', 'Dispositivo elettronico'),
('Telefono', 'Dispositivo elettronico portabile');

INSERT INTO PRODOTTO (nome, descrizione, quantitaResidua, immagine, prezzo, codCategoria)
VALUES 
('Nokia 3310', 'Un telefono di ultima generazione', 50, 'no.jpg', 699.99, 2),
('Laptop', 'Un potente computer portatile', 30, 'no.jpg',1299.99, 1);

-- INSERT INTO CARRELLO (codUtente, codProdotto, quantita)
-- VALUES 
-- (1, 1, 2),
-- (2, 2, 1);          se uno effettua un ordine il carrello dell'utente verra pulito

INSERT INTO ORDINE (codOrdine, dataOrdine, statoOrdine, totale, pagato, codUtente)
VALUES 
(1, '2024-11-25', 'Completato', 1399.98, TRUE, 1),
(2, '2024-11-26', 'In Attesa', 1299.99, FALSE, 2);

INSERT INTO DETTAGLIO_ORDINE (codOrdine, codProdotto, quantita)
VALUES 
(1, 1, 2),
(2, 2, 1); 
