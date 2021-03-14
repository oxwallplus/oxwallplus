--
-- Table structure for table `%%TBL-PREFIX%%base_question_account_type`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_question_account_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_question_account_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `sortOrder` int(11) NOT NULL DEFAULT '0',
  `roleId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`name`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_question_account_type`
--

LOCK TABLES `%%TBL-PREFIX%%base_question_account_type` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question_account_type` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_question_account_type` VALUES (53,'290365aadde35a97f11207ca7e4279cc',0,0);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question_account_type` ENABLE KEYS */;
UNLOCK TABLES;
