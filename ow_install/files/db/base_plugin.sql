--
-- Table structure for table `%%TBL-PREFIX%%base_plugin`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_plugin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `module` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `developerKey` varchar(255) DEFAULT NULL,
  `isSystem` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `adminSettingsRoute` varchar(255) DEFAULT NULL,
  `uninstallRoute` varchar(255) DEFAULT NULL,
  `build` int(11) NOT NULL DEFAULT '0',
  `update` tinyint(1) NOT NULL DEFAULT '0',
  `licenseKey` varchar(255) DEFAULT NULL,
  `licenseCheckTimestamp` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`),
  UNIQUE KEY `module` (`module`),
  KEY `licenseCheckTimestamp` (`licenseCheckTimestamp`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_plugin`
--

LOCK TABLES `%%TBL-PREFIX%%base_plugin` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_plugin` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_plugin` VALUES 
(1,'Core','Core Plugin','core','core','',1,1,NULL,NULL,1,0,NULL,NULL),
(2,'Base OW plugin','Description','base','base','',1,1,NULL,NULL,1,0,NULL,NULL),
(3,'Admin Panel','Admin Panel','admin','admin','',1,1,NULL,NULL,1,0,NULL,NULL),
(4,'Performance','Performance Plugin','performance','performance','',1,1,NULL,NULL,1,0,NULL,NULL),
(5,'Localization','Localization Plugin','localization','localization','',1,1,NULL,NULL,1,0,NULL,NULL),
(6,'Security','Security Plugin','security','security','',1,1,NULL,NULL,1,0,NULL,NULL),
(7,'Theme','Theme plugin','theme','theme','',1,1,NULL,NULL,1,0,NULL,NULL);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_plugin` ENABLE KEYS */;
UNLOCK TABLES;
