--
-- Table structure for table `%%TBL-PREFIX%%base_user_featured`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_user_featured`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_user_featured` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 MIN_ROWS=20;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_user_featured`
--

LOCK TABLES `%%TBL-PREFIX%%base_user_featured` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_user_featured` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_user_featured` ENABLE KEYS */;
UNLOCK TABLES;
