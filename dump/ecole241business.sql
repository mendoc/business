-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: ecole241business
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.10.1

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
-- Table structure for table `eb_candidat`
--

DROP TABLE IF EXISTS `eb_candidat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_candidat` (
  `id_can` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(250) NOT NULL,
  `num_tel` varchar(20) NOT NULL,
  `num_what` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `date_n` date NOT NULL,
  `domaine_act` text,
  `type_serv` text,
  `attentes` text,
  `horaire` varchar(10) NOT NULL,
  `id_res_part` int(11) DEFAULT NULL,
  `type_cours` char(1) NOT NULL DEFAULT 'P',
  PRIMARY KEY (`id_can`),
  UNIQUE KEY `email` (`email`),
  KEY `id_res_part` (`id_res_part`),
  CONSTRAINT `eb_candidat_ibfk_1` FOREIGN KEY (`id_res_part`) REFERENCES `eb_ressource_partage` (`id_res_part`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_candidat`
--

LOCK TABLES `eb_candidat` WRITE;
/*!40000 ALTER TABLE `eb_candidat` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_candidat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_commercial`
--

DROP TABLE IF EXISTS `eb_commercial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_commercial` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(250) NOT NULL,
  `num_tel` varchar(20) DEFAULT NULL,
  `num_what` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `date_n` date NOT NULL,
  `nom_util` varchar(250) NOT NULL,
  `mot_passe` varchar(200) NOT NULL,
  PRIMARY KEY (`id_com`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nom_util` (`nom_util`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_commercial`
--

LOCK TABLES `eb_commercial` WRITE;
/*!40000 ALTER TABLE `eb_commercial` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_commercial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_gestionnaire`
--

DROP TABLE IF EXISTS `eb_gestionnaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_gestionnaire` (
  `id_gest` int(11) NOT NULL AUTO_INCREMENT,
  `mot_passe` varchar(200) NOT NULL,
  `nom_prenom` varchar(250) NOT NULL,
  `email_gest` varchar(40) NOT NULL,
  PRIMARY KEY (`id_gest`),
  UNIQUE KEY `email_gest` (`email_gest`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_gestionnaire`
--

LOCK TABLES `eb_gestionnaire` WRITE;
/*!40000 ALTER TABLE `eb_gestionnaire` DISABLE KEYS */;
INSERT INTO `eb_gestionnaire` VALUES (1,'1234','Richard OGOULA','roland@yopmial.com');
/*!40000 ALTER TABLE `eb_gestionnaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_paiement`
--

DROP TABLE IF EXISTS `eb_paiement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_paiement` (
  `id_paie` int(11) NOT NULL AUTO_INCREMENT,
  `montant` int(11) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `motif` text,
  `id_gest` int(11) NOT NULL,
  `id_can` int(11) NOT NULL,
  PRIMARY KEY (`id_paie`),
  KEY `id_gest` (`id_gest`),
  KEY `id_can` (`id_can`),
  CONSTRAINT `eb_paiement_ibfk_1` FOREIGN KEY (`id_gest`) REFERENCES `eb_gestionnaire` (`id_gest`),
  CONSTRAINT `eb_paiement_ibfk_2` FOREIGN KEY (`id_can`) REFERENCES `eb_candidat` (`id_can`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_paiement`
--

LOCK TABLES `eb_paiement` WRITE;
/*!40000 ALTER TABLE `eb_paiement` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_paiement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_ressource`
--

DROP TABLE IF EXISTS `eb_ressource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_ressource` (
  `id_res` int(11) NOT NULL AUTO_INCREMENT,
  `nom_res` varchar(250) NOT NULL,
  `lien` text,
  `fichier` varchar(255) DEFAULT NULL,
  `date_res` datetime DEFAULT CURRENT_TIMESTAMP,
  `type_res` varchar(15) DEFAULT NULL,
  `id_them` int(11) DEFAULT NULL,
  `id_gest` int(11) NOT NULL,
  PRIMARY KEY (`id_res`),
  KEY `id_them` (`id_them`),
  KEY `id_gest` (`id_gest`),
  CONSTRAINT `eb_ressource_ibfk_1` FOREIGN KEY (`id_them`) REFERENCES `eb_thematique` (`id_them`),
  CONSTRAINT `eb_ressource_ibfk_2` FOREIGN KEY (`id_gest`) REFERENCES `eb_gestionnaire` (`id_gest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_ressource`
--

LOCK TABLES `eb_ressource` WRITE;
/*!40000 ALTER TABLE `eb_ressource` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_ressource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_ressource_partage`
--

DROP TABLE IF EXISTS `eb_ressource_partage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_ressource_partage` (
  `id_res_part` int(11) NOT NULL AUTO_INCREMENT,
  `date_part` datetime DEFAULT CURRENT_TIMESTAMP,
  `lien_gen` text,
  `nbr_visite` int(11) DEFAULT NULL,
  `id_res` int(11) NOT NULL,
  `id_com` int(11) NOT NULL,
  PRIMARY KEY (`id_res`,`id_com`),
  KEY `id_com` (`id_com`),
  KEY `id_res_part` (`id_res_part`),
  CONSTRAINT `eb_ressource_partage_ibfk_1` FOREIGN KEY (`id_res`) REFERENCES `eb_ressource` (`id_res`),
  CONSTRAINT `eb_ressource_partage_ibfk_2` FOREIGN KEY (`id_com`) REFERENCES `eb_commercial` (`id_com`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_ressource_partage`
--

LOCK TABLES `eb_ressource_partage` WRITE;
/*!40000 ALTER TABLE `eb_ressource_partage` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_ressource_partage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_retrait`
--

DROP TABLE IF EXISTS `eb_retrait`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_retrait` (
  `id_ret` int(11) NOT NULL AUTO_INCREMENT,
  `date_ret` datetime DEFAULT CURRENT_TIMESTAMP,
  `montant_retrait` int(11) NOT NULL,
  `date_fin` datetime DEFAULT NULL,
  `date_debut` datetime DEFAULT NULL,
  `id_com` int(11) NOT NULL,
  `id_gest` int(11) DEFAULT NULL,
  `num_ret` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ret`),
  KEY `id_com` (`id_com`),
  KEY `id_gest` (`id_gest`),
  CONSTRAINT `eb_retrait_ibfk_1` FOREIGN KEY (`id_com`) REFERENCES `eb_commercial` (`id_com`),
  CONSTRAINT `eb_retrait_ibfk_2` FOREIGN KEY (`id_gest`) REFERENCES `eb_gestionnaire` (`id_gest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_retrait`
--

LOCK TABLES `eb_retrait` WRITE;
/*!40000 ALTER TABLE `eb_retrait` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_retrait` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_thematique`
--

DROP TABLE IF EXISTS `eb_thematique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_thematique` (
  `id_them` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id_them`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_thematique`
--

LOCK TABLES `eb_thematique` WRITE;
/*!40000 ALTER TABLE `eb_thematique` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_thematique` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-03 16:17:49
