<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\backyardIndex\Interactor as IndexInteractor;
use myapp\config\AppConfig;
use myapp\Controllers\helper\Helper;
use myapp\myFrameWork\SuperGlobalVars;

class BackyardController extends BaseController
{
    public function index()
    {
        $vm = (new IndexInteractor)->interact();

        if ($vm === AppConfig::NOT_LOGIN) {
            $uri = SuperGlobalVars::getServer()['REQUEST_URI'];
            (new Helper)->redirectToAdminLoginPage($uri);
        }
        else {
            $this->render([], 'backyard', 'index');
        } 
    }
}
