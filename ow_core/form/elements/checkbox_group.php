<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwall.org/store/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_CheckboxGroup extends FORM_Element
{

    protected $options = array();
    protected $inline = false;
    
    public function __construct($name) {
        parent::__construct($name);

        $this->addAttribute('type', 'checkbox');
        $this->attributes['class'] = 'form-check-input';
    }

    public function getOptions() {
        return $this->options;
    }
    
    public function setOptions($options) {
        if($options === null || !is_array($options)) {
            throw new InvalidArgumentException('Array is expected!');
        }

        $this->options = $options;
    }

    public function addOption($key, $value) {
        $this->options[trim($key)] = trim($value);
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

    public function getName() {
        return isset($this->attributes['name']) ? mb_substr($this->attributes['name'], 0, -2) : null;
    }

    public function setName($name) {
        $name = trim($name);
        if($name === null || strlen($name) == 0) {
            throw new InvalidArgumentException('CheckboxGroup invalid name!');
        }

        $this->attributes['name'] = trim($name) . '[]';
    }
    
    public function getElementJs() {
        $js = "var formElement = new OwCheckboxGroup(" . json_encode($this->getId()) . ", " . json_encode($this->getName()) . ");";

        return $js.$this->generateValidatorAndFilterJsCode("formElement");
    }
    
    public function renderInput($params = null) {
        parent::renderInput($params);

        if($this->options === null || empty($this->options)) {
            return '';
        }

        $output = '';
        foreach($this->options as $key => $value) {
            if($this->value !== null && is_array($this->value) && in_array($key, $this->value)) {
                $this->addAttribute(FORM_Element::ATTR_CHECKED, 'checked');
            }

            $this->setId(UTIL_HtmlTag::generateAutoId('input'));
            $this->addAttribute('value', $key);

            $output .= '<div class="form-check';
            if($this->inline) {
                $output .= ' form-check-inline';
            }
            $output .= '">';
            $output .= UTIL_HtmlTag::generateTag('input', $this->attributes);
            $output .= '&nbsp;<label class="form-check-label" for="'.$this->getId().'">'.$value.'</label>';
            $output .= '</div>';
            
            $this->removeAttribute(FORM_Element::ATTR_CHECKED);
        }

        return $output;
    }
}