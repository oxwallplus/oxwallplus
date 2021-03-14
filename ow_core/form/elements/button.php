<?php
/*
 * @version 1.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ELEMENT_Button extends ELEMENT_Submit
{

    public function __construct($name) {
        parent::__construct($name);
        $this->decorator = false;
        //$this->addAttribute('type', 'button');
    }
}



