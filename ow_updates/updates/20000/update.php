<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwall.org/store/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

$prefix = OW_DB_PREFIX;
$dbo = Updater::getDbo();
$config = Updater::getConfigService();
$logger = Updater::getLogger();
$nav = Updater::getNavigationService();

try {
    if(file_exists(OW_DIR_ROOT . 'ow_version.xml')) {
        unlink(OW_DIR_ROOT . 'ow_version.xml');
    }
    $nav->addMenuItem(OW_Navigation::ADMIN_SETTINGS, 'performance.admin', 'performance', 'sidebar_menu_performance', OW_Navigation::VISIBLE_FOR_ALL);
    $nav->addMenuItem(OW_Navigation::ADMIN_SETTINGS, 'localization.admin', 'localization', 'sidebar_menu_localization', OW_Navigation::VISIBLE_FOR_ALL);
    
    $query = "DROP TABLE IF EXISTS `{$prefix}base_cache`";
    $dbo->query($query);
    
    $query = "RENAME TABLE `{$prefix}base_db_cache` TO `{$prefix}base_cache`";
    $dbo->query($query);
    
    $query = "INSERT INTO `{$prefix}base_plugin` (`id`, `title`, `description`, `module`, `key`, `developerKey`, `isSystem`, `isActive`, `adminSettingsRoute`, `uninstallRoute`, `build`, `update`, `licenseKey`, `licenseCheckTimestamp`) VALUES (NULL,'Performance','Performance Plugin','performance','performance','',1,1,NULL,NULL,1,0,NULL,NULL)";
    $dbo->query($query);
    
    $query = "INSERT INTO `{$prefix}base_plugin` (`id`, `title`, `description`, `module`, `key`, `developerKey`, `isSystem`, `isActive`, `adminSettingsRoute`, `uninstallRoute`, `build`, `update`, `licenseKey`, `licenseCheckTimestamp`) VALUES (NULL,'Localization','Localization Plugin','localization','localization','',1,1,NULL,NULL,1,0,NULL,NULL)";
    $dbo->query($query);
    
    $query = "ALTER TABLE `{$prefix}base_question_value` CHANGE `value` `value` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0';";
    $dbo->query($query);
    
    $query = "ALTER TABLE `{$prefix}base_question_data` CHANGE `intValue` `intValue` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0';";
    $dbo->query($query);
    
    if(!$config->configExists('performance', 'cache') ) {
        $config->addConfig('performance', 'cache', 0);
    }
    if(!$config->configExists('performance', 'cacheType') ) {
        $config->addConfig('performance', 'cacheType', 1);
    }
    if(!$config->configExists('performance', 'compressJs') ) {
        $config->addConfig('performance', 'compressJs', 0);
    }
    if(!$config->configExists('performance', 'compressCss') ) {
        $config->addConfig('performance', 'compressCss', 0);
    }
    if(!$config->configExists('performance', 'saveCompressedFiles') ) {
        $config->addConfig('performance', 'saveCompressedFiles', 0);
    }
    if(!$config->configExists('performance', 'compressedCssFiles') ) {
        $config->addConfig('performance', 'compressedCssFiles', 0);
    }
    if(!$config->configExists('performance', 'compressedJsFiles') ) {
        $config->addConfig('performance', 'compressedJsFiles', 0);
    }
    if(!$config->configExists('performance', 'gzip') ) {
        $config->addConfig('performance', 'gzip', 0);
    }
    if(!$config->configExists('localization', 'detectLanguage') ) {
        $config->addConfig('localization', 'detectLanguage', 1);
    }
    if(!$config->configExists('localization', 'urlLanguage') ) {
        $config->addConfig('localization', 'urlLanguage', 1);
    }
    if(!$config->configExists('localization', 'displayLanguage') ) {
        $config->addConfig('localization', 'displayLanguage', 1);
    }
    
    $config = fopen(OW_DIR_ROOT . 'ow_includes/config.php', "a");
    $newdirs = "\ndefine('OW_DIR_LANG', OW_DIR_ROOT.'ow_langs'.DS);\ndefine('OW_DIR_THEME_PLUGIN', 'plugins'.DS);\ndefine('OW_DIR_THEME_SYSTEM_PLUGIN', 'system'.DS);";
    fwrite($config, "\n". $newdirs);
    fclose($config);

} catch(Exception $e) {
    $logger->addEntry(json_encode($e));
}