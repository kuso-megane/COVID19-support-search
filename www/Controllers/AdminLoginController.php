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
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('/var/www/Models/diconfig.php');
        $container = $builder->build();

        $interactor = $container->get(AuthInteractor::class);
        $vm = $interactor->interact();

        if ($vm['isSucceeded'] === TRUE) {
            (new Helper)->redirectTo($vm['afterLogin']);
        }
        else {
            (new Helper)->redirectToAdminLoginPage($vm['afterLogin']);
        }
    }
}
