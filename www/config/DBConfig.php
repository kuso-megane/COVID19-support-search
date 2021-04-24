<?php

namespace myapp\config;

//DBとの接続
class DBConfig
{
    const DB_HOST = 'db';
    const TEST_DB = 'test_db';
    const MAIN_DB = 'app';
    const DB_PASS = ['root' => 'root']; //user => password
}
