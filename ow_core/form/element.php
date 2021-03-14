<?php
/**
 * EXHIBIT A. Common Public Attribution License Version 1.0
 * The contents of this file are subject to the Common Public Attribution License Version 1.0 (the “License”);
 * you may not use this file except in compliance with the License. You may obtain a copy of the License at
 * http://www.oxwall.org/license. The License is based on the Mozilla Public License Version 1.1
 * but Sections 14 and 15 have been added to cover use of software over a computer network and provide for
 * limited attribution for the Original Developer. In addition, Exhibit A has been modified to be consistent
 * with Exhibit B. Software distributed under the License is distributed on an “AS IS” basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for the specific language
 * governing rights and limitations under the License. The Original Code is Oxwall software.
 * The Initial Developer of the Original Code is Oxwall Foundation (http://www.oxwall.org/foundation).
 * All portions of the code written by Oxwall Foundation are Copyright (c) 2011. All Rights Reserved.

 * EXHIBIT B. Attribution Information
 * Attribution Copyright Notice: Copyright 2011 Oxwall Foundation. All rights reserved.
 * Attribution Phrase (not exceeding 10 words): Powered by Oxwall community software
 * Attribution URL: http://www.oxwall.org/
 * Graphic Image as provided in the Covered Code.
 * Display of Attribution Information is required in Larger Works which are defined in the CPAL as a work
 * which combines Covered Code or portions thereof with code not governed by the terms of the CPAL.
 */

/**
 * Base form element class.
 *
 * @author Sardar Madumarov, Sergey Pryadkin <madumarov@gmail.com, GiperProger@gmail.com>
 * @package ow_core
 * @since 1.0
 */

abstract class FORM_Element
{
    const ATTR_DISABLED = 'disabled';
    const ATTR_CLASS = 'class';
    const ATTR_MAXLENGTH = 'maxlength';
    const ATTR_CHECKED = 'checked';
    const ATTR_READONLY = 'readonly';
    const ATTR_SIZE = 'size';
    const ATTR_SELECTED = 'selected';

    /**
     * Added validators.
     *
     * @var array
     */
    protected $validators = array();

    /**
     * Added filters
     * 
     * @var type 
     */
    protected $filters = array();

    /**
     * Required attribute flag.
     *
     * @var boolean
     */
    protected $required = false;

    /**
     * Form element value.
     *
     * @var mixed
     */
    protected $value;

    /**
     * Validator errors.
     *
     * @var array
     */
    protected $errors = array();

    /**
     * Form element label.
     *
     * @var string
     */
    protected $label;

    /**
     * Form element description.
     *
     * @var string
     */
    protected $description;

    /**
     * Form element attributes.
     *
     * @var array
     */
    protected $attributes = array();
    protected $label_attributes = array();

    /**
     * Constructor.
     *
     * @param string $name
     * @throws InvalidArgumentException
     */
    public function __construct($name) {
        if($name === null || !$name || strlen(trim($name)) === 0) {
            throw new InvalidArgumentException('Invalid form element name!');
        }

        $this->setName($name);
        $this->addAttribute('class', 'form-control');
        $this->setId(UTIL_HtmlTag::generateAutoId('input'));
    }

    /**
     * Returns form element ID.
     *
     * @return string
     */
    public function getId() {
        return isset($this->attributes['id']) ? $this->attributes['id'] : null;
    }

    /**
     * @param string $id
     * @return FormElement
     * @throws InvalidArgumentException
     */
    public function setId($id) {
        if($id === null || strlen(trim($id)) === 0) {
            throw new InvalidArgumentException('Invalid form element id!');
        }

        $this->attributes['id'] = trim($id);
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * @param string $label
     * @return FormElement
     */
    public function setLabel($label, $attributes = array()) {
        if($label === null) {
            throw new InvalidArgumentException('Invalid label was provided!');
        }

        $this->label = trim($label);
        if($attributes) {
             $this->label_attributes = $attributes;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     * @return FormElement
     * @throws InvalidArgumentException
     */
    public function setDescription($description) {
        if($description === null) {
            throw new InvalidArgumentException('Invalid form element description!');
        }

        $this->description = trim($description);
        return $this;
    }

    /**
     * @return string
     */
    public function getName() {
        return isset($this->attributes['name']) ? $this->attributes['name'] : null;
    }

    /**
     * @param string $name
     * @return FormElement
     */
    public function setName($name) {
        if($name === null || strlen(trim($name)) === 0) {
            throw new InvalidArgumentException('Form element invalid name!');
        }

        $this->attributes['name'] = trim($name);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Sets additional form element attributes.
     *
     * @param string $name
     * @param string $value
     * @return FormElement
     */
    public function addAttribute($name, $value = null) {
        $name = trim($name);

        if($name == 'class' && isset($this->attributes['class'])) {
            $this->attributes['class'] = $this->attributes['class'] . ' ' . $value;
        }

        if($value === null)  {
            $this->attributes[$name] = trim($name);
        } else {
            $this->attributes[$name] = trim($value);
        }
        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getAttribute($name) {
        $name = trim($name);

        if(isset($this->attributes[$name])) {
            return $this->attributes[$name];
        }

        return false;
    }

    /**
     * Adds form element attributes.
     *
     * @param array $attributes
     * @return FormElement
     * @throws InvalidArgumentException
     */
    public function addAttributes($attributes) {
        if(!is_array($attributes)) {
            throw new InvalidArgumentException('Array is expected!');
        }

        foreach($attributes as $name => $value) {
            $this->addAttribute($name, $value);
        }
        return $this;
    }

    /**
     * Removes form element attribute.
     *
     * @param string $name
     * @return FormElement
     */
    public function removeAttribute($name) {
        if(isset($this->attributes[trim($name)])) {
            unset($this->attributes[trim($name)]);
        }
        return $this;
    }

    public function addFilter(OW_IFilter $filter) {
        $this->filters[] = $filter;
        return $this;
    }

    /**
     * Adds validator to form element
     *
     * @param mixed
     * @return FormElement
     * @throws InvalidArgumentException
     */
    public function addValidator($validator) {
        if(!$validator instanceof OW_Validator &&  !$validator instanceof FORM_Validator) {
            throw new InvalidArgumentException('Provided object is not instance of Validator class!');
        }

        $this->validators[strtolower(get_class($validator))] = $validator;
        return $this;
    }

    /**
     * Adds list of validators.
     *
     * @param array $validators
     * @return FormElement
     * @throws InvalidArgumentException
     */
    public function addValidators($validators) {
        if(!is_array($validators)) {
            throw new InvalidArgumentException('Array is expected!');
        }

        foreach($validators as $validator) {
            $this->addValidator($validator);
        }
        return $this;
    }

    /**
     * Makes form element required.
     *
     * @param boolean $value
     * @return FormElement
     */
    public function setRequired($value = true) {
        if($value) {
            $this->addValidator(new RequiredValidator());
        } else {
            unset($this->validators['requiredvalidator']);
        }
        return $this;
    }

    /**
     * Sets form element value.
     *
     * @param mixed $value
     * @return FormElement
     */
    public function setValue($value) {
        /* @var $filter OW_IFilter  */
        foreach($this->filters as $filter) {
            $value = $filter->filter($value);
        }

        $this->value = $value;
        return $this;
    }

    /**
     * Returns input label.
     *
     * @return string
     */
    public function renderLabel() {
        $attributes = '';
        if($this->label_attributes) {
            foreach ($this->label_attributes as $attr => $value) {
                $attributes .= ' '.$attr.'="'.$value.'"';
            }
        }
        return '<label for="'.$this->getId().'"'.$attributes.'>'.$this->getLabel().'</label>';
    }

    /**
     * Validates form element.
     *
     * @return boolean
     */
    public function isValid() {
        /* @var $value Validator  */
        foreach ($this->validators as $validator) {
            $value = $this->getValue();
            if($validator instanceof VALIDATOR_Filesize) {
                $value = $this->getSize();
            }
            if($validator->isValid($value)) {
                continue;
            }

            $this->errors[] = $validator->getError();
        }

        return empty($this->errors);
    }

    /**
     * Returns errors string.
     *
     * @return string
     */
    public function renderErrors() {
        $errors = '';

        foreach($this->errors as $error) {
            $errors .= $error;
        }

        return $errors;
    }

    /**
     * Returns errors array.
     *
     * @return array
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * Adds error message to form element.
     *
     * @param string $error
     * @return FormElement
     */
    public function addError($error) {
        $this->errors[] = $error;
        return $this;
    }

    /**
     * Returns form element JS.
     *
     * @return string
     */
    public function getElementJs() {
        $jsString = "var formElement = new OwFormElement(" . json_encode($this->getId()) . ", " . json_encode($this->getName()) . ");";

        return $jsString . $this->generateValidatorAndFilterJsCode("formElement");
    }

    /**
     * @param string $varName
     * @return string
     */
    protected function generateValidatorAndFilterJsCode($varName) {
        $jsString = "";

        /** @var $value OW_Validator  */
        foreach ($this->validators as $value) {
            $jsString .= "{$varName}.addValidator(" . $value->getJsValidator() . ");";
        }

        /** @var $filter OW_IFilter  */
        foreach($this->filters as $filter) {
            $jsString .= "{$varName}.addFilter(" . $filter->getJsFilter() . ");";
        }

        return $jsString;
    }

    /**
     * Returns generated input html tag.
     *
     * @param array $params
     * @return string
     */
    protected function renderInput($params = null) {
        if($params !== null) {
            $this->addAttributes($params);
        }
    }
}

