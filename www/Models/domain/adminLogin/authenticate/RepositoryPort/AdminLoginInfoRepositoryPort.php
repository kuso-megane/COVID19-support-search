<?php

namespace domain\adminLogin\authenticate\RepositoryPort;

use domain\adminLogin\authenticate\Data\AdminLoginInfo;

interface AdminLoginInfoRepositoryPort
{
    /**
     * @return AdminLoginInfo
     */
    public function getAdminLoginInfo():AdminLoginInfo;


    /**
     * update failCount and lockedTime
     * @param int|NULL $newFailCount if you don't wanna update, set this NULL
     * @param string|NULL $newLockedTime as above
     * 
     * @return void
     * 
     * 
     * 
     */
    public function updateFailCountAndLockedTime(?int $newFailCount, ?string $newLockedTime): void;

}
