<?php
    use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>支援総合検索サイト</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'articleList.css'; ?>">

    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>
        <main>
            <div>
                <p class="block-start0 bold"><a href="/index">←トップページに戻る</a></p>
            </div>

            <div class="center">
                <div id="articles" class="main--center left">
                    <div id="articles--title">
                        <h3 class="center">支援・制度利用時のお役立ち情報</h3>
                    </div>

                    <div class="articles--content">
                        <p class="article--content--category">支援全般</p>
                        <div class="article--content--list">
                            <div class="article--content--list--item">
                                <img class="article--content--list--item--img" src="<?php echo ViewsConfig::IMG_URL. 'which.png'; ?>" alt="支援総合">
                                <p class="article--content--list--item--title break-word block-start0 block-end0"><a href="">公的支援と民間支援、どちらがいいの? あなたにあった選び方を紹介！</a></p>
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
                    </div>
                    <div class="articles--content">
                        <p class="article--content--category">居住支援について</p>
                        <div class="article--content--list">
                            <div class="article--content--list--item">
                                <img class="article--content--list--item--img" src="<?php echo ViewsConfig::IMG_URL. 'home.png'; ?>" alt="支援総合">
                                <p class="article--content--list--item--title break-word block-start0 block-end0"><a href="">居住支援で提供される住宅ってどんな感じなの？正直ボロボロなんじゃ、、、、。</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
   
    </body>
</html>