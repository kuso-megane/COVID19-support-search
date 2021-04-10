<?php
    use myapp\config\ViewsConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>コラムカテゴリ編集 - 管理者メニュー</title>
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    </head>
    <body>
        <?php if ($isSucceeded === TRUE): ?>
            <p>作成・更新に成功しました</p>
        <?php else: ?>
            <p>作成・更新に失敗しました。</p>
        <?php endif; ?>

        <p><a href="/backyard/articleCategory/index">コラムカテゴリ編集ページへ</a></p>
        <p><a href="/backyard/index">管理画面トップページへ</a></p>
    </body>
</html>