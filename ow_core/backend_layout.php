<?php
/*
 * @since 2.0.0
 * @copyright Copyright (C) 2021 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/license
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class OW_BackendLayout extends OW_MasterPage
{
    private $menuCmps = array();

    protected function init(): void
    {
        OW::getThemeManager()->setCurrentTheme(BOL_ThemeService::getInstance()->getThemeObjectByKey('bootstrap'));

        $event = new OW_Event('admin.get_soft_version_text');
        OW_EventManager::getInstance()->trigger($event);

        $version = $event->getData();

        if (!$version) {
            $version = OW::getLanguage()->text('admin', 'soft_version', array('version' => OW::getConfig()->getValue('base', 'soft_version'), 'build' => OW::getConfig()->getValue('base', 'soft_build')));
        }

        $this->assign('version', OW::getConfig()->getValue('base', 'soft_version'));
        $this->assign('build', OW::getConfig()->getValue('base', 'soft_build'));
        $this->assign('softVersion', $version);
    }

    public function onBeforeRender(): void
    {
        parent::onBeforeRender();

        $this->setTemplate(OW::getThemeManager()->getMasterPageTemplate(OW_MasterPage::TEMPLATE_ADMIN));

        $this->addComponent('menu', new ADMIN_CMP_Menu());
    }
}
