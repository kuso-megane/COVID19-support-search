<?php

use myapp\config\AppConfig;
use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo 'コラム一覧 -' . AppConfig::TITLE; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'article/articleList.css'; ?>">
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH . 'header.php'; ?>
        <main>
            <div class="center">
                <div id="articles" class="main--single left">
                    
                    <h3 id="articles--title" class=>支援・制度利用時のお役立ち情報</h3>

                    <?php foreach ($articleInfos as $category => $articleInfoItems): ?>

                        <div class="articles--content">
                            <p class="article--content--category"><?php echo htmlspecialchars($category, ENT_QUOTES); ?></p>
                            <?php
                                $_items = $articleInfoItems;
                                require ViewsConfig::COMPONENTS_PATH. 'articleBoxList.php';
                                unset($_items);
                            ?>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>

        </main>
   
    </body>
</html>