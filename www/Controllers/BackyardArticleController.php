<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\backyardArticle\index\Interactor as IndexInteractor;
use domain\backyardArticle\edit\Interactor as EditInteractor;
use domain\backyardArticle\post\Interactor as PostInteractor;
use myapp\config\AppConfig;
use myapp\Controllers\helper\Helper;

class BackyardArticleController extends BaseController
{
    public function index()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(IndexInteractor::class);
        $vm = $interactor->interact();

        if ($vm === AppConfig::NOT_LOGIN) {
            (new Helper)->redirectToAdminLoginPage('/backyard/article/index');
        }

        $this->render($vm, 'backyardArticle', 'index');
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
            (new Helper)->redirectToAdminLoginPage('/backyard/article/index'); //どこの編集か特定するの面倒臭いので、記事編集topへ
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
