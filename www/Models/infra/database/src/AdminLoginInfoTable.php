<?php

namespace infra\database\src;

use myapp\myFrameWork\DB\Connection;

class AdminLoginInfoTable
{
    const TABLENAME = 'AdminLoginInfo';

    private $dbh;

    public function __construct(bool $is_test = FALSE, string $username = 'root')
    {
        $this->dbh = (new Connection($is_test, $username))->connect();
    }


    /**
     * return all columns except id
     * @return array [
     *      'adminID' => string,
     *      'pass' => string (hash),
     *      'failCount' => int,
     *      'lockedTime' => string (H:i:s)
     *  ]
     */
    public function find():array
    {
        $columns = 'adminID, pass, failCount, lockedTime';
        return $this->dbh->select($columns, self::TABLENAME)[0];
    }


    /**
     * 
     * @param string|NULL $adminID if you don't wanna update this column, set this NULL
     * @param string|NULL $pass as above
     * @param int|NULL $failCount as above
     * @param string|NULL $lockedTime as above
     * 
     * @return void
     * 
     * 
     */
    public function update(?string $adminID, ?string $pass, ?int $failCount, ?string $lockedTime)
    {
        $columns = '';
        $boundValues = [];
        if ($adminID != NULL) {
            $columns .= 'adminID = :adminID';
            $boundValues[':adminID'] = $adminID;
        }

        if ($pass != NULL) {
            if ($columns != '') {
                $columns .= ', '; 
            }
            $columns .= 'pass = :pass';
            $boundValues[':pass'] = $pass;
        }

        if ($failCount != NULL) {
            if ($columns != '') {
                $columns .= ', '; 
            }
            $columns .= 'failCount = :failCount';
            $boundValues[':failCount'] = $failCount;
        }

        if ($lockedTime != NULL) {
            if ($columns != '') {
                $columns .= ', '; 
            }
            $columns .= 'lockedTime = :lockedTime';
            $boundValues[':lockedTime'] = $lockedTime;
        }

        $this->dbh->update(self::TABLENAME, $columns, 'id = 1', $boundValues);
    }
}
