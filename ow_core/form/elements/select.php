<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_Select extends ELEMENT_Invitation
{
    private $options = array();
    private $select2 = false;
    private $escape = true;
    private $select2Options = array();

    public function __construct($name) {
        parent::__construct($name);

        $this->addAttribute('class', 'custom-select');
        $this->setInvitation(OW::getLanguage()->text('base', 'form_element_select_field_invitation_label'));
    }

    public function getOptions() {
        return $this->options;
    }

    public function setOptions($options) {
        if($options === null || !is_array($options)) {
            throw new InvalidArgumentException('Array is expected!');
        }

        $this->options = $options;
        return $this;
    }
    
    public function setSelect2($enable = true, $options = array()) {
        $this->select2 = $enable;
        $this->select2Options = $options;
        return $this;
    }

    public function setEscape($enable = true) {
        $this->escape = $enable;
        return $this;
    }

    public function addOption($key, $value) {
        $this->options[trim($key)] = trim($value);
        return $this;
    }

    public function addOptions($options) {
        if($options === null || !is_array($options)) {
            throw new InvalidArgumentException('Array is expected!');
        }

        foreach($options as $key => $value) {
            $this->addOption($key, $value);
        }
        return $this;
    }

    public function renderInput($params = null) {
        parent::renderInput($params);

        $optionsString = '';
        
        if($this->select2) {
            $js = "$('#".$this->getId()."').select2(".json_encode($this->select2Options).");";
            OW::getDocument()->addOnloadScript($js, 10);
        }

        if($this->hasInvitation) {
            $optionsString .= UTIL_HtmlTag::generateTag('option', array('value' => ''), true, $this->invitation);
        }

        foreach($this->options as $key => $value) {
            $attrs = ($this->value !== null && (string) $key === (string) $this->value) ? array('selected' => 'selected') : array();

            $attrs['value'] = $key;
            $optionsString .= UTIL_HtmlTag::generateTag('option', $attrs, true, trim($value), $this->escape);
        }
        return UTIL_HtmlTag::generateTag('select', $this->attributes, true, $optionsString);
    }
}


