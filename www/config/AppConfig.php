<?php

namespace myapp\config;

class AppConfig
{   
    const TITLE = '支援総合検索';

    const MAXNUM_PER_PAGE = 10; // 検索結果1ページあたりの支援表示数 
    const MAXNUM_RECOMMENDED_ARTICLES = 3; // 検索結果1ページあたりのおすすめコラムの数

    const DEFAULT_IMG = 'default.jpg';

    const ZENKOKU_ID = 1;
    const GENERAL_C_ID = 1;
    

    //domain層が例外、エラー発生時に後続処理を中断し、この値を返す
    const INVALID_PARAMS = -1; 
    const POST_SUCCESS = 100;
    const POST_FAILURE = -100;
    
    const UPLOAD_IMG_PATH = '/var/www/html' . ViewsConfig::IMG_URL;
}
