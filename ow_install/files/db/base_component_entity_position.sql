--
-- Table structure for table `%%TBL-PREFIX%%base_component_entity_position`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_component_entity_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_component_entity_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `componentPlaceUniqName` varchar(50) NOT NULL,
  `section` enum('top','left','bottom','right') NOT NULL,
  `order` int(11) NOT NULL,
  `entityId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`entityId`,`componentPlaceUniqName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_component_entity_position`
--

LOCK TABLES `%%TBL-PREFIX%%base_component_entity_position` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_entity_position` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_entity_position` ENABLE KEYS */;
UNLOCK TABLES;
