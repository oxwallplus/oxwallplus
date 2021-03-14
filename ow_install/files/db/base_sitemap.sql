--
-- Table structure for table `%%TBL-PREFIX%%base_sitemap`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_sitemap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_sitemap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `entityType` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `entityType` (`entityType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_sitemap`
--

LOCK TABLES `%%TBL-PREFIX%%base_sitemap` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_sitemap` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_sitemap` ENABLE KEYS */;
UNLOCK TABLES;
