--
-- Table structure for table `%%TBL-PREFIX%%base_authorization_action`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_authorization_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_authorization_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `availableForGuest` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groupId` (`groupId`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=216 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_authorization_action`
--

LOCK TABLES `%%TBL-PREFIX%%base_authorization_action` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_action` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_authorization_action` VALUES (11,6,'add_comment',0),(67,6,'search_users',1),(171,6,'view_profile',1);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_action` ENABLE KEYS */;
UNLOCK TABLES;
