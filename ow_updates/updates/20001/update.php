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
    $nav->addMenuItem(OW_Navigation::ADMIN_SETTINGS, 'security.admin', 'security', 'sidebar_menu_security', OW_Navigation::VISIBLE_FOR_ALL);
    
    $query = "INSERT INTO `{$prefix}base_plugin` (`id`, `title`, `description`, `module`, `key`, `developerKey`, `isSystem`, `isActive`, `adminSettingsRoute`, `uninstallRoute`, `build`, `update`, `licenseKey`, `licenseCheckTimestamp`) VALUES (NULL,'Security','Security Plugin','security','security','',1,1,NULL,NULL,1,0,NULL,NULL)";
    $dbo->query($query);
    
    $query = "UPDATE `{$prefix}base_config` SET `key` = 'localization', `name` = 'siteTimezone' WHERE `key` = 'base' AND `name` = 'site_timezone'";
    $dbo->query($query);
    
    $query = "UPDATE `{$prefix}base_config` SET `key` = 'localization', `name` = 'relativeTime' WHERE `key` = 'base' AND `name` = 'site_use_relative_time'";
    $dbo->query($query);
    
    $query = "UPDATE `{$prefix}base_config` SET `key` = 'localization', `name` = 'militaryTime' WHERE `key` = 'base' AND `name` = 'military_time'";
    $dbo->query($query);
    
    $query = "UPDATE `{$prefix}base_config` SET `key` = 'localization', `name` = 'defaultCurrency' WHERE `key` = 'base' AND `name` = 'billing_currency'";
    $dbo->query($query);
    
    $query = "UPDATE `{$prefix}base_config` SET `key` = 'security', `name` = 'enableCaptcha' WHERE `key` = 'base' AND `name` = 'enable_captcha'";
    $dbo->query($query);
    
    $query = "UPDATE `{$prefix}base_question_config` SET `presentationClass` = 'ELEMENT_RangeYear' WHERE `name` = 'year_range'";
    $dbo->query($query);
    
    if($config->configExists('base', 'date_field_format') ) {
        $config->deleteConfig('base', 'date_field_format');
    }
    if(!$config->configExists('localization', 'dateFormat') ) {
        $config->addConfig('localization', 'dateFormat', 'm/d/Y');
    }
    if(!$config->configExists('localization', 'relativeTimeRange') ) {
        $config->addConfig('localization', 'relativeTimeRange', '30');
    }
    if(!$config->configExists('localization', 'timeFormat') ) {
        $config->addConfig('localization', 'timeFormat', 'H:i');
    }
    if(!$config->configExists('performance', 'cacheType') ) {
        $config->addConfig('performance', 'cacheType', 'PERFORMANCE_BOL_FileCacheBackend');
    } else {
        $config->saveConfig('performance', 'cacheType', 'PERFORMANCE_BOL_FileCacheBackend');
    }
    if(!$config->configExists('security', 'captchaType') ) {
        $config->addConfig('security', 'captchaType', 'SECURITY_CLASS_SecurimageElement');
    }
    if(!$config->configExists('security', 'recaptchaSettings') ) {
        $config->addConfig('security', 'recaptchaSettings', 'a:2:{s:7:"siteKey";s:0:"";s:9:"secretKey";s:0:"";}');
    }
    if(!$config->configExists('security', 'securimageSettings') ) {
        $config->addConfig('security', 'securimageSettings', 'a:4:{s:11:"captchaType";s:1:"0";s:13:"captchaLength";a:2:{s:4:"from";i:5;s:2:"to";i:6;}s:12:"captchaLines";a:2:{s:4:"from";i:5;s:2:"to";i:10;}s:16:"captchaSignature";s:14:"retype captcha";}');
    }

} catch(Exception $e) {
    $logger->addEntry(json_encode($e));
}