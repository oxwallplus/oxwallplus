<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_Date extends ELEMENT_Invitation
{
    protected $maxYear;
    protected $minYear;
    protected $maxDate;
    protected $minDate;
    protected $dateFormat = '';
    protected $options = array();

    /**
     * Constructor.
     *
     * @param string $name
     */
    public function __construct($name) {
        parent::__construct($name);

        $this->dateFormat = UTIL_DateTime::DEFAULT_DATE_FORMAT;
        $this->setDateFormat(OW::getConfig()->getValue(LOCALIZATION_BOL_Service::KEY, 'dateFormat'));
        
        $this->setHasInvitation(date($this->getDateFormat()));
        $this->addAttribute('type', 'text');
        
        $this->options['locale'] = LOCALIZATION_BOL_LanguageService::getInstance()->getIsoCode()['code'];
    }

    /**
     * Sets form element value.
     *
     * @param mixed $value
     * @return FormElement
     */
    public function setValue($value) {
        $this->value = UTIL_DateTime::getMysqlDatetime($value);
        return $this;
    }

    public function getMinYear() {
        return $this->minYear;
    }

    public function getMaxYear() {
        return $this->maxYear;
    }
    
    public function getMinDate() {
        return $this->minDate;
    }

    public function getMaxDate() {
        return $this->maxDate;
    }

    public function getDefaultDate() {
        return $this->defaultDate;
    }

    public function getDateFormat() {
        return $this->dateFormat;
    }

    public function setMaxYear($year) {
        $this->options['maxDate'] = date($this->getDateFormat(), strtotime($year.'-12-31'));
        $this->maxYear = (int) $year;
    }

    public function setDisplayView($view = 'days') {
        $this->options['viewMode'] = $view;
    }

    public function setMinYear($year) {
        $this->options['minDate'] = date($this->getDateFormat(), strtotime($year.'-12-31'));
        $this->minYear = (int) $year;
    }
    
    public function setMaxDate($date) {
        $this->options['maxDate'] = $date;
        $this->maxDate = (int) $date;
    }
    
    public function setMinDate($date) {
        $this->options['minDate'] = $date;
        $this->minDate = (int) $date;
    }

    public function setDateFormat($format) {
        if(empty($format)) {
            throw new InvalidArgumentException('Invalid argument `$format`!');
        }

        $this->dateFormat = $format;
    }

    public function renderInput($params = null) {
        $document = OW::getDocument();
        $pluginManager = OW::getPluginManager();
        $core = CORE_BOL_Service::KEY;

        $document->addScript($pluginManager->getPlugin($core)->getStaticJsUrl() . 'moment.min.js');
        $document->addScript($pluginManager->getPlugin($core)->getStaticJsUrl() . 'bootstrap-datetimepicker.min.js');
        $document->addStyleSheet($pluginManager->getPlugin($core)->getStaticCssUrl() . 'bootstrap-datetimepicker.min.css');
        
        $this->options['format'] = UTIL_DateTime::momentDateFormat($this->getDateFormat());
        $document->addOnloadScript("
            $(function () {
                $('#".$this->getId()."').datetimepicker(".json_encode($this->options).");
            });
        ");
        
        $this->setPrefix('<i class="fa fa-calendar"></i>');
        
        $validator = new VALIDATOR_Date(array(
            'minDate' => $this->minDate,
            'maxDate' => $this->maxDate,
            'minYear' => $this->minYear,
            'maxYear' => $this->maxYear,
        ));
        
        $this->addValidator($validator);
        
        if($this->getValue() !== null) {
            $this->addAttribute('value', UTIL_DateTime::getDate($this->value, $this->dateFormat));
        }

        return parent::renderInput($params);
    }
}

