-- Insert Admin User
INSERT INTO UTENTE (nomeUtente, password, email, privilegi, indirizzo, disabilitato, citta)
VALUES ('Admin', '$2y$10$3TVwpYu41fudJSgJVFf3FOgXn/RQspOUtpBXwAbd7vVBXKybbosHS', 'admin@unibo.it', 1, 'Via Giovanni 3', 0, 'Cesena');               -- pw: admin

-- Insert Normal User
INSERT INTO UTENTE (nomeUtente, password, email, privilegi, indirizzo, disabilitato, citta)
VALUES ('Daniele', '$2y$10$U62OmutMlh7GNvR8VbYJluVMpNE/oF1KRlj3TKRASYkq7/a9d50AO', 'daniele@studio.unibo.it', 0, 'Via Roma 12', 0, 'Bologna'),    -- pw: daniele
('Franco', '$2y$10$PATF1eeMpWf8QU0Di4G8F.ZqFoRiSJHpGfQgMFlqnv63ismaJ4Cji', 'franco@studio.unibo.it', 0, 'Viale delle rose 99', 0, 'Firenze'),     -- pw: franco
('Giuseppe', '$2y$10$H8cOAl86UxfOjw0A.5Oc8e8suZZ/MBG7GgpURH9OjAE4ncRz6CO3O', 'giuseppe@studio.unibo.it', 0, 'Via Martini 120', 0, 'Rimini');      -- pw: giuseppe
