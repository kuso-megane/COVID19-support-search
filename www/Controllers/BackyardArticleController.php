<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\backyardArticle\index\Interactor as IndexInteractor;

class BackyardArticleController extends BaseController
{
    public function index()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(IndexInteractor::class);
        $vm = $interactor->interact();
        
        $this->render($vm, 'backyardArticle', 'index');
    }

    
    public function edit(array $vars)
    {

    }


    public function post(array $vars)
    {
        
    }
}
