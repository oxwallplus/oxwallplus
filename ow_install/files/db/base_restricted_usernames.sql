--
-- Table structure for table `%%TBL-PREFIX%%base_restricted_usernames`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_restricted_usernames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_restricted_usernames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_restricted_usernames`
--

LOCK TABLES `%%TBL-PREFIX%%base_restricted_usernames` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_restricted_usernames` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_restricted_usernames` ENABLE KEYS */;
UNLOCK TABLES;
