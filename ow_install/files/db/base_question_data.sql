--
-- Table structure for table `%%TBL-PREFIX%%base_question_data`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_question_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_question_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionName` varchar(255) NOT NULL DEFAULT '',
  `userId` int(11) NOT NULL DEFAULT '0',
  `textValue` text NOT NULL,
  `intValue` int(11) NOT NULL DEFAULT '0',
  `dateValue` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`,`questionName`),
  KEY `fieldName` (`questionName`),
  KEY `intValue` (`intValue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_question_data`
--

LOCK TABLES `%%TBL-PREFIX%%base_question_data` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question_data` ENABLE KEYS */;
UNLOCK TABLES;
