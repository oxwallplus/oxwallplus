<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_Text extends ELEMENT_Invitation
{
    
    public function __construct($name, $type = 'text') {
        parent::__construct($name);

        $this->addAttribute('type', $type);
    }
    
    public function setSlug($id) {
        OW::getDocument()->addOnloadScript("
            OW.slug('".$id."', '".$this->getId()."', '".OW::getRouter()->urlFor('BASE_CTRL_AjaxLoader', 'slug')."');
        ");
    }
        
    public function renderInput($params = null) {
        parent::renderInput($params);

        if($this->getValue() !== null) {
            $this->addAttribute('value', $this->value);
        }
        
        return parent::renderInput($params);
    }
}