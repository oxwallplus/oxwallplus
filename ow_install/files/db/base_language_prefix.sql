--
-- Table structure for table `%%TBL-PREFIX%%base_language_prefix`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_language_prefix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_language_prefix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `prefix` (`prefix`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

