--
-- Table structure for table `%%TBL-PREFIX%%base_component`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_component`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_component` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `className` varchar(50) NOT NULL,
  `clonable` tinyint(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=808 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_component`
--

LOCK TABLES `%%TBL-PREFIX%%base_component` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_component` VALUES (70,'BASE_CMP_AboutMeWidget',0),(69,'BASE_CMP_RssWidget',1),(68,'BASE_CMP_UserViewWidget',0),(67,'BASE_CMP_JoinNowWidget',0),(66,'BASE_CMP_ProfileWallWidget',0),(65,'BASE_CMP_UserAvatarWidget',0),(64,'BASE_CMP_IndexWallWidget',0),(61,'BASE_CMP_AddNewContent',0),(62,'BASE_CMP_CustomHtmlWidget',1),(63,'BASE_CMP_UserListWidget',0),(207,'BASE_CMP_MyAvatarWidget',0),(761,'BASE_CMP_QuickLinksWidget',0),(762,'BASE_MCMP_CustomHtmlWidget',1),(763,'BASE_MCMP_RssWidget',1),(764,'BASE_MCMP_UserListWidget',0),(765,'BASE_CMP_ModerationToolsWidget',0),(766,'BASE_CMP_WelcomeWidget',0),(767,'BASE_MCMP_JoinNowWidget',0),(768,'ADMIN_CMP_FinanceStatisticWidget',0),(769,'ADMIN_CMP_UserStatisticWidget',0),(770,'ADMIN_CMP_ContentStatisticWidget',0),(794,'GROUPS_CMP_InviteWidget',0);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_component` ENABLE KEYS */;
UNLOCK TABLES;
