--
-- Table structure for table `%%TBL-PREFIX%%base_question_config`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_question_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_question_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionPresentation` enum('text','textarea','select','date','location','checkbox','multicheckbox','radio','url','password','age','birthdate') NOT NULL DEFAULT 'text',
  `name` varchar(255) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `presentationClass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_question_config`
--

LOCK TABLES `%%TBL-PREFIX%%base_question_config` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question_config` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_question_config` VALUES 
(1,'date','year_range','','ELEMENT_RangeYear'),
(2,'age','year_range','','ELEMENT_RangeYear'),
(3,'birthdate','year_range','','ELEMENT_RangeYear');
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_question_config` ENABLE KEYS */;
UNLOCK TABLES;
