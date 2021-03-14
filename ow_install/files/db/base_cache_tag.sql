--
-- Table structure for table `%%TBL-PREFIX%%base_cache_tag`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_cache_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_cache_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL,
  `cacheId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_index` (`tag`),
  KEY `cacheId_index` (`cacheId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_cache_tag`
--

LOCK TABLES `%%TBL-PREFIX%%base_cache_tag` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_cache_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_cache_tag` ENABLE KEYS */;
UNLOCK TABLES;
