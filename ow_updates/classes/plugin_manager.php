<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwall.org/store/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class UPDATE_PluginManager
{    
    private $pluginService;
    
    private static $classInstance;

    public static function getInstance() {
        if(self::$classInstance === null) {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }
    
    private function __construct() {
        $this->pluginService = BOL_PluginService::getInstance();
    }
    
    public function initPackagePointers() {
        $plugins = $this->pluginService->findActivePlugins();
        foreach($plugins as $plugin) {
            $this->addPackagePointers($plugin);
        }
    }
    
    public function getPlugin($key) {
        $plugin = $this->pluginService->findPluginByKey($key);

        if($plugin === null || !$plugin->isActive()) {
            throw new InvalidArgumentException("There is no active plugin with key `{$key}`!");
        }

        return $plugin;
    }

    public function addPackagePointers(BOL_Plugin $pluginDto) {
        $plugin = new OW_Plugin($pluginDto);
        $upperedKey = mb_strtoupper($plugin->getKey());
        $autoloader = UPDATE_Autoload::getInstance();

        $predefinedPointers = array(
            "BOL" => $plugin->getBolDir(),
            "DTO" => $plugin->getDtoDir(),
            "DAO" => $plugin->getDaoDir(),
        );

        foreach($predefinedPointers as $pointer => $dirPath) {
            $autoloader->addPackagePointer($upperedKey . "_" . $pointer, $dirPath);
        }
    }

}
