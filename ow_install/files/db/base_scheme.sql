--
-- Table structure for table `%%TBL-PREFIX%%base_scheme`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_scheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_scheme` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `rightCssClass` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `leftCssClass` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `cssClass` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_scheme`
--

LOCK TABLES `%%TBL-PREFIX%%base_scheme` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_scheme` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_scheme` VALUES (1,'ow_superwide','ow_supernarrow','ow_scheme_enew'),(2,'ow_wide','ow_narrow','ow_scheme_nw'),(3,'ow_column','ow_column','ow_scheme_equal'),(4,'ow_narrow','ow_wide','ow_scheme_wn'),(5,'ow_supernarrow','ow_superwide','ow_scheme_ewen');
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_scheme` ENABLE KEYS */;
UNLOCK TABLES;
