<?php

use myapp\config\ViewsConfig;

?>

<head>
    <title>管理者メニュー</title>
    <?php require ViewsConfig::COMPONENTS_PATH. 'commonHead.php'; ?>
</head>
<body>
    <h1>管理者メニュー</h1>
    <p><a href="/backyard/article/index"><i class="fas fa-book-open"></i>コラム編集</a></p>
    <p><a href=""><i class="fas fa-hands-helping"></i>支援団体情報編集</a></p>
    <p><a href="/index"><i class="fas fa-home"></i>トップページへ</a></p>
</body>
