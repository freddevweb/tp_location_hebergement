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
    codePostal INT(5),
    ville VARCHAR(255),

    capacite INT NOT NULL,
    arriveeDebut TIME,
    arriveeFin TIME,
    fumeur BOOLEAN,
    television BOOLEAN,
    chaufage BOOLEAN,
    climatisation BOOLEAN,
    sdb BOOLEAN,
    parking BOOLEAN,
    laveLinge BOOLEAN,
    wifi BOOLEAN,
    hDepart TIME

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
    voyageurs INT NOT NULL

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

LOCK TABLES user_type WRITE;
INSERT INTO user_type VALUES
(1,"admin"),
(2,"moderateur"),
(3,"loueur"),
(4,"user");
UNLOCK TABLES;

LOCK TABLES user WRITE;
INSERT INTO user VALUES
(1,"fred", "fred@mail.com", 1, "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918", now(), now());
UNLOCK TABLES;
