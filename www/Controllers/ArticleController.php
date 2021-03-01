<?php

namespace myapp\Controllers;


class ArticleController
{

    public function show(array $vars)
    {
        require '/var/www/html/views/article/show.php';
    }
}