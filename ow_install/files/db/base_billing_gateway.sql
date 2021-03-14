--
-- Table structure for table `%%TBL-PREFIX%%base_billing_gateway`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_billing_gateway`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_billing_gateway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gatewayKey` varchar(50) NOT NULL,
  `adapterClassName` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `mobile` tinyint(1) NOT NULL DEFAULT '0',
  `recurring` tinyint(1) NOT NULL DEFAULT '0',
  `dynamic` tinyint(1) DEFAULT '1',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `currencies` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gatewayKey` (`gatewayKey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_billing_gateway`
--

LOCK TABLES `%%TBL-PREFIX%%base_billing_gateway` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_billing_gateway` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_billing_gateway` ENABLE KEYS */;
UNLOCK TABLES;
