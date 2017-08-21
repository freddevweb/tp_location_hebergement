DROP DATABASE IF EXISTS RbnbLight;
CREATE DATABASE RbnbLight;
SET NAMES utf8;

USE RbnbLight;


CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(255) UNIQUE,
    email VARCHAR(255) UNIQUE,
    type_id INT NOT NULL,
    wp VARCHAR(255) NOT NULL,
    inscription DATETIME NOT NULL,
    connexion DATETIME NOT NULL

)ENGINE=InnoDb;

CREATE TABLE user_type (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255)

)ENGINE=InnoDb;

CREATE TABLE annonce (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    titre VARCHAR(255),
    type_logement_id INT NOT NULL,
    tarif DECIMAL(7,2),
    surface DECIMAL(5,2),
    nbreChambre INT,
    nbrePieces INT NOT NULL,
    description TEXT,
    adress varchar(255),
    codePostal INT(5)NOT NULL,
    ville VARCHAR(255)NOT NULL,

    capacite INT NOT NULL,
    arriveeDebut TIME,
    arriveeFin TIME,
    fumeur BOOLEAN NOT NULL,
    television BOOLEAN NOT NULL,
    chaufage BOOLEAN NOT NULL,
    climatisation BOOLEAN NOT NULL,
    sdb BOOLEAN NOT NULL,
    parking BOOLEAN NOT NULL,
    laveLinge BOOLEAN NOT NULL,
	wifi BOOLEAN NOT NULL,
    hDepart TIME,
    statut_id int NOT NULL

)ENGINE=InnoDb;

CREATE TABLE statut (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    statut varchar(255)
)ENGINE=InnoDb;

CREATE TABLE logement_type (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255)

)ENGINE=InnoDb;

CREATE TABLE photo (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    annonce_id INT NOT NULL,
    titre VARCHAR(255),
    photo_path VARCHAR(255)

)ENGINE=InnoDb;

CREATE TABLE location (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    annonce_id INT NOT NULL,
    user_id INT NOT NULL,
    arrivee DATE NOT NULL,
    depart DATE NOT NULL,
    voyageurs INT NOT NULL,
    courrier text

)ENGINE=InnoDb;

CREATE TABLE commentaire (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    annonce_id INT,
    user_id INT,
    commentaire TEXT

)ENGINE=InnoDb;

/* 
CREATE TABLE message (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

)ENGINE=InnoDb;
 */

CREATE TABLE favoris (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    annonce_id INT NOT NULL

)ENGINE=InnoDb;


CREATE TABLE nav (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title varchar(255),
    link varchar(255)
)ENGINE=InnoDb;

-- #######################################################
-- #######################################################

ALTER TABLE user 
ADD CONSTRAINT fk_user_usertype
    FOREIGN KEY (type_id)
    REFERENCES user_type (id);

ALTER TABLE annonce 
ADD CONSTRAINT fk_user_annonce
    FOREIGN KEY (user_id) 
    REFERENCES user (id)
    ON DELETE CASCADE;

ALTER TABLE annonce 
ADD CONSTRAINT fk_user_logement_type
    FOREIGN KEY (type_logement_id) 
    REFERENCES logement_type (id);

ALTER TABLE photo 
ADD CONSTRAINT fk_photo_annonce_id
    FOREIGN KEY (annonce_id) 
    REFERENCES annonce (id)
    ON DELETE CASCADE;

ALTER TABLE location 
ADD CONSTRAINT fk_location_annonce
    FOREIGN KEY (annonce_id) 
    REFERENCES annonce (id);

ALTER TABLE location 
ADD CONSTRAINT fk_location_user
    FOREIGN KEY (user_id) 
    REFERENCES user (id);

ALTER TABLE commentaire 
ADD CONSTRAINT fk_commentaire_annonce
    FOREIGN KEY (annonce_id) 
    REFERENCES annonce (id)
    ON DELETE CASCADE;

ALTER TABLE commentaire 
ADD CONSTRAINT fk_commentaire_user
    FOREIGN KEY (user_id) 
    REFERENCES user (id)
    ON DELETE CASCADE;

ALTER TABLE favoris 
ADD CONSTRAINT fk_favoris_annonce
    FOREIGN KEY (annonce_id) 
    REFERENCES annonce (id)
    ON DELETE CASCADE;

ALTER TABLE favoris 
ADD CONSTRAINT fk_favoris_user
    FOREIGN KEY (user_id) 
    REFERENCES user (id)
    ON DELETE CASCADE;
    
ALTER TABLE nav
ADD CONSTRAINT fk_nav_user
    FOREIGN KEY (user_id) 
    REFERENCES user (id);

ALTER TABLE annonce 
ADD CONSTRAINT fk_annonce_statut
    FOREIGN KEY (statut_id) 
    REFERENCES statut (id);


-- #######################################################
-- #######################################################

LOCK TABLES logement_type WRITE;
INSERT INTO logement_type VALUES
(1,"chambre"),
(2,"dépendance"),
(3,"studio"),
(4,"appartement"),
(5,"maison de village"),
(6,"villa");
UNLOCK TABLES;

LOCK TABLES statut WRITE;
INSERT INTO statut VALUES
(1,"en attente"),
(2,"a verifier"),
(3, "verifier"),
(4,"a valider"),
(5,"validé");
UNLOCK TABLES;

LOCK TABLES user_type WRITE;
INSERT INTO user_type VALUES
(1,"Admin"),
(2,"Validator"),
(3,"Loueur"),
(4,"User");
UNLOCK TABLES;

LOCK TABLES user WRITE;
INSERT INTO user VALUES
(1,"Frédéric", "fred@mail.com", 1, "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918", now(), now()),
(2,"Valerie", "val@mail.com", 2, "a2114e464a6b56701ee1ac601abd50b761c30c1a17a5313395089feaf9304812", now(), now()),
(3,"Paul", "paul@mail.com", 3, "0357513deb903a056e74a7e475247fc1ffe31d8be4c1d4a31f58dd47ae484100", now(), now()),
(4,"Pierre", "pierre@mail.com", 4, "d5a5d66b94e8da0cf63d4cd6d66cd489d78e77b697039c6c48e3ff8d81752139", now(), now()),
(5,"Alfonso", "alfonso@mail.com", 4, "c7e52d8590eaed2bc3558eacd21b5ed7d1ac0770507440f8bc2748308090bc77", now(), now());
UNLOCK TABLES;







