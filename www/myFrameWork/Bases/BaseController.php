<?php 

namespace myapp\myFrameWork\Bases;

use myapp\config\AppConfig;

abstract class BaseController
{
    const VIEW_FILE_PATH = '/var/www/html/views/';

    /**
     * This renders views/{controller}/{action}.php
     * 
     * 
     * @param array $vm used in viewFile
     * @param string $controller
     * @param string $action
     * 
     * @return void
     * 
     * This automatically set variables from $vm like below
     * 
     * $xxxYyy from $vm['xxxYyy']
     * 
     * 
     */
    protected function render(array $vm, string $controller, string $action)
    {
        foreach ($vm as $key => $value) {
            $$key = $value;
        }

        require $this::VIEW_FILE_PATH. $controller. '/'. $action. '.php';
    }
}
