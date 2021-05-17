<?php

use myapp\config\AppConfig;
use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo "すぐに使える支援・相談窓口探しなら" . AppConfig::TITLE; ?></title>
        <meta name="description" content="民間やNPOの活動を中心に支援・相談窓口・制度を探すことができる検索システムです。住まい、DV、食料、コロナで仕事・バイトが解雇・休業、シングルマザー/ファザー、外国籍に関する悩みなどまで幅広く対応しています。困ったときはためらわずにご利用ください！
">
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'search/index.css'; ?>">
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
        <meta name="google-site-verification" content="QUhvKEg1Tym9PdmUbMMUQPB82zF6iKbccQ-EN_Pcg4A" />
    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>

        <main>
            <div class="center">
                <div id="introduce" class="main--single">
                    <div class="center">
                        <div id="introduce--top">
                            <p class="centor block-start0"><span id="introduce--top--main" class="green"><?php echo AppConfig::TITLE; ?></span>&ensp;は、</p>
                            <p id="introduce--top--explaination" class="break-word block-start0">生活上の様々なお困りごとにあった支援・相談窓口を検索できるサービスです！</p>
                        </div>
                    </div>


                    <div id="introduce--main">
                        <div class="nav-title">
                            <p class="bold block-start0 block-end0">例えばこんなお悩みありませんか？</p>
                        </div> 
                        <li>コロナ禍で仕事や住まいを失った。</li>
                        <li>性暴力、ハラスメント、DVで苦しんでいる。</li>
                        <li>でも、誰にも相談できていない。支援や制度も利用できていない。</li>
                        <li>そもそもどんな支援・相談窓口があるか、支援を受ける条件や方法もわからない。</li>
                        <p>そんな時に、本サイトの検索システムを利用してみませんか？</p>
                        <p>
                            &#10004; 特に民間団体（NPOなど）が行う支援には<span class="red bold">支援を受ける条件が基本的にありません。</span>一度だけでも検索してみてください。
                        </p>
                        <div class="center">
                            <a id="nav-to-search" class="nav-box left" href="#search-box-anchor">
                                <p class="bold">
                                    <i class="fas fa-search"></i>
                                    支援・相談先を検索する&emsp;<span class="gt">&gt;</span>
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
                                    お役立ち情報(コラム)を見る&emsp;<span class="gt">&gt;</span>
                                </p>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>

            
            <div class="center">
                <div class="main--double">

                    <div id="search-box-anchor"></div>

                    <div class="main--double--left">
                        <?php require ViewsConfig::COMPONENTS_PATH . 'searchbox.php'; ?>
                    </div>

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