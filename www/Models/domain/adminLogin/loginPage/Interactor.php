<?php

namespace domain\adminLogin\loginPage;

use myapp\myFrameWork\SuperGlobalVars;
use domain\components\csrfValidate\Interactor as CsrfValidator;
use myapp\config\AppConfig;

class Interactor
{

    /**
     * @return array 
     * refer to Presenter
     */
    public function interact()
    {
        $get = SuperGlobalVars::getGet();

        $afterLogin = rawurldecode((string) $get['afterLogin']);

        session_start([
            'gc_maxlifetime' => AppConfig::LOGIN_SESSION_LIFETIME,
            'gc_probability' => 1,
            'gc_divisor' => 1,
            'cookie_lifetime' => AppConfig::LOGIN_SESSION_LIFETIME,
            'use_strict_mode' => TRUE
        ]);
        $isRetry =  $_SESSION['isRetry'];
        $isLocked = $_SESSION['isLocked'];
        $csrf_token = (new CsrfValidator)->generateTokenAndSetSession();

        return (new Presenter)->present($afterLogin, $isRetry, $isLocked, $csrf_token);
    }
    
}