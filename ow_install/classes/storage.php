<?php

class INSTALL_Storage 
{
    private static $classInstance;
    private $storage = array();
    
    /**
     *
     * @return INSTALL_Storage
     */
    public static function getInstance() {
        if(self::$classInstance === null) {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }
        
    protected function __construct() {
        $this->storage = OW::getSession()->get('OW-INSTALL-DATA');
        
        $this->storage = empty($this->storage) ? array() : $this->storage;
    }
    
    public function __destruct() {
        if(empty($this->storage)) {
            OW::getSession()->delete('OW-INSTALL-DATA');
        } else {
            OW::getSession()->set('OW-INSTALL-DATA', $this->storage);
        }
    }
    
    public function set($name, $value) {
        $this->storage[$name] = $value;
    }
    
    public function get($name) {
        return isset($this->storage[$name]) ? $this->storage[$name] : null;
    }
    
    public function getAll() {
        return empty($this->storage) ? array() : $this->storage;
    }
    
    public function clear() {
        $this->storage = null;
    }
}