<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\adminLogin\authenticate\Interactor as AuthInteractor;

class AdminLoginController extends BaseController
{
    const DIR = 'adminLogin';


    
    public function loginPage(bool $isRetry = FALSE, string $redirectTo = '/backyard/index')
    {
        $this->render(compact('redirectTo', 'isRetry'), self::DIR, 'loginPage');
    }


    public function authenticate()
    {
        (new AuthInteractor)->interact();
    }
}
