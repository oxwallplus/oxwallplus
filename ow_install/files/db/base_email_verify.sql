--
-- Table structure for table `%%TBL-PREFIX%%base_email_verify`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_email_verify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_email_verify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(10) NOT NULL DEFAULT '0',
  `type` enum('user','site') NOT NULL,
  `email` varchar(128) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `createStamp` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_email_verify`
--

LOCK TABLES `%%TBL-PREFIX%%base_email_verify` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_email_verify` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_email_verify` ENABLE KEYS */;
UNLOCK TABLES;
