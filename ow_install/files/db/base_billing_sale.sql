--
-- Table structure for table `%%TBL-PREFIX%%base_billing_sale`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_billing_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_billing_sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(32) NOT NULL,
  `pluginKey` varchar(255) DEFAULT NULL,
  `entityKey` varchar(50) NOT NULL,
  `entityId` int(10) DEFAULT NULL,
  `entityDescription` varchar(255) DEFAULT NULL,
  `gatewayId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `transactionUid` varchar(32) DEFAULT NULL,
  `price` float(9,3) NOT NULL,
  `period` int(10) DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `totalAmount` float(9,3) NOT NULL DEFAULT '0.000',
  `currency` varchar(3) NOT NULL,
  `recurring` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('init','prepared','verified','delivered','processing','error') NOT NULL DEFAULT 'init',
  `timeStamp` int(10) NOT NULL DEFAULT '0',
  `extraData` text,
  `periodUnits` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entityKey` (`entityKey`),
  KEY `entityId` (`entityId`),
  KEY `userId` (`userId`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_billing_sale`
--

LOCK TABLES `%%TBL-PREFIX%%base_billing_sale` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_billing_sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_billing_sale` ENABLE KEYS */;
UNLOCK TABLES;