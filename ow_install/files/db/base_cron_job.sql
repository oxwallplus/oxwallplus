--
-- Table structure for table `%%TBL-PREFIX%%base_cron_job`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_cron_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_cron_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `methodName` varchar(200) NOT NULL DEFAULT '',
  `runStamp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `className` (`methodName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_cron_job`
--

LOCK TABLES `%%TBL-PREFIX%%base_cron_job` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_cron_job` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_cron_job` ENABLE KEYS */;
UNLOCK TABLES;
