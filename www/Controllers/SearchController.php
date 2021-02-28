<?php

namespace myapp\Controllers;

class SearchController
{

    public function index(?array $vars)
    {
        require '/var/www/html/views/search/index.php';
    }



    public function result(?array $vars)
    {
        require '/var/www/html/views/search/result.php';
    }
}