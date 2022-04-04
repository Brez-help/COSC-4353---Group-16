-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: loginadfule
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientinfo`
--

DROP TABLE IF EXISTS `clientinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientinfo` (
  `Name` char(50) NOT NULL,
  `AddressA` char(100) NOT NULL,
  `AddressB` char(100) NOT NULL,
  `City` char(100) NOT NULL,
  `Zipcode` char(9) NOT NULL,
  `State` char(2) NOT NULL,
  `loginafule_Username` char(20) NOT NULL,
  KEY `Test` (`loginafule_Username`),
  CONSTRAINT `Test` FOREIGN KEY (`loginafule_Username`) REFERENCES `loginafule` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientinfo`
--

LOCK TABLES `clientinfo` WRITE;
/*!40000 ALTER TABLE `clientinfo` DISABLE KEYS */;
INSERT INTO `clientinfo` VALUES ('Dietrich McCray','4361 Cougar Village Dr','NA','Houston','77052','TX','dwolf22');
/*!40000 ALTER TABLE `clientinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuelform`
--

DROP TABLE IF EXISTS `fuelform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fuelform` (
  `SugPrice` decimal(20,2) DEFAULT NULL,
  `DelDate` date NOT NULL,
  `DelAddress` char(100) NOT NULL,
  `DelForm` char(2) NOT NULL,
  `GalReq` decimal(20,2) DEFAULT NULL,
  `TotalCost` decimal(20,2) DEFAULT NULL,
  `loginafule_User` char(20) NOT NULL,
  KEY `Tester` (`loginafule_User`),
  CONSTRAINT `Tester` FOREIGN KEY (`loginafule_User`) REFERENCES `loginafule` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuelform`
--

LOCK TABLES `fuelform` WRITE;
/*!40000 ALTER TABLE `fuelform` DISABLE KEYS */;
INSERT INTO `fuelform` VALUES (90.09,'0000-00-00','4361 Cougar Village Dr','TX',67.78,234.89,'dwolf22'),(46.12,'2023-12-12','4361 Cougar Village Dr','TX',67.76,234.89,'dwolf22');
/*!40000 ALTER TABLE `fuelform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginafule`
--

DROP TABLE IF EXISTS `loginafule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loginafule` (
  `Username` char(20) NOT NULL,
  `Password` char(20) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginafule`
--

LOCK TABLES `loginafule` WRITE;
/*!40000 ALTER TABLE `loginafule` DISABLE KEYS */;
INSERT INTO `loginafule` VALUES ('dwolf22','Showtime22#');
/*!40000 ALTER TABLE `loginafule` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-29 20:59:02
