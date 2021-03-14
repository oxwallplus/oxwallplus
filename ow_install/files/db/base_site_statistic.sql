--
-- Table structure for table `%%TBL-PREFIX%%base_site_statistic`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_site_statistic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_site_statistic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entityType` varchar(50) NOT NULL,
  `entityId` int(10) unsigned NOT NULL,
  `entityCount` int(10) unsigned NOT NULL DEFAULT '1',
  `timeStamp` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity` (`entityType`,`timeStamp`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_site_statistic`
--

LOCK TABLES `%%TBL-PREFIX%%base_site_statistic` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_site_statistic` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_site_statistic` VALUES (1,'user_login',1,1,1465382612),(2,'user_login',1,1,1467005184),(3,'user_login',1,1,1468928771);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_site_statistic` ENABLE KEYS */;
UNLOCK TABLES;
