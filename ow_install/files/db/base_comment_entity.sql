--
-- Table structure for table `%%TBL-PREFIX%%base_comment_entity`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_comment_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_comment_entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entityType` varchar(255) NOT NULL,
  `entityId` int(11) NOT NULL,
  `pluginKey` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `entityType` (`entityType`,`entityId`),
  KEY `pluginKey` (`pluginKey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_comment_entity`
--

LOCK TABLES `%%TBL-PREFIX%%base_comment_entity` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_comment_entity` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_comment_entity` ENABLE KEYS */;
UNLOCK TABLES;
