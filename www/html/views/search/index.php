<?php

use myapp\config\AppConfig;
use myapp\config\URIConfig;
use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# website: http://ogp.me/ns/ website#">
        <title><?php echo "個人向け｜新型コロナ民間支援情報まとめ" . AppConfig::TITLE; ?></title>
        <meta name="description" content="コロナ禍で生活にお困りの個人向けに、全国各地300以上の支援情報をまとめました。ワンクリックで欲しい支援を検索することができます。">

        <!--ogp-->
        <meta property="og:url" content="<?php echo URIConfig::URI; ?>" />
        <meta property="og:title" content="<?php echo "すぐに使える支援・相談窓口探しなら" . AppConfig::TITLE; ?>" />
        <meta property="og:image" content="<?php echo URIConfig::URI. ViewsConfig::IMG_URL. 'titleLogo/production.jpg'; ?>" />
        <meta property="og:description"
        content="コロナで仕事がない、住居、DV、生活費、食料、解雇・休業、ひとり親、外国籍に関する悩みなどまで幅広く、民間の活動を中心に支援・相談窓口・制度を探すことができます！"
        />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@suppofy" />

        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'search/index.css'; ?>">
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>

        <meta name="google-site-verification" content="QUhvKEg1Tym9PdmUbMMUQPB82zF6iKbccQ-EN_Pcg4A" />
    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>

        <main>
            <div id="introduce--container" class="center" >
                <div id="introduce" class="main--single">
                    <div class="center">
                        <div id="introduce--top">
                            <p class="centor block-start0"><span id="introduce--top--main" class="green"><?php echo AppConfig::TITLE; ?></span>&ensp;は、</p>
                            <p id="introduce--top--explaination" class="break-word block-start0">生活上の様々なお困りごとにあった支援・相談窓口を検索できるサービスです！</p>
                        </div>
                    </div>


                    <div id="introduce--main">
                        <div id="introduce--main--box">
                            <div id="introduce--main--box--left" class="center">
                                <a id="introduce--main--box--left--nav-to-search" class="nav-box" href="#search-box-anchor">
                                    <p class="bold">
                                        <i class="fas fa-search"></i>
                                        支援・相談先を検索する&emsp;<span class="gt">&gt;</span>
                                    </p>
                                </a>
                            </div>
                            <div id="introduce--main--box--right" class="center">
                                <a id="introduce--main--box--right--nav-to-article" class="nav-box" href="/article/list">
                                    <p class="bold">
                                        <i class="fas fa-book-open"></i>
                                        お役立ち情報(コラム)を見る&emsp;<span class="gt">&gt;</span>
                                    </p>
                                </a>
                            </div>
                        </div>

                        <div id="introduce--main--explain">
                            <div  id="introduce--main--explain--left">
                                <div class="explain-title">
                                    <br>
                                    <p class="bold block-start0 block-end0">例えばこんなお悩みありませんか？</p>
                                </div>
                                <div class="explain-list">
                                    <li>仕事や住まいを失った。</li>
                                    <li>性暴力、DV、病気で苦しい。</li>
                                    <li>でも相談できていない。支援や制度も利用していない。</li>
                                    <li>どんな支援・相談窓口があるか、支援を受ける条件や方法もわからない。</li>
                                    <p>
                                        &#10004; 特に民間の支援には<span class="greenyellow">支援を受ける条件が基本的にありません。</span>
                                    </p>
                                    <p>
                                        一度だけでも検索してみてください。
                                    </p>
                                </div>  
                            </div>
                            <div id="introduce--main--explain--right">
                                <div class="explain-title">
                                    <p class="bold block-end0 block-start0">お役立ち情報(コラム)も書いています！以下のような悩みに答えています！</p>
                                </div>
                                <div class="explain-list">
                                    <li class="greenyellow">支援・相談窓口の利用にためらいや不安、恥ずかしさを感じる</li>
                                    <li>支援って具体的にどう行われているの？</li>
                                </div>  
                            </div>
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
                        <p class="subTitle bold block-start0">&lt;おすすめコラム&gt;</p>
                        <div id="howto--main">
                        <?php 
                            $_items = $articles; 
                            require ViewsConfig::COMPONENTS_PATH .  'articleBoxList.php';
                            unset($_items); 
                        ?>
                        </div>
                    </div>

                </div>
            </div>
            
        </main>

        <script src="<?php echo ViewsConfig::SCRIPT_URL. 'smoothScroll.js'; ?>"></script>
    </body>
</html>