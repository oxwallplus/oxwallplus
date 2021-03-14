--
-- Table structure for table `%%TBL-PREFIX%%base_billing_product`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_billing_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_billing_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productKey` varchar(255) NOT NULL,
  `adapterClassName` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `productKey` (`productKey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_billing_product`
--

LOCK TABLES `%%TBL-PREFIX%%base_billing_product` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_billing_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_billing_product` ENABLE KEYS */;
UNLOCK TABLES;