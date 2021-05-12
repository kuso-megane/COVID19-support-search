<?php

namespace myapp\myFrameWork\DB;

use myapp\config\DBConfig;
use PDO;
use PDOException;

class Connection
{
    private $username;
    private $dbname;


    /**
     * @param bool $is_test if you wanna use db for test, this must be TRUE.
     * @param string $username db userName
     * 
     */
    public function __construct(bool $is_test=FALSE, string $username='root')
    {
        if ($is_test === TRUE) {
            $this->dbname = DBConfig::TEST_DB;
        }
        else {
            $this->dbname = DBConfig::MAIN_DB;
        }
        $this->username = $username;
    }

    /**
     * return new PDO
     * @return MyDbh
     */
    public function connect():MyDbh
    {
        $dbConfig = new DBConfig;
        $db_host = $dbConfig->getDBHost();
        $db_pass = $dbConfig->getDBPass();

        $dsn = "mysql:dbname={$this->dbname};" . 'host=' . $db_host;
        $pw = $db_pass[$this->username];

        try {
            $dbh = new MyDbh($dsn, $this->username, $pw);
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            echo "Connection failed:\n\t dsn = '{$dsn}'\n\t {$e->getMessage()}\n";
        }

        return $dbh;
    }
}
