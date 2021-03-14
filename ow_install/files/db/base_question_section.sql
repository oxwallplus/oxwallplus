--
-- Table structure for table `%%TBL-PREFIX%%base_question_section`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_question_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_question_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `sortOrder` int(11) NOT NULL DEFAULT '1',
  `isHidden` int(11) NOT NULL DEFAULT '0',
  `isDeletable` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sectionName` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_question_section`
--

LOCK TABLES `%%TBL-PREFIX%%base_question_section` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question_section` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_question_section` VALUES (20,'47f3a94e6cfe733857b31116ce21c337',1,0,1),(34,'f90cde5913235d172603cc4e7b9726e3',0,0,0);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question_section` ENABLE KEYS */;
UNLOCK TABLES;