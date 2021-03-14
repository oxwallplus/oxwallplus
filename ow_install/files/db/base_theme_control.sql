--
-- Table structure for table `%%TBL-PREFIX%%base_theme_control`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_theme_control`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_theme_control` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attribute` varchar(255) NOT NULL,
  `selector` text NOT NULL,
  `defaultValue` text NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'text',
  `themeId` int(10) unsigned NOT NULL,
  `key` varchar(255) NOT NULL DEFAULT '',
  `section` text NOT NULL,
  `label` text NOT NULL,
  `description` text,
  `mobile` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`key`),
  KEY `themeId` (`themeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_theme_control`
--

LOCK TABLES `%%TBL-PREFIX%%base_theme_control` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme_control` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme_control` ENABLE KEYS */;
UNLOCK TABLES;