
<?php

use myapp\config\AppConfig;
use myapp\config\ViewsConfig;

?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $articleContent['title'] . '- '. AppConfig::TITLE; ?></title>

        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'article/show.css'; ?>">
    </head>
    <body>
        <?php require ViewsConfig::COMPONENTS_PATH. 'header.php'; ?>

        <main>
            <div class="center">
                <div id="article" class="main--single">
                    <div class="link-to-articleList">
                        <p><a href="/article/list"><i class="fas fa-book-open"></i>コラム一覧へ戻る</a></p>
                    </div>
                    <div id="article--title">
                        <h3 class="block-end0 block-start0"><?php echo htmlspecialchars($articleContent['title'], ENT_QUOTES); ?></h3>
                    </div>
                    <div id="article--content"></div>
                    <div class="link-to-articleList">
                        <p ><a href="/article/list"><i class="fas fa-book-open"></i>コラム一覧へ戻る</a></p>
                    </div>
                </div>
                
            </div>
            
        </main>

        <!--記事内容のescapeおよび決定-->
        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.0.7/purify.js"></script>
        <script>
            marked.setOptions({
                breaks : true
            });
            //記事コンテンツの改行を反映するためバッククォート
            const md = 
            `<?php 
                $articleContent['content'] = str_replace("\\", "\\\\", $articleContent['content']);
                echo str_replace("`", "\`", $articleContent['content']); 
            ?>`;
            const dirty = marked(md);
            const clean = DOMPurify.sanitize(dirty);
            document.getElementById("article--content").innerHTML = clean;
        </script>
    </body>
</html>