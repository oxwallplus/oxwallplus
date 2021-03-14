--
-- Table structure for table `%%TBL-PREFIX%%base_theme_content`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_theme_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_theme_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `themeId` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `themeId` (`themeId`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_theme_content`
--

LOCK TABLES `%%TBL-PREFIX%%base_theme_content` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme_content` ENABLE KEYS */;
UNLOCK TABLES;
