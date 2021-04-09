<?php
    use myapp\config\ViewsConfig;
    use myapp\config\AppConfig;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>送信完了 - 管理者メニュー</title>
        <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
    </head>
    <body>
        <?php if($vm === AppConfig::POST_SUCCESS): ?>
            <p>コラムの追加・更新に成功しました。</p>
        <?php else: ?>
            <p>コラムの追加・更新に失敗しました。</p>
        <?php endif; ?>

        <p><a href="/backyard/article/index">コラム編集ページへ</a></p>
        <p><a href="/backyard/index">管理画面トップページへ</a></p>
    </body>
</html>
