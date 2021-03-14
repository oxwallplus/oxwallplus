--
-- Table structure for table `%%TBL-PREFIX%%base_component_entity_place`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_component_entity_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_component_entity_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `componentId` int(11) NOT NULL,
  `placeId` int(11) NOT NULL,
  `clone` tinyint(4) NOT NULL DEFAULT '0',
  `entityId` int(11) NOT NULL,
  `uniqName` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`entityId`,`uniqName`),
  KEY `componentId` (`componentId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_component_entity_place`
--

LOCK TABLES `%%TBL-PREFIX%%base_component_entity_place` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_entity_place` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_entity_place` ENABLE KEYS */;
UNLOCK TABLES;
