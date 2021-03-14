--
-- Table structure for table `%%TBL-PREFIX%%base_place`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `editableByUser` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_place`
--

LOCK TABLES `%%TBL-PREFIX%%base_place` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_place` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_place` VALUES (1,'dashboard',0),(2,'index',0),(3,'profile',0),(5,'mobile.index',0),(6,'mobile.dashboard',0),(7,'admin.dashboard',0);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_place` ENABLE KEYS */;
UNLOCK TABLES;
