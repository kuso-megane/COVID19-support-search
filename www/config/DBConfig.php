<?php

namespace myapp\config;

//DBとの接続 
class DBConfig
{
    const TEST_DB = 'test_db';
    const MAIN_DB = 'app';

    private $db_host;
    private $db_pass;

    public function __construct()
    {
        if (getenv('IS_PROD') === 'true') {
            $this->db_host = getenv('DB_HOST');
            $this->db_pass = ['root' => getenv('DB_ROOT_PASS')]; //user => the user's pass e.g. root => root
        }
        else {
            $this->db_host = 'db';
            $this->db_pass = ['root' => 'root'];
        }
    }


    public function getDBHost()
    {
        return $this->db_host;
    }


    public function getDBPass()
    {
        return $this->db_pass;
    }
}
