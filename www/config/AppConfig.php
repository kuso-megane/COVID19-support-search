<?php

namespace myapp\config;

class AppConfig
{   
    const TITLE = 'サポファイ';

    const MAXNUM_PER_PAGE = 10; // 検索結果1ページあたりの支援表示数 
    const MAXNUM_RECOMMENDED_ARTICLES = 3; // 検索結果1ページあたりのおすすめコラムの数

    const MAXNUM_LOGIN_FAIL = 5; // この回数より多くログインに失敗すると、アカウントロック
    const ACCOUNT_LOCK_TIME = 60 * 10; // アカウントロックの時間(秒)

    // domainに関わる、DB関連の情報
    const DEFAULT_IMG = 'default.jpg';

    const ZENKOKU_ID = 1; //areaテーブルの「全国」のid
    const GENERAL_C_ID = 1; //ArticleCategoryテーブルの「支援一般」のid
    

    // domainの返り値
    const INVALID_PARAMS = -1; //domain層が例外、エラー発生時に後続処理を中断し、この値を返す
    const INVALID_ACCESS = -2; // csrfなど、必要なtokenが見つからない時
    const NOT_LOGIN = -3; //ログインが必要な操作で、ログインしていない場合

    

    // domainで使用
    const UPLOAD_IMG_PATH = '/var/www/html' . ViewsConfig::IMG_URL;

    
}
