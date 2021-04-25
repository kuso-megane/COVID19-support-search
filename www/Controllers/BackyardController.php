<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\backyardIndex\Interactor as IndexInteractor;
use myapp\config\AppConfig;
use myapp\Controllers\helper\Helper;

class BackyardController extends BaseController
{
    public function index()
    {
        $vm = (new IndexInteractor)->interact();

        if ($vm === AppConfig::NOT_LOGIN) {
            (new Helper)->redirectToAdminLoginPage();
        }
        else {
            $this->render([], 'backyard', 'index');
        } 
    }
}
