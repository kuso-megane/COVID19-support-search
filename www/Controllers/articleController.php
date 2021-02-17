<?php

namespace myapp\controllers;

require 'viewFilePath.php';


class ArticleController
{


    public function show(array $vars)
    {
        //modelから記事情報を持ってくる
        //$data = 

        require VIEW_FILE_PATH.'article/show.php';
    }
 
}