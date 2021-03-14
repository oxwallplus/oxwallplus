<?php
/**
 * Form element: Textarea.
 *
 * @author Sardar Madumarov <madumarov@gmail.com>
 * @package ow_core
 * @since 1.0
 */

class ELEMENT_Textarea extends ELEMENT_Invitation
{
    
    public function __construct($name) {
        parent::__construct($name);
    }
    
    public function getElementJs() {
        $jsString = "var formElement = new OwTextArea(" . json_encode($this->getId()) . ", " . json_encode($this->getName()) . ");";

        return $jsString.$this->generateValidatorAndFilterJsCode("formElement");
    }

    /**
     * @see FormElement::renderInput()
     *
     * @param array $params
     * @return string
     */
    public function renderInput($params = null) {
        parent::renderInput($params);

        if($this->getValue() !== null) {
            $this->addAttribute('value', $this->getValue());
        }

        if($this->getHasInvitation()) {
            $this->addAttribute('placeholder', $this->getInvitation());
        }

        $content = $this->getAttribute('value');
        $this->removeAttribute('value');

        $markup = UTIL_HtmlTag::generateTag('textarea', $this->attributes, true, $content);

        return $markup;
    }
}