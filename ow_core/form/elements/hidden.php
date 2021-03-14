<?php
/*
 * @version 1.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_Hidden extends FORM_Element
{

    public function __construct($name) {
        parent::__construct($name);
        
        $this->addAttribute('type', 'hidden');
    }
    
    public function renderInput($params = null) {
        parent::renderInput($params);

        if($this->value !== null) {
            $this->addAttribute('value', $this->value);
        }

        return UTIL_HtmlTag::generateTag('input', $this->attributes);
    }
}



