<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use myapp\myFrameWork\SuperGlobalVars;

class AdminLoginController extends BaseController
{
    const DIR = 'adminLogin';


    
    public function login(bool $isRetry = FALSE, string $redirectTo = '/backyard/index')
    {
        $this->render(compact('redirectTo', 'isRetry'), self::DIR, 'login');
    }


    public function authenticate()
    {

    }
}
