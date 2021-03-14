--
-- Table structure for table `%%TBL-PREFIX%%base_authorization_role`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_authorization_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_authorization_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sortOrder` int(11) NOT NULL,
  `displayLabel` tinyint(1) DEFAULT '0',
  `custom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_authorization_role`
--

LOCK TABLES `%%TBL-PREFIX%%base_authorization_role` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_role` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_authorization_role` VALUES (1,'guest',0,0,NULL),(12,'wqewq',1,0,NULL);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_role` ENABLE KEYS */;
UNLOCK TABLES;
