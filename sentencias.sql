-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pizzeria
-- ------------------------------------------------------
-- Server version	5.7.10-log

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
-- Table structure for table `ingredientes`
--

DROP TABLE IF EXISTS `ingredientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredientes` (
  `nombreIng` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL DEFAULT '',
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`nombreIng`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredientes`
--

LOCK TABLES `ingredientes` WRITE;
/*!40000 ALTER TABLE `ingredientes` DISABLE KEYS */;
INSERT INTO `ingredientes` VALUES ('Aceitunas','Negras','http://bucket1.glanacion.com/anexos/fotos/73/1582773.jpg'),
  ('Atún','Natural','http://www.remediosnaturalesmujer.com/wp-content/uploads/2015/10/dieta-del-atun-y-la-pi%C3%B1a.jpg'),
  ('Bacon',' ','http://cdn4.cronicasgeek.com/wp-content/uploads/2015/12/bacon-1.jpg'),
  ('Cebolla',' ','http://radiogastronomia.com/wp-content/uploads/2015/07/cebollas.jpg'),
  ('Extra de mozarella',' ','http://www.italysbestrome.com/wp-content/uploads/2015/03/Mozzarella-GIGLIO.jpg'),
  ('Jamón','York','http://dermasanaactualidad.com/wp-content/uploads/2013/05/dermasana-actualidad-incluye-jamon-york-en-tu-dieta-y-gana-salud.jpg'),
  ('Pimiento','Rojo','http://www.fructifera.es/147-thickbox_default/pimiento-rojo.jpg'),
  ('Piña','En su jugo','http://mamaconeja.com/wpmamaconeja/wp-content/uploads/2014/11/ISS_2374_02356.jpg'),
  ('Tomate','Tomate natural','http://static.hogarmania.com/archivos/201105/xsalsa-tomate-xl-668x400x80xX.jpg.pagespeed.ic.q4cTh3BgL_.jpg');
/*!40000 ALTER TABLE `ingredientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `masas`
--

DROP TABLE IF EXISTS `masas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masas` (
  `id_masa` tinyint(4) NOT NULL DEFAULT '1',
  `descripcion` varchar(200) DEFAULT NULL,
  `tamano` decimal(3,2) NOT NULL DEFAULT '1.00',
  `precio` decimal(4,2) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_masa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masas`
--

LOCK TABLES `masas` WRITE;
/*!40000 ALTER TABLE `masas` DISABLE KEYS */;
INSERT INTO `masas` VALUES (1,'Nuestra pizza más fina, ligera, crujiente y con todo el sabor de L\'Italien.',0.75,11.50,'http://www.pizzahut.es/images/12.jpg','Fina'),
  (2,'Nuestra masa tradicional cubierta con tus ingredientes favoritos.',0.50,8.90,'http://www.pizzahut.es/images/13.jpg','Clásica'),
  (3,'Masa fina y ligera con el borde relleno de delicioso queso fundido. Desde 1995.',1.00,13.95,'http://www.pizzahut.es/images/15.jpg','Rellena');
/*!40000 ALTER TABLE `masas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id_Pedido` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(16) NOT NULL,
  `id_Masa` tinyint(4) NOT NULL DEFAULT '1',
  `numIng` tinyint(4) NOT NULL DEFAULT '4',
  `ingredientes` varchar(100) DEFAULT NULL,
  `unidades` tinyint(4) NOT NULL DEFAULT '1',
  `fechayhora` varchar(30) NOT NULL,
  `servido` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_Pedido`),
  KEY `login` (`login`),
  KEY `id_Masa` (`id_Masa`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`login`) REFERENCES `usuario` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_Masa`) REFERENCES `masas` (`id_masa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COMMENT='Tabla de pedidos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (100,'reg1',1,3,'bacon,tomate,extra',2,'22/01/2016 a las 14:17:30',0),
  (101,'reg2',2,3,'pimiento,cebolla,atun',2,'23/01/2016 a las 14:19:22',0),
  (102,'reg1',3,2,'bacon,cebolla',1,'24/01/2011 a las 21:11:10',0),
  (103,'reg2',1,4,'bacon,tomate,extra,pimiento',1,'25/01/2016 a las 13:57:09',0);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `login` varchar(16) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nombre` varchar(16) NOT NULL,
  `firma` text NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'perfil_default.jpg',
  `tipo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('admin','21232f297a57a5a743894a0e4a801fc3','admin@gmail.com','David','El administrador del sitio.','ico.jpg',2),
  ('Alex4567','$2y$10$pSCXUrc6kGYQiKrI3scsce2gI262Dw3U5CsX0EXBEq/rEACbLFd7O','mail@mail.com','Alejandro','firmilla','perfil_default.jpg',1),
  ('reg1','b37433910bcb25e4f6a875a54a0e6394','pedro@gmail.com','Pedro','Me gusta la pizza!','ico.jpg',1),
  ('reg2','c8a7c7c976ffbde6b49cc0c637798c33','juan@ono.es','Juan','No me importa la dieta','ico.jpg',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-14  4:15:40
