--
-- Table structure for table `%%TBL-PREFIX%%base_flag`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_flag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_flag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entityType` varchar(100) NOT NULL,
  `entityId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `timeStamp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entityType` (`entityType`,`entityId`,`userId`),
  KEY `timeStamp` (`timeStamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_flag`
--

LOCK TABLES `%%TBL-PREFIX%%base_flag` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_flag` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_flag` ENABLE KEYS */;
UNLOCK TABLES;
