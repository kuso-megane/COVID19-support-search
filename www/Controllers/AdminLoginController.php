<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use myapp\myFrameWork\SuperGlobalVars;

class AdminLoginController extends BaseController
{
    const DIR = 'adminLogin';


    
    public function login()
    {
        $redirectTo = (new SuperGlobalVars)->getGet()['redirectTo'];
        if ($redirectTo === NULL) {
            $redirectTo = '/backyard/index';
        }
        else {
            $redirectTo = rawurldecode($redirectTo);
        }

        $this->render(compact('redirectTo'), self::DIR, 'login');
    }


    public function authenticate()
    {

    }
}
