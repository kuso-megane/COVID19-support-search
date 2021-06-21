<?php

use myapp\config\ViewsConfig;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>管理者メニュー</title>
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    </head>
    <body>
        <h1>管理者メニュー</h1>
        <p><a href="/backyard/article/index">コラム編集</a></p>
        <p><a href="/backyard/articleCategory/index">コラムカテゴリ編集</a></p>
        <p><a href="/backyard/supportOrgs/">支援団体情報編集(これから実装予定)</a></p>
        <p><a href="/backyard/troubleList/index">「お困りごと」編集</a></p>
        <p><a href="/"><i class="fas fa-home"></i>トップページへ</a></p>
    </body>
</html>

