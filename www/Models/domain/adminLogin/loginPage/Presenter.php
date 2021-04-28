<?php

namespace domain\adminLogin\loginPage;

class Presenter
{

    /**
     * @param string $afterLogin
     * @param bool|NULL $isRetry
     * @param bool|NULL $isLocked
     * @param string $csrfToken
     * 
     * @return array [
     *      'afterLogin' => string,
     *      'isRetry' => 'true' | NULL,
     *      'isLocked' => 'true' | NULL,
     *      'csrfToken' => string
     *  ]
     */
    public function present(string $afterLogin, ?bool $isRetry, ?bool $isLocked, string $csrfToken):array
    {
        return compact('afterLogin', 'isRetry', 'isLocked', 'csrfToken');
    }
}
