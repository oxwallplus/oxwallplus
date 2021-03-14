<?php
/*
 * @version 1.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

use Gettext\Translator;

class OW_Translator
{
    use OW_Singleton;
    
    public $translator;

    private static $classInstances;

    public static function getInstance($dir, $lang = 'en') {
        if(self::$classInstances === null) {
            self::$classInstances = array();
        }

        if(empty(self::$classInstances[$dir][$lang])) {
            self::$classInstances[$dir][$lang] = new self($dir, $lang);
        }

        return self::$classInstances[$dir][$lang];
    }
    
    public function __construct($dir, $lang) {
        $this->translator = new Translator();
        
        $path  = $dir . $lang . '.po';
        if(file_exists($path)) {
            $translations = Gettext\Translations::fromPoFile($path);
            $this->translator->loadTranslations($translations);
        }
    }
    
    public function translate($text, $params = array()) {
        $this->translator->register();
        return __($text, $params);
    }
}
