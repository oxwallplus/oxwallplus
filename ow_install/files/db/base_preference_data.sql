--
-- Table structure for table `%%TBL-PREFIX%%base_preference_data`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_preference_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_preference_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`,`key`),
  KEY `key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_preference_data`
--

LOCK TABLES `%%TBL-PREFIX%%base_preference_data` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_preference_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_preference_data` ENABLE KEYS */;
UNLOCK TABLES;
