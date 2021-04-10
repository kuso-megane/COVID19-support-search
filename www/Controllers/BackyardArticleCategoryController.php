<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;

class BackyardArticleCategoryController extends BaseController
{
    const DIR = 'backyardArticleCategory';

    public function index()
    {
        $this->render([], self::DIR, 'index');
    }


    public function edit (array $vars)
    {
        $this->render([], self::DIR, 'edit');
    }


    public function post(array $vars)
    {
        $this->render([], self::DIR, 'post');
    }
}
