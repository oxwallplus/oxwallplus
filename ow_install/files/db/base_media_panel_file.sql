--
-- Table structure for table `%%TBL-PREFIX%%base_media_panel_file`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_media_panel_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_media_panel_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `data` text NOT NULL,
  `stamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_media_panel_file`
--

LOCK TABLES `%%TBL-PREFIX%%base_media_panel_file` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_media_panel_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_media_panel_file` ENABLE KEYS */;
UNLOCK TABLES;
