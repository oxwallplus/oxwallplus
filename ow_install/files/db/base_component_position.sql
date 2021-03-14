--
-- Table structure for table `%%TBL-PREFIX%%base_component_position`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_component_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_component_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `componentPlaceUniqName` varchar(50) NOT NULL DEFAULT '',
  `section` varchar(100) DEFAULT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `componentPlaceUniqName` (`componentPlaceUniqName`)
) ENGINE=MyISAM AUTO_INCREMENT=11418 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_component_position`
--

LOCK TABLES `%%TBL-PREFIX%%base_component_position` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_position` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_component_position` VALUES (6975,'admin-4c627f1bdc9db','top',0),(6986,'admin-4c62811170310','top',0),(10404,'index-BASE_CMP_AddNewContent','sidebar',1),(10403,'index-BASE_CMP_MyAvatarWidget','sidebar',0),(11371,'admin-5295f2e40db5c','mobile.main',1),(11372,'mobile.index-BASE_MCMP_UserListWidget','mobile.main',2),(11305,'dashboard-BASE_CMP_QuickLinksWidget','right',3),(11304,'dashboard-BASE_CMP_WelcomeWidget','right',2),(11370,'admin-5295f2e03ec8a','mobile.main',0),(11274,'admin.dashboard-ADMIN_CMP_UserStatisticWidget','top',1),(11273,'admin.dashboard-ADMIN_CMP_FinanceStatisticWidget','top',0),(11275,'admin.dashboard-ADMIN_CMP_ContentStatisticWidget','top',2),(11303,'dashboard-BASE_CMP_ModerationToolsWidget','right',1),(11399,'admin-4b543d8cdc488','left',1),(11400,'index-BASE_CMP_UserListWidget','left',2),(11373,'mobile.index-BASE_MCMP_JoinNowWidget','mobile.main',3),(11377,'profile-BASE_CMP_UserViewWidget','right',1),(11409,'profile-BASE_CMP_AboutMeWidget','left',1),(11408,'profile-BASE_CMP_UserAvatarWidget','left',0);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component_position` ENABLE KEYS */;
UNLOCK TABLES;
