--
-- Table structure for table `%%TBL-PREFIX%%base_invitation`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_invitation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_invitation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entityType` varchar(255) NOT NULL,
  `entityId` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `pluginKey` varchar(255) NOT NULL,
  `timeStamp` int(11) NOT NULL,
  `viewed` int(11) NOT NULL,
  `sent` tinyint(4) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `data` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entityType` (`entityType`,`entityId`,`userId`),
  KEY `timeStamp` (`timeStamp`),
  KEY `userId` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_invitation`
--

LOCK TABLES `%%TBL-PREFIX%%base_invitation` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_invitation` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_invitation` ENABLE KEYS */;
UNLOCK TABLES;
