--
-- Table structure for table `%%TBL-PREFIX%%base_user_disapprove`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_user_disapprove`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_user_disapprove` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_user_disapprove`
--

LOCK TABLES `%%TBL-PREFIX%%base_user_disapprove` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_user_disapprove` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_user_disapprove` ENABLE KEYS */;
UNLOCK TABLES;
