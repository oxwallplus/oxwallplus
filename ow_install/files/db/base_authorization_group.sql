--
-- Table structure for table `%%TBL-PREFIX%%base_authorization_group`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_authorization_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_authorization_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `moderated` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_authorization_group`
--

LOCK TABLES `%%TBL-PREFIX%%base_authorization_group` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_group` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_authorization_group` VALUES (3,'rate',0),(6,'base',1),(7,'admin',1);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_group` ENABLE KEYS */;
UNLOCK TABLES;
