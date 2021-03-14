--
-- Table structure for table `%%TBL-PREFIX%%base_theme_image`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_theme_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_theme_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `addDatetime` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `dimensions` varchar(20) DEFAULT NULL,
  `filesize` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_theme_image`
--

LOCK TABLES `%%TBL-PREFIX%%base_theme_image` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme_image` ENABLE KEYS */;
UNLOCK TABLES;
