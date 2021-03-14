<?php

OW::getRouter()->addRoute(new OW_Route('intro', 'install', 'INSTALL_CTRL_Install', 'intro'));
OW::getRouter()->addRoute(new OW_Route('requirements', 'install/requirements', 'INSTALL_CTRL_Install', 'requirements'));
OW::getRouter()->addRoute(new OW_Route('site', 'install/site', 'INSTALL_CTRL_Install', 'site'));
OW::getRouter()->addRoute(new OW_Route('db', 'install/database', 'INSTALL_CTRL_Install', 'db'));

OW::getRouter()->addRoute(new OW_Route('install', 'install/installation', 'INSTALL_CTRL_Install', 'install'));
OW::getRouter()->addRoute(new OW_Route('install-action', 'install/installation/:action', 'INSTALL_CTRL_Install', 'install'));

OW::getRouter()->addRoute(new OW_Route('plugins', 'install/plugins', 'INSTALL_CTRL_Install', 'plugins'));
OW::getRouter()->addRoute(new OW_Route('finish', 'install/security', 'INSTALL_CTRL_Install', 'finish'));
OW::getRouter()->addRoute(new OW_Route('delete', 'install/delete', 'INSTALL_CTRL_Install', 'delete'));