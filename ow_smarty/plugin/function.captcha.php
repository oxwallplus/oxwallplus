<?php
/*
 * @version 2.0.0
 * @copyright Copyright (C) 2016 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/oscl
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

function smarty_function_captcha($params) {

    $view = OW_ViewRenderer::getInstance();

    $form = $view->getAssignedVar('_owActiveForm_');

    if(!$form) {
        throw new InvalidArgumentException('There is no form for input `captcha` !');
    }

    $input = $form->getElement('captcha');
    if($input === null) {
        throw new LogicException('No input named `captcha` in form !');
    }

    $errors = $input->renderErrors();

    if(isset($params['bootstrap'])) {
    $output = '
    <div class="card">
        <div class="card-header">
            <i class="fa fa-lock"></i> '.(isset($params['title']) ? $params['title'] : $input->renderLabel()).'
        </div>
        <div class="card-body">
            '.$input->renderInput().'
            '.UTIL_HtmlTag::generateTag('span', array('id' => $input->getId() . '_error', 'style' => ( $errors ? 'display:block;' : 'display:none;' ), 'class' => 'error'), true, $errors).'
        </div>
    </div><br />
    ';
    } else {
        $output = '
        <tr class="ow_tr_first"><th colspan="3">'.OW::getLanguage()->text('base', 'questions_section_captcha_label').'</th></tr>
        <tr class="ow_tr_last">
            <td colspan="3" class="ow_alt1 ow_center">
                <div style="padding:10px;">
                    '.$input->renderInput().'
                    <div style="height:1px;"></div>
                    '.UTIL_HtmlTag::generateTag('span', array('id' => $input->getId() . '_error', 'style' => ( $errors ? 'display:block;' : 'display:none;' ), 'class' => 'error'), true, $errors).'
                </div>
            </td>
        </tr>
        <tr class="ow_tr_delimiter"><td></td></tr>
        ';
    }
    return $output;
}