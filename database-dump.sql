-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: demartinirv
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.13.10.1

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
-- Table structure for table `bath_layouts`
--

DROP TABLE IF EXISTS `bath_layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bath_layouts` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bath_layouts`
--

LOCK TABLES `bath_layouts` WRITE;
/*!40000 ALTER TABLE `bath_layouts` DISABLE KEYS */;
INSERT INTO `bath_layouts` VALUES (1,'asdasd','2013-10-17 22:33:23','2013-10-17 22:33:23'),(2,'asdasd','2013-10-17 22:38:25','2013-10-17 22:38:25'),(3,'Testing','2013-10-17 22:38:35','2013-10-17 22:38:35'),(4,'asdasdasd','2013-10-17 22:40:21','2013-10-17 22:40:21');
/*!40000 ALTER TABLE `bath_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bedroom_layouts`
--

DROP TABLE IF EXISTS `bedroom_layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bedroom_layouts` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bedroom_layouts`
--

LOCK TABLES `bedroom_layouts` WRITE;
/*!40000 ALTER TABLE `bedroom_layouts` DISABLE KEYS */;
INSERT INTO `bedroom_layouts` VALUES (1,'sdfsdfdf','2013-10-17 22:31:07','2013-10-17 22:31:07'),(2,'sdsds','2013-10-17 22:33:15','2013-10-17 22:33:15'),(3,'chicken','2013-10-17 22:42:01','2013-10-17 22:42:01');
/*!40000 ALTER TABLE `bedroom_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `category_id` int(9) DEFAULT NULL,
  `orden` smallint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (90,'Class A - Diesel',NULL,1,'2013-10-09 16:47:00','2013-12-23 14:40:52'),(98,'Class A - Gas',NULL,2,'2013-12-23 14:41:49','2013-12-23 14:41:49'),(99,'Class B &amp; C',NULL,3,'2013-12-23 14:42:29','2013-12-23 14:42:29'),(100,'Fifth Wheels / Trailers',NULL,4,'2013-12-23 14:42:56','2013-12-23 14:42:56'),(101,'Cars &amp; Trucks',NULL,5,'2013-12-23 14:43:15','2013-12-23 14:43:15');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cockpit_options`
--

DROP TABLE IF EXISTS `cockpit_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cockpit_options` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cockpit_options`
--

LOCK TABLES `cockpit_options` WRITE;
/*!40000 ALTER TABLE `cockpit_options` DISABLE KEYS */;
INSERT INTO `cockpit_options` VALUES (1,'Exhaust Brake','2013-10-18 21:02:42','2013-10-18 21:03:43'),(2,'Jake Brake','2013-10-18 21:02:58','2013-10-18 21:02:58'),(3,'Adjustable Pedals','2013-10-18 21:03:59','2013-10-18 21:03:59'),(4,'CB Radio','2013-10-18 21:23:31','2013-10-18 21:23:31'),(5,'Rear View Camera','2013-10-18 21:23:51','2013-10-18 21:23:51'),(6,'3-Camera Rear Vision System','2013-10-18 21:24:35','2013-10-18 21:24:35'),(7,'Driver&#39;s Door','2013-10-18 21:24:49','2013-10-18 21:24:49'),(8,'Power Windows','2013-10-18 21:25:04','2013-10-18 21:25:04'),(9,'Power Leather Cockpit Seats','2013-10-18 21:25:39','2013-10-18 21:25:39'),(10,'Power Cockpit Seats','2013-10-18 21:25:57','2013-10-18 21:25:57'),(11,'Co-Pilot Power Footrest','2013-10-18 21:26:40','2013-10-18 21:26:40'),(12,'Power Pilot Seat','2013-10-18 21:27:27','2013-10-18 21:27:27'),(13,'Leather Cockpit Seats','2013-10-18 21:27:45','2013-10-18 21:27:45'),(14,'Heated Cockpit Seats','2013-10-18 21:28:05','2013-10-18 21:28:05'),(15,'GPS Navigation System','2013-10-18 21:28:44','2013-10-18 21:28:44'),(16,'Trip Computer','2013-10-18 21:28:57','2013-10-18 21:28:57'),(17,'Tire Pressure Monitoring System','2013-10-18 21:29:18','2013-10-18 21:29:18'),(18,'Power Sunvisors','2013-10-18 21:29:37','2013-10-18 21:29:37'),(19,'CD Player','2013-10-18 21:29:50','2013-10-18 21:29:50'),(20,'Multi-Disc CD Changer','2013-10-18 21:30:06','2013-10-18 21:30:06');
/*!40000 ALTER TABLE `cockpit_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `engines`
--

DROP TABLE IF EXISTS `engines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `engines` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `engines`
--

LOCK TABLES `engines` WRITE;
/*!40000 ALTER TABLE `engines` DISABLE KEYS */;
INSERT INTO `engines` VALUES (1,'Cummins Diesel','2013-10-16 23:44:33','2013-10-16 23:44:33'),(2,'Some Engine','2013-10-16 23:46:55','2013-10-16 23:46:55'),(3,'Some Engine','2013-10-16 23:47:52','2013-10-16 23:47:52'),(4,'bacon','2013-10-16 23:49:28','2013-10-16 23:49:28'),(5,'sweet','2013-10-16 23:50:41','2013-10-16 23:50:41'),(6,'asdasd','2013-10-16 23:51:32','2013-10-16 23:51:32'),(7,'something','2013-10-16 23:52:17','2013-10-16 23:52:17'),(8,'cool','2013-10-16 23:53:00','2013-10-16 23:53:00'),(9,'cisls','2013-10-16 23:53:58','2013-10-16 23:53:58'),(10,'asdjsd','2013-10-16 23:54:57','2013-10-16 23:54:57'),(11,'sweet','2013-10-16 23:55:23','2013-10-16 23:55:23'),(12,'asdasd','2013-10-16 23:56:13','2013-10-16 23:56:13'),(13,'asdasdasd','2013-10-16 23:57:29','2013-10-16 23:57:29'),(14,'holl','2013-10-16 23:58:31','2013-10-16 23:58:31'),(15,'asdasd','2013-10-16 23:59:00','2013-10-16 23:59:00'),(16,'asdasdasd','2013-10-17 00:00:23','2013-10-17 00:00:23'),(17,'engine','2013-10-17 00:01:24','2013-10-17 00:01:24'),(18,'asdasdasd','2013-10-17 00:02:14','2013-10-17 00:02:14');
/*!40000 ALTER TABLE `engines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exterior_equipments`
--

DROP TABLE IF EXISTS `exterior_equipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exterior_equipments` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exterior_equipments`
--

LOCK TABLES `exterior_equipments` WRITE;
/*!40000 ALTER TABLE `exterior_equipments` DISABLE KEYS */;
INSERT INTO `exterior_equipments` VALUES (1,'Test','2013-10-15 20:05:45','2013-10-15 20:05:45'),(2,'adfsdf','2013-10-15 22:06:15','2013-10-15 22:06:15'),(3,'Test','2013-10-16 21:09:22','2013-10-16 21:09:22'),(4,'testsad','2013-10-16 21:50:56','2013-10-16 21:50:56'),(5,'Awesome','2013-10-16 21:52:05','2013-10-16 21:52:05'),(6,'Something','2013-10-16 23:15:11','2013-10-16 23:15:11');
/*!40000 ALTER TABLE `exterior_equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `floorings`
--

DROP TABLE IF EXISTS `floorings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `floorings` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `floorings`
--

LOCK TABLES `floorings` WRITE;
/*!40000 ALTER TABLE `floorings` DISABLE KEYS */;
INSERT INTO `floorings` VALUES (1,'Some Flooring','2013-10-16 22:10:15','2013-10-16 22:10:15');
/*!40000 ALTER TABLE `floorings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `furnitures`
--

DROP TABLE IF EXISTS `furnitures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `furnitures` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `furnitures`
--

LOCK TABLES `furnitures` WRITE;
/*!40000 ALTER TABLE `furnitures` DISABLE KEYS */;
INSERT INTO `furnitures` VALUES (1,'Furniture','2013-10-16 23:21:29','2013-10-16 23:21:29');
/*!40000 ALTER TABLE `furnitures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'members','General User'),(3,'Sales Team','Sales Team');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL DEFAULT '',
  `is_front` int(1) NOT NULL,
  `position` varchar(256) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `public` int(1) NOT NULL,
  `image` varchar(256) NOT NULL DEFAULT '',
  `group_id` int(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interior_equipments`
--

DROP TABLE IF EXISTS `interior_equipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interior_equipments` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interior_equipments`
--

LOCK TABLES `interior_equipments` WRITE;
/*!40000 ALTER TABLE `interior_equipments` DISABLE KEYS */;
INSERT INTO `interior_equipments` VALUES (1,'Testing','2013-10-16 21:59:19','2013-10-16 21:59:19'),(2,'asdasd','2013-10-17 22:31:22','2013-10-17 22:31:22');
/*!40000 ALTER TABLE `interior_equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language_keys`
--

DROP TABLE IF EXISTS `language_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language_keys` (
  `key` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language_keys`
--

LOCK TABLES `language_keys` WRITE;
/*!40000 ALTER TABLE `language_keys` DISABLE KEYS */;
/*!40000 ALTER TABLE `language_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `active` int(1) NOT NULL,
  `option` int(9) NOT NULL,
  `image` varchar(256) NOT NULL,
  `category_id` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `public` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (3,'Active',1,'2013-10-18 21:00:31','2013-10-18 21:00:31'),(4,'Inactive',0,'2013-10-18 21:00:39','2013-10-18 21:00:39');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `activation_code` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@admin.com','e4eb73b0c2e10b9846960952caecef65276bdc1a9f448fdcde6198a6450ea14ab3ed5d6b8acfaf9337186279aa07e192ba290645c7d625003c3d942e3bca8d36','admin@admin.com','Administrador','Administrador',1,NULL,NULL,'2012-06-21 12:03:56','2013-10-18 13:51:07'),(2,'vicky2@demartini.com','3108c470df913911b999d9611ea67e3409c2a4ae7a4b95985cef7d3ba004bdfef08cf48470cfd8bb86edebe9c7d01b3ae89f8967239eaf5a33c2222ca6fa50c7','vicky2@demartini.com','Vicky','DeMartini',0,'06102a301b05e19dc2f406a2f7465bf0e5d826ca',NULL,'2013-10-18 13:59:23','2013-10-18 13:59:44');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (3,1,1),(6,2,1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_bath_layouts`
--

DROP TABLE IF EXISTS `vehicle_bath_layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_bath_layouts` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(9) NOT NULL,
  `bath_layout_id` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`,`bath_layout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_bath_layouts`
--

LOCK TABLES `vehicle_bath_layouts` WRITE;
/*!40000 ALTER TABLE `vehicle_bath_layouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_bath_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_bedroom_layouts`
--

DROP TABLE IF EXISTS `vehicle_bedroom_layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_bedroom_layouts` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(9) NOT NULL,
  `bedroom_layout_id` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`,`bedroom_layout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_bedroom_layouts`
--

LOCK TABLES `vehicle_bedroom_layouts` WRITE;
/*!40000 ALTER TABLE `vehicle_bedroom_layouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_bedroom_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_cockpit_options`
--

DROP TABLE IF EXISTS `vehicle_cockpit_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_cockpit_options` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(9) NOT NULL,
  `cockpit_option_id` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`,`cockpit_option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_cockpit_options`
--

LOCK TABLES `vehicle_cockpit_options` WRITE;
/*!40000 ALTER TABLE `vehicle_cockpit_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_cockpit_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_engine`
--

DROP TABLE IF EXISTS `vehicle_engine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_engine` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(9) NOT NULL,
  `engine_id` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`,`engine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_engine`
--

LOCK TABLES `vehicle_engine` WRITE;
/*!40000 ALTER TABLE `vehicle_engine` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_engine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_exterior_equipment`
--

DROP TABLE IF EXISTS `vehicle_exterior_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_exterior_equipment` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(9) NOT NULL,
  `exterior_equipment_id` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`,`exterior_equipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_exterior_equipment`
--

LOCK TABLES `vehicle_exterior_equipment` WRITE;
/*!40000 ALTER TABLE `vehicle_exterior_equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_exterior_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_flooring`
--

DROP TABLE IF EXISTS `vehicle_flooring`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_flooring` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(9) NOT NULL,
  `flooring_id` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`,`flooring_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_flooring`
--

LOCK TABLES `vehicle_flooring` WRITE;
/*!40000 ALTER TABLE `vehicle_flooring` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_flooring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_furniture`
--

DROP TABLE IF EXISTS `vehicle_furniture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_furniture` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(9) NOT NULL,
  `furniture_id` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`,`furniture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_furniture`
--

LOCK TABLES `vehicle_furniture` WRITE;
/*!40000 ALTER TABLE `vehicle_furniture` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_furniture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_images`
--

DROP TABLE IF EXISTS `vehicle_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_images` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(9) NOT NULL,
  `image_id` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`,`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_images`
--

LOCK TABLES `vehicle_images` WRITE;
/*!40000 ALTER TABLE `vehicle_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_interior_equipment`
--

DROP TABLE IF EXISTS `vehicle_interior_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_interior_equipment` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(9) NOT NULL,
  `interior_equipment_id` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`,`interior_equipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_interior_equipment`
--

LOCK TABLES `vehicle_interior_equipment` WRITE;
/*!40000 ALTER TABLE `vehicle_interior_equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_interior_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_templates`
--

DROP TABLE IF EXISTS `vehicle_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_templates` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_templates`
--

LOCK TABLES `vehicle_templates` WRITE;
/*!40000 ALTER TABLE `vehicle_templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicles` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `category_id` int(9) NOT NULL,
  `vehicle_condition` varchar(32) NOT NULL DEFAULT '',
  `status_id` int(9) NOT NULL,
  `template_id` int(9) NOT NULL,
  `asking_price` varchar(256) NOT NULL DEFAULT '',
  `sale_price` varchar(256) NOT NULL DEFAULT '',
  `web_special` tinyint(1) NOT NULL DEFAULT '0',
  `clearance` tinyint(1) NOT NULL DEFAULT '0',
  `year` varchar(256) NOT NULL DEFAULT '',
  `make` varchar(256) NOT NULL DEFAULT '',
  `model` varchar(256) NOT NULL DEFAULT '',
  `length` varchar(256) NOT NULL DEFAULT '',
  `series` varchar(256) NOT NULL DEFAULT '',
  `item_number` varchar(256) NOT NULL DEFAULT '',
  `vin` varchar(256) NOT NULL DEFAULT '',
  `mileage` varchar(256) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `engine_id` int(9) NOT NULL,
  `fuel_type` varchar(32) NOT NULL DEFAULT '',
  `generator_make` varchar(256) NOT NULL DEFAULT '',
  `generator_kw` varchar(256) NOT NULL DEFAULT '',
  `generator_hours` varchar(256) NOT NULL DEFAULT '',
  `generator_type` varchar(32) NOT NULL DEFAULT '',
  `chassis` varchar(256) NOT NULL DEFAULT '',
  `map_price` int(22) DEFAULT NULL,
  `model_number` varchar(16) DEFAULT NULL,
  `transmission` varchar(60) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `warranty_title` varchar(255) DEFAULT NULL,
  `warranty_description` text,
  `drivetrain` varchar(60) DEFAULT NULL,
  `style` varchar(60) DEFAULT NULL,
  `cockpit_option_id` int(9) NOT NULL,
  `bedroom_layout_id` int(9) NOT NULL,
  `furniture_id` int(9) NOT NULL,
  `flooring_id` int(9) NOT NULL,
  `interior_equipment_id` int(9) NOT NULL,
  `exterior_equipment_id` int(9) NOT NULL,
  `slide_id` int(9) NOT NULL,
  `featured_special` int(9) NOT NULL,
  `interior_color` varchar(256) NOT NULL DEFAULT '',
  `exterior_color` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_make` (`make`(255)),
  KEY `idx_year` (`year`(255))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-23 14:47:03
