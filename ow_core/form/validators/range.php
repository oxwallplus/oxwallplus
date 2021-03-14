<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2018 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class VALIDATOR_Range extends FORM_Validator
{
    protected $min;
    protected $max;

    public function __construct($params = array()) {
        
        if(isset($params['min'])) {
            $this->setMin($params['min']);
        }
        if(isset($params['max'])) {
            $this->setMax($params['max']);
        }

        $error = OW::getLanguage()->text('base', 'form_validator_range_error_message');

        if(empty($error)) {
            $error = 'Range Validator Error!';
        }
        
        $this->setErrorMessage($error);
    }

    public function setMin($value) {
        $this->min = $value;
    }
        
    public function setMax($value) {
        $this->max = $value;
    }

    public function isValid($values) {
        if($values === null || mb_strlen(trim($values)) === 0) {
            return true;
        }
        
        if(is_array($values)) {
            if($values['from'] > $values['to']) {
                return false;
            }
            
            foreach($values as $value) {
                return $this->checkValue($value);
            }
        } else {
            return $this->checkValue($values);
        }
    }

    public function checkValue($value) {
        $value = (int) trim($value);

        if($this->min && $value < $this->min) {
            return false;
        }

        if($this->max && $value > $this->max) {
            return false;
        }

        return true;
    }
    
}


