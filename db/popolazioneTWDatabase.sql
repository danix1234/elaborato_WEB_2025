-- Insert Admin User
INSERT INTO UTENTE (nomeUtente, password, email, privilegi, indirizzo, disabilitato, citta)
VALUES ('admin', '$2y$10$3TVwpYu41fudJSgJVFf3FOgXn/RQspOUtpBXwAbd7vVBXKybbosHS', 'a@es.com', 1, 'pw=admin', 0, 'Admin City');

-- Insert Normal User
INSERT INTO UTENTE (nomeUtente, password, email, privilegi, indirizzo, disabilitato, citta)
VALUES ('normaluser', '$2y$10$XzGO/2cpEPf1nTT4k9FgKeyot4IbxNABOJkS1NGyNO8McbTnr/75y', 'u@es.com', 0, 'pw=user', 0, 'User City'),
('testRecensione', 'no', '1@es.com', 0, 'pw=user', 0, 'User City'),
('testRecensione', 'no', '2@es.com', 0, 'pw=user', 0, 'User City'),
('testRecensione', 'no', '3@es.com', 0, 'pw=user', 0, 'User City'),
('testRecensione', 'no', '4@es.com', 0, 'pw=user', 0, 'User City'),
('testRecensione', 'no', '5@es.com', 0, 'pw=user', 0, 'User City');

-- Insert Categories
INSERT INTO CATEGORIA (nome, descrizione)
VALUES 
('Computer', 'All kinds of computers and accessories'),
('Smartphone', 'Latest smartphones and accessories'),
('Headphone', 'High-quality headphones and audio equipment'),
('Tablet', 'Latest tablets and accessories'),
('Smartwatch', 'Smartwatches and wearable technology'),
('Camera', 'Digital cameras and photography equipment'),
('Gaming', 'Gaming consoles and accessories');

-- Insert Products
INSERT INTO PRODOTTO (nome, descrizione, quantitaResidua, prezzo, immagine, disabilitato, codCategoria)
VALUES 
('Dell XPS 13', 'High performance laptop with 13-inch display', 10, 1200.00, 'dell_xps_13.jpg', 0, 1),
('MacBook Pro', 'Apple MacBook Pro with M1 chip', 8, 1500.00, 'macbook_pro.jpg', 0, 1),
('Samsung Galaxy S21', 'Latest model smartphone from Samsung', 20, 800.00, 'galaxy_s21.jpg', 0, 2),
('iPhone 13', 'Apple iPhone 13 with A15 Bionic chip', 15, 1000.00, 'iphone_13.jpg', 0, 2),
('Sony WH-1000XM4', 'Noise cancelling over-ear headphones', 15, 200.00, 'sony_wh1000xm4.jpg', 0, 3),
('Bose QuietComfort 35 II', 'Wireless noise cancelling headphones', 12, 250.00, 'bose_qc35_ii.jpg', 0, 3),
('iPad Pro', 'Apple iPad Pro with 12.9-inch display', 10, 600.00, 'ipad_pro.jpg', 0, 4),
('Samsung Galaxy Tab S7', 'High resolution tablet from Samsung', 8, 700.00, 'galaxy_tab_s7.jpg', 0, 4),
('Apple Watch Series 7', 'Smartwatch with fitness tracking', 20, 300.00, 'apple_watch_series_7.jpg', 0, 5),
('Samsung Galaxy Watch 4', 'Smartwatch with heart rate monitor', 18, 350.00, 'galaxy_watch_4.jpg', 0, 5),
('Canon EOS R5', 'Digital camera with high resolution', 10, 900.00, 'canon_eos_r5.jpg', 0, 6),
('Sony Alpha a7 III', 'Compact camera with zoom lens', 12, 850.00, 'sony_alpha_a7_iii.jpg', 0, 6),
('PlayStation 5', 'Next-gen gaming console from Sony', 5, 500.00, 'ps5.jpg', 0, 7),
('Nintendo Switch', 'Portable gaming console from Nintendo', 7, 400.00, 'nintendo_switch.jpg', 0, 7);


-- Insert Cart for Normal User
INSERT INTO CARRELLO (codUtente, codProdotto, quantita)
VALUES 
((SELECT codUtente FROM UTENTE WHERE email = 'u@es.com'), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'Dell XPS 13'), 1),
((SELECT codUtente FROM UTENTE WHERE email = 'u@es.com'), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'iPhone 13'), 2),
((SELECT codUtente FROM UTENTE WHERE email = 'u@es.com'), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'Sony WH-1000XM4'), 1),
((SELECT codUtente FROM UTENTE WHERE email = 'u@es.com'), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'PlayStation 5'), 1);

-- Insert Orders
INSERT INTO ORDINE (dataOrdine, dataConsegna, statoOrdine, totale, pagato, codUtente)
VALUES 
('2024-1-30', '2024-2-01','Shipped', 2200.00, 1, (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')),
('2024-12-01', '2027-12-05','Shipping', 2300.00, 1, (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')),
('2024-12-02', '2024-12-05','Pending', 550.00, 0, (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')),
('2024-12-03', '2024-12-05','Deleted', 900.00, 0, (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com'));

-- Insert Order Details
INSERT INTO DETTAGLIO_ORDINE (codOrdine, codProdotto, quantita)
VALUES 
((SELECT codOrdine FROM ORDINE WHERE statoOrdine = 'Shipped' AND codUtente = (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'Dell XPS 13'), 1),
((SELECT codOrdine FROM ORDINE WHERE statoOrdine = 'Shipped' AND codUtente = (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'iPhone 13'), 1),
((SELECT codOrdine FROM ORDINE WHERE statoOrdine = 'Shipping' AND codUtente = (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'MacBook Pro'), 1),
((SELECT codOrdine FROM ORDINE WHERE statoOrdine = 'Shipping' AND codUtente = (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'Samsung Galaxy S21'), 1),
((SELECT codOrdine FROM ORDINE WHERE statoOrdine = 'Pending' AND codUtente = (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'Sony WH-1000XM4'), 1),
((SELECT codOrdine FROM ORDINE WHERE statoOrdine = 'Pending' AND codUtente = (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'Bose QuietComfort 35 II'), 1),
((SELECT codOrdine FROM ORDINE WHERE statoOrdine = 'Deleted' AND codUtente = (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'PlayStation 5'), 1),
((SELECT codOrdine FROM ORDINE WHERE statoOrdine = 'Deleted' AND codUtente = (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')), (SELECT codProdotto FROM PRODOTTO WHERE nome = 'Nintendo Switch'), 1);

-- Insert Notifications
INSERT INTO NOTIFICA (messaggio, tipoNotifica, letto, dataNotifica, codUtente)
VALUES 
('Your order has been shipped', 'Order', 0, '2024-1-30 10:00:00', (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')),
('Your order is being shipped', 'Order', 0, '2024-12-01 10:00:00', (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')),
('Your order is pending', 'Order', 0, '2024-12-02 10:00:00', (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com')),
('Your order has been deleted', 'Order', 0, '2024-12-03 10:00:00', (SELECT codUtente FROM UTENTE WHERE email = 'u@es.com'));

create table temp (
     review varchar(511) not null,
     rating int not null,
     constraint ID_TEMP_ID primary key (review));

INSERT INTO temp (rating, review)
VALUES 
(5,'Great product!'),
(1,'Not satisfied with the quality.'),
(5,'Excellent customer service.'),
(4,'Will buy again.'),
(5,'Highly recommend this product.'),
(4,'Good product.'),
(3,'Average product.'),
(2,'Not so good.'),
(1,'Bad product.'),
(5,'Excellent!'),
(4,'Very good!'),
(3,'It is okay.'),
(2,'Could be better.'),
(1,'Terrible, not recommended.'),
(4,'Good value for the price'),
(1,'Terrible customer service'),
(5,'Amazing battery life on this phone.'),
(5,'The laptop is super fast and reliable.'),
(5,'Camera quality is outstanding.'),
(5,'The screen resolution is crystal clear.'),
(4,'Very lightweight and portable.'),
(2,'The phone overheats quickly.'),
(3,'The laptop keyboard is very comfortable.'),
(4,'The sound quality is top-notch.'),
(2,'The phone has a sleek design.'),
(5,'The computer runs all my programs smoothly.');

DROP PROCEDURE IF EXISTS loopReview;

DELIMITER $$

CREATE PROCEDURE loopReview(IN userId INT, IN maxProducts INT)
BEGIN
    DECLARE counter INT DEFAULT 1;
    DECLARE randomRating INT;
    DECLARE randomComment VARCHAR(511);
    DECLARE randomDate DATE;

    my_loop: LOOP
    
        SET randomDate = DATE_SUB(CURDATE(), INTERVAL FLOOR(RAND() * 365) DAY);
        
        SELECT review, rating INTO randomComment, randomRating
			FROM temp
			ORDER BY RAND()
			LIMIT 1;
		INSERT INTO RECENSIONE (codUtente, codProdotto, votoRecensione, commento, dataRecensione)
		VALUES (userId, counter, randomRating, randomComment, randomDate);

        SET counter = counter + 1;

        IF counter > maxProducts THEN
            LEAVE my_loop;
        END IF;
    END LOOP;
END$$

DELIMITER ;

CALL loopReview(3, 14);
CALL loopReview(4, 14);
CALL loopReview(5, 14);
CALL loopReview(6, 14);
CALL loopReview(7, 14);

DROP PROCEDURE IF EXISTS loopReview;
DROP TABLE IF EXISTS temp;