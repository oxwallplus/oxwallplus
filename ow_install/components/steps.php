<?php

class INSTALL_CMP_Steps extends INSTALL_Component
{
    public function __construct()
    {
        parent::__construct();
        
        $this->add('intro', __('Start'), 1, 5);
        $this->add('requirements', __('Server requirements'), 3, 20);
        $this->add('site', __('Site configuration'), 2, 40);
        $this->add('db', __('Database configuration'), 3, 60);
        $this->add('install', __('Install'), 1, 80);
        $this->add('plugins', __('Plugins'), 1, 90);
        $this->add('finish', __('Finish'), 1, 100);
    }
    
    public function add($key, $label, $size = 1, $progress = 0, $active = false) {
        $this->steps[$key] = array( 
            'label' => $label,
            'active' => $active,
            'size' => $size,
            'progress' => $progress,
        );
    }
    
    public function activate($key) {
        foreach($this->steps as &$step) {
            $step['active'] = false;
        }
        
        $this->steps[$key]['active'] = true;
    }
    
    public function onBeforeRender() {
        parent::onBeforeRender();
        
        $this->assign('steps', $this->steps);
    }
}