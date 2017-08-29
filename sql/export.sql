-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: rbnblight
-- ------------------------------------------------------
-- Server version	5.7.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `type_logement_id` int(11) NOT NULL,
  `tarif` decimal(7,2) DEFAULT NULL,
  `surface` decimal(5,2) DEFAULT NULL,
  `nbreChambre` int(11) DEFAULT NULL,
  `nbrePieces` int(11) NOT NULL,
  `description` text,
  `adress` varchar(255) DEFAULT NULL,
  `codePostal` int(5) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `capacite` int(11) NOT NULL,
  `arriveeDebut` time DEFAULT NULL,
  `arriveeFin` time DEFAULT NULL,
  `fumeur` tinyint(1) DEFAULT NULL,
  `television` tinyint(1) DEFAULT NULL,
  `chauffage` tinyint(1) DEFAULT NULL,
  `climatisation` tinyint(1) DEFAULT NULL,
  `sdb` tinyint(1) DEFAULT NULL,
  `parking` tinyint(1) DEFAULT NULL,
  `laveLinge` tinyint(1) DEFAULT NULL,
  `wifi` tinyint(1) DEFAULT NULL,
  `hDepart` time DEFAULT NULL,
  `statut_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_annonce` (`user_id`),
  KEY `fk_user_logement_type` (`type_logement_id`),
  KEY `fk_annonce_statut` (`statut_id`),
  CONSTRAINT `fk_annonce_statut` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`id`),
  CONSTRAINT `fk_user_annonce` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_user_logement_type` FOREIGN KEY (`type_logement_id`) REFERENCES `logement_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annonce`
--

LOCK TABLES `annonce` WRITE;
/*!40000 ALTER TABLE `annonce` DISABLE KEYS */;
INSERT INTO `annonce` VALUES (1,3,'Chambre Privée, 13m²,10min du centre-ville à pied.',1,20.00,13.00,1,1,'Chambre de 13m² privée et très silencieuse (dans un appartement de 120m²), petit jardin de 15m² équipé d\'un salon de jardin, barbecue disponible. A 10min de la ville à pied, 2min d\'un arrêt de bus à pied.','rue des pompons',66000,'Perpignan',2,'14:00:00','14:00:00',0,1,1,1,1,0,0,0,'12:00:00',1),(2,3,'Chambre Privée, 13m²,10min du centre-ville à pied.',1,20.00,13.00,1,1,'Chambre de 13m² privée et très silencieuse (dans un appartement de 120m²), petit jardin de 15m² équipé d\'un salon de jardin, barbecue disponible. A 10min de la ville à pied, 2min d\'un arrêt de bus à pied.','rue des pompons',66000,'Perpignan',2,'14:00:00','14:00:00',0,1,1,1,1,0,0,0,'12:00:00',1),(3,3,'Chambre Privée, 13m²,10min du centre-ville à pied.',1,20.00,13.00,1,1,'Chambre de 13m² privée et très silencieuse (dans un appartement de 120m²), petit jardin de 15m² équipé d\'un salon de jardin, barbecue disponible. A 10min de la ville à pied, 2min d\'un arrêt de bus à pied.','rue des pompons',66000,'Perpignan',2,'14:00:00','14:00:00',0,1,1,1,1,0,0,0,'12:00:00',1),(4,3,'Chambre Privée, 13m²,10min du centre-ville à pied.',1,20.00,13.00,1,1,'Chambre de 13m² privée et très silencieuse (dans un appartement de 120m²), petit jardin de 15m² équipé d\'un salon de jardin, barbecue disponible. A 10min de la ville à pied, 2min d\'un arrêt de bus à pied.','rue des pompons',66000,'Perpignan',2,'14:00:00','14:00:00',0,1,1,1,1,0,0,0,'12:00:00',1),(5,3,'Chambre Privée, 13m²,10min du centre-ville à pied.',1,20.00,13.00,1,1,'Chambre de 13m² privée et très silencieuse (dans un appartement de 120m²), petit jardin de 15m² équipé d\'un salon de jardin, barbecue disponible. A 10min de la ville à pied, 2min d\'un arrêt de bus à pied.','rue des pompons',66000,'Perpignan',2,'14:00:00','14:00:00',0,1,1,1,1,0,0,0,'12:00:00',1),(6,3,'Chambre Privée, 13m²,10min du centre-ville à pied.',1,20.00,13.00,1,1,'Chambre de 13m² privée et très silencieuse (dans un appartement de 120m²), petit jardin de 15m² équipé d\'un salon de jardin, barbecue disponible. A 10min de la ville à pied, 2min d\'un arrêt de bus à pied.','rue des pompons',66000,'Perpignan',2,'14:00:00','14:00:00',0,1,1,1,1,0,0,0,'12:00:00',1),(7,3,'Chambre Privée, 13m²,10min du centre-ville à pied.',1,20.00,13.00,1,1,'Chambre de 13m² privée et très silencieuse (dans un appartement de 120m²), petit jardin de 15m² équipé d\'un salon de jardin, barbecue disponible. A 10min de la ville à pied, 2min d\'un arrêt de bus à pied.','rue des pompons',66000,'Perpignan',2,'14:00:00','14:00:00',0,1,1,1,1,0,0,0,'12:00:00',1);
/*!40000 ALTER TABLE `annonce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annonce_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `commentaire` text,
  PRIMARY KEY (`id`),
  KEY `fk_commentaire_annonce` (`annonce_id`),
  KEY `fk_commentaire_user` (`user_id`),
  CONSTRAINT `fk_commentaire_annonce` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_commentaire_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentaire`
--

LOCK TABLES `commentaire` WRITE;
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `commentaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favoris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `annonce_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_favoris_annonce` (`annonce_id`),
  KEY `fk_favoris_user` (`user_id`),
  CONSTRAINT `fk_favoris_annonce` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_favoris_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favoris`
--

LOCK TABLES `favoris` WRITE;
/*!40000 ALTER TABLE `favoris` DISABLE KEYS */;
INSERT INTO `favoris` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,2,1),(6,2,2),(7,2,3),(8,3,1),(9,3,2);
/*!40000 ALTER TABLE `favoris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annonce_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `arrivee` date NOT NULL,
  `depart` date NOT NULL,
  `voyageurs` int(11) NOT NULL,
  `courrier` text,
  PRIMARY KEY (`id`),
  KEY `fk_location_annonce` (`annonce_id`),
  KEY `fk_location_user` (`user_id`),
  CONSTRAINT `fk_location_annonce` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`),
  CONSTRAINT `fk_location_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logement_type`
--

DROP TABLE IF EXISTS `logement_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logement_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logement_type`
--

LOCK TABLES `logement_type` WRITE;
/*!40000 ALTER TABLE `logement_type` DISABLE KEYS */;
INSERT INTO `logement_type` VALUES (1,'chambre'),(2,'dépendance'),(3,'studio'),(4,'appartement'),(5,'maison de village'),(6,'villa');
/*!40000 ALTER TABLE `logement_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nav`
--

DROP TABLE IF EXISTS `nav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nav_user` (`user_id`),
  CONSTRAINT `fk_nav_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nav`
--

LOCK TABLES `nav` WRITE;
/*!40000 ALTER TABLE `nav` DISABLE KEYS */;
/*!40000 ALTER TABLE `nav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annonce_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_photo_annonce_id` (`annonce_id`),
  KEY `fk_photo_photo_type` (`type_id`),
  CONSTRAINT `fk_photo_annonce_id` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_photo_photo_type` FOREIGN KEY (`type_id`) REFERENCES `photo_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (1,1,1,'chambre','photos/e2534768ca9f12cc407be696ebdb3b41e1c8ad0a.jpg'),(2,1,1,'bureau','photos/131ce5fb9931135d3817a2bfe6139747ff654666.jpg'),(3,1,3,'terrasse','photos/a529581be273921d24e1afb9fdf23e01445848f2.jpg'),(5,2,1,'bureau','photos/131ce5fb9931135d3817a2bfe6139747ff654666.jpg'),(6,2,3,'terrasse','photos/a529581be273921d24e1afb9fdf23e01445848f2.jpg'),(7,3,1,'chambre','photos/e2534768ca9f12cc407be696ebdb3b41e1c8ad0a.jpg'),(8,3,1,'bureau','photos/131ce5fb9931135d3817a2bfe6139747ff654666.jpg'),(9,3,3,'terrasse','photos/a529581be273921d24e1afb9fdf23e01445848f2.jpg'),(10,4,1,'chambre','photos/e2534768ca9f12cc407be696ebdb3b41e1c8ad0a.jpg'),(11,4,1,'bureau','photos/131ce5fb9931135d3817a2bfe6139747ff654666.jpg'),(12,4,3,'terrasse','photos/a529581be273921d24e1afb9fdf23e01445848f2.jpg'),(13,5,1,'chambre','photos/e2534768ca9f12cc407be696ebdb3b41e1c8ad0a.jpg'),(14,5,1,'bureau','photos/131ce5fb9931135d3817a2bfe6139747ff654666.jpg'),(15,5,3,'terrasse','photos/a529581be273921d24e1afb9fdf23e01445848f2.jpg'),(16,6,1,'chambre','photos/e2534768ca9f12cc407be696ebdb3b41e1c8ad0a.jpg'),(17,6,1,'bureau','photos/131ce5fb9931135d3817a2bfe6139747ff654666.jpg'),(18,6,3,'terrasse','photos/a529581be273921d24e1afb9fdf23e01445848f2.jpg');
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_type`
--

DROP TABLE IF EXISTS `photo_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_type`
--

LOCK TABLES `photo_type` WRITE;
/*!40000 ALTER TABLE `photo_type` DISABLE KEYS */;
INSERT INTO `photo_type` VALUES (1,'presentation'),(2,'photo 1'),(3,'photo 2'),(4,'photo 4'),(5,'photo 5'),(6,'photo 6');
/*!40000 ALTER TABLE `photo_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `annonce_id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reservation_user` (`user_id`),
  KEY `fk_reservation_annonce` (`annonce_id`),
  CONSTRAINT `fk_reservation_annonce` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`),
  CONSTRAINT `fk_reservation_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,1,1,'2017-09-09','2017-09-25'),(2,2,1,'2017-09-27','2017-10-02'),(3,5,3,'2017-10-09','2017-10-25'),(4,5,3,'2017-09-09','2017-09-25'),(5,2,2,'2017-09-27','2017-10-02'),(6,1,2,'2017-10-09','2017-10-25'),(7,1,1,'2017-08-28','2017-08-29'),(8,1,1,'2017-08-28','2017-08-29'),(9,1,1,'2017-08-28','2017-08-29'),(10,1,1,'2017-08-28','2017-08-29'),(11,1,1,'2017-08-28','2017-08-29'),(12,1,1,'2017-08-28','2017-08-29'),(13,1,1,'2017-08-28','2017-08-29'),(14,1,1,'2017-08-28','2017-08-29'),(15,1,1,'2017-08-28','2017-08-29'),(16,1,1,'2017-08-28','2017-08-29'),(17,1,1,'2017-08-28','2017-08-29'),(18,1,1,'2017-08-28','2017-08-29'),(19,1,1,'2017-08-29','2017-08-30'),(20,1,1,'2017-10-31','2017-11-03');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statut`
--

DROP TABLE IF EXISTS `statut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statut`
--

LOCK TABLES `statut` WRITE;
/*!40000 ALTER TABLE `statut` DISABLE KEYS */;
INSERT INTO `statut` VALUES (1,'en attente'),(2,'a verifier'),(3,'verifier'),(4,'a valider'),(5,'validé');
/*!40000 ALTER TABLE `statut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `wp` varchar(255) NOT NULL,
  `inscription` datetime NOT NULL,
  `connexion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_user_usertype` (`type_id`),
  CONSTRAINT `fk_user_usertype` FOREIGN KEY (`type_id`) REFERENCES `user_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Frédéric','fred@mail.com',1,'8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','2017-08-24 09:30:33','2017-08-29 15:40:49'),(2,'Valerie','val@mail.com',2,'259f22ddc4876510cf309100b93d84df13a9bb279c75b89a3acadf3b63049081','2017-08-24 09:30:33','2017-08-29 15:53:26'),(3,'Paul','paul@mail.com',3,'0357513deb903a056e74a7e475247fc1ffe31d8be4c1d4a31f58dd47ae484100','2017-08-24 09:30:33','2017-08-29 15:42:32'),(4,'Pierre','pierre@mail.com',4,'d5a5d66b94e8da0cf63d4cd6d66cd489d78e77b697039c6c48e3ff8d81752139','2017-08-24 09:30:33','2017-08-29 15:49:01'),(5,'Alfonso','alfonso@mail.com',4,'c7e52d8590eaed2bc3558eacd21b5ed7d1ac0770507440f8bc2748308090bc77','2017-08-24 09:30:33','2017-08-24 09:30:33');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'Admin'),(2,'Validator'),(3,'Loueur'),(4,'User');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-29 16:44:59
