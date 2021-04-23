<?php
/*
 * @since 2.0.0
 * @copyright Copyright (C) 2021 ArtMedia. All rights reserved.
 * @license OSCL, see http://www.oxwallplus.com/license
 * @website http://artmedia.biz.pl
 * @author Arkadiusz Tobiasz
 * @email kontakt@artmedia.biz.pl
 */
abstract class OW_BackendController extends OW_ActionController
{
    public function __construct()
    {
        parent::__construct();

        if (!OW::getUser()->isAdmin()) {
            throw new AuthenticateException();
        }

        if (!OW::getRequest()->isAjax()) {
            $document = OW::getDocument();
            $document->setMasterPage(new OW_BackendLayout());
            $this->setPageTitle(OW::getLanguage()->text('admin', 'page_default_title'));
        }
    }
}
