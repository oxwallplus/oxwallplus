--
-- Table structure for table `%%TBL-PREFIX%%base_login_cookie`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_login_cookie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_login_cookie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `cookie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `cookie` (`cookie`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_login_cookie`
--

LOCK TABLES `%%TBL-PREFIX%%base_login_cookie` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_login_cookie` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_login_cookie` ENABLE KEYS */;
UNLOCK TABLES;
