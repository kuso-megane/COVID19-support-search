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
        $vm = (new IndexInteractor)->interact();

        if ($vm === AppConfig::INVALID_PARAMS) {
            return FALSE;
        }
        else {
            $this->render([], self::DIR, 'index');
        } 
    }
}