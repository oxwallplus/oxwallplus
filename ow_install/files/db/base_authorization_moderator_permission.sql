--
-- Table structure for table `%%TBL-PREFIX%%base_authorization_moderator_permission`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_authorization_moderator_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_authorization_moderator_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moderatorId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `moderatorId` (`moderatorId`),
  KEY `groupId` (`groupId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_authorization_moderator_permission`
--

LOCK TABLES `%%TBL-PREFIX%%base_authorization_moderator_permission` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_moderator_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_moderator_permission` ENABLE KEYS */;
UNLOCK TABLES;
