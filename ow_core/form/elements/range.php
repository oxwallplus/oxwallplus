<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_Range extends FORM_Element
{
    protected $max;
    protected $min;
    protected $options = array();

    /**
     * Constructor.
     *
     * @param string $name
     */
    public function __construct($name) {
        parent::__construct($name);

        $this->setMin(0);
        $this->setMax(100);
        $this->addAttribute('type', 'text');
    }

    /**
     * Sets form element value.
     *
     * @param mixed $value
     * @return FormElement
     */
    public function setValue($value) {
        if(empty($value)) {
            return;
        }
        
        if(!is_array($value)) {
            $values = explode(",", $value);
            $value = array(
                'from' => $values[0],
                'to' => $values[1]
            );
        }

        if((int) $value['from'] >= $this->min && (int) $value['from'] <= $this->max) {
            $this->value['from'] = (int)$value['from'];
        } else {
            $this->value['from'] = $this->min;
        }
        if((int) $value['to'] >= $this->min && (int) $value['to'] <= $this->max) {
            $this->value['to'] = (int)$value['to'];
        } else {
            $this->value['to'] = $this->max;
        }
    }
    
    public function getValue() {
        if($this->value && !is_array($this->value)) {
            $values = explode(",", $this->value);
            $this->value = array(
                'from' => (int)$values[0],
                'to' => (int)$values[1]
            );
        }
        return $this->value;
    }
    
    public function setMax($value) {
        $this->options['max'] = $value;
        $this->max = (int) $value;
    }

    public function setMin($value) {
        $this->options['min'] = $value;
        $this->min = (int) $value;
    }

    public function getMax() {
        return $this->max;
    }

    public function getMin() {
        return $this->min;
    }

    public function renderInput($params = null) {
        parent::renderInput($params);
        if($value = $this->getValue()) {
            if(is_array($value)) {
                $value = implode(",", array_values($this->value));
            }
            $this->addAttribute('value', $value);
            $this->options['value'] = array_values($this->value);
        }

        $document = OW::getDocument();
        $pluginManager = OW::getPluginManager();
        $core = CORE_BOL_Service::KEY;

        $document->addScript($pluginManager->getPlugin($core)->getStaticJsUrl() . 'bootstrap-slider.min.js');
        $document->addStyleSheet($pluginManager->getPlugin($core)->getStaticCssUrl() . 'bootstrap-slider.min.css');
        
        $this->options['range'] = true;
        $this->options['tooltip'] = 'always';
        $document->addOnloadScript("
            $(function () {
                $('#".$this->getId()."').bootstrapSlider(".json_encode($this->options).");
            });
        ");
        
        return UTIL_HtmlTag::generateTag('input', $this->attributes);
    }
}

