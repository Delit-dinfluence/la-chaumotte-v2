-- MySQL dump 10.13  Distrib 5.5.62, for debian-linux-gnu (i686)
--
-- Host: lachaumobhmysql.mysql.db    Database: lachaumobhmysql
-- ------------------------------------------------------
-- Server version	5.6.50-log

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
-- Table structure for table `app_actualite`
--

DROP TABLE IF EXISTS `app_actualite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_actualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_actualite`
--

LOCK TABLES `app_actualite` WRITE;
/*!40000 ALTER TABLE `app_actualite` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_actualite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_actualite_translation`
--

DROP TABLE IF EXISTS `app_actualite_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_actualite_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_short` longtext COLLATE utf8_unicode_ci,
  `description_long` longtext COLLATE utf8_unicode_ci,
  `image_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_actualite_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_B640290C2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_B640290C2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_actualite` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_actualite_translation`
--

LOCK TABLES `app_actualite_translation` WRITE;
/*!40000 ALTER TABLE `app_actualite_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_actualite_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_about`
--

DROP TABLE IF EXISTS `app_page_about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_about`
--

LOCK TABLES `app_page_about` WRITE;
/*!40000 ALTER TABLE `app_page_about` DISABLE KEYS */;
INSERT INTO `app_page_about` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'0.5',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_about_translation`
--

DROP TABLE IF EXISTS `app_page_about_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_about_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_about_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_B26593832C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_B26593832C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_about` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_about_translation`
--

LOCK TABLES `app_page_about_translation` WRITE;
/*!40000 ALTER TABLE `app_page_about_translation` DISABLE KEYS */;
INSERT INTO `app_page_about_translation` VALUES (1,1,'fr',NULL,'/qui-sommes-nous','','','','','');
/*!40000 ALTER TABLE `app_page_about_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account`
--

DROP TABLE IF EXISTS `app_page_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account`
--

LOCK TABLES `app_page_account` WRITE;
/*!40000 ALTER TABLE `app_page_account` DISABLE KEYS */;
INSERT INTO `app_page_account` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_adress`
--

DROP TABLE IF EXISTS `app_page_account_adress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_adress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_adress`
--

LOCK TABLES `app_page_account_adress` WRITE;
/*!40000 ALTER TABLE `app_page_account_adress` DISABLE KEYS */;
INSERT INTO `app_page_account_adress` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_account_adress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_adress_form`
--

DROP TABLE IF EXISTS `app_page_account_adress_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_adress_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_adress_form`
--

LOCK TABLES `app_page_account_adress_form` WRITE;
/*!40000 ALTER TABLE `app_page_account_adress_form` DISABLE KEYS */;
INSERT INTO `app_page_account_adress_form` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_account_adress_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_adress_form_translation`
--

DROP TABLE IF EXISTS `app_page_account_adress_form_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_adress_form_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_account_adress_form_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_D78BEB872C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_D78BEB872C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_account_adress_form` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_adress_form_translation`
--

LOCK TABLES `app_page_account_adress_form_translation` WRITE;
/*!40000 ALTER TABLE `app_page_account_adress_form_translation` DISABLE KEYS */;
INSERT INTO `app_page_account_adress_form_translation` VALUES (1,1,'fr',NULL,'/compte/adresse/edition/([-0-9]+)','','','','','');
/*!40000 ALTER TABLE `app_page_account_adress_form_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_adress_translation`
--

DROP TABLE IF EXISTS `app_page_account_adress_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_adress_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_account_adress_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_199FCE432C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_199FCE432C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_account_adress` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_adress_translation`
--

LOCK TABLES `app_page_account_adress_translation` WRITE;
/*!40000 ALTER TABLE `app_page_account_adress_translation` DISABLE KEYS */;
INSERT INTO `app_page_account_adress_translation` VALUES (1,1,'fr',NULL,'/compte/adresse','','','','','');
/*!40000 ALTER TABLE `app_page_account_adress_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_historic`
--

DROP TABLE IF EXISTS `app_page_account_historic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_historic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_historic`
--

LOCK TABLES `app_page_account_historic` WRITE;
/*!40000 ALTER TABLE `app_page_account_historic` DISABLE KEYS */;
INSERT INTO `app_page_account_historic` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_account_historic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_historic__detailstranslation`
--

DROP TABLE IF EXISTS `app_page_account_historic__detailstranslation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_historic__detailstranslation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_account_historic__detailstranslation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_3542A19C2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_3542A19C2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_account_historic_details` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_historic__detailstranslation`
--

LOCK TABLES `app_page_account_historic__detailstranslation` WRITE;
/*!40000 ALTER TABLE `app_page_account_historic__detailstranslation` DISABLE KEYS */;
INSERT INTO `app_page_account_historic__detailstranslation` VALUES (1,1,'fr',NULL,'/compte/historique-des-commandes/([a-zA-Z0-9-_]+)','','','','','');
/*!40000 ALTER TABLE `app_page_account_historic__detailstranslation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_historic_details`
--

DROP TABLE IF EXISTS `app_page_account_historic_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_historic_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_historic_details`
--

LOCK TABLES `app_page_account_historic_details` WRITE;
/*!40000 ALTER TABLE `app_page_account_historic_details` DISABLE KEYS */;
INSERT INTO `app_page_account_historic_details` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_account_historic_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_historic_translation`
--

DROP TABLE IF EXISTS `app_page_account_historic_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_historic_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_account_historic_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_75CFFDB42C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_75CFFDB42C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_account_historic` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_historic_translation`
--

LOCK TABLES `app_page_account_historic_translation` WRITE;
/*!40000 ALTER TABLE `app_page_account_historic_translation` DISABLE KEYS */;
INSERT INTO `app_page_account_historic_translation` VALUES (1,1,'fr',NULL,'/compte/historique-des-commandes','','','','','');
/*!40000 ALTER TABLE `app_page_account_historic_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_info`
--

DROP TABLE IF EXISTS `app_page_account_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_info`
--

LOCK TABLES `app_page_account_info` WRITE;
/*!40000 ALTER TABLE `app_page_account_info` DISABLE KEYS */;
INSERT INTO `app_page_account_info` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_account_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_info_translation`
--

DROP TABLE IF EXISTS `app_page_account_info_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_info_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_account_info_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_3D5855252C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_3D5855252C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_account_info` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_info_translation`
--

LOCK TABLES `app_page_account_info_translation` WRITE;
/*!40000 ALTER TABLE `app_page_account_info_translation` DISABLE KEYS */;
INSERT INTO `app_page_account_info_translation` VALUES (1,1,'fr',NULL,'/compte/informations','','','','','');
/*!40000 ALTER TABLE `app_page_account_info_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_newsletter`
--

DROP TABLE IF EXISTS `app_page_account_newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_newsletter`
--

LOCK TABLES `app_page_account_newsletter` WRITE;
/*!40000 ALTER TABLE `app_page_account_newsletter` DISABLE KEYS */;
INSERT INTO `app_page_account_newsletter` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_account_newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_newsletter_translation`
--

DROP TABLE IF EXISTS `app_page_account_newsletter_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_newsletter_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_account_newsletter_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_362825C92C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_362825C92C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_account_newsletter` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_newsletter_translation`
--

LOCK TABLES `app_page_account_newsletter_translation` WRITE;
/*!40000 ALTER TABLE `app_page_account_newsletter_translation` DISABLE KEYS */;
INSERT INTO `app_page_account_newsletter_translation` VALUES (1,1,'fr',NULL,'/compte/newsletter','','','','','');
/*!40000 ALTER TABLE `app_page_account_newsletter_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_account_translation`
--

DROP TABLE IF EXISTS `app_page_account_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_account_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_account_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_9EBF884B2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_9EBF884B2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_account_translation`
--

LOCK TABLES `app_page_account_translation` WRITE;
/*!40000 ALTER TABLE `app_page_account_translation` DISABLE KEYS */;
INSERT INTO `app_page_account_translation` VALUES (1,1,'fr',NULL,'/compte','','','','','');
/*!40000 ALTER TABLE `app_page_account_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_actualite`
--

DROP TABLE IF EXISTS `app_page_actualite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_actualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_actualite`
--

LOCK TABLES `app_page_actualite` WRITE;
/*!40000 ALTER TABLE `app_page_actualite` DISABLE KEYS */;
INSERT INTO `app_page_actualite` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_actualite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_actualite_translation`
--

DROP TABLE IF EXISTS `app_page_actualite_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_actualite_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_actualite_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_2507773D2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_2507773D2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_actualite` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_actualite_translation`
--

LOCK TABLES `app_page_actualite_translation` WRITE;
/*!40000 ALTER TABLE `app_page_actualite_translation` DISABLE KEYS */;
INSERT INTO `app_page_actualite_translation` VALUES (1,1,'fr',NULL,'/actualites/','','','','','');
/*!40000 ALTER TABLE `app_page_actualite_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_actualites`
--

DROP TABLE IF EXISTS `app_page_actualites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_actualites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_actualites`
--

LOCK TABLES `app_page_actualites` WRITE;
/*!40000 ALTER TABLE `app_page_actualites` DISABLE KEYS */;
INSERT INTO `app_page_actualites` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_actualites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_actualites_translation`
--

DROP TABLE IF EXISTS `app_page_actualites_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_actualites_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_actualites_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_46E45B752C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_46E45B752C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_actualites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_actualites_translation`
--

LOCK TABLES `app_page_actualites_translation` WRITE;
/*!40000 ALTER TABLE `app_page_actualites_translation` DISABLE KEYS */;
INSERT INTO `app_page_actualites_translation` VALUES (1,1,'fr',NULL,'/actualites','','','','','');
/*!40000 ALTER TABLE `app_page_actualites_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_cart`
--

DROP TABLE IF EXISTS `app_page_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_cart`
--

LOCK TABLES `app_page_cart` WRITE;
/*!40000 ALTER TABLE `app_page_cart` DISABLE KEYS */;
INSERT INTO `app_page_cart` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_cart_translation`
--

DROP TABLE IF EXISTS `app_page_cart_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_cart_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_cart_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_9EE1E30C2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_9EE1E30C2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_cart` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_cart_translation`
--

LOCK TABLES `app_page_cart_translation` WRITE;
/*!40000 ALTER TABLE `app_page_cart_translation` DISABLE KEYS */;
INSERT INTO `app_page_cart_translation` VALUES (1,1,'fr',NULL,'/panier','','','','','');
/*!40000 ALTER TABLE `app_page_cart_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_category`
--

DROP TABLE IF EXISTS `app_page_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_category`
--

LOCK TABLES `app_page_category` WRITE;
/*!40000 ALTER TABLE `app_page_category` DISABLE KEYS */;
INSERT INTO `app_page_category` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_category_translation`
--

DROP TABLE IF EXISTS `app_page_category_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_category_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_category_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_A603235E2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_A603235E2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_category_translation`
--

LOCK TABLES `app_page_category_translation` WRITE;
/*!40000 ALTER TABLE `app_page_category_translation` DISABLE KEYS */;
INSERT INTO `app_page_category_translation` VALUES (1,1,'fr',NULL,'/categories','','','','','');
/*!40000 ALTER TABLE `app_page_category_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_cgv`
--

DROP TABLE IF EXISTS `app_page_cgv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_cgv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_cgv`
--

LOCK TABLES `app_page_cgv` WRITE;
/*!40000 ALTER TABLE `app_page_cgv` DISABLE KEYS */;
INSERT INTO `app_page_cgv` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'0.5',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_cgv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_cgv_translation`
--

DROP TABLE IF EXISTS `app_page_cgv_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_cgv_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_cgv_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_61771C3A2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_61771C3A2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_cgv` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_cgv_translation`
--

LOCK TABLES `app_page_cgv_translation` WRITE;
/*!40000 ALTER TABLE `app_page_cgv_translation` DISABLE KEYS */;
INSERT INTO `app_page_cgv_translation` VALUES (1,1,'fr',NULL,'/conditions-generales-ventes','','','','','');
/*!40000 ALTER TABLE `app_page_cgv_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_coming_soon`
--

DROP TABLE IF EXISTS `app_page_coming_soon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_coming_soon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_coming_soon`
--

LOCK TABLES `app_page_coming_soon` WRITE;
/*!40000 ALTER TABLE `app_page_coming_soon` DISABLE KEYS */;
INSERT INTO `app_page_coming_soon` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_coming_soon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_coming_soon_translation`
--

DROP TABLE IF EXISTS `app_page_coming_soon_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_coming_soon_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_coming_soon_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_F1DC0E712C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_F1DC0E712C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_coming_soon` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_coming_soon_translation`
--

LOCK TABLES `app_page_coming_soon_translation` WRITE;
/*!40000 ALTER TABLE `app_page_coming_soon_translation` DISABLE KEYS */;
INSERT INTO `app_page_coming_soon_translation` VALUES (1,1,'fr',NULL,'/coming-soon','Bientôt disponible','','','','');
/*!40000 ALTER TABLE `app_page_coming_soon_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_connect`
--

DROP TABLE IF EXISTS `app_page_connect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_connect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_connect`
--

LOCK TABLES `app_page_connect` WRITE;
/*!40000 ALTER TABLE `app_page_connect` DISABLE KEYS */;
INSERT INTO `app_page_connect` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_connect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_connect_translation`
--

DROP TABLE IF EXISTS `app_page_connect_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_connect_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_connect_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_B9BC2A272C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_B9BC2A272C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_connect` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_connect_translation`
--

LOCK TABLES `app_page_connect_translation` WRITE;
/*!40000 ALTER TABLE `app_page_connect_translation` DISABLE KEYS */;
INSERT INTO `app_page_connect_translation` VALUES (1,1,'fr',NULL,'/connexion','Connexion','','','','');
/*!40000 ALTER TABLE `app_page_connect_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_contact`
--

DROP TABLE IF EXISTS `app_page_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_contact`
--

LOCK TABLES `app_page_contact` WRITE;
/*!40000 ALTER TABLE `app_page_contact` DISABLE KEYS */;
INSERT INTO `app_page_contact` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'0.5',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_contact_translation`
--

DROP TABLE IF EXISTS `app_page_contact_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_contact_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_contact_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_2154CBF62C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_2154CBF62C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_contact` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_contact_translation`
--

LOCK TABLES `app_page_contact_translation` WRITE;
/*!40000 ALTER TABLE `app_page_contact_translation` DISABLE KEYS */;
INSERT INTO `app_page_contact_translation` VALUES (1,1,'fr',NULL,'/contact','','','','','');
/*!40000 ALTER TABLE `app_page_contact_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_eight`
--

DROP TABLE IF EXISTS `app_page_custom_eight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_eight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_eight`
--

LOCK TABLES `app_page_custom_eight` WRITE;
/*!40000 ALTER TABLE `app_page_custom_eight` DISABLE KEYS */;
INSERT INTO `app_page_custom_eight` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_custom_eight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_eight_translation`
--

DROP TABLE IF EXISTS `app_page_custom_eight_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_eight_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_custom_eight_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_E5C9D7802C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_E5C9D7802C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_custom_eight` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_eight_translation`
--

LOCK TABLES `app_page_custom_eight_translation` WRITE;
/*!40000 ALTER TABLE `app_page_custom_eight_translation` DISABLE KEYS */;
INSERT INTO `app_page_custom_eight_translation` VALUES (1,1,'fr',NULL,'/','','','','','');
/*!40000 ALTER TABLE `app_page_custom_eight_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_five`
--

DROP TABLE IF EXISTS `app_page_custom_five`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_five` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_five`
--

LOCK TABLES `app_page_custom_five` WRITE;
/*!40000 ALTER TABLE `app_page_custom_five` DISABLE KEYS */;
INSERT INTO `app_page_custom_five` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_custom_five` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_five_translation`
--

DROP TABLE IF EXISTS `app_page_custom_five_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_five_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_custom_five_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_554A16462C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_554A16462C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_custom_five` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_five_translation`
--

LOCK TABLES `app_page_custom_five_translation` WRITE;
/*!40000 ALTER TABLE `app_page_custom_five_translation` DISABLE KEYS */;
INSERT INTO `app_page_custom_five_translation` VALUES (1,1,'fr',NULL,'/','','','','','');
/*!40000 ALTER TABLE `app_page_custom_five_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_four`
--

DROP TABLE IF EXISTS `app_page_custom_four`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_four` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_four`
--

LOCK TABLES `app_page_custom_four` WRITE;
/*!40000 ALTER TABLE `app_page_custom_four` DISABLE KEYS */;
INSERT INTO `app_page_custom_four` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_custom_four` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_four_translation`
--

DROP TABLE IF EXISTS `app_page_custom_four_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_four_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_custom_four_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_C2A547ED2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_C2A547ED2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_custom_four` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_four_translation`
--

LOCK TABLES `app_page_custom_four_translation` WRITE;
/*!40000 ALTER TABLE `app_page_custom_four_translation` DISABLE KEYS */;
INSERT INTO `app_page_custom_four_translation` VALUES (1,1,'fr',NULL,'/','','','','','');
/*!40000 ALTER TABLE `app_page_custom_four_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_nine`
--

DROP TABLE IF EXISTS `app_page_custom_nine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_nine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_nine`
--

LOCK TABLES `app_page_custom_nine` WRITE;
/*!40000 ALTER TABLE `app_page_custom_nine` DISABLE KEYS */;
INSERT INTO `app_page_custom_nine` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_custom_nine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_nine_translation`
--

DROP TABLE IF EXISTS `app_page_custom_nine_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_nine_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_custom_nine_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_73B2AB532C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_73B2AB532C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_custom_nine` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_nine_translation`
--

LOCK TABLES `app_page_custom_nine_translation` WRITE;
/*!40000 ALTER TABLE `app_page_custom_nine_translation` DISABLE KEYS */;
INSERT INTO `app_page_custom_nine_translation` VALUES (1,1,'fr',NULL,'/','','','','','');
/*!40000 ALTER TABLE `app_page_custom_nine_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_one`
--

DROP TABLE IF EXISTS `app_page_custom_one`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_one` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_one`
--

LOCK TABLES `app_page_custom_one` WRITE;
/*!40000 ALTER TABLE `app_page_custom_one` DISABLE KEYS */;
INSERT INTO `app_page_custom_one` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_custom_one` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_one_translation`
--

DROP TABLE IF EXISTS `app_page_custom_one_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_one_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_custom_one_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_1E852D822C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_1E852D822C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_custom_one` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_one_translation`
--

LOCK TABLES `app_page_custom_one_translation` WRITE;
/*!40000 ALTER TABLE `app_page_custom_one_translation` DISABLE KEYS */;
INSERT INTO `app_page_custom_one_translation` VALUES (1,1,'fr',NULL,'/','','','','','');
/*!40000 ALTER TABLE `app_page_custom_one_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_seven`
--

DROP TABLE IF EXISTS `app_page_custom_seven`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_seven` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_seven`
--

LOCK TABLES `app_page_custom_seven` WRITE;
/*!40000 ALTER TABLE `app_page_custom_seven` DISABLE KEYS */;
INSERT INTO `app_page_custom_seven` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_custom_seven` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_seven_translation`
--

DROP TABLE IF EXISTS `app_page_custom_seven_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_seven_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_custom_seven_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_36B5DE3D2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_36B5DE3D2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_custom_seven` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_seven_translation`
--

LOCK TABLES `app_page_custom_seven_translation` WRITE;
/*!40000 ALTER TABLE `app_page_custom_seven_translation` DISABLE KEYS */;
INSERT INTO `app_page_custom_seven_translation` VALUES (1,1,'fr',NULL,'/','','','','','');
/*!40000 ALTER TABLE `app_page_custom_seven_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_six`
--

DROP TABLE IF EXISTS `app_page_custom_six`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_six` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_six`
--

LOCK TABLES `app_page_custom_six` WRITE;
/*!40000 ALTER TABLE `app_page_custom_six` DISABLE KEYS */;
INSERT INTO `app_page_custom_six` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_custom_six` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_six_translation`
--

DROP TABLE IF EXISTS `app_page_custom_six_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_six_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_custom_six_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_89F4774D2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_89F4774D2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_custom_six` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_six_translation`
--

LOCK TABLES `app_page_custom_six_translation` WRITE;
/*!40000 ALTER TABLE `app_page_custom_six_translation` DISABLE KEYS */;
INSERT INTO `app_page_custom_six_translation` VALUES (1,1,'fr',NULL,'/','','','','','');
/*!40000 ALTER TABLE `app_page_custom_six_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_ten`
--

DROP TABLE IF EXISTS `app_page_custom_ten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_ten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_ten`
--

LOCK TABLES `app_page_custom_ten` WRITE;
/*!40000 ALTER TABLE `app_page_custom_ten` DISABLE KEYS */;
INSERT INTO `app_page_custom_ten` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_custom_ten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_ten_translation`
--

DROP TABLE IF EXISTS `app_page_custom_ten_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_ten_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_custom_ten_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_2CE2907D2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_2CE2907D2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_custom_ten` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_ten_translation`
--

LOCK TABLES `app_page_custom_ten_translation` WRITE;
/*!40000 ALTER TABLE `app_page_custom_ten_translation` DISABLE KEYS */;
INSERT INTO `app_page_custom_ten_translation` VALUES (1,1,'fr',NULL,'/','','','','','');
/*!40000 ALTER TABLE `app_page_custom_ten_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_three`
--

DROP TABLE IF EXISTS `app_page_custom_three`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_three` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_three`
--

LOCK TABLES `app_page_custom_three` WRITE;
/*!40000 ALTER TABLE `app_page_custom_three` DISABLE KEYS */;
INSERT INTO `app_page_custom_three` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_custom_three` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_three_translation`
--

DROP TABLE IF EXISTS `app_page_custom_three_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_three_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_custom_three_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_72D83AEF2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_72D83AEF2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_custom_three` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_three_translation`
--

LOCK TABLES `app_page_custom_three_translation` WRITE;
/*!40000 ALTER TABLE `app_page_custom_three_translation` DISABLE KEYS */;
INSERT INTO `app_page_custom_three_translation` VALUES (1,1,'fr',NULL,'/','','','','','');
/*!40000 ALTER TABLE `app_page_custom_three_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_two`
--

DROP TABLE IF EXISTS `app_page_custom_two`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_two` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_two`
--

LOCK TABLES `app_page_custom_two` WRITE;
/*!40000 ALTER TABLE `app_page_custom_two` DISABLE KEYS */;
INSERT INTO `app_page_custom_two` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_custom_two` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_custom_two_translation`
--

DROP TABLE IF EXISTS `app_page_custom_two_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_custom_two_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_custom_two_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_76A8B1392C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_76A8B1392C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_custom_two` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_custom_two_translation`
--

LOCK TABLES `app_page_custom_two_translation` WRITE;
/*!40000 ALTER TABLE `app_page_custom_two_translation` DISABLE KEYS */;
INSERT INTO `app_page_custom_two_translation` VALUES (1,1,'fr',NULL,'/','','','','','');
/*!40000 ALTER TABLE `app_page_custom_two_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_disconnect`
--

DROP TABLE IF EXISTS `app_page_disconnect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_disconnect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_disconnect`
--

LOCK TABLES `app_page_disconnect` WRITE;
/*!40000 ALTER TABLE `app_page_disconnect` DISABLE KEYS */;
INSERT INTO `app_page_disconnect` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_disconnect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_disconnect_translation`
--

DROP TABLE IF EXISTS `app_page_disconnect_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_disconnect_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_disconnect_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_EB4141462C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_EB4141462C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_disconnect` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_disconnect_translation`
--

LOCK TABLES `app_page_disconnect_translation` WRITE;
/*!40000 ALTER TABLE `app_page_disconnect_translation` DISABLE KEYS */;
INSERT INTO `app_page_disconnect_translation` VALUES (1,1,'fr',NULL,'/deconnexion','','','','','');
/*!40000 ALTER TABLE `app_page_disconnect_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_error`
--

DROP TABLE IF EXISTS `app_page_error`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_error`
--

LOCK TABLES `app_page_error` WRITE;
/*!40000 ALTER TABLE `app_page_error` DISABLE KEYS */;
INSERT INTO `app_page_error` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_error` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_error_403`
--

DROP TABLE IF EXISTS `app_page_error_403`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_error_403` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_error_403`
--

LOCK TABLES `app_page_error_403` WRITE;
/*!40000 ALTER TABLE `app_page_error_403` DISABLE KEYS */;
INSERT INTO `app_page_error_403` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_error_403` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_error_403_translation`
--

DROP TABLE IF EXISTS `app_page_error_403_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_error_403_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_error_403_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_C5344F12C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_C5344F12C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_error_403` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_error_403_translation`
--

LOCK TABLES `app_page_error_403_translation` WRITE;
/*!40000 ALTER TABLE `app_page_error_403_translation` DISABLE KEYS */;
INSERT INTO `app_page_error_403_translation` VALUES (1,1,'fr',NULL,'/erreur/403','','','','','');
/*!40000 ALTER TABLE `app_page_error_403_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_error_404`
--

DROP TABLE IF EXISTS `app_page_error_404`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_error_404` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_error_404`
--

LOCK TABLES `app_page_error_404` WRITE;
/*!40000 ALTER TABLE `app_page_error_404` DISABLE KEYS */;
INSERT INTO `app_page_error_404` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_error_404` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_error_404_translation`
--

DROP TABLE IF EXISTS `app_page_error_404_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_error_404_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_error_404_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_712042A92C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_712042A92C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_error_404` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_error_404_translation`
--

LOCK TABLES `app_page_error_404_translation` WRITE;
/*!40000 ALTER TABLE `app_page_error_404_translation` DISABLE KEYS */;
INSERT INTO `app_page_error_404_translation` VALUES (1,1,'fr',NULL,'/erreur/404','','','','','');
/*!40000 ALTER TABLE `app_page_error_404_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_error_translation`
--

DROP TABLE IF EXISTS `app_page_error_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_error_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_error_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_8B465EBB2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_8B465EBB2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_error` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_error_translation`
--

LOCK TABLES `app_page_error_translation` WRITE;
/*!40000 ALTER TABLE `app_page_error_translation` DISABLE KEYS */;
INSERT INTO `app_page_error_translation` VALUES (1,1,'fr',NULL,'/erreur/500','','','','','');
/*!40000 ALTER TABLE `app_page_error_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_faq`
--

DROP TABLE IF EXISTS `app_page_faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_faq`
--

LOCK TABLES `app_page_faq` WRITE;
/*!40000 ALTER TABLE `app_page_faq` DISABLE KEYS */;
INSERT INTO `app_page_faq` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'0.5',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_faq_translation`
--

DROP TABLE IF EXISTS `app_page_faq_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_faq_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_faq_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_D741EF5F2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_D741EF5F2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_faq` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_faq_translation`
--

LOCK TABLES `app_page_faq_translation` WRITE;
/*!40000 ALTER TABLE `app_page_faq_translation` DISABLE KEYS */;
INSERT INTO `app_page_faq_translation` VALUES (1,1,'fr',NULL,'/foire-aux-questions','','','','','');
/*!40000 ALTER TABLE `app_page_faq_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_forgot_password`
--

DROP TABLE IF EXISTS `app_page_forgot_password`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_forgot_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_forgot_password`
--

LOCK TABLES `app_page_forgot_password` WRITE;
/*!40000 ALTER TABLE `app_page_forgot_password` DISABLE KEYS */;
INSERT INTO `app_page_forgot_password` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_forgot_password` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_forgot_password_reset`
--

DROP TABLE IF EXISTS `app_page_forgot_password_reset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_forgot_password_reset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_forgot_password_reset`
--

LOCK TABLES `app_page_forgot_password_reset` WRITE;
/*!40000 ALTER TABLE `app_page_forgot_password_reset` DISABLE KEYS */;
INSERT INTO `app_page_forgot_password_reset` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_forgot_password_reset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_forgot_password_reset_translation`
--

DROP TABLE IF EXISTS `app_page_forgot_password_reset_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_forgot_password_reset_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_forgot_password_reset_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_2C24EA9B2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_2C24EA9B2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_forgot_password_reset` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_forgot_password_reset_translation`
--

LOCK TABLES `app_page_forgot_password_reset_translation` WRITE;
/*!40000 ALTER TABLE `app_page_forgot_password_reset_translation` DISABLE KEYS */;
INSERT INTO `app_page_forgot_password_reset_translation` VALUES (1,1,'fr',NULL,'/reinitialisation-du-mot-de-passe?token=([a-zA-Z0-9-_]+)&email=([a-zA-Z0-9-_]+)','','','','','');
/*!40000 ALTER TABLE `app_page_forgot_password_reset_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_forgot_password_translation`
--

DROP TABLE IF EXISTS `app_page_forgot_password_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_forgot_password_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_forgot_password_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_722225752C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_722225752C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_forgot_password` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_forgot_password_translation`
--

LOCK TABLES `app_page_forgot_password_translation` WRITE;
/*!40000 ALTER TABLE `app_page_forgot_password_translation` DISABLE KEYS */;
INSERT INTO `app_page_forgot_password_translation` VALUES (1,1,'fr',NULL,'/mot-de-passe-oublie','','','','','');
/*!40000 ALTER TABLE `app_page_forgot_password_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_general`
--

DROP TABLE IF EXISTS `app_page_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_general`
--

LOCK TABLES `app_page_general` WRITE;
/*!40000 ALTER TABLE `app_page_general` DISABLE KEYS */;
INSERT INTO `app_page_general` VALUES (1,NULL,NULL,NULL,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_general_translation`
--

DROP TABLE IF EXISTS `app_page_general_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_general_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_general_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_C883E8B82C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_C883E8B82C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_general` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_general_translation`
--

LOCK TABLES `app_page_general_translation` WRITE;
/*!40000 ALTER TABLE `app_page_general_translation` DISABLE KEYS */;
INSERT INTO `app_page_general_translation` VALUES (1,1,'fr',NULL,'unknown','','','','','');
/*!40000 ALTER TABLE `app_page_general_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_home`
--

DROP TABLE IF EXISTS `app_page_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_home`
--

LOCK TABLES `app_page_home` WRITE;
/*!40000 ALTER TABLE `app_page_home` DISABLE KEYS */;
INSERT INTO `app_page_home` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_home_translation`
--

DROP TABLE IF EXISTS `app_page_home_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_home_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_home_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_70FE27012C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_70FE27012C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_home` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_home_translation`
--

LOCK TABLES `app_page_home_translation` WRITE;
/*!40000 ALTER TABLE `app_page_home_translation` DISABLE KEYS */;
INSERT INTO `app_page_home_translation` VALUES (1,1,'fr',NULL,'/','','','','','');
/*!40000 ALTER TABLE `app_page_home_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_info_delivery`
--

DROP TABLE IF EXISTS `app_page_info_delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_info_delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_info_delivery`
--

LOCK TABLES `app_page_info_delivery` WRITE;
/*!40000 ALTER TABLE `app_page_info_delivery` DISABLE KEYS */;
INSERT INTO `app_page_info_delivery` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'0.5',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_info_delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_info_delivery_translation`
--

DROP TABLE IF EXISTS `app_page_info_delivery_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_info_delivery_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_info_delivery_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_EBEC6D7B2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_EBEC6D7B2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_info_delivery` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_info_delivery_translation`
--

LOCK TABLES `app_page_info_delivery_translation` WRITE;
/*!40000 ALTER TABLE `app_page_info_delivery_translation` DISABLE KEYS */;
INSERT INTO `app_page_info_delivery_translation` VALUES (1,1,'fr',NULL,'/informations-livraison','','','','','');
/*!40000 ALTER TABLE `app_page_info_delivery_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_info_payment`
--

DROP TABLE IF EXISTS `app_page_info_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_info_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_info_payment`
--

LOCK TABLES `app_page_info_payment` WRITE;
/*!40000 ALTER TABLE `app_page_info_payment` DISABLE KEYS */;
INSERT INTO `app_page_info_payment` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'0.5',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_info_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_info_payment_translation`
--

DROP TABLE IF EXISTS `app_page_info_payment_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_info_payment_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_info_payment_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_DC001EA82C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_DC001EA82C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_info_payment` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_info_payment_translation`
--

LOCK TABLES `app_page_info_payment_translation` WRITE;
/*!40000 ALTER TABLE `app_page_info_payment_translation` DISABLE KEYS */;
INSERT INTO `app_page_info_payment_translation` VALUES (1,1,'fr',NULL,'/informations-paiement','','','','','');
/*!40000 ALTER TABLE `app_page_info_payment_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_maintenance`
--

DROP TABLE IF EXISTS `app_page_maintenance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_maintenance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_maintenance`
--

LOCK TABLES `app_page_maintenance` WRITE;
/*!40000 ALTER TABLE `app_page_maintenance` DISABLE KEYS */;
INSERT INTO `app_page_maintenance` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_maintenance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_maintenance_translation`
--

DROP TABLE IF EXISTS `app_page_maintenance_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_maintenance_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_maintenance_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_E43724272C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_E43724272C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_maintenance` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_maintenance_translation`
--

LOCK TABLES `app_page_maintenance_translation` WRITE;
/*!40000 ALTER TABLE `app_page_maintenance_translation` DISABLE KEYS */;
INSERT INTO `app_page_maintenance_translation` VALUES (1,1,'fr',NULL,'/maintenance','Maintenance en cours ...','','','','');
/*!40000 ALTER TABLE `app_page_maintenance_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_mini`
--

DROP TABLE IF EXISTS `app_page_mini`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_mini` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_mini`
--

LOCK TABLES `app_page_mini` WRITE;
/*!40000 ALTER TABLE `app_page_mini` DISABLE KEYS */;
INSERT INTO `app_page_mini` VALUES (1,1,0,'2019-10-25 14:35:34','2019-11-18 09:40:46','SETTINGS',0,1,'1',NULL,NULL,'5dd2590e5c159284262988.JPG','5dd2590e66f85600727271.JPG');
/*!40000 ALTER TABLE `app_page_mini` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_mini_translation`
--

DROP TABLE IF EXISTS `app_page_mini_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_mini_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_mini_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_CE86B2C52C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_CE86B2C52C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_mini` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_mini_translation`
--

LOCK TABLES `app_page_mini_translation` WRITE;
/*!40000 ALTER TABLE `app_page_mini_translation` DISABLE KEYS */;
INSERT INTO `app_page_mini_translation` VALUES (1,1,'fr',NULL,'/','La Chaumotte - Vente de volailles dans le Cher','La ferme de La Chaumotte est une exploitation familiale qui élève des poulets et des pintades à Villequiers dans le Cher.',NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_mini_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_notice`
--

DROP TABLE IF EXISTS `app_page_notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_notice`
--

LOCK TABLES `app_page_notice` WRITE;
/*!40000 ALTER TABLE `app_page_notice` DISABLE KEYS */;
INSERT INTO `app_page_notice` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'0.5',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_notice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_notice_translation`
--

DROP TABLE IF EXISTS `app_page_notice_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_notice_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_notice_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_249D6C432C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_249D6C432C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_notice` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_notice_translation`
--

LOCK TABLES `app_page_notice_translation` WRITE;
/*!40000 ALTER TABLE `app_page_notice_translation` DISABLE KEYS */;
INSERT INTO `app_page_notice_translation` VALUES (1,1,'fr',NULL,'/mentions-legales','','','','','');
/*!40000 ALTER TABLE `app_page_notice_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_order`
--

DROP TABLE IF EXISTS `app_page_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_order`
--

LOCK TABLES `app_page_order` WRITE;
/*!40000 ALTER TABLE `app_page_order` DISABLE KEYS */;
INSERT INTO `app_page_order` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_order_failed`
--

DROP TABLE IF EXISTS `app_page_order_failed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_order_failed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_order_failed`
--

LOCK TABLES `app_page_order_failed` WRITE;
/*!40000 ALTER TABLE `app_page_order_failed` DISABLE KEYS */;
INSERT INTO `app_page_order_failed` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_order_failed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_order_failed_translation`
--

DROP TABLE IF EXISTS `app_page_order_failed_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_order_failed_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_order_failed_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_26945AE2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_26945AE2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_order_failed` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_order_failed_translation`
--

LOCK TABLES `app_page_order_failed_translation` WRITE;
/*!40000 ALTER TABLE `app_page_order_failed_translation` DISABLE KEYS */;
INSERT INTO `app_page_order_failed_translation` VALUES (1,1,'fr',NULL,'/commande-echec','','','','','');
/*!40000 ALTER TABLE `app_page_order_failed_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_order_translation`
--

DROP TABLE IF EXISTS `app_page_order_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_order_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_order_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_DC510C42C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_DC510C42C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_order` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_order_translation`
--

LOCK TABLES `app_page_order_translation` WRITE;
/*!40000 ALTER TABLE `app_page_order_translation` DISABLE KEYS */;
INSERT INTO `app_page_order_translation` VALUES (1,1,'fr',NULL,'/commande','','','','','');
/*!40000 ALTER TABLE `app_page_order_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_order_validated`
--

DROP TABLE IF EXISTS `app_page_order_validated`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_order_validated` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_order_validated`
--

LOCK TABLES `app_page_order_validated` WRITE;
/*!40000 ALTER TABLE `app_page_order_validated` DISABLE KEYS */;
INSERT INTO `app_page_order_validated` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_order_validated` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_order_validated_translation`
--

DROP TABLE IF EXISTS `app_page_order_validated_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_order_validated_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_order_validated_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_2CB995F02C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_2CB995F02C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_order_validated` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_order_validated_translation`
--

LOCK TABLES `app_page_order_validated_translation` WRITE;
/*!40000 ALTER TABLE `app_page_order_validated_translation` DISABLE KEYS */;
INSERT INTO `app_page_order_validated_translation` VALUES (1,1,'fr',NULL,'/commande-validee','','','','','');
/*!40000 ALTER TABLE `app_page_order_validated_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_product`
--

DROP TABLE IF EXISTS `app_page_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_product`
--

LOCK TABLES `app_page_product` WRITE;
/*!40000 ALTER TABLE `app_page_product` DISABLE KEYS */;
INSERT INTO `app_page_product` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_product_translation`
--

DROP TABLE IF EXISTS `app_page_product_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_product_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_product_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_E3D7EA572C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_E3D7EA572C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_product_translation`
--

LOCK TABLES `app_page_product_translation` WRITE;
/*!40000 ALTER TABLE `app_page_product_translation` DISABLE KEYS */;
INSERT INTO `app_page_product_translation` VALUES (1,1,'fr',NULL,'/([a-zA-Z0-9-_]+)','','','','','');
/*!40000 ALTER TABLE `app_page_product_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_products`
--

DROP TABLE IF EXISTS `app_page_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_products`
--

LOCK TABLES `app_page_products` WRITE;
/*!40000 ALTER TABLE `app_page_products` DISABLE KEYS */;
INSERT INTO `app_page_products` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_products_translation`
--

DROP TABLE IF EXISTS `app_page_products_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_products_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_products_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_EB4503AE2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_EB4503AE2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_products_translation`
--

LOCK TABLES `app_page_products_translation` WRITE;
/*!40000 ALTER TABLE `app_page_products_translation` DISABLE KEYS */;
INSERT INTO `app_page_products_translation` VALUES (1,1,'fr',NULL,'/([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+)','','','','','');
/*!40000 ALTER TABLE `app_page_products_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_register`
--

DROP TABLE IF EXISTS `app_page_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_register`
--

LOCK TABLES `app_page_register` WRITE;
/*!40000 ALTER TABLE `app_page_register` DISABLE KEYS */;
INSERT INTO `app_page_register` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,0,'0',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_register_translation`
--

DROP TABLE IF EXISTS `app_page_register_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_register_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_register_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_D7C135532C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_D7C135532C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_register` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_register_translation`
--

LOCK TABLES `app_page_register_translation` WRITE;
/*!40000 ALTER TABLE `app_page_register_translation` DISABLE KEYS */;
INSERT INTO `app_page_register_translation` VALUES (1,1,'fr',NULL,'/inscription','','','','','');
/*!40000 ALTER TABLE `app_page_register_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_research`
--

DROP TABLE IF EXISTS `app_page_research`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_research` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_research`
--

LOCK TABLES `app_page_research` WRITE;
/*!40000 ALTER TABLE `app_page_research` DISABLE KEYS */;
INSERT INTO `app_page_research` VALUES (1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34','SETTINGS',0,1,'1',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_page_research` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page_research_translation`
--

DROP TABLE IF EXISTS `app_page_research_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page_research_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_page_research_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_523592592C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_523592592C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_page_research` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page_research_translation`
--

LOCK TABLES `app_page_research_translation` WRITE;
/*!40000 ALTER TABLE `app_page_research_translation` DISABLE KEYS */;
INSERT INTO `app_page_research_translation` VALUES (1,1,'fr',NULL,'/recherche','','','','','');
/*!40000 ALTER TABLE `app_page_research_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_slide`
--

DROP TABLE IF EXISTS `app_slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_type` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_logo` tinyint(1) NOT NULL,
  `use_url` tinyint(1) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A43C63AF140AB620` (`page`),
  CONSTRAINT `FK_A43C63AF140AB620` FOREIGN KEY (`page`) REFERENCES `core_page` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_slide`
--

LOCK TABLES `app_slide` WRITE;
/*!40000 ALTER TABLE `app_slide` DISABLE KEYS */;
INSERT INTO `app_slide` VALUES (1,2,'Slide n°1',0,'5dc2f81e529dc315275425.jpg',0,0,NULL,1,1,'2019-11-05 18:02:29','2019-11-06 17:43:10','SETTINGS',0,1,NULL,NULL,NULL,NULL,NULL),(2,NULL,'Slide n°3',0,'5dc27f4e7f3c6602756913.jpg',0,0,NULL,1,3,'2019-11-06 09:06:57','2019-11-06 09:07:42','SETTINGS',0,1,NULL,NULL,NULL,NULL,NULL),(3,NULL,'Slide n°4',0,'5dc27f7e78b56021474198.jpg',0,0,NULL,0,4,'2019-11-06 09:08:30','2019-11-06 09:08:30','SETTINGS',0,1,NULL,NULL,NULL,NULL,NULL),(4,NULL,'Slide n°2',0,'5dc2fb089a7df638291021.jpg',0,0,NULL,1,2,'2019-11-06 09:08:51','2019-11-06 17:55:36','SETTINGS',0,1,NULL,NULL,NULL,NULL,NULL),(5,NULL,'Slide n°5',0,'5dc2f88811e37377818766.jpg',0,0,NULL,1,5,'2019-11-06 09:09:14','2019-11-06 17:44:56','SETTINGS',0,1,NULL,NULL,NULL,NULL,NULL),(6,NULL,'Slide n°6',0,'5dc2f8cbdc823927354081.jpg',0,0,NULL,1,6,'2019-11-06 17:46:03','2019-11-06 17:46:03','SETTINGS',0,1,NULL,NULL,NULL,NULL,NULL),(7,NULL,'Saucisson sec',0,'5dc57a18290bb311059840.png',0,0,NULL,1,7,'2019-11-08 15:15:41','2019-11-08 15:22:16','SETTINGS',0,1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_slide_translation`
--

DROP TABLE IF EXISTS `app_slide_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_slide_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_slide_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_E2079D972C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_E2079D972C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `app_slide` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_slide_translation`
--

LOCK TABLES `app_slide_translation` WRITE;
/*!40000 ALTER TABLE `app_slide_translation` DISABLE KEYS */;
INSERT INTO `app_slide_translation` VALUES (1,2,NULL,'Rillettes de volaille','fr',NULL,NULL,NULL,NULL,NULL,NULL),(2,3,NULL,'Terrine de volaille','fr',NULL,NULL,NULL,NULL,NULL,NULL),(3,4,NULL,'Pintade rôtie','fr',NULL,NULL,NULL,NULL,NULL,NULL),(4,5,NULL,'Saucisson au poivre vert','fr',NULL,NULL,NULL,NULL,NULL,NULL),(5,1,NULL,'Poulet rôti','fr',NULL,NULL,NULL,NULL,NULL,NULL),(6,6,NULL,'Saucisson aux gésiers','fr',NULL,NULL,NULL,NULL,NULL,NULL),(7,7,NULL,'Saucisson sec','fr',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_slide_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_group_file_format`
--

DROP TABLE IF EXISTS `attribute_group_file_format`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_group_file_format` (
  `attribute_group_id` int(11) NOT NULL,
  `file_format_id` int(11) NOT NULL,
  PRIMARY KEY (`attribute_group_id`,`file_format_id`),
  KEY `IDX_1E8E0DE162D643B7` (`attribute_group_id`),
  KEY `IDX_1E8E0DE158264973` (`file_format_id`),
  CONSTRAINT `FK_1E8E0DE158264973` FOREIGN KEY (`file_format_id`) REFERENCES `core_file_format` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_1E8E0DE162D643B7` FOREIGN KEY (`attribute_group_id`) REFERENCES `shopping_attribute_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_group_file_format`
--

LOCK TABLES `attribute_group_file_format` WRITE;
/*!40000 ALTER TABLE `attribute_group_file_format` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_group_file_format` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_translation`
--

DROP TABLE IF EXISTS `attribute_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attribute_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_89B5B6BF2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_89B5B6BF2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_attribute` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_translation`
--

LOCK TABLES `attribute_translation` WRITE;
/*!40000 ALTER TABLE `attribute_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authorization_user`
--

DROP TABLE IF EXISTS `authorization_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authorization_user` (
  `authorization_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`authorization_id`,`user_id`),
  KEY `IDX_D5B50E692F8B0EB2` (`authorization_id`),
  KEY `IDX_D5B50E69A76ED395` (`user_id`),
  CONSTRAINT `FK_D5B50E692F8B0EB2` FOREIGN KEY (`authorization_id`) REFERENCES `users_authorizations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_D5B50E69A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authorization_user`
--

LOCK TABLES `authorization_user` WRITE;
/*!40000 ALTER TABLE `authorization_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `authorization_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_translation`
--

DROP TABLE IF EXISTS `category_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `image_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_3F207042C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_3F207042C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_translation`
--

LOCK TABLES `category_translation` WRITE;
/*!40000 ALTER TABLE `category_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_coming_soon_configuration`
--

DROP TABLE IF EXISTS `core_coming_soon_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_coming_soon_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `use_coming_soon` tinyint(1) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_coming_soon_configuration`
--

LOCK TABLES `core_coming_soon_configuration` WRITE;
/*!40000 ALTER TABLE `core_coming_soon_configuration` DISABLE KEYS */;
INSERT INTO `core_coming_soon_configuration` VALUES (1,0,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `core_coming_soon_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_coming_soon_configuration_translation`
--

DROP TABLE IF EXISTS `core_coming_soon_configuration_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_coming_soon_configuration_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_coming_soon_configuration_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_23EC6E772C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_23EC6E772C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `core_coming_soon_configuration` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_coming_soon_configuration_translation`
--

LOCK TABLES `core_coming_soon_configuration_translation` WRITE;
/*!40000 ALTER TABLE `core_coming_soon_configuration_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_coming_soon_configuration_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_configuration`
--

DROP TABLE IF EXISTS `core_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_configuration`
--

LOCK TABLES `core_configuration` WRITE;
/*!40000 ALTER TABLE `core_configuration` DISABLE KEYS */;
INSERT INTO `core_configuration` VALUES (1,'','',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `core_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_cookie_configuration`
--

DROP TABLE IF EXISTS `core_cookie_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_cookie_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `google_analytics` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add_this` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pixel_facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recaptcha_version` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recaptcha_score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recaptcha_client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recaptcha_server` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recaptcha_hostname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_cookie_configuration`
--

LOCK TABLES `core_cookie_configuration` WRITE;
/*!40000 ALTER TABLE `core_cookie_configuration` DISABLE KEYS */;
INSERT INTO `core_cookie_configuration` VALUES (1,'UA-152764183-1','','','2','0.5','6Lc8tLoUAAAAAHyl7L9PIykOKD4ltEUKgVZCWl_G','6Lc8tLoUAAAAAP9MaooMBVIv11R4X2vXwzF8m-A1','127.0.0.1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `core_cookie_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_design`
--

DROP TABLE IF EXISTS `core_design`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_design` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theme` int(11) NOT NULL,
  `font_family` int(11) NOT NULL,
  `font_size` int(11) NOT NULL,
  `color_first` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_second` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sidebar_background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sidebar_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sidebar_width` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_design`
--

LOCK TABLES `core_design` WRITE;
/*!40000 ALTER TABLE `core_design` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_design` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_documentation`
--

DROP TABLE IF EXISTS `core_documentation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_documentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_documentation`
--

LOCK TABLES `core_documentation` WRITE;
/*!40000 ALTER TABLE `core_documentation` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_documentation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_documentation_translation`
--

DROP TABLE IF EXISTS `core_documentation_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_documentation_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_documentation_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_6CC007D72C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_6CC007D72C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `core_documentation` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_documentation_translation`
--

LOCK TABLES `core_documentation_translation` WRITE;
/*!40000 ALTER TABLE `core_documentation_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_documentation_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_file_format`
--

DROP TABLE IF EXISTS `core_file_format`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_file_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_file_format`
--

LOCK TABLES `core_file_format` WRITE;
/*!40000 ALTER TABLE `core_file_format` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_file_format` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_gallery`
--

DROP TABLE IF EXISTS `core_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_type` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `theme` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `columns` int(11) NOT NULL,
  `rows` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_gallery`
--

LOCK TABLES `core_gallery` WRITE;
/*!40000 ALTER TABLE `core_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_gallery_configuration`
--

DROP TABLE IF EXISTS `core_gallery_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_gallery_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `columns_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `column_height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_gallery_configuration`
--

LOCK TABLES `core_gallery_configuration` WRITE;
/*!40000 ALTER TABLE `core_gallery_configuration` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_gallery_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_gallery_translation`
--

DROP TABLE IF EXISTS `core_gallery_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_gallery_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_gallery_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_574ACAF82C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_574ACAF82C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `core_gallery` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_gallery_translation`
--

LOCK TABLES `core_gallery_translation` WRITE;
/*!40000 ALTER TABLE `core_gallery_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_gallery_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_google_map_configuration`
--

DROP TABLE IF EXISTS `core_google_map_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_google_map_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `api_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zoom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_google_map_configuration`
--

LOCK TABLES `core_google_map_configuration` WRITE;
/*!40000 ALTER TABLE `core_google_map_configuration` DISABLE KEYS */;
INSERT INTO `core_google_map_configuration` VALUES (1,'','','','',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `core_google_map_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_history`
--

DROP TABLE IF EXISTS `core_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_35ADC5788D93D649` (`user`),
  CONSTRAINT `FK_35ADC5788D93D649` FOREIGN KEY (`user`) REFERENCES `users_user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_history`
--

LOCK TABLES `core_history` WRITE;
/*!40000 ALTER TABLE `core_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_history_configuration`
--

DROP TABLE IF EXISTS `core_history_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_history_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `use_form_new` tinyint(1) NOT NULL,
  `use_form_edit` tinyint(1) NOT NULL,
  `use_form_duplicate` tinyint(1) NOT NULL,
  `use_form_statut` tinyint(1) NOT NULL,
  `use_form_remove` tinyint(1) NOT NULL,
  `use_login` tinyint(1) NOT NULL,
  `email_level` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_history_configuration`
--

LOCK TABLES `core_history_configuration` WRITE;
/*!40000 ALTER TABLE `core_history_configuration` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_history_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_image`
--

DROP TABLE IF EXISTS `core_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_image`
--

LOCK TABLES `core_image` WRITE;
/*!40000 ALTER TABLE `core_image` DISABLE KEYS */;
INSERT INTO `core_image` VALUES (1,'NO_IMAGE',NULL,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(2,'BG_HEADER','5db3052343f61622202061.jpg',1,0,'2019-10-25 14:35:34','2019-10-25 16:22:27'),(3,'PAGE_TITLE','5db30563021f7638604858.png',1,0,'2019-10-25 14:35:34','2019-10-25 16:23:31'),(4,'POLA_1','5db717f232378791325385.png',1,0,'2019-10-25 14:35:34','2019-10-28 17:31:46'),(8,'ELEVAGE_1','5dbaf527d5f2c897878052.png',1,0,'2019-10-25 14:35:34','2019-10-31 15:52:23'),(9,'ALIMENTATION_1','5dbaf53425cbe411785374.png',1,0,'2019-10-25 14:35:34','2019-10-31 15:52:36'),(10,'VOLAILLES_1','5dbaf56fa2da3606460454.png',1,0,'2019-10-25 14:35:34','2019-10-31 15:53:35'),(11,'SLIDE_1','5dbadb0cbddc6813942612.jpg',1,0,'2019-10-25 14:35:34','2019-10-31 14:01:00'),(12,'POULE_ORDER','5db6d2380a2e6044408288.png',1,0,'2019-10-25 14:35:34','2019-10-28 12:34:16'),(13,'SLIDE_2','5dbadba19bbe2233510847.jpg',1,0,'2019-10-25 14:35:34','2019-10-31 14:03:29'),(14,'SLIDE_3','5dbadc0794233419127401.jpg',1,0,'2019-10-25 14:35:34','2019-10-31 14:05:11'),(15,'SLIDE_4','5dbadc94c3e1a174128795.jpg',0,0,'2019-10-31 14:07:32','2019-10-31 14:07:32'),(16,'SLIDE_5','5dbadcbea989f838718459.jpg',0,0,'2019-10-31 14:08:14','2019-10-31 14:08:14'),(17,'BG_EPI','5dc15b33d460e676330218.jpg',0,0,'2019-11-05 12:21:22','2019-11-05 12:21:23');
/*!40000 ALTER TABLE `core_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_image_translation`
--

DROP TABLE IF EXISTS `core_image_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_image_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_image_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_7CB707DD2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_7CB707DD2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `core_image` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_image_translation`
--

LOCK TABLES `core_image_translation` WRITE;
/*!40000 ALTER TABLE `core_image_translation` DISABLE KEYS */;
INSERT INTO `core_image_translation` VALUES (2,3,NULL,'logo la Chaumotte','fr'),(3,4,NULL,'photo la Chaumotte','fr'),(7,8,'élevage en liberté',NULL,'fr'),(8,9,'alimentation issue de la ferme',NULL,'fr'),(9,10,'volailles et plast cuisinés',NULL,'fr'),(10,11,NULL,'Poulet confit','fr'),(11,12,NULL,'poule commande','fr'),(12,13,NULL,'rillettes de volailles','fr'),(13,14,NULL,'Terrine de volaille','fr'),(14,15,NULL,'viande de poulet','fr'),(15,16,NULL,'saucisson de poulet','fr');
/*!40000 ALTER TABLE `core_image_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_information`
--

DROP TABLE IF EXISTS `core_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_at` datetime DEFAULT NULL,
  `last_update_content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_module_shopping` tinyint(1) NOT NULL,
  `use_module_blog` tinyint(1) NOT NULL,
  `use_module_library` tinyint(1) NOT NULL,
  `use_module_calendar` tinyint(1) NOT NULL,
  `use_module_newsletter` tinyint(1) NOT NULL,
  `use_module_coming_soon` tinyint(1) NOT NULL,
  `use_module_language` tinyint(1) NOT NULL,
  `use_module_dashboard` tinyint(1) NOT NULL,
  `use_module_statistics` tinyint(1) NOT NULL,
  `use_module_users` tinyint(1) NOT NULL,
  `use_module_media` tinyint(1) NOT NULL,
  `use_module_reference` tinyint(1) NOT NULL,
  `use_module_gallery` tinyint(1) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_information`
--

LOCK TABLES `core_information` WRITE;
/*!40000 ALTER TABLE `core_information` DISABLE KEYS */;
INSERT INTO `core_information` VALUES (1,NULL,NULL,1,0,0,0,0,0,1,0,0,1,1,0,0,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `core_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_language`
--

DROP TABLE IF EXISTS `core_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_format` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_format_full` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_language`
--

LOCK TABLES `core_language` WRITE;
/*!40000 ALTER TABLE `core_language` DISABLE KEYS */;
INSERT INTO `core_language` VALUES (1,'fr','fr','d/m/Y','d/m/Y H:i:s',NULL,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(2,'en-gb','gb','Y-m-d','Y-m-d H:i:s',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(3,'de-de','de','d.m.Y','d.m.Y H:i:s',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(4,'es-es','es','d/m/Y','d/m/Y H:i:s',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(5,'it-it','it','d/m/Y','d/m/Y H:i:s',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(6,'pt-pt','pt','Y-m-d','Y-m-d H:i:s',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(7,'da-dk','da','Y-m-d','Y-m-d H:i:s',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(8,'nl-nl','nl','d-m-Y','d-m-Y H:i:s',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(9,'zh-cn','zh','Y-m-d','Y-m-d H:i:s',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `core_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_language_translation`
--

DROP TABLE IF EXISTS `core_language_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_language_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_language_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_25471F552C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_25471F552C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `core_language` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_language_translation`
--

LOCK TABLES `core_language_translation` WRITE;
/*!40000 ALTER TABLE `core_language_translation` DISABLE KEYS */;
INSERT INTO `core_language_translation` VALUES (1,1,'Français','fr'),(2,2,'Anglais','fr'),(3,3,'Allemand','fr'),(4,4,'Espagnol','fr'),(5,5,'Italien','fr'),(6,6,'Portugais','fr'),(7,7,'Danois','fr'),(8,8,'Néerlandais','fr'),(9,9,'Chinois simplifié','fr');
/*!40000 ALTER TABLE `core_language_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_maintenance_configuration`
--

DROP TABLE IF EXISTS `core_maintenance_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_maintenance_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `use_maintenance` tinyint(1) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_maintenance_configuration`
--

LOCK TABLES `core_maintenance_configuration` WRITE;
/*!40000 ALTER TABLE `core_maintenance_configuration` DISABLE KEYS */;
INSERT INTO `core_maintenance_configuration` VALUES (1,0,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `core_maintenance_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_maintenance_configuration_translation`
--

DROP TABLE IF EXISTS `core_maintenance_configuration_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_maintenance_configuration_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_maintenance_configuration_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_93A20CE02C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_93A20CE02C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `core_maintenance_configuration` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_maintenance_configuration_translation`
--

LOCK TABLES `core_maintenance_configuration_translation` WRITE;
/*!40000 ALTER TABLE `core_maintenance_configuration_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_maintenance_configuration_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_media_file`
--

DROP TABLE IF EXISTS `core_media_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_media_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_media_file`
--

LOCK TABLES `core_media_file` WRITE;
/*!40000 ALTER TABLE `core_media_file` DISABLE KEYS */;
INSERT INTO `core_media_file` VALUES (1,'PRODUCTS','5f50ae8cdb356721873551.pdf',0,0,'2019-10-28 11:24:33','2020-09-03 10:51:25');
/*!40000 ALTER TABLE `core_media_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_media_file_translation`
--

DROP TABLE IF EXISTS `core_media_file_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_media_file_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `document_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_media_file_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_84F0BE4A2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_84F0BE4A2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `core_media_file` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_media_file_translation`
--

LOCK TABLES `core_media_file_translation` WRITE;
/*!40000 ALTER TABLE `core_media_file_translation` DISABLE KEYS */;
INSERT INTO `core_media_file_translation` VALUES (1,1,'les-produits.pdf',NULL,'fr');
/*!40000 ALTER TABLE `core_media_file_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_page`
--

DROP TABLE IF EXISTS `core_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8_unicode_ci,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_entity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_module` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_page`
--

LOCK TABLES `core_page` WRITE;
/*!40000 ALTER TABLE `core_page` DISABLE KEYS */;
INSERT INTO `core_page` VALUES (1,NULL,'Général','PageController','PageGeneral','App','form','1',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(2,NULL,'Accueil','PageController','PageHome','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(3,NULL,'Mini-site','PageController','PageMini','App','form','1',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(4,NULL,'Actualités','PageController','PageActualites','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(5,NULL,'Actualité','PageController','PageActualite','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(6,NULL,'Rechercher','PageController','PageResearch','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(7,NULL,'Qui sommes nous ?','PageController','PageAbout','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(8,NULL,'Contact','PageController','PageContact','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(9,NULL,'Mentions légales','PageController','PageNotice','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(10,NULL,'Foire aux questions','PageController','PageFaq','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(11,NULL,'Conditions Générales de Ventes','PageController','PageCgv','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(12,NULL,'Informations de livraison','PageController','PageInfoDelivery','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(13,NULL,'Informations de paiements','PageController','PageInfoPayment','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(14,NULL,'Page personnalisée n°1','PageController','PageCustomOne','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(15,NULL,'Page personnalisée n°2','PageController','PageCustomTwo','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(16,NULL,'Page personnalisée n°3','PageController','PageCustomThree','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(17,NULL,'Page personnalisée n°4','PageController','PageCustomFour','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(18,NULL,'Page personnalisée n°5','PageController','PageCustomFive','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(19,NULL,'Page personnalisée n°6','PageController','PageCustomSix','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(20,NULL,'Page personnalisée n°7','PageController','PageCustomSeven','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(21,NULL,'Page personnalisée n°8','PageController','PageCustomEight','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(22,NULL,'Page personnalisée n°9','PageController','PageCustomNine','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(23,NULL,'Page personnalisée n°10','PageController','PageCustomTen','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(24,NULL,'Connexion','PageController','PageConnect','App','form','1',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(25,NULL,'Déconnexion','PageController','PageDisconnect','App','form','1',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(26,NULL,'Inscription','PageController','PageRegister','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(27,NULL,'Mot de passe oublié','PageController','PageForgotPassword','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(28,NULL,'Mot de passe oublié - Réinitialisation','PageController','PageForgotPasswordReset','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(29,NULL,'Page introuvable','PageController','PageError404','App','form','1',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(30,NULL,'Accès refusé','PageController','PageError403','App','form','1',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(31,NULL,'Erreur détectée','PageController','PageError','App','form','1',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(32,NULL,'Compte','PageController','PageAccount','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(33,NULL,'Compte - Informations','PageController','PageAccountInfo','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(34,NULL,'Compte - Adresse','PageController','PageAccountAdress','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(35,NULL,'Compte - Historique','PageController','PageAccountHistoric','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(36,NULL,'Compte - Newsletter','PageController','PageAccountNewsletter','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(37,NULL,'Compte - Historique - Details','PageController','PageAccountHistoricDetails','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(38,NULL,'Compte - Adresse - Formulaire','PageController','PageAccountAdressForm','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(39,NULL,'Commande','PageController','PageOrder','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(40,NULL,'Commande payée','PageController','PageOrderValidated','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(41,NULL,'Commande échouée','PageController','PageOrderFailed','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(42,NULL,'Coming Soon','PageController','PageComingSoon','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(43,NULL,'Maintenance','PageController','PageMaintenance','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(44,NULL,'Catégories de produits','PageController','PageCategory','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(45,NULL,'Panier','PageController','PageCart','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(46,NULL,'Liste de produits','PageController','PageProducts','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(47,NULL,'Affichage d\'un produit','PageController','PageProduct','App','form','1',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `core_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_page_category`
--

DROP TABLE IF EXISTS `core_page_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_page_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_entity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_module` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_page_category`
--

LOCK TABLES `core_page_category` WRITE;
/*!40000 ALTER TABLE `core_page_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_page_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_redirection`
--

DROP TABLE IF EXISTS `core_redirection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_redirection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `uri_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uri_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_redirection`
--

LOCK TABLES `core_redirection` WRITE;
/*!40000 ALTER TABLE `core_redirection` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_redirection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_reference`
--

DROP TABLE IF EXISTS `core_reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_url` tinyint(1) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_reference`
--

LOCK TABLES `core_reference` WRITE;
/*!40000 ALTER TABLE `core_reference` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_reference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_reference_translation`
--

DROP TABLE IF EXISTS `core_reference_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_reference_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_reference_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_B1CF64662C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_B1CF64662C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `core_reference` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_reference_translation`
--

LOCK TABLES `core_reference_translation` WRITE;
/*!40000 ALTER TABLE `core_reference_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_reference_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_session`
--

DROP TABLE IF EXISTS `core_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_session` (
  `session_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_content` longtext COLLATE utf8_unicode_ci,
  `session_expiration` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_session`
--

LOCK TABLES `core_session` WRITE;
/*!40000 ALTER TABLE `core_session` DISABLE KEYS */;
INSERT INTO `core_session` VALUES ('0055329139e48eb9ff60ebd1ee5d47e8','[]','2021-11-19 17:49:54','2021-11-12 17:49:53','2021-11-12 17:49:54','35.163.121.199'),('00dfcfa19eac01a0b45d0fd598a64dbb','[]','2021-11-17 18:48:35','2021-11-10 18:48:35','2021-11-10 18:48:35','67.205.31.50'),('012634e05ac6ae3b627263cae616e531','[]','2021-11-17 17:03:32','2021-11-10 17:03:32','2021-11-10 17:03:32','192.227.225.150'),('02d0d3682f58f054c5b3c306a45b0ea4','[]','2021-11-14 17:46:09','2021-11-07 17:46:09','2021-11-07 17:46:09','34.214.160.166'),('030d81339932f699c83d543d9bf8dec9','[]','2021-11-18 19:59:47','2021-11-11 19:59:46','2021-11-11 19:59:47','92.160.43.70'),('033d828fc0c93f0eeaafc4e960c476ff','[]','2021-11-15 18:16:56','2021-11-08 18:16:56','2021-11-08 18:16:56','207.46.13.185'),('042d268bbd998b5d5e8de48c733bbd92','[]','2021-11-17 08:36:53','2021-11-10 08:36:52','2021-11-10 08:36:53','65.21.206.45'),('0620727e0ebb8920e517e4486748cfc9','[]','2021-11-17 06:51:09','2021-11-10 06:51:09','2021-11-10 06:51:09','138.201.194.13'),('063c6e3423e4a06a3f2c4af574c03740','[]','2021-11-17 17:58:18','2021-11-10 17:58:17','2021-11-10 17:58:18','34.217.117.58'),('075619876eb4604351961277c36d2932','[]','2021-11-15 18:07:14','2021-11-08 18:07:13','2021-11-08 18:07:14','52.31.2.88'),('07d8a2cb7a5f5c965ba25932487dd101','[]','2021-11-19 18:02:13','2021-11-12 18:02:07','2021-11-12 18:02:13','195.133.18.227'),('0894d12229be3174ab26f906ae8afc20','[]','2021-11-15 05:07:19','2021-11-08 05:07:18','2021-11-08 05:07:19','51.38.37.96'),('08c3f22adfbb2638ff89ed9f8b2fcb24','[]','2021-11-17 17:03:20','2021-11-10 17:03:20','2021-11-10 17:03:20','192.227.225.150'),('0944033e893a2c85010fffecd3eb746e','[]','2021-11-16 21:08:07','2021-11-09 21:08:07','2021-11-09 21:08:07','212.227.99.40'),('0a316edde5be7628a5802b92296895e0','[]','2021-11-17 07:56:06','2021-11-10 07:56:06','2021-11-10 07:56:06','69.63.184.119'),('0a5d386fdd86118fc54f06d0f4edc760','[]','2021-11-15 06:13:15','2021-11-08 06:13:14','2021-11-08 06:13:15','54.202.111.171'),('0a733456fe9547ed5ab0d503a535aba1','[]','2021-11-17 17:04:32','2021-11-10 17:04:32','2021-11-10 17:04:32','192.227.225.150'),('0ad914b4537ddbffe2328f2086696fa9','[]','2021-11-17 17:04:25','2021-11-10 17:04:25','2021-11-10 17:04:25','192.227.225.150'),('0afde526470867b12e57ac59e151484f','[]','2021-11-19 14:22:31','2021-11-12 14:22:31','2021-11-12 14:22:31','173.252.83.118'),('0c668d6ea412e89e37d665fdf59ffb0a','[]','2021-11-17 18:48:35','2021-11-10 18:48:35','2021-11-10 18:48:35','67.205.31.50'),('0cea8baa4c7f7312aa8b339e83c09d8e','[]','2021-11-16 20:05:38','2021-11-09 20:05:38','2021-11-09 20:05:38','207.46.13.185'),('0d1fdc2314c341c460ff44db91abee56','[]','2021-11-19 18:01:59','2021-11-12 18:01:54','2021-11-12 18:01:59','195.133.18.227'),('0da954688e4721edeeaab3424c65b0ab','[]','2021-11-15 02:54:08','2021-11-08 02:54:06','2021-11-08 02:54:08','212.102.57.150'),('0edbba829af0df80c1d89650827ff70e','[]','2021-11-17 17:03:25','2021-11-10 17:03:25','2021-11-10 17:03:25','192.227.225.150'),('106bddcc2b5190a87615250037e916e6','[]','2021-11-17 17:03:43','2021-11-10 17:03:43','2021-11-10 17:03:43','192.227.225.150'),('10cdbd4a78e33a4496b4c095a16663fe','[]','2021-11-17 05:01:17','2021-11-10 05:01:17','2021-11-10 05:01:17','65.21.206.46'),('111834751ee8dbdd0d53e2db9833b87a','[]','2021-11-17 08:36:50','2021-11-10 08:36:50','2021-11-10 08:36:50','65.21.206.45'),('113ff41c4a4804b882eb96974ce0e579','[]','2021-11-17 17:03:30','2021-11-10 17:03:29','2021-11-10 17:03:30','192.227.225.150'),('118632316057e67a090f8721b4a57cbe','[]','2021-11-13 18:03:35','2021-11-06 18:03:35','2021-11-06 18:03:35','51.38.37.96'),('11c99026bb8fae01c2e6bbaa8f22e42b','[]','2021-11-16 22:30:59','2021-11-09 22:30:58','2021-11-09 22:30:59','77.83.1.167'),('11fcbf9c5f34325a2218711160fed78e','[]','2021-11-19 19:40:37','2021-11-12 19:40:36','2021-11-12 19:40:37','2a01:e0a:5f2:dcb0:ed32:49cf:7d7e:de8b'),('13e3cd07d81fc905667aacbf982991b4','[]','2021-11-17 08:36:55','2021-11-10 08:36:55','2021-11-10 08:36:55','65.21.206.45'),('15b686c0327bee5dacbb0da31d0e2776','[]','2021-11-13 11:11:53','2021-11-06 11:11:53','2021-11-06 11:11:53','23.228.109.147'),('15cc2b51c8ee09beeef2085eb8d36fcb','[]','2021-11-17 05:01:21','2021-11-10 05:01:21','2021-11-10 05:01:21','65.21.206.46'),('16e349ed02fa3124262c97d80e8713e9','[]','2021-11-19 19:15:31','2021-11-12 19:15:31','2021-11-12 19:15:31','159.65.157.154'),('1731a79628ddcb0dbe40c591debf47ad','[]','2021-11-17 17:02:53','2021-11-10 17:02:53','2021-11-10 17:02:53','192.227.225.150'),('185a7081e7cd573ff2d4fcce4d038e9b','[]','2021-11-18 06:23:16','2021-11-11 06:23:16','2021-11-11 06:23:16','54.213.239.23'),('1863fc7cac2a400b1675825215a3fd5c','[]','2021-11-16 21:43:31','2021-11-09 21:43:31','2021-11-09 21:43:31','114.119.158.216'),('189203db917e13cc38f26c19e218cdc0','[]','2021-11-17 17:03:10','2021-11-10 17:03:10','2021-11-10 17:03:10','192.227.225.150'),('18ed4c4465c0522dc12858f74eb30e1a','[]','2021-11-15 15:06:08','2021-11-08 15:06:07','2021-11-08 15:06:08','62.210.53.53'),('1a38fc09740280c61c671337080e839d','[]','2021-11-17 17:03:14','2021-11-10 17:03:14','2021-11-10 17:03:14','192.227.225.150'),('1b00c1d74eda847c021c9de21e6d6069','[]','2021-11-18 17:30:04','2021-11-11 17:30:04','2021-11-11 17:30:04','54.190.115.134'),('1e0be5ff8c821793a67c495038e143f2','[]','2021-11-12 17:05:18','2021-11-05 17:05:18','2021-11-05 17:05:18','66.249.93.220'),('1e4124c8f06b4859294d37d58a1ee1bf','[]','2021-11-13 06:53:04','2021-11-06 06:53:04','2021-11-06 06:53:04','34.217.75.131'),('20c735eda8b12065da8d33001646cd32','[]','2021-11-13 01:57:51','2021-11-06 01:57:51','2021-11-06 01:57:51','54.36.148.198'),('20e5a0c6a7fcc65460db3d08f9e2de91','[]','2021-11-12 13:54:39','2021-11-05 13:54:38','2021-11-05 13:54:39','51.222.133.37'),('21c1f51ff1db3b35954ec5df2f3227d0','[]','2021-11-18 17:35:13','2021-11-11 17:35:13','2021-11-11 17:35:13','54.191.188.5'),('22a06c3a5d7e4ed35528c6917213fda3','[]','2021-11-16 23:16:57','2021-11-09 23:16:57','2021-11-09 23:16:57','69.160.160.61'),('23b006aaf81f4afde81785abba32fd0e','[]','2021-11-17 18:23:42','2021-11-10 18:23:41','2021-11-10 18:23:42','35.85.29.148'),('259270e15432f39852ba939156d10cbf','[]','2021-11-19 13:52:51','2021-11-12 13:52:51','2021-11-12 13:52:51','159.223.148.120'),('26931f0f7021d602a40d04c398a0dcd3','[]','2021-11-15 17:34:44','2021-11-08 17:34:44','2021-11-08 17:34:44','54.149.239.139'),('27463849fa8e44a3d64bc9e83e940801','[]','2021-11-17 17:03:53','2021-11-10 17:03:53','2021-11-10 17:03:53','192.227.225.150'),('278c946b21a19df25809d0b425bd6ef2','[]','2021-11-15 15:37:17','2021-11-08 15:37:06','2021-11-08 15:37:17','190.123.219.68'),('27a695cbcad9a608c104609af4473ecb','[]','2021-11-17 18:23:38','2021-11-10 18:23:38','2021-11-10 18:23:38','35.85.29.148'),('2875d56e66bf6657af8b2ccba3dfa672','[]','2021-11-17 17:04:21','2021-11-10 17:04:21','2021-11-10 17:04:21','192.227.225.150'),('28d3f4b080562a659a681b57d8b1c207','[]','2021-11-15 17:41:05','2021-11-08 17:41:05','2021-11-08 17:41:05','18.237.244.155'),('29db6180f3eddb40ceb5b13fdca91130','[]','2021-11-13 21:48:24','2021-11-06 21:48:24','2021-11-06 21:48:24','91.208.197.96'),('2a617e624c0bc18afa4eb26acb5ed270','[]','2021-11-19 05:57:07','2021-11-12 05:57:06','2021-11-12 05:57:07','199.58.86.206'),('2b6907c606293fd0b5f82557f84578ae','[]','2021-11-14 03:14:36','2021-11-07 03:14:34','2021-11-07 03:14:36','197.5.152.234'),('2bc94bc128c89da466ad92f6fc01ab7e','[]','2021-11-17 17:03:49','2021-11-10 17:03:49','2021-11-10 17:03:49','192.227.225.150'),('2c6d69429e1ced3a3acb95857c53df39','[]','2021-11-17 18:14:42','2021-11-10 18:14:42','2021-11-10 18:14:42','35.85.29.148'),('2d3678c055311743e907bf691e613986','[]','2021-11-17 13:44:23','2021-11-10 13:44:23','2021-11-10 13:44:23','207.46.13.185'),('2d6b077515adbda304830b546ca4164e','[]','2021-11-19 18:01:33','2021-11-12 18:01:27','2021-11-12 18:01:33','195.133.18.227'),('2ffdadccfdd6eb23f296d833d574b761','[]','2021-11-17 23:40:10','2021-11-10 23:40:10','2021-11-10 23:40:10','167.99.127.159'),('303d92d0b90cbc677fa2de7261bb0376','[]','2021-11-16 19:46:55','2021-11-09 11:58:05','2021-11-09 19:46:55','77.204.104.3'),('31755f6a63260570e3b871c9cfbafa09','[]','2021-11-19 18:01:19','2021-11-12 18:01:12','2021-11-12 18:01:19','195.133.18.227'),('33110d5396624c40cfb3daea3eceeb0c','[]','2021-11-17 17:03:00','2021-11-10 17:03:00','2021-11-10 17:03:00','192.227.225.150'),('333f9473c7e9163090b1b15ba3a6a1b4','[]','2021-11-14 08:44:01','2021-11-07 08:44:01','2021-11-07 08:44:01','54.36.148.158'),('338d8207d7a2c0e8b4d00395588e78e5','[]','2021-11-13 11:49:25','2021-11-06 11:49:25','2021-11-06 11:49:25','93.158.91.233'),('35a9822c3ced8b58ad6158d31a3339a7','[]','2021-11-17 05:01:20','2021-11-10 05:01:20','2021-11-10 05:01:20','65.21.206.46'),('37035768917cab6c68879166df16fbb1','[]','2021-11-12 14:51:33','2021-11-05 14:51:31','2021-11-05 14:51:33','178.128.31.137'),('384112c6a5bde8e3e155fa9086ddeb92','[]','2021-11-13 06:52:44','2021-11-06 06:52:44','2021-11-06 06:52:44','52.43.96.5'),('388a0f512a30d82dda835feeeec6db07','[]','2021-11-17 17:02:45','2021-11-10 17:02:45','2021-11-10 17:02:45','192.227.225.150'),('392d3553b0d53fe4f198623c83e843e8','[]','2021-11-18 06:25:19','2021-11-11 06:25:19','2021-11-11 06:25:19','34.213.0.56'),('39a7b4630d8e7367488f324cdb46e6eb','[]','2021-11-19 13:52:58','2021-11-12 13:52:58','2021-11-12 13:52:58','159.223.148.120'),('3dcf96005d4b412101283c06ad343d09','[]','2021-11-18 05:14:15','2021-11-11 05:14:15','2021-11-11 05:14:15','162.210.196.97'),('3de9a20aae0abf9891deef54ba100642','[]','2021-11-14 02:27:01','2021-11-07 02:27:00','2021-11-07 02:27:01','79.110.52.36'),('3e8e4c91730ae524ff63b363964aed66','[]','2021-11-17 17:03:17','2021-11-10 17:03:17','2021-11-10 17:03:17','192.227.225.150'),('3f41885832d7242b9724bc30e652e0f6','[]','2021-11-17 04:20:40','2021-11-10 04:20:39','2021-11-10 04:20:40','23.228.109.147'),('4019d67bd812ddaa3a854863382f9edd','[]','2021-11-17 17:03:23','2021-11-10 17:03:23','2021-11-10 17:03:23','192.227.225.150'),('4113d6b480622206c98fe6e462bb98ad','[]','2021-11-19 15:03:04','2021-11-12 15:03:03','2021-11-12 15:03:04','42.83.147.34'),('4125f7dcc441d742225f5febbc528625','[]','2021-11-16 18:09:38','2021-11-09 18:09:37','2021-11-09 18:09:38','3.251.66.103'),('4139b4da6e080374a495434dca00b19c','[]','2021-11-14 03:14:39','2021-11-07 03:14:39','2021-11-07 03:14:39','197.5.152.234'),('41a4919191e9809f4f7d8fc312bbcd79','[]','2021-11-17 18:14:39','2021-11-10 18:14:39','2021-11-10 18:14:39','35.85.29.148'),('436c25645cf7285b03a3157e839fc403','[]','2021-11-19 12:03:03','2021-11-12 12:03:02','2021-11-12 12:03:03','20.85.224.59'),('43974f86cab8be331a43987e84396601','[]','2021-11-19 15:40:03','2021-11-12 15:40:03','2021-11-12 15:40:03','3.16.67.38'),('447b934fbddd9958d660779d17256207','[]','2021-11-17 05:01:14','2021-11-10 05:01:13','2021-11-10 05:01:14','65.21.206.46'),('45de93e119c80a49d7401a36b13199fc','[]','2021-11-18 06:14:40','2021-11-11 06:14:40','2021-11-11 06:14:40','93.113.111.100'),('4715c38396bfbc76f7a870f8da33db90','[]','2021-11-13 18:03:35','2021-11-06 18:03:35','2021-11-06 18:03:35','51.38.37.96'),('474799e80f9df6eb4d6cfa7d9d381fa0','[]','2021-11-17 17:03:34','2021-11-10 17:03:34','2021-11-10 17:03:34','192.227.225.150'),('481e3ad7d913918de430a28d99780498','[]','2021-11-17 17:04:11','2021-11-10 17:04:11','2021-11-10 17:04:11','192.227.225.150'),('4910dc705f4186b6f29753fe084000f5','[]','2021-11-12 18:50:59','2021-11-05 18:50:59','2021-11-05 18:50:59','37.172.35.52'),('4916ff915c765cf3e4f374f6e80480f5','[]','2021-11-16 12:00:24','2021-11-09 11:52:46','2021-11-09 12:00:24','77.204.198.47'),('49cd834df06b5bce7176ae35255f1b26','[]','2021-11-16 14:59:05','2021-11-09 14:59:05','2021-11-09 14:59:05','23.228.109.147'),('4b37bebb973a81ce6906519867ff2175','[]','2021-11-12 13:11:46','2021-11-05 13:11:46','2021-11-05 13:11:46','92.184.117.1'),('4b3e9cfb147ed20937f7d0be6b719f49','[]','2021-11-17 17:03:48','2021-11-10 17:03:48','2021-11-10 17:03:48','192.227.225.150'),('4c7088dcc375a20a7388fe148ea23286','[]','2021-11-18 16:57:29','2021-11-11 16:57:29','2021-11-11 16:57:29','157.55.39.46'),('4caf2cc2d639d62e7a3b3db020ed4c5e','[]','2021-11-17 17:04:27','2021-11-10 17:04:27','2021-11-10 17:04:27','192.227.225.150'),('4d21aee58108df1c889c5b42634e4bef','[]','2021-11-14 20:50:03','2021-11-07 20:50:03','2021-11-07 20:50:03','207.46.13.185'),('4d61bbd75b3d22afd6987f97bd4d0e2b','[]','2021-11-17 17:02:50','2021-11-10 17:02:50','2021-11-10 17:02:50','192.227.225.150'),('4df5bd0f96fe1a9506d6c344fed35beb','[]','2021-11-19 16:04:40','2021-11-12 16:04:40','2021-11-12 16:04:40','82.64.120.209'),('4ee881d94f4757cf4d018e17f85cf2ac','[]','2021-11-17 17:03:56','2021-11-10 17:03:56','2021-11-10 17:03:56','192.227.225.150'),('4fc2da818f2328f191cce6cd278d0b7d','[]','2021-11-13 12:19:12','2021-11-06 12:19:12','2021-11-06 12:19:12','93.11.20.227'),('4fd7f338e198c777fbb4f050571f4996','[]','2021-11-18 17:35:04','2021-11-11 17:35:03','2021-11-11 17:35:04','54.191.188.5'),('5056d067e566333ec34e97fc94e27220','[]','2021-11-17 23:40:12','2021-11-10 23:40:12','2021-11-10 23:40:12','167.99.127.159'),('509f8c0a79ed8ed701917d57e1bb4bb4','[]','2021-11-19 15:52:47','2021-11-12 15:52:47','2021-11-12 15:52:47','160.176.66.0'),('50b9c41cadbb50a6fa59b85a16e7612e','[]','2021-11-13 18:03:35','2021-11-06 18:03:35','2021-11-06 18:03:35','51.38.37.96'),('511dfefbb970ddeb6fa7fb4cb826f66e','[]','2021-11-15 00:06:01','2021-11-08 00:06:00','2021-11-08 00:06:01','45.147.160.22'),('512615cf9b379f3d7e6206d3df99b2da','[]','2021-11-19 19:15:29','2021-11-12 19:15:29','2021-11-12 19:15:29','159.65.157.154'),('51b24f365ff302171caaf61bdd157a37','[]','2021-11-13 20:39:21','2021-11-06 20:39:21','2021-11-06 20:39:21','185.218.124.140'),('524241c4252873ea510f2df71e593440','[]','2021-11-18 06:14:41','2021-11-11 06:14:41','2021-11-11 06:14:41','93.113.111.100'),('5372c489e49a7922f5e43e0bf98aed38','[]','2021-11-19 19:15:29','2021-11-12 19:15:29','2021-11-12 19:15:29','159.65.157.154'),('548318133d5c7b3d5fe76e7737181e2c','[]','2021-11-19 18:02:26','2021-11-12 18:02:20','2021-11-12 18:02:26','195.133.18.227'),('558f8f9f2ba5b1b4bc27cd29d41d6be3','[]','2021-11-19 15:07:18','2021-11-12 15:07:18','2021-11-12 15:07:18','157.55.39.46'),('5596025cc1fce2ff02530e89f881003c','[]','2021-11-17 17:02:54','2021-11-10 17:02:54','2021-11-10 17:02:54','192.227.225.150'),('55ec3d577b8a44e5ec1321e7c7107f25','[]','2021-11-17 20:57:06','2021-11-10 20:57:06','2021-11-10 20:57:06','54.36.149.93'),('5610515d667d99250321d30cb8ed900f','[]','2021-11-17 18:18:53','2021-11-10 18:18:53','2021-11-10 18:18:53','35.162.143.202'),('56ccf913d43b0a05f34b307c5c91a284','[]','2021-11-13 11:49:24','2021-11-06 11:49:23','2021-11-06 11:49:24','93.158.91.205'),('5705f6e7fafa6fcaf86ed3c97b21cf1b','[]','2021-11-19 12:57:00','2021-11-12 12:56:58','2021-11-12 12:57:00','128.127.104.80'),('574c64778635cd1b1ba42c8d65032a35','[]','2021-11-17 17:03:37','2021-11-10 17:03:37','2021-11-10 17:03:37','192.227.225.150'),('5833829b06ed6fdc62dfd43797b9314a','[]','2021-11-15 15:36:34','2021-11-08 15:36:34','2021-11-08 15:36:34','45.129.18.28'),('59a64896bf7da00aab304c94789fd3a1','[]','2021-11-15 10:22:09','2021-11-08 10:22:08','2021-11-08 10:22:09','66.249.64.182'),('59f0695e199fe94e5a1e2d2796d4678d','[]','2021-11-17 17:03:18','2021-11-10 17:03:18','2021-11-10 17:03:18','192.227.225.150'),('5a0858ecef05db05d53ad331b0254fb9','[]','2021-11-18 11:51:38','2021-11-11 11:51:38','2021-11-11 11:51:38','66.249.64.186'),('5a585ad52d3c46a818422a17444de234','[]','2021-11-17 21:45:48','2021-11-10 21:45:48','2021-11-10 21:45:48','34.253.232.245'),('5b5c56013ff35ae7373dd12ea5e3e31b','[]','2021-11-17 18:48:36','2021-11-10 18:48:36','2021-11-10 18:48:36','67.205.31.50'),('5b7ee2a7cef7bdaece683f2f9b6769bf','[]','2021-11-17 17:04:30','2021-11-10 17:04:30','2021-11-10 17:04:30','192.227.225.150'),('5bbd0e917709c82484406b3d89ead00c','[]','2021-11-17 17:03:55','2021-11-10 17:03:55','2021-11-10 17:03:55','192.227.225.150'),('5c68a82064c997437ca7b8c427b42b06','[]','2021-11-14 01:27:11','2021-11-07 01:26:55','2021-11-07 01:27:11','185.122.170.198'),('5d7b82f2efa852b8bd29ae96b21c5570','[]','2021-11-17 17:03:52','2021-11-10 17:03:52','2021-11-10 17:03:52','192.227.225.150'),('5f3897ed5251fc4fbeb3c96ae1699610','[]','2021-11-17 17:03:22','2021-11-10 17:03:22','2021-11-10 17:03:22','192.227.225.150'),('5f7ef05e6b465068326c2c2a0ab1951e','[]','2021-11-18 22:30:56','2021-11-11 22:30:56','2021-11-11 22:30:56','78.153.241.195'),('5fc021ad526ace6a22d49c766ed8b353','[]','2021-11-17 17:03:01','2021-11-10 17:03:01','2021-11-10 17:03:01','192.227.225.150'),('6023c98f74eed2a875dee8a36208c21c','[]','2021-11-17 17:04:17','2021-11-10 17:04:17','2021-11-10 17:04:17','192.227.225.150'),('6032942278cc13c46b6bf8f9dc266795','[]','2021-11-17 02:46:30','2021-11-10 02:46:29','2021-11-10 02:46:30','54.36.148.69'),('607ff6c07a8d47cddfbface198d4c6f8','[]','2021-11-14 17:44:50','2021-11-07 17:44:50','2021-11-07 17:44:50','66.249.64.184'),('60a5493394d5b0ab1f6cc53bfb999de6','[]','2021-11-15 17:41:01','2021-11-08 17:41:01','2021-11-08 17:41:01','18.237.244.155'),('6143e350800953f3a20b277f57dd7e1e','[]','2021-11-13 21:48:16','2021-11-06 21:48:16','2021-11-06 21:48:16','91.208.197.96'),('61fde5decca2180391074782535ae75b','[]','2021-11-16 04:41:39','2021-11-09 04:41:39','2021-11-09 04:41:39','66.249.64.182'),('6213540e12473bcf286b1815543ca08f','[]','2021-11-14 03:14:36','2021-11-07 03:14:34','2021-11-07 03:14:36','197.5.152.234'),('62473bcc0f58fd0007ce9c1f8fb9f256','[]','2021-11-15 17:15:33','2021-11-08 17:15:32','2021-11-08 17:15:33','82.121.1.125'),('64577fdd47aac58e227bca2d52eebf3f','[]','2021-11-19 06:25:00','2021-11-12 06:25:00','2021-11-12 06:25:00','34.210.74.131'),('67186398811a112b840a4cfca3dc1908','[]','2021-11-17 08:36:48','2021-11-10 08:36:48','2021-11-10 08:36:48','65.21.206.45'),('671e7c247f1dcd7f6f3a82de0770efe6','[]','2021-11-17 17:04:14','2021-11-10 17:04:13','2021-11-10 17:04:14','192.227.225.150'),('674c8dea4573683ad35289a4bbf44653','[]','2021-11-18 10:09:31','2021-11-11 10:09:31','2021-11-11 10:09:31','66.249.93.220'),('67c00ec459b9ed8f63110a556974579c','[]','2021-11-17 23:40:10','2021-11-10 23:40:10','2021-11-10 23:40:10','167.99.127.159'),('6932bf19e042177304063784d8872b30','[]','2021-11-13 18:03:35','2021-11-06 18:03:35','2021-11-06 18:03:35','51.38.37.96'),('6a6ef1187f11cd52872147fdbd625896','[]','2021-11-19 18:02:39','2021-11-12 18:02:33','2021-11-12 18:02:39','195.133.18.227'),('6a98efbd4e7badffa2d2038a93d0a2e1','[]','2021-11-17 17:02:56','2021-11-10 17:02:56','2021-11-10 17:02:56','192.227.225.150'),('6b7d75f8e5af007726868d55acee7d04','[]','2021-11-17 15:36:31','2021-11-10 15:36:31','2021-11-10 15:36:31','66.249.64.182'),('6cb7fc31be845ab382a748edd8ec5c0d','[]','2021-11-17 17:04:09','2021-11-10 17:04:09','2021-11-10 17:04:09','192.227.225.150'),('6eb3cb396704c337ce23e703ae6f1b15','[]','2021-11-18 08:37:49','2021-11-11 08:37:48','2021-11-11 08:37:49','69.197.185.45'),('70a32ce0707b26322cc556f15a3a50c4','[]','2021-11-17 18:23:37','2021-11-10 18:23:37','2021-11-10 18:23:37','35.85.29.148'),('70db8b5acd7e52935d2955d07d8097a3','[]','2021-11-17 17:03:26','2021-11-10 17:03:26','2021-11-10 17:03:26','192.227.225.150'),('718a1e65dbbf87744d85a65968d10465','[]','2021-11-17 18:48:35','2021-11-10 18:48:35','2021-11-10 18:48:35','67.205.31.50'),('71f20337316cff554bde8ca114978e9d','[]','2021-11-12 14:51:37','2021-11-05 14:51:36','2021-11-05 14:51:37','178.128.31.137'),('756d10780624895c5e47304b913cc84f','[]','2021-11-17 18:48:35','2021-11-10 18:48:35','2021-11-10 18:48:35','67.205.31.50'),('75dcd25da1bcaac04aaed59a608b9f79','[]','2021-11-17 17:03:34','2021-11-10 17:03:34','2021-11-10 17:03:34','192.227.225.150'),('76399cf7cddb1b4192bd9c27026429b3','[]','2021-11-17 17:02:47','2021-11-10 17:02:47','2021-11-10 17:02:47','192.227.225.150'),('765a7f55207441b983ac5e9ff0104ad8','[]','2021-11-17 17:03:04','2021-11-10 17:03:04','2021-11-10 17:03:04','192.227.225.150'),('771f7547f287a4263cf2e77da7a99677','[]','2021-11-18 20:55:05','2021-11-11 20:55:05','2021-11-11 20:55:05','157.55.39.182'),('781dd05e6f9504e00023725ef09169f7','[]','2021-11-16 21:31:49','2021-11-09 21:31:48','2021-11-09 21:31:49','3.89.59.8'),('783a8c4804a42defaa5f6859def554f7','[]','2021-11-14 22:44:22','2021-11-07 22:44:22','2021-11-07 22:44:22','54.36.148.97'),('78ca38743af49cabcc2b927c2fdde104','[]','2021-11-15 11:11:06','2021-11-08 11:11:06','2021-11-08 11:11:06','193.123.62.117'),('78eb2d78654a6383043e934879d8ddd3','[]','2021-11-17 17:04:19','2021-11-10 17:04:19','2021-11-10 17:04:19','192.227.225.150'),('7a2180fe44c73f305a626e66912d3390','[]','2021-11-17 17:04:05','2021-11-10 17:04:05','2021-11-10 17:04:05','192.227.225.150'),('7b14584c40230c7ae4eb6d7906a3ae3a','[]','2021-11-19 15:40:03','2021-11-12 15:40:03','2021-11-12 15:40:03','3.16.67.38'),('7b4a7f0e29314c0ee3b6500f5eb37b06','[]','2021-11-19 12:56:57','2021-11-12 12:56:57','2021-11-12 12:56:57','128.127.104.80'),('7b57bc117e3e390d5441f4b904f516aa','[]','2021-11-18 20:40:30','2021-11-11 20:39:59','2021-11-11 20:40:30','91.170.212.66'),('7ef9b2bdb482772d75a56625524b0696','[]','2021-11-19 14:55:22','2021-11-12 14:55:22','2021-11-12 14:55:22','54.36.148.75'),('7f2691747422070f4eb4a5bcc885256b','[]','2021-11-18 17:35:05','2021-11-11 17:35:05','2021-11-11 17:35:05','54.191.188.5'),('7f587c9ce603a8103088065befbeb05b','[]','2021-11-17 17:02:42','2021-11-10 17:02:42','2021-11-10 17:02:42','192.227.225.150'),('7fcf399ff312036d3481e5dfda1d9866','[]','2021-11-14 13:58:34','2021-11-07 13:58:34','2021-11-07 13:58:34','90.35.27.167'),('80adbaa7f1aae7ffc3d2253c68a47b3a','[]','2021-11-13 06:53:20','2021-11-06 06:53:20','2021-11-06 06:53:20','54.201.58.97'),('80e514bde40f6141122ade253e33f594','[]','2021-11-16 07:19:33','2021-11-09 07:19:33','2021-11-09 07:19:33','34.221.140.200'),('80f899d4d836736bcc6ea1ff11251033','[]','2021-11-14 17:45:09','2021-11-07 17:45:09','2021-11-07 17:45:09','66.249.64.182'),('835311ed5b7e5fa21d319870212d9df3','[]','2021-11-15 21:07:59','2021-11-08 21:07:59','2021-11-08 21:07:59','200.58.109.114'),('83faabb7ecb0cc6d6e5b7376bb1b6a67','[]','2021-11-17 17:03:41','2021-11-10 17:03:41','2021-11-10 17:03:41','192.227.225.150'),('84a2c90b637b0c74a2921fbceae40b8c','[]','2021-11-14 17:22:22','2021-11-07 17:22:21','2021-11-07 17:22:22','34.221.186.47'),('85695dc4a2b1cb3a4b8c0388787f6c96','[]','2021-11-16 11:01:47','2021-11-09 11:01:47','2021-11-09 11:01:47','54.36.148.47'),('85b8111f96ca21621a5cf9401a152a3b','[]','2021-11-19 18:10:07','2021-11-12 18:10:07','2021-11-12 18:10:07','3.250.125.113'),('862d5affddcea812848c660b020bee86','[]','2021-11-17 17:04:04','2021-11-10 17:04:03','2021-11-10 17:04:04','192.227.225.150'),('86ee2cddc989e0b526acdfe4a7abe76f','[]','2021-11-17 17:03:15','2021-11-10 17:03:15','2021-11-10 17:03:15','192.227.225.150'),('88c205a601590c4c2567ae0794300d5a','[]','2021-11-13 17:06:40','2021-11-06 17:06:40','2021-11-06 17:06:40','54.36.148.176'),('89a21fef94de62f81847e0a9139b6631','[]','2021-11-17 17:03:07','2021-11-10 17:03:07','2021-11-10 17:03:07','192.227.225.150'),('89d036b7f23d2dd191a87f7e20f08569','[]','2021-11-17 17:03:51','2021-11-10 17:03:51','2021-11-10 17:03:51','192.227.225.150'),('8a95a4976b98d4095931518a88b39bd5','[]','2021-11-17 11:19:52','2021-11-10 11:19:51','2021-11-10 11:19:52','44.197.235.100'),('8b2e1a6e8e036499c5a12e35f25ab6fb','[]','2021-11-17 17:03:28','2021-11-10 17:03:28','2021-11-10 17:03:28','192.227.225.150'),('8e52162e5cf659e73da0df2eae39e04b','[]','2021-11-15 08:59:00','2021-11-08 08:59:00','2021-11-08 08:59:00','66.249.64.184'),('8ef0944aa5df0dbb22fe584dd748d274','[]','2021-11-18 17:35:09','2021-11-11 17:35:09','2021-11-11 17:35:09','54.191.188.5'),('8f475e5180e11f20cc39dcbbbf793e1a','[]','2021-11-18 12:00:24','2021-11-11 12:00:24','2021-11-11 12:00:24','216.10.31.238'),('9204333ce9ad1584e0485e747462eccb','[]','2021-11-19 15:40:04','2021-11-12 15:40:03','2021-11-12 15:40:04','3.16.67.38'),('9215061f973de53d810a2e5c8057f7a9','[]','2021-11-18 17:27:16','2021-11-11 17:27:15','2021-11-11 17:27:16','54.36.148.42'),('927a2b33b3b21aadd8df9d84065ee5d8','[]','2021-11-19 09:25:11','2021-11-12 09:25:11','2021-11-12 09:25:11','54.188.240.121'),('9343a32f78c3829621ada2b4f4d1e31a','[]','2021-11-17 17:03:08','2021-11-10 17:03:08','2021-11-10 17:03:08','192.227.225.150'),('93b2f064760adc9c24bda1a1d56b9c7e','[]','2021-11-15 15:36:34','2021-11-08 15:36:34','2021-11-08 15:36:34','45.129.18.17'),('952c3e9ee45412dbd017c3af404dd62f','[]','2021-11-19 19:10:37','2021-11-12 19:10:36','2021-11-12 19:10:37','2001:ac8:22:12::40d3:4810'),('96893e67db2d161ba44f2e4256bf3614','[]','2021-11-17 23:04:54','2021-11-10 23:04:53','2021-11-10 23:04:54','3.144.10.139'),('9881898553703e74f15202e3fd233d9d','[]','2021-11-15 21:07:59','2021-11-08 21:07:59','2021-11-08 21:07:59','200.58.109.114'),('993e70421cd36b7d81189093bc08750a','[]','2021-11-17 17:04:07','2021-11-10 17:04:07','2021-11-10 17:04:07','192.227.225.150'),('995dfa37b2bd8963beb7cdfee1e32b12','[]','2021-11-17 08:36:51','2021-11-10 08:36:51','2021-11-10 08:36:51','65.21.206.45'),('9969d702238edd454ec972e67f8f1872','[]','2021-11-18 01:29:25','2021-11-11 01:29:25','2021-11-11 01:29:25','212.102.57.9'),('99f1579662eb258c1b55c81849238a46','[]','2021-11-14 12:57:10','2021-11-07 12:57:10','2021-11-07 12:57:10','80.214.123.152'),('9a5d5e1058bbbc69391aebe03cd7109f','[]','2021-11-17 17:02:58','2021-11-10 17:02:58','2021-11-10 17:02:58','192.227.225.150'),('9b7181fa6d8478a8e6e74cc7973fd046','[]','2021-11-19 00:56:04','2021-11-12 00:56:04','2021-11-12 00:56:04','23.228.109.147'),('9b7301ad122d3b185c82de15d2cf0265','[]','2021-11-16 05:22:14','2021-11-09 05:22:13','2021-11-09 05:22:14','51.159.140.206'),('9c20cbe95418397e75ff734b19d8fd63','[]','2021-11-17 17:03:41','2021-11-10 17:03:41','2021-11-10 17:03:41','192.227.225.150'),('9d18ed94e156b4d94863cfbab79550cb','[]','2021-11-16 23:17:00','2021-11-09 23:17:00','2021-11-09 23:17:00','69.160.160.61'),('9ddf3b032bb4168c836d36cebe42cd34','[]','2021-11-19 12:57:00','2021-11-12 12:56:59','2021-11-12 12:57:00','128.127.104.80'),('9e17148067353f63cb2b50938c3ae797','[]','2021-11-17 17:03:29','2021-11-10 17:03:29','2021-11-10 17:03:29','192.227.225.150'),('9f9fa516624fde1ccb760fddcb42a841','[]','2021-11-19 19:15:29','2021-11-12 19:15:29','2021-11-12 19:15:29','159.65.157.154'),('9ff0bfc31e30a52ba7e567c110f12c4a','[]','2021-11-19 19:15:29','2021-11-12 19:15:29','2021-11-12 19:15:29','159.65.157.154'),('a0028e3fb83b44ed3e98d1e5950e2e5e','[]','2021-11-14 01:42:18','2021-11-07 01:42:16','2021-11-07 01:42:18','185.244.173.138'),('a07fbc90da77b7034c7ccb8753042e1b','[]','2021-11-17 17:03:44','2021-11-10 17:03:44','2021-11-10 17:03:44','192.227.225.150'),('a1979ea27a0e57534a94e126ad921839','[]','2021-11-13 14:19:45','2021-11-06 14:19:45','2021-11-06 14:19:45','90.21.80.21'),('a2506fc7f0d83996392840646c248a77','[]','2021-11-18 07:30:08','2021-11-11 07:30:07','2021-11-11 07:30:08','212.192.241.36'),('a3fc81a4f38b9d862d40cff53c953dda','[]','2021-11-17 18:16:08','2021-11-10 18:16:08','2021-11-10 18:16:08','54.217.7.229'),('a41a8861091fbef5b104f80d9fb2402d','[]','2021-11-17 17:04:02','2021-11-10 17:04:02','2021-11-10 17:04:02','192.227.225.150'),('a634b47cc0f346c576065e79f4049acf','[]','2021-11-14 05:10:20','2021-11-07 05:10:18','2021-11-07 05:10:20','78.47.49.187'),('a7b7d037f0d8a73f8ca523a349b8e5f9','[]','2021-11-17 18:03:17','2021-11-10 18:03:17','2021-11-10 18:03:17','54.187.72.79'),('a7d368f4c80a7b70eaa00c2be0bdea99','[]','2021-11-12 18:38:41','2021-11-05 18:30:52','2021-11-05 18:38:41','80.214.22.70'),('a8f36f9d58872ce5e2b6de05a71fbaa0','[]','2021-11-15 05:07:21','2021-11-08 05:07:21','2021-11-08 05:07:21','51.38.37.96'),('a972f115c69a44180a441e041d8f7eec','[]','2021-11-16 09:26:50','2021-11-09 09:26:50','2021-11-09 09:26:50','31.13.127.43'),('a9e0825a40323556daeb87aa5b2d288f','[]','2021-11-17 17:03:06','2021-11-10 17:03:06','2021-11-10 17:03:06','192.227.225.150'),('abb00b2e588d3d54ca0ba627d01a2cc8','[]','2021-11-18 06:23:08','2021-11-11 06:23:08','2021-11-11 06:23:08','52.40.92.5'),('ac2632de4fde35c3889b92f46c6b3ddd','[]','2021-11-17 17:03:43','2021-11-10 17:03:43','2021-11-10 17:03:43','192.227.225.150'),('ac37291b0ee06ed20ba184b804bdd317','[]','2021-11-17 17:03:46','2021-11-10 17:03:46','2021-11-10 17:03:46','192.227.225.150'),('ad70cf7bbfbce7cc9eec5ef0e1bd6638','[]','2021-11-17 17:04:00','2021-11-10 17:04:00','2021-11-10 17:04:00','192.227.225.150'),('ae764e965b4efd6f61f37acea5ac22dc','[]','2021-11-17 17:03:32','2021-11-10 17:03:32','2021-11-10 17:03:32','192.227.225.150'),('aed3dd0af452a14452e7aad0cf55df5e','[]','2021-11-15 06:49:03','2021-11-08 06:49:03','2021-11-08 06:49:03','81.7.10.109'),('b04c00754bd0e07a9cd50957a3cab218','[]','2021-11-17 17:04:15','2021-11-10 17:04:15','2021-11-10 17:04:15','192.227.225.150'),('b11682b783e85f720c79a583cd91644a','[]','2021-11-19 12:56:57','2021-11-12 12:56:57','2021-11-12 12:56:57','128.127.104.80'),('b215f158866fe694768fd13744950ce8','[]','2021-11-18 06:25:22','2021-11-11 06:25:22','2021-11-11 06:25:22','34.213.0.56'),('b23553d8198464bf02afc7c5770b6632','[]','2021-11-17 18:18:57','2021-11-10 18:18:57','2021-11-10 18:18:57','35.162.143.202'),('b2d4863994e5d30ed1b707e6f44ecf82','[]','2021-11-17 05:01:16','2021-11-10 05:01:16','2021-11-10 05:01:16','65.21.206.46'),('b2f0c8a4b7aaf088745c9bf527ca7511','[]','2021-11-17 17:03:39','2021-11-10 17:03:39','2021-11-10 17:03:39','192.227.225.150'),('b47a3c6dff50df6fedb116d17f6b21a5','[]','2021-11-17 17:03:36','2021-11-10 17:03:36','2021-11-10 17:03:36','192.227.225.150'),('b63cbc3c12e4b0235781760c1e61ea67','[]','2021-11-17 08:36:54','2021-11-10 08:36:54','2021-11-10 08:36:54','65.21.206.45'),('b6fdb0ee9f7ee2cb6106aaa89816c315','[]','2021-11-14 15:57:08','2021-11-07 15:57:08','2021-11-07 15:57:08','54.218.129.142'),('b772862dc220fa3699854cbf110b8167','[]','2021-11-14 17:46:06','2021-11-07 17:46:06','2021-11-07 17:46:06','34.214.160.166'),('bb132035c8e692dc5a4ea583228ae651','[]','2021-11-12 20:23:01','2021-11-05 20:23:01','2021-11-05 20:23:01','66.249.64.184'),('bc5e98640fd89b97ea96924c0aed6219','[]','2021-11-15 21:07:59','2021-11-08 21:07:59','2021-11-08 21:07:59','200.58.109.114'),('c0b0156c4c94ae660ac0706d4588df61','[]','2021-11-14 11:34:38','2021-11-07 11:34:35','2021-11-07 11:34:38','193.32.8.13'),('c0e298b199b44936ac15369ac11e3066','[]','2021-11-17 18:18:54','2021-11-10 18:18:54','2021-11-10 18:18:54','35.162.143.202'),('c118fe2519d99099342af567bf21c0fb','[]','2021-11-16 22:19:31','2021-11-09 22:19:31','2021-11-09 22:19:31','114.119.153.113'),('c192e63653dd5b4aadda4ef1cc4f8681','[]','2021-11-17 17:04:22','2021-11-10 17:04:22','2021-11-10 17:04:22','192.227.225.150'),('c1d642ca0b65286c7d76147cda389d55','[]','2021-11-17 15:14:50','2021-11-10 15:14:50','2021-11-10 15:14:50','90.6.5.46'),('c2415acd0c392cf5928ce49c48a746d9','[]','2021-11-13 04:15:23','2021-11-06 04:15:23','2021-11-06 04:15:23','207.46.13.185'),('c2c74a532114654fe8ea871271ea9d83','[]','2021-11-13 06:52:43','2021-11-06 06:52:43','2021-11-06 06:52:43','18.237.65.219'),('c327e24bc304a816e7c83eee06dc2822','[]','2021-11-17 11:41:11','2021-11-10 11:41:11','2021-11-10 11:41:11','44.197.235.100'),('c3fb8798ee98f6ae27d2fc0b01e74aad','[]','2021-11-12 22:10:13','2021-11-05 22:10:13','2021-11-05 22:10:13','66.249.64.186'),('c4996dd74915f7abfa9bfa44f86edea4','[]','2021-11-15 19:16:50','2021-11-08 19:16:50','2021-11-08 19:16:50','54.36.148.207'),('c54605611e6fcb00c59406e5a3d76d67','[]','2021-11-17 17:03:37','2021-11-10 17:03:37','2021-11-10 17:03:37','192.227.225.150'),('c7d2101be9e6a8382f47c3c015763307','[]','2021-11-17 18:14:41','2021-11-10 18:14:41','2021-11-10 18:14:41','35.85.29.148'),('c9f4897d9bdb441c51f370cec2c0ccb1','[]','2021-11-19 12:57:00','2021-11-12 12:56:58','2021-11-12 12:57:00','128.127.104.80'),('ca152070db6b121c2c7bd9af001352eb','[]','2021-11-14 13:18:18','2021-11-07 13:18:18','2021-11-07 13:18:18','23.228.109.147'),('cacde0e02beb2a52b9e8a82bd1cc5c4f','[]','2021-11-13 22:33:35','2021-11-06 22:33:35','2021-11-06 22:33:35','207.46.13.185'),('caf968e121e246b5ae7e240a8473a257','[]','2021-11-13 01:07:06','2021-11-06 01:07:06','2021-11-06 01:07:06','35.210.149.90'),('cb737dcab38c3e7e5a302fc4a450b4bc','[]','2021-11-18 06:14:40','2021-11-11 06:14:40','2021-11-11 06:14:40','93.113.111.100'),('cc94da604ccd71f961b7e6acce716f3a','[]','2021-11-17 17:04:24','2021-11-10 17:04:24','2021-11-10 17:04:24','192.227.225.150'),('cd37854b2ca09c2b58a48c21e03764bb','[]','2021-11-16 04:58:28','2021-11-09 04:58:28','2021-11-09 04:58:28','66.249.64.184'),('cd4d37cfee6b430491003f19868c2170','[]','2021-11-17 17:03:12','2021-11-10 17:03:12','2021-11-10 17:03:12','192.227.225.150'),('cdc390a2304c0012159440ca15a7d1c2','[]','2021-11-13 11:49:26','2021-11-06 11:49:26','2021-11-06 11:49:26','93.158.91.203'),('cf386e98fa26b9c30db38e49e9ffce3e','[]','2021-11-15 21:08:01','2021-11-08 21:08:01','2021-11-08 21:08:01','200.58.109.114'),('cf3b9da2b3b69c15431fbdf63eb7f4f9','[]','2021-11-13 05:20:52','2021-11-06 05:20:51','2021-11-06 05:20:52','78.47.49.187'),('cfb5d2e015d717265bb0ce814cdbbf4e','[]','2021-11-18 02:17:54','2021-11-11 02:17:53','2021-11-11 02:17:54','34.222.151.246'),('d0206a389ff24f949513278462c711c1','[]','2021-11-14 19:54:38','2021-11-07 19:54:25','2021-11-07 19:54:38','192.210.176.45'),('d0df223f3bcbf481b2ab0c6cd1c6567a','[]','2021-11-17 05:01:18','2021-11-10 05:01:18','2021-11-10 05:01:18','65.21.206.46'),('d3777286c2d4dee7b0704595d79d361c','[]','2021-11-14 19:43:57','2021-11-07 19:43:57','2021-11-07 19:43:57','148.72.197.183'),('d77adb584daaa0d7debfe192c21184ac','[]','2021-11-19 18:01:46','2021-11-12 18:01:40','2021-11-12 18:01:46','195.133.18.227'),('d793860d9ba0c2bc4f7b233cc8f5c424','[]','2021-11-18 17:35:08','2021-11-11 17:35:08','2021-11-11 17:35:08','54.191.188.5'),('d8d6d78a93b6e0d06f3aa658ea40e446','[]','2021-11-17 17:03:31','2021-11-10 17:03:31','2021-11-10 17:03:31','192.227.225.150'),('da900305e226ec632cf8b6b4333bf27d','[]','2021-11-17 21:34:13','2021-11-06 12:09:02','2021-11-10 21:34:13','90.20.7.216'),('daa5f7f0d6e01d8370c2192face9f048','[]','2021-11-18 16:42:32','2021-11-11 16:42:29','2021-11-11 16:42:32','3.138.142.150'),('dbc3ce35c9e00545b530b06094848e37','[]','2021-11-17 17:03:39','2021-11-10 17:03:39','2021-11-10 17:03:39','192.227.225.150'),('dc51a98f258506fe545107d68fc754b1','[]','2021-11-15 17:35:30','2021-11-08 17:35:30','2021-11-08 17:35:30','34.220.178.201'),('dd0a4f78a8b38af219dbfb723538a438','[]','2021-11-12 19:07:25','2021-11-05 19:07:25','2021-11-05 19:07:25','66.249.64.184'),('dd207a77d5ef37000f0db1a491a8df52','[]','2021-11-17 17:03:36','2021-11-10 17:03:36','2021-11-10 17:03:36','192.227.225.150'),('de67ec9a0402f82c74809463fe5a2706','[]','2021-11-17 17:03:31','2021-11-10 17:03:31','2021-11-10 17:03:31','192.227.225.150'),('dea24f9b1a68fcc0d1a987af90a51b60','[]','2021-11-18 17:35:11','2021-11-11 17:35:11','2021-11-11 17:35:11','54.191.188.5'),('df230b43c3eb34728a06b4f1fe092369','[]','2021-11-17 17:02:51','2021-11-10 17:02:51','2021-11-10 17:02:51','192.227.225.150'),('dfc4b59922820a44818bc5ee01bba696','[]','2021-11-15 17:41:03','2021-11-08 17:41:03','2021-11-08 17:41:03','18.237.244.155'),('e02cc3de908fe0833c67d10745ac5d14','[]','2021-11-17 17:04:28','2021-11-10 17:04:28','2021-11-10 17:04:28','192.227.225.150'),('e0ae4ef3cae14144f8274a3744b88ec3','[]','2021-11-13 13:55:52','2021-11-06 13:44:07','2021-11-06 13:55:52','90.107.131.94'),('e17dba12be418dabb490e10c705311c3','[]','2021-11-19 16:58:10','2021-11-12 16:58:10','2021-11-12 16:58:10','105.67.7.92'),('e185c63770f38f1d8733669056d32785','[]','2021-11-17 17:03:59','2021-11-10 17:03:58','2021-11-10 17:03:59','192.227.225.150'),('e2289146208d5e0b2ab31c8ffaf692b4','[]','2021-11-15 08:58:51','2021-11-08 08:58:51','2021-11-08 08:58:51','66.249.64.182'),('e26a8a91e075b00e60479d612c96d91d','[]','2021-11-16 08:42:57','2021-11-09 08:42:52','2021-11-09 08:42:57','164.132.128.23'),('e2ec56214de009129acf8e0ca516bfd2','[]','2021-11-13 06:53:18','2021-11-06 06:53:18','2021-11-06 06:53:18','54.201.58.97'),('e2f526b96016ce5d675a421c1c13741a','[]','2021-11-15 05:07:19','2021-11-08 05:07:18','2021-11-08 05:07:19','51.38.37.96'),('e341e746cc1780a396249b2e9a5f8b59','[]','2021-11-15 06:14:24','2021-11-08 06:14:24','2021-11-08 06:14:24','35.165.242.119'),('e3e9c71b19702bd4beba9eb0105d8266','[]','2021-11-17 18:48:35','2021-11-10 18:48:35','2021-11-10 18:48:35','67.205.31.50'),('e3fab5701d6bb8828bbd13229273eb28','[]','2021-11-17 17:03:03','2021-11-10 17:03:03','2021-11-10 17:03:03','192.227.225.150'),('e4b0ab534d768e085a165706752f0a0e','[]','2021-11-18 07:32:05','2021-11-11 07:32:05','2021-11-11 07:32:05','3.83.84.35'),('e5e12d55ca97af707e689fddedf33813','[]','2021-11-13 06:53:03','2021-11-06 06:53:03','2021-11-06 06:53:03','34.217.75.131'),('e6dff01af56f9597ff425d1e40979f40','[]','2021-11-14 15:43:26','2021-11-07 15:43:26','2021-11-07 15:43:26','81.249.103.179'),('e71cff49e3e7badcf42a16c1adf229d7','[]','2021-11-19 14:22:28','2021-11-12 14:22:28','2021-11-12 14:22:28','173.252.83.10'),('e76675356079b3e05aba2fd882896be8','[]','2021-11-14 17:46:05','2021-11-07 17:46:05','2021-11-07 17:46:05','34.214.160.166'),('e820af7ee6347add3122114e2857aa86','[]','2021-11-15 17:28:41','2021-11-04 16:06:40','2021-11-08 17:28:41','176.178.81.195'),('ea18212be3f6012a3fdcf15d20d6877a','[]','2021-11-17 21:26:06','2021-11-10 21:26:06','2021-11-10 21:26:06','162.210.196.97'),('eb4632ba8ca9d9f2102dceb070cd9339','[]','2021-11-14 19:56:55','2021-11-07 19:56:55','2021-11-07 19:56:55','175.44.42.172'),('ebb06a5a72e3aaebfbd6fd9a7dd4a1c4','[]','2021-11-13 11:49:22','2021-11-06 11:49:21','2021-11-06 11:49:22','93.158.91.229'),('ec35f26641a81aed5f93fcd9a374e373','[]','2021-11-17 23:04:48','2021-11-10 23:04:46','2021-11-10 23:04:48','3.144.10.139'),('ec851467f97fc35f2e827cbcab13de74','[]','2021-11-12 18:16:30','2021-11-05 18:16:29','2021-11-05 18:16:30','34.253.138.220'),('ee7607cf2c6265f04e8c8ab7035e3032','[]','2021-11-18 07:30:05','2021-11-11 07:30:05','2021-11-11 07:30:05','212.192.241.36'),('ef171deeb74b5082012b9e6b89ae0621','[]','2021-11-18 06:14:40','2021-11-11 06:14:40','2021-11-11 06:14:40','93.113.111.100'),('f032df72b82cb6e8142b6e913705f822','[]','2021-11-15 12:27:53','2021-11-08 12:27:53','2021-11-08 12:27:53','91.163.134.205'),('f12a5e1183a474354f8cbae1d28a8143','[]','2021-11-16 09:26:50','2021-11-09 09:26:50','2021-11-09 09:26:50','31.13.127.17'),('f1c4628a2590f9f7ce2b12ff6289cda0','[]','2021-11-16 07:19:36','2021-11-09 07:19:35','2021-11-09 07:19:36','34.221.140.200'),('f2c3e2616b84c44cea1cd7d2b7edbdcd','[]','2021-11-18 06:25:18','2021-11-11 06:25:18','2021-11-11 06:25:18','34.213.0.56'),('f2ec5371981d8c4c3f929e916edf8d0e','[]','2021-11-14 15:45:56','2021-11-07 15:45:56','2021-11-07 15:45:56','78.117.191.190'),('f4d3ee18293fcf3a774989459f101e59','[]','2021-11-13 11:49:19','2021-11-06 11:49:19','2021-11-06 11:49:19','93.158.91.180'),('f51f5282219d8f705a11f0ad860abda2','[]','2021-11-13 20:46:18','2021-11-06 20:46:17','2021-11-06 20:46:18','93.23.19.6'),('f659b0123225c7d2c575b1da6ff4c8be','[]','2021-11-15 16:11:53','2021-11-08 16:11:53','2021-11-08 16:11:53','23.228.109.147'),('f810ef9d0d5f269b21b80bce8a284bcd','[]','2021-11-13 06:53:06','2021-11-06 06:53:06','2021-11-06 06:53:06','34.217.75.131'),('f86221f753d53184456296d4b4e08139','[]','2021-11-15 21:07:59','2021-11-08 21:07:59','2021-11-08 21:07:59','200.58.109.114'),('f8bd572554ff66702051b76bd3372eba','[]','2021-11-18 17:30:16','2021-11-11 17:30:16','2021-11-11 17:30:16','54.190.115.134'),('f93d693b0f154a5a8608aa4742fd4c0f','[]','2021-11-12 18:38:52','2021-11-05 18:38:41','2021-11-05 18:38:52','37.170.51.216'),('fa4722b4a03432e38b3b916baeeb882f','[]','2021-11-13 18:03:37','2021-11-06 18:03:37','2021-11-06 18:03:37','51.38.37.96'),('fcd9f17e92f1c168132a39492458fcf6','[]','2021-11-16 07:13:25','2021-11-09 07:13:25','2021-11-09 07:13:25','54.149.194.125'),('fe2518735d0011de478d0feba32d986a','[]','2021-11-18 07:36:38','2021-11-11 07:36:37','2021-11-11 07:36:38','80.214.113.134'),('fe6e2edd502409be365ee48168257f95','[]','2021-11-17 23:04:54','2021-11-10 23:04:53','2021-11-10 23:04:54','3.144.10.139'),('feec066670e4219ca8f9161b23ea7b98','[]','2021-11-16 07:19:32','2021-11-09 07:19:31','2021-11-09 07:19:32','34.221.140.200'),('fefdd6094a6dcaaf9f0d929c94960f90','[]','2021-11-19 12:56:59','2021-11-12 12:56:57','2021-11-12 12:56:59','128.127.104.80');
/*!40000 ALTER TABLE `core_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_social_network`
--

DROP TABLE IF EXISTS `core_social_network`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_social_network` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_social_network`
--

LOCK TABLES `core_social_network` WRITE;
/*!40000 ALTER TABLE `core_social_network` DISABLE KEYS */;
INSERT INTO `core_social_network` VALUES (1,'Youtube','http://',NULL,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(2,'Facebook','http://',NULL,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(3,'Instagram','http://',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(4,'LinkedIn','http://',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(5,'Twitter','http://',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(6,'WeChat','http://',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(7,'Youku','http://',NULL,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `core_social_network` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_text`
--

DROP TABLE IF EXISTS `core_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_group` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_96E64F23B74FE98` (`text_group`),
  CONSTRAINT `FK_96E64F23B74FE98` FOREIGN KEY (`text_group`) REFERENCES `core_text_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_text`
--

LOCK TABLES `core_text` WRITE;
/*!40000 ALTER TABLE `core_text` DISABLE KEYS */;
INSERT INTO `core_text` VALUES (1,4,'footer_copyrights',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(2,4,'footer_contact',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(3,37,'page_connect_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(4,37,'page_connect_form_username',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(5,37,'page_connect_form_password',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(6,37,'page_connect_form_btn_submit',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(7,37,'page_connect_redirect_register_content',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(8,37,'page_connect_redirect_register',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(9,37,'page_connect_forgot',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(10,37,'page_errors_id',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(11,37,'page_errors_fire',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(12,28,'page_errors_invalid_password',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(13,28,'page_errors_invalid_email',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(14,29,'page_legal_notices_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(15,29,'page_legal_notices_content',2,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(16,37,'page_info_payment_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(17,37,'page_info_payment_content',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(18,37,'page_info_delivery_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(19,37,'page_info_delivery_content',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(20,37,'page_faq_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(21,37,'page_faq_content',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(22,37,'page_cgv_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(23,37,'page_cgv_content',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(24,37,'page_about_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(25,37,'page_about_content',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(26,37,'login_form_username',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(27,37,'login_form_password',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(28,37,'page_connect_btn_submit',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(29,32,'form_error_fire',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(30,44,'page_error_403_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(31,44,'page_error_403_content',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(32,44,'page_error_403_link',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(33,44,'page_error_403_connect',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(34,44,'page_error_404_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(35,44,'page_error_404_content',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(36,44,'page_error_404_link',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(37,32,'page_contact_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(38,32,'page_contact_form_lastname',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(39,32,'page_contact_form_firstname',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(40,32,'page_contact_form_email',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(41,32,'page_contact_form_phone',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(42,32,'page_contact_form_subject',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(43,32,'page_contact_form_message',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(44,32,'page_contact_form_title_mr',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(45,32,'page_contact_form_title_mrs',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(46,32,'page_contact_form_submit',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(47,32,'page_contact_form_lastname_invalid',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(48,32,'page_contact_form_firstname_invalid',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(49,32,'page_contact_form_email_invalid',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(50,32,'page_contact_form_phone_invalid',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(51,32,'page_contact_form_subject_invalid',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(52,32,'page_contact_form_message_invalid',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(53,32,'page_contact_form_info_sent',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(54,6,'page_mini_navigation_link_1',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(55,6,'page_mini_navigation_link_2',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(56,6,'page_mini_navigation_link_3',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(57,6,'page_mini_navigation_link_4',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(58,6,'page_mini_page_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(59,6,'page_mini_section_title_1',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(60,6,'page_mini_section_content_1',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(61,6,'page_mini_section_picto_column_title_1',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(62,6,'page_mini_section_picto_column_title_2',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(63,6,'page_mini_section_picto_column_title_3',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(64,6,'page_mini_section_produits_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(65,6,'page_mini_section_produits_content',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(66,6,'page_mini_section_produits_link',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(67,6,'page_mini_section_map_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(68,6,'page_mini_section_vendeurs_1_content_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(69,6,'page_mini_section_vendeurs_1_content_horaires_subtitle',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(70,6,'page_mini_section_vendeurs_1_content_horaires_text',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(71,6,'page_mini_section_vendeurs_1_content_adresse_subtitle',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(72,6,'page_mini_section_vendeurs_1_content_adresse_text',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(73,6,'page_mini_section_vendeurs_2_content_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(74,6,'page_mini_section_vendeurs_2_content_horaires_subtitle',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(75,6,'page_mini_section_vendeurs_2_content_horaires_text',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(76,6,'page_mini_section_vendeurs_2_content_adresse_subtitle',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(77,6,'page_mini_section_vendeurs_2_content_adresse_text',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(78,6,'page_mini_section_vendeurs_3_content_title',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(79,6,'page_mini_section_vendeurs_3_content_horaires_subtitle',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(80,6,'page_mini_section_vendeurs_3_content_horaires_text',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(81,6,'page_mini_section_vendeurs_3_content_adresse_subtitle',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(82,6,'page_mini_section_vendeurs_3_content_adresse_text',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(83,6,'page_mini_section_contact_title_1',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(84,6,'page_mini_section_contact_content_1',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(85,6,'page_mini_section_contact_content_2',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(86,6,'page_mini_section_contact_email',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(87,6,'page_mini_section_contact_content_3',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(88,6,'page_mini_section_contact_telephone',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(89,6,'page_mini_section_adresse_item_1',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(90,6,'page_mini_section_adresse_item_2',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(91,6,'page_mini_section_adresse_item_3',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(92,6,'page_mini_section_adresse_item_4',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(93,6,'page_mini_section_title_3',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(94,6,'page_mini_section_content_3',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(95,6,'page_mini_section_link_3',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(96,6,'page_mini_footer_content_1',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(97,6,'page_mini_footer_link_1',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(98,6,'page_mini_footer_link_2',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(99,6,'page_mini_footer_link_3',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(100,6,'page_mini_footer_link_4',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(101,6,'page_mini_footer_link_5',0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(102,1,'pop_up_map_adresse',0,1,0,'2019-10-31 14:49:36','2019-10-31 14:49:36'),(103,1,'pop_up_map_ville',0,1,0,'2019-10-31 14:50:17','2019-10-31 14:50:17'),(104,1,'pop_up_map_number',0,1,0,'2019-10-31 14:50:53','2019-10-31 14:50:53'),(105,6,'pop_up_map_adresse1',0,1,0,'2019-10-31 14:55:20','2019-10-31 14:55:20'),(106,1,'pop_up_map_adresse2',0,1,0,'2019-10-31 15:01:56','2019-10-31 15:01:56'),(107,6,'pop_up_map_adresse3',0,1,0,'2019-10-31 15:04:16','2019-10-31 15:04:16');
/*!40000 ALTER TABLE `core_text` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_text_group`
--

DROP TABLE IF EXISTS `core_text_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_text_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7387A793D8E604F` (`parent`),
  CONSTRAINT `FK_7387A793D8E604F` FOREIGN KEY (`parent`) REFERENCES `core_text_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_text_group`
--

LOCK TABLES `core_text_group` WRITE;
/*!40000 ALTER TABLE `core_text_group` DISABLE KEYS */;
INSERT INTO `core_text_group` VALUES (1,NULL,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(2,NULL,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(3,NULL,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(4,NULL,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(5,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(6,5,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(7,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(8,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(9,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(10,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(11,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(12,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(13,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(14,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(15,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(16,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(17,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(18,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(19,5,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(20,1,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(21,20,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(22,20,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(23,20,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(24,20,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(25,20,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(26,20,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(27,20,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(28,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(29,28,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(30,28,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(31,28,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(32,28,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(33,28,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(34,28,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(35,1,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(36,35,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(37,35,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(38,35,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(39,35,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(40,35,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(41,35,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(42,35,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(43,35,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(44,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `core_text_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_text_group_translation`
--

DROP TABLE IF EXISTS `core_text_group_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_text_group_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_text_group_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_50FFE9862C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_50FFE9862C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `core_text_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_text_group_translation`
--

LOCK TABLES `core_text_group_translation` WRITE;
/*!40000 ALTER TABLE `core_text_group_translation` DISABLE KEYS */;
INSERT INTO `core_text_group_translation` VALUES (1,1,'Front-Office','fr'),(2,2,'Back-Office','fr'),(3,3,'Navigation','fr'),(4,4,'Pied de page','fr'),(5,5,'Pages','fr'),(6,6,'Accueil','fr'),(7,7,'Rechercher','fr'),(8,8,'Actualités','fr'),(9,9,'Actualite','fr'),(10,10,'Page personnalisée n°1','fr'),(11,11,'Page personnalisée n°2','fr'),(12,12,'Page personnalisée n°3','fr'),(13,13,'Page personnalisée n°4','fr'),(14,14,'Page personnalisée n°5','fr'),(15,15,'Page personnalisée n°6','fr'),(16,16,'Page personnalisée n°7','fr'),(17,17,'Page personnalisée n°8','fr'),(18,18,'Page personnalisée n°9','fr'),(19,19,'Page personnalisée n°10','fr'),(20,20,'Magasin','fr'),(21,21,'Catégories','fr'),(22,22,'Produits','fr'),(23,23,'Produit','fr'),(24,24,'Panier','fr'),(25,25,'Livraison','fr'),(26,26,'Paiement','fr'),(27,27,'Commande','fr'),(28,28,'Annexes','fr'),(29,29,'Mentions légales','fr'),(30,30,'Foire aux questions','fr'),(31,31,'CGV','fr'),(32,32,'Contact','fr'),(33,33,'Informations de livraison','fr'),(34,34,'Informations de paiement','fr'),(35,35,'Compte','fr'),(36,36,'Général','fr'),(37,37,'Connexion / Inscription','fr'),(38,38,'Mot de passe oublié','fr'),(39,39,'Tableau de bord','fr'),(40,40,'Historique des commandes','fr'),(41,41,'Informations','fr'),(42,42,'Adresses','fr'),(43,43,'Newsletter','fr'),(44,44,'Erreurs','fr');
/*!40000 ALTER TABLE `core_text_group_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_text_translation`
--

DROP TABLE IF EXISTS `core_text_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_text_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` longtext COLLATE utf8_unicode_ci,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_text_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_C1E2E0382C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_C1E2E0382C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `core_text` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_text_translation`
--

LOCK TABLES `core_text_translation` WRITE;
/*!40000 ALTER TABLE `core_text_translation` DISABLE KEYS */;
INSERT INTO `core_text_translation` VALUES (1,1,'Mention légales',NULL,NULL,'fr'),(2,2,'Contact',NULL,NULL,'fr'),(3,3,'Connexion',NULL,NULL,'fr'),(4,4,'Identifiant',NULL,NULL,'fr'),(5,5,'Mot de passe',NULL,NULL,'fr'),(6,6,'Se connecter',NULL,NULL,'fr'),(7,7,'Vous n\'avez pas de compte ?',NULL,NULL,'fr'),(8,8,'Créer un compte',NULL,NULL,'fr'),(9,9,'Mot de passe oublié ?',NULL,NULL,'fr'),(10,10,'Une erreur est survenue, veuillez réessayer ultérieurement',NULL,NULL,'fr'),(11,11,'Une erreur est survenue, veuillez réessayer ultérieurement',NULL,NULL,'fr'),(12,12,'Mot de passe invalide',NULL,NULL,'fr'),(13,13,'Adresse e-mail invalide',NULL,NULL,'fr'),(14,14,'Mentions légales',NULL,NULL,'fr'),(15,15,'<div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Ces mentions légales s\'étendent aux sites édités et reliés au domaine suivant: la-chaumotte.fr ainsi que ses sous-domaines.</span></div><div style=\"text-align: center;\"><br><h2 style=\"font-family: -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0); text-align: center;\">Propriété et responsabilité éditoriale</h2><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Le\r\n présent site est la propriété de EARL La Chaumotte (FRANCE), EARL au capital de\r\n 43 295 €. Le directeur de la publication du présent site est Claire ANDRÉ&nbsp; en sa qualité de Gérante. Le webmaster du présent site est Claire ANDRÉ.</span></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><br></span></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">SIRET :&nbsp;</span>32382458100025</div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Code APE : 0111Z</span></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><br></span></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Tél :&nbsp;</span>02 48 26 12 24</div><div style=\"text-align: center;\">E-mail :&nbsp;c.andre713@laposte.net</div><div style=\"text-align: center;\">N° TVA intracommunautaire :&nbsp;FR34323824581</div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><br></span></div><h2 style=\"font-family: -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0); text-align: center;\">Conception</h2><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Le présent site à été conçu et développé par la société DELIT D\'INFLUENCE 7, place Rabelais 18000 BOURGES (FRANCE)</span></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Tél: +33 (0)2 48 66 60 10</span></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Web :&nbsp;</span><a href=\"https://www.delit-dinfluence.fr/\" target=\"_blank\">https://www.delit-dinfluence.fr</a></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><br></span></div><h2 style=\"font-family: -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0); text-align: center;\">Hébergement</h2><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Le présent site est hébergé par la société OVH 2 rue Kellermann 59100 Roubaix (FRANCE)</span></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Web:&nbsp;</span><a href=\"https://www.ovh.com/fr\" target=\"_blank\">https://www.ovh.com/fr</a></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><br></span></div><div style=\"text-align: center;\"><div><h2 style=\"font-family: -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);\">Informatique et Liberté</h2></div><div><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><div>En application de la loi nᵒ 78-17 du 6 janvier 1978 modifiée «Informatique et Liberté»&nbsp; et du Règlement Général de la Protection des Données (RGPD), vous disposez d\'un droit d\'accès, de rectification, d\'opposition et de droit à l\'oubli sur les données vous concernant.</div><div>Pour exercer ce droit, il reviendra à l’Utilisateur d’envoyer un message à l’adresse suivante : «&nbsp;<span style=\"font-family: Roboto;\">c.andre713@laposte.net</span>&nbsp;».&nbsp;</div><div><br></div></span></div></div><h2 style=\"font-family: -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0); text-align: center;\">Tous droits réservés.</h2><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">L’ensemble des éléments composant ce site sont la propriété exclusive de&nbsp;</span><span style=\"color: rgb(33, 37, 41); font-family: -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">La Chaumotte</span><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">. Ce site est une oeuvre protégée par la législation sur la propriété \r\nintellectuelle. Toute reproduction ou représentation faite sans l’accord\r\n de l\'éditeur constitue une contrefaçon. La reproduction de tout ou \r\npartie de ce site sur quelque support que ce soit est formellement \r\ninterdite. Tous les droits de reproduction sont réservés. Tout \r\nutilisateur de ce présent site est considéré comme ayant accepté \r\nl’application des lois françaises actuellement en vigueur. Il est tenu \r\nde respecter les dispositions de la loi Informatique et libertés dont la\r\n violation est passible de sanctions pénales.</span></div><div style=\"text-align: center;\"><br></div><h2 style=\"font-family: -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0); text-align: center;\">Analyse du trafic</h2><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Ce\r\n site utilise Google Analytics, un service d’analyse du trafic de site \r\ninternet fourni par Google Inc. (« Google »). Google Analytics utilise \r\ndes cookies, qui sont des fichiers textes hébergés sur votre ordinateur,\r\n pour aider le site internet à analyser l’utilisation du site par ses \r\nutilisateurs. Les données générées par les cookies concernant votre \r\nutilisation du site (y compris votre adresse IP) sont transmises et \r\nstockées par Google sur des serveurs situés aux Etats-Unis. Google \r\nutilise ces information dans le but d’évaluer l’utilisation du site par \r\nses visiteurs, de compiler des rapports sur l’activité du site à \r\ndestination de son éditeur et de fournir d’autres services relatifs à \r\nl’activité du site et à l’utilisation d’Internet. Google est susceptible\r\n de communiquer ces données à des tiers en cas d’obligation légale ou \r\nlorsque ces tiers traitent ces données pour le compte de Google, y \r\ncompris notamment l’éditeur de ce site. Google s’engage à ne jamais \r\nrecouper votre adresse IP avec toute autre donnée détenue par Google. \r\nVous pouvez désactiver l’utilisation de cookies en sélectionnant les \r\nparamètres appropriés de votre navigateur. Cependant, une telle \r\ndésactivation pourrait empêcher l’utilisation de certaines \r\nfonctionnalités de ce site. En utilisant ce site Web, vous acceptez que \r\nGoogle traite des données vous concernant de la manière et aux fins \r\ndécrites ci-dessus.</span></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><br></span></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Lien vers les règles de&nbsp;<a href=\"https://policies.google.com/privacy?hl=fr\" target=\"_blank\">confidentialité de Google&nbsp;</a></span></div><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><br></span></div><h2 style=\"font-family: -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0); text-align: center;\">Les cookies émis sur notre site par des tiers</h2><div style=\"text-align: center;\"><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">L’émission\r\n et l’utilisation de cookies par des tiers sont soumises aux politiques \r\nde protection de la vie privée de ces tiers. Nous vous informons de \r\nl’objet des cookies dont nous avons connaissance et des moyens dont vous\r\n disposez pour effectuer des choix à l’égard de ces cookies. Du fait \r\nd’applications tierces intégrées à notre site, nous sommes susceptibles \r\nd’inclure sur notre site/application, des applications informatiques \r\némanant de tiers, qui vous permettent de partager des contenus de notre \r\nsite avec d’autres personnes ou de faire connaître à ces autres \r\npersonnes votre consultation ou votre opinion concernant un contenu de \r\nnotre site/application. Tel est notamment le cas des boutons “Partager” \r\nissus de réseaux sociaux tels que Facebook “Twitter”, LinkedIn”. Le \r\nréseau social fournissant un tel bouton applicatif est susceptible de \r\nvous identifier grâce à ce bouton, même si vous n’avez pas utilisé ce \r\nbouton lors de votre consultation de notre site/application. En effet, \r\nce type de bouton applicatif peut permettre au réseau social concerné de\r\n suivre votre navigation sur notre site, du seul fait que votre compte \r\nau réseau social concerné était activé sur votre terminal (session \r\nouverte) durant votre navigation sur notre site. Nous n’avons aucun \r\ncontrôle sur le processus employé par les réseaux sociaux pour collecter\r\n des informations relatives à votre navigation sur notre site et \r\nassociées aux données personnelles dont ils disposent. Nous vous \r\ninvitons à consulter les politiques de protection de la vie privée de \r\nces réseaux sociaux afin de prendre connaissance des finalités \r\nd’utilisation, notamment publicitaires, des informations de navigation \r\nqu’ils peuvent recueillir grâce à ces boutons applicatifs. Ces \r\npolitiques de protection doivent notamment vous permettre d’exercer vos \r\nchoix auprès de ces réseaux sociaux, notamment en paramétrant vos \r\ncomptes d’utilisation de chacun de ces réseaux.&nbsp;</span></div><span style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"></span></div>',NULL,NULL,'fr'),(16,16,'Informations de paiements',NULL,NULL,'fr'),(17,17,'Contenu des informations de paiements',NULL,NULL,'fr'),(18,18,'Informations de livraisons',NULL,NULL,'fr'),(19,19,'Contenu des informations de livraisons',NULL,NULL,'fr'),(20,20,'Foire aux questions',NULL,NULL,'fr'),(21,21,'Contenu de la Foire aux questions',NULL,NULL,'fr'),(22,22,'Conditions Générales de Ventes',NULL,NULL,'fr'),(23,23,'Contenu des ',NULL,NULL,'fr'),(24,24,'Qui sommes nous ?',NULL,NULL,'fr'),(25,25,'Contenu des Qui sommes nous ?',NULL,NULL,'fr'),(26,26,'Utilisateur',NULL,NULL,'fr'),(27,27,'Mot de passe',NULL,NULL,'fr'),(28,28,'Se connecter',NULL,NULL,'fr'),(29,29,'Une erreur est survenue',NULL,NULL,'fr'),(30,30,'Accès refusé',NULL,NULL,'fr'),(31,31,'Le contenu nécessite d\'être connecté',NULL,NULL,'fr'),(32,32,'Retourner sur le site',NULL,NULL,'fr'),(33,33,'Ce connecter',NULL,NULL,'fr'),(34,34,'Contenu introuvable',NULL,NULL,'fr'),(35,35,'Le contenu demandé n\'exite pas ou a été déplacé',NULL,NULL,'fr'),(36,36,'Retourner sur le site',NULL,NULL,'fr'),(37,37,'Contact',NULL,NULL,'fr'),(38,38,'Nom',NULL,NULL,'fr'),(39,39,'Prénom',NULL,NULL,'fr'),(40,40,'E-mail',NULL,NULL,'fr'),(41,41,'Téléphone',NULL,NULL,'fr'),(42,42,'Sujet',NULL,NULL,'fr'),(43,43,'Message',NULL,NULL,'fr'),(44,44,'Mr',NULL,NULL,'fr'),(45,45,'Mme',NULL,NULL,'fr'),(46,46,'Envoyer',NULL,NULL,'fr'),(47,47,'Nom',NULL,NULL,'fr'),(48,48,'Prénom',NULL,NULL,'fr'),(49,49,'E-mail',NULL,NULL,'fr'),(50,50,'Téléphone',NULL,NULL,'fr'),(51,51,'Sujet',NULL,NULL,'fr'),(52,52,'Message',NULL,NULL,'fr'),(53,53,'Message envoyé !',NULL,NULL,'fr'),(54,54,'Qui sommes-nous ?',NULL,NULL,'fr'),(55,55,'Les produits',NULL,NULL,'fr'),(56,56,'Les points de vente',NULL,NULL,'fr'),(57,57,'Passer une commande',NULL,NULL,'fr'),(58,59,'Qui sommes-nous ?',NULL,NULL,'fr'),(59,60,'<p>Nous sommes une exploitation familiale qui élève des volailles au sein de la ferme de La Chaumotte dans le Cher.<br />\r\nNos volailles sont abattues dans notre abattoir aux normes CE à la Ferme.<br /><br />\r\n\r\nSituée à proximité de Villequiers, un petit village à 40 km à l’est de Bourges, les poulets et pintades sont élevés en liberté. Les volailles, issues de races rustiques arrivent à la ferme lorsqu\'elles ont un jour. Elles sont élevées en poussinière jusqu’à l’âge de 3 semaines, puis elles intègrent des cabanes en bois entourées de parcs herbeux où elles sont libres d’entrer et de sortir à leur guise.<br /><br />\r\n\r\nLeur alimentation est constituée de triticale, de maïs, de pois, de soja extrudé et de tourteau de colza, essentiellement issus de l’agriculture de la ferme.\r\nDepuis 2020, les cultures de la Ferme sont en conversion à l\'agriculture biologique<br /><br />\r\n\r\nLe mode d’élevage et l’alimentation de nos volailles confèrent à leur chair un goût délicieux ainsi qu\'une texture dense et moelleuse !</p>',NULL,NULL,'fr'),(60,61,'<span>élevage en</span><span>liberté</span>',NULL,NULL,'fr'),(61,62,'<span>alimentation des volailles</span><span> issue de la ferme</span>',NULL,NULL,'fr'),(62,63,'<span>volailles et plats</span><span>cuisinés</span>',NULL,NULL,'fr'),(63,64,'Les produits',NULL,NULL,'fr'),(64,65,'<p>Tout au long de l’année, nous proposons une partie des pintades et des poulets en vente directe \r\n(prêts à cuire).<br /><br />Nous vous invitons à goûter nos volailles rôties ou en cocotte. Mais aussi à tester les ailes dodues dorées au four ou encore les cuisses à la peau croustillante qui libèrent à la cuisson un jus sirupeux quelle que soit la préparation.<br /><br />\r\n\r\nLa Ferme est équipée d\'un laboratoire de transformation fermière qui nous permet de réaliser l’autre partie de la production en plats cuisinés, terrines, rillettes et charcuterie.<br /><br />\r\n\r\nExclusivement pour les fêtes de Noël, \r\nnous élevons spécialement des dindes et des chapons, \r\ndisponibles sous réservation.</p>',NULL,NULL,'fr'),(65,66,'Découvrir les produits',NULL,NULL,'fr'),(66,67,'Les points de vente',NULL,NULL,'fr'),(67,68,'Au pré des fermes',NULL,NULL,'fr'),(68,69,'Horaires',NULL,NULL,'fr'),(69,70,'<span>Du mardi au vendredi</span><span>de 10h à 13h et de 15h à 19h</span><span>le samedi</span><span>de 10h à 13h et de 15h à 18h</span>',NULL,NULL,'fr'),(70,71,'Adressse',NULL,NULL,'fr'),(71,72,'<span>9146 route de Paris</span><span>18110 FUSSY</span><span>Contact : 02 48 24 01 23</span>',NULL,NULL,'fr'),(72,73,'La ferme',NULL,NULL,'fr'),(73,74,'Horaires',NULL,NULL,'fr'),(74,75,'<span>Mercredi et jeudi</span><span>de 10h à 12h30 et de 15h à 19h </span><span>Vendredi et samedi</span><span>de 10h à 19h</span>',NULL,NULL,'fr'),(75,76,'Adressse',NULL,NULL,'fr'),(76,77,'<span>120 Rue des Fougerets</span><span>41350 SAINT-GERVAIS-LA-FORÊT</span><span>Contact : 02 54 87 25 29</span>',NULL,NULL,'fr'),(77,78,'Marché carnot',NULL,NULL,'fr'),(78,79,'Horaires',NULL,NULL,'fr'),(79,80,'<span>Le samedi</span><span>de 7h30 à 12h30</span>',NULL,NULL,'fr'),(80,81,'Adressse',NULL,NULL,'fr'),(81,82,'<span>Entrées rue Saint-Didier et avenue Général de Gaulle</span><span>58000 NEVERS</span>',NULL,NULL,'fr'),(82,83,'<span>Passer une</span><span>commande</span>',NULL,NULL,'fr'),(83,84,'<span>Vous souhaitez passer une commande ou tout simplement avoir un renseignement ?</span>',NULL,NULL,'fr'),(84,85,'N\'hesitez pas à nous contacter par mail :',NULL,NULL,'fr'),(85,86,'<strong>c.andre713@laposte.net</strong>',NULL,NULL,'fr'),(86,87,'Ou par téléphone au :',NULL,NULL,'fr'),(87,88,'<strong>02 48 26 12 24</strong>',NULL,NULL,'fr'),(88,89,'EARL LA CHAUMOTTE',NULL,NULL,'fr'),(89,90,'LA CHAUMOTTE 18800 VILLEQUIERS',NULL,NULL,'fr'),(90,91,'02 48 26 12 24',NULL,NULL,'fr'),(91,92,'c.andre713@laposte.net',NULL,NULL,'fr'),(92,93,'TITRE',NULL,NULL,'fr'),(93,94,'Contenu',NULL,NULL,'fr'),(94,95,'Contenu',NULL,NULL,'fr'),(95,96,'Copyright ...',NULL,NULL,'fr'),(96,97,'Qui sommes-nous ?',NULL,NULL,'fr'),(97,98,'Les produits',NULL,NULL,'fr'),(98,99,'Les points de vente',NULL,NULL,'fr'),(99,100,'Passer une commande',NULL,NULL,'fr'),(100,101,'Mentions légales',NULL,NULL,'fr'),(101,102,'9146 route de Paris 18110',NULL,NULL,'fr'),(102,103,'18110 FUSSY',NULL,NULL,'fr'),(103,104,'02 48 24 01 23',NULL,NULL,'fr'),(104,105,'<span>9146 route de Paris</span><span>18110 FUSSY</span><span>02 48 24 01 23</span>',NULL,NULL,'fr'),(105,106,'<span> 120 Rue des Fougerets</span> <span>41350 Saint-Gervais-la-forêt</span> <span>02 54 87 25 29 </span>',NULL,NULL,'fr'),(106,107,'<span>Entrées rue Saint-Didier et</span> <span>avenue Général de Gaulle</span><span>58000 NEVERS</span>',NULL,NULL,'fr');
/*!40000 ALTER TABLE `core_text_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_video`
--

DROP TABLE IF EXISTS `core_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_video`
--

LOCK TABLES `core_video` WRITE;
/*!40000 ALTER TABLE `core_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_video_translation`
--

DROP TABLE IF EXISTS `core_video_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_video_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_video_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_91E3FDF22C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_91E3FDF22C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `core_video` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_video_translation`
--

LOCK TABLES `core_video_translation` WRITE;
/*!40000 ALTER TABLE `core_video_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_video_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_group_translation`
--

DROP TABLE IF EXISTS `customer_group_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_group_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_group_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_85C0A7B32C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_85C0A7B32C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_customer_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_group_translation`
--

LOCK TABLES `customer_group_translation` WRITE;
/*!40000 ALTER TABLE `customer_group_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_group_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_home_delivery_rule`
--

DROP TABLE IF EXISTS `delivery_home_delivery_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery_home_delivery_rule` (
  `delivery_home_id` int(11) NOT NULL,
  `delivery_rule_id` int(11) NOT NULL,
  PRIMARY KEY (`delivery_home_id`,`delivery_rule_id`),
  KEY `IDX_5DED32E122D37742` (`delivery_home_id`),
  KEY `IDX_5DED32E17E50BC8F` (`delivery_rule_id`),
  CONSTRAINT `FK_5DED32E122D37742` FOREIGN KEY (`delivery_home_id`) REFERENCES `shopping_delivery_home` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_5DED32E17E50BC8F` FOREIGN KEY (`delivery_rule_id`) REFERENCES `shopping_delivery_rule` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_home_delivery_rule`
--

LOCK TABLES `delivery_home_delivery_rule` WRITE;
/*!40000 ALTER TABLE `delivery_home_delivery_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_home_delivery_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feature_translation`
--

DROP TABLE IF EXISTS `feature_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feature_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `feature_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_6C7AD9582C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_6C7AD9582C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_feature` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature_translation`
--

LOCK TABLES `feature_translation` WRITE;
/*!40000 ALTER TABLE `feature_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `feature_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_page_category`
--

DROP TABLE IF EXISTS `page_page_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_page_category` (
  `page_id` int(11) NOT NULL,
  `page_category_id` int(11) NOT NULL,
  PRIMARY KEY (`page_id`,`page_category_id`),
  KEY `IDX_17096EDAC4663E4` (`page_id`),
  KEY `IDX_17096EDA5FAC390` (`page_category_id`),
  CONSTRAINT `FK_17096EDA5FAC390` FOREIGN KEY (`page_category_id`) REFERENCES `core_page_category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_17096EDAC4663E4` FOREIGN KEY (`page_id`) REFERENCES `core_page` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_page_category`
--

LOCK TABLES `page_page_category` WRITE;
/*!40000 ALTER TABLE `page_page_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_page_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `IDX_CDFC73564584665A` (`product_id`),
  KEY `IDX_CDFC735612469DE2` (`category_id`),
  CONSTRAINT `FK_CDFC735612469DE2` FOREIGN KEY (`category_id`) REFERENCES `shopping_category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_CDFC73564584665A` FOREIGN KEY (`product_id`) REFERENCES `shopping_product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_feature`
--

DROP TABLE IF EXISTS `product_feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_feature` (
  `product_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`feature_id`),
  KEY `IDX_CE0E6ED64584665A` (`product_id`),
  KEY `IDX_CE0E6ED660E4B879` (`feature_id`),
  CONSTRAINT `FK_CE0E6ED64584665A` FOREIGN KEY (`product_id`) REFERENCES `shopping_product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_CE0E6ED660E4B879` FOREIGN KEY (`feature_id`) REFERENCES `shopping_feature` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_feature`
--

LOCK TABLES `product_feature` WRITE;
/*!40000 ALTER TABLE `product_feature` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_product`
--

DROP TABLE IF EXISTS `product_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_product` (
  `product_source` int(11) NOT NULL,
  `product_target` int(11) NOT NULL,
  PRIMARY KEY (`product_source`,`product_target`),
  KEY `IDX_2931F1D3DF63ED7` (`product_source`),
  KEY `IDX_2931F1D24136E58` (`product_target`),
  CONSTRAINT `FK_2931F1D24136E58` FOREIGN KEY (`product_target`) REFERENCES `shopping_product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_2931F1D3DF63ED7` FOREIGN KEY (`product_source`) REFERENCES `shopping_product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_product`
--

LOCK TABLES `product_product` WRITE;
/*!40000 ALTER TABLE `product_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sender_email`
--

DROP TABLE IF EXISTS `sender_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sender_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `encryption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sender_email`
--

LOCK TABLES `sender_email` WRITE;
/*!40000 ALTER TABLE `sender_email` DISABLE KEYS */;
INSERT INTO `sender_email` VALUES (1,'Default','smtp','noreply.delitdinfluence@gmail.com','WrBV3YWiJep36qoLZdH9','smtp.gmail.com','465','ssl',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `sender_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sender_email_application`
--

DROP TABLE IF EXISTS `sender_email_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sender_email_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` int(11) DEFAULT NULL,
  `template` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dev_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29DCB81DE7927C74` (`email`),
  KEY `IDX_29DCB81D97601F83` (`template`),
  CONSTRAINT `FK_29DCB81D97601F83` FOREIGN KEY (`template`) REFERENCES `sender_email_template` (`id`),
  CONSTRAINT `FK_29DCB81DE7927C74` FOREIGN KEY (`email`) REFERENCES `sender_email` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sender_email_application`
--

LOCK TABLES `sender_email_application` WRITE;
/*!40000 ALTER TABLE `sender_email_application` DISABLE KEYS */;
INSERT INTO `sender_email_application` VALUES (1,1,NULL,'Contact','contact','Demande de contact','Délit d\'influence',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `sender_email_application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sender_email_configuration`
--

DROP TABLE IF EXISTS `sender_email_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sender_email_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sender_email_configuration`
--

LOCK TABLES `sender_email_configuration` WRITE;
/*!40000 ALTER TABLE `sender_email_configuration` DISABLE KEYS */;
INSERT INTO `sender_email_configuration` VALUES (1,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `sender_email_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sender_email_mailjet`
--

DROP TABLE IF EXISTS `sender_email_mailjet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sender_email_mailjet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sender_email_mailjet`
--

LOCK TABLES `sender_email_mailjet` WRITE;
/*!40000 ALTER TABLE `sender_email_mailjet` DISABLE KEYS */;
/*!40000 ALTER TABLE `sender_email_mailjet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sender_email_sendin_blue`
--

DROP TABLE IF EXISTS `sender_email_sendin_blue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sender_email_sendin_blue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sender_email_sendin_blue`
--

LOCK TABLES `sender_email_sendin_blue` WRITE;
/*!40000 ALTER TABLE `sender_email_sendin_blue` DISABLE KEYS */;
/*!40000 ALTER TABLE `sender_email_sendin_blue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sender_email_template`
--

DROP TABLE IF EXISTS `sender_email_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sender_email_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sender_email_template`
--

LOCK TABLES `sender_email_template` WRITE;
/*!40000 ALTER TABLE `sender_email_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `sender_email_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sender_inbox`
--

DROP TABLE IF EXISTS `sender_inbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sender_inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_readed` tinyint(1) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sender_inbox`
--

LOCK TABLES `sender_inbox` WRITE;
/*!40000 ALTER TABLE `sender_inbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `sender_inbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sender_newsletter`
--

DROP TABLE IF EXISTS `sender_newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sender_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_entity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_module` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sender_newsletter`
--

LOCK TABLES `sender_newsletter` WRITE;
/*!40000 ALTER TABLE `sender_newsletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `sender_newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sender_sms_mailjet`
--

DROP TABLE IF EXISTS `sender_sms_mailjet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sender_sms_mailjet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sender_sms_mailjet`
--

LOCK TABLES `sender_sms_mailjet` WRITE;
/*!40000 ALTER TABLE `sender_sms_mailjet` DISABLE KEYS */;
/*!40000 ALTER TABLE `sender_sms_mailjet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sender_sms_mode`
--

DROP TABLE IF EXISTS `sender_sms_mode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sender_sms_mode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sender_sms_mode`
--

LOCK TABLES `sender_sms_mode` WRITE;
/*!40000 ALTER TABLE `sender_sms_mode` DISABLE KEYS */;
/*!40000 ALTER TABLE `sender_sms_mode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sender_sms_sendin_blue`
--

DROP TABLE IF EXISTS `sender_sms_sendin_blue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sender_sms_sendin_blue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sender_sms_sendin_blue`
--

LOCK TABLES `sender_sms_sendin_blue` WRITE;
/*!40000 ALTER TABLE `sender_sms_sendin_blue` DISABLE KEYS */;
/*!40000 ALTER TABLE `sender_sms_sendin_blue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_attribute`
--

DROP TABLE IF EXISTS `shopping_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_group` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EF1ED7288EF8A773` (`attribute_group`),
  CONSTRAINT `FK_EF1ED7288EF8A773` FOREIGN KEY (`attribute_group`) REFERENCES `shopping_attribute_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_attribute`
--

LOCK TABLES `shopping_attribute` WRITE;
/*!40000 ALTER TABLE `shopping_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_attribute_group`
--

DROP TABLE IF EXISTS `shopping_attribute_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_attribute_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `print_type` int(11) NOT NULL,
  `group_required` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_attribute_group`
--

LOCK TABLES `shopping_attribute_group` WRITE;
/*!40000 ALTER TABLE `shopping_attribute_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_attribute_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_attribute_group_translation`
--

DROP TABLE IF EXISTS `shopping_attribute_group_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_attribute_group_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shopping_attribute_group_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_59FE0FA82C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_59FE0FA82C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_attribute_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_attribute_group_translation`
--

LOCK TABLES `shopping_attribute_group_translation` WRITE;
/*!40000 ALTER TABLE `shopping_attribute_group_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_attribute_group_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_72AAD4F6AEA34913` (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_cart`
--

LOCK TABLES `shopping_cart` WRITE;
/*!40000 ALTER TABLE `shopping_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_cart_product`
--

DROP TABLE IF EXISTS `shopping_cart_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_cart_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart` int(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_ht` double NOT NULL,
  `rate_tva` double NOT NULL,
  `weight` double NOT NULL,
  `attributes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FA1F5E6CBA388B7` (`cart`),
  KEY `IDX_FA1F5E6CD34A04AD` (`product`),
  CONSTRAINT `FK_FA1F5E6CBA388B7` FOREIGN KEY (`cart`) REFERENCES `shopping_cart` (`id`),
  CONSTRAINT `FK_FA1F5E6CD34A04AD` FOREIGN KEY (`product`) REFERENCES `shopping_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_cart_product`
--

LOCK TABLES `shopping_cart_product` WRITE;
/*!40000 ALTER TABLE `shopping_cart_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_cart_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_category`
--

DROP TABLE IF EXISTS `shopping_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B859839C3D8E604F` (`parent`),
  CONSTRAINT `FK_B859839C3D8E604F` FOREIGN KEY (`parent`) REFERENCES `shopping_category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_category`
--

LOCK TABLES `shopping_category` WRITE;
/*!40000 ALTER TABLE `shopping_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_configuration`
--

DROP TABLE IF EXISTS `shopping_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bought_redirect_type` int(11) NOT NULL,
  `random_type` int(11) NOT NULL,
  `random_count` int(11) NOT NULL,
  `free_delivery_count` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_configuration`
--

LOCK TABLES `shopping_configuration` WRITE;
/*!40000 ALTER TABLE `shopping_configuration` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_country`
--

DROP TABLE IF EXISTS `shopping_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_zone` int(11) DEFAULT NULL,
  `code_iso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `call_prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code_format` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contains_states` tinyint(1) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4DF9841427D84BE3` (`country_zone`),
  CONSTRAINT `FK_4DF9841427D84BE3` FOREIGN KEY (`country_zone`) REFERENCES `shopping_country_zone` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_country`
--

LOCK TABLES `shopping_country` WRITE;
/*!40000 ALTER TABLE `shopping_country` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_country_translation`
--

DROP TABLE IF EXISTS `shopping_country_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_country_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shopping_country_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_E176240C2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_E176240C2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_country` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_country_translation`
--

LOCK TABLES `shopping_country_translation` WRITE;
/*!40000 ALTER TABLE `shopping_country_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_country_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_country_zone`
--

DROP TABLE IF EXISTS `shopping_country_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_country_zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_country_zone`
--

LOCK TABLES `shopping_country_zone` WRITE;
/*!40000 ALTER TABLE `shopping_country_zone` DISABLE KEYS */;
INSERT INTO `shopping_country_zone` VALUES (1,'Europe (EU)',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(2,'Amérique du Nord',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(3,'Asie',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(4,'Afrique',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(5,'Océanie',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(6,'Amérique du Sud',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(7,'Europe (Hors EU)',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(8,'Amérique Central/Antilles',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `shopping_country_zone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_customer`
--

DROP TABLE IF EXISTS `shopping_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` int(11) NOT NULL,
  `birthday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_newsletter` tinyint(1) NOT NULL,
  `last_visit` datetime NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_customer`
--

LOCK TABLES `shopping_customer` WRITE;
/*!40000 ALTER TABLE `shopping_customer` DISABLE KEYS */;
INSERT INTO `shopping_customer` VALUES (1,0,NULL,NULL,0,'2019-10-25 14:35:34',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `shopping_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_customer_address`
--

DROP TABLE IF EXISTS `shopping_customer_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_customer_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` int(11) NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instruction` longtext COLLATE utf8_unicode_ci,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_68E4210781398E09` (`customer`),
  CONSTRAINT `FK_68E4210781398E09` FOREIGN KEY (`customer`) REFERENCES `shopping_customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_customer_address`
--

LOCK TABLES `shopping_customer_address` WRITE;
/*!40000 ALTER TABLE `shopping_customer_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_customer_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_customer_group`
--

DROP TABLE IF EXISTS `shopping_customer_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_customer_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_customer_group`
--

LOCK TABLES `shopping_customer_group` WRITE;
/*!40000 ALTER TABLE `shopping_customer_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_customer_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_delivery_collisimo`
--

DROP TABLE IF EXISTS `shopping_delivery_collisimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_delivery_collisimo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_delay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `follower_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_width` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `use_handling_charges` tinyint(1) NOT NULL,
  `handling_charges` double NOT NULL,
  `out_of_range_behavior` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_delivery_collisimo`
--

LOCK TABLES `shopping_delivery_collisimo` WRITE;
/*!40000 ALTER TABLE `shopping_delivery_collisimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_delivery_collisimo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_delivery_configuration`
--

DROP TABLE IF EXISTS `shopping_delivery_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_delivery_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_delivery_configuration`
--

LOCK TABLES `shopping_delivery_configuration` WRITE;
/*!40000 ALTER TABLE `shopping_delivery_configuration` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_delivery_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_delivery_express`
--

DROP TABLE IF EXISTS `shopping_delivery_express`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_delivery_express` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_delay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `follower_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_width` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `use_handling_charges` tinyint(1) NOT NULL,
  `handling_charges` double NOT NULL,
  `out_of_range_behavior` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_delivery_express`
--

LOCK TABLES `shopping_delivery_express` WRITE;
/*!40000 ALTER TABLE `shopping_delivery_express` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_delivery_express` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_delivery_home`
--

DROP TABLE IF EXISTS `shopping_delivery_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_delivery_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_delay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `follower_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_width` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `use_handling_charges` tinyint(1) NOT NULL,
  `handling_charges` double NOT NULL,
  `out_of_range_behavior` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_delivery_home`
--

LOCK TABLES `shopping_delivery_home` WRITE;
/*!40000 ALTER TABLE `shopping_delivery_home` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_delivery_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_delivery_method`
--

DROP TABLE IF EXISTS `shopping_delivery_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_delivery_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_entity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_module` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_delivery_method`
--

LOCK TABLES `shopping_delivery_method` WRITE;
/*!40000 ALTER TABLE `shopping_delivery_method` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_delivery_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_delivery_mondial_relay`
--

DROP TABLE IF EXISTS `shopping_delivery_mondial_relay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_delivery_mondial_relay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `private_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_delay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `follower_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_width` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `use_handling_charges` tinyint(1) NOT NULL,
  `handling_charges` double NOT NULL,
  `out_of_range_behavior` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_delivery_mondial_relay`
--

LOCK TABLES `shopping_delivery_mondial_relay` WRITE;
/*!40000 ALTER TABLE `shopping_delivery_mondial_relay` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_delivery_mondial_relay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_delivery_rule`
--

DROP TABLE IF EXISTS `shopping_delivery_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_delivery_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `charge_type` int(11) NOT NULL,
  `limit_lower` double DEFAULT NULL,
  `limit_upper` double DEFAULT NULL,
  `charge_price` double NOT NULL,
  `limit_lower_or_equal` tinyint(1) NOT NULL,
  `limit_upper_or_equal` tinyint(1) NOT NULL,
  `free_charge_price` tinyint(1) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_delivery_rule`
--

LOCK TABLES `shopping_delivery_rule` WRITE;
/*!40000 ALTER TABLE `shopping_delivery_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_delivery_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_delivery_shop`
--

DROP TABLE IF EXISTS `shopping_delivery_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_delivery_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_delay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `follower_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_width` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `use_handling_charges` tinyint(1) NOT NULL,
  `handling_charges` double NOT NULL,
  `out_of_range_behavior` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_delivery_shop`
--

LOCK TABLES `shopping_delivery_shop` WRITE;
/*!40000 ALTER TABLE `shopping_delivery_shop` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_delivery_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_feature`
--

DROP TABLE IF EXISTS `shopping_feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_feature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_group` int(11) DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_15D3814A49E4ECC` (`feature_group`),
  CONSTRAINT `FK_15D3814A49E4ECC` FOREIGN KEY (`feature_group`) REFERENCES `shopping_feature_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_feature`
--

LOCK TABLES `shopping_feature` WRITE;
/*!40000 ALTER TABLE `shopping_feature` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_feature_group`
--

DROP TABLE IF EXISTS `shopping_feature_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_feature_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `print_type` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_feature_group`
--

LOCK TABLES `shopping_feature_group` WRITE;
/*!40000 ALTER TABLE `shopping_feature_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_feature_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_feature_group_translation`
--

DROP TABLE IF EXISTS `shopping_feature_group_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_feature_group_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shopping_feature_group_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_DF75D29C2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_DF75D29C2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_feature_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_feature_group_translation`
--

LOCK TABLES `shopping_feature_group_translation` WRITE;
/*!40000 ALTER TABLE `shopping_feature_group_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_feature_group_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_order`
--

DROP TABLE IF EXISTS `shopping_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` int(11) DEFAULT NULL,
  `delivery_method` int(11) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `cart` int(11) DEFAULT NULL,
  `debug` tinyint(1) NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_method_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_type` int(11) DEFAULT NULL,
  `delivery_price` double DEFAULT NULL,
  `sub_total_ht` double DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F48BEBC2AEA34913` (`reference`),
  KEY `IDX_F48BEBC27B61A1F6` (`payment_method`),
  KEY `IDX_F48BEBC24048C3EE` (`delivery_method`),
  KEY `IDX_F48BEBC281398E09` (`customer`),
  KEY `IDX_F48BEBC2BA388B7` (`cart`),
  CONSTRAINT `FK_F48BEBC24048C3EE` FOREIGN KEY (`delivery_method`) REFERENCES `shopping_delivery_method` (`id`),
  CONSTRAINT `FK_F48BEBC27B61A1F6` FOREIGN KEY (`payment_method`) REFERENCES `shopping_payment_method` (`id`),
  CONSTRAINT `FK_F48BEBC281398E09` FOREIGN KEY (`customer`) REFERENCES `shopping_customer` (`id`),
  CONSTRAINT `FK_F48BEBC2BA388B7` FOREIGN KEY (`cart`) REFERENCES `shopping_cart` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_order`
--

LOCK TABLES `shopping_order` WRITE;
/*!40000 ALTER TABLE `shopping_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_order_action`
--

DROP TABLE IF EXISTS `shopping_order_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_order_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_object` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_56CC0E816B22BB39` (`order_object`),
  CONSTRAINT `FK_56CC0E816B22BB39` FOREIGN KEY (`order_object`) REFERENCES `shopping_order` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_order_action`
--

LOCK TABLES `shopping_order_action` WRITE;
/*!40000 ALTER TABLE `shopping_order_action` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_order_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_order_address`
--

DROP TABLE IF EXISTS `shopping_order_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_order_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_object` int(11) DEFAULT NULL,
  `address_type` int(11) NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` int(11) NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instruction` longtext COLLATE utf8_unicode_ci,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_89E12EDD6B22BB39` (`order_object`),
  CONSTRAINT `FK_89E12EDD6B22BB39` FOREIGN KEY (`order_object`) REFERENCES `shopping_order` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_order_address`
--

LOCK TABLES `shopping_order_address` WRITE;
/*!40000 ALTER TABLE `shopping_order_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_order_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_order_configuration`
--

DROP TABLE IF EXISTS `shopping_order_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_order_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_order_configuration`
--

LOCK TABLES `shopping_order_configuration` WRITE;
/*!40000 ALTER TABLE `shopping_order_configuration` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_order_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_payment_check`
--

DROP TABLE IF EXISTS `shopping_payment_check`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_payment_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rib_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iban` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other` tinytext COLLATE utf8_unicode_ci,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_payment_check`
--

LOCK TABLES `shopping_payment_check` WRITE;
/*!40000 ALTER TABLE `shopping_payment_check` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_payment_check` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_payment_configuration`
--

DROP TABLE IF EXISTS `shopping_payment_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_payment_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_payment_configuration`
--

LOCK TABLES `shopping_payment_configuration` WRITE;
/*!40000 ALTER TABLE `shopping_payment_configuration` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_payment_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_payment_credit_agricole`
--

DROP TABLE IF EXISTS `shopping_payment_credit_agricole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_payment_credit_agricole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paybox_site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paybox_rang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paybox_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paybox_url_success` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paybox_url_reply_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paybox_url_cancel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paybox_url_fail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paybox_settings_cancel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paybox_key_hmac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_payment_credit_agricole`
--

LOCK TABLES `shopping_payment_credit_agricole` WRITE;
/*!40000 ALTER TABLE `shopping_payment_credit_agricole` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_payment_credit_agricole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_payment_method`
--

DROP TABLE IF EXISTS `shopping_payment_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_entity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_module` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_payment_method`
--

LOCK TABLES `shopping_payment_method` WRITE;
/*!40000 ALTER TABLE `shopping_payment_method` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_payment_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_payment_paypal`
--

DROP TABLE IF EXISTS `shopping_payment_paypal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_payment_paypal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buisness_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buisness_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `webhook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `debug_buisness_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `debug_buisness_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `debug_webhook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_return` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_cancel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_notify` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_payment_paypal`
--

LOCK TABLES `shopping_payment_paypal` WRITE;
/*!40000 ALTER TABLE `shopping_payment_paypal` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_payment_paypal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_payment_wire`
--

DROP TABLE IF EXISTS `shopping_payment_wire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_payment_wire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rib_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iban` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other` tinytext COLLATE utf8_unicode_ci,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_payment_wire`
--

LOCK TABLES `shopping_payment_wire` WRITE;
/*!40000 ALTER TABLE `shopping_payment_wire` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_payment_wire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product`
--

DROP TABLE IF EXISTS `shopping_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tax` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `is_indexable` tinyint(1) NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_ht` double NOT NULL,
  `weight` double NOT NULL,
  `redirect` int(11) NOT NULL,
  `redirect_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `medal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statistic_number_views` int(11) NOT NULL,
  `path_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CDC049DF989D9B62` (`slug`),
  KEY `IDX_CDC049DF8E81BA76` (`tax`),
  CONSTRAINT `FK_CDC049DF8E81BA76` FOREIGN KEY (`tax`) REFERENCES `shopping_tax` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product`
--

LOCK TABLES `shopping_product` WRITE;
/*!40000 ALTER TABLE `shopping_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product_configuration`
--

DROP TABLE IF EXISTS `shopping_product_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product_configuration`
--

LOCK TABLES `shopping_product_configuration` WRITE;
/*!40000 ALTER TABLE `shopping_product_configuration` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product_feature`
--

DROP TABLE IF EXISTS `shopping_product_feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product_feature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `feature_group` int(11) DEFAULT NULL,
  `feature` int(11) DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_655CF2DFD34A04AD` (`product`),
  KEY `IDX_655CF2DFA49E4ECC` (`feature_group`),
  KEY `IDX_655CF2DF1FD77566` (`feature`),
  CONSTRAINT `FK_655CF2DF1FD77566` FOREIGN KEY (`feature`) REFERENCES `shopping_feature` (`id`),
  CONSTRAINT `FK_655CF2DFA49E4ECC` FOREIGN KEY (`feature_group`) REFERENCES `shopping_feature_group` (`id`),
  CONSTRAINT `FK_655CF2DFD34A04AD` FOREIGN KEY (`product`) REFERENCES `shopping_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product_feature`
--

LOCK TABLES `shopping_product_feature` WRITE;
/*!40000 ALTER TABLE `shopping_product_feature` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product_feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product_file`
--

DROP TABLE IF EXISTS `shopping_product_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `document` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D3F88677D34A04AD` (`product`),
  CONSTRAINT `FK_D3F88677D34A04AD` FOREIGN KEY (`product`) REFERENCES `shopping_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product_file`
--

LOCK TABLES `shopping_product_file` WRITE;
/*!40000 ALTER TABLE `shopping_product_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product_file_translation`
--

DROP TABLE IF EXISTS `shopping_product_file_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product_file_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shopping_product_file_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_B43D1A72C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_B43D1A72C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_product_file` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product_file_translation`
--

LOCK TABLES `shopping_product_file_translation` WRITE;
/*!40000 ALTER TABLE `shopping_product_file_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product_file_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product_image`
--

DROP TABLE IF EXISTS `shopping_product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_as_cover` tinyint(1) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_16B49714D34A04AD` (`product`),
  CONSTRAINT `FK_16B49714D34A04AD` FOREIGN KEY (`product`) REFERENCES `shopping_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product_image`
--

LOCK TABLES `shopping_product_image` WRITE;
/*!40000 ALTER TABLE `shopping_product_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product_image_aside`
--

DROP TABLE IF EXISTS `shopping_product_image_aside`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product_image_aside` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9B573C57D34A04AD` (`product`),
  CONSTRAINT `FK_9B573C57D34A04AD` FOREIGN KEY (`product`) REFERENCES `shopping_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product_image_aside`
--

LOCK TABLES `shopping_product_image_aside` WRITE;
/*!40000 ALTER TABLE `shopping_product_image_aside` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product_image_aside` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product_image_aside_translation`
--

DROP TABLE IF EXISTS `shopping_product_image_aside_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product_image_aside_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shopping_product_image_aside_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_934FDC1B2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_934FDC1B2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_product_image_aside` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product_image_aside_translation`
--

LOCK TABLES `shopping_product_image_aside_translation` WRITE;
/*!40000 ALTER TABLE `shopping_product_image_aside_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product_image_aside_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product_image_translation`
--

DROP TABLE IF EXISTS `shopping_product_image_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product_image_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shopping_product_image_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_4D21D57D2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_4D21D57D2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_product_image` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product_image_translation`
--

LOCK TABLES `shopping_product_image_translation` WRITE;
/*!40000 ALTER TABLE `shopping_product_image_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product_image_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product_translation`
--

DROP TABLE IF EXISTS `shopping_product_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_short` longtext COLLATE utf8_unicode_ci,
  `description_long` longtext COLLATE utf8_unicode_ci,
  `description_research` longtext COLLATE utf8_unicode_ci,
  `keywords` longtext COLLATE utf8_unicode_ci,
  `fiche` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci,
  `sn_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sn_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shopping_product_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_58CE90D82C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_58CE90D82C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product_translation`
--

LOCK TABLES `shopping_product_translation` WRITE;
/*!40000 ALTER TABLE `shopping_product_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product_variation`
--

DROP TABLE IF EXISTS `shopping_product_variation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product_variation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `price_ht` double DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_24404A13D34A04AD` (`product`),
  CONSTRAINT `FK_24404A13D34A04AD` FOREIGN KEY (`product`) REFERENCES `shopping_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product_variation`
--

LOCK TABLES `shopping_product_variation` WRITE;
/*!40000 ALTER TABLE `shopping_product_variation` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product_variation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_product_variation_attribute`
--

DROP TABLE IF EXISTS `shopping_product_variation_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_product_variation_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute` int(11) DEFAULT NULL,
  `variation` int(11) DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_22AC22F6FA7AEFFB` (`attribute`),
  KEY `IDX_22AC22F6629B33EA` (`variation`),
  CONSTRAINT `FK_22AC22F6629B33EA` FOREIGN KEY (`variation`) REFERENCES `shopping_product_variation` (`id`),
  CONSTRAINT `FK_22AC22F6FA7AEFFB` FOREIGN KEY (`attribute`) REFERENCES `shopping_attribute` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_product_variation_attribute`
--

LOCK TABLES `shopping_product_variation_attribute` WRITE;
/*!40000 ALTER TABLE `shopping_product_variation_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_product_variation_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_reduction`
--

DROP TABLE IF EXISTS `shopping_reduction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_reduction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` double NOT NULL,
  `type` int(11) NOT NULL,
  `use_timer` tinyint(1) NOT NULL,
  `available_from` datetime DEFAULT NULL,
  `available_to` datetime DEFAULT NULL,
  `starting_at` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_reduction`
--

LOCK TABLES `shopping_reduction` WRITE;
/*!40000 ALTER TABLE `shopping_reduction` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_reduction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_reduction_code`
--

DROP TABLE IF EXISTS `shopping_reduction_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_reduction_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` double NOT NULL,
  `type` int(11) NOT NULL,
  `use_timer` tinyint(1) NOT NULL,
  `available_from` datetime DEFAULT NULL,
  `available_to` datetime DEFAULT NULL,
  `starting_at` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_reduction_code`
--

LOCK TABLES `shopping_reduction_code` WRITE;
/*!40000 ALTER TABLE `shopping_reduction_code` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_reduction_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_reduction_code_translation`
--

DROP TABLE IF EXISTS `shopping_reduction_code_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_reduction_code_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_reduction_code_translation`
--

LOCK TABLES `shopping_reduction_code_translation` WRITE;
/*!40000 ALTER TABLE `shopping_reduction_code_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_reduction_code_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_reduction_translation`
--

DROP TABLE IF EXISTS `shopping_reduction_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_reduction_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shopping_reduction_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_11C6F662C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_11C6F662C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_reduction` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_reduction_translation`
--

LOCK TABLES `shopping_reduction_translation` WRITE;
/*!40000 ALTER TABLE `shopping_reduction_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_reduction_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_research_configuration`
--

DROP TABLE IF EXISTS `shopping_research_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_research_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `use_cache` tinyint(1) NOT NULL,
  `use_suggest` tinyint(1) NOT NULL,
  `by_reference` tinyint(1) NOT NULL,
  `by_designation` tinyint(1) NOT NULL,
  `by_url` tinyint(1) NOT NULL,
  `by_keywords` tinyint(1) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_research_configuration`
--

LOCK TABLES `shopping_research_configuration` WRITE;
/*!40000 ALTER TABLE `shopping_research_configuration` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_research_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_research_keyword`
--

DROP TABLE IF EXISTS `shopping_research_keyword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_research_keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_research_keyword`
--

LOCK TABLES `shopping_research_keyword` WRITE;
/*!40000 ALTER TABLE `shopping_research_keyword` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_research_keyword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_research_keyword_translation`
--

DROP TABLE IF EXISTS `shopping_research_keyword_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_research_keyword_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shopping_research_keyword_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_8A0AF5052C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_8A0AF5052C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `shopping_research_keyword` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_research_keyword_translation`
--

LOCK TABLES `shopping_research_keyword_translation` WRITE;
/*!40000 ALTER TABLE `shopping_research_keyword_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_research_keyword_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_statistic`
--

DROP TABLE IF EXISTS `shopping_statistic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_statistic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_71FF7E4FD34A04AD` (`product`),
  CONSTRAINT `FK_71FF7E4FD34A04AD` FOREIGN KEY (`product`) REFERENCES `shopping_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_statistic`
--

LOCK TABLES `shopping_statistic` WRITE;
/*!40000 ALTER TABLE `shopping_statistic` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_statistic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_tax`
--

DROP TABLE IF EXISTS `shopping_tax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_tax`
--

LOCK TABLES `shopping_tax` WRITE;
/*!40000 ALTER TABLE `shopping_tax` DISABLE KEYS */;
INSERT INTO `shopping_tax` VALUES (1,'TVA FR 20%','20.0',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(2,'TVA FR 10%','10.0',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(3,'TVA FR 5.5%','5.5',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(4,'TVA FR 2.1%','2.1',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `shopping_tax` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_authorization`
--

DROP TABLE IF EXISTS `user_authorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_authorization` (
  `user_id` int(11) NOT NULL,
  `authorization_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`authorization_id`),
  KEY `IDX_94E326BFA76ED395` (`user_id`),
  KEY `IDX_94E326BF2F8B0EB2` (`authorization_id`),
  CONSTRAINT `FK_94E326BF2F8B0EB2` FOREIGN KEY (`authorization_id`) REFERENCES `users_authorizations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_94E326BFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_authorization`
--

LOCK TABLES `user_authorization` WRITE;
/*!40000 ALTER TABLE `user_authorization` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_authorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_authorization_group`
--

DROP TABLE IF EXISTS `users_authorization_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_authorization_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authorization` int(11) DEFAULT NULL,
  `team` int(11) DEFAULT NULL,
  `enable_view` tinyint(1) NOT NULL,
  `enable_add` tinyint(1) NOT NULL,
  `enable_edit` tinyint(1) NOT NULL,
  `enable_delete` tinyint(1) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3468904F7A6D8BEF` (`authorization`),
  KEY `IDX_3468904FC4E0A61F` (`team`),
  CONSTRAINT `FK_3468904F7A6D8BEF` FOREIGN KEY (`authorization`) REFERENCES `users_authorizations` (`id`),
  CONSTRAINT `FK_3468904FC4E0A61F` FOREIGN KEY (`team`) REFERENCES `users_user_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_authorization_group`
--

LOCK TABLES `users_authorization_group` WRITE;
/*!40000 ALTER TABLE `users_authorization_group` DISABLE KEYS */;
INSERT INTO `users_authorization_group` VALUES (1,47,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(2,48,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(3,49,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(4,50,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(5,51,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(6,52,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(7,53,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(8,54,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(9,55,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(10,56,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(11,57,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(12,58,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(13,59,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(14,60,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(15,61,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(16,62,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(17,63,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(18,64,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(19,65,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(20,66,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(21,67,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(22,68,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(23,69,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(24,70,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(25,71,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(26,72,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(27,73,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(28,74,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(29,75,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(30,76,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(31,77,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(32,79,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(33,80,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(34,81,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(35,82,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(36,83,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(37,84,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(38,85,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(39,86,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(40,87,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(41,88,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(42,89,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(43,90,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(44,91,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(45,92,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(46,93,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(47,94,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(48,95,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(49,96,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(50,97,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(51,98,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(52,99,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(53,100,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(54,101,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(55,102,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(56,103,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(57,104,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(58,105,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(59,106,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(60,107,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(61,108,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(62,110,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(63,111,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(64,112,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(65,113,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(66,114,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(67,115,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(68,116,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(69,117,2,1,1,1,1,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(70,45,2,1,0,1,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(71,46,2,1,0,1,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(72,2,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(73,3,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(74,4,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(75,5,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(76,6,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(77,7,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(78,8,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(79,9,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(80,10,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(81,11,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(82,12,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(83,13,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(84,14,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(85,15,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(86,16,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(87,17,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(88,18,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(89,19,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(90,20,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(91,21,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(92,22,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(93,23,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(94,24,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(95,25,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(96,26,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(97,27,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(98,28,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(99,29,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(100,30,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(101,31,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(102,32,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(103,33,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(104,34,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(105,35,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(106,36,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(107,37,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(108,38,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(109,39,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(110,40,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(111,41,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(112,42,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(113,43,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(114,44,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(115,45,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(116,46,4,1,0,0,0,1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `users_authorization_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_authorizations`
--

DROP TABLE IF EXISTS `users_authorizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_authorizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dev_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5579C4DC3D8E604F` (`parent`),
  CONSTRAINT `FK_5579C4DC3D8E604F` FOREIGN KEY (`parent`) REFERENCES `users_authorizations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_authorizations`
--

LOCK TABLES `users_authorizations` WRITE;
/*!40000 ALTER TABLE `users_authorizations` DISABLE KEYS */;
INSERT INTO `users_authorizations` VALUES (1,NULL,'Pages','null',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(2,1,'Page - Accueil','home',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(3,1,'Page - Mini-site','mini',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(4,1,'Page - Actualités','actualites',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(5,1,'Page - Actualité','actualite',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(6,1,'Page - Rechercher','research',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(7,1,'Page - Catégories de produits','category',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(8,1,'Page - Liste de produits','products',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(9,1,'Page - Affichage d\'un produit','product',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(10,1,'Page - Qui sommes nous ?','about',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(11,1,'Page - Contact','contact',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(12,1,'Page - Mentions légales','notice',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(13,1,'Page - Foire aux questions','faq',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(14,1,'Page - Conditions Générales de Ventes','cgv',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(15,1,'Page - Informations de lirvaison','infodelivery',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(16,1,'Page - Informations de paiement','infopayment',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(17,1,'Page - Personnalisée n°1','customone',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(18,1,'Page - Personnalisée n°2','customtwo',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(19,1,'Page - Personnalisée n°3','customthree',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(20,1,'Page - Personnalisée n°4','customfour',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(21,1,'Page - Personnalisée n°5','customfive',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(22,1,'Page - Personnalisée n°6','customsix',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(23,1,'Page - Personnalisée n°7','customseven',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(24,1,'Page - Personnalisée n°8','customeight',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(25,1,'Page - Personnalisée n°9','customnine',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(26,1,'Page - Personnalisée n°10','customten',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(27,1,'Page - Connexion','connect',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(28,1,'Page - Déconnexion','disconnect',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(29,1,'Page - Inscription','register',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(30,1,'Page - Mot de passe oublié','forgotpassword',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(31,1,'Page - Mot de passe oublié - Réinitialisation ','forgotpasswordreset',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(32,1,'Page - Page introuvable','error404',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(33,1,'Page - Erreur détectée','error',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(34,1,'Page - Accès refusé','error403',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(35,1,'Page - Compte','account',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(36,1,'Page - Informations','accountinfo',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(37,1,'Page - Adresses','accountadress',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(38,1,'Page - Historique','accounthistoric',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(39,1,'Page - Newsletter','accountnewsletter',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(40,1,'Page - Historique - Détails','accounthistoricdetails',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(41,1,'Page - Adresses - Formulaire','accountadressform',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(42,1,'Page - Commande','order',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(43,1,'Page - Commande validée','ordervalidated',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(44,1,'Page - Commande refusée','orderfailed',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(45,1,'Page - Coming Soon','comingsoon',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(46,1,'Page - Maintenance','maintenance',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(47,NULL,'Entités','',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(48,NULL,'Entités - Catalogue','entity_orders',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(49,1,'Entités - Catégories','entity_cart',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(50,1,'Entités - Produits','entity_products',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(51,1,'Entités - Produits','entity_categories',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(52,1,'Entités - Produits','entity_monitoring',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(53,1,'Entités - Produits','entity_attributes_features',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(54,1,'Entités - Produits','entity_attributes',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(55,1,'Entités - Produits','entity_features',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(56,1,'Entités - Produits','entity_reductions',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(57,1,'Entités - Produits','entity_stocks',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(58,1,'Entités - Produits','entity_country',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(59,1,'Entités - Produits','entity_zones',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(60,1,'Entités - Produits','entity_taxes',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(61,1,'Entités - Produits','entity_language',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(62,1,'Entités - Produits','entity_translations',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(63,1,'Entités - Produits','entity_user',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(64,1,'Entités - Produits','entity_usergroup',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(65,1,'Entités - Produits','entity_authorization',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(66,1,'Entités - Produits','entity_authorizationgroup',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(67,1,'Entités - Produits','entity_mediafile',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(68,1,'Entités - Produits','entity_mediaimage',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(69,1,'Entités - Produits','entity_mediavideo',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(70,1,'Entités - Produits','entity_actualites',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(71,1,'Entités - Produits','entity_actualite',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(72,1,'Entités - Produits','entity_socialnetwork',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(73,1,'Entités - Produits','entity_text',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(74,1,'Entités - Produits','entity_textgroup',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(75,1,'Entités - Pages','entity_page',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(76,1,'Entités - Pages - Générale','entity_pagegeneral',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(77,1,'Entités - Pages - Accueil','entity_pagehome',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(78,1,'Entités - Pages - Mini-site','entity_pagemini',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(79,1,'Entités - Pages - Actualités','entity_pageactualites',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(80,1,'Entités - Pages - Actualité','entity_pageactualite',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(81,1,'Entités - Pages - Rechercher','entity_pageresearch',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(82,1,'Entités - Pages - Catégories de produits','entity_pagecategory',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(83,1,'Entités - Pages - Liste de produits','entity_pageproducts',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(84,1,'Entités - Pages - Affichage d\'un produit','entity_pageproduct',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(85,1,'Panier','entity_pagecart',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(86,1,'Entités - Pages - Qui sommes nous ?','entity_pageabout',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(87,1,'Entités - Pages - Contact','entity_pagecontact',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(88,1,'Entités - Pages - Mentions légales','entity_pagenotice',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(89,1,'Entités - Pages - Foire aux questions','entity_pagefaq',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(90,1,'Entités - Pages - Conditions Générales de Ventes','entity_pagecgv',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(91,1,'Entités - Pages - Informations de livraison','entity_pageinfodelivery',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(92,1,'Entités - Pages - Informations de paiements','entity_pageinfopayment',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(93,1,'Entités - Pages - Personnalisée n°1','entity_pagecustomone',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(94,1,'Entités - Pages - Personnalisée n°2','entity_pagecustomtwo',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(95,1,'Entités - Pages - Personnalisée n°3','entity_pagecustomthree',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(96,1,'Entités - Pages - Personnalisée n°4','entity_pagecustomfour',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(97,1,'Entités - Pages - Personnalisée n°5','entity_pagecustomfive',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(98,1,'Entités - Pages - Personnalisée n°6','entity_pagecustomsix',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(99,1,'Entités - Pages - Personnalisée n°7','entity_pagecustomseven',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(100,1,'Entités - Pages - Personnalisée n°8','entity_pagecustomeight',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(101,1,'Entités - Pages - Personnalisée n°9','entity_pagecustomnine',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(102,1,'Entités - Pages - Personnalisée n°10','entity_pagecustomten',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(103,1,'Entités - Pages - Connexion','entity_pageconnect',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(104,1,'Entités - Pages - Déconnexion','entity_pageregister',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(105,1,'Entités - Pages - Inscription','entity_pageregister',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(106,1,'Entités - Pages - Mot de passe oublié','entity_pageforgotpassword',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(107,1,'Entités - Pages - Mot de passe oublié - Réinitialisation','entity_pageforgotpasswordreset',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(108,1,'Entités - Pages - Erreur','entity_pageerror',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(109,1,'Entités - Pages - Erreur - 403','entity_pageerror403',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(110,1,'Entités - Pages - Erreur - 404 ','entity_pageerror404',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(111,1,'Entités - Pages - Compte','entity_pageaccount',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(112,1,'Entités - Pages - Compte - Informations','entity_pageaccountinfo',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(113,1,'Entités - Pages - Compte - Adresse','entity_pageaccountadress',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(114,1,'Entités - Pages - Compte - Historique','entity_pageaccounthistoric',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(115,1,'Entités - Pages - Compte - Newsletter','entity_pageaccountnewsletter',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(116,1,'Entités - Pages - Compte - Historique - Détails','entity_pageaccounthistoricdetails',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(117,1,'Entités - Pages - Compte - Adresse - Formulaire','entity_pageaccountadressform',1,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `users_authorizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_user`
--

DROP TABLE IF EXISTS `users_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` int(11) DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgot_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgot_time` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_421A984781398E09` (`customer`),
  CONSTRAINT `FK_421A984781398E09` FOREIGN KEY (`customer`) REFERENCES `shopping_customer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_user`
--

LOCK TABLES `users_user` WRITE;
/*!40000 ALTER TABLE `users_user` DISABLE KEYS */;
INSERT INTO `users_user` VALUES (1,1,'INFLUENCE','DELIT','william@delit.fr','$2y$13$cKpu7em93KXeq189gfGkleckx.WeeMGTNAwxb2xY5uu1QBW2cFcxK',NULL,NULL,1,'a:3:{i:0;s:9:\"ROLE_USER\";i:1;s:10:\"ROLE_ADMIN\";i:2;s:16:\"ROLE_SUPER_ADMIN\";}',0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `users_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_user_collect`
--

DROP TABLE IF EXISTS `users_user_collect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_user_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_user_collect`
--

LOCK TABLES `users_user_collect` WRITE;
/*!40000 ALTER TABLE `users_user_collect` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_user_collect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_user_group`
--

DROP TABLE IF EXISTS `users_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` int(11) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `sortorder` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_user_group`
--

LOCK TABLES `users_user_group` WRITE;
/*!40000 ALTER TABLE `users_user_group` DISABLE KEYS */;
INSERT INTO `users_user_group` VALUES (1,1,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(2,2,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(3,3,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34'),(4,-1,0,0,'2019-10-25 14:35:34','2019-10-25 14:35:34');
/*!40000 ALTER TABLE `users_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_user_group_translation`
--

DROP TABLE IF EXISTS `users_user_group_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_user_group_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `translatable_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_group_translation_unique_translation` (`translatable_id`,`locale`),
  KEY `IDX_3DF3C51F2C2AC5D3` (`translatable_id`),
  CONSTRAINT `FK_3DF3C51F2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `users_user_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_user_group_translation`
--

LOCK TABLES `users_user_group_translation` WRITE;
/*!40000 ALTER TABLE `users_user_group_translation` DISABLE KEYS */;
INSERT INTO `users_user_group_translation` VALUES (1,1,'Super Administrateurs','fr'),(2,2,'Administrateurs','fr'),(3,3,'Membres','fr'),(4,4,'Visiteurs','fr');
/*!40000 ALTER TABLE `users_user_group_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_user_user_group`
--

DROP TABLE IF EXISTS `users_user_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_user_user_group` (
  `usergroup_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`usergroup_id`,`user_id`),
  KEY `IDX_931086EBD2112630` (`usergroup_id`),
  KEY `IDX_931086EBA76ED395` (`user_id`),
  CONSTRAINT `FK_931086EBA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users_user` (`id`),
  CONSTRAINT `FK_931086EBD2112630` FOREIGN KEY (`usergroup_id`) REFERENCES `users_user_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_user_user_group`
--

LOCK TABLES `users_user_user_group` WRITE;
/*!40000 ALTER TABLE `users_user_user_group` DISABLE KEYS */;
INSERT INTO `users_user_user_group` VALUES (1,1),(2,1),(3,1),(4,1);
/*!40000 ALTER TABLE `users_user_user_group` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-12 19:54:31
