<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\backyardSupportOrgs\index\Interactor as IndexInteractor;
use myapp\config\AppConfig;

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
        else {
            $this->render([], self::DIR, 'index');
        } 
    }
}