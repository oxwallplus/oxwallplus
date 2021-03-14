--
-- Table structure for table `%%TBL-PREFIX%%base_theme_master_page`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_theme_master_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_theme_master_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `themeId` int(11) NOT NULL,
  `documentKey` varchar(255) NOT NULL,
  `masterPage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `themeId` (`themeId`),
  KEY `documentKey` (`documentKey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_theme_master_page`
--

LOCK TABLES `%%TBL-PREFIX%%base_theme_master_page` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme_master_page` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme_master_page` ENABLE KEYS */;
UNLOCK TABLES;
