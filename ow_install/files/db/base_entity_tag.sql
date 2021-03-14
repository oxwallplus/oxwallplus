--
-- Table structure for table `%%TBL-PREFIX%%base_entity_tag`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_entity_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_entity_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entityId` int(10) unsigned NOT NULL,
  `entityType` varchar(255) NOT NULL,
  `tagId` int(10) unsigned NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `entityId` (`entityId`),
  KEY `entityType` (`entityType`),
  KEY `tagId` (`tagId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_entity_tag`
--

LOCK TABLES `%%TBL-PREFIX%%base_entity_tag` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_entity_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_entity_tag` ENABLE KEYS */;
UNLOCK TABLES;
