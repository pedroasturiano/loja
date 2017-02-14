CREATE DATABASE  IF NOT EXISTS `loja` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `loja`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: loja
-- ------------------------------------------------------
-- Server version	5.6.21-log

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
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `endereco` text,
  `valor` float NOT NULL,
  `forma_pg` int(11) NOT NULL,
  `status_pg` int(11) NOT NULL,
  `pg_link` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (1,6,'aaaaaa',200,1,2,'teste/carrinho/obrigado'),(2,1,'Avenida Coronel José Philomeno Gomes',25,1,2,'teste/carrinho/obrigado'),(3,1,'Avenida Coronel José Philomeno Gomes',1400,1,2,'loja/carrinho/obrigado'),(4,1,'Avenida Coronel José Philomeno Gomes',25,1,2,'loja/carrinho/obrigado'),(5,1,'Avenida Coronel José Philomeno Gomes',2500,1,2,'/loja/carrinho/obrigado'),(6,7,'algum lugar',85,2,1,''),(7,8,'t',85,2,1,''),(8,9,'tttttttttttttttt',85,2,1,''),(9,8,'1111',85,2,1,''),(10,8,'1111',85,2,1,''),(11,10,'rrrr',25,2,1,''),(12,1,'Avenida Coronel José Philomeno Gomes',25,2,1,''),(13,11,'vsf',25,2,1,''),(14,11,'vsf',25,2,1,''),(15,11,'vsf',25,2,1,''),(16,1,'teste',25,2,1,''),(17,1,'teste',25,2,1,''),(18,12,'1111',140,2,1,''),(19,1,'Avenida Coronel José Philomeno Gomes',14,2,1,'');
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-14 14:33:15
