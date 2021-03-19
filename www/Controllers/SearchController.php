<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\search\index\Interactor as IndexInteractor;
use myapp\config\AppConfig;

class SearchController extends BaseController
{

    public function index()
    {

        $interactor = new IndexInteractor;
        $vm = $interactor->interact();

        if ($vm === AppConfig::INVALID_PARAMS) {
            return FALSE;
        }
        else {
            $this->render($vm, 'search', 'index');
        }
    }



    public function result(array $vars)
    {
        require '/var/www/html/views/search/result.php';
    }
}
