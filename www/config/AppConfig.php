<?php

namespace myapp\config;

class AppConfig
{   
    const TITLE = 'サポファイ';

    const MAXNUM_PER_PAGE = 10; // 検索結果1ページあたりの支援表示数 
    const MAXNUM_RECOMMENDED_ARTICLES = 4; // 検索結果1ページあたりのおすすめコラムの数
    const BY_SUPPORT_ORGS_MAXNUM_PER_PAGE = 10; // BYSupportOrgs/index の1ページあたりの支援表示数
    

    //管理者login関連
    const MAXNUM_LOGIN_FAIL = 1; // この回数より多くログインに失敗すると、アカウントロック
    const ACCOUNT_LOCK_TIME = 60 * 10; // アカウントロックの時間(秒)
    const LOGIN_SESSION_LIFETIME = 60 * 60 * 24; // loginセッションの持続時間(秒)

    // domainに関わる、DB関連の情報
    const DEFAULT_IMG = 'default.jpg';

    const ZENKOKU_ID = 1; //areaテーブルの「全国」のid
    const GENERAL_C_ID = 1; //ArticleCategoryテーブルの「支援一般」のid
    

    // domainの返り値
    const INVALID_PARAMS = -1; //validationが通らないとき
    const INVALID_ACCESS = -2; // csrfなど、必要なtokenが見つからない時
    const NOT_LOGIN = -3; //ログインが必要な操作で、ログインしていない場合

    

    // domainで使用
    const UPLOAD_IMG_PATH = '/var/www/html' . ViewsConfig::IMG_URL;

    
}
