--
-- Table structure for table `%%TBL-PREFIX%%base_billing_gateway_config`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_billing_gateway_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_billing_gateway_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gatewayId` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_billing_gateway_config`
--

LOCK TABLES `%%TBL-PREFIX%%base_billing_gateway_config` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_billing_gateway_config` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_billing_gateway_config` ENABLE KEYS */;
UNLOCK TABLES;
