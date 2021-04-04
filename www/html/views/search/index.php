<?php

use myapp\config\AppConfig;
use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo AppConfig::TITLE; ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'search.css'; ?>">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>

        <main>
            <div class="center">
                <div id="introduce" class="main--single">
                    <h3 id="introduce--title" class="block-start0 left">生活で困ったことがあったらぜひ一度、当サイトを利用してみてください！</h3>
                    <div id="introduce--subTitle" class="left">
                        <p class="block-end0"><span class="larger green"><?php echo AppConfig::TITLE; ?></span>&ensp;は、</p>
                        <p id="introduce--subTitle--after" class="break-word left bold block-start0">コロナ禍をはじめとした様々な生活上のお困りごとに合った支援・相談先を探せる、検索サービスです。</p>
                    </div>
                    
                    <div id="introduce--main">
                        <p class="bold left">こんなお悩みありませんか？</p>
                        <li>仕事を失った、生活費が足りない、、、。</li>
                        <li>一人ではどうしようもない。でも相談先がない。</li>
                        <li>どんな支援があるか、支援を受ける条件も方法もわからない。</li>
                        <p>
                            &#9733;特に民間支援には<span class="green">支援を受ける条件が基本的にありません。</span> 諦める前に一度だけでも検索してみてください。
                        </p>
                        <div class="center">
                            <a id="nav-to-search" class="nav-box left" href="#search-box-anchor">
                                <p class="bold">
                                    <i class="fas fa-search"></i>
                                    支援・相談先を検索する<span class="gt">&gt;</span>
                                </p>
                            </a>
                        </div>
                        <p class="bold left">お役立ち情報(コラム)も書いています！以下のような悩みに答えています！</p>
                        <li class="red bold">そもそも支援を受けるのが少し恥ずかしい、、、。</li>
                        <li>支援って具体的にどうやって受けるの？</li>
                        <div class="center">
                            <a id="nav-to-article" class="nav-box left" href="/article/list">
                                <p class="bold">
                                    <i class="fas fa-book-open"></i>
                                    お役立ち情報(コラム)を見る<span class="gt">&gt;</span>
                                </p>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>

            
            <div class="center">
                <div class="main--double">

                    <div id="search-box-anchor"></div>

                    <?php require ViewsConfig::COMPONENTS_PATH. 'searchbox.php'; ?>

                    <div id="howto" class="main--double--right">
                        <p class="subTitle bold block-start0">&lt;使い方&gt;</p>
                        <div id="howto--main">
                            <li>まずは、検索ボックスから、困っていること、地域、都道府県をお選びください。</li>
                            <li>日本国籍をお持ちでない方は、「国籍不問のみ」にチェックを入れることをおすすめします。</li>
                            <li>「この条件で検索」を押していただくと、検索結果とおすすめコラム(お役立ち情報)が表示されます。</li>
                            <li>検索結果ページでは、公的支援と民間支援をタブで切り替えることができます。</li>
                        </div>
                    </div>

                </div>
            </div>
            
        </main>

        <script src="<?php echo ViewsConfig::SCRIPT_URL. 'smoothScroll.js'; ?>"></script>
    </body>
</html>