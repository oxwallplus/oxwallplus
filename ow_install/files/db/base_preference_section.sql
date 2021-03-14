--
-- Table structure for table `%%TBL-PREFIX%%base_preference_section`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_preference_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_preference_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sortOrder` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_preference_section`
--

LOCK TABLES `%%TBL-PREFIX%%base_preference_section` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_preference_section` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_preference_section` VALUES (1,'general',1);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_preference_section` ENABLE KEYS */;
UNLOCK TABLES;
