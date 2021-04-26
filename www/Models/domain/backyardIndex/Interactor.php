<?php

namespace domain\backyardIndex;

use domain\components\adminLoginCheck\Interactor as LoginCheckInteractor;
use myapp\config\AppConfig;

class Interactor
{

    /**
     * @return NULL|int NULL or AppConfig::NOT_LOGIN
     * 
     */
    public function interact()
    {
        $isLogin = (new LoginCheckInteractor)->interact();

       
        if ($isLogin === FALSE) {
            return AppConfig::NOT_LOGIN;
        }
        else {
            return NULL; 
        }
    }
}