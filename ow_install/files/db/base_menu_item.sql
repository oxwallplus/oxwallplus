--
-- Table structure for table `%%TBL-PREFIX%%base_menu_item`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` varchar(110) NOT NULL DEFAULT '',
  `key` varchar(150) NOT NULL DEFAULT '',
  `documentKey` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(70) NOT NULL DEFAULT '',
  `order` int(11) DEFAULT NULL,
  `routePath` varchar(255) DEFAULT NULL,
  `externalUrl` varchar(255) DEFAULT NULL,
  `newWindow` tinyint(1) DEFAULT '0',
  `visibleFor` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`,`prefix`),
  KEY `documentKey` (`documentKey`)
) ENGINE=MyISAM AUTO_INCREMENT=499 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_menu_item`
--

LOCK TABLES `%%TBL-PREFIX%%base_menu_item` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_menu_item` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_menu_item` VALUES 
(1,'performance','sidebar_menu_performance','','admin_settings',8,'performance.admin',NULL,NULL,3),
(2,'localization','sidebar_menu_localization','','admin_settings',6,'localization.admin',NULL,NULL,3),
(3,'security','sidebar_menu_security','','admin_settings',6,'security.admin',NULL,NULL,3),
(23,'base','main_menu_index','','main',2,'base_index',NULL,0,3),
(4,'base','openwack','','bottom',3,NULL,'http://www.oxwallplus.com/',1,3),
(468,'base','page_81959573','page_81959573','bottom',2,NULL,NULL,NULL,3),
(24,'base','main_menu_my_profile','','hidden',1,'base_member_profile',NULL,0,2),
(100,'admin','sidebar_menu_item_user_dashboard','','admin_pages',4,'admin_pages_user_dashboard',NULL,NULL,3),
(41,'base','users_main_menu_item','','main',4,'users',NULL,NULL,3),
(170,'admin','sidebar_menu_item_plugin_mass_mailing','','admin_users',6,'admin_massmailing',NULL,NULL,3),
(101,'admin','sidebar_menu_item_user_profile','','admin_pages',3,'admin_pages_user_profile',NULL,NULL,3),
(97,'admin','sidebar_menu_main','','admin',1,'admin_default',NULL,NULL,3),
(58,'admin','sidebar_menu_item_themes_customize','','admin_appearance',2,'admin_themes_edit',NULL,NULL,3),
(73,'admin','sidebar_menu_item_themes','','admin_appearance',1,'admin_themes_choose',NULL,NULL,3),
(74,'admin','sidebar_menu_item_pages_manage','','admin_pages',1,'admin_pages_main',NULL,NULL,3),
(96,'admin','sidebar_menu_item_settings_language','','admin_settings',5,'admin_settings_language',NULL,NULL,3),
(107,'admin','sidebar_menu_item_users','','admin_users',1,'admin_users_browse',NULL,NULL,3),(109,'admin','sidebar_menu_item_general','','admin_settings',1,'admin_settings_main',NULL,NULL,3),(115,'admin','sidebar_menu_item_questions','','admin_users',4,'questions_index',NULL,0,3),(120,'admin','sidebar_menu_item_dev_langs','','admin_dev',1,'admin_developer_tools_language',NULL,NULL,3),(211,'base','base_join_menu_item','','main',3,'base_join',NULL,NULL,1),(308,'admin','sidebar_menu_plugins_add','','admin_plugins',3,'admin_plugins_add',NULL,0,2),(268,'admin','sidebar_menu_item_special_pages','','admin_pages',2,'admin_pages_maintenance',NULL,0,2),(307,'admin','sidebar_menu_plugins_available','','admin_plugins',2,'admin_plugins_available',NULL,NULL,2),(484,'admin','sidebar_menu_item_smtp_settings','','admin_settings',6,'admin_settings_mail',NULL,NULL,3),(300,'admin','sidebar_menu_item_permission_moders','','admin_users',2,'admin_permissions_moderators',NULL,0,2),(304,'base','dashboard','','main',1,'base_member_dashboard',NULL,NULL,2),(306,'admin','sidebar_menu_plugins_installed','','admin_plugins',1,'admin_plugins_installed',NULL,NULL,2),(340,'admin','sidebar_menu_item_dashboard_finance','','admin',2,'admin_finance',NULL,0,3),(341,'admin','sidebar_menu_item_restricted_usernames','','admin_users',5,'admin_restrictedusernames',NULL,0,3),(415,'admin','sidebar_menu_item_user_settings','','admin_settings',2,'admin_settings_user',NULL,0,3),(405,'admin','sidebar_menu_item_users_roles','','admin_users',3,'admin_user_roles',NULL,0,3),(411,'base','page-119658','page-119658','bottom',1,NULL,NULL,NULL,3),(469,'mobile','mobile_admin_navigation','','admin_mobile',1,'mobile.admin.navigation',NULL,NULL,3),(470,'mobile','mobile_admin_pages_index','','admin_mobile',2,'mobile.admin.pages.index',NULL,NULL,3),(471,'mobile','mobile_admin_pages_dashboard','','admin_mobile',3,'mobile.admin.pages.dashboard',NULL,NULL,3),(485,'mobile','mobile_pages_dashboard','','mobile_top',1,'base_member_dashboard',NULL,NULL,2),(473,'base','desktop_version_menu_item','','mobile_bottom',1,'base.desktop_version',NULL,NULL,3),(477,'ow_custom','mobile_page_14788567','mobile_page_14788567','mobile_bottom',0,NULL,NULL,NULL,3),(478,'base','index_menu_item','','mobile_top',0,'base_index',NULL,NULL,3),(479,'base','mobile_version_menu_item','','bottom',5,'base.mobile_version',NULL,NULL,3),(481,'mobile','mobile_admin_settings','','admin_mobile',4,'mobile.admin_settings',NULL,NULL,2),(482,'admin','sidebar_menu_item_content_settings','','admin_settings',3,'admin_settings_user_input',NULL,NULL,3),(483,'admin','sidebar_menu_item_page_settings','','admin_settings',4,'admin_settings_page',NULL,NULL,3),(498,'admin','sidebar_menu_item_seo_settings','','admin_settings',7,'admin_settings_seo',NULL,NULL,3);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_menu_item` ENABLE KEYS */;
UNLOCK TABLES;
