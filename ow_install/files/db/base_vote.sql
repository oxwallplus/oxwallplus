--
-- Table structure for table `%%TBL-PREFIX%%base_vote`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_vote` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) unsigned NOT NULL,
  `entityId` int(11) unsigned NOT NULL,
  `entityType` varchar(255) NOT NULL,
  `vote` tinyint(4) NOT NULL,
  `timeStamp` int(11) unsigned NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `entityId` (`entityId`),
  KEY `entityType` (`entityType`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_vote`
--

LOCK TABLES `%%TBL-PREFIX%%base_vote` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_vote` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_vote` ENABLE KEYS */;
UNLOCK TABLES;