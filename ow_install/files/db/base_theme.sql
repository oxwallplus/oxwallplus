--
-- Table structure for table `%%TBL-PREFIX%%base_theme`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `developerKey` varchar(255) DEFAULT NULL,
  `build` int(11) NOT NULL DEFAULT '0',
  `update` tinyint(4) NOT NULL DEFAULT '0',
  `licenseKey` varchar(255) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `customCss` text,
  `mobileCustomCss` text,
  `customCssFileName` varchar(255) DEFAULT NULL,
  `sidebarPosition` enum('left','right','none') NOT NULL,
  `licenseCheckTimestamp` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`key`),
  KEY `licenseCheckTimestamp` (`licenseCheckTimestamp`)
) ENGINE=MyISAM AUTO_INCREMENT=957 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_theme`
--

LOCK TABLES `%%TBL-PREFIX%%base_theme` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_theme` VALUES (953,'e547ebcf734341ec11911209d93a1054',10210,1,NULL,'crayon','Сrayon','{\"name\":\"\\u0421rayon\",\"key\":\"crayon\",\"version\":\"1.0\",\"compatibility\":\"1.5 and higher\",\"description\":\"The \\u0421rayon theme with sidebar\",\"author\":\"Oxwall Foundation\",\"authorEmail\":\"themes@oxwall.org\",\"authorUrl\":\"http:\\/\\/www.oxwall.org\\/foundation\",\"developerKey\":\"e547ebcf734341ec11911209d93a1054\",\"build\":10210,\"copyright\":\"(C) 2012 Oxwall Foundation. All rights reserved.\",\"license\":\"The BSD License\",\"licenseUrl\":\"http:\\/\\/www.opensource.org\\/licenses\\/bsd-license.php\",\"sidebarPosition\":\"right\"}',NULL,NULL,NULL,'right',NULL),(954,'e547ebcf734341ec11911209d93a1054',10210,1,NULL,'darklets','Darklets','{\"name\":\"Darklets\",\"key\":\"darklets\",\"version\":\"1.0\",\"compatibility\":\"1.5 and higher\",\"description\":\"The Darklets theme with sidebar\",\"author\":\"Oxwall Foundation\",\"authorEmail\":\"themes@oxwall.org\",\"authorUrl\":\"http:\\/\\/www.oxwall.org\\/foundation\",\"developerKey\":\"e547ebcf734341ec11911209d93a1054\",\"build\":10210,\"copyright\":\"(C) 2012 Oxwall Foundation. All rights reserved.\",\"license\":\"The BSD License\",\"licenseUrl\":\"http:\\/\\/www.opensource.org\\/licenses\\/bsd-license.php\",\"sidebarPosition\":\"right\"}',NULL,NULL,NULL,'right',NULL),(955,'e547ebcf734341ec11911209d93a1054',10210,1,NULL,'showcase','ShowCase','{\"name\":\"ShowCase\",\"key\":\"showcase\",\"version\":\"1.0\",\"compatibility\":\"1.5 and higher\",\"description\":\"The Show Case theme\",\"author\":\"Oxwall Foundation\",\"authorEmail\":\"themes@oxwall.org\",\"authorUrl\":\"http:\\/\\/www.oxwall.org\\/foundation\",\"developerKey\":\"e547ebcf734341ec11911209d93a1054\",\"build\":10210,\"copyright\":\"(C) 2012 Oxwall Foundation. All rights reserved.\",\"license\":\"The BSD License\",\"licenseUrl\":\"http:\\/\\/www.opensource.org\\/licenses\\/bsd-license.php\",\"sidebarPosition\":\"none\"}',NULL,NULL,NULL,'none',NULL),(956,'e547ebcf734341ec11911209d93a1054',10400,1,NULL,'simplicity','Simplicity','{\"name\":\"Simplicity\",\"key\":\"simplicity\",\"version\":\"1.0\",\"compatibility\":\"1.7 and higher\",\"description\":\"The Simplicity theme\",\"author\":\"Oxwall Foundation\",\"authorEmail\":\"themes@oxwall.org\",\"authorUrl\":\"http:\\/\\/www.oxwall.org\\/foundation\",\"developerKey\":\"e547ebcf734341ec11911209d93a1054\",\"build\":10400,\"copyright\":\"(C) 2012 Oxwall Foundation. All rights reserved.\",\"license\":\"The BSD License\",\"licenseUrl\":\"http:\\/\\/www.opensource.org\\/licenses\\/bsd-license.php\",\"sidebarPosition\":\"none\"}',NULL,NULL,NULL,'none',NULL);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_theme` ENABLE KEYS */;
UNLOCK TABLES;
