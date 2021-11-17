<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\search\index\Interactor as IndexInteractor;
use myapp\config\AppConfig;
use domain\search\result\Interactor as SearchResultInteractor;


class SearchController extends BaseController
{

    public function index(array $vars)
    {

        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(IndexInteractor::class);
        $vm = $interactor->interact($vars);

        if ($vm === AppConfig::INVALID_PARAMS) {
            return FALSE;
        }
        else {

            if ($vm['lang'] === 'jp') {
                $this->render($vm, 'search', 'index');
            }
            elseif ($vm['lang'] === 'en') {
                $this->render($vm, 'search', 'index_en');
            }
        }
    }



    public function result(array $vars)
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(SearchResultInteractor::class);
        $vm = $interactor->interact($vars);

        if ($vm === AppConfig::INVALID_PARAMS) {
            return False;
        }
        else {
            
            if ($vm['lang'] === 'jp') {
                $this->render($vm, 'search', 'result');
            }
            elseif ($vm['lang'] === 'en') {
                $this->render($vm, 'search', 'result_en');
            }
        }
    }
}
