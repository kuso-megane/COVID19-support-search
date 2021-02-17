<?php 

use myapp\viewModel\ViewModelInterface;

const VIEW_FILE_PATH = '/var/www/html/views/';

/**
 * This renders views/{controller}/{action}.php via views/templates/{controller}Template.php
 * 
 * @param ViewModelInterface $vm
 * @param string $controller
 * @param string $action
 * 
 * @return void
 */
function render(ViewModelInterface $vm, string $controller, string $action)
{
    
    $mainView = VIEW_FILE_PATH. $controller. '/'. $action. '.php'; // absolute path to main view file
    
    require VIEW_FILE_PATH. 'templates/'. $controller. 'Template.php';
}