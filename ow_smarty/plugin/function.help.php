<?php
/*
 * @since 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

function smarty_function_help($params)
{
    if (!isset($params['name'])) {
        throw new InvalidArgumentException('Empty input name!');
    }
    
    $vr = OW_ViewRenderer::getInstance();
    
    /* @var $form Form */
    $form = $vr->getAssignedVar('_owActiveForm_');

    if (!$form) {
        throw new InvalidArgumentException('There is no form for input `' . $params['name'] . '` !');
    }

    $input = $form->getElement(trim($params['name']));

    if ($input === null) {
        throw new LogicException('No input named `' . $params['name'] . '` in form !');
    }

    return ($input->getDescription() ?
        UTIL_HtmlTag::generateTag('span', array('id' => $input->getId() . '_desc', 'class' => 'form-text'), true, $input->getDescription()) : '');
}
