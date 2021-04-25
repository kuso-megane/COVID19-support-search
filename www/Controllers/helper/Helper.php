<?php

namespace myapp\Controllers\helper;

class Helper
{
    const ADMIN_LOGIN_PAGE_URL = '/adminLogin/loginPage';


    public function redirectTo(string $redirectTo)
    {
        header('Location: ' . $redirectTo);
    }

    public function redirectToAdminLoginPage()
    {
        $this->redirectTo(self::ADMIN_LOGIN_PAGE_URL);
    }

    
}
