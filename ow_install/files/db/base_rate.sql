--
-- Table structure for table `%%TBL-PREFIX%%base_rate`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_rate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entityType` varchar(255) NOT NULL,
  `entityId` int(10) unsigned NOT NULL,
  `userId` int(10) unsigned NOT NULL,
  `score` int(10) unsigned NOT NULL,
  `timeStamp` int(10) unsigned NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `entityType` (`entityType`),
  KEY `entityId` (`entityId`),
  KEY `userId` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_rate`
--

LOCK TABLES `%%TBL-PREFIX%%base_rate` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_rate` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_rate` ENABLE KEYS */;
UNLOCK TABLES;
