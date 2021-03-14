--
-- Table structure for table `%%TBL-PREFIX%%base_geolocation_ip_to_country`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_geolocation_ip_to_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_geolocation_ip_to_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cc2` char(2) NOT NULL,
  `cc3` char(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ipFrom` bigint(20) unsigned DEFAULT NULL,
  `ipTo` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ipRange` (`ipFrom`,`ipTo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_geolocation_ip_to_country`
--

LOCK TABLES `%%TBL-PREFIX%%base_geolocation_ip_to_country` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_geolocation_ip_to_country` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_geolocation_ip_to_country` ENABLE KEYS */;
UNLOCK TABLES;
