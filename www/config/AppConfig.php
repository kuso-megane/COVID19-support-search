<?php

namespace myapp\config;

class AppConfig
{
    const INVALID_PARAMS = -1; //domain層が例外、エラー発生時に後続処理を中断し、この値を返す
    const POST_SUCCESS = 100;
    const POST_FAILURE = -100;

    const SUPPORTS_NUM = 9; //1ページあたりの支援表示数

    const DEFAULT_IMG = 'default.jpg';
}
