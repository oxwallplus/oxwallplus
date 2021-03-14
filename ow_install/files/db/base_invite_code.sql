--
-- Table structure for table `%%TBL-PREFIX%%base_invite_code`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_invite_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_invite_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `expiration_stamp` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_invite_code`
--

LOCK TABLES `%%TBL-PREFIX%%base_invite_code` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_invite_code` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_invite_code` ENABLE KEYS */;
UNLOCK TABLES;
