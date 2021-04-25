<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;
use domain\adminLogin\loginPage\Interactor as LoginPageInteractor;
use domain\adminLogin\authenticate\Interactor as AuthInteractor;
use myapp\Controllers\helper\Helper;
use myapp\myFrameWork\SuperGlobalVars;

class AdminLoginController extends BaseController
{
    const DIR = 'adminLogin';


    
    public function loginPage()
    {
        $vm = (new LoginPageInteractor)->interact();
        $this->render($vm, self::DIR, 'loginPage');
    }


    public function authenticate()
    {
        $vm = (new AuthInteractor)->interact();

        if ($vm['isSucceeded'] === TRUE) {
            (new Helper)->redirectTo($vm['afterLogin']);
        }
        else {
            (new Helper)->redirectToAdminLoginPage($vm['afterLogin']);
        }
    }
}
