--
-- Table structure for table `%%TBL-PREFIX%%base_question`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `sectionName` varchar(32) DEFAULT NULL,
  `accountTypeName` varchar(32) DEFAULT NULL,
  `type` enum('text','select','datetime','boolean','multiselect','fselect') DEFAULT NULL,
  `presentation` enum('text','textarea','select','date','location','checkbox','multicheckbox','radio','url','password','age','birthdate','range','fselect') DEFAULT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `onJoin` tinyint(1) NOT NULL DEFAULT '0',
  `onEdit` tinyint(1) NOT NULL DEFAULT '0',
  `onSearch` tinyint(1) NOT NULL DEFAULT '0',
  `onView` tinyint(1) NOT NULL DEFAULT '0',
  `base` tinyint(1) NOT NULL DEFAULT '0',
  `removable` tinyint(1) NOT NULL DEFAULT '1',
  `columnCount` int(11) NOT NULL DEFAULT '1',
  `sortOrder` int(11) NOT NULL DEFAULT '0',
  `custom` varchar(2048) DEFAULT '',
  `parent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `sectionId` (`sectionName`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_question`
--

LOCK TABLES `%%TBL-PREFIX%%base_question` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_question` VALUES (112,'relationship','f90cde5913235d172603cc4e7b9726e3',NULL,'multiselect','multicheckbox',0,1,1,1,1,0,1,1,7,'[]',NULL),(84,'9221d78a4201eac23c972e1d4aa2cee6','47f3a94e6cfe733857b31116ce21c337',NULL,'text','textarea',0,1,1,1,1,0,1,0,0,'[]',NULL),(83,'c441a8a9b955647cdf4c81562d39068a','47f3a94e6cfe733857b31116ce21c337',NULL,'text','textarea',0,1,1,1,1,0,1,0,1,'[]',NULL),(81,'password','f90cde5913235d172603cc4e7b9726e3',NULL,'text','password',1,1,0,0,0,1,0,1,2,'[]',NULL),(104,'realname','f90cde5913235d172603cc4e7b9726e3',NULL,'text','text',1,1,1,0,1,0,0,0,3,'[]',NULL),(94,'sex','f90cde5913235d172603cc4e7b9726e3',NULL,'select','radio',1,1,1,1,1,0,0,1,4,'[]',NULL),(82,'email','f90cde5913235d172603cc4e7b9726e3',NULL,'text','text',1,1,1,0,0,1,0,1,1,'[]',NULL),(111,'match_sex','f90cde5913235d172603cc4e7b9726e3',NULL,'multiselect','multicheckbox',0,1,1,0,1,0,1,1,6,'[]',NULL),(92,'birthdate','f90cde5913235d172603cc4e7b9726e3',NULL,'datetime','birthdate',1,1,1,0,0,0,0,0,5,'{\"year_range\":{\"from\":1930,\"to\":1992}}',NULL),(80,'username','f90cde5913235d172603cc4e7b9726e3',NULL,'text','text',1,1,1,0,0,1,0,1,0,'[]',NULL),(119,'joinStamp','f90cde5913235d172603cc4e7b9726e3',NULL,'select','date',0,0,0,0,1,1,0,0,8,'{\"year_range\":{\"from\":1930,\"to\":1975}}',NULL);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question` ENABLE KEYS */;
UNLOCK TABLES;
