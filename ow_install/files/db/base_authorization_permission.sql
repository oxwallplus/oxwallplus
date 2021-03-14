--
-- Table structure for table `%%TBL-PREFIX%%base_authorization_permission`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_authorization_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_authorization_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actionId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `actionId` (`actionId`,`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_authorization_permission`
--

LOCK TABLES `%%TBL-PREFIX%%base_authorization_permission` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_permission` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_authorization_permission` VALUES (42,11,12),(43,11,27),(44,11,28),(45,11,29),(46,11,30),(50,67,12),(51,67,27),(52,67,28),(53,67,29),(54,67,30),(55,171,1),(56,171,12),(57,171,27),(58,171,28),(59,171,29),(60,171,30);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_authorization_permission` ENABLE KEYS */;
UNLOCK TABLES;
