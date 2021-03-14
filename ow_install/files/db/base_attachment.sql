--
-- Table structure for table `%%TBL-PREFIX%%base_attachment`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `addStamp` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `fileName` varchar(100) DEFAULT NULL,
  `origFileName` varchar(100) DEFAULT NULL,
  `size` int(11) NOT NULL DEFAULT '0',
  `bundle` varchar(128) DEFAULT NULL,
  `pluginKey` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `bundle` (`bundle`),
  KEY `pluginKey` (`pluginKey`),
  KEY `userId_2` (`userId`),
  KEY `bundle_2` (`bundle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_attachment`
--

LOCK TABLES `%%TBL-PREFIX%%base_attachment` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_attachment` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_attachment` ENABLE KEYS */;
UNLOCK TABLES;