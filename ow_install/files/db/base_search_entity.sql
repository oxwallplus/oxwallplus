--
-- Table structure for table `%%TBL-PREFIX%%base_search_entity`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_search_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_search_entity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entityType` varchar(50) NOT NULL,
  `entityId` int(10) unsigned NOT NULL,
  `text` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `timeStamp` int(10) unsigned NOT NULL,
  `activated` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `entity` (`entityType`,`entityId`),
  KEY `status` (`status`,`activated`,`timeStamp`),
  FULLTEXT KEY `entityText` (`text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_search_entity`
--

LOCK TABLES `%%TBL-PREFIX%%base_search_entity` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_search_entity` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_search_entity` ENABLE KEYS */;
UNLOCK TABLES;
