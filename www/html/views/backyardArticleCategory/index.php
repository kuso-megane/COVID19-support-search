<?php

use myapp\config\ViewsConfig;
var_dump($articleCategoryNames[0]['name']);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>コラムカテゴリ編集 -管理者メニュー</title>
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    </head>
    <body>
        <h2>コラム編集</h2>
        <p><a href="/backyard/articleCategory/edit">新規作成</a></p>
        <table>
            <thead>
                <tr>
                    <td>編集ページ</td>
                    <td>カテゴリ名</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($articleCategoryNames as $articleCategory): ?>
                    <tr>
                        <td>
                            <a href="<?php echo '/backyard/article/category/edit/'. $articleCategory['id']; ?>">編集</a>
                        </td>
                        <td>
                            <?php echo $articleCategory['name']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><a href="/backyard/index">管理画面topへ</a></p>
        <p><a href="/index"><i class="fas fa-home"></i>トップページへ</a></p>
    </body>
</html>
