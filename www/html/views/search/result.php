<?php

use myapp\config\AppConfig;
use myapp\config\ViewsConfig;
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo "${searchedAreaName}の検索結果 -" . AppConfig::TITLE; ?></title>
        <meta name="description"
        content="<?php echo "${searchedAreaName}において、${searchedTroubleName}という方をサポートする支援団体・制度の情報をまとめました！1人で抱え込まず、利用・相談してみてください。"; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL . 'search/result.css'; ?>" >
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
　　</head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>
        <main>
            <div class="center">
                <div class="main--double">

                    <div id="searchbox-anchor"></div>

                    <div class="main--double--left">
                        <?php require ViewsConfig::COMPONENTS_PATH . 'searchbox.php'; ?>
                    </div>

                    <div id="search-result-anchor"></div>

                    <div id="result--container" class="main--double--right">

                        <p class="subTitle bold block-start0">
                            &lt;
                            <?php echo $searchedAreaName; ?>
                            の検索結果
                            &gt;
                        </p>
                        <div id="tab-area">
                            <div id="public-tab" class="tab <?php if($is_public_page === TRUE) {echo 'active';} ?>">公的支援</div>
                            <div id="private-tab" class="tab <?php if($is_public_page === FALSE) {echo 'active';} ?>">民間支援</div>
                            <div id="tab-area--explain" class="block-start0 block-end0">&ensp;←クリックでタブ切替</div>
                        </div>

                        <div id="result">
                            <!-- xxx-tabがactiveになったとき、xxx-tab-contentがshow状態になる、初期状態はサーバーサイドで決定-->
                            <div id="public-tab-content" class="tab-content <?php if($is_public_page === TRUE) {echo 'show';} ?>" >

                                <?php if(empty($publicSupports) === TRUE): ?>

                                    <p class="no-result">検索結果がありませんでした。<br>民間支援をご覧になるか、検索条件を変えてみてください。</p>

                                <?php else: ?>
                                    
                                    <p class="total">
                                        <?php echo $publicSupportsTotal; ?>件見つかりました。&emsp;<?php echo "{$publicCurrentPage}/{$publicPageTotal}ページ"; ?>
                                    </p>
                                    <div class="center">
                                        <div class="page-switch">
                                            <?php for($i = 1; $i <= $publicPageTotal; ++$i): ?>

                                                <p class="page-switch--nums <?php if ($publicCurrentPage === $i) {echo 'strong disabled';} ?>">
                                                    <a href="<?php echo "/searchResult/1/{$i}/{$privateCurrentPage}{$query}#search-result-anchor"; ?>" >
                                                        <?php echo "{$i}"; ?>
                                                    </a>
                                                </p>

                                            <?php endfor; ?>
                                        </div>
                                    </div>

                                    <?php foreach($publicSupports as $support): ?>
                                    
                                        <div class="supportBox">
                                            <p class="target block-end0 block-start0">
                                                &lt;
                                                <?php 
                                                    if ($support['area_id'] !== AppConfig::ZENKOKU_ID) {
                                                        echo $searchedAreaName . 'を中心に活動';
                                                    }
                                                    else {
                                                        echo '全国の方が対象';
                                                    }
                                                ?>
                                                &gt;
                                            </p>
                                            <h3 class="owner"><?php echo $support['owner']; ?></h3>
                                            <table>
                                                <tr>
                                                    <td class="td-column">支援内容</td>
                                                    <td class="td-content">
                                                        <?php echo $support['support_content']; ?>   
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-column">アクセス</td>
                                                    <td class="td-content"><?php echo $support['access']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="td-column">備考</td>
                                                    <td class="td-content"><?php echo $support['appendix']; ?></td>
                                                </tr>
                                            </table>
                                        </div>

                                    <?php endforeach; ?>

                                    <div class="center">
                                        <div class="page-switch">
                                            <?php for($i = 1; $i <= $publicPageTotal; ++$i): ?>

                                                <p class="page-switch--nums <?php if ($publicCurrentPage === $i) {echo 'strong disabled';} ?>">
                                                    <a href="<?php echo "/searchResult/1/{$i}/{$privateCurrentPage}{$query}#search-result-anchor"; ?>" >
                                                        <?php echo "{$i}"; ?>
                                                    </a>
                                                </p>

                                            <?php endfor; ?>
                                        </div>
                                    </div>

                                <?php endif; ?>

                            </div>
                            <div id="private-tab-content" class="tab-content <?php if($is_public_page === FALSE) {echo 'show';} ?>">       
                                <?php if(empty($privateSupports) === TRUE): ?>

                                    <p class="no-result">検索結果がありませんでした。<br>公的支援をご覧になるか、検索条件を変えてみてください。</p>

                                <?php else: ?>
                                    
                                    <p class="total">
                                        <?php echo $privateSupportsTotal; ?>件見つかりました。&emsp;<?php echo "{$privateCurrentPage}/{$privatePageTotal}ページ"; ?>
                                    </p>
                                    <div class="center">
                                        <div class="page-switch">
                                            <?php for($i = 1; $i <= $privatePageTotal; ++$i): ?>

                                                <p class="page-switch--nums <?php if ($privateCurrentPage === $i) {echo 'strong disabled';} ?>">
                                                    <a href="<?php echo "/searchResult/0/{$publicCurrentPage}/{$i}{$query}#search-result-anchor"; ?>" >
                                                        <?php echo "{$i}"; ?>
                                                    </a>
                                                </p>

                                            <?php endfor; ?>
                                        </div>
                                    </div>

                                    <?php foreach($privateSupports as $support): ?>
                                    
                                        <div class="supportBox">
                                            <p class="target block-end0 block-start0">
                                                &lt;
                                                <?php 
                                                    if ($support['area_id'] !== AppConfig::ZENKOKU_ID) {
                                                        echo $searchedAreaName . 'を中心に活動';
                                                    }
                                                    else {
                                                        echo '全国の方が対象';
                                                    }
                                                ?>
                                                &gt;
                                            </p>
                                            <h3 class="owner"><?php echo $support['owner']; ?></h3>
                                            <table>
                                                <tr>
                                                    <td class="td-column">支援内容</td>
                                                    <td class="td-content">
                                                        <?php echo $support['support_content']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td-column">アクセス</td>
                                                    <td class="td-content"><?php echo $support['access']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="td-column">備考</td>
                                                    <td class="td-content"><?php echo $support['appendix']; ?></td>
                                                </tr>
                                            </table>
                                        </div>

                                    <?php endforeach; ?>

                                    <div class="center">
                                        <div class="page-switch">
                                            <?php for($i = 1; $i <= $privatePageTotal; ++$i): ?>

                                                <p class="page-switch--nums <?php if ($privateCurrentPage === $i) {echo 'strong disabled';} ?>">
                                                    <a href="<?php echo "/searchResult/0/{$publicCurrentPage}/{$i}{$query}#search-result-anchor"; ?>" >
                                                        <?php echo "{$i}"; ?>
                                                    </a>
                                                </p>

                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="center">
                <div id="recommend-articles--box" class="main--single">
                    <p class="subTitle bold left block-start0">&lt;おすすめコラム(お役立ち情報)&gt;</p>
                    <?php
                        $_items = $recommendedArticleInfos;
                        require ViewsConfig::COMPONENTS_PATH. 'articleBoxList.php';
                        unset($_items);
                    ?>
                    <p id="link-to-articleList" class="right"><a href="/article/list">&gt;&gt;もっと見る</a></p>
                </div>
            </div>
            <a id="followingLink-to-searchbox" href="#searchbox-anchor" class="center inline-block hidden">
                <i class="fas fa-search"></i>
                条件を変えて検索
            </a>
 
        </main>
        <script src="<?php echo ViewsConfig::SCRIPT_URL. 'tabChange.js'; ?>"></script>
        <script src="<?php echo ViewsConfig::SCRIPT_URL. 'smoothScroll.js'; ?>"></script>
        <!--検索ボックスへの追従リンクの追従範囲を設定-->
        <script>
            const followingElementControl = () => {

                const element = document.getElementById("followingLink-to-searchbox");
                const trigger = document.getElementById("searchbox-anchor");
                const trigger2 = document.getElementById("recommend-articles--box")

                const screenTop = window.pageYOffset;
                const screenBottom = screenTop + window.innerHeight;
                const startY = screenTop + trigger.getBoundingClientRect().top;
                const endY = screenTop + trigger2.getBoundingClientRect().top;

                if (scrollY > startY) {
                    element.classList.remove("hidden");
                    element.classList.add("fixed");

                    if (screenBottom > endY) {
                        element.classList.remove("fixed");
                        element.classList.add("hidden");
                    }
                }
                else {
                    element.classList.remove("fixed");
                    element.classList.add("hidden");
                }
            }

            window.addEventListener("scroll", followingElementControl);

        </script>
        
    </body>
           

</html>
