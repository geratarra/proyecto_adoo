-- MySQL dump 10.13  Distrib 5.7.8-rc, for Linux (x86_64)
--
-- Host: localhost    Database: adoo
-- ------------------------------------------------------
-- Server version	5.7.8-rc

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
-- Table structure for table `t1`
--

DROP TABLE IF EXISTS `t1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1` (
  `data` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1`
--

LOCK TABLES `t1` WRITE;
/*!40000 ALTER TABLE `t1` DISABLE KEYS */;
INSERT INTO `t1` VALUES ('{\"key1\": \"val1\", \"key2\": \"value2\"}'),('{\"p_id\": \"123\", \"act_0\": \"act 1\", \"proceso\": \"un proceso\", \"proposito_0\": \"un proposito\", \"tarea_0_act_0\": \"tarea 1\", \"resultado_num_0\": \"un resultado esperado\"}');
/*!40000 ALTER TABLE `t1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t2`
--

DROP TABLE IF EXISTS `t2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proceso` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t2`
--

LOCK TABLES `t2` WRITE;
/*!40000 ALTER TABLE `t2` DISABLE KEYS */;
INSERT INTO `t2` VALUES (3,'{\"proceso\":\"otro yeah\",\"p_id\":\"123\",\"proposito_0\":\"\",\"resultado_num_0\":\"\",\"act_0\":\"\",\"tarea_0_act_0\":\"\"}'),(4,'{\"proceso\":\"nuevo proceso\",\"p_id\":\"123\",\"proposito_0\":\"\",\"resultado_num_0\":\"no hay1!\",\"act_0\":\"\",\"tarea_0_act_0\":\"\"}'),(5,'{\"proceso\":\"ooootro\",\"p_id\":\"456\",\"proposito_0\":\"\",\"resultado_num_0\":\"\",\"act_0\":\"\",\"tarea_0_act_0\":\"\"}'),(6,'{\"proceso\":\"otro mas\",\"p_id\":\"1235\",\"proposito_0\":\"\",\"resultado_num_0\":\"\",\"act_0\":\"\",\"tarea_0_act_0\":\"\"}'),(7,'{\"proceso\":\"nooo\",\"p_id\":\"000\",\"proposito_0\":\"\",\"resultado_num_0\":\"\",\"act_0\":\"\",\"tarea_0_act_0\":\"\"}'),(8,'{\"proceso\":\"teoreo\",\"p_id\":\"123\",\"proposito_0\":\"\",\"resultado_num_0\":\"\",\"act_0\":\"\",\"tarea_0_act_0\":\"\"}'),(9,'{\"proceso\":\"doasoaso\",\"p_id\":\"0000\",\"proposito_0\":\"\",\"resultado_num_0\":\"\",\"act_0\":\"\",\"tarea_0_act_0\":\"\"}'),(10,'{\"proceso\":\"nuevo proceso\",\"p_id\":\"123\",\"proposito_0\":\"pasar la materia\",\"resultado_num_0\":\"un resutlado\",\"resultado_num_1\":\"otro resultado esperado\",\"act_0\":\"atc 1\",\"tarea_0_act_0\":\"una tarea\",\"tarea_1_0\":\"otra tarea\",\"nota_tarea_0\":\"con una notea\",\"nota_tarea_1\":\"oootra tarea\",\"opcion_0\":\"con una opcion\"}');
/*!40000 ALTER TABLE `t2` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-09 15:23:38
