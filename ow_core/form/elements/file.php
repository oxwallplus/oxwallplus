<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_File extends FORM_Element
{

    protected $size;
    protected $file;
    protected $path;
    
    public function __construct($name) {
        parent::__construct($name);

        $this->addAttribute('type', 'file');
    }
    
    public function setSize($value) {
        $this->size = $value;
    }
    
    public function getSize() {
        return $this->size;
    }
    
    public function setUploadPath($value) {
        if(!file_exists($value)) {
            mkdir($value);
            chmod($value, 0777);
        }
        $this->path = $value;
    }
    
    public function getUploadPath() {
        return $this->path;
    }
    
    public function setFile($value) {
        $this->file = $value;
    }
    
    public function getFile() {
        return $this->file;
    }

    public function renderInput($params = null) {
        parent::renderInput($params);

        return UTIL_HtmlTag::generateTag('input', $this->attributes);
    }
}
