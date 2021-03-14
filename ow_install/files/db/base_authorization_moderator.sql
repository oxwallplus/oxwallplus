--
-- Table structure for table `%%TBL-PREFIX%%base_authorization_moderator`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_authorization_moderator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_authorization_moderator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_authorization_moderator`
--

LOCK TABLES `%%TBL-PREFIX%%base_authorization_moderator` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_moderator` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_moderator` ENABLE KEYS */;
UNLOCK TABLES;
