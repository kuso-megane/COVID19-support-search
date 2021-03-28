<?php
    use myapp\config\ViewsConfig;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>支援総合検索サイト</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL . 'search.css'; ?>" >
　　</head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>
        <main>
            <div>
                <p class="block-start0 bold"><a href="/index">←トップページに戻る</a></p>
            </div>

            <div class="center">
                <div class="main--double">

                    <div id="searchbox-anchor"></div>

                    <?php require ViewsConfig::COMPONENTS_PATH . 'searchbox.php'; ?>

                    <div id="search-result-anchor"></div>

                    <div class="main--double--right">
                        <p class="bold block-start0">&lt;検索結果&gt;</p>
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
                                            <h3 class="owner"><?php echo  $support['owner']; ?></h3>
                                            <table>
                                                <tr>
                                                    <td class="td-column">支援内容</td>
                                                    <td class="td-content"><?php echo $support['support_content'] ?></td>
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

                                <p class="link-to-searchbox center"><a href="#searchbox-anchor">検索条件を変える</a></p>
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
                                            <h3 class="owner"><?php echo  $support['owner']; ?></h3>
                                            <table>
                                                <tr>
                                                    <td class="td-column">支援内容</td>
                                                    <td class="td-content"><?php echo $support['support_content'] ?></td>
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

                                <p class="link-to-searchbox center"><a href="#searchbox-anchor">検索条件を変える</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="center">
                <div id="recommend-articles--box" class="main--single">
                    <p class="bold block-start0">&lt;おすすめコラム(お役立ち情報)&gt;</p>
                    <div class="article--content--list">
                        <div class="article--content--list--item">
                            <img class="article--content--list--item--img" src="<?php echo ViewsConfig::IMG_URL. 'which.png'; ?>" alt="支援総合">
                            <p class="article--content--list--item--title break-word block-start0 block-end0"><a href="">公的支援と民間支援、どちらがいいの？ あなたにあった選び方を紹介！</a></p>
                        </div>
                        <div class="article--content--list--item">
                            <img class="article--content--list--item--img" src="<?php echo ViewsConfig::IMG_URL. 'supportProcess.png'; ?>" alt="支援総合">
                            <p class="article--content--list--item--title break-word block-start0 block-end0"><a href="">支援を受けるまでの流れを紹介!</a></p>
                        </div>
                        <div class="article--content--list--item">
                            <img class="article--content--list--item--img" src="<?php echo ViewsConfig::IMG_URL. 'removeStigma.png'; ?>" alt="支援総合">
                            <p class="article--content--list--item--title break-word block-start0 block-end0"><a href="">支援を受けるのが少し恥ずかしい？そんなことありません！</a></p>
                        </div>
                    </div>
                    <p id="link-to-articleList" class="right"><a href="">&gt;&gt;もっと見る</a></p>
                </div>
            </div>
 
        </main>
        <script src="<?php echo ViewsConfig::SCRIPT_URL. 'tabChange.js'; ?>"></script>
    </body>
           

</html>
