<?php

use myapp\config\ViewsConfig;



?>

<head>
    <title>コラム編集 - 管理者メニュー</title>
    <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'backyardArticle/index.css'; ?>">
</head>
<body>
    <h2>コラム編集</h2>
    <p><a href="/backyard/article/edit">新規作成</a></p>
    <table>
        <thead>
            <tr>
                <td>編集ページ</td>
                <td>タイトル</td>
                <td>カテゴリ</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($articleBYInfos as $articleBYInfo): ?>

                <tr>
                    <td><a href="<?php echo "/backyard/article/edit/". $articleBYInfo['id']; ?>">編集</a></td>
                    <td><?php echo $articleBYInfo['title']; ?></td>
                    <td><?php echo $articleCategoryNames[$articleBYInfo['c_id']]; ?></td>
                </tr>

            <?php endforeach; ?>
    
        </tbody>
    </table>
        

    <p><a href="/index"><i class="fas fa-home"></i>トップページへ</a></p>
</body>
