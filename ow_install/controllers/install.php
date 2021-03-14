<?php

class INSTALL_CTRL_Install extends INSTALL_ActionController
{
    public $translator;
    
    public function __construct() {
        parent::__construct();
        
        $this->translator = OW::getTranslator(INSTALL_DIR_LANG, INSTALL::getStorage()->get('language'));
        $this->setPageTitle($this->translator->translate('Instalation Oxwall Plus platform'));
    }
    
    public function init($dispatchAttrs = null, $dbReady = null) {
        if($dbReady && $dispatchAttrs["action"] != "finish") {
            $this->redirect(OW::getRouter()->urlForRoute("finish"));
        }
    }
    
    public function intro() {
        $this->setPageHeading($this->translator->translate('Start'));
        INSTALL::getStepIndicator()->activate('intro');

    }

    public function requirements() { 
        $this->setPageHeading($this->translator->translate('Server requirements'));
        INSTALL::getStepIndicator()->activate('requirements');
        
        $requirements = array();
        
        // check php version
        $errors = array();
        if(version_compare(PHP_VERSION, '5.5.0') < 0) {
            $errors['php'] = true;
        }
        $requirements['php'] = array('label' => $this->translator->translate('PHP version'), 'min' => '5.5', 'current' => phpversion(), 'error' => isset($errors['php']) ? true : false);
        
        // check cUrl
        if(!extension_loaded('curl')) {
            $errors['curl'] = true;
        }
        $requirements['curl'] = array('label' => $this->translator->translate('cUrl'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['curl']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['curl']) ? true : false);
        if(function_exists('apache_get_modules')) {
            // check mod_rewrite
            if(!in_array('mod_rewrite', apache_get_modules())) {
                $errors['mod_rewrite'] = true;
            }
            $requirements['mod_rewrite'] = array('label' => $this->translator->translate('mod_rewrite'), 'min' => $this->translator->translate('mod_rewrite'), 'current' => isset($errors['mod_rewrite']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['mod_rewrite']) ? true : false);
        }
        // check fopen
        if(!ini_get('allow_url_fopen')) {
            $errors['fopen'] = true;
        }
        $requirements['fopen'] = array('label' => $this->translator->translate('fopen'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['fopen']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['fopen']) ? true : false);
        
        // check register_globals
        if(ini_get('register_globals')) {
            $errors['register_globals'] = true;
        }
        $requirements['register_globals'] = array('label' => $this->translator->translate('register_globals'), 'min' => $this->translator->translate('Off'), 'current' => isset($errors['register_globals']) ? $this->translator->translate('On') : $this->translator->translate('Off'), 'error' => isset($errors['register_globals']) ? true : false);
           
        // check safe_mode
        if(ini_get('safe_mode')) {
            $errors['safe_mode'] = true;
        }
        $requirements['safe_mode'] = array('label' => $this->translator->translate('safe_mode'), 'min' => $this->translator->translate('Off'), 'current' => isset($errors['safe_mode']) ? $this->translator->translate('On') : $this->translator->translate('Off'), 'error' => isset($errors['safe_mode']) ? true : false);
           
        // check suhosin
        if(extension_loaded('suhosin')) {
            $errors['suhosin'] = true;
        }
        $requirements['suhosin'] = array('label' => $this->translator->translate('suhosin'), 'min' => $this->translator->translate('Off'), 'current' => isset($errors['suhosin']) ? $this->translator->translate('On') : $this->translator->translate('Off'), 'error' => isset($errors['suhosin']) ? true : false);
         
        // check pdo
        if(!extension_loaded('pdo')) {
            $errors['pdo'] = true;
        }
        $requirements['pdo'] = array('label' => $this->translator->translate('PDO'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['pdo']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['pdo']) ? true : false);
        
        // check mbstring
        if(!extension_loaded('mbstring')) {
            $errors['mbstring'] = true;
        }
        $requirements['mbstring'] = array('label' => $this->translator->translate('mbstring'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['mbstring']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['mbstring']) ? true : false);
        
        // check zip
        if(!extension_loaded('zip')) {
            $errors['zip'] = true;
        }
        $requirements['zip'] = array('label' => $this->translator->translate('zip'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['zip']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['zip']) ? true : false);
        
        // check zlib
        if(!extension_loaded('zlib')) {
            $errors['zlib'] = true;
        }
        $requirements['zlib'] = array('label' => $this->translator->translate('zlib'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['mbstring']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['zlib']) ? true : false);
        
        // check ftp
        if(!extension_loaded('ftp')) {
            $errors['ftp'] = true;
        }
        $requirements['ftp'] = array('label' => $this->translator->translate('FTP'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['ftp']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['ftp']) ? true : false);
        
        // check json
        if(!extension_loaded('json')) {
            $errors['json'] = true;
        }
        $requirements['json'] = array('label' => $this->translator->translate('JSON'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['json']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['json']) ? true : false);
        
        // check dom
        if(!extension_loaded('dom')) {
            $errors['dom'] = true;
        }
        $requirements['dom'] = array('label' => $this->translator->translate('DOM'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['dom']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['dom']) ? true : false);
        
        // check mysql
        if((!extension_loaded('mysql') && version_compare(PHP_VERSION, '7.0.0') < 0) || (version_compare(PHP_VERSION, '7.0.0') >= 0 && !extension_loaded('mysqlnd'))) {
            $errors['mysql'] = true;
        }
        $requirements['mysql'] = array('label' => $this->translator->translate('mysql'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['mysql']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['ftp']) ? true : false);
        
        // check openssl
        if(!extension_loaded('openssl')) {
            $errors['openssl'] = true;
        }
        $requirements['openssl'] = array('label' => $this->translator->translate('Open SSL'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['openssl']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['openssl']) ? true : false);
        
        // check gd
        if(!extension_loaded('gd')) {
            $errors['gd'] = true;
        }
        $requirements['gd'] = array('label' => $this->translator->translate('GD'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['gd']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['gd']) ? true : false);
        
        if(function_exists("gd_info")) {
            $gdInfo = gd_info();
            // gd version
            preg_match('/(\d)\.(\d)/', $gdInfo['GD Version'], $match);
            $gdVersion = $match[1];
            if($gdVersion < 2) {
                $errors['gd_version'] = true;
            }
            $requirements['gd_version'] = array('label' => $this->translator->translate('GD Library version'), 'min' => '2.0', 'current' => $gdInfo['GD Version'], 'error' => isset($errors['gd_version']) ? true : false);
        
            // gd support image type
            if(empty($gdInfo['FreeType Support'])) {
                $errors['gd_type'] = true;
            }
            $requirements['gd_type'] = array('label' => $this->translator->translate('GD FreeType support'), 'min' => $this->translator->translate('On'), 'current' => isset($errors['gd_type']) ? $this->translator->translate('Off') : $this->translator->translate('On'), 'error' => isset($errors['gd_type']) ? true : false);
        }
        
        $this->assign('requirements', $requirements);
        $this->assign('errors', $errors);
    }

    public function site() {
        $this->setPageHeading($this->translator->translate('Site configuration'));
        INSTALL::getStepIndicator()->activate('site');

        $data = array();
        $data['site_url'] = OW_URL_HOME;
        $data['site_path'] = OW_DIR_ROOT;

        $sessionData = INSTALL::getStorage()->getAll();
        $data = array_merge($data, $sessionData);        
        $errors = array();

        if(OW::getRequest()->isPost()) {
            $data = $_POST;
            $data = array_filter($data, 'trim');

            $success = true;

            if(empty($data['site_title'])) {
                $errors[] = 'site_title';
            }

            if(empty($data['site_url']) || !trim($data['site_url'])) {
                $errors[] = 'site_url';
            }

            if(empty($data['site_path']) || !is_dir($data['site_path'])) {
                $errors[] = 'site_path';
            }

            if(empty($data['admin_username']) || !UTIL_Validator::isUserNameValid($data['admin_username'])) {
                $errors[] = 'admin_username';
            }

            if(empty($data['admin_password']) || strlen($data['admin_password']) < 3) {
                $errors[] = 'admin_password';
            }

            if(empty($data['admin_email']) || !UTIL_Validator::isEmailValid($data['admin_email'])) {
                $errors[] = 'admin_email';
            }

            $this->processData($data);

            if(empty($errors)) {
                $this->redirect(OW::getRouter()->urlForRoute('db'));
            }
            $this->assign('errors', $errors);
        }
        $this->assign('data', $data);
    }

    public function db() {
        $this->setPageHeading($this->translator->translate('Database configuration'));
        INSTALL::getStepIndicator()->activate('db');

        $data = array();
        $data['db_prefix'] = 'owp_';

        $sessionData = INSTALL::getStorage()->getAll();
        $data = array_merge($data, $sessionData);

        $errors = array();

        if(OW::getRequest()->isPost()) {
            $data = $_POST;
            $data = array_filter($data, 'trim');

            $success = true;

            if(empty($data['db_host']) || !preg_match('/^[^:]+?(\:\d+)?$/', $data['db_host'])) {
                $errors[] = 'db_host';
            }

            if(empty($data['db_user'])) {
                $errors[] = 'db_user';
            }

            if(empty($data['db_name'])) {
                $errors[] = 'db_name';
            }

            if(empty($data['db_prefix'])) {
                $errors[] = 'db_prefix';
            }

            $this->processData($data);

            if(empty($errors)) {
                $hostInfo = explode(':', $data['db_host']);

                try {
                    $dbo = OW_Database::getInstance(array(
                        'host' => $hostInfo[0],
                        'port' => empty($hostInfo[1]) ? null : $hostInfo[1],
                        'username' => $data['db_user'],
                        'password' => empty($data['db_password']) ? '' : $data['db_password'],
                        'dbname' => $data['db_name']
                    ));

                    $existingTables = $dbo->queryForColumnList("SHOW TABLES LIKE '{$data['db_prefix']}base_%'");

                    if(!empty($existingTables)) {
                        $errors['message'] = $this->translator->translate('This database should be empty _especially_ if you try to reinstall Oxwall Plus.');
                    }
                } catch(InvalidArgumentException $e) {
                    $errors['message'] = $this->translator->translate('Could not connect to Database').'<br />'.$this->translator->translate('Error: ').$e->getMessage();
                }
            }

            if(empty($errors)) {
                $this->redirect(OW::getRouter()->urlForRoute('install'));
            }
            
            $this->assign('errors', $errors);

        }
        $this->assign('data', $data);
    }

    public function install($params = array()) {
        $this->setPageHeading($this->translator->translate('Installation'));
        INSTALL::getStepIndicator()->activate('install');
        
        $action = isset($params["action"]) ? $params["action"] : 'chmod';
        $this->assign('action', $action);
        $data = INSTALL::getStorage()->getAll();
        
        if($action == 'chmod') {
            $dirs = array(
                OW_DIR_PLUGINFILES,
                OW_DIR_USERFILES,
                OW_DIR_STATIC,
                OW_DIR_SMARTY . 'template_c' . DS,
                OW_DIR_LOG
            );

            $checkDirs = array();
            $errorDirs = array();
            $chmods = $this->checkWritable($dirs, $checkDirs, $errorDirs);
            $this->assign('dirs', $chmods['dirs']);
            $this->assign('errors', $chmods['errors']);     
        }
        if($action == 'config') {
            $configFile = OW_DIR_INC . 'config.php';
            
            $configContent = file_get_contents(INSTALL_DIR_FILES . 'config.txt');
            
            $hostInfo = explode(':', $data['db_host']);
            $data['db_host'] = $hostInfo[0];
            $data['db_port'] = empty($hostInfo[1]) ? 'null' : '"' . $hostInfo[1] . '"';
            $data['db_password'] = empty($data['db_password']) ? '' : $data['db_password'];
            $data['password_salt'] = UTIL_String::getRandomString(16);

            $search = array();
            $replace = array();

            foreach($data as $name => $value ) {
                $search[] = '{$' . $name . '}';
                $replace[] = $value;
            }

            if(!file_exists($configFile)) {
                $fh = fopen($configFile, "w");
                fclose($fh);
            }
                
            $configContent = str_replace($search, $replace, $configContent);
            try {
                if(is_writable($configFile) && !isset($_GET['error'])) {
                    file_put_contents($configFile, $configContent);
                    $this->redirect(OW::getRouter()->urlForRoute("install-action", array('action' => 'languages')));
                }
            } catch(InvalidArgumentException $e) {
                
            }
            $this->assign('error', true);
            $this->assign('configContent', $configContent);
        }
        if($action == 'db') {
            try {
                $hostInfo = explode(':', $data['db_host']);

                $dbo = OW_Database::getInstance(array(
                    'host' => $hostInfo[0],
                    'port' => empty($hostInfo[1]) ? null : $hostInfo[1],
                    'username' => $data['db_user'],
                    'password' => empty($data['db_password']) ? '' : $data['db_password'],
                    'dbname' => $data['db_name']
                ));
                $files = INSTALL::getTableDBList();
                $tables = array();
                $error = false;
                foreach($files as $file) {
                    if($dbo->queryForColumnList("SHOW TABLES LIKE '".$data['db_prefix'].$file."'")) {
                        $tables[] = array('name' => $file, 'status' => $this->translator->translate('OK'), 'error' => false);
                    } else {
                        if($this->sqlImport($dbo, $data['db_prefix'], INSTALL_DIR_FILES.'db/'.$file.'.sql')) {
                            $tables[] = array('name' => $file, 'status' => $this->translator->translate('OK'), 'error' => false);
                        } else {
                            $error = true;
                            $tables[] = array('name' => $file, 'status' => $this->translator->translate('ERROR'), 'error' => true);
                        }
                    }
                }
                
            } catch(InvalidArgumentException $e) {
                
            }
                        
            $this->assign('tables', $tables);
            $this->assign('error', $error);
        }
        if($action == 'languages') {
            $localizationService = LOCALIZATION_BOL_LanguageService::getInstance();
            $localizationService->importPrefixFromDir(OW_DIR_LANG, true, true);
            $localizationService->generateCacheForAllActiveLanguages();
            $this->redirect(OW::getRouter()->urlForRoute('plugins'));
        }
    }

    private function checkWritable($dirs, &$checkDirs, &$errorDirs) {
        foreach ($dirs as $dir) {
            $chmod = substr(sprintf('%o', fileperms($dir)), -4);
            $checkDirs[] = array('dir' => $dir, 'chmod' => $chmod);
            if($chmod != '0777') {
                $errorDirs[] = array('dir' => $dir, 'chmod' => $chmod);
            }

            $handle = opendir($dir);
            $subDirs = array();
            while(($item = readdir($handle)) !== false) {
                if($item === '.' || $item === '..') {
                    continue;
                }

                $path = $dir . $item;

                if(is_dir($path)) {
                    $subDirs[] = $path . DS;
                }
            }

            $this->checkWritable($subDirs, $checkDirs, $errorDirs);
        }
        
        return array('dirs' => $checkDirs, 'errors' => $errorDirs);
    }

    public function plugins() {        
        $this->setPageHeading($this->translator->translate('Plugins'));
        INSTALL::getStepIndicator()->activate('plugins');
        
        $avaliablePlugins = $this->getPluginsForInstall();
        $errorPlugins = array();
        
        if(OW::getRequest()->isPost()) {
            $plugins = !isset($_POST['plugins']) ? array() : $_POST['plugins'];

            $installPlugins = array();

            foreach($plugins as $pluginKey) {
                if(!empty($avaliablePlugins[$pluginKey])) {
                    $installPlugins[$pluginKey] = $avaliablePlugins[$pluginKey]['plugin'];
                }
            }

            $errorPlugins = $this->installPlugins($installPlugins);
            if($errorPlugins === null) {
                $this->redirect(OW::getRouter()->urlForRoute('finish'));
            }
        }
        $this->assign('plugins', $avaliablePlugins);
        $this->assign('errors', $errorPlugins);
    }

    public function finish() {
        $this->setPageHeading($this->translator->translate('Installation complete'));
        INSTALL::getStepIndicator()->activate('finish');
    }
    
    public function delete() {
        if($this->installComplete()) {
            OW::getConfig()->saveConfig('base', 'site_installed', 1);
            UTIL_File::removeDir(OW_DIR_ROOT . "install");
            $this->redirect(OW_URL_HOME);
        }
        
        $this->setPageHeading($this->translator->translate('Installation complete'));
        INSTALL::getStepIndicator()->activate('finish');
    }
    
    private function installPlugins($installPlugins = null) {
        $notInstalledPlugins = array();
        OW::getPluginManager()->initPlugins();
        if(!empty($installPlugins)) {            
            foreach ($installPlugins as $plugin) {
                try {
                    BOL_PluginService::getInstance()->install($plugin['key'], false);
                    OW::getPluginManager()->readPluginsList();
                } catch(LogicException $e) {
                    $notInstalledPlugins[] = $plugin['key'];
                }
            }
        }
    }

    private function installComplete() {
        
        if(!OW::getConfig()->getValue('base', 'site_installed')) {
            $storage = INSTALL::getStorage();

            $username = $storage->get('admin_username');
            $password = $storage->get('admin_password');
            $email = $storage->get('admin_email');

            $user = BOL_UserService::getInstance()->createUser($username, $password, $email, null, true);

            $realName = ucfirst($username);
            BOL_QuestionService::getInstance()->saveQuestionsData(array('realname' => $realName), $user->id);

            BOL_AuthorizationService::getInstance()->addAdministrator($user->id);
            OW::getUser()->login($user->id);

            OW::getConfig()->saveConfig('base', 'site_name', $storage->get('site_title'));
            OW::getConfig()->saveConfig('base', 'site_tagline', $storage->get('site_tagline'));
            OW::getConfig()->saveConfig('base', 'site_email', $email);
            
            return true;
        }
        
        return false;
    }

    private function getPluginsForInstall() {
        $pluginForInstall = INSTALL::getPredefinedPluginList();
        $plugins = BOL_PluginService::getInstance()->getAvailablePluginsList();
        $pluginList = array();

        foreach($pluginForInstall as $plugin => $mode) {
            $pluginInfo = null;
            if(isset($plugins[$plugin])) {
                $pluginInfo = $plugins[$plugin];
                $installed = false;
            } else {
                $installedPlugin = BOL_PluginService::getInstance()->findPluginByKey($plugin);
                if($installedPlugin) {
                    $pluginInfo = array('name' => $installedPlugin->title, 'key' => $installedPlugin->key, 'description' => $installedPlugin->description, 'build' => $installedPlugin->build);
                    $installed = true;
                }
            }
            if($pluginInfo) {
                $pluginList[$plugin] = array(
                    'plugin' => $pluginInfo,
                    'auto' =>  $mode,
                    'installed' => $installed,
                );
            }
        }
        return $pluginList;
    }
    
    private static function sqlImport($dbo, $prefix, $sqlFile)
    {
        if(!($fd = @fopen($sqlFile, 'rb'))) {
            throw new LogicException('SQL dump file `'.$sqlFile.'` not found');
        }
        
        $error = false; 
        $lineNo = 0;
        $query = '';
        while (false !== ($line = fgets($fd, 10240))) {
            $lineNo++;

            if(!strlen(($line = trim($line))) || $line{0} == '#' || $line{0} == '-' || preg_match('~^/\*\!.+\*/;$~siu', $line)) {
                continue;
            }

            $query .= $line;

            if($line{strlen($line)-1} != ';') {
                continue;
            }

            $query = str_replace('%%TBL-PREFIX%%', $prefix, $query);
            try {
                $dbo->query($query);
            } catch (InvalidArgumentException $e ) {
                return false;
            }
            $query = '';
        }

        fclose($fd);
        return true;
    }

    public function processData($data) {
        foreach($data as $name => $value) {
            INSTALL::getStorage()->set($name, $value);
        }
    }
}
