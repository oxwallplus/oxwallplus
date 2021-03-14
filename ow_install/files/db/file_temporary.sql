--
-- Table structure for table `%%TBL-PREFIX%%file_temporary`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%file_temporary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%file_temporary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `addDatetime` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%file_temporary`
--

LOCK TABLES `%%TBL-PREFIX%%file_temporary` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%file_temporary` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%file_temporary` ENABLE KEYS */;
UNLOCK TABLES;