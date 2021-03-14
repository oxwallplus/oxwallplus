--
-- Table structure for table `%%TBL-PREFIX%%base_language_key`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_language_key`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_language_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefixId` int(11) NOT NULL DEFAULT '0',
  `key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `prefix_key` (`prefixId`,`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
