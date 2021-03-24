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
                <div id="recommend-articles--box" class="main--upper">
                    <p class="bold block-start0">&lt;おすすめコラム(お役立ち情報)&gt;</p>
                    <div id="recommend-articles" class="inline-block left">
                        <li><a href="">公的(行政)支援と民間支援、どちらがいいの？</a></li>
                        <li><a href="">支援を受けるまでの流れを紹介！</a></li>
                        <li><a href="">居住支援で提供される住居ってどんな感じなの？</a></li>
                        <p id="link-to-articleList" class="right"><a href="">&gt;&gt;もっと見る</a></p>
                    </div>   
                </div>
            </div>

            <div class="center">
                <div class="main--lower">

                    <?php require ViewsConfig::COMPONENTS_PATH . 'searchbox.php'; ?>

                    <div class="main--lower--right">
                        <p class="bold block-start0">&lt;検索結果&gt;</p>
                        <div id="tab-area">
                            <div id="public-tab" class="tab <?php if($is_public_page === TRUE) {echo 'active';} ?>">公的支援</div>
                            <div id="private-tab" class="tab <?php if($is_public_page === FALSE) {echo 'active';} ?>">民間支援</div>
                        </div>
                        <div id="result">
                            <!-- xxx-tabがactiveになったとき、xxx-tab-contentがshow状態になる、初期状態はサーバーサイドで決定-->
                            <div id="public-tab-content" class="tab-content <?php if($is_public_page === TRUE) {echo 'show';} ?>" >
                                <p class="total"><?php echo $publicSupportsTotal; ?>件見つかりました。</p>
                                <?php if(empty($publicSupports) === TRUE): ?>

                                    <p class="no-result">検索結果がありませんでした。民間支援をご覧になるか、検索条件を変えてみてください。</p>

                                <?php else: ?>

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

                                <?php endif; ?>
                            </div>
                            <div id="private-tab-content" class="tab-content <?php if($is_public_page === FALSE) {echo 'show';} ?>">
                                <p class="total"><?php echo $privateSupportsTotal; ?>件見つかりました。</p>       
                                <?php if(empty($privateSupports) === TRUE): ?>

                                    <p class="no-result">検索結果がありませんでした。公的支援をご覧になるか、検索条件を変えてみてください。</p>

                                <?php else: ?>

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
                                
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="<?php echo ViewsConfig::SCRIPT_URL. 'tabChange.js'; ?>"></script>
    </body>
           

</html>
