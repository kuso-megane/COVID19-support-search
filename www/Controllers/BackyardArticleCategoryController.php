<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\backyardArticleCategory\index\Interactor as IndexInteractor;
use domain\backyardArticleCategory\edit\Interactor as EditInteractor;
use myapp\config\AppConfig;

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
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(EditInteractor::class);
        $vm =  $interactor->interact($vars);

        if ($vm === AppConfig::INVALID_PARAMS) {
            return FALSE;
        }
        else {
            $this->render($vm, self::DIR, 'edit');
        }
        
    }


    public function post(array $vars)
    {
        $this->render([], self::DIR, 'post');
    }
}
