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
    protected $switch = false;
    protected $value = false;
    
    public function __construct(string $name)
    {
        parent::__construct($name);

        $this->addAttribute('type', 'checkbox');
        $this->attributes['class'] = 'form-check-input';
    }

    public function setValue($value): self
    {
        $this->value = (bool) $value;
        return $this;
    }

    public function getElementJs(): string
    {
        $jsString = "var formElement = new OwCheckboxField(" . json_encode($this->getId()) . ", " . json_encode($this->getName()) . ");";

        return $jsString . $this->generateValidatorAndFilterJsCode("formElement");
    }

    public function setSwitch(): self
    {
        $this->switch = true;
        return $this;
    }
    
    public function renderLabel(): ?string
    {
        if ($this->switch) {
            return parent::renderLabel();
        } else {
            return '';
        }
    }
    
    public function renderInput($params = null): string
    {
        parent::renderInput($params);

        if ($this->value) {
            $this->addAttribute(self::ATTR_CHECKED);
        }
        
        $output = '<div class="form-check';
        if ($this->switch) {
            $output .= ' form-switch';
        }
        $output .= '">';
        $output .= UTIL_HtmlTag::generateTag('input', $this->attributes);
        if (!$this->switch) {
            $output .= ' <label class="form-check-label" for="'.$this->getId().'">'.$this->getLabel().'</label>';
        }
        $output .= '</div>';
        
        return $output;
    }
}
