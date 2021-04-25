<?php

namespace domain\adminLogin\authenticate\Data;


class AdminLoginInfo
{
    private $attr;


    public function __construct(string $adminID, string $pass, int $failCount, string $lockedTime)
    {
        $this->attr = compact('adminID', 'pass', 'failCount', 'lockedTime');
    }


    public function toArray():array
    {
        return $this->attr;
    }
}
