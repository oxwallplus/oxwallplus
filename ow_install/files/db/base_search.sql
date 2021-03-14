--
-- Table structure for table `%%TBL-PREFIX%%base_search`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_search`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timeStamp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `timeStamp` (`timeStamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_search`
--

LOCK TABLES `%%TBL-PREFIX%%base_search` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_search` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_search` ENABLE KEYS */;
UNLOCK TABLES;