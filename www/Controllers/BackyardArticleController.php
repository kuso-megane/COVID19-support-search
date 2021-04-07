<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;

class BackyardArticleController extends BaseController
{
    public function index()
    {
        $this->render([], 'backyardArticle', 'index');
    }

    
    public function edit(array $vars)
    {

    }


    public function post(array $vars)
    {
        
    }
}
