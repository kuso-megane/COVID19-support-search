<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;

class SearchController extends BaseController
{

    public function index(?array $vars)
    {
        require '/var/www/html/views/search/index.php';
    }



    public function result(array $vars)
    {
        require '/var/www/html/views/search/result.php';
    }
}