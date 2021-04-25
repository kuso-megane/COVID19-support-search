<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\adminLogin\authenticate\Interactor as AuthInteractor;
use myapp\Controllers\helper\Helper;
use myapp\myFrameWork\SuperGlobalVars;

class AdminLoginController extends BaseController
{
    const DIR = 'adminLogin';


    
    public function loginPage()
    {
        $cookie = SuperGlobalVars::getCookie();
        $isRetry = $cookie['isRetry'];
        $this->render(compact('isRetry'), self::DIR, 'loginPage');
    }


    public function authenticate()
    {
        $vm = (new AuthInteractor)->interact();

        if ($vm['isSucceeded'] === TRUE) {
            (new Helper)->redirectTo($vm['redirectTo']);
        }
        else {
            (new Helper)->redirectToAdminLoginPage();
        }
    }
}
