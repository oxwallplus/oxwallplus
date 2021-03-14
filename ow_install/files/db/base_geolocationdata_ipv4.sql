--
-- Table structure for table `%%TBL-PREFIX%%base_geolocationdata_ipv4`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_geolocationdata_ipv4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_geolocationdata_ipv4` (
  `ipFrom` varchar(200) NOT NULL,
  `IpTo` varchar(200) DEFAULT NULL,
  `cc2` varchar(200) NOT NULL,
  `cc3` varchar(200) DEFAULT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_geolocationdata_ipv4`
--

LOCK TABLES `%%TBL-PREFIX%%base_geolocationdata_ipv4` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_geolocationdata_ipv4` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_geolocationdata_ipv4` ENABLE KEYS */;
UNLOCK TABLES;
