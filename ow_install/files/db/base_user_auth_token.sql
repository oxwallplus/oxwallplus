--
-- Table structure for table `%%TBL-PREFIX%%base_user_auth_token`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_user_auth_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_user_auth_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `timeStamp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`,`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_user_auth_token`
--

LOCK TABLES `%%TBL-PREFIX%%base_user_auth_token` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_user_auth_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_user_auth_token` ENABLE KEYS */;
UNLOCK TABLES;
