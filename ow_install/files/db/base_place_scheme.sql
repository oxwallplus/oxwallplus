--
-- Table structure for table `%%TBL-PREFIX%%base_place_scheme`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_place_scheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_place_scheme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placeId` int(11) DEFAULT NULL,
  `schemeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_place_scheme`
--

LOCK TABLES `%%TBL-PREFIX%%base_place_scheme` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_place_scheme` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_place_scheme` VALUES (1,1,5),(2,2,2),(3,3,1),(4,4,1);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_place_scheme` ENABLE KEYS */;
UNLOCK TABLES;
