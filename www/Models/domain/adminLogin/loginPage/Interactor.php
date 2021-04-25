<?php

namespace domain\adminLogin\loginPage;

use myapp\myFrameWork\SuperGlobalVars;

class Interactor
{

    /**
     * @return array [
     *      'afterLogin' => string,
     *      'isRetry' => ()'true' | ''
     *  ]
     */
    public function interact()
    {
        $get = SuperGlobalVars::getGet();
        $cookie = SuperGlobalVars::getCookie();

        $afterLogin = rawurldecode((string) $get['afterLogin']);
        $isRetry = (string) $cookie['isRetry'];

        return compact('afterLogin', 'isRetry');
    }
    
}