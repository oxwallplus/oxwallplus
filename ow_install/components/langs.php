<?php
/*
 * @version 1.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class INSTALL_CMP_Langs extends INSTALL_Component 
{
    private $langs = array();

    public function __construct() {
        parent::__construct();
        foreach(glob(INSTALL_DIR_LANG . '*.po') as $file) {
            $this->add(basename($file, '.po'));
        }
    }
    
    public function add($key) {
        $this->langs[] = $key;
    }
    
    public function onBeforeRender() {
        parent::onBeforeRender();
        
        $this->assign('langs', $this->langs);
        $this->assign('current', INSTALL::getStorage()->get('language'));
    }
}