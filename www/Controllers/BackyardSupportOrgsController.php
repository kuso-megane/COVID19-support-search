<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\backyardSupportOrgs\index\Interactor as IndexInteractor;
use myapp\config\AppConfig;
use myapp\Controllers\helper\Helper;
use myapp\myFrameWork\SuperGlobalVars;
use domain\backyardSupportOrgs\edit\Interactor as EditInteractor;
use domain\backyardSupportOrgs\post\Interactor as PostInteractor;

class BackyardSupportOrgsController extends BaseController
{
    const DIR = 'backyardSupportOrgs';

    public function index()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(IndexInteractor::class);
        $vm = $interactor->interact();

        if ($vm === AppConfig::INVALID_PARAMS) {
            return FALSE;
        }
        elseif ($vm === AppConfig::NOT_LOGIN) {
            $uri = SuperGlobalVars::getServer()['REQUEST_URI'];
            (new Helper)->redirectToAdminLoginPage($uri);
        }
        else {
            $this->render($vm, self::DIR, 'index');
        } 
    }

    public function edit(array $vars)
    {
        
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(EditInteractor::class);
        $vm = $interactor->interact($vars);

        if ($vm === AppConfig::INVALID_PARAMS) {
            return FALSE;
        }
        elseif ($vm === AppConfig::NOT_LOGIN) {
            $uri = SuperGlobalVars::getServer()['REQUEST_URI'];
            (new Helper)->redirectToAdminLoginPage($uri);
        }
        else {
            $this->render($vm, self::DIR, 'edit');
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
            $this->render($vm, self::DIR, 'post');
        } 
    }
}