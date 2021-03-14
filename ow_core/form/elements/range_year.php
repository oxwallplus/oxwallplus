<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_RangeYear extends FORM_Element
{
    protected $maxYear;
    protected $minYear;
    protected $options = array('widgetPositioning' => array('vertical' => 'bottom'));

    /**
     * Constructor.
     *
     * @param string $name
     */
    public function __construct($name) {
        parent::__construct($name);

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
        if(empty($value) || empty($value['from']) || empty($value['to'])) {
            return;
        }

        if((int) $value['from'] >= $this->minYear && (int) $value['from'] <= $this->maxYear) {
            $this->value['from'] = $value['from'];
        } else {
            $this->value['from'] = $this->minYear;
        }
        if((int) $value['to'] >= $this->minYear && (int) $value['to'] <= $this->maxYear) {
            $this->value['to'] = $value['to'];
        } else {
            $this->value['to'] = $this->maxYear;
        }
    }
    
    public function setMaxYear($year) {
        $this->options['maxDate'] = $year;
        $this->maxYear = (int) $year;
    }

    public function setMinYear($year) {
        $this->options['minDate'] = $year;
        $this->minYear = (int) $year;
    }

    public function getMaxYear() {
        return $this->maxYear;
    }

    public function getMinYear() {
        return $this->minYear;
    }

    public function renderInput($params = null) {
        parent::renderInput($params);
        
        $language = OW::getLanguage();
        
        $from = new ELEMENT_Text($this->getName().'[from]');
        if(isset($this->value['from']) && $this->value['from']) {
            $from->setValue((int) $this->value['from']);
        } else {
            if($this->minYear) {
                $from->setValue($this->minYear);
            }
        }
        $from->setPrefix($language->text('base', 'form_element_from'));
        
        $to = new ELEMENT_Text($this->getName().'[to]');
        if(isset($this->value['to']) && $this->value['to']) {
            $to->setValue((int) $this->value['to']);
        } else {
            if($this->maxYear) {
                $to->setValue($this->maxYear);
            }
        }
        $to->setPrefix($language->text('base', 'form_element_to'));
        
        OW::getDocument()->addScript(OW::getPluginManager()->getPlugin("base")->getStaticJsUrl() . 'bootstrap/moment.min.js');
        OW::getDocument()->addScript(OW::getPluginManager()->getPlugin("base")->getStaticJsUrl() . 'bootstrap/datetimepicker.min.js');
        OW::getDocument()->addStyleSheet(OW::getPluginManager()->getPlugin("base")->getStaticCssUrl() . 'bootstrap/datetimepicker.min.css');
        
        $this->options['format'] = 'YYYY';
        OW::getDocument()->addOnloadScript("
            $(function () {
                $('#".$from->getId()."').datetimepicker(".json_encode($this->options).");
                $('#".$to->getId()."').datetimepicker(".json_encode(array_merge($this->options, array('useCurrent' => false))).");
                $('#".$from->getId()."').on('dp.change', function (e) {
                    $('#".$to->getId()."').data('DateTimePicker').minDate(e.date);
                });
                $('#".$to->getId()."').on('dp.change', function (e) {
                    $('#".$from->getId()."').data('DateTimePicker').maxDate(e.date);
                });
            });
        ");
        
        $validator = new VALIDATOR_Range(array(
            'min' => $this->minYear,
            'max' => $this->maxYear,
        ));
        
        $this->addValidator($validator);
        
        $output = '<div class="form-row">
            <div class="col">'.$from->renderInput().'</div>
            <div class="col">'.$to->renderInput().'</div>
        </div>';
        
        return $output;
    }
}

