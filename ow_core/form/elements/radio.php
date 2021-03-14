<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwall.org/store/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_Radio extends FORM_Element
{

    protected $options;
    protected $inline = false;
    
    public function __construct($name) {
        parent::__construct($name);

        $this->addAttribute('type', 'radio');
        $this->attributes['class'] = 'form-check-input';
    }

    public function getOptions() {
        return $this->options;
    }

    public function setInline($value) {
        $this->inline = $value;
    }
    
    public function setOptions($options) {
        if($options === null || !is_array($options)) {
            throw new InvalidArgumentException('Array is expected!');
        }

        $this->options = $options;
        return $this;
    }

    /**
     * Adds field option.
     *
     * @param string $key
     * @param string$value
     * @return RadioField
     */
    public function addOption($key, $value) {
        $this->options[trim($key)] = trim($value);
        return $this;
    }

    /**
     * Adds options list.
     *
     * @param array $options
     * @return RadioField
     */
    public function addOptions($options) {
        if($options === null || !is_array($options)) {
            throw new InvalidArgumentException('Array is expected!');
        }

        foreach($options as $key => $value) {
            $this->addOption($key, $value);
        }

        return $this;
    }

    public function getElementJs() {
        $js = "var formElement = new OwRadioField(" . json_encode($this->getId()) . ", " . json_encode($this->getName()) . ");";

        return $js.$this->generateValidatorAndFilterJsCode("formElement");
    }
    
    public function renderInput($params = null) {
        parent::renderInput($params);

        if($this->options === null || empty($this->options)) {
            return '';
        }
        $output = '';
        foreach($this->options as $key => $value) {
            if($this->value !== null && (string)$key === (string)$this->value) {
                $this->addAttribute(FormElement::ATTR_CHECKED, 'checked');
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

            $this->removeAttribute(FormElement::ATTR_CHECKED);
        }
        
        return $output;
    }
}