--
-- Table structure for table `%%TBL-PREFIX%%base_remote_auth`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_remote_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_remote_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `remoteId` varchar(50) NOT NULL,
  `timeStamp` int(11) NOT NULL,
  `custom` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_remote_auth`
--

LOCK TABLES `%%TBL-PREFIX%%base_remote_auth` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_remote_auth` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_remote_auth` ENABLE KEYS */;
UNLOCK TABLES;
