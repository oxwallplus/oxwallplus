--
-- Table structure for table `%%TBL-PREFIX%%base_cache`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expireStamp` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_cache`
--

LOCK TABLES `%%TBL-PREFIX%%base_cache` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_cache` ENABLE KEYS */;
UNLOCK TABLES;
