<?php

namespace myapp\Controllers;


class ArticleController
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
