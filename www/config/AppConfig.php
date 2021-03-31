<?php

namespace myapp\config;

class AppConfig
{
    //domain層が例外、エラー発生時に後続処理を中断し、この値を返す
    const INVALID_PARAMS = -1; 
    const POST_SUCCESS = 100;
    const POST_FAILURE = -100;

    
    const MAXNUM_PER_PAGE = 10;//1ページあたりの支援表示数 

    const DEFAULT_IMG = 'default.jpg';

    const ZENKOKU_ID = 1;

    const GENERAL_C_ID = 1;
    const MAXNUM_RECOMMENDED_ARTICLES = 3;
}
