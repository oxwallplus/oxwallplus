--
-- Table structure for table `%%TBL-PREFIX%%base_comment`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `commentEntityId` int(11) NOT NULL,
  `message` text NOT NULL,
  `createStamp` int(11) NOT NULL,
  `attachment` text,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `commentEntityId` (`commentEntityId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_comment`
--

LOCK TABLES `%%TBL-PREFIX%%base_comment` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_comment` ENABLE KEYS */;
UNLOCK TABLES;
