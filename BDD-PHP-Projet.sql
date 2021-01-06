################## BDD PHP Projet ########################

CREATE DATABASE base3reco;

USE base3reco;

CREATE TABLE CategorieProd (
    typeId        INT (3)    PRIMARY KEY,
    name          CHAR (35)  NOT NULL,
    description   TEXT (200)
);

CREATE TABLE Product (
    idProduct       INT  (3)  PRIMARY KEY,
    nameProduct     CHAR (50) NOT NULL,
    description     TEXT (200),
    fairtrade       BOOLEAN      NOT NULL,
    typeId          INT  (3)  NOT NULL,
    price           FLOAT(5)  NOT NULL,
    stock           INT  (3)  NOT NULL,
    discount        BOOLEAN,
    FOREIGN KEY (typeId)  REFERENCES CategorieProd (typeId)
);

INSERT INTO CategorieProd (typeId, name, description) VALUES (1,'Roman', 'oeuvre narrative en prose, recit imaginaire');
INSERT INTO CategorieProd (typeId, name, description) VALUES (2,'Manga', 'bande dessinee japonaise');
INSERT INTO CategorieProd (typeId, name, description) VALUES (3,'Magazine', 'publication periodique generalement illustree');
INSERT INTO CategorieProd (typeId, name, description) VALUES (4,'Poesie', 'art du langage visant a exprime une intention par le rythme');
INSERT INTO CategorieProd (typeId, name, description) VALUES (5,'Autre', 'tout autre genre litteraire');

INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
VALUES (10, 'Brisingr', 'roman heroic-fantasy melant aventure et dragons',FALSE,1, 21.9, 15,FALSE);

INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
VALUES (11, 'Crescendo', 'roman science fiction melant amour et ange','false',1, 12.99, 23,'true');

INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
VALUES (12, 'xxxHolic', 'tome 1, science fiction et multivers','false',2, 6.95, 12,'false');

INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
VALUES (13, 'Emma', 'tome 3, amour historique, periode victorienne','false',2, 5.50, 7,'true');

INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
VALUES (14, 'Le Figaro Hors serie Mars 2018 ', 'Walt Disney Passeur d histoire','false',3, 9.90, 4,'false');

INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
VALUES (15, 'Guitard Part Octobre 2016 ', 'Les Ramones, les plus grands disques perdus','false',3, 7.50, 6,'false');

INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
VALUES (16, 'Les Contemplations ', 'Recueil de Poesie de Victor Hugo','false',4, 12.6, 14,'true');

INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
VALUES (17, 'Les Fleurs du mal ', 'Recueil de Poesie de Charles Baudelaire','false',4, 9.99, 9,'false');

INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
VALUES (18, 'Histoire de l Art ', 'Introduction chronologique incontournable de Gombrich','false',5, 27.99, 8,'true');

INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
VALUES (19, 'Les chroniques de la science fiction ','Guide de compréhension des oeuvres de science fiction à travers les époques'
,'false',5, 35.0, 8,'false');