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
     * 
     */
    public function generateTokenAndSetSession():string
    {
        $byte = openssl_random_pseudo_bytes(self::TOKEN_LEN / 2); //bin2hex()で長さが2倍になるので、半分に
        $token = bin2hex($byte);

        session_start();
        $_SESSION['csrfToken'] = $token;

        return $token;
    }


    /**
     * return whether csrfToken is valid or not
     * @return bool
     */
    public function validate(string $token)
    {
        session_start();
        return ($token === $_SESSION['csrfToken']);
    }
}
