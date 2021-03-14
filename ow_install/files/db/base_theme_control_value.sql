--
-- Table structure for table `%%TBL-PREFIX%%base_theme_control_value`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_theme_control_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_theme_control_value` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `themeControlKey` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `themeId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `themeControlKey` (`themeControlKey`,`themeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_theme_control_value`
--

LOCK TABLES `%%TBL-PREFIX%%base_theme_control_value` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme_control_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme_control_value` ENABLE KEYS */;
UNLOCK TABLES;
