--
-- Table structure for table `%%TBL-PREFIX%%base_document`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `isStatic` tinyint(1) NOT NULL DEFAULT '0',
  `isMobile` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`),
  KEY `uriIndex` (`uri`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_document`
--

LOCK TABLES `%%TBL-PREFIX%%base_document` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_document` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_document` VALUES (3,'admin_pages','ADMIN_Pages','index',NULL,0,0),(23,'page-679283',NULL,NULL,'join',1,0),(39,'page-119658',NULL,NULL,'terms-of-use',1,0),(54,'page_81959573',NULL,NULL,'privacy-policy',1,0),(55,'mobile_page_14788567',NULL,NULL,'terms-of-use',1,1);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_document` ENABLE KEYS */;
UNLOCK TABLES;
