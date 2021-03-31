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

                    <?php foreach ($articleInfos as $category => $articleInfoItems): ?>

                        <div class="articles--content">
                            <p class="article--content--category"><?php echo $category; ?></p>
                            <div class="article--content--list">

                                <?php foreach ($articleInfoItems as $articleInfoItem): ?>

                                    <div class="article--content--list--item">
                                        <img class="article--content--list--item--img"
                                            src="<?php echo ViewsConfig::IMG_URL. $articleInfoItem['thumbnailName']; ?>"
                                            alt="<?php echo $articleInfoItem['title']; ?>"
                                        >
                                        <p class="article--content--list--item--title break-word block-start0 block-end0">
                                            <a href="<?php echo '/article/'. $articleInfoItem['id']; ?>">
                                                <?php echo $articleInfoItem['title']; ?>
                                            </a>
                                        </p>
                                    </div>

                                <?php endforeach; ?>
                                
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>

        </main>
   
    </body>
</html>