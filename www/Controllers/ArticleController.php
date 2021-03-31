<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\article\_list\Interactor as ListInteractor;
use domain\article\show\Interactor as ShowInteractor;
use myapp\config\AppConfig;

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
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(ShowInteractor::class);
        $vm = $interactor->interact($vars);

        if ($vm === AppConfig::INVALID_PARAMS) {
            return FALSE;
        }
        else {
            $this->render($vm, 'article', 'show');
        }
    }
}
