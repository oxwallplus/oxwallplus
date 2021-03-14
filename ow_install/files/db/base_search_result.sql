--
-- Table structure for table `%%TBL-PREFIX%%base_search_result`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_search_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_search_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `searchId` int(11) NOT NULL DEFAULT '0',
  `userId` int(11) NOT NULL,
  `sortOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `searchResult` (`searchId`,`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_search_result`
--

LOCK TABLES `%%TBL-PREFIX%%base_search_result` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_search_result` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_search_result` ENABLE KEYS */;
UNLOCK TABLES;
