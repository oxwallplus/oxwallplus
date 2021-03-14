--
-- Table structure for table `%%TBL-PREFIX%%base_place_entity_scheme`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_place_entity_scheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_place_entity_scheme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placeId` int(11) DEFAULT NULL,
  `schemeId` int(11) DEFAULT NULL,
  `entityId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`entityId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_place_entity_scheme`
--

LOCK TABLES `%%TBL-PREFIX%%base_place_entity_scheme` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_place_entity_scheme` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_place_entity_scheme` ENABLE KEYS */;
UNLOCK TABLES;
