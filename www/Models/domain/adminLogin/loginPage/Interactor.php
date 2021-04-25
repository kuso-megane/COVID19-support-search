<?php

namespace domain\adminLogin\loginPage;

use myapp\myFrameWork\SuperGlobalVars;

class Interactor
{

    /**
     * @return array 
     * refer to Presenter
     */
    public function interact()
    {
        $get = SuperGlobalVars::getGet();
        $cookie = SuperGlobalVars::getCookie();

        $afterLogin = rawurldecode((string) $get['afterLogin']);
        $isRetry = (string) $cookie['isRetry'];
        $isLocked = (string) $cookie['isLocked'];

        return (new Presenter)->present($afterLogin, $isRetry, $isLocked);
    }
    
}