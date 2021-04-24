<?php

namespace domain\adminLogin\authenticate;

class Presenter
{
    /**
     * @param string $redirectTo
     * 
     * @return array
     * [
     *      'isSucceeded' => bool,
     *      'afterLogin' => $string
     * ]
     */
    public function present(bool $isSucceeded, string $afterLogin)
    {
        return compact('isSucceeded', 'afterLogin');
    }
}