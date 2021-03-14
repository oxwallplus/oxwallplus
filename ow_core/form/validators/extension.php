<?php
/*
 * @version 1.0
 * @copyright Copyright (C) 2018 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class VALIDATOR_Extension extends FORM_Validator
{
    protected $extensions = array();

    public function __construct($extensions = null) {
        if(isset($extensions)) {
            $this->setExtensions($extensions);
        }

        $error = OW::getLanguage()->text('base', 'form_validator_extension_error_message');

        if(empty($error)) {
            $error = 'Extension Validator Error!';
        }
        
        $this->setErrorMessage($error);
    }

    public function setExtensions($extensions) {
        if(!isset($extensions)) {
            throw new InvalidArgumentException('Empty extensions!');
        }
        if(!is_array($extensions)) {
            $this->extensions[] = trim($extensions);
        } else {
            foreach($extensions as $extension) {
                $this->extensions[] = trim($extension);
            }
        }
    }

    public function isValid($value) {
        if((is_array($value) && sizeof($value) === 0) || $value === null || mb_strlen(trim($value)) === 0) {
            return true;
        }

        if(is_array($value)) {
            foreach($value as $val) {
                if(!$this->checkValue($val)) {
                    return false;
                }
            }
            return true;
        } else {
            return $this->checkValue($value);
        }
    }

    public function checkValue($value) {
        $value = trim($value);
        
        if(!UTIL_File::validate($value, $this->extensions)) {
            return false;
        }

        return true;
    }
    
    public function getJsValidator()
    {
        $js = "{
            validate: function(value) {
        	var self = this;
        	if(!value || $.trim( value ).length == 0 || ($.isArray(value) && value.length == 0)) {
                    return;
        	}
        		
        	if($.isArray(value)) {
                    $.each(value, function(i, item) {
                        self.checkValue(item);
                    });
        	} else {
                    this.checkValue(value);
        	}
            },
    	";

        $js .= "
            getErrorMessage: function() {
        	return " . json_encode($this->getError()) . "
            },
        ";

        $js .= '
            checkValue: function(value) {
                var extensions = "'.implode('|', $this->extensions).'";
            	if(!value.match(new RegExp(".(" + extensions + ")$", "i"))) {
                    throw ' . json_encode($this->getError()) . ';
        	}
            }}
        ';

        return $js;
    }
}


