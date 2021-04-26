<?php

namespace domain\components\adminLoginCheck;

class Interactor
{   
    /**
     * @return bool whether admin has already logged in or not
     */
    public function interact():bool
    {
        session_start();
        if ($_SESSION['username'] === 'admin') {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
}
