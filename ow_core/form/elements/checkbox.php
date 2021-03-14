<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwall.org/store/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_Checkbox extends FORM_Element
{

    protected $toggle = false;
    
    public function __construct($name) {
        parent::__construct($name);

        $this->addAttribute('type', 'checkbox');
        $this->attributes['class'] = 'form-check-input';
    }

    public function setValue($value) {
        if((bool) $value) {
            $this->value = true;
        } else {
            $this->value = null;
        }

        return $this;
    }

    public function getElementJs() {
        $jsString = "var formElement = new OwCheckboxField(" . json_encode($this->getId()) . ", " . json_encode($this->getName()) . ");";

        return $jsString.$this->generateValidatorAndFilterJsCode("formElement");
    }

    public function setToggle($value) {
        if((bool) $value) {
            $this->toggle = true;
        } else {
            $this->toggle = null;
        }
    }
    
    public function renderLabel() {
        if($this->toggle) {
            return parent::renderLabel();
        } else {
            return '';
        }
    }
    
    public function renderInput($params = null) {
        parent::renderInput($params);

        if($this->value && $this->value === true) {
            $this->addAttribute(self::ATTR_CHECKED);
        }
        
        if($this->toggle) {
            $this->addAttribute("data-toggle", "toggle");
        }
        
        $output = '<div class="form-check">';
        $output .= UTIL_HtmlTag::generateTag('input', $this->attributes);
        if(!$this->toggle) {
            $output .= '&nbsp;<label class="form-check-label" for="'.$this->getId().'">'.$this->getLabel().'</label>';
        }
        $output .= '</div>';
        
        return $output;
    }
}