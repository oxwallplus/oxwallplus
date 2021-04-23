<?php
/*
 * @since 2.0.0
 * @copyright Copyright (C) 2021 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/license
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */

class ADMIN_CMP_Menu extends OW_Component
{
    public function __construct()
    {
        parent::__construct();
    }

    public function onBeforeRender(): void
    {
        parent::onBeforeRender();

        $language = OW::getLanguage();
        $menu = [];
        $categories = [
            BOL_NavigationService::MENU_TYPE_ADMIN => [
                'key' => 'menu_admin',
                'icon' => 'tachometer-alt',
            ],
            BOL_NavigationService::MENU_TYPE_USERS => [
                'key' => 'menu_users',
                'icon' => 'users',
            ],
            BOL_NavigationService::MENU_TYPE_SETTINGS => [
                'key' => 'menu_settings',
                'icon' => 'cog',
            ],
            BOL_NavigationService::MENU_TYPE_APPEARANCE => [
                'key' => 'menu_appearance',
                'icon' => 'home',
            ],
            BOL_NavigationService::MENU_TYPE_PAGES => [
                'key' => 'menu_pages',
                'icon' => 'file',
            ],
            BOL_NavigationService::MENU_TYPE_PLUGINS => [
                'key' => 'menu_plugins',
                'icon' => 'puzzle-piece',
            ],
            BOL_NavigationService::MENU_TYPE_MOBILE => [
                'key' => 'menu_mobile',
                'icon' => 'mobile-alt',
            ],
        ];

        $items = BOL_NavigationService::getInstance()->findMenuItemsForMenuList(array_keys($categories));
        $route = OW::getRouter()->getUsedRoute()->getRouteName();

        foreach ($categories as $key => $category) {
            $active = false;
            foreach ($items[$key] as $item) {
                if ($item['routePath'] == $route) {
                    $active = true;
                }
            }

            $menu[$key] = [
                'label' => $language->text('admin', 'sidebar_' . $category['key']),
                'icon' => $category['icon'],
                'active' => $active,
                'items' => BOL_NavigationService::getInstance()->getMenuItems($items[$key]),
            ];
        }

        $this->assign('menu', $menu);
    }
}
