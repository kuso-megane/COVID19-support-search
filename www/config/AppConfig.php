<?php

namespace myapp\config;

class AppConfig
{   
    const TITLE = 'サポファイ';

    const MAXNUM_PER_PAGE = 10; // 検索結果1ページあたりの支援表示数 
    const MAXNUM_RECOMMENDED_ARTICLES = 3; // 検索結果1ページあたりのおすすめコラムの数

    const MAXNUM_ADMIN_LOGIN_FAIL = 5; // この回数より多くログインに失敗すると、アカウントロック

    //DB関連
    const DEFAULT_IMG = 'default.jpg';

    const ZENKOKU_ID = 1;
    const GENERAL_C_ID = 1; //ArticleCategoryテーブルの「支援一般」のid
    

    //domain層が例外、エラー発生時に後続処理を中断し、この値を返す
    const INVALID_PARAMS = -1; 
    
    const UPLOAD_IMG_PATH = '/var/www/html' . ViewsConfig::IMG_URL;
}
