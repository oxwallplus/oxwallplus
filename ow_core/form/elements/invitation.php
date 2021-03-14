<?php
/**
 * Base invitation form element class.
 *
 * @author Sardar Madumarov <madumarov@gmail.com>
 * @package ow_core
 * @since 1.0
 */

abstract class ELEMENT_Invitation extends FORM_Element
{
    protected $invitation;
    protected $hasInvitation;
    protected $prefix;
    protected $postfix;


    public function __construct($name) {
        parent::__construct($name);
        $this->setHasInvitation(false);
        $this->setInvitation(OW::getLanguage()->text('base', 'form_element_common_invitation_text'));
    }

    public function setPrefix($value) {
        $this->prefix = $value;
    }
    
    public function setPostfix($value) {
        $this->postfix = $value;
    }
    
    public function getInvitation() {
        return $this->invitation;
    }

    public function setInvitation($value) {
        $this->invitation = trim($value);
    }
    
    public function setTags() {
        $this->addAttribute('data-tags', 'true');
    }

    public function setHasInvitation($value) {
        $value = trim($value);
        if(is_bool($value)) {
            $this->hasInvitation = $value;
        } else {
            $this->hasInvitation = true;
            $this->setInvitation($value);
        }
    }

    public function getHasInvitation() {
        return $this->hasInvitation;
    }

    public function renderInput($params = null) {
        parent::renderInput($params);
        
        if($this->getHasInvitation()) {
            $this->addAttribute("placeholder", $this->getInvitation());
        }
        
        $output = '';
        if($this->prefix || $this->postfix) {
            $output .= '<div class="input-group mb-2">';
            if($this->prefix) {
                $output .= '<div class="input-group-prepend">
                    <div class="input-group-text">'.$this->prefix.'</div>
                </div>';
            }
        }

        $output .= UTIL_HtmlTag::generateTag('input', $this->attributes);
        
        if($this->prefix || $this->postfix) {
            if($this->postfix) {
                $output .= '<div class="input-group-append">
                    <div class="input-group-text">'.$this->postfix.'</div>
                </div>';
            }
            $output .= '</div>';
        }
        
        return $output;
    }
}

