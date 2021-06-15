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
        <p><?php echo $message; ?></p>

        <p><a href="/backyard/troubleList/">「お困りごと」編集ページへ</a></p>
        <p><a href="/backyard/index">管理画面トップページへ</a></p>
    </body>
</html>
