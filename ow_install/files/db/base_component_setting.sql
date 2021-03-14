--
-- Table structure for table `%%TBL-PREFIX%%base_component_setting`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_component_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_component_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `componentPlaceUniqName` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` longtext NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'string',
  PRIMARY KEY (`id`),
  UNIQUE KEY `componentPlaceUniqName` (`componentPlaceUniqName`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=1447 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_component_setting`
--

LOCK TABLES `%%TBL-PREFIX%%base_component_setting` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_setting` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_component_setting` VALUES (775,'admin-4b543d8cdc488','content','Welcome to our new site! Feel free to participate in our community!','string'),(776,'admin-4b543d8cdc488','nl_to_br','0','string'),(777,'admin-4b543d8cdc488','title','Welcome','string'),(778,'admin-4b543d8cdc488','show_title','0','string'),(779,'admin-4b543d8cdc488','icon','ow_ic_warning','string'),(780,'admin-4b543d8cdc488','wrap_in_box','1','string'),(1366,'admin-4b543d8cdc488','freeze','0','string'),(1431,'index-BASE_CMP_JoinNowWidget','freeze','0','string'),(1432,'admin-5295f2e03ec8a','content','Welcome to our community! Here you\'ll find like-minded individuals who are passionate about the same things as you!','string'),(1433,'admin-5295f2e03ec8a','nl_to_br','0','string'),(1434,'admin-5295f2e03ec8a','title','Welcome!','string'),(1435,'admin-5295f2e03ec8a','show_title','1','string'),(1436,'admin-5295f2e03ec8a','wrap_in_box','1','string'),(1437,'admin-5295f2e03ec8a','restrict_view','0','string'),(1438,'admin-5295f2e03ec8a','access_restrictions','[\"1\",\"12\"]','json'),(1439,'admin-5295f2e40db5c','content','Feel free to participate! Take a look around and help yourself.','string'),(1440,'admin-5295f2e40db5c','nl_to_br','0','string'),(1441,'admin-5295f2e40db5c','title','annotation','string'),(1442,'admin-5295f2e40db5c','show_title','0','string'),(1443,'admin-5295f2e40db5c','wrap_in_box','0','string'),(1444,'admin-5295f2e40db5c','restrict_view','0','string'),(1445,'admin-5295f2e40db5c','access_restrictions','[\"1\",\"12\"]','json'),(1446,'mobile.dashboard-BASE_MCMP_UserListWidget','freeze','0','string');
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_setting` ENABLE KEYS */;
UNLOCK TABLES;
