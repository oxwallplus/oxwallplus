<?php
/*
 * @version 2.0.1
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
    $items = [
        Updater::getPluginManager()->getPlugin('base')->getStaticJsDir() . 'popper',
        Updater::getPluginManager()->getPlugin('base')->getStaticJsDir() . 'fontawesome',
        Updater::getPluginManager()->getPlugin('base')->getStaticJsDir() . 'bootstrap',
        Updater::getPluginManager()->getPlugin('base')->getStaticJsDir() . 'select2',
    ];
    foreach ($items as $item) {
        if (file_exists($item)) {
            UTIL_File::removeDir($item);
        }
    }
} catch(Exception $e) {
    $logger->addEntry(json_encode($e));
}