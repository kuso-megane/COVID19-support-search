<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\article\_list\Interactor as ListInteractor;

class ArticleController extends BaseController
{
    public function _list()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(ListInteractor::class);
        $vm = $interactor->interact();

        $this->render($vm, 'article', '_list');
    }


    public function show(array $vars)
    {
        require '/var/www/html/views/article/show.php';
    }
}
