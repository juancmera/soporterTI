-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: integradora
-- ------------------------------------------------------
-- Server version	9.7.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '4c74b92c-6f42-11f1-96b8-00e04c13a57f:1-400';

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asunto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_incidencia` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prioridad` enum('Baja','Media','Alta') COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Pendiente','En espera','Finalizado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendiente',
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_estado` (`estado`),
  KEY `idx_fecha` (`fecha_registro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,'Marcela Andrade Pozo','mandrade@uce.edu.ec','2145','Secretaría','Cambio de correo en el sistema de titulación','Sistema académico','Alta','Estudiantes de la carrera registraron un correo incorrecto durante el proceso de titulación y solicitan la corrección.','Finalizado','2026-09-03 09:15:00',NULL),(2,'Byron Estuardo Guamán','beguaman@uce.edu.ec','','Docencia','Curso no visible en el aula virtual','Sistema académico','Baja','El curso asignado para el periodo actual no aparece en el listado del aula virtual del docente.','En espera','2026-09-07 14:12:41','2026-09-07 15:38:58'),(3,'Juanm Mera','apps.ackrostudio@gmail.com','1123','Contabilidad','Demo tocket','Impresión','Baja','Detalle del ticket ','Pendiente','2026-09-07 14:13:09','2026-09-07 15:42:28'),(4,'Diana Carolina Ruiz','dcruiz@uce.edu.ec','2308','Laboratorios','Problema con el autenticador 2FA','Software','Media','El personal administrativo no logra completar la verificación en dos pasos al iniciar sesión.','Pendiente','2026-09-07 14:16:05','2026-09-07 15:42:08');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-07 15:47:04
