--
-- Table structure for table `%%TBL-PREFIX%%base_billing_gateway_product`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_billing_gateway_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_billing_gateway_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gatewayId` int(10) NOT NULL,
  `pluginKey` varchar(255) NOT NULL,
  `entityType` varchar(50) NOT NULL,
  `entityId` int(10) NOT NULL,
  `productId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_billing_gateway_product`
--

LOCK TABLES `%%TBL-PREFIX%%base_billing_gateway_product` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_billing_gateway_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_billing_gateway_product` ENABLE KEYS */;
UNLOCK TABLES;
