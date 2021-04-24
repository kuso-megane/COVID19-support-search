<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\adminLogin\authenticate\Interactor as AuthInteractor;
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
            header('Location: ' . $vm['afterLogin']);
        }
        else {
            header('Location: /adminLogin/loginPage');
        }
    }
}
