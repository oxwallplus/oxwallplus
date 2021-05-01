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

try {    
    $query = "INSERT IGNORE INTO `{$prefix}base_plugin` (`id`, `title`, `description`, `module`, `key`, `developerKey`, `isSystem`, `isActive`, `adminSettingsRoute`, `uninstallRoute`, `build`, `update`, `licenseKey`, `licenseCheckTimestamp`) 
        VALUES (NULL,'Core','Core Plugin','core','core','',1,1,NULL,NULL,1,0,NULL,NULL)";
    $dbo->query($query);


    $query = "
        UPDATE `{$prefix}base_plugin` SET `build` = '2' WHERE `key` = 'performance';
        UPDATE `{$prefix}base_plugin` SET `build` = '2' WHERE `key` = 'security';
        UPDATE `{$prefix}base_plugin` SET `build` = '2' WHERE `key` = 'localization';
    ";

} catch(Exception $e) {
    $logger->addEntry(json_encode($e));
}