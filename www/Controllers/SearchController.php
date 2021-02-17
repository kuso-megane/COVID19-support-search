<?php

namespace myapp\Controllers;

class SearchController
{

    public function index(?array $vars)
    {
        require '/var/www/html/views/search/index.php';
    }



    public function show(?array $vars)
    {
        require '/var/www/html/views/search/show.php';
    }
}