<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use myapp\config\AppConfig;
use myapp\myFrameWork\SuperGlobalVars;
use myapp\Controllers\helper\Helper;
use domain\backyardTroubleList\index\Interactor as IndexInteractor;

class BackyardTroubleListController extends BaseController
{
    const DIR =  'backyardTroubleList';

    public function index()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(IndexInteractor::class);
        $vm = $interactor->interact();


        $this->render($vm, self::DIR, 'index');
    }


    public function edit(array $vars)
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(EditInteractor::class);
        $vm = $interactor->interact($vars);

        if ($vm == AppConfig::INVALID_PARAMS) {
            return FALSE;
        }
        elseif ($vm === AppConfig::NOT_LOGIN) {
            $uri = SuperGlobalVars::getServer()['REQUEST_URI'];
            (new Helper)->redirectToAdminLoginPage($uri);
        }
        else {
            $this->render($vm, 'backyardArticle', 'edit');
        }
    }


    public function post(array $vars)
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(PostInteractor::class);
        $vm = $interactor->interact($vars);

        if ($vm === AppConfig::INVALID_PARAMS) {
            return FALSE;
        }
        elseif($vm === AppConfig::INVALID_ACCESS) {
            return FALSE;
        }
        else {
            $this->render($vm, 'backyardArticle', 'post');
        }     
    }
}