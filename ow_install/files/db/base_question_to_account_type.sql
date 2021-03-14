--
-- Table structure for table `%%TBL-PREFIX%%base_question_to_account_type`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_question_to_account_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_question_to_account_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountType` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `questionName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_question_to_account_type`
--

LOCK TABLES `%%TBL-PREFIX%%base_question_to_account_type` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question_to_account_type` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_question_to_account_type` VALUES (12,'290365aadde35a97f11207ca7e4279cc','relationship'),(2,'290365aadde35a97f11207ca7e4279cc','9221d78a4201eac23c972e1d4aa2cee6'),(3,'290365aadde35a97f11207ca7e4279cc','c441a8a9b955647cdf4c81562d39068a'),(4,'290365aadde35a97f11207ca7e4279cc','password'),(5,'290365aadde35a97f11207ca7e4279cc','realname'),(6,'290365aadde35a97f11207ca7e4279cc','sex'),(7,'290365aadde35a97f11207ca7e4279cc','email'),(8,'290365aadde35a97f11207ca7e4279cc','match_sex'),(9,'290365aadde35a97f11207ca7e4279cc','birthdate'),(10,'290365aadde35a97f11207ca7e4279cc','username'),(11,'290365aadde35a97f11207ca7e4279cc','joinStamp'),(13,'290365aadde35a97f11207ca7e4279cc','relationship'),(14,'290365aadde35a97f11207ca7e4279cc','9221d78a4201eac23c972e1d4aa2cee6'),(15,'290365aadde35a97f11207ca7e4279cc','c441a8a9b955647cdf4c81562d39068a'),(16,'290365aadde35a97f11207ca7e4279cc','password'),(17,'290365aadde35a97f11207ca7e4279cc','realname'),(18,'290365aadde35a97f11207ca7e4279cc','sex'),(19,'290365aadde35a97f11207ca7e4279cc','email'),(20,'290365aadde35a97f11207ca7e4279cc','match_sex'),(21,'290365aadde35a97f11207ca7e4279cc','birthdate'),(22,'290365aadde35a97f11207ca7e4279cc','username'),(23,'290365aadde35a97f11207ca7e4279cc','joinStamp');
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question_to_account_type` ENABLE KEYS */;
UNLOCK TABLES;
