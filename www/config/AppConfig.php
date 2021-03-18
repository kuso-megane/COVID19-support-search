<?php

namespace myapp\config;

class AppConfig
{
    const INVALID_PARAMS = -1; //domain層が例外、エラー発生時に後続処理を中断し、この値を返す
    const POST_SUCCESS = 100;
    const POST_FAILURE = -100;

    const ARTCL_NUM = 9; //1ページあたりの記事数
    const BY_ARTCL_NUM = 20; //BYページの1ページあたりの記事数

    const DEFAULT_IMG = 'default.jpg';
}
