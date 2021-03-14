--
-- Table structure for table `%%TBL-PREFIX%%base_user_reset_password`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_user_reset_password`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_user_reset_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `code` varchar(150) NOT NULL,
  `expirationTimeStamp` int(11) NOT NULL,
  `updateTimeStamp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_user_reset_password`
--

LOCK TABLES `%%TBL-PREFIX%%base_user_reset_password` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_user_reset_password` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_user_reset_password` ENABLE KEYS */;
UNLOCK TABLES;
