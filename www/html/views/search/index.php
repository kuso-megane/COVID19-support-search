<?php

use myapp\config\AppConfig;
use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo "すぐに使える支援・相談窓口探しなら". AppConfig::TITLE; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'search/index.css'; ?>">
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>

        <main>
            <div class="center">
                <div id="introduce" class="main--single">
                    <div class="center">
                        <div class="inline-block left">
                            <h3 id="introduce--title" class="block-start0"><span class="keiko"></span></h3>
                            <div id="introduce--subTitle" class="center">
                                <p class="block-end0"><span class="larger green"><?php echo AppConfig::TITLE; ?></span>&ensp;は、</p>
                                <p id="introduce--subTitle--after" class="break-word bold block-start0">生活上のお困りごとにあった支援・相談窓口を検索できるサービスです！</p>
                            </div>
                        </div>
                    </div>


                    <div id="introduce--main">
                        <div class="nav-title">
                            <p class="bold block-start0 block-end0">例えばこんなお悩みありませんか？</p>
                        </div> 
                        <li>コロナ禍で仕事を失った、生活費が足りない、、、。</li>
                        <li>性暴力、ハラスメント、DVで苦しんでいる、、、。</li>
                        <li>でも、誰にも相談できていない。支援や制度も利用できていない。</li>
                        <li>そもそもどんな支援・相談窓口があるか、支援を受ける条件や方法もわからない。</li>
                        <p>そんな時に、本サイトの検索システムを利用してみませんか？</p>
                        <p>
                            &#9733;特に民間団体（NPOなど）が行う支援には<span class="red bold">支援を受ける条件が基本的にありません。</span> 一度だけでも検索してみてください。
                        </p>
                        <div class="center">
                            <a id="nav-to-search" class="nav-box left" href="#search-box-anchor">
                                <p class="bold">
                                    <i class="fas fa-search"></i>
                                    支援・相談先を検索する<span class="gt">&gt;</span>
                                </p>
                            </a>
                        </div>
                        <div class="nav-title">
                            <p class="bold block-end0 block-start0">お役立ち情報(コラム)も書いています！以下のような悩みに答えています！</p>
                        </div>
                        <li class="red bold">支援・相談窓口の利用にためらいや不安、恥ずかしさを感じる</li>
                        <li>支援って具体的にどう行われているの？</li>
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
                            <li>まずは、検索ボックスから、お困りごと、地域、都道府県をお選びください。</li>
                            <li>日本国籍をお持ちでない方は、「国籍不問の団体のみ表示」にチェックを入れることをおすすめします。</li>
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