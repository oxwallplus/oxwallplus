--
-- Table structure for table `%%TBL-PREFIX%%base_config`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` text,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=850 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_config`
--

LOCK TABLES `%%TBL-PREFIX%%base_config` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_config` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_config` VALUES 
(1,'performance','cache','0',''),
(2,'performance','cacheType','PERFORMANCE_BOL_FileCacheBackend',''),
(3,'performance','compressJs','0',''),
(4,'performance','compressCss','0',''),
(5,'performance','saveCompressedFiles','0',''),
(6,'performance','compressedJsFiles','',''),
(7,'performance','compressedCssFiles','',''),
(8,'performance','gzip','0',''),
(9,'localization','detectLanguage','1',''),
(10,'localization','urlLanguage','1',''),
(11,'localization','displayLanguage','1',''),
(12,'localization','siteTimezone','US/Pacific','Site Timezone'),
(13,'localization','dateFormat','m/d/Y',''),
(14,'localization','timeFormat','H:i',''),
(15,'localization','relativeTime','1','Use relative date/time'),
(16,'base','avatar_big_size','190','User avatar width'),
(17,'base','avatar_size','90','User avatar height'),
(18,'admin','admin_menu_state','[]',NULL),
(19,'base','selectedTheme','simplicity','Selected theme.'),
(20,'localization','militaryTime','1',''),
(21,'base','site_name','demo','Site name'),
(22,'base','confirm_email','1','Confirm email'),
(23,'base','user_view_presentation','table','User view presentation'),
(24,'base','site_tagline','demo','Site tagline'),
(25,'base','site_description','Just another Oxwall site','Site Description'),
(26,'localization','relativeTimeRange','30',''),
(27,'localization','defaultCurrency','USD','Site currency 3-char code'),
(28,'security','enableCaptcha','1','is captcha enabled on join form?'),
(29,'security','captchaType','SECURITY_CLASS_SecurimageElement',''),
(30,'security','recaptchaSettings','a:2:{s:7:"siteKey";s:0:"";s:9:"secretKey";s:0:"";}',''),
(31,'base','display_name_question','realname','Question used for display name'),
(32,'base','site_email','demo@oxwall.com','Email address from which your users will receive notifications and mass mailing.'),
(33,'security','securimageSettings','a:4:{s:11:"captchaType";s:1:"0";s:13:"captchaLength";a:2:{s:4:"from";i:5;s:2:"to";i:6;}s:12:"captchaLines";a:2:{s:4:"from";i:5;s:2:"to";i:10;}s:16:"captchaSignature";s:14:"retype captcha";}',''),
(34,'base','google_analytics',NULL,NULL),
(35,'theme','enableFavicon',NULL,NULL),
(36,'theme','favicon','ow_userfiles/plugins/theme/favicon.png',NULL),
(37,'theme','siteLogo','/ow_userfiles/plugins/theme/logo.png',NULL),
(46,'base','mail_smtp_enabled','0','Smtp enabled'),
(47,'base','mail_smtp_host','Host','Smtp Host'),
(48,'base','mail_smtp_user','Username','Smtp User'),
(49,'base','mail_smtp_password','Password','Smtp passwprd'),
(50,'base','mail_smtp_port','Port','Smtp Port'),
(51,'base','mail_smtp_connection_prefix','','Smpt connection prefix (tsl, ssl)'),
(56,'base','splash_screen','0',NULL),
(57,'base','who_can_join','1',NULL),
(58,'base','who_can_invite','1',NULL),
(59,'base','guests_can_view','1',NULL),
(61,'base','guests_can_view_password','',NULL),
(62,'base','splash_leave_url','http://google.com',NULL),
(70,'base','maintenance','0',NULL),
(69,'base','mandatory_user_approve','0','mandatory_user_approve'),
(730,'base','site_statistics_disallowed_entity_types','user-status,avatar-change',NULL),
(79,'base','tf_max_pic_size','2.500000',NULL),
(80,'base','soft_build','20001','Current soft version'),
(81,'base','update_soft','0','Soft core update flag'),
(85,'base','unverify_site_email','','Email address from which your users will receive notifications and mass mailing.'),
(115,'base','soft_version','2.0.0',NULL),
(139,'base','site_installed','0',NULL),
(140,'base','check_mupdates_ts','0','Last manual updates check timestamp.'),(676,'contact_importer','yahoo_consumer_key','',''),(674,'contact_importer','facebook_app_secret','',''),(179,'admin','mass_mailing_timestamp','0',NULL),(200,'base','dev_mode','1',NULL),(725,'base','log_file_max_size_mb','20',NULL),(726,'base','attch_file_max_size_mb','2',NULL),(727,'base','attch_ext_list','[\"txt\",\"doc\",\"docx\",\"sql\",\"csv\",\"xls\",\"ppt\",\"pdf\",\"jpg\",\"jpeg\",\"png\",\"gif\",\"bmp\",\"psd\",\"ai\",\"avi\",\"wmv\",\"mp3\",\"3gp\",\"flv\",\"mkv\",\"mpeg\",\"mpg\",\"swf\",\"zip\",\"gz\",\"tgz\",\"gzip\",\"7z\",\"bzip2\",\"rar\"]',NULL),(723,'base','admin_cookie','gim4juZyZOwIMIhOzYXo7adAs3s2lOqe',NULL),(724,'base','disable_mobile_context','0',NULL),(241,'base','default_avatar','[]','Default avatar'),(249,'base','language_switch_allowed','1','Allow users switch languages on site'),(276,'base','rss_loading','0',NULL),(277,'base','cron_is_active','1','Flag showing if cron script is activated after soft install'),(675,'contact_importer','yahoo_app_id','',''),(673,'contact_importer','facebook_api_key','',''),(348,'base','users_count_on_page','30','Users count on page'),(367,'base','join_display_photo_upload','display','Display \'Photo Upload\' field on Join page.'),
(368,'base','join_photo_upload_set_required','1','Make \'Photo Upload\' a required field on Join Page.'),
(369,'base','join_display_terms_of_use',NULL,'Display \'Terms of use\' field on Join page.'),
(404,'base','html_head_code','','Code (meta, css, js) added from admin panel into head section of HTML document.'),
(405,'base','html_prebody_code','','Code (js) added before \'body\' closing tag.'),(678,'contact_importer','yahoo_consumer_secret','',''),(444,'base','tf_user_custom_html_disable','1',NULL),(445,'base','tf_user_rich_media_disable','0',NULL),(446,'base','tf_comments_rich_media_disable','0',NULL),(447,'base','tf_resource_list','[\"clipfish.de\",\"youtube.com\",\"google.com\",\"metacafe.com\",\"myspace.com\",\"novamov.com\",\"myvideo.de\"]',NULL),(677,'contact_importer','yahoo_domain_verification_file','',''),(683,'base','cachedEntitiesPostfix','572b377fd2698',NULL),(685,'base','master_page_theme_info','[]',NULL),(686,'base','user_invites_limit','50',NULL),(687,'base','profile_question_edit_stamp','1402999957',NULL),(688,'base','install_complete','0',NULL),(728,'base','users_on_page','12',NULL),(729,'base','avatar_max_upload_size','1','Enable file attachments'),(749,'base','cron_is_configured','0',NULL),
(836,'base','seo_sitemap_build_finished','0',NULL),(837,'base','seo_sitemap_max_urls_in_file','4000',NULL),(838,'base','seo_sitemap_entitites_max_count','200000',NULL),(839,'base','seo_sitemap_entitites_limit','500',NULL),(840,'base','seo_sitemap_build_in_progress','0',NULL),(841,'base','seo_sitemap_in_progress','0',NULL),(842,'base','seo_sitemap_in_progress_time','0',NULL),(843,'base','seo_sitemap_last_build','0',NULL),(844,'base','seo_sitemap_last_start','0',NULL),(845,'base','seo_sitemap_entities','{\"base_pages\":{\"lang_prefix\":\"admin\",\"label\":\"seo_sitemap_base_pages\",\"description\":null,\"items\":[{\"name\":\"base_pages\",\"data_fetched\":false,\"urls_count\":0}],\"enabled\":true,\"priority\":1,\"changefreq\":\"weekly\"},\"users\":{\"lang_prefix\":\"admin\",\"label\":\"seo_sitemap_users\",\"description\":\"seo_sitemap_users_desc\",\"items\":[{\"name\":\"user_list\",\"data_fetched\":false,\"urls_count\":0},{\"name\":\"users\",\"data_fetched\":false,\"urls_count\":0}],\"enabled\":true,\"priority\":0.5,\"changefreq\":\"weekly\"}}',NULL),(846,'base','seo_sitemap_schedule_update','weekly',NULL),(847,'base','seo_sitemap_index','0',NULL),(848,'base','seo_meta_info','{\"disabledEntities\":[]}',NULL),(849,'base','seo_social_meta_logo_name','',NULL);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_config` ENABLE KEYS */;
UNLOCK TABLES;
