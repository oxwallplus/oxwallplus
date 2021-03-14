<?php
/*
 * @version 1.0
 * @copyright Copyright (C) 2018 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class VALIDATOR_Filesize extends FORM_Validator
{
    protected $units  = array(
        'kb' => 1024,
        'mb' => 1048576,
        'gb' => 1073741824,
    );
    
    protected $min;
    protected $max;
    protected $unit = 1;

    public function __construct($params) {
        if(!isset($params['min']) && !isset($params['max'])) {
            throw new InvalidArgumentException('You must set min or max filesize!');
        }
        
        if(isset($params['unit'])) {
            $this->setUnit($params['unit']);
        }
        
        if(isset($params['min'])) {
            $this->setMin($params['min']);
        }
        
        if(isset($params['max'])) {
            $this->setMax($params['max']);
        }        

        $error = OW::getLanguage()->text('base', 'form_validator_filesize_error_message');

        if(empty($error)) {
            $error = 'Filesize Validator Error!';
        }
        
        $this->setErrorMessage($error);
    }

    public function setMin($value) {
        $this->min = $value * $this->unit;
    }
        
    public function setMax($value) {
        $this->max = $value * $this->unit;
    }
    
    public function setUnit($value) {
        $value = strtolower($value);
        if(isset($this->units[$value])) {
            $this->unit = $this->units[$value];
        }
    }

    public function isValid($value) {
        if(is_array($value) || $value === null || mb_strlen(trim($value)) === 0) {
            return true;
        }

        return $this->checkValue($value);
    }

    public function checkValue($value) {
        $value = trim($value);

        if(isset($this->min) && (int) $value < (int) $this->min) {
            return false;
        }

        if(isset($this->max) && (int) $value > (int) $this->max) {
            return false;
        }

        return true;
    }
    
}


