<?php

use myapp\config\ViewsConfig;

?>

<head>
    <title>troubleList - 管理者メニュー</title>
    <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo ViewsConfig::STYLE_SHEET_URL. 'backyardTroubleList/index.css'; ?>">
</head>
<body>
    <h2>troubleList 編集</h2>
    <table>
        <thead>
            <tr>
                <td>編集ページ</td>
                <td>内容</td>
                <td>おすすめコラムのカテゴリ</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($troubleList as $trouble): ?>
                <tr>
                    <td><a href="/backyard/troubleList/edit/<?php echo $trouble['id'] ?>">編集</a></td>
                    <td><?php echo htmlspecialchars($trouble['name'], ENT_QUOTES); ?></td>
                    <td><?php echo htmlspecialchars($articleCategoryNames[$trouble['articleC_id']]); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
