-- Progettazione Web 
DROP DATABASE if exists greenservice; 
CREATE DATABASE greenservice; 
USE greenservice; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: greenservice
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `attualeprenotazione`
--

DROP TABLE IF EXISTS `attualeprenotazione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attualeprenotazione` (
  `descrizione` varchar(255) NOT NULL,
  `quantita` int(11) DEFAULT NULL,
  PRIMARY KEY (`descrizione`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attualeprenotazione`
--

LOCK TABLES `attualeprenotazione` WRITE;
/*!40000 ALTER TABLE `attualeprenotazione` DISABLE KEYS */;
/*!40000 ALTER TABLE `attualeprenotazione` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attualeprenotazionecdr`
--

DROP TABLE IF EXISTS `attualeprenotazionecdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attualeprenotazionecdr` (
  `descrizione` varchar(255) NOT NULL,
  `quantita` int(11) DEFAULT NULL,
  PRIMARY KEY (`descrizione`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attualeprenotazionecdr`
--

LOCK TABLES `attualeprenotazionecdr` WRITE;
/*!40000 ALTER TABLE `attualeprenotazionecdr` DISABLE KEYS */;
/*!40000 ALTER TABLE `attualeprenotazionecdr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dettaglioprenotazione`
--

DROP TABLE IF EXISTS `dettaglioprenotazione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dettaglioprenotazione` (
  `nprenotazione` int(11) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `quantita` int(11) DEFAULT NULL,
  PRIMARY KEY (`nprenotazione`,`descrizione`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dettaglioprenotazione`
--

LOCK TABLES `dettaglioprenotazione` WRITE;
/*!40000 ALTER TABLE `dettaglioprenotazione` DISABLE KEYS */;
INSERT INTO `dettaglioprenotazione` VALUES (5,'ANGOLIERA',1),(5,'ANTA ARMADIO IN LEGNO',3),(5,'ANTA ARMADIO IN METALLO',3),(6,'ANGOLIERA',1),(6,'ANTA ARMADIO IN LEGNO',3),(6,'ANTA ARMADIO IN METALLO',3),(7,'ANGOLIERA',1),(8,'ANGOLIERA CUCINA',1),(10,'ALTALENA',1),(11,'ANGOLIERA CUCINA',1),(12,'ANTA ARMADIO IN METALLO',1),(13,'ANTENNA',1),(14,'ANGOLIERA CUCINA',1),(15,'ANGOLIERA CUCINA',1),(16,'ANGOLIERA',1),(17,'ANGOLIERA',1),(18,'ANGOLIERA',1),(19,'ANGOLIERA',1),(20,'ANGOLIERA CUCINA',1),(21,'ANGOLIERA',1),(22,'ANGOLIERA',1),(23,'ANGOLIERA',1),(24,'ANGOLIERA',1),(25,'ANGOLIERA',1),(26,'ANGOLIERA CUCINA',1),(27,'ACQUARIO',1),(28,'ANGOLIERA',1),(29,'ANGOLIERA',1),(30,'ANGOLIERA CUCINA',1),(31,'ANGOLIERA CUCINA',1),(32,'ANTA ARMADIO IN LEGNO',1),(33,'ACQUARIO',1),(37,'ANTA ARMADIO IN LEGNO',1),(38,'ANGOLIERA',1),(39,'ANTA ARMADIO IN LEGNO',1),(40,'ALTALENA',1);
/*!40000 ALTER TABLE `dettaglioprenotazione` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dettaglioprenotazionecdr`
--

DROP TABLE IF EXISTS `dettaglioprenotazionecdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dettaglioprenotazionecdr` (
  `nprenotazione` int(11) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `quantita` int(11) DEFAULT NULL,
  PRIMARY KEY (`nprenotazione`,`descrizione`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dettaglioprenotazionecdr`
--

LOCK TABLES `dettaglioprenotazionecdr` WRITE;
/*!40000 ALTER TABLE `dettaglioprenotazionecdr` DISABLE KEYS */;
INSERT INTO `dettaglioprenotazionecdr` VALUES (1,'ABITI USATI',1),(2,'ASCIUGACAPELLI (PHON)',1),(3,'ASCIUGACAPELLI (PHON)',1),(4,'BACINELLE',1),(5,'ALBERO DI NATALE SINTETICO',1),(6,'ALBERO DI NATALE',1),(7,'ASPIRAPOLVERE',1),(8,'ALBERO DI NATALE',1),(9,'ALBERO DI NATALE',1),(10,'ASCIUGACAPELLI (PHON)',1),(11,'ASCIUGACAPELLI (PHON)',1),(12,'ALBERO DI NATALE SINTETICO',1);
/*!40000 ALTER TABLE `dettaglioprenotazionecdr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prenotazione`
--

DROP TABLE IF EXISTS `prenotazione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prenotazione` (
  `nprenotazione` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `statoticket` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`nprenotazione`,`data`,`ora`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prenotazione`
--

LOCK TABLES `prenotazione` WRITE;
/*!40000 ALTER TABLE `prenotazione` DISABLE KEYS */;
INSERT INTO `prenotazione` VALUES (6,'2021-09-13','08:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(7,'2021-09-10','07:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(9,'2021-09-10','10:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(11,'2021-09-11','07:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(12,'2021-09-11','11:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(13,'2021-09-09','09:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(14,'2021-09-10','05:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(15,'2021-09-10','06:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(16,'2021-09-10','08:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(17,'2021-09-10','09:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(18,'2021-09-10','11:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(19,'2021-09-10','12:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(20,'2021-09-10','13:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(21,'2021-09-10','14:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(22,'2021-09-10','15:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(23,'2021-09-10','16:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(24,'2021-09-10','17:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(25,'2021-09-10','18:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(26,'2021-09-10','19:00:00','l.ceccanti4@studenti.unipi.it','RITIRATO'),(31,'2021-09-11','16:00:00','rachele.morelli69@gmail.com','RITIRATO'),(32,'2021-09-15','10:00:00','rachele.morelli69@gmail.com','DA RITIRARE'),(33,'2021-09-13','11:00:00','rachele.morelli69@gmail.com','RITIRATO'),(37,'2021-09-14','09:00:00','a@a.it','DA RITIRARE'),(38,'2021-09-13','06:00:00','rachele.morelli69@gmail.com','RITIRATO'),(39,'2021-09-29','12:00:00','rachele.morelli69@gmail.com','DA RITIRARE'),(40,'2021-09-24','11:00:00','rachele.morelli69@gmail.com','DA RITIRARE');
/*!40000 ALTER TABLE `prenotazione` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prenotazionecdr`
--

DROP TABLE IF EXISTS `prenotazionecdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prenotazionecdr` (
  `nprenotazione` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`nprenotazione`,`data`,`ora`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prenotazionecdr`
--

LOCK TABLES `prenotazionecdr` WRITE;
/*!40000 ALTER TABLE `prenotazionecdr` DISABLE KEYS */;
INSERT INTO `prenotazionecdr` VALUES (1,'2021-09-13','08:00:00','rachele.morelli69@gmail.com'),(2,'2021-09-22','05:30:00','rachele.morelli69@gmail.com'),(3,'2021-09-22','06:30:00','rachele.morelli69@gmail.com'),(4,'2021-09-22','05:00:00','rachele.morelli69@gmail.com'),(5,'2021-09-22','07:30:00','rachele.morelli69@gmail.com'),(6,'2021-09-22','15:30:00','rachele.morelli69@gmail.com'),(7,'2021-09-22','05:15:00','rachele.morelli69@gmail.com'),(8,'2021-09-22','05:45:00','rachele.morelli69@gmail.com'),(9,'2021-09-22','16:45:00','rachele.morelli69@gmail.com'),(10,'2021-09-22','06:00:00','rachele.morelli69@gmail.com'),(11,'2021-09-24','06:15:00','rachele.morelli69@gmail.com'),(12,'2021-09-24','07:00:00','rachele.morelli69@gmail.com');
/*!40000 ALTER TABLE `prenotazionecdr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reclamo`
--

DROP TABLE IF EXISTS `reclamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reclamo` (
  `istanteinvio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `categoria` varchar(45) DEFAULT NULL,
  `testo` longtext,
  `username` varchar(255) DEFAULT NULL,
  `risposta` longtext,
  `nreclamo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`nreclamo`,`istanteinvio`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reclamo`
--

LOCK TABLES `reclamo` WRITE;
/*!40000 ALTER TABLE `reclamo` DISABLE KEYS */;
INSERT INTO `reclamo` VALUES ('2021-09-13 22:13:57','dichiarazionepositivitacovid-19',' Buonasera, vorrei informarvi che sono risultato positivo al COVID-19 dal giorno 10/09 scorso. Pertanto richiedo l\'attivazione del servizio Rifiuti Speciali. In attesa di una vostra risposta, cordiali saluti.','rachele.morelli69@gmail.com',' Buonasera Sig.ra Rachele\r\nCi dispiace di quanto le Ã¨ accaduto.\r\nProvvedermo ad attivarle il servizio a partire da domani.\r\nCordialmente',9),('2021-09-14 10:12:03','smarrimentocontenitore','Oggi ho perso il cassonetto della raccolta della plastica.. Come posso fare?\r\nGrazie','rachele.morelli69@gmail.com',' Invii una mail a info@greenservicespa.com contente:\r\n - fotocopia del documento di identitÃ \r\n - fotocopia della tessera sanitaria.\r\nLe richieste di questo tipo vengono generalmente espletate in max. 7 giorni lavorativi.\r\nCordialmente',10),('2021-09-14 10:20:20','mancatoritiropap','Oggi in data 14.09.2021 il sottoscritto dichiara che il servizio della raccolta carta (Porta a Porta) non Ã¨ stato effettuato in tutto il mio quartiere. Un comportamento del genere Ã¨ inaccettabile e pretendo immediatamente delle spiegazioni.','l.ceccanti4@studenti.unipi.it','Buongiorno, ci dispiace del disagio a Lei creato.\r\nPer scusarci la contatteremo in giornata al suo numero di cellulare per concordare un appuntamento per un nuovo ritiro immediato presso il suo domicilio.\r\nCordialmente,\r\nRossi M.\r\nGreen Service SpA',11);
/*!40000 ALTER TABLE `reclamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rifiuto`
--

DROP TABLE IF EXISTS `rifiuto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rifiuto` (
  `nome` varchar(255) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `sinonimo1` varchar(255) DEFAULT NULL,
  `sinonimo2` varchar(255) DEFAULT NULL,
  `sinonimo3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rifiuto`
--

LOCK TABLES `rifiuto` WRITE;
/*!40000 ALTER TABLE `rifiuto` DISABLE KEYS */;
INSERT INTO `rifiuto` VALUES ('ABITI USATI','AREA ECOLOGICA',NULL,NULL,NULL),('ACCENDINO','INDIFFERENZIATO',NULL,NULL,NULL),('ACCESSORI BAGNO','INGOMBRANTI',NULL,NULL,NULL),('ACQUARAGIA','AREA ECOLOGICA',NULL,NULL,NULL),('ACQUARIO','INGOMBRANTI',NULL,NULL,NULL),('ADDOBBI NATALIZI','INDIFFERENZIATO',NULL,NULL,NULL),('AGENDA DI CARTA','CARTA',NULL,NULL,NULL),('AGHI','INDIFFERENZIATO',NULL,NULL,NULL),('ALBERO DI NATALE','AREA ECOLOGICA',NULL,NULL,NULL),('ALBERO DI NATALE SINTETICO','AREA ECOLOGICA',NULL,NULL,NULL),('ALIMENTI AVARIATI','ORGANICO',NULL,NULL,NULL),('ALTALENA','INGOMBRANTI',NULL,NULL,NULL),('ANGOLIERA','INGOMBRANTI',NULL,NULL,NULL),('ANGOLIERA CUCINA','INGOMBRANTI','CUCINA',NULL,NULL),('ANTA ARMADIO IN LEGNO','INGOMBRANTI','ARMADIO IN LEGNO','IN LEGNO','LEGONO'),('ANTA ARMADIO IN METALLO','INGOMBRANTI','ARMADIO IN METALLO','IN METALLO','METALLO'),('ANTA BOX DOCCIA','INGOMBRANTI','BOX','DOCCIA','BOX DOCCIA'),('ANTA MOBILE CUCINA','INGOMBRANTI','MOBILE CUCINA','CUCINA',NULL),('ANTENNA','INGOMBRANTI',NULL,NULL,NULL),('ANTINE IN FERRO','INGOMBRANTI','IN FERRO','FERRO',NULL),('ARMADIETTO IN FERRO','INGOMBRANTI','IN FERRO','FERRO',NULL),('ARMADIO 1 ANTA (SMONTATO)','INGOMBRANTI',NULL,NULL,NULL),('ARMADIO 2 ANTE (SMONTATO)','INGOMBRANTI',NULL,NULL,NULL),('ARMADIO 3 ANTE (SMONTATO)','INGOMBRANTI',NULL,NULL,NULL),('ARMADIO 4/5/6 ANTE (SMONTATO)','INGOMBANTI',NULL,NULL,NULL),('ARMADIO A PONTE (SMONTATO)','INGOMBRANTI',NULL,NULL,NULL),('ARMADIO IN FERRO','INGOMBRANTI',NULL,NULL,NULL),('ASCIUGACAPELLI (PHON)','AREA ECOLOGICA','PHON',NULL,NULL),('ASCIUGATRICE','INGOMBRANTI',NULL,NULL,NULL),('ASPIRAPOLVERE','AREA ECOLOGICA',NULL,NULL,NULL),('ASSE DA STIRO','AREA ECOLOGICA',NULL,NULL,NULL),('ASSORBENTI IGIENICI','INDIFFERENZIATO',NULL,NULL,NULL),('ASTUCCI','INDIFFERENZIATO',NULL,NULL,NULL),('ASTUCCI DI RULLINI FOTOGRAFICI','MULTIMATERIALE',NULL,NULL,NULL),('ATTACCAPANNI','INGOMBRANTI',NULL,NULL,NULL),('ATTREZZO DA GIARDINO','INGOMBRANTI','DA GIARDINO','GIARDINO',NULL),('ATTREZZO GINNICO','INGOMBRANTI','GINNICO',NULL,NULL),('ATTREZZO GINNICO GRANDE','INGOMBRANTI','GINNICO GRANDE','GRANDE',NULL),('ATTREZZO GINNICO PICCOLO','INGOMBRANTI','GINNICO PICCOLO','PICCOLO',NULL),('ATTREZZO IN FERRO','INGOMBRANTI','IN FERRO','FERRO',NULL),('AVANZI DI CUCINA','ORGANICO',NULL,NULL,NULL),('BACINELLE','AREA ECOLOGICA',NULL,NULL,NULL),('BAMBOLE','INDIFFERENZIATO',NULL,NULL,NULL),('BANCALI','AREA ECOLOGICA',NULL,NULL,NULL),('BANDIERE','AREA ECOLOGICA',NULL,NULL,NULL),('BARATTOLI PER ALIMENTI IN PLASTICA','MULTIMATERIALE',NULL,NULL,NULL),('BARATTOLI PER ALIMENTI IN VETRO','AREA ECOLOGICA',NULL,NULL,NULL),('BARRE DA IMBALLAGGIO IN POLISTIROLO','MULTIMATERIALE',NULL,NULL,NULL),('BASTONCINI COTONATI USA E GETTA (PER ORECCHIE)','INDIFFERENZIATO',NULL,NULL,NULL),('BATTERIA AUTO','AREA ECOLOGICA',NULL,NULL,NULL),('BATTERIA CELLULARE','AREA ECOLOGICA',NULL,NULL,NULL),('BATUFFOLI DI COTONE (USATI)','INDIFFERENZIATO',NULL,NULL,NULL),('BICCHIERI E PIATTI IN PLASTICA','MULTIMATERIALE','BICCHIERI','PIATTI','PLASTICA'),('BICICLETTA','INGOMBRANTI',NULL,NULL,NULL),('BIGIOTTERIA','INDIFFERENZIATO','GIOIELLI',NULL,NULL),('BILANCIA','AREA ECOLOGICA',NULL,NULL,NULL),('BISCOTTI','ORGANICO',NULL,NULL,NULL),('BISTECCHIERA ELETTRICA','AREA ECOLOGICA',NULL,NULL,NULL),('BISTECCHIERE - PIASTRE DI GHISA','INDIFFERENZIATO',NULL,NULL,NULL),('BLISTER VUOTI','MULTIMATERIALE',NULL,NULL,NULL),('BOILER','AREA ECOLOGICA',NULL,NULL,NULL),('BOMBOLETTA SPRAY CONTENENTE GAS INFIAMMABILE','AREA ECOLOGICA',NULL,NULL,NULL),('BOMBOLETTA SPRAY VUOTA PER ALIMENTI','MULTIMATERIALE',NULL,NULL,NULL),('BOMBOLETTA SPRAY VUOTA PER L\'IGIENE PERSONALE','MULTIMATERIALE',NULL,NULL,NULL),('BORSE','AREA ECOLOGICA',NULL,NULL,NULL),('BOTTIGLIA DI PLASTICA VUOTA PER ALIMENTI','MULTIMATERIALE',NULL,NULL,NULL),('BOTTIGLIA VUOTA DI FERRO','AREA ECOLOGICA',NULL,NULL,NULL),('BOTTONI','INDIFFERENZIATO',NULL,NULL,NULL),('BUCCE DI FRUTTA O VERDURA','ORGANICO',NULL,NULL,NULL),('BULLONERIA','AREA ECOLOGICA',NULL,NULL,NULL),('BUSTE DI CARTA','CARTA',NULL,NULL,NULL),('BUSTE DI NYLON','MULTIMATERIALE',NULL,NULL,NULL),('BUSTE FORATE TRASPARENTI IN PLASTICA','INDIFFERENZIATO',NULL,NULL,NULL),('CALCINACCI','AREA ECOLOGICA',NULL,NULL,NULL),('CALCOLATRICE','AREA ECOLOGICA',NULL,NULL,NULL),('CALENDARIO (togliere le parti non in carta)','CARTA',NULL,NULL,NULL),('CALZE DI NYLON','INDIFFERENZIATO',NULL,NULL,NULL),('CANCELLERIA (MATITE, PENNE, RIGHELLI, ETC.)','INDIFFERENZIATO','MATITE','PENNE','RIGHELLI'),('CAPELLI','INDIFFERENZIATO',NULL,NULL,NULL),('CAPPELLI','AREA ECOLOGICA',NULL,NULL,NULL),('CAPSULE CAFFE\'','INDIFFERENZIATO',NULL,NULL,NULL),('CARAFFE DI CERAMICA O TERRACOTTA','INDIFFERENZIATO',NULL,NULL,NULL),('CARAFFE DI VETRO','AREA ECOLOGICA',NULL,NULL,NULL),('CARTA ACCOPPIATA CON ALLUMINIO','INDIFFERENZIATO',NULL,NULL,NULL),('CARTA ASSORBENTE DA CUCINA BAGNATA O UNTA DI CIBO','ORGANICO',NULL,NULL,NULL),('CARTA ASSORBENTE NON UNTA O BAGNATA','CARTA',NULL,NULL,NULL),('CARTA CARBONE','INDIFFERENZIATO',NULL,NULL,NULL),('CARTA DA FORNO','INDIFFERENZIATO',NULL,NULL,NULL),('CARTA DA PACCHI','CARTA',NULL,NULL,NULL),('CARTA LUCIDA DA DISEGNO','INDIFFERENZIATO',NULL,NULL,NULL),('CARTA OLEATA PER ALIMENTI','INDIFFERENZIATO',NULL,NULL,NULL),('CARTA PER AFFETTATI E FORMAGGIO','INDIFFERENZIATO',NULL,NULL,NULL),('CARTA PERGAMENA','CARTA',NULL,NULL,NULL),('CARTA PLASTIFICATA','INDIFFERENZIATO',NULL,NULL,NULL),('CARTA SPORCA DI PRODOTTI DETERGENTI','INDIFFERENZIATO',NULL,NULL,NULL),('CARTA STAGNOLA DA CUCINA','MULTIMATERIALE',NULL,NULL,NULL),('CARTA VETRATA','INDIFFERENZIATO',NULL,NULL,NULL),('CARTONE DELLA PIZZA (PULITO)','CARTA','VASSOIO','PIZZA',NULL),('CARTONE DELLA PIZZA (SPORCO DI UNTO E RESIDUI)','ORGANICO',NULL,NULL,NULL),('CARTONE ONDULATO','CARTA',NULL,NULL,NULL),('CARTONI PER BEVANDE ALIMENTI (TETRAPAK)','MULTIMATERIALE',NULL,NULL,NULL),('CARTONLEGNO PER MODELLISMO','AREA ECOLOGICA',NULL,NULL,NULL),('CARTUCCE DI INCHIOSTRO','AREA ECOLOGICA',NULL,NULL,NULL),('CASCO PER MOTO','AREA ECOLOGICA',NULL,NULL,NULL),('CASSETTE AUDIO E VIDEO E RELATIVE CUSTODIE','INDIFFERENZIATO',NULL,NULL,NULL),('CASSETTE DI CARTONE PER ORTOFRUTTA','CARTA','ORTOFRUTTA',NULL,NULL),('CASSETTE DI LEGNO PER ORTOFRUTTA','AREA ECOLOGICA','ORTOFRUTTA',NULL,NULL),('CASSETTE DI PLASTICA PER ORTOFRUTTA','MULTIMATERIALE','ORTOFRUTTA',NULL,NULL),('CD E RELATIVE CUSTODIE','INDIFFERENZIATO','CUSTODIA','CUSTODIE','DISCO'),('CELLOPHANE','MULTIMATERIALE',NULL,NULL,NULL),('CELLULARE','AREA ECOLOGICA','TELEFONO',NULL,NULL),('CENERE SPENTA DI CAMINETTO','ORGANICO',NULL,NULL,NULL),('CERA','INDIFFERENZIATO',NULL,NULL,NULL),('CERA PER LEGNO','AREA ECOLOGICA',NULL,NULL,NULL),('CERAMICHE','INDIFFERENZIATO',NULL,NULL,NULL),('CERCHIONI','INGOMBRANTI',NULL,NULL,NULL),('CEROTTI','INDIFFERENZIATO',NULL,NULL,NULL),('CESTI','AREA ECOLOGICA',NULL,NULL,NULL),('CESTINO DI VIMINI TRATTATO','INDIFFERENZIATO',NULL,NULL,NULL),('CHIUSURA CARTA STAGNOLA YOGURT','MULTIMATERIALE','STAGNOLA',NULL,NULL),('CHIUSURE METALLICHE PER VASETTI IN VETRO','MULTIMATERIALE',NULL,NULL,NULL),('CIALDE IN TELA PER CAFFE\' O TE\'','ORGANICO','CIALDE CAFFE\'','CIALDE THE\'',''),('CINTURA','AREA ECOLOGICA',NULL,NULL,NULL),('COLLA CHIMICA','AREA ECOLOGICA',NULL,NULL,NULL),('COMPUTER (PC, LAPTOP)','AREA ECOLOGICA','LAPTOP','PORTATILE','PC'),('CONDIZIONATORE','AREA ECOLOGICA','CLIMATIZZATORE',NULL,NULL),('CONFEZIONI IN CARTONE','CARTA','CONFEZIONE SALE','CONFEZIONE ZUCCHERO','CONFEZIONE BISCOTTI'),('CONFEZIONI IN PLASTICA','MULTIMATERIALE','BUSTA PER LA PASTA','INVOLUCRO MERENDINA',NULL),('CONFEZIONI SAGOMATE IN PLASTICA','MULTIMATERIALE','BLISTER','CONTENITORI RIGIDI FORMATI A SAGOMA',NULL),('CRETA','INDIFFERENZIATO','DAS',NULL,NULL),('CRISTALLO','INDIFFERENZIATO',NULL,NULL,NULL),('CUOIO','INDIFFERENZIATO',NULL,NULL,NULL),('CUSCINO','INDIFFERENZIATO',NULL,NULL,NULL),('DAMIGIANA IN VETRO (SENZA VESTE)','INGOMBRANTI',NULL,NULL,NULL),('DEIZIONI DI ANIMALI','INDIFFERENZIATO','FECI DI CANE','FECI DI GATTO','FECI DI ANIMALE'),('DENTIFRICIO (TUBETTO VUOTO)','MULTIMATERIALE','TUBETTO DI DENTIFRICIO',NULL,NULL),('DEPLIANT (NON PLASTIFICATO)','CARTA',NULL,NULL,NULL),('DILUENTE','AREA ECOLOGICA',NULL,NULL,NULL),('DISCHI IN VINILE','INDIFFERENZIATO','LP','VINILE',NULL),('DISERBANTE','AREA ECOLOGICA',NULL,NULL,NULL),('DIVANO','INGOMBRANTI',NULL,NULL,NULL),('DOGHE','INGOMBRANTI',NULL,NULL,NULL),('DOPPI VETRI','AREA ECOLOGICA',NULL,NULL,NULL),('DVD E RELATIVE CUSTODIE','INDIFFERENZIATO','DISCO','CUSTODIA','CUSTODIE'),('ELASTICI','INDIFFERENZIATO','GOMMINI',NULL,NULL),('ETICHETTE ADESIVE O DI INDUMENTI','INDIFFERENZIATO','ADESIVI','ETICHETTE DI INDUMENTI',NULL),('FARMACI SCADUTI','AREA ECOLOGICA',NULL,NULL,NULL),('FAZZOLETTI DI CARTA SPORCHI','INDIFFERENZIATO',NULL,NULL,NULL),('FELTRINI','INDIFFERENZIATO',NULL,NULL,NULL),('FERRO DA STIRO','AREA ECOLOGICA',NULL,NULL,NULL),('FIAMMIFERI USATI','ORGANICO',NULL,NULL,NULL),('FILI ELETTRICI','INDIFFERENZIATO','CAVI ELETTRICI',NULL,NULL),('FILO DA CUCIRE','INDIFFERENZIATO','FILO PER CUCITURA',NULL,NULL),('FILO INTERDENTALE','INDIFFERENZIATO',NULL,NULL,NULL),('FILTRO CARAFFA ACQUA','INDIFFERENZIATO',NULL,NULL,NULL),('FILTRO IN TESSUTO DA TE\', CAMOMILLA, TISANE','ORGANICO','FILTRO TE\'','FILTRO CAMOMILLA','FILTRO TISANA'),('FINESTRE DI LEGNO','INGOMBRANTI',NULL,NULL,NULL),('FINESTRE IN ALLUMINIO','INGOMBRANTI',NULL,NULL,NULL),('FIORI FINIT','INDIFFERENZIATO',NULL,NULL,NULL),('FIORIERE DI TERRACOTTA','AREA ECOLOGICA',NULL,NULL,NULL),('FLACONI VUOTI IN PLASTICA','MULTIMATERIALE',NULL,NULL,NULL),('FLACONI VUOTI IN VETRO','AREA ECOLOGICA',NULL,NULL,NULL),('FLOPPY DISK','INDIFFERENZIATO',NULL,NULL,NULL),('FOGLI DI PROTEZIONE IN ALLUMINIO PER ALIMENTI','MULTIMATERIALE','INVOLUCRO CIOCCOLATA','INVOLUCRO TORRONE','INCARTO IN ALLUMINIO'),('FOGLI IN ALLUMINIO (USO DOMESTICO)','MULTIMATERIALE','ALLUMINIO',NULL,NULL),('FONDI DI CAFFE\' O TE\'','ORGANICO','RESIDUI CAFFE0','RESIDUI TE\'',NULL),('FORMAGGIO','ORGANICO','SCARTI DI FORMAGGIO','SCARTO DI FORMAGGIO',NULL),('FORNO ELETTRICO','INGOMBRANTI',NULL,NULL,NULL),('FOTOGRAFIE','INDIFFERENZIATO',NULL,NULL,NULL),('FRIGORIFERO','INGOMBRANTI',NULL,NULL,NULL),('FRUTTA','ORGANICO',NULL,NULL,NULL),('GIOCATTOLI','INDIFFERENZIATO','GIOCHI',NULL,NULL),('GIOCATTOLI ELETTRICI / ELETTRONICI','AREA ECOLOGICA',NULL,NULL,'GIOCHI'),('GIORNALI','CARTA',NULL,NULL,NULL),('GIRELLO PER BAMBINI','INGOMBRANTI',NULL,NULL,NULL),('GOMMA (MATERIA PRIMA)','AREA ECOLOGICA',NULL,NULL,NULL),('GOMMA DA MASTICARE','INDIFFERENZIATO','CHEWING GUM',NULL,NULL),('GOMMAPIUMA','INDIFFERENZIATO','GOMMA PIUMA',NULL,NULL),('GRANAGLIE (CEREALI)','ORGANICO','CEREALI',NULL,NULL),('GRATTUGIA IN METALLO','AREA ECOLOGICA',NULL,NULL,NULL),('GRATTUGIA IN PLASTICA','INDIFFERENZIATO',NULL,NULL,NULL),('GRUCCE APPENDIABITI IN FILO DI FERRO','MULTIMATERIALE','APPENDIABITI',NULL,NULL),('GRUCCE APPENDIABITI IN PLASTICA','MULTIMATERIALE','APPENDIABITI',NULL,NULL),('GUANTI IN GOMMA','INDIFFERENZIATO',NULL,NULL,NULL),('GUSCI D\'UOVO, DI FRUTTA SECCA E DI CROSTACEI','ORGANICO','UOVO ROTTO','FRUTTA SECCA','CROSTACEI'),('GUSCI DI COZZE E VONGOLE','INDIFFERENZIATO','COZZE','VONGOLE',NULL),('IMBALLAGGIO DI CARTA O CARTONE','CARTA','IMBALLAGGIO DI CARTA','IMBALLAGGIO DI CARTONE',NULL),('IMBUTO IN PLASTICA O IN METALLO','AREA ECOLOGICA',NULL,NULL,NULL),('INCENSO','ORGANICO',NULL,NULL,NULL),('INFISSI (PORTE FINESTRE E ZANZARIERE)','INGOMBRANTI','PORTE FINESTRE','ZANZARIERE',NULL),('INNAFFIATOIO / ANNAFFIATOIO IN PLASTICA O IN METALLO','AREA ECOLOGICA','ANNAFFIATOIO','INNAFFIATOIO',NULL),('INSETTICIDA','AREA ECOLOGICA',NULL,NULL,NULL),('ISOLANTI','AREA ECOLOGICA',NULL,NULL,NULL),('LACCI PER SCARPE','INDIFFERENZIATO','FIOCCO PER SCARPE',NULL,NULL),('LAMETTE','INDIFFERENZIATO',NULL,NULL,NULL),('LAMPADARIO','INGOMBRANTI',NULL,NULL,'\\'),('LAMPADINE A INCANDESCENZA','INDIFFERENZIATO',NULL,NULL,NULL),('LAMPADINE A RISPARMIO ENERGETICO','AREA ECOLOGICA',NULL,NULL,NULL),('LASTRE DI VETRO','INGOMBRANTI','VETRO',NULL,NULL),('LASTRE RADIOGRAFICHE','INDIFFERENZIATO','RADIOGRAFIA','RADIOGRAFIE',NULL),('LATTINE PER BEVANDE','MULTIMATERIALE',NULL,NULL,NULL),('LAVASTOVIGLIE','INGOMBRANTI',NULL,NULL,NULL),('LAVATRICE','INGOMBRANTI',NULL,NULL,NULL),('LEGNO DA POTATURE','INGOMBRANTI',NULL,NULL,NULL),('LEGNO VERNICIATO','INGOMBRANTI',NULL,NULL,NULL),('LETTIERA PER ANIMALI DOMESTICI','INDIFFERENZIATO','',NULL,NULL),('LETTORE CD O DVD','AREA ECOLOGICA','LETTORE CD','LETTORE DVD',NULL),('LIBRI (SENZA COPERTINA PLASTIFICATA)','CARTA',NULL,NULL,NULL),('LISCHE DI PESCE','ORGANICO',NULL,NULL,NULL),('MASTICI','INDIFFERENZIATO',NULL,NULL,NULL),('MATERASSI','INGOMBRANTI',NULL,NULL,NULL),('MENSOLE IN LEGNO','INGOMBRANTI',NULL,NULL,''),('MENSOLE IN PLASTICA','INGOMBRANTI',NULL,NULL,NULL),('MENSOLE IN VETRO','INGOMBRANTI',NULL,NULL,NULL),('MOBILI IN LEGNO','INGOMBRANTI',NULL,NULL,NULL),('MONITOR','AREA ECOLOGICA',NULL,NULL,NULL),('MOZZICONI DI SIGARETTA E SIGARI','INDIFFERENZIATO','SIGARETTA','SIGARI',NULL),('NASTRO ADESIVO O DA PACCO','INDIFFERENZIATO','NASTRO DA PACCO',NULL,NULL),('NEON','AREA ECOLOGICA',NULL,NULL,NULL),('NOCCIOLI DI FRUTTA','ORGANICO',NULL,NULL,NULL),('NYLON DA IMBALLAGGIO','MULTIMATERIALE',NULL,NULL,NULL),('OCCHIALI','INDIFFERENZIATO',NULL,NULL,NULL),('OGGETTI IN GOMMA','INDIFFERENZIATO','GOMMA',NULL,NULL),('OGGETTI IN PELUCHE O OVATTA','INDIFFERENZIATO','PELUCHE','OVATTA',NULL),('OLI MINERALI ESAUSTI','AREA ECOLOGICA',NULL,NULL,NULL),('OLI VEGETALI ESAUSTI','AREA ECOLOGICA','OLIO DA CUCINA',NULL,NULL),('OMBRELLO','AREA ECOLOGICA',NULL,NULL,NULL),('OMBRELLONI','AREA ECOLOGICA',NULL,NULL,NULL),('OSSI','ORGANICO',NULL,NULL,NULL),('PADELLE','AREA ECOLOGICA',NULL,NULL,NULL),('PALLETS','INGOMBRANTI',NULL,NULL,NULL),('PALLONI DA GIOCO','INDIFFERENZIATO',NULL,NULL,NULL),('PANE','ORGANICO',NULL,NULL,NULL),('PANNI ELETTROSTATICI PER LA POLVERE','INDIFFERENZIATO','PANNI CATTURAPOLVERE',NULL,NULL),('PANNOLINI BIODEGRADABILI','INDIFFERENZIATO','PANNOLONI',NULL,NULL),('PANNOLINI E PANNOLONI','INDIFFERENZIATO','PANNOLONI',NULL,NULL),('PASTA','ORGANICO',NULL,NULL,NULL),('PEDANE IN LEGNO','AREA ECOLOGICA',NULL,NULL,NULL),('PEDANE IN PLASTICA ','AREA ECOLOGICA',NULL,NULL,NULL),('PELLICOLE IN PLASTICA PER ALIMENTI PULITE','MULTIMATERIALE','PELLICOLA',NULL,NULL),('PENNE E PENNARELLI','INDIFFERENZIATO','PENNE','PENNARELLI',NULL),('PENTOLE','MULTIMATERIALE',NULL,NULL,''),('PESCE','ORGANICO',NULL,NULL,NULL),('PETTINE E SPAZZOLE','INDIFFERENZIATO','PETTINE','SPAZZOLE',NULL),('PIASTRELLE','AREA ECOLOGICA',NULL,NULL,NULL),('PIASTRINE PER ZANZARE','INDIFFERENZIATO','ZAMPIRONI',NULL,NULL),('PIATTI IN CERAMICA (COCCI DI PICCOLE DIMENSIONI)','INDIFFERENZIATO','COCCI DI CERAMICA','',NULL),('PIATTI IN PLASTICA (PULITI)','MULTIMATERIALE',NULL,NULL,NULL),('PICCOLI ELETTRODOMESTICI','AREA ECOLOGICA','FRULLATORE','FRIGGITRICE','FORNETTO'),('PILE ESAUSTE','AREA ECOLOGICA','BATTERIE ESAUSTE','BATTERIA',NULL),('PIROFILE','INDIFFERENZIATO',NULL,NULL,NULL),('PIUME DI POLLAME','ORGANICO',NULL,NULL,NULL),('PIZZA','ORGANICO',NULL,NULL,NULL),('PLASTICA DURA','AREA ECOLOGICA',NULL,NULL,NULL),('PLASTICA ESPANSA PER IMBALLAGGIO DI BENI DUREVOLI','MULTIMATERIALE','IMBALLAGGIO',NULL,NULL),('PLEXIGLASS','INGOMBRANTI',NULL,NULL,NULL),('PLURIBALL','MULTIMATERIALE','IMBALLAGGIO',NULL,NULL),('PNEUMATICI','INGOMBRANTI','GOMMA','GOMME',NULL),('POLISTIROLO ESPANSO PER IMBALLAGGI','MULTIMATERIALE','GUSCI DA IMBALLAGGIO','GUSCI IN POLISTIROLO ESPANSO','IMBALLAGGIO'),('RAMI DI POTATURE','AREA ECOLOGICA','POTATURE',NULL,NULL),('REGGETTE PER LEGATURE PACCHI','MULTIMATERIALE',NULL,NULL,NULL),('RETI IN FERRO PER LETTI','INGOMBRANTI',NULL,NULL,NULL),('RETINE PER FRUTTA E VERDURA','MULTIMATERIALE',NULL,NULL,NULL),('RINGHIERE','INGOMBRANTI',NULL,NULL,NULL),('RISO','ORGANICO',NULL,NULL,NULL),('RIVISTE (SENZA INVOLUCRO DI PLASTICA)','CARTA',NULL,NULL,NULL),('RUBINETTERIA','AREA ECOLOGICA','RUBINETTO',NULL,NULL),('SACCHETTI DELL\'ASPIRAPOLVERE USATI','INDIFFERENZIATO','SACCHETTI FOLLETTO','SACCHI ASPIRAPOLVERE',NULL),('SACCHETTI DI CARTA','CARTA','SACCO DI CARTA',NULL,NULL),('SACCHETTI PER CONGELATORE PULITI','MULTIMATERIALE','SACCO PER CONGELATORE',NULL,NULL),('SACCO BISCOTTI (CONFEZIONE VUOTA)','INDIFFERENZIATO',NULL,NULL,NULL),('SALVIETTE UMIDIFICATE E DETERGENTI','INDIFFERENZIATO','SALVIETTE DETERGENTI',NULL,NULL),('SANITARIO (WC, LAVABO, BIDET)','INGOMBRANTI','WC','LAVABO','BIDET'),('SAPONE','INDIFFERENZIATO',NULL,NULL,NULL),('SCAFFALI IN FERRO','INGOMBRANTI',NULL,NULL,NULL),('SCAPRE E SANDALI','AREA ECOLOGICA','SCARPE','SANDALI',NULL),('SCATOLE IN CARTONCINO','CARTA','SCATOLA DETERSIVO','SCATOLA SCARPA',NULL),('SCATOLETTE PER ALIMENTI','MULTIMATERIALE','SCATOLETTA TONNO','SCATOLETTA PELATI',NULL),('SCI E SCARPONI DA SCI','AREA ECOLOGICA','SCI','SCARPONI DA SCI',NULL),('SCIARPE','AREA ECOLOGICA','SCIARPA',NULL,NULL),('SCONTRINI FISCALI DI CARTA','CARTA',NULL,NULL,NULL),('SCONTRINI FISCALI SU CARTA TERMICA','INDIFFERENZIATO',NULL,NULL,NULL),('SCOPA','INDIFFERENZIATO',NULL,NULL,NULL),('SECCHI DI VERNICI VUOTI','AREA ECOLOGICA',NULL,NULL,NULL),('SECCHIELLI DI PLASTICA','INDIFFERENZIATO',NULL,NULL,NULL),('SEDIE E SDRAIO','AREA ECOLOGICA',NULL,NULL,NULL),('SEGATURA','AREA ECOLOGICA',NULL,NULL,NULL),('SEGGIOLONE PER BAMBINI','INGOMBRANTI',NULL,NULL,NULL),('SEMI','ORGANICO',NULL,NULL,NULL),('SFALCI DI ERBA','AREA ECOLOGICA','ERBA','PRATO',NULL),('SHOPPERS (COMPOSTABILI)','ORGANICO','BUSTE DELLA SPESA','SACCHETTI DELLA SPESA',NULL),('SHOPPERS (iN PLASTICA NON COMPOSTABILE)','MULTIMATERIALE','BUSTE DELLA SPESA','SACCHETTI DELLA SPESA',NULL),('SIRINGHE CON TAPPO (CATETERI, FLEBO)','INDIFFERENZIATO','CATATERI','FLEBO',NULL),('SMACCHIATORE','AREA ECOLOGICA',NULL,NULL,''),('SOLVENTE','AREA ECOLOGICA',NULL,NULL,NULL),('SPAZZOLE TERGICRISTALLO','INDIFFERENZIATO','TERGICRISTALLO',NULL,NULL),('SPAZZOLINO ELETTRICO PER DENTI','AREA ECOLOGICA',NULL,NULL,NULL),('SPAZZOLINO PER DENTI','INDIFFERENZIATO',NULL,NULL,NULL),('SPECCHI DI PICCOLE DIMENSIONI','INDIFFERENZIATO',NULL,NULL,NULL),('SPUGNA','INDIFFERENZIATO',NULL,NULL,NULL),('STAMPANTE','AREA ECOLOGICA',NULL,NULL,NULL),('STECCHINO IN LEGNO PER GELATI','ORGANICO',NULL,NULL,NULL),('STENDINO IN PLASTICA O IN METALLO','AREA ECOLOGICA','STENDIPANNI',NULL,NULL),('STEREO','AREA ECOLOGICA',NULL,NULL,NULL),('STRACCI','INDIFFERENZIATO',NULL,NULL,NULL),('STRUTTURE IN FERRO','INGOMBRANTI',NULL,NULL,NULL),('STUZZICADENTI','ORGANICO',NULL,NULL,NULL),('SVEGLIA','AREA ECOLOGICA',NULL,NULL,NULL),('TAGLIERE IN LEGNO','AREA ECOLOGICA',NULL,NULL,NULL),('TAGLIERE IN PLASTICA','INDIFFERENZIATO',NULL,NULL,NULL),('TAMPONE PER TIMBRI','INDIFFERENZIATO','TIMBRO',NULL,NULL),('TAPPARELLE','INGOMBRANTI',NULL,NULL,NULL),('TAPPI A CORONA IN METALLO','MULTIMATERIALE',NULL,NULL,NULL),('TAPPI DELLE BOTTIGLIE IN ALLUMINIO','MULTIMATERIALE',NULL,NULL,NULL),('TAPPI DI SUGHERO','ORGANICO',NULL,NULL,NULL),('TASTIERA PER COMPUTER','AREA ECOLOGICA',NULL,NULL,NULL),('TAVOLO IN LEGNO','INGOMBRANTI',NULL,NULL,NULL),('TAVOLO IN METALLO','INGOMBRANTI',NULL,NULL,NULL),('TAVOLO IN PLASTICA','INGOMBRANTI',NULL,NULL,NULL),('TAZZI E TAZZINE (COCCI)','INDIFFERENZIATO','TAZZINA','TAZZINE',NULL),('TELEFONO','AREA ECOLOGICA','CELLULARE',NULL,NULL),('TELEVISORE','INGOMBRANTI','TV',NULL,NULL),('TERMOMETRO','INDIFFERENZIATO',NULL,NULL,NULL),('TERMOMETRO DIGITALE','AREA ECOLOGICA',NULL,NULL,NULL),('TERRACOTTA  (VASELLAME)','AREA ECOLOGICA','VASO DI TERRACOTTA','VASI IN TERRACOTTA',NULL),('TESSUTO NON TESSUTO','INDIFFERENZIATO',NULL,NULL,NULL),('TINTURA PER SCARPE','INDIFFERENZIATO','TINTA PER SCARPE',NULL,NULL),('TIRELLINA','AREA ECOLOGICA',NULL,NULL,NULL),('TONER, CARTUCCIA PER STAMPANTE','AREA ECOLOGICA','CARTUCCIA',NULL,NULL),('TOPICIDA','AREA ECOLOGICA','VELENO PER TOPI',NULL,NULL),('TOVAGLIOLI CONTAMINATI CON DETERGENTI','INDIFFERENZIATO',NULL,NULL,NULL),('TOVAGLIOLI DI CARTA BAGNATI O UNTI DI CIBO','ORGANICO','TOVAGLILOLI BAGNATI','TOVAGLIOLI UNTI',NULL),('TOVAGLIOLI DI CARTA PULITI','CARTA','TOVAGLIOLI PULITI',NULL,NULL),('TRANSISTOR','AREA ECOLOGICA',NULL,NULL,NULL),('TRUCIOLATO','INGOMBRANTI',NULL,NULL,NULL),('TUBETTI IN PLASTICA O ALLUMINIO CONTENENTI SOSTANZE CHIMICHE','AREA ECOLOGICA',NULL,NULL,NULL),('TUBETTI VUOTI DI MAIONESE O POMODORI','MULTIMATERIALE','TUBETTO DI POMODORO','TUBETTO DI KETCUP',NULL),('TUBO IN GOMMA','AREA ECOLOGICA',NULL,NULL,NULL),('UNGHIE','INDIFFERENZIATO',NULL,NULL,NULL),('UOVA','ORGANICO',NULL,NULL,NULL),('VALIGIE','AREA ECOLOGICA','VALIGIA',NULL,NULL),('VASCA DA BAGNO','INGOMBRANTI',NULL,NULL,NULL),('VASCHETTE ALIMENTARI IN PLASTICA PULITE','MULTIMATERIALE',NULL,NULL,NULL),('VASCHETTE IN ALLUMINIO','MULTIMATERIALE',NULL,NULL,NULL),('VASCHETTE PER ALIMENTI O IMBALLAGGI IN VETRO','AREA ECOLOGICA','VASCHETTE PER ALIMENTI DI VETRO','VASCHETTE IN VETRO','VASCHETTE DI VETRO'),('VASI DI PLASTICA E/O POLISTIROLO','MULTIMATERIALE','VASO IN POLISTIROLO','VASO PER FIORI','VASO PER PIANTE'),('VASI IN TERRACOTTA UNTI','AREA ECOLOGICA',NULL,NULL,NULL),('VASSOI IN POLISTIROLO PER ALIMENTI','MULTIMATERIALE',NULL,NULL,NULL),('VASSOIO PER PORTAPASTE O DOLCI','CARTA',NULL,NULL,NULL),('VERDURA','ORGANICO',NULL,NULL,NULL),('VESTITI','AREA ECOLOGICA',NULL,NULL,NULL),('VETRI','AREA ECOLOGICA',NULL,NULL,NULL),('VETRO OPALE (BOCCETTTE DI PROFUMO VUOTE)','AREA ECOLOGICA','BOCCETTE DI PROFUMO VUOTE','PROFUMO VUOTO',NULL),('VETRO RETINATO (DI FINESTRE O PORTE)','AREA ECOLOGICA',NULL,NULL,NULL),('VIDEOCASSETTA','INDIFFERENZIATO','VHS',NULL,NULL),('VIDEOREGISTRATORE','AREA ECOLOGICA',NULL,NULL,NULL),('VOLANTINI NON PLASTIFICATI','CARTA','',NULL,NULL),('VONGOLE (GUSCI)','INDIFFERENZIATO','GUSCI DI VONGOLE',NULL,NULL),('ZAINI','AREA ECOLOGICA',NULL,NULL,NULL),('ZANZARIERA (SENZA TELAIO)','INDIFFERENZIATO',NULL,NULL,NULL),('ZERBINO','INDIFFERENZIATO',NULL,NULL,NULL);
/*!40000 ALTER TABLE `rifiuto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utente`
--

DROP TABLE IF EXISTS `utente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Nome` varchar(45) DEFAULT NULL,
  `Cognome` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Cellulare` varchar(45) DEFAULT NULL,
  `Citta` varchar(255) DEFAULT NULL,
  `Indirizzo` varchar(255) DEFAULT NULL,
  `Domanda1` varchar(255) DEFAULT NULL,
  `Risposta1` varchar(255) DEFAULT NULL,
  `Domanda2` varchar(255) DEFAULT NULL,
  `Risposta2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utente`
--

LOCK TABLES `utente` WRITE;
/*!40000 ALTER TABLE `utente` DISABLE KEYS */;
INSERT INTO `utente` VALUES (8,'l.ceccanti4@studenti.unipi.it','MasterPsw','Lorenzo','Ceccanti','0587484589','3388886718','Rodeo','Via Solferino, 31','targaprimaauto','CS223HY','nomevia','Dante'),(9,'rachele.morelli69@gmail.com','12345678','Rachele','Morelli','0587484589','3482544260','Verona Beach','Via Dei Mille, 40','targaprimaauto','PI145633','nomevia','Caprera'),(79,'alessandro.ceccanti@live.it','alessandro121068','Alessandro','Ceccanti','0587484589','3335020891','Verdant Bluffs','Via Piave, 2','targaprimaauto','CA960HH','nomevia','Pettori'),(80,'ceccamarce@gmail.com','qwertyuiop','Marcello','Ceccanti','050702731','3402544271','Market','Via E.Alessandrini, 11','nomescuola','Cascina','nomealbum','Ligabue'),(81,'master@greenservicespa.com','AdminReal',NULL,NULL,NULL,NULL,NULL,NULL,'nomescuola','Arcobaleno','nomevia','Zara');
/*!40000 ALTER TABLE `utente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valoreingombro`
--

DROP TABLE IF EXISTS `valoreingombro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valoreingombro` (
  `rifiuto` varchar(255) NOT NULL,
  `valore` double DEFAULT NULL,
  PRIMARY KEY (`rifiuto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valoreingombro`
--

LOCK TABLES `valoreingombro` WRITE;
/*!40000 ALTER TABLE `valoreingombro` DISABLE KEYS */;
INSERT INTO `valoreingombro` VALUES ('ACCESSORI BAGNO',2),('ACQUARIO',3),('ALTALENA',5),('ANGOLIERA',3),('ANGOLIERA CUCINA',3),('ANTA ARMADIO IN LEGNO',1),('ANTA ARMADIO IN METALLO',1),('ANTA BOX DOCCIA',1),('ANTA MOBILE CUCINA',1),('ANTENNA',2),('ANTINE IN FERRO',3),('ARMADIETTO IN FERRO',5),('ARMADIO 1 ANTA (SMONTATO)',4),('ARMADIO 2 ANTE (SMONTATO)',5),('ARMADIO 3 ANTE (SMONTATO)',6),('ARMADIO A PONTE (SMONTATO)',10),('ARMADIO IN FERRO',5),('ASCIUGATRICE',4),('ATTACCAPANNI',2),('ATTREZZO DA GIARDINO',1),('ATTREZZO GINNICO',3),('ATTREZZO GINNICO GRANDE',9),('ATTREZZO GINNICO PICCOLO',1),('ATTREZZO IN FERRO',3),('BICICLETTA',3),('CERCHIONI',2),('DAMIGIANA IN VETRO (SENZA VESTE)',2),('DIVANO',10),('DOGHE',9),('FINESTRE DI LEGNO',7),('FINESTRE IN ALLUMINIO',5),('FORNO ELETTRICO',4),('FRIGORIFERO',4),('GIRELLO PER BAMBINI',2),('INFISSI (PORTE FINESTRE E ZANZARIERE)',5),('LAMPADARIO',2),('LASTRE DI VETRO',5),('LAVASTOVIGLIE',4),('LAVATRICE',4),('LEGNO DA POTATURE',5),('LEGNO VERNICIATO',5),('MATERASSI',6),('MENSOLE IN LEGNO',6),('MENSOLE IN PLASTICA',7),('MENSOLE IN VETRO',7),('MOBILI IN LEGNO',7),('PALLETS',5),('PLEXIGLASS',7),('PNEUMATICI',4),('RETI IN FERRO PER LETTI',8),('RINGHIERE',7),('SANITARIO (WC, LAVABO, BIDET)',4),('SCAFFALI IN FERRO',5),('SEGGIOLONE PER BAMBINI',2),('STRUTTURE IN FERRO',4),('TAPPARELLE',4),('TAVOLO IN LEGNO',3),('TAVOLO IN METALLO',3),('TAVOLO IN PLASTICA',2),('TELEVISORE',3),('TRUCIOLATO',4),('VASCA DA BAGNO',4);
/*!40000 ALTER TABLE `valoreingombro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-14 14:21:50
