<?php
/*
 * @version 1.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_Submit extends FORM_Element
{
    protected $decorator;

    public function __construct($name, $decorator = 'button') {
        parent::__construct($name);

        $this->addAttribute('type', 'submit');

        $this->setValue(OW::getLanguage()->text('base', 'form_element_submit_default_value'));
        $this->decorator = $decorator;
    }

    public function renderInput($params = null) {
        parent::renderInput($params);

        $this->addAttribute('value', $this->getValue());

        if($params === null) {
            $params = array();
        }

        $params = array_merge($params, $this->attributes);
        $params['label'] = $params['value'];

        if($this->decorator !== false) {
            $output = OW::getThemeManager()->processDecorator($this->decorator, $params);
        } else {
            $output = UTIL_HtmlTag::generateTag('input', $params);
        }

        return $output;
    }
}


