--
-- Table structure for table `%%TBL-PREFIX%%base_file`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `addDatetime` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_file`
--

LOCK TABLES `%%TBL-PREFIX%%base_file` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_file` ENABLE KEYS */;
UNLOCK TABLES;
