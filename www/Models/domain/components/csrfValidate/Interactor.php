<?php

namespace domain\components\csrfValidate;

class Interactor
{
    const TOKEN_LEN = 2 * 16;

    /**
     * generate token which length is  self::TOKEN_LEN, return this and set this as $_SESSION['csrfToken']
     * 
     * @return string token
     * 
     * Note that you have to start session manually
     * 
     */
    public function generateTokenAndSetSession():string
    {
        $byte = openssl_random_pseudo_bytes(self::TOKEN_LEN / 2); //bin2hex()で長さが2倍になるので、半分に
        $token = bin2hex($byte);

        $_SESSION['csrfToken'] = $token;

        return $token;
    }


    /**
     * return whether csrfToken is valid or not
     * @return bool
     * 
     * Note that you have to start session manually
     */
    public function validateAndUnsetSession(string $token)
    {
        $isValid = $token === $_SESSION['csrfToken'];
        unset($_SESSION['csrfToken']); //postの二重送信防止

        return $isValid;
    }
}
