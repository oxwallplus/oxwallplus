<?php
/**
 * Form element: TextField.
 *
 * @author Sardar Madumarov <madumarov@gmail.com>
 * @package ow.core
 * @since 1.0
 */
class ELEMENT_Captcha extends FORM_Element
{
    const CAPTCHA_PREFIX = 'ow_captcha_';

    /**
     * Constructor.
     *
     * @param string $name
     */
    public function __construct($name) {
        parent::__construct($name);
    }
}

