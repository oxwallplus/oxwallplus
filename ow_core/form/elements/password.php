<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_Password extends ELEMENT_Text
{
    
    public function __construct($name, $type = 'password') {
        parent::__construct($name);

        $this->setHasInvitation(false);
        $this->addAttribute('type', $type);
    }
    
        
    public function renderInput($params = null) {
        parent::renderInput($params);

        return UTIL_HtmlTag::generateTag('input', $this->attributes);
    }
}