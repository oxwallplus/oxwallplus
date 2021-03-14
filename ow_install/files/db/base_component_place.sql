--
-- Table structure for table `%%TBL-PREFIX%%base_component_place`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_component_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_component_place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `componentId` int(11) NOT NULL,
  `placeId` int(11) NOT NULL,
  `clone` tinyint(1) unsigned DEFAULT '0',
  `uniqName` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqName` (`uniqName`),
  KEY `componentId` (`componentId`)
) ENGINE=MyISAM AUTO_INCREMENT=100836 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_component_place`
--

LOCK TABLES `%%TBL-PREFIX%%base_component_place` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_place` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_component_place` VALUES (328,69,3,0,'profile-BASE_CMP_RssWidget'),(317,69,2,0,'index-BASE_CMP_RssWidget'),(327,69,1,0,'dashboard-BASE_CMP_RssWidget'),(324,67,2,0,'index-BASE_CMP_JoinNowWidget'),(325,68,3,0,'profile-BASE_CMP_UserViewWidget'),(323,66,3,0,'profile-BASE_CMP_ProfileWallWidget'),(329,70,3,0,'profile-BASE_CMP_AboutMeWidget'),(322,65,3,0,'profile-BASE_CMP_UserAvatarWidget'),(321,64,2,0,'index-BASE_CMP_IndexWallWidget'),(318,62,1,0,'dashboard-BASE_CMP_CustomHtmlWidget'),(319,62,3,0,'profile-BASE_CMP_CustomHtmlWidget'),(320,63,2,0,'index-BASE_CMP_UserListWidget'),(326,62,2,0,'index-BASE_CMP_CustomHtmlWidget'),(316,61,2,0,'index-BASE_CMP_AddNewContent'),(100001,62,2,1,'admin-4b543d8cdc488'),(100790,766,1,0,'dashboard-BASE_CMP_WelcomeWidget'),(100152,207,2,0,'index-BASE_CMP_MyAvatarWidget'),(100775,761,1,0,'dashboard-BASE_CMP_QuickLinksWidget'),(100776,762,6,0,'mobile.dashboard-BASE_MCMP_CustomHtmlWidget'),(100777,762,5,0,'mobile.index-BASE_MCMP_CustomHtmlWidget'),(100778,763,6,0,'mobile.dashboard-BASE_MCMP_RssWidget'),(100779,763,5,0,'mobile.index-BASE_MCMP_RssWidget'),(100780,764,6,0,'mobile.dashboard-BASE_MCMP_UserListWidget'),(100781,764,5,0,'mobile.index-BASE_MCMP_UserListWidget'),(100787,762,5,1,'admin-5295f2e03ec8a'),(100788,762,5,1,'admin-5295f2e40db5c'),(100789,765,1,0,'dashboard-BASE_CMP_ModerationToolsWidget'),(100791,767,5,0,'mobile.index-BASE_MCMP_JoinNowWidget'),(100792,62,7,0,'admin.dashboard-BASE_CMP_CustomHtmlWidget'),(100793,69,7,0,'admin.dashboard-BASE_CMP_RssWidget'),(100794,768,7,0,'admin.dashboard-ADMIN_CMP_FinanceStatisticWidget'),(100795,769,7,0,'admin.dashboard-ADMIN_CMP_UserStatisticWidget'),(100796,770,7,0,'admin.dashboard-ADMIN_CMP_ContentStatisticWidget');
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_place` ENABLE KEYS */;
UNLOCK TABLES;
