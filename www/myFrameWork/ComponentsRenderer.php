<?php

namespace myapp\myFrameWork;

use myapp\config\ViewsConfig;

class ComponentsRenderer
{
    /**
     * render views/components/$componentName.php
     * @param string $componentName
     * @param array $vm [
     *      'xxx' => $var1,
     *      'yyy' => $var2,
     *        
     * ]
     * 
     * This automatically set variables from $vm like below
     * 
     * $xxxYyy from $vm['xxxYyy']
     * 
     */
    public function render(string $componentName, array $vm)
    {
        foreach ($vm as $key => $value) {
            $$key = $value;
        }

        require ViewsConfig::COMPONENTS_PATH. $componentName . '.php';
    }
}
