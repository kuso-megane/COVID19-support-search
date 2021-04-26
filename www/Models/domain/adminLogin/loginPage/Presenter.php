<?php

namespace domain\adminLogin\loginPage;

class Presenter
{

    /**
     * @param string $afterLogin
     * @param 
     * @param string|NULL $isRetry
     * @param string|NULL $isLocked
     * 
     * @return array [
     *      'afterLogin' => string
     *      'isRetry' => 'true' | NULL
     *      'isLocked' => 'true' | NULL
     *  ]
     */
    public function present(string $afterLogin, ?string $isRetry, ?string $isLocked):array
    {
        return compact('afterLogin', 'isRetry', 'isLocked');
    }
}
