<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2018 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class VALIDATOR_Date extends FORM_Validator
{
    protected $minDate;
    protected $maxDate;
    protected $minYear;
    protected $maxYear;

    public function __construct($params = array()) {
        if(isset($params['minDate'])) {
            $this->setMinDate($params['minDate']);
        }
        if(isset($params['maxDate'])) {
            $this->setMaxDate($params['maxDate']);
        }
        if(isset($params['minYear'])) {
            $this->setMinYear($params['minYear']);
        }
        
        if(isset($params['maxYear'])) {
            $this->setMaxYear($params['maxYear']);
        }        

        $error = OW::getLanguage()->text('base', 'form_validator_date_error_message');

        if(empty($error)) {
            $error = 'Date Validator Error!';
        }
        
        $this->setErrorMessage($error);
    }

    public function setMinDate($value) {
        $this->minDate = $value;
    }
        
    public function setMaxDate($value) {
        $this->maxDate = $value;
    }
    
    public function setMinYear($value) {
        $this->minYear = $value;
    }
        
    public function setMaxYear($value) {
        $this->maxYear = $value;
    }

    public function isValid($value) {
        if(is_array($value) || $value === null || mb_strlen(trim($value)) === 0) {
            return true;
        }

        return $this->checkValue($value);
    }

    public function checkValue($value) {
        $value = strtotime(trim($value));
        
        if(!(bool) $value) {
            return false;
        }

        if($this->minDate && (int) $value < (int) strtotime($this->minDate)) {
            return false;
        }

        if($this->maxDate && (int) $value > (int) strtotime($this->maxDate)) {
            return false;
        }
        
        if($this->minYear && (int) date("Y", $value) < (int) $this->minYear) {
            return false;
        }
        
        if($this->maxYear && (int) date("Y", $value) > (int) $this->maxYear) {
            return false;
        }

        return true;
    }
    
}


