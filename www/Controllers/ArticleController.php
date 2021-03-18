<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;

class ArticleController extends BaseController
{
    public function list()
    {
        require '/var/www/html/views/article/list.php';
    }


    public function show(array $vars)
    {
        require '/var/www/html/views/article/show.php';
    }
}
