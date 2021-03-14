--
-- Table structure for table `%%TBL-PREFIX%%base_component_entity_setting`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_component_entity_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_component_entity_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entityId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `value` longtext NOT NULL,
  `componentPlaceUniqName` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'string',
  PRIMARY KEY (`id`),
  UNIQUE KEY `componentUniqName` (`entityId`,`componentPlaceUniqName`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_component_entity_setting`
--

LOCK TABLES `%%TBL-PREFIX%%base_component_entity_setting` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_entity_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_entity_setting` ENABLE KEYS */;
UNLOCK TABLES;
