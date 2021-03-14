--
-- Table structure for table `%%TBL-PREFIX%%base_log`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `key` varchar(100) DEFAULT NULL,
  `timeStamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_log`
--

LOCK TABLES `%%TBL-PREFIX%%base_log` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_log` ENABLE KEYS */;
UNLOCK TABLES;
