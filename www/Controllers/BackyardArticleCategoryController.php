<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\backyardArticleCategory\index\Interactor as IndexInteractor;

class BackyardArticleCategoryController extends BaseController
{
    const DIR = 'backyardArticleCategory';

    public function index()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(IndexInteractor::class);
        $vm = $interactor->interact();
        $this->render($vm, self::DIR, 'index');
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
