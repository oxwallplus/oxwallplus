--
-- Table structure for table `%%TBL-PREFIX%%base_authorization_user_role`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_authorization_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_authorization_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user2role` (`userId`,`roleId`),
  KEY `userId` (`userId`),
  KEY `roleId` (`roleId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_authorization_user_role`
--

LOCK TABLES `%%TBL-PREFIX%%base_authorization_user_role` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_user_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_user_role` ENABLE KEYS */;
UNLOCK TABLES;
