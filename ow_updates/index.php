<?php

/**
 * EXHIBIT A. Common Public Attribution License Version 1.0
 * The contents of this file are subject to the Common Public Attribution License Version 1.0 (the “License”);
 * you may not use this file except in compliance with the License. You may obtain a copy of the License at
 * http://www.oxwall.org/license. The License is based on the Mozilla Public License Version 1.1
 * but Sections 14 and 15 have been added to cover use of software over a computer network and provide for
 * limited attribution for the Original Developer. In addition, Exhibit A has been modified to be consistent
 * with Exhibit B. Software distributed under the License is distributed on an “AS IS” basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for the specific language
 * governing rights and limitations under the License. The Original Code is Oxwall software.
 * The Initial Developer of the Original Code is Oxwall Foundation (http://www.oxwall.org/foundation).
 * All portions of the code written by Oxwall Foundation are Copyright (c) 2011. All Rights Reserved.

 * EXHIBIT B. Attribution Information
 * Attribution Copyright Notice: Copyright 2011 Oxwall Foundation. All rights reserved.
 * Attribution Phrase (not exceeding 10 words): Powered by Oxwall community software
 * Attribution URL: http://www.oxwall.org/
 * Graphic Image as provided in the Covered Code.
 * Display of Attribution Information is required in Larger Works which are defined in the CPAL as a work
 * which combines Covered Code or portions thereof with code not governed by the terms of the CPAL.
 */
define('_OW_', true);
define('DS', DIRECTORY_SEPARATOR);
define('OW_DIR_ROOT', dirname(dirname(__FILE__)) . DS);
define('UPDATE_DIR_ROOT', OW_DIR_ROOT . 'ow_updates' . DS);

require_once OW_DIR_ROOT . 'ow_includes/config.php';
require_once OW_DIR_ROOT . 'ow_includes/define.php';
require_once OW_DIR_UTIL . 'debug.php';
require_once OW_DIR_UTIL . 'string.php';
require_once OW_DIR_UTIL . 'file.php';
require_once UPDATE_DIR_ROOT . 'classes' . DS . 'autoload.php';
require_once UPDATE_DIR_ROOT . 'classes' . DS . 'error_manager.php';
require_once UPDATE_DIR_ROOT . 'classes' . DS . 'updater.php';
require_once OW_DIR_CORE . 'ow.php';
require_once OW_DIR_CORE . 'plugin.php';

spl_autoload_register(array('UPDATE_Autoload', 'autoload'));

UPDATE_ErrorManager::getInstance(true);

$autoloader = UPDATE_Autoload::getInstance();
$autoloader->addPackagePointer('BOL', OW_DIR_SYSTEM_PLUGIN . 'base' . DS . 'bol' . DS);
$autoloader->addPackagePointer('BASE_CLASS', OW_DIR_SYSTEM_PLUGIN . 'base' . DS . 'classes' . DS);
$autoloader->addPackagePointer('OW', OW_DIR_CORE);
$autoloader->addPackagePointer('UTIL', OW_DIR_UTIL);
$autoloader->addPackagePointer('UPDATE', UPDATE_DIR_ROOT . 'classes' . DS);

$db = Updater::getDbo();

OW_Auth::getInstance()->setAuthenticator(new OW_SessionAuthenticator());

/* ------------------- CORE UPDATE  ------------------------ */

$currentBuild = (int) $db->queryForColumn("SELECT `value` FROM `" . OW_DB_PREFIX . "base_config` WHERE `key` = 'base' AND `name` = 'soft_build'");

$currentXmlInfo = (array) simplexml_load_file(OW_DIR_ROOT . 'info.xml');

if((int) $currentXmlInfo['build'] > $currentBuild) {
    $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = 1 WHERE `key` = 'base' AND `name` = 'maintenance'");

    $owpUpdateDir = UPDATE_DIR_ROOT . 'updates' . DS;
    $updateDirList = array();
    $changelogs = array();
    $handle = opendir($owpUpdateDir);
    while(($item = readdir($handle)) !== false) {
        if($item === '.' || $item === '..') {
            continue;
        }

        $dirPath = $owpUpdateDir . ((int) $item);

        if(file_exists($dirPath) && is_dir($dirPath)) {
            $updateDirList[] = (int) $item;
        }
    }

    sort($updateDirList);

    foreach($updateDirList as $item) {
        if($item > $currentBuild) {
            include($owpUpdateDir . $item . DS . 'update.php');
            $changelog = $owpUpdateDir . $item . DS .'changelog.txt';
            if(file_exists($changelog)) {
                $content = file_get_contents($changelog);
                $changelogs[] = array(
                    'version' => $currentXmlInfo['version'],
                    'build' => $currentXmlInfo['build'],
                    'content' => $content
                );
            }
            
            $langDir = $owpUpdateDir . $item . DS . "langs";
            if(file_exists($langDir) && is_dir($langDir)) {
                Updater::getLanguageService()->importPrefixFromDir($langDir, true);
            }
        }

//        $updateXmlInfo = (array) simplexml_load_file($owpUpdateDir . $item . DS . 'update.xml');

        $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = :build WHERE `key` = 'base' AND `name` = 'soft_build'", array('build' => $currentXmlInfo['build']));
        $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = :version WHERE `key` = 'base' AND `name` = 'soft_version'", array('version' => $currentXmlInfo['version']));
    }

    $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = 0 WHERE `key` = 'base' AND `name` = 'update_soft'");
    $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = 0 WHERE `key` = 'base' AND `name` = 'maintenance'");
    $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = 1 WHERE `key` = 'base' AND `name` = 'dev_mode'");

    $entries = UPDATER::getLogger()->getEntries();

    if(!empty($entries)) {
        $query = "INSERT INTO `" . OW_DB_PREFIX . "base_log` (`message`, `type`, `key`, `timeStamp`) VALUES (:message, 'ow_update', 'core', :time)";
        try {
            $db->query($query, array('message' => json_encode($entries), 'time' => time()));
        } catch(Exception $e) {

        }
    }
}

/* ----------------- CORE UPDATE END ------------------------ */

/* ----------------- PLUGIN UPDATE ------------------------ */

if(!empty($_GET['plugin'])) {
    $query = "SELECT * FROM `" . OW_DB_PREFIX . "base_plugin` WHERE `key` = :key";
    $result = $db->queryForRow($query, array('key' => trim($_GET['plugin'])));

    // plugin not found
    if(empty($result)) {
        $mode = 'plugin_empty';
        $hcMessage = "Error! Plugin '<b>" . htmlspecialchars($_GET['plugin']) . "</b>' not found.";
    } else {
        $xmlInfoArray = (array) simplexml_load_file(OW_DIR_ROOT . 'ow_plugins' . DS . $result['module'] . DS . 'plugin.xml');

        if((int) $xmlInfoArray['build'] > (int) $result['build']) {
            $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = 1 WHERE `key` = 'base' AND `name` = 'maintenance'");

            $owpUpdateDir = OW_DIR_ROOT . 'ow_plugins' . DS . $result['module'] . DS . 'update' . DS;

            $updateDirList = array();

            if(file_exists($owpUpdateDir)) {
                $handle = opendir($owpUpdateDir);

                while(($item = readdir($handle)) !== false) {
                    if($item === '.' || $item === '..') {
                        continue;
                    }

                    if(file_exists($owpUpdateDir . ((int) $item)) && is_dir($owpUpdateDir . ((int) $item))) {
                        $updateDirList[] = (int) $item;
                    }
                }

                sort($updateDirList);

                foreach($updateDirList as $item) {
                    if((int) $item > (int) $result['build']) {
                        include($owpUpdateDir . $item . DS . 'update.php');
                        $query = "UPDATE `" . OW_DB_PREFIX . "base_plugin` SET `build` = :build, `update` = 0 WHERE `key` = :key";
                        $db->query($query, array('build' => (int) $item, 'key' => $result['key']));
                    }
                }
            }

            $entries = UPDATER::getLogger()->getEntries();
            if(!empty($entries)) {
                $query = "INSERT INTO `" . OW_DB_PREFIX . "base_log` (`message`, `type`, `key`, `timeStamp`) VALUES (:message, 'ow_update', :key, :time)";
                try {
                    $db->query($query, array('message' => json_encode($entries), 'key' => $result['key'], 'time' => time()));
                } catch(Exception $e) {
                    
                }
            }

            $query = "UPDATE `" . OW_DB_PREFIX . "base_plugin` SET `build` = :build, `update` = 0, `title` = :title, `description` = :desc WHERE `key` = :key";
            $db->query($query, array('build' => (int) $xmlInfoArray['build'], 'key' => $result['key'], 'title' => $xmlInfoArray['name'], 'desc' => $xmlInfoArray['description']));

            $mode = 'plugin_update_success';
            $hcMessage = "Update Complete! Plugin '<b>" . $result['key'] . "</b>' successfully updated.";

            $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = 0 WHERE `key` = 'base' AND `name` = 'maintenance'");
            $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = 59 WHERE `key` = 'base' AND `name` = 'dev_mode'");
        } else {
            $db->query("UPDATE `" . OW_DB_PREFIX . "base_plugin` SET `update` = 0 WHERE `key` = :key", array('key' => $result['key']));
            $mode = 'plugin_up_to_date';
            $hcMessage = "Error! Plugin '<b>" . $result['key'] . "</b>' is up to date.";
        }
    }

    // update result actions
    if(!empty($_GET['back-uri'])) {
        $url = build_url_query_string(OW_URL_HOME . urldecode($_GET['back-uri']), array('plugin' => $_GET['plugin'], 'mode' => $mode));
        Header("HTTP/1.1 301 Moved Permanently");
        Header("Location: " . $url);
        exit;
    } else  {
        echo complete_theme(false);
        exit;
    }
}

/* ------------------ PLUGIN UPDATE END -------------------- */


/* ----------------- THEME UPDATE ------------------------ */

if(!empty($_GET['theme'])){
    $query = "SELECT * FROM `" . OW_DB_PREFIX . "base_theme` WHERE `key` = :key";
    $result = $db->queryForRow($query, array('key' => trim($_GET['theme'])));

    // theme not found
    if(empty($result)) {
        $mode = 'theme_empty';
        $hcMessage = "Error! Theme '<b>" . htmlspecialchars($_GET['theme']) . "</b>' not found.";
    } else {
        $xmlInfoArray = (array) simplexml_load_file(OW_DIR_ROOT . 'ow_themes' . DS . $result['key'] . DS . 'theme.xml');
        if((int) $xmlInfoArray['build'] > (int) $result['build']) {
            $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = 1 WHERE `key` = 'base' AND `name` = 'maintenance'");

            $entries = UPDATER::getLogger()->getEntries();
            if(!empty($entries)) {
                $query = "INSERT INTO `" . OW_DB_PREFIX . "base_log` (`message`, `type`, `key`, `timeStamp`) VALUES (:message, 'ow_update', :key, :time)";
                try {
                    $db->query($query, array('message' => json_encode($entries), 'key' => $result['key'], 'time' => time()));
                } catch(Exception $e) {

                }
            }

            $query = "UPDATE `" . OW_DB_PREFIX . "base_theme` SET `update` = 0 WHERE `key` = :key";
            $db->query($query, array('key' => $result['key']));

            BOL_ThemeService::getInstance()->updateThemeInfo($result['key'], true);

            $mode = 'theme_update_success';
            $hcMessage = "Update Complete! Theme '<b>" . $result['title'] . "</b>' successfully updated.";

            $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = 0 WHERE `key` = 'base' AND `name` = 'maintenance'");
            $db->query("UPDATE `" . OW_DB_PREFIX . "base_config` SET `value` = 1 WHERE `key` = 'base' AND `name` = 'dev_mode'");
        } else {
            $db->query("UPDATE `" . OW_DB_PREFIX . "base_theme` SET `update` = 0 WHERE `key` = :key", array('key' => $result['key']));
            $mode = 'theme_up_to_date';
            $hcMessage = "Error! Theme '<b>" . $result['title'] . "</b>' is up to date.";
        }
    }

    // update result actions
    if(!empty($_GET['back-uri'])) {
        $url = build_url_query_string(OW_URL_HOME . urldecode($_GET['back-uri']), array('theme' => $_GET['theme'], 'mode' => $mode));
        Header("HTTP/1.1 301 Moved Permanently");
        Header("Location: " . $url);
        exit;
    } else {
        echo complete_theme();
        exit;
    }
}

/* ------------------ THEME UPDATE END -------------------- */

if(!empty($owpUpdateDir)) {
    echo complete_theme($currentXmlInfo['version'], $changelogs);
    exit();
} else {
    echo complete_theme(false);
    exit();
}

/* ------------------- CORE UPDATE END ------------------------ */

/* functions */

function complete_theme($complete = true, $changelogs = array()) {
    $history = '';
    if($changelogs) {
        foreach($changelogs as $changelog) {
            $history .= '<p><strong>'.$changelog['version'].'</strong> ('.$changelog['build'].')<br /><pre class="text-left border">'.$changelog['content'].'</pre><br /><br />';
        }
    }
    
    $theme = '
        <!doctype html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>'.($complete ? 'Update Complete' : 'Update Request').'</title>
            <link href="/ow_static/plugins/base/css/bootstrap/bootstrap.min.css" rel="stylesheet">
            <style>
            html,
            body {
              height: 100%;
            }

            body {
              display: -ms-flexbox;
              display: flex;
              -ms-flex-align: center;
              align-items: center;
              padding-top: 40px;
              padding-bottom: 40px;
              background-color: #f5f5f5;
            }

            .update {
              width: 100%;
              max-width: 800px;
              padding: 15px;
              margin: auto;
            }
            .form-signin .form-control {
              position: relative;
              box-sizing: border-box;
              height: auto;
              padding: 10px;
              font-size: 16px;
            }
            </style>
          </head>
          <body class="text-center">
            <div class="update">
              <h1 class="h3 mb-3 font-weight-normal">'.($complete ? 'Update Complete' : 'Update Request').'</h1>
              <p>'.($complete ? 'Your version has been successfully updated to <b>' . $complete . '</b>!' : 'Your version is up to date.').'</p>
              <a class="btn btn-success" role="button" href="' . OW_URL_HOME . '">Index Page</a> <a  class="btn btn-info" role="button" href="' . OW_URL_HOME . 'admin">Admin Panel</a>
              <div class="changelog"><h2 class="h3 m-3 font-weight-normal">CHANGELOG</h2>'.$history.'</div>
              <p class="mt-5 mb-3 text-muted">&copy; 2018 <a target="_blank" href="https://oxwallplus.com">OxwallPlus</a></p>
            </form>
          </body>
        </html>
    ';
    
    return $theme;
}

function build_url_query_string($url, array $paramsToUpdate = array(), $anchor = null) {
    $requestUrlArray = parse_url($url);
    $currentParams = array();

    if(isset($requestUrlArray['query'])) {
        parse_str($requestUrlArray['query'], $currentParams);
    }

    $currentParams = array_merge($currentParams, $paramsToUpdate);

    return $requestUrlArray['scheme'] . '://' . $requestUrlArray['host'] . $requestUrlArray['path'] . '?' . http_build_query($currentParams) . ( $anchor === null ? '' : '#' . trim($anchor) );
}

function printVar($var) {
    UTIL_Debug::varDump($var);
}
