--
-- Table structure for table `%%TBL-PREFIX%%base_language`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(32) NOT NULL,
  `label` varchar(32) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `status` enum('active','inactive') DEFAULT 'inactive',
  `rtl` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

