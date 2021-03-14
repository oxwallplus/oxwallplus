--
-- Table structure for table `%%TBL-PREFIX%%base_preference`
--

DROP TABLE IF EXISTS `%%TBL-PREFIX%%base_preference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `%%TBL-PREFIX%%base_preference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `defaultValue` text NOT NULL,
  `sectionName` varchar(100) NOT NULL,
  `sortOrder` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`),
  KEY `sortOrder` (`sortOrder`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `%%TBL-PREFIX%%base_preference`
--

LOCK TABLES `%%TBL-PREFIX%%base_preference` WRITE;
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_preference` DISABLE KEYS */;
INSERT INTO `%%TBL-PREFIX%%base_preference` VALUES (1,'mass_mailing_subscribe','true','general',1),(12,'newsfeed_generate_action_set_timestamp','0','general',10000),(25,'send_wellcome_letter','0','general',99),(28,'profile_details_update_stamp','0','general',1),(31,'mailbox_user_settings_enable_sound','1','general',1),(32,'mailbox_user_settings_show_online_only','1','general',1),(35,'base_questions_changes_list','[]','general',100),(36,'timeZoneSelect','null','general',1),(41,'fbconnect_user_credits','0','general',1);
/*!40000 ALTER TABLE `%%TBL-PREFIX%%base_preference` ENABLE KEYS */;
UNLOCK TABLES;
